<?php
    if (preg_match("/MSIE/i" , $_SERVER["HTTP_USER_AGENT"])==1)       $navig="IE";
elseif (preg_match("/Chrome/i",$_SERVER["HTTP_USER_AGENT"])==1)       $navig="CH";
elseif (preg_match("/KHTML/i" ,$_SERVER["HTTP_USER_AGENT"])==1)       $navig="KH";
elseif (preg_match("/opera/i" ,$_SERVER["HTTP_USER_AGENT"])==1)       $navig="OP";
elseif (preg_match("/^Mozilla\//i", $_SERVER["HTTP_USER_AGENT"])==1)  $navig="MO";
                                                                 else $navig="NS";
if ($navig=="IE") $instr= "client"; else $instr= "offset";
if ($navig=="IE") $filtre='filter:alpha(opacity=0)';
             else $filtre='opacity:0';

exec("convert -version", $out);
$libraryImg="gd";
if (preg_match("/ImageMagick/",$out[1])==1) $libraryImg="ic";

// sys
function disk_use($dir){
		$df = round(disk_free_space($dir),0);
		$dt = round(disk_total_space($dir),0);
		$du = round($dt-$df,0);
		$pdu = round(($du / $dt)*100,0);
		$pdf = round($df * 100 / $dt,0);
		return $dt . "#" . $du . "#" . $pdu . "#" . $df . "#" . $pdf . "#";		
	}
	
function sizeFormat($size){
	    if($size<1024)
	    {
	        return $size." bytes";
	    }
	    else if($size<(1024*1024))
	    {
	        $size=round($size/1024,2);
	        return $size." KiB";
	    }
	    else if($size<(1024*1024*1024))
	    {
	        $size=round($size/(1024*1024),2);
	        return $size." MiB";
	    }
	    else if($size<(1024*1024*1024*1024))
	    {
	        $size=round($size/(1024*1024*1024),2);
	        return $size." GiB";
	    }
		else
	    {
	        $size=round($size/(1024*1024*1024*1024),2);
	        return $size." TiB";
	    }
	}

	$totaleconomy = $totalhits = $totalcount = $totalsize = 0;
	
	 exec("cat /proc/cpuinfo | grep \"model name\\|processor\"", $PROCESSA);
           $str1 = trim($PROCESSA[1]);
           $str1 = preg_replace("/\s(?=\s)/", "", $str1);
           $str1 = preg_replace("/[\n\r\t]/", " ", $str1);
	    $str1 =  str_replace("model name : ", "", $str1);
		
function format_uptime($seconds) {  
  $mins = intval($seconds / 60 % 60);
  $hours = intval($seconds / 3600 % 24);
  $days = intval($seconds / 86400);
  if ($days > 0) {
    $uptimeString .= $days;
    $uptimeString .= (($days == 1) ? " d&iacute;a" : " d&iacute;as");
  }
  if ($hours > 0) {
    $uptimeString .= (($days > 0) ? ", " : "") . $hours;
    $uptimeString .= ((hours == 1) ? " hora" : " jam");
  }
  if ($mins > 0) {
    $uptimeString .= (($days > 0 || $hours > 0) ? ", " : "") . $mins;
    $uptimeString .= (($mins == 1) ? " min." : " mins.");
  }
  if ($secs > 0) {
    $uptimeString .= (($days > 0 || $hours > 0 || $mins > 0) ? ", " : "") . $secs;
    $uptimeString .= (($secs == 1) ? " segundo" : " detik");
  }
  return $uptimeString;
}
  $uptime = exec("cat /proc/uptime");
  $uptime = split(" ",$uptime);
  $uptimeSecs = $uptime[0];
  $staticUptime = "".format_uptime($uptimeSecs);

    
exec("free -m", $output);
    $str = trim($output[1]);
    $str = preg_replace("/\s(?=\s)/", "", $str);
    $str = preg_replace("/[\n\r\t]/", " ", $str);
    $ram = explode(" ", $str);
    $str = trim($output[3]);
    $str = preg_replace("/\s(?=\s)/", "", $str);
    $str = preg_replace("/[\n\r\t]/", " ", $str);
    $swap = explode(" ", $str);	
	
	
$cop="Copyright &copy; 2013 @ RaptorWebPanel 1.0 &copy; All Rights Reserved";
//

if ($libraryImg=="gd") $typeImgReco="/png|jpeg|jpg|gif/i";
else $typeImgReco="/png|jpeg|jpg|bmp|gif|cur|dcr|dib|emf|eps|ico|pdf|ps|psd|svg|tga|tif|ai/i";
              
   
   function blindeNom($v_in) {
     $v_out = str_replace("&","&amp;",$v_in);
     convertUTF8($v_out);
     return $v_out;
   }

   function blindeLien($v_in) {
     $v_in  = utf8_encode(htmlspecialchars($v_in));
     $v_out = str_replace(array("%2F","%2F%2F","//","///","\\"),"/",$v_in);
     return $v_out;
   }

   function blindeChemin($v_in) {
     $v_out = str_replace(array("%2F","%2F%2F","//","///","\\"),"/",$v_in);
     return $v_out;
   }

   function blindeAffichage($v_in) {
     $v_out =  utf8_encode(str_replace("&","%26",$v_in));
     return $v_out;
   }

   
   function getDocumentRoot() {
     if (!isset($_SERVER["DOCUMENT_ROOT"])||empty($_SERVER["DOCUMENT_ROOT"])) {
       $pathRoot= blindeChemin(isset($_SERVER["PATH_TRANSLATED"])?$_SERVER["PATH_TRANSLATED"]:realpath($_SERVER["SCRIPT_FILENAME"]));
       $pathFile= blindeChemin(isset($_SERVER["SCRIPT_NAME"])?$_SERVER["SCRIPT_NAME"]:$_SERVER["PHP_SELF"]);
       if (empty($pathFile)) $pathFile= blindeChemin($_SERVER["ORIG_PATH_INFO"]);
       $docRoot= str_replace ($pathFile,"",$pathRoot)."/";
     } else {
       $docRoot= $_SERVER["DOCUMENT_ROOT"]; 
     }
     return $docRoot;
   }

   
   function getScriptRoot() {
     $pathRoot= dirname(blindeChemin(isset($_SERVER["PATH_TRANSLATED"])?$_SERVER["PATH_TRANSLATED"]:realpath($_SERVER["SCRIPT_FILENAME"])));
     return $pathRoot;
   }
   
   
   function verifie($nomChemin) {
     if (!isset($nomChemin)||empty($nomChemin)||(strstr(html_entity_decode($nomChemin),"..")!==false)||preg_match($_SESSION["ws"]["varsUser"],html_entity_decode($nomChemin)))
       { echo $_SESSION["ws"]["dia"]["noOperation"]; exit(); }
   }

  
  function gestion($perms) {

   $iciPerm="";
    switch ($_SESSION["ws"]["typeUser"]) {

    case 1:
    
     if (($perms & 0x0100)&&($_SESSION["ws"]["auth1"]=="on")) $iciPerm.= 'R';
     if (($perms & 0x0080)&&($_SESSION["ws"]["auth3"]=="on")) $iciPerm.= 'W';
    break;

    case 2:
     
     if (($perms & 0x0100)&&($perms & 0x0020)&&($_SESSION["ws"]["auth1"]=="on")) $iciPerm.= 'R';
     if (($perms & 0x0080)&&($perms & 0x0010)&&($_SESSION["ws"]["auth3"]=="on")) $iciPerm.= 'W';
    break;

    case 3: default:
     
     if (($perms & 0x0100)&&($perms & 0x0004)&&($_SESSION["ws"]["auth1"]=="on")) $iciPerm.= 'R';
     if (($perms & 0x0080)&&($perms & 0x0002)&&($_SESSION["ws"]["auth3"]=="on")) $iciPerm.= 'W';
    break;
    }

    if (empty($iciPerm)) $iciPerm="N";
    return $iciPerm;

  }

  
  function gestionFTP($perms) {

   $iciPerm="";
    switch ($_SESSION["ws"]["typeUser"]) {
    case 1:
    
     if ((substr($perms,1,1)=="r")&&($_SESSION["ws"]["auth1"]=="on")) $iciPerm.= 'R';
     if ((substr($perms,2,1)=="w")&&($_SESSION["ws"]["auth3"]=="on")) $iciPerm.= 'W';
    break;

    case 2:
     
     if ((substr($perms,4,1)=="r")&&($_SESSION["ws"]["auth1"]=="on")) $iciPerm.= 'R';
     if ((substr($perms,5,1)=="w")&&($_SESSION["ws"]["auth3"]=="on")) $iciPerm.= 'W';
    break;

    case 3: default:
     
     if ((substr($perms,7,1)=="r")&&($_SESSION["ws"]["auth1"]=="on")) $iciPerm.= 'R';
     if ((substr($perms,8,1)=="w")&&($_SESSION["ws"]["auth3"]=="on")) $iciPerm.= 'W';
    break;
    }

    if (empty($iciPerm)) $iciPerm="N";
    return $iciPerm;
  }

   
   function dezipper($nomElement,$nomDestination) {

      include_once "zip.lib.php";
      $zip = zip_open(blindeChemin($nomElement));

      if ($zip) {
        while ($zip_entry = zip_read($zip)) {
          $filepath=str_replace("%2F", "/",urlencode(dirname(zip_entry_name($zip_entry))));
          $filename=urlencode(basename(zip_entry_name($zip_entry)));
          $filepath=str_replace("+", " ",preg_replace('~%([0-9a-f])([0-9a-f])~ei', 'ascToUtf8(hexdec("\\1\\2"))', $filepath));
          $filename=str_replace("+", " ",preg_replace('~%([0-9a-f])([0-9a-f])~ei', 'ascToUtf8(hexdec("\\1\\2"))', $filename));

          $taille= zip_entry_filesize($zip_entry);

          if (!is_dir(blindeChemin($nomDestination."/".$filepath))) mkdir (blindeChemin($nomDestination."/".$filepath));
           if (isset($filename)&&!empty($filename)&&(strstr(html_entity_decode($filename),"..")===false)&&!preg_match($_SESSION["ws"]["varsUser"],html_entity_decode($filename))) {
            if ($taille!=0) {
              if (zip_entry_open($zip, $zip_entry, "r")) {
              if (!$handle = @fopen(blindeChemin("$nomDestination/$filepath/".$filename), 'w+'))
                return " msginfo=\"".$_SESSION["ws"]["dia"]["cantOpen"]." (".blindeChemin("$nomDestination/$filepath/$filename").")\";";
              if (@fwrite($handle, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry))) === FALSE)
                return " msginfo=\"".$_SESSION["ws"]["dia"]["cantwrite"]." (".blindeChemin("$nomDestination/$filepath/$filename").")\";";
              @fclose($handle);
              zip_entry_close($zip_entry);
            }
           }
          }

        }
        zip_close($zip);
     }
   }

  $erreur="";
  $old_error_handler = set_error_handler("myErrorHandler");

  
  function myErrorHandler($errno, $errstr, $errfile, $errline) {
    global $erreur;
        if ((preg_match("/Permission denied/", $errstr))==1) $erreur= @$_SESSION["ws"]["dia"]["prohibited"];
    elseif ((preg_match("/File exist/", $errstr))==1)        $erreur= @$_SESSION["ws"]["dia"]["fileExist"];
                                                        else $erreur= @$_SESSION["ws"]["dia"]["identProblem2"];
                                                        $erreur= $errstr;
  }

  
  function deflang() {
    switch(strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2))) {
      case "us" : $deflang='English';   break;
      case "en" : $deflang='English';   break;
      case "fr" : $deflang='Francais';  break;
      case "ja" : $deflang='Japanese';  break;
      case "jp" : $deflang='Japanese';  break;
      case "de" : $deflang='Deutsch';   break;
      case "pt" : $deflang='Portugues'; break;
      case "br" : $deflang='Portugues'; break;
      case "es" : $deflang='Spanish';   break;
      case "ca" : $deflang='Catalan';   break;
      case "zh" : $deflang='Chinese';   break;
      case "ko" : $deflang='Korean';    break;
      default   : $deflang='English';   break;
    }
    return $deflang;
  }

  
  function connexionFTP($nomFTP) {
    $conn_id = @ftp_connect($_SESSION["ws"]["$nomFTP"]["adrServeur"]);
    $login_result = @ftp_login($conn_id, $_SESSION["ws"]["$nomFTP"]["logServeur"], base64_decode($_SESSION["ws"]["$nomFTP"]["passServeur"]));
    if ((!$conn_id) || (!$login_result)) return false;
                                  else { return $conn_id; }
  }

  
  function ftp_get_contents($ftp_stream, $remote_file, $mode, $resume_pos=null){
    $name_file= basename($remote_file);
    @ftp_get($ftp_stream, blindeChemin($_SESSION["ws"]["tempDir"]."/".$name_file), $remote_file, FTP_BINARY);
    $contenu= @file_get_contents(blindeChemin($_SESSION["ws"]["tempDir"]."/".$name_file));
    @unlink (blindeChemin($_SESSION["ws"]["tempDir"]."/".$name_file));
    return $contenu;
  }

  
  function ftp_file_contents($ftp_stream, $remote_file, $mode, $resume_pos=null){
    $name_file= basename($remote_file);
    @ftp_get($ftp_stream, blindeChemin($_SESSION["ws"]["tempDir"]."/".$name_file), $remote_file, FTP_BINARY);
    $contenu= @file(blindeChemin($_SESSION["ws"]["tempDir"]."/".$name_file));
    @unlink (blindeChemin($_SESSION["ws"]["tempDir"]."/".$name_file));
    return $contenu;
  }
  
  
  function ftp_recup_fileinfo($nomSrv,$cheminGlobal) {

    $_SESSION["ws"]["$nomSrv"]["connexion"]=connexionFTP($nomSrv);
    $cheminFichier= blindeChemin($_SESSION["ws"]["$nomSrv"]["rootServeur"].dirname($cheminGlobal));
    $permGlob= "RW";
    $tabInfos= array();

    if (($contents = ftp_rawlist($_SESSION["ws"]["$nomSrv"]["connexion"], $cheminFichier))!==FALSE) {
      foreach($contents as $entry) {

        $info = array();
        $vinfo = preg_split("/[\s]+/", $entry, 9);

        if ( (preg_match($_SESSION["ws"]["varsUser"], $vinfo[8])==0) && (trim($vinfo[8])==basename($cheminGlobal)) ) {
          if ($vinfo[0] !== "total") {
            $info['chmod'] = trim($vinfo[0]);
            $info['num']   = trim($vinfo[1]);
            $info['owner'] = trim($vinfo[2]);
            $info['group'] = trim($vinfo[3]);
            $info['size']  = trim($vinfo[4]);
            $info['month'] = trim($vinfo[5]);
            $info['day']   = trim($vinfo[6]);
            $info['time']  = trim($vinfo[7]);
            $info['name']  = trim($vinfo[8]);
          }
        
          $tabInfos["iciPerm"] =gestionFTP($info['chmod']);
          $tabInfos["modif"]   =$info['day']." ".$info['month']." ".$info['time'];

          if (strpos($info['chmod'],"d")!==FALSE) {
                 $tabInfos["proto"]  ="dossier";
                 $tabInfos["taille"] =0; }
          else { $tabInfos["proto"]  ="local";
                 $tabInfos["taille"] =$info['size']; }

          if (strpos($info['chmod'],"l")!==FALSE) {
            $symLink=explode(" ->", $info['name']);
            $info['name']=$symLink[0];
          }
          return $tabInfos;
        }
      }
    }
    return false;
  }

  
  function convertUTF8($str) {
    if (!function_exists('mb_convert_encoding')) return $str;
    else {
      if ($str === mb_convert_encoding(mb_convert_encoding($str, "UTF-32", "UTF-8"), "UTF-8", "UTF-32"))
           return $str;
      else return mb_convert_encoding($str,"UTF-8");
    }
  }

  
  function jsToUtf8($val) {
    return preg_replace("/%u([0-9ABCDEFabcdef]{3,5})/e", 'html_to_utf8("\\1")', urldecode($val));
  }

  
  function ascToUtf8($val) {

    $convertTable= array(
      "128"=>"Ç", "129"=>"ü", "130"=>"é", "131"=>"â", "132"=>"ä", "133"=>"à", "135"=>"ç", "136"=>"ê", "137"=>"ë", "138"=>"è", "139"=>"ï",
      "140"=>"î", "141"=>"ì", "142"=>"Ä", "143"=>"Å", "144"=>"É", "145"=>"æ", "146"=>"Æ", "147"=>"ô", "148"=>"ö", "149"=>"ò", "150"=>"û",
      "151"=>"ù", "152"=>"ÿ", "153"=>"Ö", "154"=>"Ü", "160"=>"á", "161"=>"í", "162"=>"ó", "163"=>"ú", "164"=>"ñ", "165"=>"Ñ", "167"=>"°", "248"=>"°");
    return $convertTable[$val];
  }

  
  function unistr_to_ords($str, $encoding = 'UTF-8'){
    $str = mb_convert_encoding($str,"UCS-4BE",$encoding);
    $ords = array();

    
    for($i = 0; $i < mb_strlen($str,"UCS-4BE"); $i++){
      
      $s2 = mb_substr($str,$i,1,"UCS-4BE");
      $val = unpack("N",$s2);
      $ords[] = $val[1];
    }
      return($ords);
  }

  
  function convCar($str) {
    if (function_exists('mb_convert_encoding')) {
      $result = unistr_to_ords($str); $nomCorrige="";

      foreach ($result as $valCar) {
        if ($valCar<=255) $nomCorrige.=chr($valCar);
                     else $nomCorrige.="%u".dechex($valCar); }
                     
           return utf8_encode($nomCorrige);
    } else return $str;
  }

  function html_to_utf8($data) {
    $data= hexdec($data);
    if ($data > 127) {
      $i = 5;
      while (($i--) > 0) {
        if ($data != ($a = $data % ($p = pow(64, $i)))) {
          $ret = chr(base_convert(str_pad(str_repeat(1, $i + 1), 8, "0"), 2, 10) + (($data - $a) / $p));
          for ($i; $i > 0; $i--)
            $ret .= chr(128 + ((($data % pow(64, $i)) - ($data % ($p = pow(64, $i - 1)))) / $p));
            break; }
      }
    } else $ret = "&#$data;";
    return $ret;
  }

  
  function conversion($val) {
    $val = trim($val);
    $last = strtolower($val{strlen($val)-1});
    switch($last) {
      case 'g': $val *= 1024;
      case 'm': $val *= 1024;
      case 'k': $val *= 1024; break;
    }
    return $val;
  }


    function ColorPhpCode($Code) {

    $Color['html']    = '#00000';
    $Color['comment'] = '#008080';
    $Color['default'] = '#0000BB';
    $Color['keyword'] = '#007700';  
    $Color['string']  = '#FF4000';

    $ret = highlight_string($Code, true);

    $in = array(
      '`</?code>`i',
      '`<(?:font color="|span style="color: )' .ini_get('highlight.html')   . '">(.+?)</(?:font|span)>`si',
      '`<(?:font color="|span style="color: )' .ini_get('highlight.comment'). '">(.+?)</(?:font|span)>`si',
      '`<(?:font color="|span style="color: )' .ini_get('highlight.default'). '">(.+?)</(?:font|span)>`si',
      '`<(?:font color="|span style="color: )' .ini_get('highlight.keyword'). '">(.+?)</(?:font|span)>`si',
      '`<(?:font color="|span style="color: )' .ini_get('highlight.string') . '">(.+?)</(?:font|span)>`si',
      '` `si'
    );

    $out = array(
      '',
      '<span class="html">$1</span>',
      '<span style="color:' .$Color['comment']. '">$1</span>',
      '<span style="color:' .$Color['default']. '">$1</span>',
      '<span style="color:' .$Color['keyword']. '">$1</span>',
      '<span style="color:' .$Color['string' ]. '">$1</span>',
      ' '
    );
  
    $ret= preg_replace($in, $out, $ret);
    $pieces= explode("<br />",$ret); $numLigne=1;
    $ret  = "<table border=0 cellspacing=0 cellpadding=0>\n";
    foreach ($pieces as $valeur)
      $ret.= "<tr><td class='cl'>".$numLigne++."</td><td class='cd'>&nbsp;".$valeur."</td></tr>\n";
      $ret .= "</table>";
    return $ret;
  }

  


class class_mysql {
  var	$private_connect;  
  var	$private_errmsg;     

  
  function class_mysql() {
  }

  
  function test() {
    return @mysql_ping($this->private_connect);
  }

  
  function connect() {
    if (empty($this->private_connect) || !$this->test()) {
      if (($this->private_connect=mysql_connect($_SESSION["ws"]["serveurBase"], $_SESSION["ws"]["loginBase"], base64_decode($_SESSION["ws"]["passBase"])))!==false) {
        mysql_select_db($_SESSION["ws"]["tableBase"]);
        mysql_query("SET NAMES 'utf8'");
        return true;
     	} else return false;
    }
    
  }

  
  function request_result($l_query) {
    if (!$this->test()) $l_mysql->connect();
      if (!empty($l_query) && (($l_ret=@mysql_query($l_query))!==false) ) {

          $l_result = Array();
          while ($l_row = @mysql_fetch_array($l_ret)) {
            foreach ($l_row as $l_key => $l_value) {
              $p_http[$l_key]= $l_value;
            }
            $l_result[] = $p_http;
          }
          @mysql_free_result($l_ret);
          return $l_result;
      } else {
          return false;
      }
  }

  
  function request($l_query) {
    if (!$this->test()) $l_mysql->connect();
      if (!empty($l_query) && ((@mysql_query($l_query))!==false) )
           return true;
      else return false;
  }

  
  function blinde_param($p_param) {
    foreach ($p_param as $l_key => $l_value) {
      if (is_string($l_value) && ($l_value == "")) $p_http[$l_key] = "";
      elseif (is_string($l_value)) $p_http[$l_key] = mysql_real_escape_string(stripslashes($l_value));
      elseif (is_array($l_value))  $p_http[$l_key] = $this->blinde_param($l_value);
    }
    return $p_http;
  }

  
  function disconnect() {
      @mysql_close($this->private_connect);
  }
  
  
  function error() {
      $private_errmsg= "L'erreur renvoyée par mySQL est : ".@mysql_error($this->private_connect)."\n";
      return $private_errmsg;
  }

  
  function logAction($tabLog) {
    if ($_SESSION["ws"]["activeLog"]==1) {
      $tabLog["idaction"]= $tabLog["0"];
      $tabLog["idresult"]= $tabLog["1"];
      $tabLog["username"]= $tabLog["3"];
      $tabLog["content"] = $tabLog["6"];
      $tabLog["verbose"] = jsToUtf8($tabLog["2"]);
      $tabLog["path"]    = jsToUtf8($tabLog["4"]);
      $tabLog["file"]    = jsToUtf8($tabLog["5"]);

      $ipadr=$_SERVER['REMOTE_ADDR'];
      if ($this->test()) {
        $tabLog = $this->blinde_param($tabLog);

        
        $request= "INSERT INTO wslog (idaction,idresult,iddate,verbose,username,path,file,content,ipadr)
                   VALUES('$tabLog[idaction]','$tabLog[idresult]','".date("Y-m-d H:i:s")."',
                   '$tabLog[verbose]','$tabLog[username]','$tabLog[path]','$tabLog[file]',
                   '$tabLog[content]','$ipadr')";
        $result = $this->request($request);
        
      } elseif (isset($_SESSION["ws"]["repLog"])) {
      
        
        if (($dest = fopen($_SESSION["ws"]["repLog"]."logs-".date("Ymd").".txt", "a+")) === FALSE) $erreur=1; else { $erreur = 0;
           fwrite ($dest,date("Y-m-d H:i:s")." \ ".$tabLog["username"]." ($ipadr) : ".$tabLog["verbose"]." \n");
           fclose ($dest);
        }
      }
    }
  }

  
  function updateFileInfo($tabFile) {

      if ($this->test()) {
        $tabFile = $this->blinde_param($tabFile);
        
        $request= "UPDATE wsfiles SET idServeur= '$tabLog[idServeur]', nomServeur= '$tabLog[nomServeurF]',
          path= '$tabLog[cheminF]', file= '$tabLog[nomF]',
          WHERE nomServeur LIKE '$tabLog[nomServeurD]' AND path LIKE '$tabLog[cheminD]' AND file LIKE '$tabLog[nomD]' ";
        $result = $this->request($request);
      }
  }
  
}
?>
