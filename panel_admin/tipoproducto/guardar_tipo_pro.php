<?php
include("../../conexiones/db.php");

error_reporting(0);

//aqui captura el  los campos para ingresar a la bd  cbx (codigo de la sub categoria )   y codigo es el nombre del tipo de productp
 $nombretipo =$_POST['codigo'];
$idsubca = $_POST['cbx_subcategoria'];



//echo $preciooferta;
 
//$num = (int)str_replace(',', '', $string);



//numero sin formato






    $sqlsx = "INSERT INTO tipo_producto (nombre_tipo_producto, id_subca) VALUES (? ,?);";
   
    $stmt2 = mysqli_prepare($con_admin,$sqlsx);
    // var_dump($stmt2);
    $stmt2->bind_param("si",$nombretipo, $idsubca);
    $stmt2->execute();
    
     
    if (!$stmt2) {
   $mensaje ='ERROR AL INGRESAR TIPO DE PRODUCTO';
   $elemento=  ' <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Ofertas</title>
   
       <link rel="stylesheet" href="../estilos/modal_cat.css">
       <link rel="stylesheet" href="../fonts/font-awesome.css">
   
       <script src="../js/jquery.js"></script>
       <script src="../js/script.js"></script>
   </head>
   <body>
   
       <section class="form_wrap">
   
          <section class="mensaje-exito">
             <h1>' .$mensaje. '</h1>
  
          </section>
   
       </section>
   
   </body>
   </html>';
   
   


echo $elemento;
header( "refresh:3;url=form_oferta.php" );


    exit;
    } else {

        $mensaje = "TIPO DE PRODUCTO INGRESADO";

     $elemento=  ' <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Ofertas</title>
   
            <link rel="stylesheet" href="../estilos/modal_cat.css">
            <link rel="stylesheet" href="../fonts/font-awesome.css">
        
            <script src="../js/jquery.js"></script>
            <script src="../js/script.js"></script>
   </head>
        </head>
        <body>
        
            <section class="form_wrap">
        
               <section class="mensaje-exito">
                  <h1>' .$mensaje. '</h1>
   
               </section>
        
            </section>
        
        </body>
        </html>';
        
        
     
    
    echo $elemento;
    header( "refresh:3;url=agregar_tipo_pro.php" );
    }
    



?>
