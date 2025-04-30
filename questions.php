<?php
session_start();
try {
    include 'include/DatabaseConnection.php';
    include 'include/functions.php';

    $questions = getquestions($pdo);
    $title = 'GW Q&A';

    ob_start();
    include 'template/questions.html.php';
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage();
}
include 'template/layout.html.php';
?>