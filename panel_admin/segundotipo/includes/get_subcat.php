<?php
	require ('../conexion.php');
	
	$id_cat = $_POST['id_subca'];
	
    $queryM = "	SELECT nombre_sub_forzz , id_sub_forzz  FROM sub_categoria_forzz where id_sub_forzz = '$id_cat' ORDER BY nombre_sub_forzz;	";

	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccione Segunda Subcategoria</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_categoria_forzz']."'>".$rowM['nombre_categoria_forzz']."</option>";
	}
	
	echo $html;
?>