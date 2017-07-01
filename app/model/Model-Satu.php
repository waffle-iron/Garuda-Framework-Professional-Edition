<?php

defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');

/*
*  Method Dari Parent elDB MySqli
*
*  -> setQuery()   < Wajib Periksa Petik Satu > 
*     # getCount() = mengembalikan jumlah datas
*     # getData()  = mengembalikan data yang diinginkan 
*     # getAllData = mengembalikan seluruh data
* 
*  -> insert()     = insert data < Tidak Perlu Periksa Petik Satu >
*  -> update()     = update data < Tidak Perlu Periksa Petik Satu >
*  -> delete()     = delete data < Tidak Perlu Periksa Petik Satu >
* 
*  -> checkId()    = check data berdasarkan id primary key
*
*  -> CUD()        = method query bebas , insert update dan delete
*/


// setiap membuat model harus menggunakan extends dengan elDB
class Data_User extends elDB
{
    private $data = array();
    private $username;
    private $email;
    private $password;
    private $id_user;

   // set username
    public function setUsername($value)
    { 
      $this->username = trim($value);
    }
    // set email
    public function setEmail($value)
    {
      $this->email = trim($value);
    }
    // set password
    public function setPassword($value)
    {
      // gunakan method _md5() atau method lainnya untuk password
      // method _md5() adalah hasil md5 yang telah dimodifikasi
      $this->password = _md5(trim($value));
    }

    // set id_user
     public function setIdUser($value)
    {
      $this->id_user = trim($value);
    }

    // contoh ambil satu data berdasarkan column
  	public function getSingleData($column,$id)
  	{
            $id  = addslashes(trim($id));
    		$this->setQuery("select $column from t_user where id_user=$id limit 1");
    		$result = $this->getData();
  	    return  $result[$column];
  	}

    // contoh ambil semua data dan masukkan kedalam array
  	public function getAll()
    {
       // method setQuery untuk memasukkan query, sebelum memanggil method getAllData
  		$this->setQuery("select id_user,username,email,pass from t_user order by id_user asc");

      // method getAllData mengambil seluruh data dari tabel dan menyimpan data didalam array
  		$this->getAllData(function($row){
  			$this->data[] = $row;
  		});
      // return array
  		return $this->data;
  	}

    // contoh check jumlah data
    public function countData()
    {
      // method setQuery untuk memasukkan query, sebelum memanggil method getCount
      $this->setQuery("select id_user,username,email,pass from t_user");
      $result = $this->getCount();
      return $result;
    }

 
  	public function insertData()
  	{

      // contoh check apakah email sudah ada atau belum
  		$result_email    = $this->checkId("id_user","t_user","email",$this->email);

  	 // contoh jika sudah ada maka return false
  		if ($result_email)	 { return false && exit; }

        // contoh insert data dan replace string HTML 
  		$result = $this->insert("t_user","username",_replaceHtml($this->username),
                                      "email",    _replaceHtml($this->email),
                                      "pass",     _replaceHtml($this->password));
  	
  		return $result ? true : false;
  	}


    public function updateData()
    {
      // check id data terlebih dahulu, jika tidak ditemukan maka return false
      $result_value = $this->checkId("id_user","t_user","id_user",$this->id_user);
      if (! $result_value){ return false && exit; }

       // contoh update data 
      $result = $this->update("t_user","id_user",$this->id_user
                                        ,"username",$this->username
                                        ,"email"    ,$this->email
                                        ,"pass"     , $this->password);

      return $result ? true : false;
    }

  	public function deleteData()
  	{
      // check id data terlebih dahulu, jika tidak ditemukan maka return false
  		$result_value = $this->checkId("id_user","t_user","id_user",$this->id_user);
  		if (! $result_value){ return false && exit; }

       // contoh delete data 
  		$result = $this->delete("t_user","id_user",$this->id_user);
  		return $result ? true : false;
  	}
    
    
     public function createUpdateDelete($username,$email,$password,$id_user=''){
      // 
      // Query bebas Create, Update & Delete
     
      $id_user = addslashes(trim($id_user));
      $username = addslashes(trim($username));
      $username = addslashes(trim($email));
      $password = addslashes(trim(_md5($password)));

     /*
      * contoh insert data
      */
       $this->setQuery("insert into t_user(username,email,pass) values('$username','$email','$password')");
      

      /*
      * contoh update data
      * $this->setQuery("update t_user set username='$username',email='$email',pass='$password' where id_user=$id_user");
      */
      
      /*
      * contoh delete data
      * $this->setQuery("delete from t_user where id_user=$id_user");
      */
      
      $result = $this->CUD();

      return $result ? true : false;

    }
}
