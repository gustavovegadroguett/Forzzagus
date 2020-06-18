$("body").delegate("#aumento","click",function(event){
    var cantidad=$("#cantidad_prod").val();
    cantidad= parseInt(cantidad) + 1;
    $("#cantidad_prod").val(cantidad);    

  })
  $("body").delegate("#disminuye","click",function(event){
    var cantidad=$("#cantidad_prod").val();
    if(cantidad > 1){
    cantidad= parseInt(cantidad) - 1;
    }
    $("#cantidad_prod").val(cantidad);    

  })