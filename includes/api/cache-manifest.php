<?php
header( 'Content-Type: text/cache-manifest' );
$mod   = filemtime( __FILE__ );
$date  = date_i18n( 'U', $mod );
$dir   = '..' . str_replace( home_url(), '', get_stylesheet_directory_uri() );
$files = array(
			// $dir . '/assets/css/loader.min.css',
			// $dir . '/assets/css/app.min.css',
			// $dir . '/assets/js/jquery.min.js',
			// $dir . '/assets/js/app.min.js',
			'http://www.google-analytics.com/analytics.js',
			'http://themes.googleusercontent.com/static/fonts/lato/v7/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff',
			'http://themes.googleusercontent.com/static/fonts/opensans/v8/u-WUoqrET9fUeobQW7jkRbO3LdcAZYWl9Si6vvxL-qU.woff',
			'http://themes.googleusercontent.com/static/fonts/sortsmillgoudy/v4/JzRrPKdwEnE8F1TDmDLMUtsZ51dqzBwIdH2JuTl9mv4.woff',
			'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/fonts/fontawesome-webfont.ttf?v=4.0.3',
		 );
?>
CACHE MANIFEST
#####
## Version: <?php echo $date . "\n"; ?>
#####
CACHE:
<?php
foreach ( $files as $file ) {
	echo $file . "\n";
}
?>
NETWORK:
*
<?php
// if ($handle = glob(get_stylesheet_directory() . '/*.php')) {
// 	foreach ($handle as $value) {
// 		$value = str_replace( get_stylesheet_directory(), $dir, $value);
// 		echo "$value\n";
// 	}
// }
?>
FALLBACK:
