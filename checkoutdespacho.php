<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css\checkcout.css">
  <title>CHECKOUT</title>
</head>

<body class="body">
  <?php include 'header2.php';
        require_once "./vendor/autoload.php";
        use Transbank\Webpay\Configuration;
        use Transbank\Webpay\Webpay;
        $transaction = (new Webpay(Configuration :: forTestingWebpayPlusNormal()))
               ->getNormalTransaction();   
        $ip_usuario=getenv("REMOTE_ADDR");
        $amount=(int)$_POST['total_compra'];
        $sessionId='sessionId';
        $buyOrder = strval(rand(10000,9999999));
        $urlReturn= 'http://192.168.0.138/forzza/retornoTransbank.php';
        $urlFinal= 'http://192.168.0.138/forzza/final.php';

        $initResult= $transaction->initTransaction(
            $amount,$sessionId,$buyOrder,$urlReturn,$urlFinal
        );
        
        $formAction= $initResult->url;
        $tokenWs=$initResult->token;


        ?>

  <div class="contencheckout">
    <div class="contenedorgris">
      <form id=form-checkout action="<?php echo $formAction ?>" method="POST" class="was-validated">
        <input type="hidden" name="token_ws" value="<?php echo $tokenWs ?>">
        <div class="quedocumentonecesita">
          <p class="documentonecesita">¿QUÉ DOCUMENTO NECESITA?</p>
        </div>
        <div class="contenradiooo">
          <div class="boletaaa">
            <div class="radboleta">
              <input type="radio" name="facturacion" value="1" checked class="tamanoradio">
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
          <!--AKI-->

          <div class="cajaamarillaquienrecibe">
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
              <input type="radio" name="recibe" value="3" class="tamanoradio">
              &nbsp
              <p>OTRO<p>

            </div>
            <div></div>
            <div></div>
            <div class="cajitachica">
              <div id="cajitachicanombre">*NOMBRE</div>
              <input type="text" id="nombrereceptor" name="nombrereceptor">
              <div id="cajitachicarut">*RUT</div>
              <input type="text" id="rutreceptor" name="rutreceptor">


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
          <?php
                        $i=1;
                        $total=0;
                        $total_count=$_POST['total_count'];
                        while($i<=$total_count){

                            $item_name_ = $_POST['item_name_'.$i];
                            $amount_ = $_POST['amount_'.$i];
                            $quantity_ = $_POST['quantity_'.$i];
                            $total=$total+$amount_ ;
                            $sql = "SELECT sku_producto_id FROM productos_forzz WHERE nombre_prod_forzz='$item_name_'";
                            $query = mysqli_query($con,$sql);
                            $row=mysqli_fetch_array($query);
                            $product_id=$row["sku_producto_id"];
                           
                            echo "	
                            <input type='hidden' name='prod_id_$i' value='$product_id'>
                            <input type='hidden' name='prod_price_$i' value='$amount_'>
                            <input type='hidden' name='prod_qty_$i' value='$quantity_'>
                            ";
                            $i++;
                        }
      ?>

          <div class="contdetalle">
                <div class="cajaletrascantde">
                  <div class="contcantidad">CANT</div>
                  <div class="contnombrepro">PRODUCTOS</div>
                  <div class="contpreciouni">PRECIO UNIT</div>
                  <div class="contsubtotal">SUB TOTAL</div>
                </div>

                <!-- Inicio row con datos de producto individual  -->
                <?php
                        $i=1;
                        $total=0;
                        $total_count=$_POST['total_count'];
                        while($i<=$total_count){

                            $item_name_ = $_POST['item_name_'.$i];
                            $amount_ = $_POST['amount_'.$i];
                            $quantity_ = $_POST['quantity_'.$i];
                            $total=$total+$amount_ ;
                            $subtotal=$amount_*$quantity_;
                            $sql = "SELECT sku_producto_id FROM productos_forzz WHERE nombre_prod_forzz='$item_name_'";
                            $query = mysqli_query($con,$sql);
                            $row=mysqli_fetch_array($query);
                            $product_id=$row["sku_producto_id"];
                           
                            echo "	
                            <input type='hidden' name='prod_id_$i' value='$product_id'>
                            <input type='hidden' name='prod_price_$i' value='$amount_'>
                            <input type='hidden' name='prod_qty_$i' value='$quantity_'>
                            <input type='hidden' name='prod_sub_$i' value='$subtotal'>
                            
                            <div class='itemDetalle' name='linea_$i'>
                            <div class='cantidadProd'>$quantity_</div>
                            <div class='nombreProducto'>$item_name_</div>
                            <div class='preunittxxx'>$amount_</div>
                            <div class='subtotalxxx'>$subtotal</div>
                            
                            </div><!-- FIN row con datos de producto individual  -->
                            ";
                            $i++;
                        }
               ?>

          </div>
        </div>
        
        <div class="cajatotalll">


          <p>TOTAL:&nbsp</p>
          <div class="totalsillo">
            <p>$14.990</p>
          </div>

        </div>

        <div class="amarillomediodepago">
          <p>SELECCIONA MEDIO DE PAGO</p>
        </div>










        <div class="contenedormediosdepago">



          <div class="contenres">
            <div class="contenedormonea">
              <div class="cuadritowebpay">



                <div class="cuadritoradiowebpay">
                  <input type="radio" name="medio" value="1" checked>
                </div>
                <div class="contenedorimagenmedio"> <img src="img/webpay.png" class="imgi"></div>
              </div>
              <div class="totalwebpay">
                <p>$16.990<p>
              </div>
            </div>



            <div class="contenedormonea">
              <div class="cuadritotransferencia">

                <div class="cuadritoradiotransferencia">
                  <input type="radio" name="medio" value="2">
                </div>
                <div class="contenedorimagenmedio">


                  <p>TRASNFERENCIA<p>
                      <div class="cuadrotransfeeee">
                        <img src="img/transferencia.jpg" class="imgi">


                      </div>

                </div>
              </div>
              <div class="totalwebpay">
                <p>$14.900<p>
              </div>

            </div>
          </div>
          <div class="conterminosycondi">
            <input type="radio" name="terminos" value="1">&nbsp<p>Declaro conocer y aceptar los <a href="#"> términos y
                condiciones</a> y <a href="#">políticas de privacidad y seguridad</a></p>



          </div>
        </div>


        <div class="contedorbonotesdepago">


          <button class="volver">VOLVER </button>


          <button class="pagar">PAGAR</button>

        </div>

      </form>



    </div>




  </div>







  <div class="lineaamarillaconnumeros">

    <div class="cuadrovacio">

    </div>
    <div class="mesacentral">
      <p class="letraarriba">MESA CENTRAL<p>
          <p class="numerotelefonooo">+569425555<p>
    </div>


    <div class="ventasss">
      <p class="letraarriba">VENTAS<p>
          <p class="numerotelefonooo">+569425555<p>
    </div>


    <div class="postventasss">

      <p class="letraarriba">POST VENTA<p>
          <p class="numerotelefonooo">+569425555<p>
    </div>

    <div class="soportetecnico">
      <p class="letraarriba">SOPORTE TECNICO<p>
          <p class="numerotelefonooo">+569425555<p>
    </div>

    <div class="cuadrovacio">

    </div>


  </div>

  </div>







  <?php include 'nuevofooter.php' ;?>
</body>





<script>
  (function () {
    var radios = document.getElementsByName('facturacion');
    console.log(radios);
    for (var i = 0; i < radios.length; i++) {
      radios[i].onclick = function () {
        var x = document.getElementById('choicehidden').innerText = this.value;
        let template = '';
        document.getElementById('choicehidden').innerText = this.value;
        /* alert(x);*/
        if (x == "2") {
          /*alert(" es 2");*/

          var codeBlock = '<div class="datosboletaamarillo"><p>DATOS FACTURA</p></div>' +

            '<div class="contenedordatosdelaboleta">' +


            '<div class="caja1boleta">' +

            '<div class="cajitacont1"><div>*NOMBRE/R.SOCIAL</div>  <input type="text" id="nombre" name="nombre"></div>' +

            '<div class="cajitaconta2"><div>*EMAIL</div>   <input type="text" id="emailDatos" name="email"></div>' +

            '</div>' +


            '<div class="caja2boleta">' +

            '<div class="cajitacont3"><div>*RUT</div>   <input type="text" id="rut" name="rut"></div>' +
            '<div class="cajitaconta4"><div>TELÉFONO</div>   <input type="text" id="telefono" name="telefono"></div>' +



            '</div>' +
            '</div>' +



            '<div class="cajaamarillaquienrecibe"><p>DATOS DE FACTURACIÓN</p></div>' +
            '<div class="contenedordatosfactura">' +
            '<div class="caja1fact">' +

            '<div class="cajitafac1"> <p>*GIRO</p>&nbsp<input type="text" id="giro" name="giro"></div>' +
            '<div class="cajitafact2"><p>*CIUDAD</p>&nbsp<input type="text" id="ciudadgiro" name="ciudadgiro"></div>' +

            '</div>' +
            '<div class="caja2fact">' +

            '<div class="cajitafacc1"><p>*DIRECCION</p>&nbsp<input type="text" id="dirgiro" name="dirgiro"></div>' +

            '<div class="cajitafacct2"><p>*COMUNA</p>&nbsp<input type="text" id="comugiro" name="comugiro"></div>' +

            '</div>' +
            '</div>' +

            '<div class="cajaamarillaquienrecibe"><p>¿QUIÉN RECIBIRÁ TU COMPRA?</p></div>' +

            '<div class="contenedorquienrecibe">' +


            '<div class="cajacontquien1">' +
            '<div class="radyo">' +
            '<input type="radio" name="recibe" value="1" checked class="tamanoradio">' +
            '&nbsp  ' +
            '<p>YO</p>' +
            '</div>' +

            '<div class="radconserje">' +
            '<input type="radio" name="recibe" value="2"  class="tamanoradio"> &nbsp ' +
            '<p>DEJAR EN CONSERJERÍA</p>' +
            '</div>' +
            '</div>' +

            '<div class="cajacontquien2">' +
            '<div class="radotro">' +
            '<input type="radio" name="recibe" value="3"  class="tamanoradio">' +
            '&nbsp' +
            '<p>OTRO<p>' +

            '</div>' +

            '<div class="cajitachica">' +
            '<p>*NOMBRE</p>&nbsp &nbsp' +
            '<input type="text" id="nombrereceptor" name="nombrereceptor">' +



            '</div>' +
            '<div class="cajitachica2">' +
            '<p>*RUT</p>&nbsp &nbsp' +
            '<input type="text" id="rutreceptor" name="rutreceptor">' +



            '</div>' +


            '</div>' +


            '</div>' +

            '<div class="datosdespachoamarillo">' +

            '<P>LLENA ESTOS DATOS, PARA TU DESPACHO</P>' +


            '</div>' +

            '<div class="contnedordireccion">' +
            '<div class="contdes1">' +

            '<div class="contdireccion"><p>*DIRECCION</p> &nbsp  &nbsp <input type="text" id="direccion" name="direccion"></div>' +

            '<div class="contcombociudad">*CIUDAD   &nbsp &nbsp  <select id="ciudad">' +
            '<option value="IQUIQUE">IQUIQUE</option>' +

            '</select></div>' +

            '</div>' +
            '<div class="contdes2">' +


            '<div class="contnumero"><p>*NUMERO</p> &nbsp  &nbsp <input type="text" id="numerodir" name="numerodir"></div>' +

            '<div class="contcomuna">*COMUNA   &nbsp &nbsp  <select id="comuna">' +
            '<option value="IQUIQUE">IQUIQUE</option>' +
            '<option value="IQUIQUE">ALTO HOSPICIO</option>' +

            '</select></div>' +

            '</div>' +

            '</div>' +

            '<div class="detalleamarillo"><p>DETALLE</p></div>' +



            '<div class="contdetalle">' +



            '<div class="contdellateprod">' +
            '<div class="cajaaaaaax">' +
            '<div class="cajaletrascantde">' +
            '<div class="contcantidad"><p>CANTIDAD</p></div>' +
            '<div class="contnombrepro"><p>PRODUCTOS</p></div>' +
            '<div class="contpreciouni"><p>PRECIO UNIT</p></div>' +
            '<div class="contsubtotal"><P>SUB TOTAL</p></div>' +
            '</div>' +

            '</div>' +





            '<div class="cajadentrocaaaaa">' +


            '<div class="cantidadblanco">' +

            '<div class="cantidadcont"><p>1<p></div>' +

            '</div>' +

            '<div class="prodddss">' +

            '<div class="proddsssxxxx"><p>CEMENTO MARCA FORZZA EL MEJOR DEL MUNDO</p></div>' +


            '</div>' +

            '<div class="preunittt"><div class="preunittxxx"> <p> $14.900 </p></div></div>' +

            '<div class="subtotal"><div class="subtotalxxx"><p> $14.900 </p></div>  </div>' +

            '</div>' +
            '</div>' +




            '</div>' +





            '</div><!--/datos-->';


          document.getElementById("datoss").innerHTML = codeBlock
        } else {

          var codeBlock = '<div class="datosboletaamarillo"><p>DATOS BOLETA</p></div>' +

            '<div class="contenedordatosdelaboleta">' +


            '<div class="caja1boleta">' +

            '<div class="cajitacont1"><div>*NOMBRE/R.SOCIAL</div>  <input type="text" id="nombre" name="nombre"></div>' +

            '<div class="cajitaconta2"><div>*EMAIL</div>   <input type="text" id="emailDatos" name="email"></div>' +

            '</div>' +


            '<div class="caja2boleta">' +

            '<div class="cajitacont3"><div>*RUT</div>   <input type="text" id="rut" name="rut"></div>' +
            '<div class="cajitaconta4"><div>TELÉFONO</div>   <input type="text" id="telefono" name="telefono"></div>' +





            '</div>' +
            '</div>' +
            '<div class="cajaamarillaquienrecibe"><p>¿QUIÉN RECIBIRÁ TU COMPRA?</p></div>' +

            '<div class="contenedorquienrecibe">' +


            '<div class="cajacontquien1">' +
            '<div class="radyo">' +
            '<input type="radio" name="recibe" value="1" checked class="tamanoradio">' +
            '&nbsp  ' +
            '<p>YO</p>' +
            '</div>' +

            '<div class="radconserje">' +
            '<input type="radio" name="recibe" value="2"  class="tamanoradio"> &nbsp ' +
            '<p>DEJAR EN CONSERJERÍA</p>' +
            '</div>' +
            '</div>' +

            '<div class="cajacontquien2">' +
            '<div class="radotro">' +
            '<input type="radio" name="recibe" value="3"  class="tamanoradio">' +
            '&nbsp' +
            '<p>OTRO<p>' +

            '</div>' +

            '<div class="cajitachica">' +
            '<p>*NOMBRE</p>&nbsp &nbsp' +
            '<input type="text" id="nombrereceptor" name="nombrereceptor">' +



            '</div>' +
            '<div class="cajitachica2">' +
            '<p>*RUT</p>&nbsp &nbsp' +
            '<input type="text" id="rutreceptor" name="rutreceptor">' +



            '</div>' +


            '</div>' +


            '</div>' +

            '<div class="datosdespachoamarillo">' +

            '<P>LLENA ESTOS DATOS, PARA TU DESPACHO</P>' +


            '</div>' +

            '<div class="contnedordireccion">' +
            '<div class="contdes1">' +

            '<div class="contdireccion"><p>*DIRECCION</p> &nbsp  &nbsp <input type="text" id="direccion" name="direccion"></div>' +

            '<div class="contcombociudad">*CIUDAD   &nbsp &nbsp  <select id="ciudad">' +
            '<option value="IQUIQUE">IQUIQUE</option>' +

            '</select></div>' +

            '</div>' +
            '<div class="contdes2">' +


            '<div class="contnumero"><p>*NUMERO</p> &nbsp  &nbsp <input type="text" id="numerodir" name="numerodir"></div>' +

            '<div class="contcomuna">*COMUNA   &nbsp &nbsp  <select id="comuna">' +
            '<option value="IQUIQUE">IQUIQUE</option>' +
            '<option value="IQUIQUE">ALTO HOSPICIO</option>' +

            '</select></div>' +

            '</div>' +

            '</div>' +

            '<div class="detalleamarillo"><p>DETALLE</p></div>' +



            '<div class="contdetalle">' +



            '<div class="contdellateprod">' +
            '<div class="cajaaaaaax">' +
            '<div class="cajaletrascantde">' +
            '<div class="contcantidad"><p>CANTIDAD</p></div>' +
            '<div class="contnombrepro"><p>PRODUCTOS</p></div>' +
            '<div class="contpreciouni"><p>PRECIO UNIT</p></div>' +
            '<div class="contsubtotal"><P>SUB TOTAL</p></div>' +
            '</div>' +

            '</div>' +





            '<div class="cajadentrocaaaaa">' +


            '<div class="cantidadblanco">' +

            '<div class="cantidadcont"><p>1<p></div>' +

            '</div>' +

            '<div class="prodddss">' +

            '<div class="proddsssxxxx"><p>CEMENTO MARCA FORZZA EL MEJOR DEL MUNDO</p></div>' +


            '</div>' +

            '<div class="preunittt"><div class="preunittxxx"> <p> $14.900 </p></div></div>' +

            '<div class="subtotal"><div class="subtotalxxx"><p> $14.900 </p></div>  </div>' +

            '</div>' +
            '</div>' +




            '</div>' +





            '</div><!--/datos-->';






          document.getElementById("datoss").innerHTML = codeBlock

        }

      }

    }
  })();
</script>

</html>