<style type="text/css">
	.contenido_contacto_s{
		width:100%;
		max-width:600px;
		border-radius:10px;
		box-shadow: 0 4px 6px -1px rgba(0,0,0,.1), 0 2px 4px -1px rgba(0,0,0,.06);
		background:#fff;
		margin:50px auto;
		padding:10px;
		border:1 px solid #ddd;
	}
	.header_contacto{width:100%;padding:10px;user-select:none;color:#555;font-family:sans-serif;text-align:center;}
	.contacto_contenido{display:flex;flex-wrap:wrap;width:100%;position:relative;}
	.contacto_formulario{width:100%;display:flex;flex-wrap:wrap;padding:20px;}
	.contacto_contenido label{display:block;width:100%;font-family:sans-serif;text-transform:uppercase;padding:5px 0;color:#555}
	.contacto_contenido textarea,
	.contacto_contenido input{display:block;width:100%;outline:none;border-radius:6px;padding:15px 10px;border:1px solid transparent;transition:all 1s ease;background:#f7fafc;box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);}
	.contacto_contenido textarea:focus,
	.contacto_contenido input:focus,
	.contacto_contenido textarea:hover,
	.contacto_contenido input:hover{border:1px solid #FAFAFA;background:#fff;}
	.seleccionar_terminos{display:flex;width:100%;padding:20px;}
	.seleccionar_terminos input{display:inline-block;width:auto;box-shadow:initial;height:30px;width:20px;margin-right:5px;}
	.seleccionar_terminos label a{color:#069;}
	.contenido_boton_ent{display:flex;align-items:flex-end;width:100%;}
	.buton_enviar_contact{display:block;width:100%;padding:10px;text-align:center;background:#3498db;color:#fff;border:1px solid transparent;cursor:pointer;align-self:flex-end;border-radius:5px;user-select:none;transition:all .5s linear;}
	.buton_enviar_contact:hover,.buton_enviar_contact:focus{opacity:.8;font-size:14px;}
	.alretcomtacto{
    display: block;
    width: 100%;
    padding: 10px 0;
    text-align: center;
    border-radius: 4px;
    margin: 10px auto;
}
.contact-us-alert{width:100%;}
.alretcom_s{
    background: rgba(46, 204, 113,0.23);
    color: rgba(46, 204, 113,1.0);
    border: 2px solid rgba(46, 204, 113,1.0);
    border: 2px solid rgba(46, 204, 113,1.0);
}
.alretcom_w{
    background: rgba(241, 196, 15,0.23);
    color: rgba(241, 196, 15,1.0);
    border: 2px solid rgba(241, 196, 15,1.0);
    border: 2px solid rgba(241, 196, 15,1.0);
}
.alretcom_f{
    background:rgba(231, 76, 60,0.23);
    color: rgba(231, 76, 60,1.0);
    border: 2px solid rgba(231, 76, 60,1.0);
    border: 2px solid rgba(231, 76, 60,1.0);
  }
</style>
<div class="contenido_contacto_s">
	<div class="header_contacto">
			<h1><?php echo $wo['lang']['contact_us']; ?></h1>
	</div>

	
	<div class="contacto_contenido">
		<form class="contacto_formulario" method="post">
			<label for="first_name"><?php echo $wo['lang']['first_name']; ?></label>
			<input id="first_name" name="first_name" type="text" autocomplete="off">
			<label for="last_name"><?php echo $wo['lang']['last_name']; ?></label>
			<input id="last_name" name="last_name" type="text" autocomplete="off">
			<label for="email"><?php echo $wo['lang']['email']; ?></label>
			<input id="email" name="email" type="email" autocomplete="off">
			<label for="message"><?php echo $wo['lang']['message']; ?></label>
			<textarea name="message" id="message" rows="5"></textarea>
			<?php if ($wo['config']['reCaptcha'] == 1 && !empty($wo['config']['reCaptchaKey'])) { ?>
				<div class="g-recaptcha" data-sitekey="<?php echo $wo['config']['reCaptchaKey']?>"></div>
			<?php } ?>
			<div class="seleccionar_terminos">
				<input type="checkbox" name="accept_terms" id="accept_terms" onchange="activateButton(this)">
				<label for="accept_terms"><?php echo str_replace('{Privacidad}', '<a href="'.lui_SeoLink('index.php?link1=terms&type=privacy-policy').'">'.$wo['lang']['privacy_policy'].'</a>', $wo['lang']['terms_contact']);?></label>
			</div>
			<div class="contact-us-alert setting-update-alert"></div>
			<div class="contenido_boton_ent">
				<button class="buton_enviar_contact add_wow_loader" type="submit" name="send" id="send" disabled><?php echo $wo['lang']['send']; ?></button>
			</div>
		</form>
	</div>
</div>
<!-- .page-margin -->
<script>
function activateButton(element) {
	if(element.checked) {
		document.getElementById("send").disabled = false;
	}
	else  {
		document.getElementById("send").disabled = true;
	}
};

   $(function() {
     $('form.contacto_formulario').ajaxForm({
       url: Wo_Ajax_Requests_File() + '?f=contact_us',
       beforeSend: function() {
		 $('form.contacto_formulario').find('.add_wow_loader').addClass('btn-loading');
       },
       success: function(data) {
         if (data.status == 200) {
            $('.contact-us-alert').html('<div class="alretcomtacto alretcom_s alert alert-success">' + data.message + '</div>');
            $('.alretcom_s').fadeIn(300);
         } else {
             var errors = data.errors.join("<br>");
             $('.contact-us-alert').html('<div class="alretcomtacto alretcom_f alert alert-danger">' + errors + '</div>');
             $('.alretcom_f').fadeIn(300);
         }
         $('form.contacto_formulario').find('.add_wow_loader').removeClass('btn-loading');
       }
     });
   });
</script>