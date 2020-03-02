<?php
include ("./conexiones/conexion.php");

$usuario = $_POST["usuario"];
$opcion = $_POST["opcion"];
$informacion = [];

if ($opcion == "registrar"){
    $usuario = $_POST["usuario"];
    $clave = md5($_POST["clave"]);
    
    
}

switch($opcion){
    case 'registrar':
        if($usuario != "" && $clave != ""){
              $existe = existe_usuario($usuario, $conexion);
            if($existe > 0){
                $informacion["respuesta"]="EXISTE";
                echo json_encode($informacion);
            }else{
                registrar($usuario, $clave, $conexion);
            }
        }else{
            $informacion["respuesta"]="VACIO";
            echo json_encode($informacion);
        }
        break;
        
        default:
        $informacion["respuesta"] = "OPCION_VACIA";
        echo json_encode($informacion);
        break;
   /* case 'modificar':
        modificar( $sello, $invoice, $zeta, 
                      $fob, $cif, $peso, $bultos, 
                         $fecha, $empresa, $conductor,
                            $agencia, $largo, $nave, $id, $conexion);
        break;
        
    case 'eliminar':
        eliminar($id, $conexion);
        break;
    default:
        $informacion["respuesta"] = "OPCION_VACIA";
        echo json_encode($informacion);
        break;
                   */        
}


function existe_usuario($usuario, $conexion){
    $query = "SELECT usuario FROM usuarios WHERE usuario='$usuario';";
    $resultado = mysqli_query($conexion, $query);
    $existe_usuario = mysqli_num_rows($resultado);
    return $existe_usuario;
}

function registrar($usuario, $clave, $conexion){
    
    $query = "INSERT INTO usuarios VALUES('$usuario','$clave',0,1);";
    $resultado = mysqli_query($conexion, $query);
    verificar_resultado($resultado);
    cerrar($conexion);
}
   
/*
function modificar($sello, $invoice, $zeta, 
                      $fob, $cif, $peso, $bultos, 
                      $fecha, $empresa, $conductor,
                      $agencia, $largo, $nave, $id, $conexion){
    $query = "UPDATE contenedor SET sello='$sello',
                                    invoice='$invoice',
                                    zeta='$zeta',
                                    fob='$fob',
                                    cif='$cif',
                                    peso='$peso',
                                    bultos='$bultos',
                                    fecha='$fecha',
                                    empresa='$empresa',
                                    conductor='$conductor',
                                    agencia='$agencia',
                                    largo='$largo',
                                    id_nave='$nave'
                                 WHERE id=$id";
    $resultado = mysqli_query($conexion, $query);
    verificar_resultado($resultado);
    cerrar($conexion);
}                        

function eliminar($id, $conexion){
    $query = "DELETE FROM contenedor WHERE id=$id";
    $resultado = mysqli_query($conexion, $query);
    verificar_resultado($resultado);
    cerrar($conexion);
    
}
     */

function verificar_resultado($resultado){
    if(!$resultado)   $informacion["respuesta"] = "ERROR";
    else $informacion["respuesta"] = "BIEN";
    echo json_encode($informacion);
}

function cerrar($conexion){
    mysqli_close($conexion);
}
?>                  