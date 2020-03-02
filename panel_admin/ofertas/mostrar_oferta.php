<?php   

include("../scripts/funciones.php");

error_reporting(0);

$result =  mostraroferta();
while($row = mysqli_fetch_assoc($result)){
echo $row['id'];
echo $row['oferta'];

}


?>
