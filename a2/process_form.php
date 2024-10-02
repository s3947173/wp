<?php

include('Includes/header.inc');
?>
<?php
include('Includes/nav.inc');
?>
<?php
//can print what is in $_FILES array
//var_dump($_FILES);
include('Includes/db_connect.inc');

$petname = $_POST['petname'];
$type = $_POST['type'];
$description = $_POST['description'];
$image = str_replace(' ', '', $_FILES["image"]["name"]);
$caption = $_POST['caption'];
$age = $_POST['age'];
$location = $_POST['location'];

$stmt = $conn->prepare('insert into pets (petname, type, description, image, caption, age, location) values (?, ?, ?, ?, ?, ?, ?)');
$stmt->bind_param("sssssss", $petname, $type, $description, $image, $caption, $age, $location);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    echo "A new pet has been added";
    move_uploaded_file($_FILES["image"]["tmp_name"], $_FILES["image"]["name"]);
}
?>
<br><a href="pets.php">Back to list of pets</a>
<?php
include('Includes/footer.inc');
?>