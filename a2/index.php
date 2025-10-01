<?php
$pageTitle = 'Home - SkillSwap';
include 'includes/header.inc';

?>

  <!-- Title -->
  <div class="container mt-4">
    <h2>SkillSwap</h2>
    <p class="text-muted">Browse the latest skills shared by our community.</p>
  </div>

  <!-- Carousel -->
  <div class="container my-4">
    <div id="skillCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner rounded">
        <div class="carousel-item active">
          <img src="assets/images/skills/4.png" class="img-fluid d-block mx-auto" alt="French Pastry Making">
          <div class="carousel-caption d-none d-md-block">
            <h5>French Pastry Making</h5>
          </div>
        </div>
    
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#skillCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#skillCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>

   
  <div class="container mb-5">
    <div class="row text-center gy-4">
      <div class="col-md-3">
        <div class="skill-title">Intro to PHP & MySQL</div>
        <div class="skill-rate">Rate: $55.00/hr</div>
        <button class="btn btn-view">View Details</button>
      </div>
      <div class="col-md-3">
        <div class="skill-title">Intermediate Fingerstyle</div>
        <div class="skill-rate">Rate: $45.00/hr</div>
        <button class="btn btn-view">View Details</button>
      </div>
      <div class="col-md-3">
        <div class="skill-title">Artisan Bread Baking</div>
        <div class="skill-rate">Rate: $25.00/hr</div>
        <button class="btn btn-view">View Details</button>
      </div>
      <div class="col-md-3">
        <div class="skill-title">French Pastry Making</div>
        <div class="skill-rate">Rate: $50.00/hr</div>
        <button class="btn btn-view">View Details</button>
      </div>
    </div>
  </div>
<?php include 'includes/footer.inc'; ?>





