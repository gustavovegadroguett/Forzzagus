<?php

include("db.php");
header("Content-Type: text/html;charset=utf-8");
error_reporting(0);



$sql ="SELECT sku_producto_id as code, nombre_prod_forzz as name, modelo_prod_forzz as modelo, marca_pro_forzz as marca, precio_prod_forzz as price, fotos.ruta_forzz as ruta, cant_prod_forzz as cantidad, id_img_forzz as id_img, descripcion_pro_forzz as descripcion, especification_prod_forzz as especificacion 
FROM productos_forzz 
INNER JOIN fotos on fotos.id_pro_forzz = productos_forzz.sku_producto_id 
INNER JOIN tipo_producto_forzz on productos_forzz.sku_producto_id = tipo_producto_forzz.sku_producto_tipo ";

?>


<body>
   
<?php  include 'header.php';?>

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
               // $stmt ->bind_param('i',$x);
                $stmt ->execute();
                $result = $stmt->get_result();
                if($result->num_rows==0) 
                echo 'No hay producto';
                 while($row = $result->fetch_assoc()){
 
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
                            <img src="<?php echo "images".$row['ruta'] ?>" alt="">
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