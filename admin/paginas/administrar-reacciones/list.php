<tr id="list-<?php echo($wo['reaction_id']) ?>">
  <td><?php echo($wo['reaction_id']) ?></td>
  <td id="sub_name_<?php echo($wo['reaction_id']) ?>"><?php echo($wo['reaction_name']) ?></td>
  <td><div class="mange-react-emoji"><?php 
  if (preg_match("/<[^<]+>/",$wo['reaction_layshane_star']?? '',$m)) {
  	echo($wo['reaction_layshane_star']);
  }
  else{ ?>
   <div class="reaction"><img src="<?php echo($wo['reaction_layshane_star']) ?>"></div>
  <?php } ?></div></td>
  <td><?php echo ($wo['reaction_status'] == 1) ? '<span class="label label-success">Activado</span>': '<span class="label label-danger">Desactivado</span>';?></td>
  <td>
  	<button class="btn bg-success admn_table_btn" onclick="EditReaction('<?php echo($wo['reaction_id']) ?>')">Editar</button>
  	<?php if ($wo['reaction_status'] == 1) { ?>
  		<button class="btn bg-danger admn_table_btn" onclick="ReactionStatus(this,'<?php echo($wo['reaction_id']) ?>')">Desactivado</button>
  	<?php }else{ ?>
  		<button class="btn bg-success admn_table_btn" onclick="ReactionStatus(this,'<?php echo($wo['reaction_id']) ?>')">Activado</button>
  	<?php } 
  	if ($wo['reaction_id'] > 6) {?>
  		<button class="btn bg-danger admn_table_btn" onclick="DeleteReaction(this,'<?php echo($wo['reaction_id']) ?>','hide')">Eliminar</button>
  	<?php } ?>
  </td>
</tr>