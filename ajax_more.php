
 <?php
include("./conexiones/db.php");


if(isSet($_POST['lastmsg']))
{
$lastmsg=$_POST['lastmsg'];
$result=mysqli_query($conexion, "select * from productos_forzz WHERE sku_producto_id<'$lastmsg' order by sku_producto_id desc limit 9");
$count=mysqli_num_rows($result);
while($row=mysql_fetch_array($result))
{
$msg_id=$row['sku_producto_id'];
$message=$row['message'];
?>
 

<li>
<?php echo $message; ?>
</li>


<?php
}


?>

<div id="more<?php echo $msg_id; ?>" class="morebox">
<a href="#" id="<?php echo $msg_id; ?>" class="more">cargar mas</a>
</div>

<?php
}
?>