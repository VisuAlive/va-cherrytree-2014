<?php
if( function_exists( 'bread_crumb' ) ) {
echo '<div class="row">' . "\n";
echo '<div class="small-12 columns">' . "\n";
bread_crumb( 'home_label=Home&elm_class=breadcrumbs' );
echo '</div>' . "\n";
echo '</div>' . "\n";
}
?>
