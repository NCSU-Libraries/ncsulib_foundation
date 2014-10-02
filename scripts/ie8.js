window.onload = function (){
    // add browser warning
    thebody = document.getElementsByTagName('body')[0];
    str = "<div id='browser_warning'><h4>This site may not work well on Internet Explorer versions 8 or lower</h4></div>";
    thediv = document.createElement('div');
    thediv.innerHTML = str;
    thebody.insertBefore(thediv, thebody.firstChild);

    //placeholder polyfill
    var input = document.getElementsByTagName('input');
    var textarea = document.getElementsByTagName('textarea');
    $(input).placeholder();
    $(textarea).placeholder();
}

