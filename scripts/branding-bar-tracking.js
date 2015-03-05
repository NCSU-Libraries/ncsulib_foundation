var brandingTracking = {
    init : function(){

        jQuery('.ncstate-utility-bar-home').click(function(e){
            brandingTracking.pause();
            // _gaq.push(['_trackEvent', 'Branding Bar', 'NC State Home']);
            ga('send', 'event', 'Branding Bar', 'NC State Home');
        })

        jQuery('#ncstate-utility-bar-toggle-link').click(function(e){
            brandingTracking.pause();
            // _gaq.push(['_trackEvent', 'Branding Bar', 'Resources', 'toggle button']);
            ga('send', 'event', 'Branding Bar', 'Resources', 'toggle button');
        })

        jQuery('#search-input').click(function(e){
            brandingTracking.pause();
            // _gaq.push(['_trackEvent', 'Branding Bar', 'Search NCSU']);
            ga('send', 'event', 'Branding Bar', 'Search NCSU');
        })

        jQuery('#search-submit').click(function(e){
            brandingTracking.pause();
            // _gaq.push(['_trackEvent', 'Branding Bar', 'Search NCSU']);
            ga('send', 'event', 'Branding Bar', 'Search NCSU');
        })

        jQuery('li.ncstate-utility-bar-primary-util a').click(function(e){
            brandingTracking.pause();
            var val = $(this).text();
            // _gaq.push(['_trackEvent', 'Branding Bar', 'Resources', 'primary link '+val]);
            ga('send', 'event', 'Branding Bar', 'Resources', 'primary link '+val);
        })

        jQuery('div.ncstate-utility-bar-sec-util li a').click(function(e){
            brandingTracking.pause();
            var val = $(this).text();
            // _gaq.push(['_trackEvent', 'Branding Bar', 'Resources', 'secondary link '+val]);
            ga('send', 'event', 'Branding Bar', 'Resources', 'secondary link '+val);
        })
    },

    pause : function(){
        var date = new Date();
        var curDate = null;
        do {
            curDate = new Date();
        } while(curDate-date < 200);
    },

    isBarLoaded : function(){
        if(jQuery('.ncstate-utility-bar').length){
            brandingTracking.init();
            clearInterval(brandingTracking.interval);
        }
    }
}


jQuery(function(){
    if(!$('body').hasClass('logged-in')){
        brandingTracking.interval = setInterval(brandingTracking.isBarLoaded, 500);
    }
});