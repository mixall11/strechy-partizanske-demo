<?php
/**
 * Template Name: Funnel · Kalkulačka strechy
 * Template Post Type: page
 *
 * Plnohodnotná landing page pre lead capture (kalkulačka strechy).
 * Sekcie: hero · logobar · pain · promise · cases · calculator (lead form) ·
 *         bonuses · guarantee · reviews · faq · final · sticky CTA
 *
 * Form spracováva sp_handle_calc_submit() (functions.php) — admin-post.php
 * action=sp_calc. V produkcii nahrad'te POST handler napojením na Resend / HubSpot / Brevo / WP CRM.
 *
 * @package StrechyPartizanske
 */
get_header( 'funnel' );

$shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/obchod/' );
$status   = isset( $_GET['sp_calc'] ) ? sanitize_key( $_GET['sp_calc'] ) : '';
?>

<!-- ====== 1 · HERO ====== -->
<header class="hero">
  <div class="container hero-inner">
    <div class="hero-text">
      <span class="hero-tag"><?php esc_html_e( 'Strešná akcia 2026 · ušetríš 1 200 — 2 800 €', 'strechy-partizanske' ); ?></span>
      <h1><?php esc_html_e( 'Nová strecha pre rodinný dom', 'strechy-partizanske' ); ?> <span><?php esc_html_e( 'do 7 dní', 'strechy-partizanske' ); ?></span> — <?php esc_html_e( 'bez behania po obchodoch.', 'strechy-partizanske' ); ?></h1>
      <p class="hero-sub"><?php esc_html_e( 'Spočítaj si presnú cenu strechy', 'strechy-partizanske' ); ?> <b><?php esc_html_e( 'za 2 minúty', 'strechy-partizanske' ); ?></b>. <?php esc_html_e( 'Pošleme ti kompletný materiálový rozpis, fixnú cenu na 30 dní a termín montáže. Zadarmo, bez záväzku, do 24 hodín.', 'strechy-partizanske' ); ?></p>
      <ul class="hero-bullets">
        <li><span>✓</span> <?php esc_html_e( 'Kompletná dodávka — krytina, klampiarstvo, izolácia, doplnky', 'strechy-partizanske' ); ?></li>
        <li><span>✓</span> <?php esc_html_e( 'Cenová záruka 30 dní — pri objednávke do 7 dní bonus 5 %', 'strechy-partizanske' ); ?></li>
        <li><span>✓</span> <?php esc_html_e( 'Doprava zdarma do 60 km od Partizánskeho', 'strechy-partizanske' ); ?></li>
        <li><span>✓</span> <?php esc_html_e( '30 rokov záruka výrobcu na krytinu', 'strechy-partizanske' ); ?></li>
      </ul>
      <div class="hero-cta-row">
        <a href="#kalkulacka" class="cta cta-lg"><?php esc_html_e( 'Spočítať cenu strechy', 'strechy-partizanske' ); ?><small><?php esc_html_e( '2 minúty · zdarma · do 24 h dostaneš ponuku', 'strechy-partizanske' ); ?></small></a>
        <a href="<?php echo esc_url( $shop_url ); ?>" class="cta cta-lg cta-shop">🛒 <?php esc_html_e( 'Pozrieť eshop', 'strechy-partizanske' ); ?><small><?php esc_html_e( '1 240+ produktov skladom', 'strechy-partizanske' ); ?></small></a>
      </div>
      <div class="hero-trust">
        <span>★★★★★ <b>4,9 / 5</b> · <?php esc_html_e( '312 hodnotení Heureka', 'strechy-partizanske' ); ?></span>
        <span>·</span>
        <span><?php esc_html_e( 'Postavili sme', 'strechy-partizanske' ); ?> <b>1 240+ <?php esc_html_e( 'striech', 'strechy-partizanske' ); ?></b> <?php esc_html_e( 'od 2005', 'strechy-partizanske' ); ?></span>
      </div>
    </div>
    <aside class="hero-side">
      <div class="hero-vid">
        <div class="hv-icon">▶</div>
        <span><?php esc_html_e( '2 min video — ako spočítame tvoju strechu', 'strechy-partizanske' ); ?></span>
      </div>
      <div class="hero-stats">
        <div><b>7</b><span><?php esc_html_e( 'dní', 'strechy-partizanske' ); ?><br><?php esc_html_e( 'od objednávky', 'strechy-partizanske' ); ?></span></div>
        <div><b>30</b><span><?php esc_html_e( 'rokov', 'strechy-partizanske' ); ?><br><?php esc_html_e( 'záruka', 'strechy-partizanske' ); ?></span></div>
        <div><b>0&nbsp;€</b><span><?php esc_html_e( 'za', 'strechy-partizanske' ); ?><br><?php esc_html_e( 'kalkuláciu', 'strechy-partizanske' ); ?></span></div>
      </div>
    </aside>
  </div>
</header>

<!-- ====== 2 · LOGO BAR ====== -->
<section class="logobar">
  <div class="container">
    <p><?php esc_html_e( 'Pracujeme s krytinami a komponentami od:', 'strechy-partizanske' ); ?></p>
    <div class="logos">
      <span>BRAMAC</span><span>TONDACH</span><span>LINDAB</span><span>RUUKKI</span><span>BLACHOTRAPEZ</span><span>VELUX</span><span>ROCKWOOL</span>
    </div>
  </div>
</section>

<!-- ====== 3 · BOLESŤ ====== -->
<section class="section section-pain">
  <div class="container narrow">
    <h2 class="section-h"><?php esc_html_e( 'Spoznáš sa?', 'strechy-partizanske' ); ?> <span><?php esc_html_e( '3 chyby', 'strechy-partizanske' ); ?></span><?php esc_html_e( ', ktoré urobí 8 z 10 majiteľov rodinných domov pri výbere strechy.', 'strechy-partizanske' ); ?></h2>
    <p class="lead"><?php esc_html_e( 'Ak ich urobíš tiež, prerobíš o 1 800 — 6 000 € viac, než musíš. A za 5 — 8 rokov budeš strechu robiť znova.', 'strechy-partizanske' ); ?></p>

    <div class="pains">
      <div class="pain">
        <div class="pain-num">01</div>
        <h3><?php esc_html_e( 'Pýtaš si cenu len za krytinu.', 'strechy-partizanske' ); ?></h3>
        <p><?php esc_html_e( 'Predajca ti pošle 4 200 € za', 'strechy-partizanske' ); ?> <i><?php esc_html_e( '„plech“', 'strechy-partizanske' ); ?></i><?php esc_html_e( ', ale chýba lemovanie, vetracia mriežka, hrebenáč, podstrešná fólia, latovanie a klampiarstvo.', 'strechy-partizanske' ); ?> <b><?php esc_html_e( 'Reálna cena bude 8 200 €', 'strechy-partizanske' ); ?></b> <?php esc_html_e( 'a zistíš to až keď si na pol cesty.', 'strechy-partizanske' ); ?></p>
      </div>
      <div class="pain">
        <div class="pain-num">02</div>
        <h3><?php esc_html_e( 'Vyberáš si podľa najnižšej ceny za m².', 'strechy-partizanske' ); ?></h3>
        <p><?php esc_html_e( 'Lacná čínska oceľ s 0,4 mm hrúbkou a 10-ročnou zárukou ti za 7 — 8 rokov začne hrdzavieť pri spojoch.', 'strechy-partizanske' ); ?> <b><?php esc_html_e( 'Druhá strecha za 12 rokov', 'strechy-partizanske' ); ?></b> <?php esc_html_e( 'ťa stojí 2× toľko, ako keby si rovno zaplatil za kvalitu.', 'strechy-partizanske' ); ?></p>
      </div>
      <div class="pain">
        <div class="pain-num">03</div>
        <h3><?php esc_html_e( 'Nezohľadňuješ klampiarstvo a montáž.', 'strechy-partizanske' ); ?></h3>
        <p><?php esc_html_e( 'Krytina je 60 % nákladov, ale 90 % tečúcich striech tečie kvôli zlému lemovaniu komínov, žľabom a hrebeňom.', 'strechy-partizanske' ); ?> <b><?php esc_html_e( 'Šetríš 400 €', 'strechy-partizanske' ); ?></b> <?php esc_html_e( 'na klampiarstve,', 'strechy-partizanske' ); ?> <b><?php esc_html_e( 'platíš 4 000 €', 'strechy-partizanske' ); ?></b> <?php esc_html_e( 'za rekonštrukciu fasády po prvej zime.', 'strechy-partizanske' ); ?></p>
      </div>
    </div>

    <div class="pain-cta">
      <p><?php esc_html_e( 'Naša kalkulácia ti tieto 3 chyby vyrieši automaticky — zarátame všetko, čo skutočne potrebuješ. Žiadne dodatočné položky pri montáži.', 'strechy-partizanske' ); ?></p>
      <a href="#kalkulacka" class="cta"><?php esc_html_e( 'Chcem kompletnú kalkuláciu zdarma', 'strechy-partizanske' ); ?> →</a>
    </div>
  </div>
</section>

<!-- ====== 4 · SĽUB / SOLUTION ====== -->
<section class="section section-promise">
  <div class="container">
    <span class="eyebrow"><?php esc_html_e( 'Ako to robíme my', 'strechy-partizanske' ); ?></span>
    <h2 class="section-h light"><?php esc_html_e( 'Kompletná strecha bez prekvapení —', 'strechy-partizanske' ); ?> <span><?php esc_html_e( 'fixná cena, fixný termín, jedna zodpovednosť', 'strechy-partizanske' ); ?></span>.</h2>

    <div class="steps">
      <div class="step">
        <div class="step-n">1</div>
        <h3><?php esc_html_e( 'Vyplníš kalkulačku', 'strechy-partizanske' ); ?></h3>
        <p><?php esc_html_e( 'Zadáš pôdorys (ak nemáš plán, pošli foto z google maps), typ strechy a preferovanú krytinu. Trvá to 2 minúty.', 'strechy-partizanske' ); ?></p>
      </div>
      <div class="step">
        <div class="step-n">2</div>
        <h3><?php esc_html_e( 'Do 24 hodín dostaneš ponuku', 'strechy-partizanske' ); ?></h3>
        <p><?php esc_html_e( 'Pošleme ti PDF s kompletným zoznamom materiálu, presnou cenou, termínom dodávky a 3 alternatívami (low / mid / premium).', 'strechy-partizanske' ); ?></p>
      </div>
      <div class="step">
        <div class="step-n">3</div>
        <h3><?php esc_html_e( 'Doručíme alebo namontujeme', 'strechy-partizanske' ); ?></h3>
        <p><?php esc_html_e( 'Zoberieš si materiál sám, alebo ti zorganizujeme montáž s overenou partnerskou firmou.', 'strechy-partizanske' ); ?> <b><?php esc_html_e( 'Cena platí 30 dní.', 'strechy-partizanske' ); ?></b></p>
      </div>
    </div>

    <div class="pillars">
      <div class="pillar"><b>14&nbsp;<?php esc_html_e( 'rokov', 'strechy-partizanske' ); ?></b><span><?php esc_html_e( 'na trhu od 2012', 'strechy-partizanske' ); ?></span></div>
      <div class="pillar"><b>1&nbsp;240+</b><span><?php esc_html_e( 'striech v okolí Partizánskeho', 'strechy-partizanske' ); ?></span></div>
      <div class="pillar"><b>30&nbsp;<?php esc_html_e( 'rokov', 'strechy-partizanske' ); ?></b><span><?php esc_html_e( 'záruka výrobcu', 'strechy-partizanske' ); ?></span></div>
      <div class="pillar"><b>4,9 / 5</b><span><?php esc_html_e( 'priemerné hodnotenie', 'strechy-partizanske' ); ?></span></div>
    </div>
  </div>
</section>

<!-- ====== 5 · UKÁŽKA ====== -->
<section class="section section-grey">
  <div class="container">
    <span class="eyebrow"><?php esc_html_e( 'Naša práca', 'strechy-partizanske' ); ?></span>
    <h2 class="section-h"><?php esc_html_e( 'Strechy, ktoré sme dodali za posledných', 'strechy-partizanske' ); ?> <span><?php esc_html_e( '30 dní', 'strechy-partizanske' ); ?></span>.</h2>
    <p class="lead"><?php esc_html_e( 'Konkrétne projekty, konkrétne ceny, konkrétni zákazníci. Žiadne stockové foto.', 'strechy-partizanske' ); ?></p>

    <div class="cases">
      <article class="case">
        <div class="case-img">🏠</div>
        <div class="case-body">
          <h3><?php esc_html_e( 'Rodinný dom · Bošany', 'strechy-partizanske' ); ?></h3>
          <p class="case-meta">186 m² · <?php esc_html_e( 'sedlová strecha', 'strechy-partizanske' ); ?> · BRAMAC Tegalit antracit</p>
          <ul>
            <li><?php esc_html_e( 'Dodanie 6 dní od objednávky', 'strechy-partizanske' ); ?></li>
            <li><?php esc_html_e( 'Kompletná krytina + klampiarstvo + 6 strešných okien', 'strechy-partizanske' ); ?></li>
            <li><?php esc_html_e( 'Cena', 'strechy-partizanske' ); ?> <b>9 840 €</b> (<?php esc_html_e( 'kalkulácia bola', 'strechy-partizanske' ); ?> <b>9 920 €</b>)</li>
          </ul>
          <small>„<?php esc_html_e( 'Cena, ktorú prisľúbili, bola finálna cena. Nikto si nedoúčtoval.', 'strechy-partizanske' ); ?>" — <b>Marek H.</b>, <?php esc_html_e( 'apríl 2026', 'strechy-partizanske' ); ?></small>
        </div>
      </article>
      <article class="case">
        <div class="case-img">🏡</div>
        <div class="case-body">
          <h3><?php esc_html_e( 'Bungalov · Veľké Uherce', 'strechy-partizanske' ); ?></h3>
          <p class="case-meta">142 m² · <?php esc_html_e( 'valbová strecha', 'strechy-partizanske' ); ?> · LINDAB Click pozink</p>
          <ul>
            <li><?php esc_html_e( 'Falcovaná plechová krytina + skrytý žľab', 'strechy-partizanske' ); ?></li>
            <li><?php esc_html_e( 'Doplnená izolácia + parozábrana', 'strechy-partizanske' ); ?></li>
            <li><?php esc_html_e( 'Cena', 'strechy-partizanske' ); ?> <b>11 320 €</b> · <?php esc_html_e( 'termín 9 dní', 'strechy-partizanske' ); ?></li>
          </ul>
          <small>„<?php esc_html_e( 'Tretia ponuka, ktorú sme mali — a najpresnejšia. Ostatné firmy zabúdali na lemovanie.', 'strechy-partizanske' ); ?>" — <b>Lucia D.</b>, <?php esc_html_e( 'apríl 2026', 'strechy-partizanske' ); ?></small>
        </div>
      </article>
      <article class="case">
        <div class="case-img">🏘️</div>
        <div class="case-body">
          <h3><?php esc_html_e( 'Dvojdom · Partizánske', 'strechy-partizanske' ); ?></h3>
          <p class="case-meta">2× 124 m² · TONDACH Stodo 12 medená engoba</p>
          <ul>
            <li><?php esc_html_e( 'Pálená keramika s 33-ročnou zárukou', 'strechy-partizanske' ); ?></li>
            <li><?php esc_html_e( 'Dvojitá dodávka, jedna doprava — ušetrené 320 €', 'strechy-partizanske' ); ?></li>
            <li><?php esc_html_e( 'Cena spolu', 'strechy-partizanske' ); ?> <b>14 680 €</b></li>
          </ul>
          <small>„<?php esc_html_e( 'Susedia sa pýtali, kde sme to brali. Posunul som ich na vás.', 'strechy-partizanske' ); ?>" — <b>Roman K.</b>, <?php esc_html_e( 'marec 2026', 'strechy-partizanske' ); ?></small>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ====== 6 · KALKULAČKA ====== -->
<section class="section section-calc" id="kalkulacka">
  <div class="container narrow">
    <span class="eyebrow yellow"><?php esc_html_e( 'Tvoja cena za 2 minúty', 'strechy-partizanske' ); ?></span>
    <h2 class="section-h light"><?php esc_html_e( 'Kalkulačka strechy —', 'strechy-partizanske' ); ?> <span><?php esc_html_e( 'spočítaj a pošleme ti PDF do 24 hodín', 'strechy-partizanske' ); ?></span>.</h2>
    <p class="lead light"><?php esc_html_e( 'Žiadny telefonát, žiadny pushy obchodník. Dostaneš PDF s cenou, materiálom a termínom. Ak nesúhlasíš, jednoducho neodpíšeš — nikto ťa nebude obťažovať.', 'strechy-partizanske' ); ?></p>

    <?php if ( $status === 'ok' ) : ?>
      <div class="calc-message is-success" style="display:block;"><b><?php esc_html_e( 'Ďakujeme! Kalkulačná požiadavka prijatá.', 'strechy-partizanske' ); ?></b><br><?php esc_html_e( 'Do 24 hodín ti pošleme PDF s kompletným rozpočtom na uvedený email.', 'strechy-partizanske' ); ?></div>
    <?php elseif ( $status === 'error' ) : ?>
      <div class="calc-message is-error" style="display:block;"><b><?php esc_html_e( 'Niečo sa pokazilo.', 'strechy-partizanske' ); ?></b> <?php esc_html_e( 'Skontroluj email a skús znova, alebo nám zavolaj.', 'strechy-partizanske' ); ?></div>
    <?php endif; ?>

    <form class="calc" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
      <input type="hidden" name="action" value="sp_calc">
      <?php wp_nonce_field( 'sp_calc', 'sp_calc_nonce' ); ?>
      <input type="text" name="sp_hp" value="" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute; left:-9999px;">

      <div class="calc-row">
        <label><?php esc_html_e( 'Plocha strechy (m²)', 'strechy-partizanske' ); ?>
          <input type="number" name="plocha" placeholder="napr. 180" min="20" max="2000" required>
        </label>
        <label><?php esc_html_e( 'Typ strechy', 'strechy-partizanske' ); ?>
          <select name="typ">
            <option><?php esc_html_e( 'Sedlová', 'strechy-partizanske' ); ?></option>
            <option><?php esc_html_e( 'Valbová', 'strechy-partizanske' ); ?></option>
            <option><?php esc_html_e( 'Pultová', 'strechy-partizanske' ); ?></option>
            <option><?php esc_html_e( 'Manzardová', 'strechy-partizanske' ); ?></option>
            <option><?php esc_html_e( 'Plochá', 'strechy-partizanske' ); ?></option>
            <option><?php esc_html_e( 'Neviem / iné', 'strechy-partizanske' ); ?></option>
          </select>
        </label>
      </div>

      <div class="calc-row">
        <label><?php esc_html_e( 'Preferovaná krytina', 'strechy-partizanske' ); ?>
          <select name="krytina">
            <option><?php esc_html_e( 'Plechová falcovaná (LINDAB, RUUKKI)', 'strechy-partizanske' ); ?></option>
            <option><?php esc_html_e( 'Plechová trapézová (BLACHOTRAPEZ)', 'strechy-partizanske' ); ?></option>
            <option><?php esc_html_e( 'Pálená keramika (TONDACH)', 'strechy-partizanske' ); ?></option>
            <option><?php esc_html_e( 'Betónová (BRAMAC)', 'strechy-partizanske' ); ?></option>
            <option><?php esc_html_e( 'Bitumenová šindeľ', 'strechy-partizanske' ); ?></option>
            <option><?php esc_html_e( 'Neviem — poraďte mi', 'strechy-partizanske' ); ?></option>
          </select>
        </label>
        <label><?php esc_html_e( 'Strešné okná (ks)', 'strechy-partizanske' ); ?>
          <select name="okna">
            <option>0</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5+</option>
          </select>
        </label>
      </div>

      <div class="calc-row">
        <label><?php esc_html_e( 'Email (kam pošleme PDF)', 'strechy-partizanske' ); ?>
          <input type="email" name="email" placeholder="tvoj@email.sk" required>
        </label>
        <label><?php esc_html_e( 'Telefón (pre upresnenie, ak treba)', 'strechy-partizanske' ); ?>
          <input type="tel" name="telefon" placeholder="0905 123 456">
        </label>
      </div>

      <label class="calc-check">
        <input type="checkbox" name="gdpr" value="1" required checked>
        <?php esc_html_e( 'Súhlasím so spracovaním údajov (GDPR) — použijeme len na zaslanie ponuky.', 'strechy-partizanske' ); ?>
      </label>

      <button type="submit" class="cta cta-xl"><?php esc_html_e( 'Pošlite mi kalkuláciu zdarma', 'strechy-partizanske' ); ?> →<small><?php esc_html_e( 'Do 24 hodín · bez záväzku · v slovenčine', 'strechy-partizanske' ); ?></small></button>

      <div class="calc-trust">
        <span>🔒 <?php esc_html_e( 'Tvoje údaje neposúvame tretím stranám', 'strechy-partizanske' ); ?></span>
        <span>📩 <?php esc_html_e( 'PDF dostaneš na email — žiadny telefonický spam', 'strechy-partizanske' ); ?></span>
        <span>💬 <?php esc_html_e( 'Otázku rieši Michal Raffay osobne', 'strechy-partizanske' ); ?></span>
      </div>

      <p class="calc-disclaimer">ℹ <?php esc_html_e( 'Akciové zľavy', 'strechy-partizanske' ); ?> <b><?php esc_html_e( 'sa nedajú kombinovať', 'strechy-partizanske' ); ?></b> — <?php esc_html_e( 'pri súbehu viacerých akcií platí iba jedna z nich.', 'strechy-partizanske' ); ?></p>
    </form>
  </div>
</section>

<!-- ====== 7 · BONUS STACK ====== -->
<section class="section">
  <div class="container narrow">
    <span class="eyebrow"><?php esc_html_e( 'Ak objednáš do 7 dní od kalkulácie', 'strechy-partizanske' ); ?></span>
    <h2 class="section-h"><?php esc_html_e( 'Ako bonus dostaneš', 'strechy-partizanske' ); ?> <span><?php esc_html_e( '5 vecí v hodnote 1 280 €', 'strechy-partizanske' ); ?></span> — <?php esc_html_e( 'zadarmo.', 'strechy-partizanske' ); ?></h2>

    <ul class="bonuses">
      <li>
        <div class="bn-tag"><?php esc_html_e( 'Bonus 1', 'strechy-partizanske' ); ?></div>
        <div class="bn-body"><h4><?php esc_html_e( 'Konzultácia s projektantom (60 min)', 'strechy-partizanske' ); ?></h4><p><?php esc_html_e( 'Prejdeme tvoj projekt, navrhneme alternatívy a upozorníme na chyby v projekte.', 'strechy-partizanske' ); ?> <b><?php esc_html_e( 'Hodnota 180 €.', 'strechy-partizanske' ); ?></b></p></div>
        <div class="bn-val">180 €</div>
      </li>
      <li>
        <div class="bn-tag"><?php esc_html_e( 'Bonus 2', 'strechy-partizanske' ); ?></div>
        <div class="bn-body"><h4><?php esc_html_e( 'Doprava materiálu zdarma', 'strechy-partizanske' ); ?></h4><p><?php esc_html_e( 'Do 60 km od Partizánskeho dovezieme všetko v jednej dodávke, vrátane vyloženia.', 'strechy-partizanske' ); ?> <b><?php esc_html_e( 'Hodnota 220 €.', 'strechy-partizanske' ); ?></b></p></div>
        <div class="bn-val">220 €</div>
      </li>
      <li>
        <div class="bn-tag"><?php esc_html_e( 'Bonus 3', 'strechy-partizanske' ); ?></div>
        <div class="bn-body"><h4><?php esc_html_e( 'Predĺžená záruka 30 → 33 rokov', 'strechy-partizanske' ); ?></h4><p><?php esc_html_e( 'Pri objednávke do 7 dní ti zariadime predĺženú záruku výrobcu.', 'strechy-partizanske' ); ?> <b><?php esc_html_e( 'Hodnota 280 €.', 'strechy-partizanske' ); ?></b></p></div>
        <div class="bn-val">280 €</div>
      </li>
      <li>
        <div class="bn-tag"><?php esc_html_e( 'Bonus 4', 'strechy-partizanske' ); ?></div>
        <div class="bn-body"><h4><?php esc_html_e( '5 % zľava na klampiarstvo', 'strechy-partizanske' ); ?></h4><p><?php esc_html_e( 'Žľaby, lemovanie, komínové prechody — všetko s 5 % zľavou pri objednávke krytiny.', 'strechy-partizanske' ); ?> <b><?php esc_html_e( 'Priemerná úspora 380 €.', 'strechy-partizanske' ); ?></b></p></div>
        <div class="bn-val">380 €</div>
      </li>
      <li>
        <div class="bn-tag"><?php esc_html_e( 'Bonus 5', 'strechy-partizanske' ); ?></div>
        <div class="bn-body"><h4><?php esc_html_e( 'Doživotná podpora', 'strechy-partizanske' ); ?></h4><p><?php esc_html_e( 'Ak za 10 rokov budeš čokoľvek meniť (okno, doplnky), poradíme zdarma.', 'strechy-partizanske' ); ?> <b><?php esc_html_e( 'Hodnota 220 €.', 'strechy-partizanske' ); ?></b></p></div>
        <div class="bn-val">220 €</div>
      </li>
    </ul>

    <div class="bonus-total"><?php esc_html_e( 'Bonusy spolu:', 'strechy-partizanske' ); ?> <s>1 280 €</s> <b><?php esc_html_e( 'Pre teba 0 €', 'strechy-partizanske' ); ?></b></div>

    <a href="#kalkulacka" class="cta cta-block"><?php esc_html_e( 'Chcem kalkuláciu + 5 bonusov', 'strechy-partizanske' ); ?> →</a>
  </div>
</section>

<!-- ====== 8 · ZÁRUKA ====== -->
<section class="section section-guarantee">
  <div class="container narrow guarantee-wrap">
    <div class="g-seal">
      <div class="g-seal-inner">
        <small><?php esc_html_e( 'NAŠA', 'strechy-partizanske' ); ?></small>
        <b><?php esc_html_e( '30-dňová', 'strechy-partizanske' ); ?></b>
        <small><?php esc_html_e( 'cenová záruka', 'strechy-partizanske' ); ?></small>
      </div>
    </div>
    <div>
      <h2 class="section-h"><?php esc_html_e( 'Ak nedodržíme cenu z kalkulácie,', 'strechy-partizanske' ); ?> <span><?php esc_html_e( 'doplatíme rozdiel z vlastného', 'strechy-partizanske' ); ?></span>.</h2>
      <p><?php esc_html_e( 'Cena, ktorú ti pošleme v PDF, je fixná na 30 dní. Žiadne „bohužiaľ medzitým zdražela oceľ" alebo „toto sme vám nezarátali". Ak pri dodávke vznikne rozdiel, doplatíme ho my — máš to čierne na bielom v zmluve.', 'strechy-partizanske' ); ?></p>
      <p class="g-extra"><?php esc_html_e( 'A ak by si nebol spokojný s materiálom pri dodávke, máš', 'strechy-partizanske' ); ?> <b><?php esc_html_e( '14 dní na vrátenie', 'strechy-partizanske' ); ?></b> <?php esc_html_e( 'v pôvodnom obale s plnou refundáciou.', 'strechy-partizanske' ); ?></p>
    </div>
  </div>
</section>

<!-- ====== 9 · TESTIMONIALY ====== -->
<section class="section">
  <div class="container">
    <span class="eyebrow"><?php esc_html_e( 'Čo hovoria zákazníci', 'strechy-partizanske' ); ?></span>
    <h2 class="section-h"><?php esc_html_e( '312 ľudí v okolí Partizánskeho už zverilo', 'strechy-partizanske' ); ?> <span><?php esc_html_e( 'strechu nám', 'strechy-partizanske' ); ?></span>.</h2>

    <div class="reviews">
      <article class="review"><div class="rv-stars">★★★★★</div><p>„<?php esc_html_e( 'Mali sme 4 ponuky. Strechy Partizánske bolo o 380 € drahšie ako najlacnejšia, ale jediný, kto zarátal lemovanie komína a okolo strešných okien. Nakoniec sme ušetrili, pretože ostatní si to doúčtovali pri montáži.', 'strechy-partizanske' ); ?>"</p><small><b>Peter H.</b> · <?php esc_html_e( 'rodinný dom Topoľčany · marec 2026', 'strechy-partizanske' ); ?></small></article>
      <article class="review"><div class="rv-stars">★★★★★</div><p>„<?php esc_html_e( 'Stačilo poslať pôdorys cez email a do 8 hodín som mal kompletný rozpočet. Bez telefonátov, bez tlaku. Materiál prišiel za týždeň, zložili to za pol dňa.', 'strechy-partizanske' ); ?>"</p><small><b>Jana M.</b> · <?php esc_html_e( 'bungalov Bánovce nad Bebravou · február 2026', 'strechy-partizanske' ); ?></small></article>
      <article class="review"><div class="rv-stars">★★★★★</div><p>„<?php esc_html_e( 'Robil som už 2 strechy v rodine cez veľké hobby markety. Toto bola prvá strecha, kde mi nikto neprišiel s „to si treba doobjednať". Konečne firma, kde to vedia spočítať na prvý raz.', 'strechy-partizanske' ); ?>"</p><small><b>Roman K.</b> · <?php esc_html_e( 'dvojdom Partizánske · marec 2026', 'strechy-partizanske' ); ?></small></article>
      <article class="review"><div class="rv-stars">★★★★★</div><p>„<?php esc_html_e( 'Manželka chcela tehlovú TONDACH, ja som chcel lacnejší plech. Poslali nám obe varianty s presnými cenami a životnosťou. Vybrali sme tehlu — argument, že vydrží 50 rokov, presvedčil aj mňa.', 'strechy-partizanske' ); ?>"</p><small><b>Marek a Lucia D.</b> · <?php esc_html_e( 'novostavba Veľké Uherce · apríl 2026', 'strechy-partizanske' ); ?></small></article>
    </div>
  </div>
</section>

<!-- ====== 10 · FAQ ====== -->
<section class="section section-grey">
  <div class="container narrow">
    <span class="eyebrow"><?php esc_html_e( 'Najčastejšie otázky', 'strechy-partizanske' ); ?></span>
    <h2 class="section-h"><?php esc_html_e( 'Čo sa nás ľudia', 'strechy-partizanske' ); ?> <span><?php esc_html_e( 'najčastejšie pýtajú', 'strechy-partizanske' ); ?></span> <?php esc_html_e( 'pred objednávkou.', 'strechy-partizanske' ); ?></h2>

    <details class="faq" open>
      <summary><?php esc_html_e( 'Koľko bude reálne stáť strecha pre 150 m² rodinný dom?', 'strechy-partizanske' ); ?></summary>
      <p><?php esc_html_e( 'Závisí od krytiny: plechová falcovaná 7 800 — 9 200 €, pálená keramika 11 400 — 13 800 €, betónová BRAMAC 8 600 — 10 200 €.', 'strechy-partizanske' ); ?> <b><?php esc_html_e( 'V cene je všetko', 'strechy-partizanske' ); ?></b> — <?php esc_html_e( 'krytina, klampiarstvo, lemovanie, podstrešná fólia, latovanie, doprava. Žiadne skryté položky.', 'strechy-partizanske' ); ?></p>
    </details>
    <details class="faq">
      <summary><?php esc_html_e( 'Robíte aj montáž, alebo len dodávka materiálu?', 'strechy-partizanske' ); ?></summary>
      <p><?php esc_html_e( 'Robíme oboje. Ak chceš len materiál, dovezieme ho a poradíme. Ak chceš celú montáž, zorganizujeme ju s overenou partnerskou firmou — vždy konkrétny tím, ktorého poznáme z minulosti, nie outsourcing cez portál.', 'strechy-partizanske' ); ?></p>
    </details>
    <details class="faq">
      <summary><?php esc_html_e( 'Ako dlho trvá od objednávky po dodanie?', 'strechy-partizanske' ); ?></summary>
      <p><?php esc_html_e( 'Štandardná dodávka', 'strechy-partizanske' ); ?> <b><?php esc_html_e( '5 — 7 pracovných dní', 'strechy-partizanske' ); ?></b> <?php esc_html_e( 'pre plechové krytiny,', 'strechy-partizanske' ); ?> <b><?php esc_html_e( '10 — 14 dní', 'strechy-partizanske' ); ?></b> <?php esc_html_e( 'pre pálenú keramiku (objednávame z výroby). Pri urgentnej dodávke vieme zariadiť aj 48 hodín, ale len pre skladom dostupné položky.', 'strechy-partizanske' ); ?></p>
    </details>
    <details class="faq">
      <summary><?php esc_html_e( 'Čo ak po kalkulácii zistíme, že treba viac materiálu?', 'strechy-partizanske' ); ?></summary>
      <p><?php esc_html_e( 'Nič — cena je fixná. Kalkuláciu robíme s rezervou 5 %, takže drobné nepresnosti pokryjeme my. Ak by sa pôdorys líšil o viac ako 10 % od reality, prepočítame, ale to sa stáva veľmi zriedka.', 'strechy-partizanske' ); ?></p>
    </details>
    <details class="faq">
      <summary><?php esc_html_e( 'Aké platobné podmienky?', 'strechy-partizanske' ); ?></summary>
      <p><?php esc_html_e( 'Štandard: 30 % záloha pri objednávke, 70 % pri dodaní. Pre stálych zákazníkov a väčšie projekty (nad 12 000 €) ponúkame splátkový kalendár alebo financovanie cez Quatro.', 'strechy-partizanske' ); ?></p>
    </details>
    <details class="faq">
      <summary><?php esc_html_e( 'Robíte aj rekonštrukcie a opravy, nielen nové strechy?', 'strechy-partizanske' ); ?></summary>
      <p><?php esc_html_e( 'Áno. Rekonštrukcia je ~30 % našich projektov. Často stačí výmena časti krytiny + klampiarstva, nie celá strecha. V kalkulačke vyber „Neviem" a dohodneme obhliadku zdarma.', 'strechy-partizanske' ); ?></p>
    </details>
  </div>
</section>

<!-- ====== 11 · POSLEDNÝ CALL ====== -->
<section class="section section-final">
  <div class="container narrow center">
    <span class="eyebrow yellow"><?php esc_html_e( 'Posledná vec', 'strechy-partizanske' ); ?></span>
    <h2 class="section-h light final-h"><?php esc_html_e( 'Mesačne robíme', 'strechy-partizanske' ); ?> <span><?php esc_html_e( 'maximálne 18 striech', 'strechy-partizanske' ); ?></span>. <br><?php esc_html_e( 'Máj máme zaplnený, jún sa plní.', 'strechy-partizanske' ); ?></h2>
    <p class="lead light"><?php esc_html_e( 'Nepýtame sa preto, aby sme vyvíjali tlak. Ide o to, že materiál objednávame z výroby a kapacita partnerských montážnych firiem nie je nekonečná. Ak chceš strechu na leto 2026, dnes je správny deň poslať kalkuláciu.', 'strechy-partizanske' ); ?></p>

    <a href="#kalkulacka" class="cta cta-xl"><?php esc_html_e( 'Spočítať moju strechu', 'strechy-partizanske' ); ?> →<small><?php esc_html_e( '2 minúty · zdarma · do 24 h ponuku v emaili', 'strechy-partizanske' ); ?></small></a>

    <div class="final-or">— <?php esc_html_e( 'alebo', 'strechy-partizanske' ); ?> —</div>

    <?php $sp_phone = get_theme_mod( 'sp_phone', '+421 38 749 12 34' ); ?>
    <div class="final-alts">
      <a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $sp_phone ) ); ?>" class="alt-link">📞 <?php esc_html_e( 'Zavolať:', 'strechy-partizanske' ); ?> <b><?php echo esc_html( $sp_phone ); ?></b><small><?php esc_html_e( 'po — pia 8:00 — 17:00', 'strechy-partizanske' ); ?></small></a>
      <a href="<?php echo esc_url( $shop_url ); ?>" class="alt-link">🛒 <?php esc_html_e( 'Pozrieť si eshop', 'strechy-partizanske' ); ?><small><?php esc_html_e( '1 240+ produktov skladom', 'strechy-partizanske' ); ?></small></a>
    </div>
  </div>
</section>

<!-- ====== STICKY BOTTOM CTA ====== -->
<div class="sticky-cta">
  <div class="container sticky-inner">
    <span><b><?php esc_html_e( 'Strecha do 7 dní', 'strechy-partizanske' ); ?></b> · <?php esc_html_e( 'kalkulácia zdarma · cena fixná na 30 dní', 'strechy-partizanske' ); ?></span>
    <a href="#kalkulacka" class="cta cta-sm"><?php esc_html_e( 'Spočítať cenu', 'strechy-partizanske' ); ?> →</a>
  </div>
</div>

<?php get_footer(); ?>
