<?php

$_SESSION['sys_run_app'] ?? exit('403 You dont have permission to access / on this server...');

// Name space untuk router
use System\GF_Router as GF;
// Name space untuk file
use System\GF_File as File;

/*
	Router Satu untuk halaman Home, Profile, About, Sweet-Alert
	pdf, dan Qrcode
*/


GF::Route("","Home");
GF::Route("Home");
GF::Route("profile");
GF::Route("about");
GF::Route("sweet-alert","sweetalert");



/*
*  Contoh untuk membuat file library PDF "localhost/GF/pdf"
*/

GF::Route("pdf",function(){
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,10,'Welcome To Garuda Framework Professional Edition !!! ');
	$pdf->Output();
});


/*
*  Contoh untuk membuat file library QR Code "localhost/GF/QrCode"
*/
GF::Route('QrCode',function(){
	$isi_teks 	= _randomStr();
	$namafile 	= $isi_teks.".png";
	$quality 	= 'H'; 
	$ukuran 	= 10; 
	$padding 	= 0;

	$tempdir 	= __APP_PATH__."app/storage/example/";

	QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);


	$data_qrcode = array('qrcode1',$namafile);

	echo "Lokasi : ".$tempdir;
	echo "</br>";
	var_dump($data_qrcode);
});


/*
*  Contoh untuk mendapatkan tanggal dan jam "localhost/GF/date"
*/
GF::Route("date",function(){
	$tanggal = _getDate();
	$jam     = _getTime();

	echo $tanggal. " , ".$jam;
});


/*
* Contoh menggunakan library Mobile Detect
*/

function isMobile(){
	$detect = new Mobile_Detect;


	if($detect->isTablet() || $detect->isMobile()){
	  	return true;
	}
	else
	{
		return false;
	}
}
/*
* Contoh menggunakan library Mobile Detect "localhost/GF/mobile-detect"
*/

GF::Route("mobile-detect",function(){
	if (isMobile())
	{
		echo "Device is Mobile";
	}
	else
	{
		echo "Device is Dekstop";
	}
});


/*
* Contoh untuk download file
*/

// Syntax download file
GF::Route("download",function($get=''){
	$result = File::setPath("example.png");

	$result ? File::download() : exit("File is nothing");
	
});


/*
*  Contoh multi language 
*/

GF::Route("change-language",function(){
	// check apakah define cookie sudah ada
	$value = __COOKIE_KEY_LANGUAGE__  ?? false;
	
	// Jika ada
	if ($value != false)
	{
		// Ambil nilai cookie 
		$value = _getCookie(__COOKIE_KEY_LANGUAGE__);
		
		// Jika sama dengan 'ind'
		if ($value == 'ind')
		{
			// buat cookie baru dengan nilai 'eng'
			_createCookie(__COOKIE_KEY_LANGUAGE__,"eng");
		}
		else
		{
			_createCookie(__COOKIE_KEY_LANGUAGE__,"ind");
		}
	}

});



/*
*  Contoh membuat API
*  "localhost/GF/api/abcde"
*/

GF::Route("api/# token #",function($get){
	$token = $get['token'] ?? false;

	if ($token != false)
	{
		if ($token=="abcde")
		{
			$data['username'] = 'Lamhot Simamora';
			$data['email']    = 'lamhotsimamora36@gmail.com';
			$data['phone']    = '0812121212';
			$data['token'] = true;
			echo json_encode($data);
			exit;
		}
		else
		{
			$data['username'] = '';
			$data['email']    = '';
			$data['phone']    = '';
			$data['token'] = false;
			echo json_encode($data);
		}
	}
	else
	{
		$data['username'] = '';
		$data['email']    = '';
		$data['phone']    = '';
		$data['token'] = false;
		echo json_encode($data);
	}
	
});




/*
*	Next ->  Router Dua
*/



