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


/*
* Contoh menggunakan emoji lokasi "system/GF_Helper"
* Kustom sendiri sesuai kebutuhan 
* localhost/GF/emoji
*/

GF::Route("emoji",function(){
	echo _emoji();
	echo "<hr>";
	echo _emoji('mens');
	echo "<hr>";
	echo _emoji('womans');
	echo "<hr>";
	echo _emoji('office');
	echo "<hr>";
	echo _emoji('toilet');
	echo "<hr>";
	echo _emoji('shower');
	echo "<hr>";
	echo _emoji('bicycle');
});


/*
* Contoh  1 membuat file Zip , "system/GF_Helper"
* Menggunakan custom nama file
* localhost/GF/zip1
*/

GF::Route("zip1",function(){
	// File yang akan di Zip
	$file_want_to_zip      =  array('example.png','php-creator.jpg','index.php');

	// nama file hasil akhir
	$file_name_to_zip        = array("1.png",'2.jpg','a.php');

	// File akhir dari Zip
	$filename_zip_end        = 'contoh-1.zip';

	// Direktori yang akan dituju
	$direktori_to_zip         = 'folder_zip/a/';

	$result = _createZip($file_want_to_zip,$file_name_to_zip,$filename_zip_end,$direktori_to_zip);
	var_dump($result);

	
});

/*
* Contoh 2 membuat file Zip , "system/GF_Helper"
* Menggunakan nama asli file 
* localhost/GF/zip2
*/

GF::Route("zip2",function(){
	// File yang akan di Zip sekaligus nama file hasil akhir
	$file_want_to_zip      =  array('example.png','php-creator.jpg','index.php');


	// File akhir dari Zip
	$filename_zip_end        = 'contoh-2.zip';

	// Direktori yang akan dituju
	$direktori_to_zip         = 'folder_zip/b/';

	$result = _createZip($file_want_to_zip,$file_want_to_zip,$filename_zip_end,$direktori_to_zip);
	var_dump($result);

});



/*
*  Contoh Router Untuk Menambah Data Dari Model-Dua
*/
GF::Route("insert",function(){
	$d = new Data();
	$d->insertData();
});

/*
*  Contoh Router Untuk Mengubah Data Dari Model-Dua
*/
GF::Route("update",function(){
	$d = new Data();
	$d->updateData("abc","abc@gmail.com",32);
});