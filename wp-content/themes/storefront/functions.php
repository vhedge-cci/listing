<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */


add_action('woocommerce_after_shop_loop_item','cmk_additional_button');
function cmk_additional_button() {
	// get the current post/product ID
    $current_product_id = get_the_ID();

    // get the product based on the ID
    $product = wc_get_product( $current_product_id );

    
	echo '<button type="submit" class="button alt sendquery" data-product-id="'.$current_product_id.'">Send Query</button>';
}

// function dac_add_cart_button () {
//     add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10 );
// }
// add_action( 'after_setup_theme', 'dac_add_cart_button' );

//sendQuery
function sendQuery(){
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // exit();
    if(isset($_POST) && !empty($_POST)){
        $date = date('Y-m-d h:m:s');
        if(!empty($_POST['productId'])){
            global $wpdb;
            $insert_data = array(
                    'id' => '',
                    'product_id' => $_POST['productId'],
                    'question' => $_POST['question'],
                    'date_time_added' => $date
                );
                $wpdb->insert('query_reported', $insert_data);
                $new_id = $wpdb->insert_id;
                echo $new_id;
        }
    } 
}
add_action('wp_ajax_sendQuery', 'sendQuery');
add_action('wp_ajax_nopriv_sendQuery', 'sendQuery');