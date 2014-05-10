//アプリケーションキャッシュ
window.addEventListener('load', function() {
	var appCache = window.applicationCache;

	appCache.addEventListener('updateready', function(evt) {
		if (appCache.status == appCache.UPDATEREADY) {
			appCache.swapCache();
		}
	}, false);

	if (navigator.onLine && appCache.status != appCache.UNCACHED) {
		try {
			appCache.update();
		} catch(e) {}
	}
}, false);

//画面のロード
jQuery(function($){
	$('#goTop').goToTop();
	$('#loader-wrap').fadeOut();
	setTimeout(scrollBy, 100, 0, 1);
});

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
