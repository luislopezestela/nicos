<tr class="setting-verificationlist" id="VerificationID_<?php echo $wo['verification']['id']?>"  data_selected="<?php echo $wo['verification']['id']?>">
   <td><input type="checkbox" id="check-data-<?php echo $wo['verification']['id']?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo $wo['verification']['id']?>"></label></td>
   <td><?php echo $wo['verification']['id']?> </td>
   <td>
      <a href="<?php echo $wo['verification']['user_data']['url']; ?>">
      <img src="<?php echo $wo['verification']['user_data']['avatar']?>" class="setting-avatar rounded-circle" alt="<?php echo $wo['verification']['user_data']['name']; ?> Profile Picture">
      <?php echo $wo['verification']['user_data']['name']; ?>
      </a>
   </td>
   <td>
		<button type="button" data-toggle="modal" class="btn bg-info admn_table_btn toggle-verification-request" data-target="#review-verif-request-info-<?php echo $wo['verification']['id']; ?>">Show</button>
	</td>
   <td><?php echo ($wo['verification']['status'] == 1) ? '<span class="badge badge-success">' . $wo['lang']['active'] . '</span>': '<span class="badge badge-danger">' . $wo['lang']['pending'] . '</span>';?></td>
   <td>
      <button onclick="Wo_ApproveRefund(<?php echo $wo['verification']['id']; ?>,'hide')" type="button" class="btn bg-success admn_table_btn">Aprobar</button>
      <button onclick="Wo_DeleteRefund(<?php echo $wo['verification']['id']; ?>,'hide')" type="button" class="btn bg-danger admn_table_btn">Eliminar</button>
   </td>
</tr>
<div class="modal fade" id="review-verif-request-info-<?php echo $wo['verification']['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Mensaje de reembolso</h5>
			</div>
			<div class="modal-body pt-2">
				<p class="mb-1"><span class="badge bg-success-bright text-success"><?php echo $wo['verification']['type_name']; ?></span></p>
				<p><?php echo $wo['verification']['description']; ?></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>