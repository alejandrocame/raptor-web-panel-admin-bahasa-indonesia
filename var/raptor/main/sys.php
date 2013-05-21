<?
error_reporting(0);

$dist="lsb_release -d | awk '{print $2,$3,$4,$5}'";
$proc="cat /proc/cpuinfo | grep processor | wc -l";
$uptim="";
$arc="uname -m";
$sens1="sensors | grep 'temp1' |  awk '{print $2,$3}'";
$sens2="sensors | grep 'CPU temp' |  awk '{print $2}'";
$sens3="sensors | grep 'CPU temperature' |  awk '{print $2}'";
$sens4="sensors | grep 'Core' |  awk '{print $3}'";

//
$ip = "localhost";
          $porta = "8080";
		  $ac = "Aktif";
		  $of = "Offline";
//
$vrp="\/usr/sbin\/raptor | awk '{print $3}' | head -1";
//
$ip = "localhost";
          $porta = "3128";
		  $acsq = "Aktif";
		  $ofsq = "Offline";
//
$vsq="\/usr\/sbin\/squid -v | awk '{print $4}' | head -1"; 
$vsq3x="\/usr\/sbin\/squid3 -v | awk '{print $4}' | head -1";
$dns="less \/var\/cache\/bind\/named_dump.db | grep -v ';' | sort | uniq -c | wc -l";
$cnx="netstat -atunp | grep -e'8080' -e'3128'| wc -l";
$us="netstat -ntu | tail -n +3 | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -n | grep -Ee '192\.168\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)' -Ee'172\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)' -Ee'10\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)' | wc -l";

$hddisk="sudo fdisk -l | grep 'Disk /dev/' | grep -v /dev/dm-0 | wc -l";

$graph="/graphcacti/graph_image.php?action=view&local_graph_id=34&rra_id=1";

?>