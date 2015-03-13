// instantiate foundation
(function ($, Drupal, window, document, undefined) {
	$(document).foundation();
})(jQuery, Drupal, this, this.document);


jQuery(function(){
	// check for orbit slider
	slider_check();
    iframeCheck();

    $(window).resize(function() {
        setTimeout(iframeCheck(), 1000);
    });
})



function slider_check(){

    if(jQuery('.orbit-slider').length > 0 && jQuery('.orbit-slider').attr('data-orbit') != ''){

        jQuery('.orbit-slider').attr('data-orbit', '').attr('data-options', 'animation:fade;slide_number:false;animation_speed:300;timer_speed:5000;');

    }
}

function iframeCheck(){
    var elem = $('#main-content iframe');
    if ($(elem).length > 0) {
        // widt of iframe
        var width = $(elem).attr('width');
        var widVal = width.split('%');
        // calculate rediculous margin bottom for iframe
        var marBot = -44 / 75 * (widVal[0] - 100);
        // if element exists do not recreate
        if($('.video-container').length == 0){
            $(elem).wrap( "<div class='video-container'></div>").css({'width':width,'height':width});
        }
        if($(window).width() > 768){
            $(elem).parent().css('margin-bottom' , -marBot+'%');
        } else{
            $(elem).parent().css('margin-bottom' , '0%');
        }

        // refresh iframe
        var iframe = $(elem);
        iframe.src = iframe.src;
    }
}





