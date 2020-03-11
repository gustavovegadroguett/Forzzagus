<?php

include("./conexiones/db.php");
error_reporting(0);
$x = $_GET['x'];
$c = $_GET['c'];


$sql =/*"SELECT sku_producto_id as code, nombre_prod_forzz as name, modelo_prod_forzz as modelo, marca_pro_forzz as marca, precio_prod_forzz as price, fotos.ruta_forzz as ruta, cant_prod_forzz as cantidad, id_img_forzz as id_img, descripcion_pro_forzz as descripcion, especification_prod_forzz as especificacion 
FROM productos_forzz 
INNER JOIN fotos on fotos.id_pro_forzz = productos_forzz.sku_producto_id 
INNER JOIN categoria_pro_forzz on productos_forzz.sku_producto_id = categoria_pro_forzz.sku_pro_forzz 
WHERE id_sub_pro_forzz = ?";*/

//query 2 
"SELECT sku_producto_id as code, nombre_prod_forzz as name, modelo_prod_forzz as modelo, marca_pro_forzz as marca, precio_prod_forzz as price, fotos.ruta_forzz as ruta, cant_prod_forzz as cantidad, id_img_forzz as id_img, descripcion_pro_forzz as descripcion, especification_prod_forzz as especificacion 
FROM productos_forzz 
INNER JOIN fotos on fotos.id_pro_forzz = productos_forzz.sku_producto_id 
INNER JOIN tipo_producto_forzz on productos_forzz.sku_producto_id = tipo_producto_forzz.sku_producto_tipo 
WHERE tipo_producto_forzz.id_tipo_pro_forzz = ?";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forzza</title>
    <link rel="stylesheet" href="estilos/lista_pro.css">
    <link rel="stylesheet" href="estilos/footer.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">

    
    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" href="estilos/slick.css">

    <link rel="stylesheet" href="./css/floating-wpp.min.css">
</head>

<body>
   
<?php  include 'header.php';?>
    <br><br><br>
    <div class="container-portada-mision">
        <div class="capa-gradiente">

        </div>
        <div class="container-detalle">
            <div class="detalle">
                <h1><?php echo $c?></h1>
                <br>
                <span></span>
            </div>
        </div>

    </div>

    <main class="main-contenido-lista">

        <div class="titulo">
            <h2 class="subtitulo"><?php echo $c?></h2>
        </div>
        <hr>

        <div class="contenido-calugas-pro">
            <section class="seccion-sql-pro">
                <?php
                       
                //$stmt =  sqlsrv_prepare($con, $sql, array($x));
                $stmt = mysqli_prepare($con,$sql);
                $stmt ->bind_param('i',$x);
                $stmt ->execute();
                $result = $stmt->get_result();
                if($result->num_rows==0) 
                echo 'No hay producto';
                 while($row = $result->fetch_assoc())
                 {
 
                // , ".$row['Pro_Imagen']."
                //captura el precio
                $numero = $row['price'];
                // separardor de miles
                $separadormiles = number_format($numero, 0, '', '.');
                //imprime lo que se debe mostrar para el producto

                 ?>
                <div class="caluga-uno-pro">
                    <a href="vista_pre.php?oe=<?php echo $row['code'];?>" class="caluga-superior">
                        <div class="item-price-pro">
                            <img src="<?php echo "img".$row['ruta'] ?>" alt="">
                        </div>

                        <div class="sub-item-pro">
                            <h2><?php echo $row['name']; ?></h2>
                            <h3><?php echo $row['marca'];  ?></h3>
                            <h2><?php //echo "$" .$separadormiles; ?></h2>
                            <!--p><?php // echo $row['code'];  ?></p-->

                        </div>
                    </a>
                </div>
                <?php
                          
                  }
                   mysqli_close($con);
                      
                    ?>



            </section>
        </div>


        <div class="contenedor-dos">
            <div class="sub-contenedor-dos">
                <div class="marcas">
                    <h2>Nuestras Marcas</h2>
                </div>
                <div class="slider-marcas">
                    
                    <div class="slide">
                        <img src="img/marcas-2.jpg" alt="" id="img-slide">
                    </div>
                    <div class="slide">
                        <img src="img/marcas-3.jpg" alt="" id="img-slide">
                    </div>
                    <div class="slide">
                        <img src="img/logo-transparente.png" alt="" id="img-slide">
                    </div>
                    <div class="slide">
                        <img src="img/marcas-2.jpg" alt="" id="img-slide">
                    </div>
                    <div class="slide">
                        <img src="img/marcas-3.jpg" alt="" id="img-slide">
                    </div>
                    <div class="slide">
                        <img src="img/marcas-1.jpg" alt="" id="img-slide">
                    </div>
                </div>
            </div>
        </div>

        <div class="contenedor-tres">
            <div class="sub-contenedor-tres">
                <div class="horarios">
                    <a href="#" class="link-footer">
                        <img src="img/iconos/horarios.png" width="50px">
                        <h2 id="h2">Horarios</h2>
                        <p>Conoce Nuestros Horarios de atencion</p>
                </div>
                </a>
                <div class="ayuda">
                    <a href="#" class="link-footer">
                        <img src="img/iconos/ayuda.png" width="50px">
                        <h2 id="h2">Centro de Ayuda</h2>
                        <p>Te ayudamos ante cualquier duda</p>
                </div>
                </a>
                <div class="acceso">
                    <a href="#" class="link-footer">
                        <img src="img/iconos/acceso.png" width="50px">
                        <h2 id="h2">Recuperar Clave de Acceso</h2>
                        <p>¿ Olvidaset tu clave ?</p>
                </div>
                </a>
            </div>
        </div>

      
      
      
      
      <!--  -------------------------------------------------FOOTER---------------------------------------------- -->
        <?php  include 'footer.php';?>

        </div>
    </main>
    <script>
        window.onload=function(){
                $('.slider-marcas').slick({
                autoplay:true,
                autoplaySpeed:2000,
                arrows:false,
                slidesToShow:3,
                slidesToScroll:1,
                responsive:[
                    {
                        breakpoint: 700,
                        settings: {
                        slidesToShow: 2
                    }
                  },
                  {
                        breakpoint: 480,
                        settings: {
                        arrows: false,
                        centerMode: false,
                        slidesToShow: 1
                    }
                    }
                ]
             });
        };
    </script>
    
    <div id="WAButton"></div>

    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="js/main_forzza.js"></script>
    <script src="js/jquery.js"></script>
    <!-- <script src="js/script.js"></script> -->
    <script src="./js/core.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/index.spa.bundle.dee7f94436e2f0efaff9.js"></script>
    <script src="./js/javascript/Logger.js"></script>
       <!--Floating WhatsApp javascript-->
       <script type="text/javascript" src="./js/floating-wpp.min.js"></script>
    <script type="text/javascript">
            $(function() {
                $('#WAButton').floatingWhatsApp({   
                    phone: '56956697219', //WhatsApp Business phone number
                    headerTitle: 'Chatea con nosotros en Whatsapp', //Popup Title
                    popupMessage: 'Hola, En que podemos ayudarte ?', //Popup Message
                    showPopup: true, //Enables popup display
                    buttonImage: '<img src="./img/iconos/whatsapp.svg" />', //Button Image
                    //headerColor: 'crimson', //Custom header color
                    //backgroundColor: 'crimson', //Custom background button color
                    position: "left", //Position: left | right
                    size: "50px"

                });
            });
    </script>
   

</body>

</html>