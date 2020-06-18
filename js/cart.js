(function(){


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