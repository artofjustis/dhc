<?php

function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


// Remove search bar in header
add_action( 'init', 'jk_remove_storefront_header_search' );
function jk_remove_storefront_header_search() {
    remove_action( 'storefront_header', 'storefront_product_search', 	40 );
}
// Remove cart in header
add_action( 'init', 'jk_remove_storefront_cart' );
function jk_remove_storefront_cart() {
    remove_action( 'storefront_header', 'storefront_header_cart', 		60 );
}

function wpbootstrap_scripts_with_jquery()
{
    wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );


add_action( 'init', 'custom_remove_footer_credit', 10 );
function custom_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer', 'custom_storefront_credit', 20 );
}
function custom_storefront_credit() {
    ?>
    <div class="container footer-navigation">
        <div class="row">
            <div class="col-sm-2">
                <h4>JOIN THE CLUB</h4>
                <ul>
                    <li><a href="#">Get A Box</a></li>
                    <li><a href="#">Gift A Box</a></li>
                </ul>
            </div>
            <div class="col-sm-2 footer-link">
                <h4>HELP</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-sm-2 footer-link">
                <h4>MORE</h4>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                </ul>
            </div>
            <div class="col-sm-2 footer-link">
                <h4>ACCOUNT</h4>
                <ul>
                    <li><a href="#">Login</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h4>KEEP IN TOUCH</h4>
                <input type="email"><br>
                <input type="submit" value="Submit">
            </div>
        </div>
    </div>
    <?php
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}

add_filter('body_class', 'adjust_body_class', 20);
function adjust_body_class($wp_classes) {

    foreach($wp_classes as $key => $value) {
        if ($value == 'right-sidebar') unset($wp_classes[$key]);
    }

    return $wp_classes;
}


// Customize checkout page
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
    // Unset fields we don't need
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_email']);
    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);

    // Customize labels/placeholders for fields we're keeping
    $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
    $fields['billing']['billing_first_name']['label'] = '';
    $fields['billing']['billing_first_name']['class'] = array('form-row', 'one-half');
    $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
    $fields['billing']['billing_last_name']['label'] = '';
    $fields['billing']['billing_last_name']['class'] = array('form-row', 'one-half');
    $fields['billing']['billing_address_1']['placeholder'] = 'Street Address';
    $fields['billing']['billing_address_1']['label'] = '';
    $fields['billing']['billing_address_1']['class'] = array('form-row, two-thirds');
    $fields['billing']['billing_address_1']['clear'] = false;
    $fields['billing']['billing_address_2']['placeholder'] = 'Apt/Ste';
    $fields['billing']['billing_address_2']['class'] = array('form-row-last');
    $fields['billing']['billing_city']['placeholder'] = 'City';
    $fields['billing']['billing_city']['label'] = '';
    $fields['billing']['billing_city']['class'] = array('form-row');
    $fields['billing']['billing_city']['clear'] = false;
    $fields['billing']['billing_state']['placeholder'] = 'State';
    $fields['billing']['billing_state']['label'] = '';
    $fields['billing']['billing_state']['type'] = 'text';
    $fields['billing']['billing_state']['class'] = array('form-row');
    $fields['billing']['billing_state']['clear'] = false;
    $fields['billing']['billing_postcode']['placeholder'] = 'Zip';
    $fields['billing']['billing_postcode']['label'] = '';
    $fields['billing']['billing_postcode']['class'] = array('form-row');

    // Add custom fields to billing form
    $fields['billing']['doggy_name'] = array(
        'label'     => __('', 'woocommerce'),
        'placeholder'   => _x('Doggy\'s Name', 'placeholder', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row', 'one-half'),
        'clear'     => false
    );
    $fields['billing']['birthday'] = array(
        'label'     => __('', 'woocommerce'),
        'placeholder'   => _x('Birthday/Adoption Day', 'placeholder', 'woocommerce'),
        'required'  => false,
        'class'     => array('form-row', 'one-half'),
        'clear'     => true
    );
    return $fields;
}

// Display new field values (set above) on order edit page
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );
function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Doggy\'s Name').':</strong> ' . get_post_meta( $order->id, '_doggy_name', true ) . '</p>';
    echo '<p><strong>'.__('Birthday').':</strong> ' . get_post_meta( $order->id, '_birthday', true ) . '</p>';
}


// Re-order fields according to mockup
add_filter("woocommerce_checkout_fields", "order_fields");
function order_fields($fields) {

    $order = array(
        "billing_first_name",
        "billing_last_name",
        "doggy_name",
        "birthday",
        "billing_address_1",
        "billing_address_2",
        "billing_city",
        "billing_state",
        "billing_postcode",

    );
    foreach($order as $field)
    {
        $ordered_fields[$field] = $fields["billing"][$field];
    }

    $fields["billing"] = $ordered_fields;
    return $fields;

}

// Add image to top of order review (inside)
add_action('woocommerce_checkout_order_review', 'add_order_review_image', 1);
function add_order_review_image(){
    echo "<img src='/wp-content/themes/storefront-child/images/doggy-box-checkout.jpg'>";
}

// Add guarantee logo after order review (outside)
add_action('woocommerce_checkout_after_order_review', 'add_after_order_review_image', 1);
function add_after_order_review_image(){
    echo "<img id='img_after_order_review' src='/wp-content/themes/storefront-child/images/satisfaction-guaranteed.png'>";
    echo "<p id='text_after_order_review'>Our policy replaces any item<br>your dog doesn't love,<br>We guarantee it!</p>";
}

// Move payment options
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action('woocommerce_checkout_billing', 'woocommerce_checkout_payment', 2);
add_action('woocommerce_review_order_before_payment', 'add_title_to_payment_options', 1);
function add_title_to_payment_options(){
    echo "<div id='billing_info_div'><h3 class='checkout-heading'>Billing Info</h3>";
}
add_action('woocommerce_review_order_after_payment', 'close_div_after_payment_options', 1);
function close_div_after_payment_options(){
    echo "<p style='text-align: right; margin: 10px 0 0;'>Plans automatically renew. You may cancel any time.</p></div>";
}

// Remove coupon box from top of checkout page
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

// Change 'Place Order' Button text
add_filter( 'woocommerce_order_button_text', create_function( '', 'return "Buy Now";' ) );