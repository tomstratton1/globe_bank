<?php

// Five steps of db interaction using php

//Credentials
$dbhost = 'localhost';
$dbuser = 'webuser';
$dbpass = 'alchp2Dcc';
$dbname = 'globe_bank';

// 1. Create db connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// 2. Perform db query
$query = "SELECT * FROM subjects";
$result_set = mysqli_query($connection, $query);

// 3. Use returned data (if any)

// 4. Release returned data
mysqli_free_result($result_set); 

// 5. Close db connection

mysqli_close($connection);

?>
