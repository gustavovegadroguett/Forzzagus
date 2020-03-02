<?php
//require './scripts/conectaS.php';
include("../../conexiones/db.php");

error_reporting(0);

if (isset($_POST['codigo']) != "") {

    $var = $_POST['codigo'];
    $sql = "SELECT sku_producto_id as id, precio_prod_forzz as precio from productos_forzz WHERE productos_forzz.sku_producto_id = ?  ";
    $stmt = mysqli_prepare($con, $sql);
    $stmt->bind_param('s', $var);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) exit('No hay producto');
    while ($row = $result->fetch_assoc()) {

        // , ".$row['Pro_Imagen']."
        //captura el precio
        $numero = $row['id'];

        $precio = $row['precio'];
        $separadormiles = number_format($precio, 0, '', '.');
    }
} else {

    $disabled =   "disabled='disabled'";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="../estilos/main_form.css">
    <!--<link rel="stylesheet" href="estilos/formulario_forzza.css">-->
    <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    <header>
        <div class="contenedor-header">
            <a href="./index.php">
                <figure class="contenedor-logo-title">
                    <img src="../img/logo_forzza.png" alt="paper-plane">

                </figure>
            </a>

            <!-- <input type="checkbox" id="btn-menu">
            <label for="btn-menu" class="icon-menu"></label> -->
            <?php include '../menu_form.php'; ?>
        </div>
    </header>
    <form action="" enctype="multipart/form-data" method="POST" id="form_principal">
        <div class="form-group">
            <h3 class="col-sm-offset-2 col-sm-8 text-center" id="titulo">Productos Forzza</h3>
        </div>
        <br>
        <hr>
        <br>

        <div class="form-group" id="conetendor_sku">
            <label for="sku" id="lblsku">SKU</label>
            <div class="col-sm-8">
                <input id="codigo" name="codigo" type="text" autocomplete="off" maxlength="20" class="form-control" autofocus required style="width:200px ;border: 1px solid #000;">
            </div>
        </div>


        <div class="col-sm-offset-2 col-sm-8">
            <input id="btn_guardar" type="submit" class="btn btn-primary" value="Buscar" name="Buscar">
        </div>



    </form>


    <form action="eliminar_cat.php" enctype="multipart/form-data" method="POST" id="">
        <label> <?php echo $numero ?> </label>
        <input type="hidden" id="code" name="code" value='<?php echo $numero ?>'>
        <select name="marca" id="marca" class="custom-select my-1 mr-sm-2">
                
                    <?php

                    $query = "SELECT id_cat_pro_forzz as id, sku_pro_forzz as producto, categoria_forzz.nombre_categoria_forzz as categoria FROM categoria_pro_forzz INNER JOIN categoria_forzz on categoria_forzz.id_categoria_forzz = categoria_pro_forzz.id_cat_pro_forzz WHERE sku_pro_forzz = ?";
                    $stmt4 = mysqli_prepare($con, $query);
                    $stmt4->bind_param('s', $numero);
                    $stmt4->execute();
                    $result4 = $stmt4->get_result();
                  
                    while ($row = $result4->fetch_assoc()) {
                        // $n_marca = $_POST['nombre_marca'];
                        ?>
                    <option value="<?php echo $row['id'];  ?>"><?php echo $row['categoria']; ?>
                    </option>
                    <?php

                    }
                    //  mysqli_close($con);
                    ?>
                </select>

        <div class="col-sm-offset-2 col-sm-8">
            <input id="btn_guardar" type="submit" class="btn btn-primary" value="Publicar" name="Publicar" <?php echo $disabled; ?>>
        </div>

    </form>

</body>

<script src="../js/main_form.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/main.js"></script>

<script>
    function format(input) {
        var num = input.value.replace(/\./g, '');
        if (!isNaN(num)) {
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            num = num.split('').reverse().join('').replace(/^[\.]/, '');
            input.value = num;
        } else {
            alert('Solo se permiten numeros');
            input.value = input.value.replace(/[^\d\.]*/g, '');
        }
    }
</script>


<script>
    //---------------------script select marca / modelo------------------------//
    $(document).ready(function() {
        $("#marca").change(function() {
            $('#modelo').find('option').remove().end().append('<option value="whatever"></option>').val(
                'whatever');
            $("#marca option:selected").each(function() {
                nombre_marca = $(this).val();
                $.post("getModelo.php", {
                    nombre_marca: nombre_marca
                }, function(data) {
                    $("#modelo").html(data);
                });
            });
        })
    });
</script>

<script>
    if ($("#marca option:selected").val() == "Marca Vehículo") {
        alert("Debe Seleccionar una categoria");
        return false;
    }
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#archivo').change(function() {
            var fp = $("#archivo");
            var lg = fp[0].files.length; // get length
            var items = fp[0].files;
            var fileSize = 0;

            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    fileSize = fileSize + items[i].size; // get file size
                }
                if (fileSize > 20097152) {
                    alert('El tamaño de los  20 MB');
                    $('#archivo').val('');
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $("#archivo").on("change", function() {
        if ($("#archivo")[0].files.length > 3) {
            alert("Solo puedes subir maximo 3 imagenes");
            $('#archivo').val('');
        } else {
            $("#imageUploadForm").submit();
        }
    });
</script>


<script>
    function validate() {
        var uploadImg = document.getElementById('archivo');
        //uploadImg.files: FileList
        for (var i = 0; i < uploadImg.files.length; i++) {
            var f = uploadImg.files[i];
            if (!endsWith(f.name, 'jpg') && !endsWith(f.name, 'png')) {
                alert(f.name + " No es un archivo valido");
                $('#archivo').val('');
                return false;

            } else {
                return true;

            }
        }
    }

    function endsWith(str, suffix) {
        return str.indexOf(suffix, str.length - suffix.length) !== -1;
    }
</script>


</body>




<script>
    function validaNumericos(event) {
        if (event.charCode >= 48 && event.charCode <= 57) {
            return true;
        }
        return false;
    }
</script>



</html>