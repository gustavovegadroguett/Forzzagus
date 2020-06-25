<?php 
        require_once "./vendor/autoload.php";
        include "db.php";
        use Transbank\Webpay\Configuration;
        use Transbank\Webpay\Webpay;
        
        if (isset($_POST["valorprod"])){
            
            $valor=$_POST["valorprod"];
        
            $transaction = (new Webpay(Configuration :: forTestingWebpayPlusNormal()))
                ->getNormalTransaction();   
            $ip_usuario=getenv("REMOTE_ADDR");
            $amount=$valor;
            $sessionId='sessionId';
            $buyOrder = strval(rand(10000,9999999));
            $urlReturn= 'http://192.168.0.138/forzza/retornoTransbank.php';
            $urlFinal= 'http://192.168.0.138/forzza/final.php';

            $initResult= $transaction->initTransaction(
                $amount,$sessionId,$buyOrder,$urlReturn,$urlFinal
            );
            
            $formAction= $initResult->url;
            $tokenWs=$initResult->token;
            $objenvio= new \stdClass();
            $objenvio->url=$formAction;
            $objenvio->token=$tokenWs;
           
            echo json_encode($objenvio);
        }
        ?>