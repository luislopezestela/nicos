<tr class="setting-event" id="list_<?php echo $wo['order']->id ?>" data_selected="<?php echo $wo['order']->id ?>">
	<td><input type="checkbox" id="check-data-<?php echo $wo['order']->id?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo $wo['order']->id?>"></label></td>
	<td><?php echo $wo['order']->id?></td>
	<td>
		<a href="<?php echo lui_SeoLink('index.php?link1=order&id='.$wo['order']->hash_id); ?>" target="_blank">LINK</a>
	</td>
	<td>
		<a href="<?php echo $wo['order']->user_data['url']; ?>">
			<img src="<?php echo $wo['order']->user_data['avatar']; ?>" class="setting-avatar" > <?php echo $wo['order']->user_data['name']; ?>
		</a>
	</td>
	<td>
		<div class="ajax-time">
			<?php echo date('F j Y, g:i a', $wo['order']->time); ?>
		</div>
	</td>
	<td>
		<?php if ($wo['order']->status == "pendiente") { ?>
			<span class="badge badge-warning text-capitalize font-weight-bold"><?php echo $wo['order']->status; ?></span>
		<?php } else if ($wo['order']->status == "aceptado") { ?>
			<span class="badge badge-success text-capitalize font-weight-bold"><?php echo $wo['order']->status; ?></span>
		<?php } else if ($wo['order']->status == "listo") { ?>
			<span class="badge badge-secondary text-capitalize font-weight-bold"><?php echo $wo['order']->status; ?></span>
		<?php } else if ($wo['order']->status == "enviado") { ?>
			<span class="badge badge-info text-capitalize font-weight-bold"><?php echo $wo['order']->status; ?></span>
		<?php } else if ($wo['order']->status == "entregado") { ?>
			<span class="badge badge-success text-capitalize font-weight-bold"><?php echo $wo['order']->status; ?></span>
		<?php } else if ($wo['order']->status == "cancelado") { ?>
			<span class="badge badge-danger text-capitalize font-weight-bold"><?php echo $wo['order']->status; ?></span>
		<?php } else { ?>
			<span class="badge badge-secondary text-capitalize font-weight-bold"><?php echo $wo['order']->status; ?></span>
		<?php } ?>
	</td>
	<td>
		<button type="button" class="delete-event btn bg-danger admn_table_btn" id="<?php echo $wo['order']->id?>" onclick="DeleteOrder(<?php echo $wo['order']->id?>,'hide')">Delete</button>
		<select class="btn bg-info admn_table_btn change_order_status" onchange="ChangeStatus(<?php echo $wo['order']->id?>,$(this).val(),'hide')">
			<option value="0">Cambiar Estado</option>
			<option disabled>---------</option>
			<option value="pendiente">Pendiente</option>
            <option value="aceptado">Aceptado</option>
            <option value="listo">Listo</option>
            <option value="enviado">Enviado</option>
            <option value="entregado">Entregado</option>
            <option value="cancelado">Cancelado</option>
		</select>
	</td>
</tr>