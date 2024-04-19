<?php 
$images = array();
for ($i=0; $i < 100 ; $i++) { 
  $rand = rand(1,30);
  if (!in_array($rand, $images) && count($images) < 4) {
    $images[] = $rand;
  }
  if (count($images) == 4) {
    break;
  }
}
 ?>

<style type="text/css">
.sun_startup{width:100%;max-width:1050px;}
.add-photo{padding:20px;}
.sun_startup{width:100%;background:#fff;margin:30px auto 35px;box-shadow:0 2px 7px rgba(0, 0, 0, 0.1);border-radius:7px;}
.sun_startup h2{color:#212121;font-size:26px;margin:10px 0 8px;font-family:-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;}
.sun_startup h4{margin-bottom:40px;font-size:16px;font-family:-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;font-weight:400;}
.add-photo h4, .skip-step{color:#666;}
.upload-image, .upload-image img{width:250px;height:250px;max-width:100%;}
.sun_startup .upload-image{border:2px dashed #8e8e8e;margin:auto;width:180px;height:180px;border-radius:50%;margin-bottom:40px;}
.sun_startup .upload-image img{width:180px;height:180px;border-radius:50%;object-fit:cover;box-shadow:0 1px 4px rgba(0, 0, 0, 0.2);}
.upload-image{display:table;overflow:hidden;cursor:pointer;}
.pricing, .upload-image-content{transition:all .2s ease-in-out;text-align:center;}
.upload-image-content{font-size:15px;color:#555;display:table-cell;vertical-align:middle;}
.sun_startup .upload-image-content, .sun_choose_pics p{font-weight:500;font-size:13px;font-family:-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;}
.sun_startup .upload-image-content svg{width:34px;height:34px;margin-bottom:5px;}
.sun_startup .continue-button{padding:14px 5px 5px;border-top:1px solid #e8e8e8;display:flex;align-items:center;margin-bottom:-9px;}
.skip-step{cursor:pointer;}
.sun_startup .continue-button small{font-size:14px;font-family:-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;font-weight:500;text-decoration:none;}
.btn-main{transition:all .1s;}
.btn-main{color:var(--boton-color);background-color:var(--boton-fondo);border-color:var(--boton-fondo);}
.sun_startup .continue-button .btn{margin-left:auto;height:38px;width:auto;min-width:150px;box-shadow:0 1px 3px rgba(0, 0, 0, 0.2);}
.clear{clear:both;}
.profile-avatar-changer{position:absolute;bottom:0;text-align:center;left:0;right:0;display:none;}
input[type=file]{display: block;}
.progress-bar-striped, .progress-striped .progress-bar{background-image: linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);-webkit-background-size:40px 40px;background-size:40px 40px;}
.progress-bar{float:left;width:0;height:100%;font-size:12px;line-height:20px;color:#fff;text-align:center;background-color:#337ab7;-webkit-box-shadow:inset 0 -1px 0 rgba(0,0,0,.15);box-shadow:inset 0 -1px 0 rgba(0,0,0,.15);-webkit-transition:width .6s ease;-o-transition:width .6s ease;transition:width .6s ease;}
.progress-bar.active, .progress.active .progress-bar{-webkit-animation:progress-bar-stripes 2s linear infinite;-o-animation:progress-bar-stripes 2s linear infinite;animation:progress-bar-stripes 2s linear infinite;}
#bar, #progress,.new-update-alert,.posts-container{border-radius:3px;}
#emo-form, #photo-form, #progress{position:relative;}
#progress{width:100%;padding:4px;display:none;}
.add-photo #progress{width:250px;max-width:100%;padding:0;margin-top:10px;}
.sun_startup #progress{margin:40px auto 20px;width:100%;max-width:350px;}
#percent{position:absolute;left:50%;}
.add-photo #percent{left:46%;}
.progress{height:20px;background-color:#f5f5f5;border-radius:3px;-webkit-box-shadow:inset 0 1px 2px rgba(0,0,0,.1);box-shadow:inset 0 1px 2px rgba(0,0,0,.1);}
#bar,#progress,.new-update-alert, .posts-container{border-radius:3px;}
#bar{height:20px;width:0;}
#bar{background-color:var(--boton-fondo);}
</style>
<div class="add-photo sun_startup">
	<div class="text-center">
		<h2><?php echo $wo['lang']['add_photo'];?></h2>
        <h4><?php echo $wo['lang']['add_photo_des'];?></h4>
        <div class="upload-image" onclick="document.getElementById('avatar').click(); return false">
			<div class="upload-image-content">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6 L19,4 L21,4 L21,6 L23,6 L23,8 L21,8 L21,10 L19,10 L19,8 L17,8 L17,6 L19,6 Z M6.93701956,5.8453758 C7.00786802,5.74688188 7.08655595,5.62630624 7.18689462,5.46372136 C7.24312129,5.37261385 7.44826978,5.03326386 7.48180256,4.97841198 C8.31078556,3.62238733 8.91339479,3 10,3 L15,3 L15,5 L10,5 C9.91327186,5 9.64050202,5.28172235 9.18819752,6.02158802 C9.15916322,6.06908141 8.95096113,6.41348258 8.88887147,6.51409025 C8.76591846,6.71331853 8.66374696,6.86987867 8.56061313,7.0132559 C8.1123689,7.63640757 7.66434207,8 7.0000003,8 L4,8 C3.44771525,8 3,8.44771525 3,9 L3,18 C3,18.5522847 3.44771525,19 4,19 L20,19 C20.5522847,19 21,18.5522847 21,18 L21,12 L23,12 L23,18 C23,19.6568542 21.6568542,21 20,21 L4,21 C2.34314575,21 1,19.6568542 1,18 L1,9 C1,7.34314575 2.34314575,6 4,6 L6.81619668,6 C6.84948949,5.96193949 6.89029794,5.91032846 6.93701956,5.8453758 Z M12,18 C9.23857625,18 7,15.7614237 7,13 C7,10.2385763 9.23857625,8 12,8 C14.7614237,8 17,10.2385763 17,13 C17,15.7614237 14.7614237,18 12,18 Z M12,16 C13.6568542,16 15,14.6568542 15,13 C15,11.3431458 13.6568542,10 12,10 C10.3431458,10 9,11.3431458 9,13 C9,14.6568542 10.3431458,16 12,16 Z"/></svg><br><?php echo $wo['lang']['upload_your_photo'];?>
        	</div>
        </div>
		<!-- <div class="ui horizontal divider"><?php echo $wo['lang']['or'];?>&nbsp;</div> -->
		
		<!-- <div class="sun_choose_pics">
			<p><?php echo $wo['lang']['choose_image'];?></p>
			<ul class="mb0 list-unstyled">
				<li>
					<label>
						<input type="radio" onchange="Wo_UpdateProfileAvatar();" name="pro-pic" value="<?php echo($images[0]) ?>">
						<img src="<?php echo $wo['config']['site_url'].'/upload/photos/'.$images[0].'.jpg';?>" alt="">
					</label>
				</li>
				<li>
					<label>
						<input type="radio" onchange="Wo_UpdateProfileAvatar();" name="pro-pic" value="<?php echo($images[1]) ?>">
						<img src="<?php echo $wo['config']['site_url'].'/upload/photos/'.$images[1].'.jpg';?>" alt="">
					</label>
				</li>
				<li>
					<label>
						<input type="radio" onchange="Wo_UpdateProfileAvatar();" name="pro-pic" value="<?php echo($images[2]) ?>">
						<img src="<?php echo $wo['config']['site_url'].'/upload/photos/'.$images[2].'.jpg';?>" alt="">
					</label>
				</li>
				<li>
					<label>
						<input type="radio" onchange="Wo_UpdateProfileAvatar();" name="pro-pic" value="<?php echo($images[3]) ?>">
						<img src="<?php echo $wo['config']['site_url'].'/upload/photos/'.$images[3].'.jpg';?>" alt="">
					</label>
				</li>
			</ul>
		</div> -->
		
		<div id="progress">
            <span id="percent">0%</span>
            <div class="progress">
             <div id="bar" class="progress-bar progress-bar-striped active"></div> 
            </div>
            <div class="clear"></div>
		</div>
	</div>
	<div class="continue-button">
		<small class="skip-step" onclick="Wo_SkipStep('startup_image');"><?php echo $wo['lang']['skip'];?></small>
		<button class="btn con-button btn-main" disabled onclick="$('form.profile-avatar-changer').submit();"><?php echo $wo['lang']['start_up_continue'];?></button>
	</div>
	<div class="clear"></div>
</div>

<form action="#" method="post" class="profile-avatar-changer" style="display:none">
    <input type="file" id="avatar" name="avatar" accept="image/x-png, image/jpeg, image/webp" onchange="readURL(this);">
    <input type="hidden" name="selected_image" id="selected_image" value="0">
    <input type="hidden" name="user_id" id="user-id" value="<?php echo $wo['user']['user_id'];?>">
</form>
<script type="text/javascript">
var user_id = $('#user-id').val();
$(function () {
	var bar = $('#bar');
  var percent = $('#percent');
  var status = $('#status');
	$('form.profile-avatar-changer').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_user_avatar_picture&s=start',

    beforeSend: function () {
      var percentVal = '0%';
      bar.width(percentVal);
      percent.html(percentVal);
    },
    uploadProgress: function (event, position, total, percentComplete) {
      var percentVal = percentComplete + '%';
      bar.width(percentVal);
      $('#progress').slideDown(200);
      if(percentComplete > 50) {
        percent.addClass('white');
      }
      percent.html(percentVal);
    },
    success: function (data) {
      if(data.status == 200) {
        if (data.img != '') {
          $('.upload-image').html('<img src="' + data.img + '">');
          $('h2').text(data.big_text);
          var Title = $('<textarea />').html(data.small_text).text();
          $('h4').text(Title);
          $('.upload-image').css({'border': '0'});
          $('[id^=updateImage-' + user_id + ']').attr("src", data.img);
        }
      	$('#progress').slideUp(200);
        $('button').attr('disabled', false);
        $('.skip-step').hide();
        window.location.href = '<?php echo lui_SeoLink('index.php?link1=start-up');?>';
      }
      else{
        if(data.invalid_file == 3){
          $("#adult_image_file").modal('show');
          Wo_Delay(function(){
            $("#adult_image_file").modal('hide');
          },3000);
        }
      }
    }
  });
});

function Wo_UpdateProfileAvatar() {
  $('button').attr('disabled', false);
  radio = document.querySelector('input[name="pro-pic"]:checked').value;
  $('#selected_image').val(radio);
 
  //$("form.profile-avatar-changer").submit();
}
function readURL(input) {
  $('button').attr('disabled', false);
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('.upload-image').html('<img src="' + e.target.result + '">');
      };

      reader.readAsDataURL(input.files[0]);
  }
}
function Wo_NextStep() {
  $('button').attr('disabled', true);
  $('button').text("<?php echo $wo['lang']['please_wait'];?>");
  setTimeout(function() {
    window.location.href = '<?php echo lui_SeoLink('index.php?link1=start-up');?>';
  }, 1000);
}
</script>