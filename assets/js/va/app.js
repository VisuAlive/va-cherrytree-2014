/**!
 * VisuAlive core javascript
 * http://visualive.jp/
 * Copyright KUCKLU, VisuAlive
 */


jQuery(function($){
	$(document).foundation();
	$(document).standaloneMode();
	$(document).parallaxBox();
	$(document).masonryBox();
	$('.entry-body table').respondTable();

	var insta = $('.si_feed_list');
	if (insta.length > 0) {
		insta.addClass("small-block-grid-3");
	}
});


/**
 * スタンドアローンモード時のアンカーの動作
 * 
 * @link
 */
(function($){
	$.fn.standaloneMode = function(options) {
		// options = $.extend({
		//
		// }, options);
		var standalone = window.navigator.standalone;

		if (standalone) {
			$('a').each(function(){
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
	};
})(jQuery);


/**
 * パララックス
 * 
 * @link
 */
(function($){
	$.fn.parallaxBox = function(options) {
		// options = $.extend({
		//
		// }, options);
		var touch          = Modernizr.touch,
		    imgHolder      = $('.img-holder'),
		    parallax       = $('.parallax');

		if (imgHolder.length > 0 || parallax.length > 0) {
			if (imgHolder.length > 0) {
				imgHolder.imageScroll({
					imageAttribute: (touch === true) ? 'image-mobile' : 'image',
					touch: touch,
					// coverRatio: 0.6,
					mediaWidth: 1280,
					mediaHeight: 753
				});
				$('.imageHolder .small-12').css('height', $('.imageHolder').height());
			}
			if (parallax.length > 0) {
				if (Modernizr.touch){
					parallax.css('background-attachment', 'scroll');
					parallax.removeAttr('data-stellar-background-ratio');
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
	};
})(jQuery);


/**
 * Tableをレスポンシブに対応
 * 要FooTable.js
 * @link
 */
(function($){
	$.fn.respondTable = function(options) {
		// options = $.extend({
		// 	'library': undefined
		// }, options);
		var myThis = $(this);

		if (myThis.length > 0) {
			var trCount  = myThis.children('tbody').children('tr').length,
			    tdCount  = myThis.children('tbody').children('tr').children('td').length,
			    addCount = tdCount / trCount;

			myThis.addClass('footable table').prepend('<thead style="display:none;"><tr></tr></thead>');
			for (var i = 1; i <= addCount; i++) {
				myThis.find('thead').find('tr').prepend('<th></th>');
			};
			myThis.find('thead').find('tr').each(function(){
				$(this).children('th:not(:first)').attr({'data-hide':'phone'});
			});
			myThis.footable().find('td').css('float','none');
		} else {
			console.log('Error');
		}
	};
})(jQuery);


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


/**
 * Masonry
 * @link
 */
(function($) {
	$.fn.masonryBox = function() {
		var masonry = $('#masonry');

		if (masonry.length > 0) {
			masonry.masonry({
				'itemSerector': '.post',
				'isAnimated': true
			});
		}
	};
})(jQuery);
