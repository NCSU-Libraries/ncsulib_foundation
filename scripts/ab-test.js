var ab = {
    randNum : '', testAry : ['hamburger-nav', 'menu-nav'], navItem : '',
    init : function(){
        alert('hit')
        // hide all elements
        $('#nav-toggle a').each(function(e){
            $(this).addClass('hide');
        })

        ab.navItem = ab.testAry[ab.getRandomNumber()];

        // show random element
        $('#'+ab.navItem).removeClass('hide');

        ab.setCookie();
        console.log(ab.getCookie());
    },

    getRandomNumber : function(){
        ab.randNum = Math.floor((Math.random() * 2));

        return ab.randNum;
    },

    setCookie : function(){
        document.cookie = "name=abNav,navItem="+ab.navItem+",max-age=2592000,path=/";
    },

    getCookie : function(){
        var name = "abNav";
        var ca = document.cookie.split(';');
        for(var i=0; i<ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1);
            if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
        }
        return "";
    }
}

$(function(){
    ab.init();
})