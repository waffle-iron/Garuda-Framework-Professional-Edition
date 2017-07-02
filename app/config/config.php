<?php
/**
 * Garuda Framework Pro Edition 
 *
 * @package  GF-Pro
 * @author   Lamhot Simamora < lamhotsimamora36@gmail.com >
 */

defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');

/*
* 	check validation Route apakah valid atau tidak -> GF_Anonymous.php
*/
 
$GF->validationRoute();

$class_database 	 = array('mysqli','pdo');

$database_use	     = array('mysql','microsoft_access','sqlite','sql_server','oracle');

$config_app 		 = array(
								'run_database'      =>	true,
								'multi_language'	=>	true,
								'class_database'    => $class_database[0],
								'database_use'	    => $database_use[0],
								'default_404_page'  => '404'
				 							 						                  );


$config_database 	= array(
							 'server_name'      => 'localhost',
							 'user_name'		=> 'root',
							 'database_name'	=> 'db_gf',
							 'password'			=> ''
							 							     );

$language_name     = array(
							'ind',
							'eng',
											);


$language_data 	= array(
							'indonesia',
							'english',
							          );


$cookie_config      = array(
							'name_language_cookie'  	 =>'app-language-GF',
							'default_value_language' 	 => $language_name[0]);


/*
*  Atur Nama File
*  =========================
*  - Library
*/
$_library_app    	= array(
							'phpmailer/PHPMailerAutoload',
							'phpqrcode/qrlib',
							'fpdf/fpdf',
							'Mobile_Detect/Mobile_Detect'
															);
/*
*  Atur Nama File
*  =========================
*  - Helper
*/
$_helper_app 		= array('MyHelper');


/*
*  Atur Nama File
*  =========================
*  - Router
*/
$_router_app		= array('Router-Satu',"Router-Dua",'Router-Tiga');

/*
*  Atur Nama File
*  =========================
*  - Controller
*/
$_controller_app 	= array('Controller-Satu');


/*
*  Atur Nama File
*  =========================
*  - Controller
*/
$_model_app 		= array('Model-Satu','Model-Dua');
