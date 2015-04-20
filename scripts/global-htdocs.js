$(function(){
	// remove viewport for non-responsive sites
	if($('body').hasClass('non-responsive')){
		// get device width
		var winW = $(window).width();
		var scale = winW/1024;
		var contentStr = "width=1024, initial-scale="+scale+", maximum-scale=1.0, minimum-scale=0.25, user-scalable=yes";
		$("meta[name='viewport']").attr("content", contentStr);
	}

    var body = $('body');
    if($(body).hasClass('not-logged-in') || $(body).hasClass('logged-in')){
        $(body).addClass('drupal');
    } else{
        $(body).addClass('not-drupal');
    }

})
