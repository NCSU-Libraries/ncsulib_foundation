/**
 * Have touch enabled devices mimic mousehover on the primary desktop nav
 *
 * Dependent on primary-nav.js
 */

var touchHover = {
    $el             : jQuery('.primary-menu-item'),
    doubleTap       : 0,
    tapped          : [],
    parentNotMenu   : false,
    parentNotHover  : false,

    init : function () {
        touchHover.$el.on("touchstart", function(evt) {
            evt.preventDefault();

            touchHover.doubleTap++;
            touchHover.tapped.push(jQuery(this).attr('data-menu'));
            var last    = String(touchHover.tapped.slice(touchHover.tapped.length-2, touchHover.tapped.length-1));
            var current = String(touchHover.tapped.slice(touchHover.tapped.length-1, touchHover.tapped.length));

            // Double tap acts like a click
            if (current === last && touchHover.doubleTap > 1) {
                var href = jQuery(this).attr('href');
                window.location.href = href;
                return;
            }

            // Opens the sub nav
            nav.closeNav();
            nav.index = jQuery(this).parent().index();
            nav.openNav();

            // Sub-menu disappears after 10 seconds
            setTimeout( function() {
                touchHover.doubleTap = 0;
                nav.closeNav();
            }, 10000);

        });

        // Taps off of the menu close the menu
        jQuery('body').on('click', function (e) {
            touchHover.parentNotMenu    = (jQuery(e.target).parent() !== touchHover.$el);
            touchHover.parentNotHover   = (jQuery(e.target).parent()[0] !== jQuery('#primary-nav-menus')[0]);
            console.log('parentNotMenu ' + touchHover.parentNotMenu);
            console.log('touchHover.parentNotHover ' + touchHover.parentNotHover );
            if (touchHover.parentNotMenu && touchHover.parentNotHover) {
                touchHover.doubleTap = 0;
                nav.closeNav();
            }
        });
    },
};

jQuery(function(){
    touchHover.init();
});