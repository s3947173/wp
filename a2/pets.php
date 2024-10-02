<?php 
include('Includes\header.inc');
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
   <table>
        <tr>
            <th>Pet</th>
            <th>Age</th>
            <th>Location</th>
            <th>Type</th>
        </tr>
        <?php
           include("includes/db_connect.inc");
           $sql = "select * from pets";
           $result = $conn->query($sql);
           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
                   echo "<tr>
                           <td><a href='details.php?petid=" . $row['petid'] . "'>" . $row['petname'] . "</a></td>
                           <td>" . $row["age"] . "</td>
                           <td>" . $row["location"] . "</td>
                           <td>" . $row["type"] . "</td>
                         </tr>";
               }
           } else {
               echo "<tr><td colspan='4'>No pets found.</td></tr>";
           }
        ?>
                              
    </table>
    <div class="pets-text">
	  <h1>Discover Pets Victoria</h1>
      <p>PETS VICTORIA IS A DEDICATED PET ADOPTION ORGANISATION BASED IN VICTORIA, AUSTRALIA, FOCUSED ON PROVIDING A SAFE AND LOVING ENVIORNMENT FOR PETS IN NEED. WITH A 
        COMPASSIONATE APPROACH, PETS VICTORIA WORKS TIRELESSLY TO RESCUE, REHABILITATE, AND REHOME DOGS, CATS, AND OTHER ANIMALS. THEIR MISSION IS TO CONNECT THESE
        DESERVING PETS WITH CARING INDIVIDUALS AND FAMILIES, CREATING LIFELONG BONDS. THE ORGANISATION OFFERS A RANGE OF SERVICES, INCLUDING ADOPTION COUNSELING, PET 
        EDUCATION, AND COMMUNITY SUPPORT PROGRAMS, ALL AIMED AT PROMOTING RESPONSIBLE PET OWNERSHIP AND REDUCING THE NUMBER OF HOMELESS ANIMALS.
     </p>
    </div>
    <div class="pets">
	  <img src="images\images\pets.jpeg" alt="Pets">
    </div>
   </main>
</body>


<?php
$conn->close();
include('Includes\footer.inc')
?>