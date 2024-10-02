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
   <div class="home">
    <main>
	 <div class="heading">
	   <h1>Pets Victoria</h1>
	   <h2>Welcome to pet 
		adoption</h2>
	 </div>	
	<div class="index">
	    <img src="images\images\main.jpg" alt="A dog and a Cat">
	</div>
   </main>
  </div>
</body>

<?php
include('Includes/footer.inc')
?>