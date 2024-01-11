<?php

// get connection
require_once 'conn.php';

session_start();

$response = array();

if (isset($_POST['RequestNo'])) {
    $RequestNo = $conn->real_escape_string($_POST['RequestNo']);

    $query = "
    select
        h.*,
        s.*,
        pl.*,
        rtt.*,
        rc.*,
        CONCAT(
            sb.`FirstName`,
            ' ',
            sb.`LastName`
        ) as `ServicedStaff`,
        CONCAT(
            ab.`FirstName`,
            ' ',
            ab.`LastName`
        ) as `ApprovedStaff`
    from helpdesks h
        left join statuses s on h.`StatusID` = s.id
        left join prioritylevels pl on h.`PriorityID` = pl.id
        left join repairtypes rtt on h.`RepairTypeID` = rtt.id
        left join repairclasses rc on h.`RepairClassID` = rc.id
        left join users sb on h.`ServicedBy` = sb.id
        left join users ab on h.`ApprovedBy` = ab.id
    where `RequestNo` = ?
    ";

    $result = $conn->execute_query($query, [$RequestNo]);

    $response = $result->fetch_object();
}

$responseJSON = json_encode($response);

echo $responseJSON;

$conn->close();
