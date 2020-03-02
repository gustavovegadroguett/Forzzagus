<?php   

include("../../conexiones/db.php");

error_reporting(0);


$codigo = $_POST['code'];

$categoria = $_POST['marca'];

$sqlsx = "DELETE FROM categoria_pro_forzz WHERE id_cat_pro_forzz=? and sku_pro_forzz=? ";

$stmt2 = mysqli_prepare($con,$sqlsx);
// var_dump($stmt2);
$stmt2->bind_param("ss", $categoria,$codigo);
$stmt2->execute();


if (!$stmt2) {
    $mensaje = "ERROR AL ELIMINAR";

    $elemento=  ' <!DOCTYPE html>
       <html lang="en">
       <head>
           <meta charset="UTF-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <meta http-equiv="X-UA-Compatible" content="ie=edge">
           <title>Eliminar Categoria</title>
   
            <link rel="stylesheet" href="../estilos/modal_cat.css">
            <link rel="stylesheet" href="../fonts/font-awesome.css">
            
            <script src="../js/jquery.js"></script>
            <script src="../js/script.js"></script>
       </head>
       <body>
       
           <section class="form_wrap">
       
              <section class="mensaje-exito">
                 <h1>' .$mensaje. '</h1>
       <!--<a href="index.html">Enviar nuevo mensaje</a>-->
              </section>
       
           </section>
       
       </body>
       </html>';
       
       
    
   
   echo $elemento;
   header( "refresh:3;url=eliminar_categoria.php" );
   exit;
} else {

    $mensaje = "ELIMINADO";

 $elemento=  ' <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Eliminar Categoria</title>
   
            <link rel="stylesheet" href="../estilos/modal_cat.css">
            <link rel="stylesheet" href="../fonts/font-awesome.css">
            
            <script src="../js/jquery.js"></script>
            <script src="../js/script.js"></script>
    </head>
    <body>
    
        <section class="form_wrap">
    
           <section class="mensaje-exito">
              <h1>' .$mensaje. '</h1>
    <!--<a href="index.html">Enviar nuevo mensaje</a>-->
           </section>
    
        </section>
    
    </body>
    </html>';
    

echo $elemento;
header( "refresh:3;url=eliminar_categoria.php" );
}


?>