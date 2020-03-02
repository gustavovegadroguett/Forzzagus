function load(page){
    var parametros = {"action" : "ajax", "page" : page};
    $("#loader").fadeIn('slow');
    $.ajax({
        url:'producto_ajax.php',
        data:parametros,
        beforeSend: function(objeto){
        $("#loader").html("<img src='../img/loader.gif'>");
        },
        success:function(data){
            $(".outer_div").html(data).fadeIn('slow');
            $("#loader").html("");

        }
    })
}

        $("#dataUpdate").on('slow.bs.modal', function (event){
            var button = $(event.relatedTarjet) //Boton  que activa la ventana modal
            var code = button.data('code')
            var name = button.data('name')
            var modelo = button.data('modelo')
            var marca = button.data('marca')
            var price = button.data('price')
            var ruta = button.data('ruta')
            var cantidad = button.data('cantidad')
            var id_img = button.data('id_img')
            var descripcion = button.data('descripcion')
            var especificacion = button.data('especificacion')
            

            var modal = $(this)
            modal.find('.modal-title').text('Modificar Producto : ' +name)
            modal.find('.modal-body #code').val(code)
            modal.find('.modal-body #name').val(name)
            modal.find('.modal-body #modelo').val(modelo)
            modal.find('.modal-body #marca').val(marca)
            modal.find('.modal-body #price').val(price)
            modal.find('.modal-body #ruta').val(ruta)
            modal.find('.modal-body #cantidad').val(cantidad)
            modal.find('.modal-body #id_img').val(id_img)
            modal.find('.modal-body #descripcion').val(descripcion)
            modal.find('.modal-body #especificacion').val(especificacion)
            $('.alert').hide(); //alert oculto
        })

            $('#dataDelete').on('show.bs.modal', function (event){
                var button = $(event.relatedTarjet) //boton que activa la ventana modal
                var code = button.data('code') // extraer la informacion de atributos de los datos
                var modal = $(this)
                modal.find('#code_sku').val(code)
            })

            $("#actualizarDatos").submit(function(event){
                var parametros = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "modificar_img.php",
                    data: parametros,
                    beforeSend: function(objeto){
                        $("#datos_ajax").html("Mensaje : Cargando...");

                    },
                    success: function(datos){
                        $("#datos_ajax").html(datos);

                        load(1);

                    }
                });

                event.preventDefault();
                
            });

            $("#guardarDatos").submit(function(event){
                var parametros = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "agregar.php",
                    data:parametros,
                    beforeSend: function(objeto){
                        $("#datos_ajax_register").html("Mensaje: Cargando...");

                    },
                    success: function(datos){
                        $("#datos_ajax_register").html(datos);

                        load(1);
                    }
                });
                event.preventDefault();
            });

            $("#eliminarDatos").submit(function(event){
                var parametros = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "eliminar.php",
                    data: parametros,
                    beforeSend: function(objeto){
                        $(".datos_ajax_delete").html("Mensaje: Cargando...");

                    },
                    success: function(datos){
                        $(".datos_ajax_delete").html(datos);

                        $('#dataDelete').modal('hide');
                        load(1);

                    }

                });

                event.preventDefault();

            });



        
