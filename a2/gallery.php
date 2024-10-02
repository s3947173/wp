<?php 
include('Includes/header.inc');
?>
<?php
include('Includes/nav.inc');
?>
<body>
    <main> 
    <div class="gallery-text">
          <h1>Pets Victoria has a lot to offer!</h1>
          <p>For almost two decades, Pets Victoria has helped in creating true social change by bringing pet adoption into the mainstream. Our work has helped make a difference to the Victorian rescue community and thousands of pets in need of rescue and rehabilitation. But, until every pet is safe, respected, and loved, we all still have big, hairy work to do.</p>
    </div>`
    <div class="pets-grid">
    <?php
    include('Includes/db_connect.inc');
    $sql = "select * from pets";
    $result = $conn->query($sql);  
            
            if ($result->num_rows > 0) {
                // Output data for each pet
                while($row = $result->fetch_assoc()) {
                    echo '<div class="pet-card">';
                    echo '<img src="' . $row["image"] . '" alt="' . $row["petname"] . '">';
                    echo '<div class="overlay">';
                    echo '<a href="details.php?petid=' . $row["petid"] . '">Discover more!</a>';
                    echo '</div>';
                    echo '<h2>' . $row["petname"] . '</h2>';
                    echo '</div>';
                }
            } else {
                echo "No pets found.";
            }
            
        
    ?>
    </div>
    </main>
</body>

<?php
$conn->close();
include('Includes/footer.inc')
?>