


$(".submenu").click(function(){
    $(this).children("ul").slideToggle();
});

$("ul").click(function(p){
    p.stopPropagation();
});
$("li").click(function(p){
    p.stopPropagation();
});


$('#sub-stock').removeAttr('style');
$('#sub-stock').hide();

