<tr id="list-<?php echo($wo['id']) ?>">
  <td id="sub_name_<?php echo($wo['id']) ?>"><?php echo($wo['nombre']) ?></td>
  <td id="sub_ruc_<?php echo($wo['id']) ?>"><?php echo($wo['ruc']) ?></td>
  <td id="sub_phone_<?php echo($wo['id']) ?>"><?php echo($wo['phone']) ?></td>
  <td>
    <div class="" style="width:100%; position:relative;text-align:center;display:flex;align-items:center;justify-content:center;position:relative;"><?php 
      if (preg_match("/<[^<]+>/",$wo['logo']?? '',$m)) {
      	echo($wo['logo']);
      }else{ ?>
       <div style="width:100%;max-width:50px; position:relative;display:flex;justify-content:center;align-items:center;"><img style="width:100%;" src="<?php echo($wo['logo']) ?>"></div>
      <?php } ?>
    </div>
  </td>
  <td>
  	<button style="width:100%;margin-bottom:5px;" class="btn bg-success admn_table_btn" onclick="EditProveedores('<?php echo($wo['id']) ?>')">Editar</button>
    <button style="width:100%;margin-bottom:5px;" class="btn bg-success admn_table_btn" onclick="AgregarProveedoresSucursal('<?php echo($wo['id']) ?>')">Agregar Sucursal</button>

    <button style="width:100%;margin-bottom:5px;" class="btn bg-success admn_table_btn" onclick="MostrarProveedoresSucursal('<?php echo($wo['id']) ?>')">Sucursales</button>
  	<?php 
  	if ($wo['id'] > 1) {?>
  		<button style="width:100%;margin-bottom:5px;" class="btn bg-danger admn_table_btn" onclick="DeleteProveedores(this,'<?php echo($wo['id']) ?>','hide')">Eliminar</button>
  	<?php } ?>
  </td>
</tr>