<tr class="setting-banlist" id="IPID_<?php echo $wo['ip']['id']?>" data_selected="<?php echo($wo['ip']['id']) ?>">
   <td><input type="checkbox" id="check-data-<?php echo($wo['ip']['id']) ?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo($wo['ip']['id']) ?>"></label></td>
   <td><?php echo $wo['ip']['id']?></td>
   <td>
      <div class="ajax-time" title="<?php echo date('c',$wo['ip']['time']); ?>">
         <?php echo lui_Time_Elapsed_String($wo['ip']['time']);?>
      </div>
   </td>
   <td>
     <?php echo $wo['ip']['ip_address']?>
   </td>
   <td>
      <a href="javascript:void(0)" class="btn bg-danger admn_table_btn" onclick="DeleteBan(<?php echo $wo['ip']['id']; ?>,'hide')">Eliminar</a>
   </td>
</tr>