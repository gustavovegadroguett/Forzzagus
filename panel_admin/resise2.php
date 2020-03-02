

<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php

include("../conexiones/db.php");
include("../conexiones/conectar_server.php");
error_reporting(0);

$marca = $_POST['marca'];
$tipo_cat = $_POST['marcax'];
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$modelo = $_POST['modelo'];
$descripcion = $_POST['descripcion'];
$especificaciones = $_POST['especificaciones'];
$estado = "DISPONIBLE";
$precio = $_POST['precio'];

?>

<?php

$verificar_producto =  "SELECT * FROM productos_forzz WHERE sku_producto_id = ?";

$stmt = mysqli_prepare($con_admin, $verificar_producto);
$stmt->bind_param('s', $codigo);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) 
    echo('producto existente');


//QUERY PARA INGRESO DE DATOS
//$ingresodatos = "INSERT INTO vehiculo (chasis, marca, modelo, anio, estado_vehiculo, ubicacion, color, cilindrada, transmision, motor, traccion, id_embarquea) VALUES('$chasis','$marca','$modelo','$anio','$estado','$ubicacion','$color','$cilindrada' , '$transmision', '$motor', '$traccion','$id_embarque') ";
$ingdatos = "INSERT INTO productos_forzz (sku_producto_id, nombre_prod_forzz, modelo_prod_forzz, marca_pro_forzz, descripcion_pro_forzz, especification_prod_forzz, estado_pro_forzza, precio_prod_forzz) VALUES (?,?,?,?,?,?,?,?)";

$stmt = mysqli_prepare($con_admin, $ingdatos);
$stmt->bind_param("sssssssi", $codigo, $nombre, $modelo, $marca, $descripcion, $especificaciones, $estado, $precio);
$stmt->execute();

//INGRESO DE DATOS

//$resultado = mysqli_query($con, $ingresodatos);


if (!$stmt) {
    echo 'ERROR AL INGRESAR PRODUCTO';
    exit;
} else {
    echo 'PRODUCTO INGRESADO';
}

$ingdatoscat = "INSERT INTO tipo_producto_forzz(id_tipo_pro_forzz, sku_producto_tipo) VALUES (?,?)";

$stmt5 = mysqli_prepare($con_admin, $ingdatoscat);
$stmt5->bind_param("ss", $tipo_cat, $codigo);
$stmt5->execute();



if (!$stmt5) {
    echo 'ERROR AL INGRESAR CATEGORIA';
    exit;
} else {
    echo 'CATEGORIA INGRESADA';
}

?>


<?php


if (isset($_POST["submit"])) {
    if (is_array($_FILES)) {


        $cuenta = 0;
        if ((!$con_id) || (!$lr)) {
            echo  'no se pudo contectar';
            exit;
        } else {
            echo 'conectado correctamente';
            $prodcarpeta = $codigo;

            //$dir = '/$prodcarpeta';
            if (ftp_mkdir($con_id, '/' . $prodcarpeta)) {
                echo "creado con éxito ";
            } else {
                echo "Ha habido un problema durante la creación de direcctorio ya existe ";
                exit;
            }

            for ($i = 0; $i < count($_FILES["archivo"]["name"]); $i++) {

                $cuenta += 1;
                // echo "hola aki va la cuenta ".$cuenta;
                // for($e=1 ; $e<=$i; $e++){


                $uploadedFile = $_FILES['archivo']['tmp_name'][$i];

                $nombre = $_FILES["archivo"]['name'][$i];

                $sourceProperties = getimagesize($uploadedFile);

                $newFileName = time();



                // mkdir('/fotospagina', 0777, true);
               // $dirPath = "/fotospagina/";
                $ext = pathinfo($_FILES['archivo']['name'][$i], PATHINFO_EXTENSION);
                $imageType = $sourceProperties[2];

                switch ($imageType) {
                    case IMAGETYPE_PNG:
                        $imageSrc = imagecreatefrompng($uploadedFile);
                        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
                        imagepng($tmp, $dirPath . $newFileName . "_thump" . $cuenta . "." . $ext);
                        break;

                    case IMAGETYPE_JPEG:
                        $imageSrc = imagecreatefromjpeg($uploadedFile);
                        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
                        imagejpeg($tmp, $dirPath . $newFileName . "_thump" . $cuenta . "." . $ext);

                        break;

                    case IMAGETYPE_GIF:
                        $imageSrc = imagecreatefromgif($uploadedFile);
                        $tmp = imageResize($imageSrc, $sourceProperties[0], $sourceProperties[1]);
                        imagegif($tmp, $dirPath . $newFileName . "_thump" . $cuenta . "." . $ext);
                        break;

                    default:
                        echo "Tipo de imagen inválido.";
                        exit;
                        break;


                        /*cierre switch*/
                }

                echo ftp_pwd($con_id);


                $subio = ftp_put($con_id,  $prodcarpeta . "/" . $newFileName . "_thump" . $cuenta . "." . $ext, $dirPath . $newFileName . "_thump" . $cuenta . "." . $ext, FTP_BINARY);

                //$chasis = $_POST['chasis'];

                //$cut = substr($chasis, 2);
                $filetmp = $_FILES["archivo"]["tmp_name"][$i];
                $filename = $_FILES["archivo"]["name"][$i];
                $filetype = $_FILES["archivo"]["type"][$i];
                //$filepath ="./autos/".$cut."/".$filename;
                $filepath = "/" . $prodcarpeta . "/" . $filename;
                $destinobd = "/" . $prodcarpeta . "/" . $newFileName . "_thump" . $cuenta . "." . $ext;

                //se inserta el los datos para crear un nuevo registro de fotos

                $ingresodatosfoto = "INSERT INTO fotos (id_pro_forzz, ruta_forzz, tipo_forzz) VALUES (?,?,?)";
                $stmt3 = mysqli_prepare($con_admin, $ingresodatosfoto);
                $stmt3->bind_param("sss", $codigo, $destinobd, $filetype);
                $stmt3->execute();

                //$prodcarpeta . "/" . $newFileName . "_thump" . $cuenta . "." . $ext

                //seleccion imagen principal
                $primeridfoto = $codigo;
                $queryx = "SELECT *  FROM fotos where id_pro_forzz = ? ORDER by id_pro_forzz ASC LIMIT 1 ";
                $stmt4 = mysqli_prepare($con_admin, $queryx);
                //var_dump($stmt4);
                $stmt4->bind_param('s', $primeridfoto);
                $stmt4->execute();
                $result4 = $stmt4->get_result();
                if ($result4->num_rows == 0) exit('No hay ');
                while ($row = $result4->fetch_assoc()) {
                    $idproforzz = $row['id_pro_forzz'];

                    //idfoto
                    $idfoto = $row['id_foto_forzz'];
                }

                $sqlsx = "UPDATE productos_forzz SET id_img_forzz = ?  where sku_producto_id = ?";

                $stmt2 = mysqli_prepare($con_admin, $sqlsx);
                // var_dump($stmt2);
                $stmt2->bind_param("is", $idfoto, $idproforzz);
                $stmt2->execute();


                if (!$stmt2) {
                    echo 'ERROR AL INGRESAR IMAGENES';
                    exit;
                } else {
                    echo 'IMAGENES INGRESADAS';
                }

                /*cierre for*/
            }
            if ($subio) {

                echo '<div id="ok" class="alert alert-success" role="alert"><b>Imagenes modificadas y subidas satisfactoriamente!</b></div>';
                echo "Archivo subido correctamente";
                ftp_close($con_id);

                //termina subida de datos a la bd

            } else {

                echo 'Ha ocurrido un error';
                ftp_close($con_id);


              //  echo $subio."       espacioo           ";
            }

            // move_uploaded_file($newFileName, $dirPath . $newFileName . "." . $ext);
            echo "Imagen Cargada y Redimensionada Satisfactoriamente.";
        } //else que conecta

        /*isarray*/
    }

    /*ifsubmit */
}



function imageResize($imageSrc, $imageWidth, $imageHeight)
{

    $newImageWidth = 412;
    $newImageHeight = 309;


    $newImageLayer = imagecreatetruecolor($newImageWidth, $newImageHeight);
    imagecopyresampled($newImageLayer, $imageSrc, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $imageWidth, $imageHeight);

    return $newImageLayer;
}

header( "refresh:3;url=formulario_forzza.php" );

?>