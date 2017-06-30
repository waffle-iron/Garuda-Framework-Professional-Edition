<?php

$_SESSION['sys_run_app'] ?? exit('403 You dont have permission to access / on this server...');
use System\GF_Router as GF;

class User_Controller
{
	
	function __construct()
	{
		// $this->login();
		// GF::setView("login");
		echo "Constructor Run";
	}

	public function login(){
		// Logic here
		echo "User Login";
	}

	public function logout(){
		// Logic here
		echo "User Logout";
	}
}
