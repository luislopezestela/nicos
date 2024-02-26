<?php
if(isset($_POST)){
	$clientes=DatosAdmin::porclientview($_POST["dat"],$_SESSION['admin_id']);
	if($_POST["stored"]){
			$client=false;
			if(count($clientes)>0) {
				if($_POST["dat"]!==""){
					foreach ($clientes as $cl) {
						$client.="<div class='contiene_sugerencias_clientes' data='".$cl->id."' data_val='".$cl->nombre." ".$cl->apellido_paterno."'>";
						$client.="<li>";
						$client.="<label>".html_entity_decode($cl->nombre." ".$cl->apellido_paterno)."</label>";
						if($cl->ruc){
							$client.="<p>".$cl->ruc."</p>";
						}elseif($cl->dni){
							$client.="<p>".$cl->dni."</p>";
						}else{
							#nada
						}
						$client.="</li>";
						$client.="</div>";
					}
				}
				
				
			}else{
				if($_POST["dat"]===""){
					$cliente_view=false;
				}else{
					$cliente_view=DatosAdmin::porclientview_one(false,$_SESSION['admin_id']);
					$client.="<div class='contiene_sugerencias_clientes' data=".$cliente_view->id." data_val=".$cliente_view->nombre.">";
					$client.="<li>";
					$client.="<label>".$cliente_view->nombre."</label>";
					$client.="<p>Por defecto</p>";
					$client.="</li>";
					$client.="</div>";
				}
				
			}
			
			echo json_encode(array('status' => 1, 'message' => "", 'cliente' => $client));
		
	}elseif($_POST["client"]){
		#
	}
}
?>