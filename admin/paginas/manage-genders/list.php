<tr id="<?php echo $wo['gender_key'];?>" data_selected="<?php echo $wo['gender_key'];?>">
	<td><input type="checkbox" id="check-data-<?php echo $wo['gender_key'];?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo $wo['gender_key'];?>"></label></td>
   <td><?php echo $wo['gender_id'];?></td>
   <td><?php echo $wo['gender_key'];?></td>
   <td id="edit_<?php echo $wo['gender_key'];?>"><?php echo $wo['gender'];?></td>
   <td>
      <button type="button" class="btn bg-success admn_table_btn" data-id="<?php echo $wo['gender_key'];?>" data-toggle="modal" data-target="#defaultModal">Editar</button>
      <button onclick="Wo_DeleteGender('<?php echo $wo['gender_key'];?>','hide');" type="button" class="btn bg-danger admn_table_btn">Eliminar</button>
   </td>
</tr>