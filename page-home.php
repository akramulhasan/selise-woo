<?php
/**
 * Template Name: Homepage
 *
 *
 *
 * @package WordPress
 * @subpackage SELISE Woo Theme
 */


 get_header(); 
 
 ?>
   <section class="hero-banner">
        <div class="container">
            <div class="banner-wrapper">
                <div class="intro">
                    <div class="hero-tag">Christmas sale</div>
                    <h1>
                    Woocommerce Figma UI Kit & Template
                    </h1>
                    <div class="subscriber-box">
                    <input type="text" placeholder="e.g Responsive header" name="hero-subscriber" id="">
                    <input type="submit" value="Search">
                    </div>
                    <p>From multipurpose themes to niche templates, you’ll always find something that catches your eye.</p>
                </div>
                <div class="hero-banner-img">
                    <img src="<?php echo get_template_directory_uri().'/assets/images/hero-banner.png' ?>" alt="hero-banner">
                </div>
            </div>
        </div>
   </section>

   <section class="brand-parner">

   </section>

   <section class="product-area">
    <div class="container">
        <div class="main-wraper">
            <aside class="widget-area cats">
                <div class="sidebar-wrapper">
                    <h2>Browse Categories</h2>
                    <?php $seliseIntiClass->selise_get_categories_list(); ?>
                </div>
            </aside>
            <main class="product-area">
            <h2>New Products</h2>
                <div class="product-grid">
                <?php
                $params = array(
                    'posts_per_page' => 9,
                    'post_type' => 'product'
                );
                $wc_query = new WP_Query($params); ?>
                <?php if ($wc_query->have_posts()) :  ?>
                <?php while ($wc_query->have_posts()) : $wc_query->the_post(); global $product;

                //Get Product Thumbnail
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );
                
                //Get price (amount)
                $price = get_post_meta( get_the_ID(), '_price', true ); 
                
                ?>

                    <div class="item-wrap">
                        <div class="thumb">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
                            </a>
                        </div>
                        <div class="item-bar">
                            <div class="item-title">
                                <a href="<?php the_permalink(); ?>">
                                    <h4><?php the_title() ?></h4>
                                </a>
                                <?php 

                                    //Show Product Categories with a custom defined function
                                    echo $seliseIntiClass->selise_get_terms($product->ID);
                                
                                ?>
                            </div>
                            <div class="item-price">  <?php echo wc_price( $price ); ?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); // (5) ?>
                <?php else:  ?>
                <p>
                    <?php _e( 'No Products' ); // (6) ?>
                </p>
                <?php endif; ?>

                </div>
            </main>
        </div>
    </div>
   </section>

<?php get_footer(); ?>