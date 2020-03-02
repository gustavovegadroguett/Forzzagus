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
    <title>Listado Productos</title>
    <link rel="stylesheet" href="../estilos/listar_producto.css">
    <link rel="stylesheet" href="../menu-gestion/css/estilo_menu.css">
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
</head>

<body>




<section id="container">
    <?php include 'menu-lateral.php'; ?>
    <h2>Lista de Productos Forzza</h2>
    <!-- <a href="formulario_forzza.php" class="btn_new">Subir Producto</a> -->
    
   
    <div class="cont-tabla">
        <div class="cont-form">
    <form action="buscar_pro.php" method="GET" class="form_search">
        <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
        <input type="submit" value="Buscar" class="btn_search">
    </form>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Precio Anterior</th>
            <th>Precio Oferta</th>
            <th>En Oferta</th>
            <th>Imagen Producto</th>
            

        </tr>

        <?php 
     
        //paginador
        $sql_registros = mysqli_query($conexion, "SELECT COUNT(*) AS total_registro FROM productos_forzz");
        $result_registros = mysqli_fetch_array($sql_registros);
        $total_registro = $result_registros['total_registro'];

        $por_pagina = 10;

        if(empty($_GET['pagina'])){

            $pagina = 1;
        }else{
            $pagina = $_GET['pagina'];
        }

        $desde = ($pagina-1) * $por_pagina;
        $total_paginas = ceil($total_registro / $por_pagina);

        $query = mysqli_query($conexion, "SELECT sku_producto_id as id , nombre_prod_forzz as nombre, marca_pro_forzz as marca, precio_prod_forzz as precioant,  precio_anterior_forzz as precioferta, oferta_pro_forzz as oferta, ruta_forzz as ruta 
                                            FROM productos_forzz  
                                            INNER JOIN fotos on fotos.id_pro_forzz = productos_forzz.sku_producto_id ORDER BY id ASC LIMIT $desde, $por_pagina ;");

        $result = mysqli_num_rows($query);

         if($result > 0){
            while($data = mysqli_fetch_array($query)){

                ?>

                <tr>
                    <td><?php echo $data["id"]?></td>
                    <td><?php echo $data["nombre"]?></td>
                    <td><?php echo $data["marca"]?></td>
                    <td><?php echo $data["precioant"]?></td>
                    <td><?php echo $data["precioferta"]?></td>
                    <td><?php echo $data["oferta"]?></td>
                    <td><img src="<?php echo $data['ruta'] ?>"  alt="" title="caluga 1"></td>
                    
                   
                </tr>


                    <?php 
                }
            }
            ?>
    </table>

    <div class="cont-pag">
    
    <div class="paginador">
        <ul>
            <?php
             if($pagina != 1){

             
            
            ?>
            <li><a href="?pagina=<?php echo 1;?>">|<</a></li>
            <li><a href="?pagina=<?php echo $pagina-1;?>"><<</a><li>

            <?php
             }
            for($i=1; $i <= $total_paginas; $i++){

                if($i == $pagina){
                    echo '<li class="page-select">'.$i.'</li>';
                }else{
                    echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                }
                
            }

            if($pagina != $total_paginas){

            
            ?>
            
            <li><a href="?pagina=<?php echo $pagina+1;?>">>></a></li>
            <li><a href="?pagina=<?php echo $total_paginas;?>">>|</a></li>
        <?php } ?>
        </ul>
        
    </div>
    </div>
    </div>

    </section>
   

    <script src="./js/menu_mov.js"></script>
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</body>
</html>



