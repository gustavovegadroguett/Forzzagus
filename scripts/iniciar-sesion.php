<?php
require 'funciones.php';
$usuario = $_POST['txtUsuario'];
$clave = md5($_POST['txtClave']);
conectar();

if(validarLogin($usuario, $clave)){
    //Acceso al sistema
    if( esAdmin())
    header('Location: ../panel_admin/formulario_forzza.php');
         //header('Location: ../panel_admin/index.php');
}else{
    header('Location: ../panel_admin/formulario_forzza.php');
    
?>

<script>
alert('Los datos ingresados son incorrectos')
location.href = "./inicio.html";
</script>

<?php
    desconectar();
}
?>