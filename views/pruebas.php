
<?php
/* date_default_timezone_set('America/Tegucigalpa');
$hoy = date('d-m-Y g:ia');
$fecha=date('d-m-Y');
echo $hoy;

$nombreDelArchivo = "graduacion.png";
$extension = pathinfo($nombreDelArchivo, PATHINFO_EXTENSION);
echo $extension;
$content=" Hola Dennis , hemos hecho el cambio solicitado, su nueva clave es:<br> <li>TREFGT567 </li>";
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
echo $cuerpo;*/

header('Location:'.base_url.'database/backUp');
