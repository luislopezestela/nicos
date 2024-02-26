<tr class="setting-verificationlist" id="VerificationID_<?php echo $wo['verification']['id']?>" data_selected="<?php echo $wo['verification']['id']?>">
   <td><input type="checkbox" id="check-data-<?php echo $wo['verification']['id']?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo $wo['verification']['id']?>"></label></td>
   <td><?php echo $wo['verification']['id']?> </td>
   <td>
      <a href="<?php echo $wo['verification']['request_from']['url']; ?>">
      <img src="<?php echo $wo['verification']['request_from']['avatar']?>" class="setting-avatar rounded-circle" alt="<?php echo $wo['verification']['request_from']['name']; ?> Profile Picture">
      <?php echo $wo['verification']['request_from']['name']; ?>
      </a>
   </td>
   <td><?php if ($wo['verification']['type'] == 'User'): ?>
         <button type="button" data-toggle="modal" class="btn bg-info admn_table_btn toggle-verification-request" data-target="#review-verif-request-info-<?php echo $wo['verification']['id']; ?>">Show Info</button>
      <?php endif ?></td>
   <td><?php echo $wo['verification']['type']; ?></td>
   <td>
      <button onclick="Wo_Verify(<?php echo $wo['verification']['request_from']['id']?>,<?php echo $wo['verification']['id']?>,'<?php echo $wo['verification']['type']?>','hide')" type="button" class="btn bg-success admn_table_btn"><?php echo $wo['lang']['verify'];?></button>

      <button onclick="Wo_DeleteVerification(<?php echo $wo['verification']['id']?>,'hide')" type="button" class="btn bg-danger admn_table_btn"><?php echo $wo['lang']['ignore'];?></button>
   </td>
</tr>
<?php if ($wo['verification']['type'] == 'User'): ?>
<div class="modal fade" id="review-verif-request-info-<?php echo $wo['verification']['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Informacion de verificacion</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<a href="<?php echo lui_GetMedia($wo['verification']['passport']); ?>" class="image-popup-gallery-item-<?php echo $wo['verification']['id']; ?>">
							<div class="image-hover">
								<img src="<?php echo lui_GetMedia($wo['verification']['passport']); ?>" class="rounded" alt="image" style="width: 100%;min-height: 200px;max-height: 200px;">
								<div class="image-hover-body rounded">
									<div><h4 class="mb-2">Pasaporte</h4></div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="<?php echo lui_GetMedia($wo['verification']['photo']); ?>" class="image-popup-gallery-item-<?php echo $wo['verification']['id']; ?>">
							<div class="image-hover">
								<img src="<?php echo lui_GetMedia($wo['verification']['photo']); ?>" class="rounded" alt="image" style="width: 100%;min-height: 200px;max-height: 200px;">
								<div class="image-hover-body rounded">
									<div><h4 class="mb-2">Foto</h4></div>
								</div>
							</div>
						</a>
					</div>
				</div>
				<br>
				<p class="mb-1"><span class="badge bg-success-bright text-success">Nombre</span></p>
				<p><?php echo $wo['verification']['user_name']; ?></p>
				<p class="mb-1"><span class="badge bg-info-bright text-info">Mensaje</span></p>
				<p><?php echo $wo['verification']['message']; ?></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
   $(document).ready(function() {
      $('.image-popup-gallery-item-<?php echo $wo['verification']['id']; ?>').magnificPopup({
           type: 'image',
           gallery: {
               enabled: true
           },
           zoom: {
               enabled: true,
               duration: 300,
               easing: 'ease-in-out',
               opener: function(openerElement) {
                   return openerElement.is('img') ? openerElement : openerElement.find('img');
               }
           }
       });
   });
</script>

<?php endif; ?>   