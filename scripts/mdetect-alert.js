$(function(){

	// deleteCookie('mobile-alert');

	// check for cookie
	if(getCookie('mobile-alert')){
		$('#mobile-app-alert').hide();
	} else{
		setCookie();
		$('#mobile-app-alert').show();
	}

	// remove viewport if we're on mobile
	var winW = $(window).width();
	var scale = winW/1024;
	var contentStr = "width=1024, initial-scale="+scale+", maximum-scale=1.0, minimum-scale=0.25, user-scalable=yes";
	$("meta[name='viewport']").attr("content", contentStr);

	// if user closes alert don't show again

})

function setCookie(){
	$('#mobile-app-alert .close').on('click', function(e){
		var date = new Date();
   		date.setTime(date.getTime()+(3600*24)); //cookie expires in 24 hours
   		var expires = date.toGMTString();
		document.cookie = 'mobile-alert=true;expires='+expires+'; path=/';
	})
}

function getCookie(cname){
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++){
		var c = ca[i].trim();
	  	if (c.indexOf(name)==0) return c.substring(name.length,c.length);
	}
	return false;
}

function deleteCookie(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
