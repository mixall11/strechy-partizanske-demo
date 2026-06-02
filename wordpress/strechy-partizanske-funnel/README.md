# Strechy Partizánske · Funnel — WordPress theme

Single-purpose lead-gen landing page (kalkulačka strechy) pre `web.raffay.sk` alebo akýkoľvek samostatný funnel sub-web. **Bez WooCommerce závislosti.**

Postavené podľa demo: https://mixall11.github.io/strechy-partizanske-demo/funnel-v1/

**Verzia:** 1.0.0 · **Min. WP:** 6.0 · **Min. PHP:** 7.4

## Inštalácia

1. Zazipuj priečinok `strechy-partizanske-funnel/`.
2. wp-admin → **Vzhľad → Témy → Pridať novú → Nahrať tému** → vyber zip.
3. Aktivuj.

Hotovo. Front page automaticky renderuje funnel landing — žiadny ďalší setup nutný.

## Po aktivácii (voliteľné)

### Customizer (Vzhľad → Prispôsobiť → Kontakt — Strechy Partizánske)
- **Telefón** (default `+421 38 749 12 34`) — používa header + final-call sekcia
- **Email pre kalkulácie** — kam chodia leady z formulára
- **Eshop URL** (default `https://eshop.strechy.raffay.sk/`) — cieľ pre tlačidlá „Eshop" a prebar pin

### Logo (Vzhľad → Prispôsobiť → Identita stránky)
- Default logo je `assets/img/logo.svg`
- Vlastný PNG/SVG: Customizer → Identita stránky → Logo

### Footer widgety (Vzhľad → Widgety)
- 4 widget zóny: **Footer stĺpec 1–4** — ak sú prázdne, footer má fallback obsah

### Reading settings (Nastavenia → Čítanie)
- Nastav **„Statickú stránku ako titulnú"** = `front-page` automaticky funguje bez tohto, ale ak chceš môžeš si vytvoriť WP page „Domov" a nastaviť ju
- (Bez nastavenia: front-page.php sa zobrazí na `/`)

## Sekcie funnel landing page

1. **Hero** — hook + 2 CTA (kalkulačka + eshop) + trust badges
2. **Logo bar** — značky materiálu (BRAMAC, TONDACH, LINDAB...)
3. **Pain section** — 3 chyby pri výbere strechy
4. **Promise / solution** — 3 kroky procesu + 4 piliers (rokov, striech, záruka, rating)
5. **Cases** — 3 nedávne projekty s cenami
6. **Calculator** — lead capture formulár (plocha, typ, krytina, okná, email, telefón)
7. **Bonuses** — 5 bonusov v hodnote 1 280 € pri objednávke do 7 dní
8. **Guarantee** — 30-dňová cenová záruka
9. **Reviews** — 4 testimoniály
10. **FAQ** — 6 otázok s rozbaľovacími odpoveďami
11. **Final call** — scarcity + telefón + eshop link
12. **Sticky bottom CTA** — vždy viditeľné

## Funkcie

### Časová os zľavy (prebar)
- 24h denný cyklus (00:00 → 23:59:59) — zľava klesá z −25 % na −5 %
- Žltý marker + plávajúci price pin sa posúvajú zľava-doprava
- 3 módy podľa dňa/mena:
  - **Pracovný deň + meno**: „Akcia pre Petra"
  - **Pracovný deň bez mena**: CTA „pridaj meno pre osobnú zľavu" (klik → prompt)
  - **Víkend**: „🎉 Víkendová akcia · pre všetkých"
- Meno uložené v `localStorage.sp_visitor_name` (zdieľané s eshop sub-webom ak je na rovnakej doméne)

### Lead capture
- Form posiela na `admin-post.php?action=spf_calc`
- Spracovanie v `spf_handle_calc_submit()` (functions.php):
  - Honeypot (`sp_hp` field)
  - Nonce verification
  - Email validácia
  - Notifikácia adminovi (`get_theme_mod('spf_email')`)
  - Confirmation email zákazníkovi
  - Action hook `do_action('spf_calc_submitted', $data)` — napoj si CRM
- Redirect späť s `?sp_calc=ok|error#kalkulacka` → success/error message v sekcii

## Štruktúra

```
strechy-partizanske-funnel/
├── style.css                  Theme header
├── functions.php              Setup, enqueue, calc handler, customizer
├── header.php                 Prebar + topbar (logo + tel + CTA)
├── footer.php                 Footer (4 widget zóny) + sticky CTA
├── front-page.php             Funnel landing (11 sekcií)
├── index.php                  Default fallback
├── page.php                   Default page template
├── README.md
└── assets/
    ├── css/main.css           Funnel štýly + WP kompatibilita
    ├── js/countdown.js        24h cyklus + meno + 3 módy
    └── img/logo.svg           Default logo
```

## Customizácia

### Lead capture — napojenie na CRM
```php
// V child theme alebo mu-plugin
add_action( 'spf_calc_submitted', function ( $data ) {
    // $data = ['plocha', 'typ', 'krytina', 'okna', 'email', 'telefon', 'gdpr', 'ip', 'time']
    // Príklad: HubSpot
    wp_remote_post( 'https://api.hubapi.com/crm/v3/objects/contacts', [
        'headers' => [ 'Authorization' => 'Bearer ' . HUBSPOT_KEY, 'Content-Type' => 'application/json' ],
        'body'    => wp_json_encode( [ 'properties' => [
            'email' => $data['email'],
            'phone' => $data['telefon'],
            'roof_size_m2' => $data['plocha'],
            'roof_type' => $data['typ'],
        ] ] ),
    ] );
} );
```

### Zmena percentuálneho rozsahu zľavy
- `assets/js/countdown.js` riadok ~12 — `DISC_MAX = 25` a `DISC_MIN = 5`

### Vlastné brand farby
- `assets/css/main.css` riadky 6–28 — CSS premenné `--blue`, `--red`, `--yellow` atď.

## Vzťah k druhému themu

V tomto projekte existujú **dva themy**:

| Theme | Pre | Funkcia |
|-------|-----|---------|
| `strechy-partizanske-funnel` | `web.raffay.sk` | Funnel landing (tento) |
| `strechy-partizanske` | `eshop.strechy.raffay.sk` | Eshop + WooCommerce |

Themy zdieľajú design language (modrá #1565C0 + červená #D32F2F + žltá #FBC02D + Inter font) a 24h prebar logiku — `localStorage.sp_visitor_name` je rovnaký, takže meno zadané na funneli sa premietne do eshop pre-baru a naopak.

## Súvisiace projekty

- **Funnel demo (HTML)**: https://mixall11.github.io/strechy-partizanske-demo/funnel-v1/
- **Eshop demo (HTML)**: https://mixall11.github.io/strechy-partizanske-demo/eshop/
- **Brief**: `/home/michal/claude_projects/strechy-partizanske/CLAUDE.md`
