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
            <div class="col-sm-3"></div>
            <div class="col-sm-2 footer-link">
                <a href="/terms-and-conditions">Terms and Conditions</a>
            </div>
            <div class="col-sm-2 footer-link">
                <a href="/privacy-policy">Privacy Policy</a>
            </div>
            <div class="col-sm-2 footer-link">
                <span>&copy; <?php echo get_bloginfo( 'name' ) . ' ' . get_the_date( 'Y' ); ?></span>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    <?php
}