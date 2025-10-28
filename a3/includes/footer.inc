<footer class="d-flex justify-content-between align-items-center px-5 footer">
  <div>
    <?php
    $sql = "SELECT user_id, username FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
      $userId = htmlspecialchars($row['user_id']);
      $username = htmlspecialchars($row['username']);
      echo '<a href="instructor.php?id=' . $userId . '" class="me-3">' . $username . '</a>';
    }

    $stmt->close();
    $conn->close();
    ?>
  </div>

  <p class="p-5 my-auto mb-0">
    &copy; 2025 SkillSwap. Tamana Ali. All Rights Reserved.
  </p>
</footer>
</body>

</html> 
