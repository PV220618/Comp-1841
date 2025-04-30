<?php
session_start();
include 'include/DatabaseConnection.php';
include 'include/functions.php';

if (!isset($_SESSION['user_id'])) {
    die("Error: You must be logged in to post a question.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    try {
        $image = NULL;
        $user_id = $_SESSION['user_id']; 

        if (!empty($_FILES['image']['name'])) {
            $image = time() . "_" . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], "images/$image");
        }

        insertquestions ($pdo, $title, $content, $image, $postdate, user_id: $user_id, module_id: $module_id);

        header('location: questions.php');
        exit();
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
} else {

    $title = 'Add a new question';
    ob_start();
    include 'template/addquestion.html.php';
    $output = ob_get_clean();
}

include 'template/layout.html.php';
?>
