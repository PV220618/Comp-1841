<?php
try{
    include 'include/DatabaseConnection.php';
    include 'include/functions.php';

    deletequestions ($pdo, $questions_id);
    header('location: questions.php');
    exit();
}catch(PDOException $e){
$title = 'An error has occured';
$output = 'Unable to connect to delete question: ' .$e->getMessage();
}
include 'template/layout.html.php';
?>