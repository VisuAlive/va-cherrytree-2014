/*!
 * VisuAlive core javascript
 * http://visualive.jp/
 * Copyright 2014, VisuAlive
*/
jQuery(function($){
	var ua = navigator.userAgent;
	$(document).foundation();

	if(ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) {
		$(window).on('load resize', function(){
			// Hide Address Bar
			setTimeout(function(){
				if(0 == document.body.scrollTop)
					window.scrollTo(0, 1)
			}, 100)
		});
	}
});
