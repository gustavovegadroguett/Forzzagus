<?php

include "header2.php";
include "db.php";
require_once "./vendor/autoload.php";
use Transbank\Webpay\Configuration;
use Transbank\Webpay\Webpay;
$transaction = (new Webpay(Configuration :: forTestingWebpayPlusNormal()))
               ->getNormalTransaction();   
?>
<div class="cuerpo">
    
    <h1>Zona de facturacion</h3>
        <?php
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
        <form id="checkout_form" action="<?php echo $formAction ?>" method="POST" class="was-validated">
        <?php  
        ?>
            <input type="hidden" name="token_ws" value="<?php echo $tokenWs ?>" >
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
                <div class="col-25">
                    <div class="container-checkout">
                    
                    <?php
                    if (isset($_POST["cmd"])) {
                    
                        $user_id = $_POST['custom'];
                        
                        
                        $i=1;
                        echo
                        "
                        <h4>Cart 
                        <span class='price' style='color:black'>
                        <i class='fa fa-shopping-cart'></i> 
                        <b>$total_count</b>
                        </span>
                        </h4>

                        <table class='tabla_detalles_compra'>
                        <thead><tr>
                            <th >	N°  </th>
                            <th >	Cantidad	</th>
                            <th > 	Producto  </th>					
                            <th >	Precio  </th>
                            <th >	Sub Total  </th></tr>
                        </thead>
                        <tbody>
                        ";
                        $total=0;
                        $acumulado2=0;
                        while($i<=$total_count){
                            $item_name_ = $_POST['item_name_'.$i];						
                            $item_number_ = $_POST['item_number_'.$i];						
                            $amount_ = $_POST['amount_'.$i];				
                            $quantity_ = $_POST['quantity_'.$i];
                            $acumulado2=$amount_*$quantity_;
                            $total=$total+$acumulado2 ;
                            $sql = "SELECT sku_producto_id FROM productos_forzz WHERE nombre_prod_forzz='$item_name_'";
                            $query = mysqli_query($con,$sql);
                            $row=mysqli_fetch_array($query);
                            $product_id=$row["sku_producto_id"];		

                            echo "	
                            <div class='linea_compra'> 
                            <tr>
                                <td> $item_number_</td>
                                <td> $quantity_</td>
                                <td> $item_name_</td>
                                <td> $amount_</td>
                                <td> $acumulado2</td>
                            </tr>
                            </div>";						
                            $i++;
                        }

                    echo"

                    </tbody>
                    <tfoot>
                        <div class='total_compra' ><tr>
                        <th></th>  
                        <th></th> 
                        <th></th>  
                        <th  scope='row'>Total  </th>
                        <td> $total </td>
                        </div>
                    </tr>
                </tfoot>
                    </table>
                    ";
                        
                    }
                    ?>
                    </div>
                </div>
                

            </div>
            <input type="submit" id="submit" value="Continuar la compra" class="checkout-btn">


</div>

<?php
    include "nuevofooter.php";

?>