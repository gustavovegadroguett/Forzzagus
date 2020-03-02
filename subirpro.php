<?php

include("./conexiones/db.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir producto</title>
    <h3>PRODUCTO</h3>
    <form action="resise2.php" enctype="multipart/form-data" method="POST">

        Codigo:<input id="codigo" name="codigo" type="text" autocomplete="off" maxlength="15" class="form-control" required><br>
        Nombre: <input id="nombre" name="nombre" type="text" autocomplete="off" maxlength="50" class="form-control" required><br>
        Categoria:<select name="marcax" id="marcax" class="btn btn-default btn-file">
            <!--<option value="Marcax"></option>-->
            <?php

            $query = "SELECT id_categoria_forzz , nombre_categoria_forzz  FROM categoria_forzz ";
            $resultado = $con->query($query);
            while ($row = $resultado->fetch_assoc()) {
                // $n_marca = $_POST['nombre_marca'];
                ?>
            <option value="<?php echo $row['id_categoria_forzz'];  ?>"><?php echo $row['nombre_categoria_forzz']; ?>
            </option>
            <?php

            }

            ?>
        </select>
        <br>
        Marca : <select name="marca" id="marca" class="btn btn-default btn-file">
            <!--<option value="Marca"></option>-->
            <?php

            $query = "SELECT nombre_marca_forzz as nombre_marca FROM marca_forzz ORDER BY nombre_marca_forzz";
            $resultado = $con->query($query);
            while ($row = $resultado->fetch_assoc()) {
                // $n_marca = $_POST['nombre_marca'];
                ?>
            <option value="<?php echo $row['nombre_marca'];  ?>"><?php echo $row['nombre_marca']; ?>
            </option>
            <?php

            }
            mysqli_close($con);
            ?>
        </select>
        <br>

        Modelo: <input id="modelo" name="modelo" type="text" autocomplete="off" maxlength="30" class="form-control" required><br>
        Precio: <input id="precio" name="precio" type="text" autocomplete="off" maxlength="30" class="form-control" required><br>
        Descripcion: <br><textarea id="descripcion" name="descripcion" autocomplete="off" class="form-control" rows="10" cols="50" required></textarea><br>
        Especificaciones: <br><textarea id="especificaciones" name="especificaciones" autocomplete="off" class="form-control" rows="10" cols="50" required></textarea><br>


        <input name="archivo[]" type="file" accept="image/png, image/jpg, image/jpeg " multiple />

        <input id="btn_guardar" type="submit" value="Guardar" name="submit">




        <!--        <select name="categoria" id="categoria" class="btn btn-default btn-file" required>
            <option value="categoria"></option>-->
        <?php /*
                        
                        $query1 = "sELECT id_categoria_forzz as idcat, nombre_categoria_forzz as nombrecat FROM categoria_forzz ";
                            $resultado1=$con->query($query1);
                            while($row = $resultado1->fetch_assoc()) { 
                       // $n_marca = $_POST['nombre_marca'];
                          */  ?>
        <!-- <option value="<?php //echo $row['nombre_marca'];  
                            ?>"><?php //echo               $row['nombre_marca']; 
                                ?>-->
        <!--</option>-->
        <?php




        //} 
        //mysqli_close($con);
        ?>
        </select>

    </form>
</head>

<body>

</body>

</html>