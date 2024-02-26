<tr id="listas_sucursal-<?php echo($wo['id']) ?>">
  <td id="sub_pais_"><?=$wo['pais'];?></td>
  <td id="sub_departamento_"><?=$wo['departamento'];?></td>
  <td id="sub_provincia_"><?=$wo['provincia'];?></td>
  <td id="sub_distrito_"><?=$wo['distrito'];?></td>
  <td id="sub_direccion_"><?=$wo['direccion'];?></td>
  <td id="sub_contacto_"><?=$wo['contacto'];?></td>
  <td id="sub_correo_"><?=$wo['correo'];?></td>
  <td>
    <button style="width:100%;margin-bottom:5px;" class="btn bg-success admn_table_btn" onclick="editar_proveedor_delsucursal_lista('<?php echo($wo['id']) ?>')">Editar</button>
    <?php 
    if ($wo['id'] > 1) {?>
      <button style="width:100%;margin-bottom:5px;" class="btn bg-danger admn_table_btn" onclick="EliminarSucursalProveedores(this,'<?php echo($wo['id']) ?>','hide')">Eliminar</button>
    <?php } ?>

  </td>

</tr>