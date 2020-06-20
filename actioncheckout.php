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
		)

     if(isset($_POST["listaproducto"])){
		echo 'Nueva estructura con ajax';
		$i=1;
		$total=0;
		$total_count=$_POST['total_count'];
		while($i<=$total_count){

			$item_name_ = $_POST['item_name_'.$i];
			$amount_ = $_POST['amount_'.$i];
			$quantity_ = $_POST['quantity_'.$i];
			$subtotal=$amount_*$quantity_;
			$total=$total+$subtotal;
			
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
		$totalWebPay=intval($total/1.05);
		$totalTransferencia=intval($total/1.03);
               ?>




     }
}
?>