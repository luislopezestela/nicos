<?php
global $sqlConnect;
$error = '';
$succuss = '';

if (isset($_FILES['media_file'])) {
    if(!empty($_FILES['media_file']["tmp_name"])){
        $filename = "";
        $fileInfo = array(
            'file' => $_FILES["media_file"]["tmp_name"],
            'name' => $_FILES['media_file']['name'],
            'size' => $_FILES["media_file"]["size"],
            'type' => $_FILES["media_file"]["type"],
            'types' => 'jpg,png,gif,jpeg'
        );
        $media    = lui_ShareFile($fileInfo,0,false);
        if (!empty($media)) {
            $filename = $media['filename'];
        }

        $name = lui_Secure($_POST['sticker_name']);
        $media_file = lui_Secure($filename);

        $query  = mysqli_query($sqlConnect, "INSERT INTO " . T_STICKERS . " (`name`, `media_file`, `time`) VALUES ('".$name."','".$media_file."','".time()."')");
        if ($query) {
            $succuss = '<i class="fa fa-fw fa-check"></i> ' . $wo['lang']['sticker_added'];
        } else {
            $error = '<i class="fa fa-fw fa-exclamation-triangle"></i> ' . $wo['lang']['error_while_add_sticker'];
        }
    }else{
        $error = '<i class="fa fa-fw fa-exclamation-triangle"></i> ' . $wo['lang']['error_while_add_sticker'];
    }
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
                    <a>Administrar caracteristicas</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Chat Stickers</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Agregar Sticker</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Agregar Sticker</h6>
                     <div class="alert alert-info">Puedes cargar tus propias pegatinas, una pegatina por carga.</div>
                      <?php if (!empty($error)) { ?>
				      <div class="alert alert-danger">
				      	<?php echo $error;?>
				      </div>
				      <?php } ?>
				      <?php if (!empty($succuss)) { ?>
				      <div class="alert alert-success">
				      	<?php echo $succuss;?>
				      </div>
				      <?php } ?>
                    <form class="" enctype="multipart/form-data" action="<?php echo lui_LoadAdminLinkSettings('add-new-sticker'); ?>" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Sticker Nombre</label>
                                <input type="text" id="sticker_name" name="sticker_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Sticker File <small>only: .jpg,.jpeg,.png,.gif permitido</small></label>
                                <input type="file" id="media_file" name="media_file" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Agregar Sticker</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->