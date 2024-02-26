<style type="text/css">
	.explore_hdr{
    display: block;
    position: relative;
    width: 100%;
    text-align: center;
    padding: 10px 5px;
    margin-top: 15px;
}
.explore_hdr {
    position: relative;
    overflow: hidden;
    padding: 50px 50px 100px;
    margin: -20px 0 -50px;
}
.explore_hdr:before {
    content: '';
    position: absolute;
    background: linear-gradient(currentColor, transparent);
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0.4;
    z-index: -1;
}
.explore_hdr .circle_one {
    position: absolute;
    top: -30px;
    left: 120px;
    width: 200px;
    height: 200px;
    border-radius: 100px;
    background: currentColor;
    opacity: 0.1;
}
.explore_hdr .circle_two {
    position: absolute;
    bottom: -10px;
    right: -20px;
    width: 330px;
    height: 200px;
    border-radius: 100px;
    background: linear-gradient(currentColor, transparent);
    opacity: 0.08;
}
.explore_hdr > .title {
    position: relative;
    font-size: 48px;
    font-weight: 600;
}
.explore_hdr > p {
    margin: 0;
    font-size: 19px;
    opacity: 0.7;
}
.user_media_list_section {
    display: block;
    margin: 10px 5px 5px;
    overflow: hidden;
}
.user_media_list_section.insta {
    margin: 5px 0px 0;
}
.user_media_list_section.insta .photo-data {
    padding: 10px;
    position: relative;
}
.user_media_list_section.insta .photo-data .ico {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    text-align: initial;
    padding: 25px;
    z-index: 1;
    color: #fff;
    pointer-events: none;
}
.user_media_list_section.insta .photo-data .ico svg {
    filter: drop-shadow(0 0 0.75px rgba(0, 0, 0, .42)) drop-shadow(0 1px 0.5px rgba(0, 0, 0, .18)) drop-shadow(0 2px 3px rgba(0, 0, 0, .2));
}
.user_media_list_section .photo-data a, .user_media_list_section .video-data a {
    position: relative;
    padding-bottom: 100%;
    display: block;
    overflow: hidden;
    background: #eee;
}
</style>
<div class="page-margin">
	<div class="explore_hdr main">
		<div class="circle_one"></div>
		<div class="circle_two"></div>
		<div class="title"><?php echo $wo['lang']['explore'] ?></div>
		<p><?php echo $wo['lang']['explore_latest_media'] ?></p>
	</div>

	<div class="profile-lists">
		<div id="photos-list" class="user_media_list_section insta">
         <?php foreach ($wo['explore_posts'] as $wo['story']) { 
         	echo lui_LoadPage('mode_instagram/explore/list'); 
         } ?>
		</div>
		<?php if (count($wo['explore_posts']) > 0) { ?>
		<?php }else{
			echo lui_LoadPage('mode_instagram/explore/no-posts');
		} ?>
	</div>
</div>
<script type="text/javascript">
scrolled = 0;
$(window).scroll(function () {
	var nearToBottomm = 300;
	if($('.user_media_list_section').length > 0) {
		if ($(window).scrollTop() + $(window).height() > $(document).height() - nearToBottomm) {
			if (scrolled == 0) {
				scrolled = 1;
				Wo_LoadExplorePosts();
			}
		}
	}
});

	function Wo_LoadExplorePosts() {
		var after_post_id = $('div.photo-data:last').attr('data-post-id');
		$.post(Wo_Ajax_Requests_File() + '?f=explore&s=load_more_posts&mode_type=facebook', {
		    after_post_id: after_post_id,
		}, function (data) {
			if (data.status == 200) {
				if (data.html && data.html != '') {
					scrolled = 0;
					$('.user_media_list_section').append(data.html);
				}
				else{
					//$('.load-more-explore').slideUp();
				}
			}
			else{
				//$('.load-more-explore').slideUp();
			}
		});
	}
</script>