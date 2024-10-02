<?php
//log on to the server with host, username, password
$db = mysqli_connect("localhost", "root", "", "wp");

//execute a select all query and assign result to a variable called $results
$results = mysqli_query($db, "select * from fleet");

//loop through the table of results printing each row
while ($row = mysqli_fetch_array($results)) {
    print "<p>";
    print $row['id'];
    print $row['make'];
    print $row['model'];
    print $row['manufactured'];
    print "</p>";
}
