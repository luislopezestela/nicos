<?php
/**
 * Luis lopez estela funcrions
 */

class Functions{
    public static function poner_subguion($url){
        $url = strtolower($url);
        $find = array('á','é','í','ó','ú','â','ê','î','ô','û','ã','õ','ç','ñ');
        $repl = array('a','e','i','o','u','a','e','i','o','u','a','o','c','n');
        $url = str_replace($find, $repl, $url);
        $find = array('<','>','div','styletext');
        $url = str_replace($find, '', $url);
        $find = array(' ', '&', '\r\n', '\n','+','amp');
        $url = str_replace($find, '-', $url);
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<{^>*>/');
        $repl = array('', '_', '');
        $url = preg_replace($find, $repl, $url);
        return $url;
    }

    public static function getUpadtesdsd($principal,$cambio){
        $returnHtml = array();
        $page = 'https://www.google.com/finance/quote/'.$cambio.'-'.$principal;
        $returnRawHtml = file_get_contents($page);    
        preg_match_all("/<[^>]+>(.*)<\/[^>]+>/U",$returnRawHtml,$returnHtml,PREG_PATTERN_ORDER);
        if(isset($returnHtml[0][208])) {
          $gRate = strip_tags($returnHtml[0][208]);
          return $gRate;
        }else{
          return false;
        }

    }

    public static function cuenta_regresiva($year, $month, $day, $hour, $minute, $second){
    	global $return;
    	global $countdown_date;
    	$countdown_date = mktime($hour, $minute, $second, $month, $day, $year);
    	$today = time();
    	$diff = $countdown_date - $today;
    	if ($diff < 0)$diff = 0;
    	$dl = floor($diff/60/60/24);
    	$hl = floor(($diff - $dl*60*60*24)/60/60);
    	$ml = floor(($diff - $dl*60*60*24 - $hl*60*60)/60);
    	$sl = floor(($diff - $dl*60*60*24 - $hl*60*60 - $ml*60));
    	// OUTPUT
    	$resultado = "\n<br>Today's date ".date("F j, Y, g:i:s A")."<br/>";
    	$resultado .=  "Countdown date ".date("F j, Y, g:i:s A",$countdown_date)."<br/>";
    	$resultado .=  "\n<br>";
    	$return = array($dl, $hl, $ml, $sl);
    	return $return;
    }


    public static function horasdeminutos($time, $format = '%g:%02d') {
    	if($time < 1){
    		return;
    	}
    	$hours = floor($time / 60);
    	$minutes = ($time % 60);
    	return sprintf($format, $hours, $minutes);
    }

    public static function sacarhoras($m){
    	$d = (int)($m/1440);
    	$hp = (int)($m/60);
    	$m -= $d*1440;
    	$h = (int)($m/60);
    	$m -= $h*60;
    	return array("horas" => $hp, "minutos" => $m);
    }

    public static function sacarhorasdos($m){
    	$d = (int)($m/1440);
    	$m -= $d*1440;
    	$h = (int)($m/60);
    	$m -= $h*60;
    	return array("dias" => $d, "horas" => $h, "minutos" => $m);
    }

    public static function toHours($min,$type){
    	$sec = $min * 60;
    	$dias=floor($sec/86400);
    	$mod_hora=$sec%86400;
    	$horas=floor($mod_hora/3600); 
    	$mod_minuto=$mod_hora%3600;
    	$minutos=floor($mod_minuto/60);
    	if($horas<=0){
    		$text = $minutos.' min';
    	}elseif($dias<=0){
    		if($type=='round'){
    			$text = $horas.' hrs';
    		}else{
    			$text = $horas.":".$minutos;
    		}
    	}else{
    		if($type=='round'){
    			$text = $dias.' dias';
    		}else{
    			$text = $dias." dias ".$horas." hrs ".$minutos." min";
    		}
    	}
    	return $text; 
    }

    public static function horasdeminutosdos($time, $format = '%G:%02d:%s'){
    	if($time < 1){
    		return;
    	}
    	$hours = floor($time / 60);
    	$minutes = ($time % 60);
    	$segundos = 00;
    	return sprintf($format, $hours, $minutes, $segundos);
    }

    public static function _hace($tm,$rcs = 0){
    	$cur_tm = time(); $dif = $cur_tm-$tm;
    	$pds = array('segundo','minuto','hora','dia','semana','mes','año','decada');
        $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
        for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--);if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);
        $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
        if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= time_ago($_tm);
        return $x;
    }

    public static function fechasluislopes($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
    }


    public static function fechafinalizacion ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia." ".$numeroDia." de ".$nombreMes;
    }

    public static function fechasluislopesmeses ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $mes = date('F', strtotime($fecha));
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombreMes;
    }

     public static function fechasluislopesmesesdos($fecha) {
        $fecha = substr($fecha, 0, 10);
        $mes = date('F', strtotime($fecha));
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombreMes;
    }

    public static function mostrarsemanas($mes,$anno){        
        $ultimo_dia = date("d",mktime(0,0,0,$mes+1,0,$anno));
        $semanas = array();
        $cantidad_semanas = 0;
        $inicio = 1;
        $fin = 0;
        $dia_semana = '';
        for($i = 1;$i<=$ultimo_dia;$i++){
            $fecha = mktime(0,0,0,$mes,$i,$anno);
            $dia_semana = date('w',($fecha));
            if($dia_semana == 0){
                $semanas[$cantidad_semanas] = array('inicio' => $inicio,'fin'=>$i);
                $inicio = $i+1;
                $cantidad_semanas++;
            }
        }
        $ultima_semana = end($semanas);
        if($ultima_semana['fin'] != $ultimo_dia){
            $semanas[$cantidad_semanas] = array('inicio' => $inicio,'fin' => $ultimo_dia);
        }
        return $semanas;
    }

    public static function fechasluislopesdiassds ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        return $nombredia;
    }

    public static function fechasluislopesdiass ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia." ".$numeroDia." de ".$nombreMes;
    }

    public static function horasluislopes ($hora) {
        $numeroDia = date('g:i A', strtotime($hora));
        return $numeroDia;
    }

    public static function header_disp(){
        $sql = "select * from header_page where activo=1";
        $query = Ejecutor::doit($sql);
        return Modelo::one($query[0],new DatosPagina());
    }
    public static function footer_disp(){
        $sql = "select * from footer_page where activo=1";
        $query = Ejecutor::doit($sql);
        return Modelo::one($query[0],new DatosPagina());
    }


    public static function ver_certificado( $domain ) {
        $ssl_check = @fsockopen( 'ssl://' . $domain, 443, $errno, $errstr, 30 );
        $res = !! $ssl_check;
        if($ssl_check){ fclose($ssl_check); }
        return $res;
    }

}    