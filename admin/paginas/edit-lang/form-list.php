<div class="form-group">
    <div class="form-lins">
        <label class="form-lasbel"><?php echo ucfirst($wo['key_']); ?></label>
        <?php if (isset($wo['is_editale'])): ?>
            <textarea style="resize:none;" name="<?=$wo['key_']; ?>" id="<?php echo $wo['key_']; ?>" class="form-control" cols="20" rows="2" data-editable="<?php echo $wo['is_editale']; ?>"><?php echo $wo['lang_vlaue'] ?></textarea>
        <?php else: ?>
            <textarea style="resize:none;" name="<?=$wo['key_']; ?>" id="<?php echo $wo['key_']; ?>" class="form-control" cols="20" rows="2" data-editable=""><?php echo $wo['lang_vlaue'] ?></textarea>
        <?php endif ?>
        
    </div>
</div>