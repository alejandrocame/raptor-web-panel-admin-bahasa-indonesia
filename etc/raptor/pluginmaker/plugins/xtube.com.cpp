#include <iostream>
#include <cstring>
#include <vector>
#include "../utils.cpp"

// use this line to compile
// g++ -I. -fPIC -shared -g -o xtube.com.so xtube.com.cpp
// regex http.*\.(publicvideo|publicphoto)\.xtube\.com\/(videowall\/)?videos?\/.*(\.flv\?.*|\_Thumb\.flv$)

string get_filename(string url) {
	vector<string> resultado;
	stringexplode(url,"/",&resultado);
	url = resultado.at(resultado.size() - 1);

	if (url.find("?") == string::npos) {
		return url;
	} else {
		resultado.clear();
		stringexplode(url, "?", &resultado);
		string tmp;
		if( (tmp = regex_match("[\\?&]fs=[0-9]+",resultado.at(1))) != "" ) {
			tmp.erase(0,4);
			
		}
		return resultado.at(0);
	}
}

extern "C" resposta getmatch(const string url) {
    resposta r;	
    
	r.file = get_filename(url);
	if (!r.file.empty()) {
		r.match = true;
		r.domain = "xtube";
	} else {
		r.match = false;
	}
	return r;
}

En línea
