<?php
require_once 'assets/components/includes/conn.php';

session_start();

$public = ['login.php', 'register.php'];
$cur_page = basename($_SERVER['REQUEST_URI']);
if (!in_array($cur_page, $public)) {
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
            session_unset();
            session_destroy();
            header('Location: assets/components/includes/logout.php');
            exit();
        }

        $_SESSION['last_activity'] = time();

        $query = '
        SELECT u.*, ct.*, d.*, r.*
        FROM users u
            LEFT JOIN clienttypes ct ON u.ClientTypeID = ct.id
            LEFT JOIN divisions d ON u.DivisionID = d.id
            LEFT JOIN roles r ON u.RoleID = r.id
        WHERE
            u.`id` = ?
            AND u.`Activation` = ?
        ';
        $result = $conn->execute_query($query, [$_SESSION['id'], '1']);

        if ($result && $result->num_rows > 0) {
            $acc = $result->fetch_object();
            $_SESSION['role'] = $acc->Role;
        } else {
            header('Location: assets/components/includes/logout.php');
            exit();
        }
    } else {
        header('Location: assets/components/includes/logout.php');
        exit();
    }
}
