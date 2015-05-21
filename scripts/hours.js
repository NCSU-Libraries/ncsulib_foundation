jQuery(document).ready(function($){
	$('.mini td').mouseover(function(e){
		if(!$(this).hasClass('empty') && !$(this).hasClass('has-no-events')){
			var date = $(this).data('date');
			var display = $(this).data('display');
			$(this).append('<div class="date-popup-wrapper"><div class="date-popup"><p>'+date+'</p><h2>'+display+'</h2></div><div id="popup-ind"></div></div>');

			// positioning logic
			var pos = $(this).position();
			var popupH = $('.date-popup-wrapper').outerHeight();

			$('.date-popup-wrapper').css({'left':0,'top':pos.top-popupH-11}); //yeah. this is hacky
			$('#popup-ind').css({'left':pos.left+8});
		}
	})

	$('.mini td').mouseout(function(e){
		$('.date-popup-wrapper').remove();
	});
})
