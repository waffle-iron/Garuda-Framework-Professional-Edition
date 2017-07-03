# Garuda-Framework-Professional-Edition
Selamat Datang di Repository Garuda Framework PHP Professional Edition, Framework PHP ini mempermudah anda membuat website dalam hitungan hari baik website standart ataupun professional. Gak percaya ? 

## We Are Not ARTISAN , but We Are PROFESSIONAL Edition 

* Name                : Garuda Framework Professional Edition
* Version           	: Undefined_1 
* Realease Date    	: 29 Juni 2017
## Creator [![GoDoc](https://img.shields.io/twitter/url/http/shields.io.svg?style=social)](https://www.lamhotsimamora.com/) 
* Email            	: lamhotsimamora36@gmail.com 
* Web              	: <a href="https://lamhotsimamora.com" target="_blank">www.lamhotsimamora.com</a>
* Source Repository 	: </strong> <a href="https://github.com/lamhotsimamora/Garuda-Framework-Professional-Edition" target="_blank">GitHub</a>
* Akun Instagram      : <a href="https://www.instagram.com/lamhottt/" target="_blank">instagram.com/lamhottt</a>
* Akun LinkIn 		: <a href="#"></a>
* Akun Paypal         : <a href="https://www.paypal.me/lamhotsimamora" target="_blank">paypal.me/lamhotsimamora</a>
* Akun BNI 022-448-93-37 a/n Lamhot Simamora

### Instalasi / Clone / Download
If you wanna clone this repository, just copy this code to your Git and ENTER
```go 
git clone https://github.com/lamhotsimamora/Garuda-Framework-Professional-Edition.git
```
or download.

### Minimum PHP 7.0 || 7.1 (Recommended)

### Lihat Demo <a href="https://garudaframeworkpro.lamhotsimamora.com" target="_blank">click</a>

### Lihat Contoh Website Hasil Dari GF Pro <a href="https://www.chat.lamhotsimamora.com/login" target="_blank">click</a> & <a href="https://s.lamhotsimamora.com/" target="_blank">click</a>

### Lihat Tutorial Di  Youtube 
* 1
<a href="https://www.youtube.com/watch?v=cw3NeFtwqAg">part1 Clone Repository & Konfigurasi</a>
* 2
<a href="https://www.youtube.com/watch?v=4RN56pYzZiE">part2 Route & View</a>

### Lihat Dokumentasi  [![GoDoc](http://img.shields.io/badge/go-documentation-blue.svg?style=flat-square)](https://garudaframeworkpro.lamhotsimamora.com/dokumentasi/) 

### Pre-View Syntax
### 
```go  
GF::Route("Home",function(){
	echo "Hello World !";
});
GF::Route("Professional /{ a }/{ b }",function($get){
	$a = $get['a'] ?? false;
	$b = $get['b'] ?? false;
	echo "Hello World !";
});
GF::Route("User/# id_user #/# type #/",function($get){
    $id_user = $get['id_user'] ?? false;
    $type    = $get['type']    ?? false;
    
    GF::setView("user/view");
});
```

### Flow System
* Router 
* Controller
* Model

### Direktori 
* Library
* Storage
* Helper
* View

### <a href="https://raw.githubusercontent.com/lamhotsimamora/Garuda-Framework-Professional-Edition/master/LICENSE" target="_blank">License GNU General Public License v3.0</a>

### Feedback 
Apabila anda ingin menggunakan framework ini untuk kebutuhan  distribusi ataupun komersial, cukup berikan tulisan berikut ini di Footer website anda. Dan beritahu kepada saya melalui email, agar website anda saya cantumkan di Repository ini. 
Jika anda merasa rugi karena membuat footer tersebut, TIDAK USAH ditulis. Programmer Professional Selalu Memberikan Feedback Terhadap Sistem Yang Digunakan.

```go 
powered by Garuda Framework Pro Edition 
```
atau
```go 
Framework by GF Pro Edition  
```

### Library
Didalam framework GF Pro ini, sudah disertakan beberapa library untuk PHP, CSS, dan Javascript , diantaranya

### PHP
* QR Code Generator http://phpqrcode.sourceforge.net/
* FPdf http://www.fpdf.org/
* Mobile Detect http://mobiledetect.net/
* PHP Mailer https://github.com/PHPMailer/PHPMailer/

### CSS
* Bootstrap http://getbootstrap.com/
* Materealize http://materializecss.com/
* Skleton http://getskeleton.com/

### Javascript
* JQuery https://jquery.com/
* GF-1.js https://github.com/lamhotsimamora/GF-Javascript
* Hammer http://hammerjs.github.io/
* Sweet Alert http://t4t5.github.io/sweetalert/

### Tools
* CKEditor http://ckeditor.com/

Pelajari library diatas melalui dokumentasi yang disertakan (Apabila dibutuhkan), Di framework GF Pro hanya beberapa saja yang saya buatkan contohnya. Jika tidak dibutuhkan anda bisa hapus librarynya. 

### Sponsor
Jika anda berniat memberikan hosting atau domain, beritau saya melalui email diatas.

### Testing Sistem
Keseluruhan Sistem di Framework GF Pro sudah lulus uji coba, namun apabila anda menemukan error atau bug, silahkan pencet ISSUES.
Dan apabila ingin menambahkan atau memperbaiki sistem silahkan di fork lalu edit sendiri atau pull request atau beritahu melalui email.

### Mengapa harus menggunakan framework Garuda Framework Pro ?
* Karena framework ini sederhana dan professional
* Sangat mudah dimengerti
* Dokumentasi dibuat dalam bahasa Indonesia
* Telah tersedia contoh membuat Create Update Delete dari database, Upload Gambar, dan Upload File
* Telah tersedia contoh membuat QR Code, PDF, Zip, dan Mobile Detect
* Telah tersedia contoh membuat AJAX POST, AJAX GET (Javascript)
* Telah tersedia contoh membuat Sweet Alert (Javascript)
* Telah tersedia contoh mendeteksi device mobile phone atau desktop
* Telah tersedia contoh membuat multi bahasa / language
* Telah tersedia HTML Template (Meta HTML)
* Telah tersedia contoh membuat API (Application Programming Interface) 
* Sangat mudah jika ingin di upload ke hosting, Upload -> Konfigurasi Database -> Done
* Mudah membuat parameter Pretty GET seperti www.example.com/user/12 atau www.example.com/post/2017/12/28/Judul-Artikel atau www.example.com/api/v9232jasd2932j3ad92323/1/
* Bisa dikustomisasi sesuai kebutuhan
* Terdapat driver database MySqli dan PDO, namun saya memfokuskan framework ini khusus untuk MySqli
* Tersedia template sederhana untuk menampilkan pesan error, yang dapat membantu anda dalam membuat website.

Ada banyak framework PHP diluar sana seperti laravel, codeigniter, yii dan lain-lain. 
Bandingkan sendiri framework apa yang tepat untuk kebutuhan anda. That's your choice.

### Gift ?
Apabila anda ingin mengirimkan ucapan terima kasih berupa Rupiah / Dollar , informasi Akun BANK tertera diatas. 
Saya tidak MEMINTA uang anda, tapi jika diberikan saya tidak MENOLAK :). Terima Kasih

### Silahkan gunakan Garuda framework PHP ini dengan Bijak...

```go 
Jangan Mempersulit Hal Yang Seharusnya Tidak Sulit
Salam Echo dan Var Dump !
```


#### <a href='https://coretancode.wordpress.com/'>CoretanCode</a> 
#### <a href='https://www.youtube.com/channel/UCmsX7f_05_JfiWlVpSLWCCA'>Youtube Channel</a> 
