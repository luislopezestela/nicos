<?php echo lui_LoadPage('ads/includes/header'); ?>


<div class="w100 create-ads-cont">
	<form class="form" method="get" id="update-ads">
	<div class="col-md-7 col-lg-7 col-sm-7 col-xs-12 create-ads-inner-left">
		<div id="update-ads-alert" class="w100">
			
		</div>	
		<div class="form-group w100">
			<label class="col-md-3 col-sm-12 col-xs-12"><?php echo $wo['lang']['company']; ?>:</label>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<input type="text" class="form-control" name="name" max="50"  value="<?php echo $wo['ad-data']['name']; ?>">
			</div>
		</div>
		<div>
			<div class="col-md-3 col-sm-12 col-xs-12"></div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<small class="main"><?php echo $wo['lang']['select_a_page_or_link'] ?></small>
			</div>
		</div>
		<div class="form-group w100">
			
			<label class="col-md-3 col-sm-12 col-xs-12"><?php echo $wo['lang']['url']; ?>:</label>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<input type="url" class="form-control" name="website" value="<?php echo $wo['ad-data']['url']; ?>">
			</div>
		</div>
		<div class="form-group w100">
			
			<label class="col-md-3 col-sm-12 col-xs-12"><?php echo $wo['lang']['my_pages']; ?>:</label>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<select class="form-control">			
				<?php if ($wo['my-pages'] && count($wo['my-pages']) > 0): ?>
					<option value=""><?php echo $wo['lang']['select']; ?></option>
					<?php foreach ($wo['my-pages'] as $wo['pageItem']): ?>
						<option value="<?php echo $wo['pageItem']['page_id']; ?>">
							<?php echo $wo['pageItem']['page_name']; ?>
						</option>
					<?php endforeach; ?>
				<?php else:?>
					<option disabled="disabled" selected="selected">
							<?php echo $wo['lang']['no_pages_found']; ?>
					</option>
				<?php endif;?>

				</select>
			</div>
		</div>
		<div class="form-group w100">
			
			<label class="col-md-3 col-sm-12 col-xs-12"><?php echo $wo['lang']['title']; ?>:</label>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<input type="text" class="form-control" name="headline" value="<?php echo $wo['ad-data']['headline']; ?>">
			</div>
		</div>

		<div class="form-group w100">
			
			<label class="col-md-3 col-sm-12 col-xs-12"><?php echo $wo['lang']['description']; ?>:</label>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<textarea class="form-control" name="description" placeholder="Type ads Description"><?php echo $wo['ad-data']['description']; ?></textarea>
			</div>
		</div>

		<div class="form-group w100">
			
			<label class="col-md-3 col-sm-12 col-xs-12"><?php echo $wo['lang']['location']; ?>:</label>
			<div class="col-md-9 col-sm-12 col-xs-12" id="review-ads-location">
				<input id="ads-location" name="location"  type="text" class="form-control" value="<?php echo $wo['ad-data']['location']; ?>"> 
			</div>
		</div>
		<div class="form-group w100" id="review-ads-location">
          <div class="col-sm-3"></div>
          <div class="col-md-9" id="place" <?php echo($wo['config']['yandex_map'] == 1 ? 'style="width: 300px; height: 300px; padding: 0; margin: 0;"' : '') ?>>
          	<?php if($wo['config']['yandex_map'] == 1){ ?>
          		<script type="text/javascript">
          			<?php if (!empty($wo['ad-data']['location'])) { ?>
			      			Wo_Delay(function(){
					      		var myMap;
						        ymaps.geocode("<?php echo($wo['ad-data']['location']); ?>").then(function (res) {
						            myMap = new ymaps.Map('place', {
						                center: res.geoObjects.get(0).geometry.getCoordinates(),
						                zoom : 10
						            });
						            myMap.geoObjects.add(new ymaps.Placemark(res.geoObjects.get(0).geometry.getCoordinates(), {
								            balloonContent: ''
								        }));
						        });
						    },1000);
				        <?php } ?>
          		</script>
          	<?php } ?>
          	<?php if ($wo['config']['google_map'] == 1) { ?>
          	<iframe width="100%" frameborder="0" style="border:0;margin-top: 10px;" src="https://www.google.com/maps/embed/v1/place?key=<?php echo $wo['config']['google_map_api']; ?>&q=<?php echo $wo['ad-data']['location']; ?>&language=en"></iframe>
          	<?php } ?>
          </div>
       </div>
       	<div class="form-group w100">
			
			<label class="col-md-3"><?php echo $wo['lang']['audience']; ?></label>
			<div class="col-md-9">
				<div class="form-control ads-audience" >
					<?php foreach ($wo['audience'] as $key => $value): ?>
						<p>
							<input 
							type="checkbox" 
							class="ads-audience-list" 
							name="audience-list[]" 
							value="<?php echo $key; ?>"
							<?php if ($key == 0) {
								echo "id='select-all-countries'";
							} ?>

							<?php if (in_array($key, $wo['ad-data']['country_ids']) && $key != 0){ echo "checked='true'";}
							?>
							style="vertical-align: middle;"
							>
								
							<label style="vertical-align: middle;"><?php echo $value; ?></label>
						</p> 
					<?php endforeach;?>
				</div>
			</div>
		</div>
		<div class="form-group w100">
			<label class="col-md-3"></label>
			<div class="col-md-9">
				<button class="btn btn-main pull-right" type="submit">
					<i class="fa fa-plus-square progress-icon" ></i>
					<?php echo $wo['lang']['add']; ?>
				</button>
				<button class="btn btn-default pull-right cancel" type="reset">
					<i class="fa fa-ban progress-icon"></i>
					<?php echo $wo['lang']['cancel']; ?>
				</button>
			</div>
		</div>	
	</div>
	<div class="col-md-5 col-sm-5 col-lg-5 col-xs-12 create-ads-inner-right">
		<div class="form-group w100">
			<div class="col-md-12" id="select-ads-img" title="Select image">
				<img src="<?php echo $wo['ad-data']['image']; ?>" alt="Picture">
			</div>
		</div>
		<hr>
		<div class="form-group w100">
			<div class="col-md-6">
				<p><?php echo $wo['lang']['gender']; ?></p>
				<div>
					<input
					type="radio"
					name="gender" 
					value="all" 
					<?php if ($wo['ad-data']['gender'] == 'all') {
							echo "checked";
						}
					?>
					>
					<span><?php echo $wo['lang']['all']; ?></span>
				</div>
				<div>
					<input
					type="radio"
					name="gender"
					value="male"
					<?php if ($wo['ad-data']['gender'] == 'male') {
							echo "checked";
						}
					?>
					>
					<span><?php echo $wo['lang']['male']; ?></span>
				</div>
				<div>
					<input
					type="radio" 
					name="gender" 
					value="famale"
					<?php if ($wo['ad-data']['gender'] == 'famale') {
							echo "checked";
						}
					?>
					>
					<span><?php echo $wo['lang']['female']; ?></span>
				</div>
				<hr>
				<div>
					<input
					type="radio" 
					name="appears" 
					value="post"
					<?php if ($wo['ad-data']['appears'] == 'post') {
							echo "checked";
						}
					?>
					>
					<span><?php echo $wo['lang']['post']; ?></span>
				</div>
				<div>
					<input
					type="radio" 
					name="appears" 
					value="sidebar"
					<?php if ($wo['ad-data']['appears'] == 'sidebar') {
							echo "checked";
						}
					?>
					>
					<span><?php echo $wo['lang']['sidebar']; ?></span>
					
				</div>
			</div>
			<div class="col-md-6">
				<p><?php echo $wo['lang']['bidding']; ?></p>
				<div>
					<input
					type="radio"
					name="bidding"
					value="clicks"
					<?php if ($wo['ad-data']['bidding'] == 'clicks') {
							echo "checked";
						}
					?>
					>
					<span><?php echo $wo['lang']['clicks']; ?></span>
				</div>
				<div>
					<input
					type="radio"
					name="bidding"
					value="views"
					<?php if ($wo['ad-data']['bidding'] == 'views') {
							echo "checked";
						}
					?>
					>
					<span><?php echo $wo['lang']['views']; ?></span>
				</div>
			</div>
		</div>
	</div>
	<input type="file" name="image" class="hidden" id="ads-image">
	</form>
</div>

<script>
	
	jQuery(document).ready(function($) {
		<?php if ($wo['config']['google_map']) { ?>
	  $("#ads-location").change(function(event) {
        if ($(this).val().length >= 3) {
          Wo_Delay(function(){$("#review-ads-location #place").html('<iframe width="100%" frameborder="0" style="border:0;margin-top: 10px;" src="https://www.google.com/maps/embed/v1/place?key=<?php echo $wo['config']['google_map_api']; ?>&q=' + $("#ads-location").val() + '&language=en"></iframe>')},1000)
        }
        else{
          Wo_Delay(function(){$("#review-ads-location #place").html('<iframe width="100%" frameborder="0" style="border:0;margin-top: 10px;" src="https://www.google.com/maps/embed/v1/place?key=<?php echo $wo['config']['google_map_api']; ?>&q=us&language=en"></iframe>')},1000)
        }
      });
	  <?php }else if($wo['config']['yandex_map'] == 1){ ?>
	  	$("#ads-location").keyup(function(event) {
		     	var myMap;
	        ymaps.geocode($("#ads-location").val()).then(function (res) {
	        	$("#review-ads-location #place").html('');
	            myMap = new ymaps.Map('place', {
	                center: res.geoObjects.get(0).geometry.getCoordinates(),
	                zoom : 10
	            });
	            myMap.geoObjects.add(new ymaps.Placemark(res.geoObjects.get(0).geometry.getCoordinates(), {
			            balloonContent: ''
			        }));
	        });
        });
	   <?php } ?>

      $("#update-ads #select-all-countries").change(function(event) {
      	var self = $(this);
      	if (self.is(':checked')) {
      		$("input.ads-audience-list").each(function(index, el) {
      			$(el).prop('checked', true);
      		});
      	}
      	else{
      		$("input.ads-audience-list").each(function(index, el) {
      			$(el).prop('checked', false);
      		});
      	}
	          	
      });

      $("#select-ads-img").click(function(event) {
      	$("#ads-image").click();
      });


      $("#ads-image").change(function(event) {
      	$("#select-ads-img").html('<img src="' + window.URL.createObjectURL(this.files[0]) + '">');
      });

      $('#update-ads').ajaxForm({
       url: Wo_Ajax_Requests_File() + '?f=ads&s=update&ad-id=<?php echo $_GET['id']; ?>&a=1',
       type:"POST",
       beforeSend: function() {
        Wo_progressIconLoader($('#update-ads').find('button.btn-main'));
       },
       success: function(data) {
        scrollToTop();
        if (data['status'] == 200) {
          $("#update-ads-alert").html('<div class="alert alert-success">'+ data['message'] +'</div>');
          window.location = data.url;
        } else if (data['message']) {
          $("#update-ads-alert").html('<div class="alert alert-danger">' + data['message'] + '</div>');
        } 
        Wo_progressIconLoader($('#update-ads').find('button.btn-main'));
      }});

	});
</script>
