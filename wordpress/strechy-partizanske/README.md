# Strechy Partizánske — WordPress + WooCommerce theme

Štartovacia téma pre eshop **strechy-partizanske.sk** postavená na designe demo eshopu (mixall11.github.io/strechy-partizanske-demo/eshop/).

**Verzia:** 1.0.0
**Min. WP:** 6.0 · **Min. PHP:** 7.4 · **WooCommerce:** odporúčaný 8.0+

## Inštalácia

1. Zazipuj priečinok `strechy-partizanske/` (bez nadradeného `wordpress/`).
2. WordPress admin → **Vzhľad → Témy → Nahrať tému** → vyber zip.
3. Aktivuj.
4. (Voliteľné) Nainštaluj a aktivuj **WooCommerce** plugin pre eshop funkcionalitu.

## Po aktivácii

### 1. Nastav menu (Vzhľad → Menu)
- Vytvor menu s názvom „Hlavné" → priraď k pozícii **„Hlavná navigácia"**
- Položky: Strešné krytiny, Klampiarstvo, Izolácie, Strešné okná, Doplnky, Realizácie, Akcie −20 %
- Vytvor menu „Footer" → priraď k pozícii **„Footer odkazy"**

### 2. Nastav logo (Vzhľad → Prispôsobiť → Identita stránky)
- Default logo je `assets/img/logo.svg`
- Pre nahranie vlastného: Customizer → Identita stránky → Logo

### 3. Vytvor stránku „Kalkulačka" (slug `kalkulacka`)
- Funnel/kalkulačka link sa automaticky objaví v topbare a homepage CTA banneri
- Ak nemáš túto stránku, linky sa skryjú

### 4. Footer widgety (Vzhľad → Widgety)
- 4 widget zóny: **Footer stĺpec 1–4**
- Stĺpec 1 default: kontakt (adresa, telefón) — z theme fallback ak prázdny

### 5. WooCommerce nastavenia
- WooCommerce → Nastavenia → Produkty → odporúčam 4 stĺpce, 12 produktov / strana
- Theme tieto hodnoty filtruje cez `loop_shop_columns` a `loop_shop_per_page`

## Funkcie

### Časová os zľavy (prebar)
- **24h denný cyklus** 00:00 → 23:59:59 — zľava klesá z −25 % na −5 %
- Resetuje sa o polnoci
- Žltý marker + plávajúci price pin sa posúvajú zľava-doprava

### Osobná zľava cez meno
- **Pracovný deň + meno**: „Akcia pre Petra"
- **Pracovný deň bez mena**: CTA „pridaj meno pre osobnú zľavu" (klik → prompt)
- **Víkend (sob/ned)**: „🎉 Víkendová akcia · pre všetkých" (meno sa nepoužíva)
- Meno uložené v `localStorage.sp_visitor_name`

### WooCommerce zladenie
- Shop loop, single product, cart, checkout používajú brand farby (modrá #1565C0 + červená #D32F2F)
- Cart count v topbare sa updatuje cez AJAX fragment
- 4-stĺpcový shop loop, 12 produktov / strana

## Štruktúra

```
strechy-partizanske/
├── style.css                    Theme header (CSS je v assets/css/main.css)
├── functions.php                Theme setup, enqueue, Woo hooks
├── header.php                   Prebar + topbar
├── footer.php                   Footer + widgety
├── index.php                    Default loop
├── front-page.php               Homepage (hero + USPs + kategórie + bundle + reviews)
├── page.php                     Default page
├── single.php                   Single post
├── searchform.php               Woo product search
├── woocommerce.php              Wrapper pre Woo stránky
├── README.md                    Tento súbor
└── assets/
    ├── css/main.css             Hlavné štýly (24 h cyklus + Woo overrides)
    ├── js/countdown.js          Časová os + meno + 3 módy
    └── img/logo.svg             Default logo (modrá s 2 červenými šípmi)
```

## Customizácia

### Zmena CTA destinácií
- `header.php` — link `prebar-pin` smeruje na shop (alebo `/akcie` ak Woo nie je aktívny)
- Zmeň podľa potreby

### Zmena percentuálneho rozsahu zľavy
- `assets/js/countdown.js` riadok 11 — `DISC_MAX = 25` a `DISC_MIN = 5`

### Zmena dĺžky cyklu
- `assets/js/countdown.js` `DAY_SEC = 86400` (24 h v sekundách)
- Pre 12h cyklus zmeň na `43200` a uprav text v `pillEl`

### Vypnutie name personalizácie
- V `countdown.js` v `tick()` natvrdo nastav `var name = '';` na začiatku

### Vlastné brand farby
- `assets/css/main.css` riadky 6–32 — CSS premenné `--blue`, `--red`, `--yellow` atď.

## Známe limity / TODO

- [ ] Žiadne Customizer settings (telefón, IČO, adresa sú v `header.php` / `footer.php` natvrdo — alebo cez widgety)
- [ ] Žiadne block patterny pre Gutenberg
- [ ] Žiadny child theme (treba upraviť priamo, alebo si vytvor child)
- [ ] Cart fragment AJAX update funguje len keď Woo cart je inicializovaný (pri prvom načítaní stránky bez cookie môže byť 0)

## Súvisiace projekty

- **Demo (HTML)**: https://mixall11.github.io/strechy-partizanske-demo/eshop/
- **Funnel (HTML)**: https://mixall11.github.io/strechy-partizanske-demo/funnel-v1/
- **Brief**: `/home/michal/claude_projects/strechy-partizanske/CLAUDE.md`
