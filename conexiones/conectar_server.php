<?php
$ftp_server = "192.168.0.31";
$ftp_usuario = "forzza";
$ftp_password = "f0rzz4server";
$con_id = ftp_ssl_connect($ftp_server);

$lr = ftp_login($con_id, $ftp_usuario, $ftp_password);

?>