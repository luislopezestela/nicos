<style type="text/css">
.wo_address_row{
  display:-ms-flexbox;
  display:flex;
  -ms-flex-wrap:wrap;
  flex-wrap:wrap;
}
.wo_address_row > .columna-6 {
    float: none !important;
}
.address_book {
    padding: 30px 0 0;
    height: 100%;
}
.address_book_innr {
    height: 100%;
    box-shadow: 0 0 0 1px #eee;
    border-radius: 10px;
    display: flex;
    align-items: center;
    width: 100%;
    justify-content: space-between;
}
.add_new_addrs {
    height: 100%;
    border-radius: 10px;
    background-color: rgb(0 0 0 / 5%);
    font-weight: 600;
    color: #323232;
    flex-direction: column;
    min-height: 150px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none !important;
    width: 100%;
}
.add_new_addrs svg {
    width: 38px;
    height: 38px;
    margin: 0 auto 10px;
}
.address_book {
    padding: 30px 0 0;
    height: 100%;
}
.address_box {
    padding: 13px;
    border-radius: 6px;
}
.address_box p {
    margin-bottom: 8px;
}
.address_box .addrs_name {
    font-weight: bold;
    font-size: 19px;
    color: #222;
}
.address_box .addrs_phone {
    font-weight: bold;
    font-size: 15px;
}
.address_box .addrs_street, .address_box .addrs_count {
    font-size: 15px;
}
.address_box .addrs_count {
    margin: 0;
}
.address_book_innr .row {
    margin: 0;
    padding: 0px 5px;
    flex: 0 0 auto;
}
.address_book_innr .row > div {
    padding: 0;
    width: 100%;
    float: none;
}
.address_book_innr .row > div .btn {
    border: 0;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    padding: 0;
    line-height: 38px;
    display: block;
    margin: 6px;
}
.btn-info {
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
}
.btn-danger {
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
}
</style>
<div class="wo_settings_page wow_content">
	<div class="avatar-holder addresses">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Profile Picture" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['my_addresses']; ?></p>
		</div>
	</div>
	<hr>

	<div class="row wo_address_row">
		<?php 
			if (!empty($wo['address_html'])) {
				echo '<div class="columna-6"><div class="address_book"><div class="address_book_innr"><a href="javascript:void(0)" class="add_new_addrs" onclick="NewAddress()"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.6188 8.7C19.5788 4.07 15.5388 2 11.9988 2C11.9988 2 11.9988 2 11.9888 2C8.45877 2 4.42877 4.07 3.37877 8.69C2.19877 13.85 5.35877 18.22 8.21877 20.98C9.27877 22 10.6388 22.51 11.9988 22.51C13.3588 22.51 14.7188 22 15.7688 20.98C18.6288 18.22 21.7888 13.86 20.6188 8.7ZM14.7488 11.75H12.7488V13.75C12.7488 14.16 12.4088 14.5 11.9988 14.5C11.5888 14.5 11.2488 14.16 11.2488 13.75V11.75H9.24877C8.83877 11.75 8.49877 11.41 8.49877 11C8.49877 10.59 8.83877 10.25 9.24877 10.25H11.2488V8.25C11.2488 7.84 11.5888 7.5 11.9988 7.5C12.4088 7.5 12.7488 7.84 12.7488 8.25V10.25H14.7488C15.1588 10.25 15.4988 10.59 15.4988 11C15.4988 11.41 15.1588 11.75 14.7488 11.75Z" fill="currentColor"></path></svg>' . $wo['lang']['add_new'] . '</a></div></div></div>';
				echo $wo['address_html'];
			}
			else{
				echo '<div class="columna-6"><div class="address_book"><div class="address_book_innr"><a href="javascript:void(0)" class="add_new_addrs" onclick="NewAddress()"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.6188 8.7C19.5788 4.07 15.5388 2 11.9988 2C11.9988 2 11.9988 2 11.9888 2C8.45877 2 4.42877 4.07 3.37877 8.69C2.19877 13.85 5.35877 18.22 8.21877 20.98C9.27877 22 10.6388 22.51 11.9988 22.51C13.3588 22.51 14.7188 22 15.7688 20.98C18.6288 18.22 21.7888 13.86 20.6188 8.7ZM14.7488 11.75H12.7488V13.75C12.7488 14.16 12.4088 14.5 11.9988 14.5C11.5888 14.5 11.2488 14.16 11.2488 13.75V11.75H9.24877C8.83877 11.75 8.49877 11.41 8.49877 11C8.49877 10.59 8.83877 10.25 9.24877 10.25H11.2488V8.25C11.2488 7.84 11.5888 7.5 11.9988 7.5C12.4088 7.5 12.7488 7.84 12.7488 8.25V10.25H14.7488C15.1588 10.25 15.4988 10.59 15.4988 11C15.4988 11.41 15.1588 11.75 14.7488 11.75Z" fill="currentColor"></path></svg>' . $wo['lang']['add_new'] . '</a></div></div></div>';
			}
		?>
	</div>
	<input type="hidden" id="setting_address_page">
</div>

<script type="text/javascript">
  function EditAddress(id) {
		$('.modal_edit_address_modal_alert_'+id).empty();
		$("#edit_address_modal_"+id).find('.btn-mat').removeAttr('disabled')
		$("#edit_address_modal_"+id).find('.btn-mat').text("<?php echo $wo['lang']['edit']; ?>");
		$('#edit_address_modal_'+id).modal('show');
	}
	function DeleteAddress(id,type = 'show') {
		if (type == 'hide') {
	      $('#delete-address').find('.btn-mat').attr('onclick', "DeleteAddress('"+id+"')");
	      $('#delete-address').modal('show');
	      return false;
	    }
	    $('.address_'+id).slideUp();
		$('.address_'+id).remove();
		$('#edit_address_modal_'+id).remove();
		$.post(Wo_Ajax_Requests_File() + '?f=address&s=delete&hash=' + $('.main_session').val(), {id: id}, function(data, textStatus, xhr) {});
	}
</script>
