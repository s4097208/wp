<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once 'includes/db_connect.inc';

$name = trim($_POST['identifier']);
$password = $_POST['password'];

$stmt = mysqli_prepare($conn, "SELECT user_id, email, password FROM users WHERE email = ? OR username = ?");
mysqli_stmt_bind_param($stmt, "ss", $name, $name);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $user_id, $email, $hash);
mysqli_stmt_fetch($stmt);

if ($user_id && password_verify($password, $hash)) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['email'] = $email;
    $_SESSION['message'] = "Login successful.";
    header("Location: index.php");
} else {
    $_SESSION['error'] = "Login failed. Check your credentials.";
    header("Location: login.php");
}
exit();