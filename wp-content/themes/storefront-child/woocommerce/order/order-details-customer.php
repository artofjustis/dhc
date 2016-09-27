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
    


     <script>
         <?php global $woocommerce;
         
         global $woocommerce;
         $customer_data = $woocommerce;
         $order_amount = $order->get_total();
//         print_r($customer_data);
         $user_id = get_current_user_id();
//         print_r(get_userdata($user_id)->data);
         $user_email = get_userdata($user_id)->data->user_email;
         $user_id = get_userdata($user_id)->data->ID;
         $display_name = get_userdata($user_id)->data->display_name;

         ?>
      window['friendbuy'] = window['friendbuy'] || [];
      window['friendbuy'].push(['site', 'site-fd4db2cf-www.doggyhealthclub.com']);
      window['friendbuy'].push(['track', 'customer',
          {
              id: '<?php echo $user_id; ?>', //INSERT CUSTOMER ID PARAMETER
              email: '<?php echo $user_email; ?>', //INSERT CUSTOMER EMAIL PARAMETER
              first_name: '<?php echo $display_name; ?>', //INSERT CUSTOMER FIRST NAME PARAMETER
              //last_name: 'test last name' //INSERT CUSTOMER LAST NAME PARAMETER
          }
      ]);
      (function (f, r, n, d, b, y) {
          b = f.createElement(r), y = f.getElementsByTagName(r)[0];b.async = 1;b.src = n;y.parentNode.insertBefore(b, y);
      })(document, 'script', '//djnf6e5yyirys.cloudfront.net/js/friendbuy.min.js');
  </script>
            
<script>
    window['friendbuy'] = window['friendbuy'] || [];
    window['friendbuy'].push(['widget', "cNB-iKV"]);
</script>
<div class="friendbuy-cNB-iKV"></div>

 <script>
            window['friendbuy'] = window['friendbuy'] || [];
            window['friendbuy'].push(['track', 'order',
              {
                  id: '<?php echo $user_id; ?>', //INPUT ORDER ID
                  amount: '<?php echo $order_amount; ?>', //INPUT ORDER AMOUNT
                  //new_customer: false, //OPTIONAL, true if this is the customer's first purchase
                  email: '<?php echo $user_email; ?>' //INPUT EMAIL
              }
            ]);
        </script>



	<!--<h2 class="text-center">Invite And Save</h2>
	<p class="text-center">
		Earn $5 off for each friend who joins the club.
	</p>

	<div class="col-xs-12">
		<div class="col-xs-4 text-center">
			<img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/email-checkout-logo.png" />
		</div>
		<div class="col-xs-4 text-center">
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php //echo urlencode(site_url()); ?>"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/fb-checkout-logo.png" /></a>
		</div>
		<div class="col-xs-4 text-center">
			<a href="https://twitter.com/home?status=Doggy%20Health%20Club"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/twitter-checkout-logo.png" /></a>
		</div>
		<div class="col-xs-12">
			<form name="refer-email" method="#" action="#">
				<input type="text" name="friends-emails" class="col-xs-12" placeholder="Enter friends’ emails (10 max)" />
				<div class="col-xs-12">Your unique link will be included in the referral email.</div>
				<div class="col-xs-12 text-center"><button class="green-button col-xs-8">Send</button></div>
			</form>
		</div>
	</div>

	<div class="col-xs-12 text-center">
		Share your link and let your friends know they save $5 when they join Doggy Health Club.
	</div>-->

	<!--<img id="refer_a_friend" src="<?php //echo site_url(); ?>/wp-content/themes/storefront-child/images/refer-a-friend.png">-->
</div>
