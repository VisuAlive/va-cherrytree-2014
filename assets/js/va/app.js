/**!
 * VisuAlive core javascript
 * http://visualive.jp/
 * Copyright 2014, VisuAlive
*/
// function preloader(){
// 	document.getElementById("loader-wrap").style.display = "none";
// 	document.getElementById("content").style.display = "block";
// }//preloader
// window.onload = preloader;

jQuery(function($){
	var ua         = navigator.userAgent,
		touch      = Modernizr.touch,
		parallax   = $('.img-holder'),
		standalone = window.navigator.standalone,
		aTags      = $('a');
	$(document).foundation();

	// パララックス画像
	if (parallax.length >= 1) {
		$('.img-holder').imageScroll({
			imageAttribute: (touch === true) ? 'image-mobile' : 'image',
			touch: touch,
			// coverRatio: 0.6,
			mediaWidth: 1280,
			mediaHeight: 753
		});
	} else {
		$('body').addClass('not_parallax');
	}

	//画面のロード
	$(window).load(function(){
		$('#goTop').goToTop();
		$('#loader-wrap').fadeOut();
		setTimeout(scrollBy, 100, 0, 1);
	});

	// スタンドアローンモードの場合の制御
	if (standalone) {
		aTags.each(function(){
			var url = $(this).attr('href');

			if (url !== '#' && url !== '#wrap' && typeof url !== "undefined") {
				//念のため、href属性は削除
				$(this).removeAttr('href');
				//クリックイベントをバインド
				$(this).click(function(){
					location.href = url;
					return false;
				});
			}
		});
	}

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
