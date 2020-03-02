<?php

include("./conexiones/db.php");
error_reporting(0);
$x = $_GET['x'];
$c = $_GET['c'];


$sql ="SELECT sku_producto_id as code, nombre_prod_forzz as name, modelo_prod_forzz as modelo, marca_pro_forzz as marca, precio_prod_forzz as price, fotos.ruta_forzz as ruta, cant_prod_forzz as cantidad, id_img_forzz as id_img, descripcion_pro_forzz as descripcion, especification_prod_forzz as especificacion 
FROM productos_forzz 
INNER JOIN fotos on fotos.id_pro_forzz = productos_forzz.sku_producto_id 
INNER JOIN categoria_pro_forzz on productos_forzz.sku_producto_id = categoria_pro_forzz.sku_pro_forzz 
WHERE id_pro_categoria_forzz = ?";
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
    <link rel="stylesheet" href="estilos/lista_sub.css">
    <link rel="stylesheet" href="estilos/slider.css">
    <link rel="stylesheet" href="estilos/footer.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">

    <script src="./js/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script>
    <script src="./js/cdn-cgi/apps/body/4o300efCt-CXoq1JEC-sVReFz48.js"></script>
    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
   
<?php  include 'menu_db.php';?>
    <div class="container-portada-mision">
        <div class="capa-gradiente">

        </div>
        <div class="container-detalle">
            <div class="detalle">
                <h1>Sub Categorias</h1>
          
                <br>
                <span></span>
            </div>
        </div>

    </div>

    <main class="main-contenido-lista">

        <div class="titulo">
            <h2 class="subtitulo">sub categoria</h2>
        </div>
        <hr>

        <div class="contenido-calugas-sub">

            <section class="service-area-sub">
                <div class="center-service">
                    <div class="center-sub">
                        <div class="service_item-sub">
                            <div class="service_item_inner">
                                <br>
                                <div class="service_icon">
                                    <img src="img/iconos/pintura.png" alt="">

                                </div>
                                <a href="lista_pro.php?x=HRR&c=Herramientas">
                                    <h4>Herramientas</h4>
                                </a>
                                <br>
                                <a class="view_btn" href="lista_pro.php?x=HRR&c=Herramientas">Mas Detalles</a>
                            </div>
                        </div>

                        <div class="service_item-sub">
                            <div class="service_item_inner">
                                <br>
                                <div class="service_icon">
                                    <img src="img/iconos/pintura.png" alt="">

                                </div>
                                <a href="lista_pro.php?x=PNT&c=Pinturas">
                                    <h4>Pinturas</h4>
                                </a>
                                <br>
                                <a class="view_btn" href="lista_pro.php?x=PNT&c=Pinturas">Mas Detalles</a>
                            </div>
                        </div>

                        <div class="service_item-sub">
                            <div class="service_item_inner">
                                <br>
                                <div class="service_icon">
                                    <img src="img/iconos/pintura.png" alt="">

                                </div>
                                <a href="lista_pro.php?x=PNT&c=Pinturas">
                                    <h4>Pinturas</h4>
                                </a>
                                <br>
                                <a class="view_btn" href="lista_pro.php?x=PNT&c=Pinturas">Mas Detalles</a>
                            </div>
                        </div>

                        <div class="service_item-sub">
                            <div class="service_item_inner">
                                <br>
                                <div class="service_icon">
                                    <img src="img/iconos/pintura.png" alt="">

                                </div>
                                <a href="lista_pro.php?x=PNT&c=Pinturas">
                                    <h4>Pinturas</h4>
                                </a>
                                <br>
                                <a class="view_btn" href="lista_pro.php?x=PNT&c=Pinturas">Mas Detalles</a>
                            </div>
                        </div>

                        <div class="service_item-sub">
                            <div class="service_item_inner">
                                <br>
                                <div class="service_icon">
                                    <img src="img/iconos/pintura.png" alt="">

                                </div>
                                <a href="lista_pro.php?x=PNT&c=Pinturas">
                                    <h4>Pinturas</h4>
                                </a>
                                <br>
                                <a class="view_btn" href="lista_pro.php?x=PNT&c=Pinturas">Mas Detalles</a>
                            </div>
                        </div>

                        
                       

                    </div>
                </div>

            </section>


        </div>


        <div class="contenedor-dos-sub">
            <div class="sub-contenedor-dos">
                <div class="marcas">
                    <h2>Nuestras Marcas</h2>
                </div>
                <div class="marcas-img">
                    <div class="marca-uno">
                        <img src="img/marcas-1.jpg" alt="">
                    </div>
                    <div class="marca-dos">
                        <img src="img/marcas-2.jpg" alt="">
                    </div>
                    <div class="marca-tres">
                        <img src="img/marcas-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="contenedor-tres">
            <div class="sub-contenedor-tres">
                <div class="horarios">
                    <a href="#" class="link-footer">
                        <img src="img/iconos/horarios.png" width="50px">
                        <h2>Horarios</h2>
                        <p>Conoce Nuestros Horarios de atencion</p>
                </div>
                </a>
                <div class="ayuda">
                    <a href="#" class="link-footer">
                        <img src="img/iconos/ayuda.png" width="50px">
                        <h2>Centro de Ayuda</h2>
                        <p>Te ayudamos ante cualquier duda</p>
                </div>
                </a>
                <div class="acceso">
                    <a href="#" class="link-footer">
                        <img src="img/iconos/acceso.png" width="50px">
                        <h2>Recuperar Clave de Acceso</h2>
                        <p>¿ Olvidaset tu clave ?</p>
                </div>
                </a>
            </div>
        </div>

        <?php  include 'footer.php';?>

        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="js/main_forzza.js"></script>
    <script src="js/jquery.js"></script>
    <!-- <script src="js/script.js"></script> -->

    <script src="./js/core.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/index.spa.bundle.dee7f94436e2f0efaff9.js"></script>
    <script src="./js/javascript/Logger.js"></script>
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = '//www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-P9FT69');
    </script>

</body>

</html>