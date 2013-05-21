    #include <iostream>
    #include <cstring>
    #include <vector>
    #include "../utils.cpp"

    // use this line to compile
    // g++ -I. -fPIC -shared -g -o triviador.com.so triviador.com.cpp
    // regex
    // http.*\.triviador\.com.*(\.jpg|\.png|\.gif|\.swf|\.mp3)

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

    if ( (url.find(".triviador.com/") != string::npos)
    	) {

           r.file = get_filename(url);
          if (!r.file.empty()) {
             r.match = true;
             r.domain = "z-GAMESF_triviador";
          } else {
             r.match = false;
          }
       } else {
          r.match = false;
       }
       return r;
    } 

