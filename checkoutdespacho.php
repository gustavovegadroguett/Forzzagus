<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css\checkcout.css">
  
  <title>CHECKOUT</title>
  <?php include 'header.php'  ;  ?>
</head>

<body class="body">

  

  <div class="contencheckout">
    <div class="contenedorgris">
      <form id="form-checkout" action="" method="POST" class="was-validated">
        <input type="hidden" id="token_ws" name="token_ws" value="">
        <div class="quedocumentonecesita">
          <p class="documentonecesita">¿QUÉ DOCUMENTO NECESITA?</p>
        </div>
        <div class="contenradiooo">
          <div class="boletaaa">
            <div class="radboleta">
              <input type="radio" name="facturacion" id="radiofactura" value="1" checked class="tamanoradio">
              <p>BOLETA</p>
            </div>
          </div>
          <div class="facturaa">
            <div class="radfactura">
              <input type="radio" name="facturacion" value="2" class="tamanoradio">
              <p>FACTURA</p>
            </div>
          </div>
        </div>
        <input type="hidden" id="choicehidden">

        <div id="datoss">
          <!--datos-->


          <div class="datosboletaamarillo">
            <p>DATOS BOLETA</p>
          </div>

          <div class="contenedordatosdelaboleta">

            <div class="caja1boleta">
              <div class="cajitacont1">
                <div>*NOMBRE/R.SOCIAL</div>
                <input type="text" id="nombre" name="nombre">
              </div>

              <div class="cajitaconta2">
                <div>*Email</div>
                <input type="text" id="emailDatos" name="email">
              </div>
            </div>

            <div class="caja2boleta">
              <div class="cajitacont3">
                <div>*RUT</div>
                <input type="text" id="rut" name="rut">
              </div>
              <div class="cajitaconta4">
                <div>TELÉFONO</div>
                <input type="text" id="telefono" name="telefono">
              </div>
            </div>
          </div>


          <!--Fin Contenedor Boleta-->

          <!-- Aqui aparece y desaparecen los datos de factura segun el radio buton que seleccionen -->
          <div id="contenedorFactura">

          </div>

          <!--AKI-->

          <div class="seccionRecibe">
            <p>¿QUIÉN RECIBIRÁ TU COMPRA?</p>
          </div>

          <div class="contenedorquienrecibe">


            <div class="radyo">
              <input type="radio" name="recibe" value="1" checked class="tamanoradio">
              &nbsp
              <p>YO</p>
            </div>



            <div class="radconserje">
              <input type="radio" name="recibe" value="2" class="tamanoradio"> &nbsp
              <p>DEJAR EN CONSERJERÍA</p>
            </div>


            <div class="radotro">
              <input type="radio" name="recibe" id="otroradio" value="3" class="tamanoradio">
              &nbsp
              <p>OTRO<p>

            </div>
            <div></div>
            <div></div>
            <div class="cajitachica" id="otroretiro">



            </div>

          </div>

          <div class="datosdespachoamarillo">

            <P>LLENA ESTOS DATOS, PARA TU DESPACHO</P>


          </div>

          <div class="contnedordireccion">
            <div class="contdes1">

              <div class="contdireccion">
                <p>*DIRECCION</p> &nbsp &nbsp <input type="text" id="direccion" name="direccion">
              </div>

              <div class="contcombociudad">*CIUDAD &nbsp &nbsp <select id="ciudad">
                  <option value="IQUIQUE">IQUIQUE</option>

                </select></div>

            </div>
            <div class="contdes2">


              <div class="contnumero">
                <p>*NUMERO</p> &nbsp &nbsp <input type="text" id="numerodir" name="numerodir">
              </div>

              <div class="contcomuna">*COMUNA &nbsp &nbsp <select id="comuna">
                  <option value="IQUIQUE">IQUIQUE</option>
                  <option value="IQUIQUE">ALTO HOSPICIO</option>

                </select></div>

            </div>

          </div>

          <div class="detalleamarillo">
            <p>DETALLE</p>
          </div>
         

          <div class="contdetalle">
            <div class="cajaletrascantde">
              <div class="contcantidad">CANT</div>
              <div class="contnombrepro">PRODUCTOS</div>
              <div class="contpreciouni">PRECIO UNIT</div>
              <div class="contsubtotal">SUB TOTAL</div>
            </div>

            <!-----------Insercion de datos desde respueta metodo AJAX en checkout.js -->
            <div id="listadoproducto">
            
            </div> 
            <div class="cajatotalll">


          <p>TOTAL:&nbsp</p>

            <div id="totalpago" class="totalsillo"></div>

            </div>
          </div>
        </div>

        

        <div class="amarillomediodepago">
          <p>SELECCIONA MEDIO DE PAGO</p>
        </div>

        <div class="contenedormediosdepago">
          
          <div class="mediosdepagoorden">
            <div class="cuadritowebpay">
              <div class="cuadritoradiowebpay">
                <input type="radio" id="radiowebpay" name="medio" value="WEBPAY" checked>
              </div>
              <div class="contenedorimagenmedio"> <img src="img/webpay.png" class="imgi"></div>
              <div class="totalwebpay">
                <div class="totalwebpaydato">$<?php echo"$totalWebPay"; ?> </div>
              </div>
            </div>

            <div class="cuadritotransferencia">
              <div class="cuadritoradiotransferencia">
                <input type="radio" id="radiotransfer" name="medio" value="2">
              </div>
              <div class="contenedorimagenmedio">
                <img src="img/transferencia.jpg" class="imgi">

              </div>
              <div class="totaltranferencia">
                <div class="totaltransferenciadato">$<?php echo"$totalTransferencia"; ?> </div>
              </div>
            </div>
          </div>

          <div class="conterminosycondi">
            <div class="checkboxcondiciones"><input type="checkbox" id="terminos" name="terminos" value="1"></div>
            <div class="terminoscondiciones">Declaro conocer y aceptar los <a href="#"> términos y
                condiciones</a> y <a href="#">políticas de privacidad y seguridad</a></div>



          </div>
        </div>

 
        <div class="contedorbonotesdepago">
          
          <div> <button type="button" class="volver btn-info" onclick="window.location.href='cart.php'">Volver</button></div>
          
          <div id="botonenvio" class="botonenvio"> </input></div>
         

        </div>

      </form>



    </div>


  </div>







                   
  </div>







  <?php include 'nuevofooter.php' ;?>
</body>



<script src="js/checkout.js"></script>

</html>