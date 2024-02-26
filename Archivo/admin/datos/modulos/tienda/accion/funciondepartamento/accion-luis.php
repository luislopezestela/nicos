 <option value=""><?=Luis::lang("provincia");?></option>
 <?php $provincias=DatosAdmin::poridDeDepartamento($_POST['departamento']); ?>
 <?php if(count($provincias)>0):?>
 <?php foreach($provincias as $pro):?>
 <option value="<?=$pro->id;?>"><?=$pro->nombre;?></option>
 <?php endforeach; ?>
 <?php endif; ?>