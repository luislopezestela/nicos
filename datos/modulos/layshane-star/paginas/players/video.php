<?php if ($wo['story']['processing'] > 0 && (lui_IsModerator() || lui_IsAdmin() || $wo['story']['user_id'] == $wo['user']['id'])) { ?>
	<div class="alert alert-warning vid_procss_alrt processing_alert_<?php echo $wo['media']['storyId'];?>"><span class="pointer" onclick="ProcessingVideo('<?php echo $wo['media']['storyId'];?>')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span><?php echo $wo['lang']['processing_video']; ?></div>
<?php } ?>
<video id="video--<?php echo $wo['media']['storyId'];?>" onplay="Wo_AddVideoViews($(this).attr('data-post-video'))" class="plyrr-<?php echo $wo['media']['storyId'];?> <?php echo($wo['rvad_con']); ?>" playsinline preload="metadata" poster="<?php  echo $wo['media']['video_thumb'];?>" data-setup="{}" data-post-video="<?php echo $wo['media']['storyId'];?>">
	<?php if (empty($wo['story']['240p_video']) && empty($wo['story']['360p_video'])  && empty($wo['story']['480p_video'])  && empty($wo['story']['720p_video'])  && empty($wo['story']['1080p_video'])  && empty($wo['story']['2048p_video'])  && empty($wo['story']['4096p_video'])) { ?>
		<source src="<?php echo $wo['media']['filename'];?>" type='video/mp4'>
		<source src="<?php echo $wo['media']['filename'];?>" type='video/webm'>
	<?php }else{ ?>
		<?php if (!empty($wo['story']['4096p_video'])) { ?>
			<source src="<?php echo($wo['story']['4096p_video']) ?>" type="video/mp4" data-quality="4096p" size='4096' label='4096p' res='4096'>
		<?php } ?>
		<?php if (!empty($wo['story']['2048p_video'])) { ?>
			<source src="<?php echo($wo['story']['2048p_video']) ?>" type="video/mp4" data-quality="2048p" size='2048' label='2048p' res='2048'>
		<?php } ?>
		<?php if (!empty($wo['story']['1080p_video'])) { ?>
			<source src="<?php echo($wo['story']['1080p_video']) ?>" type="video/mp4" data-quality="1080p" size='1080' label='1080p' res='1080'>
		<?php } ?>
		<?php if (!empty($wo['story']['720p_video'])) { ?>
			<source src="<?php echo($wo['story']['720p_video']) ?>" type="video/mp4" data-quality="720p" size='720' label='720p' res='720'>
		<?php } ?>
		<?php if (!empty($wo['story']['480p_video'])) { ?>
			<source src="<?php echo($wo['story']['480p_video']) ?>" type="video/mp4" data-quality="480p" size='480' label='480p' res='480'>
		<?php } ?>
		<?php if (!empty($wo['story']['360p_video'])) { ?>
			<source src="<?php echo($wo['story']['360p_video']) ?>" type="video/mp4" data-quality="360p" size='360' label='360p' res='360'>
		<?php } ?>
		<?php if (!empty($wo['story']['240p_video'])) { ?>
			<source src="<?php echo($wo['story']['240p_video']) ?>" type="video/mp4" data-quality="240p" size='240' label='240p' res='240'>
		<?php } ?>
	<?php } ?>
</video>

<script>

var wovideo = '.plyrr-<?php echo $wo['story']['id'];?>';
var players = new Plyr(wovideo, {
	<?php if (lui_IsMobile() == false) { ?>
	ratio: '16:9',
	<?php } ?>
	fullscreen: {
		iosNative: true
	},
	resetOnEnd: true,
});

players.on('play', (event) => {
  $('video').not('.plyrr-<?php echo $wo['story']['id'];?>').trigger('pause');
});
</script>