<div class="form-group form-float">
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>Pais</th>
            <th>Departamento</th>
            <th>Provincia</th>
            <th>Distrito</th>
            <th>Direccion</th>
            <th>Contacto</th>
            <th>Correo</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($wo['sucursalproveedoreslista'] as $sucursal) {
            $wo['id'] = $sucursal['id'];
            $wo['pais'] = $sucursal['pais'];
            $wo['departamento'] = $sucursal['departamento'];
            $wo['provincia'] = $sucursal['provincia'];
            $wo['distrito'] = $sucursal['distrito'];
            $wo['direccion'] = $sucursal['direccion'];
            $wo['contacto'] = $sucursal['contacto'];
            $wo['correo'] = $sucursal['correo'];
            echo lui_LoadAdminPage('proveedores/lista_proveedores_sucursales');
          } ?>
        </tbody>
    </table>
  </div>
  <div class="clearfix"></div>
</div>
<input type="hidden" name="id" value="<?php echo($wo['id']) ?>">
