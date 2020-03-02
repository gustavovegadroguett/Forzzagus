<?php
include("../../conexiones/db.php");

//error_reporting(0);
 $preciooferta =$_POST['precioof'];
 $precioant = $_POST['precioant'];

//echo $precioant;




//echo $preciooferta;
 $anterior = filter_var($precioant, FILTER_SANITIZE_NUMBER_INT);
 $separadormilesoferta = filter_var($preciooferta, FILTER_SANITIZE_NUMBER_INT);
//$num = (int)str_replace(',', '', $string);



//numero sin formato

$codigo = $_POST['code'];

$oferta = $_POST['oferta'];


if($oferta == 'SI'){

    $sqlsx = "UPDATE productos_forzz SET precio_prod_forzz = ?, oferta_pro_forzz = ?,  precio_anterior_forzz = ? where sku_producto_id = ?";
   
    $stmt2 = mysqli_prepare($con_admin,$sqlsx);
    // var_dump($stmt2);
    $stmt2->bind_param("isis",$separadormilesoferta, $oferta, $anterior, $codigo);
    $stmt2->execute();
    
     
    if (!$stmt2) {
   $mensaje ='ERROR AL INGRESAR OFERTA';
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

        $mensaje = "OFERTA INGRESADA";

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
    header( "refresh:3;url=form_oferta.php" );
    }
    
}else if ($oferta == 'NO'){


    $sqlsx = "UPDATE productos_forzz SET  oferta_pro_forzz = ?  where sku_producto_id = ?";
              
    $stmt2 = mysqli_prepare($con_admin,$sqlsx);
    // var_dump($stmt2);
    $stmt2->bind_param("ss", $oferta,$codigo);
    $stmt2->execute();


    $mensaje = "OFERTA DADA DE BAJA";

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
       <!--<a href="index.html">Enviar nuevo mensaje</a>-->
              </section>
       
           </section>
       
       </body>
       </html>';
       
       
    
   
   echo $elemento;
  header( "refresh:3;url=form_oferta.php" );

}else {
   
    $mensaje = "NO es posible ejecutar lo que Ud. intenta hacer!";

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
       <!--<a href="index.html">Enviar nuevo mensaje</a>-->
              </section>
       
           </section>
       
       </body>
       </html>';
       
       
   echo $elemento;
   header( "refresh:3;url=form_oferta.php" );
}


?>
