jQuery(document).ready(function ($) {
  $("#mega").dcMegaMenu();
  $(".globalchat").click(function(){
    var chaturl=globalchat();
    window.open(chaturl,"chat","resizable=1,width=350,height=300");
    return false;
  });

  // polyfill for IE<10, this is used anywhere we have an input element with
  // placeholder text, for example, the search in the header
  $("input, textarea").placeholder();

	// set hover intent for global nav
	$('#primary-nav li a').hoverIntent(settings);
});
