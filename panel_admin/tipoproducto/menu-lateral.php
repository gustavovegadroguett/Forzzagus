<?php
  require '../../scripts/funciones.php';

 if(! haIniciadoSesion()){
     header('location: ../inicio.html');
 }
  conectar();
  //$categorias = getCategoriasPorUsuario();
 

?>

<div id="content">
        <span class="slide"><a href="#" onclick="abrirSlideMenu()"><i class="fas fa-bars"></i></a></span>

        <div id="menu" class="nav">
            <div href="#" class="close" onclick="cerrarSlideMenu()">
                <i class="fas fa-times"></i>
            </div>
            
                <figure class="contenedor-logo-title">
                    <img src="../img/logo_forzza.png" alt="paper-plane">
                </figure>
         

            <ul>

                <li><h4>Productos</h4></li>
                <hr>
                <br>
                <li><a href="../index_admin.php"><i class="fas fa-home"></i>&nbsp;&nbsp;Inicio</a></li>
                <li><a href="../formulario_forzza.php"><i class="fas fa-upload"></i>&nbsp;&nbsp;Subir Producto</a></li>
                <li><a href="../listar_producto.php"><i class="fas fa-clipboard-list"></i>&nbsp;&nbsp;Lista de Producto</a></li>
                <li><a href="./agregar_tipo_pro.php"><i class="fas fa-cubes"></i>&nbsp;&nbsp;Tipo de Productos</a></li>
                <br>
               
                <li><h4>Categorías</h4></li>
                <hr>
                <br>
                <li><a href="../categorias/nueva_cat.php"><i class="fas fa-file-upload"></i>&nbsp;&nbsp;Nueva Categoría</a></li>
                <li><a href="../subcate/agregarsubcate.php"><i class="fas fa-file-upload"></i>&nbsp;&nbsp;Nueva Sub Categoría</a></li>
                <li><a href="../subir_marca.php"><i class="fas fa-file-upload"></i>&nbsp;&nbsp;Nueva Marca</a></li>
                <li><a href="../segundotipo/agregar_tipo_producto.php"><i class="fas fa-folder-plus"></i>&nbsp;&nbsp;Asignar Sub Categorías</a></li>
                <br>
               
                <li><h4>Ofertas</h4></li>
                <hr>
                <br>
                <li><a href="../ofertas/form_oferta.php"><i class="fas fa-file-invoice-dollar"></i>&nbsp;&nbsp;Nueva Oferta</a></li>
                <li><a href="#"><i class="far fa-trash-alt"></i>&nbsp;&nbsp;Eliminar Oferta</a></li>

                
                <li class="cerrar-sesion" id="logout">
                    <a href="../../scripts/cerrar-sesion.php">
                     <i class="fas fa-sign-out-alt" id="out"></i>
                     Salir
                    </a>
                </li>

            
            </ul>

          
        </div>

    </div>