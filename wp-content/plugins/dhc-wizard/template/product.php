<?php
/**
 * The template for displaying a DHC Product
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$plugin = \DHC\Plugin::instance();

wp_enqueue_script( 'jquery-steps' );
wp_enqueue_script( 'jquery-wait' );
wp_enqueue_script( 'dhc-plugin' );
wp_enqueue_style( 'jquery-steps-css', $plugin->fileUrl( 'css/jquery.steps.css' ) );
wp_enqueue_style( 'jquery-wait-css', $plugin->fileUrl( 'css/jquery.wait.min.css' ) );
wp_enqueue_style( 'bootstrap-grid', $plugin->fileUrl( 'css/bootstrap.css' ) );
wp_enqueue_style( 'dhc-custom-css', $plugin->fileUrl( 'css/custom.css' ) );

/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
 do_action( 'woocommerce_before_single_product' );

 if ( post_password_required() ) {
	echo get_the_password_form();
	return;
 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div id="dhc-wizard-container" class="dhc-wizard" style="visibility:hidden">
    
        <h3>Size</h3>
        <section>
	    <div class="container option-group">
	        <div class="row">
		    <div class="col-md-4">
		        <img 
			  data-attribute="0" data-option="1" data-action="next" data-role="option-button"
			  class="img-responsive img-circle img-option-button" 
			  src="<?php echo $plugin->fileUrl( 'img/dhc-box-size-small.png' ); ?>" 
			  />
		    </div>
		    <div class="col-md-4">
		        <img 
			  data-attribute="0" data-option="2" data-action="next" data-role="option-button"
			  class="img-responsive img-circle img-option-button" 
			  src="<?php echo $plugin->fileUrl( 'img/dhc-box-size-medium.png' ); ?>" 
			  />
		    </div>
		    <div class="col-md-4">
		        <img 
			  data-attribute="0" data-option="3" data-action="next" data-role="option-button"
			  class="img-responsive img-circle img-option-button" 
			  src="<?php echo $plugin->fileUrl( 'img/dhc-box-size-large.png' ); ?>" 
			  />
		    </div>
		</div>
	    </div>
        </section>
        <h3>Personality</h3>
        <section>
	    <div class="container option-group">
	        <div class="row">
		    <div class="col-md-4">
		        <img 
			  data-attribute="1" data-option="1" data-action="next" data-role="option-button"
			  data-hide="upgrade-wild,upgrade-old,upgrade-bullystick" data-show="upgrade-calm"
			  class="img-responsive img-circle img-option-button" 
			  src="<?php echo $plugin->fileUrl( 'img/dhc-box-personality-cool.png' ); ?>" 
			  />
		    </div>
		    <div class="col-md-4">
		        <img 
			  data-attribute="1" data-option="2" data-action="next" data-role="option-button"
			  data-hide="upgrade-calm,upgrade-old,upgrade-bullystick" data-show="upgrade-wild"
			  class="img-responsive img-circle img-option-button" 
			  src="<?php echo $plugin->fileUrl( 'img/dhc-box-personality-wild.png' ); ?>" 
			  />
		    </div>
		    <div class="col-md-4">
		        <img 
			  data-attribute="1" data-option="3" data-action="next" data-role="option-button"
			  data-hide="upgrade-calm,upgrade-wild,upgrade-bullystick" data-show="upgrade-old"
			  class="img-responsive img-circle img-option-button" 
			  src="<?php echo $plugin->fileUrl( 'img/dhc-box-personality-mellow.png' ); ?>" 
			  />
		    </div>
		</div>
	    </div>
        </section>
        <h3>Upgrades</h3>
        <section>
	    <div class="option-group">
              <div class="container" id="upgrade-calm">
	        <div class="row">
		    <div class="col-md-6 upgrade-image">
		        <img src="<?php echo $plugin->fileUrl( 'img/dhc-upgrade-calm.png' ); ?>" />
		    </div>
		    <div class="col-md-6 upgrade-box">
	                <h4>Have a lazy pup?</h4>
			<p>Keep 'em moving with an extra, premium toy in each month's box for just $7.99</p>
			<div class="container">
			    <div class="row">
			        <div class="col-sm-6"><button data-role="option-button" data-attribute="2" data-option="2" data-hide="upgrade-calm" data-show="upgrade-bullystick">Please Add</button></div>
				<div class="col-sm-6"><button data-role="option-button" data-attribute="2" data-option="1" data-hide="upgrade-calm" data-show="upgrade-bullystick">No Thanks</button></div>
			    </div>
			</div>
		    </div>
		</div>
	      </div>
              <div class="container" id="upgrade-wild">
	        <div class="row">
		    <div class="col-md-6 upgrade-image">
		        <img src="<?php echo $plugin->fileUrl( 'img/dhc-upgrade-wild.png' ); ?>" />
		    </div>
		    <div class="col-md-6 upgrade-box">
	                <h4>Have a wild pup?</h4>
			<p>Keep 'em playing with an extra, premium toy in each month's box for just $7.99</p>
			<div class="container">
			    <div class="row">
			        <div class="col-sm-6"><button data-role="option-button" data-attribute="2" data-option="2" data-hide="upgrade-wild" data-show="upgrade-bullystick">Please Add</button></div>
				<div class="col-sm-6"><button data-role="option-button" data-attribute="2" data-option="1" data-hide="upgrade-wild" data-show="upgrade-bullystick">No Thanks</button></div>
			    </div>
			</div>
		    </div>
		</div>
	      </div>
              <div class="container" id="upgrade-old">
	        <div class="row">
		    <div class="col-md-6 upgrade-image">
		        <img src="<?php echo $plugin->fileUrl( 'img/dhc-upgrade-old.png' ); ?>" />
		    </div>
		    <div class="col-md-6 upgrade-box">
	                <h4>Have a wise senior pup?</h4>
			<p>Keep 'em playing like a puppy with an extra, premium toy in each month's box for just $7.99</p>
			<div class="container">
			    <div class="row">
			        <div class="col-sm-6"><button data-role="option-button" data-attribute="2" data-option="2" data-hide="upgrade-old" data-show="upgrade-bullystick">Please Add</button></div>
				<div class="col-sm-6"><button data-role="option-button" data-attribute="2" data-option="1" data-hide="upgrade-old" data-show="upgrade-bullystick">No Thanks</button></div>
			    </div>
			</div>
		    </div>
		</div>
	      </div>
	    </div>
            <div class="container option-group" id="upgrade-bullystick">
	        <div class="row">
		    <div class="col-md-6 upgrade-image">
		        <img src="<?php echo $plugin->fileUrl( 'img/dhc-upgrade-bullystick.png' ); ?>" />
		    </div>
		    <div class="col-md-6 upgrade-box">
	                <h4>Who's a good doggy?</h4>
			<p>Treat your pup with an extra bully stick.</p>
			<div class="container">
			    <div class="row">
			        <div class="col-sm-6">
				    <img src="<?php echo $plugin->fileUrl( 'img/dhc-upgrade-bullystick-sm.png' ); ?>" />
				    <p>Small</p>
				    <button data-role="option-button" data-attribute="3" data-option="2" data-action="next">add $6.99</button>
				</div>
				<div class="col-sm-6">
				    <img src="<?php echo $plugin->fileUrl( 'img/dhc-upgrade-bullystick-md.png' ); ?>" />
				    <p>Medium/Large</p>
				    <button data-role="option-button" data-attribute="3" data-option="3" data-action="next">add $9.99</button>
				</div>
			    </div>
			    <div class="row">
			        <div class="col-sm-12">
				    <hr>
				    <button data-role="option-button" data-attribute="3" data-option="1" data-action="next">No Thanks</button>
				</div>
			    </div>
			</div>
		    </div>
		</div>
	    </div>
        </section>
	<h3>Checkout</h3>
	<section>
	   <div class="container">
	        <div class="row">
	            <div class="col-sm-12" style="text-align:center">
		        <h4>You're good to go!</h4>
			<p>Click the button to checkout.</p>
			<button data-role="option-button" data-action="submit">Checkout</button>
		    </div>
	        </div>
	    </div>
	</section>
	
    </div>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		//do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div style="display:none" class="summary entry-summary product-form-container">
		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		//do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
