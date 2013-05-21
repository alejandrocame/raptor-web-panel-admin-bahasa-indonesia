<?php
/* 
 ***********************************************************************
* Copyright (C) 2012 Joel Maguiña García <joemg6@gmail.com>
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
* (C) Copyright 2012 RaptorWebPanel 1.0
**************************************************************************
*/
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
    <style type="text/css">
        <!--
    
        -->
    </style>
</head>
<body>
      
    <div>
           <table style="width:100%;">    
           <tr>
           <td style="width:910px;padding:10px 0 0 10px;">
              <div id="log"></div>
              <div style="padding:0 14px 0 0;width:75px;float:right;text-align:left;"> 
              <div style="width:100px;float:right">
                <div style="width:25px;float:right;color:#a3bfd5;font-size:11px;line-height:16px;">&nbsp;v.1.0</div>           
                <div id="log2" style="width:75px;"></div>
              </div>                  
              </div>
           </td>
          </tr>
           </table>
    </div>
<div style="text-align:right;background-color:#d8e5f2;"><p style="text-align:right;color:#fff;text-shadow: 0px 0px 2px #025fa4;padding:0px 14px 10px 0px;line-height:0;font-size:11px;"><? echo date('l jS F Y | H:i:s'); ?></p></div>

      <!-- top menu panel start -->
<?php $ipserv = getenv("SERVER_ADDR"); ?>
      
<div id="menu">
<ul id="nav">
            <li class="top" ><a href="getpage.php?url_link=system"  class="top_link" ><span>System</span></a></li>
            <li class="top" ><a href=""  class="top_link"><span class="down">Raptor <img style="border:0;" src="images/arrow2.gif" /></span></a>
        <ul class="sub">
            <li><a href="getpage.php?url_link=editrp">&nbsp;&nbsp;Raptor.conf</a></li>
            <li><a href="" class="top" >&nbsp;&nbsp;Reports <img style="padding: 0 0 0 72px;border:0;" src="images/arrow.gif" /></a>
                <ul>                                     
                     <li><a href="getpage.php?url_link=report">&nbsp;&nbsp;Domain </a></li>
                     <li><a href="getpage.php?url_link=repext">&nbsp;&nbsp;Ekstesi</a></li>                     
                     <li><a href="getpage.php?url_link=repdate" >&nbsp;&nbsp;Penyimpanan</a></li>                     
                     <li><a href="getpage.php?url_link=repdreq" >&nbsp;&nbsp;Savings by Date</a></li>                     
                     <li><a href="getpage.php?url_link=reptot">&nbsp;&nbsp;Total summary </a></li>
                </ul>
            </li>
            <li><a href="getpage.php?url_link=plugls">&nbsp;&nbsp;Daftar Plugins</a></li>            
            <li><a href="getpage.php?url_link=editpl">&nbsp;&nbsp;On / Off Plugins</a></li>                                    
            <li><a href="getpage.php?url_link=listch">&nbsp;&nbsp;Cache Content</a></li>                            
        </ul>
                     </li>
                     <li class="top"><a href="" class="top_link"><span class="down">Squid <img style="border:0;" src="images/arrow2.gif" /></span></a>
              <ul class="sub">
            <li><a href="getpage.php?url_link=editsq">&nbsp;&nbsp;Squid.conf</a></li>            
            <li><a href="getpage.php?url_link=editden">&nbsp;&nbsp;url denied</a></li>                     
            <li><a href="http://<?php echo $ipserv; ?>:84" target="_blank">&nbsp;&nbsp;Sarg</a></li>                    
        </ul>
                     </li> 
                     <li class="top" ><a href="" class="top_link"><span class="down">Mikrotik <img style="border:0;" src="images/arrow2.gif" /></span></a>                    
              <ul class="sub">
            <li><a href="getpage.php?url_link=pumkchange" >&nbsp;&nbsp;Login Mikrotik</a></li>            
            <li><a href="getpage.php?url_link=mklist" >&nbsp;&nbsp;Address List</a></li>
            <li><a href="getpage.php?url_link=mkhot" >&nbsp;&nbsp;Hotspot</a></li>
            <li><a href="getpage.php?url_link=mkppp" >&nbsp;&nbsp;PPP</a></li>
        </ul>
                     </li>
                     <li class="top" ><a href="" class="top_link"><span class="down">Utility <img style="border:0;" src="images/arrow2.gif" /></span></a>                    
              <ul class="sub">
            <li><a href="getpage.php?url_link=hd" >&nbsp;&nbsp;Hard Drives</a></li>
            <li><a href="getpage.php?url_link=lvmstat" >&nbsp;&nbsp;LVM Display</a></li>
            
            <li><a href=""  class="top" >&nbsp;&nbsp;Logs <img style="padding: 8px 0 0 96px;border:0;" src="images/arrow.gif" /></a>
                 <ul>                        
                     <li><a href="getpage.php?url_link=aclogth" >&nbsp;&nbsp;Raptor - access.log</a></li>                     
                     <li><a href="getpage.php?url_link=erlogth" >&nbsp;&nbsp;Raptor - error.log</a></li>
                     <li><a href="getpage.php?url_link=aclogsq" >&nbsp;&nbsp;Squid - access.log</a></li>
                 </ul>
            </li>
            
            <li><a href="getpage.php?url_link=conex" >&nbsp;&nbsp;Connection by User</a></li>
            <li><a href="getpage.php?url_link=backupbd" >&nbsp;&nbsp;Backup BD</a></li>
            <li><a href="http://<?php echo $ipserv; ?>:80/graphcacti/graph_view.php?" target="_blank" title="Graphs" >&nbsp;&nbsp;Cacti</a></li>                           
        </ul>
                     </li>                                                               
                     <li class="top" ><a href="" class="top_link"><span class="down">Settings <img style="border:0;" src="images/arrow2.gif" /></span></a>
              <ul class="sub">
            <li><a href="getpage.php?url_link=editip">&nbsp;&nbsp;TCP/IP</a></li>
            <li><a href="getpage.php?url_link=editdns">&nbsp;&nbsp;DNS</a></li>
            <li><a href="getpage.php?url_link=puchange" >&nbsp;&nbsp;Password</a></li>
            <li><a href="getpage.php?url_link=pumailchange" >&nbsp;&nbsp;E-mail</a></li>
        </ul>
                     </li>
                     <li class="top" ><a href="" class="top_link"><span class="down">Registration
 <img style="border:0;" src="images/arrow2.gif" /></span></a>
              <ul class="sub">
            <li><a href="getpage.php?url_link=client">&nbsp;&nbsp;Clients</a></li>
            <li><a href="getpage.php?url_link=pay">&nbsp;&nbsp;Payments</a></li>                    
        </ul>
                     </li>
                     <li class="top" ><a href="getpage.php?url_link=term"  class="top_link"><span>Terminal</span></a></li>
                     <li class="top" ><a href="logout.php"  class="top_link"><span>Log out</span></a></li>
</ul>
</div>
 
</body>
</html>