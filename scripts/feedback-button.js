/**
 * Cookie creation for turning off the feedback form button
 */


// See http://www.quirksmode.org/js/cookies.html
var cookieWork = {
    createCookie : function(name,value,days) {
        var expires = "";

        if (days) {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            expires = "; expires="+date.toGMTString();
        }
        document.cookie = name+"="+value+expires+"; path=/";
    },
    readCookie : function(name) {
        var nameEquals = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') {
                c = c.substring(1,c.length);
            }
            if (c.indexOf(nameEquals) === 0) {
                return c.substring(nameEquals.length,c.length);
            }
        }
        return null;
    },
    eraseCookie : function(name) {
        this.createCookie(name,"",-1);
    }
};

var toggleFeedback = {
    init : function() {
        if (cookieWork.readCookie('ncsulib-feedback') === 'hide') {
            this.setCookie();
            jQuery('.feedback-form').hide();
        } else {
            this.bind();
        }
    },
    bind : function() {
        jQuery('#close-feedback').click( function(){
            jQuery('.feedback-form').hide();
            toggleFeedback.setCookie();
        });
    },
    setCookie : function() {
        // Session only
        cookieWork.createCookie('ncsulib-feedback', 'hide');
    }
};

jQuery(document).ready( function($) {
    toggleFeedback.init();
});