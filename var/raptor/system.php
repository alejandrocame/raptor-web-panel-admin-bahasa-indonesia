<?php 
/*  
 *********************************************************************** 
* Copyright (C) 2013 Joel Maguiña García <joemg6@gmail.com> 
* 
* This program is free software: you can redistribute it and/or modify 
* it under the terms of the GNU General Public License as published by 
* the Free Software Foundation, either version 3 of the License, or 
* (at your option) any later version. 
* 
* This program is distributed in the hope that it will be useful, 
* but WITHOUT ANY WARRANTY; without even the implied warranty of 
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
* GNU General Public License for more details. 
* 
* You should have received a copy of the GNU General Public License 
* along with this program.  If not, see <http://www.gnu.org/licenses/>. 
* 
* (C) Copyright 2013 RaptorPanelAdmin 1.0 
************************************************************************* 
*/      
 
session_start(); 
include_once "main/auth.php"; 
include_once "main/functions.php"; 
include_once "lang/Indonisia.lang.php"; 
include_once "main/sys.php"; 
include_once "lang/".$_SESSION["ws"]["langUser"].".lang.php"; 
$nomSrv=$_SESSION["ws"]["listeServeur"][0]; 
?> 
  
<?php 
    error_reporting(0); 
    $cache_dir = "/raptorcache"; 
 
    if (!( $db = new PDO("mysql:host=localhost;dbname=raptor", "root","raptor") ) ) { 
        die("No se pudo conectar con la base de datos"); 
    } 
?> 
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <title>RaptorWebPanel 1.0</title>        
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
    <meta name="charset" content="ISO-8859-1" /> 
    <link rel="shortcut icon" href="imgpng/tc.png" />        
    <link rel="stylesheet" href="css/style.css" type="text/css" />      
    <script src="js/men.js" type="text/javascript"></script>     
    <script type="text/javascript" src="js/hd.js"></script>     
    <script type="text/JavaScript">setTimeout("document.location=document.location", 60000);</script>             
</head> 
<body> 
 
<div id="all"><!-- GERAL --> 
 
<br /> 
<div id="tbod">  
<div> 
  <?php include('header.php')?> 
 </div> 
 
      <!-- top menu panel end -->      
<div style="padding:10px 0 0 2px">       
<table style="width:976px; "> 
<tr> 
<td style="padding:0 0 0 5px"> 
<div id="vitals">         
        <table>           
          <tr> 
            <th><div id="im1"></div>&nbsp;Distribusi</th>            
            <td><input type="text" name="name" readonly="readonly" value="<?php system("$dist"); ?>" /></td> 
          </tr>             
          <tr> 
            <th><div id="im2"></div>&nbsp;Prosesor</th> 
            <td><input type="text" name="name" readonly="readonly" value="<?php echo $str1; ?> &nbsp;(<?php system("$proc"); ?> cores)" /></td>            
          </tr>           
          <tr> 
           <th><div id="im3"></div>&nbsp;Waktu aktif</th> 
            <td><input type="text" name="name" readonly="readonly" value="<?php echo $staticUptime; ?>" /></td>             
          </tr>          
          <tr> 
            <th><div id="im4"></div>&nbsp;Arsitektur</th> 
            <td><input type="text" style="width:200px"  name="name" readonly="readonly" value="<?php 
          $plat = system("$arc");         
          if ($plat == i686) 
          echo " (32 bits)"; 
          else{ 
          echo " (64 bits)";           
          } 
          ?>" /></td>             
          </tr> 
          <tr> 
            <th><div id="im5"></div>&nbsp;Temperatur</th> 
            <td><input type="text" style="width:200px;color:#2ec2d0;"  name="name" readonly="readonly" value="<?php system("$sens1"); ?><?php system("$sens2"); ?><?php system("$sens3"); ?><?php system("$sens4"); ?>"</td>             
          </tr>                            
       </table> 
</div></td> 
 
<td style="padding:0 5px 0 0"> 
<div id="vitals2">         
        <table>                     
          <tr> 
            <th><div id="im1b"></div>&nbsp;Status Raptor</th> 
            <td><input type="text" style="width:70px;color:#5daf48;"  name="name" readonly="readonly" value="<?php           
          if (! $sock = @fsockopen($ip, $porta, $num, $error, 5)) 
          echo $of; 
          else{ 
          echo $ac; 
          fclose($sock); 
          } 
          ?>" /></td> 
          <td><input type="text" style="width:70px; color:#2ec2d0;"  name="name" readonly="readonly" value="v. <?php system("$vrp"); ?>" />                         
            </td> 
          </tr> 
          <tr> 
          <th><div id="im2b"></div>&nbsp;Status Squid</th> 
           <td><input type="text" style="width:70px;color:#5daf48;"  name="name" readonly="readonly" value="<?php           
          if (! $sock2 = @fsockopen($ip, $porta, $num, $error, 5)) 
          echo $ofsq; 
          else{ 
          echo $acsq; 
          fclose($sock2); 
          } 
          ?>" /></td> 
          <td><input type="text" style="width:70px; color:#2ec2d0;"  name="name" readonly="readonly" value="v. <?php system("$vsq3x"); ?><?php system("$vsq"); ?>" /></td>              
          </tr> 
          <tr> 
            <th><div id="im3b"></div>&nbsp;DNS Cache</th> 
            <td><input type="text" style="width:70px"  name="name" readonly="readonly" value="<?php system("$dns"); ?>" /></td>             
          </tr> 
          <tr> 
            <th><div id="im4b"></div>&nbsp;Koneksi</th> 
            <td><input type="text" style="width:70px"  name="name" readonly="readonly" value="<?php system("$cnx"); ?>" /></td>             
          </tr> 
             
          <tr> 
            <th><div id="im5b"></div>&nbsp;Pengguna</th> 
            <td><input type="text" style="width:70px"  name="name" readonly="readonly" value="<?php system("$us"); ?>" /></td> 
            </tr>         
        </table> 
</div> 
</td> 
</tr> 
 
</table> 
</div> 
 
<div class="dgraph">      
<table>  
<tr> 
<td> 
 
<div id="graphcact"> 
 <img src="<?=$graph?>" /> 
 </div> 
   
</td> 
</tr> 
</table> 
</div> 
 
<?php 
            $arr_d = explode("#", disk_use($cache_dir)); 
            $d_total = $arr_d[0];  
            $d_usado = $arr_d[1];  
            $d_pusado = $arr_d[2];  
            $d_libre = $arr_d[3];  
            $d_plibre = $arr_d[4];  
?> 
  
<div style="padding:0 10px 10px 10px ">      
<table style="width:960px;background-color:#dbeaf9;border:1px solid #a3bfd5; border-radius: 6px;padding:0 0 20px 0; box-shadow: 1px -1px 4px 1px rgba(163, 191, 213, 0.65);">  
<tr> 
<td>  
<div id="hddisk"> 
        <table> 
        <tr> 
        <div id="imhd"></div><td><h5 class="tit"> Ruang Penyimpanan - RaptorCache</h5></td>         
         </tr> 
         </table>         
        <table style="width:576px;padding:0 0 0 30px;">          
         <br />   
         <tr>          
         <td>Jumlah Cakram </td> 
         <td>Total Kapasitas </td> 
         <td>Digunakan </td> 
         <td>Tersedia </td> 
          </tr> 
          <tr>   
            <td><input type="text" style="width:42px"  name="name" readonly="readonly" value="<? system("$hddisk"); ?>" /></td>  
            <td><input type="text" style="width:80px"  name="name" readonly="readonly" value="<?= sizeFormat($d_total) ?>" /></td>               
            <td><input type="text" style="width:80px"  name="name" readonly="readonly" value="<?= sizeFormat($d_usado) ?>" /></td>               
            <td><input type="text" style="width:80px"  name="name" readonly="readonly" value="<?= sizeFormat($d_libre) ?>" /></td>            
          </tr>           
       </table>         
</div> 
</td> 
 
<td style="padding:20px 20px 0 0">         
        <table class="canvas"> 
          <tr>         
          <td>           
<div id="hddiskx"> 
<br /> 
<canvas id="canvas" width="130" height="130"></canvas> 
<table style="padding:40px 0 0 30px;" id="mydata"> 
<tr><td class="td1">Digunakan</td><td class="td2"><?= $d_pusado ?> %</td>  </tr> 
<tr><td class="td3">Tersedia</td><td class="td4"><?= $d_plibre ?> %</td>  </tr> 
</table> 
</div> 
</td> 
          </tr>                 
        </table>          
</td> 
 
</tr> 
</table> 
</div> 
 
<div style="padding:0 0 10px 10px ">      
<table style="width:960px;background-color:#dbeaf9;border:1px solid #a3bfd5; border-radius: 6px;padding:10px 0 10px 0; box-shadow: 1px -1px 4px 1px rgba(163, 191, 213, 0.65);">  
<tr> 
<td> 
 
<div id="memory"> 
 <table style="width:682px;" > 
        <tr> 
        <div id="imram"></div><td><h5 style="text-shadow: 0px 0px 0px #15428b;"> RAM</h5></td> 
        <td><div class="graphm">   
         <div class="bar" style="width: <? echo round($ram[2] * 100 / $ram[1],0); ?>%;"> <? echo round($ram[2] * 100 / $ram[1],0); ?>%</div> 
         </div></td> 
         </tr> 
         </table> 
         <H2></H2> 
<table>   
  <tr> 
    <td class="mem">Total Memori</td> 
    <td class="mem">Memori Digunakan</td> 
    <td class="mem">Memori Bebas</td> 
    <td class="mem">Memori Compart.</td> 
    <td class="mem">Memori Buffers</td> 
    <td class="mem">Memori Cache</td> 
  </tr>        
    <tr>       
       <td><input type="text" style="width:100px"  name="name" readonly="readonly" value="<? echo sizeFormat($ram[1]*1024*1024); ?>" /></td> 
       <td><input type="text" style="width:100px"  name="name" readonly="readonly" value="<? echo sizeFormat($ram[2]*1024*1024) . " (" . round($ram[2] * 100 / $ram[1],0); ?>%)" /></td> 
       <td><input type="text" style="width:100px"  name="name" readonly="readonly" value="<? echo sizeFormat($ram[3]*1024*1024) . " (" . round($ram[3] * 100 / $ram[1],0); ?>%)"</td> 
       <td><input type="text" style="width:100px"  name="name" readonly="readonly" value="<? echo sizeFormat($ram[4]*1024*1024) . " (" . round($ram[4] * 100 / $ram[1],0); ?>%)"</td> 
       <td><input type="text" style="width:100px"  name="name" readonly="readonly" value="<? echo sizeFormat($ram[5]*1024*1024) . " (" . round($ram[5] * 100 / $ram[1],0); ?>%)"</td> 
       <td><input type="text" style="width:100px"  name="name" readonly="readonly" value="<? echo sizeFormat($ram[5]*1024*1024) . " (" . round($ram[6] * 100 / $ram[1],0); ?>%)"</td>                 
    </tr> 
</table> 
</div> 
 
<div id="memory"> 
<H2></H2> 
  <table> 
  <tr> 
    <td class="mem">Swap Total</td> 
    <td class="mem">Swap Digunakan</td> 
    <td class="mem">Swap Bebas</td> 
  </tr> 
  <tr> 
    <td><input type="text" style="width:100px"  name="name" readonly="readonly" value="<? echo sizeFormat($swap[1]*1024*1024); ?>" /></td> 
    <td><input type="text" style="width:100px"  name="name" readonly="readonly" value="<? echo sizeFormat($swap[2]*1024*1024) . " (" . round($swap[2] * 100 / $swap[1],0); ?>%)" /></td> 
    <td><input type="text" style="width:100px"  name="name" readonly="readonly" value="<? echo sizeFormat($swap[3]*1024*1024) . " (" . round($swap[3] * 100 / $swap[1],0); ?>%)" /></td>     
  </tr> 
  </table> 
 
</div> 
 
</td> 
</tr> 
</table> 
</div> 
 
<div id="red"> 
<table>  
<tr><td style="padding:0 0 0 10px"> 
<br /> 
<div id="imred"></div><h5 class="tit"> Lalu Lintas Jaringan </h5> 
<iframe src="vns/vns.php?if=eth2&graph=large&style=light&page=h"></iframe> 
</td></tr> 
</table> 
</div> 
 
<div id="halt"> 
<ul> 
  <li><a href="run.php?accion=halt" ><img src="./imgpng/halt.png" title="Shutdown Server" style="border: 0px;" /></a></li> 
  <li><a href="run.php?accion=reboot"><img src="./imgpng/reboot.png" title="Reboot Server" style="border: 0px;" /></a></li> 
</ul> 
</div> 
 
 
</div> 
</div><!-- GERAL -->  
 
<div id="footer"><p><? echo $cop; ?></p><br />         
</div> 
 
 
</body> 
</html>