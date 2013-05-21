#include <iostream>
#include <cstring>
#include <vector>
#include "../utils.cpp"

// use this line to compile
// g++ -fPIC -shared -g -o mbamupdates.com.so mbamupdates.com.cpp
// http://data-cdn.mbamupdates.com/v0/program/data/mbam-setup-1.70.0.1100.exe 
// Regex
// http.*\.mbamupdates.com.*(\.exe)

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
	
	
	if ( (url.find(".mbamupdates.com/") != string::npos)   
	) {
		
	    r.file = get_filename(url);
		if (!r.file.empty()) {
			r.match = true;
			r.domain = "mbamupdates";
		} else {
			r.match = false;
		}
	} else {
		r.match = false;
	}
	return r;
}