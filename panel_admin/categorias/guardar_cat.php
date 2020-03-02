<?php

include("../../conexiones/db.php");

error_reporting(0);

$mensaje2 = "EL PRODUCTO SE ENCONTRABA EN LA CATEGORIA";

$elemento2 =  ' <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Categoria Asignada</title>
   
       <link rel="stylesheet" href="../../estilos/modal_cat.css">
       <link rel="stylesheet" href="../../fonts/font-awesome.css">
   
       <script src="../../js/jquery.js"></script>
       <script src="../../js/script.js"></script>
   </head>
   <body>
   
       <section class="form_wrap">
   
          <section class="mensaje-exito">
             <h1>' . $mensaje2 . '</h1>
   <!--<a href="index.html">Enviar nuevo mensaje</a>-->
          </section>
   
       </section>
   
   </body>
   </html>' . header("refresh:3;url=agregar_cat.php");

$codigo = $_POST['code'];
$categoria = $_POST['marca'];


$verificar_cat =  "SELECT * from categoria_pro_forzz where sku_pro_forzz = ? and id_cat_pro_forzz =?";

$stmt = mysqli_prepare($con, $verificar_cat);
$stmt->bind_param('ss', $codigo, $categoria);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) exit($elemento2);

$sqlsx = "INSERT INTO categoria_pro_forzz ( id_cat_pro_forzz, sku_pro_forzz) VALUES (?,?)";

$stmt2 = mysqli_prepare($con_admin, $sqlsx);
// var_dump($stmt2);
$stmt2->bind_param("ss", $categoria, $codigo);
$stmt2->execute();

/*  $ingresodatosfoto = "INSERT INTO fotos (id_pro_forzz, ruta_forzz, tipo_forzz) VALUES (?,?,?)";
    $stmt3 = mysqli_prepare($con,$ingresodatosfoto);
    $stmt3->bind_param("sss", $codigo,$destinobd , $filetype);
    $stmt3->execute();*/
    if (!$stmt2) {
        $mensaje = "ERROR AL ASIGNAR";

        $elemento=  ' <!DOCTYPE html>
           <html lang="en">
           <head>
               <meta charset="UTF-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <meta http-equiv="X-UA-Compatible" content="ie=edge">
               <title>Categoria Asignada</title>
           
               <link rel="stylesheet" href="../estilos/modal_cat.css">
               <link rel="stylesheet" href="../fonts/font-awesome.css">
           
            <script src="../../js/jquery.js"></script>
            <script src="../../js/script.js"></script>
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
       header( "refresh:3;url=agregar_cat.php" );
       exit;
    } else {

        $mensaje = "PRODUCTO ASIGNADO";

     $elemento=  ' <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Categoria Asignada</title>
        
            <link rel="stylesheet" href="../estilos/modal_cat.css">
            <link rel="stylesheet" href="../fonts/font-awesome.css">
        
            <script src="../../js/jquery.js"></script>
            <script src="../../js/script.js"></script>
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
    header( "refresh:3;url=agregar_cat.php" );
    }
    
?>
