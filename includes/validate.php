<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once "dbcon.inc.php";

if (isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $db->prepare('SELECT id, password FROM credentials WHERE email = :email');
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
       // echo 'Stored password hash: ' . $user['password'] . '<br>'; // Debugging statement
       // echo 'Entered password: ' . $password . '<br>'; // Debugging statement
        if (password_verify($password, $user['password'])) {
           // echo 'Password match!<br>'; // Debugging statement
            $_SESSION['user_id'] = $user['id'];
            header("Location: crud.php");
            exit();
        } else {
            echo "Invalid username or password. Please try again.";
        }
    } else {
        echo "Invalid username or password. Please try again.";
    }
}
?>
