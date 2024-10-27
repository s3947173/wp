<?php
// Start the session and enable error reporting
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('Includes/header.inc');
include('Includes/nav.inc');
include('Includes/db_connect.inc');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo "<p>You must be logged in to access this page.</p>";
    include('Includes/footer.inc');
    exit();
}

echo "<div id='message'>";

// Initialize error tracking
$error = false;

if (!empty($_POST['petid'])) {

    // Sanitize input
    foreach ($_POST as $key => $val) {
        $$key = trim($val);
    }

    // Debugging output for file upload information
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    // Correcting image file key
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
    } else {
        $image = "";
    }

    // Prepare the select statement to fetch the old record
    $sql = "SELECT * FROM pets WHERE petid=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        exit("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $petid);
    $stmt->execute();
    $records = $stmt->get_result();
    if ($records->num_rows > 0) {
        foreach ($records as $row) {
            $petname = $row['petname'];
            $oldimage = $row['image'];
        }
    } else {
        exit("No record found with petid: " . $petid);
    }

    // Keep the old image if no new image is uploaded
    if (empty($image)) {
        $image = $oldimage;
    }

    // Debugging output to check values before SQL execution
    echo "Image: $image, Old Image: $oldimage";

    // Prepare the update statement
    $sql = "UPDATE pets SET petname=?, type=?, description=?, image=?, caption=?, age=?, location=? WHERE petid=?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        exit("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    if (!$stmt->bind_param("sssssssi", $petname, $type, $description, $image, $caption, $age, $location, $petid)) {
        exit("Binding failed: " . $stmt->error);
    }

    // Execute statement
    $stmt->execute();

    // Check if the query was successful
    if ($stmt->affected_rows > 0) {
        echo "<p>Record $petname updated<p>";

        // Handle image file move and deletion
        if ($oldimage != $image && !empty($image)) {
            // Delete old image
            if (file_exists('images/' . $oldimage)) {
                unlink('images/' . $oldimage);
            }

            // Upload new image
            if (move_uploaded_file($temp, 'images/' . $image)) {
                echo "Image moved to folder";
            } else {
                echo "Image not moved to folder. Temp: $temp";
            }
        }
    } else {
        echo "<p>Record NOT updated<p>";
        $error = true;
    }
} else {
    echo "<p>No pet ID provided<p>";
    $error = true;
}

echo "</div>";
include('Includes/footer.inc');
?>