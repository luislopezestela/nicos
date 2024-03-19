<style type="text/css">
.contain_pay_mode{width:100%;display:flex;align-items:flex-end;flex-direction:column;}
.mod_pay_suct{width:100%;background:rgba(46, 204, 113,0.12);padding:22px;display:block;}
.input_moun{width:100%;max-width:220px;height:45px;padding:12px;border-radius:12px;border:1.5px solid lightgrey;outline:none;transition:all 0.3s cubic-bezier(0.19, 1, 0.22, 1);box-shadow:0px 0px 20px -18px;}
.input_moun:hover{border: 2px solid lightgrey;box-shadow: 0px 0px 20px -17px;}
.input_moun:active{transform:scale(0.95);}
.input_moun:focus{border:2px solid grey;}
.end_order_layshane{display:flex;width:100%;flex-wrap:wrap;justify-content:flex-end;}
</style>
<style type="text/css">
.button_pays {
  font-family: inherit;
  font-size: 20px;
  background: royalblue;
  color: white;
  padding: 0.7em 1em;
  padding-left: 0.9em;
  display: flex;
  align-items: center;
  border: none;
  border-radius: 16px;
  overflow: hidden;
  transition: all 0.2s;
  cursor: pointer;
}

.button_pays span {
  display: block;
  margin-left: 0.3em;
  transition: all 0.3s ease-in-out;
}

.button_pays svg {
  display: block;
  transform-origin: center center;
  transition: transform 0.3s ease-in-out;
}

.button_pays:hover .svg-wrapper {
  animation: fly-1 0.6s ease-in-out infinite alternate;
}

.button_pays:hover svg {
  transform: translateX(1.2em) rotate(45deg) scale(1.1);
}

.button_pays:hover span {
  transform: translateX(5em);
}

.button_pays:active {
  transform: scale(0.95);
}
.button_pays:disabled{
  background:#ddd;
}

@keyframes fly-1 {
  from {
    transform: translateY(0.1em);
  }

  to {
    transform: translateY(-0.1em);
  }
}

</style>
<?php $cuser = $db->where('user_id',lui_Secure($wo['user']['user_id']))->getOne(T_USERS); ?>
<?php if($cuser->opcion_de_compra=="tienda"): ?>
	<div class="contain_pay_mode mod_pay_suct">
		<span>Pagar en efectivo en el sucursal seleccionado</span>
	</div>
<?php elseif($cuser->opcion_de_compra=="delivery"): ?>
	<div class="contain_pay_mode ">
		<span class="mod_pay_suct">Por favor indica el monto del efectivo con lo que realizara el pago al momento de la entrega del producto.</span>
		<br>

		<span>Pagar con:
			<input id="input_moun" class="input_moun" type="number" min="10" name="amount_pay_one" placeholder="0.00">
		</span>
	</div>
	<br>
	<hr>
	<br>
	<hr>
	<br>
	<div class="end_order_layshane">
		<button type="button" class="btn btn-success btn-mat buy_button button_pays" onclick="BuyProducts_efectivo('hide','<?php echo $wo['total_bux']; ?>')" <?php if (empty($wo['addresses'])) { ?>disabled="true"<?php } ?>>
			
			<div class="svg-wrapper-1">
			    <div class="svg-wrapper">
			      <svg
			        xmlns="http://www.w3.org/2000/svg"
			        viewBox="0 0 24 24"
			        width="24"
			        height="24"
			      >
			        <path fill="none" d="M0 0h24v24H0z"></path>
			        <path
			          fill="currentColor"
			          d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
			        ></path>
			      </svg>
			    </div>
			</div>
			<span><?php echo $wo['lang']['efectivo'] ?></span>
		</button>
	</div>
	<script type="text/javascript">
		const input = document.getElementById("input_moun");
		input.addEventListener("input", (event) => {
			if (event.target.value === ""){}
		});
	</script>
<?php endif ?>

