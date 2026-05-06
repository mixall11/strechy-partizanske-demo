<?php
/**
 * Search form — používa WooCommerce search ak je aktívny, inak default WP search
 *
 * @package StrechyPartizanske
 */
if ( ! defined( 'ABSPATH' ) ) exit;

if ( function_exists( 'WC' ) ) :
?>
<form role="search" method="get" class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Hľadám napr. ‚BRAMAC Tegalit antracit‘…', 'strechy-partizanske' ); ?>">
  <input type="hidden" name="post_type" value="product">
  <button type="submit" aria-label="<?php esc_attr_e( 'Hľadať', 'strechy-partizanske' ); ?>">🔍</button>
</form>
<?php else : ?>
<form role="search" method="get" class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Hľadať…', 'strechy-partizanske' ); ?>">
  <button type="submit" aria-label="<?php esc_attr_e( 'Hľadať', 'strechy-partizanske' ); ?>">🔍</button>
</form>
<?php endif; ?>
