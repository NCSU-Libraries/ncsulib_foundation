/**
 * Have touch enabled devices mimic mousehover on the primary desktop nav
 */

var touchHover = {
    init : function () {

        var $el = jQuery('.primary-nav a.primary-menu-item');

        $el.on("touchstart", function(evt) {
            evt.preventDefault();

            nav.closeNav();
            nav.index = jQuery(this).parent().index();
            nav.openNav();

            // Sub-menu disappears after 10 seconds
            setTimeout( function() {
                nav.closeNav();
                console.log("touchstart2.");
            }, 10000);

        });
    },
};

jQuery(function(){
    touchHover.init();
});