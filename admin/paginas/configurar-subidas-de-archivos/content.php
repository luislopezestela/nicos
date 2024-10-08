<?php
$wo['config']['ffmpeg']  = is_executable($wo['config']['ffmpeg_binary_file']);
function isEnabled($func) {
    return is_callable($func) && false === stripos(ini_get('disable_functions'), $func);
}
$enabled = true;
if (!isEnabled('shell_exec')) {
    $enabled = false;
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
                    <a>Configuraciones</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Configuracion de subida de archivos</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <?php if ($wo['config']['website_mode'] != 'facebook') { ?>
        <div class="alert alert-warning">Nota: Algunas funciones están deshabilitadas debido al modo de sitio web que utilizó.</div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 ">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuración de carga y uso compartido de archivos</h6>
                    <div class="upload-settings-alert"></div>
                    <form class="upload-settings" method="POST">
                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Carga y uso compartido de archivos</span>
                            <br><small class="admin-info">Al habilitar esta función, el usuario puede compartir y cargar archivos en su sitio.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="fileSharing" value="0" />
                            <input type="checkbox" name="fileSharing" id="chck-fileSharing" value="1" <?php echo ($wo['config']['fileSharing'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('fileSharing')) ?>>
                            <label for="chck-fileSharing" class="check-trail <?php echo(EnableForMode('fileSharing',true)) ?>" <?php echo(EnableForMode('fileSharing',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Subir y compartir videos</span>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="video_upload_request" id="video_upload_request-admin" onchange="SelectProModel('can_use_video_upload',this)" value="admin" <?php echo ($wo['config']['video_upload_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="video_upload_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="video_upload_request" id="video_upload_request-all" onchange="SelectProModel('can_use_video_upload',this)" value="all" <?php echo ($wo['config']['video_upload_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="video_upload_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="video_upload_request" id="video_upload_request-verified" onchange="SelectProModel('can_use_video_upload',this)" value="verified" <?php echo ($wo['config']['video_upload_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="video_upload_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="video_upload_request" id="video_upload_request-pro" onchange="SelectProModel('can_use_video_upload',this)" value="pro" <?php echo ($wo['config']['video_upload_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="video_upload_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
                            <br><small class="admin-info">Active la capacidad para que los usuarios compartan y carguen videos. <br>Puede configurar los ajustes del convertidor de vídeo desde los Ajustes de FFMPEG a continuación.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="video_upload" value="0" />
                            <input type="checkbox" name="video_upload" id="chck-video_upload" value="1" <?php echo ($wo['config']['video_upload'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('video_upload')) ?>>
                            <label for="chck-video_upload" class="check-trail <?php echo(EnableForMode('video_upload',true)) ?>" <?php echo(EnableForMode('video_upload',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Subir y compartir audio</span>
							<div class="dropdown user_filter_drop">
								<button class="btn btn-light" data-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 13C6.14 13 4.59 14.28 4.14 16H2V18H4.14C4.59 19.72 6.14 21 8 21S11.41 19.72 11.86 18H22V16H11.86C11.41 14.28 9.86 13 8 13M8 19C6.9 19 6 18.1 6 17C6 15.9 6.9 15 8 15S10 15.9 10 17C10 18.1 9.1 19 8 19M19.86 6C19.41 4.28 17.86 3 16 3S12.59 4.28 12.14 6H2V8H12.14C12.59 9.72 14.14 11 16 11S19.41 9.72 19.86 8H22V6H19.86M16 9C14.9 9 14 8.1 14 7C14 5.9 14.9 5 16 5S18 5.9 18 7C18 8.1 17.1 9 16 9Z"></path></svg>
								</button>
								<ul class="dropdown-menu">
									<div class="dropdown-menu-innr">
										<b>¿Quién puede usar esta función?</b>
										<div>
											<div class="round_check">
												<input type="radio" name="audio_upload_request" id="audio_upload_request-admin" onchange="SelectProModel('can_use_audio_upload',this)" value="admin" <?php echo ($wo['config']['audio_upload_request'] == 'admin')   ? ' checked' : '';?>>
												<label class="radio-inline" for="audio_upload_request-admin" data-toggle="tooltip" data-placement="bottom" title="Admin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M17.13,17C15.92,18.85 14.11,20.24 12,20.92C9.89,20.24 8.08,18.85 6.87,17C6.53,16.5 6.24,16 6,15.47C6,13.82 8.71,12.47 12,12.47C15.29,12.47 18,13.79 18,15.47C17.76,16 17.47,16.5 17.13,17Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="audio_upload_request" id="audio_upload_request-all" onchange="SelectProModel('can_use_audio_upload',this)" value="all" <?php echo ($wo['config']['audio_upload_request'] == 'all')   ? ' checked' : '';?>>
												<label class="radio-inline" for="audio_upload_request-all" data-toggle="tooltip" data-placement="bottom" title="All Users"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="audio_upload_request" id="audio_upload_request-verified" onchange="SelectProModel('can_use_audio_upload',this)" value="verified" <?php echo ($wo['config']['audio_upload_request'] == 'verified')   ? ' checked' : '';?>>
												<label class="radio-inline" for="audio_upload_request-verified" data-toggle="tooltip" data-placement="bottom" title="Verified Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.1,12.5L22.5,13.91L15.97,20.5L12.5,17L13.9,15.59L15.97,17.67L21.1,12.5M10,17L13,20H3V18C3,15.79 6.58,14 11,14L12.89,14.11L10,17M11,4A4,4 0 0,1 15,8A4,4 0 0,1 11,12A4,4 0 0,1 7,8A4,4 0 0,1 11,4Z"></path></svg></label> 
											</div>
											<div class="round_check">
												<input type="radio" name="audio_upload_request" id="audio_upload_request-pro" onchange="SelectProModel('can_use_audio_upload',this)" value="pro" <?php echo ($wo['config']['audio_upload_request'] == 'pro')   ? ' checked' : '';?>>
												<label class="radio-inline" for="audio_upload_request-pro" data-toggle="tooltip" data-placement="bottom" title="Pro Users Only"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12M5,13.28L7.45,14.77L6.8,11.96L9,10.08L6.11,9.83L5,7.19L3.87,9.83L1,10.08L3.18,11.96L2.5,14.77L5,13.28Z"></path></svg></label> 
											</div>
										</div>
									</div>
								</ul>
							</div>
                            <br><small class="admin-info">Active la capacidad para que los usuarios compartan y carguen música y archivos de audio.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="audio_upload" value="0" />
                            <input type="checkbox" name="audio_upload" id="chck-audio_upload" value="1" <?php echo ($wo['config']['audio_upload'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('audio_upload')) ?>>
                            <label for="chck-audio_upload" class="check-trail <?php echo(EnableForMode('audio_upload',true)) ?>" <?php echo(EnableForMode('audio_upload',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Carga y modificaciones de CSS</span>
                            <br><small class="admin-info">Permita que los usuarios carguen su propio archivo CSS para diseñar su perfil.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="css_upload" value="0" />
                            <input type="checkbox" name="css_upload" id="chck-css_upload" value="1" <?php echo ($wo['config']['css_upload'] == 1) ? 'checked': '';?> <?php echo(EnableForMode('css_upload')) ?>>
                            <label for="chck-css_upload" class="check-trail <?php echo(EnableForMode('css_upload',true)) ?>" <?php echo(EnableForMode('css_upload',false,true)) ?>><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 ">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Limites de carga y archivo</h6>
                    <div class="alert alert-warning"><i class="fa fa-fw fa-exclamation-triangle"></i> <strong>Importante:</strong> Asegúrese de no permitir archivos PHP, JS, HTML, XML, XPHP, PHP5, su sitio podria estar en riesgo si lo hace.</div>
                    <form class="upload-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="allowedExtenstion">Extensiones permitidas</label>
                                <input type="text" id="allowedExtenstion" name="allowedExtenstion" class="form-control" value="<?php echo $wo['config']['allowedExtenstion']?>">
                                <small class="admin-info">Solo ese tipo de archivos que el usuario puede cargar en su sitio. (separados con coma,)</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="mime_types">Tipos MIME permitidos</label>
                                <input type="text" id="mime_types" name="mime_types" class="form-control" value="<?php echo $wo['config']['mime_types']?>">
                                <small class="admin-info">Solo los archivos de tipo MIME que el usuario puede cargar en su sitio. (separados con coma,)</small>
                            </div>
                        </div>
                        <label class="form-check-label" for="maxUpload">Tamaño máximo de carga</label>
                        <select class="form-control show-tick" id="maxUpload" name="maxUpload">
                              <option value="2000000"    <?php echo ($wo['config']['maxUpload'] == 2000000)   ? ' selected': '';?>>2 MB</option>
                              <option value="6000000"    <?php echo ($wo['config']['maxUpload'] == 6000000)   ? ' selected': '';?>>6 MB</option>
                              <option value="12000000"   <?php echo ($wo['config']['maxUpload'] == 12000000)  ? ' selected': '';?>>12 MB</option>
                              <option value="24000000"   <?php echo ($wo['config']['maxUpload'] == 24000000)  ? ' selected': '';?>>24 MB</option>
                              <option value="48000000"   <?php echo ($wo['config']['maxUpload'] == 48000000)  ? ' selected': '';?>>48 MB</option>
                              <option value="96000000"   <?php echo ($wo['config']['maxUpload'] == 96000000)  ? ' selected': '';?>>96 MB</option>
                              <option value="256000000"  <?php echo ($wo['config']['maxUpload'] == 256000000) ? ' selected': '';?>>256 MB</option>
                              <option value="512000000"  <?php echo ($wo['config']['maxUpload'] == 512000000) ? ' selected': '';?>>512 MB</option>
                              <option value="1000000000" <?php echo ($wo['config']['maxUpload'] == 1000000000) ? ' selected': '';?>>1 GB</option>
                              <option value="5000000000" <?php echo ($wo['config']['maxUpload'] == 5000000000) ? ' selected': '';?>>5 GB</option>
                              <option value="10000000000" <?php echo ($wo['config']['maxUpload'] == 10000000000) ? ' selected': '';?>>10 GB</option>
                        </select>
                        <small class="admin-info">Establezca el tamaño de carga máximo que un usuario puede usar para cargar archivos, videos, música e imágenes.</small>
                        <div class="clearfix"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <h3>Configuración del convertidor de vídeo FFMPEG <hr></h3>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuración de FFMPEG</h6>

                    <form class="ffmpeg-settings" method="POST">
                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Sistema FFMPEG</span>
                            <br><small class="admin-info">Este sistema comprimira, convertira y optimizara videos a mp4. <br>Este sistema requiere que "ffmpeg" este instalado en su servidor.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="ffmpeg_system" value="0" />
                            <input type="checkbox" name="ffmpeg_system" id="chck-ffmpeg_system" value="1" <?php echo ($wo['config']['ffmpeg_system'] == 'on') ? 'checked': '';?>>
                            <label for="chck-ffmpeg_system" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <?php if ($enabled == false): ?>
                            <div class="alert alert-danger">
                                shell_exec() ha sido deshabilitado por razones de seguridad, comuníquese con su proveedor de host para habilitarlo. Se requiere shell_exec para habilitar este sistema.
                            </div>
                        <?php endif; ?>
                        <hr>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <?php if (!$wo['config']['ffmpeg']): ?>
                                <div class="alert alert-danger">El binario FFmpeg no existe en la ruta: <?php echo $wo['config']['ffmpeg_binary_file'] ?></div>
                                <?php else: ?>
                                <label class="form-label" for="ffmpeg_binary_file">Ruta del archivo binario FFMPEG</label>
                                <?php endif; ?>
                                <input type="text" id="ffmpeg_binary_file" name="ffmpeg_binary_file" class="form-control" value="<?php echo $wo['config']['ffmpeg_binary_file'] ?>">
                                <small class="admin-info">Ejemplo: Linux(/usr/bin/ffmpeg) or Windows(C:\\ffmpeg\bin\ffmpeg.exe)</small>
                            </div>
                        </div>

                        <?php if ($wo['config']['ffmpeg'] && $enabled == true): ?>
                            <hr>
                        <label for="convert_speed" class="">Convertir velocidad de video</label>
                        <select class="form-control show-tick" id="convert_speed" name="convert_speed">
                            <option value="ultrafast" <?php echo ($wo['config']['convert_speed'] == 'ultrafast') ? 'selected': '';?>>Ultrarrapido</option>
                            <option value="superfast" <?php echo ($wo['config']['convert_speed'] == 'superfast') ? 'selected': '';?>>Super rapido</option>
                            <option value="veryfast" <?php echo ($wo['config']['convert_speed'] == 'veryfast') ? 'selected': '';?>>Muy rapido</option>
                            <option value="faster" <?php echo ($wo['config']['convert_speed'] == 'faster') ? 'selected': '';?>>Mas rapido</option>
                            <option value="fast" <?php echo ($wo['config']['convert_speed'] == 'fast') ? 'selected': '';?>>Rapido</option>
                            <option value="medium" <?php echo ($wo['config']['convert_speed'] == 'medium') ? 'selected': '';?>>Medio</option>
                            <option value="slow" <?php echo ($wo['config']['convert_speed'] == 'slow') ? 'selected': '';?>>Lento</option>
                            <option value="slower" <?php echo ($wo['config']['convert_speed'] == 'slower') ? 'selected': '';?>>Mas lento</option>
                            <option value="veryslow" <?php echo ($wo['config']['convert_speed'] == 'veryslow') ? 'selected': '';?>>Muy lento</option>
                        </select>
                        <small class="admin-info">Esto afecta la velocidad de codificación. El uso de un ajuste preestablecido más lento le brinda una mejor compresión o calidad por tamaño de archivo, mientras que los ajustes preestablecidos más rápidos le brindan una compresión peor y un tamaño de archivo más alto.</small><?php endif; ?>

                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="allowedffmpegExtenstion">Extensiones permitidas</label>
                                <input type="text" id="allowedffmpegExtenstion" name="allowedffmpegExtenstion" class="form-control" value="<?php echo $wo['config']['allowedffmpegExtenstion']?>">
                                <small class="admin-info">Solo ese tipo de videos que el usuario puede cargar en su sitio. (separados con coma,)</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="ffmpeg_mime_types">Tipos MIME permitidos</label>
                                <input type="text" id="ffmpeg_mime_types" name="ffmpeg_mime_types" class="form-control" value="<?php echo $wo['config']['ffmpeg_mime_types']?>">
                                <small class="admin-info">Solo los videos de tipo MIME que el usuario puede cargar en su sitio. (separados con coma,)</small>
                            </div>
                        </div>
                        <hr>
                       <div class="alert alert-warning">
                         Asegúrese de depurar FFMPEG a continuación después de configurar ffmpeg.
                      </div>
                        <div class="ffmpeg-settings-alert"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
             <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Depurar FFMPEG</h6>
                    <div class="alert alert-info">Esta función probará la configuración de FFMPEG y se asegurará de que el sistema funcione correctamente.</div>
                    <form class="debug-settings" method="POST">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="debug_ffmpeg">Registro de depuración</label>
                                <textarea name="debug_ffmpeg" id="debug_ffmpeg" class="form-control" cols="30" rows="5" style="height: 700px !important;" disabled>Haga clic en Depurar FFMPEG para mostrar los resultados de la prueba.</textarea>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <div class="debug-settings-alert"></div>
                        <button type="submit" class="btn btn-success m-t-15 waves-effect">Depurar FFMPEG</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <h3>Almacenamiento y configuración de CDN <br><hr></h3>
             <div class="alert alert-warning">
                <i class="fa fa-fw fa-exclamation-triangle"></i> <strong>Importante:</strong> No puede habilitar dos o tres almacenamientos al mismo tiempo, si habilita FTP, amazon s3 se deshabilitará automáticamente, lo mismo para amazon s3, Digitalocean y Google.
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuración de Amazon S3</h6>
                    <form class="general-settings" method="POST">
                        <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Almacenamiento de Amazon S3</span>
                            <br><small class="admin-info">Habilite Amazon Storage para almacenar sus archivos en Amazon S3.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="amazone_s3" value="0" />
                            <input type="checkbox" name="amazone_s3" id="chck-amazone_s3" value="1" <?php echo ($wo['config']['amazone_s3'] == 1) ? 'checked': '';?>>
                            <label for="chck-amazone_s3" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="bucket_name">Nombre del cubo de Amazon</label>
                                <input type="text" id="bucket_name" name="bucket_name" class="form-control" value="<?php echo $wo['config']['bucket_name']?>">
                                <small class="admin-info">Tu Amazon S3 <a href="https://docs.aws.amazon.com/AmazonS3/latest/userguide/creating-bucket.html" target="_blank">Nombre del segmento</a></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="amazone_s3_key">Clave de Amazon S3</label>
                                <input type="text" id="amazone_s3_key" name="amazone_s3_key" class="form-control" value="<?php echo $wo['config']['amazone_s3_key']?>">
                                <small class="admin-info">Tu clave de Amazon de <a href="https://docs.aws.amazon.com/general/latest/gr/aws-sec-cred-types.html" target="_blank">Credenciales de AWS</a></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="amazone_s3_s_key">Clave secreta de Amazon S3</label>
                                <input type="text" id="amazone_s3_s_key" name="amazone_s3_s_key" class="form-control" value="<?php echo $wo['config']['amazone_s3_s_key']?>">
                                <small class="admin-info">Tu secreto de Amazon de <a href="https://docs.aws.amazon.com/general/latest/gr/aws-sec-cred-types.html" target="_blank">Credenciales de AWS </a></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="amazon_endpoint">Punto de enlace personalizado de Amazon S3 (opcional)</label>
                                <input type="text" name="amazon_endpoint" id="amazon_endpoint" class="form-control" value="<?php echo ($wo['config']['amazon_endpoint']);?>">
                                <small class="admin-info">Su nombre de dominio personalizado de Amazon, por ejemplo: https://customCDNdomain.com</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <label for="region">Región del deposito de Amazon S3</label>
                        <select class="form-control show-tick" id="region" name="region" autocomplete="off">
                          <option value="us-east-2" <?php echo ($wo['config']['region'] == 'us-east-2')   ? ' selected' : '';?> >US East (Ohio) us-east-2</option>
                          <option value="us-east-1" <?php echo ($wo['config']['region'] == 'us-east-1')   ? ' selected' : '';?> >US East (N. Virginia) us-east-1</option>
                          <option value="us-west-1" <?php echo ($wo['config']['region'] == 'us-west-1')   ? ' selected' : '';?> >US West (N. California) us-west-1</option>
                          <option value="us-west-2" <?php echo ($wo['config']['region'] == 'us-west-2')   ? ' selected' : '';?> >US West (Oregon) us-west-2</option>
                          <option value="af-south-1" <?php echo ($wo['config']['region'] == 'af-south-1')   ? ' selected' : '';?> >Africa (Cape Town) af-south-1</option>
                          <option value="ap-east-1" <?php echo ($wo['config']['region'] == 'ap-east-1')   ? ' selected' : '';?> >Asia Pacific (Hong Kong) ap-east-1</option>
                          <option value="ap-south-1" <?php echo ($wo['config']['region'] == 'ap-south-1')   ? ' selected' : '';?> >Asia Pacific (Mumbai) ap-south-1</option>
                          <option value="ap-northeast-3" <?php echo ($wo['config']['region'] == 'ap-northeast-3')   ? ' selected' : '';?> >Asia Pacific (Osaka) ap-northeast-3</option>
                          <option value="ap-northeast-2" <?php echo ($wo['config']['region'] == 'ap-northeast-2')   ? ' selected' : '';?> >Asia Pacific (Seoul) ap-northeast-2</option>
                          <option value="ap-southeast-1" <?php echo ($wo['config']['region'] == 'ap-southeast-1')   ? ' selected' : '';?> >Asia Pacific (Singapore) ap-southeast-1</option>
                          <option value="ap-southeast-2" <?php echo ($wo['config']['region'] == 'ap-southeast-2')   ? ' selected' : '';?> >Asia Pacific (Sydney) ap-southeast-2</option>
                          <option value="ap-northeast-1" <?php echo ($wo['config']['region'] == 'ap-northeast-1')   ? ' selected' : '';?> >Asia Pacific (Tokyo) ap-northeast-1</option>
                          <option value="ca-central-1" <?php echo ($wo['config']['region'] == 'ca-central-1')   ? ' selected' : '';?> >Canada (Central) ca-central-1</option>
                          <option value="cn-northwest-1" <?php echo ($wo['config']['region'] == 'cn-northwest-1')   ? ' selected' : '';?> >China (Ningxia) cn-northwest-1</option>
                          <option value="eu-central-1" <?php echo ($wo['config']['region'] == 'eu-central-1')   ? ' selected' : '';?> >Europe (Frankfurt) eu-central-1</option>
                          <option value="eu-west-1" <?php echo ($wo['config']['region'] == 'eu-west-1')   ? ' selected' : '';?> >Europe (Ireland) eu-west-1</option>
                          <option value="eu-west-2" <?php echo ($wo['config']['region'] == 'eu-west-2')   ? ' selected' : '';?> >Europe (London) eu-west-2</option>
                          <option value="eu-south-1" <?php echo ($wo['config']['region'] == 'eu-south-1')   ? ' selected' : '';?> >Europe (Milan) eu-south-1</option>
                          <option value="eu-west-3" <?php echo ($wo['config']['region'] == 'eu-west-3')   ? ' selected' : '';?> >Europe (Paris) eu-west-3</option>
                          <option value="eu-north-1" <?php echo ($wo['config']['region'] == 'eu-north-1')   ? ' selected' : '';?> >Europe (Stockholm) eu-north-1</option>
                          <option value="ap-southeast-3" <?php echo ($wo['config']['region'] == 'ap-southeast-3')   ? ' selected' : '';?> >Asia Pacific (Jakarta) ap-southeast-3</option>
                          <option value="me-south-1" <?php echo ($wo['config']['region'] == 'me-south-1')   ? ' selected' : '';?> >Middle East(Bahrain) me-south-1</option>
                          <option value="sa-east-1" <?php echo ($wo['config']['region'] == 'sa-east-1')   ? ' selected' : '';?> >South America (São Paulo) sa-east-1</option>
                          <option value="us-gov-east-1" <?php echo ($wo['config']['region'] == 'us-gov-east-1')   ? ' selected' : '';?> >AWS GovCloud (US-East) us-gov-east-1</option>
                          <option value="us-gov-west-1" <?php echo ($wo['config']['region'] == 'us-gov-west-1')   ? ' selected' : '';?> >AWS GovCloud (US-West) us-gov-west-1</option>
                        </select>
                        <small class="admin-info">La región S3 de su Amazon</small>
                        <div class="clearfix"></div>
                        <br>
                        <div class="alert alert-info">
                          Antes de habilitar Amazon S3, asegúrese de cargar toda la carpeta "upload/" en su depósito. <br><br>
                            Antes de deshabilitar Amazon S3, asegúrese de descargar toda la carpeta "upload/" en su servidor.<br><br>
                            Recomendamos cargar la carpeta y los archivos a través de <a href="http://s3tools.org/s3cmd">S3cmd</a>.<br><br>
                            Si su sitio aún es nuevo, puede evitar el paso de carga, pero asegúrese de hacer clic en "Probar conexión".<br>
                        </div>
                        <div class="general-settings-alert"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestS3()">Probar y verificar la conexión</button>
                        <a href="<?php echo lui_LoadAdminLinkSettings('upload-to-storage?storage=amazon'); ?>" class="btn btn-info m-t-15 waves-effect">Subir archivos a Amazon</a>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuración de Espacios Digitalocean</h6>
                    <form class="spaces-settings" method="POST">
                         <div class="float-left">
                           <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Almacenamiento de Espacios Digitalocean</span>
                            <br><small class="admin-info">Habilite Digitalocean Storage para almacenar sus archivos en Digitalocean Spaces.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="spaces" value="0" />
                            <input type="checkbox" name="spaces" id="chck-spaces" value="1" <?php echo ($wo['config']['spaces'] == 1) ? 'checked': '';?>>
                            <label for="chck-spaces" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="space_name">Nombre del espacio del océano digital</label>
                                <input type="text" id="space_name" name="space_name" class="form-control" value="<?php echo $wo['config']['space_name']?>">
                                <small class="admin-info">Su nombre de Digitalocean Space Bucket.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="spaces_key">Clave de Digitalocean</label>
                                <input type="text" id="spaces_key" name="spaces_key" class="form-control" value="<?php echo $wo['config']['spaces_key']?>">
                                <small class="admin-info">Tu clave de credenciales del Espacio Digitalocean.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="spaces_secret">Digitalocean Secret</label>
                                <input type="text" id="spaces_secret" name="spaces_secret" class="form-control" value="<?php echo $wo['config']['spaces_secret']?>">
                                <small class="admin-info">Tu clave secreta de credenciales de Digitalocean Space.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="spaces_endpoint">Digitalocean Punto final personalizado (opcional)</label>
                                <input type="text" name="spaces_endpoint" id="spaces_endpoint" class="form-control" value="<?php echo ($wo['config']['spaces_endpoint']);?>">
                                <small class="admin-info">Su nombre de dominio personalizado de Digitalocean, por ejemplo: https://customCDNdomain.com</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <label for="space_region">Region del cubo de Digitalocean</label>
                        <select class="form-control show-tick" id="space_region" name="space_region">
                          <option value="nyc1" <?php echo ($wo['config']['space_region'] == 'nyc1')   ? ' selected' : '';?> >New York [NYC1]</option>
                          <option value="nyc2" <?php echo ($wo['config']['space_region'] == 'nyc2')   ? ' selected' : '';?> >New York [NYC2]</option>
                          <option value="nyc3" <?php echo ($wo['config']['space_region'] == 'nyc3')   ? ' selected' : '';?> >New York [NYC3]</option>

                          <option value="sfo1" <?php echo ($wo['config']['space_region'] == 'sfo1')   ? ' selected' : '';?> >SAN FRANCISCO [SFO1]</option>
                          <option value="sfo2" <?php echo ($wo['config']['space_region'] == 'sfo2')   ? ' selected' : '';?> >SAN FRANCISCO [SFO2]</option>

                          <option value="tor1" <?php echo ($wo['config']['space_region'] == 'tor1')   ? ' selected' : '';?> >TORONTO [TOR1]</option>

                          <option value="lon1" <?php echo ($wo['config']['space_region'] == 'lon1')   ? ' selected' : '';?> >LONDON [LON1]</option>

                          <option value="FRA1" <?php echo ($wo['config']['space_region'] == 'FRA1')   ? ' selected' : '';?> >Frankfurt [FRA1]</option>


                          <option value="ams2" <?php echo ($wo['config']['space_region'] == 'ams2')   ? ' selected' : '';?> >Amsterdam [AMS2]</option>
                          <option value="ams3" <?php echo ($wo['config']['space_region'] == 'ams3')   ? ' selected' : '';?> >Amsterdam [AMS3]</option>
                          <option value="sgp1" <?php echo ($wo['config']['space_region'] == 'sgp1')   ? ' selected' : '';?> >Singapore [SGP1]</option>
                          <option value="blr1" <?php echo ($wo['config']['space_region'] == 'blr1')   ? ' selected' : '';?> >Bangalore [BLR1]</option>
                          
                        </select>
                        <div class="clearfix"></div>
                        <br>
                        <div class="alert alert-info">
                            Antes de habilitar Digitalocean, asegúrese de cargar toda la carpeta "upload/" en su depósito. <br><br>
                            Antes de deshabilitar Digitalocean, asegúrese de descargar toda la carpeta "upload/" en su servidor. <br><br>
                            Si su sitio aún es nuevo, puede evitar el paso de carga, pero asegúrese de hacer clic en "Probar conexión". <br>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <div class="spaces-settings-alert"></div>
                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestSpaces()">Probar y verificar la conexión</button>
                        <a href="<?php echo lui_LoadAdminLinkSettings('upload-to-storage?storage=digitalocean'); ?>" class="btn btn-info m-t-15 waves-effect">Subir archivos a Digitalocean</a>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion Wasabi</h6>
                    <form class="wasabi_storage-settings" method="POST">
                         <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Almacenamiento de wasabi</span>
                            <br><small class="admin-info">Habilite Wasabi Storage para almacenar sus archivos en Wasabi Spaces.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="wasabi_storage" value="0" />
                            <input type="checkbox" name="wasabi_storage" id="chck-wasabi_storage" value="1" <?php echo ($wo['config']['wasabi_storage'] == 1) ? 'checked': '';?>>
                            <label for="chck-wasabi_storage" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="wasabi_bucket_name">Wasabi Bucket Nombre</label>
                                <input type="text" id="wasabi_bucket_name" name="wasabi_bucket_name" class="form-control" value="<?php echo $wo['config']['wasabi_bucket_name']?>">
                                <small class="admin-info">Tu nombre de Wasabi Bucket.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="wasabi_access_key">Wasabi Access Key</label>
                                <input type="text" id="wasabi_access_key" name="wasabi_access_key" class="form-control" value="<?php echo $wo['config']['wasabi_access_key']?>">
                                <small class="admin-info">Tu Wasabi Access Key.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="wasabi_secret_key">Wasabi Secret Key</label>
                                <input type="text" id="wasabi_secret_key" name="wasabi_secret_key" class="form-control" value="<?php echo $wo['config']['wasabi_secret_key']?>">
                                <small class="admin-info">Tu Wasabi Secret Key.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="wasabi_endpoint">Punto final personalizado de Wasabi (opcional)</label>
                                <input type="text" name="wasabi_endpoint" id="wasabi_endpoint" class="form-control" value="<?php echo ($wo['config']['wasabi_endpoint']);?>">
                                <small class="admin-info">Su nombre de dominio personalizado Wasabi, por ejemplo: https://customCDNdomain.com</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <label for="wasabi_bucket_region">Region de Wasabi bucket </label>
                        <select class="form-control show-tick" id="wasabi_bucket_region" name="wasabi_bucket_region">
                          <option value="us-west-1" <?php echo ($wo['config']['wasabi_bucket_region'] == 'us-west-1')   ? ' selected' : '';?> >us-west-1</option>
                          <option value="us-east-1" <?php echo ($wo['config']['wasabi_bucket_region'] == 'us-east-1')   ? ' selected' : '';?> >us-east-1</option>
                          <option value="us-east-2" <?php echo ($wo['config']['wasabi_bucket_region'] == 'us-east-2')   ? ' selected' : '';?> >us-east-2</option>
                          <option value="us-central-1" <?php echo ($wo['config']['wasabi_bucket_region'] == 'us-central-1')   ? ' selected' : '';?> >us-central-1</option>
                          <option value="ca-central-1" <?php echo ($wo['config']['wasabi_bucket_region'] == 'ca-central-1')   ? ' selected' : '';?> >ca-central-1</option>

                          <option value="eu-west-1" <?php echo ($wo['config']['wasabi_bucket_region'] == 'eu-west-1')   ? ' selected' : '';?> >eu-west-1</option>
                          <option value="eu-west-2" <?php echo ($wo['config']['wasabi_bucket_region'] == 'eu-west-2')   ? ' selected' : '';?> >eu-west-2</option>
                          <option value="eu-central-1" <?php echo ($wo['config']['wasabi_bucket_region'] == 'eu-central-1')   ? ' selected' : '';?> >eu-central-1</option>
                          <option value="eu-central-2" <?php echo ($wo['config']['wasabi_bucket_region'] == 'eu-central-2')   ? ' selected' : '';?> >eu-central-2</option>

                          <option value="ap-northeast-1" <?php echo ($wo['config']['wasabi_bucket_region'] == 'ap-northeast-1')   ? ' selected' : '';?> >ap-northeast-1</option>
                          <option value="ap-northeast-2" <?php echo ($wo['config']['wasabi_bucket_region'] == 'ap-northeast-2')   ? ' selected' : '';?> >ap-northeast-2</option>
                          <option value="ap-southeast-2" <?php echo ($wo['config']['wasabi_bucket_region'] == 'ap-southeast-2')   ? ' selected' : '';?> >ap-southeast-2</option>
                          <option value="ap-southeast-1" <?php echo ($wo['config']['wasabi_bucket_region'] == 'ap-southeast-1')   ? ' selected' : '';?> >ap-southeast-1</option>
                        </select>
                        <div class="clearfix"></div>
                        <br>
                        <div class="alert alert-info">
                           Antes de habilitar Wasabi, asegúrese de cargar toda la carpeta "upload/" en su depósito. <br><br>
                            Antes de deshabilitar Wasabi, asegúrese de descargar toda la carpeta "upload/" en su servidor. <br><br>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <div class="wasabi_storage_alert"></div>
                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestWasabi()">Probar y verificar la conexión</button>
                        <a href="<?php echo lui_LoadAdminLinkSettings('upload-to-storage?storage=wasabi'); ?>" class="btn btn-info m-t-15 waves-effect">Subir archivos a Wasabi</a>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion FTP</h6>
                    <small>Puede cargar archivos directamente desde su servidor a otro servidor FTP y cargarlos desde allí.</small><br>
                    <small>Importante: Esto puede ralentizar la velocidad de carga/eliminación de su sitio, asegúrese de utilizar un servidor FTP rápido.</small><br><br>
                    <form class="ftp-settings" method="POST">
                         <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Almacenamiento FTP</span>
                            <br><small class="admin-info">Habilite el almacenamiento FTP para almacenar sus archivos en su propio servidor FTP.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="ftp_upload" value="0" />
                            <input type="checkbox" name="ftp_upload" id="chck-ftp_upload" value="1" <?php echo ($wo['config']['ftp_upload'] == 1) ? 'checked': '';?>>
                            <label for="chck-ftp_upload" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="ftp_host">Nombre de host FTP</label>
                                <input type="text" id="ftp_host" name="ftp_host" class="form-control" value="<?php echo $wo['config']['ftp_host']?>">
                                <small class="admin-info">Su nombre de host FTP, podría ser IP o nombre de dominio.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="ftp_username">Nombre de usuario FTP</label>
                                <input type="text" id="ftp_username" name="ftp_username" class="form-control" value="<?php echo $wo['config']['ftp_username']?>">
                                <small class="admin-info">El nombre de usuario de su cuenta FTP.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="ftp_password">Contraseña FTP</label>
                                <input type="text" id="ftp_password" name="ftp_password" class="form-control" value="<?php echo $wo['config']['ftp_password']?>">
                                <small class="admin-info">La contraseña de su cuenta FTP.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="ftp_port">Puerto FTP</label>
                                <input type="text" id="ftp_port" name="ftp_port" class="form-control" value="<?php echo $wo['config']['ftp_port']?>">
                                <small class="admin-info">El puerto de su servidor FTP.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="ftp_path">Ruta FTP</label>
                                <input type="text" id="ftp_path" name="ftp_path" class="form-control" value="<?php echo $wo['config']['ftp_path']?>">
                                <small class="admin-info">La ruta a /subir archivos.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="ftp_endpoint">Extremo FTP</label>
                                <input type="text" id="ftp_endpoint" name="ftp_endpoint" class="form-control" value="<?php echo $wo['config']['ftp_endpoint']?>">
                                <small class="admin-info">IP o dominio donde apunta el servidor FTP, ejemplo: layshaneftpstorage.com</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="alert alert-info">
                          Antes de habilitar FTP, asegúrese de cargar toda la carpeta "upload/" en su servidor FTP.<br><br>
                        Antes de deshabilitar FTP, asegúrese de descargar toda la carpeta "upload/" en su servidor.<br><br>
                        Si su sitio aún es nuevo, puede omitir el paso de carga, pero asegúrese de hacer clic en "Probar conexión".<br>
                        </div>
                        <div class="ftp-settings-alert"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">

                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestFTP()">Prueba de conexión FTP</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de la nube de Google</h6>

                    <form class="drive-settings" method="POST">
                         <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Almacenamiento en la nube de Google</span>
                            <br><small class="admin-info">Habilite Google Cloud Storage para almacenar sus archivos en Google Cloud.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="cloud_upload" value="0" />
                            <input type="checkbox" name="cloud_upload" id="chck-cloud_upload" value="1" <?php echo ($wo['config']['cloud_upload'] == 1) ? 'checked': '';?>>
                            <label for="chck-cloud_upload" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="cloud_bucket_name">Nombre del depósito de Google Cloud</label>
                                <input type="text" id="cloud_bucket_name" name="cloud_bucket_name" class="form-control" value="<?php echo $wo['config']['cloud_bucket_name']?>">
                                <small class="admin-info">La contraseña de su cuenta FTP.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line focused">
                                <label class="form-label" for="cloud_file">Archivo de la nube de Google</label>
                                <input type="file" id="cloud_file" name="cloud_file" class="form-control">
                                <small class="admin-info">Debería ser un archivo JSON.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="cloud_file_path">Ruta del archivo de Google Cloud</label>
                                <input type="text" id="cloud_file_path" class="form-control" value="<?php echo $wo['config']['cloud_file_path']?>" readonly>
                                <small class="admin-info">Ruta a su archivo de Google Cloud en su servidor.</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="cloud_endpoint">Punto final personalizado de Google Cloud (opcional)</label>
                                <input type="text" name="cloud_endpoint" id="cloud_endpoint" class="form-control" value="<?php echo ($wo['config']['cloud_endpoint']);?>">
                                <small class="admin-info">Su nombre de dominio personalizado de Google Cloud, por ejemplo: https://customCDNdomain.com</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="alert alert-info">
                           Asegúrate de subir toda la carpeta "upload/" a tu depósito.<br><br>
                            Asegúrese de mantener (Google Cloud File) en su servidor. en la ruta del archivo de Google Cloud (<?php echo $wo['config']['cloud_file_path']?>)<br>
                        </div>
                        <div class="drive-settings-alert"></div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestCloud()">Prueba de conexión a la nube</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuración de Backblaze</h6>
                    <form class="backblaze_storage-settings" method="POST">
                         <div class="float-left">
                            <span class="main-label" style="font-weight:500!important;display:inline-block;margin-bottom:.2rem;">Almacenamiento Backblaze</span>
                            <br><small class="admin-info">Habilite Backblaze Storage para almacenar sus archivos en Backblaze Spaces.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="backblaze_storage" value="0" />
                            <input type="checkbox" name="backblaze_storage" id="chck-backblaze_storage" value="1" <?php echo ($wo['config']['backblaze_storage'] == '1') ? 'checked': '';?>>
                            <label for="chck-backblaze_storage" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="backblaze_bucket_id">Identificación del depósito Backblaze</label>
                                <input type="text" id="backblaze_bucket_id" name="backblaze_bucket_id" class="form-control" value="<?php echo $wo['config']['backblaze_bucket_id']?>">
                                <small class="admin-info">Su identificación de Backblaze Bucket.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="backblaze_bucket_name">Nombre del depósito Backblaze</label>
                                <input type="text" id="backblaze_bucket_name" name="backblaze_bucket_name" class="form-control" value="<?php echo $wo['config']['backblaze_bucket_name']?>">
                                <small class="admin-info">Su nombre de cubo Backblaze.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="backblaze_bucket_region">Región del cubo Backblaze</label>
                                <input type="text" id="backblaze_bucket_region" name="backblaze_bucket_region" class="form-control" value="<?php echo $wo['config']['backblaze_bucket_region']?>">
                                <small class="admin-info">Tu región de Backblaze Bucket.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="backblaze_access_key_id">Backblaze Access Key ID</label>
                                <input type="text" id="backblaze_access_key_id" name="backblaze_access_key_id" class="form-control" value="<?php echo $wo['config']['backblaze_access_key_id'] ?>">
                                <small class="admin-info">Tu Backblaze Access Key ID.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="backblaze_access_key">Backblaze Access Key</label>
                                <input type="text" id="backblaze_access_key" name="backblaze_access_key" class="form-control" value="<?php echo $wo['config']['backblaze_access_key'] ?>">
                                <small class="admin-info">Tu Backblaze Access Key.</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label" for="backblaze_endpoint">Punto final personalizado de Backblaze (opcional)</label>
                                <input type="text" name="backblaze_endpoint" id="backblaze_endpoint" class="form-control" value="<?php echo ($wo['config']['backblaze_endpoint']);?>">
                                <small class="admin-info">Su nombre de dominio personalizado Backblaze, por ejemplo: https://customCDNdomain.com</small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="alert alert-info">
                            Antes de habilitar Backblaze, asegúrese de cargar toda la carpeta "upload/" en su depósito. <br><br>
                            Antes de deshabilitar Backblaze, asegúrese de descargar toda la carpeta "upload/" en su servidor. <br><br>
                        </div>
                        <div class="backblaze_storage_alert"></div>
                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="Wo_TestBackblaze()">Probar y verificar la conexión</button>
                        <a href="<?php echo lui_LoadAdminLinkSettings('upload-to-storage?storage=backblaze'); ?>" class="btn btn-info m-t-15 waves-effect">Subir archivos a BackBlaze</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<script>
function Wo_TestBackblaze() {
    $('form.backblaze_storage-settings').find('.btn-success').text('Please wait..');
    $('.backblaze_storage_alert').empty();
    $.get(Wo_Ajax_Requests_File() + '?f=admin_setting&s=test_backblaze', function (data) {
        if (data.status == 200) {
            $('.backblaze_storage_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Connection established!</div>');
            setTimeout(function () {
                $('.backblaze_storage_alert').empty();
            }, 5000);
        } else if (data.status == 300) {
            $('.backblaze_storage_alert').html('<div class="alert alert-danger">Bucket doesn\'t exists</div>');
            // setTimeout(function () {
            //     $('.backblaze_storage_alert').empty();
            // }, 5000);
        } else if (data.status == 500) {
            $('.backblaze_storage_alert').html('<div class="alert alert-danger">Your s3 account doesn\'t have any buckets, please create one.</div>');
            // setTimeout(function () {
            //     $('.backblaze_storage_alert').empty();
            // }, 5000);
        } else if (data.status == 400) {
            $('.backblaze_storage_alert').html('<div class="alert alert-danger">'+data.message+'</div>');
            // setTimeout(function () {
            //     $('.backblaze_storage_alert').empty();
            // }, 5000);
        } else  {
            $('.backblaze_storage_alert').html('<div class="alert alert-danger">Error while connecting to Backblaze, please check your details</div>');
            // setTimeout(function () {
            //     $('.backblaze_storage_alert').empty();
            // }, 5000);
        }
        $('form.backblaze_storage-settings').find('.btn-success').text('Test & Verify Connection');
    });
}
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

function Wo_TestWasabi() {
    $('form.wasabi_storage-settings').find('.btn-success').text('Please wait..');
    $('.wasabi_storage_alert').empty();
    $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s: 'test_wasabi'}, function (data) {
        if (data.status == 200) {
            $('.wasabi_storage_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Connection established!</div>');
            setTimeout(function () {
                $('.wasabi_storage_alert').empty();
            }, 5000);
        } else if (data.status == 300) {
            $('.wasabi_storage_alert').html('<div class="alert alert-danger">Bucket doesn\'t exists</div>');
            // setTimeout(function () {
            //     $('.wasabi_storage_alert').empty();
            // }, 5000);
        } else if (data.status == 500) {
            $('.wasabi_storage_alert').html('<div class="alert alert-danger">Your s3 account doesn\'t have any buckets, please create one.</div>');
            // setTimeout(function () {
            //     $('.wasabi_storage_alert').empty();
            // }, 5000);
        } else if (data.status == 400) {
            $('.wasabi_storage_alert').html('<div class="alert alert-danger">'+data.message+'</div>');
            // setTimeout(function () {
            //     $('.wasabi_storage_alert').empty();
            // }, 5000);
        } else  {
            $('.wasabi_storage_alert').html('<div class="alert alert-danger">Error while connecting to amazone, please check your details</div>');
            // setTimeout(function () {
            //     $('.wasabi_storage_alert').empty();
            // }, 5000);
        }
        $('form.wasabi_storage-settings').find('.btn-success').text('Test & Verify Connection');
    });
}
function Wo_TestCloud() {
    $('form.drive-settings').find('.btn-success').text('Please wait..');
    $('.drive-settings-alert').empty();
    $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s: 'test_cloud'}, function (data) {
        if (data.status == 200) {
            $('.drive-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Connection established!</div>');
            setTimeout(function () {
                $('.drive-settings-alert').empty();
            }, 5000);
        } else {
            $('.drive-settings-alert').html('<div class="alert alert-danger">'+data.message+'</div>');
            // setTimeout(function () {
            //     $('.drive-settings-alert').empty();
            // }, 2000);
        }
        $('form.drive-settings').find('.btn-success').text('Test Cloud Connection');
    });
}
function Wo_TestS3() {
	$('form.general-settings').find('.btn-success').text('Please wait..');
    $('.general-settings-alert').empty();
	$.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s: 'test_s3'}, function (data) {
		if (data.status == 200) {
            $('.general-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Connection established!</div>');
            setTimeout(function () {
                $('.general-settings-alert').empty();
            }, 5000);
		} else if (data.status == 300) {
            $('.general-settings-alert').html('<div class="alert alert-danger">Bucket doesn\'t exists</div>');
            // setTimeout(function () {
            //     $('.general-settings-alert').empty();
            // }, 5000);
		} else if (data.status == 500) {
            $('.general-settings-alert').html('<div class="alert alert-danger">Your s3 account doesn\'t have any buckets, please create one.</div>');
            // setTimeout(function () {
            //     $('.general-settings-alert').empty();
            // }, 5000);
		} else if (data.status == 400) {
			$('.general-settings-alert').html('<div class="alert alert-danger">'+data.message+'</div>');
            // setTimeout(function () {
            //     $('.general-settings-alert').empty();
            // }, 5000);
		} else  {
            $('.general-settings-alert').html('<div class="alert alert-danger">Error while connecting to amazone, please check your details</div>');
            // setTimeout(function () {
            //     $('.general-settings-alert').empty();
            // }, 5000);
		}
		$('form.general-settings').find('.btn-success').text('Test & Verify Connection');
	});
}

function Wo_TestSpaces() {
    $('form.spaces-settings').find('.btn-success').text('Please wait..');
    $('.spaces-settings-alert').empty();
    $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s: 'test_spaces'}, function (data) {
        if (data.status == 200) {
            $('.spaces-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Connection established!</div>');
            setTimeout(function () {
                $('.spaces-settings-alert').empty();
            }, 5000);
        } else if (data.status == 300) {
            $('.spaces-settings-alert').html('<div class="alert alert-danger">Bucket doesn\'t exists</div>');
            // setTimeout(function () {
            //     $('.spaces-settings-alert').empty();
            // }, 2000);
        } else if (data.status == 500) {
            $('.spaces-settings-alert').html('<div class="alert alert-danger">Your s3 account doesn\'t have any buckets, please create one.</div>');
            // setTimeout(function () {
            //     $('.spaces-settings-alert').empty();
            // }, 2000);
        } else if (data.status == 400) {
            $('.spaces-settings-alert').html('<div class="alert alert-danger">'+data.message+'</div>');
            // setTimeout(function () {
            //     $('.spaces-settings-alert').empty();
            // }, 2000);
        } else  {
            $('.spaces-settings-alert').html('<div class="alert alert-danger">Error while connecting to amazone, please check your details</div>');
            // setTimeout(function () {
            //     $('.spaces-settings-alert').empty();
            // }, 2000);
        }
        $('form.spaces-settings').find('.btn-success').text('Test Connection');
    });
}
function Wo_TestFTP() {
    $('form.ftp-settings').find('.btn-success').text('Please wait..');
    $('.ftp-settings-alert').empty();
    $.get(Wo_Ajax_Requests_File(), {f:'admin_setting', s: 'test_ftp'}, function (data) {
        if (data.status == 200) {
            $('.ftp-settings-alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Connection established!</div>');
            setTimeout(function () {
                $('.ftp-settings-alert').empty();
            }, 5000);
        } else if (data.status == 400) {
            $('.ftp-settings-alert').html('<div class="alert alert-danger">'+data.message+'</div>');
            // setTimeout(function () {
            //     $('.ftp-settings-alert').empty();
            // }, 2000);
        }
        $('form.ftp-settings').find('.btn-success').text('Test FTP Connection');
    });
}

$(function() {

    $('.switcher input[type=checkbox]').click(function () {
        setToTrue = 0;
        if ($(this).is(":checked") === true) {
            setToTrue = 1;
        }
        var configName = $(this).attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        if (configName == 'ffmpeg_system') {
            setToTrue = 'off';
            if ($(this).is(":checked") === true) {
                setToTrue = 'on';
            }
        }
        objData[configName] = setToTrue;
        objData['hash_id'] = hash_id;
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData);
    });

    var setTimeOutColor = setTimeout(function (){});
    $('select').on('change', function() {
         clearTimeout(setTimeOutColor);
        var thisElement = $(this);
        var configName = thisElement.attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = this.value;
        objData['hash_id'] = hash_id;
        thisElement.addClass('warning');
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
            if (data.status == 200) {
                thisElement.removeClass('warning');
                thisElement.addClass('success');
            } else {
                thisElement.addClass('error');
            }
            var setTimeOutColor = setTimeout(function () {
                thisElement.removeClass('success');
                thisElement.removeClass('warning');
                thisElement.removeClass('error');
            }, 2000);
        });
    });
	
	$('.round_check input[type=radio]').on('change', function() {
		clearTimeout(setTimeOutColor);
        var thisElement = $(this);
        var configName = thisElement.attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = this.value;
        objData['hash_id'] = hash_id;
        thisElement.addClass('warning');
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
            if (data.status == 200) {
                thisElement.removeClass('warning');
                thisElement.addClass('success');
            } else {
                thisElement.addClass('error');
            }
            var setTimeOutColor = setTimeout(function () {
                thisElement.removeClass('success');
                thisElement.removeClass('warning');
                thisElement.removeClass('error');
            }, 2000);
        });
    });
	
    $('input[type=text], input[type=number]').on('input', delay(function() {
            clearTimeout(setTimeOutColor);
            var thisElement = $(this);
            var configName = thisElement.attr('name');
            var hash_id = $('input[name=hash_id]').val();
            var objData = {};
            objData[configName] = this.value;
            objData['hash_id'] = hash_id;
            thisElement.addClass('warning');
            $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
                if (data.status == 200) {
                    thisElement.removeClass('warning');
                    thisElement.addClass('success');
                } else {
                    thisElement.addClass('error');
                }
                var setTimeOutColor = setTimeout(function () {
                    thisElement.removeClass('success');
                    thisElement.removeClass('warning');
                    thisElement.removeClass('error');
                }, 2000);
                //thisElement.focus();
            });
    }, 500));

    $('input[type=file]').on('change', function(){
        var objData = new FormData();
        var thisElement = $(this);
        var file = $(this)[0].files[0];
        var hash_id = $('input[name=hash_id]').val();
        objData.append('cloud_file', file);
        objData.append('hash_id', hash_id);
        thisElement.addClass('warning');
        $('.drive-settings-alert').html(' ');
        if (file.type == 'application/json') {
            $.ajax({
              url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting',
              type: 'post',
              data: objData,
              contentType: false,
              processData: false,
              success: function(response){
                thisElement.removeClass('warning');
                thisElement.addClass('success');
                var setTimeOutColor = setTimeout(function () {
                    thisElement.removeClass('success');
                    thisElement.removeClass('warning');
                    thisElement.removeClass('error');
                }, 2000);
              },
           });
        } else {
            thisElement.addClass('error');
            var setTimeOutColor = setTimeout(function () {
                thisElement.removeClass('error');
            }, 2000);
            $('.drive-settings-alert').html('<div class="alert alert-danger"><i class="fa fa-check"></i> File format should be .json</div>');
        }
    });

    var debug_settings = $('form.debug-settings');
    debug_settings.ajaxForm({
        url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=ffmpeg_debug',
        beforeSend: function() {
            debug_settings.find('.waves-effect').text("Please wait..");
        },
        success: function(data) {
            if (data.status == 200) {
                debug_settings.find('.waves-effect').text('Debug');
                $('#debug_ffmpeg').val(data.data);
                if (data.video_url) {
                    $('.debug-settings-alert').html('<div class="alert alert-success"><a href="'+data.video_url+'" target="_blank">You can check the converted video test_240p_converted.mp4</a></div>');
                }
            }
        }
    });
});

</script>
