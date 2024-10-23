<?php
include('Includes/header.inc');
include('Includes/nav.inc');
require_once('Includes/db_connect.inc');

$error = false;
$oldimage = ''; // Initialize variable
if (!empty($_GET['petid'])) {
    $id = $_GET['petid'];

    // First query: Fetch image
    $sql = "SELECT * FROM pets WHERE petid=?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $records = $stmt->get_result();
            if ($records->num_rows > 0) {
                $row = $records->fetch_assoc();
                $oldimage = $row['image']; // Fetch the image name
            } else {
                echo "<p>No record found with the given petid.</p>";
                $error = true;
            }
        } else {
            echo "<p>Error executing SELECT query: " . $stmt->error . "</p>";
            $error = true;
        }
        $stmt->close();
    } else {
        echo "<p>Error preparing SELECT query: " . $conn->error . "</p>";
        $error = true;
    }

    // Second query: Delete the pet
    if (!$error) {
        $sql = "DELETE FROM pets WHERE petid = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    echo "<p>Record deleted</p>";
                    if (file_exists('images/' . $oldimage)) {
                        unlink('images/' . $oldimage);
                    }
                } else {
                    echo "<p>No rows affected, deletion failed.</p>";
                    $error = true;
                }
            } else {
                echo "<p>Error executing DELETE query: " . $stmt->error . "</p>";
                $error = true;
            }
            $stmt->close();
        } else {
            echo "<p>Error preparing DELETE query: " . $conn->error . "</p>";
            $error = true;
        }
    }
} else {
    echo "<p>Invalid or missing petid parameter.</p>";
    $error = true;
}

if ($error) {
    echo "<p>Record NOT deleted.</p>";
}

include('Includes/footer.inc');
?>