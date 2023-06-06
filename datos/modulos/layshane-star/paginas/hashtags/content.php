<div class="page-margin">
	<div>
		<div class="col-md-2 leftcol"><?php echo lui_LoadPage("sidebar/left-sidebar"); ?></div>
		<div class="col-md-8 middlecol">
			<br>
			<?php 
				if($wo['loggedin'] == true) {
					//echo lui_LoadPage('story/publisher-box'); 
				}
			?>
			<div class="posts-count posts-hashtag-count" onclick="Wo_GetNewHashTagPosts();"></div>
			<div class="hashtag-posts" id="posts_hashtag">
				<?php
					$stories = lui_GetHashtagPosts($_GET['hash']);
					if (count($stories) <= 0) {
						echo lui_LoadPage('hashtags/no-tag-found');
					} else {
						foreach ($stories as $wo['story']) {
							echo lui_LoadPage('story/content');
						}
					}
				?>
			</div>
			<input type="hidden" value="<?php echo $_GET['hash'];?>" id="hashtagName">
			<?php if (count($stories) > 4) { ?>
				<div class="load-more pointer" id="load-more-posts" onclick="Wo_GetMoreHashTagsPosts();">
					<span class="btn btn-default"><i class="fa fa-chevron-circle-down progress-icon" data-icon="chevron-circle-down"></i> &nbsp;<?php echo $wo['lang']['load_more_posts'];?><span>
				</div>
			<?php } ?>
		</div>
		<?php 
			if($wo['loggedin'] == true) {
				echo lui_LoadPage('sidebar/content');
			} else {
				echo lui_LoadPage('sidebar/guest');
			}
		?>
	</div>
</div>
<?php if (count($stories) > 0) {  ?>
<script type="text/javascript">
$(function () {
  scrolled_hash = 0;
  // Stick the home side bar if the screen width is > than 900
  if(current_width > 900) {
    $(window).scroll(function () {
      var nearToBottom = 200;
      if($('#posts_hashtag').length > 0) {
          if ($(window).scrollTop() + $(window).height() > $(document).height() - nearToBottom) {
            if (scrolled_hash == 0) {
               scrolled_hash = 1;
               Wo_GetMoreHashTagsPosts();
            }
          }
      }
    });
  }
});
function Wo_GetMoreHashTagsPosts() {
    var more_posts = $('#load-more-posts');
    var after_post_id = $('.post:last').attr('data-post-id');
    var hashtagName = $('#hashtagName').val();
    Wo_progressIconLoader($('#load-more-posts'));
    $.post(Wo_Ajax_Requests_File() + '?f=get_more_hashtag_posts', {after_post_id: after_post_id,hashtagName:hashtagName}, function(data) {
        if (data.status == 200) {
            if (data.html.length == 0) {
                $('#posts_hashtag').append(data.html);
                more_posts.html('<span class="btn btn-default"><?php echo $wo["lang"]["no_more_posts"];?><span>');
            } else {
              $('#posts_hashtag').append(data.html);
            }
            Wo_progressIconLoader($('#load-more-posts'));
            scrolled_hash = 0;
        }
    });
}
</script>
<?php } ?>