<?php
include('Includes/header.inc');
?>
<h1>Pets added</h1>
<?php
include('Includes/nav.inc');
?>

<?php
if (!empty($_GET['username'])) {
    include('Includes/db_connect.inc');

    $sql = "select * from pets where username = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $username);

    $username = $_GET['username'];

    $stmt->execute();

    $result = $stmt->get_result();

    //loop through the table of results printing each row
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            print "<h2>{$row['petname']}</h2>";
            print "<h3>by {$row['type']}</h3>";
            print "<h4>Age: {$row['age']} Location: {$row['location']}</h4>";
            print "<p>{$row['description']}</p>";
        }
    }
    $conn->close();
}
?>
<?php
include('Includes/footer.inc');
?>