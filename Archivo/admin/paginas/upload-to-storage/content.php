<?php 
$storages = ['amazon', 'digitalocean', 'backblaze', 'wasabi'];
$stroageAjax = ['amazon' => 'test_s3', 'digitalocean'  => 'test_spaces', 'backblaze' => 'test_backblaze', 'wasabi' => 'test_wasabi'];

if(empty($_GET['storage'])) {
    header("Location: " . lui_LoadAdminLinkSettings(''));
    exit();
}
if (!in_array($_GET['storage'], $storages)) {
    header("Location: " . lui_LoadAdminLinkSettings(''));
    exit();
}

$files = filterFiles(getDirContents('upload'), $_GET["storage"]);

if ($_GET['storage'] == 'amazon') {
    if ($wo['config']['amazone_s3'] == "0") {
        $error = "Amazon esta deshabilitado o no configurado, configúrelo primero.";
    }
}

if ($_GET['storage'] == 'wasabi') {
    if ($wo['config']['wasabi_storage'] == "0") {
        $error = "Wasabi esta deshabilitado o no configurado, configúrelo primero.";
    }
}

if ($_GET['storage'] == 'backblaze') {
    if ($wo['config']['backblaze_storage'] == "0") {
        $error = "Backblaze esta deshabilitado o no configurado, configurelo primero.";
    }
}

if ($_GET['storage'] == 'digitalocean') {
    if ($wo['config']['spaces'] == "0") {
        $error = "Digitalocean está deshabilitado o no configurado, configurelo primero.";
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
                    <a>Subir a <?php echo ucfirst($_GET["storage"]); ?></a>
                </li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Subir archivos a <?php echo ucfirst($_GET["storage"]); ?></h6>
                    
                    <?php if (empty($error)) { ?>
                     <div class="alert alert-warning">Esta función se usa para cargar archivos del servidor a la nube solo si tiene videos e imágenes en el servidor y se trasladó al almacenamiento en la nube. <strong>ignore este paso si está utilizando una instalación nueva.</strong></div>
                    <div class="alert alert-danger"><strong>Importante!</strong> No cierres esta pestaña hasta que finalice la carga.</div>
                    <div class="alert alert-info">Total de archivos encontrados: <strong><span id="files-count"><?php echo count($files);?></span> archivos multimedia</strong>.</div>
                    <?php } ?>
                    <?php if (!empty($error)) { ?> <div class="alert alert-danger"><?php echo $error;?></div><?php } ?>
                    <!-- <a href="https://docs.playtubescript.com/api" target="_blank">PlayTube API Docs</a> -->
                    <div class="clearfix"></div>
                    <div class="email-settings-alert"></div>
                    <?php if (empty($error)) { ?>
                    <div class="wo_install_wiz">
                        <ul class="wo_update_changelog"><?php if (count($files) > 0) { ?>Haga clic en Iniciar para cargar archivos del servidor a <?php echo ucfirst($_GET["storage"]); ?><?php } else { ?>No files found to upload<?php }?>.</ul>
                    </div>
                    <div class="clearfix"></div>
                        <?php if (count($files) > 0) { ?>
                        <div class="form-group">
                            <br>
                            <button type="button" class="btn btn-primary m-t-15 waves-effect" id="button-update">Start</button>
                        </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <br>
            <br>
        </div>
        <div class="clearfix"></div>
    </div>
  <style>
          .wo_update_changelog {
          border: 1px solid #eee;
          padding: 10px !important;
         }
         
         .wo_install_wiz {position: relative;background-color: white;box-shadow: 0 1px 15px 2px rgba(0, 0, 0, 0.04);border-radius: 10px;padding: 10px;border-top: 1px solid rgba(0, 0, 0, 0.04);}
         .wo_install_wiz h2 {margin-top: 10px;margin-bottom: 30px;display: flex;align-items: center;}
         .wo_install_wiz h2 span {margin-left: auto;font-size: 15px;}
         .wo_update_changelog {padding:0;list-style-type: none;max-height: 440px;overflow-y: auto; min-height: 440px; border-radius: 10px;}
         .wo_update_changelog li {margin-bottom:7px; max-height: 20px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;}
         .wo_update_changelog li span {padding: 2px 7px;font-size: 12px;margin-right: 4px;border-radius: 2px;}
         .wo_update_changelog li span.added {background-color: #4CAF50;color: white;}
         .wo_update_changelog li span.changed {background-color: #e62117;color: white;}
         .wo_update_changelog li span.improved {background-color: #9C27B0;color: white;}
         .wo_update_changelog li span.compressed {background-color: #795548;color: white;}
         .wo_update_changelog li span.fixed {background-color: #2196F3;color: white;}
  </style>
<script>

var files = [<?php foreach ($files as $key => $fileName) {
        echo '"' . base64_encode($fileName). '",';
    }
    ?>];
var totalFiles = <?php echo count($files);?>;
var count = 0;
function startUpload(file) {
    count = count + 1;
    if (count > totalFiles) {
        $('.wo_update_changelog').append('<li><span class="added">FINISIHED</span> ~$ Upload successfull, more than (<?php echo count($files);?>) file(s) were uploaded to <?php echo ucfirst($_GET["storage"]); ?></li>');
        $('#button-update').hide();
        return false;
    }
    $('.wo_update_changelog').append('<li><span class="fixed">COMMAND</span> ~$ Uploading...</li>');
    $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s: 'uploadFiles', file: "<?php echo $_GET["storage"]; ?>", path: file}, function (data) {
        if (data.status == 200) {
            $('.wo_update_changelog').append('<li><span class="added">SUCCESS</span> ~$ File Uploaded! <a target="_blank" style="color: #fff; text-decoration: underline;" href="'+data.fullPath+'">'+data.fullPath+'</a></li>');
            $('#files-count').text(Number($('#files-count').text()) - 1);
            startUpload(files[count]);
        } else if (data.status == 400) {
            $('.wo_update_changelog').append('<li><span class="changed">FAILED</span> ~$ Error! '+data.message+'.</li>');
            $(this).attr('disabled', false);
            startUpload(files[count]);
        } 
        $(".wo_update_changelog").scrollTop($(".wo_update_changelog")[0].scrollHeight);
    });
}
$(document).on('click', '#button-update', function(event) {
    $(this).attr('disabled', true);
    $('.wo_update_changelog').html('');
    $('.wo_update_changelog').css({
        background: '#1e2321',
        color: '#fff'
    });
    $('.wo_update_changelog').append('<li><span class="fixed">COMMAND</span> ~$ Connecting to <?php echo ucfirst($_GET["storage"]); ?>..</li>');
    $(this).attr('disabled', true);
    $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s: '<?php echo $stroageAjax[$_GET['storage']]?>'}, function (data) {
        if (data.status == 200) {
            $('.wo_update_changelog').append('<li><span class="added">SUCCESS</span> ~$ Connected!</li>');
            setTimeout(function () {
                $('.wo_update_changelog').append('<li><span class="fixed">COMMAND</span> ~$ Counting files..</li>');
                setTimeout(function () {
                    $('.wo_update_changelog').append('<li><span class="added">SUCCESS</span> ~$ <?php echo count($files);?> files found!</li>');
                    startUpload(files[0]);
                }, 1000);
            }, 1000);
        } else if (data.status == 300) {
            $('.wo_update_changelog').append('<li><span class="changed">FAILED</span> ~$ Bucket doesn\'t exists! please check settings.</li>');
            $(this).attr('disabled', false);
        } else if (data.status == 400) {
            $('.wo_update_changelog').append('<li><span class="changed">FAILED</span> ~$ Error! '+data.message+'.</li>');
            $(this).attr('disabled', false);
        } else  {
            $('.wo_update_changelog').append('<li><span class="changed">FAILED</span> ~$ Error found, please check your <?php echo ucfirst($_GET["storage"]); ?> settings.</li>');
            $(this).attr('disabled', false);
        }
    });

    //RunQuery();
});

</script>
