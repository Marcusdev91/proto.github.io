<?php
require_once "dbcon.inc.php";

// Check if the form is submitted
if (isset($_POST['save'])) {
    // Sanitize and validate input
    $id = $_POST['id'];
    $header = htmlspecialchars($_POST['header']?? '', ENT_QUOTES, 'UTF-8');
    $date = $_POST['date'];
    $author = htmlspecialchars($_POST['author']?? '', ENT_QUOTES, 'UTF-8');
    $article = htmlspecialchars($_POST['article']?? '', ENT_QUOTES, 'UTF-8');

    // Prepare the SQL statement
    $stmt = $db->prepare('UPDATE bulletin SET header = :header, date = :date, author = :author, article = :article WHERE id = :id');
    
    // Execute the statement with the sanitized input
    try {
        $stmt->execute(['header' => $header, 'date' => $date, 'author' => $author, 'article' => $article, 'id' => $id]);
        echo "Bulletin updated successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
