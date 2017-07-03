<?php
/**
 * Garuda Framework Pro Edition 
 *
 * @package  GF-Pro
 * @author   Lamhot Simamora < lamhotsimamora36@gmail.com >
 */
namespace System{

defined('sys_run_app') OR exit('403 You dont have permission to access / on this server...');

  class GF_URL
  {

      public static function fullUrl()
      {
        if (__DIR_NAME__=='')
        {
          $_dir = '/';
        }
        else
        {
          $_dir = '/'.__DIR_NAME__."/";
        }
        $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]".$_dir;
        return $url;
    }
  }

 class GF_Requirements
 {
    public static function checkPHPVersion()
    {
        $ver = (float)phpversion();
        if ($ver < 7.0)
        {
             $msg_error = new GF_Message();
             exit($msg_error->showError('8'));
        }
    }
 }


 class GF_Message
 {

    public static function showError($type,$parameter=null,$parameter1=null)
    {
          $GF_NOT_FOUND_STRING = 'GF Tidak dapat menemukan file ini ->';
          $GF_R_M_C_V_L_H = "<font color='red'>'$parameter' </font> </br></br> Periksa kembali file";
 
          if ($type=='1')
          {
              $parameter= str_replace("/", "\\", $parameter);

              $message = "GF Tidak dapat menemukan file ini ->
                        <font color='red'>'$parameter' </font> Periksa kembali file tersebut !";
              return self::template($message);
          }
           else if ($type=='1a')
          {
              $parameter= str_replace("/", "\\", $parameter);

              $message = "GF Tidak dapat menemukan file ini ->
                        <font color='red'>'$parameter' </font> atau <font color='red'>'$parameter1' </font>  Periksa kembali file tersebut !";
              return self::template($message);
          }
            else if ($type=='RU')
          {
              $parameter= str_replace("/", "\\", $parameter);

              $message = $GF_NOT_FOUND_STRING.$GF_R_M_C_V_L_H." Router tersebut !";
              return self::template($message);
          }
           else if ($type=='CU')
          {
              $parameter= str_replace("/", "\\", $parameter);

             $message = $GF_NOT_FOUND_STRING.$GF_R_M_C_V_L_H." Controller tersebut !";
              return self::template($message);
             
          }
           else if ($type=='MU')
          {
              $parameter= str_replace("/", "\\", $parameter);

              $message = $GF_NOT_FOUND_STRING.$GF_R_M_C_V_L_H." Model tersebut !";
              return self::template($message);
          }
          else if ($type=='HU')
          {
              $parameter= str_replace("/", "\\", $parameter);

              $message = $GF_NOT_FOUND_STRING.$GF_R_M_C_V_L_H." Helper tersebut !";
              return self::template($message);
          }
           else if ($type=='LU')
          {
              $parameter= str_replace("/", "\\", $parameter);

              $message = $GF_NOT_FOUND_STRING.$GF_R_M_C_V_L_H." Library tersebut !";
              return self::template($message);
          }
          else if ($type=='2')
          {

              $message = "GF Tidak dapat membuat VIEW";
              return self::template($message);
          }
           else if ($type=='3')
          {

              $message = "Parameter ini -> <font color='red'>'$parameter'</font>
              haruslah sebuah <font color='green'>function()</font> bukan STRING atau Integer atau Array";
              return self::template($message);
          }
            else if ($type=='3a')
          {

              $message = "Parameter ini -> <font color='red'>'$parameter'</font>
              haruslah sebuah nama dari <font color='green'>CLASS</font> bukan Integer atau Array";
              return self::template($message);
          }
           else if ($type=='3b')
          {

              $message = "Parameter ini -> <font color='red'>'$parameter'</font> Haruslah Sebuah Function atau Nama dari view
             ";
              return self::template($message);
          }
             else if ($type=='4')
          {

              $message = "<font color='red'>CLASS</font> tidak ditemukan !, Anda harus membuat nama class <font color='red'>'$parameter'</font> terlebih dahulu di dalam controller ! Secara otomatis maka GF akan menjalankan Constructor class <font color='red'>'$parameter'</font> !";
              return self::template($message);
          }
            else if ($type=='5')
          {

              $message = "GF Tidak dapat menemukan CLASS -> <font color='red'>'$parameter'</font> Buat Class tersebut didalam controller";
              return self::template($message);
          }
             else if ($type=='6')
          {

              $message = "GF Tidak dapat menemukan halaman error ini -> <font color='red'>'$parameter'</font>";
              return self::template($message);
          }
             else if ($type=='7')
          {
              $message = "GF Tidak dapat menemukan function() ini -> <font color='red'>'$parameter'</font>";
              return self::template($message);
          }
             else if ($type=='8')
          {
              $message = "Maaf GF Hanya dapat berjalan di ->
              <font color='red'>PHP Version 7.0 or 7.1 </font>";
              return self::template($message);
          }
              else if ($type=='any')
          {
              $message = "GF Tidak dapat menemukan
              <font color='red'>function() atau halaman VIEW</font>";
              return self::template($message);
          }
           else if ($type=='GF')
          {
              $message = "Maaf Data GET dengan Parameter Tidak Tepat !";
              return self::template($message);
          }
              else if ($type=='any1')
          {
              $message = "GF Tidak dapat menemukan function ->
              <font color='red'>$parameter</font> di dalam CLASS -> <font color='green'>$parameter1</font> , Periksa function tersebut ! ";
              return self::template($message);
          }
            else if ($type=='9')
          {

              $message = "Anda harus memasukkan parameter Pretty GET pada -> <font color='red'>'$parameter'</font> Dengan menggunakan karakter pemisah <font color='green'>'/'</font> {Tanpa Tanda Petik 1}
             ";
              return self::template($message);
          }
            else if ($type=='ConnectDBError')
          {

              $message = "GF tidak dapat terhubung  Ke<font color='red'> Database Server</font>, Periksa kembali koneksi dan informasi database anda ! -> <hr><hr><font color='red'>'$parameter'</font>";
              return self::template($message);
          }
            else if ($type=='QueryError')
          {

              $message = "Terjadi Kesalahan Pada Saat Menjalankan Query -> <font color='red'>'$parameter'</font> atau Periksa Koneksi Database Anda ! <hr><hr><font color='red'>'$parameter1'</font>";
              return self::template($message);
          }
            else if ($type=='QueryEmpty')
          {

              $message = "<font color='red'>Query tidak ditemukan !</font> Masukkan Query terlebih dahulu !";
              return self::template($message);
          }
           else if ($type=='QueryEmpty')
          {

              $message = "<font color='red'>Query tidak ditemukan !</font> Masukkan Query terlebih dahulu !";
              return self::template($message);
          }
           else if ($type=='MaxPrettyGEt')
          {

              $message = "Maximum Pretty GET hanya <font color='red'>12</font> ! Request parameter -> <font color='green'>$parameter</font>";
              return self::template($message);
          }
          else if ($type=='FILES_NOT_SET')
          {
             $message = '<font color="red"> $_FILES['.$parameter.']</font> is not set ! Check in your FORM !';
             return self::template($message);
          }
          else if ($type=='VALUE_COMPRESS_IMAGE')
          {
             $message = 'Value compress image -> <font color="red">'.$parameter.'</font> should be an integer !';
             return self::template($message);
          }
            else if ($type=='DB_MAX_CHECK_ID')
          {
             $message = 'Maximum parameter function checkId() only -> <font color="red">5 column </font>';
             return self::template($message);
          }
           else if ($type=='ROUTER_NULL')
          {
             $message = 'File <font color="red">Router</font> tidak ditemukan ! 
                         Buat Terlebih Dahulu File Router ! 
                         Lokasi -> <font color="green">"app/config/config.php"</font> { $_router_app }';
             return self::template($message);
          }
          else
          {
              return true;
          }


    }
    private  static function template($value)
    {
      echo "<hr><center>".self::errorImage()."</center></br></br>
            <hr>
            <h2><center><code>$value</code></center></h2><hr>
            </br></br></br>
            <center><code><u><h3>GarudaFramework Professional</h3></u></code></center>";
    }

    private static function errorImage()
    {
      $img_error = include __GF_Image_Error__.__ext_php__;
      return '<img src="'.$img_error.'" alt="">';
    }

 }


class PrettyGET
{
      private  $uri;
      private  $count_line;
      private  $first_line;
      private  $data = array();

      function __construct($str,$type,$replaceType=null)
      {
           if ($type == true)
            {
               $this->uri = (strtolower(trim($str)));
            }
            else if ($type==false)
            {
                $this->uri = htmlspecialchars((trim($str)));
            }
             if ($replaceType==true)
            {
                $this->uri  = str_replace("#", "", $this->uri);
                $this->uri  = str_replace("{", "", $this->uri);
                $this->uri  = str_replace("}", "", $this->uri);
            }

            if ($this->checkLastLine($this->uri))
            {
               $this->uri= rtrim($this->uri,"/");
            }
              $this->countLine();
              $this->setFirstLine();
      }


      public function getCountLine()
      {
        return $this->count_line;
      }

      private function countLine()
      {
        $this->count_line =substr_count($this->uri, '/');
        return $this->count_line;
      }

      private function checkLastLine($uri)
      {
        if (empty($uri))
        {
          return false;
        }
        else
        {
            $check_last_line = $uri[strlen($uri) - 1];
            return $check_last_line =='/' ? true : false;
        }

      }

      public function getUri()
      {
        return $this->uri;
      }
      private function checkLength()
      {
        return strlen($this->uri);
      }

      private  function setFirstLine()
      {
        $result_first_line = explode('/',$this->uri);

        $this->first_line  = $result_first_line[0];
      }

      public function getFirstLine()
      {
        return $this->first_line;
      }


      public function getData()
      {
        return array_map('trim', $this->data);
      }
      public function parseUri()
      {
         $result_uri = explode('/',$this->uri);

         $count_uri  = count($result_uri);

         if ($count_uri>1)
         {
              if ($this->count_line==1)
              {
                  $this->data = array($result_uri[0],$result_uri[1]);
                  return true;
              }
              else if ($this->count_line==2)
              {
                   $this->data = array($result_uri[0],$result_uri[1],$result_uri[2]);
                    return true;
              }
              else if ($this->count_line==3)
              {
                   $this->data = array($result_uri[0],$result_uri[1],$result_uri[2],$result_uri[3]);
                    return true;
              }
              else if ($this->count_line==4)
              {
                   $this->data = array($result_uri[0],$result_uri[1],$result_uri[2],$result_uri[3]
                    ,$result_uri[4]);
                    return true;
              }
               else if ($this->count_line==5)
              {
                   $this->data = array($result_uri[0],$result_uri[1],$result_uri[2],$result_uri[3]
                    ,$result_uri[4],$result_uri[5]);
                    return true;
              }
              else if ($this->count_line==6)
              {
                   $this->data = array($result_uri[0],$result_uri[1],$result_uri[2],$result_uri[3]
                    ,$result_uri[4],$result_uri[5],$result_uri[6]);
                    return true;
              }
               else if ($this->count_line==7)
              {
                   $this->data = array($result_uri[0],$result_uri[1],$result_uri[2],$result_uri[3]
                    ,$result_uri[4],$result_uri[5],$result_uri[6],$result_uri[7]);
                    return true;
              }
              else if ($this->count_line==8)
              {
                   $this->data = array($result_uri[0],$result_uri[1],$result_uri[2],$result_uri[3]
                    ,$result_uri[4],$result_uri[5],$result_uri[6],$result_uri[7],$result_uri[8]);
                    return true;
              }
              else if ($this->count_line==9)
              {
                   $this->data = array($result_uri[0],$result_uri[1],$result_uri[2],$result_uri[3]
                    ,$result_uri[4],$result_uri[5],$result_uri[6],$result_uri[7],$result_uri[8],$result_uri[9]);
                    return true;
              }
               else if ($this->count_line==10)
              {
                   $this->data = array($result_uri[0],$result_uri[1],$result_uri[2],$result_uri[3]
                    ,$result_uri[4],$result_uri[5],$result_uri[6],$result_uri[7],$result_uri[8],$result_uri[9],$result_uri[10]);
                    return true;
              }
              else if ($this->count_line==11)
              {
                   $this->data = array($result_uri[0],$result_uri[1],$result_uri[2],$result_uri[3]
                    ,$result_uri[4],$result_uri[5],$result_uri[6],$result_uri[7],$result_uri[8],$result_uri[9],$result_uri[10],$result_uri[11]);
                    return true;
              }
               else if ($this->count_line==12)
              {
                   $this->data = array($result_uri[0],$result_uri[1],$result_uri[2],$result_uri[3]
                    ,$result_uri[4],$result_uri[5],$result_uri[6],$result_uri[7],$result_uri[8],$result_uri[9],$result_uri[10],$result_uri[11],$result_uri[12]);
                    return true;
              }
              else
              {
                  return false;
              }
         }

      }

    }

    class GF_Router extends GF_File
    {
      private static $_GET_Parameter = __URI_GET_PARAMETER__;
      private static $_GET_Request   = array();

      public static function directTo($val)
      {
         $GF_URl = new GF_URl();
         header('Location: '.$GF_URl->fullUrl().$val);
      }


      private static function countLine($str)
      {
         return substr_count($str, '/');
      }


    public static function Route(String $user_uri=null,$function_user=null,$controller=null)
    {
      header("Access-Control-Allow-Origin: *");
      if (! __production__)
      {

        if (isset($_GET[self::$_GET_Parameter]))
        {
            $get_uri_ori   = $_GET[self::$_GET_Parameter];
            $user_uri_ori  = $user_uri;

            $user_parameter   = new PrettyGET($user_uri_ori,true,true);
            $get_parameter    = new PrettyGET($get_uri_ori,false);

            $count_user = $user_parameter->getCountLine();
            $count_get  = $get_parameter->getCountLine();

            $first_line_user = $user_parameter->getFirstLine();
            $first_line_get = $get_parameter->getFirstLine();


            $get_parameter->parseUri();
            $result = $user_parameter->parseUri();


            $data_parameter = $get_parameter->getData();
            $data_request   = $user_parameter->getData();

            $count_data1  = count($data_parameter);
            $count_data2  = count($data_request);

            $result_array = array();
            

            if ($count_user > 0 && $count_get > 0 )
            {

                 if ($first_line_user==$first_line_get)
                 {

                      if ($result==false)
                      {
                          $gf = new GF_Message();
                          $gf->showError("MaxPrettyGEt",$user_uri_ori);
                          exit;
                      }


                      for ($i=0; $i < $count_data2 ; $i++) {
                          $res = $data_parameter[$i] ?? false ;
                          $result_array[$data_request[$i]] = $res;
                      }


                      if ($function_user != null && ! is_string($function_user) && ! is_int($function_user) && $controller == null)
                      {
                            call_user_func($function_user,$result_array);
                            exit;
                      }
                      else if ($function_user != null && ! is_string($function_user) && ! is_int($function_user) && $controller != null)
                      {

                          if (class_exists($controller))
                          {
                              $controller = new $controller();
                              call_user_func($function_user,$result_array,$controller);
                              exit;
                          }
                          else
                          {
                            $msg_error = new GF_Message();
                            exit($msg_error->showError('5',$controller));
                          }
                      }
                      else if (is_string($function_user) && $function_user != null)
                      {

                          self::setView($function_user,$result_array);
                          exit;
                      }
                 }
          }
          else
          {

              $first_line_user = $user_parameter->getFirstLine();
              $first_line_get = $get_parameter->getFirstLine();


              $result_array = array();
              for ($i=0; $i < $count_data2 ; $i++) {
                $res = $data_parameter[$i] ?? false ;
                $result_array[$data_request[$i]] = $res;
              }
              if ($first_line_user == $first_line_get)
              {

                    if ($function_user==null)
                    {

                        self::setView($first_line_user);
                        exit;
                    }
                    else if (is_string($function_user) && $function_user != null)
                    {
                        self::setView($function_user);
                        exit;
                    }
                    else if ($function_user != null && ! is_string($function_user) && ! is_int($function_user) && ! is_array($function_user))
                    {

                      call_user_func($function_user,$result_array);
                      exit;
                    }
                    else
                    {
                      $error = new GF_Message();

                      exit($error->showError('3b',$function_user));
                    }
              }
          }

        }
        else
        {
             $user_parameter = $user_uri;

           if ($user_parameter=='/' && $function_user==null || $user_parameter=='')
           {

                if (is_string($function_user))
                {

                   self::setView($function_user);
                   exit();
                }
                else
                {
                    if ($function_user==null)
                    {
                        ! isset($error) ? $error = new GF_Message() : false ;
                        exit($error->showError('any',$function_user));
                    }
                    else
                    {
                        call_user_func($function_user);
                        exit();
                    }

                }

           }

        }
    }
     else
    {
        if (__file_maintenance__ != null)
        {
            self::errorPage(__file_maintenance__);
            exit();
        }
    }
  }

    private static function cleanUrl($url)
    {
        return strtolower(trim($url));
    }

    public static function Controller($get_request=null,String $class=null,$method=null)
    {
      header("Access-Control-Allow-Origin: *");
          if (! __production__)
          {
              if (isset($_GET[self::$_GET_Parameter]))
              {

                  $set_parameter  =  $_GET[self::$_GET_Parameter];
                  $set_parameter  = htmlspecialchars($set_parameter);

                  $set_parameter = self::checkLastLine($set_parameter);

                  $get_request    = self::cleanUrl($get_request);
                  $set_parameter  = self::cleanUrl($set_parameter);

                  $get_ori_class = $class;
                  if (is_string($class))
                  {
                       $class          = trim($class);
                  }

                  if ($set_parameter == $get_request)
                  {
                      if ($class==null)
                      {
                          try
                          {
                            $msg_error = new GF_Message();
                            class_exists($get_request) ? $get_request  = new $get_request() && exit : exit($msg_error->showError('5',$get_request));
                          }
                          catch (Throwable $t)
                          {
                              $msg_error = new GF_Message();
                              exit($msg_error->showError('5',$get_request));
                          }

                      }
                      else if (class_exists($class) && is_string($class) && ! is_int($class))
                      {

                          if ($method==null)
                          {
                              $class = new $class();
                              exit();
                          }
                          else if (is_string($method))
                          {
                              $method = trim($method);

                              try
                              {
                                $class  = new $class();
                                if (method_exists($class ,$method))
                                {
                                    $class->$method();
                                    exit;
                                }
                                else
                                {
                                    $msg_error = new GF_Message();
                                    exit($msg_error->showError('any1',$method,$get_ori_class));
                                }


                              }
                              catch (Throwable $t)
                              {
                                   $msg_error = new GF_Message();
                                    exit($msg_error->showError('any1',$method,$get_ori_class));
                              }

                          }
                          else
                          {

                              try
                              {
                                if (!is_int($method) && ! is_array($method))
                                {
                                     $class = new $class();
                                     call_user_func($method,$class);
                                     exit();
                                }
                                else
                                {
                                    $msg_error = new GF_Message();
                                    exit($msg_error->showError('3',$method));
                                }

                              }
                              catch(Throwable $er)
                              {
                                echo "Something is wrong ! $method ->should be a call back function";
                              }

                          }
                      }
                      else
                      {
                            if (is_int($class) || is_array($class))
                            {

                              $msg_error = new GF_Message();
                              exit($msg_error->showError('3a',$class));
                            }
                            else
                            {
                                $msg_error = new GF_Message();
                                exit($msg_error->showError('5',$class));

                            }

                      }

                    }
                  }


              }
              else
              {
                  if (__file_maintenance__ != null)
                  {
                    self::errorPage(__file_maintenance__);
                    exit();
                  }
              }
          }

    private static function checkLastLine($uri){
        try {if (empty($uri)) {return $uri; } else {$check_last_line = $uri[strlen($uri) - 1]; if ($check_last_line =='/' ) {return   rtrim($uri,"/"); } else {return $uri; } } } catch(Throwable $er) {}
    }


     public static function setModel($file){
          $path = 'app/model/'.$file.__ext_php__;
          ! isset($check) ? $check = new GF_File() : false ;

          if ($check->checkFile($path))
          {
              return require_once $path;
          }
           else
          {
            $msg_error = new GF_Message();
            exit($msg_error->showError('MU',$path));
          }
     }

     public static function setLibrary($file){
          $path = 'app/library/'.$file.__ext_php__;
          ! isset($check) ? $check = new GF_File() : false ;

          if ($check->checkFile($path))
          {
              return require_once $path;
          }
           else
          {
            $msg_error = new GF_Message();
            exit($msg_error->showError('LU',$path));
          }
     }
      public static function setController($file){
          $path = 'app/controller/'.$file.__ext_php__;
          ! isset($check) ? $check = new GF_File() : false ;

          if ($check->checkFile($path))
          {
              return require_once $path;
          }
           else
          {
            $msg_error = new GF_Message();
            exit($msg_error->showError('CU',$path));
          }
     }
     public static function setHelper($file){
          $path = 'app/helper/'.$file.__ext_php__;
          ! isset($check) ? $check = new GF_File() : false ;

          if ($check->checkFile($path))
          {
              return require_once $path;
          }
          else
          {
            $msg_error = new GF_Message();
            exit($msg_error->showError('HU',$path));
          }
     }
     public static function setDatabase($file,$data1=null,$data2=null){
          $path = 'app/config/database/'.$file.__ext_php__;
          ! isset($check) ? $check = new GF_File() : false ;

          if ($check->checkFile($path))
          {
              if ($data1 != null )
              {
                  is_array($data1) ? extract($data1,EXTR_OVERWRITE) : '';

              }
              if ($data2 != null)
              {
                 is_array($data2) ? extract($data2,EXTR_OVERWRITE) : '';

              }
             return require_once $path;
          }
      }
      public static function setLanguange($file){
           $path = 'app/config/language/'.$file.__ext_php__;
          ! isset($check) ? $check = new GF_File() : false ;

          if ($check->checkFile($path))
          {
              return require_once $path;
          }
      }

      public static function setView($file,$data_1=null,$data_2=null)
      {
        $path_php  = 'app/view/'.strtolower($file).__ext_php__;
        $path_html = 'app/view/'.strtolower($file).__ext_html__;

        if (file_exists($path_php))
        {
          is_array($data_1) ? extract($data_1,EXTR_OVERWRITE) : '';
          is_array($data_2) ? extract($data_2,EXTR_OVERWRITE) : '';
          return require_once $path_php;
        }
        else if (file_exists($path_html))
        {
          is_array($data_1) ? extract($data_1,EXTR_OVERWRITE) : '';
          is_array($data_2) ? extract($data_2,EXTR_OVERWRITE) : '';
          return require_once $path_html;
        }


          $msg_error = new GF_Message();
          exit($msg_error->showError('1a',$path_php,$path_html));
      }

      public static function setRouter($file){
          $path = 'app/router/'.$file.__ext_php__;
          ! isset($check) ? $check = new GF_File() : false ;

          if ($check->checkFile($path))
          {
              return require_once $path;
          }
          else
          {
            $msg_error = new GF_Message();
            exit($msg_error->showError('RU',$path));
          }
      }
     public static function errorPage($file){
          $path = 'app/view/error/'.$file;
          ! isset($check) ? $check = new GF_File() : false ;

          if (file_exists($path.__ext_php__))
          {
              return include $path.__ext_php__;
              exit();
          }
          else if (file_exists($path.__ext_html__))
          {
             return include $path.__ext_html__;
             exit();
          }
          else
          {
              $msg_error = new GF_Message();
              exit($msg_error->showError('6',$file.__ext_html__." or ".$file.__ext_php__));

          }


      }

      public static function getHost(){
        $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
        return $url;
      }



  }

  class GF_File
  {


    private static $path_file=false;

    public static function setPath($val='')
    {
        if (self::checkFile(__STORAGE_DIR__.$val))
        {
            self::$path_file = __STORAGE_DIR__.$val;
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function checkFile($path)
    {
        return file_exists($path) ? true  : false;
    }

    public static function deleteFile()
    {
      return (file_exists(self::$path_file)) ?  unlink(self::$path_file) && true : false;
    }

    public static function download()
    {
      if (self::$path_file == false)
      {
          return false;
      }
      else
      {
          $path_result = str_replace("/", "\\", self::$path_file);
          header('Content-Description: File Transfer');
          header('Content-Type: application/octet-stream');
          header('Content-Disposition: attachment; filename="'.basename($path_result).'"');
          header('Expires: 0');
          header('Cache-Control: must-revalidate');
          header('Pragma: public');
          header('Content-Length: ' . filesize($path_result));
          readfile($path_result);
      }
    }

    public static function deleteFolder($path)
    {
      if(is_dir($path) == TRUE)
      {
          $rootFolder = scandir($path);
          if(sizeof($rootFolder) > 2)
          {
              foreach($rootFolder as $folder)
              {
                if($folder != "." && $folder != "..")
                {
                  self::deleteFolder($path."/".$folder);
                }
              }
            rmdir($path);
          }
      }
      else
      {
        file_exists($path) ? unlink($path) : false;
      }
    }
}

 class GF_Upload extends GF_File
 {
      // $_FILES['$file_upload']
      private static $file_upload;

      // Extension file
      private static $extension_file;

      // Maximum size of file
      private static $maximum_size;

      // Path file upload
      private static $path_upload;

      // default value compress image
      private static $compress_image = 50;


      // Type file FALSE for any file format
      // Type file TRUE for image file only
      private static $type_file   = false;

      private static $image_only  = array(".png", ".gif", ".jpg", ".bmp",".jpeg");

      private static $file_name_upload  = false;

      // set allow upload
      private static $allow_upload = true;

      // danger file
      private static $danger_file = array('.html','.php','.js','.exe','.php5','.php7','.htaccess');

      private static $original_name ;

      private static function setOriginalFileName()
      {
          if (isset($_FILES[self::$file_upload]["name"]))
          {
               self::$original_name =  $_FILES[self::$file_upload]["name"] ;
          }
      }
      public static function getOriginalFileName()
      {
         return self::$original_name;
      }

      public static function setCompressImage($value=50)
      {
          if (is_int($value))
          {
              self::$compress_image = $value;
          }
          else
          {
              $gf = new GF_Message();
              exit($gf->showError("VALUE_COMPRESS_IMAGE",$value));
          }
      }

      public static function setFileUpload($value)
      {
        if (isset($_FILES[$value]))
        {
           self::$file_upload = $value;
           self::setOriginalFileName();
           self::setExtensionFile();

           if (self::$type_file)
           {
               self::checkExtension() ? false : self::$allow_upload = false;
           }
        }
        else
        {
          self::$allow_upload = false;
          $msg_error = new GF_Message();
          exit($msg_error->showError('FILES_NOT_SET',$value));
        }

      }

      public static function isImage()
      {
         if (self::$type_file)
         {
            if (in_array(self::$extension_file, self::$image_only))
            {
                 self::$allow_upload = true;
                 return true;
            }
            else
            {
                self::$allow_upload = false;
                return false;
            }
         }
         return true;
      }

      public static function isEmpty()
      {
          if (empty($_FILES[self::$file_upload]["name"]))
          {
             self::$allow_upload = false;
             return false;
          }
          else
          {
             return true;
          }
      }

      public  static function setMaxSize($value)
      {
        self::$maximum_size = $value;
      }

      public static function checkSize()
      {
        return ($_FILES[self::$file_upload]["size"] >= self::$maximum_size) ? true : false ;
      }

      public static function createDirectory($path)
      {
          return (mkdir($path,0700, true)) ? true : false;

      }
      public static function setFileName($value)
      {
         if (self::$allow_upload)
         {
              self::$file_name_upload = $value;
              return self::$file_name_upload;
         }
         else
         {
             return false;
         }

      }

      public static function setImageOnly()
      {
         self::$type_file = true;
      }

      private static function setExtensionFile()
      {
         if (self::$allow_upload)
         {
             self::$extension_file = strtolower(".".pathinfo(basename($_FILES[self::$file_upload]["name"]),PATHINFO_EXTENSION));
         }
         else
         {
             return false;
         }

      }
      public static function getExtension(){
         return self::$extension_file;
      }

      private static function checkTypeFile()
      {
          return (self::$type_file==false) ? true : false;
      }

      public  static function setPath($dirname='')
      {
        if (self::$allow_upload)
        {
            $dirname = $dirname."/";

            if (! is_dir(__STORAGE_DIR__.$dirname))
            {
               if (self::createDirectory(__STORAGE_DIR__.$dirname));
               {

                    if (self::$file_name_upload != false )
                    {
                         self::$path_upload = __STORAGE_DIR__.$dirname.self::$file_name_upload.self::$extension_file;

                    }
                    else
                    {
                        self::$path_upload = __STORAGE_DIR__.$dirname.basename($_FILES[self::$file_upload]["name"]);

                    }

               }
            }
            else
            {
              if (self::$file_name_upload != false)
              {
                  self::$path_upload = __STORAGE_DIR__.$dirname.self::$file_name_upload.self::$extension_file;

              }
              else
              {
                  self::$path_upload = __STORAGE_DIR__.$dirname.basename($_FILES[self::$file_upload]["name"]);
              }

            }
        }
        else
        {
          return false;
        }
      }
      public static function checkFileUpload()
      {
         return file_exists(self::$path_upload) ? true : false;
      }
      private static function checkExtension()
      {
         return (in_array(self::$extension_file, self::$image_only)) ? true : false ;
      }

      public static function do($function=null)
      {
        $file_name_temp;
       if (self::$file_name_upload != false)
        {
           $file_name_temp = self::$file_name_upload.self::$extension_file;
        }
        else
        {
           $file_name_temp = $_FILES[self::$file_upload]['name'];
        }

        if (self::$allow_upload==false)
        {
            return false;

        }
        else if(empty(self::$path_upload))
        {
           if ( $function != null)
          {
            call_user_func($function,"File upload is empty ! ");
            return;
          }
          else
          {
            return "File upload is empty ! ";
          }
        }
        else if (! self::checkFileUpload())
        {

            if (! self::checkSize())
            {
                if (in_array(self::$extension_file, self::$danger_file))
                {
                    if ($function!=null)
                    {
                      call_user_func($function,'File <font color="red">{ '.self::$original_name.' } </font> is not allowed for upload !');
                    }
                    else
                    {
                       return 'File <font color="red">{ '.self::$original_name.' } </font> is not allowed for upload !';
                    }
                }
                else
                {
                     if (self::$type_file)
                     {
                          $compress = _compressImage($_FILES[self::$file_upload]['tmp_name'], self::$path_upload, self::$compress_image);
                          if ($compress)
                          {
                               if ($function!=null)
                              {

                                call_user_func($function,"Success Upload File -> ".$file_name_temp);
                              }
                              else
                              {
                               return 'Success Upload File -> '.$file_name_temp.'';
                              }
                          }
                          else
                          {
                               if ($function!=null)
                              {
                                  call_user_func($function,'Upload failed ');
                              }
                              else
                              {
                                  return 'Upload failed !';
                              }
                          }
                    }
                    else
                    {
                          if (move_uploaded_file($_FILES[self::$file_upload]['tmp_name'], self::$path_upload))
                         {
                             if ($function!=null)
                            {
                               call_user_func($function,"Success Upload File -> ".$file_name_temp);
                            }
                            else
                            {
                               return 'Success Upload File -> '.$file_name_temp.'';
                            }

                         }
                         else
                         {
                             if ($function!=null)
                             {
                              call_user_func($function,'Upload failed ');
                            }
                            else
                            {
                              return 'Upload failed !';
                            }
                         }
                    }
                }
            }
            else
            {
               $size_maxium =round(self::$maximum_size / 1000);
               if ($function!=null)
                  {

                    call_user_func($function,'File is too large ! Maximum size is '.$size_maxium." KB");
                  }
                  else
                  {
                     return 'File is too large ! Maximum size is '.$size_maxium." KB";
                  }
            }

        }
        else
        {
            if ($function!=null)
              {

                call_user_func($function,'File already exist ->'.$file_name_temp);
              }
              else
              {
                 return 'File already exist ->'.$file_name_temp;
              }
        }

      }
 }



   class GF_Encode_Decode
   {
          private $get_value;
          private $result_value;

          function __construct($_value)
          {
            $this->get_value = $_value;

          }

        private static function x_decryptInt($_val){
          $__data_angka = array("1","2","3","4","5","6","7","8","9","0");
          $__data_huruf = array("?","$","*","~","!","^","%",">","-","|");


          if ($_val==$__data_huruf[2])
          {
            return $__data_angka[9];
          }
          if ($_val==$__data_huruf[4])
          {
            return $__data_angka[7];
          }
          if ($_val==$__data_huruf[6])
          {
            return $__data_angka[5];
          }
          if ($_val==$__data_huruf[8])
          {
            return $__data_angka[3];
          }
          if ($_val==$__data_huruf[1])
          {
            return $__data_angka[0];
          }
          if ($_val==$__data_huruf[3])
          {
            return $__data_angka[1];
          }
          if ($_val==$__data_huruf[5])
          {
            return $__data_angka[2];
          }
          if ($_val==$__data_huruf[7])
          {
            return $__data_angka[4];
          }
          if ($_val==$__data_huruf[9])
          {
            return $__data_angka[6];
          }
          if ($_val==$__data_huruf[0])
          {
            return $__data_angka[8];
          }
          else
          {
            return strtoupper($_val);
          }
        }
        private static function x_encryptInt($_val){
          $__data_angka = array("1","2","3","4","5","6","7","8","9","0");
          $__data_huruf = array("?","$","*","~","!","^","%",">","-","|");


          if ($_val==$__data_angka[9])
          {
            return   $__data_huruf[2];
          }
          if ($_val==$__data_angka[7])
          {
            return $__data_huruf[4];
          }
          if ($_val==$__data_angka[5])
          {
            return $__data_huruf[6];
          }
          if ($_val==$__data_angka[3])
          {
            return $__data_huruf[8];
          }
          if ($_val==$__data_angka[0])
          {
            return $__data_huruf[1];
          }
          if ($_val==$__data_angka[1])
          {
            return $__data_huruf[2];
          }
          if ($_val==$__data_angka[2])
          {
            return $__data_huruf[5];
          }
          if ($_val==$__data_angka[4])
          {
            return $__data_huruf[7];
          }
          if ($_val==$__data_angka[6])
          {
            return $__data_huruf[9];
          }
          if ($_val==$__data_angka[8])
          {
           return $__data_huruf[0];
         }
       }

       private static function _length(){
        $length_value  = strlen($this->get_value);
        return $length_value;
      }

      public static function _decryptInt(){

        $new_data  =  array();

        $length_old = $this->_length();

        for ($i=0; $i < $length_old ; $i++) {
          $result = substr($this->get_value,$i, 1);

          $new_data[$i] = $this->x_decryptInt($result);
        }
        $length = count($new_data);


        for($x=0;$x<$length;$x++)
        {
         $this->result_value.=$new_data[$x];
       }

        return $this->result_value;
     }



     public static function _encryptInt(){

      $new_data  =  array();

      $length_old = $this->_length();

      for ($i=0; $i < $length_old ; $i++) {
        $result = substr($this->get_value,$i, 1);

        $new_data[$i] = $this->x_encryptInt($result);
      }
      $length = count($new_data);


      for($x=0;$x<$length;$x++)
      {
       $this->result_value.=$new_data[$x];
     }

     return $this->result_value;
    }

  }

}
