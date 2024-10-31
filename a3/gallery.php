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
        </div>
        <div class="container mb-4">
            <select id="type" class="form-select" onchange="filterPets()">
                <option value="">All types...</option>
                <?php
                include('Includes/db_connect.inc');
                $typesQuery = "SELECT DISTINCT type FROM pets";
                $typesResult = $conn->query($typesQuery);
                
                if ($typesResult->num_rows > 0) {
                    while($typeRow = $typesResult->fetch_assoc()) {
                        echo '<option value="' . $typeRow["type"] . '">' . ucfirst($typeRow["type"]) . '</option>';
                    }
                }
                ?>
            </select>
        </div>

        <div class="container">
            <div class="row">
                <?php
                include('Includes/db_connect.inc');
                $sql = "SELECT * FROM pets";
                $result = $conn->query($sql);  
                        
                if ($result->num_rows > 0) {
                    // Output data for each pet
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">';
                        echo '<div class="pet-card">';
                        echo '<img src="' . $row["image"] . '" alt="' . $row["petname"] . '">';
                        echo '<div class="overlay">';
                        echo '<a href="details.php?petid=' . $row["petid"] . '" class="text-white">Discover more!</a>';
                        echo '</div>';
                        echo '<h2>' . $row["petname"] . '</h2>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No pets found.";
                }
                ?>
            </div>
        </div>
    </main>
</body>
<?php
$conn->close();
include('Includes/footer.inc')
?>