<div class="wow_main_float_head gopro">
	<div class="container wo_go_pro">
		<h1 class="head_pro"><?php echo $wo['config']['siteName'];?></h1>
		<p class="main_head_pro"><?php echo $wo['lang']['pro_feature_control_profile'];?></p>
	</div>
</div>
	
<div class="wow_main_blogs_bg"></div>

<?php if($wo['loggedin'] == true): ?>
	<div class="wow_content wow_price_plans">
		<h3 class="pick_plan text-center"><?php echo $wo['lang']['pick_your_plan'];?></h3>
		<div class="table-responsive">
		<table class="wow_price_plan table-hover">
			<thead>
				<tr>
					<td class="t-cell labels_col"></td>
					<?php foreach ($wo['pro_packages'] as $key => $value) { ?>
						<?php if ($value['status'] == 1) { ?>
							<th class="text-center <?php echo($wo['user']['pro_type'] == $value['id'] ? 'go_pro_table_background' : ''); ?>">
								<?php if (!empty($value['image']) && $_COOKIE['mode'] == 'day') { ?>
									<div>
										<img src="<?php echo($value['image']) ?>" class="pro_packages_icon">
									</div>
								<?php }else if (!empty($value['night_image']) && $_COOKIE['mode'] == 'night') { ?>
									<div>
										<img src="<?php echo($value['night_image']) ?>" class="pro_packages_icon">
									</div>
								<?php }else if ($value['id'] == 1) { ?>
									<span style="color: <?php echo !empty($value['color']) ? $value['color'] : '#4c7737' ?>;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" /></svg></span>
								<?php }else if ($value['id'] == 2) { ?>
									<span style="color: <?php echo !empty($value['color']) ? $value['color'] : '#ff9800' ?>;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11.71,19C9.93,19 8.5,17.59 8.5,15.86C8.5,14.24 9.53,13.1 11.3,12.74C13.07,12.38 14.9,11.53 15.92,10.16C16.31,11.45 16.5,12.81 16.5,14.2C16.5,16.84 14.36,19 11.71,19M13.5,0.67C13.5,0.67 14.24,3.32 14.24,5.47C14.24,7.53 12.89,9.2 10.83,9.2C8.76,9.2 7.2,7.53 7.2,5.47L7.23,5.1C5.21,7.5 4,10.61 4,14A8,8 0 0,0 12,22A8,8 0 0,0 20,14C20,8.6 17.41,3.8 13.5,0.67Z" /></svg></span>
								<?php }else if ($value['id'] == 3) { ?>
									<span style="color: <?php echo !empty($value['color']) ? $value['color'] : '#e13c4c' ?>;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7,2V13H10V22L17,10H13L17,2H7Z" /></svg></span>
								<?php }else if ($value['id'] == 4) { ?>
									<span style="color: <?php echo !empty($value['color']) ? $value['color'] : '#3f4bb8' ?>;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M2.81,14.12L5.64,11.29L8.17,10.79C11.39,6.41 17.55,4.22 19.78,4.22C19.78,6.45 17.59,12.61 13.21,15.83L12.71,18.36L9.88,21.19L9.17,17.66C7.76,17.66 7.76,17.66 7.05,16.95C6.34,16.24 6.34,16.24 6.34,14.83L2.81,14.12M5.64,16.95L7.05,18.36L4.39,21.03H2.97V19.61L5.64,16.95M4.22,15.54L5.46,15.71L3,18.16V16.74L4.22,15.54M8.29,18.54L8.46,19.78L7.26,21H5.84L8.29,18.54M13,9.5A1.5,1.5 0 0,0 11.5,11A1.5,1.5 0 0,0 13,12.5A1.5,1.5 0 0,0 14.5,11A1.5,1.5 0 0,0 13,9.5Z" /></svg></span>
								<?php } ?>
								<?php echo $value['name']; ?>
							</th>
						<?php } ?>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $wo['lang']['compras'];?></td>
					<?php foreach ($wo['pro_packages'] as $key => $value) { ?>
						<?php if ($value['status'] == 1) { ?>
							<td class="text-center <?php echo($wo['user']['pro_type'] == $value['id'] ? 'go_pro_table_background' : ''); ?>"><?=$value['price'];?>/ Mes </td>
						<?php } ?>
					<?php } ?>
				</tr>
				<tr>
					<td><?php echo $wo['lang']['featured_member'];?></td>
					<?php foreach ($wo['pro_packages'] as $key => $value) { ?>
						<?php if ($value['status'] == 1) { ?>
							<td class="text-center <?php echo($wo['user']['pro_type'] == $value['id'] ? 'go_pro_table_background' : ''); ?>">
								<?php if ($value['featured_member']) { ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4CAF50" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"></path></svg>
								<?php }else{ ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#bababa" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg>
								<?php } ?>
							</td>
						<?php } ?>
					<?php } ?>
				</tr>
				<tr>
					<td><?php echo $wo['lang']['see_profile_visitors'];?></td>
					<?php foreach ($wo['pro_packages'] as $key => $value) { ?>
						<?php if ($value['status'] == 1) { ?>
							<td class="text-center <?php echo($wo['user']['pro_type'] == $value['id'] ? 'go_pro_table_background' : ''); ?>">
								<?php if ($value['profile_visitors']) { ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4CAF50" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"></path></svg>
								<?php }else{ ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#bababa" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg>
								<?php } ?>
							</td>
						<?php } ?>
					<?php } ?>
				</tr>
				<tr>
					<td><?php echo $wo['lang']['verified_badge'];?></td>
					<?php foreach ($wo['pro_packages'] as $key => $value) { ?>
						<?php if ($value['status'] == 1) { ?>
							<td class="text-center <?php echo($wo['user']['pro_type'] == $value['id'] ? 'go_pro_table_background' : ''); ?>">
								<?php if ($value['verified_badge']) { ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4CAF50" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"></path></svg>
								<?php }else{ ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#bababa" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg>
								<?php } ?>
							</td>
						<?php } ?>
					<?php } ?>
				</tr>
			
			    <tr>
					<td><?php echo $wo['lang']['discount'];?></td>
					<?php foreach ($wo['pro_packages'] as $key => $value) { ?>
						<?php if ($value['status'] == 1) { ?>
							<td class="text-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4CAF50" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"></path></svg>
							</td>
						<?php } ?>
					<?php } ?>
				</tr>
				<?php foreach ($wo['available_pro_features'] as $key2 => $value2) { ?>
					<tr>
						<td><?php echo $wo['lang'][$value2];?></td>
						<?php foreach ($wo['pro_packages'] as $key => $value) { ?>
							<?php if ($value['status'] == 1) { ?>
								<td class="text-center <?php echo($wo['user']['pro_type'] == $value['id'] ? 'go_pro_table_background' : ''); ?>">
									<?php if ($value[$value2]) { ?>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4CAF50" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z"></path></svg>
									<?php }else{ ?>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#bababa" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg>
									<?php } ?>
								</td>
							<?php } ?>
						<?php } ?>
					</tr>
				<?php } ?>
			    <tr>
					<td><?php echo $wo['lang']['more_info'];?></td>
					<?php foreach ($wo['pro_packages'] as $key => $value) { ?>
						<?php if ($value['status'] == 1) { ?>
							<td class="text-center <?php echo($wo['user']['pro_type'] == $value['id'] ? 'go_pro_table_background' : ''); ?>">
								<?php if (!empty($value['description'])) { ?>
									<?php echo $value['description']; ?>
								<?php } ?>
							</td>
						<?php } ?>
					<?php } ?>
				</tr>
			</tbody>
		</table>
		</div>
	</div>
<?php endif ?>


<script>

$('.wow_main_blogs_bg').css('height', ($('.wow_main_float_head').height()) + 'px');

</script>