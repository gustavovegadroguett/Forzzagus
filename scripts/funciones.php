<?php
$conexion = null;
include("../conexiones/db.php");
function conectar()
{
    global $conexion;
    //$conexion = mysqli_connect('localhost', 'root', '123123', 'intranet');
    $conexion = mysqli_connect("forzza.cl", "forzza", "f0rzz4server", "vashir_forzza");
    //$conexion = mysqli_connect("192.168.100.63", "cargar_fotos", "cargar_forzza", "vashir.forzza");
    mysqli_set_charset($conexion, 'utf8');
}


function mostraroferta()
{
    global $con;
    $x = "si";
    $sql = "SELECT sku_producto_id as id , nombre_prod_forzz as nombre,marca_pro_forzz as marca, precio_prod_forzz as precioant,  precio_anterior_forzz as precioferta, oferta_pro_forzz as oferta, ruta_forzz as ruta FROM productos_forzz  INNER JOIN fotos on fotos.id_pro_forzz = productos_forzz.sku_producto_id WHERE oferta_pro_forzz = ? and productos_forzz.estado_pro_forzza = 'DISPONIBLE' LIMIT 4";
    $stmt = mysqli_prepare( $con,$sql);
    $stmt->bind_param('s', $x);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {

        return $result;

    }else{
        
        
        echo('NO HAY OFERTAS');
    
    }
    

   // while ($row = $result->fetch_assoc()) { }
}

function mostraroferta_forzza()
{
    global $con;
    $x = "si";
    $sql = "SELECT sku_producto_id as id , nombre_prod_forzz as nombre,marca_pro_forzz as marca, precio_prod_forzz as precioant,  precio_anterior_forzz as precioferta, oferta_pro_forzz as oferta, ruta_forzz as ruta FROM productos_forzz  INNER JOIN fotos on fotos.id_pro_forzz = productos_forzz.sku_producto_id WHERE oferta_pro_forzz = ? and productos_forzz.estado_pro_forzza = 'DISPONIBLE'";
    $stmt = mysqli_prepare( $con,$sql);
    $stmt->bind_param('s', $x);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {

        return $result;

    }else{
        
        
        echo('NO HAY OFERTAS');
    
    }
    

   // while ($row = $result->fetch_assoc()) { }
}

function getUsuarios(){
    global $con;
    $respuesta = mysqli_query($con, "SELECT * FROM usuarios WHERE admin<>1");		
    // return $respuesta->fetch_all();
    $respuestas_array = array();
    while ($fila = $respuesta->fetch_row())
      $respuestas_array[] = $fila;
    return $respuestas_array;		
}


function validarLogin($usuario, $clave){
    global $con;

    $queryx = "SELECT *  FROM usuarios where usuario = ? and clave= ? ";
    $stmt4 = mysqli_prepare($con, $queryx);
    //var_dump($stmt4);
    $stmt4->bind_param('ss', $usuario, $clave);
    $stmt4->execute();
    $result4 = $stmt4->get_result();
    if ($fila = mysqli_fetch_row($result4)) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['admin'] = $fila[2];
        return true;
       
    }
    return false;
    
}

function haIniciadoSesion(){
    session_start();
    return isset( $_SESSION['usuario'] );
}

function esAdmin(){
    return $_SESSION['admin'];
}

function verificar_resultado($resultado){
if(!$resultado)   $informacion["respuesta"] = "ERROR";
else $informacion["respuesta"] = "BIEN";
echo json_encode($informacion);
}



function desconectar(){
    global $con;
    mysqli_close($con);
}



?>
