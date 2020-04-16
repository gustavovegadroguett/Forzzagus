<?php

include "header2.php";
include "db.php";
require_once "./vendor/autoload.php";
use Transbank\Webpay\Configuration;
use Transbank\Webpay\Webpay;
$transaction = (new Webpay(Configuration::forTestingWebpayPlusNormal()))
               ->getNormalTransaction();   
?>
<div class="cuerpo">
    <iframe src="webpay.php"  width="1000" height="1000" border:none >
       
    </iframe>                


</div>

<?php
    include "nuevofooter.php";

?>