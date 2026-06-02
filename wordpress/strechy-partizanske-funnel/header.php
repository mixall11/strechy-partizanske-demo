<?php
/**
 * Header — funnel landing (logo + topnav: Eshop, telefón, CTA)
 *
 * @package StrechyPartizanskeFunnel
 */
$phone     = get_theme_mod( 'spf_phone',    '+421 38 749 12 34' );
$phone_uri = preg_replace( '/\s+/', '', $phone );
$shop_url  = get_theme_mod( 'spf_shop_url', 'https://eshop.strechy.raffay.sk/' );
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

<!-- ====== PREBAR ====== -->
<div class="prebar-wrap">
  <div class="prebar">
    <div class="prebar-marker"></div>
    <div class="container prebar-inner">
      <span class="prebar-pill" id="pillContent">🕐 <b id="now">--:--</b> · <?php esc_html_e( 'Akcia DNES', 'strechy-partizanske-funnel' ); ?></span>
      <span class="prebar-end"><?php esc_html_e( 'Do polnoci zostáva', 'strechy-partizanske-funnel' ); ?> <b id="countdown">--:--:--</b></span>
    </div>
  </div>
  <a href="<?php echo esc_url( $shop_url ); ?>" class="prebar-pin" id="pricepin" title="<?php esc_attr_e( 'Aktuálna zľava klesá každú minútu — klikni a otvor eshop', 'strechy-partizanske-funnel' ); ?>">
    <span class="pin-pct" id="pinPct">−25 %</span>
    <span class="pin-meta">
      <small><?php esc_html_e( 'Tvoja zľava', 'strechy-partizanske-funnel' ); ?></small>
      <b><?php esc_html_e( 'Zachytiť cenu', 'strechy-partizanske-funnel' ); ?> →</b>
    </span>
  </a>
</div>

<!-- ====== TOPBAR ====== -->
<header class="topbar" role="banner">
  <div class="container topbar-inner">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand" rel="home">
      <img src="<?php echo esc_url( spf_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="64" height="52">
      <div class="brand-text">
        <strong><?php bloginfo( 'name' ); ?></strong>
        <span><?php esc_html_e( 'Krytiny · klampiarstvo · montáž · od 2012', 'strechy-partizanske-funnel' ); ?></span>
      </div>
    </a>
    <nav class="topnav" aria-label="<?php esc_attr_e( 'Kontakt a CTA', 'strechy-partizanske-funnel' ); ?>">
      <a href="<?php echo esc_url( $shop_url ); ?>" class="topnav-shop">🛒 <?php esc_html_e( 'Eshop', 'strechy-partizanske-funnel' ); ?></a>
      <a href="tel:<?php echo esc_attr( $phone_uri ); ?>" class="topnav-tel"><?php echo esc_html( $phone ); ?></a>
      <a href="#kalkulacka" class="topnav-cta"><?php esc_html_e( 'Kalkulácia zdarma', 'strechy-partizanske-funnel' ); ?></a>
    </nav>
  </div>
</header>
