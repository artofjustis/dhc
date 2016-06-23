<?php
/* Template Name: Front Page Template */

get_header('front-page-template'); ?>

    <section id="banner">
        <div class="hero">
        </div>
    </section>

    <section id="one">
        <header class="major">
            <h2 class="section-heading">THIS IS HOW IT WORKS</h2>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <section class="special box">
                        <img src='/wp-content/themes/storefront-child/images/size_dogs.png' alt="Size Dogs">
                        <h3>CHOOSE YOUR DOG'S HEALTHY SIZE</h3>
                        <p>Tell us the size of your dog. We've got healthy goodies for dogs of every size.</p>
                    </section>
                </div>
                <div class="col-sm-4">
                    <section class="special box">
                        <img src='/wp-content/themes/storefront-child/images/box_gift.png' alt="Box Gift">
                        <h3>A MONTHLY PLAN JUST FOR YOU</h3>
                        <p>Month-to-month plans are available. Free shipping. Cancel anytime.</p>
                    </section>
                </div>
                <div class="col-sm-4">
                    <section class="special box">
                        <img src='/wp-content/themes/storefront-child/images/doggy_mail.png' alt="Doggy Mail">
                        <h3>SIGNED, SEALED, DELIVERED</h3>
                        <p>Your Doggy Health Club box is shipped the same time each month. Sit back and enjoy!</p>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <section id="two">
        <div class="hero">
            <div class="inner">
                <h3>WHAT'S INSIDE</h3>
                <p>Every month our pets select their favorite toys, bones, and treats. Working with small boutique manufacturers, we offer only the highest quality and healthiest of products not found anywhere else. We guarantee your pup will love them.</p>
            </div>
            <div class="inside-box">
                <img src="/wp-content/themes/storefront-child/images/deliverydog.png">
            </div>
        </div>
    </section>

    <section id="three">
        <header class="major">
            <h2 class="section-heading">DOGGY HEALTH CLUB GUARANTEE</h2>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <section class="special">
                        <a href="#" class="image fit">
                            <img src="/wp-content/themes/storefront-child/images/doggy_stamp.png" alt="">
                        </a>
                    </section>
                </div>
                <div class="col-sm-6">
                    <section class="special">
                        <p>All non GMO products. Unsurpassed quality. Sustainable wellness. Our pet experts hand-select all natural products and source organic and eco-friendly products when possible. We take great pride in partnering with companies that make our pets health their number one priority. If your pet doesn't love one of our products, we'll replace it with something they do. We guarantee it!</p>
                    </section>
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