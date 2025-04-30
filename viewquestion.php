<?php
include 'include/DatabaseConnection.php';

if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Error: Invalid ID.");
}

$id = (int)$_GET['id'];

try {
    $sql = "SELECT questions.id, questions.title, questions.content, questions.postdate, questions.image, users.username, users.email, modules.module_name 
            FROM questions
            INNER JOIN users ON questions.user_id = users.id
            INNER JOIN modules ON questions.module_id = modules.id
            WHERE questions.id = :id";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $question = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$question) {
        die(" Don't find questions.");
    }
} catch (PDOException $e) {
    die(" Error: " . $e->getMessage());
}
    $title = "View Question";
    ob_start();
    include 'template/viewquestion.html.php';
    $output = ob_get_clean();
    include 'template/layout.html.php';
?>
