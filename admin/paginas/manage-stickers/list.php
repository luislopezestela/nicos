<tr class="setting-stickerlist" id="StickerID_<?php echo $wo['stickerlist']['id']?>" data-sticker-id="<?php echo $wo['stickerlist']['id']?>" data_selected="<?php echo($wo['stickerlist']['id']) ?>">
  <td><input type="checkbox" id="check-data-<?php echo($wo['stickerlist']['id']) ?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo($wo['stickerlist']['id']) ?>"></label></td>
   <td><?php echo $wo['stickerlist']['id']?></td>
   <td>
        <?php echo $wo['stickerlist']['name'];?>
   </td>
   <td>
        <a href="<?php echo lui_GetMedia($wo['stickerlist']['media_file']); ?>" target="_blank">
            <img src="<?php echo lui_GetMedia( $wo['stickerlist']['media_file'] ); ?>" class="setting-avatar" alt="<?php echo $wo['stickerlist']['name']?> Sticker Picture">
        </a>
   </td>
   <td>
     <div class="ajax-time" title="<?php echo date('c',$wo['stickerlist']['time']); ?>">
         <?php echo lui_Time_Elapsed_String($wo['stickerlist']['time']);?>
     </div>
   </td>
   <td>
    <button class="btn bg-danger admn_table_btn" onclick="Wo_DeleteSticker(<?php echo $wo['stickerlist']['id']?>,'hide');">Delete</button>
   </td>
</tr>