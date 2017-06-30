<?php

defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');

class elDB  
{

  private static  $server_name ;
  private static  $db_name     ;
  private static  $user_name   ;
  private static  $password   ;

  private $dbh;
  private $error;
  private $qError;

  private $stmt;

  private $dsn_mysql = "";

  public function __construct()
  {

      self::$server_name    = a32asdasd23das;
      self::$db_name        = gash2232232asd;
      self::$user_name      = gasd232adasas;
      self::$password       = gasgs2321123sd;



      $options = array(
              PDO::ATTR_PERSISTENT    => true,
              PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
      );

      try{
        if (database_use=='mysql')
        {
            $this->dbh = new PDO("mysql:host=".self::$server_name.";dbname=".self::$db_name,self::$user_name,  self::$password);

        }
        else if (database_use=='microsoft_access')
        {
           if (! file_exists(__APP_PATH__."app/config/database/".self::$db_name))
           {
            exit("Database Microsoft Access -> ".$self::db_name."not found");
           }
           $this->dbh = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=
            ".__APP_PATH__."app/config/database/".self::$db_name."; Uid=".self::$user_name."; Pwd=".self::$password.";");
        }
        else if (database_use=='sqlite')
        {
            if (! file_exists(self::$db_name))
            {
              $this->dbh =  new PDO("sqlite:".self::$db_name);
            }
        }
        else
        {
           exit("Other DNS Database is not set except MySql");
        }

      }
      //catch any errors
      catch (PDOException $e){
      $this->error = $e->getMessage();
      }
  }




  public function query($query){
      $this->stmt = $this->dbh->prepare($query);
  }

  public function bind($param, $value, $type = null){
      if(is_null($type)){
          switch (true){
              case is_int($value):
                $type = PDO::PARAM_INT;
                break;
              case is_bool($value):
                  $type = PDO::PARAM_BOOL;
                  break;
              case is_null($value):
                  $type = PDO::PARAM_NULL;
                  break;
              default:
                  $type = PDO::PARAM_STR;
          }
      }
    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute(){
      return $this->stmt->execute() ? TRUE : exit("Something is wrong with your Query");
  }

  public function resultset(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function single(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function rowCount(){
      return $this->stmt->rowCount();
  }

  public function lastInsertId(){
      return $this->dbh->lastInsertId();
  }

  public function beginTransaction(){
      return $this->dbh->beginTransaction();
  }

  public function endTransaction(){
      return $this->dbh->commit();
  }

  public function cancelTransaction(){
      return $this->dbh->rollBack();
  }

  public function debugDumpParams(){
      return $this->stmt->debugDumpParams();
  }

  public function queryError(){
      $this->qError = $this->dbh->errorInfo();
      if(!is_null($qError[2])){
          echo $qError[2];
      }
  }

}
