<?php
$title = "Delete Record";
include('Includes/header.inc');
include('Includes/nav.inc');
require_once('Includes/db_connect.inc');

$error = false;
if (!empty($_GET['petid'])) {
    $id = $_GET['petid'];
    $sql = "select * from pets where petid=?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $records = $stmt->get_result();
    if ($records->num_rows > 0) {
        foreach ($records as $row) {
            $oldimage = $row['image'];
        }
    }
    $sql = "delete from pets where petid = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "<p>Record deleted</p>";
        if (file_exists('images/' . $oldimage)) {
            unlink('images/' . $oldimage);
        }
    } else {
        $error = true;
    }
} else {
    $error = true;
}
if ($error) {
    echo "<p>Record NOT deleted<p>";
}
include('Includes/footer.inc');
