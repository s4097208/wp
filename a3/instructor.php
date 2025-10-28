<?php
$pageTitle = 'Instructor Details';
include 'includes/db_connect.inc';
include 'includes/header.inc';
?>

<main>
    <section class="mx-4 main-container">
        <?php
        if (!empty($_GET['id'])) {
            $instructor_id = $_GET['id'];

            // Fetch instructor information
            $sqlInstructor = "SELECT username, bio FROM users WHERE user_id = ?";
            $stmt = $conn->prepare($sqlInstructor);
            $stmt->bind_param("i", $instructor_id);
            $stmt->execute();
            $instructorResult = $stmt->get_result();

            if ($instructorResult->num_rows > 0) {
                $instructor = $instructorResult->fetch_assoc();
                $username = htmlspecialchars($instructor['username'] ?? '');
                $bio = htmlspecialchars($instructor['bio'] ?? '');
                ?>

                <h2>Instructor: <?= $username ?></h2>
                <p class="mb-4"><?= $bio ?></p>
                <h2 class="mb-3">Skills Offered</h2>

                <?php
                // Fetch instructor's skills
                $sqlSkills = "SELECT skill_id, title, rate_per_hr, image_path, category, level 
                              FROM skills WHERE user_id = ?";
                $stmt = $conn->prepare($sqlSkills);
                $stmt->bind_param("i", $instructor_id);
                $stmt->execute();
                $skillsResult = $stmt->get_result();

                if ($skillsResult->num_rows > 0) {
                    echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';
                    while ($row = $skillsResult->fetch_assoc()) {
                        $skillId = htmlspecialchars($row['skill_id']);
                        $title = htmlspecialchars($row['title']);
                        $rate = htmlspecialchars($row['rate_per_hr']);
                        $category = htmlspecialchars($row['category']);
                        $level = htmlspecialchars($row['level']);
                        $imagePath = htmlspecialchars($row['image_path']);
                        ?>

                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <img class="card-img-top "
                                     src="assets/images/skills/<?= $imagePath ?>"
                                     alt="<?= $title ?>">
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title"><?= $title ?></h6>
                                    <p class="card-text">Category: <?= $category ?></p>
                                    <p class="card-text">Level: <?= $level ?></p>
                                    <p class="card-text">Rate: $<?= $rate ?>/hr</p>
                                    <div class="mt-auto">
                                        <a href="details.php?id=<?= $skillId ?>" class="btn-view">View Skill</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    echo '</div>';
                } else {
                    echo "<p>No skills found for this instructor.</p>";
                }
            } else {
                echo "<p>Instructor not found.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>No instructor ID provided.</p>";
        }
        ?>
    </section>
</main>

<?php include 'includes/footer.inc'; ?>
