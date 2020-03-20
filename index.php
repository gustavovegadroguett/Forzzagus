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
    <title>Forzza index</title>
    
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="estilos/slider.css">
    <link rel="stylesheet" href="estilos/footer.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="estilos/slick.css">

    <!-- scroll reveal-->
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

    <link rel="stylesheet" href="./css/floating-wpp.min.css">

</head>

<body>

    <?php  include 'header2.php';?>

    <br><br><br><br><br><br><br><br>
    <main class="main-about">
    
        <div class="container-all">
            <input type="radio" id="1" name="image-slide" hidden>
            <input type="radio" id="2" name="image-slide" hidden>
            <input type="radio" id="3" name="image-slide" hidden>


            
            
    </main>

    <main class="main-contenido">
        <div class="contenedor-uno">
            <div class="sub-uno"></div>
        </div>

        <div class="titulo">
            <h2 class="subtitulo">Categorias Destacadas</h2>

        </div>
        <hr>

        <div class="contenido-calugas">


            <section class="seccion-sql">


                <div class="caluga-uno" id="cont-uno">
                    <a href="lista_pro.php?x=DCI&c=Decoración e Iluminacón" class="caluga-superior">
                        <div class="item">
                            <img src="img/categoria5.jpg" alt="" title="Decoracion e Iluminacón">
                        </div>
                        <div class="sub-item-uno">  

                            <!-- <div class="porcentaje">
                                <p>hasta</p>
                                <h1>30%</h1>
                                <p>dscto.</p>
                            </div> -->
                            <div class="detalle">
                                <h2>Decoración e Iluminacón</h2>
                            </div>
                        </div>

                    </a>
                </div>
                <div class="caluga-uno" id="cont-dos">
                    <a href="lista_pro.php?x=EPP&c=Articulos de Seguridad (EPP)" class="caluga-superior">
                        <div class="item">
                            <img src="img/categoria6.jpg" alt="" title="Articulos de Seguridad">
                           
                            

                        </div>
                        <div class="sub-item-uno">
                            <!-- <div class="porcentaje">
                                <p>hasta</p>
                                <h1>30%</h1>
                                <p>dscto.</p>
                            </div> -->
                            <div class="detalle">
                                <h2>Articulos de Seguridad (Epp)</h2>
                            </div>
                        </div>

                    </a>
                </div>
                <div class="caluga-uno" id="cont-tres">
                    <a href="lista_pro.php?x=FRR&c=Ferretería" class="caluga-superior">
                        <div class="item">
                            <img src="img/categoria7.jpg" alt="" title="Ferretería">
                        </div>
                        <div class="sub-item-uno">
                            <!-- <div class="porcentaje">
                                <p>hasta</p>
                                <h1>30%</h1>
                                <p>dscto.</p>
                            </div> -->
                            <div class="detalle">
                                <h2>Ferretería</h2>
                            </div>
                        </div>

                    </a>
                </div>
                <div class="caluga-uno" id="cont-cuatro">
                    <a href="lista_pro.php?x=LNA&c=Linea Automotríz" class="caluga-superior">
                        <div class="item">
                            <img src="img/categoria8.jpg" alt="" title="Linea Automotríz">
                        </div>
                        <div class="sub-item-uno">
                            <!-- <div class="porcentaje">
                                <p>hasta</p>
                                <h1>30%</h1>
                                <p>dscto.</p>
                            </div> -->
                            <div class="detalle">
                                <h2>Linea Automotríz</h2>
                            </div>
                        </div>

                    </a>
                </div>

            </section>
            <div class="info-caluga">
                <div class="info-sub">
                    <h2>¿Busca herramientas de calidad y asequibles para su próximo proyecto?</h2>
                </div>
                <br>
                <div class="info-btn">
                    <a href="contacto.php">
                        <p class="link_cotice">Cotíce con Nosotros Ahora</p>
                    </a>
                </div>
            </div>
        </div>

        </div>




    </main>

    <main class="main-contenido-dos">

        <div class="contenedor-division"></div>

        <section class="service-area">
            <div class="left-service">
                <div class="left-sub">
                    <div class="service_item">
                        <div class="service_item_inner">
                            <div class="service_icon">
                                <img src="img/iconos/pintura.png" alt="">

                            </div>
                            <a href="lista_pro.php?x=PNT&c=Pinturas">
                                <h6>Pinturas</h6>
                            </a>
                            <p>Gran variedad de pinturas para cambiar el aspecto de tu hogar.</p>
                            <a id="a" class="view_btn" href="lista_pro.php?x=PNT&c=Pinturas">Mas Detalles</a>
                        </div>
                    </div>
                    <div class="service_item">
                        <div class="service_item_inner">
                            <div class="service_icon">
                                <img src="img/iconos/pared.png" alt="">
                                <!-- <img src="img/icon/s-icon-hover-1.png" alt=""> -->
                            </div>
                            <a href="lista_pro.php?x=OBG&c=Obra Gruesa">
                                <h6>Muros</h6>
                            </a>
                            <p>Pastas de muro para trabajos dentro o fuera del hogar.</p>
                            <a id="a" class="view_btn" href="lista_pro.php?x=OBG&c=Obra Gruesa">Mas Detalles</a>
                        </div>
                    </div>
                    <div class="service_item">
                        <div class="service_item_inner">
                            <div class="service_icon">
                                <img src="img/iconos/tubo.png" alt="">
                                <!-- <img src="img/icon/s-icon-hover-1.png" alt=""> -->
                            </div>
                            <a href="lista_pro.php?x=GAS&c=Sanitario y Gasfitería">
                                <h6>Gasfitería</h6>
                            </a>
                            <p>Amplio stock en tuberias, pegamentos para Gasfitería.</p>
                            <a id="a" class="view_btn" href="lista_pro.php?x=GAS&c=Sanitario y Gasfitería">Mas Detalles</a>
                        </div>
                    </div>
                    <div class="service_item">
                        <div class="service_item_inner">
                            <div class="service_icon">
                                <img src="img/iconos/hormigon.png" alt="">
                                <!-- <img src="img/icon/s-icon-hover-1.png" alt=""> -->
                            </div>
                            <a href="lista_pro.php?x=CTR&c=Construccion">
                                <h6>Concreto</h6>
                            </a>
                            <p>Mezcladoras para elaborar un cemento de alto nivel. </p>
                            <a id="a" class="view_btn" href="lista_pro.php?x=CTR&c=Construccion">Mas Detalles</a>
                        </div>
                    </div>
                    <div class="service_item">
                        <div class="service_item_inner">
                            <div class="service_icon">
                                <img src="img/iconos/casco.png" alt="">
                                <!-- <img src="img/icon/s-icon-hover-1.png" alt=""> -->
                            </div>
                            <a href="lista_pro.php?x=SEG&c=Seguridad">
                                <h6>Seguridad</h6>
                            </a>
                            <p>Todo lo necesario para cuidar de tu salud al momento de trabajar.</p>
                            <a id="a" class="view_btn" href="lista_pro.php?x=SEG&c=Seguridad">Mas Detalles</a>
                        </div>
                    </div>
                    <div class="service_item">
                        <div class="service_item_inner">
                            <div class="service_icon">
                                <img src="img/iconos/compresor-aire.png" alt="">
                                <!-- <img src="img/icon/s-icon-hover-1.png" alt=""> -->
                            </div>
                            <a href="lista_pro.php?x=MQC&c=Maquinaria de Construcción">
                                <h6>Compresores</h6>
                            </a>
                            <p>Para uso doméstico, pequeños y medianos talleres.</p>
                            <a id="a" class="view_btn" href="lista_pro.php?x=MQC&c=Maquinaria de Construcción">Mas Detalles</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="rigth-service">
                <div class="rigth-sub">
                    <div class="rigth_service_text">
                        <div class="main_b_title">
                            <h2 id="h2">Nuestros<br class="title_br">Servicios</h2>
                            <h6 id="h6">Lo mejor en Ferreterías<br class="sub_br">Forzza</h6>
                        </div>
                        <p id="p" class="text_service">Nos comprometemos en brindar la mejor atención personalizada.</p>
                        <p id="p" class="text_service">Actualmente estamos trabajando para aumentar la satisfacion de nuestros clientes, 
                        importanto productos de calidad que compitan directamente dentro del mercado ferretero con las mejores marcas y amplio stock de 
                        herramientas para mejorar su experiencia en construccion, decoracion y proyectos futuros.</p>
                        <p id="p" class="text_service">Estamos ubicados en Av. Salitrera Victoria Manzana E Sitio 43B Iquique.</p>
                        <div class="border_bar"></div>
                    </div>
                </div>
            </div>

        </section>


    </main>
    <main class="main-contenido-tres">
        <div class="titulo">
            <h2 class="subtitulo">Los Mejores Precios</h2>

        </div>
        <hr>
        <div class="contenido-calugas-sql">

            <section class="seccion">

                <?php

                
                include("./scripts/funciones.php");
               
                $result =  mostraroferta();
                while ($row = mysqli_fetch_assoc($result)) {
                    $numero = $row['precioant'] ;
                    $numeroferta = $row['precioferta'];
                    $separadormilesant = number_format($numero, 0, '', '.');
                    $separadormilesof  = number_format($numeroferta, 0, '', '.');  
             ?>
                <div class="caluga-uno" id="cont-sql">
                    <a href="vista_pre.php?oe=<?php echo $row['id'];?>" class="caluga-superior">
                        <div class="item-price">
                            <img src="<?php echo $row['ruta'] ?>" alt="">
                        </div>
                        <div class="sub-item">

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

            <section class="seccion-slider">
                <div class="cont-frame">
                    <iframe style="border:1px solid #FFF;" width="100%" height="450px" id="frame-slide"
                        src="carousel.php" scrolling="no">
                    </iframe>
                </div>
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
                        <p id="p">Conoce Nuestros Horarios de atencion</p>
                </div>
                </a>
                <div class="ayuda">
                    <a href="#" class="link-footer">
                        <img src="img/iconos/ayuda.png" width="50px">
                        <h2 id="h2">Centro de Ayuda</h2>
                        <p id="p">Te ayudamos ante cualquier duda</p>
                </div>
                </a>
                <div class="acceso">
                    <a href="#" class="link-footer">
                        <img src="img/iconos/acceso.png" width="50px">
                        <h2 id="h2"> Destacados</h2>
                        <p id="p">¿ Olvidaset tu clave ?</p>
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
     <!-- Animacion Scroll -->
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/jquery.js"></script>
    <script src="./js/page-scroll.js"></script>
    <script src="./js/slick.js"></script>
    <script src="./js/core.min.js"></script>
    <script src="./js/script.js"></script>
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