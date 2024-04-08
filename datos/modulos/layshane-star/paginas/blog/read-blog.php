<script type="text/javascript">
  if ($('#style_pag_css').length) {
    $('#style_pag_css').remove();
  }
  if ($('#s_pag_loop').length) {
    $('#s_pag_loop').remove();
  }
  var preloadLink_blogs_s = document.createElement('link');
  preloadLink_blogs_s.id = 's_pag_loop';
  preloadLink_blogs_s.rel = 'preload';
  preloadLink_blogs_s.href = "<?php echo $wo['config']['theme_url'];?>/stylesheet/blogsread_style.css?version=<?php echo $wo['config']['version']; ?>";
  preloadLink_blogs_s.as = 'style';
  document.head.appendChild(preloadLink_blogs_s);

  var sucjsslik_blogs_s  = document.createElement('link');
  sucjsslik_blogs_s.rel = 'stylesheet';
  sucjsslik_blogs_s.id   = 'style_pag_css';
  sucjsslik_blogs_s.href = "<?php echo $wo['config']['theme_url'];?>/stylesheet/blogsread_style.css?version=<?php echo $wo['config']['version']; ?>";
  document.head.appendChild(sucjsslik_blogs_s);
</script>
<div class="page-margin"> 
  <div class="row">
    <div class="columna-8 profile-lists read-blog-container">
      <div class="read-blog" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="read-blog-head">
          <a class="main postCategory" href="<?php echo $wo['article']['category_link']; ?>" data-ajax="?link1=blog-category&id=<?php echo $wo['article']['category']; ?>">
            <h5><?php echo $wo['blog_categories'][$wo['article']['category']]; ?></h5>
          </a>
          
          <h1 itemprop="headline"><?php echo $wo['article']['title']?></h1>
          <img src="<?php echo($wo['article']['thumbnail']); ?>" width="100%">
          <div class="clear"></div>
          <br>

          <div class="read-blog-desc">
            <p itemprop="description"><?php echo $wo['article']['description']; ?></p>
          </div>
              
          <div class="read-blog-info-user">
            <div class="user-name <?php echo lui_RightToLeft('pull-right'); ?>">
              <a href="<?php echo $wo['article']['url']; ?>#respond" class="metaLink">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                <?php echo lui_GetBlogCommentsCount($wo['article']['id']); ?>
              </a>
              <div class="clear"></div>
            </div>
            <div class="<?php echo lui_RightToLeft('pull-left'); ?>">
            <div class="postMeta--author-avatar">
              <a href="<?php echo $wo['article']['author']['url']?>">
                <img src="<?php echo $wo['article']['author']['avatar']?>" alt="User Image">
              </a>
            </div>
            <div class="postMeta--author-text">
              <?php echo $wo['lang']['by']; ?>
              <a class="main" rel="author" href="<?php echo $wo['article']['author']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['article']['author']['username']; ?>">
                <?php echo $wo['article']['author']['name']; ?>
              </a>
              <time itemprop="datePublished" content="<?php echo date("d M Y",$wo['article']['posted']); ?>"><?php echo date("d M Y",$wo['article']['posted']); ?></time>
            </div>
            </div>
            <span class="middot <?php echo lui_RightToLeft('pull-left'); ?>">.</span>
            <div class="user_button <?php echo lui_RightToLeft('pull-left'); ?>" style="margin: 6px 0px;">
              <?php if ($wo['article']['is_post_admin']):?>
                <a class="btn btn-info" href="<?php echo lui_SeoLink('index.php?link1=edit-blog&id=' . $wo['article']['id']) ?>"><?php echo $wo['lang']['edit']; ?></a>
              <?php endif;?>
              <?php echo lui_GetFollowButton($wo['article']['author']['user_id']);?>
            </div>
          </div>
          
          <div class="blog-share-buttons">
            <ul class="list-inline">
              <li class="bold"><?php echo $wo['lang']['share_to'];?>:</li>
              <li>
                <a href="https://www.facebook.com/sharer.php?u=<?php echo ($wo['article']['url']) ?>" target="_blank" title="<?php echo $wo['lang']['facebook'];?>">
                  <div class="btn-share">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-facebook" fill="#337ab7"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z" /></svg>
                  </div>
                </a>
              </li>
              <!-- <li>
                <a href="https://plus.google.com/share?url=<?php echo ($wo['article']['url']) ?>" target="_blank" title="<?php echo $wo['lang']['google'];?>">
                  <div class="btn-share">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-google" fill="#d9534f"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M19.5,12H18V10.5H17V12H15.5V13H17V14.5H18V13H19.5V12M9.65,11.36V12.9H12.22C12.09,13.54 11.45,14.83 9.65,14.83C8.11,14.83 6.89,13.54 6.89,12C6.89,10.46 8.11,9.17 9.65,9.17C10.55,9.17 11.13,9.56 11.45,9.88L12.67,8.72C11.9,7.95 10.87,7.5 9.65,7.5C7.14,7.5 5.15,9.5 5.15,12C5.15,14.5 7.14,16.5 9.65,16.5C12.22,16.5 13.96,14.7 13.96,12.13C13.96,11.81 13.96,11.61 13.89,11.36H9.65Z" /></svg>
                  </div>
                </a>
              </li> -->
              <li>
                <a href="http://twitter.com/intent/tweet?text=<?php echo $wo['article']['title'] ?>&amp;url=<?php echo ($wo['article']['url']) ?>" target="_blank" title="<?php echo $wo['lang']['twitter'];?>">
                  <div class="btn-share">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-twitter" fill="#55acee"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z" /></svg>
                  </div>
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo ($wo['article']['url']) ?>" target="_blank" title="<?php echo $wo['lang']['linkedin'];?>">
                  <div class="btn-share">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-facebook" fill="#007bb6"><path d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z" /></svg>
                  </div>
                </a>
              </li>
              <li>
                <a href="http://pinterest.com/pin/create/button/?url=<?php echo ($wo['article']['url']) ?>" target="_blank" title="<?php echo $wo['lang']['pinterest'];?>">
                  <div class="btn-share">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-facebook" fill="#cb2027"><path d="M13,16.2C12.2,16.2 11.43,15.86 10.88,15.28L9.93,18.5L9.86,18.69L9.83,18.67C9.64,19 9.29,19.2 8.9,19.2C8.29,19.2 7.8,18.71 7.8,18.1C7.8,18.05 7.81,18 7.81,17.95H7.8L7.85,17.77L9.7,12.21C9.7,12.21 9.5,11.59 9.5,10.73C9.5,9 10.42,8.5 11.16,8.5C11.91,8.5 12.58,8.76 12.58,9.81C12.58,11.15 11.69,11.84 11.69,12.81C11.69,13.55 12.29,14.16 13.03,14.16C15.37,14.16 16.2,12.4 16.2,10.75C16.2,8.57 14.32,6.8 12,6.8C9.68,6.8 7.8,8.57 7.8,10.75C7.8,11.42 8,12.09 8.34,12.68C8.43,12.84 8.5,13 8.5,13.2A1,1 0 0,1 7.5,14.2C7.13,14.2 6.79,14 6.62,13.7C6.08,12.81 5.8,11.79 5.8,10.75C5.8,7.47 8.58,4.8 12,4.8C15.42,4.8 18.2,7.47 18.2,10.75C18.2,13.37 16.57,16.2 13,16.2M20,2H4C2.89,2 2,2.89 2,4V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V4C22,2.89 21.1,2 20,2Z" /></svg>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
        
        <!-- Additional schema meta -->
        <div itemscope="" itemprop="publisher" itemtype="http://schema.org/Organization" class="hidden">
          <meta itemprop="name" content="<?php echo $wo['config']['siteName'];?>">
          <div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject" class="hidden">
            <meta itemprop="url" content="<?php echo $wo['config']['theme_url'];?>/img/logo.<?php echo $wo['config']['logo_extension'];?>">
            <meta itemprop="width" content="470">
            <meta itemprop="height" content="75">
          </div>
        </div>
        
        <a itemprop="mainEntityOfPage" href="<?php echo $wo['article']['url']; ?>" class="hidden"></a>
        
        <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="read-blog-thumbnail hidden">
          <img src="<?php echo $wo['article']['thumbnail']; ?>" alt="<?php echo $wo['article']['title']?>">
          <meta itemprop="url" content="<?php echo $wo['article']['thumbnail']; ?>">
          <meta itemprop="width" content="700">
          <meta itemprop="height" content="250">
        </div>
        
        <div itemprop="articleBody" class="read-content">
          <?php echo nofollow(htmlspecialchars_decode($wo['article']['content'])); ?>
        </div>
              
        <div class="read-tags main">
          <span>
            <?php if (is_array($wo['article']['tags_array'])) {
              foreach ($wo['article']['tags_array'] as $key => $tag) {
            ?>
            <a class="postTag" href="<?php echo lui_SeoLink('index.php?link1=hashtag&hash=' . $tag) ?>" rel="tag"><?php echo $tag ?></a>
            <?php } } ?>
          </span>
          <span class="views <?php echo lui_RightToLeft('text-right'); ?> <?php echo lui_RightToLeft('pull-right'); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> <?php echo $wo['article']['view']?> <?php echo $wo['lang']['views']?>
          </span>
        </div>
            </div>
        
      <div class="related-post">
        <?php echo lui_LoadPage('blog/sidebar') ?>
      </div>
        
      <?php //if ($wo['loggedin'] == true): ?>           
      <div class="blog-com-wrapper" id="respond">
        <div class="blog-com-top">
          <h4 class="pull-left">   
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg> <?php echo $wo['lang']['comments']; ?>
            <span>
              <?php echo lui_GetBlogCommentsCount($wo['article']['id']); ?> 
            </span>
          </h4>
        </div>
                <div class="blog-com-box">
                  <form  class="form">
                    <div class="w100 wo_blogcomm_combo">
                      <?php if ($wo['loggedin'] == true): ?>  
            <img class="avatar" src="<?php echo $wo['user']['avatar'];?>"/>
              <?php endif; ?>  
                      <textarea id="blog-comment" name="text" class="form-control" placeholder="<?php echo $wo['lang']['write_comment'];?>"></textarea>

                        <button id="add-art-comment" class="btn pull-right btn-main" type="button" data-toggle="tooltip" title="<?php echo $wo['lang']['post']; ?>">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>

                      <br>
                      
                    </div>
                    <div class="clear"></div>
                  </form>
                  <div class="clear"></div>
                </div>

                <div class="blog-comlist-container">
                  <?php 
                    foreach (lui_GetBlogComments(array('blog_id'=> $wo['article']['id'])) as $wo['comment']) {
                      echo lui_LoadPage('blog/comment-list');
                    }
                  ?>
                </div>
                <div class="posts_load">
                   <?php if (lui_GetBlogCommentsCount($wo['article']['id']) > 5): ?>
                      <div class="load-more">
                              <button class="btn btn-default text-center pointer load-more-blog-comments">
                              <i class="fa fa-arrow-down progress-icon" data-icon="arrow-down"></i> <?php echo $wo['lang']['load_more'] ?></button>
                      </div>
                   <?php endif ?>
                </div>
              </div>
            <?php //endif;?>
      </div>
      <div class="columna-4 custom-fixed-element">
        <?php echo lui_LoadPage('blog/main-sidebar') ?>
      </div>
   </div>
   <!-- .row -->
</div>

<script>
jQuery(document).ready(function($) {
  $(".load-more-blog-comments").click(function(event) {
    var self    = $(this);
    var last_id = 0;
    if ($("div[data-blog-comment]").length > 0) {
      last_id = $("div[data-blog-comment]").last().attr('data-blog-comment');
    }
    $.ajax({
      url: wo_Ajax_Requests_File(),
      type: 'GET',
      dataType: 'json',
      data: {
        f:'load-blog-comments',
        offset:last_id,
        b_id:<?php echo $wo['article']['id']; ?>
      },
    }).done(function(data) {
      if (data.status == 200) {
        $(".blog-comlist-container").append(data.html);
      }
      else if(data.status == 404){
        self.text(data.html);
      }
    }).fail(function() {
      console.log("Something went wrong. Try again later");
    })
  });

  $(document).on('click', ".delete-my-blog",function() {
    $.ajax({
      type: "GET",
      url: Wo_Ajax_Requests_File(),
      data: {id: $(this).attr("id"),f:'delete-my-blog'},
      dataType:'json',
      success: function(data) {
         if(data['status'] == 200){
            $("div[data-rm-blog='"+ data['id'] +"']").remove()
         } else {
            alert(data['status'])
         }
      }
    });   
  });

  $(document).on('click', ".del-blog-comment",function() {
    var  self = $(this);
    $.ajax({
      type: "GET",
      url: Wo_Ajax_Requests_File(),
      data: {id: self.attr("id"),f:'del-blog-comment',b_id:<?php echo $wo['article']['id']; ?>},
      dataType:'json',
      success: function(data) {
         if(data['status'] == 200){
            $("div[data-blog-comment='"+ self.attr('id') +"']").slideUp('fast',function(){
              $(".blog-com-top h4 span").text(data.comments);
              $(this).remove();
            })
         }
      }
    });   
  });

  $(document).on('click', ".del-blog-commreplies",function() {
    var  self = $(this);
    $.ajax({
      type: "GET",
      url: Wo_Ajax_Requests_File(),
      data: {id: self.attr("id"),f:'del-blog-commreplies',b_id:<?php echo $wo['article']['id']; ?>},
      dataType:'json',
      success: function(data) {
         if(data['status'] == 200){
            $("div[data-blog-comment-reply='"+ self.attr('id') +"']").slideUp('fast',function(){
              var comments = Number($(".blog-com-top h4 span").text());
              $(".blog-com-top h4 span").text(comments -= 1);
              $(this).remove();
            })
         }
      }
    });   
  });

  $(document).on('click', ".reply-toblogcomm-reply",function() {
    $('.blog-comment-reply-box').each(function(index, el) {
      $(el).addClass('hidden');
    });
    var  self = $(this);
    var name  = $("div[data-blog-comment-reply='"+self.attr('id')+"']").find('a b').text();
    $("div[data-blog-comment='"+self.attr('data-blog-commId')+"']").find('.blog-comment-reply-box').removeClass('hidden').find('textarea').val(name +": ");
  });

  $(document).on('click', ".reply-toblog-comm",function() {
    $('.blog-comment-reply-box').each(function(index, el) {
      $(el).addClass('hidden');
    });
    var  self = $(this);
    $("div[data-blog-comment='"+self.attr('id')+"']").find('.blog-comment-reply-box').toggleClass('hidden').find('textarea').val('');
    
  });

  $("#add-art-comment").click(function(event) {
    <?php if ($wo['loggedin'] != true) { ?>
      document.location = "<?php echo($wo['config']['site_url']) ?>";
    <?php } ?>
    $.ajax({
      url: Wo_Ajax_Requests_File() + '?f=add-blog-comm',
      type: 'POST',
      dataType: 'json',
      data: {text:$("#blog-comment").val(),blog:<?php echo $wo['article']['id']; ?>},
    })
    .done(function(data) {
      if (data.status == 200) {
        if (node_socket_flow == "1") {
            socket.emit("user_notification", { to_id: data.user_id, user_id: _getCookie("user_id"), type: "added" });
        }
        $("#blog-comment").val('');
        $(".blog-comlist-container").prepend(data.html);
        $(".blog-com-top h4 span").text(data.comments);
      }
    })
    .fail(function() {
      console.log("Something went wrong. Try again later");
    })    
  });

});

function Wo_OpenWindow(url) {
  newwindow = window.open('<?php echo($wo['config']['site_url']); ?>/sharer?url=' + url, '', 'height=600,width=800');
   if (window.focus) {
      newwindow.focus();
   }
   return false;
}

function Wo_AddBlogCommentLike(id){
  if (!id) {
    return false;
  }
  var comment_id = id;
  Wo_Delay(function(){
    $.ajax({
      url: Wo_Ajax_Requests_File() + '?f=add-blog-commlikes',
      type: 'POST',
      dataType: 'json',
      data: {id:comment_id,blog_id:<?php echo $wo['article']['id']; ?>},
    }).done(function(data) {
      if (data.status == 200) {
        if (node_socket_flow == "1") {
            socket.emit("user_notification", { to_id: data.user_id, user_id: _getCookie("user_id"), type: "added" });
        }
        $("span[data-blog-comdislikes='"+comment_id+"']").text(data.dislikes);
        $("span[data-blog-comlikes='"+comment_id+"']").text(data.likes);
      }
    }).fail(function() {
      console.log("Something went wrong. Try again later");
    })
  },0);
  
}

function Wo_AddBlogCommentDisLike(id){
  if (!id) {
    return false;
  }
  var comment_id = id;
  Wo_Delay(function(){
    $.ajax({
      url: Wo_Ajax_Requests_File() + '?f=add-blog-commdislikes',
      type: 'POST',
      dataType: 'json',
      data: {id:comment_id,blog_id:<?php echo $wo['article']['id']; ?>},
    }).done(function(data) {
      if (data.status == 200) {
        $("span[data-blog-comdislikes='"+comment_id+"']").text(data.dislikes);
        $("span[data-blog-comlikes='"+comment_id+"']").text(data.likes);
      }
    }).fail(function() {
      console.log("Something went wrong. Try again later");
    })
  },0);
  
}
function Wo_AddBlogCommReplyLike(id){
  if (!id) {
    return false;
  }
  var reply_id = id;
  Wo_Delay(function(){
    $.ajax({
      url: Wo_Ajax_Requests_File() + '?f=add-blog-crlikes',
      type: 'POST',
      dataType: 'json',
      data: {id:reply_id,blog_id:<?php echo $wo['article']['id']; ?>},
    }).done(function(data) {
      if (data.status == 200) {
        $("span[data-blog-comrlikes='"+reply_id+"']").text(data.likes);
        $("span[data-blog-comrdislikes='"+reply_id+"']").text(data.dislikes);
      }
    }).fail(function() {
      console.log("Something went wrong. Try again later");
    })
  },0);
  
}

function Wo_AddBlogCommReplyDisLike(id){
  if (!id) {
    return false;
  }
  var reply_id = id;
  Wo_Delay(function(){
    $.ajax({
      url: Wo_Ajax_Requests_File() + '?f=add-blog-crdislikes',
      type: 'POST',
      dataType: 'json',
      data: {id:reply_id,blog_id:<?php echo $wo['article']['id']; ?>},
    }).done(function(data) {
      if (data.status == 200) {
        $("span[data-blog-comrlikes='"+reply_id+"']").text(data.likes);
        $("span[data-blog-comrdislikes='"+reply_id+"']").text(data.dislikes);
      }
    }).fail(function() {
      console.log("Something went wrong. Try again later");
    })
  },0);
  
}

function Wo_RegisterBlogCommReply(id,event,self){
  <?php if ($wo['loggedin'] != true) { ?>
      document.location = "<?php echo($wo['config']['site_url']) ?>";
    <?php } ?>
  if (event.keyCode==13&&event.shiftKey==0&&event&&id&&self) {
    var text = self.value;
    if (text.length >= 2) {
      $.ajax({
        url: Wo_Ajax_Requests_File() + '?f=add-blog-commreply',
        type: 'POST',
        dataType: 'json',
        data: {c_id:id,text:text,b_id:<?php echo $wo['article']['id']; ?>},
      }).done(function(data) {
        if (data.status == 200) {
          if (node_socket_flow == "1") {
              socket.emit("user_notification", { to_id: data.user_id, user_id: _getCookie("user_id"), type: "added" });
          }
          $("div[data-blog-comment='"+id+"']").find('.blog-comment-reply-cont').append(data.html);
          $(".blog-com-top h4 span").text(data.comments);
          self.value = '';
        }
      }).fail(function() {
        console.log("Something went wrong. Try again later");
      })     
    }
  }

}
</script>
