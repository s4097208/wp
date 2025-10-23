<?php
$pageTitle = "Login";
include 'includes/header.inc';
?>

<main>
  <!-- Title -->
  <div class="container py-5">
    <h2 class="mb-4">Login</h2>

    <div class="login-form">
      <form action="process_login.php" method="POST">
        <div class="mb-3">
          <label for="identifier" class="form-label">Username or Email <span class="required">*</span></label>
          <input 
            type="text" 
            class="form-control" 
            name="identifier" 
            id="identifier" 
            placeholder="Enter your username or email" 
            required
          >
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password <span class="required">*</span></label>
          <input 
            type="password" 
            class="form-control" 
            name="password" 
            id="password" 
            placeholder="Enter your password" 
            required
          >
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
</main>

<?php include 'includes/footer.inc'; ?>
