<?php

defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');


/*
* 	Contoh menggunakan MySqli Prepare Statement
* 	Hanya untuk insert dan update
*   Kustom sendiri sesuai kebutuhan
*/


class Data extends elDB
{
	public function insertData(){
			
		    /*
		    *   Prepare
            *   Mengambil variabel $conn dari parent
		    */
			$go = self::$conn->prepare("INSERT INTO t_user (username, email, pass) VALUES (?, ?, ?)");

			/*
			Penjelasan bind_param

			i - integer
			d - double
			s - string
			b - BLOB 

			*/

			// bind
			$go->bind_param("sss", $username, $email, $pass);

			// set parameters and execute
			$username   = "aaaaaaaaa";
			$pass 		= _md5("12345");
			$email      = "aaaaaaaaa@example.com";
			
			$result1    =  $go->execute();

			$username    = "bbbbbbbbbbb";
			$pass 		= _md5("12345");
			$email       = "bbbbbbbbbbb@example.com";

			$result2    =  $go->execute();

			$username    = "cccccccc";
			$pass 		= _md5("12345");
			$email        = "cccccccc@example.com";

			$result3    =  $go->execute();

		    $go->close();
		
		    if ($result1==true && $result2==true && $result3==true)
		    {
		    	return true;
		    }
		    else
		    {
		    	return false;
		    }
			
	}

	public function updateData($username,$email,$id_user){
		  	/*
		    *   Prepare
            *   Mengambil variabel $conn dari parent
		    */
			$go = self::$conn->prepare("update t_user set username=?,email=? where id_user=?");

			/*
			Penjelasan bind_param

			i - integer
			d - double
			s - string
			b - BLOB 
			
			*/

			// bind
			$go->bind_param("ssi", $username, $email, $id_user);

			// execute
			$result = $go->execute();

		    $go->close();
		    var_dump($result);
	}
}