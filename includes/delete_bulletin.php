<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "dbcon.inc.php";

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    // Prepare the SQL statement
    $stmt = $db->prepare('DELETE FROM bulletin WHERE id = :id');

    // Execute the statement with the ID
    try {
        $stmt->execute(['id' => $id]);
        echo "Bulletin deleted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
