<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>RaptorWebPanel 1.0</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="charset" content="ISO-8859-1" />
	<link rel="shortcut icon" href="imgpng/tc.png" />                 
</head>
<body>

<div id="all"><!-- GERAL --> 
<br />
<div id="tbod"> 
<div>
  <?php include('header.php')?>
 </div>

	<!-- top navigation pannel end -->
<h1></h1>
<div style="widht:100%;padding:60px 0;" >
<table style="margin:auto;">
<tr><td style="color:#fff;text-align:center;">Loading ...</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;
<img src="images/loaderx2.gif" />
</td></tr>
</table>
<div>

</div>
</div><!-- GERAL --> 

</div>
</div><!-- GERAL --> 

<div id="footer"><p>Copyright © 2013 @ RaptorWebPanel 1.0 © All Rights Reserved</p>		
</div>

</body>
</html>
 <?php
error_reporting(0);
 
if ($_GET['url_link']=="system") {
echo "<script language=\"javascript\">
 location.href=\"system.php\"
 </script>";
}
if ($_GET['url_link']=="plugls") {
echo "<script language=\"javascript\">
 location.href=\"plugls.php\"
 </script>";
}
if ($_GET['url_link']=="editrp") {
echo "<script language=\"javascript\">
 location.href=\"editrp.php\"
 </script>";
}
if ($_GET['url_link']=="editpl") {
echo "<script language=\"javascript\">
 location.href=\"editpl.php\"
 </script>";
}
if ($_GET['url_link']=="reptot") {
echo "<script language=\"javascript\">
 location.href=\"reptot.php\"
 </script>";
}
if ($_GET['url_link']=="report") {
echo "<script language=\"javascript\">
 location.href=\"report.php\"
 </script>";
}
if ($_GET['url_link']=="repdate") {
echo "<script language=\"javascript\">
 location.href=\"repdate.php\"
 </script>";
}
if ($_GET['url_link']=="repdreq") {
echo "<script language=\"javascript\">
 location.href=\"repdreq.php\"
 </script>";
}
if ($_GET['url_link']=="repext") {
echo "<script language=\"javascript\">
 location.href=\"repext.php\"
 </script>";
}
if ($_GET['url_link']=="listch") {
echo "<script language=\"javascript\">
 location.href=\"listch.php\"
 </script>";
}
//
if ($_GET['url_link']=="editsq") {
echo "<script language=\"javascript\">
 location.href=\"editsq.php\"
 </script>";
}
if ($_GET['url_link']=="editden") {
echo "<script language=\"javascript\">
 location.href=\"editden.php\"
 </script>";
}
//
if ($_GET['url_link']=="pumkchange") {
echo "<script language=\"javascript\">
 location.href=\"pumkchange.php\"
 </script>";
}
if ($_GET['url_link']=="mklist") {
echo "<script language=\"javascript\">
 location.href=\"mklist.php\"
 </script>";
}
if ($_GET['url_link']=="mkhot") {
echo "<script language=\"javascript\">
 location.href=\"mkhot.php\"
 </script>";
}
if ($_GET['url_link']=="mkppp") {
echo "<script language=\"javascript\">
 location.href=\"mkppp.php\"
 </script>";
}
//
if ($_GET['url_link']=="hd") {
echo "<script language=\"javascript\">
 location.href=\"hd.php\"
 </script>";
}
if ($_GET['url_link']=="lvmstat") {
echo "<script language=\"javascript\">
 location.href=\"lvmstat.php\"
 </script>";
 }
 //
 if ($_GET['url_link']=="aclogth") {
echo "<script language=\"javascript\">
 location.href=\"aclogth.php\"
 </script>";
}
if ($_GET['url_link']=="erlogth") {
echo "<script language=\"javascript\">
 location.href=\"erlogth.php\"
 </script>";
}
if ($_GET['url_link']=="aclogsq") {
echo "<script language=\"javascript\">
 location.href=\"aclogsq.php\"
 </script>";
}
//
 if ($_GET['url_link']=="conex") {
echo "<script language=\"javascript\">
 location.href=\"rpconections.php\"
 </script>";
}
//
 if ($_GET['url_link']=="backupbd") {
echo "<script language=\"javascript\">
 location.href=\"backupbd.php\"
 </script>";
}
// 
if ($_GET['url_link']=="editip") {
echo "<script language=\"javascript\">
 location.href=\"editip.php\"
 </script>";
}
if ($_GET['url_link']=="editdns") {
echo "<script language=\"javascript\">
 location.href=\"editdns.php\"
 </script>";
}
if ($_GET['url_link']=="puchange") {
echo "<script language=\"javascript\">
 location.href=\"puchange.php\"
 </script>";
}
if ($_GET['url_link']=="pumailchange") {
echo "<script language=\"javascript\">
 location.href=\"pumailchange.php\"
 </script>";
}
//
if ($_GET['url_link']=="client") {
echo "<script language=\"javascript\">
 location.href=\"client.php\"
 </script>";
}
if ($_GET['url_link']=="pay") {
echo "<script language=\"javascript\">
 location.href=\"pay.php\"
 </script>";
}
//
if ($_GET['url_link']=="term") {
echo "<script language=\"javascript\">
 location.href=\"term.php\"
 </script>";
}
?>



