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

if (isset($_SESSION['user_id'])) {

    foreach ($_POST as $key => $value) {
        $$key = validateInput($value);
    }

    // Validate and upload image
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $upload_dir = 'assets/images/skills/';

    $img_name = $_FILES['skillImage']['name'];
    $tmp_name = $_FILES['skillImage']['tmp_name'];
    $ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $new_name = uniqid() . "." . $ext;
    $target = $upload_dir . $new_name;

    if (!in_array($ext, $allowed_ext)) {
        $_SESSION['error'] = "Invalid file type.";
        header("Location: add.php");
        exit();
    }

    $sql = "INSERT INTO skills (title, description, category, rate_per_hr, level, image_path, user_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdssi", $title, $description, $category, $rate_per_hr, $level, $new_name, $_SESSION['user_id']);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        if (move_uploaded_file($tmp_name, $target)) {
            $_SESSION['message'] = "Skill successfully added.";

        } else {
            $_SESSION['error'] = "Failed to upload image.";
        }
    } else {
        $_SESSION['error'] = "An error occurred while adding the skill.";
    }

    $stmt->close();
} else {
    $_SESSION['error'] = "You do not have permission to add skills.";
}

header("Location: skills.php");
exit();
