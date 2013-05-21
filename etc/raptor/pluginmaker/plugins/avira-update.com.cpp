#include <iostream>
#include <cstring>
#include <string>
#include <vector>
#include "../utils.cpp"

using namespace std;
//Gildo
//acl http.*\.avira-update\.com.*(\.bin|\.vdf|\.gz|\.exe|\.zip|\.rar)
//http://personal.avira-update.com/package/wks_avira/win32/es/pecl/avira_free_antivirus_es.exe
// use this line to compile
// g++ -I. -fPIC -shared -g -o avira-update.com.so avira-update.com.cpp  

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

   if ( (url.find("personal.avira-update.com/") != string::npos) or (url.find("premium.avira-update.com/") != string::npos) or (url.find("professional.avira-update.com/") != string::npos) ) 
   {
      
       r.file = get_filename(url);
      if (!r.file.empty()) {
         r.match = true;
         r.domain = "avira";
      } else {
         r.match = false;
      }
   } else {
      r.match = false;
   }
   return r;
}