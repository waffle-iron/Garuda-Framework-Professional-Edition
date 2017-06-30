<?php

defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');

// Name space untuk router
use System\GF_Router as GF;



// Contoh ambil satu data berdasarkan kolom
GF::Route("get-single-data",function(){
	$user = new Data_User();


	$result = $user->getSingleData("id_user",5); 
	// Method diatas sama dengan
	// select id_user from t_user where id_user = 5
	
	var_dump($result);
});


// Contoh menghitung jumlah data di tabel user
GF::Route("count-data",function(){
	$user = new Data_User();

	$result = $user->countData();
	var_dump($result);
});

// Contoh insert data
GF::Route("insert-data",function(){
	$user = new Data_User();

	$result = $user->createUpdateDelete('abcd','abcd@gmail.com','abcde');

	var_dump($result);
});




/*
*  Contoh menggunakan Controller 
*  localhost/GF/user-login
*/
GF::Controller("user-login","User_Controller");


/*
*  Contoh menggunakan Controller 
*  localhost/GF/user-logout
*/
GF::Controller("user-logout","User_Controller","logout");



/*
* Contoh mengalihkan halaman 
* Dari localhost/GF/direct , menuju
* header("location : localhost/GF/home"); 
*/
GF::Route("direct",function(){
	
	GF::directTo("upload");
});