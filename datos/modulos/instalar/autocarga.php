<?php
function mi_autocargador($modelname) {
    if(Modelo::exists($modelname)){
		include Modelo::getFullPath($modelname);
	}
}
spl_autoload_register('mi_autocargador');
?>