<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );
?>
<form id="coupon_form" name="coupon_form" class="checkout_coupon" method="post"></form>
<?php

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
    echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
    return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
    <?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

        <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

        <div class="col2-set" id="customer_details">
            <div class="col-1">
                <?php do_action( 'woocommerce_checkout_billing' ); ?>
            </div>

            <div style="display:none;" class="col-2">
                <?php do_action( 'woocommerce_checkout_shipping' ); ?>
            </div>
<!--            <div class="form-row place-order">-->
<!--                <noscript>Since your browser does not support JavaScript, or it is disabled, please ensure you click the &amp;lt;em&amp;gt;Update Totals&amp;lt;/em&amp;gt; button before placing your order. You may be charged more than the amount stated above if you fail to do so.&amp;lt;br/&amp;gt;&amp;lt;input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" /&amp;gt;</noscript>-->
<!--                <input type="hidden" id="_wpnonce" name="_wpnonce" value="c82a4af261"><input type="hidden" name="_wp_http_referer" value="/woocommerce2/wp-admin/admin-ajax.php">-->
<!--                <input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Buy Now" data-value="Place order">-->
<!--            </div>-->
        </div>

        <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

    <?php endif; ?>

<!--    <h3 id="order_review_heading">--><?php //_e( 'Your order', 'woocommerce' ); ?><!--</h3>-->
    <div id="checkout_container">
        <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
        <div id="order_review" class="woocommerce-checkout-review-order">
            <?php do_action( 'woocommerce_checkout_order_review' ); ?>

            <p class="form-row form-row-first coupon-form">
                <input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Enter Coupon', 'woocommerce' ); ?>" id="coupon_code" value="" form="coupon_form"/>
            </p>
            <p class="form-row form-row-last coupon-form">
                <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Submit', 'woocommerce' ); ?>" form="coupon_form"/>
            </p>

        </div>
        <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
    </div>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
