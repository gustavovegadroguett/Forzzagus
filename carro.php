<?php
    include 'header.php';
?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carro.css">
    <title>Document</title>
    <script src="js/carrito2.js"></script>
</head>

<body>
    <div class="contenedorcarro">

 
        <div class="contedoramarilloproducto">

            <div class="imagenespro">

                <img src="./img/alicate.png">

            </div>

            <div class="datosletras">
                <DIV>MARCA</DIV>
                <div></div>
                <DIV>NOMBRE</DIV>
                <div></div>
                <DIV>CODIGO</DIV>
                <div></div>
                <DIV>DESCRIPCION</DIV>
                <div></div>
                <div><button type="button" class="eliminar btn-danger">Eliminar producto</button> </div>

            </div>


            
                <div class="cantidad">
                    <div class="control_cant_general" id="control_cant_general">
                        <button class="control_cantidad" id="disminuye"> - </button>
                        <input type="text" class="cantidad_prod" id="cantidad_prod" value="1"> </input>
                        <button class="control_cantidad" id="aumento"> + </button>
                    </div>

                </div>
            
            <div class="precioso">
                    <h1>$ 100.000<h1>

                </div>

        </div>


    </div>


    </div>

    </div>

</body>

</html>














<?php
//include "newslettter.php";
include "nuevofooter.php";
?>