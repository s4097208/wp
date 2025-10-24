<?php
$pageTitle = 'Skill Details';
include 'includes/db_connect.inc';
include 'includes/header.inc';
?>

<main>
    <section class="mx-4 main-container">
        <?php
        if (!empty($_GET['id'])) {
            $sql = "SELECT s.*, u.username, u.bio 
                    FROM skills s
                    LEFT JOIN users u ON s.user_id = u.user_id
                    WHERE s.skill_id = ?";
            $stmt = $conn->prepare($sql);
            $id = $_GET['id'];
            $stmt->bind_param("i", $id);

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) { ?>

                    <h2><?= htmlspecialchars($row['title']) ?></h2>

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

                    <hr>

                    <?php if (!empty($row['username'])) { ?>
                        <div>
                            <p class="category">Instructor: <?= htmlspecialchars($row['username']) ?></p>
                            <p><?= htmlspecialchars($row['bio'] ?? '') ?></p>
                        </div>
                    <?php } ?>

                    <?php if (isset($_GET['message'])) { ?>
                        <div class="alert alert-success mb-3">
                            <?= htmlspecialchars($_GET['message']) ?>
                        </div>
                    <?php } ?>

                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $row['user_id']): ?>
                        <div class="my-4">
                            <a href="edit.php?id=<?= $row['skill_id'] ?>" class="btn btn-warning">Edit Skill</a>
                            <button type="button" class="btn btn-danger ms-1" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Delete Skill
                            </button>
                        </div>
                    <?php endif; ?>

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

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to permanently delete
                                        <strong><?= htmlspecialchars($row['title'], ENT_QUOTES) ?></strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="delete.php?id=<?= $row['skill_id'] ?>" class="btn btn-danger">Yes, Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

        <?php
                }
            } else {
                echo "<p>No skill found.</p>";
            }
        } else {
            echo "<p>No skill ID provided.</p>";
        }
        ?>
    </section>
</main>

<?php include 'includes/footer.inc'; ?>
