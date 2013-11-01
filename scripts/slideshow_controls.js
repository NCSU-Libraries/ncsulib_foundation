/**
 * Slideshow Controls (especially with views and using huntlibrary--sustainability.css)
 *
 * Author: Charlie Morris
 * Date: 2/8/13
 * Path: huntlibrary/sustainability
 */

jQuery(document).ready(function($) {
  $('.views_slideshow_controls_text_pause').click(function() {
    if ($(this).hasClass("control-resume")){
      $(this).removeClass("control-resume");
    } else {
      $(this).addClass("control-resume");
    }
  });
});


