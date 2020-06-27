<?php session_start();

include("db.php");

               ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/cart.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/header.css">
  
 
 
  <title>Document</title>
</head>

<body>


  <div class="contenedor">

    <div class="contendorimagenlogo">
      <a href="index.php"> <img src="img/logo_frozza.png" alt="Cloudy Sky"></a>
    </div>

    <div class="divbuscador"> <input type="text" class="inputbuscardor" placeholder="  BUSCADOR"></div>


    <div class="lupa"><img src="img/lupa.png" alt="Cloudy Sky"></div>

    <div class="contenedordropdownn">
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
                  <a href="perfil.php" ><i class="fa fa-user-circle" aria-hidden="true" ></i>Mi Perfil</a>
                  <a href="logout.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i>Salir</a>
                  
                </div>
              </div>';

          
          }  
          else if($_SESSION["uid"]==-1){ 
            $sql = "SELECT * FROM usuarios WHERE id_usuario='$_SESSION[uid]'";
            $query = mysqli_query($con,$sql);
            $row=mysqli_fetch_array($query);    
              echo '
              <div class="dropdownn" id="loged">
                <a href="" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> '.$row["nombre"].'   '.$_SESSION["uid"].'</a>
                <div class="dropdownn-content">
                  <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true" ></i>Ingresar</a>
                  <a href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i>Registrarse</a>
                  
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


    </div>

    <div class="navbar-rightx">
      <div class="contenedordellaimagencarrito">
        <a href="#" id="cart">

          <img src="img/carrito.png" alt="Cloudy Sky" class="imgcarro"></a>
        <center></i><span class="badge">0</span></center>

        <div class="shopping-cart">
          <div class="shopping-cart-header">
            <div class="contenedortorito">
              <img class="torito" src="img/torito_rojo.png" alt="item1" /><span class="badge2">0</span>
            </div>
            <div class="shopping-cart-total">
              <span class="lighter-text">Total:</span>
              <span class="main-color-text total">$0</span>
            </div>
          </div>





          <ul class="shopping-cart-items">


            <div class="cart-list" id="cart_product">

            </div>


            <center><a href="cart.php" class="button">
                <p>Ir al Carrito</p>
              </a></center>


        </div>


      </div>



    </div>





















  </div>






  <div class="menu_bar">
    <div class="contendorimagenlogo">

      <a href="index.php"> <img src="img/logo_frozza.png" alt="Cloudy Sky"></a>
    </div>
    <div class="contendorlupaytodo">

      <div class="contenedordropdownn">
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
                  <a href="perfil.php" ><i class="fa fa-user-circle" aria-hidden="true" ></i>Mi Perfil</a>
                  <a href="logout.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i>Salir</a>
                  
                </div>
              </div>';

          
          }  
          else if($_SESSION["uid"]==-1){ 
            $sql = "SELECT * FROM usuarios WHERE id_usuario='$_SESSION[uid]'";
            $query = mysqli_query($con,$sql);
            $row=mysqli_fetch_array($query);    
              echo '
              <div class="dropdownn" id="loged">
                <a href="" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> '.$row["nombre"].'   '.$_SESSION["uid"].'</a>
                <div class="dropdownn-content">
                  <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true" ></i>Ingresar</a>
                  <a href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i>Registrarse</a>
                  
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


      </div>












      <div class="lupa"><img src="img/lupa.png" alt="Cloudy Sky"></div>
      <a href="#" id="cart " style="text-decoration:none">
        <div class="contenedordellaimagencarrito">
          <div class="contenbageyrighx">

            <div class="navbar-rightx">


              <!--este hrf debe direccionar al carro-->


              <img src="img/carrito.png" alt="Cloudy Sky" class="imgcarro">
              <span class="badge" style="font-size:15px;">0</span>
            </div>
          </div>
        </div>
      </a>
    </div>







    <div class="cosito">

      <a href="#" class="bt-menu"><span class="icon-menu"></span> </a>
    </div>
  </div>




  <div class="navbarx">
  <div class="buscadoroculto">
              <form action="/action_page.php"> <input type="text" class="inputbuscardor" placeholder="  BUSCADOR">  <button class="buscadoroculto" type="submit">Buscar</button>
              
              </form>

  </div>

    <a href="#home" class="inicio">Home</a>
    <div class="dropdownx">
      <div class="submenu">
        <button class="dropbtn">Herramientas
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="children">
          <div class="dropdown-contentx">
            <div class="headerx">
              <h2>Mega Menu</h2>
            </div>
            <div class="rowx">

              
              <div class="columnx">
                <h3>Category 1</h3>
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
              </div>
              <div class="columnx">
                <h3>Category 2</h3>
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
              </div>
              <div class="columnx">
                <h3>Category 3</h3>
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
              </div>
            </div>
          </div><!-- fin drop down conten -->
        </div>
      </div>
    </div>

    <a href="#news" class="inicio">News</a>
    <div class="dropdownx">
      <div class="submenu"><button class="dropbtn ">Construccion
          <i class="fa fa-caret-down"></i>
        </button>

        <div class="children">
          <div class="dropdown-contentx">
            <div class="headerx">
              <h2>Mega Menu</h2>
            </div>

            <div class="rowx">
              <div class="columnx">
                <h3>Category 1</h3>
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
              </div>
              <div class="columnx">
                <h3>Category 2</h3>
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
              </div>
              <div class="columnx">
                <h3>Category 3</h3>
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
              </div>
              <div class="columnx">
                <h3>Category 4</h3>
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



























</body>

</html>




<div class="modal" id="Modal_login" role="dialog">

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

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/carrito2.js"></script>

<script src="./js/core.min.js"></script>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/mainnuevoheader.js"></script>