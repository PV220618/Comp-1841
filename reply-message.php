<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: loginindex.php");
    exit;
}

include '../include/DatabaseConnection.php';
include '../include/functions.php';

if (isset($_POST['id'], $_POST['reply'])) {
    $id = (int)$_POST['id'];
    $reply = trim($_POST['reply']);
    replyMessage($pdo, $id, $reply);
}

header("Location: ../admin/messages.php");
exit;
?>