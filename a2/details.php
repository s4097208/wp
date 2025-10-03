<?php
$pageTitle = 'Skill Details';
include 'includes/db_connect.inc';
include 'includes/header.inc';
?>

<main>
    <section class="mx-4 main-container">
        <?php
        if (!empty($_GET['id'])) {
            $sql = "SELECT * FROM skills WHERE skill_id = ?";
            $stmt = $conn->prepare($sql);
            $id = $_GET['id'];
            $stmt->bind_param("i", $id);

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) { ?>

                    <h1><?= htmlspecialchars($row['title']) ?></h1>

                    <div class="mb-3">
                        <img class="img-fluid img-thumbnail"
                            src="assets/images/skills/<?= htmlspecialchars($row['image_path']) ?>"
                            alt="<?= htmlspecialchars($row['description']) ?>"
                            data-bs-toggle="modal"
                            data-bs-target="#imageModal">
                    </div>

                    <p><?= htmlspecialchars($row['description']) ?></p>

                    <p><span class="category">Category: </span><?= htmlspecialchars($row['category']) ?></p>

                    <p><span class="category">Level: </span><?= htmlspecialchars($row['level']) ?></p>


                    <p><span class="category">Rate: </span>$<?= htmlspecialchars($row['rate_per_hr']) ?>/hour</p>

                    <!-- Modal for full-size image -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <img id="modalImage"
                                        class="img-fluid"
                                        src="#"
                                        alt="<?= htmlspecialchars($row['title'], ENT_QUOTES) ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

        <?php
                }
            } else {
                echo "<p>No skill found.</p>";
            }
            $conn->close();
        } else {
            echo "<p>No skill ID provided.</p>";
        }
        ?>
    </section>
</main>

<?php include 'includes/footer.inc'; ?>
