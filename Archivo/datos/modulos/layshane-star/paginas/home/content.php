<div class="page-margin">
	<div class="productos_listar_pagina_view">
		<div class="contenedor_productos_lista leftcol">
			<?=lui_LoadPage("sidebar/left-sidebar"); ?>
		</div>
<?php // echo lui_LoadPage('sidebar/content'); ?>
		<div class="caja_de_productos_en_lista middlecol wo_market">
			<?php if($wo['loggedin'] == true):?>
			<?php if ($wo['config']['user_status'] == 1) { ?>
				<section class="estados_vendedores">
					<button class="estados_vendedores_control atras"><svg fill="currentColor" viewBox="0 0 24 24" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 xxk0z11 xvy4d1p"><path d="M14.791 5.207 8 12l6.793 6.793a1 1 0 1 1-1.415 1.414l-7.5-7.5a1 1 0 0 1 0-1.414l7.5-7.5a1 1 0 1 1 1.415 1.414z"></path></svg></button>
					<button class="estados_vendedores_control siguiente"><svg fill="currentColor" viewBox="0 0 24 24" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 xxk0z11 xvy4d1p"><path d="M9.209 5.207 16 12l-6.791 6.793a1 1 0 1 0 1.415 1.414l7.5-7.5a1 1 0 0 0 0-1.414l-7.5-7.5a1 1 0 1 0-1.415 1.414z"></path></svg></button>
					<div class="estados_vendedores_contenedor" data-multislide="true" data-step="7">

						<?php if ($wo['config']['afternoon_system'] == 1) { ?>
							<div class="slider__item create_new greetalert">
									<div id="daynightmsg"></div>
							</div>
						<?php } ?>

			      <?php if($wo['config']['can_use_story']) { ?>
						<div class="slider__item create_new">
							<a href="<?php echo lui_SeoLink('index.php?link1=create-status'); ?>" data-ajax="?link1=create-status">
								<img width="100%" src="<?php echo $wo['user']['avatar'];?>" alt="<?php echo $wo['user']['name'];?>">
								<div class="crear_estado_conten" title="<?php echo $wo['lang']['create_story'] ?>"><svg class="crear_estado_boton" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" /></svg>
									<p><?php echo $wo['lang']['create_story'] ?></p></div>
							</a>
						</div>
					  <?php } ?>
					  

					  <?php
							if ($wo['config']['user_status'] == 1) {
								$get_user_status = lui_GetFriendsStatus(array('limit' => 4));
								if (!empty($get_user_status)){
									foreach ($get_user_status as $key => $wo['user_status']) {
										echo lui_LoadPage('home/user-status');
									}
								}
							}
						?>
						<?php $ultimos_productos_agregados = lui_GetProducts(array('limit' => 6));
							foreach($ultimos_productos_agregados as $key => $wo['product']){
								echo lui_LoadPage('sidebar/ultimos_productos');
							}
						?>


						<?php if (!empty($get_user_status) && count($get_user_status) > 3) { ?>
							<div class="slider__item view-more-stories">
								<a href="<?php echo lui_SeoLink('index.php?link1=more-status'); ?>">
									<div class="mostrar_todas_las_historias">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.47,4.35L20.13,3.79V12.82L22.56,6.96C22.97,5.94 22.5,4.77 21.47,4.35M1.97,8.05L6.93,20C7.24,20.77 7.97,21.24 8.74,21.26C9,21.26 9.27,21.21 9.53,21.1L16.9,18.05C17.65,17.74 18.11,17 18.13,16.26C18.14,16 18.09,15.71 18,15.45L13,3.5C12.71,2.73 11.97,2.26 11.19,2.25C10.93,2.25 10.67,2.31 10.42,2.4L3.06,5.45C2.04,5.87 1.55,7.04 1.97,8.05M18.12,4.25A2,2 0 0,0 16.12,2.25H14.67L18.12,10.59" /></svg>
										<span><?php echo $wo['lang']['see_all']?? ''; ?></span>
								</div>
								</a>
							</div>
						<?php } ?>


					</div>
				</section>

			<?php } endif ?>
			<?php
				if (lui_IsThereAnnouncement() === true) {
				$announcement = lui_GetHomeAnnouncements();
			?>
			<div class="home-announcement">
				<div class="alert alert-success" style="background-color: white;">
					<span class="close announcements-option" data-toggle="tooltip" onclick="Wo_ViewAnnouncement(<?php echo $announcement['id']; ?>);" title="<?php echo $wo['lang']['hide'];?>">
						<i class="fa fa-remove"></i>
					</span>
					<?php echo $announcement['text']; ?>
				</div>
			</div>
			<!-- .home-announcement -->
			<?php
				}
				if($wo['loggedin'] == true) {
						//echo lui_LoadPage('story/publisher-box');
				}
			?>


			<div class="btn btn-main btn-active posts-count" onclick="Wo_GetNewPosts();"></div>
			<div class="posts_load">
				<div id="posts-laoded" class="market_bottom">
					<div class="wo_loading_post">
						<div class="lightui1-shimmer"> <div class="_2iwr"></div> <div class="_2iws"></div> <div class="_2iwt"></div> <div class="_2iwu"></div> <div class="_2iwv"></div> <div class="_2iww"></div> <div class="_2iwx"></div> <div class="_2iwy"></div> <div class="_2iwz"></div> <div class="_2iw-"></div> <div class="_2iw_"></div> <div class="_2ix0"></div> </div>
					</div>
					<div class="wo_loading_post">
						<div class="lightui1-shimmer"> <div class="_2iwr"></div> <div class="_2iws"></div> <div class="_2iwt"></div> <div class="_2iwu"></div> <div class="_2iwv"></div> <div class="_2iww"></div> <div class="_2iwx"></div> <div class="_2iwy"></div> <div class="_2iwz"></div> <div class="_2iw-"></div> <div class="_2iw_"></div> <div class="_2ix0"></div> </div>
					</div>
				</div>
			</div>
			<!-- #posts -->
		</div>
		<!-- .col-md-8 -->
	</div>
</div>
<!-- .page-margin -->

<?php
if($wo['loggedin'] == true) {
	if ($wo['user']['social_login'] == 1) {
	  echo lui_LoadPage('modals/create-password');
	}
}
?>

<script type="text/javascript">

$(function() {
    loadposts();
});


// $(document).on('click', '.story-image-wrapper', function(event) {
//   event.preventDefault();
//   $value = $(this).parents(".story-container").attr('data-status-id');
//   $.post(Wo_Ajax_Requests_File() + '?f=story_view', {id: $value}, function(data, textStatus, xhr) {

//   });
// });

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
		window.fbAsyncInit = function() {
		  FB.init({
			appId      : '',
			xfbml      : true,
			version    : 'v3.2'
		  });
		};
	  	$(".post-description p, .product-description").each(function(index, el) {
	  		ReadMoreText(this);
	  	});
	  	$(".post-commet-textarea .textarea").triggeredAutocomplete({
	       hidden: '#hidden_inputbox_comment',
	       source: Wo_Ajax_Requests_File() + "?f=mention",
	       trigger: "@"
	    });
	  	$(".comment-reply textarea").triggeredAutocomplete({
	       hidden: '#hidden_inputbox_comment_reply',
	       source: Wo_Ajax_Requests_File() + "?f=mention",
	       trigger: "@"
	    });
	    $('#load-more-posts').show();

	});
}
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

<?php if (lui_IsMobile() == true) { ?>
function Wo_StorePosts(type) {
  if (type > 1) {
     return false;
  }
  if (type == 0) {
    $('.order-text').text('<?php echo $wo['lang']['all'] ?>');
  } else {
    $('.order-text').text('<?php echo $wo['lang']['people_i_follow'] ?>');
  }
  $('#posts-laoded').html('<div class="wo_loading_post"><div class="wo_loading_post_child"></div></div>');
  $.get(Wo_Ajax_Requests_File() + '?f=update_order_by', {type:type}, function (data) {
    if (data.status == 200) {
      loadposts();
    }
  });
}
<?php } ?>

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

$(function () {
    var is_day_enabled = getCookieValue('day_status');
    var myDate = new Date();
    var hrs = myDate.getHours();
    var greet;
    var color;
	var quote;
    if (hrs < 12) {
        greet = '<span><?php echo $wo['lang']['good_morning']?>, <?php echo $wo['user']['name']?></span> <img src="<?php echo $wo['config']['theme_url'];?>/img/park.png"/>';
        color = '#7FC583';
		quote = '<?php echo $wo['lang']['good_morning_quote']?>';
    } else if (hrs >= 12 && hrs <= 18) {
        greet = '<span><?php echo $wo['lang']['good_afternoon']?>, <?php echo $wo['user']['name']?> </span><img src="<?php echo $wo['config']['theme_url'];?>/img/desert.png"/>';
        color = '#ffc107';
		quote = '<?php echo $wo['lang']['good_afternoon_quote']?>';
    } else if (hrs >= 18 && hrs <= 24) {
        greet = '<span><?php echo $wo['lang']['good_evening']?>, <?php echo $wo['user']['name']?> </span><img src="<?php echo $wo['config']['theme_url'];?>/img/sea.png"/>';
        color = '#FF4F70';
		quote = '<?php echo $wo['lang']['good_evening_quote']?>';
    }
    if (is_day_enabled != 1) {
      setTimeout(function () {
        $('.greetalert').css('border-color', color );
        $('#daynightmsg').html('<div class="small-texts">' + greet + '</div><p>' + quote + '</p>');
        $('.greetalert').removeClass('hidden');
      }, 100);
    }
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
