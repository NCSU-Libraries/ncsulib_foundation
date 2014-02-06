jQuery(window).load(function() {
	var pos = jQuery('#exhibit-sidenav').offset();
	var top = pos.top;

	var footerPos = jQuery('#ncsulibraries-footer').offset();
	var footerTop = footerPos.top;

	window.onscroll = function(){
		var activePos = jQuery('#exhibit-sidenav').offset();
		var sidebarBottom = activePos.top+jQuery('#exhibit-sidenav').height();

		if(window.pageYOffset > top){
			jQuery('#exhibit-sidenav').addClass('fixed').css('left', pos.left);
		} else{
			jQuery('#exhibit-sidenav').removeClass('fixed').css('left', 'auto');
		}

		// add padding-boottom to #main so sidenav doesn't overlay nav
		var posCalc = footerTop-sidebarBottom;
		console.log(posCalc);
		if(posCalc < 0){
			jQuery('#exhibit-sidenav').css('top', (posCalc-40)+'px');
		} else if(posCalc > 50){
			jQuery('#exhibit-sidenav').css('top', '0px');
		}

	}
})
