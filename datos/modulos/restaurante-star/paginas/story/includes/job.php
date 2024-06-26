<div class="post-container sun_post">
	<div class="post" id="post-<?php echo $wo['story']['id']; ?>" data-job-id="<?php echo $wo['story']['job']['id'];?>" data-post-id="<?php echo $wo['story']['id'];?>" data-post-type="<?php echo !empty($wo['story']['job']['page_type']) ? 'page' : '' ?>">
		<div class="panel panel-white panel-shadow wo_view_post_jobs">
			<?php if (!empty($wo['story']['job']['image'])): ?>
            <div class="wo_view_post_jcover">
               <img src="<?php echo lui_GetMedia($wo['story']['job']['image']); ?>" alt="Picture">
            </div>
            <?php endif; ?>
			<div class="wo_view_post_jhead">
				<?php if ($wo['loggedin'] == true) { ?>
				<?php if ($wo['story']['job']['user_id'] == $wo['user']['id'] || lui_IsAdmin() || lui_IsModerator()) { ?>
					<div class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
						</a>
						<ul class="dropdown-menu post-privacy-menu post-options" role="menu">
							<li><div class="pointer" onclick="Wo_OpenJobEditBox(<?php echo $wo['story']['job']['id']; ?>);"><?php echo $wo['lang']['edit_job'];?></div></li>
							<li><div class="pointer" onclick="Wo_OpenPostDeleteBox(<?php echo $wo['story']['id']; ?>);"><?php echo $wo['lang']['delete_job'];?></div></li>
						</ul>
					</div>
				<?php } ?>
				<?php } ?>
				<div class="avatar">
					<?php if (!empty($wo['story']['job']['page'])) { ?>
					<a href="<?php echo $wo['story']['job']['page']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['job']['page']['page_name']?>">
						<img src="<?php echo $wo['story']['job']['page']['avatar'] ; ?>" alt="<?php echo $wo['story']['job']['title']; ?> profile picture">
					</a>
					<?php }else{ ?>
						<a href="<?php echo $wo['story']['job']['user']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['job']['user']['username']?>">
							<img src="<?php echo $wo['story']['job']['user']['avatar'] ; ?>" alt="<?php echo $wo['story']['job']['title']; ?> profile picture">
						</a>
					<?php } ?>
				</div>
				<div class="jinfo">
					<?php if (!empty($wo['story']['job']['title'])) { ?>
						<h2><?php echo $wo['story']['job']['title']; ?></h2>
					<?php } ?>
					<?php if (!empty($wo['story']['job']['page'])) { ?>
					<h4><a href="<?php echo $wo['story']['job']['page']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['job']['page']['page_name']; ?>"><?php echo $wo['story']['job']['page']['page_title']?></a></h4>
					<?php }else{ ?>
						<h4><a href="<?php echo $wo['story']['job']['user']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['job']['user']['username']; ?>"><?php echo $wo['story']['job']['user']['name']?></a></h4>
					<?php } ?>
					<div class="jinfo_inner">
						<?php if (!empty($wo['story']['job']['location'])) { ?>
							<p class="wo_vew_apld_ico"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#ff5722" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"></path></svg> <?php echo $wo['story']['job']['location']; ?></p>
							<span class="middot">·</span>
						<?php } ?>
							<p class="wo_vew_apld_ico"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4caf50" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M16.2,16.2L11,13V7H12.5V12.2L17,14.9L16.2,16.2Z"></path></svg> <span class="ajax-time" title="<?php echo date('c',$wo['story']['job']['time']); ?>"><?php echo lui_Time_Elapsed_String($wo['story']['job']['time']); ?></span></p>
							<span class="middot">·</span>
						<?php if (!empty($wo['story']['job']['job_type'])) { ?>
							<p class="wo_vew_apld_ico"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#2196f3" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z"></path></svg> <?php if (!empty($wo['story']['job']['job_type']) && in_array($wo['story']['job']['job_type'], array('full_time','part_time','internship','volunteer','contract'))) {echo $wo['lang'][$wo['story']['job']['job_type']];} ?></p>
							<span class="middot">·</span>
						<?php } ?>
						<?php if (!empty($wo['story']['job']['category']) && in_array($wo['story']['job']['category'], array_keys($wo['job_categories']))) { ?>
							<p class="wo_vew_apld_ico"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#795548" d="M5.5,7A1.5,1.5 0 0,1 4,5.5A1.5,1.5 0 0,1 5.5,4A1.5,1.5 0 0,1 7,5.5A1.5,1.5 0 0,1 5.5,7M21.41,11.58L12.41,2.58C12.05,2.22 11.55,2 11,2H4C2.89,2 2,2.89 2,4V11C2,11.55 2.22,12.05 2.59,12.41L11.58,21.41C11.95,21.77 12.45,22 13,22C13.55,22 14.05,21.77 14.41,21.41L21.41,14.41C21.78,14.05 22,13.55 22,13C22,12.44 21.77,11.94 21.41,11.58Z"></path></svg> <?php echo $wo['job_categories'][$wo['story']['job']['category']]; ?></p>
						<?php } ?>
					</div>
					<div class="wo_vew_apld_msg">
						<?php if ($wo['loggedin'] == true) { ?>
							<?php if ($wo['story']['job']['user_id'] == $wo['user']['id']) { ?>
								<?php if ($wo['story']['job']['apply_count'] > 0) { ?>
									<?php if (!empty($wo['story']['job']['page'])) { ?>
									<a type="button" class="btn btn-main form-control" href="<?php echo $wo['story']['job']['page']['url'];?>/job_apply?id=<?php echo $wo['story']['job']['id']; ?>"><?php echo $wo['lang']['view_interested_Candidates'] ?> (<?php echo $wo['story']['job']['apply_count']; ?>)</a>
									<?php }else{ ?>
									<a type="button" class="btn btn-main form-control" href="<?php echo $wo['story']['job']['user']['url'];?>/job_apply?id=<?php echo $wo['story']['job']['id']; ?>"><?php echo $wo['lang']['view_interested_Candidates'] ?> (<?php echo $wo['story']['job']['apply_count']; ?>)</a>
									<?php } ?>
								<?php }else{ ?>
									<button type="button" class="btn btn-main form-control" disabled><?php echo $wo['lang']['view_interested_Candidates'] ?> (<?php echo $wo['story']['job']['apply_count']; ?>)</button>
								<?php } ?>
							<?php }else{ ?>
								<?php if ($wo['story']['job']['apply'] == false) { ?>
									<button type="button" class="btn btn-main form-control" onclick="ApplyJobNow(<?php echo $wo['story']['job']['id']; ?>)"><?php echo $wo['lang']['apply_now'] ?></button>
								<?php }else{ ?>
									<button type="button" class="btn btn-main form-control" disabled><?php echo $wo['lang']['job_applied'] ?></button>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="wo_vew_apld_blocks">
				<div class="row">
					<?php if (!empty($wo['story']['job']['minimum'])) { ?>
					<div class="col-md-5">
						<div class="wo_vew_apld_blkmrgn">
							<b><?php echo $wo['lang']['minimum']; ?></b>
							<p class="edited_text"><?php echo (!empty($wo['currencies'][$wo['story']['job']['currency']]['symbol'])) ? $wo['currencies'][$wo['story']['job']['currency']]['symbol'] : '$';?><?php echo $wo['story']['job']['minimum']; ?> <small><?php if (!empty($wo['story']['job']['salary_date']) && in_array($wo['story']['job']['salary_date'], array('per_hour','per_day','per_week','per_month','per_year'))) {echo $wo['lang'][$wo['story']['job']['salary_date']];} ?></small></p>
						</div>
					</div>
					<?php } ?>
					<?php if (!empty($wo['story']['job']['maximum'])) { ?>
					<div class="col-md-5">
						<div class="wo_vew_apld_blkmrgn">
							<b><?php echo $wo['lang']['maximum']; ?></b>
							<p class="edited_text"><?php echo (!empty($wo['currencies'][$wo['story']['job']['currency']]['symbol'])) ? $wo['currencies'][$wo['story']['job']['currency']]['symbol'] : '$';?><?php echo $wo['story']['job']['maximum']; ?> <small><?php if (!empty($wo['story']['job']['salary_date']) && in_array($wo['story']['job']['salary_date'], array('per_hour','per_day','per_week','per_month','per_year'))) {echo $wo['lang'][$wo['story']['job']['salary_date']];} ?></small></p>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="post-description" id="post-description-<?php echo $wo['story']['job']['id']; ?>">
					<?php if (!empty($wo['story']['job']['description'])) { ?>
						<p class="edited_text"><?php echo stripslashes($wo['story']['job']['description']); ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php 
			if ($wo['loggedin'] == true) {
				echo lui_LoadPage('modals/delete-post');
				echo lui_LoadPage('modals/edit_job');
			}
		?>
	</div>
</div>

<script type="text/javascript">
   $(function () {
   	<?php if (!empty($wo['story']['job']['id'])): ?>
	  ReadMoreText("#post-description-<?php echo $wo['story']['job']['id']; ?>");
	  <?php endif; ?>
   });
</script>