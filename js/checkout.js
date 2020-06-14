(function () {

  //-------------------------Codigo para aparcer y desaparecer seccion de facturacion-----------------------------------
  var radios2 = document.querySelectorAll('input[type=radio][name=facturacion]');
  var factura = document.getElementById('contenedorFactura');
  var radiofactura = document.getElementById('radiofactura');

  var codeblock2 =
    '<div class="seccionFactura"> <p>DATOS DE FACTURACIÓN</p> </div>' +
    '<div class="contenedordatosfactura">' +
    ' <div class="caja1fact">' +
    '   <div class="cajitafac1"> <p>*GIRO</p>&nbsp<input type="text" id="giro" name="giro"></div>' +
    '   <div class="cajitafact2"><p>*CIUDAD</p>&nbsp<input type="text" id="ciudadgiro" name="ciudadgiro"></div>' +
    ' </div>' +
    ' <div class="caja2fact">' +
    '   <div class="cajitafacc1"><p>*DIRECCION</p>&nbsp<input type="text" id="dirgiro" name="dirgiro"></div>' +
    '   <div class="cajitafacct2"><p>*COMUNA</p>&nbsp<input type="text" id="comugiro" name="comugiro"></div>' +
    '</div>';

  radios2.forEach(radio => radio.addEventListener('change', function () {
    aparece2();
  }))

  function aparece2() {
    if (radiofactura.checked != true) {
      factura.innerHTML = codeblock2;
    } else if (radiofactura.checked == true) {
      factura.innerHTML = '';
    }
  };
  aparece2();


  //-------------------------------------------------------------- FIN FACTURA---------------------------------------





  //-------------------------------------------Aparece y desaparece al seleccion OTRO en retiro---------------------------
  var retiro = document.getElementById("otroretiro");
  var radio = document.getElementById("otroradio");
  var radios = document.querySelectorAll('input[type=radio][name=recibe]');
  var codeblock = '<div id="cajitachicanombre">*NOMBRE</div>' +
    '<input type="text" id="nombrereceptor" name="nombrereceptor">' +
    '<div id="cajitachicarut">*RUT</div>' +
    '<input type="text" id="rutreceptor" name="rutreceptor">';
  radios.forEach(radio => radio.addEventListener('change', function () {
    aparece();
  }))


  function aparece() {
    if (radio.checked == true) {
      retiro.innerHTML = codeblock;
    } else if (radio.checked != true) {
      retiro.innerHTML = '';
    }
  }
  aparece();

})(); //----------------------FIN OTRO RETIRO-------------------------------------------

//------------------------------Comienzo cambio boton webpay o tranferencia----------------
var radios3 = document.querySelectorAll('input[type=radio][name=medio]');
var cambioboton=document.querySelector('#terminos');
var divpago = document.getElementById('botonenvio');
var radiowebpay = document.getElementById('radiowebpay');
var codigobotonweb =
  '<input type="submit" id="envio" class="pagar bg-danger" name="pago" value="WEBPAY" disabled="true"></input>';
var codigobotontrans =
  '<input type="button" id="envio" class="pagar bg-danger" name="pago" value="TRANSFERENCIA" disabled="true" onclick="irtransferencia()"></input>';
radios3.forEach(radio => radio.addEventListener('change', function () {
  tipopago();
}));

function tipopago() {

  if (radiowebpay.checked == true) {
    divpago.innerHTML = codigobotonweb;
  } else if (radiowebpay.checked != true) {
    divpago.innerHTML = codigobotontrans;
  }
  cambioboton.checked=false;

};
tipopago();
//----------------------------------------------------Inicio Cambio color boton envio------------------------------

var check = document.querySelector('#terminos');

check.addEventListener('change', function () {
  cambiocolor();

});

function cambiocolor() {
  var boton= document.querySelector('#envio');
  if (check.checked == true) {
    
    boton.disabled = false;
    boton.classList.remove("bg-danger");
  } else if (check.checked != true) {
    
    boton.disabled = true;
    boton.classList.add("bg-danger");

  }
  
};
function irtransferencia(){
  
  location.href='http://localhost/forzza/transbancaria.php';
}

//------------------------------------------------FIN CAMBIO COLOR-----------------------------------------