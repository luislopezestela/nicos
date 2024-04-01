<?php
$IsOwner       = lui_IsOnwer($wo['user_profile']['user_id']);
$IsOwnerUser   = lui_IsOnwerUser($wo['user_profile']['user_id']);

if ($wo['loggedin'] && $IsOwnerUser) {
   $wo['pr_complition'] = lui_ProfileCompletion();
}
?>
<style type="text/css">
.page-margin{margin-top:0px;margin-bottom:20px;}
.perfil_de_usuario_details{width:100%;max-width:1200px;margin:0 auto auto auto;}
.profile-container{padding-right:15px;padding-left:15px;}
.profile-container .card{border-radius:max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;border-top-left-radius:0px;
    border-top-right-radius:0px;
    box-sizing:border-box;
    margin-bottom:20px;
}
.profile-container .card.hovercard {
    position:relative;
    padding-top:0;
    overflow:hidden;
}
.wo_user_profile .profile-container .card.hovercard {
    overflow:visible;
}
.profile-container .card.hovercard .cardheader {
    background:#fff;
    background-size:cover;
    max-height:333px;
    min-height:333px;
}
.wo_user_profile .profile-container .card.hovercard .cardheader {
    overflow:hidden;
}
.problackback{
    display:block;
    background:linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,.45) 100%);
    padding:100px;
    position:absolute;
    width:100%;bottom:0;left:0;
}
.wo_user_profile .problackback {
    border-radius:8px;
}
.wo_user_profile .pic-info-cont {
    position:relative;
    background-color:#fff;
    width:100%;
    height:180px;
    bottom:0;
    display:block;
    margin:0;
    text-align:center;
}
.wo_user_profile .pic-info-cont .user-avatar {
    position:relative;
    width:140px;
    height:140px;
    bottom:0;z-index: 1;
    margin:-65px auto 0;
    display:inline-block;
    top:-15px;
}
.user-avatar-uploading-container {
    background-color:rgba(0,0,0,.5);
    height:100%;
    width:100%;
    position:absolute;
    display:none;
    border-radius:50%;
}
.user-avatar-uploading-progress {
    color: #fff;
    font-size: 30px;
    text-align: center;
    width: 100%;
    position: absolute;
    display: none;
}
.user-avatar-uploading-progress .ball-pulse {
    display: block;
    margin: 60px auto;
    float: none;
    line-height: 0;
}
.user-avatar-uploading-progress .ball-pulse>div {
    background-color: #dcdcdc;
}
.ball-pulse>div {
    background-color: #3a3c3f;
    border-radius: 100%;
    margin: 0 1px;
    display: inline-block;
    width: 8px;
    height: 8px;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both;
}
.ball-pulse>div:nth-child(1) {
    -webkit-animation: scale-pulse .75s -.24s infinite cubic-bezier(.2,.68,.18,1.08);
    animation: scale-pulse .75s -.24s infinite cubic-bezier(.2,.68,.18,1.08);
}
.ball-pulse>div:nth-child(2) {
    -webkit-animation: scale-pulse .75s -.15s infinite cubic-bezier(.2,.68,.18,1.08);
    animation: scale-pulse .75s -.15s infinite cubic-bezier(.2,.68,.18,1.08);
}
.ball-pulse>div:nth-child(3) {
    -webkit-animation: scale-pulse .75s -.11s infinite cubic-bezier(.2,.68,.18,1.08);
    animation: scale-pulse .75s -.11s infinite cubic-bezier(.2,.68,.18,1.08);
}
.wo_user_profile .pic-info-cont .user-avatar img {
    width: 100%!important;
    height:auto;
    margin-right:auto;
    box-shadow: 0 2px 10px rgba(0,0,0,.15);
    border-radius: 50%;
}
.profile-avatar-changer {
    position: absolute;
    bottom: 0;
    text-align: center;
    left: 0;
    right: 0;
    display: none;
}
.wo_profile_pic_hover{
    top: 0;
    border-radius: 50%;
}
.wo_profile_pic_hover .profile_avatar {
    background: rgb(0 0 0 / 20%);
    border-radius: 50%;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: space-around;
}
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-upload-image {
    background-color: transparent;
    opacity: 1;
    color: #fff;
    transition: all .2s;
    text-shadow: #555 0 0 1px;
    padding: 5px;
    cursor:pointer;
}
.wo_profile_pic_hover .profile_avatar .btn-file {
    border: 0;
    background: rgb(0 0 0 / 80%);
    border-radius: 50%;
    line-height: 1;
    padding: 8px;
}
.wo_profile_pic_hover .profile_avatar .btn-file svg {
	vertical-align: middle;
    margin: 0;
    width: 20px;
    height: 20px;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    text-align: right;
    opacity: 0;
    outline: 0;
    background: #fff;
    cursor: inherit;
    display: block;
}
.profile-container .card.hovercard .info .title {
    left:0;
    position:relative;
    width: 100%;
    z-index: 1;
    text-shadow: none;
    line-height: 1;
    color: #fff;
    vertical-align: middle;
    font-size: 26px;
    margin-top:0;
    top:0;
}
.profile-container .card.hovercard .info .title a {
    color: #4a4a4a;
}
.wo_user_profile .card.hovercard .info .options-buttons {
    position: relative;
    margin: 10px 10px 5px;
    z-index: auto;
}
.wo_user_profile .options-buttons a{
    margin: 0;
    float: none;
    line-height: 1.42857143;
    white-space: nowrap;vertical-align: middle;
}
.wo_user_profile .btn-glossy > a{
    border-radius: max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px !important;
    border: 0!important;
    box-shadow: none!important;
    font-size: 15px!important;
    padding: 6px 15px!important;
    height: 33px;
    margin-right: 3px;
    display:inline-block;
}
.wo_user_profile .btn-glossy > a:not(.btn-main){
    color: var(--boton-color);
    background: var(--boton-fondo);
    transition: all .5s;
}
.contenedor_information_users_layshane {
    display: block;
    background-color: #fafafa;
    margin: 15px;
    position: relative;
}
.status_user_layshane {
    width: 100%;
    position: absolute;
    display: flex;
    justify-content: center;
    max-width: 100%;
}
.status_user_layshane .online-contenido_perfil .online-text {
    color: #fafafa;
    padding: 2px 10px;
    background: #4caf50;
    border-radius: 0 0 10px 10px;
    pointer-events: none;
    user-select: none;
}
.wow_content{
    padding-bottom: 6px;
    border-radius:max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;
    padding:15px 15px 1px;
    width: 100%;
}
.wo_page_hdng {
    padding: 10px 15px;
    border-bottom: 1px solid #eee;
}
.right_user_info .wo_page_hdng {
    margin-bottom: 7px;
}
.wo_page_hdng_innr {
    display: flex;
    align-items: center;
    font-size: 16px;
    color: #050505;
    font-weight: 600;
    line-height: 16px;
}
.right_user_info li {
	position:relative;
	word-break:break-word;
	display:block;
    padding: 4px 13px;
    color: #1d2129;
    font-size: 14px;
}
.wow_content p{
	padding:4px 13px;
}
</style>
<div class="page-margin profile wo_user_profile perfil_de_usuario_details" data-page="timeline" data-id="<?php echo $wo['user_profile']['user_id'];?>">
	<div class="profile-container">
		<div class="card hovercard" style="margin-bottom: 0px;">
			<div class="cardheader user-cover"></div>
			<div class="pic-info-cont">
                <div class="user-avatar flip <?php if ($wo['have_stories'] == true && $wo['story_seen_class'] != 'seen_story' && $wo['loggedin'] == true) { ?><?php echo($wo['story_seen_class']); ?><?php } ?>">
                	<div class="user-avatar-uploading-container">
                        <div class="user-avatar-uploading-progress">
                            <div class="ball-pulse"><div></div><div></div><div></div></div>
                        </div>
                    </div>
                    <img id="updateImage-<?php echo $wo['user_profile']['user_id']?>" class="pointer <?php if ($wo['have_stories'] == true && $wo['story_seen_class'] != 'seen_story' && $wo['loggedin'] == true) { ?><?php echo($wo['story_seen_class']); ?> see_all_stories<?php } ?>" alt="<?php echo $wo['user_profile']['name']?>" src="<?php echo $wo['user_profile']['avatar']?>" <?php if ($wo['have_stories'] == true && $wo['story_seen_class'] != 'seen_story' && $wo['loggedin'] == true) { ?> data_story_user_id="<?php echo $wo['user_profile']['user_id']?>"  data_story_type="user" <?php } else{ ?> onclick="Wo_OpenProfilePicture('<?php echo $wo['user_profile']['avatar_org']?>');" <?php } ?> />

                    <?php if($IsOwner === true) { ?>
						<form action="#" method="post" class="profile-avatar-changer wo_profile_pic_hover">
							<div class="profile_avatar">
								<span class="btn btn-upload-image btn-file">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z" /></svg>
									<input type="file" name="avatar" accept="image/x-png, image/jpeg" onchange="Wo_UpdateProfileAvatar();">
								</span>
								<?php if ($wo['user_profile']['avatar_org'] != $wo['userDefaultAvatar'] && $wo['user_profile']['avatar_org'] != $wo['userDefaultFAvatar']) {?>
									<span class="btn btn-upload-image btn-file" onclick="OpenCropModal()">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M7,17V1H5V5H1V7H5V17A2,2 0 0,0 7,19H17V23H19V19H23V17M17,15H19V7C19,5.89 18.1,5 17,5H9V7H17V15Z" /></svg>
									</span>
								<?php } ?>
							</div>
							<input type="hidden" name="user_id" id="user-id" value="<?php echo $wo['user_profile']['user_id'];?>">
						</form>
                    <?php } ?>
                </div>
                <div class="info">
                    <div class="title">
                        <a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username'];?>">
                        <?php echo $wo['user_profile']['name']; ?>
                        </a>

						<?php if ($wo['user_profile']['banned'] != 1) { ?>
							<?php if($wo['user_profile']['verified'] == 1) {   ?>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="verified-color feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"></path></svg>
							<?php } ?>

							<?php if (lui_IsUserPro($wo['user_profile']['is_pro']) === true) {
							$user_pro_type = lui_GetUserProType($wo['user_profile']['pro_type']);
							?>
							<span class="badge-pro" style="background-color:<?php echo $user_pro_type['color_name'];?>">
								<a class="badge-link" href="<?php echo lui_SeoLink('index.php?link1=go-pro');?>" title="<?php echo $user_pro_type['type_name'];?>" data-toggle="tooltip">PRO</a>
							</span>
							<?php } ?>
						<?php } else { ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather" ><path fill="red" d="M10 4A4 4 0 0 0 6 8A4 4 0 0 0 10 12A4 4 0 0 0 14 8A4 4 0 0 0 10 4M17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13M10 14C5.58 14 2 15.79 2 18V20H11.5A6.5 6.5 0 0 1 11 17.5A6.5 6.5 0 0 1 11.95 14.14C11.32 14.06 10.68 14 10 14M17.5 14.5C19.16 14.5 20.5 15.84 20.5 17.5C20.5 18.06 20.35 18.58 20.08 19L16 14.92C16.42 14.65 16.94 14.5 17.5 14.5M14.92 16L19 20.08C18.58 20.35 18.06 20.5 17.5 20.5C15.84 20.5 14.5 19.16 14.5 17.5C14.5 16.94 14.65 16.42 14.92 16Z"></path></svg>
						<?php } ?>
                    </div>
                    <?php if ($wo['user_profile']['banned'] != 1) { ?>
                    <div class="options-buttons">
						<?php if($IsOwnerUser === true) { ?>
							<span class="btn-glossy">
								<a class="btn btn-default" href="<?php echo lui_SeoLink('index.php?link1=setting&user=' . $wo['user_profile']['username'] . '&page=general-setting') ?>" data-ajax="?link1=setting&user=<?php echo $wo['user_profile']['username'] . '&page=general-setting'; ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg>
									<?php echo $wo['lang']['edit'];?>
								</a>
							</span>
						<?php } else { ?>
						<?php if($wo['loggedin'] == true && $IsOwner) { ?>
						<div class="dropdown btn-glossy">
							<button class="btn btn-default wo_user_folw_empty_btns dropdown-toggle" type="button" id="user-dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
							</button>
							<ul class="dropdown-menu dropdown-menu-right detail" aria-labelledby="user-dropdownMenu">
								<?php if($wo['loggedin'] == true && $IsOwner) { ?>
									<li id="open_add_to_family_modal">
										<a class="menu-item" href="<?php echo lui_SeoLink('index.php?link1=setting&user=' . $wo['user_profile']['username'] . '&page=general-setting') ?>">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.7,13.35L20.7,14.35L18.65,12.3L19.65,11.3C19.86,11.09 20.21,11.09 20.42,11.3L21.7,12.58C21.91,12.79 21.91,13.14 21.7,13.35M12,18.94L18.06,12.88L20.11,14.93L14.06,21H12V18.94M12,14C7.58,14 4,15.79 4,18V20H10V18.11L14,14.11C13.34,14.03 12.67,14 12,14M12,4A4,4 0 0,0 8,8A4,4 0 0,0 12,12A4,4 0 0,0 16,8A4,4 0 0,0 12,4Z" /></svg>
											&nbsp;&nbsp;&nbsp;
											<div>
												<b><?php echo $wo['lang']['edit'];?></b>
												<p><?php echo $wo['lang']['edit_tx'];?></p>
											</div>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>
						<?php } ?>
						<?php } ?>
                    </div>
                    <?php } ?>
                </div>
			</div>
		</div>
	</div>
    <?php if ($wo['user_profile']['banned'] != 1) { ?>
		

	<div class="contenedor_information_users_layshane">
		<?php if($wo['config']['user_lastseen'] == 1 && $wo['user_profile']['showlastseen'] != 0 && $wo['loggedin'] == true) {  ?>
            <div class="status_user_layshane">
            	<div class="online-contenido_perfil">
                	<?php echo lui_UserStatus($wo['user_profile']['user_id'], $wo['user_profile']['lastseen'], 'profile') ?>
                </div>
            </div>
        <?php } ?>
		<br>
        <?php if($wo['loggedin'] == true && $wo['config']['gift_system'] != 0) {  ?>
            <?php if ($IsOwnerUser == false) { ?>
            <span class="btn btn-md main send_gift_btn" onclick="Wo_open_send_gift();">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 504.124 504.124" style="enable-background:new 0 0 504.124 504.124;" xml:space="preserve"> <path style="fill:#DB5449;" d="M15.754,133.909l236.308,118.154L488.37,133.909v252.062L252.062,504.123L15.754,385.969V133.909z"/> <path style="fill:#C54B42;" d="M15.754,157.538v73.649l235.52,115.397l237.095-115.791v-73.255L252.062,273.33L15.754,157.538z"/> <path style="fill:#D05045;" d="M252.062,504.123V252.063L31.508,141.786H15.754v244.185L252.062,504.123z"/> <path style="fill:#BB483E;" d="M15.754,157.538v73.649l235.52,115.397l0.788-0.394v-73.255v0.394L15.754,157.538z"/> <path style="fill:#EB6258;" d="M0,125.638L252.062,0.001l252.062,125.637v16.542L252.062,267.815L0,142.573V125.638z"/> <path style="fill:#EFEFEF;" d="M396.603,39.779c-8.271-14.966-25.994-24.025-46.868-24.025c-47.655,0-81.132,44.505-97.674,72.862 c-16.542-28.357-50.412-72.468-97.674-72.468c-30.326,0-51.988,18.511-51.988,43.717c0,44.898,49.231,74.043,148.086,74.043 s151.237-37.415,151.237-73.649C401.723,53.17,400.148,46.081,396.603,39.779z M164.628,88.223 c-11.028-7.483-14.966-15.754-14.966-21.268c0-6.695,6.302-11.815,15.36-11.815c21.268,0,38.203,27.963,47.655,47.262 C187.865,100.432,173.292,93.736,164.628,88.223z M339.495,88.223c-8.665,5.514-23.237,12.209-48.049,14.178 c9.058-19.298,25.994-47.262,47.655-47.262c9.058,0,15.36,5.12,15.36,11.815C354.462,72.469,350.523,80.739,339.495,88.223z"/> <path style="fill:#E2574C;" d="M0,126.032l252.062,123.274l252.062-123.274v81.526l-252.85,123.274L0,207.558V126.032z"/> <path style="fill:#EFEFEF;" d="M346.585,213.859v-9.058l-94.523-51.2l-94.523,51.2v9.058L94.524,186.29v-12.603l154.387-81.526 l3.151,1.575l3.151-1.575L409.6,173.293v12.603L346.585,213.859z"/> <path style="fill:#DCDCDC;" d="M346.585,204.801v251.668l63.015-31.508V173.293L346.585,204.801z"/> <path style="fill:#D1D1D1;" d="M94.523,425.354l63.015,31.508V205.195l-63.015-31.902C94.523,173.292,94.523,425.354,94.523,425.354 z"/> </svg> <?php echo $wo['lang']['send_a_gift']; ?>
            </span>
            <?php } ?>
        <?php } ?>

        <ul class="page-margin wow_content negg_padd list-unstyled event-options-list right_user_info wo_prof_side_info_padd mt-0">
            <div class="wo_page_hdng">
				<div class="wo_page_hdng_innr">
					<?php echo $wo['lang']['info']; ?>
				</div>
			</div>

            <li class="list-group-item">
                <?php
                $gender = ucfirst(strtolower($wo['user_profile']['gender']));
                if (in_array($wo['user_profile']['gender'], array_keys($wo['genders']))) {
                	echo $wo['genders'][$wo['user_profile']['gender']];
                }
                else{
                	echo $wo['genders'][array_keys($wo['genders'])[0]];
                }
                ?>
            </li>
        </ul>

        <?php if(!empty($wo['user_profile']['about'])) {  ?>
			<div class="page-margin wow_content">
				<div class="wo_page_hdng pag_neg_padd">
					<div class="wo_page_hdng_innr">
						<?php echo $wo['lang']['about_me']; ?>
					</div>
				</div>
				<p class="page-margin"><?php echo $wo['user_profile']['about']; ?></p>
			</div>
        <?php } ?>

        <?php
            $sidebar_ad = lui_GetAd('sidebar', false);
            if (!empty($sidebar_ad)) {?>
        <ul class="list-group sidebar-ad">
            <?php echo $sidebar_ad; ?>
        </ul>
        <?php } ?>
    </div>
    <?php }else{ ?>
    	<div class="col-sm-12">
			<div class="list-group wo_profile_banned_user">
				<img src="<?php echo $wo['config']['theme_url'];?>/img/banned.png">&nbsp;&nbsp;&nbsp;
				<div>
					<p><?php echo $wo['lang']['user_profile_banned']; ?></p>
					<a href="<?php echo $wo['config']['site_url']; ?>" class="btn btn-main btn-mat"><?php echo $wo['lang']['home']; ?></a>
				</div>
			</div>
		</div>
    <?php } ?>
</div>
<?php echo lui_LoadPage('modals/profile-picture');?>

<!-- JS Timline functions -->
<?php if ($wo['loggedin']): ?>
<div class="modal fade" id="send_gift" role="dialog">
	<div class="modal-dialog wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
                    <?php echo $wo['lang']['send_a_gift']; ?>
				</h4>
			</div>
			<div class="modal-body">
                <div id="gifts-list" class="wo_send_gift">
                    <?php foreach (lui_GetAllGifts(500000) as $wo['giftlist']) {?>
                        <div class="text-center gift-data" data-gift-id="<?php echo $wo['giftlist']['id'];?>">
                            <label>
                                <input type="radio" onClick="$('#send-gift-button').attr('data-gift-id',$(this).val());$('#send-gift-button').attr('data-gift-img','<?php echo $wo['giftlist']['media_file'];?>');$('#send-gift-button').attr('disabled',false);" name="gift" value="<?php echo $wo['giftlist']['id'];?>" />
                                <img src="<?php echo lui_GetMedia($wo['giftlist']['media_file']); ?>" alt="<?php echo $wo['giftlist']['name'];?> gift">
                            </label>
                        </div>
                    <?php } ?>
                </div>
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button type="button" class="btn  btn-main" id="send-gift-button" data-gift-id="" data-gift-img="" onclick="Wo_SendGiftToUser(<?php echo $wo['user']['id']; ?>,<?php echo $wo['user_profile']['id']; ?>,this)" disabled><?php echo $wo['lang']['send']; ?></button>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<div class="modal fade" id="report_profile" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
					<?php echo $wo['lang']['report_user']; ?>
				</h4>
			</div>
			<div class="modal-body">
				<textarea name="user-resd" class="form-control" placeholder="Type text" dir="auto" rows="4" id="report-user-text-<?php echo $wo['user_profile']['id']; ?>"></textarea>
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button type="button" class="btn  btn-main" id="report-user-button" onclick="Wo_ReportProfile(<?php echo $wo['user_profile']['id']; ?>,true)"><?php echo $wo['lang']['send']; ?></button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="cropImage" role="dialog">
	<div class="modal-dialog wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['crop_your_avatar'] ?></h4>
			</div>
			<div class="modal-body">
				<div id="image-to-crop" class="wo_crop_img_pic">
					<img src="<?php echo lui_GetMedia($wo['user_profile']['avatar_full'])?>" alt="foto" data-image="<?php echo $wo['user_profile']['avatar_full']; ?>" >
				</div>
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button type="button" class="btn btn-main btn-mat" onclick="CropImage();"><?php echo $wo['lang']['save']; ?></button>
			</div>
		</div>
	</div>
</div>
<?php if ( $wo['loggedin'] ): ?>
    <?php if ( isset( $_GET['mode'] ) && $_GET['mode'] == 'opengift' ): ?>
        <div class="modal fade" id="gift_show_model" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
                        <h4 class="modal-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
                        <?php echo $wo['user_profile']['name'] . " " . $wo['lang']['send_gift_to_you'] ?></h4>
                    </div>
                    <div class="modal-body">
                        <img src="<?php echo lui_GetMedia($_GET['gift_img']);?>" style="max-width: 100%;margin: 0 auto;display: block;">
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<style>
	.post-youtube iframe {
		height: 362px !important;
	}
</style>
<?php
	if ($wo['loggedin'] == true) {
		echo lui_LoadPage('modals/report-user');
	}
?>
<script>
function Wo_OpenReportBox() {
	$('#report-user-modal').modal({
  	  show: true
    });
}
function Wo_UnreportReportUser() {
	$.post(Wo_Ajax_Requests_File() + '?f=reports&s=unreport_user', {
	    user: <?php echo $wo['user_profile']['user_id'];?>
	}, function (data) {
	    if(data.status == 200) {
	    	$("#error_post").modal('show');
    		$('#error_post_text').text(data.message);
	        setTimeout(function () {
	            $("#error_post").modal('hide');
	            location.reload();
	        },3000);
	    }
	});
}
$(function(){
    var url = window.location.pathname,
        urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
        // now grab every link from the navigation
        $('.user-bottom-nav a').each(function(){
            // and test its normalized href against the url pathname regexp
            if(urlRegExp.test(this.href.replace(/\/$/,''))){
                $(this).addClass('menuactive');
            }
        });
    <?php if ($wo['nodejs_send_notification'] == true) { ?>
    	if (node_socket_flow == "1") {
    		socket.emit("user_notification", { to_id: $('.wo_user_profile').attr('data-id'), user_id: _getCookie("user_id")});
    	}
    <?php } ?>
});

function Wo_open_send_gift(){
    $('#send_gift').modal('show');
}

function Wo_SendGiftToUser(from, to){
    var gift_id = $('#send-gift-button').attr('data-gift-id');
    var gift_img = $('#send-gift-button').attr('data-gift-img');

    if (!from || !to || !gift_id) {
        return false;
    }

    $('#send-gift-button').attr('disabled','');
	$('#send_gift').find('.ball-pulse').fadeIn(100);

    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'send_gift',from:from,to:to,gift_id:gift_id,gift_img:gift_img},
    })
    .done(function(data) {
        if (data.status == 200) {
        	if (node_socket_flow == "1") {
        		socket.emit("user_notification", { to_id: to, user_id: _getCookie("user_id")});
        	}
            $('#send-gift-button').html('<?php echo $wo['lang']['gift_sent_succesfully']; ?>');
			$('#send_gift').find('.ball-pulse').fadeOut(100);
            Wo_Delay(function(){
                $("#send_gift").modal('hide');
                $('#send-gift-button').attr('data-gift-id', '').attr('data-gift-img', '').attr('disabled',false).html('<?php echo $wo['lang']['send']; ?>');
            },1500);
        }
    })
    .fail(function() {
        console.log("error");
    })

}

function Wo_RegisterPoke(received_user_id , send_user_id){
    if (!received_user_id || !send_user_id) {
        return false;
    }
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'poke',received_user_id:received_user_id,send_user_id:send_user_id},
    })
    .done(function(data) {
        if (data.status == 200) {
        	if (node_socket_flow == "1") {
        		socket.emit("user_notification", { to_id: received_user_id, user_id: _getCookie("user_id")});
        	}
            $("#poke_modal").modal('show');
            $("#pokebutton").remove();
            Wo_Delay(function(){
                $("#poke_modal").modal('hide');
            },1500);
        }
    })
    .fail(function() {
        console.log("error");
    })
}

function Wo_ActivateFamilyMember(id = false,self = false,member = false){
    if (!id || !self || !member) {
        return false;
    }
    Wo_progressIconLoader($(self).find('i'));
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'family',s:'accept_member',id:id,type:member},
    })
    .done(function(data) {
        if (data.status == 200) {
            $("#accept_family_mbr_modal").modal('show');
            $('[data-family-member="'+id+'"]').slideUp(function(){
                    $(this).remove();
            })
            Wo_Delay(function(){
                $("#accept_family_mbr_modal").modal('hide');
            },1500);
        }
    })
    .fail(function() {
        console.log("error");
    })
    Wo_progressIconLoader($(self).find('i'));
}

function Wo_AcceptRelationRequest(id = false,member = false,type = false ,self = false){
    if (!member || !self || !type || !id) {
        return false;
    }
    Wo_progressIconLoader($(self));
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'family',s:'accept_relation',id:id,type:type,member:member},
    })
    .done(function(data) {
        if (data.status == 200) {
            window.location = data.url;
        }
    })
    .fail(function() {
        console.log("error");
    })
}

function Wo_DeleteRelationRequest(id = false,user = false,type = false,self = false){
    if (!self || !id || !user || !type) {
        return false;
    }
    Wo_progressIconLoader($(self).find('i'));
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'family',s:'delete_relation',id:id,user:user,type:type},
    })
    .done(function(data) {
        if (data.status == 200) {
            $("[data-relationship-request='"+id+"']").slideUp(function(){
                $(this).remove();
            })
        }
    })
    .fail(function() {
        console.log("error");
    })
    Wo_progressIconLoader($(self).find('i'));
}

function OpenCropModal() {
	$('#cropImage').modal('show');
	setTimeout(function () {
    	$('#image-to-crop img').rcrop({
            minSize : [130,130],
            preserveAspectRatio : true,
            grid : true,
        });
    }, 250);
}
function CropImage() {
    values = $('#image-to-crop img').rcrop('getValues');
    $path = $('#image-to-crop img').attr('data-image');
    if (!$path) {
    	return false;
    	$('#cropImage').modal('hide');
    }
    $('#cropImage').find('.ball-pulse').fadeIn(100);
    $.post(Wo_Ajax_Requests_File() + '?f=crop-avatar', {user_id:<?php echo $wo['user_profile']['id']; ?>, path: $path, x: values.x, y:values.y, height: values.height, width:values.width}, function(data, textStatus, xhr) {
        if (data.status == 200) {
        	location.reload(false);
        } else {
        	$('#cropImage').modal('hide');
        }
        $('#cropImage').find('.ball-pulse').fadeOut(100);
    });
}
function Wo_DeleteFamilyMember(id = false){
    if (!id) {
        return false;
    }
    $('#delete_family_mbr_modal').find('.modal-footer .ball-pulse').fadeIn(100);
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'family',s:'delete_member',id:id},
    })
    .done(function(data) {
        if (data.status == 200) {
            $('[data-family-member="'+id+'"]').slideUp('slow',function(){
                    $(this).remove();
            })
            Wo_Delay(function(){
                $("#delete_family_mbr_modal").modal('hide');
            },1500);
        }
        $('#delete_family_mbr_modal').find('.modal-footer .ball-pulse').fadeOut(100);
    })
    .fail(function() {
        console.log("error");
    })
}
function SelectFamilyList(id) {
	$("#family_list").val(id);
}
function Wo_AddFamilyMember(){
    var member_type = $("#family_list").val();
    if (!member_type || member_type < 1 || member_type > 43) {
        return false;
    }
    $('#add_to_family').find('.modal-footer .ball-pulse').fadeIn(100);
    $('#add_to_family').find('.btn-main').attr('disabled', 'true');
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {
            f: 'family',
            s:'add_member',
            member_id:'<?php echo $wo['user_profile']['user_id']; ?>',
            type:member_type
        },
    })
    .done(function(data) {
        if (data.status == 200) {
            $('.add_to_family_alert').html('<div class="alert alert-success">' + data.message + '</div>');
            Wo_Delay(function(){
                $("#open_add_to_family_modal").slideUp(function(){
                    $(this).remove();
                    $("#add_to_family").modal('hide');
                })
                $('#add_to_family').find('btn-main').removeAttr('disabled');
                location.reload()
            },1500);

        }
        else{
            $('.add_to_family_alert').html('<div class="alert alert-success">' + data.message + '</div>');
            $('#add_to_family').find('.btn-main').removeAttr('disabled');
        }
        $('#add_to_family').find('.modal-footer .ball-pulse').fadeOut(100);
    })
    .fail(function() {
        console.log("error");
    })
}

function Wo_ReportProfile(id = false,report = true){
    var report_text = $("#report-user-text-<?php echo $wo['user_profile']['id']; ?>").val();
    if (!id) {return false;}
    else if(report == true){
      if (!report_text) {return false;}
    }
    $('#report_profile').find('.modal-footer .ball-pulse').fadeIn(100);
    $.ajax({
        url: Wo_Ajax_Requests_File() + '?f=reports&s=report_user',
        type: 'POST',
        dataType: 'json',
        data: {text:report_text,user:id},
    })
    .done(function(data) {
        if(data.status == 200 && data.code == 0){
            $('#report_status').replaceWith('\
                <li id="report_status" onclick="$(\'#report_profile\').modal(\'show\');">\
                    <a class="menu-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13 14H11V9H13M13 18H11V16H13M1 21H23L12 2L1 21Z" /></svg>\
                    <?php echo $wo['lang']['report_user']; ?></a>\
                </li>');
        }

        else if (data.status == 200 && data.code == 1) {
            $("#report-user-text-<?php echo $wo['user_profile']['id']; ?>").val('');
            $("#report_profile").modal('hide');
            $('#report_status').replaceWith('\
                <li id="report_status" onclick="Wo_ReportProfile(<?php echo $wo['user_profile']['id']; ?>,false);">\
                    <a class="menu-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13 14H11V9H13M13 18H11V16H13M1 21H23L12 2L1 21Z" /></svg>\
                    <?php echo $wo['lang']['unreport']; ?></a>\
                </li>');
        }
        $('#report_profile').find('.modal-footer .ball-pulse').fadeOut(100);
    })
    .fail(function() {
        console.log("error");
    })
}

function loadposts(user_id) {
  $.get(Wo_Ajax_Requests_File() + '?f=load_profile_posts', {user_id:user_id}, function(data) {
    $('.posts_load').html(data);
  });
}

var user_id = $('.profile').attr('data-id');
$(function () {
  user_id = $('.profile').attr('data-id');
  <?php
  if (!empty($_GET['story'])) {
    ?>
    Wo_LoadStory('prof', $('[data-page=timeline]').attr('data-id'));
    <?php
  }
  ?>
  if($(window).width() > 600) {
    $(".user-avatar").hover(function () {
      $('.profile-avatar-changer').fadeIn(100);
    }, function () {
      $('.profile-avatar-changer').fadeOut(100);
    });
  }
  if($(window).width() > 600) {
    $(".user-cover").hover(function () {
      $('.profile-cover-changer').fadeIn(100);
    }, function () {
      $('.profile-cover-changer').fadeOut(100);
    });
  }

  $('form.profile-avatar-changer').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_user_avatar_picture',

    beforeSend: function () {
      $('.profile_avatar').fadeOut(100);
      $('.user-avatar-uploading-container, .user-avatar-uploading-progress').fadeIn(200);
    },
    success: function (data) {
      $('.profile_avatar').fadeIn(100);
      if(data.status == 200) {
        Wo_GetNewPosts();
        $('[id^=updateImage-<?php echo $wo['user_profile']['id']; ?>]').attr('data-target', '#ProfileImageModal-Stopped');
        $('[id^=updateImage-<?php echo $wo['user_profile']['id']; ?>]').attr('onclick', 'Wo_OpenProfilePicture("' + data.img_or + '");');
        $('[id^=updateImage-<?php echo $wo['user_profile']['id']; ?>]').attr("src", data.img);
        $('#cropImage').modal('show');
         <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
            socket.emit("on_avatar_changed", {from_id: _getCookie("user_id"), name: data.img});
          <?php } ?>
        $('#image-to-crop img').attr('src', data.avatar_full);
        $('#image-to-crop img').attr('data-image', data.avatar_full_or);
        $('#image-to-crop img').on("load", function() {
		    setTimeout(function () {
		    	$('#image-to-crop img').rcrop({
		            minSize : [100,100],
		            preserveAspectRatio : true,
		            grid : true
		        });
		    }, 1000);
		}).each(function() {
		  if(this.complete) $(this).load();
		});
        if($("ul[data-profile-completion]").length == 1) {
            if ($('#add-profile-avatar').length == 1) {
               // window.location.reload();
            }
        }
      }
      else{
      	if(data.invalid_file == 3){
          $("#adult_image_file").modal('show');
          Wo_Delay(function(){
            $("#adult_image_file").modal('hide');
          },3000);
        }
      }

      $('.user-avatar-uploading-container,.user-avatar-uploading-progress').fadeOut(200);
    }
  });

  $('form.cover-position-form').ajaxForm({
        url:  Wo_Ajax_Requests_File() + '?f=re_cover',
        dataType:  'json',
        beforeSend: function() {
            $('.user-reposition-dragable-container').hide();
            $('.user-repositioning-icons-container1').show();
            $('.user-repositioning-icons-container').html('<div class="pace-activity-parent"><div class="pace-activity"></div></div>').fadeIn('fast');
        },
        success: function(data) {
            if (data.status == 200) {
                $('.user-cover-reposition-w img').attr('src', data.url + '?time=' + Math.random()).on("load", function () {
                    $('.when-edit').hide();
                    $('.when-notedit').show();
                    $('.user-repositioning-icons-container1').fadeOut('fast');
                    $('.user-repositioning-icons-container').fadeOut('fast').html('');
                    $('.user-cover-reposition-w').show();
                    $('.user-reposition-container').hide().find('img').css('top', 0);
                    $('.cover-resize-buttons').hide();
                    $('.default-buttons').show();
                    $('input.cover-position').val(0);
					$('.wo_user_profile .card.hovercard .pic-info-cont, .problackback').fadeIn();
                    // /$('.user-reposition-container img').draggable('destroy').css('cursor','default');

                });
            }
        }
    });
  $('.profile-cover-changer').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_user_cover_picture',

    beforeSend: function () {
      $('.profile_cover').fadeOut(100);
      $('.user-cover-uploading-container,.user-cover-uploading-progress').fadeIn(200);
    },
    success: function (data) {
      $('.profile_cover').fadeIn(100);
      if(data.status == 200) {
        Wo_GetNewPosts();
        $('[id^=cover-image]').attr('data-target', '#ProfileCoverImageModal-Stopped');
        $('[id^=cover-image]').attr('onclick', 'Wo_OpenProfileCover("' + data.cover_or + '");');
        $('[id^=cover-image]').attr("src", data.img);
        $('#full-image').attr("src", data.cover_full);
        $('#full-input-image').val(data.cover_full);
        $('#cover-input-image').val(data.cover_or);
        Wo_StartRepositioner();

      }
      else{
      	if(data.invalid_file == 3){
          $("#adult_image_file").modal('show');
          Wo_Delay(function(){
            $("#adult_image_file").modal('hide');
          },3000);
        }
      }
      $('.user-cover-uploading-container,.user-cover-uploading-progress').fadeOut(200);
    }
  });
});

function Wo_GetFollowing(user_id) {
  Wo_progressIconLoader($('#sidebar-following-list-container').find('span'));
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_following_users',
    user_id: user_id
  }, function (data) {
    if(data.status == 200) {
      $('.sidebar-following-users-container').html(data.html);
    }
    Wo_progressIconLoader($('#sidebar-following-list-container').find('span'));
  });
}

function Wo_GetFollowers(user_id) {
  Wo_progressIconLoader($('#sidebar-followers-list-container').find('span'));
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_followers_users',
    user_id: user_id
  }, function (data) {
    if(data.status == 200) {
      $('.sidebar-followers-users-container').html(data.html);
    }
    Wo_progressIconLoader($('#sidebar-followers-list-container').find('span'));
  });
}

function Wo_GetLikes(user_id) {
  Wo_progressIconLoader($('#sidebar-pages-list-container').find('span'));
  $.get(Wo_Ajax_Requests_File(), {
    f: 'pages',
    s: 'get_likes',
    user_id: user_id
  }, function (data) {
    if(data.status == 200) {
      $('.sidebar-likes-container').html(data.html);
    }
    Wo_progressIconLoader($('#sidebar-pages-list-container').find('span'));
  });
}

function Wo_GetMoreFollowing(user_id) {
  Wo_progressIconLoader($('.load-more').find('button'));
  after_last_id = $('.user-data:last').attr('data-user-id');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_more_following',
    user_id: user_id,
    after_last_id: after_last_id
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        $('.load-more').find('button').text("<?php echo $wo['lang']['no_more_users_to_show']; ?>");
      } else {
        $('#following-list').append(data.html);
      }
    }
    Wo_progressIconLoader($('.load-more').find('button'));
  });
}

function Wo_GetMoreUserLikes(user_id) {
  Wo_progressIconLoader($('.load-more').find('button'));
  after_last_id = $('.user-data:last').attr('data-page-id');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'pages',
    s: 'get_more_likes',
    user_id: user_id,
    after_last_id: after_last_id
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        $('.load-more').find('button').text("<?php echo $wo['lang']['no_more_pages']; ?>");
      } else {
        $('#likes-list').append(data.html);
      }
    }
    Wo_progressIconLoader($('.load-more').find('button'));
  });
}

function Wo_GetMoreVideos(user_id) {
  Wo_progressIconLoader($('.load-more').find('button'));
  after_last_id = $('.video-data:last').attr('data-video-id');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_more_videos',
    user_id: user_id,
    after_last_id: after_last_id
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        $('.load-more').find('button').text("<?php echo $wo['lang']['no_more_videos_to_show']; ?>");
      } else {
        $('#videos-list').append(data.html);
      }
    }
    Wo_progressIconLoader($('.load-more').find('button'));
  });
}

function Wo_GetMorePhotos(user_id) {
  Wo_progressIconLoader($('.load-more').find('button'));
  after_last_id = $('.profile-lists .photo-data:last').attr('data-photo-id');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_more_photos',
    user_id: user_id,
    after_last_id: after_last_id
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        $('.load-more').find('button').text("<?php echo $wo['lang']['no_more_photos_to_show']; ?>");
      } else {
        $('#photos-list').append(data.html);
      }
    }
    Wo_progressIconLoader($('.load-more').find('button'));
  });
}

function Wo_GetMoreFollowers(user_id) {
  Wo_progressIconLoader($('.load-more').find('button'));
  after_last_id = $('.user-data:last').attr('data-user-id');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'get_more_followers',
    user_id: user_id,
    after_last_id: after_last_id
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        $('.load-more').find('button').text("<?php echo $wo['lang']['no_more_users_to_show']; ?>");
      } else {
        $('#followers-list').append(data.html);
      }
    }
    Wo_progressIconLoader($('.load-more').find('button'));
  });
}

function Wo_UpdateProfileAvatar() {
  $("form.profile-avatar-changer").submit();
}

function Wo_UpdateProfileCover() {
  $("form.profile-cover-changer").submit();
}

function Wo_SetCookieAlert() {
  $.get(Wo_Ajax_Requests_File(), {
    f: 'set_admin_alert_cookie'
  });
}

function Wo_OpenProfileCover(image) {
    $.post(Wo_Ajax_Requests_File() + '?f=get_user_profile_cover_image_post', {
      image:image
    }, function (data) {
        if (data.status == 200) {
            Wo_OpenLightBox(data.post_id);
        } else {
            $('[id^=cover-image]').attr('data-target', '#ProfileCoverImageModal');
            $('[id^=cover-image]').attr('data-toggle', 'modal');
            $('#ProfileCoverImageModal').modal('show');
        }
    });
}

function Wo_OpenProfilePicture(image) {
    $.post(Wo_Ajax_Requests_File() + '?f=get_user_profile_image_post', {
      image:image
    }, function (data) {
        if (data.status == 200) {
            Wo_OpenLightBox(data.post_id);
        } else {
            $('[id^=updateImage-' + user_id + ']').attr('data-target', '#ProfileImageModal-' + user_id);
            $('[id^=updateImage-' + user_id + ']').attr('data-toggle', 'modal');
            $('#ProfileImageModal-' + user_id).modal('show');
        }
    });
}

<?php if ( $wo['loggedin'] ){ ?>
    <?php if ( isset( $_GET['mode'] ) && $_GET['mode'] == 'opengift' ){ ?>
        $(document).ready(function() {
            setTimeout(() => {
                $('#gift_show_model').modal('show');
            }, 1000);
        });
    <?php } ?>
<?php } ?>
</script>
