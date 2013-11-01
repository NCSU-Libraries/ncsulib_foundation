/*
 * DC Mega Menu - jQuery mega menu
 * Copyright (c) 2011 Design Chemical
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 */
(function($){

	//define the defaults for the plugin and how to call it
	$.fn.dcMegaMenu = function(options){
		//set default options
		var defaults = {
			classParent: 'dc-mega',
			rowItems: 3,
			speed: 'fast',
			effect: 'fade',
			event: 'hover',
			classSubParent: 'mega-hdr',
			classSubLink: 'mega-hdr'
		};

		//call in the default otions
		var options = $.extend(defaults, options);
		var $dcMegaMenuObj = this;

		//act upon the element that is passed into the design
		return $dcMegaMenuObj.each(function(options){

			megaSetup();

			function megaOver(){
				var subNav = $('.sub',this);
				$(this).addClass('mega-hover');
				if(defaults.effect == 'fade'){
					$(subNav).fadeIn(defaults.speed);
				}
				if(defaults.effect == 'slide'){
					$(subNav).show(defaults.speed);
				}
				//***Code below sizes the Mega Menu -Added by JDW 5-2-11
				(function($) {
					//Function to calculate total width of all ul's
					jQuery.fn.calcSubWidth = function() {
						rowWidth = 0;
						//Calculate row
						$(this).find("ul").each(function() { //for each ul...
							rowWidth += $(this).width(); //Add each ul's width together
						});
					};
				})(jQuery);

				if ( $(this).find(".row").length > 0 ) { //If row exists...

					var biggestRow = 0;

					$(this).find(".row").each(function() {	//for each row...
						$(this).calcSubWidth(); //Call function to calculate width of all ul's
						//Find biggest row
						if(rowWidth > biggestRow) {
							biggestRow = rowWidth;
						}
					});

					$(this).find(".sub").css({'width' :biggestRow}); //Set width
					$(this).find(".row:last").css({'margin':'0'});  //Kill last row's margin

				} else { //If row does not exist...

					$(this).calcSubWidth();  //Call function to calculate width of all ul's
					$(this).find(".sub").css({'width' : rowWidth}); //Set Width

				}
				//***Code above sizes the Mega Menu -Added by JDW 5-2-11
			}
			function megaAction(obj){
				var subNav = $('.sub',obj);
				$(obj).addClass('mega-hover');
				if(defaults.effect == 'fade'){
					$(subNav).fadeIn(defaults.speed);
				}
				if(defaults.effect == 'slide'){
					$(subNav).show(defaults.speed);
				}
			}
			function megaOut(){
				var subNav = $('.sub',this);
				$(this).removeClass('mega-hover');
				$(subNav).hide();
			}
			function megaActionClose(obj){
				var subNav = $('.sub',obj);
				$(obj).removeClass('mega-hover');
				$(subNav).hide();
			}
			function megaReset(){
				$('li',$dcMegaMenuObj).removeClass('mega-hover');
				$('.sub',$dcMegaMenuObj).hide();
			}

			function megaSetup(){
				$arrow = '<span class="dc-mega-icon"></span>';
				var classParentLi = defaults.classParent+'-li';
				var menuWidth = $($dcMegaMenuObj).outerWidth(true);
				$('> li',$dcMegaMenuObj).each(function(){
					//Set Width of sub
					var mainSub = $('> ul',this);
					var primaryLink = $('> a',this);
					if($(mainSub).length > 0){
						$(primaryLink).addClass(defaults.classParent).append($arrow);
						$(mainSub).addClass('sub').wrap('<div class="sub-container" />');

						var position = $(this).position();
						parentLeft = position.left;

						if($('ul',mainSub).length > 0){
							$(this).addClass(classParentLi);
							$('.sub-container',this).addClass('mega');
							$('> li',mainSub).each(function(){
								$(this).addClass('mega-unit');
								if($('> ul',this).length){
									$(this).addClass(defaults.classSubParent);
									$('> a',this).addClass(defaults.classSubParent+'-a');
								} else {
									$(this).addClass(defaults.classSubLink);
									$('> a',this).addClass(defaults.classSubLink+'-a');
								}
							});

							// Create Rows
							var hdrs = $('.mega-unit',this);
							rowSize = parseInt(defaults.rowItems);
							for(var i = 0; i < hdrs.length; i+=rowSize){
								hdrs.slice(i, i+rowSize).wrapAll('<div class="row" />');
							}

							// Get Sub Dimensions & Set Row Height
							$(mainSub).show();

							// Get Position of Parent Item
							var parentWidth = $(this).width();
							var parentRight = parentLeft + parentWidth;

							// Check available right margin
							var marginRight = menuWidth - parentRight;

							// // Calc Width of Sub Menu
							var subWidth = $(mainSub).outerWidth(true);
							var totalWidth = $(mainSub).parent('.sub-container').outerWidth(true);
							var containerPad = totalWidth - subWidth;
							var itemWidth = $('.mega-unit',mainSub).outerWidth(true);
							var rowItems = $('.row:eq(0) .mega-unit',mainSub).length;
							var innerItemWidth = itemWidth * rowItems;
							var totalItemWidth = innerItemWidth + containerPad;

							// Set mega header height
							$('.row',this).each(function(){
								$('.mega-unit:last',this).addClass('last');
								var maxValue = undefined;
								$('.mega-unit > a',this).each(function(){
									var val = parseInt($(this).height());
									if (maxValue === undefined || maxValue < val){
										maxValue = val;
									}
								});
								$('.mega-unit > a',this).css('height',maxValue+'px');
								$(this).css('width',innerItemWidth+'px');
							});

							// // Calc Required Left Margin incl additional required for right align
							var marginLeft = (totalItemWidth - parentWidth)/2;
							if(marginRight < marginLeft){
								marginLeft = marginLeft + marginLeft - marginRight;
							}
							var subLeft = parentLeft - marginLeft;

							// If Left Position Is Negative Set To Left Margin
							if(subLeft < 0){
								$('.sub-container',this).css('left','0');
							}else if(marginRight < marginLeft){
								$('.sub-container',this).css('right','0');
							}else {
								$('.sub-container',this).css('left',parentLeft+'px').css('margin-left',-marginLeft+'px');
							}

							// Calculate Row Height
							$('.row',mainSub).each(function(){
								var rowHeight = $(this).height();
								$('.mega-unit',this).css('height',rowHeight+'px');
								$(this).parent('.row').css('height',rowHeight+'px');
							});
							$(mainSub).hide();

						} else {
							$('.sub-container',this).addClass('non-mega').css('left',parentLeft+'px');
						}
					}
				});
				// Set position of mega dropdown to bottom of main menu
				var menuHeight = $('> li > a',$dcMegaMenuObj).outerHeight(true);
				$('.sub-container',$dcMegaMenuObj).css({top: menuHeight+'px'}).css('z-index','1000');

				if(defaults.event == 'hover'){
					// HoverIntent Configuration
					var config = {
						sensitivity: 7, // number = sensitivity threshold (must be 1 or higher)
						interval: 100, // number = milliseconds for onMouseOver polling interval
						over: megaOver, // function = onMouseOver callback (REQUIRED)
						timeout: 10, // number = milliseconds delay before onMouseOut
						out: megaOut // function = onMouseOut callback (REQUIRED)
					};
					$('li',$dcMegaMenuObj).hoverIntent(config);
				}

				if(defaults.event == 'click'){

					$('body').mouseup(function(e){
						if(!$(e.target).parents('.mega-hover').length){
							megaReset();
						}
					});

					$('> li > a.'+defaults.classParent,$dcMegaMenuObj).click(function(e){
						var $parentLi = $(this).parent();
						if($parentLi.hasClass('mega-hover')){
							megaActionClose($parentLi);
						} else {
							megaAction($parentLi);
						}
						e.preventDefault();
					});
				}
			}
		});
	};
})(jQuery);