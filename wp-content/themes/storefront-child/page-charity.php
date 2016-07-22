<?php
/* Template Name: Charity Page */

get_header('front-page-template'); ?>

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
		       The Human Society of USA is and organization that aims to 
		       protect all animals.  Their most important goal is to 
		       prevent animals from getting into situations of distress 
		       in the first place. They confront the largest national and 
		       international problems facing animals, which local shelters 
		       don't have the reach or the resources to take on.

                       With each Doggy Health Club Box purchase, a portion of the 
		       proceeds goes toward our donations.  With every donation, we 
		       are investing in the HSUS lifesaving animal protection 
		       programs, contributing to the financial foundation that 
		       enables HSUS to mobilize quickly so in efforts to rescue 
		       animals from dire situations like puppy mills, animal 
		       fighting rings and disasters when needed.

                       For more information about HUSU click here.
		    </p>
		</div>
	    </div>
	</div>
    </section>
    
    <section class="padSection">
        <div class="container">
	    <div class="row text-center">
	        <div class="col-sm-12">
		    <h3 class="text-uppercase">Join the Club</h3>
		    <div class="center-block dhc-join-wrap">
		        <button class="dhc-button" style="margin:10px 5px;"><i class="icon-paw"></i> Get A Box</button> <button class="dhc-button" style="margin:10px 5px;"><i class="icon-gift"></i> Gift A Box</button>
		    </div>
		</div>
	    </div>
	</div>
    </section>

    <div class="container">
        <div class="border-dots"></div>
    </div>
    
 </div>
    
   <!-- end custom content -->

    <!-- Default Storefront Content -->
  <div class="container">
    <div id="primary">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post();

                do_action( 'storefront_page_before' );

                get_template_part( 'content', 'page' );

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
