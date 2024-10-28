<?php
require_once('includes/db_connect.inc');
$title = "Delete Confirmation";
include('includes/header.inc');
include('includes/nav.inc');

session_start();
if (!isset($_SESSION['username'])) {
    echo "<p>You must be logged in to access this page.</p>";
    include('Includes/footer.inc');
    exit();
}

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from pets where petid=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        exit("prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $records = $stmt->get_result();
    if ($records->num_rows > 0) {
        foreach ($records as $row) {
            echo "<div class='details'>";
            echo "<h2>Are you sure you want to delete this record?</h2>";
            echo "<h3>{$row['petname']}</h3>";
            echo "<p>{$row['description']}</p>";
            echo "<img src='images/{$row['image']}' alt='{$row['caption']}' class='delete-img'>";
            echo "<p class='confirm'>";
            echo "<a href='pets.php'>Cancel</a>";
            // encode url to make html valid
            $imagename = urldecode("images/{$row['image']}");
            echo "<a href='delete.php?petid={$row['petid']}'>Delete</a>";
            echo "</p>";
            echo '</div>';
        }
    }
}
include('includes/footer.inc');
?>