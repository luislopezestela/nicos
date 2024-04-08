<div class="page_home_v">
	<div class="btn btn-main btn-active posts-count" onclick="Wo_GetNewPosts();"></div>
	<div class="posts_load">
		<div id="posts-laoded" class="market_bottom">
			<?php $section_keys = lui_GetSectionCatKeys('section_product'); ?>
			<div id="posts" class="productos_layshane">
				<?php if(!empty($wo['sections_categories'])): ?>
					<?php foreach ($wo['sections_categories'] as $section_id => $section_name): ?>
						<?php $categorias = lui_GetCategories_sections(T_PRODUCTS_CATEGORY,$section_id); ?>
						<div class="paage_welcome">
							<h4 class="titulo_layshane_peru_h"><?=$wo["lang"][$section_keys[$section_id]]; ?></h4>
						</div>
						<nav>
							<ul class="productos_contenido" style="padding-left:0!important;">
								<?php foreach ($categorias as $category): ?>
									<?php $cat_id_produc = $category['id']; ?>
									<?php if ($cat_id_produc==0): ?>
									<?php else: ?>
									<?php $cat_logo_produc = $category['logo']; ?>
									<?php $cat_nombre_producs = $wo["lang"][$category["lang_key"]];?>
									<li class="product_layshane">
										<a href="<?php echo lui_SeoLink('index.php?link1=tienda&c_id='.$cat_id_produc);?>" data-ajax="?link1=tienda&c_id=<?=$cat_id_produc?>" alt="Comprar - <?=$cat_nombre_producs;?>">
											<figure class="categories-g__bg bg--change" data-bg="<?=$cat_logo_produc; ?>" style="background-image: url(&quot;<?=$cat_logo_produc; ?>&quot;);"></figure>
										<span class="name_product" alt="Informacion <?=$cat_nombre_producs;?>"><?=$cat_nombre_producs;?></span>
										</a>
									</li>
									<?php endif ?>
								<?php endforeach ?>
							</ul>
						</nav>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>

<?php
if($wo['loggedin'] == true) {
	if ($wo['user']['social_login'] == 1) {
	  echo lui_LoadPage('modals/create-password');
	}
}
?>
<script type="text/javascript">
/* Standard syntax */
document.addEventListener("fullscreenchange", function() {
  $('video').toggleClass('active-player');
});

/* Firefox */
document.addEventListener("mozfullscreenchange", function() {
  $('video').toggleClass('active-player');
});

/* Chrome, Safari and Opera */
document.addEventListener("webkitfullscreenchange", function() {
  $('video').toggleClass('active-player');
});

/* IE / Edge */
document.addEventListener("msfullscreenchange", function() {
  $('video').toggleClass('active-player');
});

function loadposts() {
	$("#posts-laoded").load(Wo_Ajax_Requests_File() + '?f=load_posts', function enter() {
		Wo_FinishBar();
	});
}
<?php if ($wo['loggedin'] == true): ?>
	<?php if ($wo['user']['social_login'] == 1) { ?>
	  $(window).on("load", function (e) {
	       $('#create-password').modal('show');
	    });
	  $(function() {
	    var create_password_container = $('#create-password');
	    $('form.create-password').ajaxForm({
	      url: Wo_Ajax_Requests_File() + '?f=update_new_logged_user_details',
	      beforeSend: function() {
	        Wo_progressIconLoader($('form.create-password').find('button'));
	      },
	      success: function(data) {
	        if (data.status == 200) {
	          create_password_container.find('.error-container').html("<div class='alert alert-success'>" + data.message + "</div>");
	           $('#update-username').attr('href', data.url);
	           setTimeout(function() {
	            $('#create-password').modal('hide');
	           }, 1500);
	        } else {
	          var errors = data.errors.join("<br>");
	          create_password_container.find('.error-container').html("<div class='alert alert-danger'>" + errors + "</div>");
	        }
	        Wo_progressIconLoader($('form.create-password').find('button'));
	      }
	    });
	  });

	<?php } ?>
<?php endif ?>
function Wo_ViewAnnouncement(id) {
    var announcement_container = $('.home-announcement');
    $.get(Wo_Ajax_Requests_File() + '?f=update_announcement_views', {id:id}, function (data) {
      if (data.status == 200) {
          announcement_container.slideUp(200, function () {
            $(this).remove();
          });
      }
    });
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*60*60*1000));
    var expires = "expires="+ d;
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookieValue(a) {
    var b = document.cookie.match('(^|;)\\s*' + a + '\\s*=\\s*([^;]+)');
    return b ? b.pop() : '';
}

</script>
