<?php
//require './scripts/conectaS.php';
include("../../conexiones/db.php");
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../../menu-gestion/css/estilo_menu.css">
    <link rel="stylesheet" href="../css/subcate.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">


</head>

<body>
<?php include 'menu-lateral.php';?>

<div class="container">
   
    <form action="" enctype="multipart/form-data" method="POST" id="form_principal">
        <div class="form-group">
            <h4 class="col-sm-offset-2 col-sm-8 text-center" id="titulo">Segunda Subcategoría Forzza</h4>
        </div>
        <br>
        <hr>
  
    </form>
    
    <br>
    <form action="guardar_tipo_producto.php" enctype="multipart/form-data" method="POST" onsubmit="return validar()" id="form_principal";>
        <label> <?php echo $numero ?> </label>
        <input type="hidden" id="code" name="code" value='<?php echo $numero ?>'>
        <h4>Seleccione el tipo de producto para añadir una segunda sub categoría</h4>
        <h6>En este apartado se asignan los tipos de productos a las sub categorias</h6>
        <br>
        <select name="cbx_tipo" id="cbx_tipo" class="custom-select my-1 mr-sm-2">
            <!--<option value="cbx_categoria"></option>-->
            <?php

                    $query = "SELECT nombre_tipo_producto , id_tipo_pro  FROM tipo_producto ORDER BY nombre_tipo_producto";
                    $resultado = $con->query($query);
                    while ($row = $resultado->fetch_assoc()) {
                        // $n_cbx_categoria = $_POST['nombre_cbx_categoria'];
                        ?>
            <option value="<?php echo $row['id_tipo_pro'];  ?>"><?php echo $row['nombre_tipo_producto']; ?>
            </option>
            <?php

                    }
                    //  mysqli_close($con);
                    ?>
        </select>
    
        <select name="cbx_categoria" id="cbx_categoria" class="custom-select my-1 mr-sm-2">
            <!--<option value="cbx_categoria"></option>-->
            <?php

                    $query = "SELECT nombre_sub_forzz , id_sub_forzz  FROM sub_categoria_forzz  ORDER BY nombre_sub_forzz";
                    $resultado = $con->query($query);
                    while ($row = $resultado->fetch_assoc()) {
                        // $n_cbx_categoria = $_POST['nombre_cbx_categoria'];
                        ?>
            <option value="<?php echo $row['id_sub_forzz'];  ?>"><?php echo $row['nombre_sub_forzz']; ?>
            </option>
            <?php

                    }
                    //  mysqli_close($con);
                    ?>
        </select>
        <!-- <div>Selecciona subcategoria: <select name="cbx_subcategoria" id="cbx_subcategoria" onchange="myFunction()" ></select></div>-->
        <h6 id="demo"></h6>

            <div class="col-sm-offset-2 col-sm-8">
                <input id="btn_guardar" type="submit" class="btn btn-primary" value="Publicar" name="Publicar">
            </div>

    </form>

    </div>

   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../menu-gestion/js/menu_mov.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>

    <script language="javascript">
        $(document).ready(function () {
            $("#cbx_categoria").change(function () {

                //	$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

                $("#cbx_categoria option:selected").each(function () {
                    id_cat = $(this).val();
                    $.post("includes/get_subcat.php", {
                        id_categoria_forzz: id_cat
                    }, function (data) {
                        $("#cbx_subcategoria").html(data);
                    });
                });
            })
        });


    </script>

    <script>
        //habilitar 
        function myFunction() {
            document.getElementById("codigo").disabled = false;
        }
    </script>

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