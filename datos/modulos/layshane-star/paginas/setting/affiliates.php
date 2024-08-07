<div class="wo_settings_page wow_content">
	<div class="avatar-holder affiliates">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Profile Picture" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>

			<p><?php echo $wo['lang']['my_affiliates']; ?> </p>
		</div>
	</div>
	<hr>
	<!-- <a href="<?php echo lui_SeoLink('index.php?link1=setting&page=payments');?>" data-ajax="?link1=setting&page=payments"><?php echo lui_GetCurrency($wo['config']['ads_currency']) . $wo['setting']['balance'];?></a> -->
	<div class="setting-panel">
		<div class="wo_aff_sett">
			<div class="row">
				<div class="col-md-8">
					<h4>
						<?php
							if( $wo['config']['amount_percent_ref'] > 0 ){
								$earn_users = str_replace('{amount}', $wo['config']['amount_percent_ref'], $wo['lang']['earn_users']);
								$earn_users = str_replace('$', '%', $earn_users);
								$earn_users_pro = str_replace('{amount}', $wo['config']['amount_percent_ref'], $wo['lang']['earn_users_pro']);
								$earn_users_pro = str_replace('$', '%', $earn_users_pro);
							}else if( $wo['config']['amount_ref'] > 0 ){
								$earn_users = str_replace('{amount}', $wo['config']['amount_ref'], $wo['lang']['earn_users']);
								$earn_users = str_replace('$', lui_GetCurrency($wo['config']['ads_currency']), $earn_users);
								$earn_users_pro = str_replace('{amount}', $wo['config']['amount_ref'], $wo['lang']['earn_users_pro']);
								$earn_users_pro = str_replace('$', lui_GetCurrency($wo['config']['ads_currency']), $earn_users_pro);
							}
						?>
						<?php if($wo['config']['affiliate_type'] == 0) { ?>
							<?php echo $earn_users; ?>
						<?php } else { ?>
							<?php echo $earn_users_pro; ?>
						<?php } ?>
					</h4>
					<div class="wo_affiliate_bottom">
						<?php $link = $wo['config']['site_url'] . '/register?ref=' . $wo['setting']['username'];?>
						<div class="wow_form_fields">
							<label for="link"><?php echo $wo['lang']['your_ref_link'];?></label>
						</div>
						<div class="wow_form_fields aff_link">
							<input id="link" class="width-dynamic" type="text" value="<?php echo $link;?>" autocomplete="off" onclick="this.select();" readonly>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<img src="<?php echo $wo['config']['theme_url'];?>/img/affiliate.svg" />
				</div>
			</div>
		</div>
	
		<div class="wow_affs_main">
			<div class="text-center">
				<div class="wo_affiliate_bottom">
					<div class="wow_form_fields">
						<label for="share_to"><?php echo $wo['lang']['share_to'];?></label>
					</div>
					<div class="wow_form_fields">
						<div class="social-btn">
							<a class="social-btn-parent" rel="publisher" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link;?>" target="_blank">
								<svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_01.facebook" data-name="01.facebook"><circle id="background" cx="76" cy="76" fill="#334c8c" r="76"></circle><path id="icon" d="m95.26 68.81-1.26 10.58a2 2 0 0 1 -2 1.78h-11v31.4a1.42 1.42 0 0 1 -1.4 1.43h-11.21a1.42 1.42 0 0 1 -1.4-1.44l.06-31.39h-8.33a2 2 0 0 1 -2-2v-10.58a2 2 0 0 1 2-2h8.28v-10.26c0-11.87 7.06-18.33 17.4-18.33h8.47a2 2 0 0 1 2 2v8.91a2 2 0 0 1 -2 2h-5.19c-5.62.09-6.68 2.78-6.68 6.8v8.85h12.31a2 2 0 0 1 1.95 2.25z" fill="#fff"></path></g></g></svg>
							</a>
						</div>
						<div class="social-btn">
							<a class="social-btn-parent" href="https://twitter.com/intent/tweet?text=<?php echo $link;?>" target="_blank">
								<svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_02.twitter" data-name="02.twitter"><circle id="background" cx="76" cy="76" fill="#00a6de" r="76"></circle><path id="icon" d="m113.85 53a32.09 32.09 0 0 1 -6.51 7.15 2.78 2.78 0 0 0 -1 2.17v.25a45.58 45.58 0 0 1 -2.94 15.86 46.45 46.45 0 0 1 -8.65 14.5 42.73 42.73 0 0 1 -18.75 12.39 46.9 46.9 0 0 1 -14.74 2.29 45 45 0 0 1 -22.6-6.09 1.3 1.3 0 0 1 -.62-1.44 1.25 1.25 0 0 1 1.22-.94h1.9a30.24 30.24 0 0 0 16.94-5.14 16.42 16.42 0 0 1 -13-11.16.86.86 0 0 1 1-1.11 15.08 15.08 0 0 0 2.76.26h.35a16.43 16.43 0 0 1 -9.57-15.11.86.86 0 0 1 1.27-.75 14.44 14.44 0 0 0 3.74 1.45 16.42 16.42 0 0 1 -2.65-19.92.86.86 0 0 1 1.41-.12 42.93 42.93 0 0 0 29.51 15.78h.08a.62.62 0 0 0 .6-.67 17.36 17.36 0 0 1 .38-6 15.91 15.91 0 0 1 10.7-11.44 17.59 17.59 0 0 1 5.19-.8 16.36 16.36 0 0 1 10.84 4.09 2.12 2.12 0 0 0 1.41.54 2.15 2.15 0 0 0 .5-.07 30 30 0 0 0 8-3.31.85.85 0 0 1 1.25 1 16.23 16.23 0 0 1 -4.31 6.87 30.2 30.2 0 0 0 5.24-1.77.86.86 0 0 1 1.05 1.24z" fill="#fff"></path></g></g></svg>
							</a>
						</div>
						<div class="social-btn">
							<a class="social-btn-parent" href="https://api.whatsapp.com/send?text=<?php echo $link;?>" data-action="share/whatsapp/share" target="_blank">
								<svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Layer_2" data-name="Layer 2"><g id="_08.whatsapp" data-name="08.whatsapp"><circle id="background" cx="76" cy="76" fill="#2aa81a" r="76"/><g id="icon" fill="#fff"><path d="m102.81 49.19a37.7 37.7 0 0 0 -60.4 43.62l-4 19.42a1.42 1.42 0 0 0 .23 1.13 1.45 1.45 0 0 0 1.54.6l19-4.51a37.7 37.7 0 0 0 43.6-60.26zm-5.94 47.37a29.56 29.56 0 0 1 -34 5.57l-2.66-1.32-11.67 2.76v-.15l2.46-11.77-1.3-2.56a29.5 29.5 0 0 1 5.43-34.27 29.53 29.53 0 0 1 41.74 0l.13.18a29.52 29.52 0 0 1 -.15 41.58z"/><path d="m95.84 88c-1.43 2.25-3.7 5-6.53 5.69-5 1.2-12.61 0-22.14-8.81l-.12-.11c-8.29-7.74-10.49-14.19-10-19.3.29-2.91 2.71-5.53 4.75-7.25a2.72 2.72 0 0 1 4.25 1l3.07 6.94a2.7 2.7 0 0 1 -.33 2.76l-1.56 2a2.65 2.65 0 0 0 -.21 2.95 29 29 0 0 0 5.27 5.86 31.17 31.17 0 0 0 7.3 5.23 2.65 2.65 0 0 0 2.89-.61l1.79-1.82a2.71 2.71 0 0 1 2.73-.76l7.3 2.09a2.74 2.74 0 0 1 1.54 4.14z"/></g></g></g></svg>
							</a>
						</div>
						<div class="social-btn">
							<a class="social-btn-parent" href="https://pinterest.com/pin/create/button/?url=<?php echo $link;?>" target="_blank">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 112.198 112.198" xml:space="preserve"> <g> <circle style="fill:#CB2027;" cx="56.099" cy="56.1" r="56.098"/> <g> <path style="fill:#F1F2F2;" d="M60.627,75.122c-4.241-0.328-6.023-2.431-9.349-4.45c-1.828,9.591-4.062,18.785-10.679,23.588 c-2.045-14.496,2.998-25.384,5.34-36.941c-3.992-6.72,0.48-20.246,8.9-16.913c10.363,4.098-8.972,24.987,4.008,27.596 c13.551,2.724,19.083-23.513,10.679-32.047c-12.142-12.321-35.343-0.28-32.49,17.358c0.695,4.312,5.151,5.621,1.78,11.571 c-7.771-1.721-10.089-7.85-9.791-16.021c0.481-13.375,12.018-22.74,23.59-24.036c14.635-1.638,28.371,5.374,30.267,19.14 C85.015,59.504,76.275,76.33,60.627,75.122L60.627,75.122z"/> </g> </g></svg>
							</a>
						</div>
						<div class="social-btn">
							<a class="social-btn-parent" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $link;?>" target="_blank">
								<svg height="512" viewBox="0 0 152 152" width="512" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><g id="_10.linkedin" data-name="10.linkedin"><circle id="background" cx="76" cy="76" fill="#0b69c7" r="76"></circle><g id="icon" fill="#fff"><path d="m59 48.37a10.38 10.38 0 1 1 -10.37-10.37 10.38 10.38 0 0 1 10.37 10.37z"></path><rect height="50.93" rx="2.57" width="16.06" x="40.6" y="63.07"></rect><path d="m113.75 89.47v22.17a2.36 2.36 0 0 1 -2.36 2.36h-11.72a2.36 2.36 0 0 1 -2.36-2.36v-21.48c0-3.21.93-14-8.38-14-7.22 0-8.69 7.42-9 10.75v24.78a2.36 2.36 0 0 1 -2.34 2.31h-11.34a2.35 2.35 0 0 1 -2.36-2.36v-46.2a2.36 2.36 0 0 1 2.36-2.37h11.34a2.37 2.37 0 0 1 2.41 2.37v4c2.68-4 6.66-7.12 15.13-7.12 18.73-.01 18.62 17.52 18.62 27.15z"></path></g></g></g></svg>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="referres wo_referres">
			<?php if (!empty($wo['setting']['ref_level'])) {
				$ref_level = json_decode($wo['setting']['ref_level'],true);
				if (!empty($ref_level)) {
			?>
				<ul class="multi_ref_sys" id="refs_myUL">
					<?php foreach ($ref_level as $key => $value) {
						$wo['ref'] = lui_UserData($key);
					?>
					<?php if (!empty($value)) { ?>
						<li><span class="refs_caret" users_data="<?php echo $wo['ref']['user_id']; ?>" onclick="GetNextUsers(this)"><?php echo lui_LoadPage('setting/refs'); ?></span>
					    </li>
					<?php }else{ ?>
					    <li><span><?php echo lui_LoadPage('setting/refs'); ?></span></li>
				  <?php } ?>
				  <?php } ?>
				</ul>
			<?php }}else{
				$refs = lui_GetReferrers();
	      	 	if (count($refs) > 0) {
	      	 	 	foreach ($refs as $key => $wo['ref']) {
	      	 	 		echo lui_LoadPage('setting/refs');
	      	 	 	}
	      	 	}
	      	 }
			?>

		</div>
	</div>
</div>
<script>
	$.fn.textWidth = function(text, font) {
		if (!$.fn.textWidth.fakeEl) $.fn.textWidth.fakeEl = $('<span>').hide().appendTo(document.body);
		$.fn.textWidth.fakeEl.text(text || this.val() || this.text() || this.attr('placeholder')).css('font', font || this.css('font'));
		return $.fn.textWidth.fakeEl.width();
	};

	$('.width-dynamic').on('input', function() {
		var inputWidth = $(this).textWidth();
		$(this).css({
			width: inputWidth
		})
	}).trigger('input');
	
	function GetNextUsers(self){
		next_users = $(self).attr('users_data');
		$.post( Wo_Ajax_Requests_File() + '?f=next_users', {user_id:"<?php echo $wo['setting']['user_id']; ?>",next_users:next_users}, function(data, textStatus, xhr) {
			if (data.status == 200) {
				$(self).after(data.html);
				self.parentElement.querySelector(".refs_nested").classList.toggle("refs_active");
			    self.classList.toggle("refs_caret_down");
			}
		});
	}
</script>
<style>
.social-btn {width: 100%;display: inline;}
.social-btn-parent {text-decoration: none;}
.social-btn svg.feather {margin-top: 0px;width: 24px;height: 24px;}
</style>
