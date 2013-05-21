#include <iostream>
#include <cstring>
#include <vector>
#include "../utils.cpp"

// use this line to compile
// g++ -I. -fPIC -shared -g -o zynga.com.so zynga.com.cpp
// regex
// http.*\.zynga\.com.*(\.jpg|\.png|\.gif|\.swf|\.mp3)

string dominiotxt="z-GAMESF_zynga";
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

    if ( (url.find("/poker/") != string::npos) 
       ) {
    dominiotxt="z-GAMESF_poker";
    }
    if ( (url.find(".zynga.com/") != string::npos) and 
   ((url.find(".jpg")!= string::npos) or
   (url.find(".png")!= string::npos) or
   (url.find(".mp3")!= string::npos) or
   (url.find(".swf")!= string::npos))
       ) {

 	   r.file = get_filename(url);
                if (!r.file.empty()) {
                        r.match = true;
                       r.domain = dominiotxt;
                } else {
                        r.match = false;
                }
        } else {
                r.match = false;
        }
        return r;
}