<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SkillSwap</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Ysabeau+SC:wght@1..1000&display=swap" rel="stylesheet" />
   <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg px-4">
    <a class="navbar-brand" href="index.html">
            <img src="assets/images/SkillSwap_logo.png" alt="Logo" />
          </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="skills.html">All Skills</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="add.html">Add Skill</a></li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control search-box" type="search" placeholder="Search skills..." aria-label="Search">
      </form>
    </div>
  </nav>

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

  <!-- Footer -->
  <div class="footer">
    <p class="footer-text mb-0">© 2025 Tamana Ali. All rights reserved.</p>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





