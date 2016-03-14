/*var amazonNav = {
	init : function() {

        console.log('test');

	}
};

jQuery(function(){
    amazonNav.init();
});*/



$(document).ready(function(){
    
        var timer;
        var stopProp = false;
        $('ul.primary-nav>li').mouseenter(function(e){
            var navIndex = $(this).index();
            // NAV NOT OPEN
            if ( stopProp ) {
                //alert('stop and make sure it stays there for a second');
                stopProp = false;
                setTimeout(function(){
                    if ( $(e.target).is(":hover") ) {
                        openNavItem(navIndex);
                    }
                }, 55);
            } else {
                if ( ! $('#primary-nav-menus').hasClass('open') ) {
                    setTimeout(function(){
                        if ( $(e.target).is(":hover") ) {
                            openNavItem(navIndex);
                        }
                    },70);
                    //alert('its not open');
                } else if ( onPrimaryNav ) {
                    // we are leaving one nav for another (set timeout)
                    //alert('one nav for another');
                } else {
                    //$(e.target).addClass('open');
                    openNavItem(navIndex);
                }
            }
        });
        
        
        // this is coming from the nav links at the top
        $('ul.primary-nav>li').mouseleave(function(e){
            if( $(e.toElement).hasClass('primary-menu-item') ) {
                // left the nav and went into another one
                //alert('it went into a primary-menu-item');
                stopProp = true;
            } else if ( $(e.toElement).hasClass('primary-menu-list') ) {
                // left the nav and went into the menu list
                //alert('it went into a primary-menu-list');
            } else {
                // left the menu links completely
                closeNav();
            }
        });
        
        
        // left the menu list
        $('.primary-menu-list').mouseleave(function(e){
            if( ! $(e.toElement).hasClass('primary-menu-item') ) {
                closeNav();
            }
        });
        
        
    });

    function closeOneNav() {
        $('.primary-menu-item:eq(' + navIndex + ')').removeClass('open');
        $('.primary-menu-list:eq(' + navIndex + ')').removeClass('open');
    }
    
    function closeNav() {
        $('.primary-menu-item').removeClass('open');
        $('.primary-menu-list').removeClass('open');
    }

    function openNavItem(navIndex) {
        //alert('open nav item ' + navIndex);
        closeNav();
        $('.primary-menu-item:eq(' + navIndex + ')').addClass('open');
        $('.primary-menu-list:eq(' + navIndex + ')').addClass('open');
    }
