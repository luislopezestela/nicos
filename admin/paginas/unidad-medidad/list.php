<tr id="list-<?php echo($wo['id']) ?>">
  <td><?php echo($wo['id']) ?></td>
  <td id="sub_name_<?php echo($wo['id']) ?>"><?php echo($wo['nombre']) ?></td>
  <td>
  	<button class="btn bg-success admn_table_btn" onclick="EditUnidadmedida('<?php echo($wo['id']) ?>')">Editar</button>
  	<?php 
  	if ($wo['id'] > 1) {?>
  		<button class="btn bg-danger admn_table_btn" onclick="DeleteUnidadmedida(this,'<?php echo($wo['id']) ?>','hide')">Eliminar</button>
  	<?php } ?>
  </td>
</tr>