<?php
require_once 'includes/db_connect.inc';
$pageTitle = 'Search Results';
require_once 'includes/header.inc';
?>

<main>

    <div class="container my-5">
        <?php
        if (!empty($_GET['query'])) {
            $searchTerm = trim($_GET['query']);
            $search = htmlspecialchars($searchTerm);

            echo "<h2 class='mb-4'>Search Results for: <span>{$search}</span></h2>";

            $sqlSearch = "SELECT s.skill_id, s.title, s.rate_per_hr, s.image_path, u.bio
                      FROM skills s
                      JOIN users u ON s.user_id = u.user_id
                      WHERE LOWER(s.title) LIKE LOWER(CONCAT('%', ?, '%'))
                         OR LOWER(s.description) LIKE LOWER(CONCAT('%', ?, '%'))
                         OR LOWER(u.bio) LIKE LOWER(CONCAT('%', ?, '%'))";

            $stmt = $conn->prepare($sqlSearch);
            $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';
                while ($row = $result->fetch_assoc()) {
                    $skillId = htmlspecialchars($row['skill_id']);
                    $title = htmlspecialchars($row['title']);
                    $rate = htmlspecialchars($row['rate_per_hr']);
                    $imagePath = htmlspecialchars($row['image_path']);
                    ?>

                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="assets/images/skills/<?= $imagePath ?>" class="card-img-top" alt="<?= $title ?>">
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title mb-2"><?= $title ?></h6>
                                <p class="card-text mb-3">Rate: $<?= $rate ?>/hr</p>
                                <div class="mt-auto">
                                    <a href="details.php?id=<?= $skillId ?>" class="btn-view">View</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                echo '</div>';
            } else {
                echo "<p class='text-muted'>No skills found matching your search.</p>";
            }

            $stmt->close();
        } else {
            echo "<h2 class='mb-4'>Search Results</h2>";
            echo "<p class='text-muted'>Please enter a search term to find skills.</p>";
        }
        ?>
    </div>
</main>

<?php require_once 'includes/footer.inc'; ?>