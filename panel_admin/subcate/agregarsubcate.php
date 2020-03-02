<?php
//require './scripts/conectaS.php';
include("../../conexiones/db.php");
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subcategorías</title>
    <link rel="stylesheet" href="../../menu-gestion/css/estilo_menu.css">
    <link rel="stylesheet" href="../css/subcate.css">
    <link rel="stylesheet" href="../../estilos/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">

</head>

<body>
    
    
   
    <div id="container">
        <?php include 'menu-lateral.php'; ?>
        <form id="form_principal" action="guardarsubcategoria.php" enctype="multipart/form-data" method="POST" onsubmit="return validar()";>
            <label> <?php echo $numero ?> </label>
            <input type="hidden" id="code" name="code" class="form-control" value='<?php echo $numero; ?>'>
            <h4> Seleccione categoría</h4>
            <div class="col-sm-8">
            <select name="cbx_categoria" id="cbx_categoria" class="custom-select my-1 mr-sm-2" autofocus>
                <!--<option value="cbx_categoria"></option>-->
                <?php

                    $query = "SELECT nombre_categoria_forzz , id_cat_forzz  FROM categoria_forzz ORDER BY nombre_categoria_forzz";
                    $resultado = $con_admin->query($query);
                    while ($row = $resultado->fetch_assoc()) {
                        // $n_cbx_categoria = $_POST['nombre_cbx_categoria'];
                        ?>
                <option value="<?php echo $row['id_cat_forzz'];  ?>"><?php echo $row['nombre_categoria_forzz']; ?>
                </option>
                <?php

                    }
                    //  mysqli_close($con);
                    ?>
            </select>
            </div>
            <h6 id="demo"></h6>
            <div class="form-group">
                <label for="sku" id="lblsku">Agregar nombre subcategoria</label>
                <div class="col-sm-8">
                    <input id="codigo" name="codigo" type="text" autocomplete="off" maxlength="28" class="form-control" required>
                </div>
            </div>

            <div class="form-group" id="btn">
                <input  id="btn_guardar" type="submit" class="btn btn-primary" value="Publicar" name="Publicar">
            </div>

        </form>
        </div>
    
        <script src="../js/menu_mov.js"></script>
        <script src="../js/jquery.js"></script>
     
     
        
        <script type="text/javascript">
        function validar() {
            //obteniendo el valor que se puso en campo text del formulario
            miCampoTexto = document.getElementById("codigo").value;
            //la condición
            if (miCampoTexto.length == 0) {
                return false;
            }
            return true;
        }
    </script>

</body>

</html>