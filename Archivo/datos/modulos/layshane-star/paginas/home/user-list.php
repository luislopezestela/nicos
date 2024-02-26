<?php
$online = '';
$time     = time() - 60;
if ($wo['user-list']['lastseen'] > $time) {
	$online = 'online';
}
?>
<li>
	<a class="user" href="<?=$wo['user-list']['url'];?>" data-ajax="?link1=timeline&u=<?=$wo['user-list']['username'];?>" title="<?=$wo['user-list']['name'];?>">
		<img alt="<?=$wo['user-list']['name'];?>" src="<?=$wo['user-list']['avatar'];?>" />
		<span><?=$wo['user-list']['name'];?></span>
	</a>
</li> 