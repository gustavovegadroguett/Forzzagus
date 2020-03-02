<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8">
        <title>Formulario de Registro</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/formulario.css">
        <script src="js/jquery.js"></script>
	    <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="stylesheet" href="css/buttons.bootstrap.min.css">
	    <link rel="stylesheet" href="css/font-awesome.min.css">
       
        <script type="text/javascript">
            $(document).ready(function() {
                guardar();
                    //variables
                    var clave = $('[name=clave]');
                    var clave2 = $('[name=clave2]');
                    //var confirmacion = "Las contraseñas si coinciden";
                    var negacion = "No coinciden las contraseñas";
                    var longitud = "La contraseña debe estar formada entre 6-10 carácteres (ambos inclusive)";
                    var vacio = "La contraseña no puede estar vacía";
                    //oculto por defecto el elemento span
                    var span = $('<span></span>').insertAfter(clave2);
                    span.hide();
                    //función que comprueba las dos contraseñas
                    function coincidePassword(){
                    var valor1 = clave.val();
                    var valor2 = clave2.val();
                    //muestro el span
                    span.show().removeClass();
                    //condiciones dentro de la función
                    if(valor1 != valor2){
                    span.text(negacion).addClass('negacion');	
                    }
                    if(valor1.length==0 || valor1==""){
                    span.text(vacio).addClass('negacion');	
                    }
                    if(valor1.length<6 || valor1.length>10){
                    span.text(longitud).addClass('negacion');
                    }
                    /*if(valor1.length!=0 && valor1==valor2){
                    span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
                    }*/
                    }
                    //ejecuto la función al soltar la tecla
                    clave2.keyup(function(){
                    coincidePassword();
                    });
                });
      
           
            
            var guardar = function(){
            $("form").on("submit", function(e){
                e.preventDefault();
                var frm = $(this).serialize();
                $.ajax({
                    method: "POST",
                    url: "guardarUsuario.php",
                    data: frm
                }).done(function(info){
                    var json_info = JSON.parse(info);
                    mostrar_mensaje( json_info );
                    limpiar_datos();
                });
            });
        }     
            
            var mostrar_mensaje = function( informacion ){
			var texto = "", color = "";
			if( informacion.respuesta == "BIEN" ){
					texto = "<strong>Bien!</strong> Se han guardado los cambios correctamente.";
					color = "#379911";
			}else if( informacion.respuesta == "ERROR"){
					texto = "<strong>Error</strong>, no se ejecutó la consulta.";
					color = "#C9302C";
			}else if( informacion.respuesta == "EXISTE" ){
					texto = "<strong>Información!</strong> el usuario ya existe.";
					color = "#5b94c5";
			}else if( informacion.respuesta == "VACIO" ){
					texto = "<strong>Advertencia!</strong> debe llenar todos los campos solicitados.";
					color = "#ddb11d";
			}else if( informacion.respuesta == "OPCION_VACIA" ){
					texto = "<strong>Advertencia!</strong> la opción no existe o esta vacia, recargar la página.";
					color = "#ddb11d";
			}
                

			$(".mensaje").html( texto ).css({"color": color });
			$(".mensaje").fadeOut(5000, function(){
					$(this).html("");
					$(this).fadeIn(3000);
			});			
		}
             var limpiar_datos = function(){
			$("#opcion").val("registrar");
			$("#usuario").val("").focus();
			$("#clave").val("").focus();
		}
                
       </script>
    </head>
    <body>
      
            <form  method="POST" class="form-register">
                 <h1 style="text-align:center;">Registro de Usuarios</h1><!-- <img src="css/fondos/Logo%20asatex.jpg" id="logo"> -->
                 <br>
                 <input type="hidden" id="usuario" name="usuario" value="0">
                 <input type="hidden" id="clave" name="clave" value="0">
                 <input type="hidden" id="clave2" name="clave2" value="0">
				 <input type="hidden" id="opcion" name="opcion" value="registrar">
				  <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario"placeholder="Ingrese nombre de usuario" style="width:500px;">
                  </div>
                  <div class="form-group">
                    <label for="clave">Contraseña</label>
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese su Contraseña" style="width:500px;">
                  </div>
                   <div class="form-group">
                    <label for="clave2">Repita su contraseña</label>
                    <input type="password" class="form-control" id="clave2" name="clave2" placeholder="Ingrese nuevamente su contraseña" style="width:500px;" required>
                  </div>
                  <button type="submit" class="btn btn-default" name="insertar">Registrarse</button>
              </form>
              <div class="col-sm-offset-2 col-sm-8">
				<p class="mensaje"></p>
			</div>
       
    </body>
</html>    