    #include <iostream>
    #include <cstring>
    #include <vector>
     
    // use this line to compile
    // g++ -I. -fPIC -shared -g -o grandchase.com.so grandchase.com.cpp
     
    // http://122.102.49.202/cp/GrandChase/GrandChase100311/stage/ai/ai.kom
    // Regex
    // 122\.102\.49\.[0-9]{2,3}\/.*(\.stg|\.kom|\.exe|\.zip)
     
    using namespace std;
     
    struct resposta {
            bool match;
            string domain;
            string file;
    };
     
    void stringExplode(string str, string separator, vector<string>* results){
        int found;
        found = str.find_first_of(separator);
        while(found != string::npos){
            if(found > 0){
                results->push_back(str.substr(0,found));
            }
            str = str.substr(found+10);
            found = str.find_first_of(separator);
        }
        if(str.length() > 0){
            results->push_back(str);
        }
    }
     
    string get_filename(string url) {
                    vector<string> resultado;
            if (url.find("?") != string::npos) {
                stringExplode(url, "?", &resultado);
                stringExplode(resultado.at(resultado.size()-2), "/", &resultado);
                return resultado.at(resultado.size()-4) + "_" + resultado.at(resultado.size()-3) + "_" + resultado.at(resultado.size()-2) + "_" +resultado.at(resultado.size()-1);          
            } else {
                stringExplode(url, "/", &resultado);
                return resultado.at(resultado.size()-4) + "_" + resultado.at(resultado.size()-3) + "_" + resultado.at(resultado.size()-2) + "_" +resultado.at(resultado.size()-1);
            }
    }
     
    extern "C" resposta getmatch(const string url) {
        resposta r;
           
            if ( url.find(".grandchase.megaxus.com/") == string::npos )
            {
                r.file = get_filename(url);
                    if (!r.file.empty()) {
                            r.match = true;
                            r.domain = "GAMEINDO_grandchase";
                    } else {
                            r.match = false;
                    }
            } else {
                    r.match = false;
            }
            return r;
    }
     

En línea
