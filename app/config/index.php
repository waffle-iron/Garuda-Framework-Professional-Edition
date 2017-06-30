<?php
/**
 * Garuda Framework Pro Edition 
 *
 * @package  GF-Pro
 * @author   Lamhot Simamora < lamhotsimamora36@gmail.com >
 */

defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');


include 'config.php';

use System\GF_Router as GF;


/*
* Check apakah database diaktifkan atau tidak
*/
if ($config_app['run_database'])
{

	_def('database_use',$config_app['database_use']);

	_def('a32asdasd23das',$config_database['server_name']);
	_def('gasd232adasas',$config_database['user_name']);
	_def('gash2232232asd',$config_database['database_name']);
	_def('gasgs2321123sd',$config_database['password']);


	GF::setDatabase($config_app['class_database']);
	GF::setModel($_model_app[0]);
}


/*
* Check apakah multi languange di aktifkan ?
*/
if ($config_app['multi_language'])
{
	_def('__COOKIE_KEY_LANGUAGE__',$cookie_config['name_language_cookie']);
	
	if (_checkCookie(__COOKIE_KEY_LANGUAGE__))
	{
		$get_value_cookie = $_COOKIE[__COOKIE_KEY_LANGUAGE__];
		$get_value_cookie = strtolower($get_value_cookie);

		$key = array_search($get_value_cookie, $language_name);

		$key ? GF::setLanguange($language_data[$key]) : GF::setLanguange($language_data[0]);

	}
	else
	{
		_createCookie($cookie_config['name_language_cookie'], $cookie_config['default_value_language']);
		header("refresh:0");
		exit();
	}

}



/*
* Mendaftarkan file library kedalam aplikasi
*/
$count_library = count($_library_app);
if ($count_library==1)
{
	GF::setLibrary($_library_app[0]);
}
else
{
	for ($i=0; $i < $count_library ; $i++) {
		GF::setLibrary($_library_app[$i]);
	}
}

/*
* Mendaftarkan file helper kedalam aplikasi
*/
$count_helper = count($_helper_app);
if ($count_helper==1)
{
	GF::setHelper($_helper_app[0]);
}
else
{
	for ($i=0; $i < $count_helper ; $i++) {
		GF::setHelper($_helper_app[$i]);
	}
}

/*
* Mendaftarkan file controller kedalam aplikasi
*/
$count_controller = count($_controller_app);
if ($count_controller==1)
{
	GF::setController($_controller_app[0]);
}
else
{
	for ($i=0; $i < $count_controller ; $i++)
	{
		GF::setController($_controller_app[$i]);
	}
}


/*
* Mendaftarkan file router kedalam aplikasi
*/
$count_router = count($_router_app);
use System\GF_message as Error;
if ($count_router==0)
{
	exit(Error::showError("ROUTER_NULL"));
}
else if ($count_router==1)
{
    GF::setRouter($_router_app[0]);
}
else
{
   for ($i=0; $i < $count_router ; $i++) {
		GF::setRouter($_router_app[$i]);
	}
}



/*
* Jika router dan controller tidak valid
* Maka akan menjalankan error page
*/
GF::errorPage($config_app['default_404_page']);
