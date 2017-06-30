<?php defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...'); ?>
<?=

/*
* 	Contoh simple template HTML 
* 	Sudah termasuk Meta Name, Description, Img, dll  
*	Sudah termasuk include bootstrap , JQuery , dan GF-1.js
*/
_title("Upload File");


_openBody();

/*
*  Lihat lokasi file pada "System/GF_HTHML.php"
*/

include 'head.php';
?>
	<hr>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading"></div>
			<div class="panel-body">  
				<form action="<?= __full_url__ ?>upload-semua-file" method="post" enctype="multipart/form-data">
					<input type="file" class="form-control" id="semua_jenis_file" name="semua_jenis_file">
					</br>
					<input type="submit" class="btn-default" value="Upload File" name="submit">
				</form>		
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
		

<div class="container">

  <div class="row">
  		
  		<div id="message_result">
  			
  		</div>

  </div>
</div>
	
	<script>
		var result 	 = "<?= $result_upload ?? '' ?>";
		var isset 	 = "<?= $isset ?? '' ?>";
		var message  = '<?= $message ?? "" ?>';
		var filename = "<?= $filename ?? '' ?>";
		

		if (result == true && isset == true )
		{
			// sweet alert dengan HTML 
			swal({
			  title: message,
			  text: message,
			  html: true
			});
	
		}
		else if (result==false && isset == true)
		{
			sweetAlert("Uppzz...", message, "error");
		}

	</script>	

<?=
_closeBody();
