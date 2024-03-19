<div class="modal fade in" id="modal-alert" role="dialog">
    <div class="modal-dialog wow_mat_mdl">
      <div class="modal-content">
        <p class="wo_error_messages">
          <svg enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Icons"><g><g><path d="m32 58c-14.359 0-26-11.641-26-26 0-14.359 11.641-26 26-26 14.359 0 26 11.641 26 26 0 14.359-11.641 26-26 26z" fill="#fa6450"/></g><g><path d="m10 32c0-13.686 10.576-24.894 24-25.916-.661-.05-1.326-.084-2-.084-14.359 0-26 11.641-26 26 0 14.359 11.641 26 26 26 .674 0 1.339-.034 2-.084-13.424-1.022-24-12.23-24-25.916z" fill="#dc4632"/></g><g><path d="m32 38c-2.209 0-4-1.791-4-4v-16c0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4v16c0 2.209-1.791 4-4 4z" fill="#f0f0f0"/></g><g><path d="m32 50c-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4z" fill="#f0f0f0"/></g></g></g></svg>
          <span id="modal-alert-msg">
            <?php 
              $limit = $wo['config']['connectivitySystemLimit'];
              $text  = preg_replace("/\{\{CNTC_LIMIT\}\}/", $limit, $wo['lang']['cntc_limit_reached']);
              echo $text;
            ?>
          </span>
        </p>
      </div>
    </div>
</div>

<?php if ($wo['config']['store_system'] == 'on') { ?>
<div class="modal fade sun_modal" id="show_product_reviews_modal" role="dialog">
	<div class="modal-dialog wow_mat_mdl">
		<div class="modal-content check_reviews">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['reviews']; ?></h4>
			</div>
			<div class="modal-body">
				<div id="show_product_reviews_modal_info" class="wo_react_ursrs_list"></div>
				<div class="clearfix"></div>
				<div id="show_product_reviews_modal_info_load" style="display: none;">
					<div class="load-more">
						<button class="btn btn-default text-center" data-type="" post-id="" table-type="" onclick="Wo_LoadReviews();"><span id="show_product_reviews_load_text"><?php echo $wo['lang']['load_more'] ?></span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>