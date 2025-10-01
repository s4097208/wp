<?php
$pageTitle = "Gallery - SkillSwap";
include 'includes/header.inc';
include 'includes/db_connect.inc';

$sql = "SELECT * FROM skills";
$records = $conn->query($sql);
?>

<main class="flex-grow-1 my-4 d-flex justify-content-center">
  <section class="main-container container-fluid">
    <div class="mb-4 text-center">
      <h1>Skills Gallery</h1>
      <p class="text-muted">Browse skills shared by the community</p>
    </div>

    <div class="row g-4 skills-gallery">
      <?php
      if ($records && $records->num_rows > 0) {
        foreach ($records as $row) {
          echo '<div class="col-lg-3 col-sm-6 col-12">';
          echo "<img 
                  src='assets/images/skills/" . htmlspecialchars($row['image_path']) . "' 
                  alt='" . htmlspecialchars($row['description']) . "' 
                  class='img-fluid rounded'
                  data-bs-toggle='modal' 
                  data-bs-target='#imageModal' 
                  data-img='assets/images/skills/" . htmlspecialchars($row['image_path']) . "' />";
          echo "<p class='text-center pt-2'>
                  <a href='details.php?id=" . $row['skill_id'] . "'>" 
                    . htmlspecialchars($row['title']) . 
                  "</a>
                </p>";
          echo '</div>';
        }
      } else {
        echo "<p class='text-center'>No skills available yet.</p>";
      }
      ?>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="modal-body p-0">
          <img id="modalImage" class="img-fluid" src="#" alt="Skill Image" />
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include 'includes/footer.inc'; ?>
</body>
</html>
