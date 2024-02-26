<?php
$temas=Luis::listartemas();
foreach($temas as $t){
	Luis::noes_principal();
	Luis::aser_principal($_POST["confiparent"]);
}
echo $_POST["confiparent"];