<?php
$dbcon = new MySQLi("forzza.cl","vistas_forzza","vistas.%","vashir_forzza");
header("Content-Type: text/html;charset=utf-8");

?>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<header class="page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap" style="height: 177px;">
            <nav class="rd-navbar rd-navbar_default rd-navbar-original rd-navbar-static" data-layout="rd-navbar-fixed"
                data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed"
                data-lg-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
                data-xl-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static"
                data-xxl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-lg-stick-up="true"
                data-xl-stick-up="true" data-xxl-stick-up="true" data-lg-stick-up-offset="35px"
                data-xl-stick-up-offset="35px" data-xxl-stick-up-offset="35px">
                <!-- RD Navbar Top Panel-->
                <div class="rd-navbar-top-panel">
                    <div class="rd-navbar-top-panel__main toggle-original-elements">
                        <div class="rd-navbar-top-panel__toggle rd-navbar-fixed__element-1 rd-navbar-static--hidden toggle-original"
                            data-rd-navbar-toggle=".rd-navbar-top-panel__main"><span></span></div>
                        <div class="rd-navbar-top-panel__content">
                            <div class="rd-navbar-top-panel__left">
                                <ul class="rd-navbar-items-list">
                                    <li>
                                        <div class="unit flex-row align-items-center unit-spacing-xs">
                                            <div class="unit-left">
                                                <img src="./images/gps.png" alt="">
                                            </div>
                                            <div class="unit-body">
                                                <p><a href="#">Dirección: Av. Salitrera victoria Mz.E Sitio 43B (1,02 km) Iquique</a></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="unit flex-row align-items-center unit-spacing-xs">
                                            <div class="unit-left"><img src="./images/telefono.png" alt=""></i>
                                            </div>
                                            <div class="unit-body">
                                                <ul class="list-semicolon">
                                                    <li><a href="tel:#">+569 9298 4569</a></li>
                                                    <!-- <li><a href="tel:#">(800) 123-0045</a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="rd-navbar-top-panel__right">
                                <ul class="list-inline-xxs">
                                    <li><a class="icon icon-xxs icon-gray-darker fa fa-facebook" href="https://www.facebook.com/Forzza-2177292765724014/?__tn__=%2Cd%2CP-R&eid=ARC6bhMaQvDCIHe2H4agC2e_M-hstD80tBsKGJSX2XWEIHmfPebt4kSvJ9i0vu5AHV4bAQWItUYV3MQB"></a></li>
                                    <li><a class="icon icon-xxs icon-gray-darker fa fa-instagram" href="https://www.instagram.com/comac.iqq7/?hl=es-la"></a></li>
                                    <!-- <li><a class="icon icon-xxs icon-gray-darker fa fa-google-plus" href="#"></a></li>
                                    <li><a class="icon icon-xxs icon-gray-darker fa fa-vimeo" href="#"></a></li>
                                    <li><a class="icon icon-xxs icon-gray-darker fa fa-youtube" href="#"></a></li>
                                    <li><a class="icon icon-xxs icon-gray-darker fa fa-pinterest-p" href="#"></a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rd-navbar-inner rd-navbar-search-wrap toggle-original-elements">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel rd-navbar-search-lg_collapsable">
                        <button class="rd-navbar-toggle toggle-original"
                            data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <!-- RD Navbar Brand-->
                        <div class="rd-navbar-brand"><a class="brand-name" href="index.php"><img
                                    src="images/logo_forzza.png" alt="" width="329" height="39"></a></div>
                    </div>
                    <!-- RD Navbar Nav-->
                    <div class="rd-navbar-nav-wrap rd-navbar-search_not-collapsable toggle-original-elements">
                        <!-- RD Navbar Nav-->
                        
                        <div class="rd-navbar-search_collapsable">
                            <ul class="rd-navbar-nav">
                            <li><a href="index.php" id="link_a">Inicio</a>
                                </li>

                            <?php
                                $categoria=$dbcon->query("SELECT * FROM categoria_forzz ORDER BY id_categoria_forzz DESC LIMIT 8");
                                while($fila=$categoria->fetch_array()){
                                ?>

                                <li class="rd-navbar--has-megamenu rd-navbar-submenu">
                                    <a name="<?php echo $fila['cat_menu_link']; ?>"><?php echo $fila['nombre_categoria_forzz']; ?></a>  <!-- function consulta_categorias -->

                                    <?php
                                        $subcategoria=$dbcon->query("SELECT * FROM sub_categoria_forzz WHERE id_cat_forzz ='".$fila['id_cat_forzz']."' LIMIT 8");
                                    ?>

                                    <ul class="rd-navbar-megamenu rd-navbar-open-right">

                                    <?php  
                                        while($sub_fila=$subcategoria->fetch_array()){
                                        ?>
                                        <li>
                                       
                                            <p class="rd-megamenu-header"><?php echo $sub_fila['nombre_sub_forzz']; ?></p>
                                            <hr id="pe">
                                            <!-- <p class="rd-megamenu-header">General</p>  -->

                                            <?php
                                                $producto=$dbcon->query("SELECT * FROM tipo_producto WHERE id_subca='".$sub_fila['id_sub_forzz']."' LIMIT 8");
                                            ?>
                                             <?php  
                                                    while($pro_fila=$producto->fetch_array()){
                                                ?>

                                            <ul class="rd-megamenu-list">

                                                    <li>
                                                        <a href="lista_pro.php?x=<?php echo $pro_fila['id_tipo_pro'];?>&c=<?php echo $pro_fila['nombre_tipo_producto'];?>"><?php echo $pro_fila['nombre_tipo_producto'];?></a>
                                                        
                                            
                                                    </li>
                                                   
                                            </ul>
                                           
                                                        <?php
                                                        }
                                                        ?>
                                                <ul class="rd-megamenu-list" id="ver_mas"> 

                                                    
                                                    <li><a href="tipo_producto.php?x=<?php echo $sub_fila['id_sub_forzz'];?>">Ver Más >>></a></li>
                                                </ul>
                                            
                                                
                                                    </li>
                                                
                                                        <?php
                                                        }
                                                        ?>
                                    </ul>
                                        
                                </li>
                                        <?php
                                        }
                                        ?>
                                <li class="rd-navbar--has-dropdown rd-navbar-submenu"><a href="categorias.php" id="link_a">Más Categorías</a>
                                </li>
                                <li class="rd-navbar--has-dropdown rd-navbar-submenu"><a href="ofertas.php" id="link_a">Ofertas</a>
                                </li>
                                <li><a href="nosotros.php" id="link_a">Nosotros</a>
                                </li>
                               
                                <li><a href="contacto.php" id="link_a">Contacto</a>
                                </li>
                                <li><div class="dropdown">
									<font size="4" color="red"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span font="red">Your Cart</span>
										<div class="badge qty">0</div>
									</a>
                                    </font>
									<font size="4" color="red"> <div class="cart-dropdown"  >
										<div class="cart-list" id="cart_product">
																				
										</div>
										<div class="cart-btns">
												<a href="cart.php" style="width:100%;"><i class="fa fa-edit"></i>  edit cart</a>
											
										</div>
									</div>
									</font>	
									</div>
                                </li>    
                                    
                            </ul>
                            
                           
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>