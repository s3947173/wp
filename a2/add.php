<?php 
include('Includes/header.inc');
?>
<body>
    <div class="container">
        <header>
            <div class="search">
                <input type="text" placeholder="Search">
            </div>
            <div class="logo">
                <img src="images\images\logo.png" alt="Logo">
            </div>
            <div class="Icon">
                <span class="material-symbols-outlined">search</span>
             </div>
            <div class="dropdown">
                <form>
                    <select id="menu" onchange=doMenu();>
                        <option value="">Select an Option...</option>
                        <option value="index.php">Index</option>
                        <option value="pets.php">Pets</option>
                        <option value="add.php">Add</option>
                        <option value="gallery.php">Gallery</option>
                    </select>
                </form>
            </div>
        </header>
    <div class="add-pet-form">   
    <form action="process_form.php" method="post" enctype="multipart/form-data">
            <h2>Add a pet</h2>
            <p>You can add a new pet here</p>

            <label for="petname">Pet Name:</label>
            <input type="text" id="petname" name="petname" placeholder="Provide a name for the pet" required>

            <label for="type">Type:</label>
            <input type="text" id="type" name="type" placeholder="Provide type" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" placeholder="Describe the pet briefly" required></textarea>

            <label for="image">Select an Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            <small>Max image size: 500px</small>

            <label for="caption">Image Caption:</label>
            <input type="text" id="image-caption" name="image-caption" placeholder="Describe the image in one word" required>

            <label for="age">Age (months):</label>
            <input type="number" id="age" name="age" placeholder="Age of a pet in months" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" placeholder="Location of the pet" required>

            <div class="form-buttons">
                <button type="submit" class="submit-btn">Submit</button>
                <button type="reset" class="clear-btn">Clear</button>
            </div>
    </form>
    </div>
</body>

<?php
include('Includes/footer.inc')
?>