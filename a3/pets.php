<?php 
include('Includes/header.inc');
?>
<body>
<?php
include('Includes/nav.inc');
?>
   <main>

   <table class="table table-striped pet-table">
        <tr>
            <th>Pet</th>
            <th>Age</th>
            <th>Location</th>
            <th>Type</th>
        </tr>
        <?php
           include("Includes/db_connect.inc");
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
  
    <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center text-md-start">
            <div class="pets-text">
                <h1 class="display-4 fw-bold">Discover Pets Victoria</h1>
                <p class="lead">
                    PETS VICTORIA IS A DEDICATED PET ADOPTION ORGANISATION BASED IN VICTORIA, AUSTRALIA, FOCUSED ON PROVIDING A SAFE AND LOVING ENVIRONMENT FOR PETS IN NEED. 
                    WITH A COMPASSIONATE APPROACH, PETS VICTORIA WORKS TIRELESSLY TO RESCUE, REHABILITATE, AND REHOME DOGS, CATS, AND OTHER ANIMALS. THEIR MISSION IS TO CONNECT THESE 
                    DESERVING PETS WITH CARING INDIVIDUALS AND FAMILIES, CREATING LIFELONG BONDS. THE ORGANISATION OFFERS A RANGE OF SERVICES, INCLUDING ADOPTION COUNSELING, PET 
                    EDUCATION, AND COMMUNITY SUPPORT PROGRAMS, ALL AIMED AT PROMOTING RESPONSIBLE PET OWNERSHIP AND REDUCING THE NUMBER OF HOMELESS ANIMALS.
                </p>
            </div>
        </div>
    </div>
</div>
    <div class="pets">
	  <img src="images/pets.jpeg" class="img-fluid" alt="Pets">
    </div>
   </main>
<?php
$conn->close();
include('Includes/footer.inc')
?>
</body>
