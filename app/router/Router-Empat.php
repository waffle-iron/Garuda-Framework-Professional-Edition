<?php

defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');


use System\GF_Router as GF;


/*
* Berikut adalah contoh untuk menggunakan $_GET yang biasanya pada PHP
* localhost/GF/standart-get&id_user=1
*/

GF::Route("standart-get",function(){
	$id_user = $_GET['id_user'] ?? false;

	echo "ID User Dari Get : ".$id_user;
});


/*
* Berikut adalah contoh untuk menggunakan $_POST yang biasanya pada PHP
* localhost/GF/example-post
*/
GF::Route("example-post",function(){
	$id_user = $_POST['id_user'] ?? false;

	echo "ID User Dari POST : ".$id_user;
});