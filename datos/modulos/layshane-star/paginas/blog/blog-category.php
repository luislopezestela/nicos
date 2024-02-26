<style>body{overflow-x:hidden;}</style>
<div class="page-margin products">
	<div class="lui_header_blog new_market blogs">
		<div class="container">
			<h1>Layshane blog</h1>
			<p><?php echo $wo['lang']['most_recent_art']; ?></p>
		</div>
	</div>
	
	<div class="wow_main_blogs_bg"></div>
	
	<div class="wow_content contenido_blogs_lui wo_job_head_filter blogs">
		<div class="search-blog">
			<div class="main-blog-sidebar">
				<input type="text" placeholder="<?php echo $wo['lang']['search_for_article']?>" id="search-blog-input">
			</div>
		</div>
		<div class="categorias_de_blog_conten">
			<section class="estados_vendedores" style="width:100%;">
				<button class="estados_vendedores_control atras"><svg fill="currentColor" viewBox="0 0 24 24" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 xxk0z11 xvy4d1p"><path d="M14.791 5.207 8 12l6.793 6.793a1 1 0 1 1-1.415 1.414l-7.5-7.5a1 1 0 0 1 0-1.414l7.5-7.5a1 1 0 1 1 1.415 1.414z"></path></svg></button>
				<button class="estados_vendedores_control siguiente"><svg fill="currentColor" viewBox="0 0 24 24" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 xxk0z11 xvy4d1p"><path d="M9.209 5.207 16 12l-6.791 6.793a1 1 0 1 0 1.415 1.414l7.5-7.5a1 1 0 0 0 0-1.414l-7.5-7.5a1 1 0 1 0-1.415 1.414z"></path></svg></button>
				<div class="estados_vendedores_contenedor" data-multislide="true" >
					<?php 
						$category_id = (!empty($_GET['id'])) ? (int) $_GET['id'] : 0;
						foreach ($wo['blog_categories'] as $key => $category) {
							$active = ($category_id == $key) ? 'active' : '';
					?>
					<div class="categorias_de_blog slider__item slider__nuevo_item" data_prodect_cat_id="id">
						<a class="<?php echo $active?>" href="<?php echo lui_SeoLink('index.php?link1=blog-category&id=' . $key) ?>" data-ajax="?link1=blog-category&id=<?php echo $key?>">
							<?php echo $category;?>
						</a>
					</div>
					<?php } ?>
				</div>
			</section>
		</div>
	</div>
	
	<div id="blog-list" class="table_row_lui">
		<?php
			$pages = lui_GetBlogs(array("category" => $_GET['id'],'limit' => 10));
			if (count($pages) > 0) {
				foreach ($pages as $wo['blog']) {
					echo lui_LoadPage('blog/includes/card-horiz-list');
				}
			} 
			else {
				echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z" /></svg>' . $wo['lang']['no_blogs_found'] . '</div>';
			}
		?>
	</div>
	
	<div class="posts_load">
		<?php if (count($pages) >= 0): ?>
			<div class="load-more">
				<button class="btn btn-default text-center pointer load-more-blogs" id="hren"><?php echo $wo['lang']['load_more_blogs'] ?></button>
			</div>
		<?php endif ?>
	</div>
</div>

<script>
$('.wow_main_blogs_bg').css('height', ($('.lui_header_blog').height()) + 'px');

jQuery(document).ready(function($) {
  var delay = (function(){
    var timer = 0;
    return function(callback, ms){
      clearTimeout (timer);
      timer = setTimeout(callback, ms);
    };
  })();

  $("#search-art").keyup(function() {
      delay(function(){
      if ($("#search-art").val().trim()) {
	      $.ajax({
	        url: Wo_Ajax_Requests_File(),
	        type: 'GET',
	        data: {f:"search-art",keyword:$("#search-art").val(),cat:'<?php echo $_GET['id']; ?>'},
	        dataType: "json",
	        success: function(data){
	          if (data['status'] == 200) {
	          	$(".latest-blogs").html(data['html'])
	          }else{
	          	$("#blog-list").html('<div class="empty_state"> ' + data['warning'] + '</div>')
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
         data: {f:"load-blogs",offset:($(".wow_main_blogs").length > 0) ? $(".wow_main_blogs:last").attr('id') : 0,id:<?php echo $_GET['id'] ?>},
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