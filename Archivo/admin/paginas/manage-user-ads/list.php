<tr class="setting-userads" id="userad_<?php echo $wo['user_ad']['id']?>" data-userad-id="<?php echo $wo['user_ad']['id']?>" data_selected="<?php echo($wo['user_ad']['id']) ?>">
  <td><input type="checkbox" id="check-data-<?php echo($wo['user_ad']['id']) ?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo($wo['user_ad']['id']) ?>"></label></td>
   <td><?php echo $wo['user_ad']['id']?></td>
   <td>
      <a href="<?php echo $wo['user_ad']['url']; ?>"> <?php echo lui_UrlDomain($wo['user_ad']['url']); ?></a>
   </td>
   <td>
      <a href="<?php echo $wo['user_ad']['user_data']['url']; ?>">
        <img src="<?php echo $wo['user_ad']['user_data']['avatar']; ?>" class="setting-avatar" alt="<?php echo $wo['user_ad']['user_data']['name']?> imagen de avatar">
         <?php echo $wo['user_ad']['user_data']['name']; ?>
      </a>
   </td>
   <td>
     <div class="ajax-time" title="<?php echo date('c',$wo['user_ad']['posted']); ?>">
         <?php echo lui_Time_Elapsed_String($wo['user_ad']['posted']);?>
     </div>
   </td>
   <td>
     <?php echo $wo['user_ad']['clicks']?>
   </td>
   <td>
     <?php echo $wo['user_ad']['views']?>
   </td>
   <td>
      <?php if (lui_IsAdmin() == true) { ?><!-- <a href="<?php echo $wo['user_ad']['edit-url']?>" class="btn btn-info waves-effect waves-light" target="_blank">EDIT</a><?php } ?> -->
      <button type="button" class="btn bg-danger admn_table_btn delete-ad" id="<?php echo $wo['user_ad']['id']?>" onclick="Wo_DeleteAd('<?php echo($wo['user_ad']['id']) ?>','hide');">Eliminar</button>
   </td>
</tr>