<tr class="setting-giftlist" id="GiftID_<?php echo $wo['giftlist']['id']?>" data-gift-id="<?php echo $wo['giftlist']['id']?>" data_selected="<?php echo($wo['giftlist']['id']) ?>">
  <td><input type="checkbox" id="check-data-<?php echo($wo['giftlist']['id']) ?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo($wo['giftlist']['id']) ?>"></label></td>
   <td><?php echo $wo['giftlist']['id']?></td>
   <td>
        <?php echo $wo['giftlist']['name'];?>
   </td>
   <td>
        <a href="<?php echo lui_GetMedia( $wo['giftlist']['media_file'] ); ?>" target="_blank">
            <img src="<?php echo lui_GetMedia( $wo['giftlist']['media_file'] ); ?>" class="setting-avatar" alt="<?php echo $wo['giftlist']['name']?> Imagen Gift">
        </a>
   </td>
   <td>
     <div class="ajax-time" title="<?php echo date('c',$wo['giftlist']['time']); ?>">
         <?php echo lui_Time_Elapsed_String($wo['giftlist']['time']);?>
     </div>
   </td>
   <td>
    <button class="btn btn-danger waves-effect waves-light" onclick="Wo_DeleteGift(<?php echo $wo['giftlist']['id']?>,'hide');">Eliminar</button>
   </td>
</tr>