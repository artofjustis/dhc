<?php
/* Template Name: Front Page Template */

get_header('front-page-template'); ?>

    <section id="banner">
        <div class="hero">
            <div class="container hero-text">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Healthy Premium Boxed Treats</h2>
                        <div class="row">
<!--                            <div class="col-sm-3"></div>-->
                            <div class="col-sm-6">
                                <a href="#"><i class="fa fa-paw"></i>&nbsp;GET A BOX</a>
                            </div>
                            <div class="col-sm-6">
                                <a href="#"><i class="fa fa-gift"></i>&nbsp;GIFT A BOX</a>
                            </div>
<!--                            <div class="col-sm-3"></div>-->
                        </div>
                    </div>
                    <div class="col-sm-8"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="one">
        <header class="major">
            <h2 class="section-heading">HOW IT WORKS</h2>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <section class="special box">
                        <img src='/wp-content/themes/storefront-child/images/doggy_size.png' alt="Size Dogs">
                        <h3>DOGGY SIZE</h3>
                        <p>Tell us the size of your dog. We've got healthy premium treats for dogs of every size.</p>
                    </section>
                </div>
                <div class="col-sm-4">
                    <section class="special box">
                        <img src='/wp-content/themes/storefront-child/images/doggy_personality.png' alt="Box Gift">
                        <h3>DOGGY'S PERSONALITY</h3>
                        <p>Describe your dog to us. We create the perfect box for all doggy personalities.</p>
                    </section>
                </div>
                <div class="col-sm-4">
                    <section class="special box">
                        <img src='/wp-content/themes/storefront-child/images/doggy_mail.png' alt="Doggy Mail">
                        <h3>DOGGY MAIL</h3>
                        <p>Each month we will deliver your box directly to your doorstep.</p>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <section id="two">
        <div class="hero">
            <div class="inner col-sm-4">
                <h3>WHAT'S INSIDE</h3>
                <p>Every month our doggies select their favorite healthy premium treats and toys.
                    Working with small boutique manufacturers, we offer only the highest quality of
                    products not found anywhere else. We guarantee your doggy will love them.</p>
            </div>
            <div class="inside-box col-sm-4">
                <img src="/wp-content/themes/storefront-child/images/deliverydog.png" alt="Delivery Dog">
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-1">
                <a href="contact"><img src="/wp-content/themes/storefront-child/images/leave-a-message.png" alt="Leave a message" id="leave-a-message"></a>
            </div>
        </div>
    </section>

    <section id="three">
        <div class="container">
            <div class="row flex-container">
                <div class="col-sm-6 past-boxes-flex-item">
                    <h2 class="section-heading">PAST HEALTHY PREMIUM BOXES</h2>
                </div>
                <div class="col-sm-6  past-boxes-flex-item">
                    <div class="past-boxes-slider">
                        <?php echo do_shortcode('[simpleresponsiveslider]');?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="four">
        <div class="container">
            <div class="row flex-container">
                <div class="col-sm-4">
                    <img src="/wp-content/themes/storefront-child/images/satisfaction-guaranteed.png" alt="Satisfaction Guaranteed">
                </div>
                <div class="col-sm-8">
                    <h2>DHC GUARANTEE</h2>
                    <p>Unsurpassed quality. Sustainable wellness. Our experts hand-select all natural products
                    and source organic and eco-friendly products. We take great pride in partnering with companies
                    that make our doggy's health their number one priority. If your doggy doesn't love one of our
                    products, we will replace it with something they do love.<br>
                    We guarantee it!</p>
                </div>
            </div>
        </div>
    </section>

    <section id="five" class="flex-container">
        <div class="container">
            <div class="row flex-container">
                <div class="col-sm-4">
                    <h2>DHC GIVES BACK</h2>
                    <p>Every Doggy Health Club box sold helps an animal in need. Doggy Health Club donates
                    a portion of its proceeds to The Humane Society of the United States with every
                    purchase.</p>
                    <p id="five-bottom-p">Let's continue to be human towards our 4-legged friends.</p>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2">
                                <a href="#"><i class="fa fa-heart"></i>&nbsp;MORE INFO</a>
                            </div>
                            <div class="col-sm-2">
                                <img src="/wp-content/themes/storefront-child/images/humane-society.png" alt="Humane Society Logo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8"></div>
            </div>
        </div>
    </section>

    <section id="six" class="flex-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <h2>JOIN THE CLUB</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="#"><i class="fa fa-paw"></i>&nbsp;GET A BOX</a>
                        </div>
                        <div class="col-sm-6">
                            <a href="#"><i class="fa fa-gift"></i>&nbsp;GIFT A BOX</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </section>

    <div class="border-dots"></div>

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
