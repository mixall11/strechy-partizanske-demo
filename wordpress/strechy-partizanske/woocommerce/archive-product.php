<?php
/**
 * Shop archive — wraps Woo loop in our container + breadcrumbs.
 * Override pre wp-content/themes/strechy-partizanske/woocommerce/archive-product.php
 *
 * @package StrechyPartizanske
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<section class="shop-hero">
  <div class="container">
    <?php woocommerce_breadcrumb(); ?>
    <h1 class="page-title">
      <?php woocommerce_page_title(); ?>
    </h1>
    <?php
    do_action( 'woocommerce_archive_description' );
    ?>
  </div>
</section>

<main class="site-main woo-main">
  <div class="container">

    <?php if ( woocommerce_product_loop() ) : ?>

      <div class="woo-toolbar">
        <?php
        do_action( 'woocommerce_before_shop_loop' ); // result count + ordering
        ?>
      </div>

      <?php woocommerce_product_loop_start(); ?>

      <?php while ( have_posts() ) : the_post();
        do_action( 'woocommerce_shop_loop' );
        wc_get_template_part( 'content', 'product' );
      endwhile; ?>

      <?php woocommerce_product_loop_end(); ?>

      <div class="woo-pagination">
        <?php do_action( 'woocommerce_after_shop_loop' ); ?>
      </div>

    <?php else : ?>
      <?php do_action( 'woocommerce_no_products_found' ); ?>
    <?php endif; ?>

    <?php
    do_action( 'woocommerce_after_main_content' );
    do_action( 'woocommerce_sidebar' );
    ?>
  </div>
</main>

<?php get_footer(); ?>
