<?php


/**
 .o88b.  .d88b.  d8b   db d88888b d888888b  d888b  
d8P  Y8 .8P  Y8. 888o  88 88'       `88'   88' Y8b 
8P      88    88 88V8o 88 88ooo      88    88      
8b      88    88 88 V8o88 88~~~      88    88  ooo 
Y8b  d8 `8b  d8' 88  V888 88        .88.   88. ~8~ 
 `Y88P'  `Y88P'  VP   V8P YP      Y888888P  Y888P  
*/

// What post categories should be displayed as the horizontal list in the homepage, before the Latest Articles
// Type in the category slug (what you see in the URL)
define('JAN14_FEATURED_CATEGORY', 'alignment');

// The external page shows another website inside of it (iframe), it can be anything you want, 
// I use it to show my Behance portfolio, you can even have your twitter profile or a Google Map
define('JAN14_EXTERNAL_PAGE', 'http://www.behance.net/xaviesteve');

// Shows in the contact page
define('JAN14_CONTACT_EMAIL_ADDRESS', '');

define('JAN14_TWITTER_ACCOUNT', 'xaviesteve');

// This is the image thumbnail quality, recommended between 80 and 90
define('JAN14_TIMTHUMB_QUALITY', 85);




// ------------------ STOP EDITING ------------------


function jan14_register_my_menus() {
	register_nav_menus(
		array(
			'header-main' => __( 'Header Menu' ),
			'footer-column-title-links' => __( 'Footer Title links' ),
			'footer-column-links' => __( 'Footer links' ),
			'footer-bottom-right-links' => __( 'Footer bottom right' )
		)
	);
}
add_action( 'init', 'jan14_register_my_menus' );


// Get URL of first image in a post
function jan14_catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];

	if(empty($first_img)){
		$first_img = get_bloginfo('template_url').'/static/back.jpg';
	}
	return $first_img;
}


