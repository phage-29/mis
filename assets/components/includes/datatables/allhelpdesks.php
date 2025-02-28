<?php
// Database Connection
include '../conn.php';
session_start();
$dsn = "mysql:host=$hostname;dbname=$database;charset=UTF8";
$conn = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Reading value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

$searchArray = array();

$join = "helpdesks h LEFT JOIN requesttypes rt ON h.`RequestTypeID` = rt.id LEFT JOIN category c ON h.`CategoryID` = c.id LEFT JOIN subcategory sc ON h.`SubCategoryID` = sc.id LEFT JOIN statuses s ON h.`StatusID` = s.id";

// Search
$searchQuery = " ";
if ($searchValue != '') {
    $searchQuery = " AND (
        DateRequested LIKE :DateRequested OR
        RequestNo LIKE :RequestNo OR
        RequestType LIKE :RequestType OR
        Category LIKE :Category OR
        SubCategory LIKE :SubCategory OR
        Status LIKE :Status
    ) ";
    $searchArray = array(
        'DateRequested' => "%$searchValue%",
        'RequestNo' => "%$searchValue%",
        'RequestType' => "%$searchValue%",
        'Category' => "%$searchValue%",
        'SubCategory' => "%$searchValue%",
        'Status' => "%$searchValue%",
    );
}

// Total number of records without filtering
$stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM " . $join . " ");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

// Total number of records with filtering
$stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM " . $join . " " . $searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

// Fetch records
$stmt = $conn->prepare("SELECT * FROM " . $join . " " . $searchQuery . " ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT :limit,:offset");

// Bind values
foreach ($searchArray as $key => $search) {
    $stmt->bindValue(':' . $key, $search, PDO::PARAM_STR);
}

$stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
$stmt->execute();
$empRecords = $stmt->fetchAll();

$data = array();

foreach ($empRecords as $row) {
    $data[] = array(
        "DateRequested" => date_format(date_create($row['DateRequested']), 'd/m/Y'),
        "RequestNo" => '<a class="a-RequestNo link-primary font-monospace text-nowrap" href="#" data-bs-toggle="modal" data-bs-target="#helpdesk-modal" data-requestno="' . $row['RequestNo'] . '">' . $row['RequestNo'] . '</a>',
        "RequestType" => $row['RequestType'],
        "Category" => $row['Category'],
        "SubCategory" => $row['SubCategory'],
        "Status" => '<center><span class="badge rounded-pill" style="background-color:' . $row['StatusColor'] . ';width: 7rem">' . $row['Status'] . '</span></center>',
    );
}

// Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
