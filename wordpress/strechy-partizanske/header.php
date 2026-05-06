<?php
/**
 * Header — prebar (časová os + name discount) + topbar (logo, search, nav)
 *
 * @package StrechyPartizanske
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ====== PREBAR — časová os 24h cyklus + osobná zľava ====== -->
<div class="prebar-wrap">
  <div class="prebar">
    <div class="prebar-marker"></div>
    <div class="container prebar-inner">
      <span class="prebar-pill" id="pillContent">🕐 <b id="now">--:--</b> · <?php esc_html_e( 'Akcia DNES', 'strechy-partizanske' ); ?></span>
      <span class="prebar-end"><?php esc_html_e( 'Do polnoci zostáva', 'strechy-partizanske' ); ?> <b id="countdown">--:--:--</b></span>
    </div>
  </div>
  <a href="<?php echo function_exists( 'wc_get_page_permalink' ) ? esc_url( wc_get_page_permalink( 'shop' ) ) : esc_url( home_url( '/akcie' ) ); ?>" class="prebar-pin" id="pricepin" title="<?php esc_attr_e( 'Aktuálna zľava klesá každú hodinu — klikni a zachytávaj cenu', 'strechy-partizanske' ); ?>">
    <span class="pin-pct" id="pinPct">−25 %</span>
    <span class="pin-meta">
      <small><?php esc_html_e( 'Tvoja zľava', 'strechy-partizanske' ); ?></small>
      <b><?php esc_html_e( 'Zachytiť cenu', 'strechy-partizanske' ); ?> →</b>
    </span>
  </a>
</div>

<!-- ====== TOPBAR ====== -->
<header class="topbar" role="banner">
  <div class="container topbar-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand" rel="home">
      <img src="<?php echo esc_url( sp_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="64" height="52">
      <div class="brand-text">
        <strong><?php bloginfo( 'name' ); ?></strong>
        <span><?php bloginfo( 'description' ); ?></span>
      </div>
    </a>

    <?php if ( function_exists( 'get_search_form' ) ) : ?>
      <?php get_search_form(); ?>
    <?php endif; ?>

    <nav class="actions" aria-label="<?php esc_attr_e( 'Hlavné akcie', 'strechy-partizanske' ); ?>">
      <?php
      // Voliteľné: link na funnel/kalkulačku ak existuje stránka so slug 'kalkulacka'
      $kalk = get_page_by_path( 'kalkulacka' );
      if ( $kalk ) : ?>
        <a href="<?php echo esc_url( get_permalink( $kalk ) ); ?>" class="act act-funnel">
          <span class="act-ic">📐</span>
          <span class="act-tx"><b><?php esc_html_e( 'Kalkulačka', 'strechy-partizanske' ); ?></b><small><?php esc_html_e( 'cena za 2 min', 'strechy-partizanske' ); ?></small></span>
        </a>
      <?php endif; ?>

      <?php if ( function_exists( 'wc_get_account_endpoint_url' ) ) : ?>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="act act-acc">
          <span class="act-ic">👤</span>
          <span class="act-tx"><b><?php esc_html_e( 'Účet', 'strechy-partizanske' ); ?></b><small><?php echo is_user_logged_in() ? esc_html__( 'môj účet', 'strechy-partizanske' ) : esc_html__( 'prihlásiť', 'strechy-partizanske' ); ?></small></span>
        </a>

        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="act act-cart">
          <span class="act-ic">🛒</span>
          <span class="act-tx">
            <b><?php esc_html_e( 'Košík', 'strechy-partizanske' ); ?></b>
            <small><?php echo (int) WC()->cart->get_cart_contents_count(); ?> ks · <?php echo wp_kses_post( WC()->cart->get_cart_total() ); ?></small>
          </span>
        </a>
      <?php endif; ?>
    </nav>
  </div>

  <?php if ( has_nav_menu( 'primary' ) ) : ?>
    <nav class="mainnav" aria-label="<?php esc_attr_e( 'Hlavné menu', 'strechy-partizanske' ); ?>">
      <div class="container mainnav-inner">
        <?php
        wp_nav_menu( [
          'theme_location' => 'primary',
          'container'      => false,
          'items_wrap'     => '%3$s',
          'depth'          => 1,
          'fallback_cb'    => false,
        ] );
        ?>
      </div>
    </nav>
  <?php endif; ?>
</header>
