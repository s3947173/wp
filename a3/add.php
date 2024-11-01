<?php 
include('Includes/header.inc');
?>
<body>
<?php
include('Includes/nav.inc');
?>  
<?php
if (!isset($_SESSION['username'])) {
    echo "<p>You must be logged in to access this page.</p>";
    include('Includes/footer.inc');
    exit();
}
?>
    <div class="add-pet-form">   
    <form action="process_form.php" method="post" enctype="multipart/form-data">
            <h2>Add a pet</h2>
            <p>You can add a new pet here</p>
            <div class="mb-3 mt-3">
              <label for="petname">Pet Name:</label>
              <input type="text" id="petname" name="petname" placeholder="Provide a name for the pet" class="form-control w-50" required>
            </div>
            <div class="mb-3">
              <label for="type">Type:</label>
              <input type="text" id="type" name="type" placeholder="Provide type" class="form-control w-50" required>
            </div>
            <div class="mb-3">
              <label for="description">Description:</label>
              <textarea id="description" name="description" placeholder="Describe the pet briefly" class="form-control w-50" required></textarea>
            </div>
            <div class="mb-3">
              <label for="image">Select an Image:</label>
              <input type="file" id="image" name="image" accept="image/*"  class="form-control w-50" required>
              <small>Max image size: 500px</small>
            </div>
            <div class="mb-3">
              <label for="caption">Image Caption:</label>
              <input type="text" id="caption" name="caption" placeholder="Describe the image in one word"  class="form-control w-50" required>
            </div>
            <div class="mb-3">
              <label for="age">Age (months):</label>
              <input type="number" id="age" name="age" placeholder="Age of a pet in months"  class="form-control w-50" required>
            </div>
            <div class="mb-3">
              <label for="location">Location:</label>
              <input type="text" id="location" name="location" placeholder="Location of the pet"  class="form-control w-50" required>
            </div>
            <div class="mb-3">
                <div class="form-buttons">
                    <button type="submit" class="submit-btn">Submit</button>
                    <button type="reset" class="clear-btn">Clear</button>
                </div>
            </div>
    </form>
    </div>
<?php
include('Includes/footer.inc')
?>
</body>
