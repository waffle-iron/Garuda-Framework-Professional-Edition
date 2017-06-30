<?php

/**
 * Garuda Framework Pro Edition 
 *
 * @package  GF-Pro
 * @author   Lamhot Simamora < lamhotsimamora36@gmail.com >
 *
 *
 */


ob_start();

/*
*  sys_run_app = The Front Of Security
*  you can change value of these sys_run_app
*  Thank you for Mr.@Harjito from PHP Indonesia Community
*/
defined('sys_run_app') or define('sys_run_app','anda_bisa_isi_nilai_ini_dengan_apa_saja') ;



/*
* Membuat constanta __APP_PATH__ untuk path directory
*/
defined('__APP_PATH__') or define('__APP_PATH__',  __DIR__."/") ;

/*
* Memasukkan file 'GF_Path.php'
*/
require_once 'system/GF_Path.php';
defined('__ext_php__') or define('__ext_php__', $GF_EXTENSION['PHP']);


require_once 'system/GF_Helper'.__ext_php__;

/*
* Jika file 'System/index.php' ditemukan maka
* Memasukkan file 'System/Index.php'
*/
$app = require_once 'system/index.php';
if (file_exists($app))
    return $app;



/*
*  If you respect me, i will respect you more
*  else
*  ....
*/