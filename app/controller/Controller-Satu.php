<?php

$_SESSION['sys_run_app'] ?? exit('403 You dont have permission to access / on this server...');
use System\GF_Router as GF;

class User_Controller
{
	
	function __construct()
	{
		$this->login();
		GF::setView("login");
	}

	public function login(){
		echo "User Login";
	}

}