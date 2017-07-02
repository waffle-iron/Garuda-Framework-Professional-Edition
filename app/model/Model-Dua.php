<?php

defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');


/*
* 	Contoh menggunakan MySqli Prepare Statement
* 	Hanya untuk insert dan update
*/


class Data extends elDB
{
	public function insertData(){
			// prepare 
			$stmt = self::$conn->prepare("INSERT INTO t_user (username, email, pass) VALUES (?, ?, ?)");

			/*
			Penjelasan bind_param

			i - integer
			d - double
			s - string
			b - BLOB 

			*/

			// bind
			$stmt->bind_param("sss", $username, $email, $pass);

			// set parameters and execute
			$username   = "aaaaaaaaa";
			$pass 		= _md5("12345");
			$email      = "aaaaaaaaa@example.com";
			$stmt->execute();

			$username    = "bbbbbbbbbbb";
			$pass 		= _md5("12345");
			$email       = "bbbbbbbbbbb@example.com";
			$stmt->execute();

			$username    = "cccccccc";
			$pass 		= _md5("12345");
			$email        = "cccccccc@example.com";
			$stmt->execute();

			$result = $stmt->close();
		
		    var_dump($result);

			
	}

	public function updateData($username,$email,$id_user){
		  	// prepare 
			$stmt = self::$conn->prepare("update t_user set username=?,email=? where id_user=?");

			/*
			Penjelasan bind_param

			i - integer
			d - double
			s - string
			b - BLOB 
			
			*/

			// bind
			$stmt->bind_param("ssi", $username, $email, $id_user);

			// set parameters and execute
			$result = $stmt->execute();
		    var_dump($result);
	}
}