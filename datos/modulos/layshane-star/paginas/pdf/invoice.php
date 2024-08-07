<style type="text/css">
.invoice_mt-50 {
    margin-top: 50px
}

.invoice_mb-50 {
    margin-bottom: 50px;
}

.invoice_card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
}

.invoice_card-img-actions {
    position: relative
}

.invoice_card-body {
    padding: 20px;
}

.invoice_cover{
    width: 100%;
			max-width: 130px;
}
.invoice_card-title {
    margin-bottom: 20px;
    font-size: 26px;color: #f9f9f9;
}

.invoice_invoice-color {
    color: red !important
}

.invoice_card-header {
    padding: 20px 20px 10px;
    margin-bottom: 0;
    background-color: #43444e;
}

.invoice_btn-light {
    color: #333;
    background-color: #fafafa;
    border-color: #ddd
}

@media (min-width: 768px) {
    .invoice_wmin-md-400 {
        min-width: 400px !important
    }
}

.invoice_btn-primary {
    color: #fff;
    background-color: #2196f3
}

.invoice_btn-labeled>b {
    position: absolute;
    top: -1px;
    background-color: blue;
    display: block;
    line-height: 1;
    padding: .62503rem
}
.invoice_label {
			color: #222;
			font-weight: 500;
			font-size: 15px;display: block;
		}
		.invoice_label_data {
			font-size: 16px;
			color: #666;
		}
		.invoice_table thead th {
		    border: 0;
    background-color: #F8F8FA;
    font-weight: 500;
    font-size: 14px;
    text-transform: uppercase;color: #222;
		}
		.invoice_card-header .invoice_label {
		color: #f9f9f9;
		}
		.invoice_card-header .invoice_label_data {
		color: #bebebe;
		}
		.invoice_table tbody td {
		    border: 0;
    color: #222;
		}
		.invoice_payment_details {
		    border-top: 1px solid #8e8e8e;
    border-bottom: 1px solid #8e8e8e;
    padding: 5px 0;
    margin: 5px 0;font-size: 17px;
		}
</style>

<div class="invoice_mt-50 invoice_mb-50 ticket_card_<?php echo($wo['purchase']->order_hash_id) ?>" style="display: none !important;">
	<div class="invoice_card" id="invoice_<?php echo($wo['purchase']->id) ?>">
		<div class="invoice_card-header">
			<div class="row">
				<div class="col-xs-6">
					<img src="<?php echo  $wo['config']['theme_url'].'/img/logo.png';?>" class="invoice_cover">
				</div>
				<div class="col-xs-6">
					<h6 class="invoice_card-title"><?php echo $wo["lang"]["sale_invoice"] ?></h6>
					<b class="invoice_label"><?php echo $wo["lang"]["invoice"] ?>:</b>
					<p class="invoice_label_data">#<?php echo($wo['purchase']->order_hash_id) ?></p>
					
					<b class="invoice_label"><?php echo $wo["lang"]["date"] ?>:</b>
					<p class="invoice_label_data"><?php echo(date('m/d/Y', strtotime($wo['purchase']->timestamp))) ?></p>
				</div>
			</div>
		</div>
		
		<div class="invoice_card-body">
			<div class="row">
				<div class="col-xs-6">
					<b class="invoice_label"><?php echo $wo["lang"]["seller_name"] ?>:</b>
					<p class="invoice_label_data"><?php echo($wo['product_owner']['name']) ?></p>
					
					<b class="invoice_label"><?php echo $wo["lang"]["seller_email"] ?>:</b>
					<p class="invoice_label_data mb-0"><?php echo($wo['product_owner']['email']) ?></p>
				</div>
				<div class="col-xs-6">
					<b class="invoice_label"><?php echo $wo["lang"]["invoice_to"] ?>:</b>
					<p class="invoice_label_data mb-0"><?php echo($wo['address']->name) ?></p>
					<p class="invoice_label_data mb-0"><?php echo($wo['address']->country) ?> / <?php echo($wo['address']->city) ?></p>
					<p class="invoice_label_data mb-0"><?php echo($wo['address']->address) ?></p>
					<p class="invoice_label_data mb-0"><?php echo($wo['address']->zip) ?></p>
					<p class="invoice_label_data mb-0"><?php echo($wo['address']->phone) ?></p>
				</div>
			</div>
		</div>
		
		<div class="table-responsive invoice_table">
			<table class="table table-lg">
				<thead>
					<tr>
						<th><?php echo $wo["lang"]["item"] ?></th>
						<th><?php echo $wo["lang"]["price"] ?></th>
						<th>QTY</th>
						<th><?php echo $wo["lang"]["total"] ?></th>
					</tr>
				</thead>
				<tbody>
					<?php echo $wo['html']; ?>
				</tbody>
			</table>
		</div>
				
		<div class="invoice_card-body">
			<div class="row">
				<div class="col-xs-6"></div>
				<div class="col-xs-6">
					<b class="invoice_label invoice_payment_details"><?php echo $wo["lang"]["payment_details"] ?></b>
					<div class="row">
						<div class="col-xs-6">
							<b class="invoice_label"><?php echo($wo['product_owner']['user_id'] == $wo['user']['user_id'] ? $wo["lang"]["subtotal"] : $wo["lang"]["total"]); ?>:</b>
							<?php //if ($wo['product_owner']['user_id'] == $wo['user']['user_id']) { ?>
								<b class="invoice_label"><?php echo $wo["lang"]["commission"] ?></b>
								<b class="invoice_label"><?php echo $wo["lang"]["total"] ?></b>
							<?php //} ?>
							<b class="invoice_label"><?php echo $wo["lang"]["bank_name"] ?>:</b>
						</div>
						<div class="col-xs-6 text-right">
							<p class="invoice_label_data mb-0"><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo($wo['total']) ?></p>
							<?php //if ($wo['product_owner']['user_id'] == $wo['user']['user_id']) { ?>
								<p class="invoice_label_data mb-0"><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo($wo['total_commission']) ?></p>
								<p class="invoice_label_data mb-0"><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo($wo['total_final_price']) ?></p>
							<?php //} ?>
							<p class="invoice_label_data mb-0"><?php echo $wo["lang"]["wallet"] ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    invoice = this.document.getElementById("invoice_<?php echo($wo['purchase']->id) ?>");
    var opt = {
        margin: 1,
        filename: "<?php echo(!empty($wo['main_product']) && !empty($wo['main_product']['in_title']) ? $wo['main_product']['in_title'] : $wo['purchase']->id ) ?>-boleta.pdf",
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    };
    html2pdf().from(invoice).set(opt).save();
</script>