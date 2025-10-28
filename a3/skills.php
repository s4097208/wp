<?php
$pageTitle = "All Skills - SkillSwap";
include 'includes/header.inc';
include 'includes/db_connect.inc';

$sql = "SELECT s.*, u.username 
        FROM skills s
        LEFT JOIN users u ON s.user_id = u.user_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->get_result();
?>

<main>
  <!-- All Skills Section -->
  <div class="container my-5">
    <h2 class="mb-4">All Skills</h2>
    <div class="row">
      <!-- Banner Image -->
      <div class="col-md-4">
        <img src="assets/images/skills_banner.png" alt="Skills Illustration" class="img-fluid rounded">
      </div>
  
      <!-- Skills Table -->
      <div class="col-md-8">
        <div class="table-responsive">
          <table class="table table-striped table-bordered skills-table">
            <thead>
              <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Level</th>
                <th>Rate ($/hr)</th>
                <th>Instructor</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($records && $records->num_rows > 0) {
                foreach ($records as $row) {
                  $instructorName = htmlspecialchars($row['username']);
                  $instructorId = htmlspecialchars($row['user_id']);
                  echo "<tr>";
                  echo "<td><a href='details.php?id=" . $row['skill_id'] . "'>" . htmlspecialchars($row['title']) . "</a></td>";
                  echo "<td>" . htmlspecialchars($row['category']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['level']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['rate_per_hr']) . "</td>";
                  echo "<td><a href='instructor.php?id=" . $instructorId . "'>" . $instructorName . "</a></td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='4' class='text-center'>No skills available</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include 'includes/footer.inc'; ?>
