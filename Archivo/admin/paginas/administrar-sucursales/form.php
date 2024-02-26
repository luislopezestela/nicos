<div class="form-group form-float">
  <div class="form-line">
      <label class="form-label">Nombre</label>
      <input type="text" name="nombre" class="form-control" value="<?php echo($wo['nombre']) ?>">
  </div>
  <div class="form-line" hidden>
      <label class="form-label">Pais</label>
      <input type="text" name="pais" class="form-control" value="PERU">
  </div>
  <div class="form-line">
      <label class="form-label">Ciudad</label>
      <input type="text" name="ciudad" class="form-control" value="<?php echo($wo['ciudad']) ?>">
  </div>

  <div class="form-line">
      <label class="form-label">Direccion</label>
      <input type="text" name="direccion" class="form-control" value="<?php echo($wo['direccion']) ?>">
  </div>

  <div class="form-line">
      <label class="form-label">Referencia</label>
      <input type="text" name="referencia" class="form-control" value="<?php echo($wo['referencia']) ?>">
  </div>

  <div class="form-line">
      <label class="form-label">Contacto</label>
      <input type="text" name="phone" class="form-control" value="<?php echo($wo['phone']) ?>">
  </div>
  <div class="form-line">
    <label class="form-label">Foto</label>
    <div class="btn-file d-flex align-items-center">
      <input type="file" id="icono_sucursal<?php echo($wo['id']) ?>" accept="image/x-png, image/gif, image/jpeg" name="media_file" class="hidden">
      <div class="mr-2 change-file-ico">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5,6V17.5A4,4 0 0,1 12.5,21.5A4,4 0 0,1 8.5,17.5V5A2.5,2.5 0 0,1 11,2.5A2.5,2.5 0 0,1 13.5,5V15.5A1,1 0 0,1 12.5,16.5A1,1 0 0,1 11.5,15.5V6H10V15.5A2.5,2.5 0 0,0 12.5,18A2.5,2.5 0 0,0 15,15.5V5A4,4 0 0,0 11,1A4,4 0 0,0 7,5V17.5A5.5,5.5 0 0,0 12.5,23A5.5,5.5 0 0,0 18,17.5V6H16.5Z"></path></svg>
      </div>
      <div class="full-width">
          <b id="icono_sucursal-name<?=($wo['id']);?>">Icono</b>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="id" value="<?php echo($wo['id']) ?>">
<script type="text/javascript">
  $("#icono_sucursal<?=($wo['id']);?>").change(function () {
        var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
            $("#icono_sucursal-name<?=($wo['id']);?>").text(filename);
  });
</script>