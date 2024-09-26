<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>
<style type="text/css">
.content_imventario_layshane{display:grid;flex-wrap:wrap;gap:0.5rem;width:100%; grid-template-columns: repeat(auto-fill, minmax(min(500px, 100%), 1fr));}

.card{overflow:hidden;position:relative;text-align:left;border-radius:0.5rem;user-select:none;background-color:#fff;border:1px solid #ccc;}

.div_image_v{border-bottom:none;position:relative;display:flex;flex-direction:column;}
.contenido{padding:0.4rem;display:flex;gap:0rem;flex-wrap:wrap;height:100%}
.header{border-bottom:1px solid #ddd;width:100%;padding-bottom:5px;font-size:14px;height:fit-content;}
.body_c{display:flex;gap:1rem;align-self:flex-start;}
.title{color:#066e29;font-size:1rem;font-weight:600;line-height:1.5rem;text-transform:uppercase;padding:10px 10px 0 10px}
.message{color:#595b5f;font-size:0.875rem;line-height:1.25rem;padding:0 10px 10px 10px}
@keyframes animate{from{transform:scale(1);}to{transform:scale(1.09);}}

.iconos{display:flex;justify-content:center;align-items:center;}
.view_document{}
.view_document svg{height:35px!important;width:35px!important;}

</style>


<style>
    .minute-hand{transform-origin:center;animation:rotate-minute 5s linear infinite;}
    .hour-hand{transform-origin:center;animation:rotate-hour 30s linear infinite;}
    .clock{animation:rotate-clock 10s linear infinite, bounce-clock 5s ease-in-out infinite;}
    @keyframes rotate-minute {
        from{transform:rotate(0deg);}
        to{transform:rotate(360deg);}}
    @keyframes rotate-hour{
        from{transform:rotate(0deg);}
        to{transform: rotate(360deg);}
    }
    @keyframes rotate-clock {
        from{transform:rotate(0deg);}
        to{transform:rotate(360deg);}
    }
    @keyframes bounce-clock {
        0%, 90%{transform:scale(1);}
        95%{transform: scale(1.1);}
        100%{transform: scale(1);}
    }
</style>

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
		          <div class="wo_page_hdng_innr big_size">
		            <span style="color:#3498db;">
		            	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
						    <path d="M8 16L16.7201 15.2733C19.4486 15.046 20.0611 14.45 20.3635 11.7289L21 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
						    <path d="M6 6L7.5 6M22 6H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
						    <path d="M10.5 7C10.5 7 11.5 7 12.5 9C12.5 9 15.6765 4 18.5 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						    <circle cx="6" cy="20" r="2" stroke="currentColor" stroke-width="1.5" />
						    <circle cx="17" cy="20" r="2" stroke="currentColor" stroke-width="1.5" />
						    <path d="M8 20L15 20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
						    <path d="M2 2H2.966C3.91068 2 4.73414 2.62459 4.96326 3.51493L7.93852 15.0765C8.08887 15.6608 7.9602 16.2797 7.58824 16.7616L6.63213 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
						</svg>
					</span> Pedidos recientes
		          </div>
		        </div>
		    </div>
		    <br><br>
		    <div class="wo_my_pages">
		    	<section class="content_imventario_layshane">
					<?php if ($wo['have_products'] > 0) { ?>
							<li><a href="<?php echo lui_SeoLink('index.php?link1=orders'); ?>" data-ajax="?link1=orders"><?php echo $wo['lang']['orders'] ?></a></li>
					<?php } ?>
					<?php if (count($wo['purchased']) > 0): ?>
						<?php echo($wo['html']); ?>
						<?php if (count($wo['purchased']) == 20){ ?>
							<div class="purchased_posts_load">
								<div class="purchased_load-more">
									<button class="btn btn-default text-center pointer" onclick="Wo_LoadPurchase();"><?php echo $wo['lang']['load_more']; ?></button>
								</div>
							</div>
						<?php } ?>
					<?php else: ?>
						<div class="search-filter-center-text empty_state">
							<?php echo($wo['html']); ?>
						</div>
					<?php endif; ?>
			    </section>
		    </div>
		</div>


	</div>
</div>
<script type="text/javascript">
	recpoll()
</script>