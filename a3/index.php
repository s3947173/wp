<?php 
include('Includes/header.inc');
?>
<?php
include('Includes/nav.inc');
?>
<body>
  
   <div class="home">
    <main>
    <?php
     include('Includes/db_connect.inc');
      // Query to fetch the last 4 records based on the highest IDs
      $sql = "SELECT image FROM pets ORDER BY petid DESC LIMIT 4";
      $result = $conn->query($sql);

      $images = [];
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        $images[] = $row;
        }   
      }
      $conn->close();
    ?>
    <div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <?php for ($i = 0; $i < count($images); $i++): ?>
      <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="<?= $i ?>" class="<?= $i === 0 ? 'active' : '' ?>" aria-label="Slide <?= $i + 1 ?>"></button>
    <?php endfor; ?>
  </div>
  <div class="carousel-inner">
    <?php foreach ($images as $index => $image): ?>
      <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
      <img src="images/<?= htmlspecialchars($image['image']) ?>" class="d-block w-100">
      </div>
    <?php endforeach; ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
	 <div class="heading">
	   <h1>Pets Victoria</h1>
	   <h2>Welcome to pet 
		adoption</h2>
	 </div>	
   <div class="search-container">
    <form action="search.php" method="get">
        <!-- Keyword Search -->
        <input type="text" name="keyword" placeholder="I am looking for ..." class="search-input">
        
        <!-- Pet Type Dropdown -->
        <select name="petType" class="search-select">
            <option value="">Select your pet type</option>
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <!-- Add other pet types as needed -->
        </select>
        
        <!-- Search Button -->
        <button type="submit" class="search-button">Search</button>
    </form>
    </div>
    <div class="pets-text">
	  <h1>Discover Pets Victoria</h1>
      <p>PETS VICTORIA IS A DEDICATED PET ADOPTION ORGANISATION BASED IN VICTORIA, AUSTRALIA, FOCUSED ON PROVIDING A SAFE AND LOVING ENVIORNMENT FOR PETS IN NEED. WITH A 
        COMPASSIONATE APPROACH, PETS VICTORIA WORKS TIRELESSLY TO RESCUE, REHABILITATE, AND REHOME DOGS, CATS, AND OTHER ANIMALS. THEIR MISSION IS TO CONNECT THESE
        DESERVING PETS WITH CARING INDIVIDUALS AND FAMILIES, CREATING LIFELONG BONDS. THE ORGANISATION OFFERS A RANGE OF SERVICES, INCLUDING ADOPTION COUNSELING, PET 
        EDUCATION, AND COMMUNITY SUPPORT PROGRAMS, ALL AIMED AT PROMOTING RESPONSIBLE PET OWNERSHIP AND REDUCING THE NUMBER OF HOMELESS ANIMALS.
     </p>
    </div>
   </main>
  </div>
</body>

<?php
include('Includes/footer.inc')
?>