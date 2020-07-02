<?php
 session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if (isset($_POST["ingreso"])) {  
	
	
	
	
		if (isset($_SESSION["uid"]) && $_SESSION["uid"]!= -1) {
		//When user is logged in this query will execute
		
		$sql = "SELECT sku_producto_id,nombre_prod_forzz,precio_prod_forzz,descripcion_pro_forzz,ruta_forzz, id,qty 
		FROM cart INNER JOIN productos_forzz as prod on cart.p_id = prod.sku_producto_id 
		INNER JOIN fotos on prod.id_img_forzz=fotos.id_foto_forzz WHERE prod.sku_producto_id=cart.p_id AND cart.user_id='$_SESSION[uid]'";
	}else if(isset($_SESSION["uid"]) && $_SESSION["uid"]== -1){
		//When user is not logged in this query will execute
		
		$sql = "SELECT sku_producto_id,nombre_prod_forzz,precio_prod_forzz,descripcion_pro_forzz,ruta_forzz, id,qty 
		FROM productos_forzz as prod
		 INNER JOIN cart on cart.p_id = prod.sku_producto_id INNER JOIN fotos on prod.id_img_forzz=fotos.id_foto_forzz 
		 where prod.sku_producto_id=cart.p_id AND cart.ip_add = '$ip_add'and cart.user_id <0" ;
		
	}
	else{
		echo 'paso por el else '+ $_SESSION["uid"];
		exit();	

	}
    
  

	//------------------------------------------RELLENA EL CARRO CON TODOS LOS REGISTROS DESDE LA BASE DE DATOS.------------
	$query = mysqli_query($con,$sql);
	
	
    // -------------------------------------- CONTENIDO DEL CARRITO VERTIDO EN CART.PHP----------------------------------------
    
    if (isset($_POST["checkOutDetails"])) {
			$num;
		if ($num=mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			
			echo '<div class="main">	
					
				<form method="post" action="checkoutdespacho.php">
						
							
					';
						$n=0;
						
						$total=0;
						while ($row=mysqli_fetch_array($query)) {
							$n++;
							$subtotal_carro=0;
							$product_id = $row["sku_producto_id"];
							$product_title = $row["nombre_prod_forzz"];
							$product_descrip= $row["descripcion_pro_forzz"];
							$product_price = $row["precio_prod_forzz"];
							$product_image = $row["ruta_forzz"];
							$cart_item_id = $row["id"];
							$qty = $row["qty"];
							$subtotal_carro=$qty*$product_price;
							$total=$total+$subtotal_carro;
						
							echo '
									
							<div class="contedoramarilloproducto">

								<div class="imagenespro">

									<img src="./img/alicate.png">

								</div>

								<div class="datosletras">
									<DIV>MARCA</DIV>
									<div></div>
									<DIV>NOMBRE: </DIV>
									<div class="nombreprod">'.$product_title.'</div>
									<DIV>CODIGO</DIV>
									<div class="codigoprod">'.$product_id.'</div>
									<DIV>DESCRIPCION</DIV>
									<div class="descripcionprod">'.$product_descrip.'</div>
									<div class="botoneliminar"><button type="button" id_remove="'.$product_id.'" class="eliminar btn-danger">Eliminar</button> </div>

								</div>


								
								<div class="cantidad">
								
									<div class="ordencontroles">
										<div class="precioprod">'.$product_price.'</div>
										<div class="controlescantidad" id="control_cant_general">
											<button type="button" class="control_cantidad" id="disminuye" value="-"> - </button>
											<input type="text" class="cantidad_prod" id_update="'.$product_id.'" id="cantidad_prod" value="'.$qty.'" readonly> </input>
											<button type="button" class="control_cantidad" id="aumento" value="+"> + </button>
										</div>
									</div>

								</div>
								
								<div class="precioso">
									<div class="subtotal1"><b>$ </b><b class="subtotal">'.$subtotal_carro.'</b></div>

								</div>

							</div>';
						}
							


				$BackToMyPage = $_SERVER['HTTP_REFERER'];   //Boton para volver a comprar desde el carrito
				echo '
					<div class="totales">
						<div class="vuelta"><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue su compra .</a></div>
						
					
							<div class="hidden-xs text-center total" id="total">
							<b>TOTAL COMPRA $	</b>
							<b class="net_total"></b>
							</div>
						
						<div> <input type="submit" id="submit" name="login_user_with_product" name="submit" class="btn btn-success" value="Ir a Pagar >"</div>  
					</div>
				</form>
			</div>			
							
							';

			
		}
	}
	
	
}

if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
    $qty = $_POST["qty"];
    $resultado;
    $nuevoprecio;
    $sesion=$_SESSION["uid"];
	if($qty<=0){
		echo "La cantidad debe ser mayor a 0";
		exit();
	}
	if (isset($sesion) ){
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$sesion' ";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
        $sql = "SELECT precio_prod_forzz FROM productos_forzz as prod  where prod.sku_producto_id='$update_id'" ;
        $run_query=mysqli_query($con,$sql);
        $row= mysqli_fetch_array($run_query);
        $resultado= $row['precio_prod_forzz'];
        $nuevoprecio= $resultado * $qty;
        echo $nuevoprecio;
		exit();
	}
}
     
if (isset($_POST["removerItem"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '".$_SESSION[uid]."'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


?>