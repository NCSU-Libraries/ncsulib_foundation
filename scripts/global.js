// instantiate foundation
(function ($, Drupal, window, document, undefined) {
	$(document).foundation();
})(jQuery, Drupal, this, this.document);


jQuery(function(){
	// check for orbit slider
	slider_check();
    iframeCheck();
    htdocsOrDrupal();
    captionImage();

    $(window).resize(function() {
        setTimeout(iframeCheck(), 1000);
    });
})



function slider_check(){
    if(jQuery('.orbit-slider').length > 0 && jQuery('.orbit-slider').attr('data-orbit') != ''){
        jQuery('.orbit-slider').attr('data-orbit', '').attr('data-options', 'animation:fade;slide_number:false;animation_speed:300;timer_speed:5000;');
    } else if(jQuery('.orbit-slider').length > 0){
        jQuery('.orbit-bullets li:first').addClass('active');
    }
}

function iframeCheck(){
    var elem = $('#main-content iframe');
    // if element exists andthere is no height set
    if ($(elem).length > 0 && !$(elem).attr('height')) {
        // widt of iframe
        var width = $(elem).attr('width');
        var widVal = width.split('%');
        // calculate rediculous margin bottom for iframe
        var marBot = widVal[0]*0.5; //(widVal[0]*0.5) / 100 * (widVal[0] - 50);

        // if element exists do not recreate
        if($('.video-container').length == 0){
            // if element already has a height set it. if not make it same as width
            $(elem).wrap( "<div class='video-container'></div>").css({'width':width,'height':width*2});
        }
        // below 768 is mobile
        if($(window).width() > 768){
            $(elem).parent().css('padding-bottom' , marBot+'%');
        } else{
            $(elem).parent().css('margin-bottom' , '0%');
        }
    }
}

function htdocsOrDrupal(){
    var body = $('body');
    if($(body).hasClass('not-logged-in') || $(body).hasClass('logged-in')){
        $(body).addClass('drupal');
    } else{
        $(body).addClass('not-drupal');
    }
}

function captionImage(){
    $('#main-content img.left-image, #main-content img.center-image, #main-content img.right-image').each(function(){

        // add classes
        var caption = $(this).attr('alt');
        var alignmentClass = $(this).attr('class');

        // wrap image in div
        $(this).wrap('<span class="caption-wrap '+alignmentClass+'-wrap"></span>');
        // $(this).addClass('caption-wrap div-'+alignmentClass);
        // $(this).find('.caption-wrap').addClass('div-'+alignmentClass);

        // add caption if it exists
        if(caption != ''){
            $(this).parent().append('<span class="caption-text"><small>'+caption+'</small></span>');
        }

    })
}




