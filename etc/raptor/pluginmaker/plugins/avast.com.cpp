    #include <iostream>
    #include <cstring>
    #include <string>
    #include <vector>
    #include "../utils.cpp"
     
    using namespace std;
     
    // use this line to compile
    // g++ -I. -fPIC -shared -g -o avast.com.so avast.com.cpp
    // Regex
    // http.*\.avast\.com.*(\.def|\.vpu|\.vpaa|\.stamp|\.vpx)
     
    bool in_array(const string &needle, const vector< string > &haystack) {
     
            int max = haystack.size();
            if (max == 0) return false;
            for (int iii = 0; iii < max; iii++) {
                       if (regex_match(haystack[iii], needle) != "") {
                               return true;
                    }
            }
            return false;
    }
     
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
                   
            vector<string> black_list;
            black_list.push_back ("servers.def.vpx");
            black_list.push_back ("prod-ais.vpx");
                   
            if ((url.find(".avast.com/") != string::npos) and (in_array(url, black_list) == false)
                    ) {
                    r.file = get_filename(url);
                    if (!r.file.empty()) {
                            r.match = true;
                            r.domain = "avast";
                    } else {
                            r.match = false;
                    }
            } else {
                    r.match = false;
            }
            return r;
    }

En línea
