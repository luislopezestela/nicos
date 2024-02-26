<?php echo($wo['reaction_name']) ?>
<div class="form-group form-float">
  <div class="form-line focused">
    <label class="form-label">Reaccion layshane-star</label>
        <input type="file" class="form-control" name="layshane">
  </div>
</div>
<?php if ($wo['reaction_id'] < 7) { ?>
  <?php if (!empty($wo['layshane_star'])) { ?>
<label for="wowonder_to_use">Use el icono predeterminado en el tema Layshane-star</label>
<div class="form-group">
    <input type="radio" name="wowonder_to_use" id="wowonder_to_use-enabled" value="1">
    <label for="wowonder_to_use-enabled">Por defecto</label>
</div>
<?php } ?>
<?php } ?>
<input type="hidden" name="id" value="<?php echo($wo['reaction_id']) ?>">