<?php

// get connection
require_once 'conn.php';
require_once 'sendmail.php';

session_start();

$query = '
        SELECT u.*, ct.*, d.*, r.*
        FROM users u
            LEFT JOIN clienttypes ct ON u.ClientTypeID = ct.id
            LEFT JOIN divisions d ON u.DivisionID = d.id
            LEFT JOIN roles r ON u.RoleID = r.id
        WHERE
            u.`id` = ?
        ';
$result = $conn->execute_query($query, [$_SESSION['id']]);

$acc = $result->fetch_object();

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
        $Subject = "MSG-IT - " . $RequestNo;

        $Message = "";
        $Message .= "<p><img src='https://upload.wikimedia.org/wikipedia/commons/1/14/DTI_Logo_2019.png' alt='' width='58' height='55'></p>";
        $Message .= "<hr>";
        $Message .= "<div>";
        $Message .= "<div>Dear " . $acc->FirstName . " " . $acc->LastName . ",</div>";
        $Message .= "<br>";
        $Message .= "<div>I hope this email finds you well. We acknowledge and appreciate your report related to IT/ICT Issue.</div>";
        $Message .= "<br>";
        $Message .= "<br>";
        $Message .= "<div>Here are the details of your ticket:</div>";
        $Message .= "<br>";
        $Message .= "<div>Ticket Number: " . $RequestNo . "</div>";
        $Message .= "<div>Date Submitted: " . date_format(date_create($DateRequested), "d M, Y") . "</div>";
        $Message .= "<div>Description of Issue: " . $Complaint . "</div>";
        $Message .= "<br>";
        $Message .= "<br>";
        $Message .= "<div>Please be assured that we are committed to resolving this matter at the earliest. Our support team will reach out to you with updates.</div>";
        $Message .= "<div>We appreciate your patience and understanding as we work to resolve this matter. Thank you.</div>";
        $Message .= "<br>";
        $Message .= "<br>";
        $Message .= "<div>Best Regards,</div>";
        $Message .= "<br>";
        $Message .= "<div>MSG-IT Administrator</div>";
        $Message .= "<div>IT Support Staff</div>";
        $Message .= "<div>DTI Region VI</div>";
        $Message .= "<br>";
        $Message .= "<hr>";
        $Message .= "<div>&copy; Copyright <strong>MSG-IT </strong>2024. All Rights Reserved</div>";
        $Message .= "</div>";

        sendEmail($acc->Email, $Subject, $Message);

        $response['status'] = 'success';
        $response['message'] = 'Request Submit successful!';
        $response['redirect'] = 'helpdesks.php';
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }
}

if (isset($_POST['EmployeeZRTRequest'])) {

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
