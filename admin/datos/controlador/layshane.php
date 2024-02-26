<?php
/**
 * Tema configuracion 
 */
class Layshane{
	public $data;
	public $base;
	function __construct(){
		$data = null;
	}
    public static function getBaseUrl() {
        $currentPath = $_SERVER['PHP_SELF'];
        $pathInfo    = pathinfo($currentPath);
        $hostName    = $_SERVER['HTTP_HOST'];
        return $hostName . $pathInfo['dirname'];
    }


	public static function ssl_certificado( $domain ) {
    	$ssl_check = @fsockopen( 'ssl://' . $domain, 443, $errno, $errstr, 30 );
    	$res = !! $ssl_check;
    	if($ssl_check){ fclose($ssl_check); }
    	return $res;
    }

	public static function server_name(){
		if(Layshane::ssl_certificado($_SERVER['SERVER_NAME'])){
			if(isset($_SERVER['HTTPS']) != "on"){
				$url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
				header("Location: $url");
				exit;
		    }
		}
	}

	public static function base_url($base){
        if(Layshane::ssl_certificado($_SERVER['SERVER_NAME'])) {
            if(isset($_SERVER['HTTPS']) != "on"){
                $base_pages = "https://". $_SERVER['SERVER_NAME'];
                if($base==="base_page"){
                    $pagebase = $base_pages.'/';
                }elseif($base==="base_page_admin"){
                    $pagebase = $base_pages."/admin/";
                }
            }
        }else{
            $base_pages = "http://". $_SERVER['SERVER_NAME'];
            if($base==="base_page"){
                $pagebase = $base_pages.'/';
            }elseif($base==="base_page_admin"){
                $pagebase = $base_pages."/admin/";
            }
        }
        return $pagebase;
    }
}

define('BASE_URL_A', Layshane::base_url("base_page"));
define('BASE_URL_B', Layshane::base_url("base_page_admin"));


?>