<div class="page-margin">
	<div class="row">
		<div class="col-md-2 leftcol"><?php echo lui_LoadPage("sidebar/left-sidebar"); ?></div>
		<div class="col-md-7 singlecol">
			<?php if ($wo['config']['user_ads'] == 1): ?>
				<div id="sidebar-sticky-offer">
					<?php 
					  $wo['sidebar-ad'] = lui_GetAdsByType('offer');
					  if (!empty($wo['sidebar-ad'])) {
					  	echo lui_LoadPage('ads/includes/offer-ad');
					  }
					?>
					<div class="clear"></div>
				</div>
		    <?php endif; ?>
			<div class="page-margin wow_content mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr big_size">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M5.5,7A1.5,1.5 0 0,1 4,5.5A1.5,1.5 0 0,1 5.5,4A1.5,1.5 0 0,1 7,5.5A1.5,1.5 0 0,1 5.5,7M21.41,11.58L12.41,2.58C12.05,2.22 11.55,2 11,2H4C2.89,2 2,2.89 2,4V11C2,11.55 2.22,12.05 2.59,12.41L11.58,21.41C11.95,21.77 12.45,22 13,22C13.55,22 14.05,21.77 14.41,21.41L21.41,14.41C21.78,14.05 22,13.55 22,13C22,12.44 21.77,11.94 21.41,11.58Z"></path></svg></span> <?php echo $wo['lang']['offers'] ?>
					</div>
				</div>
			</div>
			<div class="latest-products">
				<div class="market_bottom">
					<?php
					    $data = array();
						$data['limit'] = 10;
						$offers = lui_GetAllOffers($data);
						if (count($offers) > 0) {
					?>
					<div class="row" id="products">
						<?php
						foreach ($offers as $key => $wo['offer']) {
							echo lui_LoadPage('offers/offers'); 
						}
						} else {
							echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg> ' . $wo['lang']['no_available_offers'] . '</h5>';
						}
						?>
					</div>
				</div>
			</div> 	
			<div class="posts_load load-produts">
			    <?php if (count($offers) > 0): ?>
				<div class="load-more">
                    <button class="btn btn-default text-center wo_load_more" onclick="Wo_LoadOffers();">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo $wo['lang']['load_more_offers'] ?>
					</button>
                </div>
                <?php endif ?>
			</div>
		<div class="clear"></div>

	</div>
	<div class="clear"></div>
		<br>		
           <?php echo lui_LoadPage('footer/content'); ?>
</div>
<div class="modal fade" id="delete-offer-modal" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> <?php echo $wo['lang']['delete_offer']; ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo $wo['lang']['confirm_delete_offer']; ?></p>
				<input type="hidden" id="delet_offer_id">
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button id="delete-all-post" type="button" onclick="Wo_DeleteOffer();" class="btn btn-main"><?php echo $wo['lang']['delete']; ?></button>
			</div>
		</div>
	</div>
</div>
</div>
<script>
	function Wo_OpenOfferDeleteBox(offer_id) {
	  $('#delet_offer_id').val(offer_id);
	  var delete_box = $('#delete-offer-modal');
	  delete_box.modal({
	    show: true
	  });
	}
	function Wo_DeleteOffer() {
	  Wo_CloseLightbox();
	  var offer_id = $('#delet_offer_id').val();
	  var delete_box = $('#delete-offer-modal');
	  $('#delete-offer-modal').find('.ball-pulse').fadeIn(100);
	  $.get(Wo_Ajax_Requests_File(), {
	    f: 'offer',
	    s: 'delete_offer',
	    offer_id: offer_id
	  }, function (data) {
	    if(data.status == 200) {
	      delete_box.modal('hide');
	      setTimeout(function () {
	        $('#product-' + offer_id).slideUp(200, function () {
	          $(this).remove();
	        });
	      }, 300);
	    }
	    $('#delete-offer-modal').find('.ball-pulse').fadeOut(100);
	  });
	}

function Wo_LoadOffers() {
	$('.load-produts').html('<div class="white-loading list-group"><div class="cs-loader"><div class="cs-loader-inner"><label> ●</label><label> ●</label><label> ●</label><label> ●</label><label> ●</label><label> ●</label></div></div></div>');
	var $last_id = $('.product:last').attr('data-id');
	$.post(Wo_Ajax_Requests_File() + '?f=offer&s=load_more', {last_id: $last_id}, function (data) {
		if (data.status == 200) {
			if (data.html.length > 0) {
				$('.load-produts').html('<div class="load-more"><button class="btn btn-default text-center pointer" onclick="Wo_LoadOffers();"><i class="fa fa-arrow-down progress-icon" data-icon="arrow-down"></i> <?php echo $wo['lang']['load_more_offers'] ?></button></div>');
				$('#products').append(data.html);
			} else {
				$('.load-produts').html('<div class="load-more"><button class="btn btn-default text-center pointer" onclick="Wo_LoadOffers();"><?php echo $wo['lang']['no_available_offers'] ?></button></div>');
			}
		}
	});
}
</script>