<?php 
if ($f == 're_cover') {
   if (isset($_POST['pos'])) {
       if (($_POST['cover_image'] != $wo['userDefaultCover']) && ($_POST['cover_image'] == $wo['user']['cover_org'] || lui_IsAdmin()) && (lui_GetMedia($wo['user']['cover_full']) == $_POST['real_image']) || lui_IsAdmin()) {
           if(lui_IsAdmin() && !empty($_POST['user_id']) && is_numeric($_POST['user_id'])){
            $wo['user'] = lui_UserData(lui_Secure($_POST['user_id']));
           }
           $from_top             = abs($_POST['pos']);
           $cover_image          = $wo['user']['cover_org'];
           $full_url_image       = $wo['user']['cover'];
           $default_image        = explode('.', $wo['user']['cover_org']);
           $default_image        = $default_image[0] . '_full.' . $default_image[1];
           $get_default_image    = file_put_contents($default_image, fetchDataFromURL(lui_GetMedia($default_image)));
           $image_type           = $_POST['image_type'];
           $default_cover_width  = 1120;
           $default_cover_height = 276;
           require_once("luisincludes/librerias/thumbncrop.inc.php");
           $tb = new ThumbAndCrop();
           $tb->openImg($default_image);
           $newHeight = $tb->getRightHeight($default_cover_width);
           $tb->creaThumb($default_cover_width, $newHeight);
           $tb->setThumbAsOriginal();
           $tb->cropThumb($default_cover_width, 366, 0, $from_top);
           $tb->saveThumb($cover_image);
           $tb->resetOriginal();
           $tb->closeImg();
           $upload_s3        = lui_UploadToS3($cover_image);
           $update_user_data = lui_UpdateUserData($wo['user']['user_id'], array(
               'last_cover_mod' => time()
           ));
       }
       if (empty($full_url_image)) {
           $full_url_image = lui_GetMedia($wo['userDefaultCover']);
       }
       $data = array(
           'status' => 200,
           'url' => $full_url_image . '?timestamp=' . md5(time())
       );
   }
   lui_CleanCache();
   header("Content-type: application/json");
   echo json_encode($data);
   exit();
}
