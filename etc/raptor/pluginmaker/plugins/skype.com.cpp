#include <iostream>
#include <cstring>
#include <string>
#include <vector>
#include "../utils.cpp"

using namespace std;
//Gildope

// regex
// http.*(\.skype\.com).*(\.cab|\.exe|\.zip|\.msi)
// http://download.skype.com/7781251b62871315174c8fca7d5adca8/partner/73/SkypeSetupFull.exe
// use this line to compile
// g++ -I. -fPIC -shared -g -o skype.com.so skype.com.cpp 

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

    if ( (url.find("download.skype.com/") != string::npos) )
     {
       
        r.file = get_filename(url);
        if (!r.file.empty()) {
            r.match = true;
            r.domain = "skype";
        } else {
            r.match = false;
        }
    } else {
        r.match = false;
    }
    return r;
}

