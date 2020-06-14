<?php session_start();

include "db.php"; 

               ?>

<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 <title>Forzza</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
 <script src="https://kit.fontawesome.com/abd8ad106c.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="css/estiloheader.css">
 <link rel="stylesheet" href="css/checkout2.css">
 <link rel="stylesheet" href="css/fontello.css">
 <link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/fonts.css">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="estilos/lista_pro.css">
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="css/accountbtn.css"/>
<link rel="stylesheet" href="estilos/footer.css">
<script src="https://kit.fontawesome.com/abd8ad106c.js"></script>
<link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">


<!--partial:index.partial.html -->
<header>

<div class="contenedor">
   
    <div class="navbar-leftx" >
      <a href="index.php"> <img src="img/logo_frozza.png" alt="Cloudy Sky"></a>
    </div>
 
    <div class="divbuscardor">  
      <input type="text"  placeholder="  BUSCADOR">  
    </div>

    <div class="quelepasalupita">
     <img src="img/lupa.png" alt="Cloudy Sky">
    </div>
    
    <?php
            
            if(!isset($_SESSION["uid"])){
              $_SESSION["uid"]=-1;
            }
          if(isset($_SESSION["uid"]) && $_SESSION["uid"]!=-1){
              $sql = "SELECT * FROM usuarios WHERE id_usuario='$_SESSION[uid]'";
              $query = mysqli_query($con,$sql);
              $row=mysqli_fetch_array($query);  
              
              echo '
              <div class="dropdownn" id="loged">
                    <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> Hola '.$row["nombre"].'    </a>
                  <div class="dropdownn-content">
                  <a href="ingreso.php" ><i class="fa fa-user-circle" aria-hidden="true" ></i>Mi Perfil</a>
                  <a href="registro.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i>Salir</a>
                  
                </div>
              </div>';

          
          }  
          else if($_SESSION["uid"]==-1){ 
            $sql = "SELECT * FROM usuarios WHERE id_usuario='$_SESSION[uid]'";
            $query = mysqli_query($con,$sql);
            $row=mysqli_fetch_array($query);    
              echo '
              <div class="dropdownn" id="loged">
                <a href="" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> Ingreso   </a>
                <div class="dropdownn-content">
                  <a href="ingreso.php"><i class="fa fa-sign-in" aria-hidden="true" ></i>Ingresar</a>
                  <a href="registro.php" ><i class="fa fa-user-plus" aria-hidden="true"></i>Registrarse</a>
                  
                </div>
              </div>';
              
          }
          else{
            echo '
              <div class="dropdownn" id="loged">
                <a href="" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> Mal entrado</a>
                <div class="dropdownn-content">
                  <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true" ></i>Ingresar</a>
                  <a href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i>Registrarse</a>
                  
                </div>
              </div>';
            
          }
                                             ?>
 <!------------------------------------------------ Carrito -------------------------------------------------->
    <div class="navbar-rightx">  
      <a href="#" id="cart">  <img src="img/carrito.png" alt="Cloudy Sky" class="imgcarro"> </a>
      <span class="badge">0</span>
        
        <div class="shopping-cart">
          <div class="shopping-cart-header">
            <img class="torito" src="img/torito_rojo.png" alt="item1" > <span class="badge2">0</span> </img>
                
          </div>
          <div class="cart-dropdown" id="pruebaCarro">
            <div class="cart-list" id="cart_product">
           <!-- AQUI ENTRA TODO LO DEL CARRITO -->
            </div>        
            <div class="cart-btns">
              <a href="cart.php" style="width:100%;"><i class="fa fa-edit"></i> Ir a Carrito</a>
            </div>
          </div>
        </div>
    </div> 
    <!----------------------------------------------- Carrito fin ---------------------------------------------->       
    
    <!----------------------------------------------- Comienzo Menu anidado --------------------------------------------->
    <nav class="menu-principal">    
      <ul>

        <li> <a href="index.php"><span class="icon-power-cord"></span> INICIO</a></li>
        <li> <a href="#"><span class="icon-switch"></span>TRABAJO</a></li>
  
        <li class="submenu"> 
            <a href="#"><span class="icon-power"></span>PROYECTO<span class="caret icon-hammer2"></span></a>
              <ul class="children">

              <li><a href=""> SubElemento 1<span class="icon-power"></span></li></span></a>
              <li><a href=""> SubElemento 2 <span class="icon-power"></span></li></a>
              <li><a href=""> SubElemento 3 <span class="icon-power"></span></li></a>
         
             </ul>


        </li>

          <li> <a href="#"><span class="icon-shield"></span>SERVICIOS</a></li>
          <li> <a href="#"><span class="icon-lab"></span>CONTACTO</a></li>
          <li> <a href="lista_pro_vista.php"><span class="icon-switch"></span>TODOS LOS PROD</a></li>
        </ul>

    </nav>  
    <!------------------------------------------------- Fin de menu anidado------------------------------------------------->
           
      </div>
    </div>
   

          <!--</div>-->
  <!--</div> -->

 </header>

 <div class="modal" id="Modal_login" role="dialog" >
    

    <div class="modal-dialog">
                      
  <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
        </div>
        <div class="modal-body">
        <?php
            include "login_form.php";
            
        ?>
      
        </div>
                        
    </div>
                      
</div>
</div>

<div class="modal" id="Modal_register" role="dialog">
<div class="modal-dialog" style="">

  <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
          </div>
          <div class="modal-body">
          <?php
              include "register_form.php";

          ?>

          </div>
                        
    </div>

    </div>
</div>



 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script  src="js/carrito2.js"></script>
<script  src="mainheader.js"></script>