# Google Ads — Strechy Partizánske

**Verzia:** 1.0 (2026-05-28)
**Stav:** plán pripravený na nasadenie po launchi eshopu
**Predpoklad:** Shoptet eshop live na `strechy-partizanske.sk`, conversion tracking funkčný

---

## 1. EXECUTIVE SUMMARY

**Stratégia:** Search-first launch s úzkym geo-focusom (Trenčiansky + Žilinský + Nitriansky kraj) a tvrdým budgetom 500 €/mes počas prvých 8 týždňov. Performance Max **odkladáme** kým nezbierame ≥30 konverzií/mes (Google PMax bez dát = spaľovač budgetu pre malý eshop).

**Hlavný tradeoff:** úzky geo = nižší volume v štarte, ale **3-4× vyšší conversion rate** vs. celoSR (lokálny biznis = lokálna dôvera + kratšia doprava + možnosť osobného odberu = primárny USP voči celoslovenským hráčom typu Maslen). Po validácii unit economics expandujeme.

**Cieľ Q1 po launchi:** 30+ tx-konverzií /mes pri CPA ≤ 25 € (eshop), 15+ B2B leadov /mes pri CPL ≤ 35 €.

---

## 2. ŠTRUKTÚRA ÚČTU

| # | Kampaň | Typ | Cieľ | Budget /deň | Bidding | Priorita |
|---|---|---|---|---|---|---|
| 1 | SP-Brand | Search | Brand defense | 2 € | Max Clicks, max CPC 0.20 € | P0 |
| 2 | SP-Search-HighIntent-Krytiny | Search | Eshop purchase | 5 € | Max Conversions | P0 |
| 3 | SP-Search-HighIntent-Klampiarske | Search | Eshop purchase | 4 € | Max Conversions | P0 |
| 4 | SP-Search-HighIntent-Spojovaci | Search | Eshop purchase | 2 € | Max Conversions | P1 |
| 5 | SP-Search-MidIntent-Riesenia | Search | Mixed (lead + eshop) | 2 € | Max Conversions | P1 |
| 6 | SP-Shopping-Standard | Shopping | Eshop purchase | 1 € | tROAS 400% | P1 |
| 7 | SP-Remarketing-Dynamic | Display | Eshop recover | 1 € | Max Conversions | P2 |

**Spolu:** 17 €/deň ≈ **510 €/mes** (rezerva 5 % pre fluktuáciu).

**Pravidlá segmentácie:**
- Brand kampaň oddelene — chráni pred konkurenciou bidujúcou na "strechy partizánske"
- High-intent rozdelené **podľa kategórie produktu** (krytiny ≠ klampiarske ≠ spojovák) lebo ad copy + LP musia mirrorovať keyword
- Mid-intent = informational/comparison ("aká krytina je najlepšia") → vyššia konverzia na lead form ako na nákup
- Shopping ako sekundárny driver (predpokladá Google Merchant Center + product feed zo Shoptetu)
- Remarketing až po 1000+ unique visitors

---

## 3. AD GROUPS + KEYWORDS

### Kampaň 1: SP-Brand
```
Ad Group: Brand-exact
├─ Keywords:
│   • "strechy partizanske" | phrase | CPC ~0.10 € | ~80/mes
│   • "strechy-partizanske.sk" | exact | CPC ~0.08 € | ~40/mes
│   • [strechy partizanske eshop] | exact | CPC ~0.12 € | ~20/mes
├─ Negatives: žiadne (brand chce všetko)
└─ Final URL: https://strechy-partizanske.sk/
```

### Kampaň 2: SP-Search-HighIntent-Krytiny

```
Ad Group: Plechove-krytiny
├─ Keywords (phrase):
│   • "plechova krytina cena" | CPC ~0.55 € | ~480/mes
│   • "plechova strecha cena" | CPC ~0.60 € | ~390/mes
│   • "trapezovy plech strecha" | CPC ~0.45 € | ~210/mes
│   • "falcovana krytina" | CPC ~0.50 € | ~170/mes
│   • [krytina topdach] | exact | CPC ~0.35 € | ~90/mes
│   • [krytina lindab] | exact | CPC ~0.40 € | ~140/mes
├─ Negatives (ad-group): bazár, použitá, druhotná, zadarmo, free
└─ Final URL: /c/krytiny-skladom/

Ad Group: Skridla-betonova
├─ Keywords:
│   • "betonova skridla cena" | phrase | CPC ~0.50 € | ~320/mes
│   • "keramicka skridla cena" | phrase | CPC ~0.55 € | ~210/mes
│   • [bramac skridla] | exact | CPC ~0.45 € | ~170/mes
│   • [tondach skridla] | exact | CPC ~0.42 € | ~140/mes
├─ Final URL: /c/krytiny-skladom/skridla/
```

### Kampaň 3: SP-Search-HighIntent-Klampiarske

```
Ad Group: Klampiarske-RAL
├─ Keywords:
│   • "klampiarske vyrobky" | phrase | CPC ~0.40 € | ~390/mes
│   • "klampiarsky plech farebny" | phrase | CPC ~0.45 € | ~110/mes
│   • "oplechovanie strechy" | phrase | CPC ~0.50 € | ~280/mes
│   • "lemovanie komina" | phrase | CPC ~0.55 € | ~170/mes
├─ Final URL: /c/klampiarske-produkty/

Ad Group: Zvody-zlaby
├─ Keywords:
│   • "odkvapovy system" | phrase | CPC ~0.45 € | ~480/mes
│   • "odkvapy cena" | phrase | CPC ~0.50 € | ~590/mes
│   • "plastove odkvapy" | phrase | CPC ~0.40 € | ~320/mes
│   • [lindab rainline] | exact | CPC ~0.38 € | ~110/mes
├─ Final URL: /c/zvodovy-system/
```

### Kampaň 4: SP-Search-HighIntent-Spojovaci

```
Ad Group: Skrutky-do-krytiny
├─ Keywords:
│   • "skrutky do strechy" | phrase | CPC ~0.35 € | ~210/mes
│   • "skrutky do trapezoveho plechu" | phrase | CPC ~0.40 € | ~140/mes
│   • "skrutky farebne strecha" | phrase | CPC ~0.38 € | ~90/mes
├─ Final URL: /c/spojovaci-material/skrutky-pre-krytiny/
```

### Kampaň 5: SP-Search-MidIntent-Riesenia

```
Ad Group: Vyber-krytiny-poradenstvo
├─ Keywords:
│   • "aka krytina je najlepsia" | phrase | CPC ~0.30 € | ~170/mes
│   • "plech alebo skridla" | phrase | CPC ~0.35 € | ~210/mes
│   • "cena novej strechy" | phrase | CPC ~0.65 € | ~880/mes ⚠️
│   • "rekonstrukcia strechy cena" | phrase | CPC ~0.70 € | ~720/mes ⚠️
├─ Final URL: /poradna/vyber-krytiny/ (alebo blog článok s lead formom)
└─ ⚠️ tieto KW majú vysoký volume ale aj high competition + neisté intent → silný negative list
```

### Globálne Negative Keyword Lists (apply na celý účet)

```
LIST 1 — Irrelevant
zadarmo, free, bazar, bazos, použitá, druhotná, recyklát, výpredaj zostatkov,
zelená strecha (greenroof intent ≠ náš), strecha sveta, strecha auta,
plechová strecha auta, strecha karavanu

LIST 2 — Job seekers
práca, brigáda, hľadám prácu, kariéra, montér plat, mzda

LIST 3 — Informational only (anti-no-purchase)
ako, postup, návod, svojpomocne, vlastnoručne, samostatne, sám si urobit,
kalkulačka strechy zadarmo, výpočet sklonu, definícia

LIST 4 — Competitor brands (nikdy nebid na ich brand)
maslen, lindab eshop, ruukki eshop, bramac eshop, isover, terran
```

---

## 4. AD COPY (RSA — vzor pre Kampaň 2 Ad Group Plechove-krytiny)

**Headlines (15):**
1. `Plechová krytina od 8,90 €/m²` (price)
2. `Plechové krytiny skladom` (availability)
3. `Strechy Partizánske — eshop` (brand)
4. `Topdach, Lindab, Uniplech` (brands)
5. `Doprava po SR od 4,90 €` (logistics)
6. `Osobný odber v Partizánskom` (USP regionálne)
7. `RAL paleta — 12 farieb skladom` (variety)
8. `Pomôžeme s výpočtom m²` (service)
9. `Cenová ponuka do 24h` (CTA)
10. `Záruka výrobcu 30-40 rokov` (trust)
11. `Krytina + skrutky + zábrany` (bundle)
12. `Nakúp online → odber zajtra` (speed)
13. `Konzultácia s technikom zdarma` (support)
14. `Faktúra s DPH pre firmy` (B2B signal)
15. `Doprava do 48h, montáž odporúčaná` (logistics)

**Descriptions (4):**
1. `Plechové krytiny Topdach, Lindab a ďalšie. 12 farieb RAL skladom. Doprava po celej SR alebo osobný odber v Partizánskom.`
2. `Pomôžeme ti vybrať správnu krytinu pre tvoju strechu. Cenová ponuka zdarma do 24 hodín, faktúra s DPH, záruka výrobcu.`
3. `Krytina + spojovací materiál + snehové zábrany v jednom balíku. Ušetri čas aj peniaze — všetko od jedného dodávateľa.`
4. `Pozri si plné skladové zásoby a aktuálne ceny. Objednaj online alebo zavolaj 0XXX XXX XXX, poradíme s výberom.`

**Display path:** `krytiny` / `plechove`

**Pinning:** žiadne (nech RSA Google optimalizuje sám); výnimka: ak v cieli H1 musí byť "Plechová krytina od 8,90 €/m²" → pin do P1.

---

## 5. EXTENSIONS

**Sitelinks (8):**
1. Plechové krytiny → `/c/krytiny-skladom/plechove/`
2. Škridla → `/c/krytiny-skladom/skridla/`
3. Klampiarske produkty → `/c/klampiarske-produkty/`
4. Odkvapy → `/c/zvodovy-system/`
5. Snehové zábrany → `/c/snehove-zabrany/`
6. Skrutky a spojovák → `/c/spojovaci-material/`
7. Cenová ponuka → `/cenova-ponuka/` (lead form)
8. Kontakt + showroom → `/kontakt/`

**Callouts (10):**
- Doprava do 48h
- Osobný odber Partizánske
- 12 farieb RAL skladom
- Faktúra s DPH
- Záruka 30-40 rokov
- Cenová ponuka zdarma
- Konzultácia s technikom
- Topdach, Lindab, Uniplech
- Nákup od 50 €
- B2B zľavy pre firmy

**Structured snippets:**
- Značky: Topdach, Lindab, Uniplech, Bramac, Tondach
- Služby: Doprava, Osobný odber, Cenová ponuka, Konzultácia

**Call extension:** mobilné číslo s schedule Po-Pi 8:00-17:00

**Lead form extension:** "Získaj cenovú ponuku za 24h" — meno, tel, lokalita, popis strechy (3-4 polia max)

**Location extension:** prepojiť na GBP po jeho vytvorení (adresa showroomu v Partizánskom)

**Price extension:** vybrané kategórie ("Plechové krytiny od 8,90 €/m²", "Odkvapy od 14,50 €/bm", "Skrutky 250ks od 12,90 €")

---

## 6. BIDDING STRATÉGIA

| Týždeň | Stratégia | Prečo |
|---|---|---|
| 1-2 | **Maximize Clicks** + max CPC cap 0.70 € | Zbieraj traffic + conversion data |
| 3-4 | **Maximize Conversions** | Prechod hneď ako >5 konv./týž v ad groupe |
| 5-8 | Hodnotíme | Stabilizovať CPA pred prechodom na tCPA |
| 9+ | **Target CPA 25 €** (eshop), **35 €** (lead) | Po 30+ konverziách scale |

**Výnimky:**
- Brand kampaň: **Max Clicks + max CPC 0.20 €** trvalo (žiadne dáta-driven bidding, lacný traffic)
- Shopping: **tROAS 400%** od štartu (Google má dáta z feedu)

---

## 7. AUDIENCES (vždy Observation, nie Targeting)

**In-market segments (apply ako observation):**
- Home Improvement Materials & Tools
- Home & Garden / Roofing
- Building Materials & Supplies

**Custom audiences:**
- Návštevníci `maslen.sk`, `lindab.sk`, `bramac.sk`, `ruukki.sk` (URL + keyword custom audience)
- Hľadali "rekonštrukcia strechy", "nová strecha cena", "plechová krytina cena"

**Demographics:**
- Vek: 30-65 (bid +15% na 40-55 segment)
- Household income: top 50%
- Parental status: rodičia (často majú vlastný dom)
- Homeownership: own (ak Google ponúkne pre SK)

**Remarketing lists (vytvor v GA4):**
- All visitors 30d (1000+ users threshold)
- Cart abandoners 7d
- Product viewers 14d
- Past purchasers exclude (negatív audience)

---

## 8. CONVERSION TRACKING — setup checklist

**Primárna konverzia:** `purchase` (Shoptet → GA4 → Google Ads import)
**Sekundárne:**
- `generate_lead` (cenová ponuka form submit)
- `phone_call ≥60s`
- `add_to_cart` (sekundárna, ako micro-conversion pre PMax audience signals)

**Setup:**
- [ ] Shoptet → GA4 e-commerce events (built-in integrácia, len zapnúť v Shoptet admin → Marketing → GA4)
- [ ] GA4 → Google Ads link (Admin → Product Linking → Google Ads)
- [ ] Import GA4 conversions do Google Ads
- [ ] **Enhanced conversions** zapnúť (User-provided data — Google hashuje email/phone z purchase)
- [ ] **Consent Mode v2** (GDPR) — Shoptet má built-in cookie consent, treba prepojiť na Google tagy
- [ ] Phone call tracking — Google forwarding number alebo CallRail (ak má prevádzka >50 hovorov/mes)
- [ ] **Offline conversion import** pre B2B leady (CRM/email → Google Ads upload, mesačne, ak avg sales cycle > 14 dní)

---

## 9. LANDING PAGE — odporúčania pred launch

**Pre každú kampaň over match search → ad → LP:**

| Search term | Ad H1 | LP H1 | LP first section |
|---|---|---|---|
| "plechová krytina cena" | Plechová krytina od 8,90 €/m² | **Plechová krytina — ceny a sklad** | tabuľka cien + filter farba |
| "betónová škridla cena" | Betónová škridla — Bramac, Tondach | **Betónová škridla** | porovnanie brandov + ceny |
| "rekonštrukcia strechy cena" | Cenová ponuka rekonštrukcie | **Plánuješ novú strechu?** | wizard 3 otázky → ponuka |

**Required na každej LP:**
- H1 = match keyword (semantically)
- Cena alebo "od X €/m²" above-the-fold
- Trust signál: "12 rokov v Partizánskom", logá značiek, počet objednávok
- Sticky phone button mobile
- Form ≤ 4 polia
- Lighthouse mobile ≥ 80

⚠️ **NESPÚŠŤAJ Google Ads pokiaľ nemáš dedikované LP** pre top 5 ad groups. Sending traffic na homepage = -40-60% Quality Score = +50-100% CPC.

---

## 10. ROZPOČET — alokácia 500 €/mes

| Kampaň | €/deň | €/mes | % | Justification |
|---|---|---|---|---|
| SP-Brand | 2 | 60 | 12% | Defense, lacné |
| SP-Search-HighIntent-Krytiny | 5 | 150 | 30% | Najvyšší ticket, primary driver |
| SP-Search-HighIntent-Klampiarske | 4 | 120 | 24% | High intent + dobrá marža |
| SP-Search-HighIntent-Spojovaci | 2 | 60 | 12% | Low ticket ale repeat orders |
| SP-Search-MidIntent-Riesenia | 2 | 60 | 12% | Lead-gen pre vyššie tickety |
| SP-Shopping-Standard | 1 | 30 | 6% | Test, scale ak ROAS > 400% |
| SP-Remarketing-Dynamic | 1 | 30 | 6% | Recover abandoners |
| **Spolu** | **17** | **510** | **100%** | + 5% rezerva |

**Po 60 dňoch:** ak ROAS > 400% → škálovať budget +50% na top 2 ad groups, neuvazovať PMax.

---

## 11. GEO + SCHEDULE

**Geo targeting:**
- **Primary (bid +30%):** Partizánske + 30 km radius (osobný odber zóna)
- **Secondary (bid baseline):** Trenčiansky, Žilinský, Nitriansky kraj (kuriérska doručovacia zóna < 24h)
- **Tertiary (bid -20%):** zvyšok SR
- **Exclude:** ČR (Shoptet podporuje len SR doručenie v štarte; otvorené pre CZ neskôr)

**Ad schedule (Po-Ne, čas SK):**
- Po-Pi 7:00-20:00: baseline
- Po-Pi 8:00-17:00 (working hours): **bid +15%** (B2B traffic + môžu zavolať)
- So 8:00-18:00: baseline (DIY víkendoví kupujúci)
- Ne 9:00-20:00: bid -10% (lower intent)
- Nočné hodiny 22:00-6:00: **pauza** (paid call ext nedáva sense bez human respondera)

**Sezonalita:**
- **Marec-október:** baseline budget (peak)
- **November-február:** budget -40% (dno; podpora retencia cez remarketing + e-mail)

---

## 12. PRVÝCH 30 DNÍ — denný plán

**Týždeň 1 — Launch + tracking validation**
- D1: Spusti všetky kampane v Max Clicks. **Manuálne test conversion** (kúp 1 produkt sám, over že GA4 + Google Ads zaznamenali)
- D2-3: 2× denne pozri **Search Terms Report** → pridaj negatívy (typický harvest 15-30 nových negatives v prvom týždni)
- D5: Prvá kontrola Quality Score — všetko < 6 = vráť sa k LP (mismatch s ad copy/keyword)
- D7: **Weekly review** — pauznú ad groups s 0 impressions (KW príliš nízky volume), pridaj keywords zo search terms s >3 kliknutiami a 0 konverziami → premeň na negative

**Týždeň 2 — First optimization**
- D8-10: A/B test 2. RSA variant v top 2 ad groups
- D11: Bid adjustments by device (typicky mobile +0%, desktop +10-20% pre stavebnícke kategórie — väčší ticket sa rozhoduje na desktope)
- D12-14: Audience observation → ktorá in-market sa konvertuje? Aplikuj bid-up +15-20%

**Týždeň 3 — Bidding shift**
- D15: Ak >5 konverzií/týž v ad groupe → prejdi na **Maximize Conversions**
- D16-21: Hľadaj "wasted spend" — KW s >€10 spend a 0 conv → pause alebo restruktúruj

**Týždeň 4 — Decision point**
- D22-30: Audit cely účet:
  - Top 3 ad groups → škáluj budget +20%
  - Bottom 3 → pause alebo restrukturuj
  - Spočítaj **profit-CPA** (CPA × čistá marža na priemernej objednávke) — ak negative, zníž tCPA target o 20%
  - Rozhodni o **Performance Max launch** v mesiaci 2 (len ak ≥30 conv/mes z Search)

---

## 13. REPORTING + KPI

**Týždenný report (1 strana, Pondelok 9:00):**

| KPI | Target | Akcia ak < target |
|---|---|---|
| Impressions | ≥ 8 000/týž | Zvýš CPC bid alebo pridaj KW |
| CTR (search) | ≥ 5% | Refresh ad copy, pridaj sitelinks |
| Avg CPC | ≤ 0.55 € | Zlepši Quality Score (LP match) |
| Conversions | ≥ 7/týž (eshop) | Zníž friction na LP, A/B test CTA |
| CPA | ≤ 25 € | Pause underperformers |
| ROAS | ≥ 300% | Bid down na low-margin KW |
| Search Impression Share | ≥ 60% (brand 90%) | Zvýš budget alebo bid |
| Quality Score avg | ≥ 7 | Re-align ad ↔ KW ↔ LP |

**Mesačný report:**
- Top 10 keywords by ROAS
- Top 10 search terms by conversions
- Negative keywords harvested
- Audience performance (in-market, custom, RM)
- Geo performance (PT vs. región vs. zvyšok SR)
- Recommendations pre ďalší mesiac

---

## 14. OTVORENÉ OTÁZKY (pred launchom)

Tieto musíš odpovedať pred spustením kampaní:

1. **B2B/B2C/hybrid?** — ovplyvňuje ad copy (tykanie vs. vykanie), pricing display (s DPH vs. bez), lead form fields
2. **Showroom v Partizánskom — máš fyzickú prevádzku?** — ovplyvňuje GBP, Location extension, lokálne SEO
3. **Telefón s human responderom v pracovnej dobe?** — bez toho nezapínaj Call extension (drahé per click, frustrácia)
4. **Avg margin na typickej objednávke?** — určuje max CPA (typický pravidlo: CPA = 20-30% z marže)
5. **Shoptet GA4 integrácia + Google Merchant Center feed pripravený?** — bez tohto nemôžeš spustiť Shopping ani conversion tracking

---

## 15. ANTI-PATTERNS — čo NIKDY nerob na tomto účte

- ❌ **PMax v prvom mesiaci** — nemá dáta, spáli budget
- ❌ **Broad Match bez tCPA** — žerie budget
- ❌ **Bidovať na "maslen"** alebo iný konkurenčný brand — drahé, low QS, možný trademark conflict
- ❌ **Homepage ako Final URL** — vždy konkrétna kategória/produkt LP
- ❌ **Auto-applied recommendations ON** — Google ti expanduje broad match → vždy manual review
- ❌ **Konverzia = "add to cart"** ako primary — to je micro-conversion, primary musí byť purchase
- ❌ **Bid na "strecha" (generic)** — neuveriteľný volume, neuveriteľný spend, 0.5% CR
