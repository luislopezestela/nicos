<?php
if(isset($_POST)){
	$clientes=DatosAdmin::porclientview($_POST["dat"]);
	if($_POST["stored"]){
			$client=false;
			if(count($clientes)>0) {
				if($_POST["dat"]!==""){
					foreach ($clientes as $cl) {
						$client.="<div class='cliente_data cliente_data_act' data='".$cl->id."' data_val='".$cl->nombre." ".$cl->apellido_paterno."'>";
						$client.="<label>".html_entity_decode($cl->nombre." ".$cl->apellido_paterno)."</label>";
						if($cl->ruc){
							$client.="<span>".$cl->ruc."</span>";
						}elseif($cl->dni){
							$client.="<span>".$cl->dni."</span>";
						}else{
							#nada
						}
						$client.="</div>";
					}
				}
				
				
			}else{
				if($_POST["dat"]===""){
					$cliente_view=false;
				}else{
					$client.="<p>Cliente no encontrado</p>";
				}
				
			}
			
			echo json_encode(array('status' => 1, 'message' => "", 'cliente' => $client));
		
	}elseif($_POST["client"]){
		#
	}
}
?>