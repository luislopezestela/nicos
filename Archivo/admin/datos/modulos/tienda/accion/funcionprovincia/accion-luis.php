 <option value=""><?=Luis::lang("distrito");?></option>
 <?php $distritos=DatosAdmin::poridDeProvincia($_POST['provincia']); ?>
 <?php if(count($distritos)>0):?>
 <?php foreach($distritos as $dis):?>
 <option value="<?=$dis->id;?>"><?=$dis->nombre;?></option>
 <?php endforeach; ?>
 <?php endif; ?>