<tr class="setting-event" id="list_<?php echo $wo['review']->id ?>" data_selected="<?php echo $wo['review']->id ?>">
  <td><input type="checkbox" id="check-data-<?php echo $wo['review']->id?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo $wo['review']->id?>"></label></td>
   <td><?php echo $wo['review']->id?></td>
   <td>
      <a href="<?php echo $wo['review']->product['url']; ?>" target="_blank">LINK</a>
   </td>
   <td>
      <a href="<?php echo $wo['review']->user_data['url']; ?>">
        <img src="<?php echo $wo['review']->user_data['avatar']; ?>" class="setting-avatar" >
         <?php echo $wo['review']->user_data['name']; ?>
      </a>
   </td>
   <td>
     <div class="ajax-time">
         <?php echo date('F j Y, g:i a', $wo['review']->time); ?>
     </div>
   </td>
   <td>
      <?php echo $wo['review']->review; ?>
   </td>
   <td>
      <button type="button" class="delete-event btn bg-danger admn_table_btn" id="<?php echo $wo['review']->id?>" onclick="DeleteReview(<?php echo $wo['review']->id?>,'hide')">Eliminar</button>
   </td>
</tr>