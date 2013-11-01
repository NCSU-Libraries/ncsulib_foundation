var current;
var next;
current = 1;

var totWidth=0;
var positions = new Array();

jQuery('#gallery .gal').each(function(i){
/* Loop through all the slides sets and store their accumulative widths in totWidth */
	positions[i]= totWidth;
	totWidth += jQuery(this).width();
	});

/* Change the slide set's cotnainer div's width to the exact width of all the slides combined */
jQuery('#gallery').width(totWidth);

/* first highlight image to show set */
jQuery('div#highlight1').show( function() {});

/* image selection via thumbnail */
jQuery('img.thumb').click(function() {
	jQuery('img.thumb').removeClass('active-thumb');
	jQuery(this).addClass('active-thumb');
	next = jQuery(this).attr('id');
	jQuery('div#highlight'+current+'').hide(0, function() {
		current = next;
	});
	jQuery('div#highlight'+next+'').show(0, function() {});	
});

/* circle pagination buttons */
jQuery('a.circle').click(function(e) {
	jQuery('a.circle').removeClass('active-view').addClass('inactive-view');
	jQuery(this).removeClass('inactive-view').addClass('active-view');

	/* animation */
	var pos = jQuery(this).parent().prevAll('.menuItem').length;
	jQuery('#gallery').stop().animate({marginLeft:-positions[pos]+'px'},450);

  /* Prevent the default action of the link */
	e.preventDefault();
});