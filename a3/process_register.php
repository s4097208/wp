<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'includes/db_connect.inc';
session_start();

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$stmt = mysqli_prepare($conn, "INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);

if (mysqli_stmt_execute($stmt)) {
    $user_id = mysqli_insert_id($conn);
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['message'] = "Registration and login are successful.";
    header("Location: login.php");
} else {
    $_SESSION['error'] = "Registration failed. Try a different email or username.";
    header("Location: register.php");
}
exit();
