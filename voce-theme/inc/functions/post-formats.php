<?php
if (1 == voce_has_postformats_on()){
	if ( ! function_exists('voce_add_postformats')){
	// voce_add_postformats() BEGINS here - This declares which post formats will be used with the Voce Theme
		function voce_add_postformats(){
			add_theme_support( 'post-formats', array( 'aside', 'quote', 'status') );
		}
	// voce_add_postformats() ENDS here
	}
	add_action( 'after_setup_theme', 'voce_add_postformats', 11 );
}