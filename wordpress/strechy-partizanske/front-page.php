<?php
/**
 * Homepage — hero + USPs + kategórie + funnel banner + top produkty + bundle + reviews + newsletter
 * Ak je WooCommerce aktívny, kategórie a produkty ťahá z neho. Inak fallback statické demo.
 *
 * @package StrechyPartizanske
 */

get_header();
$has_woo = function_exists( 'WC' );
?>

<!-- ====== HERO ====== -->
<section class="hero">
  <div class="container hero-inner">
    <div class="hero-text">
      <span class="hero-tag"><?php esc_html_e( 'Akcia mája 2026', 'strechy-partizanske' ); ?></span>
      <h1><?php esc_html_e( 'Komplet strecha pre rodinný dom', 'strechy-partizanske' ); ?> <span><?php esc_html_e( 'od 7 800 €', 'strechy-partizanske' ); ?></span></h1>
      <p class="hero-sub"><?php esc_html_e( 'Krytina + klampiarstvo + izolácia + doprava. Skladom', 'strechy-partizanske' ); ?> <b>1 240+ <?php esc_html_e( 'produktov', 'strechy-partizanske' ); ?></b>. <?php esc_html_e( 'Doručíme do 7 dní, cena fixná na 30 dní.', 'strechy-partizanske' ); ?></p>
      <div class="hero-cta">
        <?php if ( $has_woo ) : ?>
          <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Pozrieť eshop', 'strechy-partizanske' ); ?> →</a>
        <?php endif; ?>
        <?php $kalk = get_page_by_path( 'kalkulacka' );
        if ( $kalk ) : ?>
          <a href="<?php echo esc_url( get_permalink( $kalk ) ); ?>" class="btn btn-outline">📐 <?php esc_html_e( 'Spočítať cenu strechy', 'strechy-partizanske' ); ?></a>
        <?php endif; ?>
      </div>
      <div class="hero-stats">
        <div><b>1 240+</b><span><?php esc_html_e( 'produktov skladom', 'strechy-partizanske' ); ?></span></div>
        <div><b>4,9 / 5</b><span><?php esc_html_e( '312 hodnotení Heureka', 'strechy-partizanske' ); ?></span></div>
        <div><b>7 dní</b><span><?php esc_html_e( 'typická dodávka', 'strechy-partizanske' ); ?></span></div>
      </div>
    </div>
    <aside class="hero-promo">
      <div class="promo-badge">−20 %</div>
      <h3>BRAMAC Tegalit</h3>
      <p><?php esc_html_e( 'Betónová krytina antracit · skladom 8 200 ks', 'strechy-partizanske' ); ?></p>
      <div class="promo-price">
        <s>14,80 € / m²</s>
        <b>11,80 € / m²</b>
      </div>
      <?php if ( $has_woo ) : ?>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-primary btn-block"><?php esc_html_e( 'Kúpiť teraz', 'strechy-partizanske' ); ?> →</a>
      <?php endif; ?>
      <small>⚠ <?php esc_html_e( 'Akcia končí 15. 5. · zostáva 1 280 m²', 'strechy-partizanske' ); ?></small>
    </aside>
  </div>
</section>

<!-- ====== USPs ====== -->
<section class="usps">
  <div class="container usps-inner">
    <div class="usp"><span>🚚</span><b><?php esc_html_e( 'Doprava zdarma', 'strechy-partizanske' ); ?></b><small><?php esc_html_e( 'nad 500 € · 60 km', 'strechy-partizanske' ); ?></small></div>
    <div class="usp"><span>🛡️</span><b><?php esc_html_e( '30 rokov záruka', 'strechy-partizanske' ); ?></b><small><?php esc_html_e( 'výrobcu na krytinu', 'strechy-partizanske' ); ?></small></div>
    <div class="usp"><span>↩️</span><b><?php esc_html_e( '14 dní vrátenie', 'strechy-partizanske' ); ?></b><small><?php esc_html_e( 'v pôvodnom obale', 'strechy-partizanske' ); ?></small></div>
    <div class="usp"><span>💳</span><b><?php esc_html_e( 'Splátky Quatro', 'strechy-partizanske' ); ?></b><small><?php esc_html_e( 'nad 12 000 €', 'strechy-partizanske' ); ?></small></div>
    <div class="usp"><span>📞</span><b><?php esc_html_e( 'Poradenstvo zdarma', 'strechy-partizanske' ); ?></b><small><?php esc_html_e( 'pred objednávkou', 'strechy-partizanske' ); ?></small></div>
  </div>
</section>

<!-- ====== KATEGÓRIE ====== -->
<?php if ( $has_woo ) :
  $cats = get_terms( [
    'taxonomy'   => 'product_cat',
    'hide_empty' => false,
    'parent'     => 0,
    'number'     => 8,
  ] );
?>
<section class="section">
  <div class="container">
    <span class="eyebrow"><?php esc_html_e( 'Sortiment', 'strechy-partizanske' ); ?></span>
    <h2 class="sec-h"><?php esc_html_e( 'Vyber si', 'strechy-partizanske' ); ?> <span><?php esc_html_e( 'kategóriu', 'strechy-partizanske' ); ?></span></h2>
    <p class="lead"><?php esc_html_e( '8 hlavných kategórií · expedícia do 24 h.', 'strechy-partizanske' ); ?></p>

    <div class="cat-grid">
      <?php if ( ! is_wp_error( $cats ) && $cats ) : foreach ( $cats as $cat ) :
        $thumb_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
        $img = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'medium' ) : '';
      ?>
        <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>" class="cat">
          <div class="cat-ic"><?php echo $img ? '<img src="' . esc_url( $img ) . '" alt="" loading="lazy">' : '🏠'; ?></div>
          <h3><?php echo esc_html( $cat->name ); ?></h3>
          <small><?php echo (int) $cat->count; ?> <?php esc_html_e( 'produktov', 'strechy-partizanske' ); ?></small>
        </a>
      <?php endforeach; endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ====== FUNNEL CTA ====== -->
<?php if ( $kalk = get_page_by_path( 'kalkulacka' ) ) : ?>
<section class="funnel-banner">
  <div class="container fb-inner">
    <div>
      <span class="fb-eye">📐 <?php esc_html_e( 'Nevieš si vybrať?', 'strechy-partizanske' ); ?></span>
      <h2><?php esc_html_e( 'Spočítaj si cenu celej strechy', 'strechy-partizanske' ); ?> <span><?php esc_html_e( 'za 2 minúty', 'strechy-partizanske' ); ?></span></h2>
      <p><?php esc_html_e( 'Pošleme ti PDF s kompletným materiálom, fixnou cenou na 30 dní a termínom dodávky. Zdarma, bez záväzku.', 'strechy-partizanske' ); ?></p>
    </div>
    <div class="fb-cta">
      <a href="<?php echo esc_url( get_permalink( $kalk ) ); ?>" class="btn btn-yellow btn-lg"><?php esc_html_e( 'Spustiť kalkulačku', 'strechy-partizanske' ); ?> →</a>
      <small><?php esc_html_e( 'do 24 h dostaneš ponuku v emaili', 'strechy-partizanske' ); ?></small>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ====== TOP PRODUKTY ====== -->
<?php if ( $has_woo ) : ?>
<section class="section section-grey">
  <div class="container">
    <div class="sec-head">
      <div>
        <span class="eyebrow"><?php esc_html_e( 'Najpredávanejšie', 'strechy-partizanske' ); ?></span>
        <h2 class="sec-h"><?php esc_html_e( 'Top produkty', 'strechy-partizanske' ); ?> <span><?php esc_html_e( 'tento mesiac', 'strechy-partizanske' ); ?></span></h2>
      </div>
      <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="link-all"><?php esc_html_e( 'Všetky produkty', 'strechy-partizanske' ); ?> →</a>
    </div>

    <?php echo do_shortcode( '[products limit="8" columns="4" orderby="popularity" class="prod-grid"]' ); ?>
  </div>
</section>
<?php endif; ?>

<!-- ====== TESTIMONIÁLY ====== -->
<section class="section">
  <div class="container">
    <div class="sec-head">
      <div>
        <span class="eyebrow"><?php esc_html_e( 'Hodnotenia', 'strechy-partizanske' ); ?></span>
        <h2 class="sec-h">312 <?php esc_html_e( 'zákazníkov hodnotí', 'strechy-partizanske' ); ?> <span>4,9 / 5</span></h2>
      </div>
      <a href="https://obchody.heureka.sk/strechy-partizanske/recenze/" class="link-all heureka-badge" rel="noopener">★ Heureka.sk →</a>
    </div>

    <div class="rev-grid">
      <article class="rev"><div class="rv-stars">★★★★★</div><p>„BRAMAC Tegalit prišlo do 5 dní, balené na palete s vyložením. Cena bola presne ako v kalkulačke."</p><small><b>Peter H.</b> · marec 2026 · overený nákup</small></article>
      <article class="rev"><div class="rv-stars">★★★★★</div><p>„Volal som a hneď mi vedeli povedať, čo dokúpiť k strešným oknám. Nikdy som nemal pri eshope taký servis."</p><small><b>Jana M.</b> · február 2026 · overený nákup</small></article>
      <article class="rev"><div class="rv-stars">★★★★★</div><p>„Komplet strecha za 2 890 € — neuveriteľné. Susedia si robili to isté za 4 200 € v hobby markete."</p><small><b>Roman K.</b> · marec 2026 · overený nákup</small></article>
    </div>
  </div>
</section>

<!-- ====== NEWSLETTER ====== -->
<section class="newsletter">
  <div class="container news-inner">
    <div>
      <h2><?php esc_html_e( '5 % zľava na prvý nákup', 'strechy-partizanske' ); ?></h2>
      <p><?php esc_html_e( 'Prihlás sa na newsletter — pošleme ti kupón a 1× mesačne tipy z dielne.', 'strechy-partizanske' ); ?></p>
    </div>
    <form class="news-form" method="post" action="#">
      <input type="email" name="email" placeholder="tvoj@email.sk" required>
      <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Získať kupón', 'strechy-partizanske' ); ?> →</button>
    </form>
  </div>
</section>

<?php get_footer(); ?>
