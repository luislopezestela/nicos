<tr>
	<td><?php echo $wo['key']?></td>
	<td><?php echo lui_GetCurrency($wo['config']['ads_currency']) . $wo['payment']['amount']?></td>
	<td><?php echo $wo['payment']['time_text']?></td>
	<td><span class="label label-status <?php echo $wo['html_class']?>"><?php echo $wo['html_text'];?></span></td>
</tr>