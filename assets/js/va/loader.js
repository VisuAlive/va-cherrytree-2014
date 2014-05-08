//画面のロード
jQuery(window).load(function(){
	jQuery('#goTop').goToTop();
	jQuery('#loader-wrap').fadeOut();
	setTimeout(scrollBy, 100, 0, 1);
});
