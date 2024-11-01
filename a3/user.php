<?php
include('Includes/header.inc');
?>
<?php
include('Includes/nav.inc');
?>
<h1> Pets added </h1>
<?php
if (!empty($_GET['username'])) {
    include('Includes/db_connect.inc');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare the SQL query
    $sql = "SELECT * FROM pets WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }

    $username = $_GET['username'];
    $stmt->bind_param("s", $username);

    // Execute and get results
    $stmt->execute();
    $result = $stmt->get_result();

    // Loop through the table of results, printing each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2>{$row['petname']}</h2>";
            echo "<h3>by {$row['type']}</h3>";
            echo "<h4>Age: {$row['age']} Location: {$row['location']}</h4>";
            echo "<p>{$row['description']}</p>";
        }
    } else {
        echo "<p>No pets found for the user '{$username}'.</p>";
    }

    // Clean up
    $stmt->close();
    $conn->close();
} else {
    echo "<p>Username parameter is missing.</p>";
}
?>
<?php
include('Includes/footer.inc');
?>