jQuery(document).ready(function($){
	$('.mini td').mouseover(function(e){
		if(!$(this).hasClass('empty') && !$(this).hasClass('has-no-events')){
			var date = $(this).data('date');
			var open = $(this).data('open');
			var close = $(this).data('close');
			if($(this).hasClass('twenty_four_hours')){
				date_str = 'Open 24 Hours';
			} else if($(this).hasClass('closed')){
				date_str = 'Closed';
			} else if($(this).hasClass('appointment_only')){
				date_str = 'By Appointment';
			} else if(open == '12:00am'){
				if(close == '12:00am'){
					date_str = 'Closes at Midnight';
				} else{
					date_str = 'Closes at ' + close;
				}
			} else if(close == '12:00am'){
				date_str = 'Opens at ' + open;
			} else{
				date_str = open +' - '+close;
			}
			$(this).append('<div class="date-popup-wrapper"><div class="date-popup"><p>'+date+'</p><h2>'+date_str+'</h2></div></div>');
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
