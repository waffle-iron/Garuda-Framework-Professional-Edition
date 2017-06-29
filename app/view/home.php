<?php $_SESSION['sys_run_app'] ?? exit('403 You dont have permission to access / on this server...'); ?>
<?=
/*
* 	Contoh simple template HTML 
* 	Sudah termasuk Meta Name, Description, Img, dll  
*	Sudah termasuk include bootstrap , JQuery , dan GF-1.js
*/

_title("Home");

_openBody();

/*
*  Lihat lokasi file pada "System/GF_HTHML.php"
*/


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
