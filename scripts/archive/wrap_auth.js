function wrapLogout() {
	var expires = " expires=Thu, 01-Jan-1970 00:00:01 GMT;";
	document.cookie = "WRAP16=;"+expires+" path=/;domain=ncsu.edu";
	document.cookie = "WRAP_REFERER=;"+expires+" path=/;domain=ncsu.edu";
	document.cookie = "WRAP_REFERER_P=;"+expires+" path=/;domain=ncsu.edu";
	document.cookie = "LIBFUNCTION=;"+expires+" path=/;domain=ncsu.edu";
	// _gaq.push(["_trackEvent", "Utility Nav", "Click", "Logout"]); // Google Analytics tracking of logout link clicks
}
