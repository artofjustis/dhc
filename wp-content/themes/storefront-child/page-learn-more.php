<?php
/* Template Name: Learn More Page */

get_header('front-page-template');
global $post;
?>

<div id="page-learn">

    <section id="banner">
        <div class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3 class="heroTitle text-uppercase">Learn More</h3>
                    </div>
                </div>
            </div>
	</div>
    </section>

    <section class="padSection">
        <div class="container">
	    <div class="row">
	        <div class="col-sm-12 text-center">
		    <p class="dhcImportantText center-block" style="max-width: 620px">
				<?php echo get_post_field('post_content', $post->ID); ?>
		     </p>
		</div>
	    </div>
        </div>
    </section>
    
    <section class="padSection" style="padding-top:0">
        <div class="container">
	    <div class="row text-center">
	        <div class="col-sm-6 col-md-3">
		    <img src='<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/learn/dhc-learn-p1.png' alt="Product 1" />
		</div>
	        <div class="col-sm-6 col-md-3">
		    <img src='<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/learn/dhc-learn-p2.png' alt="Product 2" />
		</div>
	        <div class="col-sm-6 col-md-3">
		    <img src='<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/learn/dhc-learn-p3.png' alt="Product 3" />
		</div>
	        <div class="col-sm-6 col-md-3">
		    <img src='<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/learn/dhc-learn-p4.png' alt="Product 4" />
		</div>		
	    </div>
	</div>
    </section>
    
    <section class="padSection">
        <div class="container">
	    <div class="row">
	        <div class="col-md-6">
		    <h3 class="text-uppercase">Our Products</h3>
		    <p>
		       We support and work directly with independent 
		       businesses that grow, raise, or source all their 
		       ingredients locally. We design many of the products 
		       ourselves. Our treats are baked in human grade 
		       facilities with human grade ingredients. Our treats, 
		       meats, and chews don't sacrifice any flavor. We 
		       guarantee that if your pup doesn't love them, we'll 
		       replace it with something they do!<br>
		       <br>
		       Check out some of our natural baked treats, featured 
		       products, and exotic meats HERE!
		     </p>
		</div>
		<div class="col-md-6">
		    <h3 class="text-uppercase">Treats, Meats & Chews</h3>
		    <ul class="arrow-list">
		        <li>Natural ingredients</li>
			<li>All free range proteins when possible</li>
			<li>No salt or artificial preservatives</li>
			<li>Organic and gluten free when possible</li>
			<li>Low fat treats and chews that easily digest.</li>
		    </ul>
		</div>
	    </div>
	</div>
    </section>	
	
    <section class="padSection bg-brown">
        <div class="container">
	    <div class="row text-center">
	        <div class="col-md-6">
		    <img src='<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/learn/dhc-acclaim1.png' alt="Accolades 1" />
		</div>
		<div class="col-md-6">
		    <img src='<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/learn/dhc-acclaim2.png' alt="Accolades 2" />
		</div>
	    </div>
	</div>
    </section>
    
    <section class="padSection">
        <div class="container">
	    <div class="row">
	        <div class="col-sm-12 text-center">
		    <h3 class="text-uppercase">Our Mission</h3>
		    <p class="center-block" style="max-width: 300px">
		      To provide convenience and access to the highest 
		      quality and healthiest dog products available. 
		      Your dog is your child and should live a longer, 
		      healthier, and happier life.
		    </p>
		    <p>
		        <strong>Warning:</strong> Our monthly boxes have been known to cause spontaneous drooling and extreme excitement!
		    </p>
		</div>
	    </div>
	</div>
    </section>
    
    <section class="padSection">
        <div class="container" style="max-width:970px">
	    <div class="row text-center">
	        <div class="col-md-6">
		        <div class="row img-grid-row">
			    <div class="col-xs-6">
		                <img src='<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/learn/dhc-img-grid1.png' alt="Photo 1" />
			    </div>
			    <div class="col-xs-6">
		                <img src='<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/learn/dhc-img-grid2.png' alt="Photo 2" />
			    </div>
			</div>
			<div class="row img-grid-row">
			    <div class="col-xs-12">
		                <img src='<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/learn/dhc-img-grid3.png' alt="Photo 3" />
			    </div>
			</div>
		</div>
		<div class="col-md-6">
		        <div class="row img-grid-row">
			    <div class="col-xs-12">
		                <img src='<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/learn/dhc-img-grid4.png' alt="Photo 4" />
			    </div>
			</div>
			<div class="row img-grid-row">
			    <div class="col-xs-6">
		                <img src='<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/learn/dhc-img-grid5.png' alt="Photo 5" />
			    </div>
			    <div class="col-xs-6">
		                <img src='<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/learn/dhc-img-grid6.png' alt="Photo 6" />
			    </div>
			</div>
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
				<a href="<?php echo site_url(); ?>/product/monthly-dhc-box/"><button class="dhc-button" style="margin:10px 5px;"><i class="icon-paw"></i> Get A Box</button></a> <button class="dhc-button" style="margin:10px 5px;"><i class="icon-gift"></i> Gift A Box</button>
		    </div>
		</div>
	    </div>
	</div>
    </section>

	<div class="border-dots"></div>
 </div>
    
   <!-- end custom content -->
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
