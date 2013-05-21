/*
 * (c) Copyright 2013 Erick Colindres <firecoldangelus@gmail.com>
 * Some Rights Reserved.
 *
 * @autor Erick Colindres <firecoldangelus@gmail.com>
 */

#include <iostream>
#include <cstring>
#include <vector>
#include "../utils.cpp"
 
// use this line to compile
// g++ -I. -fPIC -shared -g -o edgecastcdn.net.so edgecastcdn.net.cpp
// regex
// http.*\.edgecastcdn\.net.*(\.jpg|\.png|\.swf|\.mp3)
 
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
 
        if ( (url.find(".edgecastcdn.net") != string::npos) and (url.find(".jpg") != string::npos) or (url.find(".png") != string::npos) or (url.find(".swf") != string::npos) or (url.find(".mp3") != string::npos))
        {
                
            r.file = get_filename(url);
                if (!r.file.empty()) {
                        r.match = true;
                        r.domain = "GAMESF_edgecastcdn";
                } else {
                        r.match = false;
                }
        } else {
                r.match = false;
        }
        return r;
}
