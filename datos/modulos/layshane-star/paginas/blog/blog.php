<style>body{overflow-x:hidden;}</style>
<div class="page-margin products">
	<div class="lui_header_blog new_market blogs">
		<div class="container">
			<h1>Layshane blog</h1>
			<p><?=$wo['lang']['most_recent_art'];?></p>
			<?php 
			$is_admin     = lui_IsAdmin();
			$is_moderoter = lui_IsModerator();
			?>
			<?php if ($wo['loggedin'] == true && $is_admin || ($is_moderoter && isset($wo['user']['permission']['manage-articles']) == 1) ) { ?>
			<?php if (lui_CanBlog() == true) { ?>

			<!--	<a class="btn btn-mat my_articles_btn" href="<?php echo lui_SeoLink('index.php?link1=my-blogs'); ?>" data-ajax="?link1=my-blogs">
					<?php echo $wo['lang']['my_articles'] ?>
				</a>-->

			<?php } } ?>
			
		</div>
	</div>
	
	<div class="wow_main_blogs_bg"></div>
	
	<div class="wow_content contenido_blogs_lui wo_job_head_filter blogs ">
		<div class="search-blog">
			<div class="main-blog-sidebar">
				<input type="text" placeholder="<?php echo $wo['lang']['search_for_article']?>" id="search-blog-input">
				<ul class="popular-articles search_suggs" id="recent-blogs-search"></ul>
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

	<div id="recent-blogs" class="table_row_lui">
		<?php
			$pages = lui_GetBlogs(array("limit" => 9));
			if (count($pages) > 0) {
				foreach ($pages as $key => $wo['article']){
					$wo['article']['first'] = ($key == 0) ? true : false;
					echo lui_LoadPage('blog/includes/card-list');
				}
			} 
			else {
				echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z" /></svg>' . $wo['lang']['no_blogs_found'] . '</div>';
			}
		?>
	</div>
			
	<div class="posts_load">
		<?php if (count($pages) >= 9): ?>
			<div class="load-more">
				<button class="btn btn-default text-center pointer load-more-blogs" id="hren">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg> <?php echo $wo['lang']['load_more_blogs'] ?>
				</button>
			</div>
		<?php endif ?>
	</div>
</div>

<script>
//$('.wow_main_blogs_bg').css('height', ($('.wow_main_float_head').height()) + 'px');
$('.wow_main_blogs_bg').css('height', ($('.lui_header_blog').height()) + 'px');
$('#search-blog-input').keyup(function(event) {
	$keyword = $(this).val();
	//$('#load-search-icon').removeClass('hidden');
	$.post(Wo_Ajax_Requests_File() + '?f=search-blog-read', {keyword: $keyword}, function(data, textStatus, xhr) {
		if (data.status == 200) {
			$('#recent-blogs-search').html(data.html);
		} else {
			$('#recent-blogs-search').html('<div class="text-center">' + data.message + '</div>');
		}
		//$('#load-search-icon').addClass('hidden');
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


var sliders = [...document.querySelectorAll(".estados_vendedores_contenedor")];
var sliderControlPrev = [...document.querySelectorAll(".estados_vendedores_control.atras")];
var sliderControlNext = [...document.querySelectorAll(".estados_vendedores_control.siguiente")];

  sliders.forEach((slider, i) => {
  let isDragStart = false,
      isDragging = false,
      isSlide = false,
      prevPageX,
      prevScrollLeft,
      positionDiff;

  const sliderItem = slider.querySelector(".slider__item");
  var isMultislide = (slider.dataset.multislide === 'true');

  sliderControlPrev[i].addEventListener('click', () => {
    if (isSlide) return;
    isSlide = true;
    let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth;
    slider.scrollLeft += -slideWidth;
    setTimeout(function(){ isSlide = false; }, 700);
  });

  sliderControlNext[i].addEventListener('click', () => {
    if (isSlide) return;
    isSlide = true;
    let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth ;
    slider.scrollLeft += slideWidth;
    setTimeout(function(){ isSlide = false; }, 700);
  });

  function autoSlide() {
    if(slider.scrollLeft - (slider.scrollWidth - slider.clientWidth) > -1 || slider.scrollLeft <= 0) return;
    positionDiff = Math.abs(positionDiff);
    let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth;
    let valDifference = slideWidth - positionDiff;
    if(slider.scrollLeft > prevScrollLeft) {
        return slider.scrollLeft += positionDiff > slideWidth / 5 ? valDifference : -positionDiff;
    }
    slider.scrollLeft -= positionDiff > slideWidth / 5 ? valDifference : -positionDiff;
  }

  function dragStart(e) {
    if (isSlide) return;
    isSlide = true;
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = slider.scrollLeft;
    setTimeout(function(){ isSlide = false; }, 700);
  }

  function dragging(e) {
    if(!isDragStart) return;
    e.preventDefault();
    isDragging = true;
    slider.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    slider.scrollLeft = prevScrollLeft - positionDiff;
  }

  function dragStop() {
    isDragStart = false;
    slider.classList.remove("dragging");
    if(!isDragging) return;
    isDragging = false;
    autoSlide();
  }

  addEventListener("resize", autoSlide);
  slider.addEventListener("mousedown", dragStart);
  slider.addEventListener("touchstart", dragStart);
  slider.addEventListener("mousemove", dragging);
  slider.addEventListener("touchmove", dragging);
  slider.addEventListener("mouseup", dragStop);
  slider.addEventListener("touchend", dragStop);
  slider.addEventListener("mouseleave", dragStop);
});
</script>