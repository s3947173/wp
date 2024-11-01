<?php
require_once('Includes/db_connect.inc');
$title = "Update Form";
include('Includes/header.inc');
include('Includes/nav.inc');


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
    foreach ($records as $row) {
?>
     <div class="add-pet-form">   
    <form action="edit.php" method="post" enctype="multipart/form-data">
            <h2>Edit a pet</h2>
            <p>You can edit the chosen pet</p>
            <div class="mb-3 mt-3">
              <input type="hidden" name="petid" value="<?php echo $id; ?>">
              <label for="petname">Pet Name:</label>
              <input type="text" id="petname" name="petname" class="form-control w-50" value=<?php echo $row['petname'] ?>>
            </div>
            <div class="mb-3">
              <label for="type">Type:</label>
              <input type="text" id="type" name="type" class="form-control w-50" value=<?php echo $row['type'] ?>>
            </div>
            <div class="mb-3">
              <label for="description">Description:</label>
              <textarea id="description" name="description" class="form-control w-50"><?php echo $row['description'] ?></textarea>
            </div>
            <div class="mb-3">
              <label for="image">Select an Image:</label>
              <input type="file" id="image" name="image" accept="image/*" class="form-control w-50" required>
              <small>Max image size: 500px</small>
            </div>
            <div class="mb-3">
              <label for="caption">Image Caption:</label>
              <input type="text" id="caption" name="caption" class="form-control w-50" value=<?php echo $row['caption'] ?>>
            </div>
            <div class="mb-3">
              <label for="age">Age (months):</label>
              <input type="number" id="age" name="age" class="form-control w-50" value=<?php echo $row['age'] ?>>
            </div>
            <div class="mb-3">
              <label for="location">Location:</label>
              <input type="text" id="location" name="location" class="form-control w-50" value=<?php echo $row['location'] ?>>
            </div>
            <div class="mb-3">
                <div class="form-buttons">
                    <button type="submit" class="submit-btn">Submit</button>
                    <button type="reset" class="clear-btn">Clear</button>
                </div>
            </div>
    </form>


<?php
    }
}
include('Includes/footer.inc');
?>