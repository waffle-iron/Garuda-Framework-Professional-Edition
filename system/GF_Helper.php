<?php
/**
 * Garuda Framework Pro Edition 
 *
 * @package  GF-Pro
 * @author   Lamhot Simamora < lamhotsimamora36@gmail.com >
 */
$_SESSION['sys_run_app'] ?? exit('403 You dont have permission to access / on this server...');



/*
* Membuat constanta __ext_html__ untuk extensi html
*/
_def('__ext_html__', $GF_EXTENSION['HTML']);


/*
* Membuat constanta __STORAGE_DIR__ untuk nama direktori storage
*/
_def('__STORAGE_DIR__', __APP_PATH__.$GF_PATH['GF_APP_DIR'].$GF_PATH['GF_STORAGE']) ;



/*
* Membuat constanta __VIEW_DIR__ untuk nama direktori view
*/
_def('__VIEW_DIR__',__APP_PATH__.$GF_PATH['GF_APP_DIR'].$GF_PATH['GF_View_DIR']) ;



/*
* Membuat constanta __DIR_NAME__ untuk nama direktori
*/

_def('__DIR_NAME__',$GF_PATH['GF_DIR_NAME']) ;


function _file_get_contents_curl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

function _startMicroTime() 
{
	list($usec, $sec) = explode(" ", microtime()); 
	return ((float)$usec + (float)$sec);
}


function _compressImage($source_url='', $destination_url='', $quality=50) 
{
	
	$info = getimagesize($source_url);
	switch ($info['mime']) {
		case 'image/jpeg':
			$image = imagecreatefromjpeg($source_url);
			break;
		case 'image/gif':
			$image = imagecreatefromgif($source_url);
			break;
		case 'image/png':
			$image = imagecreatefrompng($source_url);
			break;
		default:
			$image = imagecreatefromjpeg($source_url);
			break;
	}
	imagejpeg($image, $destination_url, $quality);
	return true;
}  

function _sha1($str)
{
  $result = trim($str);
  $result = base64_encode(sha1($result));
  return $result;
}


function _filterStrASCII($str)
{
  // The following example uses the filter_var() function to sanitize a string. It will both remove all HTML tags, 
  // and all characters with ASCII value > 127, from the string:
  return filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
}


function _checkSession($key)
{
	return isset($_SESSION[$key]) ? true : false;
}



function _replaceSq($val='')
{
	return str_replace("'", "", trim($val));
}
function _fixString($str)
{
  $res = addslashes($str);
  $res = str_replace("%HASTAG%", "#",$res);
  
  return $res;
}

function _replaceHtml($str){
	$res = str_replace("<input type=\"file\">", "input file", $str);
	$res = str_replace("<input type='file'>", "input file", $res);
	$res = str_replace("<input type='text'>", "input text", $res);
	$res = str_replace("<input type=\"text\">", "input text", $res);
	$res = str_replace("</button>", "button", $res);
	$res = str_replace("<button>", "button", $res);
	$res = str_replace("<a href=", "a href", $res);
	$res = str_replace("body { background-color:", "body background", $res);
	$res = str_replace("<style>", "style", $res);
	$res = str_replace("</style>", "style", $res);
	$res = str_replace("<b>", "b", $res);
	$res = str_replace("</b>", "b", $res);
	$res = str_replace("<i>", "i", $res);
	$res = str_replace("</i>", "i", $res);
	$res = str_replace("<title>", "title", $res);
	$res = str_replace("</title>", "title", $res);
	$res = str_replace("<head>", "head", $res);
	$res = str_replace("</head>", "head", $res);
	$res = str_replace("</body>", "body", $res);
	$res = str_replace("<body>", "body", $res);
	$res = str_replace("<hr>", "hr", $res);
	$res = str_replace("</hr>", "hr", $res);
	$res = str_replace("<body bgcolor=", "body", $res);
	$res = str_replace("<body bgcolor='", "body", $res);
	$res = str_replace("<html>", "html", $res);
	$res = str_replace("</html>", "html", $res);
	$res = str_replace("<!--", "Tag Comment", $res);
	$res = str_replace("-->", "Tag Comment", $res);
	return $res;
}
function _outputHTML($str)
{ 
    $search  = Array("--", "*", "\*", "^", "\^");
    $replace = Array("<\hr>", "<b>", "<\b>", "<sup>", "<\sup>");
    $res = str_replace($search, $replace , $string);
    echo $res;
 }

function _replaceMaster($str)
{
	$res = str_replace("#", "%HASTAG%",$str);
	$res = str_replace("<?php", "tag php",$res);
	return $str;
}

function _createSession($key,$val)
{
	$_SESSION[$key] = $val;
}

function _getSession($key)
{
	return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
}


function _md5($str)
{ 
	$str = addslashes($str);
	$tot = strlen(trim($str));
	return md5($str.$tot);
}


function _unparseUrl($parsed_url) 
{ 
  $scheme   = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : ''; 
  $host     = isset($parsed_url['host']) ? $parsed_url['host'] : ''; 
  $port     = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : ''; 
  $user     = isset($parsed_url['user']) ? $parsed_url['user'] : ''; 
  $pass     = isset($parsed_url['pass']) ? ':' . $parsed_url['pass']  : ''; 
  $pass     = ($user || $pass) ? "$pass@" : ''; 
  $path     = isset($parsed_url['path']) ? $parsed_url['path'] : ''; 
  $query    = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : ''; 
  $fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : ''; 
  return "$scheme$user$pass$host$port$path$query$fragment"; 
} 



function _randomStr($length=10)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function _encode($str)
{
	return base64_encode(trim($str));
}

function _decode($str)
{
	return base64_decode(trim($str));
}


function _createCookie($var,$val)
{ 
	return setcookie("$var", "$val", time() + (10 * 365 * 24 * 60 * 60), "/") ? true : false;
}


function _checkCookie($key) 
{ 
    return isset($_COOKIE[$key]) ? true : false ;
}

function _destroyCookie($var) 
{
	return setcookie("$var", "", -1, "/") ? true : false;
}

function _getCookie($key){
	return _checkCookie($key) ? $_COOKIE[$key] : false; 
}

function _getDate()
{ 
	date_default_timezone_set(__Time_Zone__); 
	$d      = date('Y/m/d'); 
    return $d;
}
function _getTime()
{ 
	date_default_timezone_set(__Time_Zone__); 
	$t      = date('H:i');
	return $t;
}
function _def($key,$value)
{
	defined($key) or define($key, $value);
}

function _checkInternet()
{
	$connected = @fsockopen("www.google.com", 80); 

	if ($connected){
	$is_conn = true; 
	fclose($connected);
	}
	else
	{
	$is_conn = false; 
	}
	return $is_conn;
}

function _getFileType($val)
{
	$filetype        = pathinfo(($val),PATHINFO_EXTENSION);
	$filetype        = strtolower($filetype);   
	return $filetype;        
}


function e($val)
{
	echo $val;
}

function _bin2hex(int $val)
{
	$bytes = random_bytes($val);
    return (bin2hex($bytes));
}

// Method ini untuk emoji, silahkan di kustom sendiri
function _emoji($val)
{

	$_COPYRIGHT_SIGN = "\u{00A9}";
	$_REGISTERED_SIGN = "\u{00AE}";
	$_MAHJONG_TILE_RED_DRAGON = "\u{1F004}";
	$_PLAYING_CARD_BLACK_JOKER = "\u{1F0CF}";
	$_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_A = "\u{1F170}";
	$_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_B = "\u{1F171}";
	$_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_O = "\u{1F17E}";
	$_NEGATIVE_SQUARED_LATIN_CAPITAL_LETTER_P = "\u{1F17F}";
	$_NEGATIVE_SQUARED_AB = "\u{1F18E}";
	$_SQUARED_CL = "\u{1F191}";
	$_SQUARED_COOL = "\u{1F192}";
	$_SQUARED_FREE = "\u{1F193}";
	$_SQUARED_ID = "\u{1F194}";
	$_SQUARED_NEW = "\u{1F195}";
	$_SQUARED_NG = "\u{1F196}";
	$_SQUARED_OK = "\u{1F197}";
	$_SQUARED_SOS = "\u{1F198}";
	$_SQUARED_UP_WITH_EXCLAMATION_MARK = "\u{1F199}";
	$_SQUARED_VS = "\u{1F19A}";
	$_FLAG_FOR_ASCENSION_ISLAND = "\u{1F1E6}\u{1F1E8}";
	$_FLAG_FOR_ANDORRA = "\u{1F1E6}\u{1F1E9}";
	$_FLAG_FOR_UNITED_ARAB_EMIRATES = "\u{1F1E6}\u{1F1EA}";
	$_FLAG_FOR_AFGHANISTAN = "\u{1F1E6}\u{1F1EB}";
	$_FLAG_FOR_ANTIGUA_AND_BARBUDA = "\u{1F1E6}\u{1F1EC}";
	$_FLAG_FOR_ANGUILLA = "\u{1F1E6}\u{1F1EE}";
	$_FLAG_FOR_ALBANIA = "\u{1F1E6}\u{1F1F1}";
	$_FLAG_FOR_ARMENIA = "\u{1F1E6}\u{1F1F2}";
	$_FLAG_FOR_ANGOLA = "\u{1F1E6}\u{1F1F4}";
	$_TENNIS_RACQUET_AND_BALL = "\u{1F3BE}";
	$_SKI_AND_SKI_BOOT = "\u{1F3BF}";
	$_BASKETBALL_AND_HOOP = "\u{1F3C0}";
	$_CHEQUERED_FLAG = "\u{1F3C1}";
	$_SNOWBOARDER = "\u{1F3C2}";
	$_RUNNER = "\u{1F3C3}";
	$_SURFER = "\u{1F3C4}";
	$_SPORTS_MEDAL = "\u{1F3C5}";
	$_TROPHY = "\u{1F3C6}";
	$_HORSE_RACING = "\u{1F3C7}";
	$_AMERICAN_FOOTBALL = "\u{1F3C8}";
	$_RUGBY_FOOTBALL = "\u{1F3C9}";
	$_SWIMMER = "\u{1F3CA}";
	$_WEIGHT_LIFTER = "\u{1F3CB}";
	$_GOLFER = "\u{1F3CC}";
	$_RACING_MOTORCYCLE = "\u{1F3CD}";
	$_RACING_CAR = "\u{1F3CE}";
	$_CRICKET_BAT_AND_BALL = "\u{1F3CF}";
	$_VOLLEYBALL = "\u{1F3D0}";
	$_FIELD_HOCKEY_STICK_AND_BALL = "\u{1F3D1}";
	$_ICE_HOCKEY_STICK_AND_PUCK = "\u{1F3D2}";
	$_TABLE_TENNIS_PADDLE_AND_BALL = "\u{1F3D3}";
	$_SNOW_CAPPED_MOUNTAIN = "\u{1F3D4}";
	$_CAMPING = "\u{1F3D5}";
	$_BEACH_WITH_UMBRELLA = "\u{1F3D6}";
	$_BUILDING_RUCTION = "\u{1F3D7}";
	$_HOUSE_BUILDINGS = "\u{1F3D8}";
	$_CITYSCAPE = "\u{1F3D9}";
	$_DERELICT_HOUSE_BUILDING = "\u{1F3DA}";
	$_CLASSICAL_BUILDING = "\u{1F3DB}";
	$_DESERT = "\u{1F3DC}";
	$_DESERT_ISLAND = "\u{1F3DD}";
	$_NATIONAL_PARK = "\u{1F3DE}";
	$_STADIUM = "\u{1F3DF}";
	$_HOUSE_BUILDING = "\u{1F3E0}";
	$_HOUSE_WITH_GARDEN = "\u{1F3E1}";
	$_OFFICE_BUILDING = "\u{1F3E2}";
	$_JAPANESE_POST_OFFICE = "\u{1F3E3}";
	$_EUROPEAN_POST_OFFICE = "\u{1F3E4}";
	$_HOSPITAL = "\u{1F3E5}";
	$_BANK = "\u{1F3E6}";
	$_AUTOMATED_TELLER_MACHINE = "\u{1F3E7}";
	$_HOTEL = "\u{1F3E8}";
	$_LOVE_HOTEL = "\u{1F3E9}";
	$_CONVENIENCE_STORE = "\u{1F3EA}";
	$_SCHOOL = "\u{1F3EB}";
	$_DEPARTMENT_STORE = "\u{1F3EC}";

	$val = strtolower($val);

	switch ($val) {
		case 'copyright':
			return $_COPYRIGHT_SIGN;
			break;
		case 'office':
			return $_OFFICE_BUILDING;
			break;
	
		default:
			# code...
			break;
	}
}

function create_zip($files = array(),$destination = '',$overwrite = false) 
{
	
	if(file_exists($destination) && !$overwrite) { return false; }
	
	$valid_files = array();

	if(is_array($files)) {
	
		foreach($files as $file) {
		
			if(file_exists($file)) {
				$valid_files[] = $file;
			}
		}
	}
	
	if(count($valid_files)) {
	
		$zip = new ZipArchive();
		if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
			return false;
		}
	
		foreach($valid_files as $file) {
			$zip->addFile($file,$file);
		}
	
		$zip->close();
	
		return file_exists($destination);
	}
	else
	{
		return false;
	}
}

