    <?php
    include("./conexiones/db.php");
    $x = $_GET['x'];
    $c = $_GET['c'];

    $sql = "SELECT sku_producto_id as code, nombre_prod_forzz as name, modelo_prod_forzz as modelo, marca_pro_forzz as marca, precio_prod_forzz as price, fotos.ruta_forzz as ruta, cant_prod_forzz as cantidad, id_img_forzz as id_img, descripcion_pro_forzz as descripcion, especification_prod_forzz as especificacion
            FROM productos_forzz 
            INNER JOIN fotos ON fotos.id_pro_forzz = productos_forzz.sku_producto_id";
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>

        <div class="titulo">
            <h2 class="subtitulo"><?php echo $c ?></h2>
        </div>

        <div class="contenido-calugas">
            <section class="seccion-sql">
                <?php

                //$stmt =  sqlsrv_prepare($con, $sql, array($x));
                $stmt = mysqli_prepare($con, $sql);
                $stmt->bind_param('s', $x);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows == 0) exit('No hay producto');
                while ($row = $result->fetch_assoc()) {

                    // , ".$row['Pro_Imagen']."
                    //captura el precio
                    $numero = $row['price'];
                    // separardor de miles
                    $separadormiles = number_format($numero, 0, '', '.');
                    //imprime lo que se debe mostrar para el producto

                    ?>
                    <div class="caluga-uno">
                        <a href="vista_pre.php?oe=<?php echo $row['code']; ?>" class="caluga-superior">
                            <div class="item-sql">
                                <?php echo '<img height=200px; width=250px; src="' . $row['ruta'] . '" /> <br />'; ?>
                            </div>
                        </a>

                        <div class="sub-item-uno">
                            <div class="porcentaje">

                            </div>
                            <div class="detalle">
                                <p><?php echo $row['name']; ?></p>
                                <p style="font-size:0.6em;"><?php echo $row['marca'];  ?></p>
                                <p style="font-size:1.2em;"><?php echo "$" . $separadormiles; ?></p>
                                <p style="font-size:0.6em;"><?php echo $row['code'];  ?></p>
                            </div>
                        </div>
                    </div>
                <?php

                }
                mysqli_close($con);

                ?>
        </div>

    </body>

    </html>