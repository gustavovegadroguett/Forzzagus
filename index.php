<!DOCTYPE html>
<html lang="en">
<?php 
include("db.php"); 
error_reporting(0);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forzza index</title>
        <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="estilos/slider.css">
    <link rel="stylesheet" href="estilos/footer.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="estilos/slick.css">

    <!-- scroll reveal-->
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

    <link rel="stylesheet" href="./css/floating-wpp.min.css">

</head>

<body>
    <?php  include 'header2.php';?>
    <br>
    <div class="container-all">

        <input type="radio" id="1" name="image-slide" hidden />
        <input type="radio" id="2" name="image-slide" hidden />
        <input type="radio" id="3" name="image-slide" hidden />

       



    </div>


    <br><br><br><br><br><br><br><br>
    <main class="main-about">
    
        <div class="container-all">
            <input type="radio" id="1" name="image-slide" hidden>
            <input type="radio" id="2" name="image-slide" hidden>
            <input type="radio" id="3" name="image-slide" hidden>


        </div>



        <div class="contenedor-dos">
            <div class="sub-contenedor-dos">
                <div class="marcas">
                    <h2>Nuestras Marcas</h2>
                </div>
                <div class="slider-marcas">
                    
                    <div class="slide">
                        <img src="img/marcas-2.jpg" alt="" id="img-slide">
                    </div>
                    <div class="slide">
                        <img src="img/marcas-3.jpg" alt="" id="img-slide">
                    </div>
                    <div class="slide">
                        <img src="img/logo-transparente.png" alt="" id="img-slide">
                    </div>
                    <div class="slide">
                        <img src="img/marcas-2.jpg" alt="" id="img-slide">
                    </div>
                    <div class="slide">
                        <img src="img/marcas-3.jpg" alt="" id="img-slide">
                    </div>
                    <div class="slide">
                        <img src="img/marcas-1.jpg" alt="" id="img-slide">
                    </div>
                </div>
            </div>
        </div>

        
     

        

       
    </main>
   
    <script>
        window.onload=function(){
                $('.slider-marcas').slick({
                autoplay:true,
                autoplaySpeed:2000,
                arrows:false,
                slidesToShow:4,
                slidesToScroll:1,
                responsive:[
                    {
                        breakpoint: 700,
                        settings: {
                        slidesToShow: 2
                    }
                  },
                  {
                        breakpoint: 480,
                        settings: {
                        arrows: false,
                        centerMode: false,
                        slidesToShow: 1
                    }
                    }
                ]
             });
        };
    </script>
      <?php      include 'nuevofooter.php';?>
    <div id="WAButton"></div>
 
    <script src="js/main_forzza.js"></script>
     <!-- Animacion Scroll -->
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/jquery.js"></script>
    <script src="./js/page-scroll.js"></script>
    <script src="./js/slick.js"></script>
    <script src="./js/core.min.js"></script>
    <script src="./js/script.js"></script>
    <!--Floating WhatsApp javascript-->
    
</body>

</html>