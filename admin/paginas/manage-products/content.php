<?php 

$page           = (!empty($_GET['page-id']) && is_numeric($_GET['page-id'])) ? $_GET['page-id'] : 1;
$filter_keyword = (!empty($_GET['query'])) ? lui_Secure($_GET['query']) : '';
$filter_type    = '';
$db->pageLimit  = 50;
$link = '';

if (!empty($filter_keyword)) {
  $link .= '&query='.$filter_keyword;
  $sql   = "(`name` LIKE '%$filter_keyword%' OR `description` LIKE '%$filter_keyword%')";
  $db->where($sql);
}
$sort_link = $link;
$sort_array = array('DESC_i' => array('id' , 'DESC'),
                    'ASC_i'  => array('id' , 'ASC'));
if (!empty($_GET['sort']) && in_array($_GET['sort'], array_keys($sort_array))) {
  $link .= "&sort=".lui_Secure($_GET['sort']);
  $db->orderBy($sort_array[$_GET['sort']][0],$sort_array[$_GET['sort']][1]);
}
else{
    $_GET['sort'] = 'DESC_i';
    $db->orderBy('id', 'DESC');
} 
$posts = $db->objectbuilder()->paginate(T_PRODUCTS, $page);

if (($page > $db->totalPages) && !empty($_GET['page-id'])) {
  header("Location: " . lui_LoadAdminLinkSettings('manage-products'));
  exit();
}

?>

<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tienda</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        
        <div class="clearfix"></div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
            
                <div class="card-body">
                    <?php if ($wo['config']['can_use_market']) { ?>
                        <a class="btn btn-info btn-mat btn-mat-raised" href="#" data-toggle="modal" data-target="#create-product-modal" data-backdrop="static" data-keyboard="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path></svg> <?php echo $wo['lang']['create'] ?></a><br><br>
                        <div class="clearfix"></div>
                    <?php } ?>
            
                  <h6 class="card-title">Productos</h6>


                  <div class="row">
                      <div class="col-md-9" style="margin-bottom:0;">
                        <form method="get" action="<?php echo lui_LoadAdminLinkSettings('manage-products'); ?>">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group form-float">
                                  <div class="form-line">
                                      <input type="text" name="query" id="query" class="form-control" value="<?php echo($filter_keyword); ?>" placeholder="Buscar">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                               <button class="btn btn-info">Buscar</button>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </form>
                      </div>
                    </div>
                   <input type="hidden" id="hash_id" name="hash_id" value="<?php echo lui_CreateSession();?>">
                   <div class="clearfix"></div>
                   <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                  <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all">Todo</label></th>
                                      <th>ID 
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_i') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-products?page-id=1').$sort_link."&sort=ASC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('manage-products?page-id=1').$sort_link."&sort=DESC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
                                      <th>Producto</th>
                                      <th>P.Venta</th>
                                      <th>Cantidad</th>
                                      <?php if(lui_IsAdmin()): ?>
                                      <th>Accion</th>
                                      <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
				                foreach ($posts as $value) {
                                    $wo['product'] = lui_GetProduct($value->id);
				                    echo lui_LoadAdminPage('manage-products/list');
				                }
				               ?>
                            </tbody>
                        </table><?php ; ?>
                    </div>
                    <div class="wo-admincp-feturepager">
                        <div class="pull-left">
                            <span>
                              <?php echo "Mostrar $page de " . $db->totalPages; ?>
                            </span>
                        </div>
                        <div class="pull-right">
                            <nav>
                                <ul class="pagination">
                                    <li>
                                      <a href="<?php echo lui_LoadAdminLinkSettings('manage-products?page-id=1').$link; ?>" data-ajax="?path=manage-products&page-id=1<?php echo($link); ?>" class="waves-effect" title='Siguiente pagina'>
                                          <i class="material-icons">first_page</i>
                                      </a>
                                    </li>
                                    <?php if ($page > 1) {  ?>
                                      <li>
                                          <a href="<?php echo lui_LoadAdminLinkSettings('manage-products?page-id=' . ($page - 1)).$link; ?>" data-ajax="?path=manage-products&page-id=<?php echo($page - 1) ?><?php echo($link); ?>" class="waves-effect" title='Pagina anterior'>
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
                                        <a href="<?php echo lui_LoadAdminLinkSettings('manage-products?page-id=' . ($i)).$link; ?>" data-ajax="?path=manage-products&page-id=<?php echo($i) ?><?php echo($link); ?>" class="waves-effect">
                                          <?php echo $i ?>   
                                        </a>
                                      </li>

                                    <?php } $nums++; }?>

                                    <?php if ($db->totalPages > $page) { ?>
                                      <li>
                                          <a href="<?php echo lui_LoadAdminLinkSettings('manage-products?page-id=' . ($page + 1)).$link; ?>" data-ajax="?path=manage-products&page-id=<?php echo($page + 1) ?><?php echo($link); ?>" class="waves-effect" title="Next Page">
                                              <i class="material-icons">chevron_right</i>
                                          </a>
                                      </li>
                                    <?php } ?>
                                    <li>
                                      <a href="<?php echo lui_LoadAdminLinkSettings('manage-products?page-id=' . ($db->totalPages)).$link; ?>" data-ajax="?path=manage-products&page-id=<?php echo($db->totalPages) ?><?php echo($link); ?>" class="waves-effect" title='Last Page'>
                                          <i class="material-icons">last_page</i>
                                      </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <span>&nbsp;</span>
                                <button type="button" class="btn btn-info waves-effect delete-selected d-block" disabled>Eliminar lo seleccionado<span></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
    <style type="text/css">
        .colores_activados_prod{
            display:block;
            border:3px dashed rgba(8, 8, 8, 0.32);
            transition: all .5s;
            border-radius:6px;
            padding:8px;
        }
        .disable_added_media{
            display:none!important;
        }
        .contain_data_images_group_s{
            width:100%;
            padding:5px!important;
        }
        .contenedor_media_colors{
            position:relative;
            padding-top:20px;
            background-color:#fff;
            max-width:100%;
        }
        .color_view_data{
            padding:6px;
            position:sticky;
            top:0;
            left:0;
            right:0;
            z-index:1;
        }
        .color_view_data i{
            padding:5px;
            position:absolute;
            top:-10px;
            right:0;
            z-index:1;
            border-radius:5px;
        }
    </style>
<style type="text/css">
    .td-avatar {
    width: 28px;
}
    .publicar_producto{overflow:hidden;border-radius: 0.2rem;}
    .publicar_producto_head{background:#3498db;color:#FAFAFA;padding:10px;font-size:17px;}
    .publicar_producto_head h4{margin:0;}
    .publicar_producto_dialog,.editar_producto_dialog{max-width:820px;}
</style>
<style type="text/css">

    .wow_form_fields select{height:44px;}
    .wow_form_fields input, .wow_form_fields textarea, .wow_form_fields select,.wow_form_fields > .bootstrap-select.btn-group > .dropdown-toggle{
        background-color: transparent;
    box-shadow: rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px;
    border-radius: 0;
    transition: background-color 240ms, box-shadow 240ms;
    color: #393d4a;
    font-weight: 400;
    font-size: 16px;
    line-height: 28px;
    padding: 8px;
    width: 100%;
    border: 0;
    outline: 0;
    }
    .wow_form_fields {
    position: relative;
    margin: 15px 0;
    font-family: Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;
  }
  .wow_form_fields > label {
    font-weight: bold;
    font-size: 14.5px;
    display: block;
    color: #777;
    }
    .wow_prod_imgs {
    margin: 0 -7px;
    display: flex;
  }
  .wow_prod_imgs .upload-product-image {
    width: 100px;
    min-width: 100px;
    height: 100px;
    border-radius: max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;
    cursor: pointer;
    display: table;
    margin:10px 5px 0 8px;
    background-color: #f0f2f5;
    }
    .upload-image-content {
    font-size: 15px;
    color: #555;
    display: table-cell;
    vertical-align: middle;
    }

    .upload-image-content {
        transition: all .2s ease-in-out;
        text-align: center;
    }
    .wow_prod_imgs .upload-product-image svg.feather {
    width: 24px;
    height: 24px;
    color: #848484dd;
    }

    svg.feather {
        vertical-align: middle;
        margin-top: -4px;
        width: 19px;
        height: 19px;
    }

    .wow_prod_imgs .productimage_holder_image {
    overflow-x: auto;
    }

    .productimage_holder_image {
        width: 100%;
        margin: 0;
        white-space: nowrap;
    }
    .wow_prod_imgs .productimage_holder_image .thumb-image {
    pointer-events: auto;
    }

    .productimage_holder_image .thumb-image {
        width: 100px;
        height: 100px;
        margin: 10px 5px 0 0;
        display: inline-block;
        object-fit: cover;
        user-select: none;
        pointer-events: none;
        border:2px solid;
        border-radius: max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;
    }
    .thumb-image-delete {
    position: relative;
    display: inline-block;
    }
    .thumb-image-delete-btn {
    position: absolute;
    right: 5px;
    top: 5px;
    color: white;
    background-color: rgba(0, 0, 0, 0.3);
    border-radius: 50%;
    text-align: center;
    line-height: 1;
    padding: 3px;
    }
    .background_image_product {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50% 50%;
    width: 100%;
    border-radius:6px;
    height: 100%;
    }
    .btn_add_product{display:block;text-align:center;width:100%;background-color:#3498db;color:#FAFAFA;}
</style>
<?php echo lui_LoadAdminPage('manage-products/nuevo_producto'); ?>

<div class="modal fade" id="EditproductosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog editar_producto_dialog" role="document">
    <div class="modal-content modal_content_back">
      <div class="modal-header">
        <h5 class="modal-title" id="editcategoryModalLabel"><?php echo $wo['lang']['edit_product'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="edit_custom_field_form_alert"></div>
        <div class="alert alert-info"></div><br>
        <form class="editar_productos_li_s" method="POST" id="modal-body-langs">
          <div class="edit_custom_producto_data"></div>

          <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
          <input type="hidden" name="placement" id="placement" value="product">
          <div class="modal-footer">
          <button type="button" class="btn btn-primary modal_close_btn" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success" id="edit_custom_field_button">Guardar</button>
          </div>
        </form>
        
      </div>
      
    </div>
  </div>
</div>


<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar producto?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que deseas eliminar el producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ActivateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Activar producto?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que deseas activar el producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Activar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="SelectedDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar producto?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que deseas eliminar los productos seleccionados?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<script>

$('.check-all').on('click', function(event) {
    $('input:checkbox').not(this).prop('checked', this.checked);
});
$('.delete-checkbox, .check-all').change(function(event) {
    $('.delete-selected').attr('disabled', false);
    $('.delete-selected').find('span').text(' (' + $('.delete-checkbox:checked').length + ')');
});

$('.delete-selected').on('click', function(event) {
    event.preventDefault();
    $('#SelectedDeleteModal').modal('show');
});

function ShowEditModal(self,id) {
    var headingEl = document.getElementById("u0");
    var headingscrips = document.getElementById("scrps37");
    if(headingEl){headingEl.remove();}
    if(headingscrips){headingscrips.remove();}

    var myScript = document.createElement('script');
    myScript.src = "<?=lui_LoadAdminLink('datos/source/estilos/tinymce/js/tinymce/tinymce.min.js'); ?>";
    myScript.id = "scrps37";
    document.head.appendChild(myScript);

      $(self).text("Espere..");
      $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=get_custom_producto_info', {id: id,type: 'product'}, function(data, textStatus, xhr) {
        if (data.status == 200) {
          $('.edit_custom_producto_data').html(data.html);
          $('#EditproductosModal').modal('show');
            tinymce.init({
                selector: '#detallesupdate',
                height: 270,
                images_upload_credentials: true,
                paste_data_images: true,
                image_advtab: true,
                entity_encoding : 'raw',
                images_upload_url: Wo_Ajax_Requests_File() + '?f=upload-blog-image',
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                plugins: ['advlist anchor autolink autoresize lists link image charmap preview searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table directionality emoticons template codesample importcss pagebreak'],
                file_picker_callback: function(callback, value, meta){
                    if(meta.filetype == 'image'){
                        $('#upload').trigger('click');
                        $('#upload').on('change', function() {
                            var file = this.files[0];
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                callback(e.target.result, {
                                    alt: ''
                                });
                            };
                            reader.readAsDataURL(file);
                        });
                    }
                },
            });
        }
        $(self).text("Editar");
      });
}

tinymce.init({
  selector: '#detalles',
  height: 270,
  images_upload_credentials: true,
  paste_data_images: true,
  image_advtab: true,
  entity_encoding : "raw",
  images_upload_url: Wo_Ajax_Requests_File() + '?f=upload-blog-image',
  toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  toolbar2: "print preview media | forecolor backcolor emoticons",
  plugins: ['advlist anchor autolink autoresize lists link image charmap preview searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table directionality emoticons template codesample importcss pagebreak'],
    file_picker_callback: function(callback, value, meta) {
      if (meta.filetype == 'image') {
        $('#upload').trigger('click');
        $('#upload').on('change', function() {
          var file = this.files[0];
          var reader = new FileReader();
          reader.onload = function(e) {
            callback(e.target.result, {
              alt: ''
            });
          };
          reader.readAsDataURL(file);
        });
      }
    },
});

function Editar_producto(id){
    $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=get_editar_producto_form', {id: id}, function(data, textStatus, xhr) {
        if (data.status == 200) {
            $('#editar_producto_modal'+id).modal();
        }
    });
}

function DeleteSelected() {
    data = new Array();
    $('td input:checked').parents('tr').each(function () {
        data.push($(this).attr('data_selected'));
    });
    $('.delete-selected').attr('disabled', true);
    $('.delete-selected').text('Espere..');
    $.post(Wo_Ajax_Requests_File()+'?f=admin_setting&s=delete_multi_post', {ids: data,type: 'delete'}, function () {
        $.each( data, function( index, value ){
            $("#list_"+value).remove();
        });
        $('.delete-selected').text('Eliminar lo seleccionado');
    });
}
function DeleteProduct(id,type = 'show') {
  if (!id) {
   return false;
  }
  if (type == 'hide') {
      $('#DeleteModal').find('.btn-primary').attr('onclick', "DeleteProduct('"+id+"')");
      $('#DeleteModal').modal('show');
      return false;
    }
       $('#list_' + id).fadeOut(300, function() {
           $(this).remove();
         });
       $("#DeleteModal").modal('hide');
       hash_id = $('#hash_id').val();
      $.post(Wo_Ajax_Requests_File() + "?f=admin_setting&s=delete_post",{post_id: id, hash_id:hash_id});
  
}
function ActivateProduct(id,type = 'show') {
    if (!id) {
   return false;
  }
  if (type == 'hide') {
      $('#ActivateModal').find('.btn-primary').attr('onclick', "ActivateProduct('"+id+"')");
      $('#ActivateModal').modal('show');
      return false;
    }
    $("#ActivateModal").modal('hide');
    $.post(Wo_Ajax_Requests_File() + "?f=admin_setting&s=activate-product",{id: id}, function(data, textStatus, xhr) {
        location.reload()
    });
}
   
var deleted_images_ids = [];
    function DeleteProductImageById(image_id) {
        deleted_images_ids.push(image_id);
        $('#delete_image_by_id_'+image_id).remove();
    }
    var uploaded_deleted_images = [];
    function DeleteUploadedImageById(name,id) {
        uploaded_deleted_images.push(name);
        $('#delete_uploaded_image_by_id_'+id).remove();
    }
    $(document).ready(function(){
        $("#publisher-photos").on('change', function() {
            uploaded_deleted_images = [];
            var product_countFiles = $(this)[0].files.length;
            var product_imgPath = $(this)[0].value;
            var extn = product_imgPath.substring(product_imgPath.lastIndexOf('.') + 1).toLowerCase();
            var product_image_holder = $("#uploaded-productimage-holder");
            product_image_holder.empty();
            if(extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                if(typeof(FileReader) != "undefined"){
                    for(var i = 0; i < product_countFiles; i++){
                        var product_reader = new FileReader();
                        var ii = 0;
                        product_reader.onload = function(e){
                            name = "'"+$("#publisher-photos")[0].files[ii].name+"'";
                            src = "'"+e.target.result+"'";
                            $(product_image_holder).prepend('<span class="thumb-image thumb-image-delete" id="delete_uploaded_image_by_id_'+ii+'"><span class="pointer thumb-image-delete-btn" onclick="DeleteUploadedImageById('+name+','+ii+')"><i class="fa fa-remove"></i></span><div class="background_image_product" style="background-image: url('+src+');"></div></span>');
                            ii = ii +1;
                        }
                        product_image_holder.show();
                        product_reader.readAsDataURL($(this)[0].files[i]);
                    }
                }else{
                    product_image_holder.html("<p>This browser does not support FileReader.</p>");
                }
            }
        });
    });
    function DeleteUploadedImageByIdP(id,self){
        $('#delete_uploaded_image_by_id_'+id).remove();
        imgArray.splice(id, 1);
        var image_holder = $(self).parents('#create-product-modal').find("#productimage-holder");
        image_holder.empty();
        for(var i = 0; i < imgArray.length; i++){
            var reader = new FileReader();
            var ii = 0;
            reader.onload = function (e){
                image_holder.append('<span class="thumb-image-delete" id="image_to_'+ii+'"><span onclick="DeleteUploadedImageByIdP('+ii+',this)" class="pointer thumb-image-delete-btn"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></span><img src="'+e.target.result+'" class="thumb-image"></span>')
                ii = ii +1;
            }
            image_holder.show();
            reader.readAsDataURL(imgArray[i]);
        }
        $("#publisher-photos")[0].files = new FileListItems(imgArray);
    }
    function FileListItemsP (files) {
        var b = new ClipboardEvent("").clipboardData || new DataTransfer()
        for(var i = 0, len = files.length; i<len; i++) b.items.add(files[i])
            return b.files
    }

</script>