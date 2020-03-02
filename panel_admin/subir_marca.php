<?php
//require './scripts/conectaS.php';
include("../conexiones/db.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir Marca</title>
    <link rel="stylesheet" href="../estilos/formulario_forzza.css">
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../menu-gestion/css/estilo_menu.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">

    
</head>

<body>

<div id="container">
<?php include 'menu-lateral.php'; ?>
    <form action="guardarmarca.php" enctype="multipart/form-data" method="POST" id="form_principal_marca">
        
            <h3 class="col-sm-offset-2 col-sm-8 text-center" id="titulo">Marcas Forzza</h3>
      
        <br>
        <hr>
        <br>
        <div class="form-group" id="contenedor_marcas">
            <label for="marca" id="lblsku">Nombre Marca</label>
            <div class="col-sm-8">
                <input id="codigo" name="codigo" type="text" autocomplete="off" maxlength="20" class="form-control" autofocus required>
            </div>
        </div>

        
        <br>
        <div class="form-group" id="btn">
            <input id="btn_guardar" type="submit" class="btn btn-primary" value="Guardar" name="submit">
        </div>
    </form>
</div>
    


<script src="../menu-gestion/js/menu_mov.js"></script>
<script src="./js/jquery.js"></script>
<script src="./js/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script>
    $("#file").change(function () {
        $("#seleccionar-archivos").text(this.files.length + " Archivos cargados");
    });

    $("#seleccionar-archivos").click(function () {
        $("#files").click();
    })
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



<!--valida tamaño imagenes-->

<script type="text/javascript">
    $(document).ready(function(){
        $('#archivo').change(function(){
               var fp = $("#archivo");
               var lg = fp[0].files.length; // get length
               var items = fp[0].files;
               var fileSize = 0;
           
           if (lg > 0) {
               for (var i = 0; i < lg; i++) {
                   fileSize = fileSize+items[i].size; // get file size
               }
               if(fileSize > 20097152) {
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
       if (!endsWith(f.name, 'jpg') && !endsWith(f.name,'png')) {
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