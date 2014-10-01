window.onload = function (){
    // add browser warning
    thebody = document.getElementsByTagName('body')[0];
    str = "<div id='browser_warning'><h4>The NCSU Library's website is not optimized for your browser.</h4></div>";
    thediv = document.createElement('div');
    thediv.innerHTML = str;
    thebody.insertBefore(thediv, thebody.firstChild);

    //placeholder polyfill
    var input = document.getElementsByTagName('input');
    var textarea = document.getElementsByTagName('textarea');
    $(input).placeholder();
    $(textarea).placeholder();
}

