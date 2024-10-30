<!-- footer.inc -->
<footer>
      <?php
        include("Includes/db_connect.inc"); // Include your database connection file

        // Query to get all usernames
        $sql = "SELECT username FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Loop through each user and create a link
            while($row = $result->fetch_assoc()) {
                echo "<a href='user.php?username=" . urlencode($row['username']) . "'>" . htmlspecialchars($row['username']) . "</a> ";
            }
        } 
        ?>
    <p>&copy;Copyright s3947173. All Rights Reserved | Designed for Pets Victoria</p>
</footer>
<!-- end of footer.inc -->