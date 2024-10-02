<?php
if (!empty($_GET['petid'])) {

    include('includes/db_connect.inc');

    $id = $_GET['petid'];
    $sql = "SELECT * FROM pets where petid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            print "<div>";
            print "<span class='petid'>" . $row['petid'] . " </span>";
            print "<span class='age'>" . $row['age'] . " </span>";
            print $row['location'] . " ";
            print $row['type'];
            print "</div>";
            if (!empty($row['image'])) {
                print "<div>";
                print "<img src='uploads/{$row['image']}' alt='{$row['petname']}'>";
                print "</div>";
            }
        }
    } else {
        echo "0 results";
    }
} else {
    echo "There are no pets to display";
}
?>