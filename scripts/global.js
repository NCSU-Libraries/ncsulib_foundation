// instantiate foundation
(function ($, Drupal, window, document, undefined) {
	$(document).foundation();
})(jQuery, Drupal, this, this.document);


jQuery(function(){
	// check for orbit slider
	slider_check();
})



function slider_check(){

    if(jQuery('.orbit-slider').length > 0 && jQuery('.orbit-slider').attr('data-orbit') != ''){

        jQuery('.orbit-slider').attr('data-orbit', '').attr('data-options', 'animation:fade;slide_number:false;animation_speed:300;timer_speed:5000;');

    }
}





