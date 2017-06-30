<?php defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...'); ?>


<div class="container">
	<center>	<h3 class="well well-lg"><?= __welcome__ ?? '' ?></h3>
	<img src="<?= __full_url__."app/storage/example.png" ?>" class="img-thumbnail" alt="GF" width="304" height="236"></center><hr>
	 <div class="panel panel-default">
	 	<div class="panel-body">Ready To Create Smart App ?
 		
		 <a href="#" data-toggle="popover" title="Popover Header" data-content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		 proident, sunt in culpa qui officia deserunt mollit anim id est laborum."> Where do you want to Go ?</a>
		 <a onclick="changeLanguage();" data-toggle="tooltip" title="Example Change Language"><span style="cursor: pointer"> Bahasa || Language </a>
		 </div>
	
		
	</div>
	<div id="animation_bootstrap"></div>
	<div class="panel panel-default">
			<div class="panel-body"> 
					<a href="./dokumentasi/" target="_blank">
						Lihat Dokumentasi
					</a>
			</div>

			<div class="panel-body">
				<?php
				$end    = _startMicroTime();
				$result = $end - __Time_Start__;

				echo "Rendering Page  : ".$result." S";
				
				?>
			</div>

	</div>
	
</div>
<div class="container">
		<center>

		<button type="button" class="btn btn-primary" onclick="_openUrl(full_url+'home');">
		  <span class="glyphicon glyphicon-home"></span> Home
		</button>
		<button type="button" class="btn btn-primary" onclick="_openUrl(full_url+'upload');">
		  <span class="glyphicon glyphicon-file"></span> Upload Gambar
		</button>
		<button type="button" class="btn btn-primary" onclick="_openUrl(full_url+'upload-semua-file');">
		  <span class="glyphicon glyphicon-lightbulb"></span> Upload File
		</button>
		<button type="button" class="btn btn-primary" onclick="_openUrl(full_url+'data');">
		  <span class="glyphicon glyphicon-pencil"></span> Data
		</button>

		<button type="button" class="btn btn-primary" onclick="_openUrl(full_url+'sweet-alert');">
		  <span class="glyphicon glyphicon-leaf"></span> Sweet Alert
		</button>
		<br><br>
		<button type="button" class="btn btn-success" onclick="_openUrl(full_url+'qrcode');">
		  <span class="glyphicon glyphicon-pencil"></span> QRCode
		</button>
		<button type="button" class="btn btn-success" onclick="_openUrl(full_url+'pdf');">
		  <span class="glyphicon glyphicon-pencil"></span> PDF
		</button>
		<br><br>
		<button type="button" class="btn btn-warning" onclick="_newForm(false,full_url+'api/abcde');">
		  <span class="glyphicon glyphicon-tint"></span> Example API
		</button>
		<br><br>
		<button type="button" id="btn_big_modal" class="btn btn-default">
		  <span class="glyphicon glyphicon-fire"></span> Big Modal
		</button>
		<button type="button" id="btn_small_modal" class="btn btn-default">
		  <span class="glyphicon glyphicon-fire"></span> Small Modal
		</button>
	
		</center>
</div>

<?php
/*
* Contoh membuat Modal Bootstrap
*/
e(_createModal("big","Welcome to Garuda Framework","Are you ready ?","large"));
e(_createModal("small","Welcome to Garuda Framework","Are you ready ?"));
?>

<script>
	_animation("animation_bootstrap");
	
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover();

		_onClick("btn_big_modal",function(){

			$('#big').modal("show");
		});
		_onClick("btn_small_modal",function(){
			
			$('#small').modal("show");
		});
	});


	function changeLanguage(){
		_loadDoc(full_url+"change-language",function(res){
			_refresh();
		});
	}

</script>
