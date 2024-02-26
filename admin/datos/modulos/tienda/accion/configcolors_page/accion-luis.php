<?php
$temas=Luis::listartemas();
foreach($temas as $t){
	Luis::cambio_color_page($_POST["colorparent"],$_POST["page_view_c"]);
}