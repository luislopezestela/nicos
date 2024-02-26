<html>
	<head>
		<title><?php echo $wo['lang']['my_info']; ?></title>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8">

<style>
* {
    box-sizing: border-box;
}
a {
	text-decoration: none;
}
body {
	background: <?php echo $wo['config']['header_background'];?>;margin: 0;
	font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
}
header {
	text-align: center;
    margin: 70px 0 50px;
}
header img {
	width: 100%;
    max-width: 240px;
}
h2 {
	font-weight: 400;
    display: flex;
    align-items: center;text-transform: capitalize;
}
h2 svg {
color: #2196F3;
    vertical-align: middle;
    margin-right: 12px;
}
.container {
	width: 100%;
    max-width: 1090px;
    margin: 20px auto;
    background-color: white;
    padding: 20px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
    border-radius: 7px;
}
.mt0 {
    margin-top: 0;
}
.mb0 {
    margin-bottom: 0;
}
table {
	margin: auto;
    margin-top: 40px;
	margin-bottom: 70px;
    width: 100%;
    max-width: 600px;
}
table tr td {
	width: 50%;
    padding: 5px 10px;
    border-bottom: 1px solid #ececec;
}
table tr td:first-child {
	font-weight: 500;
}
.users_list {
	overflow: hidden;
}
.users_list .profile-style {
	width: 20%;
    float: left;
    box-shadow: 0 0 0 1px #dedede;
    padding: 15px;text-align: center;
}
.users_list .profile-style .avatar {
	width: 120px;
    height: 120px;
    margin: 0 auto 13px;
}
.users_list .profile-style .avatar img {
	border-radius: 50%;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.users_list .profile-style > span > a {
	    color: #020202;
    text-decoration: none;
    font-size: 18px;
}
.users_list .profile-style .page-website {
	color: #7d7d7d;
    font-size: 13px;
    margin-top: 3px;
}
footer {
	border-top: 1px solid #ddd;
    margin-top: 40px;
    text-align: center;
    padding-top: 12px;color: #777777;
}
</style>
<?php if ($wo['config']['yandex_map'] == 1) { ?>
      <script src="https://api-maps.yandex.ru/2.1/?lang=en_RU&amp;apikey=<?php echo $wo['config']['yandex_map_api'];?>" type="text/javascript"></script>
      <?php } ?>
	</head>
	<body>
		<header>
			<a class="brand header-brand" href="<?php echo $wo['config']['site_url']; ?>">
				<img width="130" src="<?php echo $wo['config']['theme_url'];?>/img/logo.<?php echo $wo['config']['logo_extension'];?>" alt="<?php echo $wo['config']['siteName'];?> Logo">
			</a>
		</header>
		<div class="container">
		<?php if (!empty($wo['user_info']['setting'])) { ?>
			<style>
				.cover {margin: 0 -20px;height: 363px;}
				.cover img {width: 100%;height: 363px;object-fit: cover;}
				.main_avatar {text-align: center;position: relative;margin-top: -65px;}
				.main_avatar img {border-radius: 50%;box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);padding: 3px;background-color: white;width: 150px;height: 150px;object-fit: cover;}
				.about {text-align: center;}
				.name {text-align: center;font-weight: 500;margin-bottom: 0;font-size: 22px;}
				.username {text-align: center;margin-top: 0;}
			</style>
			<h2 class="mt0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21,3H3C2,3 1,4 1,5V19A2,2 0 0,0 3,21H21C22,21 23,20 23,19V5C23,4 22,3 21,3M5,17L8.5,12.5L11,15.5L14.5,11L19,17H5Z" /></svg> <?php echo $wo['lang']['avatar']; ?> & <?php echo $wo['lang']['cover']; ?></h2>
			<?php if (!empty($wo['user_info']['setting']['cover'])) { ?>
				<div class="cover"><img src="<?php echo($wo['user_info']['setting']['cover']) ?>"></div>
			<?php } ?>
			<?php if (!empty($wo['user_info']['setting']['avatar'])) { ?>
				<div class="main_avatar"><img src="<?php echo($wo['user_info']['setting']['avatar']) ?>"></div>
			<?php } ?>
			<h3 class="name">
				<?php if (!empty($wo['user_info']['setting']['first_name'])) { ?>
					<?php echo $wo['user_info']['setting']['first_name']; ?>
				<?php } ?>
				<?php if (!empty($wo['user_info']['setting']['last_name'])) { ?>
					<?php echo $wo['user_info']['setting']['last_name']; ?>
				<?php } ?>
			</h3>
			<?php if (!empty($wo['user_info']['setting']['username'])) { ?>
				<p class="username">@<?php echo($wo['user_info']['setting']['username']) ?></p>
			<?php } ?>
			<?php if (!empty($wo['user_info']['setting']['about'])) { ?>
				<p class="about"><?php echo br2nl($wo['user_info']['setting']['about']); ?></p>
			<?php } ?>
			
			<table>
				<?php if (!empty($wo['user_info']['setting']['email'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['email']; ?></td>
						<td><?php echo($wo['user_info']['setting']['email']) ?></td>
					</tr>
				<?php } ?>
				<?php if (!empty($wo['user_info']['setting']['phone_number'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['phone_number']; ?></td>
						<td><?php echo($wo['user_info']['setting']['phone_number']) ?></td>
					</tr>
				<?php } ?>
				<?php if (!empty($wo['user_info']['setting']['birthday'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['birthday']; ?></td>
						<td><?php echo($wo['user_info']['setting']['birthday']) ?></td>
					</tr>
				<?php } ?>
				<?php if (!empty($wo['user_info']['setting']['country_id'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['country']; ?></td>
						<?php 
							foreach ($wo['countries_name'] as $country_ids => $country) { 
							$country_id = $wo['user_info']['setting']['country_id'];
							if($country_ids == $country_id) {
						?>
							<td><?php echo($country) ?></td>
						<?php } } ?>
					</tr>
				<?php } ?>
				<?php if (!empty($wo['user_info']['setting']['gender'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['gender']; ?></td>
						<?php foreach ($wo['genders'] as $key => $gender) { 
							if ($wo['user_info']['setting']['gender'] == $key) {
							?>
							<td><?php echo $gender; ?></td>
						<?php } } ?>
					</tr>
				<?php } ?>
				<?php if (!empty($wo['user_info']['setting']['pro_type']) && $wo['user_info']['setting']['is_pro'] == 1) { ?>
					<tr>
						<td><?php echo $wo['lang']['member_type']; ?></td>
						<td><?php echo lui_GetUserProType($wo['user_info']['setting']['pro_type'])['type_name']; ?></td>
					</tr>
				<?php } ?>
				<?php if (!empty($wo['user_info']['setting']['address'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['location']; ?></td>
						<td><?php echo br2nl($wo['user_info']['setting']['address']); ?></td>
					</tr>
				<?php } ?>
				<?php if (!empty($wo['user_info']['setting']['school'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['school']; ?></td>
						<td><?php echo br2nl($wo['user_info']['setting']['school']); ?></td>
					</tr>
				<?php } ?>    
				<?php if (!empty($wo['user_info']['setting']['working'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['working_at']; ?></td>
						<td><?php echo br2nl($wo['user_info']['setting']['working']); ?></td>
					</tr>
				<?php } ?>            
				<?php if (!empty($wo['user_info']['setting']['working_link'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['company_website']; ?></td>
						<td><?php echo br2nl($wo['user_info']['setting']['working_link']); ?></td>
					</tr>
				<?php } ?>                  
				<?php if (!empty($wo['user_info']['setting']['website'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['website']; ?></td>
						<td><?php echo br2nl($wo['user_info']['setting']['website']); ?></td>
					</tr>
				<?php } ?>                  
				<?php if (!empty($wo['user_info']['setting']['relationship_id'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['relationship']; ?></td>
						<?php 
							foreach ($wo['relationship']  as $relationship_ids => $relationship) { 
							$relationship_id = $wo['user_info']['setting']['relationship_id'];
							if($relationship_ids == $relationship_id) {
						?>
							<td><?php echo($relationship) ?></td>
						<?php } } ?>
					</tr>
				<?php } ?>
				<?php if (!empty($wo['user_info']['setting']['facebook'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['facebook']; ?></td>
						<td><?php echo $wo['user_info']['setting']['facebook']; ?></td>
					</tr>
				<?php } ?>               
				<?php if (!empty($wo['user_info']['setting']['google'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['google']; ?></td>
						<td><?php echo $wo['user_info']['setting']['google']; ?></td>
					</tr>
				<?php } ?>
				<?php if (!empty($wo['user_info']['setting']['vk'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['vkontakte']; ?></td>
						<td><?php echo $wo['user_info']['setting']['vk']; ?></td>
					</tr>
				<?php } ?>                             
				<?php if (!empty($wo['user_info']['setting']['linkedin'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['linkedin']; ?></td>
						<td><?php echo $wo['user_info']['setting']['linkedin']; ?></td>
					</tr>
				<?php } ?>
				<?php if (!empty($wo['user_info']['setting']['instagram'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['instagram']; ?></td>
						<td><?php echo $wo['user_info']['setting']['instagram']; ?></td>
					</tr>
				<?php } ?>
				<?php if (!empty($wo['user_info']['setting']['youtube'])) { ?>
					<tr>
						<td><?php echo $wo['lang']['youtube']; ?></td>
						<td><?php echo $wo['user_info']['setting']['youtube']; ?></td>
					</tr>
				<?php } ?>
			</table>
                                      
			<?php if (!empty($wo['user_info']['setting']['session'])) { ?>
				<style>
					.active_sessions {padding: 0 15px;margin-bottom: 10px;}
					.active_sessions .as_list {padding: 13px 10px;position: relative;border-bottom: 1px solid rgba(0, 0, 0, 0.07);}
					.active_sessions .as_list:last-child {border: 0;}
					.active_sessions .as_list .platform_icon {margin-right: 15px;float: left;width: 36px;height: 36px;display: flex;align-items: center;justify-content: center;}
					.active_sessions .as_list .platform_icon svg {width: 28px;height: 28px;}
					.active_sessions .as_list .log_out_session {float: right;width: 35px;height: 35px;display: flex;align-items: center;justify-content: center;padding: 0;border-radius: 50%;margin: 1px 0;}
					.active_sessions .as_list .session_info {display: block;margin-left: 51px;}
					.active_sessions .as_list .session_info h4 {margin-top: 0;margin-bottom: 4px;font-weight: 600;}
					.active_sessions .as_list .session_info p {margin-bottom: 8px;line-height: 1;margin-top: 0;font-size: 13px;color: #717171;}
				</style>
				<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.1 14.8,9.5V11C15.4,11 16,11.6 16,12.3V15.8C16,16.4 15.4,17 14.7,17H9.2C8.6,17 8,16.4 8,15.7V12.2C8,11.6 8.6,11 9.2,11V9.5C9.2,8.1 10.6,7 12,7M12,8.2C11.2,8.2 10.5,8.7 10.5,9.5V11H13.5V9.5C13.5,8.7 12.8,8.2 12,8.2Z" /></svg> <?php echo $wo['lang']['manage_sessions']; ?></h2>
				<div class="active_sessions">
					<?php foreach ($wo['user_info']['setting']['session'] as $wo['key'] => $wo['session']) { ?>
						<div class="as_list" id="session_<?php echo $wo['session']['id']?>">
							<div class="platform_icon">
								<?php 
								switch (strtolower($wo['session']['platform'])) {
									case 'windows':
									$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#00adef" d="M3,12V6.75L9,5.43V11.91L3,12M20,3V11.75L10,11.9V5.21L20,3M3,13L9,13.09V19.9L3,18.75V13M20,13.25V22L10,20.09V13.1L20,13.25Z"></path></svg>';
									break;
									case 'linux':
									$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#222" d="M21,16H3V4H21M21,2H3C1.89,2 1,2.89 1,4V16A2,2 0 0,0 3,18H10V20H8V22H16V20H14V18H21A2,2 0 0,0 23,16V4C23,2.89 22.1,2 21,2Z"></path></svg>';
									break;
									case 'mac':
									$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#222" d="M21,16H3V4H21M21,2H3C1.89,2 1,2.89 1,4V16A2,2 0 0,0 3,18H10V20H8V22H16V20H14V18H21A2,2 0 0,0 23,16V4C23,2.89 22.1,2 21,2Z"></path></svg>';
									break;
									case 'iphone web':
									$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#222" d="M18.71,19.5C17.88,20.74 17,21.95 15.66,21.97C14.32,22 13.89,21.18 12.37,21.18C10.84,21.18 10.37,21.95 9.1,22C7.79,22.05 6.8,20.68 5.96,19.47C4.25,17 2.94,12.45 4.7,9.39C5.57,7.87 7.13,6.91 8.82,6.88C10.1,6.86 11.32,7.75 12.11,7.75C12.89,7.75 14.37,6.68 15.92,6.84C16.57,6.87 18.39,7.1 19.56,8.82C19.47,8.88 17.39,10.1 17.41,12.63C17.44,15.65 20.06,16.66 20.09,16.67C20.06,16.74 19.67,18.11 18.71,19.5M13,3.5C13.73,2.67 14.94,2.04 15.94,2C16.07,3.17 15.6,4.35 14.9,5.19C14.21,6.04 13.07,6.7 11.95,6.61C11.8,5.46 12.36,4.26 13,3.5Z"></path></svg>';
									break;
									case 'android web':
									$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#A4C439" d="M15,5H14V4H15M10,5H9V4H10M15.53,2.16L16.84,0.85C17.03,0.66 17.03,0.34 16.84,0.14C16.64,-0.05 16.32,-0.05 16.13,0.14L14.65,1.62C13.85,1.23 12.95,1 12,1C11.04,1 10.14,1.23 9.34,1.63L7.85,0.14C7.66,-0.05 7.34,-0.05 7.15,0.14C6.95,0.34 6.95,0.66 7.15,0.85L8.46,2.16C6.97,3.26 6,5 6,7H18C18,5 17,3.25 15.53,2.16M20.5,8A1.5,1.5 0 0,0 19,9.5V16.5A1.5,1.5 0 0,0 20.5,18A1.5,1.5 0 0,0 22,16.5V9.5A1.5,1.5 0 0,0 20.5,8M3.5,8A1.5,1.5 0 0,0 2,9.5V16.5A1.5,1.5 0 0,0 3.5,18A1.5,1.5 0 0,0 5,16.5V9.5A1.5,1.5 0 0,0 3.5,8M6,18A1,1 0 0,0 7,19H8V22.5A1.5,1.5 0 0,0 9.5,24A1.5,1.5 0 0,0 11,22.5V19H13V22.5A1.5,1.5 0 0,0 14.5,24A1.5,1.5 0 0,0 16,22.5V19H17A1,1 0 0,0 18,18V8H6V18Z"></path></svg>';
									break;
									case 'mobile':
									$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#222" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z"></path></svg>';
									break;
									case 'phone':
									$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#222" d="M17,19H7V5H17M17,1H7C5.89,1 5,1.89 5,3V21A2,2 0 0,0 7,23H17A2,2 0 0,0 19,21V3C19,1.89 18.1,1 17,1Z"></path></svg>';
									break;
									case 'unknown':
									$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#666" d="M15.07,11.25L14.17,12.17C13.45,12.89 13,13.5 13,15H11V14.5C11,13.39 11.45,12.39 12.17,11.67L13.41,10.41C13.78,10.05 14,9.55 14,9C14,7.89 13.1,7 12,7A2,2 0 0,0 10,9H8A4,4 0 0,1 12,5A4,4 0 0,1 16,9C16,9.88 15.64,10.67 15.07,11.25M13,19H11V17H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z"></path></svg>';
									break;
								}
								echo $icon;
								?>
							</div>
							<div class="session_info">
								<h4><?php echo $wo['session']['platform'] ?></h4>
								<p><?php echo $wo['session']['browser']; ?> - <?php echo $wo['session']['time']; ?></p>
								<?php if ($wo['session']['ip_address']) { ?>
									<p><?php echo $wo['lang']['ip_address'] ?>: <?php echo $wo['session']['ip_address']; ?></p>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if (!empty($wo['user_info']['setting']['providing_service'])) { ?>
				<style>
					.active_sessions {padding: 0 15px;margin-bottom: 10px;}
					.active_sessions .as_list {padding: 13px 10px;position: relative;border-bottom: 1px solid rgba(0, 0, 0, 0.07);}
					.active_sessions .as_list:last-child {border: 0;}
					.active_sessions .as_list .platform_icon {margin-right: 15px;float: left;width: 36px;height: 36px;display: flex;align-items: center;justify-content: center;}
					.active_sessions .as_list .platform_icon svg {width: 28px;height: 28px;}
					.active_sessions .as_list .log_out_session {float: right;width: 35px;height: 35px;display: flex;align-items: center;justify-content: center;padding: 0;border-radius: 50%;margin: 1px 0;}
					.active_sessions .as_list .session_info {display: block;margin-left: 51px;}
					.active_sessions .as_list .session_info h4 {margin-top: 0;margin-bottom: 4px;font-weight: 600;}
					.active_sessions .as_list .session_info p {margin-bottom: 8px;line-height: 1;margin-top: 0;font-size: 13px;color: #717171;}
				</style>
				<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.1 14.8,9.5V11C15.4,11 16,11.6 16,12.3V15.8C16,16.4 15.4,17 14.7,17H9.2C8.6,17 8,16.4 8,15.7V12.2C8,11.6 8.6,11 9.2,11V9.5C9.2,8.1 10.6,7 12,7M12,8.2C11.2,8.2 10.5,8.7 10.5,9.5V11H13.5V9.5C13.5,8.7 12.8,8.2 12,8.2Z" /></svg> <?php echo $wo['lang']['services']; ?></h2>
				<div class="active_sessions">
					<div class="as_list">
						<div class="session_info">
							<h4><?php echo $wo['user_info']['setting']['providing_service']->services ?></h4>
							<p><?php echo $wo['lang']['location']; ?> - <?php echo $wo['user_info']['setting']['providing_service']->job_location; ?></p>
							<p><?php echo $wo['lang']['description']; ?> - <?php echo $wo['user_info']['setting']['providing_service']->description; ?></p>
						</div>
					</div>
				</div>
			<?php } ?> 
                                      
			<?php if (!empty($wo['user_info']['setting']['open_to_work_data'])) { ?>
				<style>
					.active_sessions {padding: 0 15px;margin-bottom: 10px;}
					.active_sessions .as_list {padding: 13px 10px;position: relative;border-bottom: 1px solid rgba(0, 0, 0, 0.07);}
					.active_sessions .as_list:last-child {border: 0;}
					.active_sessions .as_list .platform_icon {margin-right: 15px;float: left;width: 36px;height: 36px;display: flex;align-items: center;justify-content: center;}
					.active_sessions .as_list .platform_icon svg {width: 28px;height: 28px;}
					.active_sessions .as_list .log_out_session {float: right;width: 35px;height: 35px;display: flex;align-items: center;justify-content: center;padding: 0;border-radius: 50%;margin: 1px 0;}
					.active_sessions .as_list .session_info {display: block;margin-left: 51px;}
					.active_sessions .as_list .session_info h4 {margin-top: 0;margin-bottom: 4px;font-weight: 600;}
					.active_sessions .as_list .session_info p {margin-bottom: 8px;line-height: 1;margin-top: 0;font-size: 13px;color: #717171;}
				</style>
				<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.1 14.8,9.5V11C15.4,11 16,11.6 16,12.3V15.8C16,16.4 15.4,17 14.7,17H9.2C8.6,17 8,16.4 8,15.7V12.2C8,11.6 8.6,11 9.2,11V9.5C9.2,8.1 10.6,7 12,7M12,8.2C11.2,8.2 10.5,8.7 10.5,9.5V11H13.5V9.5C13.5,8.7 12.8,8.2 12,8.2Z" /></svg> <?php echo $wo['lang']['open_to_work']; ?></h2>
				<div class="active_sessions">
					<div class="as_list">
						<div class="session_info">
							<h4><?php echo $wo['user_info']['setting']['open_to_work_data']->job_title ?></h4>
							<p><?php echo $wo['lang']['location']; ?> - <?php echo $wo['user_info']['setting']['open_to_work_data']->job_location; ?></p>
							<p><?php echo $wo['lang']['workplaces']; ?> - <?php echo $wo['user_info']['setting']['open_to_work_data']->workplaces; ?></p>
							<p><?php echo $wo['lang']['job_type']; ?> - <?php echo $wo['user_info']['setting']['open_to_work_data']->job_type; ?></p>
						</div>
					</div>
				</div>
			<?php } ?> 
                                      
			<?php if (!empty($wo['user_info']['setting']['formated_langs'])) { ?>
				<style>
					.active_sessions {padding: 0 15px;margin-bottom: 10px;}
					.active_sessions .as_list {padding: 13px 10px;position: relative;border-bottom: 1px solid rgba(0, 0, 0, 0.07);}
					.active_sessions .as_list:last-child {border: 0;}
					.active_sessions .as_list .platform_icon {margin-right: 15px;float: left;width: 36px;height: 36px;display: flex;align-items: center;justify-content: center;}
					.active_sessions .as_list .platform_icon svg {width: 28px;height: 28px;}
					.active_sessions .as_list .log_out_session {float: right;width: 35px;height: 35px;display: flex;align-items: center;justify-content: center;padding: 0;border-radius: 50%;margin: 1px 0;}
					.active_sessions .as_list .session_info {display: block;margin-left: 51px;}
					.active_sessions .as_list .session_info h4 {margin-top: 0;margin-bottom: 4px;font-weight: 600;}
					.active_sessions .as_list .session_info p {margin-bottom: 8px;line-height: 1;margin-top: 0;font-size: 13px;color: #717171;}
				</style>
				<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.1 14.8,9.5V11C15.4,11 16,11.6 16,12.3V15.8C16,16.4 15.4,17 14.7,17H9.2C8.6,17 8,16.4 8,15.7V12.2C8,11.6 8.6,11 9.2,11V9.5C9.2,8.1 10.6,7 12,7M12,8.2C11.2,8.2 10.5,8.7 10.5,9.5V11H13.5V9.5C13.5,8.7 12.8,8.2 12,8.2Z" /></svg> <?php echo $wo['lang']['languages']; ?></h2>
				<div class="active_sessions">
					<div class="as_list">
						<div class="session_info">
							<p><?php echo implode(",", $wo['user_info']['setting']['formated_langs']); ?></p>
						</div>
					</div>
				</div>
			<?php } ?> 
                                      
			<?php if (!empty($wo['user_info']['setting']['skills'])) { ?>
				<style>
					.active_sessions {padding: 0 15px;margin-bottom: 10px;}
					.active_sessions .as_list {padding: 13px 10px;position: relative;border-bottom: 1px solid rgba(0, 0, 0, 0.07);}
					.active_sessions .as_list:last-child {border: 0;}
					.active_sessions .as_list .platform_icon {margin-right: 15px;float: left;width: 36px;height: 36px;display: flex;align-items: center;justify-content: center;}
					.active_sessions .as_list .platform_icon svg {width: 28px;height: 28px;}
					.active_sessions .as_list .log_out_session {float: right;width: 35px;height: 35px;display: flex;align-items: center;justify-content: center;padding: 0;border-radius: 50%;margin: 1px 0;}
					.active_sessions .as_list .session_info {display: block;margin-left: 51px;}
					.active_sessions .as_list .session_info h4 {margin-top: 0;margin-bottom: 4px;font-weight: 600;}
					.active_sessions .as_list .session_info p {margin-bottom: 8px;line-height: 1;margin-top: 0;font-size: 13px;color: #717171;}
				</style>
				<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.1 14.8,9.5V11C15.4,11 16,11.6 16,12.3V15.8C16,16.4 15.4,17 14.7,17H9.2C8.6,17 8,16.4 8,15.7V12.2C8,11.6 8.6,11 9.2,11V9.5C9.2,8.1 10.6,7 12,7M12,8.2C11.2,8.2 10.5,8.7 10.5,9.5V11H13.5V9.5C13.5,8.7 12.8,8.2 12,8.2Z" /></svg> <?php echo $wo['lang']['skills']; ?></h2>
				<div class="active_sessions">
					<div class="as_list">
						<div class="session_info">
							<p><?php echo $wo['user_info']['setting']['skills']; ?></p>
						</div>
					</div>
				</div>
			<?php } ?> 
                                      
			<?php 
			$experience = $db->where('user_id',$wo['user_info']['setting']['user_id'])->get(T_USER_EXPERIENCE);
			if (!empty($experience)) { ?>
				<style>
					.active_sessions {padding: 0 15px;margin-bottom: 10px;}
					.active_sessions .as_list {padding: 13px 10px;position: relative;border-bottom: 1px solid rgba(0, 0, 0, 0.07);}
					.active_sessions .as_list:last-child {border: 0;}
					.active_sessions .as_list .platform_icon {margin-right: 15px;float: left;width: 36px;height: 36px;display: flex;align-items: center;justify-content: center;}
					.active_sessions .as_list .platform_icon svg {width: 28px;height: 28px;}
					.active_sessions .as_list .log_out_session {float: right;width: 35px;height: 35px;display: flex;align-items: center;justify-content: center;padding: 0;border-radius: 50%;margin: 1px 0;}
					.active_sessions .as_list .session_info {display: block;margin-left: 51px;}
					.active_sessions .as_list .session_info h4 {margin-top: 0;margin-bottom: 4px;font-weight: 600;}
					.active_sessions .as_list .session_info p {margin-bottom: 8px;line-height: 1;margin-top: 0;font-size: 13px;color: #717171;}
				</style>
				<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.1 14.8,9.5V11C15.4,11 16,11.6 16,12.3V15.8C16,16.4 15.4,17 14.7,17H9.2C8.6,17 8,16.4 8,15.7V12.2C8,11.6 8.6,11 9.2,11V9.5C9.2,8.1 10.6,7 12,7M12,8.2C11.2,8.2 10.5,8.7 10.5,9.5V11H13.5V9.5C13.5,8.7 12.8,8.2 12,8.2Z" /></svg> <?php echo $wo['lang']['experience']; ?></h2>
				<div class="active_sessions">
					<?php foreach ($experience as $key => $wo['experience']) { ?>
					<div class="as_list">
						<div class="session_info">
							<h4><?php echo $wo['lang']['title']; ?> : <?php echo $wo['experience']->title ?></h4>
							<p><?php echo $wo['lang']['company_name']; ?> : <?php echo $wo['experience']->company_name; ?></p>
							<p>
								<?php if (!empty($wo['experience']->employment_type) && in_array($wo['experience']->employment_type, array_keys($wo['employment_type']))) { ?>
									<?php echo $wo['lang']['employment_type']; ?> : <?php echo $wo['lang'][$wo['employment_type'][$wo['experience']->employment_type]]; ?>
								<?php } ?>
							</p>
							<p>
								<?php echo $wo['lang']['location']; ?> : <?php echo $wo['experience']->location; ?>
							</p>
							<p>
								<?php echo $wo['lang']['start_date']; ?> : <?php echo $wo['experience']->experience_start; ?>
							</p>
							<?php if (!empty($wo['experience']->experience_end) && strpos($wo['experience']->experience_end, 00) != 0) { ?>
							<p>
								<?php echo $wo['lang']['end_date']; ?> : <?php echo $wo['experience']->experience_end; ?>
							</p>
							<?php } ?>
							<?php if (!empty($wo['experience']->link)) { ?>
								<p><?php echo $wo['lang']['link']; ?> : <a href="<?php echo $wo['experience']->link; ?>"><?php echo $wo['experience']->link; ?></a></p>
							<?php } ?>
							<?php if (!empty($wo['experience']->headline)) { ?>
								<p><?php echo $wo['lang']['headline']; ?> : <?php echo $wo['experience']->headline; ?></p>
							<?php } ?>
								<p><?php echo $wo['lang']['industry']; ?> : <?php echo $wo['experience']->industry; ?></p>
							<?php if (!empty($wo['experience']->image)) { ?>
								<img src="<?php echo lui_GetMedia($wo['experience']->image); ?>" width="200px" height="200px">
							<?php } ?>
							<p><?php echo $wo['lang']['description']; ?> : <?php echo $wo['experience']->description; ?></p>
						</div>
					</div>
				    <?php } ?>
				</div>
			<?php } ?> 

			<?php $certifications = $db->where('user_id',$wo['user_info']['setting']['user_id'])->get(T_USER_CERTIFICATION);
			if (!empty($certifications)) { ?>
				<style>
					.active_sessions {padding: 0 15px;margin-bottom: 10px;}
					.active_sessions .as_list {padding: 13px 10px;position: relative;border-bottom: 1px solid rgba(0, 0, 0, 0.07);}
					.active_sessions .as_list:last-child {border: 0;}
					.active_sessions .as_list .platform_icon {margin-right: 15px;float: left;width: 36px;height: 36px;display: flex;align-items: center;justify-content: center;}
					.active_sessions .as_list .platform_icon svg {width: 28px;height: 28px;}
					.active_sessions .as_list .log_out_session {float: right;width: 35px;height: 35px;display: flex;align-items: center;justify-content: center;padding: 0;border-radius: 50%;margin: 1px 0;}
					.active_sessions .as_list .session_info {display: block;margin-left: 51px;}
					.active_sessions .as_list .session_info h4 {margin-top: 0;margin-bottom: 4px;font-weight: 600;}
					.active_sessions .as_list .session_info p {margin-bottom: 8px;line-height: 1;margin-top: 0;font-size: 13px;color: #717171;}
				</style>
				<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.1 14.8,9.5V11C15.4,11 16,11.6 16,12.3V15.8C16,16.4 15.4,17 14.7,17H9.2C8.6,17 8,16.4 8,15.7V12.2C8,11.6 8.6,11 9.2,11V9.5C9.2,8.1 10.6,7 12,7M12,8.2C11.2,8.2 10.5,8.7 10.5,9.5V11H13.5V9.5C13.5,8.7 12.8,8.2 12,8.2Z" /></svg> <?php echo $wo['lang']['licenses_certifications']; ?></h2>
				<div class="active_sessions">
					<?php foreach ($certifications as $key => $wo['certification']) { ?>
					<div class="as_list">
						<div class="session_info">
							<h4><?php echo $wo['lang']['name']; ?> : <?php echo $wo['certification']->name ?></h4>
							<p><?php echo $wo['lang']['issuing_organization']; ?> : <?php echo $wo['certification']->issuing_organization; ?></p>
							<p>
								<?php echo $wo['lang']['issue_date']; ?> : <?php echo $wo['certification']->certification_start; ?>
							</p>
							<?php if (!empty($wo['certification']->certification_end) && strpos($wo['certification']->certification_end, 00) != 0) { ?>
							<p>
								<?php echo $wo['lang']['expiration_date']; ?> : <?php echo $wo['certification']->certification_end; ?>
							</p>
							<?php } ?>
							<?php if (!empty($wo['certification']->credential_url)) { ?>
								<p><?php echo $wo['lang']['credential_url']; ?> : <a href="<?php echo $wo['certification']->credential_url; ?>"><?php echo(!empty($wo['certification']->credential_id) ? $wo['certification']->credential_id : $wo['certification']->credential_url); ?></a></p>
							<?php } ?>
							<?php if (!empty($wo['certification']->credential_id)) { ?>
								<p><?php echo $wo['lang']['credential_id']; ?> : <?php echo $wo['certification']->credential_id; ?></p>
							<?php } ?>
						</div>
					</div>
					<?php } ?>
				</div>
			<?php } ?>

			<?php $projects = $db->where('user_id',$wo['user_info']['setting']['user_id'])->get(T_USER_PROJECTS);
			if (!empty($projects)) { ?>
				<style>
					.active_sessions {padding: 0 15px;margin-bottom: 10px;}
					.active_sessions .as_list {padding: 13px 10px;position: relative;border-bottom: 1px solid rgba(0, 0, 0, 0.07);}
					.active_sessions .as_list:last-child {border: 0;}
					.active_sessions .as_list .platform_icon {margin-right: 15px;float: left;width: 36px;height: 36px;display: flex;align-items: center;justify-content: center;}
					.active_sessions .as_list .platform_icon svg {width: 28px;height: 28px;}
					.active_sessions .as_list .log_out_session {float: right;width: 35px;height: 35px;display: flex;align-items: center;justify-content: center;padding: 0;border-radius: 50%;margin: 1px 0;}
					.active_sessions .as_list .session_info {display: block;margin-left: 51px;}
					.active_sessions .as_list .session_info h4 {margin-top: 0;margin-bottom: 4px;font-weight: 600;}
					.active_sessions .as_list .session_info p {margin-bottom: 8px;line-height: 1;margin-top: 0;font-size: 13px;color: #717171;}
				</style>
				<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7C13.4,7 14.8,8.1 14.8,9.5V11C15.4,11 16,11.6 16,12.3V15.8C16,16.4 15.4,17 14.7,17H9.2C8.6,17 8,16.4 8,15.7V12.2C8,11.6 8.6,11 9.2,11V9.5C9.2,8.1 10.6,7 12,7M12,8.2C11.2,8.2 10.5,8.7 10.5,9.5V11H13.5V9.5C13.5,8.7 12.8,8.2 12,8.2Z" /></svg> <?php echo $wo['lang']['projects']; ?></h2>
				<div class="active_sessions">
					<?php foreach ($projects as $key => $wo['project']) { ?>
					<div class="as_list">
						<div class="session_info">
							<h4><?php echo $wo['lang']['name']; ?> : <?php echo $wo['project']->name ?></h4>
							<p>
								<?php echo $wo['lang']['start_date']; ?> : <?php echo $wo['project']->project_start; ?>
							</p>
							<?php if (!empty($wo['project']->project_end) && strpos($wo['project']->project_end, 00) != 0) { ?>
							<p>
								<?php echo $wo['lang']['end_date']; ?> : <?php echo $wo['project']->project_end; ?>
							</p>
							<?php } ?>
							<?php if (!empty($wo['project']->project_url)) { ?>
								<p><?php echo $wo['lang']['project_url']; ?> : <a href="<?php echo $wo['project']->project_url; ?>"><?php echo($wo['project']->project_url); ?></a></p>
							<?php } ?>
							<?php if (!empty($wo['project']->associated_with)) { ?>
								<p><?php echo $wo['lang']['associated_with']; ?> : <?php echo $wo['project']->associated_with; ?></p>
							<?php } ?>
							<?php if (!empty($wo['project']->description)) { ?>
								<p><?php echo $wo['lang']['description']; ?> : <?php echo $wo['project']->description; ?></p>
							<?php } ?>
						</div>
					</div>
					<?php } ?>
				</div>
			<?php } ?>    
			
			<?php if (!empty($wo['user_info']['setting']['block'])) { ?>
				<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C17.67,14 23,15.33 23,18V20H7V18C7,15.33 12.33,14 15,14M15,12A4,4 0 0,1 11,8A4,4 0 0,1 15,4A4,4 0 0,1 19,8A4,4 0 0,1 15,12M5,9.59L7.12,7.46L8.54,8.88L6.41,11L8.54,13.12L7.12,14.54L5,12.41L2.88,14.54L1.46,13.12L3.59,11L1.46,8.88L2.88,7.46L5,9.59Z" /></svg> <?php echo $wo['lang']['blocked_users']; ?></h2>
				<div class="users_list">
					<?php foreach ($wo['user_info']['setting']['block'] as $wo['member']) { ?>
						<div class="profile-style" id="member-<?php echo $wo['member']['user_id'] ?>">
							<a href="<?php echo $wo['member']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['member']['username'] ?>">
								<div class="avatar">
									<img src="<?php echo $wo['member']['avatar'];?>" alt="<?php echo $wo['member']['name']; ?> Profile Picture" />
								</div>
							</a>
							<span><a href="<?php echo $wo['member']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['member']['username'] ?>"><?php echo $wo['member']['name']; ?></a></span>
							<div class="page-website"><?php echo lui_UserStatus($wo['member']['user_id'],$wo['member']['lastseen']); ?></div>
						</div>
					<?php }  ?>
				</div>
			<?php } ?>
                                    
			<?php if (!empty($wo['user_info']['setting']['trans'])) { ?>
				<style>
					.ads-cont-wrapper table {margin: 0;max-width: 100%;}
					.ads-cont-wrapper table thead th {text-align: inherit;background-color: #f9f9f9;padding: 5px 10px;border-bottom: 1px solid #ececec;}
					.ads-cont-wrapper table tr td {	width: auto;}
					.ads-cont-wrapper table tr td:first-child {font-weight: normal;}
				</style>
				<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14V11H18V9L22,12.5L18,16V14H15M14,7.7V9H2V7.7L8,4L14,7.7M7,10H9V15H7V10M3,10H5V15H3V10M13,10V12.5L11,14.3V10H13M9.1,16L8.5,16.5L10.2,18H2V16H9.1M17,15V18H14V20L10,16.5L14,13V15H17Z" /></svg> <?php echo $wo['lang']['transaction_log']; ?></h2>
				<div class="ads-cont-wrapper">
					<table class="table table-striped">
						<thead>
							<tr>
								<th><b><?php echo $wo['lang']['type']; ?></b></th>
								<th><b><?php echo $wo['lang']['status']; ?></b></th>
								<th><b><?php echo $wo['lang']['date']; ?></b></th>
								<th><b><?php echo $wo['lang']['amount']; ?></b></th>
							</tr>
						</thead>
						<tbody id="user-ads">
							<?php if (count($wo['user_info']['setting']['trans']) > 0): ?>
								<?php foreach ($wo['user_info']['setting']['trans'] as $key => $transaction): ?>
									<tr data-ad-id="<?php echo $transaction['id']; ?>">
										<td><span><?php echo $transaction['kind']; ?></span></td>
										<td><span><?php echo $transaction['notes']; ?></span></td>
										<td><span><?php echo $transaction['transaction_dt']; ?></span></td>
										<td><span><?php echo lui_GetCurrency($wo['config']['ads_currency']); ?><?php echo sprintf('%.2f', $transaction['amount'] ); ?></span></td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			<?php } ?>
  
			<?php if (!empty($wo['user_info']['setting']['refs'])) { ?>
				<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,17V19H14A1,1 0 0,1 15,20H22V22H15A1,1 0 0,1 14,23H10A1,1 0 0,1 9,22H2V20H9A1,1 0 0,1 10,19H11V17H5V15.5C5,13.57 8.13,12 12,12C15.87,12 19,13.57 19,15.5V17H13M12,3A3.5,3.5 0 0,1 15.5,6.5A3.5,3.5 0 0,1 12,10A3.5,3.5 0 0,1 8.5,6.5A3.5,3.5 0 0,1 12,3Z" /></svg> <?php echo $wo['lang']['my_affiliates']; ?></h2>
				<div class="users_list">
					<?php foreach ($wo['user_info']['setting']['refs'] as $key => $wo['ref']) { ?>
						<div class="profile-style" id="<?php echo $wo['ref']['user_id'] ?>">
							<a href="<?php echo $wo['ref']['url'];?>" >
								<div class="avatar">
									<img src="<?php echo $wo['ref']['avatar'];?>" alt="<?php echo $wo['ref']['name']; ?> Profile Picture" />
								</div>
							</a>
							<span><a href="<?php echo $wo['ref']['url'];?>"><?php echo $wo['ref']['name']; ?></a></span>
							<div class="page-website"><?php echo $wo['lang']['joined'] ?>: <?php echo lui_Time_Elapsed_String($wo['ref']['joined']);?></div>
						</div>
					<?php }  ?>
				</div>
			<?php } ?>
		<?php } ?>

		<?php if (!empty($wo['user_info']['following'])) { ?>
			<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M6,10V7H4V10H1V12H4V15H6V12H9V10M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12Z" /></svg> <?php echo $wo['lang']['following']; ?></h2>
			<div class="users_list">
				<?php foreach ($wo['user_info']['following'] as $key => $wo['UsersList']) { ?>
					<div class="profile-style" data-user-id="<?php echo $wo['UsersList']['user_id'];?>">
						<a href="<?php echo $wo['UsersList']['url'];?>" >
							<div class="avatar">
								<img src="<?php echo $wo['UsersList']['avatar'];?>" alt="<?php echo $wo['UsersList']['name']; ?> Profile Picture" />
							</div>
						</a>
						<span><a href="<?php echo $wo['UsersList']['url'];?>"><?php echo $wo['UsersList']['name']; ?></a></span>
					</div>
				<?php }  ?>
			</div>
		<?php } ?>

		<?php if (!empty($wo['user_info']['followers'])) { ?>
			<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" /></svg> <?php echo $wo['lang']['followers']; ?></h2>
			<div class="users_list">
				<?php foreach ($wo['user_info']['followers'] as $key => $wo['UsersList']) { ?>
					<div class="profile-style" data-user-id="<?php echo $wo['UsersList']['user_id'];?>">
						<a href="<?php echo $wo['UsersList']['url'];?>" >
							<div class="avatar">
								<img src="<?php echo $wo['UsersList']['avatar'];?>" alt="<?php echo $wo['UsersList']['name']; ?> Profile Picture" />
							</div>
						</a>
						<span><a href="<?php echo $wo['UsersList']['url'];?>"><?php echo $wo['UsersList']['name']; ?></a></span>
					</div>
				<?php }  ?>
			</div>
		<?php } ?>
		<?php if (!empty($wo['user_info']['friends'])) { ?>
			<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" /></svg> <?php echo $wo['lang']['friends_btn']; ?></h2>
			<div class="users_list">
				<?php foreach ($wo['user_info']['friends'] as $key => $wo['UsersList']) { ?>
					<div class="profile-style" data-user-id="<?php echo $wo['UsersList']['user_id'];?>">
						<a href="<?php echo $wo['UsersList']['url'];?>" >
							<div class="avatar">
								<img src="<?php echo $wo['UsersList']['avatar'];?>" alt="<?php echo $wo['UsersList']['name']; ?> Profile Picture" />
							</div>
						</a>
						<span><a href="<?php echo $wo['UsersList']['url'];?>"><?php echo $wo['UsersList']['name']; ?></a></span>
					</div>
				<?php }  ?>
			</div>
		<?php } ?>

		<?php if (!empty($wo['user_info']['groups'])) { ?>
			<style type="text/css">
				.groyps_section {overflow: hidden;}
				.groyps_section .col_6 {width: 50%;padding: 0 15px;float: left;}
				.wo_my__groups {padding: 17px;background-color: white;border: 1px solid #eee;border-radius: 4px;box-shadow: 0 1px 6px rgba(0,0,0,.03);margin-bottom: 25px;display: flex;align-items: center;}
				.wo_my__groups .avatar {margin-right: 12px;}
				.wo_my__groups .avatar img {width: 80px;min-width: 80px;height: 80px;border-radius: 50%;}
				.wo_my__groups .middle {max-width: 90%;overflow: hidden;}
				.wo_my__groups .middle .title {font-size: 18px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;}
				.wo_my__groups .middle .title a {color: #1d2129;text-decoration: none}
				.wo_my__groups .middle .page-website {margin-top: 5px;font-size: 12px;color: #999;}
			</style>
			<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,6A3,3 0 0,0 9,9A3,3 0 0,0 12,12A3,3 0 0,0 15,9A3,3 0 0,0 12,6M6,8.17A2.5,2.5 0 0,0 3.5,10.67A2.5,2.5 0 0,0 6,13.17C6.88,13.17 7.65,12.71 8.09,12.03C7.42,11.18 7,10.15 7,9C7,8.8 7,8.6 7.04,8.4C6.72,8.25 6.37,8.17 6,8.17M18,8.17C17.63,8.17 17.28,8.25 16.96,8.4C17,8.6 17,8.8 17,9C17,10.15 16.58,11.18 15.91,12.03C16.35,12.71 17.12,13.17 18,13.17A2.5,2.5 0 0,0 20.5,10.67A2.5,2.5 0 0,0 18,8.17M12,14C10,14 6,15 6,17V19H18V17C18,15 14,14 12,14M4.67,14.97C3,15.26 1,16.04 1,17.33V19H4V17C4,16.22 4.29,15.53 4.67,14.97M19.33,14.97C19.71,15.53 20,16.22 20,17V19H23V17.33C23,16.04 21,15.26 19.33,14.97Z" /></svg> <?php echo $wo['lang']['groups']; ?></h2>
			<div class="groyps_section">
				<?php foreach ($wo['user_info']['groups'] as $key => $wo['group']) { ?>
					<div class="col_6 ">
						<div class="wo_my__groups">
							<div class="avatar">
								<a href="<?php echo $wo['group']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['group']['group_name'];?>">
									<img src="<?php echo $wo['group']['avatar'];?>" alt="<?php echo $wo['group']['group_name']; ?> Profile Picture" />
								</a>
							</div>
							<div class="middle">
								<div class="title" title="<?php echo $wo['group']['group_title']; ?>"><a href="<?php echo $wo['group']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['group']['group_name'];?>"><?php echo $wo['group']['group_title']; ?></a></div>
								<div class="page-website"><?php echo lui_CountGroupMembers($wo['group']['id']);?> <?php echo $wo['lang']['members']; ?></div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		<?php } ?>

		<?php if (!empty($wo['user_info']['pages'])) { ?>
			<style type="text/css">
				.page_section {overflow: hidden;margin: 0 -15px;}
				.col_4 {width: 33.33333333%;float: left;padding: 0 15px;}
				.wo_sidebar_pages {border: 1px solid #ebedf0;margin: 3px 10px 10px;}
				.wo_sidebar_pages .page_middle {padding:10px 8px;min-height:63px}
				.wo_sidebar_pages .page_middle .avatar {margin-right:9px;float: left}
				.wo_sidebar_pages .page_middle .avatar img {width: 42px;height: 42px;object-fit: cover;}
				.wo_sidebar_pages .page_middle .info {margin-left: 51px;padding-top: 5px;}
				.wo_sidebar_pages .page_middle .info > span {font-size: 13px;color: #90949c;}
				.wo_sidebar_pages .page_middle .title{line-height: 1;}
				.wo_sidebar_pages .page_middle .title a {color:#3e3e3e;font-weight: 600;max-width: 100%;text-decoration: none;}
				.wo_sidebar_pages .cardheader {position:relative;}
				.wo_sidebar_pages .cardheader img {width: 100%;height: 155px;object-fit: cover;}
				.wo_sidebar_pages .user-follow-button {background: linear-gradient(transparent,rgba(0, 0, 0, 0.8));position: absolute;left: 0;right: 0;bottom: 0;padding-top: 30px;}
				.wo_sidebar_pages .user-follow-button .page_catg{line-height:45px;margin:0 7px;color:#ffffff;font-size:12px}
			</style>
			<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14.4,6L14,4H5V21H7V14H12.6L13,16H20V6H14.4Z" /></svg> <?php echo $wo['lang']['pages']; ?></h2>
			<div class="page_section">
				<?php foreach ($wo['user_info']['pages'] as $key => $wo['page']) { ?>
					<div class="col_4">
						<div class="wo_sidebar_pages">
							<div class="page_middle">
								<div class="avatar">
									<img alt="<?php echo $wo['page']['page_name']; ?> Profile Picture" src="<?php echo $wo['page']['avatar'];?>">
								</div>
								<div class="info">
									<div class="title">
										<a id="user-full-name" href="<?php echo $wo['page']['url'];?>"><?php echo $wo['page']['page_title']; ?></a>
									</div>
									<span><?php echo $wo['page']['category']?></span>
								</div>
							</div>
							<div class="cardheader">
								<img src="<?php echo $wo['page']['cover'];?>" id="cover-image" alt="<?php echo $wo['page']['page_name']; ?> Cover Image">
								<div class="user-follow-button">
									<span class="page_catg"><?php echo lui_CountPageLikes($wo['page']['page_id']);?> <?php echo $wo['lang']['people_likes_this']; ?></span>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		<?php } ?>

		<?php if (!empty($wo['user_info']['posts'])) { ?>
			<style type="text/css">
				.pull-left {float: left;}
				.pull-right {float: right;}
				.sun_post {width: 519.5px;margin: auto;}
				.sun_post .post {margin-left: 10px;}
				.post > .panel {box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);border-radius: 5px;margin-bottom: 20px;background-color: #fff;}
				.post .post-heading {height: 70px;padding: 15px;}
				.post .post-heading .avatar {width: 44px;height: 44px;display: block;border-radius: 50%;margin-left: -32px;box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);margin-right: 10px;}
				.sun_post .post .post-heading .meta {margin-left: 22px;}
				.post .post-heading .meta .title {margin-bottom: -2px;margin-top: 5px;overflow: hidden;padding-top: 2px;font-size: 14px;}
				.post .post-heading .meta .title a {color: #555;}
				svg.feather {vertical-align: middle;margin-top: -4px;width: 19px;height: 19px;}
				.h6, h6 {font-size: 12px;}
				.h4, .h5, .h6, h4, h5, h6 {margin-top: 7px;margin-bottom: 10px;font-weight: 500;}
				.collapsing, .dropdown, .dropup {position: relative;}
				.pointer {cursor: pointer;}
				.post .post-heading .meta .time {margin-top: 8px;color: #999;}
				.post .post-description {padding: 15px 15px 8px;}
				.post .post-description p {font-size: 14px;color: #555;overflow: hidden;word-wrap: break-word;}
				article, div, h1, h2, h3, h4, h5, p, span {word-wrap: break-word;}
				#fullsizeimg {max-height: 600px;margin-left: -15px;width: calc(100% + 30px);overflow: hidden;}
				.post .post-file {max-height: 400px;background: #f9f9f9;width: 100%;}
				.post-file {text-align: center;}
				#fullsizeimg img {max-height: none;border: 0;padding: 0;border-radius: 0;}
				.post .post-file img {max-height: 380px;max-width: 100%;}
				.image-file {max-width: 100%;margin: 0 auto;text-align: center;border: 1px solid #e3e4e8;}
				img {vertical-align: middle;}
				.clear {clear: both;}
				.post-fetched-url {border-radius: 3px;border: 1px solid #ededed;transition: all .2s;position: relative;}
				.width-2{width:50%!important}
				.width-3{width:33.33%!important}
				.album-collapse {width: 33.33%;position: relative;background: no-repeat #f9f9f9;display: inline;float: right;background-size: cover;}
				.album-collapse span {position: absolute;top: 0;left: 0;width: 100%;background: rgba(0,0,0,.4);height: 100%;color: #fff;text-align: center;vertical-align: middle;padding: 35% 0;font-size: 35px;font-weight: 400;}
				.hidden {display: none !important;}
				.wo_single_proimg{width:100%;height:300px;object-fit:cover}
				.wo_product_row{border:1px solid #e5e5e5;padding:10px 5px}
				.wo_product_row .product-name{display:inline-block;width:33.3333%;border-right:1px solid #e5e5e5;text-align:center;vertical-align:middle}
				.wo_product_row .product-name:last-child{border-right:0}
				.wo_product_row .product-name .product_row_title{display:block}
				.wo_product_row .product-name .product_row_title svg.feather{margin-top:-3px;width:15px;height:15px;margin-right:4px}
				.wo_post_fetch_event .post-fetched-url-con {position: relative;}
				.album-image {position: relative;color: #fff;float: left;}
				.wo_adaptive_media .album-image:first-child .image-file,.wo_adaptive_media_4 .album-image:first-child .image-file{width:100%}
				.wo_adaptive_media{display:inline-block;overflow:hidden;position:relative;width:100%}
				.wo_adaptive_media .album-image{display:inline-block;height:168.43px;vertical-align:top;width:calc(100% / 3 - 1.4px)!important}
				.wo_adaptive_media .album-image:first-child{margin-right:1px;overflow:hidden;position:relative;width:66.666666666667%!important;padding-right:1px;height: 338.66px}
				.wo_adaptive_media .album-image:last-child .image-file{border-top:2px solid #fff!important}
				.wo_adaptive_media_4{display:inline-block;overflow:hidden;position:relative;width:100%}
				.wo_adaptive_media_4 .album-image{display:inline-block;height:127.98px;vertical-align:top;width:calc(100% / 4 - 2.4px)!important}
				.wo_adaptive_media_4 .album-image:first-child{margin-right:1px;overflow:hidden;position:relative;width:75%!important;padding-right:2px;height: 383.13px;}
				.wo_adaptive_media_4 .album-image .image-file{border-top:3px solid #fff!important}
				.wo_adaptive_media_5{overflow:hidden;position:relative;width:100%;height:476px}
				.wo_adaptive_media_5 .album-image{display:block;position:absolute;width:50%!important;overflow:hidden}
				.wo_adaptive_media_5 .album-image:first-child{top:0;left:0;height:236px}
				.wo_adaptive_media_5 .album-image:nth-child(2){top:239px;left:0;height:237px}
				.wo_adaptive_media_5 .album-image:nth-child(3){top:0;left:50%;height:157px;padding-left:3px}
				.wo_adaptive_media_5 .album-image:nth-child(4){top:160px;left:50%;height:155px;padding-left:3px}
				.wo_adaptive_media_5 .album-image:last-child{top:319px;left:50%;height:157px;padding-left:3px}
				.post-fetched-url-con {max-height: 300px;overflow: hidden;}
				.post-fetched-url img {width: 100%;}
				.wo_post_fetch_event .post-fetched-url-con .description {width: 100%;position: absolute;left: 0;margin: 0 auto;padding: 0 50px;opacity: 0;height: 100%;background-color: rgba(0,0,0,.65);transition: opacity .3s cubic-bezier(.33,.66,.66,1);}
				.wo_post_fetch_event .post-fetched-url-con .description p {width: 100%;position: absolute;top: 50%;left: 50%;padding: 0 50px;transform: translate(-50%,-50%);color: #fff;font-size: 15px;}
				.post-fetched-url .fetched-url-text {margin: 5px;}
				.fetched-url-text {padding: 5px;}
				.post-fetched-url .fetched-url-text h4 {color: #444;margin-bottom: 10px;font-size: 18px!important;}
				.wo_post_fetch_event .url {margin: 10px 0 0;}
				.wo_post_fetch_event .url svg {width: 17px;height: 17px;margin-top: -3px;}
				.post-youtube iframe {height: 300px;}
			</style>
			<h2><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.8,20C17.4,21.2 16.3,22 15,22H5C3.3,22 2,20.7 2,19V18H5L14.2,18C14.6,19.2 15.7,20 17,20H17.8M19,2C20.7,2 22,3.3 22,5V6H20V5C20,4.4 19.6,4 19,4C18.4,4 18,4.4 18,5V18H17C16.4,18 16,17.6 16,17V16H5V5C5,3.3 6.3,2 8,2H19M8,6V8H15V6H8M8,10V12H14V10H8Z" /></svg> <?php echo $wo['lang']['posts']; ?></h2>
			<?php foreach ($wo['user_info']['posts'] as $key => $wo['story']) { ?>
				<div class="post-container sun_post">
					<div class="post" id="post-<?php echo $wo['story']['id']; ?>" data-post-id="<?php echo $wo['story']['id'];?>" <?php if( isset( $wo['story']['LastTotal'] ) ) { echo 'data-post-total="'.$wo['story']['LastTotal'].'"'; }?> <?php if( isset( $wo['story']['ids'] ) ) { echo 'data-post-ids="'.$wo['story']['ids'].'"'; }?> <?php if( isset( $wo['story']['dt'] ) ) { echo 'data-post-dt="'.$wo['story']['dt'].'"'; }?>>
						<div class="panel panel-white panel-shadow">
							<div class="post-heading">
								<div class="<?php echo lui_RightToLeft('pull-left');?> image">
									<a href="<?php echo $wo['story']['publisher']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['publisher']['username']?>">
										<img src="<?php echo $wo['story']['publisher']['avatar']; ?>" id="updateImage-<?php echo $wo['story']['publisher']['user_id']?>" class="avatar" alt="<?php echo $wo['story']['publisher']['name']; ?> profile picture">
									</a>
								</div>
								<div class="meta">
									<div class="title h5">
										<a href="<?php echo $wo['story']['publisher']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['publisher']['username']; ?>"><b><?php echo $wo['story']['publisher']['name']; ?></b></a>
										<?php if ($wo['story']['shared_from'] && is_array($wo['story']['shared_from'])): ?>
											<span><?php echo $wo['lang']['shared']; ?></span> 
											<a href="<?php echo $wo['story']['shared_from']['url']; ?>" class="pointer no_decor" data-ajax="?link1=timeline&u=<?php echo $wo['story']['shared_from']['username']; ?>"><b><?php echo $wo['story']['shared_from']['name']; ?></b></a>
										<?php endif; ?>
										<?php if ($wo['story']['shared_from'] && is_array($wo['story']['shared_from'])): ?>
											<span>  
												<a href="<?php echo $wo['story']['post_url']; ?>" class="pointer"><span style="color: #666;"><?php echo strtolower($wo['lang']['post']); ?></span></a>
											</span>
										<?php endif; ?>
										<?php if ($wo['story']['recipient_exists'] == true) {  ?>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg>
											<a href="<?php echo $wo['story']['recipient']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['recipient']['username']; ?>">
												<b><?php echo $wo['story']['recipient']['name']; ?></b>
											</a>
										<?php } ?>
										<?php if (!empty($wo['story']['page_event_id'])) {?>
											<small class="small-text"> <?php echo $wo['lang']['created_new_event'] ?></small>
										<?php } ?>
										<?php if (!empty($wo['story']['event_id']) && $wo['page'] != 'events') {  ?>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg>
											<a href="<?php echo $wo['story']['event']['url']; ?>" data-ajax="?link1=show-event&eid=<?php echo $wo['story']['event']['id']; ?>"><b><?php echo $wo['story']['event']['name']; ?></b></a>
										<?php } ?>
										<?php if ($wo['story']['group_recipient_exists'] == true && $wo['page'] != 'group') {  ?>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" /></svg>
											<a href="<?php echo $wo['story']['group_recipient']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['group_recipient']['username']; ?>">
												<b><?php echo $wo['story']['group_recipient']['name']; ?></b>
											</a>
										<?php } ?>
										<?php if (!empty($wo['story']['album_name']) && empty($wo['story']['shared_from'])) {  ?>
											<small class="small-text"><?php echo $wo['lang']['added_new_photos_to'];?> <b><a href="<?php echo $wo['story']['url']; ?>" data-ajax="?link1=post&id=<?php echo $wo['story']['id'];?>"><?php echo $wo['story']['album_name']; ?></a></b></small>
										<?php } ?>
										<?php if (!empty($wo['story']['product_id']) && empty($wo['story']['shared_from'])) {  ?>
											<small class="small-text"><?php echo $wo['lang']['added_new_product_for_sell']; ?></small>
										<?php } ?>
										<?php if (!empty($wo['story']['blog_id'])  && empty($wo['story']['shared_from'])) {  ?>
											<small class="small-text"><?php echo $wo['lang']['created_new_blog'] ?></small>
										<?php } ?>
										<?php if (empty($wo['story']['shared_from'])): ?>
											<small class="small-text">
												<?php 
													if($wo['story']['postType'] == 'profile_picture') { 
														$changed_profile_pic_lang = $wo['lang']['changed_profile_picture_male'];
														if ($wo['story']['publisher']['gender'] == 'female') {
															$changed_profile_pic_lang = $wo['lang']['changed_profile_picture_female'];
														} else {
															$changed_profile_pic_lang = $wo['lang']['changed_profile_picture_male'];
														}
														echo $changed_profile_pic_lang;
													} 
													if($wo['story']['postType'] == 'profile_cover_picture') { 
														$changed_profile_cover_pic_lang = $wo['lang']['changed_profile_cover_picture_male'];
														if ($wo['story']['publisher']['gender'] == 'female') {
															$changed_profile_cover_pic_lang = $wo['lang']['changed_profile_cover_picture_female'];
														} else {
															$changed_profile_cover_pic_lang = $wo['lang']['changed_profile_cover_picture_male'];
														}
														echo $changed_profile_cover_pic_lang;
													} 
												?>
											</small>
										<?php endif; ?>
										<?php if($wo['story']['via_type'] == 'share') {  ?>
											<small style="color:#a33e40;"><?php echo $wo['story']['via']['name'];?> <?php echo $wo['lang']['shared_this_post'];?></small>
										<?php }  ?>
                        <?php 
                            $extra_exists = 0;
                            if (!empty($wo['story']['postFeeling'])) {
                                if (empty($changed_profile_pic_lang) 
                                    && $wo['story']['via_type'] != 'share'
                                    && $wo['story']['group_recipient_exists'] != true
                                    && empty($wo['story']['album_name'])) {
                        ?>
                            <span class="feeling-text"> <?php echo $wo['lang']['is_feeling'];?> <i class="twa-lg twa twa-<?php echo $wo['story']['postFeelingIcon'];?>"></i> <?php echo $wo['lang'][$wo['story']['postFeeling']];?></span>
                        <?php
                            } else {
                            $extra_exists = 1;
                            }
                            }
                            if (!empty($wo['story']['postTraveling'])) {
                                if (empty($changed_profile_pic_lang) 
                                    && $wo['story']['via_type'] != 'share'
                                    && $wo['story']['group_recipient_exists'] != true
                                    && empty($wo['story']['album_name'])) {
                        ?>
                            <span class="feeling-text"><i class="fa fa-plane"></i> <?php echo $wo['lang']['is_traveling'];?> <?php echo $wo['story']['postTraveling'];?></span>
                        <?php
                            } else {
                                $extra_exists = 1;
                            }
                            }
                            if (!empty($wo['story']['postListening'])) {
                                if (empty($changed_profile_pic_lang) 
                                    && $wo['story']['via_type'] != 'share'
                                    && $wo['story']['group_recipient_exists'] != true
                                    && empty($wo['story']['album_name'])) {
                        ?>
                            <span class="feeling-text"><i class="fa fa-headphones"></i> <?php echo $wo['lang']['is_listening'];?> <?php echo $wo['story']['postListening'];?></span>
                        <?php
                            } else {
                            $extra_exists = 1;
                            }
                            }
                            if (!empty($wo['story']['postPlaying'])) {
                                if (empty($changed_profile_pic_lang) 
                                    && $wo['story']['via_type'] != 'share'
                                    && $wo['story']['group_recipient_exists'] != true
                                    && empty($wo['story']['album_name'])) {
                        ?>
                            <span class="feeling-text"><i class="fa fa-gamepad"></i> <?php echo $wo['lang']['is_playing'];?> <?php echo $wo['story']['postPlaying'];?></span>
                        <?php
                            } else {
                            $extra_exists = 1;
                            }
                            }
                            if (!empty($wo['story']['postWatching'])) {
                                if (empty($changed_profile_pic_lang) 
                                    && $wo['story']['via_type'] != 'share'
                                    && $wo['story']['group_recipient_exists'] != true
                                    && empty($wo['story']['album_name'])) {
                        ?>
                            <span class="feeling-text"><i class="fa fa-eye"></i> <?php echo $wo['lang']['is_watching'];?> <?php echo $wo['story']['postWatching'];?></span>
                        <?php
                            } else {
                            $extra_exists = 1;
                            }
                            }
                        ?>
                    </div>
                    <h6>
                        <?php if(!empty($wo['story']['postMap'])) { ?>
                            <?php if(!empty($wo['story']['postSoundCloud']) || !empty($wo['story']['postVine']) || !empty($wo['story']['postYoutube']) || !empty($wo['story']['postPlaytube']) || !empty($wo['story']['postVimeo']) || !empty($wo['story']['postText']) || !empty($wo['story']['postFile']) || !empty($wo['story']['postLink']) || !empty($wo['story']['postFacebook']) || !empty($wo['story']['postDailymotion']) || !empty($wo['story']['album_name']) || ($wo['config']['google_map'] == 0 && $wo['config']['yandex_map'] == 0)) { ?>
                                <span style="color:#9197a3"> - <i class="fa fa-map-marker"></i> <?php echo $wo['story']['postMap'];?>.</span>
                            <?php } ?>
                        <?php } else { ?>
                            <?php
                                $small_icon = '';
                                $icon_type = '';
                                if(!empty($wo['story']['postVine'])) { 
                                    $small_icon = 'vine';
                                    $icon_type = 'Vine';
                                } else if (!empty($wo['story']['postVimeo'])) {
                                    $small_icon = 'vimeo';
                                    $icon_type = 'Vimeo';
                                } else if (!empty($wo['story']['postFacebook'])) {
                                    $small_icon = 'facebook-official';
                                    $icon_type = 'Facebook';
                                } else if (!empty($wo['story']['postDailymotion'])) {
                                    $small_icon = 'film';
                                    $icon_type = 'Dailymotion';
                                } else if (!empty($wo['story']['postYoutube'])) {
                                    $small_icon = 'youtube-square';
                                    $icon_type = 'Youtube';
                                } else if (!empty($wo['story']['postPlaytube'])) {
                                    // $small_icon = 'play-circle';
                                    // $icon_type = 'PlayTube';
                                } else if (!empty($wo['story']['postSoundCloud'])) {
                                    $small_icon = 'soundcloud';
                                    $icon_type = 'SoundCloud';
                                }
                                if (!empty($icon_type)) {
                            ?>
                            <span style="color:#9197a3; text-transform: capitalize;">- <i class="fa fa-<?php echo $small_icon; ?>"></i> <?php echo $icon_type; ?></span>
                        <?php  } } ?>
                        <span class="time">
                            &nbsp;&nbsp;<a  style="color:#9197a3" class="ajax-time" href="<?php echo $wo['story']['url'];?>" title="<?php echo date('c',$wo['story']['time']); ?>" target="_blank"><?php echo lui_Time_Elapsed_String($wo['story']['time']); ?></a>
                        </span>
                    </h6>
                </div>
            </div>

            <div class="post-description" id="post-description-<?php echo $wo['story']['id']; ?>">
                <?php
                    if (!empty($wo['story']['product_id'])) {
                        $class = '';
                        $small = '';
                        $singleimg = '';
                        if (count($wo['story']['product']['images']) == 1) {
                            $singleimg = 'wo_single_proimg';
                        }
                        if (count($wo['story']['product']['images']) == 2) {
                            $class = 'width-2';
                        }
                        if (count($wo['story']['product']['images']) > 1) {
                            $small = '_small';
                        }
                        if (count($wo['story']['product']['images']) > 2) {
                            $class = 'width-3';
                        }
                        if (count($wo['story']['product']['images']) > 3) {
                            foreach (array_slice($wo['story']['product']['images'],0,3) as $key => $photo) {
                                if ($key == 2) {
                                    echo "<div class='album-collapse pointer'> 
                                    <img src='".($photo['image_org'])."' class='image-file'>
                                    <span>+".count(array_slice($wo['story']['product']['images'],2))."</span>
                                    </div>
                                    "; 
                                }
                                else{
                                    echo  "<img src='" . ($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer' 
                                    >";
                                }
                            }
                            foreach (array_slice($wo['story']['product']['images'],3) as $photo) {
                                echo  "<img src='" . ($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer hidden' 
                                >";
                            }
                        }
                        else{
                            foreach ($wo['story']['product']['images'] as $photo) {
                                echo  "<img src='" . ($photo['image_org']) ."' alt='image' class='" . $class . " " . $singleimg . " image-file pointer' 
                                >";
                            }
                        }
                        echo '<br><br>';
                        $symbol =  (!empty($wo['currencies'][$wo['story']['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['story']['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];
                        $text =  (!empty($wo['currencies'][$wo['story']['product']['currency']]['text'])) ? $wo['currencies'][$wo['story']['product']['currency']]['text'] : $wo['config']['classified_currency'];
                        $status = '<span class="product-description">' . $wo['lang']['currently_unavailable'] . '</span>';
			            if ($wo['story']['product']['units'] > 0) {
			              $status = ($wo['story']['product']['status'] == 0) ? '<span class="product-description">' . $wo['lang']['in_stock'] . '</span>' : '<span class="product-status-sold">' . $wo['lang']['sold'] . '</span><br><br>';
			            }
                        $type = ($wo['story']['product']['type'] == 0) ? '<span class="product-description">' . $wo['lang']['new'] . '</span>' : '<span class="product-description">' . $wo['lang']['used'] . '</span><br>';
                        echo '<div class="product-name"><h4 class="product-description">' . $wo['story']['product']['name'] . '</h4></div>';
                        if (!empty($wo['story']['product']['location'])) {
                            echo '<div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></span> <span class="product-description"> ' . $wo['story']['product']['location'] . '</span></div><br>';
                        }
                        echo '<div class="product-name"><p class="product-description product-description-'.$wo['story']['product']['id'].'">' . $wo['story']['product']['description'] . '</p></div><br>';
                        echo '<div class="wo_product_row"><div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag" color="#2196F3"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>' . $wo['lang']['type'] . '</span> ' . $type . '</div>';
                        echo '<div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card" color="#349238"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>' . $wo['lang']['price'] . '</span> <span class="product-description" style="max-height: none;">' . $symbol . $wo['story']['product']['price'] . ' (' . $text . ')</span></div>';
                        echo '<div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package" color="#9C27B0"><path d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"></path><polyline points="2.32 6.16 12 11 21.68 6.16"></polyline><line x1="12" y1="22.76" x2="12" y2="11"></line><line x1="7" y1="3.5" x2="17" y2="8.5"></line></svg>' . $wo['lang']['status'] . '</span> ' . $status . '</div></div>';
                    } 
                ?>
                <p dir="auto">
                    <span data-translate-text="<?php echo $wo['story']['id']; ?>"> <?php echo $wo['story']['postText']; ?></span>
                    <?php if (!empty($wo['story']['postFeeling']) && $extra_exists == 1) { ?>
                        <span class="feeling-text"> — <i class="twa-lg twa twa-<?php echo $wo['story']['postFeelingIcon'];?>"></i> <?php echo $wo['lang']['feeling'];?> <?php echo $wo['lang'][$wo['story']['postFeeling']];?></span>
                    <?php } ?>
                    <?php if (!empty($wo['story']['postTraveling']) && $extra_exists == 1) { ?>
                        <span class="feeling-text"> — <i class="fa fa-plane"></i> <?php echo $wo['lang']['traveling'];?><?php echo $wo['story']['postTraveling'];?></span>
                    <?php } ?>
                    <?php if (!empty($wo['story']['postWatching']) && $extra_exists == 1) { ?>
                        <span class="feeling-text"> — <i class="fa fa-eye"></i> <?php echo $wo['lang']['watching'];?> <?php echo $wo['story']['postWatching'];?></span>
                    <?php } ?>
                    <?php if (!empty($wo['story']['postPlaying']) && $extra_exists == 1) { ?>
                        <span class="feeling-text"> — <i class="fa fa-gamepad"></i> <?php echo $wo['lang']['playing'];?> <?php echo $wo['story']['postPlaying'];?></span>
                    <?php } ?>
                    <?php if (!empty($wo['story']['postListening']) && $extra_exists == 1) { ?>
                        <span class="feeling-text"> — <i class="fa fa-headphones"></i> <?php echo $wo['lang']['listening'];?> <?php echo $wo['story']['postListening'];?></span>
                    <?php } ?>
                </p>
                <?php if(!empty($wo['story']['postYoutube'])) {  ?>
                    <div class="post-youtube wo_video_post">
                        <iframe id="ytplayer" type="text/html" width="100%" height="340" src="https://www.youtube.com/embed/<?php echo $wo['story']['postYoutube']; ?>?autoplay=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen/></iframe>
                    </div>
                <?php } ?>
                <?php if(!empty($wo['story']['postPlaytube'])) {  ?>
                    <div class="post-youtube wo_video_post">
                        <iframe id="ptplayer" type="text/html" width="100%" height="340" src="<?php echo $wo['config']['playtube_url']; ?>/embed/<?php echo $wo['story']['postPlaytube']; ?>?autoplay=0&fullscreen=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen/></iframe>
                    </div>
                <?php } ?>
                <?php if(!empty($wo['story']['postVimeo'])) {  ?>
                    <div class="post-youtube wo_video_post">
                        <iframe src="https://player.vimeo.com/video/<?php echo $wo['story']['postVimeo'];?>?byline=0&portrait=0" width="100%" height="340" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                <?php } ?>
                <?php if(!empty($wo['story']['postFacebook'])) {  ?>
                    <div class="post-youtube wo_video_post">
                        <iframe src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/<?php echo $wo['story']['postFacebook'];?>&show_text=0" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
                        <div class="clear"></div>
                    </div>
                <?php } ?>
                <?php if(!empty($wo['story']['postDailymotion'])) {  ?>
                    <div class="post-youtube wo_video_post">
                        <iframe frameborder="0" width="100%" height="340" src="https://www.dailymotion.com/embed/video/<?php echo $wo['story']['postDailymotion']?>" allowfullscreen></iframe>
                    </div>
                <?php } ?>
                <?php if(!empty($wo['story']['postVine'])) {  ?>
                    <iframe src="https://vine.co/v/<?php echo $wo['story']['postVine']; ?>/embed/simple" width="100%" height="400" frameborder="0"></iframe>
                <?php } ?>
                <?php if(!empty($wo['story']['postSoundCloud'])) { ?>
                    <iframe width="100%" src="https://w.soundcloud.com/player/?url=https://api.soundcloud.com/tracks/<?php echo $wo['story']['postSoundCloud'];?>&auto_play=false"></iframe>
                <?php } ?>
                <?php if(!empty($wo['story']['postMap']) && empty($wo['story']['postVine']) && empty($wo['story']['postSoundCloud']) && empty($wo['story']['postVimeo']) && empty($wo['story']['postDailymotion']) && empty($wo['story']['postYoutube']) && empty($wo['story']['postPlaytube']) && empty($wo['story']['postFile']) && ($wo['config']['google_map'] == 1 || $wo['config']['yandex_map'] == 1)) { ?>
                    <div class="post-map">
                    	<?php if ($wo['config']['google_map'] == 1) { ?>
                        <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $wo['story']['postMap'];?>&zoom=13&size=600x250&maptype=roadmap&markers=color:red%7C<?php echo $wo['story']['postMap'];?>&key=<?php echo $wo['config']['google_map_api'];?>" width="100%">
                        <?php } ?>
                        <?php if ($wo['config']['yandex_map'] == 1) { ?>
						<div id="place_info_<?php echo($wo['story']['id']); ?>" <?php echo($wo['config']['yandex_map'] == 1 ? 'style="width: 100%; height: 300px; padding: 0; margin: 0;"' : '') ?>></div>
						<script type="text/javascript">
		        			<?php if (!empty($wo['story']['postMap'])) { ?>
		        				setTimeout(function () {
		        					var myMap;
							        ymaps.geocode("<?php echo($wo['story']['postMap']); ?>").then(function (res) {
							            myMap = new ymaps.Map('place_info_<?php echo($wo['story']['id']); ?>', {
							                center: res.geoObjects.get(0).geometry.getCoordinates(),
							                zoom : 10
							            });
							            myMap.geoObjects.add(new ymaps.Placemark(res.geoObjects.get(0).geometry.getCoordinates(), {
									            balloonContent: ''
									        }));
							        });
		        				},1000);
					        <?php } ?>
		        		</script>
					<?php } ?>
                    </div>
                <?php } ?>
                <?php if(!empty($wo['story']['postLink']) && empty($wo['story']['postVine']) && empty($wo['story']['postPlaytube']) && empty($wo['story']['postSoundCloud']) && empty($wo['story']['postYoutube']) && empty($wo['story']['postFile'])) { ?>
                	<?php if (!preg_match("/(http|https):\/\/twitter\.com\/[a-zA-Z0-9_]+\/status\/[0-9]+/", $wo['story']['postLink']) && !preg_match("/(http|https):\/\/www.tiktok\.com\/(.*)\/video\/(.*)+/", $wo['story']['postLink']) && !preg_match("/^(http:\/\/|https:\/\/|www\.).*(\.mp4)$/", $wo['story']['postLink'])) { ?>
                    <div class="post-fetched-url wo_post_fetch_link">
                        <a href="<?php echo $wo['story']['postLink'];?>" target="_blank">
                            <?php if (!empty($wo['story']['postLinkImage'])) {?>
                                <div class="post-fetched-url-con">
                                    <img src="<?php echo $wo['story']['postLinkImage'];?>" class="<?php echo lui_RightToLeft('pull-left');?>" alt="<?php echo $wo['story']['postLinkTitle'];?>"/>
                                    <div class="url">
                                        <?php 
                                            $parse = parse_url($wo['story']['postLink']);
                                            echo $parse['host'];
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="fetched-url-text">
                                <h4><?php echo $wo['story']['postLinkTitle'];?></h4>
                                <div class="description"><?php echo $wo['story']['postLinkContent'];?></div>
                            </div>
                            <div class="clear"></div>
                        </a>
                    </div>
                    <?php }
                    elseif (preg_match("/(http|https):\/\/www.tiktok\.com\/(.*)\/video\/(.*)+/", $wo['story']['postLink'])) {
        	echo html_entity_decode($wo['story']['postLinkContent']);
        }elseif (preg_match("/^(http:\/\/|https:\/\/|www\.).*(\.mp4)$/", $wo['story']['postLink'])) {
         ?>
         <div class="post-file wo_shared_doc_file" id="fullsizeimg">
            <?php
               $wo['media'] = array('storyId' => $wo['story']['id'],
                                    'filename' => $wo['story']['postLink'],
                                    'video_thumb' => '');
               $wo['wo_ad_id'] = '';
               $wo['rvad_con'] = '';
               echo lui_LoadPage('players/video');
               ?>
         </div>
         <?php
        }
                    else{ ?>
   <?php echo html_entity_decode($wo['story']['postLinkContent']);?>
 <?php } ?>
                <?php } ?>
                <?php if(!empty($wo['story']['page_event_id'])) { ?>
                    <div class="post-fetched-url wo_post_fetch_event">
                        <a href="<?php echo $wo['story']['event']['url'];?>">
                            <?php if (!empty($wo['story']['event']['cover'])) {?>
                                <div class="post-fetched-url-con">
                                    <img src="<?php echo $wo['story']['event']['cover'];?>" class="<?php echo lui_RightToLeft('pull-left');?>"/>
                                    <div class="description">
                                        <p>
                                            <?php if (strlen($wo['story']['event']['description']) > 175):?>
                                                <?php echo mb_substr($wo['story']['event']['description'],0,175,"UTF-8") . "..."; ?>
                                            <?php else:?>
                                                <?php echo $wo['story']['event']['description']; ?>
                                            <?php endif;?>
                                        </p>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="fetched-url-text">
                                <h4><?php echo $wo['story']['event']['name'];?></h4>
                                <div class="url">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> <?php echo $wo['story']['event']['start_date'];?> - <?php echo $wo['story']['event']['end_date'];?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </a>
                    </div>
                <?php } ?>
                <?php if(!empty($wo['story']['blog_id'])) { ?>
                    <div class="post-fetched-url wo_post_fetch_blog">
                        <a href="<?php echo $wo['story']['blog']['url'];?>">
                            <div class="fetched-url-text">
                                <h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> <?php echo $wo['story']['blog']['title'];?></h4>
                                <div class="description"><?php echo $wo['story']['blog']['description'];?></div>
                            </div>
                            <?php if (!empty($wo['story']['blog']['thumbnail'])) {?>
                                <div class="post-fetched-url-con">
                                    <img src="<?php echo $wo['story']['blog']['thumbnail'];?>" class="<?php echo lui_RightToLeft('pull-left');?>" alt="<?php echo $wo['story']['blog']['title'];?>"/>
                                </div>
                            <?php } ?>
                            <div class="clear"></div>
                        </a>
                    </div>
                <?php } ?>
                <?php if(!empty($wo['story']['postFile'])) { ?>
                    <div class="post-file" id="fullsizeimg">
                        <?php
                            $media = array(
                                'type' => 'post',
                                'storyId' => $wo['story']['id'],
                                'filename' => $wo['story']['postFile'],
                                'name' => $wo['story']['postFileName'],
                                'postFileThumb' => $wo['story']['postFileThumb'],
                            );
                            echo lui_DisplaySharedFile($media, '', $wo['story']['cache']);
                        ?>
                    </div>
                <?php } ?>
                <?php if (lui_IsUrl($wo['story']['postSticker'])): ?>
                    <div class="post-file wo_video_post">
                        <?php if (strpos('.mp4', $wo['story']['postSticker'])) { ?>
                            <video autoplay loop><source src="<?php echo $wo['story']['postSticker']; ?>" type="video/mp4"></video>
                        <?php } else { ?>
                            <img src="<?php echo $wo['story']['postSticker']; ?>" alt="GIF">
                        <?php } ?>
                    </div>
                <?php endif; ?>
                <?php if (lui_IsUrl($wo['story']['postPhoto'])): ?>
                    <div class="post-file" id="fullsizeimg">
                        <img src="<?php echo $wo['story']['postPhoto']; ?>" alt="Picture">
                    </div>
                <?php endif; ?>
                <?php if(!empty($wo['story']['postRecord'])) { ?>
                    <div class="post-file">
                        <?php  
                            $media = array(
                                'type' => 'post',
                                'storyId' => $wo['story']['id'],
                                'filename' => $wo['story']['postRecord'],
                                'name' => ''
                            );
                            echo  lui_DisplaySharedFile($media,'record');
                        ?>
                    </div>
                <?php } ?>
                <div id="fullsizeimg">
                    <?php if (!empty($wo['story']['photo_album'])) {
                        $class = '';
                        $small = '';
                        if (count($wo['story']['photo_album']) == 2) {
                            $class = 'width-2';
                        }
                        if (count($wo['story']['photo_album']) > 1) {
                            $small = '_small';
                        }
                        if (count($wo['story']['photo_album']) > 2) {
                            $class = 'width-3';
                        }
                        $delete  = '';
                        $onhover = '';
                        if (count($wo['story']['photo_album']) == 3) {
                            echo "<div class='wo_adaptive_media'>";
                            foreach ($wo['story']['photo_album'] as $photo) {
                                if ($wo['story']['admin'] === true) {
                                    $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                                    $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                                }
                                echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
                            }
                            echo "</div>";
                        }
                        else if (count($wo['story']['photo_album']) == 4) {
                            echo "<div class='wo_adaptive_media_4'>";
                            foreach ($wo['story']['photo_album'] as $photo) {
                                if ($wo['story']['admin'] === true) {
                                    $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                                    $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                                }
                                echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
                            }
                            echo "</div>";
                        }
                        else if (count($wo['story']['photo_album']) == 5) {
                            echo "<div class='wo_adaptive_media_5'>";
                            foreach ($wo['story']['photo_album'] as $photo) {
                                if ($wo['story']['admin'] === true) {
                                    $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                                    $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                                }
                                echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
                            }
                            echo "</div>";
                        }
                        else if (count($wo['story']['photo_album']) > 3) {
                            foreach (array_slice($wo['story']['photo_album'],0,3) as $key => $photo) {
                                if ($key == 2) {
                                    echo "<div onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");' class='album-collapse pull-left pointer'> 
                                    <img src='".lui_GetMedia($photo['image_org'])."' class='image-file'>
                                    <span>+".count(array_slice($wo['story']['photo_album'],2))."</span>
                                    </div>
                                        "; 
                                }
                                else{
                                    if ($wo['story']['admin'] === true) {
                                        $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                                        $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                                    }
                                    echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file  pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
                                }
                            }
                            foreach (array_slice($wo['story']['photo_album'],3) as $photo) {
                                if ($wo['story']['admin'] === true) {
                                    $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                                    $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                                }
                                echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer hidden' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
                            }
                        }
                        else{
                            foreach ($wo['story']['photo_album'] as $photo) {
                                if ($wo['story']['admin'] === true) {
                                    $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
                                    $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
                                }
                                echo  "<div style='text-align:center;width: 100%;' class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");'></div>";
                            }
                        }
                    } 
                    ?>
                    <?php if ($wo['story']['multi_image'] == 1) {
                        $class = '';
                        $small = '';
                        if (count($wo['story']['photo_multi']) == 2) {
                            $class = 'width-2';
                        }
                        if (count($wo['story']['photo_multi']) > 1) {
                            $small = '_small';
                        }
                        if (count($wo['story']['photo_multi']) > 2) {
                            $class = 'width-3';
                        }
                        if (count($wo['story']['photo_multi']) == 3) {
                            echo "<div class='wo_adaptive_media'>";
                            foreach ($wo['story']['photo_multi'] as $photo) {
                                echo  "<div class='album-image'><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' ></div>";
                            }
                            echo "</div>";
                        }
                        else if (count($wo['story']['photo_multi']) == 4) {
                            echo "<div class='wo_adaptive_media_4'>";
                            foreach ($wo['story']['photo_multi'] as $photo) {
                                echo  "<div class='album-image'><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' ></div>";
                            }
                            echo "</div>";
                        }
                        else if (count($wo['story']['photo_multi']) == 5) {
                            echo "<div class='wo_adaptive_media_5'>";
                            foreach ($wo['story']['photo_multi'] as $photo) {
                                echo  "<div class='album-image'><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' ></div>";
                            }
                            echo "</div>";
                        }
                        else if (count($wo['story']['photo_multi']) > 3) {
                            foreach (array_slice($wo['story']['photo_multi'],0,3) as $key => $photo) {
                                if ($key == 2) {
                                    echo "<div class='album-collapse pointer'> 
                                    <img src='".lui_GetMedia($photo['image_org'])."' class='image-file'>
                                    <span>+".count(array_slice($wo['story']['photo_multi'],2))."</span>
                                    </div>
                                    "; 
                                }
                                else{
                                    echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer' 
                                    >";
                                }
                            }
                            foreach (array_slice($wo['story']['photo_multi'],3) as $photo) {
                                echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer hidden' 
                                >";
                            }
                        }
                        else{
                            foreach ($wo['story']['photo_multi'] as $photo) {
                                echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer' 
                                >";
                            }
                        }
                    }
                    ?>
                    <div class="clear"></div>
                </div>
                <?php
                    if ($wo['story']['poll_id'] == 1) {
                        echo lui_LoadPage('story/entries/options');
                    }
                ?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
    <?php } ?>

<?php } ?>
		
		<footer>
			<p><?php 
					$copy = str_replace('{site_name}', $wo['config']['siteName'], $wo['lang']['copyrights']);
					echo $copy = str_replace('{date}', date('Y'), $copy);
				?></p>
		</footer>
		</div>
	</body>
</html>