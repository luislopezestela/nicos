<?php $reactions = lui_GetPostReactions($wo['message']['id'],'message'); ?>
<div class="message-contnaier <?php echo ($wo['message']['onwer'] == 0) ? 'incoming pull-left' : 'outgoing pull-right';?> <?php echo(!empty($reactions) ? 'margin-active' : '') ?>" id="messageId_<?php echo $wo['message']['id']; ?>">
<?php if ($wo['message']['onwer'] == 0): ?>
<?php 

$page_info = lui_PageData($wo['message']['page_id']);
$avatar = $page_info['avatar'];
if ($page_info['user_id'] != $wo['message']['from_id']) {
  $avatar = $wo['message']['user_data']['avatar'];
}


 ?>
<div class="message-user-image pull-left">
  <img src="<?php echo $avatar?>" alt="User image">
</div>
<?php endif ?>
<div class="messages-wrapper messages-text message-model <?php echo ($wo['message']['onwer'] == 0) ? 'pull-left' : 'pull-right';?>" data-message-id="<?php echo $wo['message']['id'] ?>" onclick="Wo_ShowMessageOptions(<?php echo $wo['message']['id'] ?>);">
   <div class="clear"></div>
   <div class="message" data-toggle="tooltip" title="<?php echo lui_Time_Elapsed_String($wo['message']['time']);?>" data-placement="<?php echo ($wo['message']['onwer'] == 0) ? 'right': 'left';?>">
      <p class="message-text" id="message_text_reply_<?php echo $wo['message']['id'] ?>" dir="auto"><?php echo $wo['message']['text'] ?></p>
      <div class="message-media" id="message_media_reply_<?php echo $wo['message']['id'] ?>">
         <div class="clear"></div>
          <?php
          if (isset($wo['message']['media']) && !empty($wo['message']['media'])) {
              $media = array(
                  'type' => 'message',
                  'storyId' => $wo['message']['id'],
                  'filename' => $wo['message']['media'],
                  'name' => $wo['message']['mediaFileName']
              );
              echo lui_DisplaySharedFile($media, 'message');
          }
          ?>
          <?php if (!empty($wo['message']['stickers'])): ?>
            <img src="<?php echo $wo['message']['stickers']; ?>" style="max-height: 100px;max-width: 100%;">
          <?php endif; ?>
      </div>
      <div class="deleteMessage <?php echo ($wo['message']['onwer'] == 0) ? 'right': '';?>" onclick="Wo_DeleteMessage(<?php echo $wo['message']['id'] ?>);">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
  <!-- <div class="time ajax-time text-right <?php echo ($wo['message']['onwer'] == 0) ? 'pull-right': 'pull-left';?>" title="<?php echo date('c',$wo['message']['time']); ?>">
        <?php echo lui_Time_Elapsed_String($wo['message']['time']);?>
      </div> -->
</div>
<div class="deleteMessage <?php echo ($wo['message']['onwer'] == 0) ? 'right': '';?>" style="<?php echo ($wo['message']['onwer'] == 0) ? 'right:-100px;': 'left: -100px;';?>" onclick="Wo_ReplyMessage(<?php echo $wo['message']['id'] ?>);">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-down-left"><polyline points="9 10 4 15 9 20"></polyline><path d="M20 4v7a4 4 0 0 1-4 4H4"></path></svg>
      </div>
      <?php if ($wo['message']['onwer'] == 0) { ?>
      <div class="deleteMessage messages-reactions <?php echo ($wo['message']['onwer'] == 0) ? 'right': '';?>" style="<?php echo ($wo['message']['onwer'] == 0) ? 'right:-120px;': 'left: -120px;';?>" data-message-id="<?php echo $wo['message']['id'] ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
      </div>
    <?php } ?>
      <?php if (!empty($wo['message']['reply_id']) && !empty($wo['message']['reply'])) { ?>
        <p class="message-text" dir="auto" style="background-color: #333"><?php echo $wo['message']['reply']['text'] ?></p>
        <div class="message-media">
        <div class="clear"></div>
        <?php
          if (isset($wo['message']['reply']['media']) && !empty($wo['message']['reply']['media'])) {
            $media = array(
              'type' => 'message',
              'storyId' => $wo['message']['reply']['id'],
              'filename' => $wo['message']['reply']['media'],
              'name' => $wo['message']['reply']['mediaFileName']
            );
            echo lui_DisplaySharedFile($media, 'message');
          }
        ?>
        <?php if (!empty($wo['message']['reply']['stickers'])): ?>
        <?php if (strpos('.mp4', $wo['message']['reply']['stickers'])) { ?>
          <video autoplay loop><source src="<?php echo $wo['message']['reply']['stickers']; ?>" type="video/mp4"></video>
        <?php } else { ?>
          <img src="<?php echo $wo['message']['reply']['stickers']; ?>" alt="GIF">
        <?php } ?>
        <?php endif; ?>

        <?php if (!empty($wo['message']['reply']['product_id'])) { 
          $wo['product'] = lui_GetProduct($wo['message']['reply']['product_id']);
          if (!empty($wo['product'])) {
        ?>
          <div class="wo_market">
            <div class="market_bottom">
              <div class="products">
                <div class="product" id="product-<?php echo $wo['product']['id']?>" data-id="<?php echo $wo['product']['id']?>">
                  <div class="product_info">
                    <div class="product-image">
                      <a href="<?php echo $wo['product']['url']?>"><img src="<?php echo $wo['product']['images'][0]['image_org'];?>"></a>
                    </div>
                    <div class="produc_info">
                      <div class="product-title">
                        <a href="<?php echo $wo['product']['url']?>" title="<?php echo $wo['product']['name']?>"><?php echo $wo['product']['name']?></a>
                      </div>
                      <div class="product-by">
                        <?php
                          $product_by_ = $wo['product']['category'];
                          $product_by_ = str_replace('{product_category_name}', $wo['products_categories'][$wo['product']['category']], $product_by_);
                        ?>
                        <a href="<?php echo lui_SeoLink('index.php?link1=products&c_id=' . $wo['product']['category']);?>"><?php echo $wo['products_categories'][$wo['product']['category']];?></a>
                      </div>
                      <div class="product-price">
                        <?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price']?>
                      </div>
                    </div>
                    <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
          </div>
        <?php } } ?>
      </div>
      <?php } ?>
   </div>
   

</div>
<div class="like-stat stat-item post-like-status" style="<?php if ($wo['message']['onwer'] == 0) {?> float:left; <?php }else{ ?> float:right; <?php }?>">
      <span class="like-emo post-reactions-icons-m-<?php echo $wo['message']['id']; ?>">
      <?php echo $reactions;?>
      </span>
    </div>
  <ul class="reactions-box reactions-box-container-<?php echo $wo['message']['id']; ?>" data-id="<?php echo $wo['message']['id']; ?>" style="<?php if ($wo['message']['onwer'] == 0) {?> left: 10px; right: unset;<?php }else{ ?> right: 10px; left: unset;<?php }?>">
      <?php if (!empty($wo['reactions_types'])) {
          foreach ($wo['reactions_types'] as $key => $value) {
            if ($value['status'] == 1) {
              
           ?>
        <li style="<?php if ($wo['message']['onwer'] == 0) {?> left: 10px; <?php }else{ ?> right: 10px; <?php }?>" class="reaction reaction-<?php echo $value['id'];?>" data-reaction="<?php echo $value['name'];?>" data-reaction-id="<?php echo $value['id'];?>" data-reaction-lang="<?php echo $value['name'];?>" data-post-id="<?php echo $wo['message']['id']; ?>" onclick="Wo_RegisterMessageReaction(this,'<?php echo($value['layshane_star_small_icon']) ?>',<?php echo($value['is_html']) ?>);">
          <?php if (preg_match("/<[^<]+>/",$value['layshane_star'],$m)) {
                echo($value['layshane_star']);
             }
             else{ ?>
              <img src="<?php echo($value['layshane_star']) ?>">
            <?php } ?>
        </li>
      <?php } } } ?>
    </ul>

<?php if($wo['message']['user_data']['user_id'] == $wo['user']['user_id']) { ?>
  <div class="message-seen message-details"></div>
<?php } ?>

</div>
<div class="clear"></div>
<script type="text/javascript">
  $(function () {
$('[data-toggle="tooltip"]').tooltip();
});
</script>