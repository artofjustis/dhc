<?php
/* Template Name: Front Page Template */

get_header('front-page-template'); 

$feat_img = wp_get_attachment_url(get_post_thumbnail_id($_post->ID)) ;
?>

    <section id="banner">  
        <div class="hero" style="background-image:url(<?php echo $feat_img; ?>);">
            <img src="<?php echo $feat_img; ?>" alt="" class="mobile-display"/>
            <div class="container hero-text clearfix">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <h2>Healthy Premium Boxed Treats</h2>
                        <div class="row">
							<!--<div class="col-sm-3"></div>-->
                            <div class="col-sm-12 text-center">
                                <a href="<?php echo site_url(); ?>/product/get-a-box/"><img src="<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/get-box-icon.png" alt="" />&nbsp;GET A BOX</a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <a href="<?php echo site_url(); ?>/product/gift-a-box/"><img src="<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/gift-box-icon.png" alt="" />&nbsp;GIFT A BOX</a>
                            </div>
								<!--<div class="col-sm-3"></div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="one">
        <header class="major">
            <h2 class="section-heading"><?php the_field('main_section_title'); ?></h2>
        </header>
        <div class="container clearfix">
            <div class="row clearfix">
                <div class="col-sm-4 clearfix">
                    <section class="special box row clearfix">
                    	<div class="col-xs-5 col-sm-12 clearfix">
                        <img src='<?php the_field('first_step_image'); ?>' alt="Size Dogs">
                        </div>
                        <div class="col-xs-7 col-sm-12 clearfix">
                        <h3> <?php the_field('first_step_title'); ?></h3>
                        <p> <?php the_field('first_step_content'); ?></p>
                        </div>
                    </section>
                </div>
                <div class="col-sm-4 clearfix">
                    <section class="special box row clearfix">
                    	<div class="col-xs-5 col-sm-12 clearfix">
                        <img src='<?php the_field('second_step_image'); ?>' alt="Box Gift">
                        </div>
                        <div class="col-xs-7 col-sm-12 clearfix">
                        <h3> <?php the_field('second_step_title'); ?></h3>
                        <p> <?php the_field('second_step_content'); ?></p>
                        </div>
                    </section>
                </div>
                <div class="col-sm-4 clearfix">
                    <section class="special box row clearfix">
                    	<div class="col-xs-5 col-sm-12 clearfix">
                        <img src='<?php the_field('third_step_image'); ?>' alt="Doggy Mail">
                        </div>
                        <div class="col-xs-7 col-sm-12 clearfix">
                        <h3> <?php the_field('third_step_title'); ?></h3>
                        <p> <?php the_field('third_step_content'); ?></p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <section id="two" class="clearfix">
        <div class="container clearfix">
        	<div class="inside-box col-sm-8 pull-right">
                <img src="<?php the_field('whats_inside_section_image'); ?>" alt="Delivery Dog">
            </div>
            <div class="inner col-sm-4">
                <h3><?php the_field('whats_inside_section_title'); ?></h3>
<!--                <p>Every month our doggies select their favorite healthy premium treats and toys.
                    Working with small boutique manufacturers, we offer only the highest quality of
                    products not found anywhere else. We guarantee your doggy will love them.</p>-->
                <?php the_field('whats_inside_section'); ?>
            </div>
        </div>
    </section>

    <section id="three" class="clearfix">
        <div class="container clearfix">
            <div class="row flex-container">
                <div class="col-sm-5 col-md-4 past-boxes-flex-item">
                    <h2 class="section-heading">Featured <br/>Products</h2>
                </div>
                <div class="col-sm-7 col-md-8 clearfix">
                    <div class="past-boxes-slider col-md-11">
                        
                        <?php 
                        
                        $field_name = "type_of_media_to_show";
                        $field = get_field_object($field_name);
                        
                        if($field['value'] == "images") { ?>
                           
                        <?php echo do_shortcode('[simpleresponsiveslider]');?>
                        
                          <?php } ?>
                          <?php if($field['value'] == "video") { ?>
                            <div>
                            <iframe width="560" height="315" src=" <?php the_field('youtube_video_link'); ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                          <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="four" class="clearfix">
        <div class="container clearfix">
        	<div class="mobile-display clearfix">
                <h2><?php the_field('dhc_guarantee_title'); ?></h2>
            </div>
            <div class="row flex-container">
            	<div class="col-sm-3">
                    <img src="<?php the_field('dhc_guarantee_image'); ?>" alt="Satisfaction Guaranteed">
                </div>
                <div class="col-sm-9">
                	<h2 class="hidden-sm hidden-xs"><?php the_field('dhc_guarantee_title'); ?></h2>
                        
                          <?php the_field('dhc_guarantee'); ?>
<!--                    <p>Unsurpassed quality. Sustainable wellness. Our experts hand-select all natural products
                    and source organic and eco-friendly products. We take great pride in partnering with companies
                    that make our doggy's health their number one priority. If your doggy doesn't love one of our
                    products, we will replace it with something they do love.<br>
                    We guarantee it!</p>-->
                </div>
            </div>
        </div>
    </section>

    <section id="five" class="flex-container clearfix">
        <img src="<?php the_field('dhc_give_back_image'); ?>" alt="" class="mobile-display img-width" />
        <div class="container clearfix">
            <div class="row flex-container">
                        <div class="col-sm-6 col-md-6">
                            <h2><img src="<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/five-section-icon.png" alt="" />   <?php the_field('dhc_gives_back_title'); ?></h2>
                              <?php the_field('dhc_gives_back'); ?>
<!--                          
                            <p>Doggy Health Club is a proud supporter of the lifesaving work The Humane Society of the United States does every day. </p>
                            <p id="five-bottom-p">Let’s continue to be human towards our 4-legged friends.</p>-->
                             <a href="<?php echo get_permalink( get_page_by_path( 'charity' ) ); ?>"><i class="fa fa-heart"></i>&nbsp;MORE INFO</a>
                        </div>
                        <div class="col-sm-6 col-md-6 text-center hidden-xs pull-right">
                        	<img src="<?php the_field('dhc_give_back_image'); ?>" alt="" style="display:inline-block;" />
                        </div>
              </div>
         </div>
    </section>


    

    <!-- end custom content -->

    <!-- Default Storefront Content -->

    <div id="primary" class="content-area">
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

<?php
get_footer();
?>



