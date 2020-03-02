<form id="guardarDatos">
  <div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Agregar Producto</h4>
        </div>
        <div class="modal-body">
          <div id="datos_ajax_register"></div>
          <div class="form-group">
            <label for="code0" class="control-label"> #SKU</label>
            <input type="text" class="form-control" id="code0" name="code" required maxlength="20">
          </div>
          <div class="form-group">
            <label for="nombre0" class="control-label">Nombre</label>
            <input type="text" class="form-control" id="nombre0" name="nombre" required maxlength="45">
          </div>
          <div class="form-group">
            <label for="modelo0" class="control-label">Modelo</label>
            <input type="text" class="form-control" id="modelo0" name="modelo" required maxlength="3">
          </div>
          <div class="form-group">
            <label for="marca0" class="control-label">Marca</label>
            <input type="text" class="form-control" id="marca0" name="marca" required maxlength="30">
          </div>
          <div class="form-group">
            <label for="price0" class="control-label">Precio</label>
            <input type="text" class="form-control" id="price0" name="price" required maxlength="15">
          </div>
          <div class="form-group">
            <label for="ruta0" class="control-label">Ruta</label>
            <input type="text" class="form-control" id="ruta0" name="ruta" required maxlength="30">
          </div>
          <div class="form-group">
            <label for="cantidad0" class="control-label">Cantidad</label>
            <input type="text" class="form-control" id="cantidad0" name="cantidad" required maxlength="30">
          </div>
          <div class="form-group">
            <label for="id_img0" class="control-label">Imagen</label>
            <input type="text" class="form-control" id="id_img0" name="id_img" required maxlength="30">
          </div>
          <div class="form-group">
            <label for="descripcion0" class="control-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion0" name="descripcion" required maxlength="30">
          </div>
          <div class="form-group">
            <label for="especificacion0" class="control-label">Especificaciones</label>
            <input type="text" class="form-control" id="especificacion0" name="especificacion" required maxlength="30">
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar datos</button>
        </div>
      </div>
    </div>
  </div>
</form>