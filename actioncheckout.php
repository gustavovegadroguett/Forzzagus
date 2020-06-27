<?php
session_start();

$ip_add = getenv("REMOTE_ADDR");
include "db.php";



//--------------------------------------------------------------ingresos se llama para crear la sql de acuerdo a la session iniciada

if (isset($_POST["ingreso"])) {  
	
	
	
	
    if (isset($_SESSION["uid"]) && $_SESSION["uid"]!= -1) {
		//When user is logged in this query will execute
		
		$sql = "SELECT sku_producto_id,nombre_prod_forzz,precio_prod_forzz,descripcion_pro_forzz,ruta_forzz, id,qty 
		FROM cart INNER JOIN productos_forzz as prod on cart.p_id = prod.sku_producto_id 
		INNER JOIN fotos on prod.id_img_forzz=fotos.id_foto_forzz WHERE prod.sku_producto_id=cart.p_id AND cart.user_id='$_SESSION[uid]'";
    }   
    else if(isset($_SESSION["uid"]) && $_SESSION["uid"]== -1){
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
    

     // --------------------------------------   Detalles en checkout ----------------------------------------
		$query=mysqli_query($con,$sql);
		

	if(isset($_POST["listaproducto"])){
		$i=1;
		$total=0;
		
		while($row=mysqli_fetch_array($query)){
			$product_id=$row["sku_producto_id"];
			$product_title = $row["nombre_prod_forzz"];
			$product_descrip= $row["descripcion_pro_forzz"];
			$product_price = $row["precio_prod_forzz"];
			$qty = $row["qty"];
			$subtotal=$qty*$product_price;
			$total=$total+$subtotal;
			
			echo "	
			
			<div class='item_detalle' name='$product_descrip'>
			<div class='cantidad_prod'>$qty</div>
			<div class='nombre_producto'>$product_title</div>
			<div class='precio_unitario'>$product_price</div>
			<div class='subtotalxxx'>$subtotal</div>
			
			</div><!-- FIN row con datos de producto individual  -->
			";
			$i++;
		}
		$totalWebPay=intval($total/1.05);
		$totalTransferencia=intval($total/1.03);
       
	}
	if(isset($_POST["neto"])){
		$i=1;
		$total=0;
		
		while($row=mysqli_fetch_array($query)){
			/*$product_id=$row["sku_producto_id"];
			$product_title = $row["nombre_prod_forzz"];
			$product_descrip= $row["descripcion_pro_forzz"];*/
			$product_price = $row["precio_prod_forzz"];
			$qty = $row["qty"];
			$subtotal=$qty*$product_price;
			$total=$total+$subtotal;
			
			
			$i++;
		}
		echo "	$total";
		$totalWebPay=intval($total/1.05);
		$totalTransferencia=intval($total/1.03);
       
	}
	if(isset($_POST["almacenaje"], $_POST["opcion"])){
		$opcion=$_POST["opcion"];
		$total= $_POST["almacenaje"];
		if($opcion==1){
			
			$_SESSION['total']=$total;
			echo $_SESSION['total'];
		}else if($opcion==2){
			echo $_SESSION['total'];
		}
		else{
			echo $opcion,$total;
		}
		
	}

	
	 
}		
	 


?>