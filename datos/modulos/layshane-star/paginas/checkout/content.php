<?php if($wo['loggedin'] == true): ?>
<div class="page-margin container_cart_layshane">
	<div class="div_container_lui_cart">
		<div class="container_cart_lists">
			<div class="panel panel-white ch_card ch_cart">
        <div class="ch_title">
        	<a href="<?php echo $wo['config']['site_url'].'/tienda';?>" data-ajax="?link1=tienda" class="back-to-shop">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M21,11H6.83L10.41,7.41L9,6L3,12L9,18L10.41,16.58L6.83,13H21V11Z" /></svg> <?php echo $wo['lang']['back_to_shop'] ?>
					</a>
					<div>
						<p><?php echo(!empty($wo['items']) ? count($wo['items']) : 0) ?> <?php echo $wo['lang']['items'] ?></p>
					</div>
        </div>
				<div class="ch_prod_items_row">
					<?php if (!empty($wo['html'])): ?>
						<?=$wo['html'];?>
					<?php else: ?>
						<div class="carrito_null_layshane">
							<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="200" height="300" viewBox="0 0 896 747.97143" xmlns:xlink="http://www.w3.org/1999/xlink"><title><?=$wo['lang']['no_items_found'];?></title><path d="M193.634,788.75225c12.42842,23.049,38.806,32.9435,38.806,32.9435s6.22712-27.47543-6.2013-50.52448-38.806-32.9435-38.806-32.9435S181.20559,765.7032,193.634,788.75225Z" transform="translate(-152 -76.01429)" fill="#3e82ee"/><path d="M202.17653,781.16927c22.43841,13.49969,31.08016,40.3138,31.08016,40.3138s-27.73812,4.92679-50.17653-8.57291S152,772.59636,152,772.59636,179.73811,767.66958,202.17653,781.16927Z" transform="translate(-152 -76.01429)" fill="var(--boton-fondo)"/><rect x="413.2485" y="35.90779" width="140" height="2" fill="#f2f2f2"/><rect x="513.2485" y="37.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="452.2485" y="37.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="484.2485" y="131.90779" width="140" height="2" fill="#f2f2f2"/><rect x="522.2485" y="113.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="583.2485" y="113.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="670.2485" y="176.90779" width="140" height="2" fill="#f2f2f2"/><rect x="708.2485" y="158.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="769.2485" y="158.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="656.2485" y="640.90779" width="140" height="2" fill="#f2f2f2"/><rect x="694.2485" y="622.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="755.2485" y="622.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="417.2485" y="319.90779" width="140" height="2" fill="#f2f2f2"/><rect x="455.2485" y="301.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="516.2485" y="301.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="461.2485" y="560.90779" width="140" height="2" fill="#f2f2f2"/><rect x="499.2485" y="542.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="560.2485" y="542.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="685.2485" y="487.90779" width="140" height="2" fill="#f2f2f2"/><rect x="723.2485" y="469.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="784.2485" y="469.90779" width="2" height="18.5" fill="#f2f2f2"/><polygon points="362.06 702.184 125.274 702.184 125.274 700.481 360.356 700.481 360.356 617.861 145.18 617.861 134.727 596.084 136.263 595.347 146.252 616.157 362.06 616.157 362.06 702.184" fill="#3e82ee"/><circle cx="156.78851" cy="726.03301" r="17.88673" fill="var(--boton-fondo)"/><circle cx="333.10053" cy="726.03301" r="17.88673" fill="var(--boton-fondo)"/><circle cx="540.92726" cy="346.153" r="11.07274" fill="var(--boton-fondo)"/><path d="M539.38538,665.76747H273.23673L215.64844,477.531H598.69256l-.34852,1.10753Zm-264.8885-1.7035H538.136l58.23417-184.82951H217.95082Z" transform="translate(-152 -76.01429)" fill="#3e82ee"/><polygon points="366.61 579.958 132.842 579.958 82.26 413.015 418.701 413.015 418.395 413.998 366.61 579.958" fill="#f2f2f2"/><polygon points="451.465 384.7 449.818 384.263 461.059 341.894 526.448 341.894 526.448 343.598 462.37 343.598 451.465 384.7" fill="#3e82ee"/><rect x="82.2584" y="458.58385" width="345.2931" height="1.7035" fill="#3e82ee"/><rect x="101.45894" y="521.34377" width="306.31852" height="1.7035" fill="#3e82ee"/><rect x="254.31376" y="402.36843" width="1.7035" height="186.53301" fill="#3e82ee"/><rect x="385.55745" y="570.79732" width="186.92877" height="1.70379" transform="translate(-274.73922 936.23495) rotate(-86.24919)" fill="#3e82ee"/><rect x="334.45728" y="478.18483" width="1.70379" height="186.92877" transform="translate(-188.46866 -52.99638) rotate(-3.729)" fill="#3e82ee"/><rect y="745" width="896" height="2" fill="#3e82ee"/><path d="M747.41068,137.89028s14.61842,41.60627,5.62246,48.00724S783.39448,244.573,783.39448,244.573l47.22874-12.80193-25.86336-43.73993s-3.37348-43.73992-3.37348-50.14089S747.41068,137.89028,747.41068,137.89028Z" transform="translate(-152 -76.01429)" fill="darksalmon"/><path d="M747.41068,137.89028s14.61842,41.60627,5.62246,48.00724S783.39448,244.573,783.39448,244.573l47.22874-12.80193-25.86336-43.73993s-3.37348-43.73992-3.37348-50.14089S747.41068,137.89028,747.41068,137.89028Z" transform="translate(-152 -76.01429)" opacity="0.1"/><path d="M722.87364,434.46832s-4.26731,53.34138,0,81.07889,10.66828,104.5491,10.66828,104.5491,0,145.08854,23.4702,147.22219,40.53945,4.26731,42.6731-4.26731-10.66827-12.80193-4.26731-17.06924,8.53462-19.20289,0-36.27213,0-189.8953,0-189.8953l40.53945,108.81641s4.26731,89.61351,8.53462,102.41544-4.26731,36.27213,10.66827,38.40579,32.00483-10.66828,40.53945-14.93559-12.80193-4.26731-8.53462-6.401,17.06924-8.53462,12.80193-10.66828-8.53462-104.54909-8.53462-104.54909S879.69728,414.1986,864.7617,405.664s-24.537,6.16576-24.537,6.16576Z" transform="translate(-152 -76.01429)" fill="#2b2b2b"/><path d="M761.27943,758.78388v17.06924s-19.20289,46.39942,0,46.39942,34.13848,4.8083,34.13848-1.59266V763.05119Z" transform="translate(-152 -76.01429)" fill="black"/><path d="M887.16508,758.75358v17.06924s19.20289,46.39941,0,46.39941-34.13848,4.80831-34.13848-1.59266V763.02089Z" transform="translate(-152 -76.01429)" fill="black"/><circle cx="625.28185" cy="54.4082" r="38.40579" fill="darksalmon"/><path d="M765.54674,201.89993s10.66828,32.00482,27.73752,25.60386l17.06924-6.401L840.22467,425.9337s-23.47021,34.13848-57.60869,12.80193S765.54674,201.89993,765.54674,201.89993Z" transform="translate(-152 -76.01429)" fill="#3e82ee"/><path d="M795.41791,195.499l9.60145-20.26972s56.54186,26.67069,65.07648,35.20531,8.53462,21.33655,8.53462,21.33655l-14.93559,53.34137s4.26731,117.351,4.26731,121.61834,14.93559,27.73751,4.26731,19.20289-12.80193-17.06924-21.33655-4.26731-27.73751,27.73752-27.73751,27.73752Z" transform="translate(-152 -76.01429)" fill="var(--boton-fondo)"/><path d="M870.09584,349.12212l-6.401,59.74234s-38.40579,34.13848-29.87117,36.27214,12.80193-6.401,12.80193-6.401,14.93559,14.93559,23.47021,6.401S899.967,355.52309,899.967,355.52309Z" transform="translate(-152 -76.01429)" fill="darksalmon"/><path d="M778.1,76.14416c-8.51412-.30437-17.62549-.45493-24.80406,4.13321a36.31263,36.31263,0,0,0-8.5723,8.39153c-6.99153,8.83846-13.03253,19.95926-10.43553,30.92537l3.01633-1.1764a19.75086,19.75086,0,0,1-1.90515,8.46261c.42475-1.2351,1.84722.76151,1.4664,2.01085L733.543,139.792c5.46207-2.00239,12.25661,2.05189,13.08819,7.80969.37974-12.66123,1.6932-27.17965,11.964-34.59331,5.17951-3.73868,11.73465-4.88,18.04162-5.8935,5.81832-.935,11.91781-1.82659,17.49077.08886s10.31871,7.615,9.0553,13.37093c2.56964-.88518,5.44356.90566,6.71347,3.30856s1.33662,5.2375,1.37484,7.95506c2.73911,1.93583,5.85632-1.9082,6.97263-5.07112,2.62033-7.42434,4.94941-15.32739,3.53783-23.073s-7.72325-15.14773-15.59638-15.174a5.46676,5.46676,0,0,0,1.42176-3.84874l-6.48928-.5483a7.1723,7.1723,0,0,0,4.28575-2.25954C802.7981,84.73052,782.31323,76.29477,778.1,76.14416Z" transform="translate(-152 -76.01429)" fill="black"/><path d="M776.215,189.098s-17.36929-17.02085-23.62023-15.97822S737.80923,189.098,737.80923,189.098s-51.20772,17.06924-49.07407,34.13848S714.339,323.51826,714.339,323.51826s19.2029,100.28179,2.13366,110.95006,81.07889,38.40579,83.21254,25.60386,6.401-140.82123,0-160.02412S776.215,189.098,776.215,189.098Z" transform="translate(-152 -76.01429)" fill="var(--boton-fondo)"/><path d="M850.89294,223.23648h26.38265S895.6997,304.31537,897.83335,312.85s6.401,49.07406,4.26731,49.07406-44.80675-8.53462-44.80675-2.13365Z" transform="translate(-152 -76.01429)" fill="var(--boton-fondo)"/><path d="M850,424.01429H749c-9.85608-45.34-10.67957-89.14649,0-131H850C833.70081,334.115,832.68225,377.62137,850,424.01429Z" transform="translate(-152 -76.01429)" fill="#f2f2f2"/><path d="M707.93806,368.325,737.80923,381.127s57.60868,8.53462,57.60868-14.93559-57.60868-10.66827-57.60868-10.66827L718.60505,349.383Z" transform="translate(-152 -76.01429)" fill="darksalmon"/><path d="M714.339,210.43455l-25.60386,6.401L669.53227,329.91923s-6.401,29.87117,4.26731,32.00482S714.339,381.127,714.339,381.127s4.26731-32.00483,12.80193-32.00483L705.8044,332.05288,718.60633,257.375Z" transform="translate(-152 -76.01429)" fill="var(--boton-fondo)"/><rect x="60.2485" y="352.90779" width="140" height="2" fill="#f2f2f2"/><rect x="98.2485" y="334.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="159.2485" y="334.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="109.2485" y="56.90779" width="140" height="2" fill="#f2f2f2"/><rect x="209.2485" y="58.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="148.2485" y="58.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="250.2485" y="253.90779" width="140" height="2" fill="#f2f2f2"/><rect x="350.2485" y="255.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="289.2485" y="255.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="12.2485" y="252.90779" width="140" height="2" fill="#f2f2f2"/><rect x="112.2485" y="254.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="51.2485" y="254.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="180.2485" y="152.90779" width="140" height="2" fill="#f2f2f2"/><rect x="218.2485" y="134.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="279.2485" y="134.90779" width="2" height="18.5" fill="#f2f2f2"/></svg>
							<p><?=$wo['lang']['no_items_found'];?></p>
						</div>
					<?php endif ?>
				</div>
				<div class="ch_total_price">
					<div class="div_subs_contn">
						<span><?php echo $wo['lang']['subtotal'] ?></span>
						<span><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo $wo['subtotal']; ?></span>
					</div>
					<div class="div_subs_contn">
						<span><?php echo $wo['lang']['igv'] ?></span>
						<span><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo $wo['igv']; ?></span>
					</div>
					<div class="div_subs_contn">
						<span><?php echo $wo['lang']['total'] ?></span>
						<span><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo $wo['total']; ?></span>
					</div>
				</div>
				<div class="pay_order_layshane"></div>
			</div>
		</div>
	</div>
</div>
<script>
function loadpay(numsdd){
	$(".pay_order_layshane").load(Wo_Ajax_Requests_File() + '?f=order_opcion&s=pays_vie&tols='+<?=$wo['total'];?>);
}

$(document).ready(function() {
//loadpay()
	$(document).on('click','#boleta_view', function(){
		$('.content_data_factura').addClass('nodisplay_mode_order');
		$('.content_data_boleta').removeClass('nodisplay_mode_order');
	})

	$(document).on('click','#factura_view', function(){
		$('.content_data_boleta').addClass('nodisplay_mode_order');
		$('.content_data_factura').removeClass('nodisplay_mode_order');
	})
	///

	$(document).on('click','#retiro_tienda', function(){
		$('.content_delivery_data').addClass('nodisplay_mode_order');
		$('.content_store_data').removeClass('nodisplay_mode_order');
	})

	$(document).on('click','#envio_order', function(){
		$('.content_store_data').addClass('nodisplay_mode_order');
		$('.content_delivery_data').removeClass('nodisplay_mode_order');
	})


	$('input[name="order_options_comprobante"]').change(function(){
		var selected_doc = $(this).val();
		if (selected_doc=='boleta') {
			$('input[name="document_ruc"]').val('');
		}else if(selected_doc=='factura'){
			$('input[name="document_dni"]').val('');
		}

		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=document&hash=' + $('.main_session').val(),
			data: {comprobante:selected_doc},
			type: 'POST',
			success: function (data) {
				loadpay()
			}
		})
	});

	$('input[name="document_dni"]').keyup(function(){
		var nums = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=document_dni&hash=' + $('.main_session').val(),
			data: {number:nums},
			type: 'POST',
			success: function (data) {
				loadpay()
			}
		})
	});

	$('input[name="order_options_data"]').change(function(){
		var docs = $(this).val();
		if (docs=='tienda') {
			$('input[name="choose-address"]:checked').removeAttr('checked');
			$('input[name="choose-address"]').prop('checked', false);
		}else if(docs=='delivery'){
			$('input[name="choose-sucursal"]').prop('checked', false);
			$('input[name="choose-sucursal"]:checked').removeAttr('checked');
		}
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=opcion_compra&hash=' + $('.main_session').val(),
			data: {modo_compra:docs},
			type: 'POST',
			success: function (data) {
				loadpay()
			}
		})
	});

	$('input[name="document_ruc"]').keyup(function(){
		var nums = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=document_ruc&hash=' + $('.main_session').val(),
			data: {number:nums},
			type: 'POST',
			success: function (data) {
			}
		})
	});

	$('input[name="choose-sucursal"]').change(function(){
		var suc = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=sucursalesdata&hash=' + $('.main_session').val(),
			data: {sucursal:suc},
			type: 'POST',
			success: function (data) {
			}
		})
	});

	$('input[name="modo_pago"]').change(function(){
		var pag = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=mode_pay&hash=' + $('.main_session').val(),
			data: {pay_mod:pag},
			type: 'POST',
			success: function (data) {
				loadpay()
			}
		})
	});

	$('input[name="choose-address"]').change(function(){
		var direc = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=direccionesdata&hash=' + $('.main_session').val(),
			data: {direccion:direc},
			type: 'POST',
			success: function (data) {
			}
		})
	});



    var options = {
      url: Wo_Ajax_Requests_File() + '?f=address&s=add&hash=' + $('.main_session').val(),
        beforeSubmit:  function () {
          $('.modal_add_address_modal_alert').empty();
          $("#add_address_modal").find('.btn-mat').attr('disabled', 'true');
          $("#add_address_modal").find('.btn-mat').text("<?php echo($wo['lang']['please_wait']) ?>");
        },
        success: function (data) {
          $("#add_address_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
          $("#add_address_modal").find('.btn-mat').removeAttr('disabled')
          if (data.status == 200) {
            $('.modal_add_address_modal_alert').html('<div class="alert alert-success bg-success"><i class="fa fa-check"></i> '+
              data.message
              +'</div>');
              if (data.url && data.url != '') {
                if ($('#setting_address_page').length > 0) {
                  setTimeout(function () {
                    location.href = data.url;
                  },2000);
                }
                else{
                  setTimeout(function () {
                    $('.modal_add_address_modal_alert').empty();
              $("#add_address_modal").find('.btn-mat').removeAttr('disabled')
              $("#add_address_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
              $('#add_address_modal').modal('hide');
              $('#load_checkout').click();
                  },2000);
                }
              }
          } else {
            $('.modal_add_address_modal_alert').html('<div class="alert alert-danger bg-danger"> '+
            data.message
            +'</div>');
          }
        }
    };
    $('.address_form').ajaxForm(options);
});
    <?php if ($wo['topup'] == 'show') { ?>
    var check_wallet = setInterval(function(){
        $.post(Wo_Ajax_Requests_File() + '?f=products&s=check_wallet&hash=' + $('.main_session').val(), function(data, textStatus, xhr) {
            if (data.status == 200) {
                if (data.topup == 'hide') {
                    $('.wallet_alert').remove();
                    $('.buy_button').removeAttr('disabled');
                    clearInterval(check_wallet);
                }
            }
        });
     }, 3000);
    <?php } ?>
</script>
<div id="pay_modal_wallet">
      <div class="modal fade wow_mat_pops" id="pay-go-pro" role="dialog" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="wow_pops_head">
              <svg height="100px" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" xmlns="http://www.w3.org/2000/svg"><path d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729 c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="currentColor" opacity="0.6"></path> <path d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729 c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="currentColor" opacity="0.6"></path> <path d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428 c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="currentColor"></path></svg>
              <h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z"></path></svg> <?php echo $wo['lang']['pay_from_wallet'] ?></h4>
            </div>
            <div class="modal-body">
              <div class="pay_modal_wallet_alert"></div>
              <h4 class="pay_modal_wallet_text"></h4>
            </div>
            <div class="clear"></div>
            <div class="modal-footer">
              <div class="ball-pulse"><div></div><div></div><div></div></div>
              <button type="button" class="btn btn-main" id="pay_modal_wallet_btn"><?php echo $wo['lang']['pay']; ?></button>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="modal fade" id="delete-address" tabindex="-1" role="dialog" aria-labelledby="delete-address" aria-hidden="true" data-id="0">
    <div class="modal-dialog modal-md mat_box wow_mat_mdl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
          <h4 class="modal-title"><?php echo $wo['lang']['delete_your_address'] ?></h4>
        </div>
        <div class="modal-body">
          <?php echo $wo['lang']['are_you_delete_your_address']; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-mat" data-dismiss="modal"><?php echo $wo['lang']['delete']; ?></button>
        </div>
      </div>
    </div>
    </div>

    <div class="modal fade ch_payment_box" id="buy_product_modal" tabindex="-1" role="dialog" aria-labelledby="buy_product" aria-hidden="true" data-id="0">
    <div class="modal-dialog modal-md mat_box" role="document">
      <div class="modal-content">
        <div class="ch_payment_head">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg>
          <h4><?php echo $wo['lang']['payment_alert']; ?></h4>
        </div>
        <div class="modal-body">
          <div class="modal_product_pay_alert"></div>
          <?php echo $wo['lang']['purchase_the_items']; ?>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="product_id" autocomplete="off">
          <input type="hidden" id="product_price" autocomplete="off">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $wo['lang']['cancel']; ?></button>
          <button type="button" class="btn btn-main btn-mat"><?php echo $wo['lang']['pay']; ?></button>
        </div>
      </div>
    </div>
    </div>
<?php else: ?>
	<style type="text/css">
		.empty_cart_order_user_not{
			display:flex;
			justify-content:center;
			align-self:center;
			min-height:calc(100vh - 280px);
			align-items:center;
			user-select:none;
			flex-direction:column;
		}
		.empty_cart_order_user_not svg{display:block;margin-bottom:20px;}
		.empty_cart_order_user_not div{display:block;}
		.empty_cart_order_user_not a{
			margin:10px auto;border:1px solid #ccc;border-radius:6px;padding:10px;
		}
	</style>
	<div class="empty_cart_order_user_not"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg><div>Inicia session para ver tus compras.</div>
	<a class="dec main" href="<?=lui_SeoLink('index.php?link1=acceder');?>" data-ajax="?link1=acceder"><?php echo $wo['lang']['login']?></a>
</div>
<?php endif ?>