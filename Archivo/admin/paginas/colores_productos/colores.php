<tr id="list-<?php echo($wo['colores_lang_key']) ?>" data_selected="<?php echo($wo['colores_lang_key']) ?>">
	<td style="background-color:<?php echo($wo['color'] ? $wo['color'] : '') ?>;width:100%;height:100%;position:relative;"></td>
  <td id="sub_name_<?php echo($wo['colores_key']) ?>"><?php echo($wo['colores_name']) ?></td>
  <td>
  	<button class="btn bg-success admn_table_btn"onclick="edit_colores_productos('<?php echo($wo['colores_lang_key']) ?>')">Editar</button>
  	<?php if ($wo['colores_lang_key'] != 'other') { ?>
  		<button class="btn bg-danger admn_table_btn delete-content" data-id="<?php echo($wo['colores_lang_key']) ?>" onclick="Wo_DeleteColoresProducto('<?php echo($wo['colores_lang_key']) ?>','hide');">Eliminar</button>
  	<?php } ?>
  </td>
</tr>