<div class="modal fade in" id="comment_report_box" role="dialog">
    <div class="modal-dialog wow_mat_mdl">
      <div class="modal-content">
        <p class="wo_error_messages">
          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 496.158 496.158" xml:space="preserve"> <path style="fill:#32BEA6;" d="M496.158,248.085c0-137.021-111.07-248.082-248.076-248.082C111.07,0.003,0,111.063,0,248.085 c0,137.002,111.07,248.07,248.082,248.07C385.088,496.155,496.158,385.087,496.158,248.085z"/> <path style="fill:#FFFFFF;" d="M384.673,164.968c-5.84-15.059-17.74-12.682-30.635-10.127c-7.701,1.605-41.953,11.631-96.148,68.777 c-22.49,23.717-37.326,42.625-47.094,57.045c-5.967-7.326-12.803-15.164-19.982-22.346c-22.078-22.072-46.699-37.23-47.734-37.867 c-10.332-6.316-23.82-3.066-30.154,7.258c-6.326,10.324-3.086,23.834,7.23,30.174c0.211,0.133,21.354,13.205,39.619,31.475 c18.627,18.629,35.504,43.822,35.67,44.066c4.109,6.178,11.008,9.783,18.266,9.783c1.246,0,2.504-0.105,3.756-0.322 c8.566-1.488,15.447-7.893,17.545-16.332c0.053-0.203,8.756-24.256,54.73-72.727c37.029-39.053,61.723-51.465,70.279-54.908 c0.082-0.014,0.141-0.02,0.252-0.043c-0.041,0.01,0.277-0.137,0.793-0.369c1.469-0.551,2.256-0.762,2.301-0.773 c-0.422,0.105-0.641,0.131-0.641,0.131l-0.014-0.076c3.959-1.727,11.371-4.916,11.533-4.984 C385.405,188.218,389.034,176.214,384.673,164.968z"/></svg>
          <span class="msg"><?php echo $wo['lang']['comment_reported']; ?></span>
        </p>
      </div>
      
    </div>
</div>
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
<div class="modal fade in" id="invalid_file" role="dialog">
    <div class="modal-dialog wow_mat_mdl">
      <div class="modal-content">
        <p class="wo_error_messages">
          <svg enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Icons"><g><g><path d="m32 58c-14.359 0-26-11.641-26-26 0-14.359 11.641-26 26-26 14.359 0 26 11.641 26 26 0 14.359-11.641 26-26 26z" fill="#fa6450"/></g><g><path d="m10 32c0-13.686 10.576-24.894 24-25.916-.661-.05-1.326-.084-2-.084-14.359 0-26 11.641-26 26 0 14.359 11.641 26 26 26 .674 0 1.339-.034 2-.084-13.424-1.022-24-12.23-24-25.916z" fill="#dc4632"/></g><g><path d="m32 38c-2.209 0-4-1.791-4-4v-16c0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4v16c0 2.209-1.791 4-4 4z" fill="#f0f0f0"/></g><g><path d="m32 50c-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4z" fill="#f0f0f0"/></g></g></g></svg>
          <?php echo str_replace('{file_size}', lui_SizeUnits($wo['config']['maxUpload']), $wo['lang']['file_too_big']); ?>
        </p>
      </div>
      
    </div>
</div>
<div class="modal fade in" id="ffmpeg_file" role="dialog">
    <div class="modal-dialog wow_mat_mdl">
      <div class="modal-content">
        <p style="text-align: center;padding: 30px 20px;font-size: 16px;margin: 0;">
          <svg xmlns="http://www.w3.org/2000/svg" height="100px" viewBox="0 0 512 512" width="100px" class="main" style="display: block;margin: 0 auto 30px;"><g fill="currentColor" opacity="0.6"><path d="m71.072 303.9a189.244 189.244 0 0 0 66.661 97.518 186.451 186.451 0 0 0 114.189 38.582c103.707 0 188.078-84.284 188.078-187.884a185.963 185.963 0 0 0 -38.974-114.534 189.368 189.368 0 0 0 -98.448-66.463 24 24 0 1 1 12.883-46.238 237.668 237.668 0 0 1 123.578 83.392 235.9 235.9 0 0 1 -187.117 379.727 234.064 234.064 0 0 1 -143.342-48.444 237.546 237.546 0 0 1 -83.652-122.438z"/><circle cx="200" cy="48" r="24"/><circle cx="56" cy="192" r="24"/><circle cx="109" cy="101" r="24"/></g><path d="m48 480a24 24 0 0 1 -24-24v-144a24 24 0 0 1 29.206-23.429l144 32a24 24 0 1 1 -10.412 46.858l-114.794-25.51v114.081a24 24 0 0 1 -24 24z" fill="currentColor"/></svg>
          <?php echo $wo['lang']['ffmpeg_file_text']; ?>
        </p>
      </div>
    </div>
</div>
<div class="modal fade in" id="file_not_supported" role="dialog">
    <div class="modal-dialog wow_mat_mdl">
      <div class="modal-content">
        <p class="wo_error_messages">
          <svg enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><g id="Icons"><g><g><path d="m32 58c-14.359 0-26-11.641-26-26 0-14.359 11.641-26 26-26 14.359 0 26 11.641 26 26 0 14.359-11.641 26-26 26z" fill="#fa6450"/></g><g><path d="m10 32c0-13.686 10.576-24.894 24-25.916-.661-.05-1.326-.084-2-.084-14.359 0-26 11.641-26 26 0 14.359 11.641 26 26 26 .674 0 1.339-.034 2-.084-13.424-1.022-24-12.23-24-25.916z" fill="#dc4632"/></g><g><path d="m32 38c-2.209 0-4-1.791-4-4v-16c0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4v16c0 2.209-1.791 4-4 4z" fill="#f0f0f0"/></g><g><path d="m32 50c-2.209 0-4-1.791-4-4 0-2.209 1.791-4 4-4 2.209 0 4 1.791 4 4 0 2.209-1.791 4-4 4z" fill="#f0f0f0"/></g></g></g></svg>
          <?php echo $wo['lang']['file_not_supported']; ?>
        </p>
      </div>
      
    </div>
</div>
<div class="modal fade" id="modal_light_box" role="dialog">
	<button type="button" class="close comm_mod_img_close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
  <div class="modal-dialog" >
    <div class="modal-content">              
      <div class="modal-body" style="padding: 0;">
        <img  class="image" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>

<div class="modal fade sun_modal" id="users-reacted-modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title">
					<div class="who_react_modal">
            <?php if (!empty($wo['reactions_types'])) {
                foreach ($wo['reactions_types'] as $key => $value) {
                  if ($value['status'] == 1) {
                 ?>
                 <span class="how_reacted like-btn-like pointer" id="_post333" onclick="Wo_LoadReactedUsers(<?php echo $key; ?>);">
                <?php if (preg_match("/<[^<]+>/",$value['layshane_star'],$m)) {
                      if ($key == 1) { ?>
                        <div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--like"><div class="emoji__hand"><div class="emoji__thumb"></div></div></div></div>
                     <?php  }elseif ($key == 2) { ?>
                        <div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--love"><div class="emoji__heart"></div></div></div>
                    <?php  }elseif ($key == 3) { ?>
                      <div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--haha"><div class="emoji__face"><div class="emoji__eyes"></div><div class="emoji__mouth"><div class="emoji__tongue"></div></div></div></div></div>
                    <?php }elseif ($key == 4) { ?>
                      <div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--wow"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>
                    <?php }elseif ($key == 5) { ?>
                      <div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--sad"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>
                    <?php }elseif ($key == 6) { ?>
                      <div class="inline_post_emoji inline_act_emoji no_anim"><div class="emoji emoji--angry"><div class="emoji__face"><div class="emoji__eyebrows"></div><div class="emoji__eyes"></div><div class="emoji__mouth"></div></div></div></div>
                    <?php }
                   }
                   else{ ?>
                    <div class="inline_post_emoji no_anim"><div class="reaction"><img src="<?php echo($value['layshane_star']) ?>"></div></div>
                  <?php } ?>
                </span>
            <?php } } } ?>
					</div>
				</h4>
			</div>
			<div class="modal-body">
				<div id="reacted_users_box" class="wo_react_ursrs_list"></div>
				<div class="clearfix"></div>
				<div id="reacted_users_load" style="display: none;">
					<div class="load-more wo_react_ursrs_list_lod_mor">
						<button class="btn btn-default text-center reacted_users_load_more" data-type="" post-id="" col-type="" onclick="Wo_LoadMoreReactedUsers(this);"><span id="load_more_reacted_btn"><?php echo $wo['lang']['load_more'] ?></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="delete-tier" tabindex="-1" role="dialog" aria-labelledby="delete-tier" aria-hidden="true" data-id="0">
  <div class="modal-dialog mat_box" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> <?php echo $wo['lang']['delete_your_tier']; ?></h5>
      </div>
      <div class="modal-body">
        <?php echo $wo['lang']['are_you_delete_your_tier']; ?>
      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $wo['lang']['cancel']; ?></button>
        <button type="button" class="btn btn-danger btn-mat" data-dismiss="modal"><?php echo $wo['lang']['delete']; ?></button>
      </div>
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