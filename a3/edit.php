<?php
$pageTitle = "Edit Skill - SkillSwap";
include 'includes/header.inc';
include 'includes/db_connect.inc';

// Redirect if user not logged in
if (!isset($_SESSION['user_id'])) {
  $_SESSION['error'] = "You must login to access this page.";
  header("Location: login.php");
  exit();
}

$skill = null;
$error = null;

// Fetch skill info
if (!empty($_GET['id'])) {
  $sql = "SELECT * FROM skills WHERE skill_id = ?";
  $stmt = $conn->prepare($sql);
  $id = $_GET['id'];
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $skill = $result->fetch_assoc();
  } else {
    $error = "Skill not found.";
  }
  $stmt->close();
} else {
  $error = "No skill ID provided.";
}
?>

<main>
  <div class="container py-5">
    <h2 class="mb-4">Edit Skill</h2>

    <?php if ($error): ?>
      <div class="alert alert-danger">
        <?= htmlspecialchars($error) ?>
      </div>
      <a href="skills.php" class="btn btn-secondary">Back to Skills</a>
    <?php else: ?>

      <div class="skills-form">
        <form action="process_edit.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="skill_id" value="<?= htmlspecialchars($skill['skill_id']) ?>">
          <input type="hidden" name="current_image" value="<?= htmlspecialchars($skill['image_path']) ?>">

          <div class="mb-3">
            <label for="inputTitle" class="form-label">Title <span class="required">*</span></label>
            <input type="text" name="title" id="inputTitle" class="form-control"
              value="<?= htmlspecialchars($skill['title']) ?>" placeholder="Enter Skill Title" required />
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description <span class="required">*</span></label>
            <textarea class="form-control" id="description" name="description" rows="3"
              placeholder="Enter Description" required><?= htmlspecialchars($skill['description']) ?></textarea>
          </div>

          <div class="mb-3">
            <label for="category" class="form-label">Category <span class="required">*</span></label>
            <input type="text" class="form-control" id="category" name="category"
              value="<?= htmlspecialchars($skill['category']) ?>" placeholder="Enter Category" required />
          </div>

          <div class="mb-3">
            <label for="rate_per_hr" class="form-label">Rate per Hour ($) <span class="required">*</span></label>
            <input type="number" class="form-control" id="rate_per_hr" name="rate_per_hr"
              value="<?= htmlspecialchars($skill['rate_per_hr']) ?>" placeholder="Enter Rate per Hour"
              min="0" step="0.1" required />
          </div>

          <div class="mb-3">
            <label for="level" class="form-label">Skill Level <span class="required">*</span></label>
            <select class="form-select" id="level" name="level" required>
              <option value="" disabled>Please select</option>
              <option value="Beginner" <?= strtolower($skill['level']) === 'beginner' ? 'selected' : '' ?>>Beginner</option>
              <option value="Intermediate" <?= strtolower($skill['level']) === 'intermediate' ? 'selected' : '' ?>>Intermediate</option>
              <option value="Expert" <?= strtolower($skill['level']) === 'expert' ? 'selected' : '' ?>>Expert</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Current Image</label>
            <div class="mb-2">
              <img src="assets/images/skills/<?= htmlspecialchars($skill['image_path']) ?>"
                alt="Current skill image" class="img-fluid img-thumbnail" style="max-width: 200px;">
            </div>
          </div>

          <div class="mb-3">
            <label for="skillImage" class="form-label">New Skill Image (Optional)</label>
            <input type="file" class="form-control" id="skillImage" name="skillImage" accept="image/*" />
            <small class="form-text text-muted">Leave empty to keep current image</small>
          </div>

          <div id="errorMsg" class="alert alert-danger mb-3">
            Only image files are allowed (JPG, PNG, GIF, WEBP).
          </div>

          <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-success mb-3">
              Skill updated successfully!
            </div>
          <?php endif; ?>

          <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger mb-3">
              <?= htmlspecialchars($_GET['error']) ?>
            </div>
          <?php endif; ?>

          <div class="d-flex">
            <button id="submitBtn" type="submit" class="btn btn-primary me-2">Update Skill</button>
            <a href="details.php?id=<?= $skill['skill_id'] ?>" class="btn btn-secondary">Cancel</a>
          </div>
        </form>
      </div>
    <?php endif; ?>
  </div>
</main>

<?php include 'includes/footer.inc'; ?>
