<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once 'includes/db_connect.inc';

foreach ($_POST as $key => $value) {
    $$key = trim($value);
}

$id = intval($_POST['skill_id']);

// Get existing skill data
$stmt = $conn->prepare("SELECT title, description, category, rate_per_hr, level, image_path FROM skills WHERE skill_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$existing = $result->fetch_assoc();

if (!$existing) {
    $error = "Skill not found.";
    header("Location: skills.php?error=" . urlencode($error));
    exit();
}

$old_image = $existing['image_path'];

// Handle image upload
$upload_dir = 'assets/images/skills/';
$new_image = $old_image;

if (!empty($_FILES['skillImage']['name'])) {
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $img_name = $_FILES['skillImage']['name'];
    $tmp_name = $_FILES['skillImage']['tmp_name'];
    $ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed_ext)) {
        $error = "Invalid file type.";
        header("Location: edit.php?id=$id&error=" . urlencode($error));
        exit();
    }

    if (!is_uploaded_file($tmp_name)) {
        $error = "Invalid upload attempt.";
        header("Location: edit.php?id=$id&error=" . urlencode($error));
        exit();
    }

    $new_image = uniqid() . "." . $ext;
    $target = $upload_dir . $new_image;

    if (!move_uploaded_file($tmp_name, $target)) {
        $error = "Image upload failed.";
        header("Location: edit.php?id=$id&error=" . urlencode($error));
        exit();
    }

    // Delete old image
    if ($old_image && file_exists($upload_dir . $old_image)) {
        unlink($upload_dir . $old_image);
    }
}


$update = $conn->prepare("
    UPDATE skills 
    SET title=?, description=?, category=?, rate_per_hr=?, level=?, image_path=? 
    WHERE skill_id=?
");
$update->bind_param("sssdssi", $title, $description, $category, $rate_per_hr, $level, $new_image, $id);
$update->execute();

$message = "Skill updated successfully.";
header("Location: details.php?id=$id&message=" . urlencode($message));
exit();
