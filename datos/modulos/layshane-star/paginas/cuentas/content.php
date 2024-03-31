<?php
$loadPage = lui_LoadPage('thirdparty/paypal-demo'); echo(!empty($loadPage)) ? $loadPage : '';
//$cuentas_corrientes = $db->where('id_usuario',lui_Secure($wo['user']['user_id']))->where('estado',1)->get("cuentas_corrientes");

$cuentas_corrientes_empresa = $db->where('es_empresa', 1)->get("cuentas_corrientes");
$cuentas_corrientes_empre_a = $db->where('es_empresa', 1)->where('estado',0)->getOne("cuentas_corrientes");
?>
<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>
<style type="text/css">
	body{background-color:#F0F2FD;}
</style>
<script type="text/javascript">
	var cuentas_a = document.querySelector('a[data-ajax="?link1=cuentas"]');
</script>
<div class="columna-8 sett_page wo_new_sett_pagee main_layshane_configuration_menu">
	<div class="wow_sett_sidebar button_controle_layshane_back_settign">
		<ul class="list-unstyled" style="padding-bottom:0;">
			<li class="">
				<a class="btn btn-default seleccionar_menu_laysh" style="background-color:#fff;">Menu</a>
			</li>
		</ul>
	</div>
	<br>
	
	<div class="wo_settings_page loader_page_content">
		<div class="profile-lists singlecol">

			<div class="avatar-holder mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr big_size" style="user-select:none;">
						<span style="color:#6c5ce7;">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
							    <path d="M2 8.56907C2 7.37289 2.48238 6.63982 3.48063 6.08428L7.58987 3.79744C9.7431 2.59915 10.8197 2 12 2C13.1803 2 14.2569 2.59915 16.4101 3.79744L20.5194 6.08428C21.5176 6.63982 22 7.3729 22 8.56907C22 8.89343 22 9.05561 21.9646 9.18894C21.7785 9.88945 21.1437 10 20.5307 10H3.46928C2.85627 10 2.22152 9.88944 2.03542 9.18894C2 9.05561 2 8.89343 2 8.56907Z" stroke="currentColor" stroke-width="1.5" />
							    <path d="M11.9959 7H12.0049" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							    <path d="M4 10V18.5M8 10V18.5" stroke="currentColor" stroke-width="1.5" />
							    <path d="M16 10V18.5M20 10V18.5" stroke="currentColor" stroke-width="1.5" />
							    <path d="M19 18.5H5C3.34315 18.5 2 19.8431 2 21.5C2 21.7761 2.22386 22 2.5 22H21.5C21.7761 22 22 21.7761 22 21.5C22 19.8431 20.6569 18.5 19 18.5Z" stroke="currentColor" stroke-width="1.5" />
							</svg>
						</span>
						<?php echo $wo['lang']['wallet']; ?>
					</div>
				</div>
				<?php if(lui_IsAdmin()): ?>
					<?php if(isset($cuentas_corrientes_empre_a->estado)): ?>
						<button class="btn_prin_compra boton_add_nluis first add_del_acount_banck">Eliminar</button>
					<?php else: ?>
						<button class="btn_prin_compra boton_add_nluis first add_new_acount_banck">Agregar</button>
					<?php endif ?>
				<?php else: ?>
				<?php endif ?>
				
			</div>
			<br><br>
			<?php if(lui_IsAdmin()): ?>
				<?php if (!empty($cuentas_corrientes_empresa)): ?>
					<?php if(isset($cuentas_corrientes_empre_a->estado)): ?>
						<style type="text/css">
							:root{--bs-columns:12;--bs-gap: 24px;}
							.contenedor_add_cuenta_bk{display:grid;width:100%;gap: var(--bs-gap, 1.5rem);grid-template-rows: repeat(var(--bs-rows, 1), 1fr);margin:0 auto; grid-template-columns:repeat(var(--bs-columns), 12);position:relative;}
							.bloque_svg_viewa{background:transparent;grid-column: span 5 / auto;float:left;}
							.bloque_lines_a{display:flex;justify-content:center;align-items:center;width:100%;gap:.1em;padding:10px;flex-wrap:wrap;}
							.bloque_lines_a span{padding:4px;text-transform:uppercase;letter-spacing:2px;width:100%;user-select:none;}
							.bloque_lines_a select,
							.bloque_lines_a input{width:100%;padding:15px;outline:none;border-radius:5px;border:2px dashed #ddd;transition:all .5s;}
							.bloque_lines_a select:focus,
							.bloque_lines_a input:focus{border:2px dashed #777;}
							.bloque_svg_viewb{background:transparent;grid-column: 6 / span 7;float:right;display:flex;justify-content:center;align-items:center;padding:20px;}
							.bloque_svg_viewb .loading-svg{width:100%;max-width:500px;max-height:100%;height:auto;}
							.loading-svg{display:none;}
							.loading-svg.show{display:block;animation: fadeIn 1.5s;}
							@keyframes fadeIn{0%{opacity:0;}100%{opacity:1;}}
							.input-container{position:relative;}
							#imagePreview{border-radius:8px;overflow:hidden;cursor:pointer;width:100px;height:100px;background-color:#f0f0f0;border:1px dashed; #ccc;display:flex;justify-content:center;align-items:center;margin-bottom:10px;}
							#imagePreview img{max-width:100%;max-height:100%;}
							#deleteButton{margin-top:10px;}
						</style>
						<div class="contenedor_add_cuenta_bk">
							<form class="bloque_svg_viewa">
								<span style="padding:10px;color:#6c5ce7;">CUENTA CORRIENTE</span>
								<div class="bloque_lines_a">
									<span>Nombre</span>
									<input type="text" name="nombre" placeholder="Nombre de la cuenta" autocomplete="off">
								</div>
								<div class="bloque_lines_a">
									<span for="currency_order"><?php echo $wo['lang']['currency']; ?></span>
									<select name="currency" id="currency_order" class="" style="cursor:pointer;">
										<option value="">Selecciona el tipo de moneda</option>
										<?php $chec_currecny_default='';?>
										<?php foreach ($wo['currencies'] as $key => $currency) { ?>
											<option value="<?php echo $currency['text'];?>"><?php echo  $currency['text'] ?> (<?php echo  $currency['symbol'] ?>)</option>
										<?php } ?>
									</select>
								</div>

								<div class="bloque_lines_a">
									<span>Numero de cuenta</span>
									<input type="text" name="numero_c" placeholder="Numero de cuenta" autocomplete="off">
								</div>
								<div class="bloque_lines_a">
									<span>CCI de cuenta</span>
									<input type="text" name="numero_cci" placeholder="CCI" autocomplete="off">
								</div>

								<div class="bloque_lines_a">
									<span>Nombre de banco</span>
									<input type="text" name="nombre_banco" placeholder="Nombre de banco" autocomplete="off">
								</div>
								<div class="bloque_lines_a">
									<span>Nombre corto de banco</span>
									<input type="text" name="nombre_corto_banco" placeholder="Nombre corto de banco" autocomplete="off">
								</div>

								<div class="bloque_lines_a" style="justify-content:flex-start;">
									<div class="input-container" style="position:relative;">
									  <input type="file" id="fileInput" accept="image/*" name="imagen" style="display: none;">
									  <label for="fileInput" class="input-label">
									    <div class="preview-container" id="imagePreview">
									      	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000" fill="none">
										    	<path d="M11.508 2.99023C7.02518 2.99023 4.78379 2.99023 3.39116 4.38232C1.99854 5.77441 1.99854 8.01494 1.99854 12.496C1.99854 16.977 1.99854 19.2176 3.39116 20.6097C4.78379 22.0018 7.02518 22.0018 11.508 22.0018C15.9907 22.0018 18.2321 22.0018 19.6248 20.6097C21.0174 19.2176 21.0174 16.977 21.0174 12.496V11.9957" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
										   		<path d="M4.99854 20.9897C9.20852 16.2384 13.9397 9.93721 20.9985 14.6631" stroke="currentColor" stroke-width="1.5" />
										    	<path d="M17.9958 1.99829V10.0064M22.0014 5.97728L13.9902 5.99217" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
											</svg>
									    </div>
									  </label>
									  <button id="deleteButton" class="btn" style="display:none;position:absolute;bottom:-30px;border-radius:20px;left:0;right:0;background:#e74c3c;color:#fff;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#fff" fill="none">
									    <path d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
									    <path d="M3 5.5H21M16.0557 5.5L15.3731 4.09173C14.9196 3.15626 14.6928 2.68852 14.3017 2.39681C14.215 2.3321 14.1231 2.27454 14.027 2.2247C13.5939 2 13.0741 2 12.0345 2C10.9688 2 10.436 2 9.99568 2.23412C9.8981 2.28601 9.80498 2.3459 9.71729 2.41317C9.32164 2.7167 9.10063 3.20155 8.65861 4.17126L8.05292 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
									    <path d="M9.5 16.5L9.5 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
									    <path d="M14.5 16.5L14.5 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
									</svg></button>
									</div>
								</div>
								<div class="alert_400 hidden"></div>
								<div class="bloque_lines_a" style="justify-content:flex-end;">
									<br><br>
									<button type="submit" class="btn btn-main btn-mat btn-default btn-mat-raised" style="background-color:var(--boton-fondo);color:var(--boton-color);"><?php echo $wo['lang']['continue'];?></button>
								</div>

							</form>
							
							<div class="bloque_svg_viewb">
								<svg class="loading-svg" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="816" height="548.78654" viewBox="0 0 816 548.78654" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M846.82973,247.21848l2.61791-20.98372a28.33616,28.33616,0,1,1,56.23635,7.016l-2.6179,20.98371a3.81065,3.81065,0,0,1-4.24829,3.30585l-48.68222-6.07353A3.81065,3.81065,0,0,1,846.82973,247.21848Z" transform="translate(-192 -175.60673)" fill="#2f2e41"/><circle cx="678.14891" cy="57.0969" r="20.77508" fill="#ffb8b8"/><path d="M842.58612,227.08356a22.44053,22.44053,0,0,1,25.01771-19.46777l4.197.52361a22.44035,22.44035,0,0,1,19.46756,25.01769l-.05236.41967-8.8691-1.1065-1.96825-8.84793-1.66169,8.39507-4.58363-.57185-.993-4.46421-.83853,4.2357-29.768-3.71381Z" transform="translate(-192 -175.60673)" fill="#2f2e41"/><path d="M768.53883,306.81217a9.56985,9.56985,0,0,0,14.30094,3.28866l18.86947,11.05367,9.514-9.82859L784.3567,296.09024a9.6217,9.6217,0,0,0-15.81787,10.72193Z" transform="translate(-192 -175.60673)" fill="#ffb8b8"/><path d="M830.38286,326.67441c-13.91846,0-38.41088-6.23076-39.76709-6.57889l-.42832-.10965,3.85482-19.51691,37.40966,7.38891,20.32328-28.61907,23.3329-2.37206-.65127.85708c-.30335.39931-30.38075,39.99325-35.06159,46.63518C838.214,326.03479,834.84006,326.67441,830.38286,326.67441Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/><path d="M834.11433,399.92576l-.55693-.2659c-.11855-.05665-11.94388-5.80861-18.06887-17.03749-6.09575-11.17589,22.44018-58.58409,24.43646-61.87353l.029-15.0556,10.26535-27.7154,13.09153-7.39942-11.24007,26.22646Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/><polygon points="628.999 386.136 616.487 386.135 610.535 337.875 629.001 337.876 628.999 386.136" fill="#ffb8b8"/><path d="M824.18966,573.87115l-40.34382-.00149v-.51029a15.70379,15.70379,0,0,1,15.70294-15.70269h.001l24.64063.001Z" transform="translate(-192 -175.60673)" fill="#2f2e41"/><polygon points="763.392 375.171 751.502 379.067 730.818 335.059 748.367 329.31 763.392 375.171" fill="#ffb8b8"/><path d="M962.20121,561.30994l-38.33848,12.56121-.1589-.48491a15.70379,15.70379,0,0,1,10.03258-19.81172l.00094-.00031,23.41587-7.67188Z" transform="translate(-192 -175.60673)" fill="#2f2e41"/><path d="M931.16686,542.88774l-35.668-59.54648-30.10994-63.61853-27.09519,56.1965-10.76357,72.78352-37.74751.52448.14871-.59027L847.697,319.10869l45.24128,6.75889-2.05933,29.86267,1.22646,1.74432c10.21989,14.51833,20.78677,29.52916,14.7262,45.71048l17.181,51.01471,38.03123,84.94532Z" transform="translate(-192 -175.60673)" fill="#2f2e41"/><path d="M849.76408,368.85422c-6.55558,0-14.035-7.48531-10.15478-20.26481l-.25128-.18183,9.31986-41.17653c-8.13338-11.63184,2.59-21.23153,3.59486-22.08907l5.11874-9.21364,22.58478-14.32325,11.42716,94.94569-.169.16173C882.9813,364.609,855.26317,368.85422,849.76408,368.85422Z" transform="translate(-192 -175.60673)" fill="#6c63ff"/><path d="M896.01687,390.27855a11.11742,11.11742,0,0,1-2.66788-.28234c-.87833-.22021-2.30033-1.33862-4.49763-8.49317-8.73553-28.44181-19.04931-114.02035-11.55623-122.39473l.17156-.19188,12.303,2.05042c1.0227-.75475,6.38929-4.50106,11.3415-3.84957a7.51617,7.51617,0,0,1,5.143,3.04l.08475.111,3.91946,55.76019,14.35888,65.61892-.34425.15625C923.43758,382.18378,905.50783,390.27855,896.01687,390.27855Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/><path d="M887.74285,368.48458a9.56982,9.56982,0,0,0,9.04074-11.55842l18.01019-12.40458L909.925,331.73827l-25.18784,17.8749a9.62169,9.62169,0,0,0,3.00574,18.87141Z" transform="translate(-192 -175.60673)" fill="#ffb8b8"/><path d="M908.851,354.46107l-16.04243-11.76433,22.55028-30.74991-17.30522-30.53837,7.7423-22.13887.50027.95348c.233.44407,23.34318,44.46917,27.37457,51.52457,4.19427,7.33912-23.3635,40.94536-24.53857,42.3717Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/><path d="M751.33869,420.02424l-294.77327,9.99145a27.52578,27.52578,0,0,1-28.41027-26.54747l-4.85458-143.22314A27.52574,27.52574,0,0,1,449.848,231.83481l294.77323-9.99142a27.52576,27.52576,0,0,1,28.41026,26.54746L777.88607,391.614A27.52579,27.52579,0,0,1,751.33869,420.02424Z" transform="translate(-192 -175.60673)" fill="#fff"/><path d="M777.88615,391.614l.0257.75778a26.25755,26.25755,0,0,1-25.35713,27.12781L456.30761,429.54088a26.25574,26.25574,0,0,1-27.12731-25.3488l-.02567-.75777Z" transform="translate(-192 -175.60673)" fill="#f2f2f2"/><path d="M486.8813,276.43024c-21.2293,6.01327-41.00614-9.806-44.87965-24.97217l1.48147-.31695C461.39237,246.54085,481.97234,258.7565,486.8813,276.43024Z" transform="translate(-192 -175.60673)" fill="#6c63ff"/><path d="M696.77054,378.81594c-4.78248.16212-8.63389-1.13119-11.44866-3.84452-6.36156-6.1328-6.3908-18.36835-6.41423-28.2-.007-2.86014-.01345-5.56195-.17588-7.81967l-.00177-.03413a16.77707,16.77707,0,0,1,16.1107-17.25L734.49,320.32376c4.77639-.1619,8.62388,1.12953,11.43671,3.83924,6.36114,6.12754,6.39457,18.36,6.42162,28.18905.0078,2.86622.01511,5.5737.1795,7.83543a16.7875,16.7875,0,0,1-16.11745,17.28477Zm-16.37566-39.96649c.16545,2.31176.172,5.03512.17885,7.91809.02278,9.517.05122,21.36135,5.9046,27.00416,2.51239,2.42188,5.86065,3.52715,10.23555,3.37892l39.63744-1.3435a15.11055,15.11055,0,0,0,14.51251-15.53344c-.1668-2.28521-.1742-5.0208-.18208-7.9172-.02615-9.51444-.05855-21.35582-5.91136-26.99339-2.51023-2.41829-5.85518-3.522-10.224-3.37394L694.89944,323.333A15.10664,15.10664,0,0,0,680.39488,338.84945Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/><path d="M478.17355,278.25952a37.17568,37.17568,0,0,1-19.82478-5.08419c-8.79033-5.05769-15.58106-13.405-17.722-21.7833l-.21459-.83978,2.31239-.49522c18.17653-4.66264,39.33177,7.66031,44.39159,25.86942l.22184.79844-.7973.22607A34.97981,34.97981,0,0,1,478.17355,278.25952Zm-35.70233-26.444c2.26073,7.67572,8.5889,15.24333,16.70861,19.91544a34.73328,34.73328,0,0,0,26.09479,3.83615c-5.22252-16.9474-25.07015-28.29134-42.15148-23.8917Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/><path d="M458.28005,373.67157a13.82949,13.82949,0,0,1-12.706-6.46241,17.29839,17.29839,0,0,1-.57987-16.9517,13.87828,13.87828,0,0,1,12.53472-7.32406l52.82914-1.79068a13.90288,13.90288,0,0,1,12.98823,6.46787,17.29807,17.29807,0,0,1,.573,16.94952c-2.48742,4.6075-6.93941,7.17428-12.53227,7.30928l-52.83011,1.7908Q458.41805,373.66669,458.28005,373.67157Zm-.95428-29.066a12.24775,12.24775,0,0,0-10.86482,6.44273,15.58376,15.58376,0,0,0,.52263,15.27171,12.25906,12.25906,0,0,0,11.50431,5.67518l52.85517-1.79156a12.27838,12.27838,0,0,0,11.10983-6.43519,15.58217,15.58217,0,0,0-.51664-15.26989,12.3121,12.3121,0,0,0-11.50993-5.69088l-52.85844,1.79168c-.08074.00154-.16188.00345-.24209.00615Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/><path d="M709.06217,341.01l-16.65388.5645a4.16587,4.16587,0,0,1-.28228-8.32695l16.65387-.56446a4.16587,4.16587,0,0,1,.28228,8.327Z" transform="translate(-192 -175.60673)" fill="#6c63ff"/><path d="M709.51374,354.33315l-16.65388.5645a4.16586,4.16586,0,1,1-.28222-8.32693l16.65388-.5645a4.16586,4.16586,0,1,1,.28222,8.32693Z" transform="translate(-192 -175.60673)" fill="#6c63ff"/><path d="M709.96531,367.65623l-16.65388.5645a4.16584,4.16584,0,1,1-.28222-8.3269l16.65387-.5645a4.16584,4.16584,0,1,1,.28223,8.3269Z" transform="translate(-192 -175.60673)" fill="#6c63ff"/><path d="M738.20632,340.02217l-16.65386.56447a4.16586,4.16586,0,1,1-.28222-8.32693h0l16.65387-.56446a4.16585,4.16585,0,1,1,.28221,8.32692Z" transform="translate(-192 -175.60673)" fill="#6c63ff"/><path d="M738.658,353.34528l-16.65388.56449a4.16585,4.16585,0,1,1-.28222-8.32692h0l16.65387-.56447a4.16586,4.16586,0,1,1,.28222,8.32693h0Z" transform="translate(-192 -175.60673)" fill="#6c63ff"/><path d="M739.10954,366.66836l-16.65387.56449a4.16584,4.16584,0,1,1-.28223-8.32689l16.65388-.5645a4.16584,4.16584,0,1,1,.28222,8.3269Z" transform="translate(-192 -175.60673)" fill="#6c63ff"/><rect x="425.28641" y="285.47855" width="348.93289" height="1.66635" transform="translate(-201.35499 -155.12487) rotate(-1.94135)" fill="#3f3d56"/><path d="M751.33869,420.02424l-294.77327,9.99145a27.52578,27.52578,0,0,1-28.41027-26.54747l-4.85458-143.22314A27.52574,27.52574,0,0,1,449.848,231.83481l294.77323-9.99142a27.52576,27.52576,0,0,1,28.41026,26.54746L777.88607,391.614A27.52579,27.52579,0,0,1,751.33869,420.02424ZM449.90452,233.50011A25.85768,25.85768,0,0,0,424.966,260.18855l4.85457,143.22318a25.85769,25.85769,0,0,0,26.68845,24.9385l294.77325-9.99138a25.8576,25.8576,0,0,0,24.9385-26.68845l-4.85455-143.22313a25.85771,25.85771,0,0,0-26.68844-24.93854Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/><path d="M328.99442,384.58773a10.03189,10.03189,0,0,0-12.24785-9.30676l-13.26633-18.69591-13.32774,5.29087L309.258,388.01506a10.08621,10.08621,0,0,0,19.73647-3.42733Z" transform="translate(-192 -175.60673)" fill="#a0616a"/><path d="M303.13883,383.20222l-40.14179-52.076,15.04078-47.27067c1.10219-11.88449,8.539-15.20306,8.85548-15.33866l.48268-.20708,13.08826,34.903-9.60985,25.62628,23.58711,39.67012Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/><path d="M442.54465,222.66949a10.03185,10.03185,0,0,0-8.33194,12.93076l-17.61425,14.67212,6.30549,12.87877,24.58372-21.06924a10.08622,10.08622,0,0,0-4.943-19.41241Z" transform="translate(-192 -175.60673)" fill="#a0616a"/><path d="M443.16234,248.55482l-48.81646,44.048-48.29206-11.341c-11.93413-.18-15.81776-7.338-15.97742-7.643l-.24378-.46523,33.78659-15.74766,26.29257,7.59976,37.7277-26.58366Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/><polygon points="166.605 386.085 179.721 386.085 185.96 335.494 166.602 335.495 166.605 386.085" fill="#a0616a"/><path d="M355.79425,557.94365h41.22168a0,0,0,0,1,0,0v15.92656a0,0,0,0,1,0,0H369.91339a14.11914,14.11914,0,0,1-14.11914-14.11914v-1.80742A0,0,0,0,1,355.79425,557.94365Z" transform="translate(560.83601 956.18995) rotate(179.99738)" fill="#2f2e41"/><polygon points="114.183 386.085 127.299 386.085 133.538 335.494 114.18 335.495 114.183 386.085" fill="#a0616a"/><path d="M303.37214,557.94365h41.22168a0,0,0,0,1,0,0v15.92656a0,0,0,0,1,0,0H317.49128a14.11914,14.11914,0,0,1-14.11914-14.11914v-1.80742A0,0,0,0,1,303.37214,557.94365Z" transform="translate(455.99179 956.19235) rotate(179.99738)" fill="#2f2e41"/><polygon points="109.518 201.425 110.588 276.314 111.657 374.739 135.194 372.599 146.962 236.73 161.94 372.599 186.239 372.599 188.686 235.66 180.127 205.704 109.518 201.425" fill="#2f2e41"/><path d="M347.58438,387.08816c-25.60915.002-49.18206-11.58881-49.50026-11.74791l-.26435-.13217-2.14907-51.57517c-.62318-1.82254-12.89465-37.7854-14.973-49.21608-2.10574-11.581,28.413-21.74474,32.119-22.93334l.841-9.31638,34.2-3.68523,4.3346,11.92071,12.26951,4.60067a6.06885,6.06885,0,0,1,3.76136,7.12962L361.404,289.86417l16.65477,91.74852-3.5856.15518A65.11242,65.11242,0,0,1,347.58438,387.08816Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/><circle cx="140.098" cy="32.35166" r="24.62419" fill="#a0616a"/><path d="M312.15251,231.79531c4.69278,4.99882,13.40791,2.31533,14.01939-4.51376a8.24947,8.24947,0,0,0-.01039-1.59332c-.31571-3.025-2.06332-5.77133-1.6447-8.96529a4.70141,4.70141,0,0,1,.86042-2.20088c3.73954-5.00759,12.51786,2.23975,16.04712-2.29346,2.16406-2.77966-.37977-7.1561,1.2809-10.26284,2.19181-4.1004,8.68386-2.07766,12.75506-4.32324,4.52971-2.49848,4.25878-9.44835,1.277-13.67561-3.63639-5.15533-10.01214-7.90621-16.30845-8.30266s-12.54924,1.30558-18.42742,3.59637c-6.67879,2.6028-13.30178,6.19991-17.41181,12.07259-4.99824,7.14181-5.47924,16.7433-2.97953,25.0943C303.13073,221.50751,308.32035,227.71324,312.15251,231.79531Z" transform="translate(-192 -175.60673)" fill="#2f2e41"/><path d="M1007,575.20813H193a1,1,0,0,1,0-2h814a1,1,0,0,1,0,2Z" transform="translate(-192 -175.60673)" fill="#cacaca"/><polygon points="453.926 537.335 465.74 537.334 471.36 491.766 453.924 491.767 453.926 537.335" fill="#ffb8b8"/><path d="M642.91266,709.08439l23.26586-.00094h.00094a14.82762,14.82762,0,0,1,14.82683,14.8266v.48181l-38.09293.00141Z" transform="translate(-192 -175.60673)" fill="#2f2e41"/><polygon points="344.073 537.335 355.887 537.334 361.507 491.766 344.071 491.767 344.073 537.335" fill="#ffb8b8"/><path d="M533.05912,709.08439l23.26587-.00094h.00094a14.82762,14.82762,0,0,1,14.82683,14.8266v.48181l-38.09293.00141Z" transform="translate(-192 -175.60673)" fill="#2f2e41"/><path d="M650.63491,481.69506s9.91629,26.91558,8.49967,38.24844,9.91623,90.663,8.49967,97.74607,1.41662,42.49831,0,48.16473,3.97588,12.43468,1.1427,18.10111-6.80913,17.31414-6.80913,17.31414l-18.41591-1.41662-2.83324-15.58272s-8.49967-1.41662-7.083-9.91629-7.08305-65.164-7.08305-65.164l-24.08233-79.33011-33.99863,72.24706s-1.41662,50.99792-5.66643,56.66434,4.24981,21.24915,0,26.91558-8.49967,15.58272-8.49967,15.58272H533.05636V689.93664s-12.74948-7.083,0-28.3322l8.615-127.61018,8.49967-58.081Z" transform="translate(-192 -175.60673)" fill="#2f2e41"/><circle cx="405.82612" cy="101.50448" r="26.45879" fill="#ffb8b8"/><path d="M620.34206,275.286q-2.80045,7.15517-5.60107,14.3103c-2.29524,5.86416-4.924,12.13811-10.30411,15.4108-6.64262,4.04069-15.51334,2.07044-21.93927-2.30665A34.25953,34.25953,0,0,1,597.91806,240.345l.26591,4.78966,5.87744-4.92651a5.71394,5.71394,0,0,0,8.88211,1.25612c-1.54392,3.20029.238,7.10348,2.81117,9.55507,3.16139,3.01165,12.20332,6.63115,11.82811,12.015C627.33241,266.62717,621.7994,271.56271,620.34206,275.286Z" transform="translate(-192 -175.60673)" fill="#2f2e41"/><path d="M524.9941,520.83405a11.20328,11.20328,0,0,1,4.80074-16.49444l-.52868-25.59593,15.47622-4.115.23893,36.1569a11.264,11.264,0,0,1-19.98721,10.04848Z" transform="translate(-192 -175.60673)" fill="#ffb8b8"/><path d="M578.17147,319.92274s20.50343-10.25171,39.86779-3.41724,29.61613,14.80806,29.61613,14.80806l-12.52986,66.06665,17.08616,88.84826s-87.70922-6.8345-95.68273,0-7.97357-7.97357-7.97357-7.97357l6.8345-84.29194L542.86,340.42621Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/><path d="M664.70926,522.34973a11.20327,11.20327,0,0,1-.02331-17.17885l-7.69371-24.418,13.69842-8.29458,10.38069,34.63553a11.264,11.264,0,0,1-16.36209,15.2559Z" transform="translate(-192 -175.60673)" fill="#ffb8b8"/><path d="M639.68182,331.31356h7.97357s12.5299,7.97357,12.5299,19.36436,18.22525,144.66325,18.22525,144.66325l-19.36436,3.41722L641.96,405.35378,629.43005,380.294Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/><path d="M564.50247,340.42621H542.86s-6.8345,6.83446-10.25172,22.7816-6.8345,78.59655-6.8345,78.59655l2.27815,56.954h17.08621l2.27815-74.04022,11.39079-47.84136Z" transform="translate(-192 -175.60673)" fill="#3f3d56"/></svg>
								<svg class="loading-svg"  xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="955.95262" height="639.22428" viewBox="0 0 955.95262 639.22428" xmlns:xlink="http://www.w3.org/1999/xlink"><rect x="0.30042" y="0.39886" width="703.57562" height="450.60114" fill="#e6e6e6"/><rect x="20.419" y="56.91548" width="663.33851" height="171.77293" fill="#fff"/><rect x="185.4182" y="81.72713" width="140.28123" height="8.05267" fill="#e6e6e6"/><rect x="185.4182" y="111.10108" width="216.62477" height="8.05267" fill="#6c63ff"/><rect x="185.4182" y="138.7756" width="176.54439" height="8.05267" fill="#e6e6e6"/><rect x="185.4182" y="166.34557" width="103.06377" height="8.05267" fill="#e6e6e6"/><rect x="185.4182" y="193.9155" width="155.54994" height="8.05267" fill="#e6e6e6"/><rect x="121.4805" y="78.86424" width="17.17729" height="17.17729" fill="#e6e6e6"/><rect x="121.4805" y="106.53877" width="17.17729" height="17.17729" fill="#6c63ff"/><rect x="121.4805" y="134.2133" width="17.17729" height="17.17729" fill="#e6e6e6"/><rect x="121.4805" y="161.88783" width="17.17729" height="17.17729" fill="#e6e6e6"/><rect x="121.4805" y="189.56235" width="17.17729" height="17.17729" fill="#e6e6e6"/><rect x="533.73553" y="117.9903" width="57.25763" height="57.25764" fill="#e6e6e6"/><rect x="20.419" y="252.54576" width="663.33851" height="171.77293" fill="#fff"/><rect x="151.06361" y="267.81207" width="17.17729" height="17.17728" fill="#e6e6e6"/><rect x="121.4805" y="267.81207" width="17.17729" height="17.17728" fill="#6c63ff"/><path d="M534.74755,435.76326a65.04556,65.04556,0,0,0-105.003-9.69992l-4.18616-3.65793a70.59368,70.59368,0,0,1,113.973,10.52622Z" transform="translate(-122.02369 -130.38786)" fill="#e6e6e6"/><path d="M537.36724,508.18169l-4.6134-3.102a65.07765,65.07765,0,0,0,1.99371-69.31644l4.78387-2.83166a70.63742,70.63742,0,0,1-2.16418,75.25012Z" transform="translate(-122.02369 -130.38786)" fill="#6c63ff"/><path d="M426.13766,515.92644a70.58952,70.58952,0,0,1-.57926-93.52106l4.18616,3.65793a65.03087,65.03087,0,0,0,.53366,86.15415Z" transform="translate(-122.02369 -130.38786)" fill="#6c63ff"/><path d="M478.73772,539.44023a70.70869,70.70869,0,0,1-52.6-23.51382l4.14056-3.709a65.04339,65.04339,0,0,0,102.47562-7.13779l4.6134,3.102A70.55387,70.55387,0,0,1,478.73772,539.44023Z" transform="translate(-122.02369 -130.38786)" fill="#6c63ff"/><rect x="533.73553" y="305.03195" width="57.25763" height="57.25763" fill="#e6e6e6"/><rect x="119.09476" y="342.24939" width="57.25764" height="57.25763" fill="#e6e6e6"/><rect width="703.57562" height="29.89047" fill="#6c63ff"/><circle cx="22.21219" cy="15.28159" r="5.53997" fill="#fff"/><circle cx="43.24053" cy="15.28159" r="5.53997" fill="#fff"/><circle cx="64.26886" cy="15.28159" r="5.53997" fill="#fff"/><polygon points="817.168 623.704 831.411 623.704 838.188 568.764 817.165 568.765 817.168 623.704" fill="#ffb8b8"/><path d="M935.5583,749.44184l28.05079-.00113h.00113a17.87713,17.87713,0,0,1,17.87616,17.87587v.5809l-45.92723.00171Z" transform="translate(-122.02369 -130.38786)" fill="#2f2e41"/><polygon points="781.694 569.766 792.205 579.379 834.284 543.411 818.771 529.224 781.694 569.766" fill="#ffb8b8"/><path d="M904.17525,694.2705,924.875,713.201l.00084.00077a17.87711,17.87711,0,0,1,1.12667,25.25538l-.392.42866L891.71907,707.891Z" transform="translate(-122.02369 -130.38786)" fill="#2f2e41"/><polygon points="839.555 430.772 835.518 511.511 845.611 599.316 815.333 603.353 796.158 492.336 790.102 416.642 839.555 430.772" fill="#2f2e41"/><path d="M1009.01348,531.89159s12.111,79.73029-13.12018,105.97064-59.54541,72.66559-59.54541,72.66559L912.126,680.25048l61.5639-65.60089-12.111-44.40668-49.453-23.21265,8.074-55.50842,72.66559-1.00925Z" transform="translate(-122.02369 -130.38786)" fill="#2f2e41"/><circle cx="831.41549" cy="192.09457" r="24.71744" fill="#ffb8b8"/><polygon points="851.917 227.224 855.703 232.96 865.796 261.219 857.722 371.226 810.287 372.236 804.232 246.08 816.917 230.224 851.917 227.224" fill="#ccc"/><path d="M907.07976,379.49569l-8.074-1.00925s-2.01849,1.00925-3.02771,8.07394-13.12018,69.63785-13.12018,69.63785l16.14789,76.70258,18.16638-24.22187L906.07055,466.2907l11.10168-42.38828Z" transform="translate(-122.02369 -130.38786)" fill="#2f2e41"/><polygon points="887.999 248.099 894.054 248.099 909.193 329.847 895.064 393.43 880.934 370.217 884.971 344.986 882.953 322.783 875.888 309.662 887.999 248.099" fill="#2f2e41"/><path d="M968.045,322.48242l-4.49409-1.12353s-3.37053-19.09984-11.23522-16.8528-28.088,4.49409-28.088-4.49409,19.09985-16.8528,30.335-15.72928,25.58427,4.85076,29.21152,21.34686c5.81465,26.444-11.997,33.12341-11.997,33.12341l.29641-.96282a14.9957,14.9957,0,0,0-4.02865-15.30775Z" transform="translate(-122.02369 -130.38786)" fill="#2f2e41"/><path d="M900.01507,378.48644l32.29583-13.12018,7.56934-5.55084,22.708,100.4198,15.13867-45.416-4.54163-58.03155,41.88361,21.69876-14.12939,68.6286-2.0185,26.24036,6.05548,21.19412s21.19409,15.13867,14.1294,31.28656-15.13867,17.15716-15.13867,17.15716-34.31434-32.2958-36.33277-40.36978-5.0462-22.20337-5.0462-22.20337-17.15717,64.59165-37.342,63.58237-20.18488-22.20337-20.18488-22.20337l5.04621-22.20337,8.074-23.21261-4.037-38.35129Z" transform="translate(-122.02369 -130.38786)" fill="#2f2e41"/><path d="M1076.97631,769.61214h-268a1,1,0,0,1,0-2h268a1,1,0,0,1,0,2Z" transform="translate(-122.02369 -130.38786)" fill="#ccc"/></svg>
							</div>
						</div>
						<script type="text/javascript">
							$(document).ready(function() {
								$('.loading-svg:first-child').addClass('show');
								function alternarSVG() {
									$('.loading-svg').toggleClass('show');
									setTimeout(alternarSVG, 10000);
								}
								alternarSVG();
								$(document).on('submit', '.bloque_svg_viewa', function(e) {
							        e.preventDefault();
							        var formData = new FormData($('.bloque_svg_viewa')[0]);
							        $('.loader_page_content').addClass('loader_page');
							        $.ajax({
							            type: 'POST',
							            url: Wo_Ajax_Requests_File() + '?f=cuentas_a&s=add_c_cuenta',
							            data: formData,
							            processData: false,
							            contentType: false,
							            success: function(data) {
							                if (data.status == 200){
							                	$('.alert_400').addClass('hidden');
							                	$('.alert_400').html('');
							                	setTimeout(() => {
										            if (cuentas_a) {
														cuentas_a.click();
													}
										        }, 1000);
								            }
								            if(data.status == 300){
								            	$('.loader_page_content').removeClass('loader_page');
								            	$('.alert_400').removeClass('hidden');
								            	$('.alert_400').html(data.message);
								            	var inputs = document.getElementsByName(data.none);
											    if (inputs.length > 0) {
											        inputs[0].focus();
											        inputs[0].classList.add('error_input');
											    }
								            }
								            if(data.status == 400){
								            	$('.loader_page_content').removeClass('loader_page');
								            	$('.alert_400').removeClass('hidden');
								            	$('.alert_400').html(data.message);
								            }
							            },
							            error: function(xhr, status, error) {
							                console.error(xhr.responseText);
							            }
							        });
							    });

							    var inputs = document.querySelectorAll('input[name]');
								inputs.forEach(function(input) {
								    input.addEventListener('input', function(event) {
								        if (event.target.value.trim() !== '') {
								            event.target.classList.remove('error_input');
								        }
								    });
								});
								var selects = document.querySelectorAll('select[name]');
								selects.forEach(function(select) {
								    select.addEventListener('change', function(event) {
								        if (event.target.value.trim() !== '') {
								            event.target.classList.remove('error_input');
								        }
								    });
								});



								$('#fileInput').change(function(){
								    var file = this.files[0];
								    if (file) {
								      var reader = new FileReader();
								      reader.onload = function(e){
								        $('#imagePreview').html('<img src="' + e.target.result + '">');
								        $('#deleteButton').show();
								        $('#placeholderSVG').hide();
								      }
								      reader.readAsDataURL(file);
								    }else{
								      $('#imagePreview').empty();
								      $('#deleteButton').hide();
								      $('#placeholderSVG').show();
								    }
								});
								$('#deleteButton').click(function() {
								    $('#imagePreview').empty();
								    $('#fileInput').val('');
								    $('#deleteButton').hide();
								    $('#placeholderSVG').show();
								});
							});

						</script>
					<?php else: ?>
						<style type="text/css">
							.slider-container{display:flex;flex-wrap:wrap;background:#F0F2FD;border-radius:10px;padding:15px;}
							.slider-section{overflow: hidden;display:block;padding-left:70px;mask-image: linear-gradient(to right, rgba(0,0,0,0) 0%, rgba(0,0,0,1) 3%, rgba(0,0,0,1) 95%, rgba(0,0,0,0) 100%);}
							.carousel-cell {width:55%;height:auto;margin-top:20px;margin-bottom:20px;margin-right:30px;counter-increment: carousel-cell;}
							@media only screen and (max-width: 960px){.carousel-cell{width:100%;}}
							.carousel-content{border:4px solid #F7F7F7F7;background:#fff;box-shadow:0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);box-sizing:border-box;display:inline-block;width:100%;border-radius:7px;user-select:none;cursor:pointer;display:flex;flex-direction:column;flex-wrap:wrap;justify-content:center;align-items:center;padding-bottom:15px;}
							.carousel-content .blob{width:75%;border-radius:0 0 30px 30px;margin:0 auto;background-color:#F7F7F7;visibility:visible;transition:all 0.3s;display:flex;justify-content:center;align-items:center;color:#666;font-family:sans-serif;font-weight:bold;letter-spacing:2px}
							.carousel-content h5{text-align:center;text-transform:uppercase;letter-spacing:1px;font-weight:bold;font-size:22px;font-family:sans-serif;padding-bottom:15px;}
							.d-flex{display:-ms-flexbox !important;display:flex !important;max-width:100%;justify-content:flex-start;width:100%}
							.m-auto{margin:auto !important;}
							.flickity-viewport{position:static!important;}
							.cuenta_seleccionado{border:4px solid #4bb8ff;border-radius:7px;}
							.cuenta_seleccionado .blob{color:#fff;background-color:#4bb8ff;}
							.name_acount{display:flex;width:100%;justify-content:center;align-items:center;padding:10px;text-transform:uppercase;letter-spacing:3px;text-align:center;}
						</style>
						<style type="text/css">
							.contenido_cuentas_lista{position:relative;}
							.btn_selected_back{align-self:center;justify-self:center;}
							.selectects_acount{background:#ccc;color:#333;}
							.selectects_acount:hover{transform:translate(0);box-shadow:none;}
							/*cuentas_corrientes_transactions*/
						</style>
						<div class="page-margin contenido_cuentas_lista">
							<div class="slider-container">
							    <div class="d-flex">
							      <h2 class="m-auto">Cuentas</h2>
							    </div>
							    <div class="col slider-section">
							      <div class="main-carousel" data-flickity="">
							      	<?php
										$cuenta_seleccionada = null;
										$otras_cuentas = [];

										foreach ($cuentas_corrientes_empresa as $key) {
										    if ($wo['user']['banco_select'] == $key->id) {
										        $cuenta_seleccionada = $key;
										    } else {
										        $otras_cuentas[] = $key;
										    }
										}
										if (!is_null($cuenta_seleccionada)) {
										    array_unshift($otras_cuentas, $cuenta_seleccionada);
										}

										?>
							      	<?php foreach ($otras_cuentas as $key): ?>
							      		<?php $indexdefault_currency = array_search($key->moneda, array_column($wo['currencies'], 'text')); ?>
							      		<?php $cantida_dinero = $db->where('estado', '1')
										                             ->where('id_cuenta_corriente', $key->id)
										                             ->getValue('cuentas_corrientes_transactions', 'SUM(CASE WHEN tipo = 1 THEN monto WHEN tipo = 0 THEN -monto ELSE 0 END)');
										 ?>
							      		<?php if ($wo['user']['banco_select']==$key->id): ?>
								      		<div class="carousel-cell">
									          <div class="carousel-cover">
									            <div class="carousel-content cuenta_seleccionado">
									            	<div class="blob"><?php echo $key->banco_nombre_corto;?></div>
									            	<p class="name_acount"><?php echo $key->tipo_de_cuenta;?> <?php echo $key->nombre_cuenta;?></p>
									              	<h5> <?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $producto['currency'];?> <?= !empty($cantida_dinero) ? $cantida_dinero : 0; ?></h5>
									              	<span class="btn_selected_back button3 btn-mat selectects_acount">Seleccionado</span>
									            </div>
									          </div>
									        </div>
								   		<?php else: ?>
								   			<div class="carousel-cell">
									          <div class="carousel-cover">
									            <div class="carousel-content">
									            	<div class="blob"><?php echo $key->banco_nombre_corto;?></div>
									            	<p class="name_acount"><?php echo $key->tipo_de_cuenta;?> <?php echo $key->nombre_cuenta;?></p>
									              	<h5> <?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : '';?> <?= !empty($cantida_dinero) ? $cantida_dinero : 0; ?></h5>
									              	<span class="btn_selected_back button3 btn-mat btn_selected_back_isset" data="<?php echo $key->id;?>">Seleccionar</span>
									            </div>
									          </div>
									        </div>
								        <?php endif ?>
							      	<?php endforeach ?>
							      </div>
							    </div>
							</div>
						</div>
						<style type="text/css">
							.title_movimientos_bancks{display:block;width:100%;padding:15px;margin:10 0;font-size:18px;letter-spacing:3px;text-transform:uppercase;user-select:none;}
							.contemnt_bank_select_info{background:#FAFAFA;border-radius:10px;display:flex;flex-wrap:wrap;padding:15px;gap:2rem;justify-content:center;}
							.cont_info_bac{position:relative;display:flex;flex-wrap:wrap;width:100%;justify-content:space-between;max-width:700px;padding:10px 5px;border-bottom:2px dashed #999;}
						</style>
						<?php $c_selec_b = $db->where('id', $wo['user']['banco_select'])->where('es_empresa', 1)->where('estado',1)->getOne("cuentas_corrientes"); ?>
						<?php $transacciones_bancarias = $db->where('estado', 1)->where('id_cuenta_corriente', $wo['user']['banco_select'])->orderBy('id', 'DESC')->get("cuentas_corrientes_transactions");?>
						<?php $cuentas_corrientes_mov = $db->where('linea', 1)->where('tipo', 1)->where('estado',0)->where('usuario',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->where('id_cuenta_corriente',$wo['user']['banco_select'])->getOne("cuentas_corrientes_transactions"); ?>
						<?php if(!empty($cuentas_corrientes_mov)): ?>
							<?php $indexdefault_currencyns = array_search($c_selec_b->moneda, array_column($wo['currencies'], 'text')); ?>
							<style type="text/css">
								.new_transaction_in_page{display:flex;flex-wrap:wrap;gap:2rem;align-items:flex-end;background:#F0F2FD;border-radius:5px;padding:10px;}
								.list_inputs_transactions span{display:flex;width:100%;justify-content:flex-start;align-items:center;}
								.list_inputs_transactions .number_transact,
								.list_inputs_transactions .bac_amount{background:#FAFAFA;border-radius:5px;border:2px dashed #999;}
								.list_inputs_transactions .number_transact{outline:none;padding:8px;}
								.list_inputs_transactions .bac_amount{padding-left:5px;}
								.list_inputs_transactions .bac_amount input{outline:none;border:0;padding:8px;background:#FAFAFA;}

								.list_inputs_transactions .number_transact[type="number"]::-webkit-inner-spin-button,
								.list_inputs_transactions .number_transact[type="number"]::-webkit-outer-spin-button,
								.list_inputs_transactions .monto_operation[type="number"]::-webkit-inner-spin-button,
								.list_inputs_transactions .monto_operation[type="number"]::-webkit-outer-spin-button
								{-webkit-appearance:none;margin:0;}
								.list_inputs_transactions .number_transact[type="number"],
								.list_inputs_transactions .monto_operation[type="number"]
								{-moz-appearance: textfield;}
								.deposite_inline_unline{background:red;color:#fff;cursor:pointer;display:inline-flex;padding:0 10px;height:initial;align-self:flex-end;}
							</style>
							<div class="new_transaction_in_page">
								<div class="list_inputs_transactions">
									<span>Numero de operacion</span>
									<input class="number_transact" type="number" name="numero">
								</div>
								<div class="list_inputs_transactions">
									<span>Monto </span>
									<span class="bac_amount">
										<?=(!empty($wo['currencies'][$indexdefault_currencyns]['symbol'])) ? $wo['currencies'][$indexdefault_currencyns]['symbol'] : '';?>
										<input class="monto_operation" type="number" name="numero">
									</span>
								</div>
								<div class="list_inputs_transactions" style="display:flex;gap:1rem;">
									<span class="btn_selected_back button3 btn-mat deposite_inline_line" style="display:inline-flex;padding:0 10px;height:initial;align-self:flex-end;flex-direction:column;">DEPOSITAR</span>
									<div class="alert_400 alerta_transactinos hidden"></div>
								</div>
								<div style="width:100%;">
									<span class="btn_selected_back btn-mat deposite_inline_unline" style="">Cancelar</span>
								</div>
							</div>
							<script type="text/javascript">
								var isProcessingb = false;
								$(document).on('click', '.deposite_inline_line', function(){
									if (isProcessingb) return;
									isProcessingb = true;
									$('.loader_page_content').addClass('loader_page');
									let numero = $('.number_transact').val();
									let mounts = $('.monto_operation').val();
									$.ajax({
										url: Wo_Ajax_Requests_File() + '?f=cuentas_a&s=dep_inline&hash=' + $('.main_session').val(),
										data: {base:numero,monto:mounts},
										type: 'POST',
										success: function (data) {
											if (data.status==200){
												$('.alerta_transactinos').addClass('hidden');
												setTimeout(() => {
										            if (cuentas_a) {
														cuentas_a.click();
													}
										        }, 1000);
											}
											if (data.status==400){
												$('.alerta_transactinos').removeClass('hidden');
												$('.alerta_transactinos').html(data.message);
												setTimeout(() => {
										            $('.loader_page_content').removeClass('loader_page');
										        }, 1000);
											}
											isProcessingb = false;
										}
									})
								});
								$(document).on('click', '.deposite_inline_unline', function(){
									if (isProcessingb) return;
									isProcessingb = true;
									$('.loader_page_content').addClass('loader_page');
									$.ajax({
										url: Wo_Ajax_Requests_File() + '?f=cuentas_a&s=clean_dep_inline&hash=' + $('.main_session').val(),
										type: 'POST',
										success: function (data) {
											if (data.status==200){
												setTimeout(() => {
										            if (cuentas_a) {
														cuentas_a.click();
													}
										        }, 1000);
											}
											if (data.status==400){
												setTimeout(() => {
										            $('.loader_page_content').removeClass('loader_page');
										        }, 1000);
											}
											isProcessingb = false;
										}
									})
								});
							</script>
						<?php else: ?>
							<div class="contemnt_bank_select_info">
								<span style="width:100%;padding:10px;text-align:center;user-select:none;">LAYSHANE PERU E.I.R.L.</span>
								<div class="cont_info_bac">
									<span>BANCO :</span>
									<span><?php echo $c_selec_b->banco_nombre_corto;?> - <?php echo $c_selec_b->banco_nombre;?> </span>
								</div>
								<div class="cont_info_bac">
									<span>CUENTA :</span>
									<span><?php echo $c_selec_b->tipo_de_cuenta;?> <?=$c_selec_b->nombre_cuenta; ?></span>
								</div>
								<div class="cont_info_bac">
									<span>NUMERO CUENTA :</span>
									<span><?=$c_selec_b->numero_de_cuenta; ?></span>
								</div>
								<div class="cont_info_bac">
									<span>CCI :</span>
									<span><?=$c_selec_b->cci; ?></span>
								</div>
							</div>
							<br><br>
							<span class="btn_selected_back button3 btn-mat deposite_inline" style="display:inline-flex;">DEPOSITAR</span>
							<br>
						<?php endif ?>
						
						<?php if(!empty($transacciones_bancarias)): ?>
						
						<style type="text/css">
							.movimientos_contenedor{display:flex;justify-content:center;flex-wrap:wrap;gap:0.2em;}
							.transaction_list{padding:15px;width:100%;background:#fafafa;}
							.detalles_transaction{display:flex;gap:0.5em;flex-wrap:wrap;}
							.detalles_transaction .details{width:100%;}
							.detalles_transaction .details span{display:block;width:100%;}
							.document_transaction{width:50px;height:50px;border-radius:30px;padding:10px;background:orange;display:flex;justify-content:center;align-items:center;}
						    .transaction_list{display:flex;align-items:center;justify-content:space-between;}
							.document_transaction{flex:0 0 auto;margin-right:10px;}
							.detalles_transaction{flex:1 1 auto;margin-right:10px;}
							.amount{flex: 0 0 auto;font-size:22px;}
							.detalles_de_transaction{font-weight:bold;user-select:none;}
							.date_transaction{color:#555;text-transform:capitalize;user-select:none;}
							.nueva_linea_ac_l{background:#ffececc7;}
							.nueva_linea_ac_l .amount span{color:red;}
						</style>
						<div class="page-margin"><br>
							<br>
							<span class="title_movimientos_bancks">Movimientos</span>
							<hr>
							<div class="movimientos_contenedor">
								<?php foreach ($transacciones_bancarias as $movib): ?>
									<?php
									$timestamp = strtotime($movib->fecha_transaccion);
									$dia = date("d", $timestamp);
									$mes = date("F", $timestamp);
									$anio = date("Y", $timestamp);
									$tr_mes = strtolower($mes);
									$mes_espanol = $wo['lang'][$tr_mes];
									$fecha_formateada = "$dia $mes_espanol $anio";
									?>

									<div class="transaction_list <?=($movib->tipo == 0) ? 'nueva_linea_ac_l' : '' ?>">
										<div class="document_transaction"><span>B</span></div>
										<div class="detalles_transaction">
											<div class="details">
												<span class="detalles_de_transaction"><?=$movib->nota;?></span>
												<span class="detalles_de_transaction"><?=$movib->numero_operacion;?></span>
												<span class="date_transaction"><?=$fecha_formateada;?></span>
											</div>
										</div>
										
										<div class="amount">
											<span><?=($movib->tipo == 0) ? ' <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-minus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /></svg> ' : '' ?><?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : '';?> <?php echo sprintf('%.2f',$movib->monto);?></span>
										</div>
									</div>
								<?php endforeach ?>
							</div>
						</div>
						<?php else: ?>
							<style type="text/css">
								.no_hay_transaciones{display:block;width:100%;text-align:center;padding:40px 10px;background:#FCFCFC;border-radius:10px;margin:15px auto;}
								.no_hay_transaciones span{font-size:24px;color:#777;}
							</style>
							<br>
							<span class="title_movimientos_bancks">Movimientos</span>
							<hr>
							<div class="no_hay_transaciones">
								<span>No hay movimientos.</span>
							</div>
						<?php endif ?>
						<script type="text/javascript">
							
							var isProcessing = false;
							$(document).on('click', '.btn_selected_back_isset', function(){
								if (isProcessing) return;
								isProcessing = true;
								$('.loader_page_content').addClass('loader_page');
								let datalinea = $(this).attr('data');
								$.ajax({
									url: Wo_Ajax_Requests_File() + '?f=cuentas_a&s=selecct&hash=' + $('.main_session').val(),
									data: {base:datalinea},
									type: 'POST',
									success: function (data) {
										if (data.status==200){
											setTimeout(() => {
									            if (cuentas_a) {
													cuentas_a.click();
												}
									        }, 1000);
										}
										if (data.status==400){
											setTimeout(() => {
									            $('.loader_page_content').removeClass('loader_page');
									        }, 1000);
										}
										isProcessing = false;
									}
								})
							});
							$(document).on('click', '.deposite_inline', function(){
								if (isProcessing) return;
								isProcessing = true;
								$('.loader_page_content').addClass('loader_page');
								$.ajax({
									url: Wo_Ajax_Requests_File() + '?f=cuentas_a&s=depo_init&hash=' + $('.main_session').val(),
									type: 'POST',
									success: function (data) {
										if (data.status==200){
											setTimeout(() => {
									            if (cuentas_a) {
													cuentas_a.click();
												}
									        }, 1000);
										}
										if (data.status==400){
											setTimeout(() => {
									            $('.loader_page_content').removeClass('loader_page');
									        }, 1000);
										}
										isProcessing = false;
									}
								})
							});
							

							var $carousel = jQuery(".main-carousel").flickity({
							 contain: false,
							 imagesLoaded: true,
							 percentPosition: false,
							 wrapAround: true,
							 freeScroll: false,
							 prevNextButtons: false,
							 groupCells:false,
							 imagesLoaded: true,
							 percentPosition: true,
							 setGallerySize: true,
							 accessibility: false,
							 cellAlign: 'left',
							 pageDots: false,
							 selectedAttraction:0.015,
							 initialIndex: 0
							});
							$(document).ready(function() {
							var $imgs = $carousel.find(".carousel-cover .carousel-content");
							var docStyle = document.documentElement.style;
							var transformProp = typeof docStyle.transform == "string" ? "transform" : "WebkitTransform";
							var flckty = $carousel.data("flickity");
							function applyTransformations() {
							$carousel.on("scroll.flickity", function () {
							  
							  if ( jQuery(window).width() < 960 ) {
							    return;
							  }
							  
							  
							 flckty.slides.forEach(function (slide, i) {
							   var img = $imgs[i];
							   var $SlideWidth = jQuery(".carousel-cover").outerWidth() + 52;
							   var $scaleAmt = 1;
							   var $translateXVal = 0;
							   var $rotateVal = 0;
							   var $slideZIndex = 10;
							   var $opacityVal = 1;

							   var vw = jQuery(window).width()
							   var w2 = jQuery(".slider-section").outerWidth();
							   var w3 = jQuery(".slider-container").outerWidth();
							   var $extraWindowSpace = (w3-w2) + ((vw - w3)/2);
							   
							   var $slideOffset = jQuery(slide.cells[0].element).offset().left;
							   var flkSlider = jQuery(".main-carousel .carousel-cell:nth-child(" + (i + 1) + ")");

							   if ($slideOffset - $extraWindowSpace < 0 && $slideOffset - $extraWindowSpace > $SlideWidth * -1) {
						            var $opacityVal = 1 + ($slideOffset - $extraWindowSpace + 1) / 200;
						            var $scaleAmt = 1 + ($slideOffset - $extraWindowSpace) / 1500;
						            $translateXVal = ($slideOffset - $extraWindowSpace) * -1;
						            var $rotateVal = (($slideOffset - $extraWindowSpace) / 25) * -1;
						        }
							 
							   if ($slideOffset + 5 - $extraWindowSpace < 0 && $slideOffset - $extraWindowSpace > $SlideWidth * -1) {
							     $slideZIndex = 5;
							   } else {
							     $slideZIndex = 7;
							   }

							   
							   flkSlider.css({
							     "z-index": $slideZIndex,
							   });

							   
							   // img.parent().hasClass("is-selected")
							    if( jQuery(img).parent().hasClass("is-selected") ){ }
							   jQuery(img)
							     .parent()
							     .css({
							       transform: "perspective(500px) translateX(" + $translateXVal + "px) rotateY(" + $rotateVal + "deg) translateZ(0)",
							       opacity: $opacityVal,
							     });
							   jQuery(img).css({
							     transform: "scale(" + $scaleAmt + ") translateZ(0)",
							   });
							 });

							});
							}
							applyTransformations();
							});
						</script>
					<?php endif ?>
				<?php else: ?>
					<style type="text/css">
						.null_cuentas_content{padding:10px;position:relative;border-radius:5px;display:flex;justify-content:center;align-items:center;gap:2rem;}
						.null_cuentas_content .svg_null_bancks{width:100%;max-width:400px;max-height:auto;height:auto;}
					</style>

					<div class="null_cuentas_content">
						<svg class="svg_null_bancks" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="773.97946" height="419.08428" viewBox="0 0 773.97946 419.08428" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M633.01027,462.15071v.91a31.51524,31.51524,0,0,1-31.52,31.51h-355.77a31.513,31.513,0,0,1-31.50976-31.51v-.91Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M288.62013,312.15071c-25.71,6.35-48.79-13.43-52.81982-31.78l1.79-.32C259.26027,275.26069,283.45021,290.75068,288.62013,312.15071Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M910.0796,651.98225c-7.43556-3.21061-9.12473-14.90825-2.90123-20.09126s17.42245-1.40526,19.23475,6.48848l-6.93646-49.61838c-1.59471-11.40737-2.87074-24.1593,4.02319-33.3867,6.4557-8.64085,19.06721-11.40925,29.19167-7.68961s17.60728,12.99846,20.78194,23.30681,2.42556,21.51063-.34668,31.9344-7.48159,20.21476-12.24451,29.89231c-4.88058,9.91664-10.80012,20.66286-21.23254,24.31311C929.68387,660.6184,910.0796,651.98225,910.0796,651.98225Z" transform="translate(-213.01027 -240.45786)" fill="#f2f2f2"/><path d="M942.66527,546.74367a135.26451,135.26451,0,0,1,6.42227,44.04385,138.9936,138.9936,0,0,1-7.91119,43.618,132.59534,132.59534,0,0,1-10.66924,22.89929,1.50112,1.50112,0,0,0,2.59041,1.51416,137.90954,137.90954,0,0,0,16.14792-42.32482,141.49932,141.49932,0,0,0,1.81249-45.50827,136.68806,136.68806,0,0,0-5.49982-25.03974c-.58928-1.83039-3.48688-1.04765-2.89284.79752Z" transform="translate(-213.01027 -240.45786)" fill="#fff"/><path d="M905.67137,633.71706,929.415,658.66863c1.33359,1.40144,3.45267-.72224,2.12132-2.12132l-23.74362-24.95157c-1.3336-1.40144-3.45268.72223-2.12132,2.12132Z" transform="translate(-213.01027 -240.45786)" fill="#fff"/><path d="M885.50127,539.50573a3.50849,3.50849,0,0,1-2.303-.856,165.03257,165.03257,0,0,1-38.66138-35.00831,3.53629,3.53629,0,0,1-.18676-4.93847l7.19726-7.94776,1.48242,1.34278-7.19726,7.94775a1.53612,1.53612,0,0,0,.10742,2.16944l.10523.11083a163.02694,163.02694,0,0,0,38.29785,34.68213l.13086.1001a1.53607,1.53607,0,0,0,2.16943-.10742L900.68584,521.493a1.53546,1.53546,0,0,0-.032-2.09571c-3.25415-1.773-6.429-3.70605-9.43921-5.74658l1.12207-1.65527c2.99292,2.02881,6.1521,3.94922,9.39014,5.70849l.19384.1377a3.53546,3.53546,0,0,1,.24756,4.99414l-14.04248,15.50781a3.51172,3.51172,0,0,1-2.446,1.15772Q885.59039,539.50573,885.50127,539.50573Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M870.02056,513.39929c4.41015,3.99,8.93994,6.18,10.12011,4.88a1.6302,1.6302,0,0,0,.17969-1.53,11.738,11.738,0,0,0-2.25-4.01q-5.87988-4.18506-11.42969-9.03c-1.16015-.38-2.05029-.37-2.48.11a.91207.91207,0,0,0-.1499.23C863.27056,505.55926,865.84038,509.60931,870.02056,513.39929Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M843.44048,481.24926a3.45751,3.45751,0,0,0,1.1001,2.39,173.29219,173.29219,0,0,0,19.47021,20.41,154.85773,154.85773,0,0,0,16.30957,12.7c.9502.65,1.91016,1.28,2.88037,1.9a3.47136,3.47136,0,0,0,2.29981.86c.06006,0,.12011-.01.18017-.01a3.51346,3.51346,0,0,0,2.44971-1.16l14.04-15.5a3.54107,3.54107,0,0,0-.25-5l-.18994-.14a108.15843,108.15843,0,0,1-38.18994-34.57l-.14991-.18a3.54149,3.54149,0,0,0-5,.25l-14.04,15.5A3.52525,3.52525,0,0,0,843.44048,481.24926Zm2-.1a1.52224,1.52224,0,0,1,.39014-1.1l14.04-15.51a1.52157,1.52157,0,0,1,1.06983-.5,1.5001,1.5001,0,0,1,1.02.32,110.1969,110.1969,0,0,0,38.68994,35.04,1.53215,1.53215,0,0,1,.04,2.09l-14.04981,15.51a1.482,1.482,0,0,1-1.06005.5,1.56047,1.56047,0,0,1-1.10987-.38995l-.13037-.1q-3.17945-2.04-6.27-4.27-5.87988-4.18506-11.42969-9.03a171.42068,171.42068,0,0,1-20.60009-21.38l-.1001-.11A1.56505,1.56505,0,0,1,845.44048,481.14929Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><ellipse cx="872.15098" cy="491.04889" rx="3.1698" ry="10.77731" transform="translate(-290.26027 567.47291) rotate(-47.83838)" fill="var(--boton-fondo)"/><polygon points="578.904 406.55 566.645 406.549 560.812 359.261 578.906 359.262 578.904 406.55" fill="#ffb8b8"/><path d="M795.04105,658.89183l-39.53052-.00147v-.5A15.38605,15.38605,0,0,1,770.897,643.00413h.001l24.1438.001Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><polygon points="614.904 406.55 602.645 406.549 596.812 359.261 614.906 359.262 614.904 406.55" fill="#ffb8b8"/><path d="M831.04105,658.89183l-39.53052-.00147v-.5A15.38605,15.38605,0,0,1,806.897,643.00413h.001l24.1438.001Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M836.1423,455.9l-2.92743,173.69392a4,4,0,0,1-4.36157,3.91617l-14.34623-1.3042a4,4,0,0,1-3.6259-3.67443l-8.39885-108.34524a1,1,0,0,0-1.9963.03944l-4.19794,110.82575A4,4,0,0,1,792.29095,634.9H776.90532a4,4,0,0,1-3.99255-3.756L762.1423,454.9l64-16Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><circle cx="576.71077" cy="27.78466" r="24.56103" fill="#ffb8b8"/><path d="M759.95089,461.067a4.46926,4.46926,0,0,1-1.3645-3.165l-1.65674-118.44238a28.50084,28.50084,0,0,1,19.282-27.44141c2.301-10.43945,14.54785-11.74707,21.68725-11.59082a11.08482,11.08482,0,0,1,8.97754,4.92285l5.11792,7.67676,11.28027,6.61231a28.528,28.528,0,0,1,13.47022,30.8164l-1.73657,7.89942a181.54005,181.54005,0,0,0,1.69775,84.66015l3.49463,13.32422a4.49944,4.49944,0,0,1-4.698,5.62793l-4.05859-.3125a4.49384,4.49384,0,0,1-4.13257-4.03808l-.67163-6.7168a.50005.50005,0,0,0-.99512,0l-.65015,6.50293a4.49951,4.49951,0,0,1-4.40844,4.05176l-57.43091.88379c-.02393,0-.04761.001-.07153.001A4.47133,4.47133,0,0,1,759.95089,461.067Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M791.6423,282.4c.1007,3.472,2.51116,5.48065,5.47052,7.29924s6.41877,2.60712,9.80795,3.36775a2.99863,2.99863,0,0,0,4.40516-2.62457l3.1084-11.82324a74.84087,74.84087,0,0,0,2.39306-11.537c.74861-7.50914-1.031-15.58706-6.27223-21.01634s-14.33083-7.35795-20.61159-3.17478c-7.45361-9.51978-41.52344,11.513-33.11914,18.13281,1.49512,1.17767,3.78063-.31249,5.67841-.45693s4.02454.18937,5.23,1.66219c1.57495,1.9242.889,4.79052,1.538,7.19089a6.71433,6.71433,0,0,0,8.4837,4.34834,23.08966,23.08966,0,0,0,4.39987-2.8286c1.45566-.96958,3.29506-1.686,4.93368-1.0745,2.15991.80607,2.92722,3.45041,3.12242,5.74755A53.2333,53.2333,0,0,0,791.6423,282.4Z" transform="translate(-213.01027 -240.45786)" fill="#333"/><polygon points="572.896 107.768 568.896 156.768 547.896 207.768 578.896 157.768 572.896 107.768" opacity="0.2"/><path d="M755.9958,467.2182a10.05576,10.05576,0,0,0,.31761-15.41606l13.37856-33.136-18.20228,3.67571-9.9139,30.903a10.11028,10.11028,0,0,0,14.42,13.97337Z" transform="translate(-213.01027 -240.45786)" fill="#ffb8b8"/><path d="M755.02167,452.60406l-10.30361-3.71344A4.52376,4.52376,0,0,1,741.903,443.471l16.99724-62.21933,2.59146-56.2325a12.81885,12.81885,0,1,1,25.588,1.55127l-4.62839,61.57336L760.79374,449.862a4.509,4.509,0,0,1-4.57608,2.99941A4.52235,4.52235,0,0,1,755.02167,452.60406Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M861.20705,470.46813a10.05578,10.05578,0,0,0-5.64645-14.34828l-.421-35.73237-15.38084,10.405,2.75785,32.33687a10.11027,10.11027,0,0,0,18.69046,7.33881Z" transform="translate(-213.01027 -240.45786)" fill="#ffb8b8"/><path d="M854.67755,457.35754l-10.93889.54305a4.52374,4.52374,0,0,1-4.68581-3.91661l-8.287-63.96466-19.274-52.88971a12.81886,12.81886,0,1,1,24.21028-8.42712l19.4521,58.603,3.79337,65.29778a4.509,4.509,0,0,1-3.06718,4.53093A4.52179,4.52179,0,0,1,854.67755,457.35754Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M985.98973,659.39929h-381a1,1,0,0,1,0-2h381a1,1,0,0,1,0,2Z" transform="translate(-213.01027 -240.45786)" fill="#3f3d56"/><path d="M536.22878,443.5008c-5.74341,0-10.31079-1.708-13.57691-5.07715-7.38159-7.61523-6.91919-22.29345-6.54761-34.08789.10791-3.43115.21-6.67236.10694-9.3872l-.00073-.041a20.13637,20.13637,0,0,1,20.02685-20.03711H583.853c5.73609,0,10.29883,1.70557,13.56275,5.07031,7.38135,7.60889,6.92407,22.2837,6.55688,34.0752-.10718,3.43848-.20849,6.68652-.10327,9.40625A20.149,20.149,0,0,1,583.833,443.5008H536.22878Zm-18.01831-48.60742c.10449,2.77979.0017,6.04688-.10743,9.50537-.35962,11.417-.80713,25.626,5.98487,32.63281,2.91528,3.00733,6.88672,4.46924,12.14062,4.46924h47.60156a18.13619,18.13619,0,0,0,18.04-18.043c-.10717-2.748-.00488-6.02978.10352-9.50439.35547-11.41406.79809-25.61963-5.99341-32.62012-2.91284-3.00293-6.88037-4.46289-12.12695-4.46289h-47.613A18.13148,18.13148,0,0,0,518.21047,394.89338Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M278.10036,313.991a44.61893,44.61893,0,0,1-23.574-6.90479c-10.33874-6.42431-18.14514-16.71338-20.37268-26.85058l-.22326-1.01612,2.79394-.5c21.99317-4.854,46.86878,10.78809,52.19788,32.83643l.23364.9668-.96558.23877A41.98311,41.98311,0,0,1,278.10036,313.991ZM236.349,280.81867c2.39978,9.29932,9.683,18.63428,19.233,24.56885a41.6881,41.6881,0,0,0,31.14587,5.6626c-5.57556-20.5415-28.92248-34.95606-49.59118-30.373Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-hover-fondo)"/><path d="M250.35793,427.63313c-6.54261,0-11.858-2.92774-14.97864-8.26856a20.76205,20.76205,0,0,1-.00635-20.35791c3.17053-5.43213,8.61267-8.3789,15.33374-8.27588h63.44373c6.69836-.08545,12.14453,2.84815,15.317,8.28662a20.762,20.762,0,0,1-.00183,20.355c-3.17114,5.42578-8.61584,8.32373-15.3302,8.2583H250.69045Q250.52364,427.63288,250.35793,427.63313Zm.03711-34.90479c-5.83472,0-10.54786,2.58008-13.2948,7.28662a18.70417,18.70417,0,0,0,.006,18.34034c2.79321,4.78125,7.6029,7.36914,13.56921,7.27539h63.475c5.97253.09521,10.79712-2.4917,13.58838-7.26758a18.70478,18.70478,0,0,0,.00109-18.33789c-2.79309-4.78809-7.61865-7.36621-13.57531-7.29444H250.68569C250.58876,392.72932,250.49135,392.72834,250.395,392.72834Z" transform="translate(-213.01027 -240.45786)" fill="#3f3d56"/><path d="M552.51027,398.65071h-20a5,5,0,0,1,0-10h20a5,5,0,0,1,0,10Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M552.51027,414.65071h-20a5,5,0,0,1,0-10h20a5,5,0,0,1,0,10Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M552.51027,430.65071h-20a5,5,0,0,1,0-10h20a5,5,0,0,1,0,10Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M587.51027,398.65071h-20a5,5,0,0,1,0-10h20a5,5,0,0,1,0,10Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M587.51027,414.65071h-20a5,5,0,0,1,0-10h20a5,5,0,0,1,0,10Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><path d="M587.51027,430.65071h-20a5,5,0,0,1,0-10h20a5,5,0,0,1,0,10Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/><rect x="1.2002" y="87.13376" width="418.7998" height="2" fill="var(--boton-fondo)"/><path d="M600.01027,495.15071h-354a33.03734,33.03734,0,0,1-33-33v-172a33.03734,33.03734,0,0,1,33-33h354a33.03734,33.03734,0,0,1,33,33v172A33.03734,33.03734,0,0,1,600.01027,495.15071Zm-354-236a31.03528,31.03528,0,0,0-31,31v172a31.03529,31.03529,0,0,0,31,31h354a31.0352,31.0352,0,0,0,31-31v-172a31.0352,31.0352,0,0,0-31-31Z" transform="translate(-213.01027 -240.45786)" fill="var(--boton-fondo)"/></svg>
					</div>
				<?php endif ?>
			<?php else: ?>
			<?php endif ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	$(document).on('click', '.add_new_acount_banck', function(){
		$('.loader_page_content').addClass('loader_page');
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=cuentas_a&s=nueva_cuenta&hash=' + $('.main_session').val(),
			type: 'POST',
			success: function (data) {
				if (data.status==200){
					setTimeout(() => {
			            if (cuentas_a) {
							cuentas_a.click();
						}
			        }, 1000);
				}
				if (data.status==400){
					setTimeout(() => {
			            $('.loader_page_content').removeClass('loader_page');
			        }, 1000);
				}
			}
		})
	});
	$(document).on('click', '.add_del_acount_banck', function(){
		$('.loader_page_content').addClass('loader_page');
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=cuentas_a&s=clean_cuenta&hash=' + $('.main_session').val(),
			type: 'POST',
			success: function (data) {
				if (data.status==200){
					setTimeout(() => {
			            if (cuentas_a) {
							cuentas_a.click();
						}
			        }, 1000);
				}
				if (data.status==400){
					setTimeout(() => {
			            $('.loader_page_content').removeClass('loader_page');
			        }, 1000);
				}
			}
		})
	});
	


	recpoll()
</script>