/**!
 * VisuAlive core javascript
 * http://visualive.jp/
 * Copyright KUCKLU, VisuAlive
 */


/**
 * アプリケーションキャッシュの制御
 * 
 * @link
 */
window.addEventListener('load', function() {
	var appCache = window.applicationCache;

	appCache.addEventListener('updateready', function(evt) {
		if (appCache.status == appCache.UPDATEREADY) {
			appCache.swapCache();
			window.location.reload();
		}
	}, false);

	if (navigator.onLine && appCache.status != appCache.UNCACHED) {
		try {
			appCache.update();
		} catch(e) {}
	}
}, false);


/**
 * 画面のロード
 * 
 * @link
 */
jQuery(function($){
	$('#goTop').goToTop();
	$('#loader-wrap').fadeOut();
	$(document).hideAddressBar();
});


/**
 * Androidの場合、スクロールバーを隠す
 * 
 * @link
 */
(function($){
	$.fn.hideAddressBar = function(options) {
		// options = $.extend({
		//
		// }, options);
		var ua = navigator.userAgent;

		if(ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0) {
			// $(window).on('load', function() {
			// 	setTimeout(scrollBy, 100, 0, 1);
			// });
			$(window).on('load resize', function(){
				// Hide Address Bar
				setTimeout(function(){
					if(0 == document.body.scrollTop)
						window.scrollBy(0, 1)
				}, 100)
			});
		}
	};
})(jQuery);


/**
 * ページトップへ戻る
 * @link http://www.webdlab.com/jquery/fixedbtn-2/
 */
(function($) {
	$.fn.goToTop = function() {
		var myThis  = $(this),
			bodyTag = $('body');

		//ボタン表示スクリプト
		$(window).scroll(function() {
			if (bodyTag.scrollTop() > 100) {
				myThis.fadeIn();
			} else {
				myThis.fadeOut();
			}
		});

		//移動するスクリプト
		myThis.click(function() {
			var speed    = 400,
				href     = myThis.attr("href"),
				target   = $(href == "#" || href == "" ? 'html' : href),
				position = target.offset().top + 1;

			$('body,html').animate({scrollTop:position}, speed, 'swing');

			return false;
		});
	};
})(jQuery);
