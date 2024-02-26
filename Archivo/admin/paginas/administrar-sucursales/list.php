<tr id="list-<?php echo($wo['id']) ?>">
  <td><?php echo($wo['id']) ?></td>
  <td id="sub_name_<?php echo($wo['id']) ?>"><?php echo($wo['nombre']) ?></td>
  <td id="sub_ciudad_<?php echo($wo['id']) ?>"><?php echo($wo['ciudad']) ?></td>
  <td id="sub_direccion_<?php echo($wo['id']) ?>"><?php echo($wo['direccion']) ?></td>
  <td id="sub_referencia_<?php echo($wo['id']) ?>"><?php echo($wo['referencia']) ?></td>
  <td id="sub_phone_<?php echo($wo['id']) ?>"><?php echo($wo['phone']) ?></td>
  <td><div class="" style="width:100px;height:100px;object-fit:cover;position:relative;"><?php 
  if (preg_match("/<[^<]+>/",$wo['foto']?? '',$m)) {
  	echo($wo['foto']);
  }
  else{ ?>
   <div class="reaction"><img style="object-fit:cover;width:100%;height:100%;" src="<?php echo($wo['foto']) ?>"></div>
  <?php } ?></div></td>
  <td>
  	<button class="btn bg-success admn_table_btn" onclick="EditSucursal('<?php echo($wo['id']) ?>')">Editar</button>
  	<?php 
  	if ($wo['id'] > 6) {?>
  		<button class="btn bg-danger admn_table_btn" onclick="DeleteSucursal(this,'<?php echo($wo['id']) ?>','hide')">Eliminar</button>
  	<?php } ?>
  </td>
</tr>