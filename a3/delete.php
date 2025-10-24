<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once 'includes/db_connect.inc';

$id = intval($_GET['id']);

// Get image path for this skill
$stmt = $conn->prepare("SELECT image_path FROM skills WHERE skill_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    $error = "Skill not found or unauthorized access.";
    header("Location: skills.php?error=" . urlencode($error));
    exit();
}

$image = $row['image_path'];
$upload_dir = 'assets/images/skills/';

// Delete the skill record
$delete_stmt = $conn->prepare("DELETE FROM skills WHERE skill_id = ?");
$delete_stmt->bind_param("i", $id);

if ($delete_stmt->execute()) {
    // Delete image file if it exists
    if ($image && file_exists($upload_dir . $image)) {
        unlink($upload_dir . $image);
    }

    $message = "Skill deleted successfully.";
    header("Location: skills.php?message=" . urlencode($message));
    exit();
} else {
    $error = "Error deleting skill.";
    header("Location: skills.php?error=" . urlencode($error));
    exit();
}
