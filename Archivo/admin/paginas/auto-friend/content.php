<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Herraminetas</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Amigo automatico</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Amigo automatico</h6>
                    <div class="alert alert-info">Cuando un usuario crea una nueva cuenta, elija que usuarios le gustaria que se hicieran amigos/seguidos automaticamente.</div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Nombre(s) de usuario, separados por una coma (,)</label>
                                <input type="text" id="users" name="users" class="form-control" value="<?php echo $wo['config']['auto_friend_users']; ?>">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="alert alert-warning">Este proceso puede llevar algun tiempo, puede verificar los cambios en su sitio despues de unos minutos.</div>
                        <div class="clearfix"></div>
                  <button type="submit" class="btn btn-danger waves-effect waves-light m-t-20" id="users-btn-friend">Guardar</button>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    </div>
<script>
$(document).on('click', '#users-btn-friend', function(event) {
	event.preventDefault();
	$(this).text('Por favor espere..');
	$.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s: 'auto_friend', users: $('#users').val()}, function(data, textStatus, xhr) {
		$('#users-btn-friend').text('Guardado!');
		setTimeout(function () {
			$('#users-btn-friend').text('Guardar');
		}, 4000);
	});
});
</script>