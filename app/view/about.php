<?php defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...'); ?>
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

?>

		<div class="container">
			<center>	<h2 class="well well-lg">Welcome To Garuda Framework PHP</h2>
			<img src="<?= __view_url__."img/GF-1-big.png" ?>" class="img-thumbnail" alt="GF" width="304" height="236"></center><hr>
			 <div class="well well-sm">Ready To Create Smart Application ?</div>
				 <a href="#" data-toggle="popover" title="Popover Header" data-content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.">
			 Where do you want to go ?</a>
		</div>
		<hr>
		<div class="container">

			<button type="button" class="btn btn-default" onclick="_openUrl(full_url+'home');">Home</button>
			<button type="button" class="btn btn-primary" onclick="_openUrl(full_url+'profile');">Profile</button>
			<button type="button" class="btn btn-success" onclick="_openUrl(full_url+'about');">About</button>
			<button type="button" id="" class="btn btn-warning" onclick="_openUrl(full_url+'library')">Library</button>

			<button type="button" id="btn_open_modal" class="btn btn-info" >Open Modal</button>
		</div>
		<hr>
		<div class="container">
		  <h2>Lorem Ipsum</h2>
		  <div class="panel panel-default">
		    <div class="panel-body">Lorem Ipsum</div>
		  </div>
		</div>


		<script>
			$(document).ready(function(){
				$('[data-toggle="popover"]').popover();
				});

			_onClick("btn_open_modal",function(){
					$('#login').modal("show");
			});
		</script>

		<?=
		_createModal("login","Login ","Please Login");
		?>

<?=
_closeBody();
