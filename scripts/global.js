jQuery(document).ready(function ($) {
  $("#mega").dcMegaMenu();
  $(".globalchat").click(function(){
    var chaturl=globalchat();
    window.open(chaturl,"chat","resizable=1,width=350,height=300");
    return false;
  });
  // $("input, textarea").placeholder(); //commented this out because it was throwing error. also not sure if it's being used anymore

	// set hover intent for global nav
	// jQuery('#primary-nav li a').hoverIntent(settings);

});
