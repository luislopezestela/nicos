<tr class="setting-invitation" data-invitation="<?php echo $wo['invitation']['id']; ?>" data_selected="<?php echo($wo['invitation']['id']) ?>">
  <td><input type="checkbox" id="check-data-<?php echo($wo['invitation']['id']) ?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo($wo['invitation']['id']) ?>"></label></td>
  <td >
     <?php echo $wo['invitation']['id']; ?>
  </td>
  <td >
     <?php echo lui_Time_Elapsed_String($wo['invitation']['time']); ?>
  </td>
  <td>
     <?php echo $wo['invitation']['code']; ?>
  </td>
  <td>
     <?php if (!empty($wo['invitation']['user_name'])) { ?>
        <a href="<?php echo($wo['invitation']['user_url']) ?>"><?php echo $wo['invitation']['user_name']; ?></a>
      <?php } ?>
  </td>
  <td>
     <button class="btn bg-danger admn_table_btn delete-admin-invitation" id="<?php echo $wo['invitation']['id']; ?>" onclick="Wo_DeleteCode('<?php echo($wo['invitation']['id']) ?>','hide');">Delete</button>
  </td>
</tr>
