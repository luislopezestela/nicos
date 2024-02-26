<div class="modal fade" id="verify_code" role="dialog">
	<div class="modal-dialog modal-md wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title" id="two_factor_title">
					<?php 
						if ($wo['config']['two_factor_type'] == 'both') {
							echo $wo['lang']['confirmation_message_email_sent'];
						}
						elseif ($wo['config']['two_factor_type'] == 'email') {
							echo $wo['lang']['confirmation_email_sent'];
						}
						elseif ($wo['config']['two_factor_type'] == 'phone') {
							echo $wo['lang']['confirmation_message_sent'];
						}
					?>
				</h4>
			</div>
			<form id="confirmation_code_form" class="confirmation_code_form" method="POST">
				<div class="modal-body">
					<div id="confirmation_code_form_alert"></div>
					<span class="verfy_sett_email_phone_ico hidden"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,13.34C20.37,13.12 19.7,13 19,13A6,6 0 0,0 13,19C13,19.34 13.03,19.67 13.08,20H3A2,2 0 0,1 1,18V6C1,4.89 1.89,4 3,4H19A2,2 0 0,1 21,6V13.34M23.5,17L18.5,22L15,18.5L16.5,17L18.5,19L22,15.5L23.5,17M3,6V8L11,13L19,8V6L11,11L3,6Z" /></svg></span>
					<p id="two_factor_desc">
						<?php 
							if ($wo['config']['two_factor_type'] == 'both') {
								echo $wo['lang']['confirmation_email_message_text'];
							}
							elseif ($wo['config']['two_factor_type'] == 'email') {
								echo $wo['lang']['confirmation_email_text'];
							}
							elseif ($wo['config']['two_factor_type'] == 'phone') {
								echo $wo['lang']['confirmation_message_text'];
							}
						?>
					</p>
					<div class="wow_form_fields verfy_sett_email_phone">
						<label for="code"><?php echo $wo['lang']['confirmation_code']; ?></label>  
						<input id="code" name="code" type="text" autocomplete="off">
					</div>
				</div>
				<div class="modal-footer">
					<div class="ball-pulse"><div></div><div></div><div></div></div>
					<button id="confirmation_code_form_btn" type="submit" class="btn main btn-mat"><?php echo $wo['lang']['verify']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="verify_email_phone" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title" id="verify_email_phone_title">
					<?php 
						if ($wo['config']['sms_or_email'] == 'mail') {
							echo $wo['lang']['confirmation_message_email_sent'];
						}
						elseif ($wo['config']['sms_or_email'] == 'sms') {
							echo $wo['lang']['confirmation_message_sent'];
						}
					?>
				</h4>
			</div>
			<form id="verify_email_phone_form" class="verify_email_phone_form" method="POST">
				<div class="modal-body">
					<div id="verify_email_phone_form_alert"></div>
					<span class="verfy_sett_email_phone_ico"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,19V5H7V19H17M17,1A2,2 0 0,1 19,3V21A2,2 0 0,1 17,23H7C5.89,23 5,22.1 5,21V3C5,1.89 5.89,1 7,1H17M9,7H15V9H9V7M9,11H13V13H9V11Z" /></svg></span>
					<p id="verify_email_phone_desc">
						<?php 
							if ($wo['config']['sms_or_email'] == 'mail') {
								echo $wo['lang']['confirmation_email_text'];
							}
							elseif ($wo['config']['sms_or_email'] == 'sms') {
								echo $wo['lang']['confirmation_message_text'];
							}
						?>
					</p>
					<div class="form-group verfy_sett_email_phone">
						<input type="text" class="form-control" name="code" placeholder="<?php echo $wo['lang']['confirmation_code']; ?>">
					</div>
				</div>
				<div class="modal-footer">
					<div class="ball-pulse"><div></div><div></div><div></div></div>
					<button id="verify_email_phone_form_btn" type="submit" class="btn btn-main"><?php echo $wo['lang']['send']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php
$user_id            = $wo['user']['user_id'];
$wo['is_admin']     = lui_IsAdmin();
$wo['is_moderoter'] = lui_IsModerator();

$wo['setting']['admin'] = false;
if (isset($_GET['user']) && !empty($_GET['user']) && ($wo['is_admin'] === true || $wo['is_moderoter'] === true)) {
    if (lui_UserExists($_GET['user']) === false) {
        header("Location: " . $wo['config']['site_url']);
        exit();
    }
    $user_id                = lui_UserIdFromUsername($_GET['user']);
    $wo['setting']['admin'] = true;
}
$wo['setting'] = lui_UserData($user_id);
if ($wo['is_moderoter']) {
  if ($wo['setting']['admin'] == 1) {
       header("Location: " . $wo['config']['site_url']);
       exit();
  }
}
$wo['setting']['fileds'] = lui_UserFieldsData($user_id);
$wo['setting_page'] = '';
//antes $wo['setting_page'] = 'general-setting';
$pages_array = array(
   'general-setting',
   'profile-setting',
   'privacy-setting',
   'change-password-setting',
   'social-links',
   'design-setting',
   'avatar-setting',
   'email-setting',
   'verification',
   'blocked-users',
   'transaction_log',
   'my_points',
   'manage-sessions',
   'notifications-settings',
   'two-factor',
   'my_info',
   'invitation_links',
   'tiers',
);
if ($wo['setting']['user_id'] == $wo['user']['user_id']) {
  $pages_array = array(
   'general-setting',
   'profile-setting',
   'privacy-setting',
   'change-password-setting',
   'social-links',
   'delete-account',
   'design-setting',
   'avatar-setting',
   'email-setting',
   'verification',
   'blocked-users',
   'transaction_log',
   'my_points',
   'manage-sessions',
   'notifications-settings',
   'two-factor',
   'my_info',
   'invitation_links',
   'tiers',
   );
}
if ($wo['config']['store_system'] == 'on') {
  $pages_array[] = 'addresses';
}
if ($wo['config']['affiliate_system'] == 1) {
  $pages_array[] = 'affiliates';
}
if ($wo['config']['affiliate_system'] == 1 || $wo['config']['point_allow_withdrawal'] == 1 || $wo['config']['funding_system'] == 1) {
	$pages_array[] = 'payments';
}
if (!empty($_GET['page'])) {
   if (in_array($_GET['page'], $pages_array)) {
      $wo['setting_page'] = $_GET['page'];
   }
   if ($wo['config']['deleteAccount'] != 1 && $wo['setting_page'] == 'delete-account') {
   	$wo['setting_page'] = 'general-setting';
   }
}
$wo['user_setting'] = '';
$wo['user_setting_b'] = '';
if (!empty($_GET['user'])) {
    $wo['user_setting'] = 'user=' . $_GET['user']. '&';
    $wo['user_setting_b'] = '&user=' . $_GET['user'];
}
if ($wo['setting_page'] == 'invitation_links') {
	$wo['available_links'] = lui_GetAvailableLinks($wo['setting']['user_id']);
	if ($wo['config']['user_links_limit'] > 0) {
		$wo['generated_links'] = $wo['config']['user_links_limit'] - $wo['available_links'];
	}
	else{
		$wo['generated_links'] = lui_GetGeneratedLinks($wo['setting']['user_id']);
	}
	$wo['used_links'] = lui_GetUsedLinks($wo['setting']['user_id']);
}
if ($wo['setting_page'] == 'addresses' && $wo['config']['store_system'] == 'on') {
	$wo['address_html'] = '';
    $wo['addresses'] = $db->where('user_id',$wo['setting']['user_id'])->orderBy('id','DESC')->get(T_USER_ADDRESS);
    if (!empty($wo['addresses'])) {
        foreach ($wo['addresses'] as $key => $wo['address']) {
            $wo['address_html'] .= lui_LoadPage("setting/includes/addresses_list");
        }
    }
}
if ($wo['setting_page'] == 'tiers' && $wo['config']['website_mode'] == 'patreon') {
	$wo['tiers_html'] = '';
    $wo['tiers'] = $db->where('user_id',$wo['setting']['user_id'])->orderBy('id','DESC')->get(T_USER_TIERS);
    if (!empty($wo['tiers'])) {
        foreach ($wo['tiers'] as $key => $wo['tier']) {
            $wo['tiers_html'] .= lui_LoadPage("setting/includes/tiers_list");
        }
    }
}
?>

<div class="page-margin">
	<div class="setting-panel" style="position:relative;">
		<?php if (empty($_GET['page'])): ?>
			<div class="col-md-12 sidebar sett_page" id="wo_main_sett_side"><?=lui_LoadPage('setting/user-setting-sidebar');?></div>
		<?php else: ?>
				<div class="col-md-4 sidebar sett_page Wo_new_sett_sidee sidebar_layshane_configuration_user" id="wo_main_sett_side"><?=lui_LoadPage('setting/user-setting-sidebar');?></div>
			
			<div class="col-md-8 sett_page wo_new_sett_pagee main_layshane_configuration_user" id="wo_main_sett_mid">
				<div class="wow_sett_sidebar button_controle_layshane_back_settign">
					<ul class="list-unstyled" style="padding-bottom:0;">
						<li class="active">
							<a href="<?php echo lui_SeoLink('index.php?link1=setting' . $wo['user_setting_b']); ?>" data-ajax="?link1=setting<?php echo $wo['user_setting_b'];?>">Atras</a>
						</li>
					</ul>
				</div>
				<br>
				<?=lui_LoadPage("setting/" . $wo['setting_page']); ?>
			</div>
		<?php endif ?>
	</div>
</div>
<script type="text/javascript">
	current_widthss = $(window).width();
	if (current_widthss < 1050) {
  $('.sidebar_layshane_configuration_user').addClass('des_set_act');
  $('.button_controle_layshane_back_settign').removeClass('des_set_act');
  $('.main_layshane_configuration_user').addClass('desl_dider_d');
}else{
  $('.sidebar_layshane_configuration_user').removeClass('des_set_act');
  $('.button_controle_layshane_back_settign').addClass('des_set_act');
  $('.main_layshane_configuration_user').removeClass('desl_dider_d');
}
</script>