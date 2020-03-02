<?php
include("../../conexiones/db.php");

error_reporting(0);


$categoria = $_POST['marca'];

$nombre = $_POST['codigo'];
$nombre = strtoupper($nombre);

$baja = $_POST['baja'];

if ($baja == "DAR DE BAJA") {

    $nodispo = "NODISPONIBLE";
    $sqlsx = "UPDATE categoria_forzz SET estado_categoria = ? where id_categoria_forzz = ?";
    $stmt2 = mysqli_prepare($con, $sqlsx);
    $stmt2->bind_param("ss", $nodispo, $categoria);
    $stmt2->execute();


    if (!$stmt2) {
        $mensaje = "ERROR AL DAR DE BAJA";

        $elemento =  ' <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Edición Categoria</title>
   
                <link rel="stylesheet" href="../estilos/modal_cat.css">
                <link rel="stylesheet" href="../fonts/font-awesome.css">
            
                <script src="../js/jquery.js"></script>
                <script src="../js/script.js"></script>
            </head>
            <body>
            
                <section class="form_wrap">
            
                   <section class="mensaje-exito">
                      <h1>' . $mensaje . '</h1>
            <!--<a href="./index.php">Enviar nuevo mensaje</a>-->
                   </section>
            
                </section>
            
            </body>
            </html>';




        echo $elemento;
        header("refresh:3;url=editar_cat.php");


        exit;
    } else {

        $mensaje = "CATEGORIA BAJADA";

        $elemento =  ' <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Edición Categoria</title>
   
            <link rel="stylesheet" href="../estilos/modal_cat.css">
            <link rel="stylesheet" href="../fonts/font-awesome.css">
            
            <script src="../js/jquery.js"></script>
            <script src="../js/script.js"></script>
        </head>
        <body>
        
            <section class="form_wrap">
        
               <section class="mensaje-exito">
                  <h1>' . $mensaje . '</h1>
        <!--<a href="index.php">Enviar nuevo mensaje</a>-->
               </section>
        
            </section>
        
        </body>
        </html>';




        echo $elemento;
        header("refresh:3;url=editar_cat.php");
    }
} else {

    $sqlsx = "UPDATE categoria_forzz SET nombre_categoria_forzz = ? where id_categoria_forzz = ?";

    $stmt2 = mysqli_prepare($con, $sqlsx);

    $stmt2->bind_param("ss", $nombre, $categoria);
    $stmt2->execute();


    if (!$stmt2) {
        $mensaje = "ERROR AL EDITAR";

        $elemento =  ' <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Edición Categoria</title>
   
            <link rel="stylesheet" href="../estilos/modal_cat.css">
            <link rel="stylesheet" href="../fonts/font-awesome.css">
            
            <script src="../js/jquery.js"></script>
            <script src="../js/script.js"></script>
        </head>
        <body>
        
            <section class="form_wrap">
        
               <section class="mensaje-exito">
                  <h1>' . $mensaje . '</h1>
        <!--<a href="index.php">Enviar nuevo mensaje</a>-->
               </section>
        
            </section>
        
        </body>
        </html>';




        echo $elemento;
        header("refresh:3;url=editar_cat.php");


        exit;
    } else {

        $mensaje = "EDITADO";

        $elemento =  ' <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edición Categoria</title>
   
        <link rel="stylesheet" href="../estilos/modal_cat.css">
        <link rel="stylesheet" href="../fonts/font-awesome.css">
            
        <script src="../js/jquery.js"></script>
        <script src="../js/script.js"></script>
    </head>
    <body>
    
        <section class="form_wrap">
    
           <section class="mensaje-exito">
              <h1>' . $mensaje . '</h1>
    <!--<a href="index.php">Enviar nuevo mensaje</a>-->
           </section>
    
        </section>
    
    </body>
    </html>';

        echo $elemento;
        header("refresh:3;url=editar_cat.php");
    }
}
