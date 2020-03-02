

<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php

include("../conexiones/db.php");

error_reporting(0);


$codigo = $_POST['codigo'];


?>

<?php

$verificar_producto =  "SELECT * FROM marca_forzz WHERE nombre_marca_forzz = ?";

$stmt = mysqli_prepare($con_admin, $verificar_producto);
$stmt->bind_param('s', $codigo);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) 
    echo('Esta marca ya  existente ');


//QUERY PARA INGRESO DE DATOS
//$ingresodatos = "INSERT INTO vehiculo (chasis, marca, modelo, anio, estado_vehiculo, ubicacion, color, cilindrada, transmision, motor, traccion, id_embarquea) VALUES('$chasis','$marca','$modelo','$anio','$estado','$ubicacion','$color','$cilindrada' , '$transmision', '$motor', '$traccion','$id_embarque') ";
$ingdatos = "INSERT INTO marca_forzz (nombre_marca_forzz) VALUES (?)";

$stmt = mysqli_prepare($con_admin, $ingdatos);
$stmt->bind_param("s", $codigo);
$stmt->execute();

//INGRESO DE DATOS

//$resultado = mysqli_query($con, $ingresodatos);


if (!$stmt) {
    echo 'ERROR AL INGRESAR MARCA';
    exit;
} else {
    echo 'MARCA INGRESADA';
}



?>