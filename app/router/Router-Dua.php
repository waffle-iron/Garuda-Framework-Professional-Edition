<?php

defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');

// Name space untuk router
use System\GF_Router as GF;

// Name space untuk file
use System\GF_File as File;

// Name space untuk uplaod file gambar maupun semua jenis file
use System\GF_Upload as Upload;


// Contoh Untuk Upload Gambar 
GF::Route("upload",function(){
	
	$data 		= array();
	$boolean 	= array();
	$boolean['isset']  = false;
	if (isset($_POST['submit']))
	{
		// gunakan method berikut ini jika file yang diupload adalah gambar
		// jika semua jenis file, maka hapus method berikut ini
		Upload::setImageOnly();

		// gunakan method berikut ini untuk compress gambar
		Upload::setCompressImage(60);

		// gunakan method berikut ini untuk membuat $_FILES['file_name'] dari Form 
		Upload::setFileUpload("file_user");

		// gunakan method berikut ini untuk mengecheck apakah file ada atau tidak
		$check = Upload::isEmpty();
			
		if ($check)
		{
			// membuat nama file dengan random string 4 length
			$filename = _randomStr(4);
			
			// memasukkan nama file  
			Upload::setFileName($filename);

			// memasukkan path di storage default -> "app/storage/example"
			Upload::setPath('example');

			// membuat batasan ukuran file maximum 2 MB
			Upload::setMaxSize(2000000);

			// mengecheck apakah file adalah gambar
			$isImage = Upload::isImage();

			// Jika gambar maka
		    if ($isImage)
		 	{
		 		// lakukan upload
				$do = Upload::do();
		    	
		    	// memasukkan hasil upload kedalam array
		    	$data['message'] = $do;
		    	$boolean['result_upload'] = true;
		    	$boolean['isset']  = true;
		    	// mengambil extension file
		    	$data['filename']  = $filename.Upload::getExtension();
 		    }
		    else
		    {
		    	$data['message'] = 'File is not image !';
		    	$boolean['result_upload'] = false;
		    	$boolean['isset']  = true;
		    	$data['filename']  = false;
		    }
		}
		else
		{
			$data['message'] = 'File is empty !';
			$boolean['result_upload'] = false;
			$boolean['isset']  = true;
			$data['filename']  = false;
		}
	}

	// membuat halaman view 'upload.php'
	// dengan mengekstrak array $data dan $boolean menjadi variabel
	GF::setView("upload",$data,$boolean);
});

// Contoh Untuk Upload Semua Jenis File, Kecuali file .php, .html , .php5 , .php7 
// Lihat di "app/system/GF_System.php"

GF::Route("upload-semua-file",function(){

	$boolean['result_upload'] = false;
	$boolean['isset']         = false;
	$data['message'] 		  = '';

	if (isset($_POST['submit']))
	{
		$boolean['isset']         = true;
		// gunakan method berikut ini untuk membuat $_FILES['file_name'] dari Form 
		Upload::setFileUpload("semua_jenis_file");

		// gunakan method berikut ini untuk mengecheck apakah file ada atau tidak
		$check = Upload::isEmpty();
			
		if ($check)
		{
			// membuat nama file dengan random string 4 length
			$filename = _randomStr(4);
			
			// jika method ini dihilangkan, maka nama file adalah original dari form input 
			// Upload::setFileName($filename);

			// memasukkan path di storage default -> "app/storage/example"
			Upload::setPath('example');

			// membuat batasan ukuran file maximum 1 MB
			Upload::setMaxSize(1000000);

		
			$do = Upload::do();
		    	
	    	// memasukkan hasil upload kedalam array
	    	$data['message'] = $do;
	    	$boolean['result_upload'] = true;
	    	// mengambil extension file
	    	$data['filename']  = $filename.Upload::getExtension();
		}
		else
		{
			$data['message'] = "Pilih file terlebih dahulu ...";
			$boolean['result_upload'] = false;
		}
	}

	GF::setView("upload-semua-file",$boolean,$data);

});


// Untuk halaman Data 
GF::Route("Data");

// Untuk halaman delete image 
GF::Route("delete-image",function(){
	$filename  = ($_POST['filename']) ?? false ;

	if ($filename != false )
	{
		// memasukkan path di storage 
		File::setPath('example/'.$filename);

		// menghapus file
		$result = File::deleteFile();

		// Check apakah true 
		if ($result)
		{
			e('T');
		}
		else
		{
			e("F");
		}
	
	}
	else
	{
		exit("F");
	}
});

// Contoh halaman ajax-insert dengan method POST 
GF::Route("ajax-insert",function(){
	$name  = ($_POST['u']) ?? false ;
	$email = ($_POST['e']) ?? false ;
	$pswrd = ($_POST['p']) ?? false ;

	
	if ($name != false && $email != false && $pswrd != false)
	{
		$user = new Data_User();

		$user->setUsername($name);
		$user->setEmail($email);
		$user->setPassword($pswrd);

		$result = $user->insertData();
		
		if ($result)
		{
			e('T');
 		}
		else
		{
			e('F');
		}
	}
	else
	{
		e('F');
	}
});

// Contoh halaman ajax-update dengan method GET 
GF::Route("ajax-update/{ id_user } / { username } / { email } / { password }",function($get=''){
	$id_user  	= $get['id_user'] ?? false ;
	$username 	= $get['username'] ?? false ;
	$email 		= $get['email'] ?? false ;
	$password 	= $get['password'] ?? false ;


	if ($id_user != false && $username != false && $email != false && $password != false)
	{
		$user = new Data_User();
		$user->setIdUser($id_user);
		$user->setUsername($username);
		$user->setEmail($email);
		$user->setPassword($password);

		$result = $user->updateData();
	
		if ($result)
		{
			e('T');
 		}
		else
		{
			e('F');
		}
	}
	else
	{
		e('F');
	}
});

// Untuk halaman load-data-tabel 
GF::Route("load-data",function(){
	$token  	= $_POST['token'] ?? false ;

	if ($token != false)
	{
		
		$user = new Data_User();

		// Check jumlah data 
	    $check_count = $user->countData();
	  
	  	// Jika jumlah data lebih dari 0
	    if ($check_count>0)
	    {
	    	// Maka ambil seluruh data
			$result = $user->getAll();
			
			// Membuat template tabel
			$data_table='<div class="table-responsive"><table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>No</th>
					        <th>Username</th>
					        <th>Email</th>
					        <th>Password</th>
					        <th>Action</th>
					      </tr>
					    </thead>
							<tbody>';
			$i=1;
			// Looping data
			foreach ($result as $data => $user) 
			{
				$data_table .= ' <tr>
				        <td>' . $i. '</td>
				        <td>' . _fixString($user['username']). '</td>
				        <td>' . _fixString($user['email']). '</td>
		                <td>' . $user['pass']. '</td>
		                <td>
		                	<button type="button" id="'.$user['id_user'].'" class="btn btn-default btn-xs" onclick="showModalEdit(this.id)">Edit</button>
		                	<button type="button" id="'.$user['id_user'].'" class="btn btn-danger btn-xs" onclick="deleteData(this.id)">Delete</button>
	                	</td> </tr>
				      ';
			      	$i++;
			}
			$data_table .= '</tbody></table></div>';
			echo $data_table;
	    }
	    else
	    {
	    	echo "F";
	    }

	}
	else
	{
		exit("404 Page Not Found");
	}
});

// Contoh halaman ajax-delete dengan method POST 
GF::Route("ajax-delete",function(){
	$id_user  = ($_POST['id']) ?? false ;

	if ($id_user != false)
	{
		$user = new Data_User();
		$user->setIdUser($id_user);

		$result = $user->deleteData();

		if ($result)
		{
			e("T");
		}
		else
		{
			e("F");
		}
	}
	else
	{
		e("F");
	}
});
