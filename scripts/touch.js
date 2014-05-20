 /**
 * Have touch enabled devices mimic mousehover on the primary desktop nav
 *
 * Dependent on primary-nav.js
 */

var touchHover = {
    $el             : jQuery('.top-bar-section .primary-menu-item'),
    tapped          : [],
    menuActive      : false,

    init : function () {
        touchHover.$el.on("touchstart", function(evt) {
            evt.preventDefault();

            // Opens the sub nav
            nav.closeNav();
            nav.index = jQuery(this).parent().index();
            touchHover.menuActive = true;
            nav.openNav();

        });

        jQuery('body').on('touchstart', function (e) {

            if (touchHover.menuActive === true) {
            e.preventDefault();
                touchHover.tapped.push(jQuery(e.target).attr('data-menu'));
                var last    = String(touchHover.tapped.slice(touchHover.tapped.length-2, touchHover.tapped.length-1));
                var current = String(touchHover.tapped.slice(touchHover.tapped.length-1, touchHover.tapped.length));

                if (current === last && current !== '') {
                    // Go to the menu landing page if there's been two taps
                    var href = jQuery(e.target).attr('href');
                    window.location.href = href;
                } else if (current === '') {
                    // If there is no data-menu attibute, then an empty string is the value
                    // Thus:
                    // Go to the link
                    if (jQuery(e.target).attr('href')) {
                        var link = jQuery(e.target).attr('href');
                        window.location.href = link;
                    }
                    // Do nothing
                    if (jQuery(e.target).parent().attr('id') === 'primary-nav-menus') {
                        return;
                    }
                    // Or close the nav
                    touchHover.menuActive   = false;
                    nav.closeNav();
                } else if (current !== last && current !== '') {
                    // Tab switching
                    nav.closeNav();
                    nav.index = jQuery(e.target).parent().index();
                    nav.openNav();
                }
            }
        });
    },
};

jQuery(function(){
    touchHover.init();
});