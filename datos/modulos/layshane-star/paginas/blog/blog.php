<script type="text/javascript">
	if ($('#scripts_page').length) {
    $('#scripts_page').remove();
  }
  if ($('#scripts_page_load').length) {
    $('#scripts_page_load').remove();
  }
  var preloadLink = document.createElement('link');
  preloadLink.id = 'scripts_page_load';
  preloadLink.rel = 'preload';
  preloadLink.href = "<?php echo $wo['config']['theme_url'];?>/javascript/slick/slick.min.js?version=<?php echo $wo['config']['version']; ?>";
  preloadLink.as = 'script';
  document.head.appendChild(preloadLink);

  if ($('#style_pag_css').length) {
    $('#style_pag_css').remove();
  }
  if ($('#s_pag_loop').length) {
    $('#s_pag_loop').remove();
  }
  var preloadLink_blogs_s = document.createElement('link');
  preloadLink_blogs_s.id = 's_pag_loop';
  preloadLink_blogs_s.rel = 'preload';
  preloadLink_blogs_s.href = "<?php echo $wo['config']['theme_url'];?>/stylesheet/blogs_style.css?version=<?php echo $wo['config']['version']; ?>";
  preloadLink_blogs_s.as = 'style';
  document.head.appendChild(preloadLink_blogs_s);

  var sucjsslik_blogs_s  = document.createElement('link');
  sucjsslik_blogs_s.rel = 'stylesheet';
	sucjsslik_blogs_s.id   = 'style_pag_css';
	sucjsslik_blogs_s.href = "<?php echo $wo['config']['theme_url'];?>/stylesheet/blogs_style.css?version=<?php echo $wo['config']['version']; ?>";
	document.head.appendChild(sucjsslik_blogs_s);

</script>
<div class="sun_blog_head">
	<div class="container">
		<h1><?php echo $wo['lang']['explore_latest_articles']?></h1>
		<div class="search-blog">
			<span id="load-search-icon" class="hidden"><svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve"><path fill="#333" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"/> </path></svg></span>
			<input type="text" placeholder="<?php echo $wo['lang']['search_for_article']?>" class="form-control" id="search-blog-input">
		</div>
		<?php if (lui_IsAdmin() || lui_IsModerator()): ?>
			<div class="create_blog_ara">
				<?php if (lui_CanBlog() == true) { ?>
					<a class="btn btn-default" href="<?php echo lui_SeoLink('index.php?link1=create-blog');?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> <?php echo $wo['lang']['create_blog'] ?></a>
				<?php } ?>
			</div>
		<?php endif ?>
	</div>
</div>
<div class="page-margin sun_blog_head_margin">
	<div class="row">
		<!--Random Articles-->
		<div class="featuredBlock--carousel row">
			<div class="featuredBlock--child">
				<?php 
					$blogs = lui_GetBlogs(array('limit' => 6, 'order_by' => 'RAND'));
					foreach ($blogs as $key => $wo['article']) {
						echo lui_LoadPage('blog/includes/card-list-rand');
					}
				?>
			</div>
		</div>
	</div>

	<div id="recent-blogs" class="sun_blog_row_pad publicacionde_articulos">
		<?php
			$pages = lui_GetBlogs(array("limit" => 9));
			if (count($pages) > 0) {
				foreach ($pages as $key => $wo['article']){
					$wo['article']['first'] = ($key == 0) ? true : false;
					echo lui_LoadPage('blog/includes/card-list');
				}
			} 
			else {
				echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> ' . $wo['lang']['no_blogs_found'] . '</h5>';
			}
		?>
	</div>
			
	<div class="posts_load">
		<?php if (count($pages) >= 9): ?>
			<div class="load-more">
				<button class="btn btn-default text-center load-more-blogs wo_load_more" id="hren" >
					<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo $wo['lang']['load_more_blogs'] ?>
				</button>
			</div>
		<?php endif ?>
	</div>
</div>

<script>
$('#search-blog-input').keyup(function(event) {
	$keyword = $(this).val();
	$('#load-search-icon').removeClass('hidden');
	$.post(Wo_Ajax_Requests_File() + '?f=search-blog', {keyword: $keyword}, function(data, textStatus, xhr) {
		if (data.status == 200) {
			$('#recent-blogs').html(data.html);
		} else {
			$('#recent-blogs').html('<div class="text-center">' + data.message + '</div>');
		}
		$('#load-search-icon').addClass('hidden');
	});
});

jQuery(document).ready(function($) {

    $(".load-more-blogs").click(function () {
  		var last_id = (($("div[data-blog-id]").length > 0) ? $("div[data-blog-id]:last").attr('data-blog-id') : 0);
		$.ajax({	  
		     url: Wo_Ajax_Requests_File(),
		     type: 'GET',
		     dataType: 'json',
		     data: {f:"load-recent-blogs",offset:last_id,total:9},
		     success:function(data){
		        if (data['status'] == 200) {
		            $("#recent-blogs").append(data['html']);
		        }

		        else{
		           $(".posts_load").remove()
		        }
		     }
		});
	});
});

$(function() {
	var sucjsslik  = document.createElement('script');
			sucjsslik.id   = 'scripts_page';
			sucjsslik.src = "<?php echo $wo['config']['theme_url'];?>/javascript/slick/slick.min.js?version=<?php echo $wo['config']['version']; ?>";
			document.head.appendChild(sucjsslik);
	sucjsslik.onload = function() {
	  $('.featuredBlock--child').slick({
	  infinite: false,
	  slidesToShow: 3,
	  variableWidth: false,
	  slidesToScroll: 1,
	  autoplay: false,
	  autoplaySpeed: 2000,
	  <?php if($wo['language_type'] == 'rtl') { ?>
	  rtl: true,
	  <?php } ?>
	  responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 2
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 2
	      }
	    },
	    {
	      breakpoint: 560,
	      settings: {
	        slidesToShow: 1
	      }
	    }
	  ]
	  });
  };
});
</script>