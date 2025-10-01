
<?php

$pageTitle = "Gallery - SkillSwap";
include 'includes/header.inc';
?>

<body>

  <div class="container py-5">
    <h2 class="mb-4">Skill Gallery</h2>
    
    <div class="row g-4 skills-gallery">
      <!-- Image 1 -->
      <div class="col-6 col-md-4 col-lg-3"> <!-- bootstrap for page size in sm, md, and large -->
        <img src="assets/images/skills/1.png" class="img-fluid rounded" alt="Skill 1" data-bs-toggle="modal" data-bs-target="#imageModal" data-img="assets/images/skills/1.png">
        <p class="text-center pt-2">Beginner Guitar Lessons </p> <!-- padding top_ text location -->
      </div>

      <!-- Image 2 -->
      <div class="col-6 col-md-4 col-lg-3">
        <img src="assets/images/skills/2.png" class="img-fluid rounded" alt="Skill 2" data-bs-toggle="modal" data-bs-target="#imageModal" data-img="assets/images/skills/2.png">
        <p class="text-center pt-2">Intermediate Fingerstyle </p>
      </div>

      <!-- Image 3 -->
      <div class="col-6 col-md-4 col-lg-3">
        <img src="assets/images/skills/3.png" class="img-fluid rounded " alt="Skill 3" data-bs-toggle="modal" data-bs-target="#imageModal" data-img="assets/images/skills/3.png">
        <p class="text-center pt-2">Artisan Bread Making </p>
      </div>

      <!-- Image 4 -->
      <div class="col-6 col-md-4 col-lg-3">
        <img src="assets/images/skills/4.png" class="img-fluid rounded" alt="Skill 4" data-bs-toggle="modal" data-bs-target="#imageModal" data-img="assets/images/skills/4.png">
        <p class="text-center pt-2">French Pastry Making </p>
      </div>

      <!-- Image 5 -->
      <div class="col-6 col-md-4 col-lg-3">
        <img src="assets/images/skills/5.png" class="img-fluid rounded " alt="Skill 5" data-bs-toggle="modal" data-bs-target="#imageModal" data-img="assets/images/skills/5.png">
        <p class="text-center pt-2">Watercolor Basics</p>
      </div>

      <!-- Image 6 -->
      <div class="col-6 col-md-4 col-lg-3">
        <img src="assets/images/skills/6.png" class="img-fluid rounded" alt="Skill 6" data-bs-toggle="modal" data-bs-target="#imageModal" data-img="assets/images/skills/6.png">
        <p class="text-center pt-2">Digital Illustration With Procreate </p>
      </div>

      <!-- Image 7 -->
      <div class="col-6 col-md-4 col-lg-3">
        <img src="assets/images/skills/7.png" class="img-fluid rounded" alt="Skill 7" data-bs-toggle="modal" data-bs-target="#imageModal" data-img="assets/images/skills/7.png">
        <p class="text-center pt-2">Morning Vinyasa Flow </p>
      </div>

      <!-- Image 8 -->
      <div class="col-6 col-md-4 col-lg-3">
        <img src="assets/images/skills/8.png" class="img-fluid rounded " alt="Skill 8" data-bs-toggle="modal" data-bs-target="#imageModal" data-img="assets/images/skills/8.png">
        <p class="text-center pt-2">Intro To PHP & MYSQL </p>
      </div>

    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-body p-0">
          <img id="modalImage" src="" class="img-fluid" alt="Skill Image">
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
<?php include 'includes/footer.inc'; ?>
