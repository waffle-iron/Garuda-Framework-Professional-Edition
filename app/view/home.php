<?php defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...'); 

/*
* 	Contoh simple template HTML 
* 	Sudah termasuk Meta Name, Description, Img, dll  
*	Sudah termasuk include bootstrap , JQuery , dan GF-1.js
*   Lihat lokasi file pada "System/GF_HTML.php"
*/


// Membuat Object
$me = new Template_HTML;

// Membuat Judul HTML
$me->setTitle("Home");

/*
* Memasukkan Informasi Meta image,author,title,description,name,copyright
*/

$meta_html['image'] 		=	'example.png';
$meta_html['author'] 		=	'Lamhot Simamora';
$meta_html['title'] 		=	'Home';
$meta_html['description'] 	=	'Garuda Framework Pro';
$meta_html['name']        	=	'Garuda Framework Pro';
$meta_html['copyright']   	=	'Copyright@2017 All Right Reserved';

// Menyimpan Meta
$me->setMeta($meta_html);
// Memasukkan CSS jika ada
$me->setCSS("");
// Mengeluarkan hasil / output
$me->render();

include 'head.php';
?>
<hr>
<div class="container">
 
  <div class="panel panel-default">
    <div class="panel-body">
	
	<code>
		Bootstrap, JQuery , GF-1.Js, & Sweet Alert Inside
	</code>
    </div>
  </div>
</div>






<?=
_closeBody();
