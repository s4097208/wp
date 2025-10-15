<?php
$pageTitle = 'Home - SkillSwap';
include 'includes/header.inc';
include 'includes/db_connect.inc';

// get the latest 4 skills from the database
$sql = "SELECT * FROM skills ORDER BY skill_id DESC LIMIT 4";
$records = $conn->query($sql);

// store skills in array
$skills = [];
if ($records && $records->num_rows > 0) {
  while ($row = $records->fetch_assoc()) {
    $skills[] = $row;
  }
}
?>

<main>
  <!-- Title -->
  <div class="container mt-4">
    <h2>SkillSwap</h2>
    <p class="text-muted">Browse the latest skills shared by our community.</p>
  </div>
  
  <!-- Carousel -->
  <div class="container my-4">
    <div id="skillCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner rounded">
        <?php if (!empty($skills)): ?>
          <?php foreach ($skills as $index => $skill): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
              <img src="assets/images/skills/<?php echo htmlspecialchars($skill['image_path']) ?>"
                   class="img-fluid d-block mx-auto"
                   alt="<?php echo htmlspecialchars($skill['title']) ?>">
              <div class="carousel-caption d-none d-md-block">
                <h5><?php echo htmlspecialchars($skill['title']) ?></h5>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="carousel-item active">
            <img src="assets/images/skills/default.png" class="img-fluid d-block mx-auto" alt="No Skills Yet">
            <div class="carousel-caption d-none d-md-block">
              <h5>No Skills Available</h5>
            </div>
          </div>
        <?php endif; ?>
      </div>
  
      <button class="carousel-control-prev" type="button" data-bs-target="#skillCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#skillCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
  
  <!-- Latest Skills -->
  <div class="container mb-5">
    <div class="row text-center gy-4">
      <?php if (!empty($skills)): ?>
        <?php foreach ($skills as $skill): ?>
          <div class="col-md-3">
            <div class="skill-title"><?= htmlspecialchars($skill['title']) ?></div>
            <div class="skill-rate">Rate: $<?= number_format($skill['rate_per_hr'], 2) ?>/hr</div>
          <a class="Details" href="details.php?id=<?php echo urlencode($skill['skill_id']); ?>">
                View Details
              </a>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-muted">No skills available right now. Please check back later.</p>
      <?php endif; ?>
    </div>
  </div>
</main>

<?php include 'includes/footer.inc'; ?>






