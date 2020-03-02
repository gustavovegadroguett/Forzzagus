<?php

function conectar()
{
    
    $conexion = mysqli_connect("localhost", "root", "123123", "vashir_forzza");
    mysqli_set_charset($conexion, 'utf8');

    if(!$conexion) {
        die('Error en la conexión');
    }

    return $conexion;
}

function mostrar_menu() {
    $conexion = conectar();

    $menus = '';
    $menus .= generate_multilevel_menus($conexion);

    $menus = str_replace('<div class="enlaces-subcategoria"></div>','', $menus);

    return $menus;
}

function generate_multilevel_menus($conexion, $parent_id = NULL) {
    
    $menu = '';
    $sql = '';
    if( is_null($parent_id)) {
        $sql = "SELECT * FROM menu_forzz WHERE parent_id IS NULL";
    }else {
        $sql = "SELECT * FROM menu_forzz WHERE  parent_id = $parent_id";
    }

    $result = mysqli_query($conexion, $sql);

    while($row = mysqli_fetch_assoc ($result)) {

        if ($row['page']) {

            $menu .= '<a href="'.$row['page'].'" data-categoria="'.$row['data_categoria'].'">'.$row['title'].'<i class="fas fa-angle-right"></i></a>';
        
        }else {

            $menu .= '<a href="#" data-categoria="'.$row['data_categoria'].'">'.$row['title'].'<i class="fas fa-angle-right"></i></a>';
        
        }

        $menu .= '<div class="subcategoria activo">'.generate_multilevel_menus($conexion, $row['id']).'</div>';
        //$menu .= '</div>';
    }
    return $menu;
}

function mostrar_sub_menu() {
    $conexion = conectar();

    $submenus = '';
    $submenus .= generate_multilevel_sub_menus($conexion);

    $submenus = str_replace('<div class="enlaces-subcategoria"></div>','', $submenus);

    return $submenus;
}

function generate_multilevel_sub_menus($conexion,  $parent_id = NULL) {
  
    $submenu = '';
    $sql = '';
    if( is_null($parent_id)) {
    $sql = "SELECT * FROM menu_forzz WHERE parent_id IS NULL";
    }else {
        $sql = "SELECT * FROM menu_forzz WHERE  parent_id = $parent_id";
    }
        
    

    $result = mysqli_query($conexion, $sql);

    while($row = mysqli_fetch_assoc ($result)) {

        if ($row['page']) {

            $submenu .= '<h4 class="subtitulo-main"><a href="'.$row['page'].'">'.$row['title'].'</a></h4>';
        
        }else {

            $submenu .= '<h4 class="subtitulo-main"><a href="'.$row['page'].'">'.$row['title'].'</a></h4>';
        }

        $submenu .= '<div class="subcategoria activo" data-categoria="'.$row['data_categoria'].'" >'.generate_multilevel_sub_menus($conexion, $row['id']).'</div>';

        //$menu .= '</div>';
        
    }
    return $submenu;
}





?>