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
<?php 
$estado_pendiente = '';
if ($wo['product']['active']==0){
   $estado_pendiente = 'table-row--yellow'; 
}else{
  $estado_pendiente = ''; 
}
?>
<tr class="product table-row table-row--chris <?=$estado_pendiente; ?>" id="product_<?php echo $wo['product']['id'];?>" data-id="<?php echo $wo['product']['id']?>">
   <td data-column="Producto" class="table-row__td">
      <?php if ($wo['product']['active']==0): ?>
         <div class="table-row--overdue_gris"></div>
      <?php elseif ($wo['product']['active']==1): ?>
         <div class="table-row--overdue_green"></div>
      <?php endif ?>
      
      <?php if(!empty($wo['product']['images'][0]['image_org'])): ?>
         <div class="table-row__img" style="background-image:url('<?php echo $wo['product']['images'][0]['image_org'];?>');"></div>
      <?php else: ?>
         <svg style="width:36px;height:36px;" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo-x" width="400" height="400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 8h.01" /><path d="M13 21h-7a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v7" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3 3" /><path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0" /><path d="M22 22l-5 -5" /><path d="M17 22l5 -5" /></svg>
      <?php endif ?>
      <div class="table-row__info">
         <p class="table-row__name"><?php echo $wo['product']['name']; ?></p>
         <?php if(isset($color_id['id_color'])!=0): ?>
            <span class="table-row__small"><?php echo $wo['lang'][$buscar_el_color_por_id['lang_key']] ?></span>
         <?php endif ?>
      </div>
   </td>
   <td data-column="Precio venta" class="table-row__td">
      <div class="">
         <span class="table-row__name"><?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price_format']; ?></span>
      </div>                 
   </td>
   <td data-column="" class="table-row__td">
      <div class="">
         <div class="dropdown dropdown_losproductosContenido">
            <div class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none">
                  <rect x="18" y="10.5" width="3" height="3" rx="1" stroke="currentColor" stroke-width="1.5" />
                  <rect x="10.5" y="10.5" width="3" height="3" rx="1" stroke="currentColor" stroke-width="1.5" />
                  <rect x="3" y="10.5" width="3" height="3" rx="1" stroke="currentColor" stroke-width="1.5" />
               </svg>
            </div>
            <div class="dropdown-menu dropdown_losproductosLista">
               <ul class="opciones_de_producto">
                  <?php if ($wo['product']['active']==1): ?>
                     <li>
                        <a href="<?php echo $wo['product']['url'].$el_color;?>" data-ajax="?link1=item&items=<?php echo $wo['product']['seo_id'].$el_color_b;?>">
                           <span>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none">
                                  <path d="M2 8C2 8 6.47715 3 12 3C17.5228 3 22 8 22 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                  <path d="M21.544 13.045C21.848 13.4713 22 13.6845 22 14C22 14.3155 21.848 14.5287 21.544 14.955C20.1779 16.8706 16.6892 21 12 21C7.31078 21 3.8221 16.8706 2.45604 14.955C2.15201 14.5287 2 14.3155 2 14C2 13.6845 2.15201 13.4713 2.45604 13.045C3.8221 11.1294 7.31078 7 12 7C16.6892 7 20.1779 11.1294 21.544 13.045Z" stroke="currentColor" stroke-width="1.5" />
                                  <path d="M15 14C15 12.3431 13.6569 11 12 11C10.3431 11 9 12.3431 9 14C9 15.6569 10.3431 17 12 17C13.6569 17 15 15.6569 15 14Z" stroke="currentColor" stroke-width="1.5" />
                              </svg>
                           </span>Ver producto
                        </a>
                     </li>
                  <?php endif ?>
                  <?php if ($wo['loggedin'] && lui_IsAdmin() || lui_IsModerator()) { ?>
                     <li>
                        <a href="<?php echo lui_SeoLink('index.php?link1=edit-product&id=' . $wo['product']['id']);?>">
                           <span>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none">
                                 <path d="M14.0737 3.88545C14.8189 3.07808 15.1915 2.6744 15.5874 2.43893C16.5427 1.87076 17.7191 1.85309 18.6904 2.39232C19.0929 2.6158 19.4769 3.00812 20.245 3.79276C21.0131 4.5774 21.3972 4.96972 21.6159 5.38093C22.1438 6.37312 22.1265 7.57479 21.5703 8.5507C21.3398 8.95516 20.9446 9.33578 20.1543 10.097L10.7506 19.1543C9.25288 20.5969 8.504 21.3182 7.56806 21.6837C6.63212 22.0493 5.6032 22.0224 3.54536 21.9686L3.26538 21.9613C2.63891 21.9449 2.32567 21.9367 2.14359 21.73C1.9615 21.5234 1.98636 21.2043 2.03608 20.5662L2.06308 20.2197C2.20301 18.4235 2.27297 17.5255 2.62371 16.7182C2.97444 15.9109 3.57944 15.2555 4.78943 13.9445L14.0737 3.88545Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                 <path d="M13 4L20 11" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                 <path d="M14 22L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                              </svg>
                           </span>Editar
                        </a>
                     </li>
                  <?php } ?>

                  <?php if ($wo['loggedin'] && lui_IsAdmin()) { ?>
                     <li onclick="RemoveUserProduct(<?php echo $wo['product']['id'];?>,'hide')">
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none">
                              <path d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                              <path d="M3 5.5H21M16.0557 5.5L15.3731 4.09173C14.9196 3.15626 14.6928 2.68852 14.3017 2.39681C14.215 2.3321 14.1231 2.27454 14.027 2.2247C13.5939 2 13.0741 2 12.0345 2C10.9688 2 10.436 2 9.99568 2.23412C9.8981 2.28601 9.80498 2.3459 9.71729 2.41317C9.32164 2.7167 9.10063 3.20155 8.65861 4.17126L8.05292 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                              <path d="M9.5 16.5L9.5 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                              <path d="M14.5 16.5L14.5 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                           </svg>
                        </span>Eliminar
                     </li>
                  <?php } ?>
                  <?php if ($wo['product']['active']==0): ?>
                     <li onclick="ActivateProduct(<?=$wo['product']['id'] ?>,'hide')">
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none">
                              <path d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                           </svg>
                        </span>Activar
                     </li>
                  <?php else: ?>
                     <li onclick="DesactivarProduct(<?=$wo['product']['id'] ?>,'hide')">
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none">
                              <path d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                           </svg>
                        </span>Desactivar
                     </li>
                  <?php endif ?>
               </ul>
            </div>
        </div>

      </div>                 
   </td>
</tr>
