<?php if(!empty($wo['product']['images'][0]['id_color'])): ?>
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

<div class="wo_my_products product" id="product_<?php echo $wo['product']['id'];?>" data-id="<?php echo $wo['product']['id']?>">
	<a href="<?php echo $wo['product']['url'].$el_color;?>" data-ajax="?link1=item&items=<?php echo $wo['product']['seo_id'].$el_color_b;?>">
      <div class="imagen_productos">
         <?php if(!empty($wo['product']['images'][0]['image_org'])): ?>
            <img src="<?php echo $wo['product']['images'][0]['image_org'];?>" alt="<?php echo $wo['product']['name']; ?>" />
         <?php else: ?>
            <svg style="width:100%;height:100%;padding:35px;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-x" width="400" height="400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M13 21h-7a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v7" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3 3" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0" /><path d="M22 22l-5 -5" /><path d="M17 22l5 -5" /></svg>
         <?php endif ?>
      </div>
      <div class="produc_info">
         <div class="informations_item">
            <span title="<?php echo $wo['product']['name']; ?>"><?php echo $wo['product']['name']; ?></span>
            <p><?php echo html_entity_decode($wo['product']['description']);?></p>
         </div>
         <div class="buttons_prod_item">
            <h4><?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price_format']; ?></h4>
            <span class="Btn_dorado">ORDENAR</span>
         </div>
         
         
      </div>
	</a>
</div>


