<?php
session_start();
include 'include/DatabaseConnection.php';
include 'include/functions.php';

if (!isset($_SESSION['user_id'])) {
    die("You are not allowed to access this page.");
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id'])) {
        die("Missing question ID.");
    }

    $questionId = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $module_id = $_POST['module_id'];

    $currentQuestion = getQuestionById($questionId, $pdo);
    $currentImage = $currentQuestion['image'] ?? null;

    if (!empty($_FILES['image']['name'])) {
        $fileName = time() . '_' . basename($_FILES['image']['name']);
        $uploadDir = 'images/';
        $imagePath = $uploadDir . $fileName;
    
    
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            die("Lỗi upload hình ảnh.");
        }
        $newImage = $fileName;
    } else {
        $newImage = $currentImage;
    
    }

    $stmt = $pdo->prepare("
        UPDATE questions 
        SET title = ?, content = ?, module_id = ?, image = ?
        WHERE id = ?
    ");
    $stmt->execute([$title, $content, $module_id, $newImage, $questionId]);

    header("Location: questions.php");
    exit;
}

$questionId = $_GET['id'];
$question = getQuestionById($questionId, $pdo);


$modules = getAllModules();
include 'template/editquestion.html.php';
?>