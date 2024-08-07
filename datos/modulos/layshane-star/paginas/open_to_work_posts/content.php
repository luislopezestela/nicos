<div class="page-margin">
	<div class="row">
		<div class="col-md-2 leftcol"><?php echo lui_LoadPage("sidebar/left-sidebar"); ?></div>
		<div class="col-md-7 profile-lists middlecol">
			<div class="wo_my_pages">
				<div>
						<div id="mlposts">
						<?php
							if (count($wo['open_posts']) <= 0) {
								echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg> ' . $wo['lang']['no_posts_found'] . '</h5>';
							} else {
								foreach ($wo['open_posts'] as $wo['story']) {
									if( is_array($wo['story']) && isset( $wo['story']['id']) ){
										echo lui_LoadPage('story/content');
									}
								}
							}
						?>
						</div>
						<?php if (count($wo['open_posts']) > 0) { ?>
							<div class="load-more pointer" id="load-more-posts" onclick="Wo_GetMoreOpenPosts();">

							</div>
						<?php } ?>
						<!-- .load-more pointer -->
						<div id="load-more-filter">
							<span class="filter-by-more hidden" data-filter-by="open_posts"></span>
						</div>
						<!-- #load-more-filter -->
				    <div class="clear"></div>
				</div>
			</div>
		</div>
		<?php echo lui_LoadPage('sidebar/content');?>
	</div>
</div>
<script>
$(function () {
	xscrolled = 0;
	var api = $('#api').val();
	current_width = $(window).width();
	if(current_width > 900 || api) {
    	$(window).scroll(function () {
			if($('.footer-wrapper').scrollTop() > 500) {
				$('.footer-wrapper .dropdown-menu').css('bottom', 'auto');
			} else {
				$('.footer-wrapper .dropdown-menu').css('bottom', '100%');
			}
			if($(document).scrollTop() > 200) {
				$('.sidebar-sticky').addClass('Stick');
			} else {
				$('.sidebar-sticky').removeClass('Stick');
			}
			var nearToBottom = 100;
			if($('#mlposts').length > 0) {
				if ($(window).scrollTop() + $(window).height() > $(document).height() - nearToBottom) {
					if (xscrolled == 0) {
						xscrolled = 1;
						Wo_GetMoreOpenPosts();
					}
				}
			}
		});
  	}
});

function Wo_GetMoreOpenPosts() {
  var more_posts = $('#load-more-posts');
  var after_post_id = $('div.post:last').attr('data-post-id');
  var after_last_id = $('div.post:last').attr('data-post-id');
  var lasttotal = $('div.post:last').attr('data-post-total');
  var ids = $('div.post:last').attr('data-post-ids');
  var dt = $('div.post:last').attr('data-post-dt');
  $('#mlposts').append('<div class="hidden loading-status loading-single"></div>');
  $('#load-more-posts').hide();
  $('.loading-status').hide().html('<div class="wo_loading_post"><div class="wo_loading_post_child2"></div></div>').removeClass('hidden').show();
  Wo_progressIconLoader($('#load-more-posts'));
  posts_count = 0;
  if ($('.post').length > 0) {
    posts_count = $('.post').length;
  }
  $.get(Wo_Ajax_Requests_File(), {
	f: 'get_more_open_posts',
	mode_type: 'linkedin',
	after_last_id: after_last_id,
	lasttotal: lasttotal,
	ids:ids,
	dt: dt
  }, function (data) {
	if(data.status == 200) {
		if(data.html == "") {
			xscrolled = 1;
			$('#load-more-posts').show().html('<div class="white-loading list-group"><div class="cs-loader"><div class="no-more-posts-to-show"><?php echo $wo['lang']['no_more_posts_to_show']; ?></div></div>');
		} else {
			$('#mlposts').append(data.html);
			xscrolled = 0;
		}
	}
    
	$('.loading-status').remove();
	$('#load-more-posts').show();
    Wo_progressIconLoader($('#load-more-posts'));
    
  });
}
</script>