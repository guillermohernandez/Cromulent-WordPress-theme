<?php
/**
 * cromulent enqueue scripts
 *
 * @package cromulent
 */

if ( ! function_exists( 'cromulent_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function cromulent_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'cromulent-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'cromulent-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'cromulent_scripts' ).

add_action( 'wp_enqueue_scripts', 'cromulent_scripts' );

// Load Contact Form 7 on contact page only
function cromulent_dequeue_scripts() {

    $load_scripts = false;

    if( is_singular() ) {
    	$post = get_post();

    	if( has_shortcode($post->post_content, 'contact-form-7') ) {
        	$load_scripts = true;
    	}

    }

    if( ! $load_scripts ) {
        wp_dequeue_script( 'contact-form-7' );
        wp_dequeue_style( 'contact-form-7' );
    }

}

add_action( 'wp_enqueue_scripts', 'cromulent_dequeue_scripts', 99 );

//load google fonts

function cromulent_google_fonts() {
	wp_register_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Raleway:800');
	wp_enqueue_style( 'google-fonts');
	}
add_action('wp_enqueue_scripts', 'cromulent_google_fonts');


// Remove WP Embed
function cromulent_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'cromulent_deregister_scripts' );

//Remove WP Emojis

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
