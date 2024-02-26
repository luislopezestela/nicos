<style type="text/css">
.alert-danger {
    background-color: rgba(244, 67, 54, 0.1);
    color: #F44336;
}
.alert{
    border: 0;
    font-weight: bold;
    font-family: Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;
    padding: 15px;
    border-radius: 4px;
}
.container_acceder{
    width: 100vw;
    height: calc(100vh - 160px);
    display: grid;
    grid-template-columns: 1fr;
    grid-gap :7rem;
    padding: 0 2rem;
}

.login-content{
	display: flex;
	justify-content:center;
	align-items: center;
	text-align: center;
}
form{
	width: 360px;
}

.login-content .perfil_imagesvg{
    height: 100px;
    color:var(--boton-fondo);
    max-width:100%;
}
.terms{display:flex;padding:17px 0;}
.terms input{width:25px;height:25px;padding-right:7px;}
.terms label{padding:3px 10px;}
.errors, .success{padding: 12px;border-radius: 12px;border: 0;font-size: 15px;user-select:none;}
.errors:empty, .success:empty {padding: 0;}
.errors svg {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.login-content h2{
	margin: 15px 0;
	color: #333;
	text-transform: uppercase;
	font-size: 2.9rem;
	font-family:fantasy;
}

.login-content .input-div{
	position: relative;
    display: grid;
    grid-template-columns: 7% 93%;
    margin: 25px 0;
    padding: 5px 0;
    border-bottom: 2px solid #d9d9d9;
}

.login-content .input-div.one{
	margin-top: 0;
}

.i{
	color: #d9d9d9;
	display: flex;
	justify-content: center;
	align-items: center;
}

.i i{
	transition: .3s;
}

.input-div > div{
    position: relative;
	height: 45px;
}

.input-div > div > h5{
	position: absolute;
	left: 10px;
	top: 50%;
	transform: translateY(-50%);
	color: #999;
	font-size: 18px;
	transition: .3s;
}

.input-div:before, .input-div:after{
	content: '';
	position: absolute;
	bottom: -2px;
	width: 0%;
	height: 2px;
	background-color: #38d39f;
	transition: .4s;
}

.input-div:before{
	right: 50%;
}

.input-div:after{
	left: 50%;
}

.input-div.focus:before, .input-div.focus:after{
	width: 50%;
}

.input-div.focus > div > h5{
	top: -5px;
	font-size: 15px;
}

.input-div.focus > .i > i{
	color: #38d39f;
}

.input-div > div > input{
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	border: none;
	outline: none;
	background: none;
	padding: 0.5rem 0.7rem;
	font-size: 1.2rem;
	color: #555;
	font-family: 'poppins', sans-serif;
}

.input-div.pass{
	margin-bottom: 4px;
}

a{
	text-decoration: none;
	color: #999;
	font-size: 0.9rem;
	transition: .3s;
}

a:hover{
	color: #38d39f;
}
.random_users{margin-top:80px}
.users-profiles{padding:0;width:100%;margin:30px auto 0;text-align:center;display:block}
.user-image, .user-image img {width:44px;height:44px;border-radius:50%}
.user-image {display: inline-block;margin: -7px -4px;box-shadow: 0 0 0 2px #ffffff;}
.terms{padding-left:22px}
.terms input[type=checkbox]{opacity:0;margin:0 0 6px 4px;display:none}
.terms label::after,.terms label::before{display:inline-block;left:0;margin-left:-20px}
.terms label{padding-left: 20px;cursor: pointer;user-select: none;font-size: 16px;opacity: 0.9;}
.terms label::before{content:"";position:absolute;width: 24px;height: 24px;top: -1px;border: 2px solid #b4b4b4;border-radius: 5px;transition:all 90ms cubic-bezier(0,0,.2,.1)}
.terms input[type=checkbox]:checked+label::before{background-color:#1e2322;border-color:#1e2322}
.terms label::after{position:absolute;width:16px;height:16px;top:0;padding-left:3px;padding-top:1px;font-size:11px;color:#555}
.terms input[type=checkbox]:checked+label::after{border:2px solid #fff;border-top:none;border-right:none;content:"";height:5px;left:7px;position:absolute;top:7px;transform:rotate(-45deg);width:10px;transition:.2s;color:#fff}
.typed-cursor{opacity:1;-webkit-animation:blink .7s infinite;-moz-animation:blink .7s infinite;animation:blink .7s infinite;color:#e9e9e9;font-size:28px}@keyframes blink{0%,100%{opacity:1}50%{opacity:0}}@-webkit-keyframes blink{0%,100%{opacity:1}50%{opacity:0}}

.btn{
	display: block;
	width: 100%;
	height: 50px;
	border-radius: 25px;
	outline: none;
	border: none;
	background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
	background-size: 200%;
	font-size: 1.2rem;
	color: #fff;
	font-family: 'Poppins', sans-serif;
	text-transform: uppercase;
	margin: 1rem 0;
	cursor: pointer;
	transition: 777ms;
}
.btn:hover{
	background-position: right;
	display: block;
	background-image: linear-gradient(to left, aqua, #38d39f, lightcyan);
	transform: scale(104%);
}


@media screen and (max-width: 1050px){
	.container_acceder{
		grid-gap: 5rem;
	}
}

@media screen and (max-width: 1000px){
	form{
		width: 290px;
	}

	.login-content h2{
        font-size: 2.4rem;
        margin: 8px 0;
	}

	.img img{
		width: 400px;
	}
}

@media screen and (max-width: 900px){
	.container_acceder{
		grid-template-columns: 1fr;
	}

	.img{
		display: none;
	}

	.wave{
		display: none;
	}

	.login-content{
		justify-content: center;
	}
}
</style>
<div class="container_acceder">
	<div class="login-content forgot_pass">
		<div class="login_left_combo_parent">
			<div class="login_left_combo">
				<?php
			$allow_switch = false;
			if ($wo['config']['sms_provider'] == 'twilio') {
        if( $wo['config']['sms_twilio_username'] !== "" AND  $wo['config']['sms_twilio_password'] !== "" ){
					if( $wo['config']['emailValidation'] == 1 ) {
						if( $wo['config']['sms_or_email'] == "sms" ) {
							$allow_switch = true;
						}
					}
				}
			} else if ($wo['config']['sms_provider'] == 'bulksms') {
        if( $wo['config']['sms_username'] !== "" AND  $wo['config']['sms_password'] !== "" ){
					if( $wo['config']['emailValidation'] == 1 ) {
						if( $wo['config']['sms_or_email'] == "sms" ) {
							$allow_switch = true;
						}
					}
				}
			} else if ($wo['config']['sms_provider'] == 'infobip') {
        if( $wo['config']['infobip_api_key'] !== "" AND  $wo['config']['infobip_base_url'] !== "" ){
					if( $wo['config']['emailValidation'] == 1 ) {
						if( $wo['config']['sms_or_email'] == "sms" ) {
							$allow_switch = true;
						}
					}
				}
			}
		?>

		<?php if( $allow_switch ){ ?>
			<form  class="x_chooser">
				<p class="title main"><?php echo $wo['lang']['forgot_your_password']; ?></p>
				<div class="login_signup_combo wow_forgot_choice">
					<div class="login__">
						<button type="button" class="btn btn-main btn-mat" id="recover_password_by_email"><?php echo $wo['lang']['recover_password_by_email']?></button>&nbsp;&nbsp;
						<button type="button" class="btn btn-main btn-mat" id="recover_password_by_sms"><?php echo $wo['lang']['recover_password_by_sms']?></button>
					</div>
				</div>
			</form>
		<?php } ?>

		<form id="forgot-form" class="recover_password_by_email" method="post" <?php if( $allow_switch ){ echo 'style="display: none;"'; } ?>>
			<p class="title main"><?php echo $wo['lang']['forgot_your_password']; ?></p>
			<div class="alert alert-danger errors"></div>
			<div class="input-div one">
				<div class="i">
          <i><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></i>
        </div>
        <div class="div">
					<h5 for="recoveremail"><?php echo $wo['lang']['email']?></h5>
					<input class="input" id="recoveremail" name="recoveremail" type="email" autofocus />
				</div>
			</div>
			<?php if($wo['config']['reCaptcha'] == 1) {?>
				<div class="form-group" style="margin-top:10px;">
					<div class="g-recaptcha" data-sitekey="<?php echo $wo['config']['reCaptchaKey']?>"></div>
				</div>
			<?php } ?>
			<div class="login_signup_combo">
				<div class="login__">
					<button type="submit" class="btn btn-main btn-mat add_wow_loader"><?php echo $wo['lang']['recover_password']?></button>
				</div>
				<div class="signup__">
					<p><?php echo $wo['lang']['already_have_account']?> <a class="dec" href="<?=lui_SeoLink('index.php?link1=acceder');?>"><?php echo $wo['lang']['login']?></a></p>
				</div>
			</div>
		</form>

		<form id="forgot-form-sms" class="recover_password_by_sms" method="post" style="display: none;">
			<p class="title main"><?php echo $wo['lang']['forgot_your_password']; ?></p>
			<div class="errors"></div>
			<div class="input-div one">
				<div class="i">
          <i><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></i>
        </div>
        <div class="div">
					<h5 for="recoverphone"><?php echo $wo['lang']['phone_number']?></h5>
					<input class="input" id="recoverphone" name="recoverphone" type="text" autofocus />
				</div>
			</div>

			<div class="login_signup_combo">
				<div class="login__">
					<button type="submit" class="btn btn-main btn-mat add_wow_loader"><?php echo $wo['lang']['recover_password']?></button>
				</div>
				<div class="signup__">
					<p><?php echo $wo['lang']['already_have_account']?> <a class="dec" href="<?=lui_SeoLink('index.php?link1=acceder');?>"><?php echo $wo['lang']['login']?></a></p>
				</div>
			</div>
		</form>
			</div>
		</div>

		

	</div>
</div>

<script>
var working = false;
var $this = $('#forgot-form');
var $this_sms = $('#forgot-form-sms');
var $state = $this.find('.errors');
var $state_sms = $this_sms.find('.errors');
$(function() {
	$('#recover_password_by_email').click(function(){
		$('.x_chooser').hide();
		$('.recover_password_by_email').show();
	});
	$('#recover_password_by_sms').click(function(){
		$('.x_chooser').hide();
		$('.recover_password_by_sms').show();
	});

  Wo_SetTimer();
  $this.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=recover',
    beforeSend: function() {
		working = true;
		$this.find('button').attr("disabled", true);
		$this.find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      if (data.status == 200) {
				$state.removeClass('alert-danger');
      	$state.addClass('alert-success');
        $state.html('<?php echo $wo['lang']['email_sent'] ?>');
		$this.find('.add_wow_loader').removeClass('btn-loading');
      } else {
		$this.find('button').attr("disabled", false);
		$this.find('.add_wow_loader').removeClass('btn-loading');
        $state.html(data.errors);
      }
      working = false;
    }
  });

	$this_sms.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=recoversms',
    beforeSend: function() {
		working = true;
		$this_sms.find('button').attr("disabled", true);
		$this_sms.find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      if (data.status == 200) {
				$state_sms.removeClass('alert-danger');
      	$state_sms.addClass('alert-success');
        $state_sms.html('<?php echo $wo['lang']['recoversms_sent'] ?>');
				$this_sms.find('.add_wow_loader').removeClass('btn-loading');
				setTimeout(function () {
         window.location.href = data.location;
        }, 1000);
      } else {
				$this_sms.find('button').attr("disabled", false);
				$this_sms.find('.add_wow_loader').removeClass('btn-loading');
        $state_sms.html(data.errors);
      }
      working = false;
    }
  });


});
const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});
</script>
