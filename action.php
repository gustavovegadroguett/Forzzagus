<?php
session_start();

$ip_add = getenv("REMOTE_ADDR");
include "db.php";





	
//-------------------------------SE AREGA CARRO A LA BASE DE DATOS Y DESPLIEGA EN EL DROPDOWN---------------------------------

	if(isset($_POST["addToCart"]))	{	// capturas datos desde linea 42 de carrito.js  data : {addToCart:1,proId:pid,},
		

		$p_id = $_POST["proId"];
		$user_id = $_SESSION["uid"];
		$cant_prod=$_POST["cantProd"];
		
		if(isset($_SESSION["uid"])){

				
				

			//	$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
				$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND cart.user_id = '$user_id 'AND cart.ip_add  = '$ip_add'";
				
				$run_query = mysqli_query($con,$sql);
				if (!$run_query) {
					printf("Error: %s\n", mysqli_error($con));
					exit();
				}
				
				$count = mysqli_num_rows($run_query);
				
				if($count > 0){
					
					$row=mysqli_fetch_array($run_query);
					$cant_bd=$row["qty"];
					$cant_bd=$cant_bd  + $cant_prod; 

					echo 'se supone que actualiza '. $cant_bd.' usuario '.$user_id.' producto  '.$p_id.'';

					$sql = "UPDATE `cart` SET `qty`='$cant_bd' WHERE `p_id` = '$p_id' AND `ip_add` = '$ip_add' AND `user_id` = '$user_id'";
					
					//$registro=mysqli_num_rows($run_query);
					
					if (mysqli_query($con,$sql) ){
						
						echo 'Agregado';
						
					}
					

				} else {
					
					$sql = "INSERT INTO `cart`
					(`p_id`, `ip_add`, `user_id`, `qty`) 
					VALUES ('$p_id','$ip_add','$user_id','$cant_prod')";
					if(mysqli_query($con,$sql)){

						echo "
							<div class='alert alert-success'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<b>Product is Added..!</b>
							</div>
						";
					}
					
					
				}
		}else{
				
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully..!</b>
					</div>
				";
				echo 'debe iniciar sesion';
				exit();
			}	
			
		
		}
	}
		
		
		
		
	

//-------------------------------funcion contar items para el carrito.----------------------------------
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	//$_SESSION['uid']=-1;
	$user_id=$_SESSION["uid"];
	
    if (isset($_SESSION[ "uid"]) && $_SESSION["uid"]!= -1) {
		
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else if(isset($_SESSION["uid"]) && $_SESSION["uid"]== -1) {
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}else{
		exit();
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item


 //--------------------------------------------------------------ingresos se llama para crear la sql de acuerdo a la session iniciada

if (isset($_POST["ingreso"])) {  
	
	
	
	//if (isset($_SESSION["uid"])) {
		if (isset($_SESSION["uid"]) && $_SESSION["uid"]!= -1) {
		//When user is logged in this query will execute
		
		$sql = "SELECT sku_producto_id,nombre_prod_forzz,precio_prod_forzz,descripcion_pro_forzz,ruta_forzz, id,qty 
		FROM cart INNER JOIN productos_forzz as prod on cart.p_id = prod.sku_producto_id 
		INNER JOIN fotos on prod.id_img_forzz=fotos.id_foto_forzz WHERE prod.sku_producto_id=cart.p_id AND cart.user_id='$_SESSION[uid]'";
	}else if(isset($_SESSION["uid"]) && $_SESSION["uid"]== -1){
		//When user is not logged in this query will execute
		
		//$sql = "SELECT a.sku_producto_id,a.nombre_prod_forzz,a.precio_prod_forzz,a.id_img_forzz,b.id,b.qty FROM productos_forzz a,cart b WHERE a.sku_producto_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
		$sql = "SELECT sku_producto_id,nombre_prod_forzz,precio_prod_forzz,descripcion_pro_forzz,ruta_forzz, id,qty 
		FROM productos_forzz as prod
		 INNER JOIN cart on cart.p_id = prod.sku_producto_id INNER JOIN fotos on prod.id_img_forzz=fotos.id_foto_forzz 
		 where prod.sku_producto_id=cart.p_id AND cart.ip_add = '$ip_add'and cart.user_id <0" ;
		
	}
	else{
		exit();	

	}
    
  

	//------------------------------------------RELLENA EL CARRO CON TODOS LOS REGISTROS DESDE LA BASE DE DATOS.------------
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			$total_price=0;
			$sub_total=0;
			while ($row=mysqli_fetch_array($query)) {
                
				$n++;
				$product_id = $row["sku_producto_id"];
				$product_title = $row["nombre_prod_forzz"];
				$product_price = $row["precio_prod_forzz"];
				$product_image = $row["ruta_forzz"];
				$cart_item_id = $row["id"];
				
				$qty = $row["qty"];
				$momentaneo=$qty * $product_price;
				$sub_total=$qty*$product_price;
				$total_price=$total_price+$sub_total;
				
				
				
				echo '
					
                    
                    <div class="product-widget">
												<div class="product-img">
												
													<img src="images'.$product_image.'"  / >
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">'.$product_title.'</a></h3>
													<h4 class="product-price"><span class="qty"> Cant '.$qty.'</span>  Valor  $'.$momentaneo.'</h4>
												</div>
												
											</div>';                  
                    
                    
				 
			}
           
            echo '<div class="cart-summary">
				    <small class="qty">'.$n.' Item(s) </small><br>
				    <small class="total_carrito" id="total_carrito2" >TOTAL DE LA COMPRA:<br> $'.$total_price.'</small>
				</div>';
            
			
			exit();
			
			
		}
	}
	
    // -------------------------------------- CONTENIDO DEL CARRITO VERTIDO EN CART.PHP----------------------------------------
    
   /* if (isset($_POST["checkOutDetails"])) {
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
	}*/
	
	
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
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


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if($qty<=0){
		echo "La cantidad debe ser mayor a 0";
		exit();
	}
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '".$_SESSION[uid]."'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}
?>