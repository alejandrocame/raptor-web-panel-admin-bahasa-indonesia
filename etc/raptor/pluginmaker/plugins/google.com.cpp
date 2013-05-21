    #include <iostream>
    #include <cstring>
    #include <vector>
    #include "../utils.cpp"
     
    // use this line to compile
    // g++ -I. -fPIC -shared -g -o google.com.so google.com.cpp
    // regex
    // http.*\.google\.com.*(\.kmz|\.exe|\.msi|\.msp|\.cab)
     
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
     
      if ( (url.find(".google.com/") != string::npos) and (url.find(".kmz") != string::npos)
         ) {
          r.file = get_filename(url);
          if (!r.file.empty()) {
             r.match = true;
             r.domain = "google-earth";      
          } else {
             r.match = false;
          }
       }
       
       else if ( (url.find(".google.com/") != string::npos) and
    ((url.find(".exe") != string::npos) or (url.find(".msi") != string::npos) or
     (url.find(".cab") != string::npos) or (url.find(".msp") != string::npos))
       ) {      
           r.file = get_filename(url);
          if (!r.file.empty()) {
             r.match = true;
             r.domain = "google_updates";
          } else {
             r.match = false;
          }
       }
       else
       {
          r.match = false;
       }
       return r;
    }