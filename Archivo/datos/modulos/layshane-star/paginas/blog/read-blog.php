<div class="page-margin margen_pagina_blog" itemscope itemtype="http://schema.org/BlogPosting">
	<div class="wow_read_blog_hdr_img">
		<img src="<?php echo($wo['article']['thumbnail']); ?>" class="wow_main_float_head_img">
		<div class="wow_read_blog_hdr_img_innr">
			<div class="container">
				<a class="btn btn-mat postCategory" href="<?php echo $wo['article']['category_link']; ?>" data-ajax="?link1=blog-category&id=<?php echo $wo['article']['category']; ?>"><?php echo $wo['blog_categories'][$wo['article']['category']]; ?></a>
				<h2 itemprop="headline"><?php echo $wo['article']['title']?></h2>
				<div class="read-blog-info-user">
					<div class="user-name <?php echo lui_RightToLeft('pull-right'); ?>">
						<a href="<?php echo $wo['article']['url']; ?>#respond" class="metaLink">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px" viewBox="0 0 369.982 369.982" xml:space="preserve">
								<path d="M314.821,47.893c-34.797-28.139-80.904-43.636-129.83-43.636S89.958,19.754,55.161,47.894
									C19.59,76.661,0,115.142,0,156.249c0,41.108,19.59,79.591,55.161,108.356c34.797,28.141,80.904,43.639,129.83,43.639
									c4.981,0,10-0.166,14.995-0.496l31.509,51.959c2.213,3.648,6.134,5.916,10.399,6.018c0.097,0.002,0.191,0.002,0.29,0.002
									c4.155,0,8.051-2.068,10.376-5.529l66.711-99.326c32.727-28.33,50.711-65.371,50.711-104.621
									C369.982,115.141,350.393,76.66,314.821,47.893z M300.904,243.673l-58.183,86.332l-25.372-41.838
									c-2.279-3.76-6.348-6.018-10.686-6.018c-0.419,0-0.84,0.021-1.262,0.062c-6.752,0.684-13.619,1.029-20.412,1.029
									c-88.22,0-159.991-56.97-159.991-126.994c0-70.023,71.771-126.992,159.991-126.992c88.22,0,159.991,56.969,159.991,126.992
									C344.982,188.885,329.328,219.932,300.904,243.673z"/>
							</svg>
							<?php echo lui_GetBlogCommentsCount($wo['article']['id']); ?>
							<?php //echo $wo['lang']['comments'];?>
						</a>
						<span class="middot">·</span>
						<span class="views">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
								 width="20px" height="20px" viewBox="0 0 442.04 442.04"
								 xml:space="preserve">
									<path d="M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203
										c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219
										c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367
										c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021
										c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212
										c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071
										c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z"/>
									<path d="M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188
										c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993
										c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5
										s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z"/>
									<path d="M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z"/>
							</svg>
							<?php echo $wo['article']['view']?> 
							<?php //echo $wo['lang']['views']?>
							</span>
					</div>
					<div class="postMeta--author-avatar">
						<a href="<?php echo $wo['article']['author']['url']?>"><img src="<?php echo $wo['article']['author']['avatar']?>" alt="User Image"></a>
					</div>
					<div class="postMeta--author-text">
						<a rel="author" href="<?php echo $wo['article']['author']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['article']['author']['username']; ?>"><?php echo $wo['article']['author']['name']; ?></a>
						<time itemprop="datePublished" content="<?php echo date("d M Y",$wo['article']['posted']); ?>"><?php echo date("d M Y",$wo['article']['posted']); ?></time>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row wow_read_blog_row">
		<div class="col-md-8 read-blog-container">
			<div class="read-blog wow_content wow_content_blog">
				<div class="read-blog-head">
					<div class="read-blog-desc">
						<p itemprop="description"><?php echo $wo['article']['description']; ?></p>
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
					<div class="clear"></div>
				</div>
              
				<div class="read-tags">
					<?php if (is_array($wo['article']['tags_array'])) {
						foreach ($wo['article']['tags_array'] as $key => $tag) {
					?>
						<a class="postTag" href="<?php echo lui_SeoLink('index.php?link1=hashtag&hash=' . $tag) ?>" rel="tag">#<?php echo $tag ?></a>
					<?php } } ?>
				</div>
            </div>
			
			<div class="page-margin wow_content wow_content_blog" style="margin-top:20px;">
				<div class="related-post">
					<?php echo lui_LoadPage('blog/sidebar') ?>
				</div>
			</div>
				
			<?php //if ($wo['loggedin'] == true): ?>           
			<div class="page-margin wow_content wow_content_blog blog-com-wrapper" id="respond">
				<div class="wo_page_hdng">
					<div class="wo_page_hdng_innr">
						<?php echo lui_GetBlogCommentsCount($wo['article']['id']); ?>  <?php echo $wo['lang']['comments'];?>
					</div>
				</div>
				<?php if ($wo['loggedin'] == true): ?>
		      <div class="">
						<form class="form">
							<div class="w100 wo_blogcomm_combo contem_comentarios">
		            <?php if ($wo['loggedin'] == true): ?>
		            	<img class="avatar" src="<?php echo $wo['user']['avatar'];?>"/>
		            <?php endif; ?>      
								<textarea id="blog-comment" name="text" class="form-control" placeholder="<?php echo $wo['lang']['write_comment'];?>"></textarea>
								<button id="add-art-comment" class="btn btn-main btn-mat add_wow_loader" type="button" data-toggle="tooltip" title="<?php echo $wo['lang']['post']; ?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path></svg>
								</button>
							</div>
							<div class="clear"></div>
						</form>
						<div class="clear"></div>
		      </div>
	    	<?php endif ?>
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
	          		<i class="fa fa-arrow-down progress-icon" data-icon="arrow-down"></i> <?php echo $wo['lang']['load_more'] ?>
	          	</button>
	          </div>
	        <?php endif ?>
	      </div>
			</div>
      <?php //endif;?>
		</div>
		<div class="col-md-4" style="position:sticky;top:108px;">
			<div class="wow_content wow_content_blog">
				<?php echo lui_LoadPage('blog/main-sidebar') ?>
			</div>
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
      url: Wo_Ajax_Requests_File(),
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
      console.log("Algo salió mal. Vuelve a intentarlo más tarde");
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
      console.log("Algo salió mal. Vuelve a intentarlo más tarde");
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
      console.log("Algo salió mal. Vuelve a intentarlo más tarde");
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
      console.log("Algo salió mal. Vuelve a intentarlo más tarde");
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
      console.log("Algo salió mal. Vuelve a intentarlo más tarde");
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
      console.log("Algo salió mal. Vuelve a intentarlo más tarde");
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
        console.log("Algo salió mal. Vuelve a intentarlo más tarde");
      })     
    }
  }

}
</script>
