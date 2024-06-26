<div class="wo_settings_page wow_content">
	<div class="avatar-holder invite">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Profile Picture" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['invitation_links']; ?></p>
		</div>
	</div>
	<hr>
	
	<div class="earn_points">
		<div class="ep_illus">
			<div class="ep_how_many comment_post">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10.59,13.41C11,13.8 11,14.44 10.59,14.83C10.2,15.22 9.56,15.22 9.17,14.83C7.22,12.88 7.22,9.71 9.17,7.76V7.76L12.71,4.22C14.66,2.27 17.83,2.27 19.78,4.22C21.73,6.17 21.73,9.34 19.78,11.29L18.29,12.78C18.3,11.96 18.17,11.14 17.89,10.36L18.36,9.88C19.54,8.71 19.54,6.81 18.36,5.64C17.19,4.46 15.29,4.46 14.12,5.64L10.59,9.17C9.41,10.34 9.41,12.24 10.59,13.41M13.41,9.17C13.8,8.78 14.44,8.78 14.83,9.17C16.78,11.12 16.78,14.29 14.83,16.24V16.24L11.29,19.78C9.34,21.73 6.17,21.73 4.22,19.78C2.27,17.83 2.27,14.66 4.22,12.71L5.71,11.22C5.7,12.04 5.83,12.86 6.11,13.65L5.64,14.12C4.46,15.29 4.46,17.19 5.64,18.36C6.81,19.54 8.71,19.54 9.88,18.36L13.41,14.83C14.59,13.66 14.59,11.76 13.41,10.59C13,10.2 13,9.56 13.41,9.17Z" /></svg>
				<b><span id="available_links"><?php echo $wo['available_links']; ?></span> <?php echo $wo['lang']['available_links']; ?></b>
			</div>
			<div class="ep_how_many create_post">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10.6 13.4A1 1 0 0 1 9.2 14.8A4.8 4.8 0 0 1 9.2 7.8L12.7 4.2A5.1 5.1 0 0 1 19.8 4.2A5.1 5.1 0 0 1 19.8 11.3L18.3 12.8A6.4 6.4 0 0 0 17.9 10.4L18.4 9.9A3.2 3.2 0 0 0 18.4 5.6A3.2 3.2 0 0 0 14.1 5.6L10.6 9.2A2.9 2.9 0 0 0 10.6 13.4M23 18V20H20V23H18V20H15V18H18V15H20V18M16.2 13.7A4.8 4.8 0 0 0 14.8 9.2A1 1 0 0 0 13.4 10.6A2.9 2.9 0 0 1 13.4 14.8L9.9 18.4A3.2 3.2 0 0 1 5.6 18.4A3.2 3.2 0 0 1 5.6 14.1L6.1 13.7A7.3 7.3 0 0 1 5.7 11.2L4.2 12.7A5.1 5.1 0 0 0 4.2 19.8A5.1 5.1 0 0 0 11.3 19.8L13.1 18A6 6 0 0 1 16.2 13.7Z" /></svg>
				<b><span id="generated_links"><?php echo $wo['generated_links']; ?></span> <?php echo $wo['lang']['generated_links']; ?></b>
			</div>
			<div class="ep_how_many reaction_bg">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10.6 13.4A1 1 0 0 1 9.2 14.8A4.8 4.8 0 0 1 9.2 7.8L12.7 4.2A5.1 5.1 0 0 1 19.8 4.2A5.1 5.1 0 0 1 19.8 11.3L18.3 12.8A6.4 6.4 0 0 0 17.9 10.4L18.4 9.9A3.2 3.2 0 0 0 18.4 5.6A3.2 3.2 0 0 0 14.1 5.6L10.6 9.2A2.9 2.9 0 0 0 10.6 13.4M23 18V20H15V18M16.2 13.7A4.8 4.8 0 0 0 14.8 9.2A1 1 0 0 0 13.4 10.6A2.9 2.9 0 0 1 13.4 14.8L9.9 18.4A3.2 3.2 0 0 1 5.6 18.4A3.2 3.2 0 0 1 5.6 14.1L6.1 13.7A7.3 7.3 0 0 1 5.7 11.2L4.2 12.7A5.1 5.1 0 0 0 4.2 19.8A5.1 5.1 0 0 0 11.3 19.8L13.1 18A6 6 0 0 1 16.2 13.7Z" /></svg>
				<b><span id="used_links"><?php echo $wo['used_links']; ?></span> <?php echo $wo['lang']['used_links']; ?></b>
			</div>
		</div>
	</div>
	<div class="text-center">
		<button type="button" class="btn btn-main btn-mat btn-mat-raised add_wow_loader" onclick="GenerateLink()" style="margin-top: 0;"><?php echo $wo['lang']['generate_link']; ?></button>
	</div>

	<form method="post" class="form-horizontal setting-profile-form" enctype="multipart/form-data">
		<div class="setting-profile-alert setting-update-alert"></div>
			<div class="table-responsive ads-cont-wrapper">
				<?php 
				$wo['trans'] = lui_GetMyInvitaionCodes($wo['setting']['user_id']);
				?>
				<?php if (count($wo['trans']) > 0): ?>
					<table class="table table-responsive wow_wallet_trans">
						<thead>
							<tr>
								<th><?php echo $wo['lang']['url']; ?></th>
								<th><?php echo $wo['lang']['invited_user']; ?></th>
								<th><?php echo $wo['lang']['date']; ?></th>
							</tr>
						</thead>
						<tbody id="user-ads">
							<?php foreach ($wo['trans'] as $key => $transaction): ?>
								<tr data-ad-id="<?php echo $transaction['id']; ?>">
									<td><button type="button" class="btn btn-sm btn-default copy-invitation-url" data-link="<?php echo $wo['config']['site_url'] . '/register?invite='. $transaction['code']; ?>"><?php echo $wo['lang']['copy']; ?></button></td>
									<td>
										<?php if (!empty($transaction['user_name'])) { ?>
											<a href="<?php echo($transaction['user_url']) ?>"><?php echo $transaction['user_name']; ?></a>
										<?php } ?>
									</td>
									<td><?php echo date($wo['config']['date_style'], $transaction['time']); ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				<?php endif; ?>
			</div>
		<input type="hidden" name="user_id" id="user-id" value="<?php echo $wo['setting']['user_id'];?>">
		<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
   </form>
</div>
<script type="text/javascript">
$(document).on('click', '.copy-invitation-url', function(event) {
 event.preventDefault();
   var $temp = $("<input>");
   $("body").append($temp);
   $temp.val($(this).attr('data-link')).select();
   document.execCommand("copy");
   $temp.remove();
   self = this;
   $(this).text("<?php echo $wo['lang']['copied']; ?>");
   setTimeout(function () {
   	$(self).text("<?php echo $wo['lang']['copy']; ?>");
   },500);
});
function GenerateLink() {
	$('.add_wow_loader').text("<?php echo $wo['lang']['please_wait']; ?>");
	$('.add_wow_loader').attr('disable', 'true');
	$.post(Wo_Ajax_Requests_File() + '?f=invitation_links&s=create', {user_id: '<?php echo $wo['setting']['user_id'];?>'}, function(data, textStatus, xhr) {
		if (data.status == 200) {
			$('.setting-profile-alert').html('<div class="alert alert-success">' + data.message + '</div>');
			setTimeout(function () {
				$('.setting-profile-alert').html('');
				location.reload();
			},2000);
		}
		else{
			$('.setting-profile-alert').html('<div class="alert alert-danger">' + data.message + '</div>');
			setTimeout(function () {
				$('.setting-profile-alert').html('');
			},2000);
		}
		$('.add_wow_loader').removeAttr('disable');
		$('.add_wow_loader').text("<?php echo $wo['lang']['generate_link']; ?>");

	});
}
</script>