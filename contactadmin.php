<?php
session_start();
include 'include/DatabaseConnection.php';

include 'template/layout.html.php';

// Nếu chưa đăng nhập
if (!isset($_SESSION['user_id'])) {
    header("Location: loginindex.php");
    exit;
}

$title = "Contact to Admin";
$output = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $message = trim($_POST['message']);

    if (!empty($message)) {
        include 'include/functions.php';
        sendMessage($pdo, $userId, $message);
        $output = "<p>Successfully.</p>";
    } else {
        $output = "<p>Please, fill the box.</p>";
    }
}

include 'template/contactadmin.html.php';

?>