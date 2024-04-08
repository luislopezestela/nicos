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
  preloadLink_blogs_s.href = "<?php echo $wo['config']['theme_url'];?>/stylesheet/blogcategorystyle.css?version=<?php echo $wo['config']['version']; ?>";
  preloadLink_blogs_s.as = 'style';
  document.head.appendChild(preloadLink_blogs_s);

  var sucjsslik_blogs_s  = document.createElement('link');
  sucjsslik_blogs_s.rel = 'stylesheet';
	sucjsslik_blogs_s.id   = 'style_pag_css';
	sucjsslik_blogs_s.href = "<?php echo $wo['config']['theme_url'];?>/stylesheet/blogcategorystyle.css?version=<?php echo $wo['config']['version']; ?>";
	document.head.appendChild(sucjsslik_blogs_s);

</script>
<style>body{overflow-x:hidden;}</style>
<div class="page-margin products">
	<div class="row">
		<div class="columna-8">
			<div class="latest-blogs" id="blog-list">
				<?php
					$pages = lui_GetBlogs(array("category" => $_GET['id'],'limit' => 10));
						if (count($pages) > 0) {
		                	foreach ($pages as $wo['blog']) {
		                    	echo lui_LoadPage('blog/includes/card-horiz-list');
		                	}
		                } 
		                else {
		                	echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> ' . $wo['lang']['no_blogs_found'] . '</h5>';
		                }
				?>
			</div> 
			<div class="loading-alert"></div>
 
			<div class="posts_load">
			    <?php if (count($pages) >= 0): ?>
				<div class="load-more">
                    <button class="btn btn-default text-center wo_load_more load-more-blogs" id="hren" >
	                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo $wo['lang']['load_more_blogs'] ?>
                	</button>
                </div>
                <?php endif ?>
			</div>	
		</div>
		<div class="columna-4">
			<div class="search-artiles-form">
				<form>
					<h4 class="recent-articles" style="color: #2196f3;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"></path></svg> <?php echo $wo['lang']['search'] ?></h4>
					<div class="inner-addon left-addon">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="glyphicon feather feather-search search_laysh_blo"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>

						<span id="load-search-icon" class="hidden">
							<svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve"><path fill="#333" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"/> </path></svg>
						</span>
						<input type="text" value="" class="form-control" placeholder="<?php echo $wo['lang']['search'] ?>" id="search-art">
					</div>
				</form>
			</div>

			<div class="main-blog-sidebar" id="category-page">
				<!--Categories-->
				<div class="widget">
					<h4 class="recent-articles" style="color: #4caf50;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5.5,7A1.5,1.5 0 0,1 4,5.5A1.5,1.5 0 0,1 5.5,4A1.5,1.5 0 0,1 7,5.5A1.5,1.5 0 0,1 5.5,7M21.41,11.58L12.41,2.58C12.05,2.22 11.55,2 11,2H4C2.89,2 2,2.89 2,4V11C2,11.55 2.22,12.05 2.59,12.41L11.58,21.41C11.95,21.77 12.45,22 13,22C13.55,22 14.05,21.77 14.41,21.41L21.41,14.41C21.78,14.05 22,13.55 22,13C22,12.44 21.77,11.94 21.41,11.58Z"></path></svg> <?php echo $wo['lang']['categories'] ?></h4>
					<ul class="popular-categories">
						<?php 
							$category_id = (!empty($_GET['id'])) ? (int) $_GET['id'] : 0;
							foreach ($wo['blog_categories'] as $key => $category) {
								$active = ($category_id == $key) ? 'active' : '';
						?>
						<li class="<?php echo $active?>">
							<a href="<?php echo lui_SeoLink('index.php?link1=blog-category&id=' . $key) ?>" data-ajax="?link1=blog-category&id=<?php echo $key?>"><?php echo $category;?></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>	
		</div>
		<div class="clear"></div>
	</div>
</div>

<script>
jQuery(document).ready(function($) {

  var delay = (function(){
    var timer = 0;
    return function(callback, ms){
      clearTimeout (timer);
      timer = setTimeout(callback, ms);
    };
  })();

  $("#search-art").keyup(function() {
  	$('#load-search-icon').removeClass('hidden');
  	$('.search_laysh_blo').addClass('hidden');
  	
      delay(function(){
      if ($("#search-art").val().trim()) {
	      $.ajax({
	        url: Wo_Ajax_Requests_File(),
	        type: 'GET',
	        data: {f:"search-art",keyword:$("#search-art").val(),cat:'<?php echo $_GET['id']; ?>'},
	        dataType: "json",
	        success: function(data){
	        	console.log(data)
	          if (data['status'] == 200) {
	          	$('#load-search-icon').addClass('hidden');
	          	if (data['warning']==null) {
	          		$(".latest-blogs").html(data['html'])
	          	}else{
	          		$(".latest-blogs").html('<h5 class="search-filter-center-text"> ' + data['warning'] + '</h5>')
	          	}
  						$('.search_laysh_blo').removeClass('hidden');
	          }else{
  						$('.search_laysh_blo').removeClass('hidden');
	          	$('#load-search-icon').addClass('hidden');
	          	$(".latest-blogs").html('<h5 class="search-filter-center-text"> ' + data['warning'] + '</h5>')
	          }
	        }
	      })}
      }, 1000 );
  });

   $(".load-more-blogs").click(function () {
      $.ajax({
         url: Wo_Ajax_Requests_File(),
         type: 'GET',
         dataType: 'json',
         data: {f:"load-blogs",offset:($(".view-blog").length > 0) ? $(".view-blog:last").attr('id') : 0,id:<?php echo $_GET['id'] ?>},
         success:function(data){
            if (data['status'] == 200) {
            	$(".latest-blogs h5.search-filter-center-text").remove();
                $(".latest-blogs").append(data['html'])
             }else{
               $(".posts_load").remove()
             }
         }
      })
   });
});
</script>