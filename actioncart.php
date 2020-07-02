<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";


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