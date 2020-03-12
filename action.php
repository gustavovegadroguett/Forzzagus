<?php
session_start();
$_SESSION["uid"]=-1;

$ip_add = getenv("REMOTE_ADDR");
include "db.php";



//-------------------- Relleno de categorias con su cantidad de productos por categorias. ---------------------------
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categoria_forzz";
    
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		
            
            <div class='aside'>
							<h3 class='aside-title'>Categorias</h3>
							<div class='btn-group-vertical'>
	";
	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$cid = $row["id_cat_forzz"];
			$cat_name = $row["nombre_categoria_forzz"];
            $sql = "SELECT COUNT(*) AS count_items FROM productos_forzz WHERE categoria_prod=$i";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            $i++;
            
            
			echo "
					
                    <div type='button' class='btn navbar-btn category' cid='$cid'>
									
									<a href='#'>
										<span  ></span>
										$cat_name
										<small class='qty'>($count)</small>
									</a>
								</div>
                    
			";
            
		}
        
        
		echo "</div>";
	}
}

if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM marca_forzz";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='aside'>
							<h3 class='aside-title'>Brand</h3>
							<div class='btn-group-vertical'>
	";
	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$bid = $row["id_marca_forzz"];
			$brand_name = $row["nombre_marca_forzz"];
            $sql = "SELECT COUNT(*) AS count_items FROM productos_forzz WHERE marca_pro_forzz=$i";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            $i++;
			echo "
					
                    
                    <div type='button' class='btn navbar-btn selectBrand' bid='$bid'>
									
									<a href='#'>
										<span ></span>
										$brand_name
										<small >($count)</small>
									</a>
								</div>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["page"])){

	$sql = "SELECT * FROM productos_forzz	";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='page' class='active'>$i</a></li>
            
            
		";
	}
}

if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM productos_forzz as prod inner join fotos as fot on prod.id_img_forzz=fot.id_foto_forzz inner join categoria_forzz as cat on prod.categoria_prod=cat.id_cat_forzz  LIMIT 9	";
	$run_query = mysqli_query($con,$product_query);
	if (!$run_query) {
		printf("Error: %s\n", mysqli_error($con));
		exit();
	}
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['sku_producto_id'];
			$pro_cat   = $row['categoria_prod'];
			$pro_brand = $row['marca_pro_forzz'];
			$pro_title = $row['nombre_prod_forzz'];
			$pro_price = $row['precio_prod_forzz'];
			$pro_image = $row['ruta_forzz'];
            
            $cat_name = $row["nombre_categoria_forzz"];
			echo "
				
                        
                          <div class='col-md-4 col-xs-6' >
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
										<div class='product-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										<div class='product-btns'>
											<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare en action!</span></button>
											<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
							</div>
                        
			";
		}
	}
}


if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM productos_forzz as prod inner join categoria_forzz as cat on prod.categoria_prod=cat.id_cat_forzz inner join fotos on prod.id_img_forzz=fotos.id_foto_forzz WHERE categoria_prod = '".$id."' AND categoria_prod=cat.id_cat_forzz";
        
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM productos_forzz as prod inner join categoria_forzz as cat on prod.categoria_prod=cat.id_cat_forzz inner join fotos on prod.id_img_forzz=fotos.id_foto_forzz WHERE categoria_prod = '".$id."' AND categoria_prod=cat.id_cat_forzz	";
	}else {
        
		$keyword = $_POST["keyword"];
        header('Location:store.php');
		//$sql = "SELECT * FROM productos_forzz,categories WHERE product_cat=cat_id AND product_keywords LIKE '%$keyword%'";
		$sql = "SELECT * FROM productos_forzz as prod inner join categoria_forzz as cat on prod.categoria_prod=cat.id_cat_forzz inner join fotos on prod.id_img_forzz=fotos.id_foto_forzz WHERE  product_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	if (!$run_query) {
		printf("Error: %s\n", mysqli_error($con));
		exit();
	}
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['sku_producto_id'];
			$pro_cat   = $row['categoria_prod'];
			$pro_brand = $row['marca_pro_forzz'];
			$pro_title = $row['nombre_prod_forzz'];
			$pro_price = $row['precio_prod_forzz'];
			$pro_image = $row['ruta_forzz'];
            $cat_name = $row["nombre_categoria_forzz"];
			echo "
					
                        
                        <div class='col-md-4 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img  src='product_images/$pro_image'  style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
										<div class='product-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										<div class='product-btns'>
											<button class='add-to-wishlist' tabindex='0'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view' ><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' href='#' tabindex='0' class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i>  action carro add to cart</button>
									</div>
								</div>
							</div>
			";
		}
}
	
//-------------------------------SE AREGA CARRO A LA BASE DE DATOS Y DESPLIEGA EN EL DROPDOWN---------------------------------

	if(isset($_POST["addToCart"]))	{	// capturas datos desde linea 42 de carrito.js  data : {addToCart:1,proId:pid,},
		

		$p_id = $_POST["proId"];
		
		
		if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];
		

    //	$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
    	$sql = "SELECT * FROM cart WHERE cart.p_id = '$p_id'  ";
        $run_query = mysqli_query($con,$sql);
       

    

		$count = mysqli_num_rows($run_query);
		if($count > 0){
			
			

		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
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
				exit();
			}
			
		}
		
		
		
		
	}

//-------------------------------funcion contar items para el carrito.----------------------------------
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	//$_SESSION['uid']=-1;
	
    if (isset($_SESSION["uid"]) && $_SESSION["uid"]!= -1) {
		
	$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else {
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//----------------------------------------Aca rellena el carrito con los elementos guardados en la base de datos.

if (isset($_POST["ingreso"])) {

	
	
	
	//if (isset($_SESSION["uid"])) {
		if (isset($_SESSION["uid"]) && $_SESSION["uid"]!= -1) {
		//When user is logged in this query will execute
		
		$sql = "SELECT sku_producto_id,nombre_prod_forzz,precio_prod_forzz,descripcion_pro_forzz,ruta_forzz, id,qty 
		FROM cart INNER JOIN productos_forzz as prod on cart.p_id = prod.sku_producto_id 
		INNER JOIN fotos on prod.id_img_forzz=fotos.id_foto_forzz WHERE prod.sku_producto_id=cart.p_id AND cart.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		
		//$sql = "SELECT a.sku_producto_id,a.nombre_prod_forzz,a.precio_prod_forzz,a.id_img_forzz,b.id,b.qty FROM productos_forzz a,cart b WHERE a.sku_producto_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
		$sql = "SELECT sku_producto_id,nombre_prod_forzz,precio_prod_forzz,descripcion_pro_forzz,ruta_forzz, id,qty 
		FROM productos_forzz as prod
		 INNER JOIN cart on cart.p_id = prod.sku_producto_id INNER JOIN fotos on prod.id_img_forzz=fotos.id_foto_forzz 
		 where prod.sku_producto_id=cart.p_id AND cart.ip_add = '$ip_add'and cart.user_id <0" ;
		
	}
    $query = mysqli_query($con,$sql);
  

    //------------------------------------------RELLENA EL CARRO CON TODOS LOS REGISTROS DESDE LA BASE DE DATOS.------------
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			$total_price=0;
			while ($row=mysqli_fetch_array($query)) {
                
				$n++;
				$product_id = $row["sku_producto_id"];
				$product_title = $row["nombre_prod_forzz"];
				$product_price = $row["precio_prod_forzz"];
				$product_image = $row["ruta_forzz"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				$total_price=$total_price+$product_price;
				echo '
					
                    
                    <div class="product-widget">
												<div class="product-img">
												
													<img src="images'.$product_image.'"  / >
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">'.$product_title.'</a></h3>
													<h4 class="product-price"><span class="qty"> Cant '.$qty.'</span>  Valor  $'.$product_price.'</h4>
												</div>
												
											</div>';                  
                    
                    
				
			}
            
            echo '<div class="cart-summary">
				    <small class="qty">'.$n.' Item(s) </small><br>
				    <small class="total_carrito" id="total_carrito2" >TOTAL DE LA COMPRA: $'.$total_price.'</small>
				</div>';
            
			
			exit();
			
			
		}
	}
	
    // --------------------------------------   CONTENIDO DEL CARRITO VERTIDO EN CART.PHP----------------------------------------
    
    if (isset($_POST["checkOutDetails"])) {
			$num;
		if ($num=mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			
			echo '<div class="main ">
			<div class="table-responsive">
			<form method="post" action="login_form.php">
			
	               <table id="cart" class="table table-hover table-condensed" id="">
    				<thead>
						<tr>
							<th style="width:35%">Producto</th>
							<th style="width:40%">Descripcion Producto</th>
							<th style="width:10%">PRECIO</th>
							<th style="width:3%">CANT</th>
							<th style="width:7%" class="text-center"> SUB</th>
							
						</tr>
					</thead>
					<tbody>
                    ';
				$n=0;
				
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["sku_producto_id"];
					$product_title = $row["nombre_prod_forzz"];
					$product_descrip= $row["descripcion_pro_forzz"];
					$product_price = $row["precio_prod_forzz"];
					$product_image = $row["ruta_forzz"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo 
						'
                             
						<tr>
							<td data-th="Product" >
								<div class="row">
								
									<div class="col-sm-4 "><img src="images'.$product_image.'" style="height: 100px;width:200px;"/>
									<h4 class="nomargin product-name header-cart-item-name"><a href="vista_pre.php?oe='.$product_id.'">'.$product_title.'</a></h4>
									</div>
									<div class="col-sm-6">
										<div style="max-width=50px;">
										
										</div>
									</div>
									
									
								</div>
							</td>
							<td><p>'.$product_descrip.'</p></td>
                            <input type="hidden" name="product_id[]" value="'.$product_id.'"/>
				            <input type="hidden" name="" value="'.$cart_item_id.'"/>
							<td data-th="Price"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></td>
							<td data-th="Quantity">
								<input type="text" class="form-control qty" value="'.$qty.'" >
							</td>
							<td data-th="Subtotal" class="text-center"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></td>
							<td class="actions" data-th="">
							<div class="btn-group">
								<a href="#" class="btn btn-info btn-sm update" update_id="'.$product_id.'"><i class="fa fa-refresh"></i></a>
								
								<a href="#" class="btn btn-danger btn-sm remove" remove_id="'.$product_id.'"><i class="fa fa-trash-o"></i></a>		
							</div>							
							</td>
						</tr>
					
                            
                            ';
				}
				
				echo '</tbody>
				<tfoot>
					
					<tr>
						<td><a href="store.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue su compra.</a></td>
						<td colspan="3" class="hidden-xs"></td>
						<td class="hidden-xs text-center" style="width:10%"><b class="net_total" ></b></td>
						<div id="issessionset"></div>
                        <td>
							
							';
				if (!isset($_SESSION["uid"])) {
					echo '
					
							<a href="" data-toggle="modal" data-target="#Modal_register" class="btn btn-success">Realizar compra</a></td>
								</tr>
							</tfoot>
				
							</table></div></div>';
                }else  if(isset($_SESSION["uid"])){
						
					//Paypal checkout form
					echo '
					</form>
					
						<form action="checkout.php" method="post">
						
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="shoppingcart@puneeth.com">
							<input type="hidden" name="upload" value="1">';
							  
							$x=0;
							$sql = "SELECT sku_producto_id,nombre_prod_forzz,precio_prod_forzz,id_img_forzz,id,qty 
							FROM productos_forzz as prod inner join cart on prod.sku_producto_id = cart.p_id 
							WHERE cart.user_id=$_SESSION[uid]";
							$query = mysqli_query($con,$sql);
							
				
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo  	

									'<input type="hidden" name="total_count" value="'.$x.'">
									<input type="hidden" name="item_name_'.$x.'" value="'.$row["nombre_prod_forzz"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["precio_prod_forzz"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
								}
							  
							echo   
								'<input type="hidden" name="return" value="http://localhost/myfiles/public_html/payment_success.php"/>
					                <input type="hidden" name="notify_url" value="http://localhost/myfiles/public_html/payment_success.php">
									<input type="hidden" name="cancel_return" value="http://localhost/myfiles/public_html/cancel.php"/>
									<input type="hidden" name="currency_code" value="CLP"/>
									<input type="hidden" name="custom" value="$_SESSION[uid]"/>
									<input type="submit" id="submit" name="login_user_with_product" name="submit" class="btn btn-success" value="Listo para Checkout">
									</form></td>
									
									</tr>
									
									</tfoot>
									
							</table></div></div>    
								';
				}
			}
	}
	
	
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