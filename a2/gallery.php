<?php 
include('Includes/header.inc');
?>
<body>
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
    <main>
        <div class="gallery-text">
          <h1>Pets Victoria has a lot to offer!</h1>
          <p>For almost two decades, Pets Victoria has helped in creating true social change by bringing pet adoption into the mainstream. Our work has helped make a difference to the Victorian rescue community and thousands of pets in need of rescue and rehabilitation. But, until every pet is safe, respected, and loved, we all still have big, hairy work to do.</p>
        </div>
        <div class="pets-grid">
            <div class="pet-card">
                <img src="images\images\cat1.jpeg" alt="Milo">
                <div class="overlay">
                    <a href="#">Discover more!</a>

                </div>
                <h2>Milo</h2>
            </div>
            <div class="pet-card">
                <img src="images\images\dog1.jpeg" alt="Baxter">
                <h2>Baxter</h2>
            </div>
            <div class="pet-card">
                <img src="images\images\cat2.jpeg" alt="Luna">
                <h2>Luna</h2>
            </div>
            <div class="pet-card">
                <img src="images\images\dog2.jpeg" alt="Willow">
                <h2>Willow</h2>
            </div>
            <div class="pet-card">
                <img src="images\images\cat4.jpeg" alt="Oliver">
                <h2>Oliver</h2>
            </div>
            <div class="pet-card">
                <img src="images\images\dog3.jpeg" alt="Bella">
                <h2>Bella</h2>
            </div>
        </div>
    </main>

</body>

<?php
include('Includes/footer.inc')
?>