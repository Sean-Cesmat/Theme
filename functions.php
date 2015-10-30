<?php

$curr_theme = get_theme_data(TEMPLATEPATH . '/style.css');
$theme_version = trim($curr_theme['Version']);
if(!$theme_version) $theme_version = "1.0";


//Define constants:
define('BRANKIC_INCLUDES', TEMPLATEPATH . '/includes/');
define('BRANKIC_THEME', 'BigBang WP Template');
define('BRANKIC_THEME_SHORT', 'BigBangWP');
define('BRANKIC_ROOT', get_template_directory_uri());
define('BRANKIC_VAR_PREFIX', 'bigbangwp_'); 


require_once (BRANKIC_INCLUDES . 'bra_theme_functions.php');
require_once (BRANKIC_INCLUDES . 'bra_shortcodes.php'); 
require_once (BRANKIC_INCLUDES . 'bra_pagenavi.php'); 
require_once (BRANKIC_INCLUDES . 'ambrosite-post-link-plus.php');

//Load admin specific files:
if (is_admin()) :
require_once (BRANKIC_INCLUDES . 'bra_admin_functions.php');
require_once (BRANKIC_INCLUDES . 'bra_custom_fields.php'); 
require_once (BRANKIC_INCLUDES . 'bra_admin_1.php');
require_once (BRANKIC_INCLUDES . 'bra_admin_2.php'); 
require_once (BRANKIC_INCLUDES . 'bra_admin_3.php');
endif;




add_theme_support('post-thumbnails');

add_theme_support( 'menus' );

    
load_theme_textdomain( BRANKIC_THEME_SHORT, TEMPLATEPATH . '/languages' );

// Load external file to add support for MultiPostThumbnails. Allows you to set more than one "feature image" per post.
require_once('includes/multi-post-thumbnails.php');



// Define additional "post thumbnails". Relies on MultiPostThumbnails to work
if (class_exists('MultiPostThumbnails')) 
{ 
    $extra_images_no = get_option(BRANKIC_VAR_PREFIX."extra_images_no");
    if ($extra_images_no == "") $extra_images_no = 20;    
    for ($i = 1 ; $i <= $extra_images_no ; $i++) 
    {
        new MultiPostThumbnails(array( 'label' => "Extra Image $i", 'id' => "extra-image-$i", 'post_type' => 'page' ) );
        new MultiPostThumbnails(array( 'label' => "Extra Image $i", 'id' => "extra-image-$i", 'post_type' => 'post' ) );
        new MultiPostThumbnails(array( 'label' => "Extra Image $i", 'id' => "extra-image-$i", 'post_type' => 'portfolio_item' ) );
    }
}

// WooCommerce
add_action('wp', create_function("", "if (is_archive(array('product'))) remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);") );

add_action('wp', create_function("", "if (is_singular(array('product'))) remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);") );

remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);




remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);



add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
	
}



add_filter('woocommerce_variable_price_html', 'custom_variation_price', 10, 2);
 
function custom_variation_price( $price, $product ) {
     
     $price = '';
 
     if ( !$product->min_variation_price || $product->min_variation_price !== $product->max_variation_price ) $price .= '<span class="from">' . _x('From', 'min_price', 'woocommerce') . ' </span>';
			
     $price .= woocommerce_price($product->get_price());
			
     if ( $product->max_variation_price && $product->max_variation_price !== $product->min_variation_price ) {
          $price .= '<span class="to"> ' . _x('to', 'max_price', 'woocommerce') . ' </span>';
 
          $price .= woocommerce_price($product->max_variation_price);
     }
 
     return $price;
}


add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


/*---------------- Custom Login Logo ----------------*/
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/images/site-login-logo.png);
            padding-bottom: 5px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );




?>