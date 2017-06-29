<?php

/**
 * Garuda Framework Pro Edition 
 *
 * @package  GF-Pro
 * @author   Lamhot Simamora < lamhotsimamora36@gmail.com >
 */


ob_start();
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

