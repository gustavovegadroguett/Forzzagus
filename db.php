<?php

 $servername = "autoriver.cl";
$username = "claudio";
$password = "claudio.%";
$db = "vashir_forzza"; 
/* $servername = "localhost";
$username = "root";
$password = "";
$db = "vashir_forzza";*/

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>