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
        <img src="<?= htmlspecialchars($image['image']) ?>" class="d-block w-100">
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
   </main>
  </div>
</body>

<?php
include('Includes/footer.inc')
?>