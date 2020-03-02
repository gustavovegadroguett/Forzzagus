<?php

    include ("../conexiones/db.php");

    //capturar variables con $_request enviadas desde los formularios POST.
    $accion = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:''; 
    if($action == 'ajax'){   
        include ("paginacion.php");

        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //la cantidad de registros que desea mostrar
		$adjacents  = 4; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM productos_forzz ");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
        $reload = 'index_img.php';
        
        $query = mysqli_query($con, "SELECT sku_producto_id as code, nombre_prod_forzz as name, modelo_prod_forzz as modelo, 
                                            marca_pro_forzz as marca, precio_prod_forzz as price, fotos.ruta_forzz as ruta, 
                                            cant_prod_forzz as cantidad, id_img_forzz as id_img, descripcion_pro_forzz as descripcion, 
                                            especification_prod_forzz as especificacion 
                                    FROM productos_forzz 
                                    INNER JOIN fotos on fotos.id_pro_forzz = productos_forzz.sku_producto_id 
                                 LIMIT $offset,$per_page");

        if ($numrows>0) {
            ?>
        

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SKU</th>
                    <th>Nombre</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Ruta</th>
                    <th>Cantidad</th>
                    <th>Img</th>
                    <th>Descripcion</th>
                    <th>Especificaciones</th>
               
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                
                    <tr>
                        <td><?php echo $row['code']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['modelo']; ?></td>
                        <td><?php echo $row['marca']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['ruta']; ?></td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td><?php echo $row['id_img']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['especificacion']; ?></td>
                        <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" 
                        data-code="<?php echo $row['code']?>" 
                        data-name="<?php echo $row['name']?>" 
                        data-modelo="<?php echo $row['modelo']?>" 
                        data-marca="<?php echo $row['marca']?>" 
                        data-price="<?php echo $row['price']?>"
                        data-ruta="<?php echo $row['ruta']?>"
                        data-cantidad="<?php echo $row['cantidad']?>"
                        data-id_img="<?php echo $row['id_img']?>"
                        data-descripcion="<?php echo $row['descripcion']?>"
                        data-especificacion="<?php echo $row['especificacion']?>"> <i class='glyphicon glyphicon-edit'></i> Modificar</button>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $row['code']?>"  ><i class='glyphicon glyphicon-trash'></i> Eliminar</button>
                        </td>
                    </tr>

                    <?php
                    } 
                    ?>
            </tbody>
        </table>
        <div class="table-pagination pull-right">
            <?php echo paginate($reload, $page, $total_pages, $adjacents); ?>

        </div>

        <?php

        } else {

        ?>

           <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
			<?php
		}
	}
?>

