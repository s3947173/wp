<?php 
include('Includes/header.inc');
?>
<?php
include('Includes/nav.inc');
?>
<body>
   <main class="pet-details">
   <?php
if (!empty($_GET['petid'])) {
    include('Includes/db_connect.inc');

    $id = $_GET['petid'];
    $sql = "SELECT * FROM pets where petid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='pet-info'>";
            
            // Pet Image Section
            if (!empty($row['image'])) {
                echo "<div class='pet-image'>";
                echo "<img src='{$row['image']}' alt='{$row['petname']}'>";
                echo "</div>";
            }

            // Pet Details
            echo "<div class='pet-meta'>";
            echo "<div class='pet-age'><span class='material-symbols-outlined'>timer</span> {$row['age']} months</div>";
            echo "<div class='pet-type'><span class='material-symbols-outlined'>pets</span> {$row['type']}</div>";
            echo "<div class='pet-location'><span class='material-symbols-outlined'>place</span> {$row['location']}</div>";
            echo "</div>";

            // Pet Name & Description
            echo "<div class='pet-description'>";
            echo "<h2>{$row['petname']}</h2>";
            echo "<p>{$row['description']}</p>";
            echo "</div>";

            echo "</div>";

            echo "<td><a class='link' href='edit_form.php?id={$row['petid']}'>Edit</a></td>";
            echo "<td><a class='link' href='delete_confirm.php?id={$row['petid']}'>Delete</a></td>";
        }
    } else {
        echo "<p>No results found for this pet.</p>";
    }
} else {
    echo "<p>There are no pets to display.</p>";
}
?>

   </main>
</body>


<?php
include('Includes/footer.inc')
?>