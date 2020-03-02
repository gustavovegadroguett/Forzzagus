<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quienes Somos | Forzza</title>
    <link rel="stylesheet" href="./estilos/q_somos.css">
    <link rel="stylesheet" href="./estilos/footer.css">
    <script src="https://kit.fontawesome.com/abd8ad106c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">

    <script src="./js/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script>
    <script src="./js/cdn-cgi/apps/body/4o300efCt-CXoq1JEC-sVReFz48.js"></script>
  
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" href="./css/floating-wpp.min.css">
</head>

<body>
 
<?php  include 'menu_db.php';?>

    <div class="container-portada">
        <div class="capa-gradiente"></div>
        <div class="container-detalle">
            <div class="detalle">
               
                <div class="contenido-sub">
                    <h3>Nuestro<br>Equipo Forzza</h3>
                </div>
            </div>
        </div>

    </div>
    <div class="contenedor-division"></div>
    
    <h2 class="subtitulo">Quienes Somos</h2>
    <hr>
    
    <main class="main-contenido">
        <div class="contenido-calugas">
            <div class="contenido_qs">
            <div class="contenido-img_qs">
            </div>
                
                <div class="contenido-text_qs">
                    <p> <br><br>Comac S.P.A es una sociedad por acciones dedicada a la comercialización de productos en el rubro de
                    la mineria, la construcción y una gran variedad de artículos de ferretería. </p>
                    
                    <p>Actualmente busca ampliar su rubro comerciando materiales de construcción.</p>
                    
                    <p>Ferreterías Forzza, tiene una trayectoria de más de 10 años en el rubro de la venta de herramientas y
                    maquinarias, dentro de la Zona Franca de Iquique.</p> 
                    
                    <p>La organización se ha caracterizado por ofrecer un
                    servicio de excelencia, propocionando soluciones reales y en tiempos acotados; teniendo, además,
                    vendedores con amplios conocimientos en cada producto.</p>
                    
                    <p>Garantizamos que en cada uno de nuestros productos y atención, está el valor agregado que la
                    organización quiere entregar a cada uno de sus clientes, brindando con ello un Servicio Técnico a
                    los equipos, entregando soluciones reales en tiempo acotados.</p>
                    <br>
                   
                </div>
            </div>    
        </div>
        
    </main>

    <main class="main-contenido">
        <div class="contenido-calugas">
            <div class="contenido_ms">
               

                <div class="contenido-text_ms">
                    <h2>Mision</h2>
                    <p> Somos una organización especializada en importación, comercialización y venta retail en el
                        rubro de productos de ferretería, automotriz y mineros dentro de la Zona Franca de Iquique.
                        Ofrecemos a nuestros clientes una gran variedad de productos que responden a las necesidades
                        integrales en maquinarias, materiales de construcción, herramientas y ferreteros. Contamos con
                        importaciones directas de China de diversos productos innovadores y representaciones de una
                        marca altamente reconocida por sus estándares de calidad como lo es Forzza.
                        Garantizamos un fuerte conocimiento técnico de nuestros colaboradores, al igual que un adecuado
                        servicio de post-venta, el cual ofrece servicio técnico y garantía, esto con el fin de generar
                        una relación de confianza con nuestros clientes”.
                    </p>
                    
                    <h2>Vision</h2>
                    
                    <p>Ser lideres en importación y comercialización en ventas a lo largo de nuestro país, además de
                        abrirnos paso a gran parte del mercado latinoamericano, ofreciendo siempre un valor agregado
                        para nuestros clientes externos e internos y nuestros proveedores
                    </p>
                
                    <h2>Valores</h2>

                    <p>Responsabilidad</p>
                    <p>Honestidad</p>
                    <p>Lealtad</p>
                    <p>Compromiso</p>

                </div>

                <div class="contenido-img_ms">
                </div>
               
            </div>
        </div>
        
    </main>

    <?php  include 'footer.php';?>
    

    <div id="WAButton"></div>
    
    <script src="js/main_forzza.js"></script>
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="js/jquery.js"></script>
    <!-- <script src="js/script.js"></script> -->

    <script src="./js/core.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/index.spa.bundle.dee7f94436e2f0efaff9.js"></script>
    <script src="./js/javascript/Logger.js"></script>
    
      <!--Floating WhatsApp javascript-->
      <script type="text/javascript" src="./js/floating-wpp.min.js"></script>
    <script type="text/javascript">
            $(function() {
                $('#WAButton').floatingWhatsApp({
                    phone: '56956697219', //WhatsApp Business phone number
                    headerTitle: 'Chatea con nosotros en Whatsapp', //Popup Title
                    popupMessage: 'Hola, En que podemos ayudarte ?', //Popup Message
                    showPopup: true, //Enables popup display
                    buttonImage: '<img src="./img/iconos/whatsapp.svg" />', //Button Image
                    //headerColor: 'crimson', //Custom header color
                    //backgroundColor: 'crimson', //Custom background button color
                    position: "left", //Position: left | right
                    size: "50px"

                });
            });
    </script>
    
</body>


</html>