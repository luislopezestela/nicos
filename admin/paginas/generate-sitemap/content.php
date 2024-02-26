<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Herramientas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Generar mapa del sitio</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Actualizar mapa del sitio</h6>
                    <div class="alert alert-info"><a href="<?php echo $wo['config']['site_url'] ?>/sitemap.xml" target="_blank"><?php echo $wo['config']['site_url'] ?>/sitemap.xml</a></div>
                    <div class="sitemap-settings-alert"></div>
                    <form class="sitemap-settings" method="POST">
                        <label for="order_posts_by">Actualizando*</label>
                        <select class="form-control show-tick" id="order_posts_by" name="order_posts_by">
                              <option value="" disabled selected>Tasa de actualización del SiteMap. Predeterminado (diariamente)</option>
			                  <option value="daily">A diario</option>
			                  <option value="always">Siempre</option>
			                  <option value="hourly">Cada hora</option>
			                  <option value="weekly">Semanalmente</option>
			                  <option value="monthly">Mensual</option>
			                  <option value="yearly">Anual</option>
			                  <option value="never">Nunca</option>
                        </select>
                        <div class="clearfix"></div>
                        <br>
                        <div class="alert alert-info">Nota: Esto puede tardar hasta 10 minutos.</div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Generar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>

$(function() {
    var form_sitemap_settings = $('form.sitemap-settings');
    form_sitemap_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + "?f=admin_setting&s=update-sitemap",
        beforeSend: function() {
            form_sitemap_settings.find('.waves-effect').text('Por favor espere..');
        },
        success: function(data) {
            if (data.status == 200) {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                $('.sitemap-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Mapa del sitio actualizado con exito</div>');
            }
            form_sitemap_settings.find('.waves-effect').text('Generar');
        }
    });
});
</script>