<tr id="list-<?php echo($wo['category_lang_key']) ?>" data_selected="<?php echo($wo['category_lang_key']) ?>">
	<?php if ($wo['category_lang_key'] != 'other') { ?>
	<td><input type="checkbox" id="check-data-<?php echo($wo['category_lang_key']) ?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo($wo['category_lang_key']) ?>"></label></td>
	<?php }else{ ?>
		<td></td>
	<?php } ?>
  <td><img width="50" height="60" src="<?php echo($wo['category_logo']) ?>"></td>
  <td id="sub_name_<?php echo($wo['category_key']) ?>"><?php echo($wo['category_name']) ?></td>
  <td>
  	<button class="btn bg-success admn_table_btn"onclick="edit_category('<?php echo($wo['category_lang_key']) ?>','<?php echo($wo['category_key']) ?>')">Editar</button>
  	<?php if ($wo['category_lang_key'] != 'other') { ?>
  		<button class="btn bg-danger admn_table_btn delete-content" data-id="<?php echo($wo['category_lang_key']) ?>" onclick="Wo_DeleteCat('<?php echo($wo['category_lang_key']) ?>','hide');">Eliminar</button>
  	<?php } ?>
  </td>
</tr>