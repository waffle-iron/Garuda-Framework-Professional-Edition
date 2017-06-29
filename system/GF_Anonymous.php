<?php
/**
 * Garuda Framework Pro Edition 
 *
 * @package  GF-Pro
 * @author   Lamhot Simamora < lamhotsimamora36@gmail.com >
 */

$_SESSION['sys_run_app'] ?? exit('403 You dont have permission to access / on this server...');

use System\GF_URL as GF;

// Class Anonymous ini untuk membuat validation Route
// Bisa dimodif sesuai kebutuhan 
$GF = new class {
	public  static $key 		  = ("ba6hsk1312masdng923j2nasasl");
	private static $value         = false;

	function __construct()
	{
		 if (! defined(self::$key))
		 {
		 	 if (self::$value == false)
		 	 {
				self::set();
				self::create();
		 	 }
		 }
		
	}

	private static function create(){
		_def(self::$key,self::$value);
	
	}
		
	private static function set(){
		$random_int = random_int(0, 30);
		self::$value = _sha1($random_int);
	}

	public static function validationRoute(){
		if (self::$key)
		{
			return self::$key;
		}
		else
		{
			exit("<hr><center><font color='red'>Token route is wrong !</font></center><hr>");
		}
	}
};

