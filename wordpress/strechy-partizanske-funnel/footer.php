<?php
/**
 * Footer
 *
 * @package StrechyPartizanskeFunnel
 */
$phone    = get_theme_mod( 'spf_phone',    '+421 38 749 12 34' );
$email    = get_theme_mod( 'spf_email',    'info@strechy-partizanske.sk' );
$shop_url = get_theme_mod( 'spf_shop_url', 'https://eshop.strechy.raffay.sk/' );
?>

<footer class="footer" role="contentinfo">
  <div class="container footer-inner">
    <div>
      <strong>Strechy Partizánske s.&nbsp;r.&nbsp;o.</strong>
      <?php if ( is_active_sidebar( 'footer-1' ) ) {
        dynamic_sidebar( 'footer-1' );
      } else { ?>
        <p>Námestie SNP 12<br>958 01 Partizánske</p>
        <p><?php echo esc_html( $phone ); ?><br><?php echo esc_html( $email ); ?></p>
      <?php } ?>
    </div>
    <div>
      <h5><?php esc_html_e( 'Eshop', 'strechy-partizanske-funnel' ); ?></h5>
      <?php if ( is_active_sidebar( 'footer-2' ) ) {
        dynamic_sidebar( 'footer-2' );
      } else { ?>
        <ul>
          <li><a href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Krytiny', 'strechy-partizanske-funnel' ); ?></a></li>
          <li><a href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Klampiarstvo', 'strechy-partizanske-funnel' ); ?></a></li>
          <li><a href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Izolácie', 'strechy-partizanske-funnel' ); ?></a></li>
          <li><a href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Strešné okná', 'strechy-partizanske-funnel' ); ?></a></li>
          <li><a href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Akcie', 'strechy-partizanske-funnel' ); ?></a></li>
        </ul>
      <?php } ?>
    </div>
    <div>
      <h5><?php esc_html_e( 'Služby', 'strechy-partizanske-funnel' ); ?></h5>
      <?php if ( is_active_sidebar( 'footer-3' ) ) {
        dynamic_sidebar( 'footer-3' );
      } else { ?>
        <ul>
          <li><a href="#kalkulacka"><?php esc_html_e( 'Kalkulačka strechy', 'strechy-partizanske-funnel' ); ?></a></li>
          <li><a href="#"><?php esc_html_e( 'Konzultácia projektu', 'strechy-partizanske-funnel' ); ?></a></li>
          <li><a href="#"><?php esc_html_e( 'Montáž', 'strechy-partizanske-funnel' ); ?></a></li>
          <li><a href="#"><?php esc_html_e( 'Doprava', 'strechy-partizanske-funnel' ); ?></a></li>
          <li><a href="#"><?php esc_html_e( 'Záruky', 'strechy-partizanske-funnel' ); ?></a></li>
        </ul>
      <?php } ?>
    </div>
    <div>
      <h5><?php esc_html_e( 'Info', 'strechy-partizanske-funnel' ); ?></h5>
      <?php if ( is_active_sidebar( 'footer-4' ) ) {
        dynamic_sidebar( 'footer-4' );
      } elseif ( has_nav_menu( 'footer' ) ) {
        wp_nav_menu( [
          'theme_location' => 'footer',
          'container'      => false,
          'menu_class'     => '',
          'depth'          => 1,
          'fallback_cb'    => false,
        ] );
      } else { ?>
        <ul>
          <li><a href="#"><?php esc_html_e( 'O nás', 'strechy-partizanske-funnel' ); ?></a></li>
          <li><a href="#"><?php esc_html_e( 'Realizácie', 'strechy-partizanske-funnel' ); ?></a></li>
          <li><a href="#"><?php esc_html_e( 'Blog · poradňa', 'strechy-partizanske-funnel' ); ?></a></li>
          <li><a href="#"><?php esc_html_e( 'Obchodné podmienky', 'strechy-partizanske-funnel' ); ?></a></li>
          <li><a href="#"><?php esc_html_e( 'Ochrana osobných údajov', 'strechy-partizanske-funnel' ); ?></a></li>
        </ul>
      <?php } ?>
    </div>
  </div>
  <div class="footer-bottom container">
    © <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> · IČO 12345678 · DIČ 2020123456 · <?php esc_html_e( 'Plne registrovaný platca DPH', 'strechy-partizanske-funnel' ); ?>
  </div>
</footer>

<!-- ====== STICKY BOTTOM CTA ====== -->
<div class="sticky-cta">
  <div class="container sticky-inner">
    <span><b><?php esc_html_e( 'Strecha do 7 dní', 'strechy-partizanske-funnel' ); ?></b> · <?php esc_html_e( 'kalkulácia zdarma · cena fixná na 30 dní', 'strechy-partizanske-funnel' ); ?></span>
    <a href="#kalkulacka" class="cta cta-sm"><?php esc_html_e( 'Spočítať cenu', 'strechy-partizanske-funnel' ); ?> →</a>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
