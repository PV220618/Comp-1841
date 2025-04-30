<?php
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../loginindex.php");
    exit;
}

include '../include/DatabaseConnection.php';
include '../include/functions.php';

$title = "List massages";

ob_start();
$messages = getMessages($pdo);
include '../template/admindashboard.html.php';
$output = ob_get_clean();

include '../template/layout.html.php';
?>