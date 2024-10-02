<?php 
include('Includes/header.inc');
?>
<body>
   <header>
	<div class="search">
		<input type="text" placeholder="Search">
	</div>
    <div class="logo">
		<img src="images\images\logo.png" alt="Logo">
	</div>
    <div class="Icon">
        <span class="material-symbols-outlined">search</span>
     </div>
    <div class="dropdown">
		<form>
			<select id="menu" onchange=doMenu();>
				<option value="">Select an Option...</option>
				<option value="index.php">Index</option>
				<option value="pets.php">Pets</option>
				<option value="add.php">Add</option>
				<option value="gallery.php">Gallery</option>
			</select>
		</form>
	</div>
   </header>
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
$conn->close();
include('Includes/footer.inc')
?>