<?php
include('Includes/header.inc');
?>
<?php
include('Includes/nav.inc');
?>
<?php
include('Includes/db_connect.inc');

// Get the pet type from the query string, if any
$type = isset($_GET['type']) ? $_GET['type'] : '';

// Prepare the SQL query based on the selected type
if ($type) {
    $stmt = $conn->prepare("SELECT * FROM pets WHERE type = ?");
    $stmt->bind_param("s", $type);
} else {
    $stmt = $conn->prepare("SELECT * FROM pets");
}
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">';
        echo '<div class="pet-card">';
        echo '<img src="' . $row["image"] . '" alt="' . $row["petname"] . '">';
        echo '<div class="overlay">';
        echo '<a href="details.php?petid=' . $row["petid"] . '" class="text-white">Discover more!</a>';
        echo '</div>';
        echo '<h2>' . $row["petname"] . '</h2>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p class="text-center">No pets found for this type.</p>';
}

$stmt->close();
$conn->close();
?>
<?php
include('Includes/footer.inc');
?>