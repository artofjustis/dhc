<?php

function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
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