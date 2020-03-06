$(document).ready(function(){





    //Add Product into Cart
$("body").delegate("#product","click",function(event){		
    var pid = $(this).attr("pid");
    
    event.preventDefault();
    alert("entro aca po!");
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








});