<?php
/* Template Name: Charity Page */

get_header('front-page-template');
global $post;
$feat_img = wp_get_attachment_url(get_post_thumbnail_id($_post->ID)) ;
?>

<div id="page-charity">

    <section id="banner">   
        <div class="hero" style="background-image:url(<?php echo $feat_img; ?>)">
            <img src="<?php echo $feat_img; ?>" alt="" class="mobile-display"/>
            <div class="container clearfix">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h3 class="heroTitle text-uppercase">Charity</h3>
                    </div>
                </div>
            </div>
	</div>
    </section>
<div class="border-dots hidden-md hidden-lg hidden-sm"></div>
    <section class="padSection clearfix">
        <div class="container clearfix">
	    <div class="row clearfix">
		<div class="col-md-8 pull-right">
		    <h3 class="text-uppercase"><?php the_field('content_title_charity'); ?></h3>
		    <p>
                        <iframe src="<?php the_field('youtube_video_link'); ?>" width="100%" height="415" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
		       <?php the_field('main_content_charity'); ?> <a href="<?php the_field('more_info_link'); ?>" target="_blank"><?php the_field('link_to_more_info_title'); ?></a>.
                       
		    </p>
		</div>
        <div class="col-md-4 text-center">
        <div class="logo-charity"><img src="<?php echo site_url(); ?>/wp-content/themes/storefront-child/images/five-section-icon.png" alt="" /> DHC GIVES BACK</div>
        <a href="<?php the_field('donate_to_charity_link'); ?>" target="_blank" class="green-btn"><?php the_field('donate_to_charity_button_text'); ?></a>
        </div>

	    </div>
	</div>
    </section>

  
  
<?php
get_footer();
?>
