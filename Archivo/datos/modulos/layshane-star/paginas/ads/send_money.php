<div class="modal fade wow_mat_pops" id="send_money_modal" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="wow_pops_head">
				<svg height="100px" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" xmlns="http://www.w3.org/2000/svg"><path d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729 c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="currentColor" opacity="0.6"></path> <path d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729 c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="currentColor" opacity="0.6"></path> <path d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428 c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="currentColor"></path></svg>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></button>
			</div>
			<div class="modal-body">
				<form class="form" id="send-money-form" autocomplete="off">
					<div id="send-money-form-alert">
						<?php if ($wo['user']['wallet'] == '0.00' || $wo['user']['wallet'] == '0'): ?>
							<div class="alert alert-warning">
								<?=$wo['lang']['balance_is_0'];?> <a href="<?=lui_SeoLink('index.php?link1=wallet'); ?>"><?=$wo['lang']['top_up'] ?></a>
							</div>
						<?php else: ?>  
							<div class="alert alert-info"><?=$wo['lang']['u_send_money'];?></div>
						<?php endif; ?>
					</div>
					<div class="wow_snd_money_form text-center">
						<p class="bold"><?=$wo['lang']['amount'];?></p>
						<div class="add-amount">
							<h5><?=lui_GetCurrency($wo['config']['ads_currency']); ?><input type="number" placeholder="0.00" min="1.00" max="1000" name="amount" id="amount" /></h5>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-12">
							<div class="wow_form_fields">
								<label for="search"><?=$wo['lang']['send_to'];?></label>
								<input id="search" type="text" placeholder="<?=$wo['lang']['search_name_or_email'];?>">
								<div class="dropdown">
									<ul class="dropdown-menu money-recipients-list"></ul>
								</div>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>
					<p></p>
					<div class="text-center">
						<button type="submit" class="btn btn-main btn-mat btn-mat-raised add_wow_loader" <?=($wo['user']['wallet'] == '0.00' || $wo['user']['wallet'] == '0') ? 'disabled' : ''; ?>>
							<?=$wo['lang']['continue'];?>
						</button>
					</div>
					<input type="hidden" id="recipient_user_id" name="user_id">
				</form>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
<script>
  jQuery(document).ready(function($) {
    $("#send-money-form").find('#search').keydown(function(event) {
      let name = $(this).val();
      $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'family',s:'search',name:name},
      })
      .done(function(data) {
        if (data.status == 200) {
          $("#send-money-form").find(".dropdown").addClass('open').find('ul').empty();
          for (var i = 0; i < data.users.length; i++) {
            $("<li>",{
              class:"pointer",
              id: data.users[i].user_id,
              text: data.users[i].name
            }).appendTo('ul.money-recipients-list');     
          }
        }
        else{
          $("#send-money-form").find(".dropdown").removeClass('open').find('ul').empty();
        }
      });
    });


    $(document).on('click', 'ul.money-recipients-list li', function(event) {
      event.preventDefault();
      $("#recipient_user_id").val($(this).attr('id'));
      $("#send-money-form").find('#search').val($(this).text());
      $("#send-money-form").find(".dropdown").removeClass('open').find('ul').empty();
    });

    $("#send-money-form").ajaxForm({
      url: Wo_Ajax_Requests_File() + '?f=wallet&s=send',
      type:"POST",
      beforeSend: function() {
        $('#send-money-form').find('.add_wow_loader').addClass('btn-loading');
      },
      success: function(data) {
        scrollToTop();
        if (data['status'] == 200) {
          if (node_socket_flow == "1") {
                socket.emit("user_notification", { to_id: $("#recipient_user_id").val(), user_id: _getCookie("user_id"), type: "added" });
            }
          var alert_msg = $("<div>",{
            class: "alert alert-success",
            text: data['message']
          }).prepend('<i class="fa fa-info-check-o"></i> ');;

          $("#send-money-form-alert").html(alert_msg);
          $("#send-money-form").resetForm();
        } 

        else if (data['message']) {
          var alert_msg = $("<div>",{
            class: "alert alert-danger",
            text: (data['message'])
          }).prepend('<i class="fa fa-info-circle"></i> ');

          $("#send-money-form-alert").html(alert_msg);
        } 
		$('#send-money-form').find('.add_wow_loader').removeClass('btn-loading');
      }
    });

  });
</script>