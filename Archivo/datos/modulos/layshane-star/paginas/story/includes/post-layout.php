<?php
$post_shared_from = array();
$current_post = $wo['current_post'] = $wo['story'];
 ?>
<div class="post-container">
  <div class="post<?php echo (!empty($wo['story']['post_is_promoted'])) ? ' boosted': '';?>" id="post-<?php echo $wo['story']['id']; ?>" data-post-id="<?php echo $wo['story']['id'];?>" <?php if( isset( $wo['story']['LastTotal'] ) ) { echo 'data-post-total="'.$wo['story']['LastTotal'].'"'; }?> <?php if( isset( $wo['story']['ids'] ) ) { echo 'data-post-ids="'.$wo['story']['ids'].'"'; }?> <?php if( isset( $wo['story']['dt'] ) ) { echo 'data-post-dt="'.$wo['story']['dt'].'"'; }?> data-post-type="<?php if (!empty($wo['story']['parent_id'])) { echo('share'); } ?>">
    <?php
    if (empty($wo['page'])){
      $wo['page'] = 'home';
    } ?>
    <div class="panel panel-white panel-shadow">
      <!-- header -->
      <?php include 'header.php'; ?>
      <!-- header -->
      <div class="post-description" id="post-description-<?php echo $wo['story']['id']; ?>">
        <?php if (!empty($wo['story']['parent_id'])) { ?>
          <div><p class="edited_text"><?php echo $wo['story']['postText']; ?></p></div>
        <?php } ?>
        <!-- shared_post -->
        <?php //include 'shared_post.php'; ?>
        <!-- shared_post -->
        <?php  if (empty($current_post['parent_id'])){ ?>
          <!-- product -->
          <?php include 'product.php'; ?>
          <!-- product -->
          <!-- blog -->
          <?php include 'blog.php'; ?>
          <!-- blog -->
          <!-- postPhoto -->
          <?php if (lui_IsUrl($wo['story']['postPhoto'])): ?>
            <div class="post-file" id="fullsizeimg">
              <img src="<?php echo $wo['story']['postPhoto']; ?>" alt="Picture">
            </div>
          <?php endif; ?>
          <!-- postPhoto -->

          <div id="fullsizeimg" style="position: relative;">
            <!-- photo_album -->
              <?php include 'photo_album.php'; ?>
            <!-- photo_album -->


            <!-- multi_image -->
              <?php include 'photo_multi.php'; ?>
            <!-- multi_image -->

            <div class="clear"></div>
          </div>

          
          <!-- colored post -->
          <?php // include 'colored.php'; ?>
          <!-- colored post -->
          <!-- embed -->
          <?php //include 'embed.php'; ?>
          <!-- embed -->
          <!-- fetched_url -->
          <?php // include 'fetched_url.php'; ?>
          <!-- fetched_url -->
  
          <?php } ?>
        <div class="clear"></div>
        <!-- footer -->
        <?php include 'footer.php'; ?>
        <!-- footer -->
        <?php
        if ($wo['loggedin'] == true) {
          echo lui_LoadPage('modals/edit-post');
          echo lui_LoadPage('modals/delete-post');
        }
        ?>
    </div>
  </div>
</div>
<script type="text/javascript">
$(function () {
  <?php if (!empty($wo['story']['product_id'])): ?>
  ReadMoreText("#post-<?php echo $wo['story']['id']; ?> .product-description-<?php echo $wo['story']['product_id']; ?>");
  <?php endif; ?>
  ReadMoreText("#post-<?php echo $wo['story']['id']; ?> .post-description p");
    $("#post-<?php echo $wo['story']['id']; ?> .textarea").triggeredAutocomplete({
       hidden: '#hidden_inputbox_comment',
       source: Wo_Ajax_Requests_File() + "?f=mention",
       trigger: "@"
    });
    $('[data-toggle="tooltip"]').tooltip();
    $('.dropdown-menu.post-recipient, .dropdown-menu.post-options, .wo_emoji_post').click(function (e) {
      e.stopPropagation();
    });
});

jQuery(document).click(function(event){
    if (!(jQuery(event.target).closest(".remove_combo_on_click").length)) {
        jQuery('.remove_combo_on_click').removeClass('comment-toggle');
		$('#gif-form-<?php echo $wo['story']['id']; ?>').slideUp(200);
		$('#sticker-form-<?php echo $wo['story']['id']; ?>').slideUp(200);
    }
});
<?php if ($wo['config']['live_video'] == 1 && !empty($wo['story']['stream_name']) && $wo['story']['is_still_live'] && $wo['story']['comments_status'] == 1 && $wo['story']['live_ended'] == 0) { ?>
  var post_live_<?php echo $wo['story']['id']; ?> = setInterval(function(){
      data = {};
      for (var i = 0; i < $('.live_comments').length; i++) {
        if ($($('.live_comments')[i]).attr('live_comment_id')) {
          data[i] = $($('.live_comments')[i]).attr('live_comment_id');
        }
      }
      $.post(Wo_Ajax_Requests_File() + "?f=live&s=check_comments", {post_id: <?php echo $wo['story']['id']; ?>,ids:data,page:"<?php echo($wo['page']) ?>"}, function(data, textStatus, xhr) {
        if (data.status == 200) {
          if (data.still_live == 'offline') {
            $('#live_post_comments_<?php echo $wo['story']['id']; ?>').remove();
            $('.was_live_text_<?php echo $wo['story']['id']; ?>').html("<?php echo($wo['lang']['was_live']) ?>");
            $('[id=post-<?php echo $wo['story']['id']; ?>]').find('.comment-textarea').attr('disabled');
            return false;
          }
          $('#live_post_comments_<?php echo $wo['story']['id']; ?>').append(data.html);
          $('#live_count_<?php echo $wo['story']['id']; ?>').html(data.count);
          $('#live_word_<?php echo $wo['story']['id']; ?>').html(data.word);
          var comments = $('#live_post_comments_<?php echo $wo['story']['id']; ?> .live_comments');
          if (comments.length > 4) {
            var i;
            for (i = 0; i < comments.length; i++) {
              if ($('#live_post_comments_<?php echo $wo['story']['id']; ?> .live_comments').length > 4) {
                comments[i].remove();
              }
            }
          }
        }
        else if(data.removed == 'yes'){
            clearInterval(post_live_<?php echo $wo['story']['id']; ?>);
            $('#live_count_<?php echo $wo['story']['id']; ?>').html(0);
            $('#live_post_comments_<?php echo $wo['story']['id']; ?>').html("<h3 class='end_video_text'><?php echo(str_replace('{{user}}', $wo['story']['publisher']['username'], $wo['lang']['stream_has_ended'])) ?></h3>");
            /*$('#live_post_comments_<?php echo $wo['story']['id']; ?>').remove();*/
            $('.was_live_text_<?php echo $wo['story']['id']; ?>').html("<?php echo($wo['lang']['was_live']) ?>");
            $('#post-<?php echo $wo['story']['id']; ?>').find('.comment-textarea').attr('disabled','true');
            $('#post-comments-<?php echo $wo['story']['id']; ?>').remove();
            return false;
        }
        else{
            clearInterval(post_live_<?php echo $wo['story']['id']; ?>);
            $('#live_count_<?php echo $wo['story']['id']; ?>').html(0);
            $('#live_post_comments_<?php echo $wo['story']['id']; ?>').html("<h3 class='end_video_text'><?php echo(str_replace('{{user}}', $wo['story']['publisher']['username'], $wo['lang']['stream_has_ended'])) ?></h3>");
            /*$('#live_post_comments_<?php echo $wo['story']['id']; ?>').remove();*/
            $('.was_live_text_<?php echo $wo['story']['id']; ?>').html("<?php echo($wo['lang']['was_live']) ?>");
            $('#post-<?php echo $wo['story']['id']; ?>').find('.comment-textarea').attr('disabled','true');
            $('#post-comments-<?php echo $wo['story']['id']; ?>').remove();
            return false;
        }
      });
   }, 3000);

<?php } ?>
<?php if ($wo['config']['agora_live_video'] == 1 && !empty($wo['config']['agora_app_id']) && !empty($wo['story']['stream_name']) && $wo['story']['is_still_live']) { ?>
  RunLiveAgora("<?php echo $wo['story']['stream_name']; ?>","post_live_video_<?php echo($wo['story']['id']) ?>","<?php echo($wo['story']['agora_token']) ?>");

<?php } ?>

</script>
