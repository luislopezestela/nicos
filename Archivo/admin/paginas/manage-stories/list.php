<tr data-status-id="<?php echo $wo['status']['id']?>" data_selected="<?php echo $wo['status']['id']?>">
  <td><input type="checkbox" id="check-data-<?php echo $wo['status']['id']?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo $wo['status']['id']?>"></label></td>
   <td><?php echo $wo['status']['id']?></td>
   <td>
      <span><?php echo $wo['status']['expires']; ?></span>
   </td>
   <td>
      <a href="<?php echo $wo['status']['user_data']['url']; ?>">
        <img src="<?php echo $wo['status']['user_data']['avatar']; ?>" class="setting-avatar" alt="<?php echo $wo['status']['user_data']['name']?> Foto de perfil">
         <?php echo $wo['status']['user_data']['name']; ?>
      </a>
   </td>
   <td>
     <div class="ajax-time" title="<?php echo date('c',$wo['status']['posted']); ?>">
         <?php echo lui_Time_Elapsed_String($wo['status']['posted']);?>
     </div>
   </td>
   <td>
      <button onclick="Wo_DeleteStatus(<?php echo $wo['status']['id']; ?>,'hide')" type="button" class="btn bg-danger admn_table_btn">Delete</button>
   </td>
</tr>