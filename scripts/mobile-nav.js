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
		$('#nav-toggle').click(function(e){

			if($('body').hasClass('nav-expanded')){ //close
				mobileNav.closeNav();
			} else{ //open
				mobileNav.openNav();
			}

			e.preventDefault();
		})
	},

	openNav : function(){
		$('body').addClass('nav-expanded');
		$('#mobile-nav').show().height($('body').height());
	},

	closeNav : function(){
		$('body').removeClass('nav-expanded');
		$('#mobile-nav').hide();
	},

	handleSearch : function(){

		$('#search-toggle').click(function(e){
			$('#utility-search').toggle();

			e.preventDefault();
		})

	},
}

$(function(){
	mobileNav.init();
})
