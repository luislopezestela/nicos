<div class="wrapper">
	<div class="login forgot_pass">
		<div class="login_left_combo_parent">
			<div class="login_left_combo">
				<a href="<?php echo $wo['config']['site_url'];?>" class="logo"><img src="<?php echo $wo['config']['theme_url'];?>/img/logo.<?php echo $wo['config']['logo_extension'];?>" alt="Logo"> </a>
				<h1><?php echo $wo['lang']['connect_with_friends']?></h1>
				<p><?php echo $wo['lang']['welcome_share_text']?></p>
				<div class="fadeInUp animated animated_6 img"><img src="<?php echo $wo['config']['theme_url'];?>/img/backgrounds/login.jpg"></div>
			</div>
			<svg xmlns="http://www.w3.org/2000/svg" width="793" height="1024" viewBox="0 0 793 1024" preserveAspectRatio="none"> <defs> <linearGradient id="linear-gradient" x1="0.066" y1="0.066" x2="1.068" y2="1.075" gradientUnits="objectBoundingBox"> <stop offset="0"/> <stop offset="1" stop-color="<?php echo $wo['config']['btn_background_color'];?>"/> </linearGradient> <clipPath id="clip-path"> <rect id="Rectangle_9" data-name="Rectangle 9" width="793" height="1024" fill="#fff"/> </clipPath> <filter id="Path_12714" x="-258.718" y="668.282" width="1450.299" height="710.185" filterUnits="userSpaceOnUse"> <feOffset dy="13" input="SourceAlpha"/> <feGaussianBlur stdDeviation="15.5" result="blur"/> <feFlood flood-opacity="0.161"/> <feComposite operator="in" in2="blur"/> <feComposite in="SourceGraphic"/> </filter> <filter id="Path_12715" x="-105.819" y="797.563" width="1134.181" height="538.486" filterUnits="userSpaceOnUse"> <feOffset dy="15" input="SourceAlpha"/> <feGaussianBlur stdDeviation="17" result="blur-2"/> <feFlood flood-opacity="0.349"/> <feComposite operator="in" in2="blur-2"/> <feComposite in="SourceGraphic"/> </filter> </defs> <g id="Rectangle_8" data-name="Rectangle 8" stroke="<?php echo $wo['config']['btn_background_color'];?>" stroke-width="1" fill="url(#linear-gradient)" style="mix-blend-mode: multiply;isolation: isolate"> <rect width="793" height="1024" stroke="none"/> <rect x="0.5" y="0.5" width="792" height="1023" fill="none"/> </g> <g id="Mask_Group_4" data-name="Mask Group 4" clip-path="url(#clip-path)"> <g id="Group_13906" data-name="Group 13906" transform="translate(1227.782 1153.043) rotate(180)" opacity="0.54"> <path id="Path_12713" data-name="Path 12713" d="M-5894.321-7099.4s163.513,301.819,384.911,412.243,267.171-29.452,500.682,29.452,205.095,175.206,371.288,195.191,226.553,0,293.483-144.4-39.545-197.743-39.545-346.053,39.545-218.046,39.545-218.046Z" transform="translate(5874.603 7034.028)" fill="<?php echo $wo['config']['btn_background_color'];?>" opacity="0.68"/> <g transform="matrix(-1, 0, 0, -1, 1227.78, 1153.04)" filter="url(#Path_12714)"> <path id="Path_12714-2" data-name="Path 12714" d="M-5894.321-7109.194s141.139,260.521,332.244,355.836,230.614-25.422,432.174,25.422,177.032,151.232,320.484,168.483,195.554,0,253.326-124.639-34.134-170.686-34.134-298.7,34.134-188.211,34.134-188.211Z" transform="translate(-4749.24 -5852.04) rotate(180)" fill="<?php echo $wo['config']['btn_background_color'];?>" opacity="0.46"/> </g> <g transform="matrix(-1, 0, 0, -1, 1227.78, 1153.04)" filter="url(#Path_12715)"> <path id="Path_12715-2" data-name="Path 12715" d="M-5894.321-7124s107.332,198.118,252.66,270.6,204.216-38.665,357.5,0,183.031,93.193,210.813,104.632,152.776,42.826,196.709-51.958-25.958-129.8-25.958-227.154,25.958-143.128,25.958-143.128Z" transform="translate(-4916.96 -5900.96) rotate(180)" fill="<?php echo $wo['config']['btn_background_color'];?>" opacity="0.77"/> </g> </g> </g> </svg>
		</div>

		<div class="col-md-6">
			<div class="login_innre">
		<form id="confirm-form" method="post">
			<p class="title main"><?php echo $wo['lang']['confirm_your_account']?></p>
			<p class="desc"><?php echo $wo['lang']['sign_in_attempt']?></p>
			<p class="desc"><?php echo $wo['lang']['we_have_sent_you_code']?></p>
			<div class="alert alert-danger errors"></div>
			<div class="alert_re"></div>
			<div class="wow_form_fields">
				<label for="confirm_code">Confirmation code</label>
				<input id="confirm_code" name="confirm_code" type="text" autofocus />
				<div class="send_again">
					<p id="countDownDateTimer" class="hidden"></p>&nbsp;&nbsp;<a type="button" onclick="Wo_ResendTwoCode()" class="btn main btn-mat" id="resendCode"><?php echo $wo['lang']['send_again']?></a>
				</div>
			</div>
			<div class="login_signup_combo">
				<div class="login__">
					<button type="submit" class="btn btn-main btn-mat add_wow_loader"><?php echo $wo['lang']['confirm']?></button>
				</div>
				<div class="signup__"></div>
			</div>
		</form>
		</div>
		<div class="footer">
				<?php echo lui_LoadPage('footer/welcome');?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<script>
	
function Wo_ResendTwoCode() {
	$('#resendCode').attr('disabled','true');
	$('#resendCode').text("<?php echo $wo["lang"]["please_wait"]?>");
	$.post(Wo_Ajax_Requests_File() + '?f=resend_two_factor', function (data) {
		
	  $('#resendCode').text("<?php echo $wo["lang"]["send_again"]?>");
        if (data.status == 200) {
        	$('#countDownDateTimer').removeClass('hidden');
        	var countDownDate = new Date().getTime() + (60000 * 1);
					var x = setInterval(function() {

					  // Get today's date and time
					  var now = new Date().getTime();

					  // Find the distance between now and the count down date
					  var distance = countDownDate - now;
					  console.log(countDownDate);

					  // Time calculations for days, hours, minutes and seconds
					  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
					  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
					  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
					  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

					  // Display the result in the element with id="demo"
					  document.getElementById("countDownDateTimer").innerHTML = minutes + "m " + seconds + "s ";

					  // If the count down is finished, write some text
					  if (distance < 0) {
					  	$('#countDownDateTimer').addClass('hidden');
					  	$('#countDownDateTimer').html('');
					  	$('#resendCode').removeAttr('disabled');
					    clearInterval(x);

					  }
					}, 1000);
        	$('.alert_re').html("<div class='alert alert-success'>"+data.message+"</div>");
        	setTimeout(function () {
						$('.alert_re').html("");
					},3000);
        }
        else{
        	$('#resendCode').removeAttr('disabled');
        	$('.alert_re').html("<div class='alert alert-danger'>"+data.message+"</div>");
					setTimeout(function () {
						$('.alert_re').html("");
					},3000);
        }
    }).fail(function(data) {
    	$('#resendCode').removeAttr('disabled');
	    $('#resendCode').text("<?php echo $wo["lang"]["send_again"]?>");
    	$('.alert_re').html("<div class='alert alert-danger'>"+data.message+"</div>");
			setTimeout(function () {
				$('.alert_re').html("");
			},3000);
	});
}
var working = false;
var $this = $('#confirm-form');
var $state = $this.find('.errors');
$(function() {
  $this.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=confirm_user_unusal_login',
    beforeSend: function() {
		working = true;$this.find('button').attr("disabled", true);
		$this.find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      if (data.status == 200) {
				$state.removeClass('alert-danger');
      	$state.addClass('alert-success');
        $state.html('<?php echo $wo['lang']['welcome_'] ?>');
		$this.find('.add_wow_loader').removeClass('btn-loading');
        setTimeout(function () {
         window.location.href = data.location;
        }, 1000);
      } else {
        $this.find('button').attr("disabled", false);
		$this.find('.add_wow_loader').removeClass('btn-loading');
        $state.html(data.errors);
      }
      working = false;
    }
  });
});
</script>
