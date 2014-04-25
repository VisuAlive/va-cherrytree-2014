/**!
 * VisuAlive core javascript
 * http://visualive.jp/
 * Copyright 2014, VisuAlive
*/
jQuery(function($){
	var ua = navigator.userAgent,
		touch = Modernizr.touch;
	$(document).foundation();

	// パララックス画像
	$('.img-holder').imageScroll({
		imageAttribute: (touch === true) ? 'image-mobile' : 'image',
		touch: touch
	});

	//画面のロード
	$(window).load(function(){
		$('#goTop').goToTop();
		$('.loader-wrap').fadeOut();
		setTimeout(scrollBy, 100, 0, 1);
	});

	// Androidの場合、スクロールバーを隠す
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
/**
 * ページトップへ戻る
 * @link http://www.webdlab.com/jquery/fixedbtn-2/
 */
(function($) {
	$.fn.goToTop = function() {
		var myThis = $(this);
		//ボタン表示スクリプト
		$(window).scroll(function() {
			if ($('body').scrollTop() > 100) {
				myThis.fadeIn();
			} else {
				myThis.fadeOut();
			}
		});

		//移動するスクリプト
		myThis.click(function() {
			var speed    = 400;
			var href     = myThis.attr("href");
			var target   = $(href == "#" || href == "" ? 'html' : href);
			var position = target.offset().top + 1;

			$('body,html').animate({scrollTop:position}, speed, 'swing');

			return false;
		});
	}
})(jQuery);
