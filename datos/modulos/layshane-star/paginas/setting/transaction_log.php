<?php 
$wo['trans'] = lui_GetMytransactions(array('user_id' => $wo['setting']['user_id']));
?>
<div class="wo_settings_page wow_content">
	<div class="avatar-holder">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Profile Picture" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['transaction_log']; ?></p>
		</div>
	</div>
	<hr>

	<div class="wallet_transactions wow_sett_trans_table">
		<div class="tabbable">
			<?php echo lui_LoadPage('setting/includes/latest_activities');?>
		</div>
	</div>
</div>