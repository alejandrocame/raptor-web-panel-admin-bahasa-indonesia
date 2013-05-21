#include <iostream>
#include <cstring>
#include <vector>
#include "../utils.cpp"

// use this line to compile
// g++ -I. -fPIC -shared -g -o cam4s.com.so cam4s.com.cpp
// regex
// http.*\.cam4s\.com.*(\.jpg|\.png|\.gif|\.swf|\.mp4)

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

if ( (url.find(".cam4s.com/") != string::npos) and ((url.find(".jpg") != string::npos) or (url.find(".png") != string::npos) or (url.find(".gif") != string::npos) or (url.find(".swf") != string::npos) or (url.find(".mp4") != string::npos))
	) {

       r.file = get_filename(url);
      if (!r.file.empty()) {
         r.match = true;
         r.domain = "cam4s.com";
      } else {
         r.match = false;
      }
   } else {
      r.match = false;
   }
   return r;
}