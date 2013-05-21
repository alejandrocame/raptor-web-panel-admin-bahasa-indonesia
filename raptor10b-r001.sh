# bash raptor10b-r001.sh
# Installation squid 3 with raptorcache by JoeMG
# All in One script for Ubuntu and Debian by Wandi - Iamspa ( members of FMI )
#!/bin/bash
echo "+===============================================================================+"
echo "|         Installation squid 3 with raptorcache by Joel Maguina ( JoeMG )       |"
echo "| Script Revision 001 by wandi - iamspa ( members of Forum Mikrotik Indonesia ) |"
echo "|                 ONLY FOR APT_BASED LINUX  ( Debian or Ubuntu )                |"
echo "+===============================================================================+"
echo "IF YOU DON'T USE DEBIAN OR UBUNTU,"
echo "Please CLOSE INSTALLATION by pressing Ctrl+c"
echo ""
echo press Enter to continue with this installation script ...
read -n 0 -ers
echo ""
#===============================================================================
# Shell script which detects the Linux distro and add repository
#===============================================================================
detectedDistro="Unknown"
regExpLsbInfo="Description:[[:space:]]*([^ ]*)"
regExpLsbFile="/etc/(.*)[-_]"

if [ `which lsb_release 2>/dev/null` ]; then       # lsb_release available
   lsbInfo=`lsb_release -d`
   if [[ $lsbInfo =~ $regExpLsbInfo ]]; then
      detectedDistro=${BASH_REMATCH[1]}
   else
      echo " Should not occur: Don't find distro name in lsb_release output "
      exit 1
   fi
else                                               # lsb_release not available
   etcFiles=`ls /etc/*[-_]{release,version} 2>/dev/null`
   for file in $etcFiles; do
      if [[ $file =~ $regExpLsbFile ]]; then
         detectedDistro=${BASH_REMATCH[1]}
         break
      else
         echo " Should not occur: Don't find any etcFiles "
         exit 1
      fi
   done
fi

detectedDistro=`echo $detectedDistro | tr "[:upper:]" "[:lower:]"`

case $detectedDistro in
    suse)     detectedDistro="opensuse" ;;
        linux)    detectedDistro="linuxmint" ;;
esac

if [ $detectedDistro = debian ] ; then
    # Please change to better repository or your local repository for better connection
    echo deb http://kambing.ui.ac.id/debian/ squeeze main | tee -a /etc/apt/sources.list
    echo deb-src http://kambing.ui.ac.id/debian/ squeeze main | tee -a /etc/apt/sources.list
    echo deb http://kambing.ui.ac.id/debian/ squeeze-updates main | tee -a /etc/apt/sources.list
    echo deb-src http://kambing.ui.ac.id/debian/ squeeze-updates main | tee -a /etc/apt/sources.list
    echo deb http://backports.debian.org/debian-backports squeeze-backports main | tee -a /etc/apt/sources.list
    apt-get update
    apt-get -y install mysql-common libmysqlclient16
elif [ $detectedDistro = ubuntu ] ; then

    P=`uname -m`
if [ $P = x86_64 ] ; then
    apt-get update && apt-get -y install mysql-common 
    wget http://security.ubuntu.com/ubuntu/pool/main/m/mysql-5.1/libmysqlclient16_5.1.67-0ubuntu0.11.10.1_amd64.deb
    dpkg -i libmysqlclient16_5.1.67-0ubuntu0.11.10.1_amd64.deb

elif [ $P = i686 ] ; then    
    apt-get update && apt-get -y install mysql-common
    wget http://security.ubuntu.com/ubuntu/pool/main/m/mysql-5.1/libmysqlclient16_5.1.67-0ubuntu0.11.10.1_i386.deb
    dpkg -i libmysqlclient16_5.1.67-0ubuntu0.11.10.1_i386.deb
fi
# Tested on centos, debian and ubuntu
# else if not detectedDistro not debian or ubuntu then EXIT
else 
    exit 0
fi
#===============================================================================
#                          Optimizing Server Performance
#===============================================================================
echo 4 >> /proc/sys/net/ipv4/tcp_fin_timeout
mv /etc/sysctl.conf /etc/sysctl.conf_
touch /etc/sysctl.conf

echo "
vm.swappiness = 10" >> /etc/sysctl.conf

echo 65536 > /proc/sys/fs/file-max
echo "*         soft        nofile          65536" >> /etc/security/limits.conf
echo "*         hard        nofile          65536" >> /etc/security/limits.conf
echo "root      soft        nofile          65536" >> /etc/security/limits.conf
echo "root      hard        nofile          65536" >> /etc/security/limits.conf
echo "proxy     soft        nofile          65536" >> /etc/security/limits.conf
echo "proxy     hard        nofile          65536" >> /etc/security/limits.conf
echo "session required        pam_limits.so" >> /etc/pam.d/common-session
modprobe ip_tables
modprobe ip_conntrack
modprobe ip_conntrack_ftp
modprobe ip_conntrack_irc
modprobe iptable_nat
modprobe ip_nat_ftp

echo "ip_conntrack
ip_tables
ip_conntrack_ftp
ip_conntrack_irc
iptable_nat
ip_nat_ftp">> /etc/modules

echo "ulimit -Hn 65536
ulimit -Sn 65535">> /etc/profile
#===============================================================================
# Install Squid 3 with 1 Cache ( /cache-1 )
#===============================================================================

IPSERV=$(ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}')
HOST_NAME=$(hostname -a) 
DOMAIN_NAME=$(hostname -d)                                   

sleep 2

mkdir /cache-1 && chmod 777 /cache-1 && chown proxy:proxy /cache-1

echo Y | apt-get install squid3 ccze

sleep 3
touch /etc/squid3/denegados.lst
echo "cracks.st" >> /etc/squid3/denegados.lst

rm -rf /etc/squid3/squid.conf
touch /etc/squid3/squid.conf

echo "#========================== Squid 3.x Conf ===========================#
# Port Option SQUID 3.x
#----------------------------------------------------------------------
http_port 3128 intercept
visible_hostname www.$DOMAIN_NAME
icp_port 0
#----------------------------------------------------------------------
error_directory /usr/share/squid3/errors/English
#----------------------------------------------------------------------
acl denegados url_regex -i "/etc/squid3/denegados.lst"
#----------------------------------------------------------------------
# DNS Option
#----------------------------------------------------------------------
dns_nameservers 8.8.8.8 8.8.4.4
dns_retransmit_interval 5 seconds
dns_timeout 2 minutes
#----------------------------------------------------------------------
acl manager proto cache_object
acl localhost src 127.0.0.1/32 ::1
acl to_localhost dst 127.0.0.0/8 0.0.0.0/32 ::1
acl CONNECT method CONNECT
#----------------------------------------------------------------------
# acl localnet src 10.0.0.0/8     # RFC1918 possible internal network
# acl localnet src 172.16.0.0/12  # RFC1918 possible internal network
acl localnet src 192.168.0.0/16 # RFC1918 possible internal network
#----------------------------------------------------------------------
acl Safe_ports port 21 70 80 210 280 443 488 563 591 631 777 901 81 82 84 3128 1025-65535
acl SSL_ports port 443 563 81

http_access allow manager localhost
http_access deny manager all
http_access deny !Safe_ports
http_access deny CONNECT !SSL_ports
http_access deny denegados

# Always allow localhost connections
http_access allow localhost
# Allow local network(s) on interface(s)
http_access allow localnet 
# Default block all to be sure
http_access deny all
# always_direct allow all

#----------------------------------------------------------------------
coredump_dir /var/spool/squid3
#----------------------------------------------------------------------
# Reserved memory for cache
# It is recommended that you take approx. 5 MB of RAM per 1GB assigned to cache_dir
#----------------------------------------------------------------------
cache_mem 125 MB
#----------------------------------------------------------------------
# Maximum size of a file in cache memory
#----------------------------------------------------------------------
maximum_object_size_in_memory 128 KB
#----------------------------------------------------------------------
# Maximum and minimum size of files in the disk cache
#----------------------------------------------------------------------
maximum_object_size 30 MB
minimum_object_size 4 KB
#----------------------------------------------------------------------
# Replace cache files when disk cache reach 96% full
#----------------------------------------------------------------------
cache_swap_low 92
cache_swap_high 96
#----------------------------------------------------------------------
# Total HD space to be used by the cache, number of folders,
# Number of subfolders in cache
# 25000 = 25 GB
#----------------------------------------------------------------------
cache_dir aufs /cache-1 25000    25    256
#----------------------------------------------------------------------
# Standard update cache
# 1 month = 10080 mins, 1 day = 1440 mins
#----------------------------------------------------------------------
refresh_pattern -i .(gif|png|jp?g|ico|bmp|tiff?)$ 14400 80% 43200 reload-into-ims
refresh_pattern -i .(swf|htm|html|shtm|shtml|nub)$ 14400 80% 43200 reload-into-ims
refresh_pattern -i .(rpm|cab|deb|exe|msi|msu|zip|tar|xz|bz|bz2|lzma|gz|tgz|rar|bin|7z|doc?|xls?|ppt?|pdf|nth|psd|sis)$ 14400 80% 43200
refresh_pattern -i .(avi|iso|wav|mid|mp?|mpe?g?|mpeg|mov|3gp|wm?|flv|x-flv|axd)$ 14400 80% 43200
refresh_pattern -i .(qtm?|viv|au|ram?|snd|sit|hqx|arj|lzh|lha|txt|rtf|tex|latex|class|js|ico)$ 14400 80% 43200
refresh_pattern -i \.a[0-9][0-9]$ 14400 80% 43200
refresh_pattern -i \.r[0-9][0-9]$ 14400 80% 43200
refresh_pattern -i \.css$ 10 20% 4320
#----------------------------------------------------------------------
refresh_pattern ^ftp:           1440    20%     10080
refresh_pattern ^gopher:        1440    0%      1440
refresh_pattern -i (/cgi-bin/|\?) 0     0%      0
refresh_pattern -i (cgi-bin|hackshield|xtrap|Loader|login) 0 0% 0
# refresh_pattern (Release|Package(.gz)*)$       0       20%     2880
refresh_pattern .               0       20%     4320
#----------------------------------------------------------------------
# Access log for the cache or to SARG
#----------------------------------------------------------------------
logfile_rotate 2
access_log /var/log/squid3/access.log
access_log /var/log/squid3/error.log
cache_store_log none
#----------------------------------------------------------------------
# other configurations
#----------------------------------------------------------------------
half_closed_clients off
server_persistent_connections off
client_persistent_connections off
log_fqdn off
quick_abort_min 0 KB
quick_abort_max 0 KB
quick_abort_pct 100
max_filedescriptors 65536
cache_effective_user proxy
cache_effective_group proxy
#----------------------------------------------------------------------
# Keeping small objects in recent memory
#----------------------------------------------------------------------
memory_replacement_policy heap GDSF
cache_replacement_policy heap LFUDA
#----------------------------------------------------------------------
# Sites that are denied to store files in squid cache 
#----------------------------------------------------------------------
acl nocachedom dstdomain .4shared.com .cnet.com .globo.com .miniclip.com .popcap.com
acl nocachedom dstdomain .symantecliveupdate.com .vostucdn.com .5min.com .cramit.in
acl nocachedom dstdomain .goear.com .mlstatic.com .pornhub.com .telaxo.com .wikimedia.org
acl nocachedom dstdomain .movistar.com.pe .pornotube.com .avg.com .dailymotion.com 
acl nocachedom dstdomain .terra.com .windowsupdate.com .depositfiles.com .hardsextube.com
acl nocachedom dstdomain .mozilla.net .porntube.com .adobe.com .dungeonbusters.com
acl nocachedom dstdomain .hotfile.com .myspacecdn.com .tricom.net .xtube.com .tetrisfb.com
acl nocachedom dstdomain .wooga.com .akamaihd.net .edgecastcdn.net .hsyns.net .nai.com
acl nocachedom dstdomain .redtube.com .triviador.com .xvideos.com .amazonaws.com
acl nocachedom dstdomain .eluniverso.com .juegosjuegos.com .netlogstatic.com .redtubefiles.com
acl nocachedom dstdomain .tube8.com .yimg.com .appspot.com .eset.com .kixeye.com 
acl nocachedom dstdomain .netpocket.org .rncdn3.com .ubuntu.com .youjizz.com .softonic.com 
acl nocachedom dstdomain .avast.com .ewinet.com .llnwd.net .nflxvideo.net .fbcdn.net
acl nocachedom dstdomain .sendspace.com .uol.com.br .youporn.com .avira-update.com
acl nocachedom dstdomain .uptodown.net .ytimg.com .viddler.com .zgncdn.com .staticflickr.com 
acl nocachedom dstdomain .videocaserox.com .ziddu.com .video.msn.com .softnyx.com 
acl nocachedom dstdomain .nordeus.com .socialpointgames.com .youtube.com .stream.aol.com 
acl nocachedom dstdomain .axeso5.com .filefactory.com .mbamupdates.com .noticias24.com 
acl nocachedom dstdomain .baycdn.com .filehippo.com .mcafee.com .pandonetworks.com 
acl nocachedom dstdomain .blogspot.com .fileserve.com .mccont.com .phncdn.com .sourceforge.net 
acl nocachedom dstdomain .cam4s.com .fulltono.com .metacafe.com .photobucket.com 
acl nocachedom dstdomain .cloudfront.net .geewa.net .microsoft.com .pop6.com .vimeo.com
acl nocachedom dstdomain .macromedia.com .google.com
no_cache deny nocachedom
#----------------------------------------------------------------------
# Denying cache for files with extension.                              |
#----------------------------------------------------------------------
acl dontrewrite url_regex -i .(asx|asf)$
acl dontrewrite url_regex (get_video|videoplayback\?id|videoplayback.*id).*begin\=[1-9][0-9]*
acl dontrewrite url_regex \.(php|asp|aspx|jsp|cgi|js)\?
acl dontrewrite url_regex threadless.*\.jpg\?r=
no_cache deny dontrewrite" >> /etc/squid3/squid.conf

/etc/init.d/squid3 stop
sleep 1

squid3 -z
sleep 1

/etc/init.d/squid3 restart

sleep 3 

#===============================================================================
# Install Raptorcache
#===============================================================================

IPSERV=$(ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}')
HOST_NAME=$(hostname -a) 
DOMAIN_NAME=$(hostname -d)                    

echo Y | apt-get install apache2

sleep 3

echo Y | apt-get install sqlite gcc libsqlite3-dev libapache2-mod-php5 php-db libstdc++6 g++ unzip libmysqlclient-dev libblkid-dev libcurl4-openssl-dev lynx ffmpeg lsb-release sudo make php5-dev php-pear apache2-prefork-dev libpcre3-dev   

sleep 3

#===============================================================================
# Detect Arch for RaptorCache Installation
#===============================================================================
P=`uname -m`
if [ $P = x86_64 ] ; then
    wget -O /usr/lib/libmysqlclient.so.16 http://www.joemg.host56.com/lib/64bits/libmysqlclient.so.16
    sleep 1
    wget -O /usr/lib/libmysqlclient.so.16.0.0 http://www.joemg.host56.com/lib/64bits/libmysqlclient.so.16.0.0
    sleep 1
    wget http://www.raptorcache.com/install/64/raptor64.tar.gz
    sleep 1
    wget http://www.raptorcache.com/install/clean/64/clean.zip
    sleep 1
    wget http://www.raptorcache.com/install/64/plugins/plugins.tar.gz
    sleep 1
    cp raptor64.tar.gz /tmp
    tar -xzvf /tmp/raptor64.tar.gz -C /
    rm -rf raptor64.tar.gz
    chmod a+x /usr/sbin/raptor
    
elif [ $P = i686 ] ; then
    wget -O /usr/lib/libmysqlclient.so.16 http://www.joemg.host56.com/lib/32bits/libmysqlclient.so.16
    sleep 1
    wget -O /usr/lib/libmysqlclient.so.16.0.0 http://www.joemg.host56.com/lib/32bits/libmysqlclient.so.16.0.0
    sleep 1
    wget http://www.raptorcache.com/install/32/raptor32.tar.gz
    sleep 1
    wget http://www.raptorcache.com/install/clean/32/clean.zip
    sleep 1
    wget http://www.raptorcache.com/install/32/plugins/plugins.tar.gz
    sleep 1
    cp raptor32.tar.gz /tmp
    tar -xzvf /tmp/raptor32.tar.gz -C /
    rm -rf raptor32.tar.gz
    chmod a+x /usr/sbin/raptor
fi

mkdir /var/log/raptor && mkdir /var/tmp/raptor && mkdir /var/run/raptor && mkdir /raptorcache &&
sleep 1
chmod a+rwx /var/log/raptor && chmod a+rwx /var/tmp/raptor && chmod a+rwx /var/run/raptor && chmod a+x /etc/init.d/raptor &&
sleep 1
chown -R www-data /raptorcache/
chmod -R 777 /raptorcache/
umask 000 /raptorcache/

echo "extension=pdo.so" >> /etc/php5/apache2/php.ini
sleep 1
update-rc.d raptor defaults

sleep 3

echo "
#----------------------------------------------------------------------
acl raptor_lst url_regex -i \"/etc/raptor/raptor.lst\"
cache deny raptor_lst
cache_peer $IPSERV parent 8080 0 proxy-only no-digest
dead_peer_timeout 2 seconds
cache_peer_access $IPSERV allow raptor_lst
cache_peer_access $IPSERV deny all
#----------------------------------------------------------------------" >> /etc/squid3/squid.conf

sleep 3

unzip clean.zip 
mv clean /etc/raptor/
chmod 777 /etc/raptor/clean
rm -rf clean.zip

wget http://www.raptorcache.com/install/var/pluginmaker.tar.gz
tar -xzvf pluginmaker.tar.gz
mv pluginmaker /etc/raptor/
rm -rf pluginmaker.tar.gz

touch /etc/raptor/raptor.lst

tar -xzvf plugins.tar.gz
mv plugins /etc/raptor/
rm -rf plugins.tar.gz
clear
chmod 777 /etc/raptor/plugins/*
chmod 777 /etc/raptor/cl0

echo "PIDFILE /var/run/raptor.pid" >> /etc/raptor/raptor.conf

/etc/init.d/raptor start

chmod 777 /etc/raptor/clean

sleep 3

echo "## Raptor
# min(0-59)  hora(0-23)  diames(1-31)  mes(1-12)  diasem(0-7)  user   comando
59              1               *       *               *       root    /etc/raptor/./clean 45
30              23              *       *               *       root    squid3 -k rotate
*              */1              *       *               *       root    /etc/raptor/./cl0
59              22              *       *               *       root    /etc/raptor/rprotate
*/2             *               *       *               *       root    serv
*/1             *               *       *               *       root    vnstat -u -i eth0" >> /etc/crontab

sleep 3
#-------------------------------------------------------------------------------------------
clear
echo ""
echo "+-------------------------------------------------------------+"
echo "|                       Installing Mysql                      |"
echo "|   It is important to set the password of Mysql = raptor     |"
echo "+-------------------------------------------------------------+"
echo Press enter to continue...
read -n 0 -ers

echo Y | apt-get install mysql-server mysql-client php5-mysql 
echo Y | aptitude install php5-cgi 

wget http://www.raptorcache.com/install/var/raptor.sql
cp raptor.sql /var/tmp/
rm -rf raptor.sql
echo

mysql -u root -praptor << eof
CREATE DATABASE raptor;
eof
mysql -u root -praptor raptor < /var/tmp/raptor.sql

#+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ BATAS

IPSERV=$(ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}')
HOST_NAME=$(hostname -a) 
DOMAIN_NAME=$(hostname -d)     

echo "ServerName www.$DOMAIN_NAME" >> /etc/apache2/apache2.conf

mv /etc/apache2/httpd.conf /etc/apache2/httpd.conf_
mkdir /etc/cacti
# touch /etc/cacti/httpd.conf

echo "Listen 82
<VirtualHost *:82>
 DocumentRoot /var/raptor
 ServerName www.$DOMAIN_NAME
 ErrorLog /var/log/virtual82-error_log
 CustomLog /var/log/virtual82-access_log common
 </VirtualHost>
 Listen 84
<VirtualHost *:84>
 DocumentRoot /var/www/sarg
 ServerName www.$DOMAIN_NAME
 </VirtualHost>" >> /etc/apache2/httpd.conf

sleep 3

clear

echo Y | aptitude install sarg
mv /etc/sarg/sarg.conf  /etc/sarg/sarg.conf_old
wget http://www.raptorcache.com/install/var/sarg.conf
mv sarg.conf /etc/sarg/sarg.conf
echo "
# Schedulle of Sarg
59              21               *       *               *       root    sarg" >> /etc/crontab
mkdir /var/www/sarg/
sarg

sleep 1
wget http://joemg.host56.com/wpanel/raptor.tar.gz
tar -xzvf raptor.tar.gz
mv raptor /var/
rm -rf raptor.tar.gz
clear
chmod 777 /var/raptor/*
chmod 777 /var/raptor/mail/*
chmod 777 /etc/raptor/raptor.lst
chmod 777 /etc/squid3/squid.conf
chmod 777 /etc/raptor/raptor.conf
chmod 777 /etc/squid3/denegados.lst
chmod 777 /etc/network/interfaces
chmod 777 /etc/resolv.conf
clear

sleep 1
echo Y | apt-get install snmpd
mv /etc/snmp/snmpd.conf  /etc/snmp/snmpd.conf_
touch /etc/snmp/snmpd.conf
echo "rocommunity  public
syslocation  "PDC, Proxy DataCenter"
syscontact  admin@$DOMAIN_NAME" >>  /etc/snmp/snmpd.conf
rm -rf /etc/default/snmpd
wget http://www.raptorcache.com/install/var/snmpd
mv snmpd /etc/default/
/etc/init.d/snmpd restart
sleep 3
clear
echo ""
echo "+--------------------------------------------------------------------------------------+"
echo "|                                    Installing Cacti                                  |"
echo "|         Choose Apache2 as web server and then enter the password Mysql(raptor)       |"
echo "+--------------------------------------------------------------------------------------+"
echo Press enter to continue...
read -n 0 -ers

echo Y | apt-get install cacti
wget http://www.raptorcache.com/install/var/raptor-cacti.sql
mv raptor-cacti.sql /var/tmp/
mysql -u root -praptor cacti < /var/tmp/raptor-cacti.sql

sleep 1
rm /etc/cacti/apache.conf 
touch /etc/cacti/apache.conf
echo "Alias /graphcacti /usr/share/cacti/site

<irectory /usr/share/cacti/site>
        Options +FollowSymLinks
        AllowOverride None
        order allow,deny
        allow from all
 
        AddType application/x-httpd-php .php
 
        <IfModule mod_php5.c>
                php_flag magic_quotes_gpc Off
                php_flag short_open_tag On
                php_flag register_globals Off
                php_flag register_argc_argv On
                php_flag track_vars On
                # this setting is necessary for some locales
                php_value mbstring.func_overload 0
                php_value include_path .
        </IfModule>
 
        irectoryIndex index.php
</Directory>

Alias /cacti /usr/share/cacti/site

<irectory /usr/share/cacti/site>
        Options +FollowSymLinks
        AllowOverride None
        order allow,deny
        allow from all

        AddType application/x-httpd-php .php

        <IfModule mod_php5.c>
                php_flag magic_quotes_gpc Off
                php_flag short_open_tag On
                php_flag register_globals Off
                php_flag register_argc_argv On
                php_flag track_vars On
                # this setting is necessary for some locales
                php_value mbstring.func_overload 0
                php_value include_path .
        </IfModule>

        irectoryIndex index.php
</Directory>" >> /etc/cacti/apache.conf

echo Y | apt-get install vnstat
vnstat -u -i eth0

echo Y | apt-get install smartmontools lvm2 hdparm
sleep 1

echo Y | apt-get install lm-sensors
clear
echo ""
echo "+---------------------------------------------+"
echo "|        temperature sensors Installation     |"
echo "+---------------------------------------------+"
echo Press enter to continue...
read -n 0 -ers
sensors-detect
service module-init-tools restart
/etc/init.d/module-init-tools restart
echo "
# DNS Cache
*/2               *               *       *               *       root    rndc dumpdb" >> /etc/crontab

clear
wget http://www.raptorcache.com/install/var/upload.cgi
mv upload.cgi /usr/lib/cgi-bin/
chmod 777 /usr/lib/cgi-bin/upload.cgi
echo Y | apt-get --purge remove sudo
echo Y | apt-get install sudo
echo "www-data  ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers
chmod 777 /etc/sudoers
# If this script can't execute chmod 777 /etc/sudoers, you can use winscp 
# since everyone in the "www-data" group will thereafter be able to completely hose this machine.
# so please be carefull with your webadmin and goodluck.

clear

echo | pecl install apc --with-apxs='/usr/bin/apxs2'
echo "Alias /var/raptor/apc /usr/share/php/apc.php

<irectory /usr/share/php/apc.php>
        Options +FollowSymLinks
        AllowOverride None
        order allow,deny
        allow from all

        AddType application/x-httpd-php .php

        <IfModule mod_php5.c>
                php_flag magic_quotes_gpc Off
                php_flag short_open_tag On
                php_flag register_globals Off
                php_flag register_argc_argv On
                php_flag track_vars On
                # this setting is necessary for some locales
                php_value mbstring.func_overload 0
                php_value include_path .
        </IfModule>

        irectoryIndex index.php
</Directory>" >> /etc/apache2/conf.d/apc.conf
echo "extension=apc.so" >> /etc/php5/conf.d/apc.ini
echo "; APC Configuration
apc.enabled = 1
; Memory allocated to APC. Use Munin or APC Info to see if more is needed.
apc.shm_size=96M
; rfc1867 allow file upload progression display.
apc.rfc1867 = on" >> /etc/php5/conf.d/apc-config.ini
clear
rm -rf /var/tmp/*

#===============================================================================
# Install Bind9 and Network Configuration
#===============================================================================

IPSERV=$(ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}')        
HOST_NAME=$(hostname -a) 
DOMAIN_NAME=$(hostname -d)                    

sleep 1

mv /etc/hosts /etc/hosts_
touch /etc/hosts

echo "127.0.0.1     localhost.localdomain     localhost
$IPSERV       $HOST_NAME.$DOMAIN_NAME    $HOST_NAME
#
::1    localhost    ip6-localhost    ip6-loopback
fe00::0 ip6-localnet
fe00::0 ip6-mcastprefix
ff02:1 ip6-allnodes
ff02::2 ip6-allrouters
ff02::3 ip6-allhosts" >> /etc/hosts
sleep 3

mv /etc/network/interfaces /etc/network/interfaces_
sed '1,30{/dns-/d}' /etc/network/interfaces_ >> /etc/network/interfaces 

echo "dns-search $DOMAIN_NAME
dns-nameservers 127.0.0.1 $IPSERV 8.8.8.8 8.8.4.4" >> /etc/network/interfaces 

sleep 2

apt-get -y install bind9 dnsutils 

sleep 3

mv /etc/bind/named.conf.options /etc/bind/named.conf.options_
touch /etc/bind/named.conf.options

echo "options {
     directory \"/var/cache/bind\";
     forward only;
     forwarders { 8.8.8.8; 8.8.4.4; };
     auth-nxdomain no;    
     max-cache-size 30M;
     listen-on-v6 { any; };
     listen-on { 127.0.0.1; };
     allow-transfer { none; };
     version none;
};" >> /etc/bind/named.conf.options

mv /etc/bind/zones.rfc1918 /etc/bind/zones.rfc1918_
sed '1,30{/168.192.in-addr.arpa/d}' /etc/bind/zones.rfc1918_ >> /etc/bind/zones.rfc1918

touch /var/cache/bind/managed-keys.bind
chown bind:bind /var/cache/bind/managed-keys.bind

# /usr/sbin/named -g
# couldn't add command channel 127.0.0.1#953: address in use
# managed-keys-zone ./IN: loaded serial 0
# it's dnssec issue . 

IPSERV=$(ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}')

echo ""
echo "+==========================================================================+"
echo "|                            Installation Complete                         |"
echo "|            Reboot your system to complete the installation               |"
echo "+==========================================================================+"
echo ""
echo "Now, You can configure RaptorCache at the following URL :"
echo "http://$IPSERV:82/"
echo ""
echo "User : admin Password : admin !"
echo "" 