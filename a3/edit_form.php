<?php
require_once('Includes/db_connect.inc');
$title = "Update Form";
include('Includes/header.inc');
include('Includes/nav.inc');
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
    foreach ($records as $row) {
?>
     <div class="add-pet-form">   
    <form action="edit.php" method="post" enctype="multipart/form-data">
            <h2>Edit a pet</h2>
            <p>You can edit the chosen pet</p>
            <input type="hidden" name="petid" value="<?php echo $id; ?>">
            <label for="petname">Pet Name:</label>
            <input type="text" id="petname" name="petname" value=<?php echo $row['petname'] ?>>

            <label for="type">Type:</label>
            <input type="text" id="type" name="type" value=<?php echo $row['type'] ?>>

            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $row['description'] ?></textarea>

            <label for="image">Select an Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            <small>Max image size: 500px</small>

            <label for="caption">Image Caption:</label>
            <input type="text" id="caption" name="caption" value=<?php echo $row['caption'] ?>>

            <label for="age">Age (months):</label>
            <input type="number" id="age" name="age" value=<?php echo $row['age'] ?>>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value=<?php echo $row['location'] ?>>

            <div class="form-buttons">
                <button type="submit" class="submit-btn">Submit</button>
                <button type="reset" class="clear-btn">Clear</button>
            </div>
    </form>


<?php
    }
}
include('Includes/footer.inc');
?>