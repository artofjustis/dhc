<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

	<table class="shop_table customer_details">

		<?php if ( $order->billing_email ) : ?>
			<tr>
				<th><?php _e( 'A confirmation email has been sent to:', 'woocommerce' ); ?></th>
				<td><?php echo esc_html( $order->billing_email ); ?></td>
			</tr>
		<?php endif; ?>

		<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>

	</table>
	<img id="refer_a_friend" src="/wp-content/themes/storefront-child/images/refer-a-friend.png">
</div>
