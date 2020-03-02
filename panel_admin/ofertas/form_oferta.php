<?php
//require './scripts/conectaS.php';
include("../../conexiones/db.php");
error_reporting(0);

if (isset($_POST['codigo']) != "") {

    $var = $_POST['codigo'];
    $sql = "SELECT sku_producto_id as id, precio_prod_forzz as precio from productos_forzz WHERE productos_forzz.sku_producto_id = ?  ";
    $stmt = mysqli_prepare($con,$sql);
    $stmt ->bind_param('s',$var);
    $stmt ->execute();
    $result = $stmt->get_result();
    if($result->num_rows==0) exit('No hay producto');
    while($row = $result->fetch_assoc()){
    // , ".$row['Pro_Imagen']."
    //captura el precio
    $numero = $row['id'];
    
    $precio = $row['precio'];
    $separadormiles = number_format($precio, 0, '', '.');
    }

} else { 

    $disabled =   "disabled='disabled'" ;

}
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
    <link rel="stylesheet" href="../css/ofertas.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">

</head>

<body>
<div class="container">
    <?php include 'menu-lateral.php';?>

    <form action="" enctype="multipart/form-data" method="POST" id="form_principal">
        <div class="form-group">
            <h4 class="col-sm-offset-2 col-sm-8 text-center" id="titulo_sale">Ofertas Forzza</h4>
        </div>
        <br>
        <hr>
        <br>

        <div class="form-group" id="conetendor_sku">
            <label for="sku" id="lblsku">SKU</label>
            <div class="col-sm-8">
                <input id="codigo" name="codigo" type="text" autocomplete="off" maxlength="20" class="form-control"
                    autofocus required style="width:200px ;border: 1px solid #000;">
            </div>
        </div>


        <div class="col-sm-offset-2 col-sm-8">
            <input id="btn_guardar" type="submit" class="btn btn-primary" value="Buscar" name="Buscar">
        </div>
        <br>
    </form>
    <br>
    <form action="guardar_oferta.php" enctype="multipart/form-data" method="POST" id="form_principal">
        <label class="id_pro"># ID Producto : </label><h4><?php echo $numero ?></h4> 
        <br>
        <input type="hidden" id="code" name="code" value='<?php echo $numero ?>'>
        <div class="form-group" id="contenedor_marca">
            <label for="marca"  id="lbloferta">INGRESAR OFERTA</label>
            <div class="col-sm-8">
                <select name="oferta" id="oferta" class="custom-select my-1 mr-sm-2">

                    <option value="SI">SI</option>
                    <option value="NO">NO</option>

                </select>
            </div>
        </div>

        <div class="form-group" id="conetendor_sku">
            <label for="sku" id="lblsku">PRECIO</label>
            <div class="col-sm-8">
                <input id="precioant" name="precioant" type="text" autocomplete="off"
                    value="<?php  echo $separadormiles ; ?>" maxlength="20" class="form-control" readonly
                    autofocus required style="width:200px ;border: 1px solid #000;">
            </div>
        </div>

        <div class="form-group" id="conetendor_sku">
            <label for="sku" id="lblsku">PRECIO OFERTA</label>
            <div class="col-sm-8">
                <input id="precioof" name="precioof" onkeyup="format(this)" onchange="format(this)" type="text"
                    autocomplete="off" maxlength="20" class="form-control" autofocus required
                    style="width:200px ;border: 1px solid #000;">
            </div>
        </div>

        <div class="col-sm-offset-2 col-sm-8">
            <input id="btn_guardar" type="submit" class="btn btn-primary" value="Publicar" name="Publicar"
                <?php echo $disabled; ?>>
        </div>
        <br>

    </form>
</div>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../menu-gestion/js/menu_mov.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>





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
        $(document).ready(function () {
            $("#marca").change(function () {
                $('#modelo').find('option').remove().end().append('<option value="whatever"></option>')
                    .val(
                        'whatever');
                $("#marca option:selected").each(function () {
                    nombre_marca = $(this).val();
                    $.post("getModelo.php", {
                        nombre_marca: nombre_marca
                    }, function (data) {
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
        $(document).ready(function () {
            $('#archivo').change(function () {
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
        $("#archivo").on("change", function () {
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

    <script>
        function validaNumericos(event) {
            if (event.charCode >= 48 && event.charCode <= 57) {
                return true;
            }
            return false;
        }
    </script>

</body>

</html>