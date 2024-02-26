<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Configuracion</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Administrar monedas</li>
            </ol>
        </nav>
    </div>
    <div class="alert alert-warning">
      <i class="fa fa-question-circle fa-fw"></i> Tenga en cuenta que no todas las monedas son compatibles con los metodos de pago. Si la moneda que eligio no es compatible, puede establecer la moneda de pago predeterminada para cada metodo de pago desde <a href="<?php echo lui_LoadAdminLinkSettings('payment-settings'); ?>"> Configuracion de pago.</a>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
    	<div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Agregar nueva moneda</h6>
                     <div class="add-curreny-settings-alert"></div>
                    <form class="add-curreny-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Codigo de moneda (por ejemplo: PEN)</label>
                                <input type="text" id="currency" name="currency" class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Símbolo de moneda (por ejemplo: S/.)</label>
                                <input type="text" id="currency_symbol" name="currency_symbol" class="form-control">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <button type="submit" class="btn btn-info m-t-15 waves-effect">Agregar moneda</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Monedas</h6>
                   <input type="hidden" id="hash_id" name="hash_id" value="<?php echo lui_CreateSession();?>">
                   <div class="clearfix"></div>
                   <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                      <th>ID</th>
					                  <th>Codigo de moneda</th>
					                  <th>Simbolo de moneda</th>
                                      <th>Estado</th>
                                      <th><?php echo($wo['config']['currency']) ?> Intercambio</th>
					                  <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
				               foreach ($wo['config']['currency_array']  as $wo['currency_key'] => $wo['currency_value']) {
				                  echo lui_LoadAdminPage('manage-currencies/list');
				                }
				               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->

    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModal1Label">¿Eliminar moneda?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   ¿Estás seguro de que quieres eliminar esta moneda?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content modal_content_back">
          <div class="modal-header">
            <h5 class="modal-title" id="defaultModalLabel">Editar moneda</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="edit-curreny-settings-alert"></div>
            <form class="edit-curreny-settings" method="POST">

                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="edit_currency" name="currency" class="form-control" placeholder="Currency Code (e.g: USD)">
                    </div>
                </div>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="edit_currency_symbol" name="currency_symbol" class="form-control" placeholder="Currency Symbol (e.g: $)">
                    </div>
                </div>
                <div class="clearfix"></div>
                <input type="hidden" name="currency_id" id="edit_currency_id">
                <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
            </form>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="c_id_">
            <button type="button" class="btn btn-primary modal_close_btn" data-dismiss="modal">CLOSE</button>
            <button type="button" class="btn btn-success" onclick="Wo_SubmitCurrencyForm();">SAVE CHANGES</button>
          </div>
        </div>
      </div>
    </div>

<script>

function delete_currency(currency,type = 'show') {
  if (type == 'hide') {
    $('#DeleteModal').find('.btn-primary').attr('onclick', "delete_currency('"+currency+"')");
    $('#DeleteModal').modal('show');
    return false;
  }
  $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=remove__curreny', {currency: currency}, function(data, textStatus, xhr) {
    if (data.status == 200) {
        $('#currency_'+currency).remove();
    }
  });
}
function open_edit_currency(currency,currency_symbol,currency_id) {
  $('#defaultModal').modal('show');
  $('#edit_currency').val(currency);
  $('#edit_currency_symbol').val(currency_symbol);
  $('#edit_currency_id').val(currency_id);
}

function make_default(currency) {
  $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=select_currency', {currency: currency}, function(data, textStatus, xhr) {
    if (data.status == 200) {
            location.reload();
    }
  });
}
function Wo_SubmitCurrencyForm() {
  $('.edit-curreny-settings').submit();
}

var form_add_site_settings = $('form.add-curreny-settings');
form_add_site_settings.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_curreny',
    beforeSend: function() {
        form_add_site_settings.find('.waves-effect').text('Por favor espere..');
    },
    success: function(data) {
        if (data.status == 200) {
            form_add_site_settings.find('.waves-effect').text('Add Currency');
            $("html, body").animate({ scrollTop: 0 }, "slow");
            $('.add-curreny-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Moneda añadida con exito</div>');
            setTimeout(function () {
                $('.add-curreny-settings-alert').empty();
                location.reload();
            }, 2000);
        }
    }
});

var form_edit_site_settings = $('form.edit-curreny-settings');
form_edit_site_settings.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=edit_curreny',
    beforeSend: function() {
        form_edit_site_settings.find('.waves-effect').text('Please wait..');
    },
    success: function(data) {
        if (data.status == 200) {
            form_edit_site_settings.find('.waves-effect').text('Guardar cambios');
            $("html, body").animate({ scrollTop: 0 }, "slow");
            $('.edit-curreny-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Moneda editada con exito</div>');
            setTimeout(function () {
                $('.edit-curreny-settings-alert').empty();
                location.reload();
            }, 2000);
        }
    }
});

</script>