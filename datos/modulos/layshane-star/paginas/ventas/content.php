<style type="text/css">
body{background-color:#F0F2FD;}
.content_imventario_layshane{display:grid;flex-wrap:wrap;gap:2rem;width:100%;grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));}
.card{overflow:hidden;position:relative;text-align:left;border-radius:0.5rem;user-select:none;box-shadow:0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);background-color:#fff;}
.div_image_v{background:#47c9a2;border-bottom:none;position:relative;text-align:center;margin:-20px -20px 0;border-radius:5px 5px 0 0;padding:35px;}
.header{padding:1.25rem 1rem 1rem 1rem;}
.image{display:flex;margin-left:auto;margin-right:auto;background-color:#e2feee;flex-shrink:0;justify-content:center;align-items:center;width:4rem;height:4rem;border-radius:9999px;animation:animate .6s linear alternate-reverse infinite;transition:.6s ease;}
.image svg{color:#0afa2a;width:2rem;height:2rem;}
.content{margin-top:0.75rem;text-align:center;}
.title{color:#066e29;font-size:1rem;font-weight:600;line-height:1.5rem;}
.message{margin-top:0.5rem;color:#595b5f;font-size:0.875rem;line-height:1.25rem;}
@keyframes animate{from{transform:scale(1);}to{transform:scale(1.09);}}
</style>
<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>
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
		            <span style="color:#3498db;"><svg xmlns="http://www.w3.org/2000/svg" style="fill:none;" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 5a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1v-10z"></path><path d="M7 20h10"></path><path d="M9 16v4"></path><path d="M15 16v4"></path></svg></span> Ventas
		          </div>
		        </div>
		    </div>
		    <br><br>
		    <div class="wo_my_pages">
		    	<section class="content_imventario_layshane">
		    		<div class="card">
		    			<div class="header"> 
			            	<div class="div_image_v">
			            		<div class="image">
			            			<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
			            		</div>
			            	</div>
			            	<div class="content">
			            		<span class="title">VENTAS</span> 
			            		<p class="message">0</p>
			            	</div>
			            </div>
			        </div>
			    </section>
		    </div>
		</div>


	</div>
</div>
<script type="text/javascript">
	recpoll()
</script>