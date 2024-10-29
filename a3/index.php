<?php 
include('Includes/header.inc');
?>
<?php
include('Includes/nav.inc');
?>
<body>
   <div class="home">
    <main>
    <div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/cat1.jpeg" class="d-block w-100" alt="Milo">
    </div>
    <div class="carousel-item">
      <img src="images/dog1.jpeg" class="d-block w-100" alt="Dog 1 ">
    </div>
    <div class="carousel-item">
      <img src="images/cat2.jpeg" class="d-block w-100" alt="Cat 2">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
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