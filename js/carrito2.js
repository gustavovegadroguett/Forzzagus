
(function(){
    $(document).click(function() {
       var $item = $(".shopping-cart");
       if ($item.hasClass("active")) {
         $item.removeClass("active");
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
          alert("entro aca po! nuevoo asdasd aeiurnbiergiuerg");
          $('#product_msg').html(data);
          $('.overlay').hide();
        }
      })
    })
     //Count user cart items funtion
	count_item();
	function count_item(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {count_item:1},
			success : function(data){
				$(".badge").html(data);
			}
		})
	}
	//Count user cart items funtion end

	//Fetch Cart item from Database to dropdown menu
	getCartItem();
	function getCartItem(){
    var uid=$(this).parent().parent().pid;
		$.ajax({
     
			url : "action.php",
			method : "POST",
			data : {Common:1,getCartItem:1},
			success : function(data){
				$("#cart_product").html(data);
                net_total();
                
			}
		})
  }
  
  /*
		net_total function is used to calcuate total amount of cart item
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
		$('.net_total').html("Total : $ " +net_total);
  }
  
  
   })
   ();
