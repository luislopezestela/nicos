<?php
@ini_set("max_execution_time", 0);
@ini_set("memory_limit", "-1");
@set_time_limit(0);
require_once "./luisincludes/config.php";
require_once "./luisincludes/librerias/DB/vendor/autoload.php";
$wo           = array();

$sqlConnect   = $wo["sqlConnect"] = mysqli_connect($host, $username, $password, $dbase, 3306);
// cre una nueva coneccion
$mysqlMaria   = new Mysql;
// Handling Server Errors
$ServerErrors = array();
if (mysqli_connect_errno()) {
    $ServerErrors[] = "No se pudo conectar a MySQL: " . mysqli_connect_error();
}
if (!function_exists("curl_init")) {
    $ServerErrors[] = "¡PHP CURL NO esta instalado en su servidor web!";
}
if (!extension_loaded("gd") && !function_exists("gd_info")) {
    $ServerErrors[] = "¡La biblioteca PHP GD NO esta instalada en su servidor web!";
}
if (!extension_loaded("zip")) {
    $ServerErrors[] = "¡La extension ZipArchive NO esta instalada en su servidor web!";
}
$query = mysqli_query($sqlConnect, "SET NAMES utf8mb4");
if (isset($ServerErrors) && !empty($ServerErrors)) {
    foreach ($ServerErrors as $Error) {
        echo "<h3>" . $Error . "</h3>";
    }
    die();
}
$baned_ips = lui_GetBanned("user");
if (in_array($_SERVER["REMOTE_ADDR"], $baned_ips)) {
    exit();
}
$config    = lui_GetConfig();
if ($config['developer_mode'] == 1) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
$db        = new MysqliDb($sqlConnect);
$all_langs = lui_LangsNamesFromDB();
$wo['iso'] = GetIso();
foreach ($all_langs as $key => $value) {
    $insert = false;
    if (!in_array($value, array_keys($config))) {
        $db->insert(T_CONFIG, array(
            "name" => $value,
            "value" => 1
        ));
        $insert = true;
    }
}
if ($insert == true) {
    $config = lui_GetConfig();
}
if (isset($_GET["theme"]) && in_array($_GET["theme"], array(
    "default",
    "sunshine",
    "layshane-star",
    "restaurante-star",
    "wondertag"
))) {
    $_SESSION["theme"] = $_GET["theme"];
}
if (isset($_SESSION["theme"]) && !empty($_SESSION["theme"])) {
    $config["theme"] = $_SESSION["theme"];
    if ($_SERVER["REQUEST_URI"] == "/v2/wonderful" || $_SERVER["REQUEST_URI"] == "/v2/layshane-star" || $_SERVER["REQUEST_URI"] == "/v2/restaurante-star") {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}
$config["withdrawal_payment_method"] = json_decode($config['withdrawal_payment_method'],true);
// Config Url
$config["theme_url"] = $site_url . "/datos/modulos/" . $config["theme"];
$config["site_url"]  = $site_url;
$wo["site_url"]      = $site_url;
$config["wasabi_site_url"]         = "https://s3.".$config["wasabi_bucket_region"].".wasabisys.com";
if (!empty($config["wasabi_bucket_name"])) {
    $config["wasabi_site_url"] = "https://s3.".$config["wasabi_bucket_region"].".wasabisys.com/".$config["wasabi_bucket_name"];
}
$s3_site_url         = "https://test.s3.amazonaws.com";
if (!empty($config["bucket_name"])) {
    $s3_site_url = "https://{bucket}.s3.amazonaws.com";
    $s3_site_url = str_replace("{bucket}", $config["bucket_name"], $s3_site_url);
}
$config["s3_site_url"] = $s3_site_url;
$s3_site_url_2         = "https://test.s3.amazonaws.com";
if (!empty($config["bucket_name_2"])) {
    $s3_site_url_2 = "https://{bucket}.s3.amazonaws.com";
    $s3_site_url_2 = str_replace("{bucket}", $config["bucket_name_2"], $s3_site_url_2);
}
$config["s3_site_url_2"]   = $s3_site_url_2;
$wo["config"]              = $config;
$ccode                     = lui_CustomCode("g");
$ccode                     = is_array($ccode) ? $ccode : array();
$wo["config"]["header_cc"] = !empty($ccode[0]) ? $ccode[0] : "";
$wo["config"]["footer_cc"] = !empty($ccode[1]) ? $ccode[1] : "";
$wo["config"]["styles_cc"] = !empty($ccode[2]) ? $ccode[2] : "";

$wo["script_version"]      = $wo["config"]["version"];
$http_header               = "http://";
if (!empty($_SERVER["HTTPS"])) {
    $http_header = "https://";
}
$wo["actual_link"] = $http_header . $_SERVER["HTTP_HOST"] . urlencode($_SERVER["REQUEST_URI"]);
// Define Cache Vireble
$cache             = new Cache();
if (!is_dir("cache")) {
    $cache->lui_OpenCacheDir();
}
$wo["purchase_code"] = "";
if (!empty($purchase_code)) {
    $wo["purchase_code"] = $purchase_code;
}
// Login With Url
$wo["facebookLoginUrl"]   = $config["site_url"] . "/login-with.php?provider=Facebook";
$wo["twitterLoginUrl"]    = $config["site_url"] . "/login-with.php?provider=Twitter";
$wo["googleLoginUrl"]     = $config["site_url"] . "/login-with.php?provider=Google";
$wo["linkedInLoginUrl"]   = $config["site_url"] . "/login-with.php?provider=LinkedIn";
$wo["VkontakteLoginUrl"]  = $config["site_url"] . "/login-with.php?provider=Vkontakte";
$wo["instagramLoginUrl"]  = $config["site_url"] . "/login-with.php?provider=Instagram";
$wo["QQLoginUrl"]         = $config["site_url"] . "/login-with.php?provider=QQ";
$wo["WeChatLoginUrl"]     = $config["site_url"] . "/login-with.php?provider=WeChat";
$wo["DiscordLoginUrl"]    = $config["site_url"] . "/login-with.php?provider=Discord";
$wo["MailruLoginUrl"]     = $config["site_url"] . "/login-with.php?provider=Mailru";
$wo["OkLoginUrl"]         = $config["site_url"] . "/login-with.php?provider=OkRu";
// Defualt User Pictures
$wo["userDefaultAvatar"]  = "upload/photos/d-avatar.jpg";
$wo["userDefaultFAvatar"] = "upload/photos/f-avatar.jpg";
$wo["userDefaultCover"]   = "upload/photos/d-cover.jpg";
$wo["pageDefaultAvatar"]  = "upload/photos/d-page.jpg";
$wo["groupDefaultAvatar"] = "upload/photos/d-group.jpg";
$wo["categoriaDefaultImage"]  = "upload/photos/d-avatar.jpg";
// Get LoggedIn User Data
$wo["loggedin"]           = false;
$langs                    = lui_LangsNamesFromDB();
if (lui_IsLogged() == true) {
    $session_id         = !empty($_SESSION["user_id"]) ? $_SESSION["user_id"] : $_COOKIE["user_id"];
    $wo["user_session"] = lui_GetUserFromSessionID($session_id);
    $wo["user"]         = lui_UserData($wo["user_session"]);
    if (!empty($wo["user"]["language"])) {
        if (in_array($wo["user"]["language"], $langs)) {
            $_SESSION["lang"] = $wo["user"]["language"];
        }
    }
    if ($wo["user"]["user_id"] < 0 || empty($wo["user"]["user_id"]) || !is_numeric($wo["user"]["user_id"]) || lui_UserActive($wo["user"]["username"]) === false) {
        header("Location: " . lui_SeoLink("index.php?link1=logout"));
    }
    $wo["loggedin"] = true;
} else {
    $wo["userSession"] = getUserProfileSessionID();
}
if (!empty($_GET["c_id"]) && !empty($_GET["user_id"])) {
    $application = "windows";
    if (!empty($_GET["application"])) {
        if ($_GET["application"] == "phone") {
            $application = lui_Secure($_GET["application"]);
        }
    }
    $c_id             = lui_Secure($_GET["c_id"]);
    $user_id          = lui_Secure($_GET["user_id"]);
    $check_if_session = lui_CheckUserSessionID($user_id, $c_id, $application);
    if ($check_if_session === true) {
        $wo["user"]          = lui_UserData($user_id);
        $session             = lui_CreateLoginSession($user_id);
        $_SESSION["user_id"] = $session;
        setcookie("user_id", $session, time() + 10 * 365 * 24 * 60 * 60);
        if ($wo["user"]["user_id"] < 0 || empty($wo["user"]["user_id"]) || !is_numeric($wo["user"]["user_id"]) || lui_UserActive($wo["user"]["username"]) === false) {
            header("Location: " . lui_SeoLink("index.php?link1=logout"));
        }
        $wo["loggedin"] = true;
    }
}
if (!empty($_POST["user_id"]) && (!empty($_POST["s"]) || !empty($_POST["access_token"]))) {
    $application  = "windows";
    $access_token = !empty($_POST["s"]) ? $_POST["s"] : $_POST["access_token"];
    if (!empty($_GET["application"])) {
        if ($_GET["application"] == "phone") {
            $application = lui_Secure($_GET["application"]);
        }
    }
    if ($application == "windows") {
        $access_token = $access_token;
    }
    $s                = lui_Secure($access_token);
    $user_id          = lui_Secure($_POST["user_id"]);
    $check_if_session = lui_CheckUserSessionID($user_id, $s, $application);
    if ($check_if_session === true) {
        $wo["user"] = lui_UserData($user_id);
        if ($wo["user"]["user_id"] < 0 || empty($wo["user"]["user_id"]) || !is_numeric($wo["user"]["user_id"]) || lui_UserActive($wo["user"]["username"]) === false) {
            $json_error_data = array(
                "api_status" => "400",
                "api_text" => "failed",
                "errors" => array(
                    "error_id" => "7",
                    "error_text" => "El id de usuario es incorrecto."
                )
            );
            header("Content-type: application/json");
            echo json_encode($json_error_data, JSON_PRETTY_PRINT);
            exit();
        }
        $wo["loggedin"] = true;
    } else {
        $json_error_data = array(
            "api_status" => "400",
            "api_text" => "failed",
            "errors" => array(
                "error_id" => "6",
                "error_text" => "El ID de sesion es incorrecto."
            )
        );
        header("Content-type: application/json");
        echo json_encode($json_error_data, JSON_PRETTY_PRINT);
        exit();
    } 
}
// Language Function
if (isset($_GET["lang"]) and !empty($_GET["lang"])) {
    if (in_array($_GET["lang"], array_keys($wo["config"])) && $wo["config"][$_GET["lang"]] == 1) {
        $lang_name = lui_Secure(strtolower($_GET["lang"]));
        if (in_array($lang_name, $langs)) {
            lui_CleanCache(); 
            $_SESSION["lang"] = $lang_name;
            if ($wo["loggedin"] == true) {
                mysqli_query($sqlConnect, "UPDATE " . T_USERS . " SET `language` = '" . $lang_name . "' WHERE `user_id` = " . lui_Secure($wo["user"]["user_id"]));
            }
        }
    }
}
if ($wo["loggedin"] == true && $wo["config"]["cache_sidebar"] == 1) {
    if (!empty($_COOKIE["last_sidebar_update"])) {
        if ($_COOKIE["last_sidebar_update"] < time() - 120) {
            lui_CleanCache();
        }
    } else {
        lui_CleanCache();
    }
}
if (empty($_SESSION["lang"])) {
    $_SESSION["lang"] = $wo["config"]["defualtLang"];
}
$wo["language"]      = $_SESSION["lang"];
$wo["language_type"] = "ltr";
// Add rtl languages here.
$rtl_langs           = array(
    "arabic",
    "urdu",
    "hebrew",
    "persian"
);
if (!isset($_COOKIE["ad-con"])) {
    setcookie("ad-con", htmlentities(json_encode(array(
        "date" => date("Y-m-d"),
        "ads" => array()
    ))), time() + 10 * 365 * 24 * 60 * 60);
}
$wo["ad-con"] = array();
if (!empty($_COOKIE["ad-con"])) {
    $wo["ad-con"] = json_decode(html_entity_decode($_COOKIE["ad-con"]));
    $wo["ad-con"] = ToArray($wo["ad-con"]);
}
if (!is_array($wo["ad-con"]) || !isset($wo["ad-con"]["date"]) || !isset($wo["ad-con"]["ads"])) {
    setcookie("ad-con", htmlentities(json_encode(array(
        "date" => date("Y-m-d"),
        "ads" => array()
    ))), time() + 10 * 365 * 24 * 60 * 60);
}
if (is_array($wo["ad-con"]) && isset($wo["ad-con"]["date"]) && strtotime($wo["ad-con"]["date"]) < strtotime(date("Y-m-d"))) {
    setcookie("ad-con", htmlentities(json_encode(array(
        "date" => date("Y-m-d"),
        "ads" => array()
    ))), time() + 10 * 365 * 24 * 60 * 60);
}

if (!isset($_COOKIE["_us"])) {
    setcookie("_us", time() + 60 * 60 * 24, time() + 10 * 365 * 24 * 60 * 60);
}
if ((isset($_COOKIE["_us"]) && $_COOKIE["_us"] < time()) || 1) {
    setcookie("_us", time() + 60 * 60 * 24, time() + 10 * 365 * 24 * 60 * 60);
}
// checking if corrent language is rtl.
foreach ($rtl_langs as $lang) {
    if ($wo["language"] == strtolower($lang)) {
        $wo["language_type"] = "rtl";
    }
}
// Icons Virables
$error_icon   = '<svg fill="currentColor" height="16" width="16" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24V264c0 13.3-10.7 24-24 24s-24-10.7-24-24V152c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg> ';
$success_icon = '<i class="fa fa-check"></i> ';
// Include Language File
$wo["lang"]   = lui_LangsFromDB($wo["language"]);
if (file_exists("luisincludes/languages/extra/" . $wo["language"] . ".php")) {
    require "luisincludes/languages/extra/" . $wo["language"] . ".php";
}
if (empty($wo["lang"])) {
    $wo["lang"] = lui_LangsFromDB();
}
$wo["second_post_button_icon"] = $config["second_post_button"] == "wonder" ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="8"></line></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-down"><path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17"></path></svg>';
$theme_settings                = array();
$theme_settings["theme"]       = "layshane-star";
if (file_exists("./datos/modulos/" . $config["theme"] . "/layout/404/dont-delete-this-file.json")) {
    $theme_settings = json_decode(file_get_contents("./datos/modulos/" . $config["theme"] . "/layout/404/dont-delete-this-file.json"), true);
}
if ($theme_settings["theme"] == "layshane-star_full") {
    $wo["second_post_button_icon"] = $config["second_post_button"] == "wonder" ? "exclamation-circle" : "thumb-down";
}
$wo["second_post_button_text"]  = $config["second_post_button"] == "wonder" ? $wo["lang"]["wonder"] : $wo["lang"]["dislike"];
$wo["second_post_button_texts"] = $config["second_post_button"] == "wonder" ? $wo["lang"]["wonders"] : $wo["lang"]["dislikes"];
$wo["marker"]                   = "?";
if ($wo["config"]["seoLink"] == 0) {
    $wo["marker"] = "&";
}
require_once "./luisincludes/includes/data.php";
$wo["emo"]                           = $emo;
$wo["profile_picture_width_crop"]    = 150;
$wo["profile_picture_height_crop"]   = 150;
$wo["profile_picture_image_quality"] = 70;
$wo["redirect"]                      = 0;

$wo["update_cache"]                  = "";
if (!empty($wo["config"]["last_update"])) {
    $update_cache = time() - 21600;
    if ($update_cache < $wo["config"]["last_update"]) {
        $wo["update_cache"] = "?" . sha1(time());
    }
}

// night mode
if (empty($_COOKIE["mode"])) {
    setcookie("mode", "day", time() + 10 * 365 * 24 * 60 * 60, "/");
    $_COOKIE["mode"] = "day";
    $wo["mode_link"] = "night";
    $wo["mode_text"] = $wo["lang"]["night_mode"];
} else {
    if ($_COOKIE["mode"] == "day") {
        $wo["mode_link"] = "night";
        $wo["mode_text"] = $wo["lang"]["night_mode"];
    }
    if ($_COOKIE["mode"] == "night") {
        $wo["mode_link"] = "day";
        $wo["mode_text"] = $wo["lang"]["day_mode"];
    }
}
if (!empty($_GET["mode"])) {
    if ($_GET["mode"] == "day") {
        setcookie("mode", "day", time() + 10 * 365 * 24 * 60 * 60, "/");
        $_COOKIE["mode"] = "day";
        $wo["mode_link"] = "night";
        $wo["mode_text"] = $wo["lang"]["night_mode"];
    } elseif ($_GET["mode"] == "night") {
        setcookie("mode", "night", time() + 10 * 365 * 24 * 60 * 60, "/");
        $_COOKIE["mode"] = "night";
        $wo["mode_link"] = "day";
        $wo["mode_text"] = $wo["lang"]["day_mode"];
    }
}
include_once "luisincludes/includes/onesignal_config.php";

// manage packages
$wo["pro_packages"]       = lui_GetAllProInfo();
try {
    $wo["genders"]             = lui_GetGenders($wo["language"], $langs);
    $wo["page_categories"]     = lui_GetCategories(T_PAGES_CATEGORY);
    $wo["group_categories"]    = lui_GetCategories(T_GROUPS_CATEGORY);
    $wo["blog_categories"]     = lui_GetCategories(T_BLOGS_CATEGORY);
    $wo["products_categories"] = lui_GetCategories(T_PRODUCTS_CATEGORY);
    $wo["sections_categories"] = lui_GetSectionCategories('section_product');
    $wo["job_categories"]      = lui_GetCategories(T_JOB_CATEGORY);
    $wo["colores_productos"]   = lui_GetCategories(T_COLORES_PRODUCTOS);
    $wo["reactions_types"]     = lui_GetReactionsTypes();
}catch (Exception $e) {
    $wo["genders"]             = array();
    $wo["page_categories"]     = array();
    $wo["group_categories"]    = array();
    $wo["blog_categories"]     = array();
    $wo["products_categories"] = array();
    $wo["sections_categories"] = array();
    $wo["job_categories"]      = array();
    $wo["colores_productos"]   = array();
    $wo["reactions_types"]     = array();
}
lui_GetSubCategories();
$wo["config"]["currency_array"]        = (array) json_decode($wo["config"]["currency_array"]);
$wo["config"]["currency_symbol_array"] = (array) json_decode($wo["config"]["currency_symbol_array"]);
$wo["config"]["providers_array"]       = (array) json_decode($wo["config"]["providers_array"]);
if (!empty($wo["config"]["exchange"])) {
    $wo["config"]["exchange"] = (array) json_decode($wo["config"]["exchange"]);
}
$wo["currencies"] = array();
foreach ($wo["config"]["currency_symbol_array"] as $key => $value) {
    $wo["currencies"][] = array(
        "text" => $key,
        "symbol" => $value
    );
}
if (!empty($_GET["theme"])) {
    lui_CleanCache();
}
$wo["post_colors"] = array();
if ($wo["config"]["colored_posts_system"] == 1) {
    $wo["post_colors"] = lui_GetAllColors();
}


$wo['manage_pro_features'] = array('funding_request' => 'can_use_funding',
                                   'job_request' => 'can_use_jobs',
                                   'game_request' => 'can_use_games',
                                   'market_request' => 'can_use_market',
                                   'event_request' => 'can_use_events',
                                   'forum_request' => 'can_use_forum',
                                   'groups_request' => 'can_use_groups',
                                   'pages_request' => 'can_use_pages',
                                   'audio_call_request' => 'can_use_audio_call',
                                   'video_call_request' => 'can_use_video_call',
                                   'offer_request' => 'can_use_offer',
                                   'blog_request' => 'can_use_blog',
                                   'movies_request' => 'can_use_movies',
                                   'story_request' => 'can_use_story',
                                   'stickers_request' => 'can_use_stickers',
                                   'gif_request' => 'can_use_gif',
                                   'gift_request' => 'can_use_gift',
                                   'nearby_request' => 'can_use_nearby',
                                   'video_upload_request' => 'can_use_video_upload',
                                   'audio_upload_request' => 'can_use_audio_upload',
                                   'shout_box_request' => 'can_use_shout_box',
                                   'colored_posts_request' => 'can_use_colored_posts',
                                   'poll_request' => 'can_use_poll',
                                   'live_request' => 'can_use_live',
                                   'profile_background_request' => 'can_use_background',
                                   'affiliate_request' => 'can_use_affiliate',
                                   'chat_request' => 'can_use_chat');
$wo['available_pro_features'] = array();
$wo['available_verified_features'] = array();

foreach ($wo['manage_pro_features'] as $key => $value) {
    $wo['config'][$value] = true;
    if ($wo["loggedin"] && !empty($wo['user'])) {
        if ($wo['config'][$key] == 'verified' && !$wo['user']['verified']) {
            $wo['config'][$value] = false;
        }
        if ($wo['config'][$key] == 'admin' && !$wo['user']['admin']) {
            $wo['config'][$value] = false;
        }
        if ($wo['config'][$key] == 'pro' && !$wo['user']['is_pro']) {
            $wo['config'][$value] = false;
        }
        if ($wo['config'][$key] == 'pro' && $wo['user']['is_pro'] && !empty($wo["pro_packages"][$wo['user']['pro_type']]) && $wo["pro_packages"][$wo['user']['pro_type']][$value] != 1) {
            $wo['config'][$value] = false;
        }
        if ($wo['user']['admin']) {
            $wo['config'][$value] = true;
        }
    }
    if ($wo['config'][$key] == 'pro') {
        $wo['available_pro_features'][$key] = $value;
    }
    if ($wo['config'][$key] == 'verified') {
        $wo['available_verified_features'][$key] = $value;
    }
}
if (!$wo['config']['can_use_stickers']) {
    $wo['config']['stickers_system'] = 0;
}
if (!$wo['config']['can_use_gif']) {
    $wo['config']['stickers'] = 0;
}
if (!$wo['config']['can_use_gift']) {
    $wo['config']['gift_system'] = 0;
}
if (!$wo['config']['can_use_nearby']) {
    $wo['config']['find_friends'] = 0;
}
if (!$wo['config']['can_use_video_upload']) {
    $wo['config']['video_upload'] = 0;
}
if (!$wo['config']['can_use_audio_upload']) {
    $wo['config']['audio_upload'] = 0;
}
if (!$wo['config']['can_use_poll']) {
    $wo['config']['post_poll'] = 0;
}
if (!$wo['config']['can_use_background']) {
    $wo['config']['profile_back'] = 0;
}
if (!$wo['config']['can_use_chat']) {
    $wo['config']['chatSystem'] = 0;
}
$wo['config']['report_reasons'] = json_decode($wo['config']['report_reasons'],true);


$wo['config']['filesVersion'] = "4.7.15";

if ($wo['config']['filesVersion'] != $wo['config']['version']) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
header("Cache-Control: max-age=3600, public");