<?php if (!empty($wo['product']['images'][0]['id_color'])): ?>
   <?php $color_id = lui_buscar_color_en_opciones($wo['product']['images'][0]['id_color']); ?>
   <?php if(isset($color_id['id_color'])!=0): ?>
      <?php $buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color'])?>
      <?php $el_color = '/'.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
      <?php $el_color_b = '&opcion='.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
   <?php else: ?>
      <?php $el_color = ''; ?>
      <?php $el_color_b = ''; ?>
   <?php endif ?>
<?php else: ?>
   <?php $el_color = ''; ?>
   <?php $el_color_b = ''; ?>
<?php endif ?>
<div class="wo_my_products product columna_xs-6 columna_sm-4 columna-3" id="product_<?php echo $wo['product']['id'];?>" data-id="<?php echo $wo['product']['id']?>">
   <a href="<?php echo $wo['product']['url'].$el_color;?>" data-ajax="?link1=item&items=<?php echo $wo['product']['seo_id'].$el_color_b;?>">
      <div class="avatar">
         <?php if(!empty($wo['product']['images'][0]['image_org'])): ?>
            <img src="<?php echo $wo['product']['images'][0]['image_org'];?>" alt="<?php echo $wo['product']['name']; ?>" />
         <?php else: ?>
            <svg style="width:100%;height:100%;padding:35px;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-x" width="400" height="400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M13 21h-7a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v7" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3 3" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0" /><path d="M22 22l-5 -5" /><path d="M17 22l5 -5" /></svg>
         <?php endif ?>
      </div>
      <div class="produc_info">
          <span title="<?php echo $wo['product']['name']; ?>"><?php echo $wo['product']['name']; ?></span>
       <h4><?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price_format']; ?></h4>
      </div>
   </a>
   <?php if (lui_IsAdmin()): ?>
         <?php $activestoola = 'padddig_one_active_a';?>
         <?php $activestoolb = 'padddig_one_active_b';?>
   <?php elseif (lui_IsModerator()): ?>
      <?php $activestoola = '';?>
      <?php $activestoolb = 'padddig_one_active_a';?>
   <?php endif ?>
   <?php if ($wo['loggedin'] && lui_IsAdmin()) { ?>
      <span onclick="RemoveUserProduct(<?php echo $wo['product']['id'];?>,'hide')" class="pointer <?=$activestoola;?> product-list"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"></path></svg></span>
   <?php } ?>
   <?php if ($wo['loggedin'] && lui_IsAdmin() || lui_IsModerator()) { ?>
      <a href="<?php echo lui_SeoLink('index.php?link1=edit-product&id=' . $wo['product']['id']);?>" class="pointer <?=$activestoolb;?> product-list btn_update_produc"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" /></svg></a>
   <?php } ?>
</div>
