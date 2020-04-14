<?php
include "header2.php";
include "db.php";
                
?>
<div class="cuerpo">
    <h1>Zona de facturacion</h3>

    <form id="checkout_form" action="checkout_process.php" method="POST" class="was-validated">
        <div class="primer-bloque-factura"> 
            <h2> Datos de la factura</h2>
            <div class="input-group">
                <span class="input-group-addon">Nombre/Razon social</span> <input type="text" class="form-control" >
                <span class="input-group-addon"> RUT </span> <input type="text" class="form-control" >    
            </div>
            <br>
            <br>
            <div class="input-group">
                <span class="input-group-addon">Email</span> <input type="text" class="form-control" >
                <span class="input-group-addon">Telefono</span> <input type="text" class="form-control" >    
            </div>
        </div>
        <div class="segundo-bloque-factura"> 
            <h2> Datos de facturacion</h2>
            <div class="input-group">
                <span class="input-group-addon">GIRO</span> <input type="text" class="form-control" >
                <span class="input-group-addon"> DIRECCION </span> <input type="text" class="form-control" >    
            </div>
            <br>
            <br>
            <div class="input-group">
                <span class="input-group-addon">CIUDAD</span> <input type="text" class="form-control" >
                <span class="input-group-addon">COMUNA</span> <input type="text" class="form-control" >    
            </div>
        </div>
        <div class="tercer-bloque-factura"> 
            <h2> Quien recibira tu compra</h2>
            <div class="input-group">
                <span  class="input-group-addon">Yo</span> <input type="radio" name="recepcion" id="radioyo" class="form-control" >
                <span  class="input-group-addon">Dejar en consergeria</span> <input type="radio" name="recepcion" id="radioconserge" class="form-control" >  
            </div>
            <br>
            <br>  
            <div class="input-group">
                <span  class="input-group-addon">Otro</span> <input type="radio" name="recepcion" id="radiotro" class="form-control" > 
            </div>
            <div class="input-group">
                
                <span class="input-group-addon">Nombre</span> <input type="text" class="form-control" >    
                <span class="input-group-addon">RUT</span> <input type="text" class="form-control" > 
            </div>
        </div>
        <div class="cuarto-bloque-factura"> 
            <h2> Datos de despacho  </h2>
            <div class="input-group">
                <span class="input-group-addon">Direccion</span> <input type="text" class="form-control" >
            
                <span class="input-group-addon">Numero</span> <input type="text" class="form-control" >  
                
            </div>
            <br>
            <br>
            <div class="input-group">
                <span class="input-group-addon">Ciudad</span> <input type="text" class="form-control" > 
            
                <span class="input-group-addon">COMUNA</span> <input type="text" class="form-control" >    
            </div>
        </div>
        <div class="quinto-bloque-factura"> 
            <h2> Detalles de la compra  </h2>
            <div class="input-group">
                <span class="input-group-addon">Direccion</span> <input type="text" class="form-control" >
            
                <span class="input-group-addon">Numero</span> <input type="text" class="form-control" >  
                
            </div>
            <br>
            <br>
            <div class="input-group">
                <span class="input-group-addon">Ciudad</span> <input type="text" class="form-control" > 
            
                <span class="input-group-addon">Comuna</span> <input type="text" class="form-control" >    
            </div>
        </div>
    <input type="submit" id="submit" value="Continue to checkout" class="checkout-btn">













</div>

<?php
    include "nuevofooter.php";

?>