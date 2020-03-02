<!DOCTYPE html>
<html lang="en">
<?php 
include("./conexiones/db.php"); 
error_reporting(0);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forzza</title>
    <link rel="stylesheet" href="estilos/footer.css">
    <link rel="stylesheet" href="estilos/ofertas.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">

    <script src="./js/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script>
    <script src="./js/cdn-cgi/apps/body/4o300efCt-CXoq1JEC-sVReFz48.js"></script>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" href="estilos/slick.css">

    <link rel="stylesheet" href="./css/floating-wpp.min.css">
</head>

<body>
<?php  include 'menu_db.php';?>

    <div class="container-portada-mision">
        <div class="capa-gradiente"></div>
        <div class="container-detalle">
            <div class="detalle">
                <h1>Ofertas Forzza</h1>
                <!-- <p>Av. salitrera victoria Mz.E Sitio 43B Iquique</p>
                <p>Telefono : 09 9298 4569</p>
                <p>Nuestros horarios: 09:00 - 14:00, 15:30 - 19:00</p> -->
                <br>
                <span></span>
            </div>
        </div>

    </div>
    <main class="main-contenido-tres" id="main-cont">
        
        <div class="titulo">
            <h2 class="subtitulo" id="sub_sale">Ofertas Espectaculares de Forzza</h2>
        </div>
        <hr>
        <div class="contenido-calugas-sale">

            <section class="seccion-sale">

                <?php

                
                include("./scripts/funciones.php");
               
                $result =  mostraroferta_forzza();
                while ($row = mysqli_fetch_assoc($result)) {
                    $numero = $row['precioant'] ;
                    $numeroferta = $row['precioferta'];
                    $separadormilesant = number_format($numero, 0, '', '.');
                    $separadormilesof  = number_format($numeroferta, 0, '', '.');

                    
                    
             ?>
                <div class="caluga-uno-sale" id="cont-sql">
                    <a href="vista_pre.php?oe=<?php echo $row['id'];?>" class="caluga-superior">
                        <div class="item-price-sale">
                            <img src="<?php echo "img/imagenesforzza".$row['ruta'] ?>" alt="">
                        </div>

                        <div class="sub-item-sale">
                            <h2><?php echo $row['nombre'] ?></h2>
                            <h3><?php echo $row['marca'] ?></h3>
                            <h2>$<?php echo $separadormilesant ?></h2>
                            <p>Antes $<?php echo $separadormilesof ?></p>
                        </div>
                    </a>

                </div>
                <?php  
  
            }
                
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

        <?php  include 'footer.php';?>


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
    
    <script src="js/main_forzza.js"></script>
    <script src="./js/jquery-3.4.1.min.js"></script>
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