/*
 * @autor xtanctp, xtanctp@gmail.com
 * http.*(\.socialpointgames\.com.|\.socialpoint\.es.)*(\.jpg|\.png|\.gif|\.swf|\.mp3)
 * g++ -I. -fPIC -shared -g -o socialpointgames.com.so socialpointgames.com.cpp
 */

#include <iostream>
#include <cstring>
#include <string>
#include <vector>
#include "../utils.cpp"

using namespace std;

string dominiotxt="socialpg";
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
    if ( (url.find(".socialpointgames.com") != string::npos) and (url.find("dragoncity/") != string::npos)
       ) {
    dominiotxt="z-GAMESF_dragoncity";
    }
    if ( (url.find(".socialpointgames.com") != string::npos) and (url.find("socialwars/")!= string::npos)
       ) {
    dominiotxt="z-GAMESF_socialwars";
    }
    if ( (url.find(".socialpointgames.com") != string::npos) and (url.find("socialempires/")!= string::npos)
       ) {
    dominiotxt="z-GAMESF_socialempires";
    }
    if ( (url.find(".socialpointgames.com") != string::npos) or
        (url.find(".socialpoint.es") != string::npos)  
      {
            r.file = get_filename(url);
                if (!r.file.empty()) {
                        r.match = true;
                       r.domain = dominiotxt;
                } else {
                        r.match = false;
                }
        }
           else {
                r.match = false;
        }
        return r;
}