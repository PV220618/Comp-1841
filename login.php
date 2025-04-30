<?php
session_start();
include 'include/DatabaseConnection.php';
include 'include/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];


        $user = login($pdo, $username, $password);
        if ($user && password_verify($_POST['password'], $user['password'])) {
            header("Location: questions.php");
            exit();
        } else {
            $_SESSION['message'] = [
                'text' => "Invalid username or password!",
                'alert' => "danger"
            ];
            header("Location: loginindex.php");
            exit();
        }
    } else {
        $_SESSION['message'] = [
            'text' => "Please complete all fields!",
            'alert' => "warning"
        ];
        header("Location: loginindex.php"); 
        exit();
    }
}
?>
