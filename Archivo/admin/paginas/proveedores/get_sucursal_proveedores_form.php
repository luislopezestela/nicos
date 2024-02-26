<div class="form-group form-float">
  <div class="form-line">
      <label class="form-label">Pais</label>
      <input type="text" name="pais_u" class="form-control" value="<?php echo($wo['datos_para_editar_sucursal']->pais) ?>">
  </div>

  <div class="form-line">
      <label class="form-label">Departamento</label>
      <input type="text" name="departamento_u" class="form-control" value="<?php echo($wo['datos_para_editar_sucursal']->departamento) ?>">
  </div>
  <div class="form-line">
      <label class="form-label">Provincia</label>
      <input type="text" name="provincia_u" class="form-control" value="<?php echo($wo['datos_para_editar_sucursal']->provincia) ?>">
  </div>
  <div class="form-line">
      <label class="form-label">Distrito</label>
      <input type="text" name="distrito_u" class="form-control" value="<?php echo($wo['datos_para_editar_sucursal']->distrito) ?>">
  </div>
  <div class="form-line">
      <label class="form-label">Direccion</label>
      <input type="text" name="direccion_u" class="form-control" value="<?php echo($wo['datos_para_editar_sucursal']->direccion) ?>">
  </div>

  <div class="form-line">
      <label class="form-label">Contacto</label>
      <input type="text" name="contacto_u" class="form-control" value="<?php echo($wo['datos_para_editar_sucursal']->contacto) ?>">
  </div>
  <div class="form-line">
      <label class="form-label">Correo</label>
      <input type="text" name="correo_u" class="form-control" value="<?php echo($wo['datos_para_editar_sucursal']->correo) ?>">
  </div>

</div>
<input type="hidden" name="id" value="<?php echo($wo['datos_para_editar_sucursal']->id) ?>">