<tr class="setting-postlist" id="<?php echo $wo['page']['id'];?>" data_selected="<?php echo($wo['page']['id']) ?>">
	<td><input type="checkbox" id="check-data-<?php echo($wo['page']['id']) ?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo($wo['page']['id']) ?>"></label></td>
   <td><?php echo $wo['page']['id'];?></td>
   <td><a href="<?php echo lui_SeoLink('index.php?link1=paginas&page_name=' . $wo['page']['page_name']); ?>"><?php echo $wo['page']['page_name'];?></a></td>
   <td><?php echo $wo['page']['page_title'];?></td>
   <td>
      <a class="btn bg-success admn_table_btn" href="<?php echo lui_LoadAdminLinkSettings('edit-custom-page?id=' . $wo['page']['page_name']); ?>">Editar</a>
      <button class="btn bg-danger admn_table_btn" onclick="Wo_DeleteCustomPage(<?php echo $wo['page']['id'];?>,'hide');">Eliminar</button>
   </td>
</tr>