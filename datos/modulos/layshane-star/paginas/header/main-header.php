<?php 
$totalcarrito = 0;
$totalcomprasencarrito = 0;
if($wo['loggedin'] == true){
   $items = $db->where('user_id',$wo['user']['user_id'])->get(T_USERCARD);
   if(!empty($items)){
      foreach($items as $key => $item){
         $totalcarrito += $item->units;
      }
   }
}
$totalcomprasencarrito = $totalcarrito;
?>
<ul class="nav navbar-nav navbar-right <?php echo lui_RightToLeft('pull-right');?>">
   <li class="is_no_phone">
      <a href="<?php echo lui_SeoLink('index.php?link1=checkout'); ?>" class="sixteencart checkout_display <?php echo ($wo['page'] == 'checkout') ? 'active': '';?>" data="checkout_display" data-ajax="?link1=checkout" title="<?php echo $wo['lang']['carrito'];?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
         <circle cx="9" cy="21" r="1"></circle>
         <circle cx="20" cy="21" r="1"></circle>
         <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
         <?php if ($totalcomprasencarrito > 0): ?>
            <div class="count_items_carrito">
               <span class="count_items_carrito_cou"><?=$totalcomprasencarrito;?></span>
            </div>
         <?php endif ?>
      </a>
   </li>
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