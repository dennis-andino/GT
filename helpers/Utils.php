<?php


class Utils
{
 public static function getIpClient(){
     $ipAddr='0:0:0:0';
     if (isset($_SERVER["HTTP_CLIENT_IP"]))
     {
         $ipAddr= $_SERVER["HTTP_CLIENT_IP"];
     }
     elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
     {
         $ipAddr=  $_SERVER["HTTP_X_FORWARDED_FOR"];
     }
     elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
     {
         $ipAddr=  $_SERVER["HTTP_X_FORWARDED"];
     }
     elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
     {
         $ipAddr=  $_SERVER["HTTP_FORWARDED_FOR"];
     }
     elseif (isset($_SERVER["HTTP_FORWARDED"]))
     {
         $ipAddr=  $_SERVER["HTTP_FORWARDED"];
     }
     else
     {
         $ipAddr=  $_SERVER["REMOTE_ADDR"];
     }
     return $ipAddr;
 }

 public static function generatePass($length){
     $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890$@";
     $pass = "";
     for($i=0;$i<$length;$i++) {
         //obtenemos un caracter aleatorio escogido de la cadena de caracteres
         $pass .= substr($str,rand(0,63),1);
     }
     //retorna la contraseña generada
     return $pass;
 }

 public static function SendEmail($subject,$content,$destination):bool{
     $cabeceras = 'MIME-Version: 1.0' . "\r\n";
     $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
     $cabeceras .= 'From: Sistema de gestion de tutorias';
     $content = str_replace("\n.", "\n..", $content);
     $cuerpo="
     <html><body><table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'><tr><td>
<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'><thead><tr height='80'><th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;'>CEUTEC</th></tr></thead><tbody>
<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
<td style='background-color:#00a2d1; text-align:center; color:white;'><strong>GESTION DE TUTORIAS</strong></td></tr> 
  <tr><td colspan='4' style='padding:15px;'><p style='font-size:20px;'>".$content."</p><hr/>
       <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Atte. Vicerrectoria de gestion academica.</p>
       <p style='font-size:10px;'><strong>Nota: </strong>Si usted no ha solicitado cambio de contraseña , por favor notificarnos inmediatamente al departamento de gestion academica , o al correo : soporte@unitec.edu</p></td></tr></tbody></table>
 </td></tr></table></body></html>";
     return mail($destination, $subject, $cuerpo,$cabeceras);
 }

 public static function  seeError(){
     if(isset($_SESSION)){
         $_SESSION['panel']='error';
         require_once 'views/Tutor/homeTutor.php';
     }
 }

 public static function view(){
     if ($_SESSION['baseon'] == 'Tutor') {
         require_once 'views/Tutor/homeTutor.php';
     } else if ($_SESSION['baseon'] == 'Coordinator') {
         require_once 'views/Coordinator/homeCoordinator.php';
     } else if ($_SESSION['baseon'] == 'Student') {
         require_once 'views/Student/homeStudent.php';
     } else if ($_SESSION['baseon'] == 'Sys') {
         require_once 'views/Administrator/homeSys.php';
     } else {
         homeController::logout();
     }
}



}