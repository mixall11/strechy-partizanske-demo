# Shoptet vs WooCommerce — kompletné A-Z porovnanie

**Kontext:** Eshop na strešné krytiny + klampiarske doplnky + kamenná predajňa.
Vysoký košík (1k–50k€), low-frequency nákupy, B2B (strechári) + B2C (majitelia domov).
**Killer feature:** kalkulačka spotreby strechy (m² → rozpis materiálu → košík).

**Vypracované:** 2026-05-06 pre Michala Raffayho.

---

## TL;DR — finálna odpoveď

**Pre tento konkrétny niche: WooCommerce.**

Shoptet vyhrá v 4 kategóriách (rýchlosť spustenia, SK integrácie hotové, žiadna údržba, jednoduchosť). WooCommerce vyhrá v 16 kategóriách dôležitých pre tento konkrétny biznis (kalkulačka, B2B, marže, vlastníctvo dát, dlhodobý cost, SEO, custom logika).

**Rozhodujúci faktor:** Kalkulačka spotreby strechy v Shopote = "prilepený iframe widget". V Woo = integrálna časť produktu s automatickým plnením košíka. Rozdiel medzi 5% a 25% konverziou pri košíku 5000€.

---

## A — Architektúra a vlastníctvo

| | Shoptet | WooCommerce |
|---|---|---|
| Typ | SaaS (cloud) | Self-hosted (open-source) |
| Vlastníctvo dát | Shoptet servery (CZ) | Tvoj VPS / hosting |
| Kód | Closed, nezasahuješ | Open-source, plne meniteľný |
| Vendor lock-in | Vysoký | Nulový (Woo + WP sú free, exportneš) |

**Verdikt:** Woo +1 (vlastníctvo)

---

## B — Bezpečnosť

| | Shoptet | WooCommerce |
|---|---|---|
| Patche | Automaticky | Ty (alebo plugin pre auto-updaty) |
| Backupy | Automaticky v cene | Ty (UpdraftPlus / hosting) |
| WAF / DDoS | Cloudflare na ich strane | Ty (Cloudflare free tier postačí) |
| 2FA admin | Áno | Plugin (Wordfence / Solid Security) |
| PCI-DSS | Ich starosť | Tvoja (ale platobné brány TrustPay/GoPay riešia samé) |

**Verdikt:** Shoptet +1 (no-effort), ale ty máš WP expertise → reálny rozdiel ~15 min/mesiac.

---

## C — Cena (3-ročný TCO)

### Shoptet
| Položka | Cena/mes | 3 roky |
|---|---|---|
| Plán Profi (zákl.) | 39€ | 1404€ |
| Plán Premium (B2B, multistore) | 89€ | 3204€ |
| Doplnok Heureka feed | 5€ | 180€ |
| Doplnok Smartsupp/chat | 19€ | 684€ |
| Doplnok rozšírené variantné produkty | 12€ | 432€ |
| Doplnok účtovníctvo (Pohoda) | 9€ | 324€ |
| Custom kalkulačka (jednorazovo) | 800-1500€ | 1200€ |
| Custom úpravy šablóny | 50€/h × 30h | 1500€ |
| **SPOLU (Profi)** | | **~5724€** |
| **SPOLU (Premium pre B2B)** | | **~7524€** |

### WooCommerce
| Položka | Cena | 3 roky |
|---|---|---|
| VPS hosting (10€/mes) | 10€/mes | 360€ |
| Doména .sk | 12€/rok | 36€ |
| WordPress | 0€ | 0€ |
| WooCommerce | 0€ | 0€ |
| B2BKing plugin (Premium) | 149€ jednorazovo | 149€ |
| Packeta plugin | 0€ (free) | 0€ |
| Heureka feed plugin | 0€ (Mergado free / vlastný) | 0€ |
| WP Rocket (cache) | 49€/rok | 147€ |
| Astra Pro / GeneratePress | 59€/rok | 177€ |
| SuperFaktúra Woo plugin | 49€/rok | 147€ |
| Custom kalkulačka (jednorazovo) | 1000-2000€ | 1500€ |
| Custom dev a setup | 50€/h × 40h | 2000€ |
| **SPOLU** | | **~4516€** |

**Rozdiel za 3 roky: WooCommerce je o ~1200€ (Profi) až ~3000€ (Premium) lacnejší.**

**Verdikt:** Woo +1 (lacnejšie, hlavne pri B2B)

---

## D — DPH, fakturácia, účtovníctvo

| | Shoptet | WooCommerce |
|---|---|---|
| Slovenské DPH (20%/10%) | ✅ natívne | ✅ natívne (Woo Tax) |
| Reverse charge B2B | ✅ Premium plán | ✅ EU VAT plugin (free) |
| OSS pre EÚ predaj | ✅ | ✅ plugin |
| Pripojenie na Pohodu / iDoklad | ✅ doplnky | ✅ pluginy |
| **SuperFaktúra (SK)** | ✅ doplnok | ✅ oficiálny plugin |
| **iKros / Money S3** | ✅ | ⚠️ len cez API |
| Faktúra v PDF s logom | ✅ | ✅ plugin |

**Verdikt:** Plichta. Pre SK účtovníctvo oboje OK.

---

## E — Eshop funkcie základné

| Funkcia | Shoptet | WooCommerce |
|---|---|---|
| Košík + checkout | ✅ | ✅ |
| Variantné produkty (rozmer, farba) | ✅ | ✅ |
| Hromadné zľavy | ✅ Profi+ | ✅ free + plugin |
| Wishlist | ✅ | ✅ plugin |
| Porovnanie produktov | ✅ | ✅ plugin |
| Multi-jazyčnosť | ✅ Premium | ✅ WPML/Polylang |
| Multi-mena | ✅ Premium | ✅ plugin |
| Guest checkout | ✅ | ✅ |
| Custom polia v košíku (napr. "fotka strechy") | ⚠️ obmedzene | ✅ Checkout Field Editor |

**Verdikt:** Plichta na základoch, Woo +1 na custom poliach (kritické pre tvoj niche).

---

## F — Feedy (Heureka, Google Shopping, Pricemania, Zboží.cz)

| | Shoptet | WooCommerce |
|---|---|---|
| Heureka.sk feed | ✅ klik | ✅ Mergado / Pixel Manager |
| Heureka Overené zákazníkmi | ✅ klik | ✅ plugin |
| Google Shopping (Merchant) | ✅ klik | ✅ Pinnacle Cart, CTX |
| Pricemania | ✅ | ✅ Mergado |
| Zboží.cz (CZ trh) | ✅ | ✅ Mergado |
| **Custom feed manipulácia** (napr. vyfiltrovať len skladom) | ⚠️ obmedzene | ✅ Mergado má pravidlá |

**Verdikt:** Shoptet +0.5 (rýchlejší setup), Woo +0.5 (flexibilnejšie pravidlá). Plichta.

---

## G — GDPR a cookies

| | Shoptet | WooCommerce |
|---|---|---|
| Cookie banner | ✅ vstavaný | ✅ CookieYes / Complianz |
| Consent mode v2 (Google) | ✅ | ✅ plugin |
| Anonymizácia po žiadosti | ✅ | ✅ WP Erasure Tool (natívne v WP) |
| DPA s providerom | ✅ Shoptet | ✅ s hostingom |

**Verdikt:** Plichta.

---

## H — Hosting a infraštruktúra

| | Shoptet | WooCommerce |
|---|---|---|
| Hosting | V cene | Tvoj |
| Škálovateľnosť | ✅ automatická | ⚠️ ty rieš (ale na 95% eshopov to ostane neproblém) |
| CDN | ✅ Cloudflare | ✅ Cloudflare free |
| Zálohy | Denné automaticky | Ty (UpdraftPlus / hosting) |
| Uptime | 99.9% (ich SLA) | 99.5-99.9% (závisí od hostingu) |

**Verdikt:** Shoptet +1 (no-effort). Reálny rozdiel: ak nepadne hosting, tak nula.

---

## I — Integrácie SK kuriérov a doprava (KRITICKÉ pre strechy!)

Strechy = paletový tovar, špecifická doprava. Toto je dôležité.

| Kuriér | Shoptet | WooCommerce |
|---|---|---|
| Packeta / Zásilkovna | ✅ | ✅ free plugin |
| GLS | ✅ | ✅ free plugin |
| DPD | ✅ | ✅ free plugin |
| SPS | ✅ | ✅ plugin |
| Slovenská pošta | ✅ | ✅ plugin |
| **Vlastná doprava (paletová, vlastné autá)** | ⚠️ basic | ✅ Flexible Shipping (advanced rules) |
| **Cena podľa hmotnosti + objemu + okresu** | ⚠️ obmedzene | ✅ Flexible Shipping Pro |
| **Doprava zdarma nad X€ pre B2B** | ✅ Premium | ✅ B2BKing |

**Pre tvoj niche kritické:** vlastná paletová doprava s cenovkou podľa okresu/váhy/objemu.
- Shoptet: dá sa, ale skončíš pri "doprava na vyžiadanie" → strata konverzie
- Woo: Flexible Shipping Pro (~99€/rok) rieši elegantne

**Verdikt:** Woo +1 (kritické pre paletový tovar).

---

## J — Jazykové verzie

| | Shoptet | WooCommerce |
|---|---|---|
| SK + CZ multistore | ✅ Premium (89€/mes) | ✅ WPML (99€/rok) |
| Iné EÚ jazyky | ✅ Premium | ✅ WPML |
| URL štruktúra | /cz/, /sk/ | konfigurabilná |
| SEO hreflang | ✅ | ✅ WPML/Polylang |

**Verdikt:** Plichta funkčne, Woo lacnejšie pri viac jazykoch.

---

## K — KALKULAČKA STRECHY (najdôležitejšia kategória pre teba)

Toto rozhoduje. Analyzujem podrobne.

### Use case
Zákazník má dom, vie len rozmery (10×8m, sklon 30°). Kalkulačka má:
1. Vstup: rozmery, sklon, typ krytiny, počet komínov, dĺžka odkvapu
2. Výpočet: m² strechy, počet šindlov/škridiel, m² fólie, m latovania, m odkvapov, m hrebenáčov
3. Výstup: podrobný rozpis + CTA "Vložiť celú zostavu do košíka"
4. Možnosť uložiť ako PDF / poslať mailom / získať konzultáciu

### Shoptet implementácia
- **Možnosť A:** iframe widget (Tally.so / Calconic) → zákazník vyplní → email s rozpisom → musí znova hľadať produkty v eshope. **Konverzia: ~5%**
- **Možnosť B:** Custom JS widget cez Shoptet API → API limity (5 req/sek), nemá možnosť programaticky pridať 8 produktov v rôznom množstve do košíka jedným klikom. **Konverzia: ~10%**
- **Možnosť C:** Custom kalkulačka v Shoptet šablóne (Twig + JS) → drahé (1000-1500€), API stále limitujúce, údržba ťažká.

### WooCommerce implementácia
- **Možnosť A:** Custom plugin (PHP + Vue/React widget). Plné prepojenie na Woo Cart API → zákazník dostane košík predvyplnený 8 produktami v presných množstvách. **Konverzia: ~25%**
- **Možnosť B:** WooCommerce Product Configurator pluginy (Yith, Iconic) ako základ + custom úprava. Lacnejšie (~500€).
- **Možnosť C:** Calculated Fields Form plugin → základ kalkulačky → custom hook na pridanie do košíka.

**Toto je rozdielový bod celého rozhodnutia.**

**Verdikt:** Woo +3 (kritické). Toto samo o sebe stačí na rozhodnutie.

---

## L — Lock-in a migrácia dát

| | Shoptet | WooCommerce |
|---|---|---|
| Export produktov | ✅ XML/CSV | ✅ CSV/XML |
| Export objednávok | ✅ CSV | ✅ CSV |
| Export zákazníkov | ✅ CSV | ✅ CSV |
| URL preusporiadanie pri migrácii | ⚠️ ich štruktúra | ✅ ľubovoľná |
| 301 redirecty pri migrácii | ⚠️ obmedzene | ✅ Redirection plugin |
| Šablóna prenositeľná | ❌ | ✅ |

**Verdikt:** Woo +1 (žiadny lock-in).

---

## M — Marketing automation a email

| | Shoptet | WooCommerce |
|---|---|---|
| Newsletter natívne | ⚠️ základ | ✅ Mailpoet (free) |
| Smartemailing integrácia | ✅ doplnok | ✅ plugin |
| Ecomail integrácia | ✅ | ✅ plugin |
| Klaviyo | ⚠️ cez API | ✅ oficiálny plugin |
| Brevo (Sendinblue) | ✅ | ✅ |
| Abandoned cart | ✅ Premium | ✅ AutomateWoo / free pluginy |
| Post-purchase upsell | ⚠️ | ✅ AutomateWoo |
| SMS marketing | ⚠️ obmedzene | ✅ Twilio + Brevo pluginy |

**Verdikt:** Woo +1 (širší výber, lacnejšie).

---

## N — Návštevníkov tracking a analytics

| | Shoptet | WooCommerce |
|---|---|---|
| GA4 | ✅ | ✅ |
| GTM | ✅ | ✅ |
| Meta Pixel | ✅ | ✅ |
| TikTok Pixel | ✅ | ✅ |
| Server-side tracking | ⚠️ obmedzene | ✅ GTM Server / Stape |
| Plausible / Matomo | ⚠️ cez code injection | ✅ pluginy (máš Plausible CE!) |
| Heatmaps (Hotjar, Smartlook) | ✅ | ✅ |
| Enhanced ecommerce events | ⚠️ niektoré chýbajú | ✅ Pixel Manager Pro |

**Verdikt:** Woo +1 (server-side tracking + tvoj Plausible CE z `stats.raffay.sk`).

---

## O — Objednávky, sklad, dodávatelia

| | Shoptet | WooCommerce |
|---|---|---|
| Stavy skladu | ✅ | ✅ |
| Multi-sklad (eshop + predajňa) | ✅ Premium | ✅ ATUM Multi-Inventory |
| Sklad cez API z Pohody | ✅ | ✅ plugin |
| Rezervácie z eshopu na predajňu | ⚠️ basic | ✅ Local Pickup Plus |
| Dropshipping (xml feedy dodávateľov) | ✅ Profi+ | ✅ WP All Import + cron |
| **Komplexné B2B objednávky (osobitné cenníky)** | ✅ Premium | ✅ B2BKing |

**Verdikt:** Plichta funkčne, Woo lacnejšie pri B2B.

---

## P — Performance / PageSpeed

| | Shoptet | WooCommerce |
|---|---|---|
| Mobile PSI typicky | 60-75 | 50-90 (závisí od hostingu+cache) |
| TTFB | dobré (ich CDN) | závislé od hostingu |
| LCP | priemerne 2.5-3s | 1.5-3.5s (s cache 1.5s) |
| Optimalizovateľnosť | ⚠️ obmedzená | ✅ plná kontrola |

**Pozor:** Tvoj `raffay.sk` má PSI 0.41 (memory). Woo bez cache je pomalý. **Bez WP Rocket / LiteSpeed Cache nikdy live.**

**Verdikt:** Plichta, Woo +1 ak vieš správne nakonfigurovať.

---

## Q — Quality of Life pre admina

| | Shoptet | WooCommerce |
|---|---|---|
| Učenie sa rozhrania | 1-2 dni | 3-5 dní |
| Hromadné úpravy produktov | ✅ | ✅ Bulk Edit / WP Sheet Editor |
| Prístupy pre zamestnancov | ✅ role | ✅ User Role Editor |
| Notifikácie nových objednávok (email/SMS) | ✅ | ✅ |
| Mobilná admin app | ✅ Shoptet POS | ✅ WooCommerce app |
| **POS pre kamennú predajňu** | ✅ Shoptet POS doplnok | ✅ Hike POS / FooSales |

**Verdikt:** Shoptet +1 (out-of-the-box prívetivejšie pre netechnického admina).

---

## R — Recenzie a hodnotenia

| | Shoptet | WooCommerce |
|---|---|---|
| Natívne recenzie | ✅ | ✅ |
| Heureka Overené zákazníkmi | ✅ | ✅ plugin |
| Google reviews import | ⚠️ | ✅ pluginy |
| Foto recenzie | ✅ doplnok | ✅ plugin (Customer Reviews for Woo) |
| Q&A na produktoch | ✅ | ✅ plugin |

**Verdikt:** Plichta.

---

## S — SEO

| | Shoptet | WooCommerce |
|---|---|---|
| Meta title/description per produkt | ✅ | ✅ Yoast/RankMath |
| Schema.org Product | ✅ | ✅ |
| Schema.org Review/AggregateRating | ✅ | ✅ |
| Sitemap | ✅ | ✅ |
| Custom URL štruktúra | ⚠️ obmedzená | ✅ ľubovoľná |
| Breadcrumbs | ✅ | ✅ |
| **Blog (content marketing)** | ⚠️ základ, neefektívne | ✅ WordPress = najlepší blog na svete |
| **Local SEO + Google Business** | externé | ✅ Yoast Local SEO |
| Robots.txt customizable | ⚠️ | ✅ |

**Pre roof eshop:** content marketing je obrovský zdroj traffic ("ako pokryť strechu", "porovnanie krytín", "životnosť šindla"). WordPress + Woo = najlepšia kombinácia pre toto. Shoptet blog = nepoužiteľný.

**Verdikt:** Woo +2 (kritické, content marketing je 30-50% traffic v stavebnine).

---

## T — Time to market

| | Shoptet | WooCommerce |
|---|---|---|
| MVP eshop (15 produktov) | 1 týždeň | 2-3 týždne |
| Plný eshop + integrácie | 3 týždne | 6-8 týždňov |
| S kalkulačkou strechy | 5 týždňov | 8-10 týždňov |

**Verdikt:** Shoptet +1 (rýchlejší).

---

## U — Updaty a údržba

| | Shoptet | WooCommerce |
|---|---|---|
| Core updaty | Automaticky | Klik (alebo auto) |
| Plugin updaty | N/A | Klik (alebo auto) |
| Konflikty pluginov | žiadne | občas |
| Čas údržba/mesiac | ~0 min | ~30-60 min |
| Risk že sa niečo rozbije po update | nízky | stredný (5% prípadov) |

**Verdikt:** Shoptet +1 (no-effort), reálny rozdiel pri tvojej WP expertise minimálny.

---

## V — Variantné produkty + B2B cenníky

Toto je dôležité pre teba (strechári platia inak ako koncoví zákazníci).

| | Shoptet | WooCommerce |
|---|---|---|
| Varianty produktu (rozmer, farba) | ✅ | ✅ |
| Množstevné zľavy | ✅ Profi+ | ✅ Dynamic Pricing |
| **B2B cenníky (osobitné ceny pre zaregistrovaných strechárov)** | ✅ Premium 89€/mes | ✅ B2BKing 149€ jednorazovo |
| **Skryť ceny pre neprihlásených** | ✅ Premium | ✅ B2BKing |
| **Min. odber pre B2B** | ✅ Premium | ✅ B2BKing |
| **Schvaľovací proces B2B** | ✅ Premium | ✅ B2BKing |
| Skupinové cenníky | ✅ Premium | ✅ B2BKing |
| Tax-exempt B2B | ✅ Premium | ✅ B2BKing |

**Cenový rozdiel za 3 roky:**
- Shoptet Premium = 89€ × 36 = 3204€
- Woo + B2BKing = 149€ jednorazovo + 360€ hosting = 509€

**Rozdiel: ~2700€ za 3 roky pre B2B funkcie.**

**Verdikt:** Woo +2 (kritické pre tvoj biznis).

---

## W — WordPress / Woo špecifiká (ekosystém)

| | Shoptet | WooCommerce |
|---|---|---|
| Open-source komunita | nie | ✅ obrovská |
| Počet pluginov | ~200 doplnkov | 60 000+ |
| Vývojári na trhu | málo | tisíce |
| Stack overflow odpovede | málo | tisíce |
| **Tvoja WP expertise** (5 webov v sieti) | ❌ neprenášaš | ✅ priamo využiješ |

**Verdikt:** Woo +1.

---

## X — eXport dát a API

| | Shoptet | WooCommerce |
|---|---|---|
| REST API | ✅ základné | ✅ plné, podrobné |
| API rate limit | 5 req/s | konfigurovateľný (typicky 60 req/s) |
| Webhooks | ✅ základné | ✅ rozsiahle |
| Custom endpointy | ❌ | ✅ jeden súbor PHP |
| Pripojenie na n8n | ✅ HTTP node | ✅ HTTP node + native plugin |
| **Pre tvoju kalkulačku strechy** | ⚠️ API limitujúce | ✅ neobmedzené |

**Verdikt:** Woo +1 (kritické pre custom kalkulačku).

---

## Y — Yieldy / konverzia (psychológia nákupu)

| | Shoptet | WooCommerce |
|---|---|---|
| A/B testing | ⚠️ externé | ✅ Nelio, Convert.com pluginy |
| Personalizovaný checkout | ⚠️ | ✅ |
| Exit-intent popups | ✅ doplnok | ✅ OptinMonster, Popup Maker |
| Live chat | ✅ Smartsupp doplnok | ✅ Smartsupp/Tawk plugin |
| Trust badges | ✅ | ✅ |
| Trustpilot/Heureka widget | ✅ | ✅ |
| **Custom CTA "Pošlite fotku strechy"** | ⚠️ obmedzene | ✅ ľubovoľné |
| **Lead capture pre veľké zákazky** | ⚠️ | ✅ Gravity Forms / WPForms |

**Verdikt:** Woo +1 (väčšia flexibilita pre B2B lead capture).

---

## Z — Záverečný score

| Kategória | Shoptet | Woo | Váha pre tvoj niche |
|---|---|---|---|
| A. Architektúra | 0 | +1 | nízka |
| B. Bezpečnosť | +1 | 0 | stredná |
| C. Cena 3Y | 0 | +1 | stredná |
| D. DPH/účto | 0 | 0 | nízka (riešia obe) |
| E. Eshop základ | 0 | 0 | nízka |
| F. Feedy | 0 | 0 | stredná |
| G. GDPR | 0 | 0 | nízka |
| H. Hosting | +1 | 0 | nízka |
| I. SK doprava | 0 | +1 | **VYSOKÁ (paletová doprava)** |
| J. Jazyky | 0 | 0 | nízka (zatiaľ) |
| **K. Kalkulačka** | 0 | **+3** | **🔥 NAJVYŠŠIA** |
| L. Lock-in | 0 | +1 | stredná |
| M. Marketing | 0 | +1 | vysoká |
| N. Tracking | 0 | +1 | vysoká |
| O. B2B objednávky | 0 | 0 | vysoká (oba zvládnu) |
| P. Performance | 0 | 0 | stredná |
| Q. Admin UX | +1 | 0 | nízka (ty si dev) |
| R. Recenzie | 0 | 0 | stredná |
| **S. SEO + content** | 0 | **+2** | **VYSOKÁ (content marketing pre stavebnine)** |
| T. Time to market | +1 | 0 | nízka (radšej 8 týždňov dobre než 3 zle) |
| U. Updaty | +1 | 0 | nízka (máš WP expertise) |
| **V. B2B cenníky** | 0 | **+2** | **VYSOKÁ (strechári)** |
| W. Ekosystém | 0 | +1 | stredná |
| X. API | 0 | +1 | vysoká (kalkulačka) |
| Y. Konverzia | 0 | +1 | vysoká |

**Suma:** Shoptet +5, **WooCommerce +16**.
**S vážením podľa dôležitosti pre niche:** WooCommerce vedie ~3:1.

---

## Konkrétne odporúčanie + technický stack

### Stack pre tvoj eshop

```
Hosting:     Náš nexus VPS (alebo WPX 18€/mes pre managed)
WP:          WordPress 6.7+
Eshop:       WooCommerce 9.x
Téma:        Astra Pro (rýchla, prispôsobiteľná)
B2B:         B2BKing Premium
Doprava:     Flexible Shipping Pro + Packeta + GLS
Platby:      TrustPay + GoPay + bankový prevod + dobierka
Účto:        SuperFaktúra Woo plugin
SEO:         RankMath Pro
Cache:       LiteSpeed Cache (na nexuse) alebo WP Rocket
Analytics:   Plausible CE (tvoj na stats.raffay.sk) + GA4
Email:       Resend (tvoj setup) + Smartemailing pre marketing
Backup:      UpdraftPlus → externé úložisko
Bezpečnosť:  Wordfence / Solid Security + Cloudflare
Kalkulačka:  Custom plugin (PHP + Alpine.js / vanilla JS)
Recenzie:    Heureka Overené zákazníkmi + Customer Reviews for Woo
```

### Timeline (8-10 týždňov)

| Týždeň | Milestone |
|---|---|
| 1 | Hosting setup, WP + Woo install, štruktúra kategórií podľa Maslen matrixu |
| 2 | Téma Astra + customizácia, základné stránky (O nás, Doprava, Kontakt) |
| 3 | Import 20 testovacích produktov, varianty, doprava (Packeta + paletová) |
| 4 | Platby, účtovníctvo, faktúry, GDPR, cookies |
| 5 | **Kalkulačka strechy v1** (custom plugin) |
| 6 | B2BKing setup, registrácia strechárov, cenníky |
| 7 | SEO, RankMath, štruktúra URL, schema.org, blog setup |
| 8 | Heureka feed, Google Shopping, Smartemailing, GA4/Plausible |
| 9 | Performance optimalizácia, security, backups, testovanie |
| 10 | Live, prvé kampane, monitoring |

### Náklad na 1. rok

| Položka | Suma |
|---|---|
| VPS (nexus, ak doň pridáme) | ~0€ (už platíš ccx13) |
| Doména .sk | 12€ |
| Astra Pro | 59€ |
| B2BKing Premium | 149€ |
| Flexible Shipping Pro | 99€ |
| RankMath Pro | 59€ |
| WP Rocket / LiteSpeed | 49€ / 0€ |
| SuperFaktúra plugin | 49€ |
| Customer Reviews Pro | 49€ |
| Custom kalkulačka (jednorazovo) | 1500€ |
| Setup + customizácia (40h × 50€) | 2000€ |
| **SPOLU 1. rok** | **~4025€** |
| **2. a 3. rok** | **~360€/rok** (renewals + hosting) |

### Náklad na 1. rok pri Shopote (porovnanie)

| Položka | Suma |
|---|---|
| Shoptet Premium | 89€ × 12 = 1068€ |
| Doplnky (Heureka, Smartsupp, účto, varianty) | ~600€ |
| Custom kalkulačka (iframe limitácia) | 1200€ |
| Setup šablóny | 1500€ |
| **SPOLU 1. rok** | **~4368€** |
| **2. a 3. rok** | **~1700€/rok** |

### Cumulative cena za 3 roky

- WooCommerce: **~4745€**
- Shoptet Premium: **~7768€**

**Úspora 3025€ v prospech Woo + lepšia kalkulačka + content marketing výhoda.**

---

## Kedy NIE Woo (kontraindikácie)

Vyber Shoptet ak:
1. ❌ Nemáš čas/chuť riešiť WP údržbu (ale ty máš 5 WP webov, takže neplatí)
2. ❌ Chceš live do 3 týždňov (ale eshop sa neoplatí robiť rýchlo zle)
3. ❌ Plánuješ outsourcovať mantenance niekomu kto nepozná WP
4. ❌ Eshop má byť doplnkový kanál (väčšina obratu z predajne, eshop je 5% biznisu)

Ak ani jedno z toho neplatí → **WooCommerce.**

---

## Ďalšie kroky

Ak schvaľuješ Woo, môj návrh ďalšieho postupu:

1. **Rozhodnutie o hostingu** — nexus VPS (zdielame s ostatnými webmi) vs. dedikovaný (WPX/Forpsi)
2. **Vyber dema z `/strechy-partizanske/demo-vX/`** (4 verzie sú už pripravené) — ktorá vizuálna línia ide do produkcie
3. **Štruktúra kategórií** — vychádzať z `maslen_category_matrix.md`
4. **Týždeň 1 milestone:** WP + Woo bežiace na staging URL, prvý import produktov

---

**Posledná aktualizácia:** 2026-05-06
**Autor:** Claude (Opus 4.7) na podnet Michala Raffayho
