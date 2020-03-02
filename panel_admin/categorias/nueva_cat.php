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
    <link rel="stylesheet" href="../../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../css/nueva_cat.css">
    <link rel="stylesheet" href="../../menu-gestion/css/estilo_menu.css">
    <!--<link rel="stylesheet" href="estilos/formulario_forzza.css">-->
    <script src="https://kit.fontawesome.com/abd8ad106c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
    

</head>

<body>

  <div id="container">
    <?php include 'menu-lateral.php'; ?>
   
<section class="form_cat">
    <form action="guardar-nuevacat.php" enctype="multipart/form-data" method="POST" id="form_principal">
        <div class="form-group">
            <h4 class="col-sm-offset-2 col-sm-8 text-center" id="titulo">Categorías Forzza</h4>
        </div>
        <br>
        <hr>
        <br>

        <div class="form-group" id="conetendor_id_cat">
            <label for="id_cat" id="lbl_sku">ID Nueva Categoría</label>
            <div class="col-sm-8">
                <input id="id_ncat" name="id_ncat" type="text" autocomplete="off" maxlength="3" class="form-control" autofocus required style="width:200px ;border: 1px solid #000;">
            </div>
        </div>
        <br>
        <div class="form-group" id="conetendor_ncat">
            <label for="ncat" id="lbl_sku">Nombre Nueva Categoría</label>
            <div class="col-sm-8">
                <input id="ncat" name="ncat" type="text" autocomplete="off" maxlength="30" class="form-control" autofocus required style="width:200px ;border: 1px solid #000;">
            </div>
        </div>

        <div class="col-sm-offset-2 col-sm-8" id="contenedor-btn">
            <input id="btn_guardar" type="submit" class="btn btn-primary" value="AGREGAR" name="Buscar">
        </div>

        <label><?php //echo $numero ?></label>



    </form>
    </section> 
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../menu-gestion/js/menu_mov.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-3.2.1.min.js"></script>




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