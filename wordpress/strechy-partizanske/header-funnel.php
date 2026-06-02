<?php
/**
 * Header — Funnel/Kalkulačka variant
 * Logo + topnav (Eshop · telefón · CTA "Kalkulácia"). Bez search/košíka.
 *
 * @package StrechyPartizanske
 */
$sp_phone     = get_theme_mod( 'sp_phone',     '+421 38 749 12 34' );
$sp_phone_uri = preg_replace( '/\s+/', '', $sp_phone );
$shop_url     = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/obchod/' );
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
</head>
<body <?php body_class( 'is-funnel' ); ?>>
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
  <a href="<?php echo esc_url( $shop_url ); ?>" class="prebar-pin" id="pricepin" title="<?php esc_attr_e( 'Aktuálna zľava klesá každú minútu — klikni a otvor eshop', 'strechy-partizanske' ); ?>">
    <span class="pin-pct" id="pinPct">−25 %</span>
    <span class="pin-meta">
      <small><?php esc_html_e( 'Tvoja zľava', 'strechy-partizanske' ); ?></small>
      <b><?php esc_html_e( 'Zachytiť cenu', 'strechy-partizanske' ); ?> →</b>
    </span>
  </a>
</div>

<!-- ====== TOPBAR (funnel variant) ====== -->
<header class="topbar" role="banner">
  <div class="container topbar-inner" style="display:flex; gap:18px; flex-wrap:wrap; justify-content:space-between;">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand" rel="home">
      <img src="<?php echo esc_url( sp_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="64" height="52">
      <div class="brand-text">
        <strong><?php bloginfo( 'name' ); ?></strong>
        <span><?php esc_html_e( 'Krytiny · klampiarstvo · montáž · od 2012', 'strechy-partizanske' ); ?></span>
      </div>
    </a>
    <nav class="topnav" aria-label="<?php esc_attr_e( 'Kontakt a CTA', 'strechy-partizanske' ); ?>">
      <a href="<?php echo esc_url( $shop_url ); ?>" class="topnav-shop">🛒 <?php esc_html_e( 'Eshop', 'strechy-partizanske' ); ?></a>
      <a href="tel:<?php echo esc_attr( $sp_phone_uri ); ?>" class="topnav-tel"><?php echo esc_html( $sp_phone ); ?></a>
      <a href="#kalkulacka" class="topnav-cta"><?php esc_html_e( 'Kalkulácia zdarma', 'strechy-partizanske' ); ?></a>
    </nav>
  </div>
</header>
