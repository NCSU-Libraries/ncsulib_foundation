/*
Global chat widget url creator v 1.0
The Chat Now button in the header of all pages
 is a link that opens a new window.  But not all pages
 use the same URL.  This script checks the pages URL and
 sets the URL accordingly.
*/

 function globalchat(){
	var libHelpURL = "http://libraryh3lp.com/chat/"; 
	
	// default parameters.  Covers most pages and nrl.
	var chatParams = {
		"chatEmail": "ref-desk",
		"chatID": "Librarian",
		"chatCSS": "http://site.lib.ncsu.edu/website/css/chat.css",
		"chatSkin": "",
		"chatTheme": "",
		"chatTitle": ""
	};
	
	var winLoc = window.location.host;
	var winFullPath = window.location.pathname.split('/');
	var winPath = winFullPath[1];
	
	
	// Historical State - historicalstate.lib.ncsu.edu
	if (winLoc == "historicalstate.lib.ncsu.edu") {
		chatParams["chatEmail"]="ncsu-special-collections";
		chatParams["chatID"]="librarian";
		chatParams["chatSkin"]="5904";
		chatParams["chatTheme"]="jsf-text";
		chatParams["chatTitle"]="Special+Collections+Help";
	}
	// Catalog - www2.lib.ncsu.edu/catalog/
	else if (winPath == "catalog") {
		chatParams["chatEmail"]="ncsu-catalog";
		chatParams["chatSkin"]="5904";
		chatParams["chatTheme"]="jsf-text";
		chatParams["chatTitle"]="Library%20Catalog%20Help";
	}
	// Find Articles - www.lib.ncsu.edu/articles/
	else if (winPath == "articles" || winLoc == "findtext.lib.ncsu.edu") {
		chatParams["chatEmail"]="ncsu-360link";
	}
	// Vet Med - www.lib.ncsu.edu/vetmed/
	else if (winPath == "vetmed") {
		chatParams["chatEmail"]="ncsu-vml";
	}
	
	
	var chatURL=""
	chatURL+=libHelpURL;
	chatURL=chatURL + chatParams["chatEmail"] + "@chat.libraryh3lp.com";
	chatURL+="?";
	
	function attachParam(param, plabel) {
		if (chatParams[param]!="") {
			chatURL=chatURL + plabel + "=" + chatParams[param];
			chatURL+="&";
		}
	}
	
	attachParam("chatID", "identity");
	attachParam("chatCSS", "css");
	attachParam("chatSkin", "skin");
	attachParam("chatTheme", "theme");
	attachParam("chatTitle", "title");
	
	return chatURL;
}