<ul class="nav navbar-nav navbar-right <?php echo lui_RightToLeft('pull-right');?>">
   <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
      <?php echo $wo['lang']['login']; ?>
      </a>
      <ul class="dropdown-menu" role="menu">
         <li>
            <a href="<?php echo lui_SeoLink('index.php?link1=acceder');?>" data-ajax="?link1=acceder">
            <?php echo $wo['lang']['login']; ?>
            </a>
         </li>
         <li>
            <a href="<?php echo lui_SeoLink('index.php?link1=register');?>" data-ajax="?link1=register">
            <?php echo $wo['lang']['register']; ?>
            </a>
         </li>
         <li>
            <a href="<?php echo '?mode=' . $wo['mode_link'] ?>">
               <?php echo $wo['mode_text']; ?>
            </a>
         </li>
      </ul>
   </li>
</ul>