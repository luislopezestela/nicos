<tr id="list-<?php echo($wo['section_lang_key']) ?>" data_selected="<?php echo($wo['section_lang_key']) ?>">
	<?php if ($wo['section_lang_key'] != 'other') { ?>
	<td><input type="checkbox" id="check-data-<?php echo($wo['section_lang_key']) ?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo($wo['section_lang_key']) ?>"></label></td>
	<?php }else{ ?>
		<td></td>
	<?php } ?>
  <td id="sub_name_<?php echo($wo['section_key']) ?>"><?php echo($wo['section_name']) ?></td>
  <td>
  	<button class="btn bg-success admn_table_btn"onclick="edit_section('<?php echo($wo['section_lang_key']) ?>','<?php echo($wo['section_key']) ?>')">Editar</button>
  	<?php if ($wo['section_lang_key'] != 'all_') { ?>
  		<button class="btn bg-danger admn_table_btn delete-content" data-id="<?php echo($wo['section_lang_key']) ?>" onclick="Wo_DeleteCat_section('<?php echo($wo['section_lang_key']) ?>','hide');">Eliminar</button>
  	<?php } ?>
  </td>
</tr>