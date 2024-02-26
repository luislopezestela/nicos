<div class="sidebar-conatnier">
	<div class="col-md-3 sidebar rightcol">
      <?php 
      $sidebar_ad = lui_GetAd('sidebar', false);
      if (!empty($sidebar_ad)) {?>
      <ul class="list-group sidebar-ad">
         <?php echo $sidebar_ad; ?>
      </ul>
     <?php } ?>
  </div>

</div>