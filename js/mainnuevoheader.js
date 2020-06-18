

  /*  window.alert("Texto a mostrar");*/
$(document).ready(main);
/*esta wea permite que el nav en responsive se muestre y se oculte*/ 
var contador = 1;

function main() {

$('.cosito').click(function(){
   /* window.alert("Texto a mostrar");*/
    if(contador == 1){

        $('.navbarx').animate({

            left: '0'
        });
        contador = 0;

    }else {

        contador = 1;
        $('.navbarx').animate({

            left: '-100%'
        });
    }


});

// mostramos y ocultamos sub menus

$('.submenu').click(function(){
  /*  window.alert("Texto a mostrar");*/

  $(this).children('.children').slideToggle();
   



});



    
     
  
 




}