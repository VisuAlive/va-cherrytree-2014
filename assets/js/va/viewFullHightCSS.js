/**
 * viewFullHightCSS 1.0.0
 * MIT licensed
 *
 * Copyright (C) 2014 VisuAlive and KUCKLU.
 */
(function($) {
	$.fn.viewFullHightCSS = function() {
		// options = $.extend({
		// 	target: ''
		// }, options);
		var myThis = $(this),
			timer = false,
			ua = navigator.userAgent,
			addViewHight = function() {
				var h = document.documentElement.clientHeight,
					imgH = myThis.children('.parallax-images').height(),
					imgS = myThis.children('.parallax-images').attr('src');
console.log(imgS);
				if(h < imgH) {
					myThis.children('.row').css({"background":"url("+ imgS +") top", "position":"fixed", "min-height": h - 45, "height":"auto"});
					// myThis.children('parallax-images').css({"min-height": h - 45});
				} else {
					myThis.children('.row').css({"background":"url("+ imgS +") top", "position":"fixed", "min-height": imgH, "height":"auto"});
					// myThis.children('parallax-images').css({"min-height": imgH});
				}
			};

		$(window).load(function() {
			addViewHight();
		});

		$(window).resize(function() {
			if (timer !== false) {
				clearTimeout(timer);
			}
			timer = setTimeout(function() {
				addViewHight();
			}, 200);
		});
	}
})(jQuery);
