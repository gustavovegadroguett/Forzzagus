(function () {
  
})
  //se ejecuta en cada carga de pagina nueva.
  checkOutDetails();
  function checkOutDetails(){
    $('.overlay').show();
   
     $.ajax({
       
       url : "actioncart.php",
       method : "POST",
       data : {ingreso:1,checkOutDetails:1},
       success : function(data){
         $('.overlay').hide();
         $("#cart_checkout").html(data);
           net_total();
       }
     })
   }
  function net_total(){
    var net_total=0;
    net_total=parseInt(net_total);
		$('.subtotal').each(function(){
      var precio= parseInt($(this).html());
      net_total +=precio;
      
		})
		$('.net_total').html(net_total);
  }
$('body').on('click','.control_cantidad',function(){
  var operacion=$(this).val();
  var buscar=$(this).parent();
  var buscarenviado=$(this).parent().parent().parent().parent();
  var cantidad=buscar.find('#cantidad_prod').attr('value');
  var id=buscar.find('#cantidad_prod').attr('id_update');
  
  if(operacion == '+' ){
    cantidad= parseInt(cantidad) + 1;
  }else if (operacion== '-' && cantidad>1){
    cantidad= parseInt(cantidad)-1;
  }else{
    return false;
  }
  
  buscar.find("#cantidad_prod").attr('value',cantidad); 
  actualizarcantidad(id,cantidad,buscarenviado);
    
  actualizartotal();
})



function actualizarcantidad(update_id,qty,buscar){
  $.ajax({
    url:"actioncart.php",
    method:"POST",
    data: {updateCartItem:1,update_id:update_id,qty:qty},
      success: function(data){
      buscar.find('.subtotal').html(data);
    }

  })

}
function actualizartotal(){


}

$('body').on('click','.eliminar',function(event){
  
  var remove = $(this).parent();
  var remove_id = remove.find('.eliminar').attr('id_remove');
  alert("llego hasta aqui antes ajax ");
  $.ajax({
      url	:	"actioncart.php",
      method	:	"POST",
      data	:	{removerItem:1,rid:remove_id},
      success	:	function(data){
          $("#cart_msg").html(data);
          checkOutDetails();
          }
      })
})


      