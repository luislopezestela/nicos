<div class="lightbox-content wo_com_usr_lbox">
	<svg xmlns="http://www.w3.org/2000/svg" onclick="Wo_CloseLightbox();" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>
	<section class="regular slider">
		<?php foreach ($wo['popover_array'] as $key => $wo['popover']) {
			if (!empty($wo['popover'])) {
				$common = array('count' => 0, 'relationship' => 0 , 'school' => 0, 'working' => 0, 'birthday' => 0, 'country' => 0, 'city' => 0);
				if (!empty($wo['popover']['relationship_id'])) {
					if ($wo['user']['relationship_id'] == $wo['popover']['relationship_id']) {
						$common['count'] = $common['count'] + 1;
						$common['relationship'] = 1;
					}
				}
				if (!empty($wo['popover']['school'])) {
					if ($wo['user']['school'] == $wo['popover']['school']) {
						$common['count'] = $common['count'] + 1;
						$common['school'] = 1;
					}
				}
				if (!empty($wo['popover']['working'])) {
					if ($wo['user']['working'] == $wo['popover']['working']) {
						$common['count'] = $common['count'] + 1;
						$common['working'] = 1;
					}
				}
				if (!empty($wo['popover']['birthday'])) {
					if ($wo['user']['birthday'] == $wo['popover']['birthday'] && $wo['user']['birthday'] != '0000-00-00') {
						$common['count'] = $common['count'] + 1;
						$common['birthday'] = 1;
					}
				}
				if (!empty($wo['popover']['country_id'])) {
					if ($wo['user']['country_id'] == $wo['popover']['country_id']) {
						$common['count'] = $common['count'] + 1;
						$common['country'] = 1;
					}
				}
				if (!empty($wo['popover']['city'])) {
					if ($wo['user']['city'] == $wo['popover']['city']) {
						$common['count'] = $common['count'] + 1;
						$common['city'] = 1;
					}
				}
				$wo['popover']['common'] = $common;
		?>
		<div class="wo_com_lbox_slide" data-common-id="<?php echo($wo['popover']['user_id']) ?>">
			<div class="wo_com_lbox_slide_innr">
				<div class="wo_com_lbox_slide_bg">
					<div class="user-cover" style="background-image: url(<?php echo $wo['popover']['cover']?>);"></div>
					<div class="upop_mid">
						<div class="avatar">
							<img src="<?php echo $wo['popover']['avatar']; ?>" alt="user avatar">
						</div>
						<h2 class="user-name">
							<a href="<?php echo $wo['popover']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['popover']['username']?>"><?php echo $wo['popover']['name']; ?></a>
							<?php if($wo['popover']['verified'] == 1) {   ?>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="verified-color feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" /></svg>
							<?php } ?>
						</h2>
						<div class="user-button">
							<?php echo lui_GetFollowButton($wo['popover']['user_id']); ?>
						</div>
						<div class="upop_mid_innr">
							<ul class="user-information wo_vew_apld_blocks">
								<b>
									<?php if ($wo['popover']['common']['count'] == 1) {
										echo $wo['popover']['common']['count'] .' '. $wo['lang']['thing_in_common'];
									}else{
										echo $wo['popover']['common']['count'] .' '. $wo['lang']['things_in_common'];
									} ?>
								</b>
								<?php if (!empty($wo['popover']['common']['relationship'])) { ?>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.3,14 7,15.3 7,18V20H23V18C23,15.3 17.7,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,15L4.4,14.5C2.4,12.6 1,11.4 1,9.9C1,8.7 2,7.7 3.2,7.7C3.9,7.7 4.6,8 5,8.5C5.4,8 6.1,7.7 6.8,7.7C8,7.7 9,8.6 9,9.9C9,11.4 7.6,12.6 5.6,14.5L5,15Z" /></svg> <?php echo $wo['relationship'][$wo['popover']['relationship_id']];?>
									</li>
								<?php } ?>
								<?php if (!empty($wo['popover']['common']['school'])) { ?>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18,22A2,2 0 0,0 20,20V4C20,2.89 19.1,2 18,2H12V9L9.5,7.5L7,9V2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18Z" /></svg> <?php echo ($wo['popover']['school_completed'] == 1)   ? $wo['lang']['studied_at'] : $wo['lang']['studying_at'] ;?> <?php echo $wo['popover']['school'];?>
									</li>
								<?php } ?>
								<?php if (!empty($wo['popover']['common']['working'])) { ?>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z" /></svg> <?php echo $wo['lang']['working_at'];?> <?php echo $wo['popover']['working'];?>
									</li>
								<?php } ?>

								<?php if (!empty($wo['popover']['common']['birthday'])) { ?>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z" /></svg> <?php echo $wo['popover']['birthday'];?>
									</li>
								<?php } ?>
								<?php if (!empty($wo['popover']['common']['country'])) { ?>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> <?php echo $wo['lang']['living_in'];?> <?php echo $wo['countries_name'][$wo['popover']['country_id']];?>
									</li>
								<?php } ?>
								<?php if (!empty($wo['popover']['common']['city'])) { ?>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> <?php echo $wo['lang']['living_in'];?> <?php echo $wo['popover']['city'];?>
									</li>
								<?php } ?>
							</ul>
							<ul class="user-information">
								<?php $gender = ucfirst(strtolower($wo['popover']['gender']));?>
								<?php if($wo['config']['user_lastseen'] == 1 && $wo['popover']['showlastseen'] != 0) {  ?>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" /></svg> <?php echo lui_UserStatus($wo['popover']['user_id'], $wo['popover']['lastseen']);?>
									</li>
								<?php } ?>
								<li>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.58,4H14V2H21V9H19V5.41L15.17,9.24C15.69,10.03 16,11 16,12C16,14.42 14.28,16.44 12,16.9V19H14V21H12V23H10V21H8V19H10V16.9C7.72,16.44 6,14.42 6,12A5,5 0 0,1 11,7C12,7 12.96,7.3 13.75,7.83L17.58,4M11,9A3,3 0 0,0 8,12A3,3 0 0,0 11,15A3,3 0 0,0 14,12A3,3 0 0,0 11,9Z" /></svg> 
									<?php if (in_array($wo['popover']['gender'], array_keys($wo['genders']))) {
										echo $wo['genders'][$wo['popover']['gender']];
									}
									else{
										echo $wo['genders'][array_keys($wo['genders'])[0]];
									} ;?>
								</li>
								<?php if ($wo['popover']['country_id'] > 0) { ?>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" /></svg> <?php echo $wo['countries_name'][$wo['popover']['country_id']];?>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<?php } } ?>
	</section>
</div>

<script src="<?php echo $wo['config']['theme_url'];?>/javascript/slick/slick.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
	slack = $(".regular").slick({
        dots: false,
		<?php if (count($wo['popover_array']) == 1) { ?>
          centerMode: false,
		<?php }elseif (count($wo['popover_array']) > 1) { ?>
          centerMode: true,
		<?php } ?>
		centerPadding: '60px',
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
		<?php if($wo['language_type'] == 'rtl') { ?>
		rtl: true,
		<?php } ?>
        arrows:true,
        prevArrow:'<button type="button" class="slick-prev slick-arrow" onclick="GetPreCommon()"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" /></svg></button>',
        nextArrow:'<button type="button" class="slick-next slick-arrow" onclick="GetNextCommon()"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"><path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg></button>',
		responsive: [
		{
			breakpoint: 1400,
			settings: {
				slidesToShow: 2,
				centerMode: false,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 1,
			}
		},
		]
	});
	$('.regular').slick('slickGoTo',<?php echo $wo['slide_num']; ?>);

	function GetPreCommon() {
        user_id = 0;
        index = $('.slick-current').attr('data-slick-index');
        index = parseInt(index);
        //if (index > 0) {
            attr = parseInt(index);
            user_id = $("[data-slick-index="+attr+"]").find('.wo_com_lbox_slide').attr('data-common-id');
        //}
        Wo_CloseLightbox();

        $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
        $.get(Wo_Ajax_Requests_File(), {f:'show_common_user',s:'pre', user_id:user_id}, function(data) {
          if (data.status == 200) {
          document.body.style.overflow = 'hidden';
            $('.lightbox-container').html(data.html);
            if (data.html.length == 0) {
	             document.body.style.overflow = 'auto';
	          }
          }
          else{
          	Wo_CloseLightbox();
          }
          
        });
        
        
        // user_id = $('.wo_com_lbox_slide').first().attr('data-common-id');
        // user_id = $('.slick-active').find('.wo_com_lbox_slide').first().attr('data-common-id');
        // $.post(Wo_Ajax_Requests_File() + '?f=show_common_user&s=pre', {user_id: user_id}, function(data, textStatus, xhr) {
        //   if (data.status == 200 && data.html != '') {

             
        //      setTimeout(function () {
        //       $('.slick-track').prepend(data.html);
        //        for (var i = 0; i < $('.slick-slide').length; i++) {
        //         $($('.slick-slide')[i]).attr('data-slick-index', i);
        //       }
        //      },3000)
             
        //   }
        // });
	}

	function GetNextCommon() {
        user_id = 0;
        index = $('.slick-current').attr('data-slick-index');
        attr = parseInt(index);
        user_id = $("[data-slick-index="+attr+"]").find('.wo_com_lbox_slide').attr('data-common-id');
        Wo_CloseLightbox();

        $('#contnet').append('<div class="lightbox-container"><div class="lightbox-backgrond" onclick="Wo_CloseLightbox();"></div><div class="lb-preloader" style="display:block"><svg width="50px" height="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#676d76" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg></div></div>');
        $.get(Wo_Ajax_Requests_File(), {f:'show_common_user',s:'next', user_id:user_id}, function(data) {
          if (data.status == 200) {
          document.body.style.overflow = 'hidden';
            $('.lightbox-container').html(data.html);
          }
          if (data.html.length == 0) {
             document.body.style.overflow = 'auto';
          }
          });
        // user_id = $('.wo_com_lbox_slide').last().attr('data-common-id');
        // $.post(Wo_Ajax_Requests_File() + '?f=show_common_user&s=next', {user_id: user_id}, function(data, textStatus, xhr) {
        //   if (data.status == 200 && data.html != '') {
        //     $('.slick-track').append(data.html);
        //   }
        // });
	}
</script>