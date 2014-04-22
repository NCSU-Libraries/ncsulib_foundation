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
    menuActive      : false,

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
            touchHover.menuActive = true;
            nav.openNav();

            // Sub-menu disappears after 10 seconds
            setTimeout( function() {
                touchHover.doubleTap    = 0;
                touchHover.menuActive   = false;
                nav.closeNav();
            }, 10000);

        });

        // Taps off of the menu close the menu
        jQuery('body').on('touchstart', function (e) {
            if (touchHover.menuActive === true) {
                // parentNotMenu means that the area you touched is not within the primary nav area
                // parentNotHover means that the area you touched isn't in the hover menu.
                // Was forced to use .attr('id') to actually get the comparison to work properly
                // which seems to be an iOS quirk.
                touchHover.parentNotMenu    = (jQuery(e.target).parents()[1] !== jQuery('ul#primary-nav')[0]);
                touchHover.parentNotHover   = (jQuery(e.target).parent().attr('id') !== jQuery('#primary-nav-menus').attr('id'));

                if (touchHover.parentNotMenu && touchHover.parentNotHover) {
                    touchHover.doubleTap    = 0;
                    touchHover.menuActive   = false;
                    nav.closeNav();
                }
            }
        });
    },
};

jQuery(function(){
    touchHover.init();
});