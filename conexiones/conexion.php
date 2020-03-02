<?php

$host = 'forzza.cl';
$user = 'forzza';
$pass = 'f0rzz4server';
$db = 'vashir_forzza';

$conexion = @mysqli_connect($host, $user, $pass, $db);

if(!$conexion){
    echo "Error en la conexión";

}

?>