<?php
//index.php
$connect = mysqli_connect("autoriver.cl", "forzza", "f0rzz4server", "vashir_forzza");
error_reporting(0);


function slide_query($connect)
{
    $query = "SELECT ruta_forzz as ruta FROM fotos ORDER BY id_foto_forzz ASC";
    $result = mysqli_query($connect, $query);
    return $result;
}


include("./conexiones/db.php");
function mostraroferta()
{
    global $con;
    $x = "si";
    $sql = "SELECT sku_producto_id as id , nombre_prod_forzz as nombre,marca_pro_forzz as marca, precio_prod_forzz as precioant,  precio_anterior_forzz as precioferta, oferta_pro_forzz as oferta, ruta_forzz as ruta FROM productos_forzz  INNER JOIN fotos on fotos.id_pro_forzz = productos_forzz.sku_producto_id WHERE oferta_pro_forzz = ? and productos_forzz.estado_pro_forzza = 'DISPONIBLE' LIMIT 8";
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

function slide_indicador($connect){
    $output = '';
    $count = 0;
    $result = slide_query($connect);
    while ($row = mysqli_fetch_array($result)) {
        if ($count == 0) {
            $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="' . $count . '" class="active"></li>
   ';
        } else {
            $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="' . $count . '"></li>
   ';
        }
        $count = $count + 1;
    }
    return $output;
}
      


function slide_img($connect){
    $output = '';
    $count = 0;
    $result = mostraroferta($connect);
    while ($row = mysqli_fetch_assoc($result)) {
        $numero = $row['precioant'] ;
        $numeroferta = $row['precioferta'];
        $separadormilesant = number_format($numero, 0, '', '.');
        $separadormilesof  = number_format($numeroferta, 0, '', '.');
        if ($count == 0) {
            $output .= '<div class="item active" id="activo">';
        } else {
            $output .= '<div class="item">';
        }
        $output .= '
        <a  target="\_blank" href="http://localhost/forzza/vista_pre.php?oe='.$row['id'].'" class="caluga-superior" id="link_a">
        <div class="cont-img-slide">
            <img src="' . $row["ruta"] . '" / id="img-slide">
        </div>

              
              
                <div class="carousel-caption">    
                <div class="sub-item-slide">
                        <div class="porcentaje">
                            <h2>'.$row['nombre'].'</h2>
                            <h2>'.$row['marca'].'</h2>
                            <p>$'.$separadormilesant.'</p>
                            
                        </div>
                        </a>
                       
                    </div>
                
        </div>
    </div>';

        $count = $count + 1;
    }
    return $output;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Forzza</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="estilos/carrusel.css">
    <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
</head>

<body>
    
    <div class="container">
        <div class="cont-slider" id="cont-slider">
        <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators" id="indicador">
                <?php echo slide_indicador($connect); ?>
            </ol>

            <div class="carousel-inner">
                <?php echo slide_img($connect); ?>
                
            </div>
         
            
            <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
        </div>
    </div>
</body>

</html>