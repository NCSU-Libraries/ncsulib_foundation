jQuery(document).ready(function($){
	$('.mini td').mouseover(function(e){
		if(!$(this).hasClass('empty') && !$(this).hasClass('has-no-events')){
			var date = $(this).data('date');
			var display = $(this).data('display');
			$(this).append('<div class="date-popup-wrapper"><div class="date-popup"><p>'+date+'</p><h2>'+display+'</h2></div></div>');
			var pos = $(this).position();
			var popupH = $('.date-popup-wrapper').outerHeight();
			var popupW = $('.date-popup-wrapper').outerWidth();
			var cellH = $(this).height();
			var cellW = $(this).width();
			$('.date-popup-wrapper').css({'left':pos.left-(popupW*0.5)+(cellW*0.5)+5,'top':pos.top-popupH-11}); //yeah. this is hacky
		}
	})

	$('.mini td').mouseout(function(e){
		$('.date-popup-wrapper').remove();
	});
})
