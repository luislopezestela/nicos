<?php 
$section_keys = lui_GetSectionCatKeys('section_product');
?>
<?php if($wo['categoria_id']==0): ?>
<?php else: ?>
<?php if(!empty($wo['sections_categories'])): ?>
  <?php $id_sections = $wo['category_section']; ?>
  <select name="seccions" class="form-control">
    <option value="0">Seleccione una Seccion</option>
    <?php foreach ($wo['sections_categories'] as $section_id => $section_name): ?>
      <?php if($section_id==$id_sections): ?>
        <?php $selected = 'selected' ?>
      <?php else: ?>
        <?php $selected = false; ?>
      <?php endif ?>
      <option value="<?=$section_id;?>" <?=$selected; ?>><?=$wo["lang"][$section_keys[$section_id]];?></option>
    <?php endforeach ?>
  </select>
<?php endif ?>
<?php endif ?>
<div class="form-line">
    <label class="form-label">Logo</label>
    <div class="btn-file d-flex align-items-center">
      <input type="file" id="icono_categorias<?php echo($wo['categoria_id']) ?>" accept="image/x-png, image/gif, image/jpeg" name="media_file" class="hidden">
      <div class="mr-2 change-file-ico">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16.5,6V17.5A4,4 0 0,1 12.5,21.5A4,4 0 0,1 8.5,17.5V5A2.5,2.5 0 0,1 11,2.5A2.5,2.5 0 0,1 13.5,5V15.5A1,1 0 0,1 12.5,16.5A1,1 0 0,1 11.5,15.5V6H10V15.5A2.5,2.5 0 0,0 12.5,18A2.5,2.5 0 0,0 15,15.5V5A4,4 0 0,0 11,1A4,4 0 0,0 7,5V17.5A5.5,5.5 0 0,0 12.5,23A5.5,5.5 0 0,0 18,17.5V6H16.5Z"></path></svg>
      </div>
      <div class="full-width">
          <b id="icono_categorias-name<?=($wo['categoria_id']);?>">Logo</b>
      </div>
    </div>
    
</div>

<script type="text/javascript">
  $("#icono_categorias<?=($wo['categoria_id']);?>").change(function () {
        var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
            $("#icono_categorias-name<?=($wo['categoria_id']);?>").text(filename);
  });
</script>