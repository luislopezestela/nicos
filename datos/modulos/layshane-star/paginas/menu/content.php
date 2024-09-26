<?php
$is_admin     = lui_IsAdmin();
$is_moderoter = lui_IsModerator();
 ?>
<style type="text/css">
:root{
	--color-menu:#3a404c;
}
.menu_ct_title{display:flex;width:100%;flex-wrap:wrap;}
.menu_cts_title{font-size:18px;font-weight:700;padding:20px;color:var(--color-menu);}
.content_user_st_m{display:flex;width:100%;padding:0 20px 20px;}
.cont_layshane_menu,
.content_user_st_m .user_view_menu{display:flex;padding:10px;background:rgba(255, 255, 255, 1.0);border-radius:8px;justify-content:flex-start;align-items:center;width:100%;gap:0.5rem;box-shadow:0 2px 12px rgba(0, 0, 0, 0.2);color:var(--color-menu);}
.menu_content_layshane{display:grid;grid-template-columns:1fr 1fr;gap:1rem;padding:5px 20px;}
.menu_content_layshane a svg{width:40px;padding:5px;}
.menu_content_layshane hr:not(li) {
  grid-column: span 2; /* Asegura que los elementos li ocupen ambas columnas */
}
.wallet_contain_s{grid-column:span 2;padding:10px;background:#fff;border-radius:8px;}
.night_mode_layshane::before {
    content: '';
    display: inline-block;
    width: 40px;
    height: 40px;
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40" color="%23000000" fill="none"> <path d="M21.5 14.0784C20.3003 14.7189 18.9301 15.0821 17.4751 15.0821C12.7491 15.0821 8.91792 11.2509 8.91792 6.52485C8.91792 5.06986 9.28105 3.69968 9.92163 2.5C5.66765 3.49698 2.5 7.31513 2.5 11.8731C2.5 17.1899 6.8101 21.5 12.1269 21.5C16.6849 21.5 20.503 18.3324 21.5 14.0784Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>'); /* Ruta del SVG codificada en base64 */
    background-repeat:no-repeat;
    margin-right: 5px;
    vertical-align: middle;
}
.close_sessions_layshane,
.night_mode_layshane span{color:var(--color-menu);}
.footer_page_list_l{display:none!important;}
.content-container{padding-bottom:60px!important;}
footer{background:transparent!important;}

</style>
<div class="menu_ct_title">
	<span class="menu_cts_title">Menú</span>
</div>
<?php if ($wo['loggedin'] == true): ?>
	<div class="content_user_st_m">
		<a class="user_view_menu" href="<?php echo $wo['user']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['user']['username'];?>">
			<svg aria-label="Tu perfil" data-visualcompletion="ignore-dynamic" role="img" style="height:40px;width:40px;display:block!important;border-radius:50%;"><mask id=":Rqir3aj9emhpapd5aq:"><circle cx="20" cy="20" fill="white" r="20"></circle></mask><g mask="url(#:Rqir3aj9emhpapd5aq:)"><image id="updateImage-<?php echo $wo['user']['user_id']?>" style="height:40px;width:40px" x="0" y="0" height="100%" preserveAspectRatio="xMidYMid slice" width="100%" xlink:href="<?php echo $wo['user']['avatar'];?>" alt="<?php echo $wo['user']['name'];?> Foto de perfil" title="<?php echo $wo['user']['name'];?>?stp=cp0_dst-jpg_p80x80&amp;_nc_cat=106&amp;ccb=1-7&amp;_nc_sid=5740b7&amp;_nc_eui2=AeHUyvGqD28DTV6dFGiOhORyO6rJUO4xvbs7qslQ7jG9u3HR9C1nni0qwp0btEgtV1o7JwMo4kTgIbsHvzqd_A-L&amp;_nc_ohc=DA2_ucFDv0YAX9ojMSS&amp;_nc_ht=scontent.flim2-2.fna&amp;oh=00_AfDSY02NmaaCrFBDtDsQgANdwf8YXSBfTUkfhYRdAhX7fw&amp;oe=65E0FA2A"></image><circle class="xbh8q5q x1pwv2dq xvlca1e" cx="20" cy="20" r="20"></circle></g></svg>
			<b><?php echo ucfirst($wo['user']['name'].' '.$wo['user']['last_name']);?></b>
		</a>
	</div>
<?php else: ?>
	<div class="content_user_st_m">
		<a class="user_view_menu" href="<?php echo lui_SeoLink('index.php?link1=acceder'); ?>" data-ajax="?link1=acceder">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40" fill="none">
                <path d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z" stroke="currentColor" stroke-width="1.5" />
              </svg>
			<b><?php echo ucfirst($wo['lang']['login']);?></b>
		</a>
	</div>
<?php endif ?>

<div class="menu_content_layshane" role="menu">
	<?php if ($wo['loggedin'] == true): ?>
		<div class="wallet_contain_s">
			<?php if (lui_IsAdmin() || lui_IsModerator()): ?>
			<a href="<?php echo lui_SeoLink('index.php?link1=wallet'); ?>" data-ajax="?link1=wallet">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-wallet"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" /><path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" /></svg> <?php echo ucfirst($wo['lang']['wallet']); ?>
			</a>					
			<?php endif ?>
		</div>
		<hr>
	<?php endif ?>
	
	<?php if(lui_IsAdmin() || lui_IsModerator()) { ?>
		<?php if ($wo['loggedin'] == true): ?>
			<a class="cont_layshane_menu" href="<?php echo lui_SeoLink('index.php?link1=my-blogs'); ?>"  data-ajax="?link1=my-blogs">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40" color="#e67e22" fill="none">
				    <path d="M18 15V9C18 6.17157 18 4.75736 17.1213 3.87868C16.2426 3 14.8284 3 12 3H8C5.17157 3 3.75736 3 2.87868 3.87868C2 4.75736 2 6.17157 2 9V15C2 17.8284 2 19.2426 2.87868 20.1213C3.75736 21 5.17157 21 8 21H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				    <path d="M6 8L14 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				    <path d="M6 12L14 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				    <path d="M6 16L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				    <path d="M18 8H19C20.4142 8 21.1213 8 21.5607 8.43934C22 8.87868 22 9.58579 22 11V19C22 20.1046 21.1046 21 20 21C18.8954 21 18 20.1046 18 19V8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				</svg> <?php echo $wo['lang']['my_articles'] ?>
			</a>
			<a class="cont_layshane_menu" href="<?php echo lui_SeoLink('index.php?link1=my-products'); ?>"  data-ajax="?link1=my-products">
				<svg viewBox="0 0 1024 1024" color="#4a90e2" fill="currentColor"><path d="M504.1 452.5c-18.3 0-36.5-4.1-50.7-10.1l-280.1-138c-18.3-10.1-30.4-24.4-30.4-40.6 0-16.2 10.2-32.5 30.4-42.6L455.4 77.1c16.2-8.1 34.5-12.2 54.8-12.2 18.3 0 36.5 4.1 50.7 10.1L841 213c18.3 10.1 30.4 24.4 30.4 40.6 0 16.2-10.1 32.5-30.4 42.6L558.9 440.3c-16.3 8.1-34.5 12.2-54.8 12.2zM193.6 261.7l280.1 138c8.1 4.1 18.3 6.1 30.4 6.1 12.2 0 24.4-2 32.5-6.1l284.1-144.1-280.1-138c-8.1-4.1-18.3-6.1-30.4-6.1-12.2 0-24.4 2-32.5 6.1L193.6 261.7z m253.6 696.1c-10.1 0-20.3-2-30.4-8.1L165.1 817.8c-30.4-14.2-52.8-46.7-52.8-73.1V391.6c0-24.4 18.3-42.6 44.6-42.6 10.1 0 20.3 2 30.4 8.1L437.1 489c30.4 14.2 52.8 46.7 52.8 73.1v353.1c0 24.4-18.3 42.6-42.7 42.6z m-10.1-48.7c2 2 4.1 2 6.1 2v-349c0-8.1-10.1-24.4-26.4-32.5L165.1 397.7c-2-2-4.1-2-6.1-2v349.1c0 8.1 10.2 24.4 26.4 32.5l251.7 131.8z m144.1 48.7c-24.4 0-42.6-18.3-42.6-42.6V562.1c0-26.4 22.3-58.9 52.8-73.1L841 357.1c10.1-4.1 20.3-8.1 30.4-8.1 24.4 0 42.6 18.3 42.6 42.6v353.1c0 26.4-22.3 58.9-52.8 73.1L611.6 949.7c-12.2 6.1-20.3 8.1-30.4 8.1z m280-560.1L611.6 529.6c-16.2 8.1-26.4 24.4-26.4 32.5v349.1c2 0 4.1-2 6.1-2l249.6-131.9c16.2-8.1 26.4-24.4 26.4-32.5V395.7c-2 0-4 2-6.1 2z m0 0"  /></svg>
				<?php echo ucfirst($wo['lang']['my_products']) ?>
			</a>
		<?php endif ?>
	<?php }else{ ?>
		<a class="cont_layshane_menu" href="<?php echo lui_SeoLink('index.php?link1=blogs'); ?>"  data-ajax="?link1=blogs">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40" color="#e67e22" fill="none">
			    <path d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
			    <path d="M10 10H11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			    <path d="M10 15H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			    <path d="M14.9577 11.4622V10.5088C14.9577 8.63614 14.9577 7.69981 14.4825 7.04341C13.5821 5.79972 11.833 6.01409 10.4788 6.01409C9.12474 6.01409 7.37562 5.79972 6.47521 7.04341C6 7.69981 6 8.63614 6 10.5088V13.0059C6 15.3601 6 16.5373 6.72879 17.2686C7.45758 18 8.63055 18 10.9765 18H14.6862C17.285 18 18.3239 16.1725 17.913 13.5687C17.6684 12.0195 16.3315 11.4622 14.9577 11.4622Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
			</svg> <?php echo $wo['lang']['blog'] ?>
		</a>

		<a class="cont_layshane_menu" href="<?php echo lui_SeoLink('index.php?link1=tienda'); ?>"  data-ajax="?link1=tienda">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40" color="#4a90e2" fill="none">
			    <path d="M3 10.9871V15.4925C3 18.3243 3 19.7403 3.87868 20.62C4.75736 21.4998 6.17157 21.4998 9 21.4998H15C17.8284 21.4998 19.2426 21.4998 20.1213 20.62C21 19.7403 21 18.3243 21 15.4925V10.9871" stroke="currentColor" stroke-width="1.5" />
			    <path d="M15 16.9768C14.3159 17.584 13.2268 17.9768 12 17.9768C10.7732 17.9768 9.68409 17.584 9 16.9768" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
			    <path d="M17.7957 2.50294L6.14983 2.53202C4.41166 2.44248 3.966 3.78259 3.966 4.43768C3.966 5.02359 3.89055 5.87774 2.82524 7.4831C1.75993 9.08846 1.83998 9.56536 2.44071 10.6767C2.93928 11.5991 4.20741 11.9594 4.86862 12.02C6.96883 12.0678 7.99065 10.2517 7.99065 8.97523C9.03251 12.1825 11.9955 12.1825 13.3158 11.8157C14.6385 11.4483 15.7717 10.1331 16.0391 8.97523C16.195 10.4142 16.6682 11.2538 18.0663 11.8308C19.5145 12.4284 20.7599 11.515 21.3848 10.9294C22.0096 10.3439 22.4107 9.04401 21.2967 7.6153C20.5285 6.63001 20.2084 5.7018 20.1032 4.73977C20.0423 4.18234 19.9888 3.58336 19.5971 3.20219C19.0247 2.64515 18.2035 2.47613 17.7957 2.50294Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
			<?php echo ucfirst($wo['lang']['tienda']) ?>
		</a>
	<?php } ?>
	<?php if ($wo['loggedin'] == true): ?>
		<?php if ($wo['config']['classified'] == 1) { ?>
			<a class="cont_layshane_menu" href="<?php echo lui_SeoLink('index.php?link1=purchased'); ?>" data-ajax="?link1=purchased">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40" color="#1abc9c" fill="none">
				    <path d="M3.06164 15.1933L3.42688 13.1219C3.85856 10.6736 4.0744 9.44952 4.92914 8.72476C5.78389 8 7.01171 8 9.46734 8H14.5327C16.9883 8 18.2161 8 19.0709 8.72476C19.9256 9.44952 20.1414 10.6736 20.5731 13.1219L20.9384 15.1933C21.5357 18.5811 21.8344 20.275 20.9147 21.3875C19.995 22.5 18.2959 22.5 14.8979 22.5H9.1021C5.70406 22.5 4.00504 22.5 3.08533 21.3875C2.16562 20.275 2.4643 18.5811 3.06164 15.1933Z" stroke="currentColor" stroke-width="1.5" />
				    <path d="M7.5 8L7.66782 5.98618C7.85558 3.73306 9.73907 2 12 2C14.2609 2 16.1444 3.73306 16.3322 5.98618L16.5 8" stroke="currentColor" stroke-width="1.5" />
				    <path d="M15 11C14.87 12.4131 13.5657 13.5 12 13.5C10.4343 13.5 9.13002 12.4131 9 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
				</svg> <?php echo $wo['lang']['mis_compras']; ?>
			</a>
		<?php } ?>

		<a class="cont_layshane_menu" href="<?php echo lui_SeoLink('index.php?link1=setting&page=general-setting'); ?>" data-ajax="?link1=setting&page=general-setting"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M10 4A4 4 0 0 0 6 8A4 4 0 0 0 10 12A4 4 0 0 0 14 8A4 4 0 0 0 10 4M17 12C16.87 12 16.76 12.09 16.74 12.21L16.55 13.53C16.25 13.66 15.96 13.82 15.7 14L14.46 13.5C14.35 13.5 14.22 13.5 14.15 13.63L13.15 15.36C13.09 15.47 13.11 15.6 13.21 15.68L14.27 16.5C14.25 16.67 14.24 16.83 14.24 17C14.24 17.17 14.25 17.33 14.27 17.5L13.21 18.32C13.12 18.4 13.09 18.53 13.15 18.64L14.15 20.37C14.21 20.5 14.34 20.5 14.46 20.5L15.7 20C15.96 20.18 16.24 20.35 16.55 20.47L16.74 21.79C16.76 21.91 16.86 22 17 22H19C19.11 22 19.22 21.91 19.24 21.79L19.43 20.47C19.73 20.34 20 20.18 20.27 20L21.5 20.5C21.63 20.5 21.76 20.5 21.83 20.37L22.83 18.64C22.89 18.53 22.86 18.4 22.77 18.32L21.7 17.5C21.72 17.33 21.74 17.17 21.74 17C21.74 16.83 21.73 16.67 21.7 16.5L22.76 15.68C22.85 15.6 22.88 15.47 22.82 15.36L21.82 13.63C21.76 13.5 21.63 13.5 21.5 13.5L20.27 14C20 13.82 19.73 13.65 19.42 13.53L19.23 12.21C19.22 12.09 19.11 12 19 12H17M10 14C5.58 14 2 15.79 2 18V20H11.68A7 7 0 0 1 11 17A7 7 0 0 1 11.64 14.09C11.11 14.03 10.56 14 10 14M18 15.5C18.83 15.5 19.5 16.17 19.5 17C19.5 17.83 18.83 18.5 18 18.5C17.16 18.5 16.5 17.83 16.5 17C16.5 16.17 17.17 15.5 18 15.5Z" /></svg> <?php echo $wo['lang']['setting']; ?></a>

		<?php if(lui_IsAdmin() || lui_IsModerator()) { ?>
			<hr>
			<a class="cont_layshane_menu" href="<?php echo $wo['config']['site_url'] . '/admin-cp'; ?>"><svg viewBox="0 0 24 24" color="#9b59b6"><path fill="currentColor" d="M13,3V9H21V3M13,21H21V11H13M3,21H11V15H3M3,13H11V3H3V13Z" /></svg> <?php echo $wo['lang']['admin_area']; ?></a>
		<?php } ?>
	<?php endif ?>
	<a class="cont_layshane_menu" data-toggle="modal" data-target="#select-language">
		<?php
			$wo['lang_attr'] = 'es';
			$wo['lang_og_meta'] = '';
			if (!empty($wo["language"]) && !empty($wo['iso']) && in_array($wo["language"], array_keys($wo['iso'])) && !empty($wo['iso'][$wo["language"]])) {
			    $wo['lang_attr'] = $wo['iso'][$wo["language"]];
			}
		?>
		<?php $idioma = $db->where('iso',$wo['lang_attr'])->getOne(T_LANG_ISO); ?>
			<span class="flex"  style="padding:5px;">
				<i class="<?=ucfirst($idioma['lang_name']);?>">
					<span class="language_initial" rel="nofollow">
						<?php if (ucfirst($idioma['lang_name'])=='English'): ?>
							<img height="30" width="30" src="<?php echo $wo['config']['theme_url']; ?>/img/flags/united-states.svg" alt="layshane">
						<?php elseif (ucfirst($idioma['lang_name'])=='Italian'): ?>
							<img height="30" width="30" src="<?php echo $wo['config']['theme_url']; ?>/img/flags/italy.svg" alt="layshane">
						<?php elseif (ucfirst($idioma['lang_name'])=='Portuguese'): ?>
							<img height="30" width="30" src="<?php echo $wo['config']['theme_url']; ?>/img/flags/portugal.svg" alt="layshane">
						<?php elseif (ucfirst($idioma['lang_name'])=='Spanish'): ?>
							<img height="30" width="30" src="<?php echo $wo['config']['theme_url']; ?>/img/flags/peru.svg" alt="layshane">
						<?php elseif (ucfirst($idioma['lang_name'])=='Quechua'): ?>
							<img height="30" width="30" src="<?php echo $wo['config']['theme_url']; ?>/img/flags/peru.svg" alt="layshane">
						<?php endif ?>
					</span>
				</i>
			</span>
			<?=ucfirst($wo['lang'][ucfirst($idioma['lang_name']).'_'.$idioma['iso']]); ?>
	</a>
	<hr>
	<?php if ($wo['loggedin'] == true): ?>
		<a class="close_sessions_layshane" href="<?php echo lui_SeoLink('index.php?link1=logout')."/?cache=".time(); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40" color="#e74c3c" fill="none">
			    <path d="M11 3L10.3374 3.23384C7.75867 4.144 6.46928 4.59908 5.73464 5.63742C5 6.67576 5 8.0431 5 10.7778V13.2222C5 15.9569 5 17.3242 5.73464 18.3626C6.46928 19.4009 7.75867 19.856 10.3374 20.7662L11 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
			    <path d="M21 12L11 12M21 12C21 11.2998 19.0057 9.99153 18.5 9.5M21 12C21 12.7002 19.0057 14.0085 18.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			</svg> <?php echo $wo['lang']['log_out']; ?></a>
		<hr>
	<?php endif ?>
	<a id="night_mode_toggle_layshane" class="night_mode_layshane" data-mode='<?php echo lui_Secure($wo['mode_link']) ?>'>
		<span class="night-mode-text" ><?php echo $wo['mode_text']; ?></span>
	</a>
	<br>
</div>
<script type="text/javascript">
$(document).on('click', '#night_mode_toggle_layshane', function(event) {
  mode = $(this).attr('data-mode');
  if (mode == 'night') {
      $('head').append('<link rel="stylesheet" href="<?php echo $wo['config']['theme_url'];?>/stylesheet/dark.css<?php echo $wo['update_cache']; ?>" id="night-mode-css">');
      $('#night_mode_toggle_layshane').attr('data-mode', 'day');
      $('#night-mode-text').text('<?php echo $wo['lang']['day_mode']?>');
      var tex_nigtday = document.getElementsByClassName('night-mode-text');
      var tex_nigtdaymode = document.getElementsByClassName('night_mode_layshane');
      if (tex_nigtdaymode.length > 0) {
        $('.night_mode_layshane').attr('data-mode', 'day');
      }
      if (tex_nigtday.length > 0) {
        $(tex_nigtday).text('<?php echo $wo['lang']['day_mode']?>');
      }
  } else {
      $('#night-mode-css').remove();
      $('#night_mode_toggle_layshane').attr('data-mode', 'night');
      $('#night-mode-text').text('<?php echo $wo['lang']['night_mode']?>');
      var tex_nigtday = document.getElementsByClassName('night-mode-text');
      var tex_nigtdaymode = document.getElementsByClassName('night_mode_layshane');
      if (tex_nigtdaymode.length > 0) {
        $('.night_mode_layshane').attr('data-mode', 'night');
      }
      if (tex_nigtday.length > 0) {
        $(tex_nigtday).text('<?php echo $wo['lang']['night_mode']?>');
      }
  }
  $.post(Wo_Ajax_Requests_File() + '?mode=' + mode);
});

</script>