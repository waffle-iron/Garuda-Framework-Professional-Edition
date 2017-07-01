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
			<div class="panel-heading"></div>
			<div class="panel-body">  
				<form action="<?= __full_url__ ?>upload" method="post" enctype="multipart/form-data">
					<input type="file" class="form-control" id="file_user" name="file_user">
					<img src="" alt="" id="preview_image" width="200" height="200">
					</br>
					<input type="submit" class="btn-default" value="Upload" name="submit">
				</form>		
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
		

<div class="container">
  <h2>Image Gallery</h2>
 
  <div class="row">
  		
  		<div id="load_image">
  			
  		</div>

  </div>
</div>
	
	<script>
		var result 	 = "<?= $result_upload ?? '' ?>";
		var message  = "<?= $message ?? '' ?>";
		var isset  	 = "<?= $isset ?? '' ?>";
		var filename = "<?= $filename ?? '' ?>";
		var get_data_image = _getById("load_image").innerHTML;

	 
		if (result == true && isset == true)
		{
			
		
			swal("Good Upload !",message, "success");

			var template =  '<div class="col-md-4"> <div class="thumbnail"> <a href="'+full_url+'app/storage/example/'+filename+'" target="_blank"><img src="'+full_url+'app/storage/example/'+filename+'" alt="Lights" style="width:100%"> <div class="caption"> <p>Filename : '+filename+'</p>  </a> <button type="button" id="btn_delete" name="'+filename+'" class="btn btn-danger btn-md" onclick="deleteImage(this.id);">x</button></div></div> </div>';

			if (get_data_image != '')
			{
				_printTo("load_image",get_data_image+template);
			}
			else
			{
				_printTo("load_image",template);
			}
		
		}
		else if (result == false && isset == true)
		{
			sweetAlert("Uppzz...", message, "error");
		}


		function deleteImage(str){
			 var filename = _getById(str).name;

			 _requestPOST(full_url+"delete-image","filename="+filename+"",function(res){
			 		if (res)
			 		{
			 			swal("Gambar sudah dihapus !","Berhasil Menghapus gambar !", "success");
			 			_printTo("load_image","");
			 		}
			 		else
			 		{
			 			sweetAlert("Uppzz...", "Gagal Menghapus gambar !", "error");
			 		}
			 });
		}
	 // method untuk menampilkan gambar sebelum diupload 
	
	  _previewImage("file_user","preview_image");
		
	</script>	

<?=
_closeBody();
