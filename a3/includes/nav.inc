
  <!-- Navigation -->
<nav class="navbar navbar-expand-lg px-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="assets/images/SkillSwap_logo.png" alt="Logo" />
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <!-- Left side -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link<?= ($pageTitle == 'Home') ? ' active' : '' ?>" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?= ($pageTitle == 'All Skills') ? ' active' : '' ?>" href="skills.php">All Skills</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?= ($pageTitle == 'Gallery') ? ' active' : '' ?>" href="gallery.php">Gallery</a>
        </li>
        <?php if (isset($_SESSION['user_id'])) { ?>
          <li class="nav-item">
            <a class="nav-link<?= ($pageTitle == 'Add Skill') ? ' active' : '' ?>" href="add.php">Add Skill</a>
          </li>
        <?php } ?>
      </ul>

      <!-- Right side -->
      <ul class="navbar-nav ms-auto">
        <?php
        if (isset($_SESSION['user_id'])) {
          // Fetch username safely
          $sql = "SELECT username FROM users WHERE user_id = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("i", $_SESSION['user_id']);
          $stmt->execute();
          $result = $stmt->get_result();
          $username = '';
          $userId = $_SESSION['user_id'];
          if ($row = $result->fetch_assoc()) {
            $username = htmlspecialchars($row['username']);
          }
          $stmt->close();
        ?>
          <li class="nav-item">
            <a href="instructor.php?id=<?= $userId ?>" class="nav-link">Hello, <?= $username ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link<?= ($pageTitle == 'Register') ? ' active' : '' ?>" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link<?= ($pageTitle == 'Login') ? ' active' : '' ?>" href="login.php">Login</a>
          </li>
        <?php } ?>
      </ul>

      <!-- Search -->
      <form class="d-flex ms-lg-3" action="search.php" method="GET" role="search">
  <div class="position-relative w-100">
    <span class="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y ms-2 text-muted">
      search
    </span>
    <input 
      class="form-control ps-5 search-box" 
      type="search" 
      name="query" 
      placeholder="Search skills" 
      aria-label="Search"
    >
  </div>
</form>


<!-- Alerts -->
<?php if (isset($_SESSION['message'])) { ?>
  <div class="alert alert-success alert-dismissible fade show m-3">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong>
    <?= $_SESSION['message']; unset($_SESSION['message']); ?>
  </div>
<?php } ?>

<?php if (isset($_SESSION['error'])) { ?>
  <div class="alert alert-danger alert-dismissible fade show m-3">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Error!</strong>
    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
  </div>
<?php } ?>
