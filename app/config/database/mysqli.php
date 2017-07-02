<?php

defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');

use System\GF_Message as GF;

class elDB 
{

    protected static $conn       =   false;

    private static $server_name;
    private static $db_name;
    private static $user_name;
    private static $password;


    private static $last_id           = "";

    private static $query      = false;



    function __construct()
    {
        self::$server_name    = a32asdasd23das;
        self::$db_name        = gash2232232asd;
        self::$user_name      = gasd232adasas;
        self::$password       = gasgs2321123sd;

        self::connectToDatabase() ? '' : exit(GF::showError('ConnectDBError'));

    }
    protected function setQuery($q)
    {
        return self::$query = $q;
    }

    protected function getQuery()
    {
        return self::$query ;
    }

    protected function connectToDatabase()
    {
        $boolean = false;
        try
        {
             self::$conn = new mysqli(self::$server_name,self::$user_name,self::$password,self::$db_name);
             $boolean = true;
        }
        catch (Throwable $e)
        {
            $boolean = false;
            self::$conn = false;

            exit(GF::showError('ConnectDBError',$e)); return false;
        }
        return $boolean ? true : false;

    }

    protected function getData()
    {
       if ( self::$conn != false )
        {
            if (self::$query != false)
            {
                $message='';
                try
                {
                    $result = self::$conn->query((self::$query));
                }
                catch (Throwable $e)
                {

                    exit(self::showErrorQuery($e));
                }

                if ($result)
                {
                   return mysqli_fetch_array($result,MYSQLI_ASSOC);
                }
                else
                {
                     exit(self::showErrorQuery("Terjadi kesalahan !"));
                }

            }
            else
            {
                exit(self::emptyQuery());
            }


        }else { return false; }
    }

    private function emptyQuery()
    {
        return GF::showError('QueryEmpty');
    }
    private function showErrorQuery($error=null)
    {
        return GF::showError('QueryError',self::$query,$error);
    }

     protected function getAllData($function_user=null)
     {
       if ( self::$conn != false )
        {
             if (self::$query != false)
            {
                $result = self::$conn->query(self::$query);
                if ($result)
                {
                    while ($row = $result->fetch_assoc())
                    {

                        call_user_func($function_user,$row);
                    }
                }
                else
                {
                   exit(self::showErrorQuery()) && exit();
                }
            }
            else
            {
                exit(self::emptyQuery());
            }

       }else { return false; }
   }


    protected function CUD()
    {
        if (self::$conn != false )
        {
            if (self::$query != false)
            {
                $result = self::$conn->query(self::$query);
                return ! $result  ? self::showErrorQuery() && exit() : $result;
            }
            else
            {
                exit(self::emptyQuery());
            }

        }else { return false; }
    }

    protected function getCount()
    {
        if (self::$conn != false )
        {
            if (self::$query != false)
            {

                $result = self::$conn->query(self::$query);
                return ! $result  ? self::showErrorQuery() && exit() : $result->num_rows;
            }
            else
            {
                exit(self::emptyQuery());
            }

        }else { return false; }
    }



    protected function resetIdAuto($tblname)
    {
        $tbl = addslashes($tblname);
        $query = "ALTER TABLE $tbl AUTO_INCREMENT = 1";

        if (self::$conn != false )
        {
            $result = self::$conn->query($query);
            return $result ? true : false;
        }
    }

     private function querySelect($primary_key,$tblname,$column,$value)
     {
        return is_int($value) ? "select $primary_key from $tblname where $column=$value"
                                :  "select $primary_key from $tblname where $column='$value'";
     }

    // Check Id Of Data
    protected function checkId($column, $tblname,
                                $column1 , $value1,
                                $column2 = false, $value2 = false,
                                $column3 = false, $value3 = false,
                                $column4 = false, $value4 = false,
                                $column5 = false, $value5 = false )
    {
        $query_master= "";




        $value1 = addslashes($value1);
        $value2 != false  ? $value2   = addslashes($value2) : false ;
        $value3 != false  ? $value3   = addslashes($value3) : false ;
        $value4 != false  ? $value4   = addslashes($value4) : false ;
        $value5 != false  ? $value4   = addslashes($value5) : false ;

        if (empty($column) || empty($tblname) || empty($column1) || empty($value1))
        {
            exit(self::fontRed("Column PK and Tabel Name & Column 1 & Value 1 Cannot Be Empty"));
        }

        if ($column1 != false && $value1 != false
            && $column2==false && $value2 == false
            && $column3 == false && $value3  == false
            && $column4 == false && $value4  == false
            && $column5 == false && $value5  == false  )
        {

            if (is_int($value1))
            {
               $query_master = self::querySelect("$column","$tblname","$column1",$value1)." limit 1";

            }
            else
            {
                $query_master = self::querySelect("$column","$tblname","$column1","$value1")." limit 1";

            }

        }
        else if ($column1 != false && $value1 != false
                && $column2 != false && $value2 != false
                && $column3 == false && $value3  == false
                  && $column4 == false && $value4  == false
                  && $column5 == false && $value5  == false ){


            if (is_int($value1) && is_int($value2))
            {
                 $query_master = self::querySelect("$column","$tblname","$column1",$value1)." and $column2=$value2 limit 1";
            }
            else
            {
               $query_master = self::querySelect("$column","$tblname","$column1","$value1")." and $column2='$value2' limit 1";

            }

        }
        else if ($column1 != false && $value1 != false
                && $column2 != false && $value2 != false
                && $column3 != false && $value3  != false
                  && $column4 == false && $value4  == false
                  && $column5 == false && $value5  == false ){

            $query_master = self::
        querySelect("$column","$tblname","$column1","$value1")." and $column2='$value2' and $column3='$value3' limit 1";

            $count = self::getCount($query_master);

        }
         else if ($column1 != false && $value1 != false
                && $column2 != false && $value2 != false
                && $column3 != false && $value3  != false
                  && $column4 !=  false && $value4  != false
                  && $column5 == false && $value5  == false ){

            $query_master = self::
        querySelect("$column","$tblname","$column1","$value1")." and $column2='$value2' and $column3='$value3' and $column4='$value4' limit 1";

            $count = self::getCount($query_master);

        }
         else if ($column1 != false && $value1 != false
                && $column2 != false && $value2 != false
                && $column3 != false && $value3  != false
                  && $column4 !=  false && $value4  != false
                  && $column5 !=   false && $value5  !=   false ){

            $query_master = self::
        querySelect("$column","$tblname","$column1","$value1")." and $column2='$value2' and $column3='$value3' and $column4='$value4' and $column5='$value5' limit 1";

            $count = self::getCount($query_master);

        }
        else
        {
             exit(GF::showError('DB_MAX_CHECK_ID'));

        }


        self::$query = $query_master;
        $count = self::getCount();

        return ( $count > 0 ) ? true : false ;

    }


    protected function getId(){
        return self::$last_id;
    }

    private function setId($value){
        self::$last_id = $value;
    }


    protected function insert($tblname,$column1,$value1,
                                    $column2=false,$value2=false,
                                    $column3=false,$value3=false,
                                    $column4=false,$value4=false,
                                    $column5=false,$value5=false,
                                    $column6=false,$value6=false,
                                    $column7=false,$value7=false,
                                    $column8=false,$value8=false,
                                    $column9=false,$value9=false ){


         if (is_string($value1) && $value1 != false )
        {
              $value1  = addslashes(trim($value1));
              $value1  = _replaceHtml($value1);
        }



        if (is_string($value2) && $value2 != false )
        {
             $value2 = addslashes(trim($value2));
             $value2  = _replaceHtml($value2);
        }
        else
        {
             $value2 = false;
        }

         if (is_string($value3) && $value3 != false )
        {
             $value3 = addslashes(trim($value3)) ;
              $value3  = _replaceHtml($value3);
        }
         else
        {
             $value3 = false;
        }

         if (is_string($value4) && $value4 != false )
        {
             $value4 = addslashes(trim($value4)) ;
              $value4  = _replaceHtml($value4);
        }
         else
        {
             $value4 = false;
        }

         if (is_string($value5) && $value5 != false )
        {
             $value5 = addslashes(trim($value5)) ;
              $value5  = _replaceHtml($value5);
        }
         else
        {
             $value5 = false;
        }

          if (is_string($value6) && $value6 != false )
        {
             $value6 = addslashes(trim($value6)) ;
              $value6  = _replaceHtml($value6);
        }
         else
        {
             $value6 = false;
        }

          if (is_string($value7) && $value7 != false )
        {
             $value7 = addslashes(trim($value7)) ;
              $value7  = _replaceHtml($value7);
        }
         else
        {
             $value7 = false;
        }

       if (is_string($value8) && $value8 != false )
        {
             $value8 = addslashes(trim($value8)) ;
              $value8  = _replaceHtml($value8);
        }
         else
        {
             $value8 = false;
        }

       if (is_string($value9) && $value9 != false )
        {
             $value9 = addslashes(trim($value9)) ;
              $value9  = _replaceHtml($value9);
        }
         else
        {
             $value9 = false;
        }


         if (empty($tblname) || empty($column1) || empty($value1))
        {
            exit(self::fontRed("Tabel Name & Column 1 &  Value 1  Cannot Be Empty !"));
        }

        $query = "";

        $query_insert = "insert into $tblname($column1";

        // Column 1 Value 1
        if ($column2 == false && $value2==false
            && $column3 == false && $value3 == false
            && $column4 == false && $value4 == false
            && $column5 == false && $value5 == false
            && $column6 == false && $value6 == false
            && $column7 == false && $value7 == false
            && $column8 == false && $value8 == false
            && $column9 == false && $value9 == false  ) {

         $query = $query_insert.") VALUES ('$value1')";


        }
         // Column 2 Value 2
        else if ($column2 != false && $value2 != false
                && $column3 == false && $value3 == false
                && $column4 == false && $value4 == false
                && $column5 == false && $value5 == false
                && $column6 == false && $value6 == false
                && $column7 == false && $value7 == false
                && $column8 == false && $value8 == false
                && $column9 == false && $value9 == false ) {


        $query = $query_insert.",$column2) VALUES ('$value1','$value2')";


        }
         // Column 3 Value 3
       else if ($column2 != false && $value2 != false
                && $column3 != false && $value3 != false
                && $column4 == false && $value4 == false
                && $column5 == false && $value5 == false
                && $column6 == false && $value6 == false
                && $column7 == false && $value7 == false
                && $column8 == false && $value8 == false
                && $column9 == false && $value9 == false ) {


        $query = $query_insert.",$column2,$column3) VALUES ('$value1','$value2','$value3')";


        }
        // Column 4 Value 4
        else if ($column2 != false && $value2 != false
                && $column3 != false && $value3 != false
                && $column4 != false && $value4 != false
                && $column5 == false && $value5 == false
                && $column6 == false && $value6 == false
                && $column7 == false && $value7 == false
                && $column8 == false && $value8 == false
                && $column9 == false && $value9 == false) {

        $query = $query_insert.",$column2,$column3,$column4) VALUES ('$value1','$value2','$value3','$value4')";

        }
         // Column 5 Value 5
        else if ($column2 != false && $value2 != false
                && $column3 != false && $value3 != false
                && $column4 != false && $value4 != false
                && $column5 != false && $value5 != false
                && $column6 == false && $value6 == false
                && $column7 == false && $value7 == false
                && $column8 == false && $value8 == false
                && $column9 == false && $value9 == false ) {


        $query = $query_insert.",$column2,$column3,$column4,$column5)
                    VALUES ('$value1','$value2','$value3','$value4','$value5')";

        }
         // Column 6 Value 6
        else if ($column2 != false && $value2 != false
                && $column3 != false && $value3 != false
                && $column4 != false && $value4 != false
                && $column5 != false && $value5 != false
                && $column6 != false && $value6 != false
                && $column7 == false && $value7 == false
                && $column8 == false && $value8 == false
                && $column9 == false && $value9 == false ) {


        $query = $query_insert.",$column2,$column3,$column4,$column5,$column6)
                VALUES ('$value1','$value2','$value3','$value4','$value5','$value6')";

        }
         // Column 7 Value 7
         else if ($column2 != false && $value2 != false
                && $column3 != false && $value3 != false
                && $column4 != false && $value4 != false
                && $column5 != false && $value5 != false
                && $column6 != false && $value6 != false
                && $column7 != false && $value7 != false
                && $column8 == false && $value8 == false
                && $column9 == false && $value9 == false ) {


        $query = $query_insert.",$column2,$column3,$column4,$column5,$column6,$column7)
                VALUES ('$value1','$value2','$value3','$value4','$value5','$value6','$value7')";

        }
         // Column 8 Value 8
         else if ($column2 != false && $value2 != false
                && $column3 != false && $value3 != false
                && $column4 != false && $value4 != false
                && $column5 != false && $value5 != false
                && $column6 != false && $value6 != false
                && $column7 != false && $value7 != false
                && $column8 != false && $value8 != false
                && $column9 == false && $value9 == false ) {


        $query = $query_insert.",$column2,$column3,$column4,$column5,$column6,$column7,$column8)
                VALUES ('$value1','$value2','$value3','$value4','$value5','$value6','$value7','$value8')";

        }
         // Column 9 Value 9
         else if ($column2 != false && $value2 != false
                && $column3 != false && $value3 != false
                && $column4 != false && $value4 != false
                && $column5 != false && $value5 != false
                && $column6 != false && $value6 != false
                && $column7 != false && $value7 != false
                && $column8 != false && $value8 != false
                && $column9 !=  false && $value9 != false ) {


        $query = $query_insert.",$column2,$column3,$column4,$column5,$column6,$column7,$column8,$column9)
                VALUES ('$value1','$value2','$value3','$value4','$value5','$value6','$value7','$value8','$value9')";

        }


        if (self::$conn != false )
        {
             if (! empty($query))
            {
                $result = self::$conn->query($query);
                return ! $result  ? self::showErrorQuery() && exit() : true;
            }
            else
            {
                return false;
            }
        }

    }

    private function fontRed($str){
        return '<font color="red"><b> '.$str.' </b></font>';
    }


    // delete data
    // $column1 is primary key or Unique
    protected function delete($tblname,$column1,$value1,
                                    $column2=false,$value2=false,
                                    $column3=false,$value3=false,
                                    $column4=false,$value4=false )
    {
 
        $value1  = addslashes(trim($value1));

        $column2 != false ?  $column2 = ($column2) : $column2 = false;
        $value2 != false ?  $value2 = addslashes(trim($value2)) : $value2 = false;

        $column3 != false ?  $column3 = ($column3) : $column3 = false;
        $value3 != false ?  $value3 = addslashes(trim($value3)) : $value3 = false;

        $column4 != false ?  $column4 = ($column4) : $column4 = false;
        $value4 != false ?  $value4 = addslashes(trim($value4)) : $value4 = false;

        if (empty($tblname) || empty($column1) || empty($value1))
        {
            exit(self::fontRed("Tabel Name & Column 1 &  Value 1  Cannot Be Empty !"));
        }

         $query_master = "";

        $query_delete = "delete from $tblname where $column1='$value1'";
        $query_count  = "select $column1 from $tblname where $column1='$value1'";
        // column 1 Value 1
        if ($column2 == false && $value2==false
                && $column3 == false && $value3==false
                && $column4 == false && $value4==false ) {


           $query_master = $query_delete;
           $query_check  = $query_count." limit 1";

        // column 2 Value 2
        }
        else if ($column2 != false && $value2 != false
                    && $column3 == false && $value3 == false
                    && $column4 == false && $value4 == false ) {

            if ($column1 == $column2)
            {
                exit(self::fontRed("Duplicat Column Name"));
            }

        $query_master =  $query_delete." and $column2='$value2'";
        $query_check  = $query_count." and $column2='$value2' limit 1";

        // column 3 Value 3
        }
         else if ($column2 != false && $value2 != false
                    && $column3 != false && $value3 != false
                    && $column4 == false && $value4 == false ) {

             if ($column1 == $column2 || $column2 == $column3 || $column1 == $column3)
            {
                exit(self::fontRed("Duplicate Column Name"));
            }

            $query_master =  $query_delete." and $column2='$value2' and $column3 ='$value3'";
            $query_check  = $query_count." and $column2='$value2' and $column3='$value3' limit 1";
        }
        // column 4 Value 4
        else if ($column2 != false && $value2 != false
                    && $column3 != false && $value3 != false
                    && $column4 != false && $value4 != false) {

             if ($column1 == $column2 || $column2 == $column3 || $column1 == $column3 || $column1 == $column4 || $column2 == $column4 || $column3 == $column4)
            {
                exit(self::fontRed("Duplicate Column Name"));
            }

             $query_master =  $query_delete." and $column2='$value2' and $column3='$value3' and $column4 = '$value4'";
              $query_check  = $query_count." and $column2='$value2' and $column3='$value3' and $column4 = '$value4' limit 1";

        }

        if (self::$conn != false )
        {
            //  if query master and query check is not empty
            if (! empty($query_master) && !empty($query_check))
            {
                // check data first, before delete
                 self::$query = $query_check;
                 $count = self::getCount();
                 // if data found
                 if ($count>0)
                 {
                    // delete data
                    $result = self::$conn->query($query_master);
                    return ! $result  ? self::showErrorQuery() && exit() : true;
                 }
                 else
                 {
                    return false;
                 }

            }
            else
            {
                return false;
            }
        }

    }

     protected function update($tblname,$parameter1,$value_parameter1,
                                $column1,$value1,
                                $column2=false,$value2=false,
                                $column3=false,$value3=false,
                                $column4=false,$value4=false,
                                $column5=false,$value5=false,
                                $column6=false,$value6=false,
                                $column7=false,$value7=false,
                                $column8=false,$value8=false,
                                $column9=false,$value9=false )
     {

    
        $value_parameter1   = _replaceHtml(addslashes(trim($value_parameter1)));
        $value1             = _replaceHtml(addslashes(trim($value1)));

        $column2 != false ?  $column2 = ($column2) : $column2 = false;
        $value2 != false ?  $value2 = _replaceHtml(addslashes(trim($value2))) : $value2 = false;

        $column3 != false ?  $column3 = ($column3) : $column3 = false;
        $value3 != false ?  $value3 = _replaceHtml(addslashes(trim($value3))) : $value3 = false;

        $column4 != false ?  $column4 = ($column4) : $column4 = false;
        $value4 != false ?  $value4 = _replaceHtml(addslashes(trim($value4))) : $value4 = false;

        $column5 != false ?  $column5 = ($column5) : $column5 = false;
        $value5 != false ?  $value5 = _replaceHtml(addslashes(trim($value5))) : $value5 = false;

        $column6 != false ?  $column6 = ($column6) : $column6 = false;
        $value6 != false ?  $value6 = _replaceHtml(addslashes(trim($value6))) : $value6 = false;

        $column7 != false ?  $column7 = ($column7) : $column7 = false;
        $value7 != false ?  $value7 = _replaceHtml(addslashes(trim($value7))) : $value7 = false;

        $column8 != false ?  $column8 = ($column8) : $column8 = false;
        $value8 != false ?  $value8 = _replaceHtml(addslashes(trim($value8))) : $value8 = false;

        $column9 != false ?  $column9 = ($column9) : $column9 = false;
        $value9 != false ?  $value9 = _replaceHtml(addslashes(trim($value9))) : $value9 = false;



         if (empty($tblname) || empty($column1) || empty($value1) || empty($parameter1) || empty($value_parameter1))
        {
            exit(self::fontRed("Tabel Name & Column 1 &  Value 1 & Parameter1 & Value Paramater1  Cannot Be Empty !"));
        }


        $query_master = "";

        $query_update ="update $tblname set $column1='$value1'";

        if ($column2 == false && $value2==false
            && $column3 == false && $value3== false
            && $column4 == false && $value4 ==false
            && $column5 == false && $value5 ==false
            && $column6 == false && $value6 ==false
            && $column7 == false && $value7 ==false
            && $column8 == false && $value8 ==false
            && $column9 == false && $value9 ==false ) {

            $query_master = $query_update." where $parameter1='$value_parameter1'";
        }
       else if ($column2 != false && $value2 !=  false
            && $column3 == false && $value3 == false
            && $column4 == false && $value4 == false
            && $column5 == false && $value5 ==false
            && $column6 == false && $value6 ==false
            && $column7 == false && $value7 ==false
            && $column8 == false && $value8 ==false
            && $column9 == false && $value9 ==false ) {

            $query_master = $query_update.",$column2='$value2' where $parameter1='$value_parameter1'";
        }
        else if ($column2 != false && $value2 !=  false
            && $column3 != false && $value3 != false
            && $column4 == false && $value4 == false
            && $column5 == false && $value5 == false
            && $column6 == false && $value6 ==false
            && $column7 == false && $value7 ==false
            && $column8 == false && $value8 ==false
            && $column9 == false && $value9 ==false  ) {

             $query_master = $query_update.",$column2='$value2', $column3='$value3' where $parameter1='$value_parameter1'";
        }
        else if ($column2 != false && $value2 !=  false
            && $column3 != false && $value3 != false
            && $column4 != false && $value4 != false
            && $column5 == false && $value5 == false
            && $column6 == false && $value6 ==false
            && $column7 == false && $value7 ==false
            && $column8 == false && $value8 ==false
            && $column9 == false && $value9 ==false  ) {

           $query_master =
           $query_update.",$column2='$value2', $column3='$value3',$column4='$value4' where $parameter1='$value_parameter1'";
        }
         else if ($column2 != false && $value2 !=  false
            && $column3 != false && $value3 != false
            && $column4 != false && $value4 != false
            && $column5 != false && $value5 != false
            && $column6 == false && $value6 ==false
            && $column7 == false && $value7 ==false
            && $column8 == false && $value8 ==false
            && $column9 == false && $value9 ==false  ) {

           $query_master =
           $query_update.",$column2='$value2', $column3='$value3',$column4='$value4',$column5='$value5' where $parameter1='$value_parameter1'";
        }
         else if ($column2 != false && $value2 !=  false
            && $column3 != false && $value3 != false
            && $column4 != false && $value4 != false
            && $column5 != false && $value5 != false
            && $column6 !=  false && $value6 !=  false
            && $column7 == false && $value7 ==false
            && $column8 == false && $value8 ==false
            && $column9 == false && $value9 ==false  ) {

           $query_master =
           $query_update.",$column2='$value2', $column3='$value3',$column4='$value4',$column5='$value5',$column6='$value6' where $parameter1='$value_parameter1'";
        }
         else if ($column2 != false && $value2 !=  false
            && $column3 != false && $value3 != false
            && $column4 != false && $value4 != false
            && $column5 != false && $value5 != false
            && $column6 !=  false && $value6 !=  false
            && $column7 != false && $value7 != false
            && $column8 == false && $value8 ==false
            && $column9 == false && $value9 ==false  ) {

           $query_master =
           $query_update.",$column2='$value2', $column3='$value3',$column4='$value4',$column5='$value5',$column6='$value6',$column7='$value7' where $parameter1='$value_parameter1'";
        }
         else if ($column2 != false && $value2 !=  false
            && $column3 != false && $value3 != false
            && $column4 != false && $value4 != false
            && $column5 != false && $value5 != false
            && $column6 !=  false && $value6 !=  false
            && $column7 != false && $value7 != false
            && $column8 !=  false && $value8 !=  false
            && $column9 == false && $value9 == false  ) {

           $query_master =
           $query_update.",$column2='$value2', $column3='$value3',$column4='$value4'
           ,$column5='$value5',$column6='$value6',$column7='$value7',$column8='$value8' where $parameter1='$value_parameter1'";
        }
          else if ($column2 != false && $value2 !=  false
            && $column3 != false && $value3 != false
            && $column4 != false && $value4 != false
            && $column5 != false && $value5 != false
            && $column6 !=  false && $value6 !=  false
            && $column7 != false && $value7 != false
            && $column8 !=  false && $value8 !=  false
            && $column9 != false && $value9 != false  ) {

           $query_master =
           $query_update.",$column2='$value2', $column3='$value3',$column4='$value4'
           ,$column5='$value5',$column6='$value6',$column7='$value7',$column8='$value8',$column9='$value9' where $parameter1='$value_parameter1'";
        }


         if (self::$conn != false )
        {
            //  if query master and query check is not empty
            if (! empty($query_master) )
            {
                $result = self::$conn->query($query_master);
                return ! $result  ? self::showErrorQuery() && exit() : true;
            }
            else
            {
                return false;
            }
        }


    }

}
