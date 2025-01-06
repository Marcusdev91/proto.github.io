<?php
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=news', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true // Enable query buffering
    ]);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

