<!DOCTYPE html>
<html lang="en">
<?php 
//include("./conexiones/db.php"); 
//error_reporting(0);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forzza</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="estilos/ofertas.css">
    <link rel="stylesheet" href="estilos/slider.css">
    <link rel="stylesheet" href="estilos/footer.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="header-top">
            <div class="container-top">
                <div class="row-top">

                    <div class="cont-info-header">
                        <div class="header-bar-inner">
                            <div class="header-left">
                                <ul>
                                    <li> <a href="https://wa.me/56992984569?text=Me%20gustaría%20cotizar%20productos%20forzza%20"
                                            target="_blank" title="cotize ahora">
                                            <i class="icon-whatsapp"></i> +569 9298 4569</li></a>
                                    <li><i class="icon-envelop"></i> info.forzza@gmail.com</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="cont-social-header">
                        <div class="header-top-right">
                            <div class="header-right-div">
                                <div class="social-profile">
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com/pg/Forzza-iquique-2177292765724014/posts/?ref=page_internal"
                                                target="_blank">
                                                <i class="fab fa-facebook-square"></i> </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/comac.iqq7/?hl=es-la" target="_blank">
                                                <i class="fab fa-instagram"></i> </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor-header">
            <a href="index.php">
                <figure class="contenedor-logo-title">
                    <img src="img/logo_forzza.png" alt="paper-plane">

                </figure>
            </a>
            <input type="checkbox" id="btn-menu">
            <label for="btn-menu" class="icon-menu"></label>
            <?php  include 'menu_nav.php';?>
        </div>
    </header>

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

    <main class="main-contenido-tres">

        <div class="titulo">

            <h2 class="subtitulo">Los Mejores Precios</h2>

        </div>
        <hr>
        <div class="contenido-calugas-sale">
       

        <section class="seccion-sale">

            <?php

            include("./conexiones/conexion.php"); 
            
            $sql_registros = mysqli_query($conexion, "SELECT COUNT(*) AS total_registro FROM productos_forzz WHERE oferta_pro_forzz = ? and productos_forzz.estado_pro_forzza = 'DISPONIBLE'");
            $result_registros = mysqli_fetch_array($sql_registros);
            $total_registro = $result_registros['total_registro'];

            $por_pagina = 6;

            if(empty($_GET['pagina'])){
                $pagina = 1;

            }else{
                $pagina = $_GET['pagina'];
            }

            $desde = ($pagina-1) * $por_pagina;
            $total_paginas = ceil($total_registro / $por_pagina);

            $query = mysqli_query($conexion, "SELECT sku_producto_id as id , nombre_prod_forzz as nombre, marca_pro_forzz as marca, precio_prod_forzz as precioant,  precio_anterior_forzz as precioferta, oferta_pro_forzz as oferta, ruta_forzz as ruta 
                                                FROM productos_forzz  
                                                 INNER JOIN fotos on fotos.id_pro_forzz = productos_forzz.sku_producto_id 
                                                    ORDER BY id ASC LIMIT $desde, $por_pagina ;");

            $result = mysqli_num_rows($query);

            if($result > 0){
                while($data = mysqli_num_rows($query)){

                  
                    ?>

                <div class="caluga-uno-sale" id="cont-sql">
                    <a href="vista_pre.php?oe=<?php echo $data['id'];?>" class="caluga-superior">
                        <div class="item-price-sale">
                            <img src="<?php echo $data['ruta'] ?>" alt="">
                        </div>

                        <div class="sub-item-sale">
                            <h2><?php echo $data['nombre'] ?></h2>
                            <h3><?php echo $data['marca'] ?></h3>
                            
                        </div>
                    </a>

                </div>

                <?php  
  
            }

         }
            
            ?>

            <div class="paginador">
                <ul>

                    <?php
                    if ($pagina != 1) {


                        ?>

                        <li><a href="?pagina=<?php echo 1;?>">|<</a></li>
                        <li><a href="?pagina=<?php echo $pagina-1;?>"><<</a><li>
                
                    
                    <?php
                    }
                    
                    for ($i=1; $i <= $total_paginas; $i++) { 
                        
                        if ($i == $pagina) {

                            echo '<li class="page-selected">'.$i.'</li>';
                        
                        }else{

                            echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                        }

                    }

                    if($pagina != $total_paginas){
                    
                    ?>

                <li><a href="?pagina=<?php echo $pagina+1;?>">>></a></li>
                <li><a href="?pagina=<?php echo $total_paginas;?>">>|</a></li>

                <?php 
            } 
            
            ?>
                    
                </ul>
            </div>



            </section>
        </div>



        <div class="contenedor-dos">
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


    </main>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <!-- <script src="js/script.js"></script> -->

</body>

</html>