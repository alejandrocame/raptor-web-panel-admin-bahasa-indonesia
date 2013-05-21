#include <iostream>
#include <cstring>
#include <vector>
#include "../utils.h"
#include "../utils.cpp"
// Gildo
// use this line to compile
// g++ -I. -fPIC -shared -g -o kaspersky.com.so kaspersky.com.cpp
// http://products.kaspersky-labs.com/multilanguage/i_gateways/proxyserver/linux/kav4proxy_5.5-80_i386.deb
// acl http.*(\.kaspersky-labs\.com|\.kasperskyamericas\.com|\.geo\.kaspersky\.com|kasperskyusa\.com).*(\.avc|\.kdc|\.klz|\.bz2|\.dat|\.dif|\.apk|\.exe|\.dmg|\.deb)
string get_filename(string url) {
      vector<string> resultado;
      if (url.find("?") != string::npos) {
         stringexplode(url, "?", &resultado);
         stringexplode(resultado.at(resultado.size()-2), "/", &resultado);
         return resultado.at(resultado.size()-1);           
      } else {
         stringexplode(url, "/", &resultado);
         return resultado.at(resultado.size()-1);
      }
}

extern "C" resposta getmatch(const string url) {
   resposta r;   
   
   if ( ((url.find("kaspersky.com/diffs/bases/") != string::npos) or (url.find("kaspersky.com/bases/") != string::npos)  or (url.find("kaspersky.com") != string::npos)  or (url.find("kasperskyamericas.com") != string::npos)  or (url.find("kasperskyusa.com") != string::npos)  or (url.find("kaspersky-labs.com") != string::npos) ) and (url.find(".bz2") != string::npos) or (url.find("/diffs/") != string::npos) or (url.find(".avc") != string::npos) or
			(url.find(".kdc") != string::npos) or (url.find(".klz") != string::npos) or (url.find(".dif") != string::npos) or
			(url.find(".dat") != string::npos) or (url.find(".exe") != string::npos) or (url.find(".kdz") != string::npos) or
			(url.find(".kdl") != string::npos) or (url.find(".kfb") != string::npos) 
   ) {
      
       r.file = get_filename(url);
      if (!r.file.empty()) {
         r.match = true;
         r.domain = "kaspersky";
      } else {
         r.match = false;
      }
   } else {
      r.match = false;
   }

   return r;   
}