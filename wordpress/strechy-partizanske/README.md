# Strechy Partizánske — WordPress + WooCommerce theme

Štartovacia téma pre **strechy-partizanske.sk**. Obsahuje 2 plnohodnotné rozloženia:

- **Eshop** (homepage, kategórie, produkty, košík, checkout) — design podľa demo `mixall11.github.io/strechy-partizanske-demo/eshop/`
- **Funnel · Kalkulačka strechy** (lead-gen landing page so 11 sekciami) — podľa demo `mixall11.github.io/strechy-partizanske-demo/funnel-v1/`

**Verzia:** 1.0.0
**Min. WP:** 6.0 · **Min. PHP:** 7.4 · **WooCommerce:** odporúčaný 8.0+

## Inštalácia

1. Zazipuj priečinok `strechy-partizanske/` (bez nadradeného `wordpress/`).
2. WordPress admin → **Vzhľad → Témy → Nahrať tému** → vyber zip.
3. Aktivuj.
4. (Voliteľné) Nainštaluj a aktivuj **WooCommerce** plugin pre eshop funkcionalitu.

## Po aktivácii

### 1. Vytvor stránku „Kalkulačka" (funnel landing)
- **Stránky → Pridať novú** → titul „Kalkulácia strechy" (slug `kalkulacka`)
- V pravom paneli **Atribúty stránky → Šablóna** → vyber **„Funnel · Kalkulačka strechy"**
- Publikuj. Stránka teraz renderuje celý funnel (hero, pain, calc form, FAQ, …)
- Header sa automaticky prepne na funnel variant (logo + telefón + CTA)

### 2. Nastav menu (Vzhľad → Menu)
- Vytvor menu „Hlavné" → priraď k pozícii **„Hlavná navigácia"**
- Položky: Strešné krytiny, Klampiarstvo, Izolácie, Strešné okná, Doplnky, Realizácie, Akcie
- Vytvor menu „Footer" → priraď k pozícii **„Footer odkazy"**

### 3. Logo + telefón (Vzhľad → Prispôsobiť)
- **Identita stránky → Logo**: vlastný PNG/SVG (default `assets/img/logo.svg`)
- **Kontakt — Strechy Partizánske**:
  - `Telefón` (default `+421 38 749 12 34`) — používa funnel header + final-call
  - `Email pre kalkulácie` — kam chodia leady z formulára

### 4. Footer widgety (Vzhľad → Widgety)
- 4 widget zóny: **Footer stĺpec 1–4**

### 5. WooCommerce nastavenia
- Aktivuj WooCommerce, prejdi setup wizardom
- WooCommerce → Nastavenia → Produkty → 4 stĺpce, 12 produktov / strana (theme to filtruje)
- Importuj produkty (alebo začni s ručným pridaním)

## Funkcie

### Časová os zľavy (prebar — funnel aj eshop)
- **24h denný cyklus** 00:00 → 23:59:59 — zľava klesá z −25 % na −5 %
- Resetuje sa o polnoci. Žltý marker + plávajúci price pin sa posúvajú zľava-doprava.

### Osobná zľava cez meno
- **Pracovný deň + meno**: „Akcia pre Petra"
- **Pracovný deň bez mena**: CTA „pridaj meno pre osobnú zľavu" (klik → prompt)
- **Víkend**: „🎉 Víkendová akcia · pre všetkých" (meno sa nepoužíva)
- Meno uložené v `localStorage.sp_visitor_name`, zdieľané medzi funnel + eshop

### Funnel/kalkulačka — lead capture
- Form posielame na `admin-post.php?action=sp_calc`
- Spracovanie v `sp_handle_calc_submit()` (functions.php):
  - Honeypot (`sp_hp` field)
  - Nonce overenie
  - Email validácia
  - Notifikácia adminovi (`get_theme_mod('sp_email')`)
  - Confirmation email zákazníkovi
  - Action hook `do_action('sp_calc_submitted', $data)` — napoj si CRM (HubSpot/Brevo/Resend)
- Redirect späť s `?sp_calc=ok|error#kalkulacka` → success/error message v sekcii

### WooCommerce zladenie
- Shop loop a single product používajú brand farby (modrá #1565C0 + červená #D32F2F)
- Cart count v topbare sa updatuje cez AJAX fragment (`woocommerce_add_to_cart_fragments`)
- Custom shop card (`woocommerce/content-product.php`) replikuje `.prod` z eshop dema:
  badges (−% zľava, NOVINKA, SKLADOM), stock count, rating, regular+sale cena
- Single product má pod sebou USP bar (doprava, záruka, vrátenie, poradenstvo)
- 4-stĺpcový shop loop, 12 produktov / strana

## Štruktúra

```
strechy-partizanske/
├── style.css                       Theme header (Theme Name etc.)
├── functions.php                   Setup, enqueue, Woo hooks, calc handler, customizer
├── header.php                      Eshop default header (logo + search + cart)
├── header-funnel.php               Funnel variant (logo + tel + CTA)
├── footer.php                      Spoločný footer + widgety
├── index.php                       Default blog loop
├── front-page.php                  Eshop homepage
├── page.php                        Default page
├── single.php                      Single post
├── searchform.php                  Woo product search
├── woocommerce.php                 Wrapper pre Woo stránky bez vlastnej šablóny
├── README.md
├── page-templates/
│   └── template-funnel.php         „Funnel · Kalkulačka strechy" (Template Name)
├── woocommerce/
│   ├── archive-product.php         Shop archive s breadcrumb + toolbar
│   ├── single-product.php          Single product wrapper + USP bar
│   └── content-product.php         Card v štýle .prod z eshop dema
└── assets/
    ├── css/main.css                Hlavné štýly (eshop + funnel + Woo overrides)
    ├── js/countdown.js             Prebar časová os + meno + 3 módy
    └── img/logo.svg                Default logo
```

## Customizácia

### Hosting — jedna inštalácia vs dve?
WooCommerce je WordPress plugin, nedá sa nasadiť samostatne. Odporúčam **jednu WP inštaláciu**:
funnel landing na `/` alebo `/kalkulacka/`, eshop na `/obchod/`. Dve inštalácie majú zmysel
iba ak rozdeľuješ tímy, alebo eshop má 10k+ produktov.

### Zmena CTA destinácií
- `header-funnel.php` — link `topnav-shop` a `prebar-pin` cieľujú na Woo shop URL
- Ak nemáš WC aktívny, fallback je `home_url('/obchod/')`

### Zmena percentuálneho rozsahu zľavy
- `assets/js/countdown.js` riadok ~12 — `DISC_MAX = 25` a `DISC_MIN = 5`

### Vlastné brand farby
- `assets/css/main.css` riadky 6–28 — CSS premenné `--blue`, `--red`, `--yellow` atď.

### Lead capture mimo emailu
```php
add_action( 'sp_calc_submitted', function ( $data ) {
    // $data = ['plocha', 'typ', 'krytina', 'okna', 'email', 'telefon', 'gdpr', 'ip', 'time']
    // napoj na HubSpot, Brevo, Resend, vlastnú DB...
} );
```

## Známe limity / TODO

- [ ] Cart fragment AJAX update môže ukázať „0 ks" pri prvom load bez cookie — vyrieši prvé pridanie do košíka
- [ ] Žiadny child theme (uprav priamo, alebo si vytvor child)
- [ ] Žiadne Gutenberg block patterny
- [ ] Bez integrácie s konkrétnym CRM — pripoj cez `sp_calc_submitted` hook
- [ ] PDF generovanie pre kalkulačku (lead → PDF s rozpočtom) zatiaľ nie je — TODO

## Súvisiace projekty

- **Eshop demo (HTML)**: https://mixall11.github.io/strechy-partizanske-demo/eshop/
- **Funnel demo (HTML)**: https://mixall11.github.io/strechy-partizanske-demo/funnel-v1/
- **Brief**: `/home/michal/claude_projects/strechy-partizanske/CLAUDE.md`
- **Demos overview**: `/home/michal/claude_projects/strechy-partizanske/DEMOS_OVERVIEW.md`
