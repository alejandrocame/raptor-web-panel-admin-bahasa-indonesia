<?php 
// ======================================================================= 
// Text encoding: UTF-8/UNIX(LF) 
 
  if (isset($_REQUEST["name"])&&(intval($_REQUEST["name"])==1)) 
    $nameLanguage      ="Indonesia - Bahasa Indonesia"; else { 
   
  $listeMois= array("","Jan.","Peb.","Mar","Apr","Mei","Jun","Jul","Ags.","Sep","Okt.","Nop.","Des."); 
  $listeJour= array("","Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"Kamis","Fri"=>"Jumat","Sat"=>"Sabtu","Sun"=>"Minggu"); 
 
  $dia= array(); 
 
   
  $dia["ident"]             ="User ID";     
  $dia["ident2"]            ="Kata sandi"; 
  $dia["ident3"]            =""; 
  $dia["cantIdent"]         ="User ID salah";                                            
  $dia["identProblem1"]     ="Server tidak dapat diakses."; 
  $dia["identProblem2"]     ="Server tidak dapat diakses.";  
  $dia["identProblem3"]     ="Connection to LDAP server could not be established."; 
  $dia["enter"]             ="Masuk"; 
 
   
 
foreach($dia as $nomVar => $txtVar) { 
  $_SESSION["ws"]["dia"][$nomVar]=convertUTF8($txtVar); 
} 
foreach($listeMois as $nomVar => $txtVar) { 
  $_SESSION["ws"]["dia"]["listeMois"][$nomVar]=convertUTF8($txtVar); 
} 
foreach($listeJour as $nomVar => $txtVar) { 
  $_SESSION["ws"]["dia"]["listeJour"][$nomVar]=convertUTF8($txtVar); 
} 
 
  $_SESSION["ws"]["dia"]["startTitle"]="WebShare, the user-friendly web-FTP file explorer."; 
  $_SESSION["ws"]["dia"]["infoGPL"]  =""; 
  $_SESSION["ws"]["dia"]["noConf"]  ="No se ha encontrado ningÃºn  <br/>usuario o cuenta en el servidor. <br/><br/>Ve al <a href='admin/index.php' style='text-decoration:underline'>panel de administraciÃ³n </a><br/>para configurar tus cuentas. <br/><br/>Consulta la documentacion <br/>para mas informacion.<br/><br/>"; 
  $_SESSION["ws"]["dia"]["noServer"]="Tidak menemukan account server. <br/><br/>Ve al <a href='admin/index.php' style='text-decoration:underline'>panel de administraciÃ³n</a><br/>para configurar tus cuentas. <br/><br/>Consulta la documentaciÃ³n <br/>para mas informaciÃ³n.<br/><br/><br/>"; 
  $_SESSION["ws"]["dia"]["noUser"]  ="Tidak menemukan account pengguna. <br/><br/>Ve al <a href='admin/index.php' style='text-decoration:underline'>panel de administraciÃ³n</a><br/>para configurar tus cuentas. <br/><br/>Consulta la documentaciÃ³n <br/>para mas informaciÃ³n.<br/><br/><br/>"; 
  $_SESSION["ws"]["dia"]["noJS"]    ="JavaScript tidak terdeteksi <br/>en tu navegador. <br/><br/>Aktifkan Javascript  <br/>un navegador mÃ¡s actual<br/>para usar Webshare.<br/><br/>"; 
  $_SESSION["ws"]["dia"]["protect1"]="Entras a la administraciÃ³n de WebShare por primera vez. Para proteger tu instalaciÃ³n, debes definir un usuario y contraseÃ±a que te serÃ¡ preguntado sistematicamente durante tu prÃ³ximo acceso.<br/><br/>"; 
  $_SESSION["ws"]["dia"]["protect2"]="* Fields ± password harus sama untuk memastikan validitas.<br/>Introduce Ãºnicamente caracteres alfanumÃ©ricos en los campos.<br/>Para cambiar tu usuario mÃ¡s tarde, edita el archivo .htaccess situado en la carpeta de administraciÃ³n.<br/><br/>"; 
 
  } 
?>