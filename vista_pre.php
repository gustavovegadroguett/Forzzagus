<?php
include("./conexiones/db.php");
?>


<!DOCTYPE html>
<html lang="es">

<head>

    <?php 
                        
                        $oe = $_GET['oe']; 
                        
                        //if($stmt = $conexion->prepare("SELECT Zcodigos.Pro_ACod  , Zcodigos.Pro_ADes , Zcodigos.ProPrecioVenta  , Zcodigos.Pro_Imagen  FROM Zcodigos where Zcodigos.Pro_ACod = ?   ")){
                            $sql = "SELECT sku_producto_id as code, nombre_prod_forzz as name, modelo_prod_forzz as modelo, marca_pro_forzz as marca, precio_prod_forzz as price, fotos.ruta_forzz as ruta, cant_prod_forzz as cantidad, id_img_forzz as id_img, descripcion_pro_forzz as descripcion, especification_prod_forzz as especificacion from productos_forzz INNER JOIN fotos on fotos.id_pro_forzz = productos_forzz.sku_producto_id  WHERE  sku_producto_id = ? LIMIT 1" ;
                       // $sql = "SELECT Zcodigos.Pro_ACod  as codigo , Zcodigos.Pro_ADes , Zcodigos.ProPrecioVenta  , Zcodigos.Pro_Imagen as imagen, ProPropiedades as propiedades , ProComposicion as descripcion, ProMarcaComercial as marca, ProPrecioVenta as precio
                      //  FROM Zcodigos where Zcodigos.Pro_ACod = ?   ";

                            $stmt = mysqli_prepare($con,$sql);
                            $stmt ->bind_param('s',$oe);
                            $stmt ->execute();
                            $result = $stmt->get_result();
                            if($result->num_rows==0) exit('No hay productos');

                            while($row = $result->fetch_assoc()){
                                     
                                $codigo = $row['code'];
                                $nombre = $row['name'];
                                $modelo = $row['modelo'];
                                $marca = $row['marca']; 
                                $precio = $row['price'];   
                                $foto = $row['ruta'];  
                                     
                                     
                                     
                                     ?>

    <?php  echo '<meta property ="og:title"  content="Forzza"   />'?>
    <!--1-->
    <?php  echo '<meta property ="og:description"  content="Codigo: '.$codigo.' Nombre:'.$nombre.' Marca: '.$marca.'  Modelo:'.$modelo.' Precio:'.$precio.' "   />'?>
    <?php  echo '<meta   content="img/imagenesforzza'.$foto.'" property ="og:image" og:image:width ="700px"  og:image:height ="300px"  />'?>

    <!--<img src="img/categoria1.jpg" alt="" id="imagen">-->
    <!----><?php }?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forzza</title>
    <link rel="stylesheet" href="estilos/vista_pre.css">
    <link rel="stylesheet" href="estilos/slider.css">
    <link rel="stylesheet" href="estilos/footer.css">
    <link rel="stylesheet" href="estilos/main_forzza.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/abd8ad106c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">

    <script src="./js/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script>
    <script src="./js/cdn-cgi/apps/body/4o300efCt-CXoq1JEC-sVReFz48.js"></script>
   
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" href="./css/floating-wpp.min.css">

</head>


<body>
    <?php  include 'menu_db.php';?>

    <div class="container-portada-mision">
        <div class="capa-gradiente"></div>
        <div class="container-detalle">
            <div class="detalle">
                <h1>Nuestro Stock</h1>
                <!-- <p>Av. salitrera victoria Mz.E Sitio 43B Iquique</p>
                <p>Telefono : 09 9298 4569</p>
                <p>Nuestros horarios: 09:00 - 14:00, 15:30 - 19:00</p> -->
                <br>
                <span></span>
            </div>
        </div>

    </div>
    <main class="main-contenido-producto">
        <div class="contenedor-uno">
            <div class="sub-uno"></div>
        </div>

        <div class="titulo">
            <h2 class="subtitulo">Su producto seleccionado </h2>
        </div>
        <hr>
        <div class="contenido-calugas-vista">

            <section class="seccion">

                <div class="contenedor-producto">
                    <div class="vista-previa">
                        <!-- <input type="radio" id="1" name="image-slide" hidden>
                            <input type="radio" id="2" name="image-slide" hidden>
                            <input type="radio" id="3" name="image-slide" hidden> -->
                        <div class="menu-imagen">

                            <?php 
                        
                        $oe = $_GET['oe']; 
                        
                        //if($stmt = $conexion->prepare("SELECT Zcodigos.Pro_ACod  , Zcodigos.Pro_ADes , Zcodigos.ProPrecioVenta  , Zcodigos.Pro_Imagen  FROM Zcodigos where Zcodigos.Pro_ACod = ?   ")){
                            $sql = "SELECT sku_producto_id as code, nombre_prod_forzz as name, modelo_prod_forzz as modelo, marca_pro_forzz as marca, precio_prod_forzz as price, fotos.ruta_forzz as ruta, cant_prod_forzz as cantidad, id_img_forzz as id_img, descripcion_pro_forzz as descripcion, especification_prod_forzz as especificacion from productos_forzz INNER JOIN fotos on fotos.id_pro_forzz = productos_forzz.sku_producto_id  WHERE  sku_producto_id = ? LIMIT 1" ;
                       // $sql = "SELECT Zcodigos.Pro_ACod  as codigo , Zcodigos.Pro_ADes , Zcodigos.ProPrecioVenta  , Zcodigos.Pro_Imagen as imagen, ProPropiedades as propiedades , ProComposicion as descripcion, ProMarcaComercial as marca, ProPrecioVenta as precio
                      //  FROM Zcodigos where Zcodigos.Pro_ACod = ?   ";

                            $stmt = mysqli_prepare($con,$sql);
                            $stmt ->bind_param('s',$oe);
                            $stmt ->execute();
                            $result = $stmt->get_result();
                            if($result->num_rows==0) exit('No hay productos');

                            while($row = $result->fetch_assoc()){
                                        ?>

                            <?php echo '<img src="img/imagenesforzza'.$row['ruta']. '"class="zoom" / >'; ?>

                            <!--<img src="img/categoria1.jpg" alt="" id="imagen">-->
                            <!---->
                        </div>

                        <script>
                            $(document).ready(function () {
                                $('.zoom').hover(function () {
                                    $(this).addClass('transition');
                                }, function () {
                                    $(this).removeClass('transition');
                                });
                            });
                        </script>
                        <div class="lista-imagen">
                            <?php echo '<img src="img/imagenesforzza'.$row['ruta']. '"class="zoom" / >'; ?>
                            <!-- <img src="img/categoria3.jpg" alt="">
                                <img src="img/categoria4.jpg" alt=""> -->
                        </div>
                    </div>

                    <div class="detalle-producto">

                        <div class="sub-detalle">
                            <h4><?php echo $row['code']; ?></h4>
                            <h4><?php echo  $row['name']; ?></h4>
                            <h4><?php echo $row['marca']; ?></h4>

                            <?php 
                    $numero = $row['price'];
                    // separardor de miles
                    $separadormiles = number_format($numero, 0, '', '.');?>

                            <h3><?php //echo "$".$separadormiles; ?></h3>
                            <br>
                            <h4 id="h4">Comparte nuestros productos en Facebook</h4>
                        </div>
                        <div class="comprar">
                        <a href="javascript:var dir=window.document.URL;var tit=window.document.title;var tit2=encodeURIComponent(tit);var dir2= encodeURIComponent(dir);window.location.href=('http://www.facebook.com/share.php?u='+dir2+'&amp;t='+tit2+'');"><button>Compartir</button></a>
                        </div>

                        <hr style="background: rgb(169, 169, 169);width: 300px; margin: auto;">

                        <div class="social-link">
                            <div class="titulo-social ">
                                <h2 id="h2">y síguenos en nuestras redes sociales</h2>
                            </div>
                            <div class="iconos-social">
                            <a href="https://www.facebook.com/Forzza-2177292765724014/?__tn__=%2Cd%2CP-R&eid=ARC6bhMaQvDCIHe2H4agC2e_M-hstD80tBsKGJSX2XWEIHmfPebt4kSvJ9i0vu5AHV4bAQWItUYV3MQB"><img src="img/iconos/facebook.png"></a>
                            <a href="https://www.instagram.com/comac.iqq7/?hl=es-la"><img src="img/iconos/instagram.png"></a>
                            </div>
                        </div>

                    </div>

                </div>

            </section>


        </div>


    </main>



    <section class="seccion-features">


        <div class="titulo">
            <h2 class="subtitulo-features">Características y Especificaciones</h2>
        </div>
        <div class="features-specs">
            <h2  id="h2" class="feat-spec">Descripción</h2>
            <p> <?php echo  $row['descripcion']; ?></p>
        </div>
        <br>
        <div class="features">

            <ul>

                <h2 id="h2" class="feat-spec">Especificaciones Técnicas</h2>


                <pre><p><?php echo  $row['especificacion']; ?></p></pre>
                <!-- <li>Sistema de batería de ION-LI 60v MAX * FLEXVOLT</li>
                    <li>Rieles de guía maquinados, ofrece rigidez y precisión en los cortes deslizantes</li>
                    <li>Capacidad decorte de 24", corte de piezas de 4x8", madera contrachapada, multilaminado fenólico,
                        placas OSB</li>
                    <li>Base y guías de metal con revestimiento antifricción que ofrece una mayor durabilidad y
                        precisión</li>
                    <li>Compartimento asignado en la herramienta para cada llave o pieza de ajuste</li>
                    <li>Fácil de transportar al sitio de trabajo</li>
                    <li>Interruptor ultra-sensible de seguridad</li> -->
            </ul>
        </div>
        <br><br>
        <hr>
        <!-- <div class="features-specs">
                    <h2 class="feat-spec">Especificaciones</h2>
                </div>
            <div class="specs">
               
                <ul>
                    <li>Corte longitudinal de piezas de madera y placas de espesores hasta 2-1/2"</li>
                    <li>Trabajos de construcción, madera de obra, armado de encofrados, construcción de stands,
                        rigidización de Steel Framming con placa OSB</li>
                    <li>Cortes de precisión en acrílicos para la construcción de exhibidores</li>
                </ul>
            </div> -->
    </section>

    <?php
            }
          ?>

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


    <div id="WAButton"></div>
   
    <script src="js/main_forzza.js"></script>
    <!-- Animacion Scroll -->
    <script src="./js/jquery-3.4.1.min.js"></script>
    
    <script src="js/jquery.js"></script>


    <!-- <script src="js/script.js"></script> -->
    <script src="./js/core.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/index.spa.bundle.dee7f94436e2f0efaff9.js"></script>
    <script src="./js/javascript/Logger.js"></script>
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
  
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v5.0&appId=2527080244051524&autoLogAppEvents=1">
    </script>
</body>

</html>