# Strechy Partizánske — Shoptet setup playbook

> **Dôležité:** Shoptet je **SaaS** (hosted) — nemôžeš ho rozbaliť lokálne. Všetko sa robí v ich admin paneli po prihlásení.
> **Verzia:** Shoptet má aj `shoptet.cz` aj `shoptet.sk` — pre slovenský trh **odporúčam shoptet.sk** (slovenská lokalizácia, EUR, slovenský support, prepojenie na slovenské doručovateľské služby — SPS, GLS SK, Packeta SK).

## Krok 1 — založiť trial (15 min)

1. Choď na **https://www.shoptet.sk** → **Vytvoriť eshop** (alebo `shoptet.cz`, ak chceš CZ)
2. **30-dňová bezplatná skúška** — žiadna karta sa nevyžaduje
3. Vyber si:
   - Doménu: `strechy-partizanske.shoptet.sk` (technická, neskôr presmeruješ)
   - Šablónu: **MyShop** alebo **Stylefarm** (najlepšie pre roofing — čistý B2C/B2B vzhľad, dobre pasuje na produkty s farebnými variantami)
4. Po kliknutí **Vytvoriť eshop** dostaneš email s prístupom do adminu

## Krok 2 — základné nastavenia (20 min)

V admin paneli (`admin.strechy-partizanske.shoptet.sk`):

| Sekcia | Nastav |
|---|---|
| **Nastavenia → Eshop → Základné info** | Názov, IČO/DIČ/IČDPH, adresa skladu, email, telefón |
| **Nastavenia → Eshop → Mena a DPH** | EUR, DPH 20 % (SK), 23 % (CZ) |
| **Nastavenia → Eshop → Dizajn** | Logo (text "STRECHY ⌂ PARTIZÁNSKE"), farby: primárna `#1B3A57`, akcent `#B5472E` |
| **Doprava a platba** | SPS, Packeta, Kuriér Maslen-style; platba: prevod, dobierka, kartou (GoPay/ComGate) |
| **Nastavenia → SEO** | Sitemap.xml ON, robots.txt OK, hreflang `sk-SK` |

## Krok 3 — import kategórií (5 min)

1. **Sklad → Kategórie → Import**
2. Nahraj `categories.csv` (UTF-8, oddeľovač `;`)
3. Skontroluj mapping stĺpcov:
   - `Hlavná kategória` → Level 1
   - `Podkategória` → Level 2
   - `Pod-podkategória` → Level 3
   - `URL slug` → SEO URL
   - `Meta titulok` / `Meta popis` → SEO
4. Import → 54 kategórií (10 L1 + 44 L2/L3)

> **Poznámka:** Shoptet sám CSV format mení medzi verziami. Ak importér žiada iné názvy stĺpcov, **stiahni si vzorový CSV z Shoptetu** (Sklad → Kategórie → Export prázdneho), prekopíruj môj obsah do ich stĺpcov.

## Krok 4 — import ukážkových produktov (10 min)

1. **Sklad → Produkty → Import**
2. Nahraj `products_sample.csv` (UTF-8, `;`)
3. **15 ukážkových produktov** v 8 kategóriách
4. Po importe: pridať obrázky ručne alebo cez **Sklad → Produkty → Hromadné úpravy → Obrázky** (URL importom)

> **Pre full launch:** vyžiadaj si od dodávateľov (Topdach, Maslen, Lindab, Ruukki) ich produktový XML feed → Shoptet vie importovať Heureka XML, GLAMI XML, custom XML feed.

## Krok 5 — variantové parametre (filtre)

Aby si dosiahol Maslen-štýl filtrovanie podľa **farby/rozmeru/podkladu**:

1. **Sklad → Parametre → Pridať**:
   - `Farba` (typ: výber zo zoznamu) → 12 hodnôt RAL
   - `Rozmer` (typ: text)
   - `Materiál` (typ: výber)
   - `Podklad` (typ: výber: drevo / oceľ / betón) — pre skrutky
   - `Pre krytinu` (typ: výber: hladká / profilovaná) — pre snehové zábrany
2. Priraď parametre k príslušným kategóriám: **Sklad → Kategórie → [kategória] → Parametre**
3. Zapni **filtračný panel** v ľavej lište kategórie

## Krok 6 — homepage layout

Shoptet má **Block builder** v admin paneli (Vzhľad → Hlavná stránka):

| Blok | Obsah |
|---|---|
| **Hero banner** | "Strešné krytiny pre Hornú Nitru" + CTA |
| **Kategórie (tile grid)** | 8 hlavných kategórií s ikonami a počtom produktov |
| **Akcie / Skladom** | 4–8 produktov s badge "SKLADOM" |
| **Trust bar** | "20 rokov v odbore · 1 200+ produktov skladom · 48 h doručenie" |
| **Newsletter** | "Odoberaj akcie pre stavebné firmy" |
| **Recenzie** | Heureka widget (po prepojení) |

Vzor layoutu: pozri `demo/index.html` (statický mockup).

## Krok 7 — doména + presmerovanie (po launchi)

1. Kúp doménu (Websupport, Slovanet) — `strechy-partizanske.sk`
2. **Nastavenia → Doména** v Shoptete → pridaj svoju doménu
3. V DNS u registrátora nastav:
   ```
   A     @       91.142.218.10   (Shoptet IP — overím u nich aktuálnu)
   CNAME www     strechy-partizanske.shoptet.sk.
   ```
4. Aktivuj **SSL** (Shoptet → automaticky cez Let's Encrypt)
5. **Presmerovania** (301): `shoptet.sk subdoména → custom doména`

## Krok 8 — analytika a marketing

| Nástroj | Setup |
|---|---|
| **Plausible** (vlastný) | Shoptet → Marketing → Vlastný kód → vlož `<script defer data-domain="strechy-partizanske.sk" src="https://stats.raffay.sk/js/script.js"></script>` |
| **Heureka XML feed** | Marketing → Heureka → ON (automatický feed pre porovnávač) |
| **Google Merchant** | Marketing → Google Shopping → ON, prepoj GMC účet |
| **Sklik** (CZ) / **Google Ads** | Manuálne kampane, neskôr |
| **Newsletter** | Shoptet má vstavaný + integrácie na Mailchimp/Ecomail |

## Krok 9 — Heureka recenzie

Shoptet má **Overené Heurekou** v štandarde — len aktivuj v `Marketing → Heureka → Overené`. Po prvej objednávke sa automaticky pošle dotazník.

## Krok 10 — B2B / veľkoobchod (klientela strechárov)

Shoptet má vstavaný **veľkoobchodný režim**:
1. **Zákazníci → Skupiny zákazníkov** → vytvor "Veľkoobchod"
2. Skrytie cien pre nelogovaných: `Nastavenia → Eshop → Zobrazovanie cien → Iba prihlásení`
3. Skupinové zľavy: 10–25 % podľa segmentu
4. Vyžaduj IČO pri registrácii — pole "Veľkoobchod" zaškrtnúť

> **Tip:** Maslen tlačí všetkých do registrácie. **Lepšie riešenie pre teba:** ukáž retail ceny aj nelogovaným, B2B zľavy len po prihlásení. Získaš B2C aj B2B segment.

## Cenník Shoptetu (orientačne)

| Plán | Cena/mes | Limit produktov | Vhodné pre |
|---|---|---|---|
| BASIC | 25 € | 100 | test / mini sortiment |
| BUSINESS | 50 € | neobmedzene | **odporúčaný štart** |
| PROFI | 100 € | neobmedzene | viac jazykov, B2B advanced |
| ENTERPRISE | individuálne | — | po raste, ERP integrácie |

> **Štart:** BUSINESS plán + Heureka + Google Shopping = ~60 €/mes total. Realistický breakeven pri ~3 objednávkach týždenne pri priemernej marži.

## Čo Shoptet **nevie** (limity)

- Nemá natívnu **kalkulačku strechy** (m² → BOM) — treba custom widget cez `Vzhľad → Vlastný kód`, alebo iframe na externý kalkulátor
- Limitovaný **konfigurátor produktov** s viac premennými (ak chceš robiť strechy na zákazku) — pre to skôr **WooCommerce + Product Add-Ons**
- Slabšie **fasetové filtrovanie** — pri 1 000+ produktoch a 5+ filtroch začne byť pomalé
- Nemá **multi-warehouse** — ak budeš mať sklady v 2 mestách, treba ENTERPRISE alebo iný stack

Ak narazíš na ľubovoľný z týchto limitov, alternatíva = **WooCommerce + B2BKing**.

## Súbory v tejto zložke

- `categories.csv` — 54 kategórií na import (10 L1 + 44 L2/L3)
- `products_sample.csv` — 15 ukážkových produktov v 8 kategóriách s parametrami (Farba/Rozmer/Materiál/Podklad)
- `SHOPTET_SETUP.md` — tento playbook

## Demo

Vizuálny mockup ako bude eshop vyzerať: [`../demo/index.html`](../demo/index.html) — otvor v prehliadači:
```bash
xdg-open /home/michal/claude_projects/strechy-partizanske/demo/index.html
```
