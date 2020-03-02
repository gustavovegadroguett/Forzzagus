<?php

include ("../conexiones/db.php");

$query ="SELECT chasis, marca, modelo, anio, estado_vehiculo, ubicacion, color, cilindrada, transmision, motor, traccion FROM vehiculo ";  

$resultado = mysqli_query($conn, $query);

if(!$resultado){
    die("Error");
    
}else{
    while ($data = mysqli_fetch_assoc($resultado)){
        $arreglo["data"][] = array_map("utf8_encode" , $data);
    }
    echo json_encode($arreglo);
}
 mysqli_free_result($resultado);
 mysqli_close($conn);

?>