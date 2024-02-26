<?php 
$base=BASE_URL_B;
$base_b=BASE_URL_A;

?><br>
<div class="contenido">
	<div id="list_carts_view"></div>
	

	<div class="contenidoboxplasstcread">
		<div class="contentboxitemslistcread">
		<center><label><?="Agregar idioma";?></label><hr><h4><?="Nota"." "."esto puede tardar hasta 5 minutos";?> </h4></center>
	</div>
            <div class="untmsd4ss4listticread"><?="nuevo idioma";?></div>
            <div class="contentboxitemslistcread">
              <form class="form800goodlive_item_language" method="POST">

                <div class="contentboxfunst">
                  <div class="boxinputlists">
                    <input class="inptexboslistspublic" type="text" id="lang" name="lang" autocomplete="off" required>
                    <label class="labelboxinptext"><?="nombre";?></label>
                  </div>
                </div>

                <div class="aphlistbuttonnextopenbox">
                	<span class="message_lang_p"></span>
                  <button type="submit" class="button_view_sty btn_add_language_theme"><?="agregar";?></button>
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
			url: list_action()+"add_language",
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
					$("#lang").val("");
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