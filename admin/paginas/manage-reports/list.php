<tr class="setting-userlist <?php echo ($wo['report']['seen'] == 0) ? ' report-not-seen' : '';?> " id="ReportID_<?php echo $wo['report']['id']?>" data_selected="<?php echo($wo['report']['id']) ?>">
   <td><input type="checkbox" id="check-data-<?php echo($wo['report']['id']) ?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo($wo['report']['id']) ?>"></label></td>
   <td><?php echo $wo['report']['id']?></td>
   <td class="pointer">
      <?php echo ucfirst($wo['report']['type']); ?>
   </td>
   <td>
      <a href="<?php echo $wo['report']['reporter']['url']; ?>">
      <img src="<?php echo $wo['report']['reporter']['avatar'];?>" class="setting-avatar" alt="<?php echo $wo['report']['reporter']['avatar'];?> Foto de perfil">
      <?php echo $wo['report']['reporter']['name']; ?>
      </a>
 
   </td>
   <td>
      <?php if ($wo['report']['type'] == 'post'): ?>
         <a href="<?php echo $wo['report']['story']['url']; ?>">
           <?php echo $wo['lang']['open_post'];?>
         </a>
      <?php elseif($wo['report']['type'] == 'profile'): ?>
         <a href="<?php echo $wo['report']['user']['url']; ?>">
            <?php echo $wo['report']['user']['name']; ?>
         </a>
      <?php elseif($wo['report']['type'] == 'page'): ?>
         <a href="<?php echo $wo['report']['page']['url']; ?>">
            <?php echo $wo['report']['page']['page_name']; ?>
         </a>
      <?php elseif($wo['report']['type'] == 'group'): ?>
         <a href="<?php echo $wo['report']['group']['url']; ?>">
            <?php echo $wo['report']['group']['group_name']; ?>
         </a>
      <?php elseif($wo['report']['type'] == 'comment'): ?>
         <a href="<?php echo $wo['report']['comment']['fullurl']; ?>" target="_blank">
          <?php echo $wo['report']['comment']['Orginaltext'];?>
         </a>
      <?php endif; ?>
   </td>
   <td>
      <div class=" ajax-time" title="<?php echo date('c',$wo['report']['time']); ?>">
         <?php echo lui_Time_Elapsed_String($wo['report']['time']);?>
      </div>
   </td>
   <td>
      <button class="btn bg-success admn_table_btn" onclick="Wo_MarkSafeReportedPost(<?php echo $wo['report']['id']?>,'hide');">Marcar seguro</button>
      <?php if ($wo['report']['type'] == 'post'): ?>
         <button class="btn bg-danger admn_table_btn" onclick="Wo_DeleteReportedContent(<?php echo $wo['report']['story']['id']?>,<?php echo $wo['report']['id']?>,'post','hide');">Eliminar</button>
      <?php elseif($wo['report']['type'] == 'profile'): ?>
          <button class="btn bg-danger admn_table_btn" onclick="Wo_DeleteReportedContent(<?php echo $wo['report']['user']['id']?>,<?php echo $wo['report']['id']?>,'user','hide');">Eliminar</button>
          <button class="btn bg-info admn_table_btn" onclick="$('#read_report').modal().find('.report_text').text('<?php echo htmlspecialchars($wo['report']['text']); ?>')">Ver el informe</button>
      <?php elseif($wo['report']['type'] == 'page'): ?>
         <button class="btn bg-danger admn_table_btn" onclick="Wo_DeleteReportedContent(<?php echo $wo['report']['page']['page_id']?>,<?php echo $wo['report']['id']?>,'page','hide');">Eliminar</button>
         <button class="btn bg-info admn_table_btn" onclick="$('#read_report').modal().find('.report_text').text('<?php echo htmlspecialchars($wo['report']['text']); ?>')">Ver el informe</button>
      <?php elseif($wo['report']['type'] == 'group'): ?>
         <button class="btn bg-danger admn_table_btn" onclick="Wo_DeleteReportedContent(<?php echo $wo['report']['group']['id']?>,<?php echo $wo['report']['id']?>,'group','hide');">Eliminar</button>
         <button class="btn bg-info admn_table_btn" onclick="$('#read_report').modal().find('.report_text').text('<?php echo htmlspecialchars($wo['report']['text']); ?>')">Ver el informe</button>
      <?php elseif($wo['report']['type'] == 'comment'): ?>
         <button class="btn bg-danger admn_table_btn" onclick="Wo_DeleteReportedContent(<?php echo $wo['report']['comment']['id']?>,<?php echo $wo['report']['id']?>,'comment','hide');">Eliminar</button>
         <button class="btn bg-info admn_table_btn" onclick="$('#read_report').modal().find('.report_text').text('<?php echo htmlspecialchars($wo['report']['comment']['Orginaltext']); ?>')">Ver el informe</button>
      <?php endif; ?>
   </td>
</tr>