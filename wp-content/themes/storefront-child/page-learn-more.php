<?php
/* Template Name: Learn More Page */

get_header('front-page-template');
global $post;
$feat_img = wp_get_attachment_url(get_post_thumbnail_id($_post->ID)) ;

?>

<div id="page-learn" class="clearfix">

    <section id="banner" class="clearfix"> 
    	<div class="hero" style="background-image:url(<?php echo $feat_img; ?>);">
            <img src="<?php echo $feat_img; ?>'); ?>" alt="" class="mobile-display"/>
            <div class="container clearfix">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="heroTitle text-uppercase hidden-md hidden-lg hidden-sm">Learn More</h3>
                    </div>
                </div>
            </div>
	</div>
    </section>
<div class="border-dots hidden-md hidden-lg hidden-sm"></div>
    <section class="padSection clearfix">
        <div class="container clearfix">
	    <div class="row">
	        <div class="col-sm-12 text-center">
		    <div class="dhcImportantText center-block">
			 <?php the_field('main_content_learn_more'); ?>
		     </div>
		</div>
	    </div>
        </div>
    </section>
    
    <section class="padSection clearfix products-learnmore" style="padding-top:0">
        <div class="container text-center clearfix">
	        <div class="col-sm-6 col-md-3 col-xs-6"> 
		    <img src='<?php the_field('product1_learn_more'); ?>' alt="Product 1" />
		   </div>
	        <div class="col-sm-6 col-md-3  col-xs-6">
		    <img src='<?php the_field('product2_learn_more'); ?>' alt="Product 2" />
		    </div>
	        <div class="col-sm-6 col-md-3  col-xs-6">
		    <img src='<?php the_field('product3_learn_more'); ?>' alt="Product 3" />
		    </div>
	        <div class="col-sm-6 col-md-3  col-xs-6">
		    <img src='<?php the_field('product4_learn_more'); ?>' alt="Product 4" />
		</div>	
	</div>
    </section>
    
    <section class="padSection clearfix">
        <div class="container clearfix">
	        <div class="col-md-6">
		    <h3 class="text-uppercase"><?php the_field('our_products_title'); ?></h3>
		    <p>
                        <?php the_field('our_products_content'); ?>
		     </p>
		</div>
		<div class="col-md-6"> 
		    <h3 class="text-uppercase"> <?php the_field('first_section_right_title'); ?></h3>
		  
                            <?php //the_field('first_section_right_content'); 
                    
                                   

                                        $rows = get_field('first_section_right_content');
                                        if($rows)
                                        {
                                                echo '<ul class="arrow-list">';

                                                foreach($rows as $row)
                                                {
                                                        echo '<li> ' . $row['first_bullet'] . '</li>';
                                                }

                                                echo '</ul>';
                                        }
		 ?>
            <h3 class="text-uppercase" style="margin-top:20px;"><?php the_field('second_section_right_title'); ?></h3>
           
                <?php 
                                        $rows2 = get_field('second_section_right_content');
                                        if($rows2)
                                        {
                                                echo '<ul class="arrow-list">';

                                                foreach($rows2 as $row2)
                                                {
                                                        echo '<li> ' . $row2['second_bullets'] . '</li>';
                                                }

                                                echo '</ul>';
                                        } ?>
		   
		</div>
	</div>
    </section>	
	
    <section class="padSection bg-brown clearfix">
        <div class="container clearfix">
	        <div class="col-md-6 clearfix">
            	<div class="learn-box text-uppercase clearfix">
		    	  <?php the_field('left_box'); ?>	
            	</div>
		</div>
		<div class="col-md-6 clearfix">
        	<div class="learn-box text-uppercase clearfix">
                      <?php the_field('right_box'); ?>
	       </div>
		</div>
	</div>
    </section>
    
    <section class="padSection clearfix">
        <div class="container clearfix">
	    <div class="row clearfix">
	        <div class="col-sm-12 text-center">
		    <h3 class="text-uppercase"><?php the_field('our_mission_title'); ?></h3>
		    <p class="center-block" style="max-width:400px">
                        <?php the_field('our_mission_content'); ?>
		    </p>
		    <p>
		        <?php the_field('bottom_text'); ?>
                       
		    </p>
		</div>
	    </div>
	</div>
        <div class="container clearfix" style="max-width:970px">
            <div class="row text-center">
                <div class="col-md-6">
                    <div class="row img-grid-row">
                    <div class="col-xs-6">
                        <img src='<?php the_field('first_image_left'); ?>'  alt="Photo 1"/>
                        
                    </div>
                    <div class="col-xs-6">
                            <img src='<?php the_field('second_image_left'); ?>' alt="Photo 2" />
                    </div>
                </div>
                <div class="row img-grid-row">
                    <div class="col-xs-12">
                            <img src='<?php the_field('third_image_left_bottom'); ?>' alt="Photo 3" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="row img-grid-row">
                    <div class="col-xs-12">
                            <img src='<?php the_field('first_image_right'); ?>' alt="Photo 4" />
                    </div>
                </div>
                <div class="row img-grid-row">
                    <div class="col-xs-6">
                            <img src='<?php the_field('second_image_right'); ?>' alt="Photo 5" />
                    </div>
                    <div class="col-xs-6">
                            <img src='<?php the_field('third_image_right_bottom'); ?>' alt="Photo 6" />
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>

    
   <!-- end custom content -->
<?php
get_footer();
?>
