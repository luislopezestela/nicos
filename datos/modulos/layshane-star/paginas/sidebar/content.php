<?php
if($wo['loggedin'] == true) {
    $wo['have_stories'] = false;
    $user_stories = $db->where('user_id', $wo['user']['user_id'])->get(T_USER_STORY,null,array('id'));
    if (!empty($user_stories)) {
        $wo['have_stories'] = true;
        $wo['story_seen_class'] = 'seen_story';

        foreach ($user_stories as $key => $value) {
            $is_seen = $db->where('story_id',$value->id)->where('user_id',$wo['user']['user_id'])->getValue(T_STORY_SEEN,'COUNT(*)');

            if ($is_seen == 0) {
                $wo['story_seen_class'] = 'unseen_story';
            }
        }
    }
}

 ?>
<div class="col-md-2 sidebar rightcol">
    <div class="sidebar-conatnier">
    
        <?php if ($wo['loggedin'] == true): ?>
            <?php if ($wo['config']['online_sidebar'] == 1) { ?>
            <ul class="list-group">
                <?php $online = lui_CountOnlineData();?>
    			<div class="wow_side_online">
    				<p><?=$online;?> <?=$wo['lang']['online_users'];?></p>
    			</div>
            </ul>
            <?php } ?>
        <?php endif ?>
		
        <?php if ($wo['config']['classified'] == 1): ?>
        <div id="sidebar-latest-products" class="sidebar-latest-products">
            <?php $get_latest_products = lui_GetProducts(array('limit' => 4)); ?>
                <button id="scrollRight">atras</button>
            <ul class="list-group">
                <li class="list-group-item text-muted sidebar-title-back" contenteditable="false"><a href="<?=lui_SeoLink('index.php?link1=products') ?>" data-ajax="?link1=products"><?=$wo['lang']['latest_products'];?></a></li>
                <li class="activities-wrapper sidebar-product-slider">
                    <?php 
                    foreach ($get_latest_products as $key => $wo['product']) {
                         echo lui_LoadPage('sidebar/product-style');
                    } 
                    ?>
                </li>
            </ul>
                <button id="scrollLeft">adelante</button>
           
        </div>
        <?php endif ?>
        
        <?php if ($wo['loggedin'] == true): ?>
        <?php if ($wo['config']['user_ads'] == 1): ?>
            <?php 
                foreach (lui_GetSideBarAds() as $wo['sidebar-ad']) {
                    echo lui_LoadPage('ads/includes/sidebar-ad');
                }
            ?>
            <div class="clear"></div>
        <?php endif; ?>
        <?php else: ?>
            <?php 
              $sidebar_ad = lui_GetAd('sidebar', false);
              if (!empty($sidebar_ad)) {?>
              <ul class="list-group sidebar-ad">
                 <?php echo $sidebar_ad; ?>
              </ul>
             <?php } ?>
        <?php endif ?>
    </div>
</div>

<script>
    function Wo_GetNewActivities() {
      var before_activity_id = $('#activities-wrapper > .activity').attr('data-activity-id');
      if (typeof before_activity_id === 'undefined') {
           return false;
      }
      $.post(Wo_Ajax_Requests_File() + '?f=activities&s=get_new_activities', {
        before_activity_id: before_activity_id
      }, function (data) {
        if(data.status == 200) {
          $('.activities-wrapper').prepend(data.html);
        }
      });
    }
    function Wo_GetMoreActivities() {
      var activity_container = $('.activity-container');
      var after_activity_id = $('#activities-wrapper .activity:last').attr('data-activity-id');
      Wo_progressIconLoader(activity_container);
      $.post(Wo_Ajax_Requests_File() + '?f=activities&s=get_more_activities', {
        after_activity_id: after_activity_id
      }, function (data) {
        if(data.status == 200) {
          if(data.html.length == 0) {
            $('.no-activities').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18 8H8C6.9 8 6 8.9 6 10V16C6 17.11 6.9 18 8 18H18C19.11 18 20 17.11 20 16V10C20 8.9 19.11 8 18 8M14 16H8V14H14V16M18 12H8V10H18V12M22 6H4V22H2V2H4V4H22V6Z" /></svg>' + data.message);
          } else {
            $('#activities-wrapper').append(data.html);
          }
          $("#activities-wrapper").animate({
            scrollTop: $('#activities-wrapper')[0].scrollHeight
          }, 100);
          Wo_progressIconLoader(activity_container);
        }
      });
    }

var userStep = 170;
var userScrolling = false;

// Wire up events for the 'scrollUp' link:
$("#scrollRight").bind("click", function(event) {
    event.preventDefault();
    $(".sidebar-product-slider").animate({
        scrollLeft: "-=" + userStep + "px"
    });
});

$("#scrollLeft").bind("click", function(event) {
    console.log(event)
    event.preventDefault();
    $(".sidebar-product-slider").animate({
        scrollLeft: "+=" + userStep + "px"
    });
});

function scrollContent(direction) {
    var amount = (direction === "right" ? "-=1px" : "+=1px");
    $(".sidebar-product-slider").animate({
        scrollLeft: amount
    }, 1, function() {
        if (userScrolling) {
            scrollContent(direction);
        }
    });
}


$(document).ready(function(){
  $('.wo_pro_users').slick({
	  centerMode: true,
	  centerPadding: '1px',
	  slidesToShow: 2,
	  autoplay: true,
	  autoplaySpeed: 2000,
	  arrows: false,
	  speed: 900,
	  <?php if($wo['language_type'] == 'rtl') { ?>
  rtl: true,
  <?php } ?>
	  responsive: [
    {
      breakpoint: 992,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 5
      }
    },
	{
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 4
      }
    },
	{
      breakpoint: 520,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 420,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 2
      }
    },
	{
      breakpoint: 340,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
  });
});
</script>