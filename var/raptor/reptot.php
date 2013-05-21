<?php 
/*  
 *********************************************************************** 
* Copyright (C) 2012 Joel Magui馻 Garc韆 <joemg6@gmail.com> 
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
* (C) Copyright 2012 RaptorPanelAdmin 1.0 
************************************************************************** 
*/      
session_start(); 
include_once "main/auth.php"; 
include_once "main/functions.php"; 
include_once "lang/Indonesia.lang.php"; 
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
       <link href="css/table_styles.css" rel="stylesheet" type="text/css" />      
       <script type="text/javascript" src="js/tc.js"></script> 
               
    <style type="text/css"> 
        <!-- 
             
        --> 
    </style> 
</head> 
<body> 
 
<div id="all"><!-- GERAL -->  
<br /> 
<div id="tbod">  
<div> 
  <?php include('header.php')?> 
 </div> 
 
    <!-- top navigation pannel end --> 
<br /> 
<h1>Ringkasan Laporan</h1> 
 
<div style="width:980px; padding:6px 0 6px 6px">      
<table style="width:960px;background:#e0e9f6;border:1px solid #a3bfd5; border-radius: 6px;padding:16px 0; box-shadow: 1px -1px 4px 1px rgba(163, 191, 213, 0.65);">  
<tr> 
<td> 
 
<? 
global $db; 
$query = "select domain,COUNT(*) as files,sum(size) as size,sum(size*requested) as eco, sum(requested) as hits from raptor group by domain UNION select 'zmain' as domain,COUNT(*) as files,sum(size) as size,sum(size*requested) as eco, sum(requested) as hits from raptor where deleted=0 and zu_main=1"; 
 
foreach ($db->query($query) as $valor) { 
    $percent=round(($valor["eco"]/$valor["size"])*100,2); 
?> 
  <? 
    $totaleconomy += $valor["eco"]; 
    $totalhits += $valor["hits"]; 
    $totalcount += $valor["files"]; 
    $totalsize += $valor["size"];         
} 
?> 
 
<div style="padding:10px 0"> 
<table style="width:920px;margin:auto" class="sortable2"> 
<tr> 
    <th><img src="imgpng/dbr.png" /></th> 
    <th>Arsip</th> 
    <th>Tama駉</th> 
    <th>penghematan</th> 
    <th>Hits</th> 
    <th style="text-align:right;padding:4px 10px">Eficacia</th> 
</tr> 
<tr> 
        <td>Total</td> 
        <td><?= number_format($totalcount, 0, "",".") ?></td> 
        <td><?= sizeFormat($totalsize) ?></td> 
        <td><?= sizeFormat($totaleconomy) ?></td> 
        <td><?= number_format($totalhits, 0, "",".") ?></td> 
        <td style="text-align:right;width:70px;"><?= number_format(round(($totaleconomy/$totalsize)*100,3), 2, ",",".") ?> %</td> 
    </tr> 
</table> 
</div> 
 
</td> 
</tr> 
</table> 
<br /><br /> 
</div> 
 
</div> 
</div><!-- GERAL -->  
 
 
<div id="footer"><p><? echo $cop; ?></p>         
</div> 
 
</body> 
</html>