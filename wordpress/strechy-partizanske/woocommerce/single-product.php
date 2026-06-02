<?php
/**
 * Single product — minimálny wrapper, vnútorný layout zostáva default Woo
 * Override pre wp-content/themes/strechy-partizanske/woocommerce/single-product.php
 *
 * @package StrechyPartizanske
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="site-main woo-main woo-single">
  <div class="container">
    <?php woocommerce_breadcrumb(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
      <?php wc_get_template_part( 'content', 'single-product' ); ?>
    <?php endwhile; ?>
  </div>
</main>

<!-- USP bar pod produktom — buduje dôveru tesne pred košíkom -->
<section class="usps">
  <div class="container usps-inner">
    <div class="usp"><span>🚚</span><b><?php esc_html_e( 'Doprava zdarma', 'strechy-partizanske' ); ?></b><small><?php esc_html_e( 'nad 500 € · 60 km', 'strechy-partizanske' ); ?></small></div>
    <div class="usp"><span>🛡️</span><b><?php esc_html_e( '30 rokov záruka', 'strechy-partizanske' ); ?></b><small><?php esc_html_e( 'výrobcu na krytinu', 'strechy-partizanske' ); ?></small></div>
    <div class="usp"><span>↩️</span><b><?php esc_html_e( '14 dní vrátenie', 'strechy-partizanske' ); ?></b><small><?php esc_html_e( 'v pôvodnom obale', 'strechy-partizanske' ); ?></small></div>
    <div class="usp"><span>📞</span><b><?php esc_html_e( 'Poradenstvo zdarma', 'strechy-partizanske' ); ?></b><small><?php esc_html_e( 'pred objednávkou', 'strechy-partizanske' ); ?></small></div>
  </div>
</section>

<?php get_footer(); ?>
