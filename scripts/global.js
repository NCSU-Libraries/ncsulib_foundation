// instantiate foundation
(function ($, Drupal, window, document, undefined) {
	$(document).foundation();
})(jQuery, Drupal, this, this.document);


jQuery(function(){
	// check for orbit slider
	slider_check();
    iframeCheck();
})



function slider_check(){

    if(jQuery('.orbit-slider').length > 0 && jQuery('.orbit-slider').attr('data-orbit') != ''){

        jQuery('.orbit-slider').attr('data-orbit', '').attr('data-options', 'animation:fade;slide_number:false;animation_speed:300;timer_speed:5000;');

    }
}

function iframeCheck(){
    var elem = $('#main-content iframe');
    if ($(elem).length > 0) {
        var width = $(elem).attr('width');
        var widVal = width.split('%');
        $(elem).wrap( "<div class='video-container'></div>").css({'width':width,'height':width});
        $(elem).parent().css('margin-bottom' , (-(widVal[0]/2))+'%');
    }
}





