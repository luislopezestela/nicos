<tr class="setting-postlist" id="PostID_<?php echo $wo['story']->id?>" data-post-id="<?php echo $wo['story']->id?>" data_selected="<?php echo $wo['story']->id ?>">
   <td><input type="checkbox" id="check-data-<?php echo $wo['story']->id?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo $wo['story']->id?>"></label></td>
   <td><?php echo $wo['story']->id;?></td>
   <td>
      <a href="<?php echo $wo['story']->publisher['url']; ?>">
      <img src="<?php echo $wo['story']->publisher['avatar']?>" class="setting-avatar rounded-circle" alt="<?php echo $wo['story']->publisher['avatar']?> Foto de perfil">
      <?php echo $wo['story']->publisher['name']; ?>
      </a>
   </td>
   <td><a class="btn bg-info admn_table_btn" href="<?php echo $wo['story']->url;?>" target="_blank"><?php echo $wo['lang']['open_post'];?></a></td>
   <td>
      <div class="ajax-time" title="<?php echo date('c',$wo['story']->time); ?>">
         <?php echo lui_Time_Elapsed_String($wo['story']->time);?>
      </div>
   </td>
   <td><?php echo ($wo['story']->active == '1') ? '<span class="label label-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="green" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"></path></svg> ' . $wo['lang']['active'] . '</span>': '<span class="label label-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="yellow" d="M 11,4L 13,4L 13,15L 11,15L 11,4 Z M 13,18L 13,20L 11,20L 11,18L 13,18 Z"></path></svg> ' . $wo['lang']['pending'] . '</span>';?></td>
   <td>
      <button onclick="Wo_AdminDeletePost(<?php echo $wo['story']->id?>,'hide');" type="button" class="btn bg-danger admn_table_btn">Eliminar</button>
      <?php if ($wo['story']->active == '0') { ?>
         <button onclick="Wo_AdminApprovePost(<?php echo $wo['story']->id?>,'hide');" type="button" class="btn bg-success admn_table_btn">Aprobar</button>
      <?php } ?>
   </td>
</tr>