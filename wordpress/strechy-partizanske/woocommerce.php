<?php
/**
 * WooCommerce wrapper — pre shop, single produkt, kategórie atď.
 * Woo content sa renderuje cez woocommerce_content() s našim header/footer.
 *
 * @package StrechyPartizanske
 */

get_header();
woocommerce_content();
get_footer();
