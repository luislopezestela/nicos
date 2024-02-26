<?php
$getStatus = getStatus();
?>
<div class="container-fluid">
    <div>
        <h3>Estado de sistema</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Estado del sistema</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Estado del sistema</h6>
                    <p>Aquí puede verificar el estado de su sistema, el sistema le mostrará si hay algún problema en su sitio web.</p><hr>
                    <?php if (!empty($getStatus)) { ?>
						<div class="server_issues">
							<?php foreach ($getStatus as $key => $value) {?>
								<div class="d-flex server_issues_list <?php echo ($value["type"] == "error") ? 'danger' : 'warning';?>">
									<div class="icon">
										<?php echo ($value["type"] == "error") ? '<svg height="40" viewBox="0 0 128 128" width="40" xmlns="http://www.w3.org/2000/svg"><g><path d="m57.362 26.54-37.262 64.535a7.666 7.666 0 0 0 6.639 11.5h74.518a7.666 7.666 0 0 0 6.639-11.5l-37.258-64.535a7.665 7.665 0 0 0 -13.276 0z" fill="#ee404c"/><g fill="#fff7ed"><rect height="29.377" rx="4.333" width="9.638" x="59.181" y="46.444"/><circle cx="64" cy="87.428" r="4.819"/></g></g></svg>' : '<svg height="40" viewBox="0 0 128 128" width="40" xmlns="http://www.w3.org/2000/svg"><g><path d="m57.362 26.54-37.262 64.535a7.666 7.666 0 0 0 6.639 11.5h74.518a7.666 7.666 0 0 0 6.639-11.5l-37.258-64.535a7.665 7.665 0 0 0 -13.276 0z" fill="#ffb400"/><g fill="#fcf4d9"><rect height="29.377" rx="4.333" width="9.638" x="59.181" y="46.444"/><circle cx="64" cy="87.428" r="4.819"/></g></g></svg>';?>
									</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<div class="info">
										<h3><?php echo ($value["type"] == "error") ? '<strong>Importante!</strong>' : '<strong>Advertencia</strong>';?></h3>
										<p><?php echo $value["message"];?></p>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } else { ?>
                        <div class="server_no_issues_list">
							<svg enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g clip-rule="evenodd" fill-rule="evenodd"><path d="m256 0c-141.2 0-256 114.8-256 256s114.8 256 256 256 256-114.8 256-256-114.8-256-256-256z" fill="#4bae4f"/><path d="m379.8 169.7c6.2 6.2 6.2 16.4 0 22.6l-150 150c-3.1 3.1-7.2 4.7-11.3 4.7s-8.2-1.6-11.3-4.7l-75-75c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0l63.7 63.7 138.7-138.7c6.2-6.3 16.4-6.3 22.6 0z" fill="#fff"/></g></svg>Todo bien, no se encontraron problemas.
						</div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>

</script>