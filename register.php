<?php
session_start();
include 'include/DatabaseConnection.php';
include 'include/functions.php';

if (isset($_POST['register'])) {
    if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        try {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            registeruser($pdo, $email, $username, $password);

            $_SESSION['message'] = array("text" => "User successfully created.", "alert" => "info");
            header('location: loginindex.php');
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "
        <script>alert('Please fill up all required fields!')</script>
        <script>window.location = 'template/register.html.php'</script>
        ";
    }
}

include 'template/register.html.php';
?>
