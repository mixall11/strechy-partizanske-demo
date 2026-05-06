<?php
/**
 * Strechy Partizánske — theme bootstrap
 *
 * @package StrechyPartizanske
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SP_THEME_VERSION', '1.0.0' );
define( 'SP_THEME_DIR', get_stylesheet_directory() );
define( 'SP_THEME_URI', get_stylesheet_directory_uri() );

/* ============================================================
 * Theme setup
 * ============================================================ */
function sp_setup() {
    load_theme_textdomain( 'strechy-partizanske', SP_THEME_DIR . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 72,
        'flex-height' => true,
        'flex-width'  => true,
    ] );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );

    // WooCommerce
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    register_nav_menus( [
        'primary' => __( 'Hlavná navigácia', 'strechy-partizanske' ),
        'footer'  => __( 'Footer odkazy', 'strechy-partizanske' ),
    ] );
}
add_action( 'after_setup_theme', 'sp_setup' );

/* ============================================================
 * Enqueue assets
 * ============================================================ */
function sp_enqueue() {
    // Hlavné štýly
    wp_enqueue_style(
        'sp-main',
        SP_THEME_URI . '/assets/css/main.css',
        [],
        SP_THEME_VERSION
    );

    // Inter font
    wp_enqueue_style(
        'sp-inter',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap',
        [],
        null
    );

    // Countdown skript (defer pre rýchlejší LCP)
    wp_enqueue_script(
        'sp-countdown',
        SP_THEME_URI . '/assets/js/countdown.js',
        [],
        SP_THEME_VERSION,
        [ 'strategy' => 'defer', 'in_footer' => true ]
    );
}
add_action( 'wp_enqueue_scripts', 'sp_enqueue' );

/* ============================================================
 * Sidebar widgety (footer 4 stĺpce)
 * ============================================================ */
function sp_widgets_init() {
    for ( $i = 1; $i <= 4; $i++ ) {
        register_sidebar( [
            'name'          => sprintf( __( 'Footer stĺpec %d', 'strechy-partizanske' ), $i ),
            'id'            => 'footer-' . $i,
            'before_widget' => '<div class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5>',
            'after_title'   => '</h5>',
        ] );
    }
}
add_action( 'widgets_init', 'sp_widgets_init' );

/* ============================================================
 * WooCommerce — wrap shop content do našich sekcií
 * ============================================================ */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

function sp_woo_wrapper_start() {
    echo '<main class="site-main woo-main"><div class="container">';
}
function sp_woo_wrapper_end() {
    echo '</div></main>';
}
add_action( 'woocommerce_before_main_content', 'sp_woo_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'sp_woo_wrapper_end', 10 );

// 4 produkty na riadok v shop loope
add_filter( 'loop_shop_columns', function() { return 4; } );

// Default 12 produktov / strana
add_filter( 'loop_shop_per_page', function() { return 12; }, 20 );

/* ============================================================
 * Helper: získaj cestu k logu (custom-logo alebo default SVG)
 * ============================================================ */
function sp_logo_url() {
    $custom = get_theme_mod( 'custom_logo' );
    if ( $custom ) {
        $img = wp_get_attachment_image_src( $custom, 'full' );
        if ( $img ) return $img[0];
    }
    return SP_THEME_URI . '/assets/img/logo.svg';
}

/* ============================================================
 * Body classes — pridaj `is-shop`, `is-product` pre lepší styling
 * ============================================================ */
function sp_body_classes( $classes ) {
    if ( function_exists( 'is_shop' ) ) {
        if ( is_shop() )       $classes[] = 'is-shop';
        if ( is_product() )    $classes[] = 'is-product';
        if ( is_cart() )       $classes[] = 'is-cart';
        if ( is_checkout() )   $classes[] = 'is-checkout';
    }
    return $classes;
}
add_filter( 'body_class', 'sp_body_classes' );

/* ============================================================
 * Cart count fragment — pre dynamic update košíka v topbare
 * ============================================================ */
function sp_cart_fragment( $fragments ) {
    if ( ! function_exists( 'WC' ) ) return $fragments;
    ob_start();
    $count  = WC()->cart->get_cart_contents_count();
    $total  = WC()->cart->get_cart_total();
    ?>
    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="act act-cart">
      <span class="act-ic">🛒</span>
      <span class="act-tx"><b><?php esc_html_e( 'Košík', 'strechy-partizanske' ); ?></b><small><?php echo (int) $count; ?> ks · <?php echo wp_kses_post( $total ); ?></small></span>
    </a>
    <?php
    $fragments['a.act-cart'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'sp_cart_fragment' );
