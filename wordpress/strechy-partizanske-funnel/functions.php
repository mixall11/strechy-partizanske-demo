<?php
/**
 * Strechy Partizánske · Funnel — theme bootstrap (no WooCommerce)
 *
 * @package StrechyPartizanskeFunnel
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SPF_THEME_VERSION', '1.0.0' );
define( 'SPF_THEME_DIR', get_stylesheet_directory() );
define( 'SPF_THEME_URI', get_stylesheet_directory_uri() );

/* ============================================================
 * Theme setup
 * ============================================================ */
function spf_setup() {
    load_theme_textdomain( 'strechy-partizanske-funnel', SPF_THEME_DIR . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 72,
        'flex-height' => true,
        'flex-width'  => true,
    ] );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption', 'style', 'script' ] );

    register_nav_menus( [
        'footer'  => __( 'Footer odkazy', 'strechy-partizanske-funnel' ),
    ] );
}
add_action( 'after_setup_theme', 'spf_setup' );

/* ============================================================
 * Enqueue assets
 * ============================================================ */
function spf_enqueue() {
    wp_enqueue_style(
        'spf-main',
        SPF_THEME_URI . '/assets/css/main.css',
        [],
        SPF_THEME_VERSION
    );

    wp_enqueue_style(
        'spf-inter',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap',
        [],
        null
    );

    wp_enqueue_script(
        'spf-countdown',
        SPF_THEME_URI . '/assets/js/countdown.js',
        [],
        SPF_THEME_VERSION,
        [ 'strategy' => 'defer', 'in_footer' => true ]
    );
}
add_action( 'wp_enqueue_scripts', 'spf_enqueue' );

/* ============================================================
 * Footer widgety
 * ============================================================ */
function spf_widgets_init() {
    for ( $i = 1; $i <= 4; $i++ ) {
        register_sidebar( [
            'name'          => sprintf( __( 'Footer stĺpec %d', 'strechy-partizanske-funnel' ), $i ),
            'id'            => 'footer-' . $i,
            'before_widget' => '<div class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5>',
            'after_title'   => '</h5>',
        ] );
    }
}
add_action( 'widgets_init', 'spf_widgets_init' );

/* ============================================================
 * Helper: logo URL
 * ============================================================ */
function spf_logo_url() {
    $custom = get_theme_mod( 'custom_logo' );
    if ( $custom ) {
        $img = wp_get_attachment_image_src( $custom, 'full' );
        if ( $img ) return $img[0];
    }
    return SPF_THEME_URI . '/assets/img/logo.svg';
}

/* ============================================================
 * Customizer — kontakt + linky
 * ============================================================ */
function spf_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'spf_contact', [
        'title'    => __( 'Kontakt — Strechy Partizánske', 'strechy-partizanske-funnel' ),
        'priority' => 35,
    ] );

    $wp_customize->add_setting( 'spf_phone', [
        'default'           => '+421 38 749 12 34',
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'spf_phone', [
        'label'   => __( 'Telefón', 'strechy-partizanske-funnel' ),
        'section' => 'spf_contact',
        'type'    => 'text',
    ] );

    $wp_customize->add_setting( 'spf_email', [
        'default'           => 'info@strechy-partizanske.sk',
        'sanitize_callback' => 'sanitize_email',
    ] );
    $wp_customize->add_control( 'spf_email', [
        'label'   => __( 'Email pre kalkulácie (kam chodia leady)', 'strechy-partizanske-funnel' ),
        'section' => 'spf_contact',
        'type'    => 'email',
    ] );

    $wp_customize->add_setting( 'spf_shop_url', [
        'default'           => 'https://eshop.strechy.raffay.sk/',
        'sanitize_callback' => 'esc_url_raw',
    ] );
    $wp_customize->add_control( 'spf_shop_url', [
        'label'       => __( 'Eshop URL (pre prebar pin + topnav)', 'strechy-partizanske-funnel' ),
        'description' => __( 'Cieľ pre tlačidlá „Eshop" a „Pozrieť eshop"', 'strechy-partizanske-funnel' ),
        'section'     => 'spf_contact',
        'type'        => 'url',
    ] );
}
add_action( 'customize_register', 'spf_customize_register' );

/* ============================================================
 * Calc form handler — admin-post.php?action=spf_calc
 * Honeypot + nonce + email validation. 2 emaily + action hook na CRM.
 * ============================================================ */
function spf_handle_calc_submit() {
    $referer = wp_get_referer() ?: home_url( '/' );

    if ( ! empty( $_POST['sp_hp'] ) ) {
        wp_safe_redirect( add_query_arg( 'sp_calc', 'ok', $referer ) . '#kalkulacka' );
        exit;
    }

    if ( empty( $_POST['sp_calc_nonce'] ) || ! wp_verify_nonce( $_POST['sp_calc_nonce'], 'spf_calc' ) ) {
        wp_safe_redirect( add_query_arg( 'sp_calc', 'error', $referer ) . '#kalkulacka' );
        exit;
    }

    $email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
    if ( ! is_email( $email ) ) {
        wp_safe_redirect( add_query_arg( 'sp_calc', 'error', $referer ) . '#kalkulacka' );
        exit;
    }

    $data = [
        'plocha'   => absint( $_POST['plocha'] ?? 0 ),
        'typ'      => sanitize_text_field( wp_unslash( $_POST['typ'] ?? '' ) ),
        'krytina'  => sanitize_text_field( wp_unslash( $_POST['krytina'] ?? '' ) ),
        'okna'     => sanitize_text_field( wp_unslash( $_POST['okna'] ?? '' ) ),
        'email'    => $email,
        'telefon'  => sanitize_text_field( wp_unslash( $_POST['telefon'] ?? '' ) ),
        'gdpr'     => ! empty( $_POST['gdpr'] ),
        'ip'       => $_SERVER['REMOTE_ADDR'] ?? '',
        'referer'  => esc_url_raw( $referer ),
        'time'     => current_time( 'mysql' ),
    ];

    $admin_email = get_theme_mod( 'spf_email', get_option( 'admin_email' ) );
    $body = "Nová kalkulačná požiadavka:\n\n";
    foreach ( $data as $k => $v ) $body .= sprintf( "%-10s : %s\n", $k, is_bool( $v ) ? ( $v ? 'áno' : 'nie' ) : $v );
    $subject = sprintf( '[Kalkulačka] %s m² · %s · %s', $data['plocha'], $data['typ'], $email );
    wp_mail( $admin_email, $subject, $body );

    $thank = sprintf(
        "Ďakujeme za požiadavku. Do 24 hodín ti pošleme kompletný rozpočet.\n\n— Strechy Partizánske\n%s",
        $admin_email
    );
    wp_mail( $email, 'Tvoja kalkulácia strechy', $thank );

    do_action( 'spf_calc_submitted', $data );

    wp_safe_redirect( add_query_arg( 'sp_calc', 'ok', $referer ) . '#kalkulacka' );
    exit;
}
add_action( 'admin_post_nopriv_spf_calc', 'spf_handle_calc_submit' );
add_action( 'admin_post_spf_calc',         'spf_handle_calc_submit' );
