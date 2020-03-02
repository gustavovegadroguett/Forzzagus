<?php

$con = mysqli_connect("autoriver.cl","vistas_forzza","vistas.%","vashir_forzza");
//$con = mysqli_connect("localhost","cargar_fotos","cargar_forzza","vashir.forzza");
	if (mysqli_connect_errno()){
		echo "Error en la conexion a MySQL: " . mysqli_connect_error();
		die();
		}

		$con_admin = mysqli_connect("autoriver.cl","forzza","f0rzz4server","vashir_forzza");
//$con = mysqli_connect("localhost","cargar_fotos","cargar_forzza","vashir.forzza");
	if (mysqli_connect_errno()){
		echo "Error en la conexion a MySQL: " . mysqli_connect_error();
		die();
		}
?>