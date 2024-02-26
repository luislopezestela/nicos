<?php
$dni = $_POST['docs'];
$documento = Luis::buscarusuariopordni_data($dni);
$bur_luis = new Luis();
if(isset($documento->dni)){
  $datos_persona = array("nombre" => $documento->nombres,
    "nombres" => $documento->nombre_a." ".$documento->nombre_b,
    "apellidoPaterno" => $documento->apellido_paterno,
    "apellidoMaterno" => $documento->apellido_materno,
    "tipoDocumento" => $documento->digito,
    "numeroDocumento" => $documento->dni
  );
  echo json_encode($datos_persona);
}else{
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://dniruc.apisperu.com/api/v1/dni/'.$dni.'?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Impvc2VsdWxvZXNAZ21haWwuY29tIn0.fprhtwtVkW7DuIidp3LfdBVxSER7ZfIGMziIuKxga0w',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 2,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
  ));
  $response = curl_exec($curl);
  curl_close($curl);
   $persona = json_decode($response);
  if(isset($persona)){
    $separanombre = explode(" ", $persona->nombres);
    if(isset($separanombre[0])){$nams=$separanombre[0];}else{$nams="";}
    if(isset($separanombre[1])){$namsb=$separanombre[1];}else{$namsb="";}
    $bur_luis->nombre_a = $nams;
    $bur_luis->nombre_b = $namsb;
    $bur_luis->apellido_paterno = $persona->apellidoPaterno;
    $bur_luis->apellido_materno = $persona->apellidoMaterno;
    $bur_luis->digito = $persona->codVerifica;
    $bur_luis->dni = $persona->dni;
    $bur_luis->nombres = $persona->nombres;
    $bur_luis->guardar_persona_reniec();

    $datos_persona_re = array("nombre" => $bur_luis->nombres,
      "nombres" => $bur_luis->nombre_a." ".$bur_luis->nombre_b,
      "apellidoPaterno" => $bur_luis->apellido_paterno,
      "apellidoMaterno" => $bur_luis->apellido_materno,
      "tipoDocumento" => $bur_luis->digito,
      "numeroDocumento" => $bur_luis->dni
    );
    echo json_encode($datos_persona_re);
  }else{
    $token = 'apis-token-1.aTSI1U7KEuT-6bbbCguH-4Y8TI6KS73N';
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $dni,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 2,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Referer: https://apis.net.pe/consulta-dni-api',
        'Authorization: Bearer ' . $token
      ),
    ));

     $response = curl_exec($curl);
    curl_close($curl);
    $persona = json_decode($response);
    
    if(isset($persona)){
      $separanombre = explode(" ", $persona->nombres);
      if(isset($separanombre[0])){$nams=$separanombre[0];}else{$nams="";}
      if(isset($separanombre[1])){$namsb=$separanombre[1];}else{$namsb="";}
      $bur_luis->nombre_a = $nams;
      $bur_luis->nombre_b = $namsb;
      $bur_luis->apellido_paterno = $persona->apellidoPaterno;
      $bur_luis->apellido_materno = $persona->apellidoMaterno;
      $bur_luis->digito = $persona->tipoDocumento;
      $bur_luis->dni = $persona->numeroDocumento;
      $bur_luis->nombres = $persona->nombres;
      $bur_luis->guardar_persona_reniec();

      $datos_persona_re = array("nombre" => $bur_luis->nombres,
        "nombres" => $bur_luis->nombre_a." ".$bur_luis->nombre_b,
        "apellidoPaterno" => $bur_luis->apellido_paterno,
        "apellidoMaterno" => $bur_luis->apellido_materno,
        "tipoDocumento" => $bur_luis->digito,
        "numeroDocumento" => $bur_luis->dni
      );
      echo json_encode($datos_persona_re);
    }else{
      echo json_encode(array("message" => "error de datos"));
    }
  }
  
}
