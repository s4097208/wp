<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once('includes/db_connect.inc');

function validateInput($str)
{
    $ret = trim($str);
    return $ret;
}

foreach ($_POST as $key => $value) {
    $$key = validateInput($value);
}

$allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
$upload_dir = 'assets/images/skills/';

$img_name = $_FILES['skillImage']['name'];
$tmp_name = $_FILES['skillImage']['tmp_name'];
$ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
$new_name = uniqid() . "." . $ext;
$target = $upload_dir . $new_name;

if (!in_array($ext, $allowed_ext)) {
    $error = urlencode("Invalid file type.");
    header("Location: add.php?error=$error");
    exit();
}

$sql = "INSERT INTO skills (title, description, category, rate_per_hr, level, image_path) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssdss", $title, $description, $category, $rate_per_hr, $level, $new_name);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    if (move_uploaded_file($tmp_name, $target)) {
        $message = urlencode("Skill added successfully");
        header("Location: add.php?message=$message");
        exit();
    } else {
        $error = urlencode("Failed to upload image");
        header("Location: add.php?error=$error");
        exit();
    }
} else {
    $error = urlencode("An error occurred while adding the skill");
        exit();
}

$conn->close();
exit();