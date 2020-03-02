<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/estilo_admin.css">
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../menu-gestion/css/estilo_menu.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
    <title>Panel Admin</title>
</head>

<body>
<div id="container">
<?php include 'menu-lateral.php'; ?>

    <div class="cont-dolar">
        <div class="indicadores">
            <?php
                        $apiUrl = 'http://www.mindicador.cl/api';
                        //Es necesario tener habilitada la directiva allow_url_fopen para usar file_get_contents
                        if ( ini_get('allow_url_fopen') ) {
                            $json = file_get_contents($apiUrl);
                        } else {
                            //De otra forma utilizamos cURL
                            $curl = curl_init($apiUrl);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            $json = curl_exec($curl);
                            curl_close($curl);
                        }
                 
                        $dailyIndicators = json_decode($json);
                       // echo '<div id="uf"><h4>UF $' . $dailyIndicators->uf->valor;
                       //echo '</h4><br></div>';
                 
                        echo '<div id="dolar"><h4>Precio Dólar $' . $dailyIndicators->dolar->valor .'</h4><br></div>';

                 
                       // echo '<div id="euro"><h4>Euro $' . $dailyIndicators->euro->valor;
                       // echo '</h4><br></div>';
                 
                       // echo '<div id="utm"><h4>UTM $' . $dailyIndicators->utm->valor;
                       // echo '</h4><br></div>';
                 ?>
        </div>
    </div>
    </div>

    <script src="../menu-gestion/js/menu_mov.js"></script>
<script src="../js/jquery.js"></script>
</body>

</html>