<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once "header.php";

// Check if the form is submitted
if (isset($_POST['save'])) {
    // Sanitize and validate input
    $header = filter_var($_POST['header'], FILTER_SANITIZE_SPECIAL_CHARS);
    $date = $_POST['date'];
    $author = filter_var($_POST['author'], FILTER_SANITIZE_SPECIAL_CHARS);
    $article = filter_var($_POST['article'], FILTER_SANITIZE_SPECIAL_CHARS);

    // Prepare the SQL statement
    $stmt = $db->prepare('INSERT INTO bulletin (header, date, author, article) VALUES (:header, :date, :author, :article)');

    // Execute the statement with the sanitized input
    try {
        $stmt->execute(['header' => $header, 'date' => $date, 'author' => $author, 'article' => $article]);
        echo "Bulletin added successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
