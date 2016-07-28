<?php
/* Template Name: Charity Page */

get_header('front-page-template');
global $post;
?>

<div id="page-charity">

    <section id="banner">
        <div class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3 class="heroTitle text-uppercase">Charity</h3>
                    </div>
                </div>
            </div>
	</div>
    </section>

    <section class="padSection">
        <div class="container">
	    <div class="row">
	        <div class="col-md-6 text-center">
		    <img style="padding: 20px 0;" class="center-block" src='<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/charity/dhc-gives-back.png' alt="DHC Gives Back" />
		</div>
		<div class="col-md-6">
		    <h3 class="text-uppercase">About The Humane Society</h3>
		    <p>
		       <?php echo get_post_field('post_content', $post->ID); ?>
		    </p>
		</div>
	    </div>
	</div>
    </section>
    
    <section class="padSection" id="join-the-club">
        <div class="container">
	    <div class="row text-center">
	        <div class="col-sm-12">
		    <h3 class="text-uppercase">Join the Club</h3>
		    <div class="center-block dhc-join-wrap">
                <a href="<?php echo site_url(); ?>/product/monthly-dhc-box/"><button class="dhc-button" style="margin:10px 5px;"><i class="icon-paw"></i> Get A Box</button></a> <button class="dhc-button" style="margin:10px 5px;"><i class="icon-gift"></i> Gift A Box</button>
		    </div>
		</div>
	    </div>
	</div>
    </section>

    <div class="border-dots"></div>
 </div>
    
   <!-- end custom content -->

    <!-- Default Storefront Content -->
  <div class="container">
    <div id="primary">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post();

                do_action( 'storefront_page_before' );

                //get_template_part( 'content', 'page' );

                /**
                 * Functions hooked in to storefront_page_after action
                 *
                 * @hooked storefront_display_comments - 10
                 */
                do_action( 'storefront_page_after' );

            endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->
  </div>
  
<?php
get_footer();
?>

<div class="social-links">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-2"><a href="#"><i class="fa fa-instagram"></i></a></div>
            <div class="col-sm-2"><a href="#"><i class="fa fa-facebook"></i></a></div>
            <div class="col-sm-2"><a href="#"><i class="fa fa-twitter"></i></a></div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</div>
