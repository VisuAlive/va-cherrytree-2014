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
	var ua          = navigator.userAgent,
		touch       = Modernizr.touch,
		parallax    = $('.img-holder'),
		parallax2   = $('.parallax'),
		standalone  = window.navigator.standalone,
		aTags       = $('a'),
		tableTag    = $('table'),
		insta       = $('.si_feed_list');
	$(document).foundation();

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

	// パララックス画像
	if (parallax.length >= 1 || parallax2.length >= 1) {
		if (parallax.length >= 1) {
			$('.img-holder').imageScroll({
				imageAttribute: (touch === true) ? 'image-mobile' : 'image',
				touch: touch,
				// coverRatio: 0.6,
				mediaWidth: 1280,
				mediaHeight: 753
			});
			var imgHolderHight = $('.imageHolder').height();
			$('.imageHolder .small-12').css('height',imgHolderHight);
		}
		if (parallax2.length >= 1) {
			if (Modernizr.touch){
				$('.parallax').css('background-attachment', 'scroll');
				$('.parallax').removeAttr('data-stellar-background-ratio');
			} else {
				$.stellar({
					horizontalScrolling: false,
					verticalOffset: 40
				});
			}
		}
	} else {
		$('body').addClass('not_parallax');
	}

	// table tag レスポンシブ対応
	if (tableTag.length >= 1) {
		tableTag.wrap('<div class="table-responsive"></div>').addClass("table table-complex");
		tableTag.responsiveTable({
			adddisplayallbtn: true,
			addfocusbtn: false,
			fixednavbar: '#navbar'//In case you have a fixed navbar.
		});
	}

	if (insta.length >= 1) {
		insta.addClass("small-block-grid-3");
	}
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
	}
})(jQuery);
