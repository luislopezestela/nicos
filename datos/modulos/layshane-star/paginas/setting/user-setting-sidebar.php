<div class="wow_content wow_sett_sidebar">
	<ul class="list-unstyled">
		<li class="<?php echo ($wo['setting_page'] == 'general-setting') ? 'active': '';?>" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=general-setting');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=general-setting">
				<span style="color: currentColor;">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z"></path></svg>
				</span> <?php echo $wo['lang']['general'];?>
			</a>
		</li>
		
		<li class="profile <?php echo ($wo['setting_page'] == 'profile-setting') ? 'active': '';?>" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=profile-setting');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=profile-setting">
				<span style="color:#00bcd4;">
					<img style="padding:0;margin:0;border:1px solid #00bcd4;" width="26" height="26" src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?>" class="avatar">
				</span> <?php echo $wo['lang']['profile_setting'];?>
			</a>
		</li>
		<li class="social <?php echo ($wo['setting_page'] == 'social-links') ? 'active': '';?>" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=social-links');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=social-links">
				<span style="color: #1da1f2;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M13.94,14.81L11.73,17C11.08,17.67 10.22,18 9.36,18C8.5,18 7.64,17.67 7,17C5.67,15.71 5.67,13.58 7,12.26L8.35,10.9L8.34,11.5C8.33,12 8.41,12.5 8.57,12.94L8.62,13.09L8.22,13.5C7.91,13.8 7.74,14.21 7.74,14.64C7.74,15.07 7.91,15.47 8.22,15.78C8.83,16.4 9.89,16.4 10.5,15.78L12.7,13.59C13,13.28 13.18,12.87 13.18,12.44C13.18,12 13,11.61 12.7,11.3C12.53,11.14 12.44,10.92 12.44,10.68C12.44,10.45 12.53,10.23 12.7,10.06C13.03,9.73 13.61,9.74 13.94,10.06C14.57,10.7 14.92,11.54 14.92,12.44C14.92,13.34 14.57,14.18 13.94,14.81M17,11.74L15.66,13.1V12.5C15.67,12 15.59,11.5 15.43,11.06L15.38,10.92L15.78,10.5C16.09,10.2 16.26,9.79 16.26,9.36C16.26,8.93 16.09,8.53 15.78,8.22C15.17,7.6 14.1,7.61 13.5,8.22L11.3,10.42C11,10.72 10.82,11.13 10.82,11.56C10.82,12 11,12.39 11.3,12.7C11.47,12.86 11.56,13.08 11.56,13.32C11.56,13.56 11.47,13.78 11.3,13.94C11.13,14.11 10.91,14.19 10.68,14.19C10.46,14.19 10.23,14.11 10.06,13.94C8.75,12.63 8.75,10.5 10.06,9.19L12.27,7C13.58,5.67 15.71,5.68 17,7C17.65,7.62 18,8.46 18,9.36C18,10.26 17.65,11.1 17,11.74Z" /></svg></span> <?php echo $wo['lang']['social_links'];?>
			</a>
		</li>
		<?php if ($wo['config']['invite_links_system'] == 1) { ?>
			<li class="invitation <?php echo ($wo['setting_page'] == 'invitation_links') ? 'active': '';?>" dir="auto">
				<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=invitation_links');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=invitation_links">
					<span style="color: #e91e63;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7,7H11V9H7A3,3 0 0,0 4,12A3,3 0 0,0 7,15H11V17H7A5,5 0 0,1 2,12A5,5 0 0,1 7,7M17,7A5,5 0 0,1 22,12H20A3,3 0 0,0 17,9H13V7H17M8,11H16V13H8V11M17,12H19V15H22V17H19V20H17V17H14V15H17V12Z" /></svg></span> <?php echo $wo['lang']['invitation_links'];?>
				</a>
			</li>
		<?php } ?>
		<li class="notifications <?php echo ($wo['setting_page'] == 'notifications-settings') ? 'active': '';?>" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=notifications-settings');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=notifications-settings">
				<span style="color: #673ab7;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,19V20H3V19L5,17V11C5,7.9 7.03,5.17 10,4.29C10,4.19 10,4.1 10,4A2,2 0 0,1 12,2A2,2 0 0,1 14,4C14,4.1 14,4.19 14,4.29C16.97,5.17 19,7.9 19,11V17L21,19M14,21A2,2 0 0,1 12,23A2,2 0 0,1 10,21M19.75,3.19L18.33,4.61C20.04,6.3 21,8.6 21,11H23C23,8.07 21.84,5.25 19.75,3.19M1,11H3C3,8.6 3.96,6.3 5.67,4.61L4.25,3.19C2.16,5.25 1,8.07 1,11Z"></path></svg></span> <?php echo $wo['lang']['notification_settings'];?>
			</a>
		</li>
		
		<li><hr></li>
		<?php if($wo['is_admin'] || $wo['is_moderoter']) { ?>
		<li class="notifications <?php echo ($wo['setting_page'] == 'privacy-setting') ? 'active': '';?>" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=privacy-setting');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=privacy-setting">
				<span style="color: #673ab7;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></span> <?php echo $wo['lang']['privacy'];?>
			</a>
		</li>
		<?php } ?>
		<li class="profile <?php echo ($wo['setting_page'] == 'change-password-setting') ? 'active': '';?>" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=change-password-setting');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=change-password-setting">
				<span style="color: #00bcd4;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z"></path></svg></span> <?php echo $wo['lang']['password'];?>
			</a>
		</li>
		<li class="sessions <?php echo ($wo['setting_page'] == 'manage-sessions') ? 'active': '';?>" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=manage-sessions');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=manage-sessions">
				<span style="color: blueviolet;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.81,4.47C17.73,4.47 17.65,4.45 17.58,4.41C15.66,3.42 14,3 12,3C10.03,3 8.15,3.47 6.44,4.41C6.2,4.54 5.9,4.45 5.76,4.21C5.63,3.97 5.72,3.66 5.96,3.53C7.82,2.5 9.86,2 12,2C14.14,2 16,2.47 18.04,3.5C18.29,3.65 18.38,3.95 18.25,4.19C18.16,4.37 18,4.47 17.81,4.47M3.5,9.72C3.4,9.72 3.3,9.69 3.21,9.63C3,9.47 2.93,9.16 3.09,8.93C4.08,7.53 5.34,6.43 6.84,5.66C10,4.04 14,4.03 17.15,5.65C18.65,6.42 19.91,7.5 20.9,8.9C21.06,9.12 21,9.44 20.78,9.6C20.55,9.76 20.24,9.71 20.08,9.5C19.18,8.22 18.04,7.23 16.69,6.54C13.82,5.07 10.15,5.07 7.29,6.55C5.93,7.25 4.79,8.25 3.89,9.5C3.81,9.65 3.66,9.72 3.5,9.72M9.75,21.79C9.62,21.79 9.5,21.74 9.4,21.64C8.53,20.77 8.06,20.21 7.39,19C6.7,17.77 6.34,16.27 6.34,14.66C6.34,11.69 8.88,9.27 12,9.27C15.12,9.27 17.66,11.69 17.66,14.66A0.5,0.5 0 0,1 17.16,15.16A0.5,0.5 0 0,1 16.66,14.66C16.66,12.24 14.57,10.27 12,10.27C9.43,10.27 7.34,12.24 7.34,14.66C7.34,16.1 7.66,17.43 8.27,18.5C8.91,19.66 9.35,20.15 10.12,20.93C10.31,21.13 10.31,21.44 10.12,21.64C10,21.74 9.88,21.79 9.75,21.79M16.92,19.94C15.73,19.94 14.68,19.64 13.82,19.05C12.33,18.04 11.44,16.4 11.44,14.66A0.5,0.5 0 0,1 11.94,14.16A0.5,0.5 0 0,1 12.44,14.66C12.44,16.07 13.16,17.4 14.38,18.22C15.09,18.7 15.92,18.93 16.92,18.93C17.16,18.93 17.56,18.9 17.96,18.83C18.23,18.78 18.5,18.96 18.54,19.24C18.59,19.5 18.41,19.77 18.13,19.82C17.56,19.93 17.06,19.94 16.92,19.94M14.91,22C14.87,22 14.82,22 14.78,22C13.19,21.54 12.15,20.95 11.06,19.88C9.66,18.5 8.89,16.64 8.89,14.66C8.89,13.04 10.27,11.72 11.97,11.72C13.67,11.72 15.05,13.04 15.05,14.66C15.05,15.73 16,16.6 17.13,16.6C18.28,16.6 19.21,15.73 19.21,14.66C19.21,10.89 15.96,7.83 11.96,7.83C9.12,7.83 6.5,9.41 5.35,11.86C4.96,12.67 4.76,13.62 4.76,14.66C4.76,15.44 4.83,16.67 5.43,18.27C5.53,18.53 5.4,18.82 5.14,18.91C4.88,19 4.59,18.87 4.5,18.62C4,17.31 3.77,16 3.77,14.66C3.77,13.46 4,12.37 4.45,11.42C5.78,8.63 8.73,6.82 11.96,6.82C16.5,6.82 20.21,10.33 20.21,14.65C20.21,16.27 18.83,17.59 17.13,17.59C15.43,17.59 14.05,16.27 14.05,14.65C14.05,13.58 13.12,12.71 11.97,12.71C10.82,12.71 9.89,13.58 9.89,14.65C9.89,16.36 10.55,17.96 11.76,19.16C12.71,20.1 13.62,20.62 15.03,21C15.3,21.08 15.45,21.36 15.38,21.62C15.33,21.85 15.12,22 14.91,22Z"></path></svg></span> <?php echo $wo['lang']['manage_sessions'];?>
			</a>
		</li>
		<?php if ($wo['config']['two_factor'] == 1) { ?>
		<li class="two_factor <?php echo ($wo['setting_page'] == 'two-factor') ? 'active': '';?>" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=two-factor');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=two-factor">
				<span style="color: blue;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M2,7V9H6V11H4A2,2 0 0,0 2,13V17H8V15H4V13H6A2,2 0 0,0 8,11V9C8,7.89 7.1,7 6,7H2M9,7V17H11V13H14V11H11V9H15V7H9M18,7A2,2 0 0,0 16,9V17H18V14H20V17H22V9A2,2 0 0,0 20,7H18M18,9H20V12H18V9Z"></path></svg></span> <?php echo $wo['lang']['two_factor'];?>
			</a>
		</li>
		<?php } ?>
		<?php if($wo['is_admin'] || $wo['is_moderoter']) { ?>
		<li class="blocked <?php echo ($wo['setting_page'] == 'blocked-users') ? 'active': '';?>" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=blocked-users');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=blocked-users">
				<span style="color: #e0624b;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C17.67,14 23,15.33 23,18V20H7V18C7,15.33 12.33,14 15,14M15,12A4,4 0 0,1 11,8A4,4 0 0,1 15,4A4,4 0 0,1 19,8A4,4 0 0,1 15,12M5,9.59L7.12,7.46L8.54,8.88L6.41,11L8.54,13.12L7.12,14.54L5,12.41L2.88,14.54L1.46,13.12L3.59,11L1.46,8.88L2.88,7.46L5,9.59Z"></path></svg></span> <?php echo $wo['lang']['blocked_users'];?>
			</a>
		</li>
	    <?php } ?>
		
		<li><hr></li>
		<?php if($wo['is_admin'] || $wo['is_moderoter']) { ?>
		<li class="my_info <?php echo ($wo['setting_page'] == 'my_info') ? 'active': '';?>" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=my_info');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=my_info">
				<span style="color: #607d8b;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M17,9H7V7H17M17,13H7V11H17M14,17H7V15H14M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M19,3H14.82C14.4,1.84 13.3,1 12,1C10.7,1 9.6,1.84 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z"></path></svg></span> <?php echo $wo['lang']['my_info'];?>
			</a>
		</li>
		<?php } ?>
        
		<?php if ($wo['config']['store_system'] == 'on') { ?>
        <li class="my_info <?php echo ($wo['setting_page'] == 'addresses') ? 'active': '';?>" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=addresses');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=addresses">
				<span style="color: #607d8b;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2C15.31,2 18,4.66 18,7.95C18,12.41 12,19 12,19C12,19 6,12.41 6,7.95C6,4.66 8.69,2 12,2M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6M20,19C20,21.21 16.42,23 12,23C7.58,23 4,21.21 4,19C4,17.71 5.22,16.56 7.11,15.83L7.75,16.74C6.67,17.19 6,17.81 6,18.5C6,19.88 8.69,21 12,21C15.31,21 18,19.88 18,18.5C18,17.81 17.33,17.19 16.25,16.74L16.89,15.83C18.78,16.56 20,17.71 20,19Z" /></svg></span> <?php echo $wo['lang']['my_addresses'];?>
			</a>
		</li>
		<?php } ?>

		<?php if (!lui_IsAdmin() && $wo['user']['verified'] == 0): ?>
		<li class="verification <?php echo ($wo['setting_page'] == 'verification') ? 'active': '';?>" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=verification');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=verification">
				<span style="color: #2196f3;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"></path></svg></span> <?php echo $wo['lang']['verification'];?>
			</a>
		</li>
		<?php endif; ?>
		
		<li><hr></li>

		<?php if($wo['is_admin'] || $wo['is_moderoter']) { ?>
		<?php if ($wo['config']['affiliate_system'] == 1 ||$wo['config']['point_level_system'] == 1 ) { ?>
		<?php if ($wo['config']['affiliate_system'] == 1 || $wo['config']['point_allow_withdrawal'] == 1 || $wo['config']['funding_system'] == 1 || $wo['config']['store_system'] == 'on') { ?>
			<li class="earnings <?php echo ($wo['setting_page'] == 'payments') ? 'active': '';?>" dir="auto">
				<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=payments');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=payments">
					<span style="color: green;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5,6H23V18H5V6M14,9A3,3 0 0,1 17,12A3,3 0 0,1 14,15A3,3 0 0,1 11,12A3,3 0 0,1 14,9M9,8A2,2 0 0,1 7,10V14A2,2 0 0,1 9,16H19A2,2 0 0,1 21,14V10A2,2 0 0,1 19,8H9M1,10H3V20H19V22H1V10Z"></path></svg></span> <?php echo $wo['lang']['my_earnings'];?>
				</a>
			</li>
		<?php } ?>
		<?php } ?>

		<li dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=wallet'); ?>" data-ajax="?link1=wallet">
				<span style="color: #00bcd4;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,18V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V6H12C10.89,6 10,6.9 10,8V16A2,2 0 0,0 12,18M12,16H22V8H12M16,13.5A1.5,1.5 0 0,1 14.5,12A1.5,1.5 0 0,1 16,10.5A1.5,1.5 0 0,1 17.5,12A1.5,1.5 0 0,1 16,13.5Z"></path></svg></span> <?php echo $wo['lang']['my_wallet'];?>
			</a>
		</li>
		<?php } ?>
		
		<li><hr></li>
		<?php if($wo['is_admin'] || $wo['is_moderoter']) { ?>
		<?php if ($wo['config']['deleteAccount'] == 1) {?>
		<li class="delete <?php echo ($wo['setting_page'] == 'delete-account') ? 'active': '';?>" dir="auto">
			<a href="<?php echo lui_SeoLink('index.php?link1=setting&' . $wo['user_setting'] . 'page=delete-account');?>" data-ajax="?link1=setting&<?php echo $wo['user_setting'];?>page=delete-account">
				<span style="color: #f44336;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"></path></svg></span> <?php echo $wo['lang']['delete_account'];?>
			</a>
		</li>
		<?php } ?>
		<?php } ?>
	</ul>
</div>