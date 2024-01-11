<?php

// get connection
require_once 'conn.php';

session_start();

$response = array();

$response['status'] = 'error';
$response['message'] = 'Something went wrong!';

if (isset($_POST['Login'])) {
    $Username = $conn->real_escape_string($_POST['Username']);
    $Password = $conn->real_escape_string($_POST['Password']);

    $query = "SELECT * FROM `users` where `Username`=?";

    try {
        $result = $conn->execute_query($query, [$Username]);

        if ($result && $result->num_rows === 1) {

            $row = $result->fetch_object();

            if (password_verify($Password, $row->Password)) {

                if ($row->Activation == 1) {

                    $_SESSION['id'] = $row->id;

                    $response['status'] = 'success';
                    $response['message'] = 'Login successful!';
                    $response['redirect'] = 'dashboard.php';
                } else {

                    $response['status'] = 'error';
                    $response['message'] = 'Account not Activated!';
                }
            } else {

                $response['status'] = 'error';
                $response['message'] = 'Invalid Password!';
            }
        } else {

            $response['status'] = 'error';
            $response['message'] = 'Username not found!';
        }
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

if (isset($_POST['UpdateProfile'])) {
    $response['status'] = 'success';
    $response['message'] = 'Profile Update successful!';
    $response['redirect'] = 'profile.php';
}

if (isset($_POST['ChangePassword'])) {
    $response['status'] = 'success';
    $response['message'] = 'Password Change successful!';
    $response['redirect'] = 'profile.php';
}

if (isset($_POST['EmployeeICTRequest'])) {

    $RequestTypeID = $conn->real_escape_string($_POST['RequestTypeID']);
    $CategoryID = $conn->real_escape_string($_POST['CategoryID']);
    $SubCategoryID = $conn->real_escape_string($_POST['SubCategoryID']);
    $Complaint = $conn->real_escape_string($_POST['Complaint']);
    $DatetimePreferred = $conn->real_escape_string($_POST['DatetimePreferred']);
    $DateRequested = $conn->real_escape_string($_POST['DateRequested']);

    $Ym = date_format(date_create($DateRequested), "Ym");
    $result = $conn->query("SELECT * FROM helpdesks WHERE DATE_FORMAT(DateRequested, '%Y%m') = '$Ym'");
    $RequestNo = 'REQ-' . $Ym . '-' . str_pad($result->num_rows + 1, 5, '0', STR_PAD_LEFT);

    $query = "INSERT INTO helpdesks (`RequestedBy`, `RequestTypeID`, `CategoryID`, `SubCategoryID`, `Complaint`, `DatetimePreferred`,`DateRequested`,`RequestNo`) VALUES (?,?,?,?,?,?,?,?)";
    try {
        $result = $conn->execute_query($query, [$_SESSION['id'], $RequestTypeID, $CategoryID, $SubCategoryID, $Complaint, $DatetimePreferred, $DateRequested, $RequestNo]);

        if (isset($_FILES['Files'])) {
            $fileCount = count($_FILES['Files']['name']);

            for ($i = 0; $i < $fileCount; $i++) {
                $fileName = $_FILES['Files']['name'][$i];
                $fileName = explode('.', $fileName);
                $fileName = md5(uniqid(rand(), true)) . '.' . end($fileName);
                $fileTmpName = $_FILES['Files']['tmp_name'][$i];
                $fileSize = $_FILES['Files']['size'][$i];
                $fileType = $_FILES['Files']['type'][$i];
                $fileError = $_FILES['Files']['error'][$i];

                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $allowedExtensions = ["pdf", "doc", "docx", "txt", "jpg", "jpeg", "png", "gif"];

                if (in_array($fileExt, $allowedExtensions)) {
                    $uploadDir = "uploads/";
                    $destination = $uploadDir . $fileName;

                    if (move_uploaded_file($fileTmpName, $destination)) {
                        // Insert file details into the database
                        $query = "INSERT INTO files (FileName, FilePath, FileMime) VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("sss", $fileName, $destination, $fileType);
                        $stmt->execute();
                        $stmt->close();
                    }
                }
            }
        }

        $response['status'] = 'success';
        $response['message'] = 'Request Submit successful!';
        $response['redirect'] = 'helpdesks.php';
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

$responseJSON = json_encode($response);

echo $responseJSON;

$conn->close();
