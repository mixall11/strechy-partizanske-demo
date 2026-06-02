<?php
/**
 * Product loop card — replikuje .prod kartu z eshop dema
 * Override pre wp-content/themes/strechy-partizanske/woocommerce/content-product.php
 *
 * @package StrechyPartizanske
 */
defined( 'ABSPATH' ) || exit;

global $product;
if ( empty( $product ) || ! $product->is_visible() ) return;

$stock_qty = $product->get_stock_quantity();
$stock_str = $stock_qty
  ? number_format_i18n( $stock_qty, 0 ) . ' ' . esc_html__( 'ks', 'strechy-partizanske' )
  : esc_html__( 'skladom', 'strechy-partizanske' );

$is_new = ( time() - get_post_time( 'U', false, $product->get_id() ) ) < 30 * DAY_IN_SECONDS;
?>
<li <?php wc_product_class( 'prod', $product ); ?>>

  <?php if ( $product->is_on_sale() ) : ?>
    <?php
    $reg = (float) $product->get_regular_price();
    $sale = (float) $product->get_sale_price();
    if ( $reg > 0 && $sale > 0 ) {
      $pct = round( ( ( $reg - $sale ) / $reg ) * 100 );
      echo '<span class="prod-tag prod-tag-hot">−' . (int) $pct . ' %</span>';
    } else {
      echo '<span class="prod-tag prod-tag-hot">' . esc_html__( 'AKCIA', 'strechy-partizanske' ) . '</span>';
    }
    ?>
  <?php elseif ( $is_new ) : ?>
    <span class="prod-tag prod-tag-new"><?php esc_html_e( 'NOVINKA', 'strechy-partizanske' ); ?></span>
  <?php elseif ( $product->is_in_stock() ) : ?>
    <span class="prod-tag"><?php esc_html_e( 'SKLADOM', 'strechy-partizanske' ); ?></span>
  <?php endif; ?>

  <?php if ( $product->is_in_stock() && $stock_qty ) : ?>
    <span class="prod-stock"><?php echo esc_html( $stock_str ); ?></span>
  <?php endif; ?>

  <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>">
    <div class="prod-img">
      <?php
      if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'woocommerce_thumbnail' );
      } else {
        echo '🏠';
      }
      ?>
    </div>

    <h3><?php echo esc_html( $product->get_name() ); ?></h3>
    <small><?php echo wp_kses_post( wp_trim_words( $product->get_short_description(), 12, '…' ) ?: $product->get_meta( '_sku' ) ); ?></small>
  </a>

  <?php
  $rating_count = $product->get_rating_count();
  $avg          = $product->get_average_rating();
  if ( $rating_count > 0 ) : ?>
    <div class="prod-rating">★★★★★ <b><?php echo esc_html( number_format_i18n( $avg, 1 ) ); ?></b> <span>(<?php echo (int) $rating_count; ?>)</span></div>
  <?php endif; ?>

  <div class="prod-price"><?php echo $product->get_price_html(); ?></div>

  <?php woocommerce_template_loop_add_to_cart( [ 'class' => 'btn btn-primary btn-block' ] ); ?>
</li>
