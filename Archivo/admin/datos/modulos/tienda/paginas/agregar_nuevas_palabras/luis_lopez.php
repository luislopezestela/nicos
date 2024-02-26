<?php 
$base=Luis::basepage("base_page_admin");
$base_b=Luis::basepage("base_page");
$idioma = DatosLang::luis_lang_bd_names();
?><br>
<div class="contenido">
	<div id="list_carts_view"></div>
	

	<div class="contenidoboxplasstcread">
		<div class="contentboxitemslistcread">
		<center><label><?=Luis::lang("agregar_nuevas_palabras");?></label><hr><p><?=Luis::lang("agregar_palabras_en_todos_los_idiomas_existentes");?>.</p></center>
	</div>
            <div class="contentboxitemslistcread">
              <form class="form800goodlive_item_language" method="POST">

                <div class="contentboxfunst">
                	<?php foreach ($idioma as $key): ?>
                		<div class="boxinputlists">
                			<textarea cols="20" rows="2" data-editable="0" style="resize:none;min-height:100px;max-height:500px;padding:18px 5px;" class="inptexboslistspublic areatextolista" type="text" name="<?=$key;?>" autocomplete="off" required></textarea>
                			<label class="labelboxinptext"><?=ucwords($key);?></label>
                		</div>
                	<?php endforeach ?>
                  
                </div>

                <div class="aphlistbuttonnextopenbox">
                	<span class="message_lang_p"></span>
                  <button type="submit" class="button_view_sty btn_add_language_theme"><?=Luis::lang("agregar_palabra");?></button>
                </div>
              </form>
            </div>
          </div>
</div>

<script>
$(function() {
	$(document).on("submit", ".form800goodlive_item_language", function(e) {
		e.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			url: list_action()+"add_palabra_language",
			type:'POST',
			data:formData,
			dataType: "json",
			cache:false,
			contentType: false,
			processData: false,
			beforeSend: function() {
				$(".btn_add_language_theme").html('Espere un momento..');
			},
			success: function(data){
				if(data.estado==200){
					$("html, body").animate({ scrollTop: 0 }, "slow");
					$(".areatextolista").val("");
				}
				setTimeout(function () {
					$(".btn_add_language_theme").html("Agregar lenguage");
		        }, 1000);
		        setTimeout(function () {
		           window.location.href = list_urls()+"administrar_idioma";
		        }, 1300);
				
			}
		})
	})
});
</script>