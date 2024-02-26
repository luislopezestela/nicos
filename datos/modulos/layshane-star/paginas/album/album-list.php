<div class="cool-style-album col-xs-6 col-sm-6 col-lg-4" id="album_<?php echo $wo['album']['id'];?>">
	<div class="album_parent">
		<div class="avatar">
			<a href="<?php echo $wo['album']['url'];?>" data-ajax="?link1=post&id=<?php echo $wo['album']['id'];?>">
				<?php if ($wo['album']['blur'] == 1) { ?>
					<img src="<?php echo $wo['album']['first_image'];?>" alt="<?php echo $wo['album']['first_image']; ?> Picture" class="image_blur"/>
		      	<?php }else{ ?>
		      		<img src="<?php echo $wo['album']['first_image'];?>" alt="<?php echo $wo['album']['first_image']; ?> Picture" />
		      	<?php } ?>
			</a>
			<span class="alb_count" title="<?php echo $wo['lang']['photos']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z" /></svg> <?php echo lui_CountAlbumImages($wo['album']['id']);?></span>
			<div class="album-name">
				<h4><?php echo $wo['album']['album_name']; ?></h4>
			</div>
		</div>
	</div>
</div>
<style>#album_<?php echo $wo['album']['id'];?> .album_parent .avatar:before, #album_<?php echo $wo['album']['id'];?> .album_parent .avatar:after {background-image: url('<?php echo $wo['album']['first_image'];?>')}</style>