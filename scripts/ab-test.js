var ab = {
    randNum : '', testAry : ['hamburger-nav', 'menu-nav'], navItem : '',
    init : function(){
        // set or show random element
        ab.setElement();

        // set GA tracking event for mobile nav button
        jQuery('#'+ab.navItem).click(function(e){
            _gaq.push(['_trackEvent', 'Mobile Nav Button', ab.navItem]);
        })

        // set GA tracking event for primary nav items
        jQuery('a.primary-menu-item').click(function(e){
            var item = $(this).data('menu');
            _gaq.push(['_trackEvent', 'Mobile Nav Button', ab.navItem, 'primary nav', item]);
        })

        // set GA tracking event for utility nav items
        jQuery('#utility-links a').hover(function(e){
            var item = $(this).text();
            _gaq.push(['_trackEvent', 'Mobile Nav Button', ab.navItem, 'utility nav', item]);
        })

    },

    setElement : function(){
        if(ab.getCookies()){
            ab.navItem = ab.checkCookies();

        } else{
            ab.navItem = ab.testAry[ab.getRandomNumber()];
            ab.setCookie();
        }

        // hide all elements
        jQuery('#nav-toggle a').each(function(e){
            jQuery(this).addClass('hide');
        })

        jQuery('#'+ab.navItem).removeClass('hide');
    },

    getRandomNumber : function(){
        ab.randNum = Math.floor((Math.random() * 2));

        return ab.randNum;
    },

    setCookie : function(){
        document.cookie = "abNav="+ab.navItem+";max-age=2592000;path=/";
    },

    getCookies : function(){
        var name = "abNav";
        var ca = document.cookie.split(';');
        for(var i=0; i<ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1);
            if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
        }
        return "";
    },

    checkCookies : function(){
        var elems = ab.getCookies();
        var split = elems.split(';');
        for(var i=0;i<split.length;i++){
            var s = split[i].split('=');
            return s[1];
        }
    }
}

jQuery(function(){
    ab.init();
})