jQuery(document).ready(function ($) {
  $("#mega").dcMegaMenu();
  $(".globalchat").click(function(){
    var chaturl=globalchat();
    window.open(chaturl,"chat","resizable=1,width=350,height=300");
    return false;
  });
  $("input, textarea").placeholder();
});