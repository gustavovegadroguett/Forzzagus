<?php
	require ('../conexion.php');
	
	$id_cat = $_POST['id_categoria_forzz'];
	
    $queryM = "SELECT id_sub_forzz, nombre_sub_forzz FROM sub_categoria_forzz WHERE id_categoria_forzz = '$id_cat' ";
  

	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccione Subcategoria</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_sub_forzz']."'>".$rowM['nombre_sub_forzz']."</option>";
	}
	
	echo $html;
?>