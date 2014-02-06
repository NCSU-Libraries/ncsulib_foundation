var mobileNav = {
	tOut : false,

	init : function(){

		mobileNav.handleNav();
		mobileNav.handleSearch();

		//brower resize event
		window.onresize = function(e){
			// detect if mobile nav is open
			if(!mobileNav.tOut){
				var timeout = setTimeout(function(){
					if(window.innerWidth > 768){
						mobileNav.closeNav();
					}
					mobileNav.tOut = false;
				}, 50)

				mobileNav.tOut = true;
			}
		}
	},

	handleNav : function(){
		jQuery('#nav-toggle').click(function(e){

			if(jQuery('body').hasClass('nav-expanded')){ //close
				mobileNav.closeNav();
			} else{ //open
				mobileNav.openNav();
			}

			e.preventDefault();
		})
	},

	openNav : function(){
		jQuery('body').addClass('nav-expanded');
		jQuery('#mobile-nav').show().height(jQuery('body').height());
	},

	closeNav : function(){
		jQuery('body').removeClass('nav-expanded');
		jQuery('#mobile-nav').hide();
	},

	handleSearch : function(){

		jQuery('#search-toggle').click(function(e){
			jQuery('#utility-search').toggle();

			e.preventDefault();
		})

	},
}

jQuery(function(){
	mobileNav.init();
})
