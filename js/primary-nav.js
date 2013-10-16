var nav = {
	index : '',
	init : function() {
		// mouse on primary nav link
		$('.primary-menu-item').mouseover(function(){
			window.clearTimeout(nav.timeout);
			// hide all
			nav.hideAllNav();

			// show nav item
			nav.index = $(this).parent().index();
			nav.openNav();
		})

		// mouse out primary nav link
		$('.primary-menu-item').mouseout(function(){
			nav.timeout = setTimeout(function(){
				nav.closeNav();
			}, 100);
		})

		// mouse on primary nav list
		$('.primary-menu-list').mouseover(function(){
			window.clearTimeout(nav.timeout);
			nav.openNav();
		})

		// mouse out primary nav list
		$('.primary-menu-list').mouseout(function(){
			nav.closeNav();
		})

	},

	openNav : function(){
		$('#primary-nav li:eq('+nav.index+') a').addClass('open');
		$('.primary-menu-list:eq('+nav.index+')').show().addClass('open');
	},

	closeNav : function(){
		$('#primary-nav li:eq('+nav.index+') a').removeClass('open');
		$('.primary-menu-list:eq('+nav.index+')').hide().removeClass('open');
	},

	hideAllNav : function(){
		$('.primary-menu-list').hide().removeClass('open');
		$('#primary-nav li a').removeClass('open');
	}
}

$(function(){
	nav.init();
})
