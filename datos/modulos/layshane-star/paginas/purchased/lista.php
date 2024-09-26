<div class="card" data-purchase-id="<?php echo $wo['purchase']['id']; ?>">
	<a href="<?php echo $wo['purchase']['url']; ?>">
		<div class="contenido">
			<div class="header">
				<?=fechasCompra($wo['purchase']['time']); ?>
			</div>
			<div class="body_c">
				<div class="iconos">
					<span class="view_document" <?php if($wo['estadodeventa']['step']==1){echo 'style="color:orange"';} ?>>
						<?php echo $wo['estadodeventa']['icono_uno'] ?>
					</span>
				</div>
		    	<div class="div_image_v">
		    		<?php if ($wo['purchase']['hash_id']): ?>
		    			<span class="title" <?php if($wo['estadodeventa']['step']==1){echo 'style="color:orange"';} ?>>#<?php echo $wo['purchase']['hash_id']; ?></span>
		    		<?php else: ?>
		    			<span class="title"><?php echo $wo['estadodeventa']['estado_ventas']; ?></span>
		    		<?php endif ?>
		    		
		    		<span class="message">
		    			<p><?php echo $wo['estadodeventa']['texto_venta'] ?></p>
		    			<?php if ($wo['purchase']['fecha']): ?>
		    				<p><?php echo fechaEntrega($wo['purchase']['fecha']);?></p>
		    			<?php endif ?>
		    			<?php if ($wo['sucursal_entrega']): ?>
		    				<p>Sucursal entrega: <?php echo $wo['sucursal_entrega']['nombre'] ?></p>
		    			<?php endif ?>
		    		</span>
		    	</div>
	    	</div>
	    </div>
	</a>
</div>