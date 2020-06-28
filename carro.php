<?php
    include 'header.php';
?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carrito.css">
    <title>Document</title>
    <script src="js/carrito2.js"></script>
</head>

<body>














    <div class="contenedorcarro">


        <div class="contenedorradio">




            <div class="divradiodomicilio"> <input type="radio" id="raddomicilio" name="despacho" value="domicilio"
                    checked>
                <label for="domicilio">Despacho a domiclio</label></div>


            <div class="divradioretiro"><input type="radio" id="raddomicilio" name="despacho" value="domicilio">
                <label for="domicilio">Retiro en tienda</label></div>

        </div>




        <div class="contenedorproductoscarros">

            <div class="contedoramarilloproducto">

                <div class="imagenespro">

                    <img src="./img/alicate.png">


                </div>

                <div class="datosletras">


                    <p>MARCA</p>
                    <p>NOMBRE</p>
                        <h6>CODIGO</p>

                        <p>DESCRIPCION......</p>

                        <a href="">Eliminar producto</a>
                </div>


                <div class="divprecioycantidad">
                        <div class="precioso">
                        <h1> $ 100.000<h1>

                        </div>

                        <div class="cantidad">
                        <div class="control_cant_general" id="control_cant_general">
                            <button class="control_cantidad" id="disminuye"> - </button>
                            <input type="text" class="cantidad_prod" id="cantidad_prod" value="1"> </input>
                            <button class="control_cantidad" id="aumento"> + </button>
                         </div> 

                    </div>
                        </div>




                
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