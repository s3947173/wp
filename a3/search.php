<?php
include('Includes/header.inc');
?>
<?php
include('Includes/nav.inc');
?>
<?php
include('Includes/db_connect.inc');

// Initialize variables for search inputs
$keyword = isset($_GET['keyword']) ? '%' . $_GET['keyword'] . '%' : '%';
$petType = isset($_GET['petType']) ? $_GET['petType'] : '';

// Prepare SQL query based on inputs
$sql = "SELECT * FROM pets WHERE (petname LIKE ? OR description LIKE ?)";
$params = [$keyword, $keyword];

if ($petType) {
    $sql .= " AND type = ?";
    $params[] = $petType;
}

$stmt = $conn->prepare($sql);

if ($petType) {
    $stmt->bind_param("sss", $params[0], $params[1], $params[2]);
} else {
    $stmt->bind_param("ss", $params[0], $params[1]);
}

$stmt->execute();
$result = $stmt->get_result();

// Display results
if ($result->num_rows > 0) {
    while ($pet = $result->fetch_assoc()) {
        echo "<div class='pet-info'>";
            
            // Pet Image Section
            if (!empty($pet['image'])) {
                echo "<div class='pet-image'>";
                echo "<img src='images/{$pet['image']}' alt='{$pet['petname']}'>";
                echo "</div>";
            }

            // Pet Details
            echo "<div class='pet-meta'>";
            echo "<div class='pet-age'><span class='material-symbols-outlined'>timer</span> {$pet['age']} months</div>";
            echo "<div class='pet-type'><span class='material-symbols-outlined'>pets</span> {$pet['type']}</div>";
            echo "<div class='pet-location'><span class='material-symbols-outlined'>place</span> {$pet['location']}</div>";
            echo "</div>";

            // Pet Name & Description
            echo "<div class='pet-description'>";
            echo "<h2>{$pet['petname']}</h2>";
            echo "<p>{$pet['description']}</p>";
            echo "</div>";

            echo "</div>";
    }
} else {
    echo "<p>No results found.</p>";
}
?>
<?php
include('Includes/footer.inc');
?>