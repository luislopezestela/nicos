<div class="header_servicios_page">
	<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
	<span class="head_cont_servicios_wrap">
		<span class="head_cont_servicios_bg" style="background-image: url(&quot;<?php echo $wo['config']['theme_url'];?>/img/present.<?php echo $wo['config']['portada_extension'];?>&quot;);"></span>
	</span>
	<div class="head_cont_servicios_row">
		<div class="head_cont_servicios_colum">
			<div class="contenido_text_col_head_ser">
				<div class="ser_ser_col_text">
					<h6>Noticias</h6>
					<h1>Aklla Blog</h1>
					<p style="color:#fff;"><?=$wo['lang']['most_recent_art'];?></p>
				</div>
			</div>
		</div>
		<div class="head_cont_servicios_columb"></div>
	</div>
</div>
<style>
    .parallax-container {
    	height:600px;
      overflow-x: hidden;
      overflow-y: auto;
      perspective:1px;
    }

    .parallax-layer {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      transform-style: preserve-3d;
      pointer-events: none;
    }

    .parallax-layer img {
      display: block;
      width: 100%;
      height: auto;
    }
    .posts_load{
    display: block;
    width: 100%;
    max-width: 600px;
    position: relative;
    margin: auto;
    }
    .load-more{
    	position:relative;
    	display:flex;
    	width:100%;
    }
    .load-more .load-more-blogs{
    	display:flex;
    	width:100%;
    	text-align:center;
    	justify-content:center;
    	align-items:center;
    	padding: 15px 0;
    	border:1px solid #ddd;
    	transition: all .5s linear;
    	cursor:pointer;
    }
    .load-more .load-more-blogs:hover{
    	opacity:.7;
    	font-size:14px;
    }
  
  </style>
  <style type="text/css">
	.bboton_blog_le{
		display:inline-block;
		background:var(--boton-fondo);
		color:var(--boton-color);
		padding:6px 10px;
		margin:10px auto;
		text-decoration:none;
		user-select:none;
		transition:all .4s linear;
	}
	.container_header_ad{
		display:block;
		width:100%;
		max-width:600px;
		margin:10px auto;
	}
	.container_header_ad p{padding:10px 0;font-size:14px;font-family:sans-serif;text-transform:uppercase;}
	.my_articles_btn{
		display:inline-block;
		padding:10px;
		border-radius:6px;
		color:#fff;
		font-family:monospace;
		text-decoration:none;
		transition:all .4s linear;
		background:rgba(52, 73, 94,1.0);
	}
	.my_articles_btn:hover,.bboton_blog_le:hover{opacity:.7;}
	.contenedor_blog_data_lists{display:flex;max-width:1280px;margin:10px auto;}
	.contenedor_de_blog_ls{width:75%;}
	.blogs_sedebar_rigth_blog{width:25%;box-sizing:border-box;padding:10px;background:#FAFAFA;border-radius:5px;position:sticky;}
	#search-art,#buscar_blogs_input{display:block;
    width: 100%;
    padding: 10px;
    border: none;
    background: #f0f0f0;
    transition:all .5s linear;
    border-radius: 5px;outline:none;
    border:1px solid #ccc;
    margin-bottom: 15px;}
    #search-art:hover,#buscar_blogs_input:hover,#search-art:focus,#buscar_blogs_input:focus{
    	border-color:#555;
    }
 
		.empty_state {
    display: flex;
    width: 100%;
    max-width: 600px;
    margin: auto;
    justify-content: center;
    flex-wrap: wrap;
    font-family: monospace;
    color:#ccc;
    user-select:none;
		}
		.empty_state svg {
    display: block;
    width: 100%;
    height: 85px;
    fill:#ddd;
		}
		.empty_state svg path{fill:#ddd}
		.articulo_blog_texto h2{
			font-size:40px;
			line-height:1.4em;
			-ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
    font-weight:500;
		}
		.articulo_blog_texto h2 a{
			font-family: 'Prata',Georgia,"Times New Roman",serif!important;
			text-decoration:none;
		}
		.textto_blog_cat,.textto_blog_cat a,.textto_blog_cat time{
    font-size: 12px;
    color: #ff7a6b!important;
    text-decoration:none;
    font-weight:400;
    line-height: 2em;}
		@media only screen and (max-width: 880px){
			.articulo_blog_texto h2{font-size:20px;}
			.contenedor_blog_data_lists{flex-wrap:wrap;}
			.blogs_sedebar_rigth_blog,
			.contenedor_de_blog_ls{width:100%;}
			.blogs_sedebar_rigth_blog{margin-top:30px;}
			.container_header_ad{padding:20px;box-sizing:border-box;}
		}

		.main-blog-sidebar .popular-articles li:first-child {
    margin-top: 0;
}
.main-blog-sidebar .popular-articles li .article-thumbnail {
    display:block;
    width:65px;
    height:65px;
    position:relative;
    border-radius:10px;
    background:#aaa;
}
.main-blog-sidebar .popular-articles li .article-thumbnail img {
    width: 100%;
    height: 100%;
    position: relative;
    margin-right: 15px;
    border-radius: 10px;
    object-fit: cover;
}
.main-blog-sidebar .popular-articles li .article-title {
    margin-left: 80px;
    color: rgba(0,0,0,.8);
    display: block;
    font-size: 16px;
    font-weight: bold;
    line-height: 1.4;
    text-decoration: none;
}
		.main-blog-sidebar .popular-articles li .article-info {
    margin-left: 80px;
    display: block;
    margin-top: 4px;
    color: rgba(0,0,0,.4);
    font-size: 14.5px;
    font-weight: 400;
}
.main-blog-sidebar .popular-categories li, .categorias_de_blog {
    margin: 0 2px 9px 0;
    display: inline-block;
}
.main-blog-sidebar .popular-categories li a, .categorias_de_blog a {
    background-color: rgba(63, 81, 181, 0.1);
    color: #3F51B5;
    display: block;
    padding: 6px 10px;
    border-radius: 2em;
    text-decoration: none;
    font-size: 13px;
    font-weight: bold;
    font-family: Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;
    transition: all 0.1s;
}
</style>
<style type="text/css">
	.section_publicaction .publicacion_br .contenido_datos_blof .imagen_blod{position:relative;display:block;overflow: hidden;max-width: 100%;}
	.section_publicaction .publicacion_br:nth-child(odd) .contenido_datos_blof .imagen_blod{border-radius:0 50px 0 0}
	.section_publicaction .publicacion_br:nth-child(even) .contenido_datos_blof .imagen_blod{border-radius:50px 0 0 0}
</style>
<div class="container_header_ad">
	<?php 
	$is_admin     = lui_IsAdmin();
	$is_moderoter = lui_IsModerator();
	?>
	<?php if ($wo['loggedin'] == true && $is_admin || ($is_moderoter && isset($wo['user']['permission']['manage-articles']) == 1) ) { ?>
		<?php if (lui_CanBlog() == true) { ?>
			<p>Administrar articulos de blog</p>
			<a class="my_articles_btn" href="<?php echo lui_SeoLink('index.php?link1=my-blogs'); ?>" data-ajax="?link1=my-blogs">
				<?php echo $wo['lang']['my_articles'] ?>
			</a>
		<?php } } ?>
</div>

<?php $pages = lui_GetBlogs(array("limit" => 9)); ?>
<div class="contenedor_blog_data_lists">
	<div class="contenedor_de_blog_ls">
		<section id="recent-blogs" class="section_publicaction">
			<?php if(count($pages) > 0): ?>
				<?php foreach ($pages as $key => $wo['article']): $wo['article']['first'] = ($key == 0) ? true : false;?>
					<?php echo lui_LoadPage('blog/includes/card-list');?>
				<?php endforeach ?>
			<?php else: ?>
				<div class="empty_state">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
						<path fill="currentColor" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z" />
					</svg>
					<?=$wo['lang']['no_blogs_found'] ?>
				</div>
			<?php endif ?>
		</section>

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


	<div class="blogs_sedebar_rigth_blog leftcol">
		<div class="search-blog">
			<div class="main-blog-sidebar">
				<input type="text" placeholder="<?=$wo['lang']['search_for_article']?>" id="buscar_blogs_input">
				<ul class="popular-articles search_suggs" id="recent-blogs-search"></ul>
			</div>
		</div>
		<div class="categorias_de_blog_conten">
			<?php
			$category_id = (!empty($_GET['id'])) ? (int) $_GET['id'] : 0;
			foreach($wo['blog_categories'] as $key => $category){
				$active = ($category_id == $key) ? 'active_b' : '';
				?>
				<div class="categorias_de_blog">
					<a class="<?=$active?>" href="<?=lui_SeoLink('index.php?link1=blog-category&id='. $key);?>" data-ajax="?link1=blog-category&id=<?=$key?>"><?=$category;?></a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<script>
$('#buscar_blogs_input').keyup(function(event) {
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

</script>