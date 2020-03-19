<?php

include("db.php");
header("Content-Type: text/html;charset=utf-8");
error_reporting(0);





?>


<body>
   
<?php  include 'header.php';?>

    <div class="container-portada-mision">
        <div class="capa-gradiente">

        </div>
        <div class="container-detalle">
            <div class="detalle">
                <h1>CATALOGO GENERAL</h1>
               
                <br>
                <span></span>
            </div>
        </div>

    </div>

    <main class="main-contenido-lista">

        <div class="titulo">
        </div>
            <h2 class="subtitulo">TODOS LOS PRODUCTOS</h2>
        <hr>

        <div class="contenido-calugas-pro">
            <section class="seccion-sql-pro">
                <?php
                $sql =" SELECT * 
                FROM productos_forzz INNER JOIN fotos on fotos.id_pro_forzz = productos_forzz.sku_producto_id ";       

               // INNER JOIN tipo_producto_forzz on productos_forzz.sku_producto_id = tipo_producto_forzz.sku_producto_tipo "

                $run_query = mysqli_query($con,$sql);
                            
               if(mysqli_num_rows($run_query) < 0){
                echo 'No hay producto';}
                else
                {


                while($row = mysqli_fetch_array($run_query)){
                $pro_id= $row['sku_producto_id'];           
                $pro_image = $row['ruta_forzz'];
                $pro_marca = $row['marca_pro_forzz'];
                $pro_nombre= $row['nombre_prod_forzz'];
                $numero = $row['precio_prod_forzz'];
                // separardor de miles
                $separadormiles = number_format($numero, 0, '', '.');
                //imprime lo que se debe mostrar para el producto

                echo "
                <div class='caluga-uno-pro'>
                    <a href='vista_pre.php?oe=$pro_id class='caluga-superior'>
                        <div class='item-price-pro'>
                            <img src='images$pro_image' alt=''>
                        </div>

                        <div class='sub-item-pro'>
                            <h2>$pro_nombre</h2>
                            <h3>$pro_marca</h3>
                            <h2><?php //echo '$' .$separadormiles; ?></h2>
                            

                        </div>
                    </a>
                </div>
                ";
                          
                        }
                            mysqli_close($con);
                    }    
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