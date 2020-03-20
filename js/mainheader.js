$(document).ready(main);
/*esta wea permite que el nav en responsive se muestre y se oculte*/ 
var contador = 1;

function main() {

$('.menu_bar').click(function(){

    if(contador == 1){

        $('nav').animate({

            left: '0'
        });
        contador = 0;

    }else {

        contador = 1;
        $('nav').animate({

            left: '-100%'
        });
    }


});

// mostramos y ocultamos sub menus

$('.submenu').click(function(){
    $(this).children('.children').slideToggle();


});




}