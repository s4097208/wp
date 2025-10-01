<?php
$pageTitle = "Add Skill - SkillSwap";
include 'includes/header.inc';
?>

<!-- Title -->
<div class="container py-5">
  <h2 class="mb-4">Add New Skill</h2>

  <div class="skills-form">
    <form action="process_add.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="inputTitle" class="form-label">Title <span class="required">*</span></label>
        <input type="text" name="title" id="inputTitle" class="form-control" placeholder="Enter Skill Title" required />
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description <span class="required">*</span></label>
        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description" required></textarea>
      </div>

      <div class="mb-3">
        <label for="category" class="form-label">Category <span class="required">*</span></label>
        <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category" required />
      </div>

      <div class="mb-3">
        <label for="ratePerHour" class="form-label">Rate per Hour ($) <span class="required">*</span></label>
        <input type="number" class="form-control" id="ratePerHour" name="ratePerHour" placeholder="Enter Rate per Hour" min="0" step="0.1" required />
      </div>

      <div class="mb-3">
        <label for="skillLevel" class="form-label">Skill Level <span class="required">*</span></label>
        <select class="form-select" id="skillLevel" name="skillLevel" required>
          <option value="" disabled selected>Please select</option>
          <option value="Beginner">Beginner</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Expert">Expert</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="skillImage" class="form-label">Skill Image <span class="required">*</span></label>
        <input type="file" class="form-control" id="skillImage" name="skillImage" accept="image/*" required />
      </div>

      <div id="errorMsg" class="alert alert-danger mb-3 d-none">
        Only image files are allowed (JPG, PNG, GIF, WEBP).
      </div>

      <div>
        <button id="submitBtn" type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<?php include 'includes/footer.inc'; ?>
