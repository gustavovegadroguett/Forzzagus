$(document).ready(function(){
  
});


(function(){
    $(document).click(function() {
       var $item = $(".shopping-cart");
       if ($item.hasClass("active")) {
         $item.removeClass("active");
         $(".badge2").html=$(".badge").html;
         $("#total_muestra").html= $("#total_carrito2").html;
        
       }
     });

     
     $('.shopping-cart').each(function() {
       var delay = $(this).index() * 50 + 'ms';
       $(this).css({
           '-webkit-transition-delay': delay,
           '-moz-transition-delay': delay,
           '-o-transition-delay': delay,
           'transition-delay': delay,
           
       });
     });

     
     $('#cart').click(function(e) {
       e.stopPropagation();
       
       $(".shopping-cart").toggleClass("active");
       $('.shopping-cat active').z-index(100 );

     });
     
     $('#addtocart').click(function(e) {
       e.stopPropagation();
       $(".shopping-cart").toggleClass("active");
     });
   

     //---------------------------------Crear item en Dropdown carrito----------------------------------------------------


     $("body").delegate("#product","click",function(event){		
      var pid = $(this).attr("pid");
      
      event.preventDefault();
      
      $(".overlay").show();
      $.ajax({
        url : "action.php",
        method : "POST",
        data : {addToCart:1,proId:pid,},
        success : function(data){
         
          count_item();
          getCartItem();
          
          $('#product_msg').html(data);
          $('.overlay').hide();
        }
      })
    })
     //Count user cart items funtion


	count_item();
	function count_item(){  //esto lo llaman desde  la funcion donde captura el click del boton que agrega al carrito
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {count_item:1},
			success : function(data){
        $(".badge").html(data);
        $(".badge2").html(data);
			}
		})
	}
	//Count user cart items funtion end

	//Fetch Cart item from Database to dropdown menu
	getCartItem();  //esto se ejecuta en cada carga de pagina nueva.
	function getCartItem(){
    
    $.ajax({
     
			url : "action.php",
      method : "POST",
			data : {ingreso:1,getCartItem:1},
			success : function(data){
        
        $(".cart-list").html(data);
       
          net_total();
                
			}
		})
  }
  
  /*
    net_total function is used to calcuate total amount of cart item,
    esta muestra el total sumado  del carrito en cart.php
	*/
	function net_total(){
		var net_total = 0;
		$('.qty').each(function(){
			var row = $(this).parent().parent();
			var price  = row.find('.price').val();
			var total = price * $(this).val()-0;
			row.find('.total').val(total);
		})
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : $ " + net_total);
  }


  checkOutDetails();  //se ejecuta en cada carga de pagina nueva.
  function checkOutDetails(){
    $('.overlay').show();
    
     $.ajax({
       
       url : "action.php",
       method : "POST",
       data : {ingreso:1,checkOutDetails:1},
       success : function(data){
         $('.overlay').hide();
         $("#cart_checkout").html(data);
           net_total();
       }
     })
   }
   
   /*
		whenever user click on .remove class we will take product id of that row 
		and send it to action.php to perform product removal operation
	*/
    
	   
  $("body").delegate(".remove","click",function(event){
    var remove = $(this).parent().parent().parent();
    var remove_id = remove.find(".remove").attr("remove_id");
    $.ajax({
        url	:	"action.php",
        method	:	"POST",
        data	:	{removeItemFromCart:1,rid:remove_id},
        success	:	function(data){
            $("#cart_msg").html(data);
            checkOutDetails();
            }
        })
})
/*
		Here #login is login form id and this form is available in index.php page
		from here input data is sent to login.php page
		if you get login_success string from login.php page means user is logged in successfully and window.location is 
		used to redirect user from home page to profile.php page
	*/
	$("#login").on("submit",function(event){
		event.preventDefault();
    $(".overlay").show();
    
		$.ajax({
			url	:	"login.php",
			method:	"POST",
			data	:$("#login").serialize(),
			success	:function(data){
				if(data == "login_success"){
          $("#e_msg").html(data);

          window.location.href = "index.php";
          
				}else if(data == "cart_login"){
         
					window.location.href = "cart.php";
				}else{
          alert("else parece error " + data);
					$("#e_msg").html(data);
					$(".overlay").hide();
				}
			}
		})
	})
  //end 
  //Get User Information before checkout
	$("#signup_form").on("submit",function(event){
		event.preventDefault();
		alert("probando entrada a signup js");
		$(".overlay").show();
		$.ajax({
			url : "register.php",
			method : "POST",
			data : $("#signup_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "register_success") {
          //window.location.href = "cart.php";
          alert(data);
				}else{
					$("#signup_msg").html(data);
				}
				
			}
		})
  })
  
  //end
    $("body").delegate(".update","click",function(event){
      var update = $(this).parent().parent().parent();
      var update_id = update.find(".update").attr("update_id");
      var qty = update.find(".qty").val();
      $.ajax({
        url	:	"action.php",
        method	:	"POST",
        data	:	{updateCartItem:1,update_id:update_id,qty:qty},
        success	:	function(data){
          $("#cart_msg").html(data);
          checkOutDetails();
        }
      })


    })

  
  
   })
   ();
