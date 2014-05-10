/**!
 * VisuAlive core javascript
 * http://visualive.jp/
 * Copyright 2014, VisuAlive
*/

jQuery(function($){
	var ua          = navigator.userAgent,
		touch       = Modernizr.touch,
		parallax    = $('.img-holder'),
		parallax2   = $('.parallax'),
		standalone  = window.navigator.standalone,
		aTags       = $('a'),
		tableTag    = $('.entry-body table'),
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
	if (parallax.length > 0 || parallax2.length > 0) {
		if (parallax.length > 0) {
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
		if (parallax2.length > 0) {
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

	if (tableTag.length > 0) {
		tableTag.wrap('<div class="table-responsive" data-pattern="priority-columns"></div>').addClass("table table-complex");
		tableTag.responsiveTable({
			adddisplayallbtn: true,
			addfocusbtn: false,
			fixednavbar: '#navbar'//In case you have a fixed navbar.
		});
	}

	if (insta.length > 0) {
		insta.addClass("small-block-grid-3");
	}
});
/**
 * グローバルナビをページトップに固定
 * @link
 */
 (function($) {
	$.fn.fixedBox = function(options) {
		// options = $.extend({
		// 	''
		// }, options);
		var myThis     = $(this),
		    myWindow   = $(window),
		    thisHeight = myThis.height(),
		    isTouch    = ('ontouchstart' in window),
		    myTop;

		myWindow.on('scroll touchmove touchstart', function () {
			myTop = (myWindow.scrollTop() > 0) ? myWindow.scrollTop() : 0;

			myThis.css({'position':'relative', 'top':myTop, 'z-index':'10'});
		});
	};
	// $('.cbp-af-header').fixedBox();
})(jQuery);
