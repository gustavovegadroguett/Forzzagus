<?php 
include("../conexiones/conexion.php"); 
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/listar_producto.css">
    <link rel="stylesheet" href="../menu-gestion/css/estilo_menu.css">
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">

</head>
<body>

    <section id="container">
    <?php include 'menu-lateral.php'; ?>

    <?php
        $busqueda = strtolower($_REQUEST['busqueda']);  // strtolower convierte variables de busqueda en minusculas
        if(empty($busqueda)){
            header("location: listar_producto.php");
        }
    
    ?>
    <h2>Lista de Productos Forzza</h2>
    <!-- <a href="formulario_forzza.php" class="btn_new">Subir Producto</a> -->
    <div class="cont-tabla">
    <form action="buscar_pro.php" method="GET" class="form_search">
        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda;?>">
        <input type="submit" value="Buscar" class="btn_search">
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Precio Anterior</th>
            <th>Precio Oferta</th>
            <th>En Oferta</th>
            <th>Imagen Producto</th>
            <th>Acciones</th>

        </tr>

        <?php 
     
        /*$rol = '';

        if($busqueda == 'administrador'){
            $rol = " OR rol LIKE '%1%' ";

        }else if($busqueda == 'supervisor'){
            $rol = " OR rol LIKE '%2%' ";

        }else if($busqueda == 'vendedor'){
            $rol = " OR rol LIKE '%3%' ";
        }

        */

        $sql_registros = mysqli_query($conexion, "SELECT COUNT(*) AS total_registro FROM productos_forzz
                                                        WHERE
                                                        (   sku_producto_id LIKE '%$busqueda%' OR
                                                            nombre_prod_forzz LIKE '%$busqueda%' OR
                                                            marca_pro_forzz LIKE '%$busqueda%' OR
                                                            precio_prod_forzz LIKE '%$busqueda%' OR
                                                            precio_anterior_forzz LIKE '%$busqueda%' OR
                                                            oferta_pro_forzz LIKE '%$busqueda%' OR  
                                                            ruta_forzz LIKE '%$busqueda%')");
        $result_registros = mysqli_fetch_array($sql_registros);
        $total_registro = $result_registros['total_registro'];

        $por_pagina = 20;

        if(empty($_GET['pagina'])){

            $pagina = 1;
        }else{
            $pagina = $_GET['pagina'];
        }

        $desde = ($pagina-1) * $por_pagina;
        $total_paginas = ceil($total_registro / $por_pagina);

        $query = mysqli_query($conexion, "SELECT
        sku_producto_id,
        nombre_prod_forzz,
        marca_pro_forzz,
        precio_prod_forzz,
        precio_anterior_forzz,
        oferta_pro_forzz,
        ruta_forzz
    FROM
        productos_forzz
    INNER JOIN fotos ON fotos.id_pro_forzz = productos_forzz.sku_producto_id
    WHERE
        (
            sku_producto_id LIKE '%$busqueda%' OR 
            nombre_prod_forzz LIKE '%$busqueda%' OR
            marca_pro_forzz LIKE '%$busqueda%' OR
            precio_anterior_forzz LIKE '%$busqueda%' OR
            precio_prod_forzz LIKE '%$busqueda%' OR 
            oferta_pro_forzz LIKE '%$busqueda%' OR
            ruta_forzz LIKE '%$busqueda%'
        )
    ORDER BY sku_producto_id ASC
    LIMIT $desde, $por_pagina");

        $result = mysqli_num_rows($query);

         if($result > 0){
            while($data = mysqli_fetch_array($query)){

                ?>

                <tr>
                    <td><?php echo $data["sku_producto_id"]?></td>
                    <td><?php echo $data["nombre_prod_forzz"]?></td>
                    <td><?php echo $data["marca_pro_forzz"]?></td>
                    <td><?php echo $data["precio_anterior_forzz"]?></td>
                    <td><?php echo $data["precio_prod_forzz"]?></td>
                    <td><?php echo $data["oferta_pro_forzz"]?></td>
                    <td><img src="<?php echo $data['ruta_forzz'] ?>"  alt=""></td>
                    
                    <td>
                        <a href="#" class="link_edit">Editar</a>
                        |
                        <a href="#" class="link_delete">Eliminar</a>
                    </td>
                </tr>


                    <?php 
                }
            }
            ?>
    </table>
    <?php
    
    if($total_registro != 0){

    
    ?>
    <div class="paginador">
        <ul>
            <?php
             if($pagina != 1){

             
            
            ?>
            <li><a href="?pagina=<?php echo 1;?>&busqueda=<?php echo $busqueda;?>">|<</a></li>
            <li><a href="?pagina=<?php echo $pagina-1;?>&busqueda=<?php echo $busqueda;?>"><<</a><li>

            <?php
             }
            for($i=1; $i <= $total_paginas; $i++){

                if($i == $pagina){
                    echo '<li class="page-select">'.$i.'</li>';
                }else{
                    echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
                }
                
            }

            if($pagina != $total_paginas){

            
            ?>
            
    
            <li><a href="?pagina=<?php echo $pagina+1;?>&busqueda=<?php echo $busqueda;?>">>></a></li>
            <li><a href="?pagina=<?php echo $total_paginas;?>&busqueda=<?php echo $busqueda;?>">>|</a></li>
        <?php } ?>
        </ul>
        
    </div>

    <?php
    }
    ?>
    </div>

    </section>

    <script src="./js/menu_mov.js"></script>
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>



