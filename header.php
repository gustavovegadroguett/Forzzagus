
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forzza</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style4.css">
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

<link rel="stylesheet" href="estilos/lista_pro.css">
<link rel="stylesheet" href="estilos/footer.css">
<script src="https://kit.fontawesome.com/abd8ad106c.js"></script>
<link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/accountbtn.css"/>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/fonts.css">
<link rel="stylesheet" href="css/estilos.css">
	

<!-- partial:index.partial.html -->

<nav>
  <div class="contenedor">
  <ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-inr"></i> INR</a></li>
						<li><?php
                             include "db.php";
                             
                            if(isset($_SESSION["uid"])){
                                $sql = "SELECT * FROM usuarios WHERE id_usuario='$_SESSION[uid]'";
                                $query = mysqli_query($con,$sql);
                                $row=mysqli_fetch_array($query);  
                                
                                echo '
                               <div class="dropdownn">
                                  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> HI '.$row["nombre"].'  '.$row["apellido"]
                                  .'</a>
                                  <div class="dropdownn-content">
                                    <a href="" data-toggle="modal" data-target="#profile"><i class="fa fa-user-circle" aria-hidden="true" ></i>My Profile</a>
                                    <a href="logout.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</a>
                                    
                                  </div>
                                </div>';

                            }else{ 
                                echo '
                                <div class="dropdownn">
                                  <a href="" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> My Account</a>
                                  <div class="dropdownn-content">
                                    <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true" ></i>Login</a>
                                    <a href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a>
                                    
                                  </div>
                                </div>';
                                
                            }
                                             ?>
                               
                                </li>				
					</ul>
					
				</div>
   <div class="navbar-leftx" >
   <ul>
<il><a href= "index.php"> INICIO</a></li>
<il><a href= "#"> SEGURIDAD</a></li>

<il><a href= "lista_pro.php?x=<?php echo $pro_fila['id_tipo_pro'];?>&c=<?php echo $pro_fila['nombre_tipo_producto']; ?>"> CONTRUCCION </a></li>

<il><a href= "#"> HOGAR </a></li>
<il><a href= "lista_pro_vista.php"> Todos los productos</a></li>
<il><a href= "#">> HOLI </a></li>
</ul>
   <a href="index.php" ><img src="img/logo_frozza.png" alt="Cloudy Sky"> </a>

    </div>
    

  <div class="divbuscardor">
<!--<img src="img/logo_frozza.png" alt="Cloudy Sky">-->
 <!--<div class="contebus">--><input type="text"  placeholder="  BUSCADOR"><!-- style="width : 452px; height : 48"</div> -->
</div>
    <div class="quelepasalupita">
      <img src="img/lupa.png" alt="Cloudy Sky">
    
    </div>
  
  
  
   <!--  <div class="topcorner">-->
    <div class="navbar-rightx">
      <a href="#" id="cart">
      <img src="img/carrito.png" alt="Cloudy Sky">
      </i><span class="badge">0</span></a>

    <div class="shopping-cart">
      <div class="shopping-cart-header">
        <img src="img/torito_rojo.png" alt="item1" /><span class="badge2">0</span>
            <div class="shopping-cart-total">
             <!-- <span class="lighter-text">Total:</span> -->
               <!-- <span class="main-color-text total">$0</span> -->
            </div>
      </div>
       
      
          <div class="cart-dropdown" id="pruebaCarro">
                <div class="cart-list" id="cart_product">

                </div>        
                <div class="cart-btns">
                     <a href="cart.php" style="width:100%;"><i class="fa fa-edit"></i>  edit cart</a>
              
                </div>
          </div>
        
         

      </div>
      
      
<!--</div>-->








</div>

</div>


 

</nav>



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


  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/carrito2.js"></script>

