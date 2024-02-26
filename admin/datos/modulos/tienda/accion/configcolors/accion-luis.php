<?php
$temas=Luis::listartemas();
foreach($temas as $t){
	Luis::cambio_color($_POST["colorparent"],$_POST["page_view_c"]);
}