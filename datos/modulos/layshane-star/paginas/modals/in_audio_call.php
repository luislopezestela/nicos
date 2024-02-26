<div class="modal fade" id="re-calling-modal" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog wow_mat_mdl modal-md">
		<div class="modal-content text-center wo_calling_modals">
			<img src="<?php echo $wo['incall']['in_call_user']['avatar'];?>" alt="">
			<div class="modal-header">
				<div class="avatar">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" /></svg>
					<img src="<?php echo $wo['incall']['in_call_user']['avatar'];?>" alt="">
				</div>
				<h4 class="modal-title"><?php echo $wo['lang']['new_audio_call'];?></h4>
			</div>
			<div class="modal-body">
                <p><b><?php echo $wo['incall']['in_call_user']['name'];?></b><br><?php echo $wo['lang']['new_audio_call_desc'];?></p>
				<div class="clear"></div>
			</div>
			<div class="modal-footer">
				<button data-href="<?php echo $wo['incall']['url'];?>" type="button" class="btn answer-call btn-main btn-mat" onclick="Wo_AnswerCall('<?php echo $wo['incall']['id'];?>', '<?php echo $wo['incall']['url'];?>', 'audio');"><i class="fa fa-phone progress-icon" data-icon="phone"></i> <?php echo $wo['lang']['accept_and_start'];?></button>
				<button type="button" class="btn decline-call btn-default btn-mat" onclick="Wo_DeclineCall('<?php echo $wo['incall']['id'];?>', '', 'audio');"><i class="fa fa-times progress-icon" data-icon="times"></i> <?php echo $wo['lang']['decline'];?></button>
			</div>
		</div>
	</div>
</div>