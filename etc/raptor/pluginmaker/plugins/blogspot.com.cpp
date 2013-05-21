#include <iostream>
#include <cstring>
#include <vector>
#include "../utils.cpp"
// Regex
// http.*\.blogspot\.com.*(\.mp4|\.flv|\.swf|\.jpg)
// use this line to compile
// g++ -I. -fPIC -shared -g -o blogspot.com.so blogspot.com.cpp
 
string get_filename(string url) {
                vector<string> resultado;
                if (url.find("?") != string::npos) {
                        stringexplode(url, "?", &resultado);
                        stringexplode(resultado.at(resultado.size()-2), "/", &resultado);
                        return resultado.at(resultado.size()-4) + "_" + resultado.at(resultado.size()-3) + "_" + resultado.at(resultado.size()-2) + "_" +resultado.at(resultado.size()-1);          
                } else {
                        stringexplode(url, "/", &resultado);
                        return resultado.at(resultado.size()-4) + "_" + resultado.at(resultado.size()-3) + "_" + resultado.at(resultado.size()-2) + "_" +resultado.at(resultado.size()-1); ;
                }
}
 
extern "C" resposta getmatch(const string url) {
    resposta r;  
 
   if ( (url.find("bp.blogspot.com") != string::npos)
   ) {
     
       r.file = get_filename(url);
      if (!r.file.empty()) {
         r.match = true;
         r.domain = "blogspot";
      } else {
         r.match = false;
      }
   } else {
      r.match = false;
   }
   return r;
}