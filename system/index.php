<?php

/**
 * Garuda Framework Pro Edition 
 *
 * @package  GF-Pro
 * @author   Lamhot Simamora < lamhotsimamora36@gmail.com >
 */


defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');


require_once $GF_PATH['GF_Production'].__ext_php__;

$app_production['notice_error'] ? error_reporting(E_ALL) :  error_reporting(0);


require_once $GF_PATH['GF_System'].__ext_php__;
use System\GF_Requirements as REQUIREMENT;
REQUIREMENT::checkPHPVersion();

require_once $GF_PATH['GF_Anonymous'].__ext_php__;


use System\GF_URL as GET;
use System\GF_Router as SYS;



_def('__full_url__',GET::fullUrl());

_def('__view_url__',__full_url__."app/view/");
require_once 'system/GF_HTML'.__ext_php__;


_def('__production__',$app_production['maintenance']);

_def('__URI_GET_PARAMETER__',$app_production['uri_parameter']);

_def('__GF_Image_Error__',$GF_PATH['GF_Image_Error']);

_def('__Time_Zone__',$app_production['time_zone']);


$app_production['start_benchmark'] ? _def('__Time_Start__',_startMicroTime()) : '';

$app_production['maintenance'] ? SYS::errorPage($app_production['file_maintenance']) 
: require_once 'app/config/index'.__ext_php__;

