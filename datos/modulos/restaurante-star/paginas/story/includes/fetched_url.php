<?php if(!empty($wo['story']['postLink']) && empty($wo['story']['postVine']) && empty($wo['story']['postPlaytube']) && empty($wo['story']['postDeepsound']) && empty($wo['story']['postSoundCloud']) && empty($wo['story']['postYoutube']) && empty($wo['story']['postFile'])) { ?>
	<?php if (!preg_match("/(http|https):\/\/twitter\.com\/[a-zA-Z0-9_]+\/status\/[0-9]+/", $wo['story']['postLink']) && !preg_match("/(http|https):\/\/www.tiktok\.com\/(.*)\/video\/(.*)+/", $wo['story']['postLink']) && !preg_match("/^(http:\/\/|https:\/\/|www\.).*(\.mp4)$/", $wo['story']['postLink'])) { ?>
	<div class="post-fetched-url wo_post_fetch_link" id="fullsizeimg">
		<a href="<?php echo $wo['story']['postLink'];?>" target="_blank" rel="nofollow">
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