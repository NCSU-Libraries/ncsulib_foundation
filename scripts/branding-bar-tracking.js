var brandingTracking = {
    init : function(){

        jQuery('.ncstate-utility-bar-home').click(function(e){
            _gaq.push(['_trackEvent', 'Branding Bar', 'NC State Home']);
        })

        jQuery('#ncstate-utility-bar-toggle-link').click(function(e){
            _gaq.push(['_trackEvent', 'Branding Bar', 'Resources']);
        })

        jQuery('#search-input').click(function(e){
            _gaq.push(['_trackEvent', 'Branding Bar', 'Search NCSU']);
        })

        jQuery('#search-submit').click(function(e){
            _gaq.push(['_trackEvent', 'Branding Bar', 'Search NCSU']);
        })

        jQuery('li.ncstate-utility-bar-primary-util a').click(function(e){
            var val = $(this).text();
            _gaq.push(['_trackEvent', 'Branding Bar', val]);
        })

        jQuery('div.ncstate-utility-bar-sec-util li a').click(function(e){
            var val = $(this).text();
            _gaq.push(['_trackEvent', 'Branding Bar', val]);
        })
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