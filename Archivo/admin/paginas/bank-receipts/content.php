<?php
$page           = (!empty($_GET['page-id']) && is_numeric($_GET['page-id'])) ? lui_Secure($_GET['page-id']) : 1;
$filter_keyword = (!empty($_GET['query'])) ? lui_Secure($_GET['query']) : '';
$db->pageLimit  = 20;

if(isset($_GET['approved']) && $_GET['approved'] == 1){
    $db->where('approved',1);
}else{
    $db->where('approved',0);
}


if (!empty($filter_keyword)) {
    $sql   = "(
    `username`     LIKE '%$filter_keyword%' OR 
    `email`        LIKE '%$filter_keyword%' OR 
    `first_name`   LIKE '%$filter_keyword%' OR 
    `ip_address`   LIKE '%$filter_keyword%' OR 
    `phone_number` LIKE '%$filter_keyword%' OR 
    `last_name`    LIKE '%$filter_keyword%'
  )";

    $mediafiles = $db->orderBy('approved_at', 'DESC')->orderBy('id', 'DESC')->objectbuilder()->paginate('bank_receipts', $page);
}

else {
    $mediafiles = $db->objectbuilder()->orderBy('approved_at', 'DESC')->orderBy('id', 'DESC')->paginate('bank_receipts', $page);
}

if (($page > $db->totalPages) && !empty($_GET['page-id'])) {
    header("Location: " . lui_LoadAdminLinkSettings('bank-receipts'));
    exit();
}

$approved_count = $db->where('approved',1)->getValue('bank_receipts','count(id)');
$disapproved_count = $db->where('approved',0)->getValue('bank_receipts','count(id)');
?>
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Gestionar recibos bancarios</a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="row clearfix">
		<div class="col-md-6">
			<div class="card" onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('bank-receipts')) ?>?approved=1'">
				<div class="card-body d-flex align-items-center">
					<svg class="mr-4" height="80" viewBox="0 0 32 32" width="80" xmlns="http://www.w3.org/2000/svg"><g id="BG"><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#dcf8de"/></g><g id="solid"><g><path d="m20.833 11.667h-9.667c-.276 0-.5.224-.5.5v11.333c0 .202.122.384.309.462.186.077.402.035.545-.108l1.294-1.294 1.147 1.275c.092.102.221.161.359.165.144.009.27-.049.367-.146l1.313-1.313 1.313 1.313c.097.097.231.154.367.146.137-.004.267-.063.359-.165l1.147-1.275 1.294 1.294c.096.095.223.146.353.146.064 0 .13-.012.191-.038.187-.077.309-.26.309-.462v-11.333c0-.276-.224-.5-.5-.5zm-5.086 4.5h.507c.779 0 1.413.634 1.413 1.413 0 .701-.505 1.277-1.167 1.395v.525c0 .276-.224.5-.5.5s-.5-.224-.5-.5v-.5h-.667c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h1.42c.228 0 .413-.186.413-.413 0-.234-.186-.42-.413-.42h-.507c-.779 0-1.413-.634-1.413-1.413 0-.701.505-1.277 1.167-1.395v-.525c0-.276.224-.5.5-.5s.5.224.5.5v.5h.667c.276 0 .5.224.5.5s-.224.5-.5.5h-1.42c-.228 0-.413.186-.413.413-.001.234.185.42.413.42z" fill="#4caf50"/></g><g><path d="m22.167 8h-12.334c-1.011 0-1.833.822-1.833 1.833v3c0 .954.735 1.731 1.667 1.816v-2.483c0-.827.673-1.5 1.5-1.5h9.667c.827 0 1.5.673 1.5 1.5v2.483c.931-.085 1.666-.862 1.666-1.816v-3c0-1.011-.822-1.833-1.833-1.833z" fill="#6ccd70"/></g></g></svg>
					<div>
						<h2 class="mt-0"><?php echo $approved_count; ?></h2>
						<h6 class="mb-0">Recibos aprobados</h6>
					</div>
				</div>
			</div>
        </div>
        <div class="col-md-6">
			<div class="card" onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('bank-receipts')) ?>'">
				<div class="card-body d-flex align-items-center">
					<svg class="mr-4" height="80" viewBox="0 0 32 32" width="80" xmlns="http://www.w3.org/2000/svg"><g><path d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z" fill="#ffe3e1"/></g><path d="m22 15.333h-2.5c-.368 0-.667-.299-.667-.667s.299-.666.667-.666h2.5c.368 0 .667-.299.667-.667v-2.667c0-.367-.299-.666-.667-.666h-12c-.368 0-.667.299-.667.667v2.667c0 .367.299.666.667.666h1.167c.368 0 .667.299.667.667s-.299.667-.667.667h-1.167c-1.103 0-2-.897-2-2v-2.667c0-1.103.897-2 2-2h12c1.103 0 2 .897 2 2v2.667c0 1.102-.897 1.999-2 1.999z" fill="#ff7e74"/><path d="m18.667 23.333c-.148 0-.296-.05-.417-.146l-1.25-1-1.251 1c-.243.195-.589.195-.833 0l-1.251-1-1.25 1c-.201.16-.475.192-.705.08-.231-.111-.378-.345-.378-.601v-8.666c0-1.47 1.196-2.667 2.667-2.667h6.667c.368 0 .667.299.667.667s-.299.667-.667.667c-.735 0-1.333.598-1.333 1.333v8.667c0 .256-.147.49-.378.601-.091.044-.19.065-.288.065z" fill="#ff5c50"/><path d="m20.667 12.667h-9.333c-.368 0-.667-.299-.667-.667s.299-.667.667-.667h9.333c.368 0 .667.299.667.667s-.299.667-.667.667z" fill="#ff7e74"/></svg>
					<div>
						<h2 class="mt-0"><?php echo $disapproved_count; ?></h2>
						<h6 class="mb-0">Recibos rechazados</h6>
					</div>
				</div>
			</div>
        </div>
    </div>

    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                <h6 class="card-title">Gestionar recibos bancarios</h6>
                <div class="clearfix"></div>
				<div class="table-responsive1">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Tipo</th>
								<th>Precio</th>
								<th>Creado</th>
								<th>Recibo</th>
								<th>Accion</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if( count($mediafiles) === 0 ){
									echo '<div class="text-center" style="width:100%"><p style="padding: 200px;text-align: center;">No hay datos disponibles en la tabla</p></div>';
								}else {
									foreach ($mediafiles as $mediafilelist) {
										$wo['mediafilelist'] = $mediafilelist;
										$wo['mediafilelist']->user = lui_UserData($mediafilelist->user_id);
										echo lui_LoadAdminPage('bank-receipts/list');
									}
								}
							?>
						</tbody>
					</table>
				</div>
                <div class="wo-admincp-feturepager" style="width: 98%;margin: 0 auto;">
                    <div class="pull-left">
                        <span>
                          <?php echo "Showing $page out of " . $db->totalPages; ?>
                        </span>
                    </div>
                    <div class="pull-right">
                        <nav>
                            <ul class="pagination">
                                <li>
                                    <a href="<?php echo lui_LoadAdminLinkSettings('bank-receipts?page-id=1'); ?>" data-ajax="?path=bank-receipts&page-id=1" class="waves-effect" title='First Page'>
                                        <i class="material-icons">first_page</i>
                                    </a>
                                </li>
                                <?php if ($page > 1) {  ?>
                                    <li>
                                        <a href="<?php echo lui_LoadAdminLinkSettings('bank-receipts?page-id=' . ($page - 1)); ?>" data-ajax="?path=bank-receipts&page-id=<?php echo($page - 1) ?>" class="waves-effect" title='Previous Page'>
                                            <i class="material-icons">chevron_left</i>
                                        </a>
                                    </li>
                                <?php  } ?>

                                <?php
                                $nums       = 0;
                                $nums_pages = ($page > 4) ? ($page - 4) : $page;

                                for ($i=$nums_pages; $i <= $db->totalPages; $i++) {
                                    if ($nums < 20) {
                                        ?>
                                        <li class="<?php echo ($page == $i) ? 'active' : ''; ?>">
                                            <a href="<?php echo lui_LoadAdminLinkSettings('bank-receipts?page-id=' . ($i)); ?>" data-ajax="?path=bank-receipts&page-id=<?php echo($i) ?>" class="waves-effect">
                                                <?php echo $i ?>
                                            </a>
                                        </li>

                                    <?php } $nums++; }?>

                                <?php if ($db->totalPages > $page) { ?>
                                    <li>
                                        <a href="<?php echo lui_LoadAdminLinkSettings('bank-receipts?page-id=' . ($page + 1)); ?>" data-ajax="?path=bank-receipts&page-id=<?php echo($page + 1) ?>" class="waves-effect" title="Next Page">
                                            <i class="material-icons">chevron_right</i>
                                        </a>
                                    </li>
                                <?php } ?>
                                <li>
                                    <a href="<?php echo lui_LoadAdminLinkSettings('bank-receipts?page-id=' . ($db->totalPages)); ?>" data-ajax="?path=bank-receipts&page-id=<?php echo($db->totalPages) ?>" class="waves-effect" title='Last Page'>
                                        <i class="material-icons">last_page</i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">¿Eliminar recibo?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea eliminar este recibo?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ApproveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">¿Aprobar recibo?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               ¿Estás seguro de que quieres aprobar este recibo?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Aprobar</button>
            </div>
        </div>
    </div>
</div>
<script>
   
    $('.image-popup').magnificPopup({
        type: 'image',
        zoom: {
            enabled: true,
            duration: 300,
            easing: 'ease-in-out',
            opener: function(openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        }
    });

    function Wo_DeleteReceipt(receipt_id,user_id,photo_file,type = 'show') {
        if (type == 'hide') {
              $('#DeleteModal').attr('data-id', receipt_id);
              $('#DeleteModal').find('.btn-primary').attr('onclick', "Wo_DeleteReceipt('"+receipt_id+"','"+user_id+"','"+photo_file+"')");
              $('#DeleteModal').modal('show');
              return false;
          }

        hash_id = '<?php echo lui_CreateSession();?>';

        $.get(Wo_Ajax_Requests_File(),{f:'admin_setting', s:'delete_receipt', receipt_id: receipt_id, user_id: user_id, receipt_file: photo_file, hash_id: hash_id})
        .done(function( data ) {
            $('#ReceiptID_' + receipt_id).fadeOut(300, function() {
                $(this).remove();
            });
        });
    }

    function Wo_ApproveReceipt(receipt_id,photo_file,type = 'show') {
        if (type == 'hide') {
              $('#ApproveModal').attr('data-id', receipt_id);
              $('#ApproveModal').find('.btn-primary').attr('onclick', "Wo_ApproveReceipt('"+receipt_id+"','"+photo_file+"')");
              $('#ApproveModal').modal('show');
              return false;
          }
        hash_id = '<?php echo lui_CreateSession();?>';
        $('#ReceiptID_' + receipt_id).fadeOut(300, function() {
            $(this).remove();
        });
        $.get(Wo_Ajax_Requests_File(),{f:'admin_setting', s:'approve_receipt', receipt_id: receipt_id, receipt_file: photo_file, hash_id: hash_id})
        .done(function( data ) {
            //window.location = window.location.href;
        });

    }

</script>

<style type="text/css">
    .image-popup img{max-height: 243px;}
</style>