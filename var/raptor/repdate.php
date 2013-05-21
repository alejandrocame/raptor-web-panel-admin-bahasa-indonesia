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
<script type="text/javascript" src="js/pagin.js"></script> 
<style> 
 
#paginacion { 
    font-family:"Tahoma"; 
    font-size:8pt; 
    padding-bottom:5px; 
    padding-top:5px; 
    background-color:#a3bfd5; 
    color:#f0f4f7; 
} 
#paginacion a{ 
    font-family:"Tahoma"; 
    font-size:8pt; 
    padding-bottom:5px; 
    padding-top:5px; 
    background-color:#a3bfd5; 
    color:#15428b; 
    text-decoration:none; 
} 
#paginacion a:hover{ 
    font-family:"Tahoma"; 
    font-size:8pt; 
    padding-bottom:5px; 
    padding-top:5px; 
    background-color:#a3bfd5; 
    color:#e0e9f6; 
} 
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
<h1>Penyimpanan per Hari</h1> 
 
<div style="width:900px; padding:6px 0 26px 6px">      
<table style="width:960px;background:#e0e9f6;border:1px solid #a3bfd5; border-radius: 6px;padding:6px 0; box-shadow: 1px -1px 4px 1px rgba(163, 191, 213, 0.65);">  
<tr> 
<td> 
 
<div style="margin:auto;width:920px;text-align:center;">  
 <div id="contenido"> 
  <?php include('crepdate.php')?>   
 </div> 
</div> 
 
</td> 
</tr> 
</table> 
</div> 
 
</div> 
</div><!-- GERAL -->  
 
<div id="footer"><p>Copyright © 2013 @ RaptorWebPanel 1.0 © All Rights Reserved</p>         
</div> 
 
</body> 
</html>