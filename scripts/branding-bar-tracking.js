var brandingTracking = {
    init : function(){

        jQuery('.ncstate-utility-bar-home').click(function(e){
            _gaq.push(['_trackEvent', 'Branding Bar', 'NC State Home']);
            brandingTracking.pause();
        })

        jQuery('#ncstate-utility-bar-toggle-link').hover(function(e){
            _gaq.push(['_trackEvent', 'Branding Bar', 'Resources', 'toggle button']);
            brandingTracking.pause();
        })

        jQuery('#search-input').click(function(e){
            _gaq.push(['_trackEvent', 'Branding Bar', 'Search NCSU']);
            brandingTracking.pause();
        })

        jQuery('#search-submit').click(function(e){
            _gaq.push(['_trackEvent', 'Branding Bar', 'Search NCSU']);
            brandingTracking.pause();
        })

        jQuery('li.ncstate-utility-bar-primary-util a').click(function(e){
            var val = $(this).text();
            _gaq.push(['_trackEvent', 'Branding Bar', 'Resources', val]);
            brandingTracking.pause();
        })

        jQuery('div.ncstate-utility-bar-sec-util li a').click(function(e){
            var val = $(this).text();
            _gaq.push(['_trackEvent', 'Branding Bar', 'Resources', val]);
            brandingTracking.pause();
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
    brandingTracking.interval = setInterval(brandingTracking.isBarLoaded, 1000);
});