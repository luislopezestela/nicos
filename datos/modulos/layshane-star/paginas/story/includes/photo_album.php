<?php if (!empty($wo['story']['photo_album']) && $wo['story']['blur'] == 1) { ?>
  <div class="post-file show_album_<?php echo $wo['story']['id']; ?> blur_multi_images" id="fullsizeimg">
    <button class='btn btn-main image_blur_btn remover_blur_btn_<?php echo $wo['story']['id']; ?>' onclick='Wo_RemoveBlurAlbum(this,<?php echo $wo['story']['id']; ?>)'><?php echo $wo['lang']['view_image']; ?></button>
        <img src="<?php echo(lui_GetMedia($wo['story']['photo_album'][0]['image_org'])) ?>" alt='image' class='image-file pointer image_blur remover_blur_<?php echo $wo['story']['id']; ?>'>
      </div>
<?php } ?>
<?php if (!empty($wo['story']['photo_album'])) {
 $class = '';
 $small = '';
 if (count($wo['story']['photo_album']) == 2) {
      $class = 'width-2';
 }
 if (count($wo['story']['photo_album']) > 1) {
      $small = '_small';
 }
 if (count($wo['story']['photo_album']) > 2) {
      $class = 'width-3';
 }
 $delete  = '';
 $onhover = '';

if (count($wo['story']['photo_album']) == 3) {
echo "<div class='wo_adaptive_media'>";
   foreach ($wo['story']['photo_album'] as $photo) {
      if ($wo['story']['admin'] === true) {
      $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['parent_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
        $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
      }
      $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
       if (!empty($photo['parent_id'])) {
         $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
       }
      echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' data_image_parent='image-" . $photo['parent_id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
   }

echo "</div>";
}

else if (count($wo['story']['photo_album']) == 4) {
echo "<div class='wo_adaptive_media_4'>";
   foreach ($wo['story']['photo_album'] as $photo) {
      if ($wo['story']['admin'] === true) {
      $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['parent_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
        $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
      }
      $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
       if (!empty($photo['parent_id'])) {
         $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
       }
      echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' data_image_parent='image-" . $photo['parent_id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
   }

echo "</div>";
}

else if (count($wo['story']['photo_album']) == 5) {
echo "<div class='wo_adaptive_media_5'>";
   foreach ($wo['story']['photo_album'] as $photo) {
      if ($wo['story']['admin'] === true) {
      $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['parent_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
        $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
      }
      $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
       if (!empty($photo['parent_id'])) {
         $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
       }
      echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' data_image_parent='image-" . $photo['parent_id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
   }

echo "</div>";
}

else if (count($wo['story']['photo_album']) > 3) {
   foreach (array_slice($wo['story']['photo_album'],0,3) as $key => $photo) {
    $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
     if (!empty($photo['parent_id'])) {
       $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
     }
    if ($key == 2) {
        echo "<div onclick='".$multi_image_function."' class='album-collapse pull-left pointer'> 
                  <img src='".lui_GetMedia($photo['image_org'])."' class='image-file'>
                  <span>+".count(array_slice($wo['story']['photo_album'],2))."</span>
              </div>
              "; 
    }
    else{
      if ($wo['story']['admin'] === true) {
        $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['parent_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
        $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
      }
      echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' data_image_parent='image-" . $photo['parent_id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file  pointer' onclick='".$multi_image_function."'></div>";
      }
   }
   foreach (array_slice($wo['story']['photo_album'],3) as $photo) {
      if ($wo['story']['admin'] === true) {
      $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['parent_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
        $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
      }
      $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
     if (!empty($photo['parent_id'])) {
       $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
     }
      echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' data_image_parent='image-" . $photo['parent_id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer hidden' onclick='".$multi_image_function."'></div>";
   }
}
elseif (count($wo['story']['photo_album']) == 2) {
  foreach ($wo['story']['photo_album'] as $photo) {
      if ($wo['story']['admin'] === true) {
        $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['parent_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
        $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
      }
      $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
     if (!empty($photo['parent_id'])) {
       $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
     }
      echo  "<div style='text-align:center;width: 100%;' class='album-image " . $class . "' id='image-" . $photo['id'] . "' data_image_parent='image-" . $photo['parent_id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
    }
}
else{
    foreach ($wo['story']['photo_album'] as $photo) {
      if ($wo['story']['admin'] === true) {
        $delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
        $onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
      }
      $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
     if (!empty($photo['parent_id'])) {
       $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
     }
      echo  "<div style='text-align:center;width: 100%;' class='album-image " . $class . "' id='image-" . $photo['id'] . "' data_image_parent='image-" . $photo['parent_id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
    }
}
} 
?>