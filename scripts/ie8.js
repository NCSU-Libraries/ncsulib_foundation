window.onload = function (){
	thebody = document.getElementsByTagName('body')[0];
	str = "<div id='browser_warning'><h4>The NCSU Library's website is not optimized for your browser.<br/> Would you consider using a <a href='http://browsehappy.com/'>modern browser</a>?</h4></div>";
	thediv = document.createElement('div');
	thediv.innerHTML = str;
	thebody.insertBefore(thediv, thebody.firstChild);
}
