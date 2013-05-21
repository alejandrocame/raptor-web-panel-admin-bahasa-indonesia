/* 
 * @autor xtanctp. use http.*\.phncdn\.com.*(\.flv|\.mp4) no bfwcache.acl
 * xtanctp@gmail.com
 */
#include <iostream>
#include <cstring>
#include <vector>
#include "../utils.cpp"

// use this line to compile 64
// g++ $BUILD64 -I. -fPIC -shared -g -o phncdn.com.so phncdn.com.cpp

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

extern "C" resposta get_match(const string url) {
    resposta r;   
   
 if ( (url.find(".phncdn.com/") != string::npos) 
   ) {
       r.file = get_filename(url);
      if (!r.file.empty()) {
         r.match = true;
         r.domain = "phncdn-xno";
      } else {
         r.match = false;
      }
   } else {
      r.match = false;
   }
   return r;
}

En línea
