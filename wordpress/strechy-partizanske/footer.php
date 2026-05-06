<?php
/**
 * Footer
 *
 * @package StrechyPartizanske
 */
?>

<footer class="footer" role="contentinfo">
  <div class="container footer-grid">
    <div>
      <img src="<?php echo esc_url( sp_logo_url() ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="72" height="60" style="margin-bottom:14px;">
      <strong><?php bloginfo( 'name' ); ?></strong>
      <?php if ( is_active_sidebar( 'footer-1' ) ) {
        dynamic_sidebar( 'footer-1' );
      } else { ?>
        <p>Námestie SNP 12<br>958 01 Partizánske</p>
        <p>+421 38 749 12 34<br>info@strechy-partizanske.sk</p>
      <?php } ?>
    </div>

    <?php for ( $i = 2; $i <= 4; $i++ ) :
      if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
        <div><?php dynamic_sidebar( 'footer-' . $i ); ?></div>
      <?php endif;
    endfor; ?>

    <?php if ( ! is_active_sidebar( 'footer-2' ) && has_nav_menu( 'footer' ) ) : ?>
      <div>
        <h5><?php esc_html_e( 'Info', 'strechy-partizanske' ); ?></h5>
        <?php
        wp_nav_menu( [
          'theme_location' => 'footer',
          'container'      => false,
          'menu_class'     => '',
          'depth'          => 1,
          'fallback_cb'    => false,
        ] );
        ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="container footer-bottom">
    © <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> · IČO 12345678 · DIČ 2020123456
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
