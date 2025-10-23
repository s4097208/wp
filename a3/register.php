<?php
$pageTitle = "Register";
include 'includes/header.inc';
?>

<main>
  <!-- Title -->
  <div class="container py-5">
    <h2 class="mb-4">Register</h2>

    <div class="register-form">
      <form action="process_register.php" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Username <span class="required">*</span></label>
          <input 
            type="text" 
            class="form-control" 
            name="username" 
            id="username" 
            placeholder="Choose a username" 
            required
          >
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email <span class="required">*</span></label>
          <input 
            type="email" 
            class="form-control" 
            name="email" 
            id="email" 
            placeholder="Enter your email address" 
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
            placeholder="Create a password" 
            required
          >
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
      </form>
    </div>
  </div>
</main>

<?php include 'includes/footer.inc'; ?>
