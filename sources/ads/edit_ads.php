<?php 
if ($wo['loggedin'] == false || $wo['config']['user_ads'] == 0) {
  header("Location: " . lui_SeoLink('index.php?link1=welcome'));
  exit();
}
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
	$ad_data = lui_GetUserAdData($_GET['id']);
	if (!empty($ad_data) && lui_IsAdsOwner($ad_data['id'])) {
		$wo['description'] = $wo['config']['siteDesc'];
		$wo['keywords']    = $wo['config']['siteKeywords'];
		$wo['page']        = 'ads';
		$wo['ap']          = 'edit';
		$wo['title']       = $wo['lang']['edit_ads'];
		$wo['ad-data']     = $ad_data;
		$wo['my-pages']    = lui_GetMyPages($ad_data['user_id']);
		$wo['audience']    = $wo['countries_name'];
		$wo['content']     = lui_LoadPage('ads/edit');
	}
}

 ?>