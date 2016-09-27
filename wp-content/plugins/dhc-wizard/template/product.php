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
        <div class="border-dots"></div>
        <section>
	    <div class="option-group">
        	<div class="container clearfix">
        	<h4 class="text-center">Select dog's Size</h4>
	        <div class="row member-ship-box clearfix">
		    <div class="col-md-4 text-center">
		        <img 
			  data-attribute="0" data-option="1" data-action="next" data-role="option-button"
			  class="img-responsive img-circle img-option-button" 
			  src="<?php echo $plugin->fileUrl( 'img/dhc-box-size-small.png' ); ?>" 
			  />
		    </div>
		    <div class="col-md-4 text-center">
		        <img 
			  data-attribute="0" data-option="2" data-action="next" data-role="option-button"
			  class="img-circle img-option-button" 
			  src="<?php echo $plugin->fileUrl( 'img/dhc-box-size-medium.png' ); ?>" 
			  />
		    </div>
		    <div class="col-md-4 text-center">
		        <img 
			  data-attribute="0" data-option="3" data-action="next" data-role="option-button"
			  class="img-circle img-option-button" 
			  src="<?php echo $plugin->fileUrl( 'img/dhc-box-size-large.png' ); ?>" 
			  />
		    </div>
		</div>
        <p class="text-center">Plans automatically renew. You may cancel at any time. Sales tax applies to AZ, CT, NV, NY and OH.</p>
	    </div>
        </div>
        </section>
        <h3>Personality</h3>
        <section>
	    <div class="option-group">
        	<div class="container clearfix">
        	<h4 class="text-center">Describe your dog's Personality</h4>
	        <div class="row member-ship-box clearfix">
		    <div class="col-md-4 text-center">
		        <img 
			  data-attribute="1" data-option="1" data-action="next" data-role="option-button"
			  data-hide="" data-show="upgrade-calm"
			  class="img-circle img-option-button" 
			  src="<?php echo $plugin->fileUrl( 'img/dhc-box-personality-cool.png' ); ?>" 
			  />
              <p class="text-center">Does your pup prefer to lounge? This box offers low fat organic treats and chews that easily digest. This means your pup can enjoy all the good stuff without watching his or her figure! </p>
		    </div>
		    <div class="col-md-4 text-center">
		        <img 
			  data-attribute="1" data-option="2" data-action="next" data-role="option-button"
			  data-hide="" data-show="upgrade-wild"
			  class="img-circle img-option-button" 
			  src="<?php echo $plugin->fileUrl( 'img/dhc-box-personality-wild.png' ); ?>" 
			  />
              <p class="text-center">Is your pup always on the go? This box offers our little carnivores  a high-protein diet for increased energy and recovery. Now your pup can really become a true athlete. </p>
		    </div>
		    <div class="col-md-4 text-center">
		        <img 
			  data-attribute="1" data-option="3" data-action="next" data-role="option-button"
			  data-hide="" data-show="upgrade-old"
			  class="img-circle img-option-button" 
			  src="<?php echo $plugin->fileUrl( 'img/dhc-box-personality-mellow.png' ); ?>" 
			  />
              <p class="text-center">Has your pup matured into a wise senior? This box offers our aging fur children goodies that benefit bones, joints, and teeth. Let your dog be a pup again.  </p>
		    </div>
            </div>
		</div>
	    </div>
        </section>

        <h3>Membership</h3>
        <section>
            <div class="option-group">
            	<div class="container clearfix">
                <div id="upgrade-calm">
                    <div class="upgrade-box clearfix">
                        <h4 class="text-center">Choose Your Membership</h4>
                        <div class="member-ship-box clearfix">
                            <div class="col-md-4 clearfix">
                                <div class="box-member clearfix" data-attribute="2" data-option="1" data-action="next" data-role="option-button"
                                      data-hide="" data-show="">
                                    <h3 class="text-uppercase">Basic</h3>
                                    <img class="img-responsive img-circle" 
                                      src="<?php echo $plugin->fileUrl( 'img/pak-basic.jpg' ); ?>" 
                                      />
                                      <button class="green-btn">$32 MO</button>
                                      <p>3 Bags of Treats</p>
                                      <p>1 Premium Toy</p>
                                      <p>1 Chewy</p>
                                </div>
                              
                            </div>
                            <div class="col-md-4">
                                <div class="box-member clearfix"  data-attribute="2" data-option="2" data-action="next" data-role="option-button"
                              data-hide="" data-show="" >
                                    <h3 class="text-uppercase">Gold</h3>
                                    <img class="img-responsive img-circle" 
                              src="<?php echo $plugin->fileUrl( 'img/pak-gold.jpg' ); ?>" 
                              />
                                      <button class="green-btn">Add $5</button>
                                      <p>Extra Premium Toy </p>
                                </div>
                              
                            </div>
                            <div class="col-md-4">
                                <div class="box-member clearfix" data-attribute="2" data-option="3" data-action="next" data-role="option-button"
                              data-hide="" data-show="" >
                                    <h3 class="text-uppercase">Platnium</h3>
                                    <img class="img-responsive img-circle" 
                              src="<?php echo $plugin->fileUrl( 'img/pak-platinium.jpg' ); ?>" 
                              />
                                      <button class="green-btn" data-attribute="2" data-option="3" data-action="next" data-role="option-button"
                              data-hide="" data-show="" >Add $10</button>
                                      <p>Extra Premium Toy plus a Bully Stick</p>
                                </div>
                              
                            </div>
                            </div>
                        
                    </div>
                </div>
                </div>
            </div>
        </section>

	<h3>Checkout</h3>
	<section>
	   <div class="container clearfix">
	        <div class="row">
	            <div class="col-sm-12 option-group" style="text-align:center">
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

	<div style="display:none;" class="summary entry-summary product-form-container">
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

