<?php

 $servername = "localhost";
$username = "root";
$password = "";
$db = "vashir_forzza";
/*$servername = "pruebassx.ddns.net";
$username = "gustavo";
$password = "gustavo123";
$db = "vashir_forzza";
*/
// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>