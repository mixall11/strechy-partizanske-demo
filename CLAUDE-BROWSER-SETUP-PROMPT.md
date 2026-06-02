# Claude.ai Browser Prompt — Strechy Partizánske Google Ads Setup

> **Použitie:** Otvor [claude.ai/new](https://claude.ai/new), vyber model **Claude Opus 4.7** alebo **Sonnet 4.6**, a skopíruj celý prompt nižšie (od ===== START po ===== END).
>
> Claude vráti ~30-50 strán paste-ready output: setup steps, CSV files pre Google Ads Editor, RSA texty, negatívy, tracking inštrukcie.
>
> **Predpoklad:** Máš v ruke v3 roadmap PDF — Claude bude pracovať podľa jeho M1 konfigurácie.

---

===== START PROMPT =====

# ROLA

Si **Google Ads operations specialist** s 10+ rokmi praxe v praktickom setupe účtov pre SK malých a stredných klientov. Tvoja úloha: premeniť pripravený 6-mesačný plán pre **Strechy Partizánske** na konkrétne klikabilné inštrukcie + paste-ready artefakty pre Google Ads UI a Google Ads Editor.

Dnes je Google Ads 2026. Používaš aktuálne funkcie: RSA, Performance Max, Consent Mode v2, Enhanced Conversions, INP namiesto FID, Google Merchant Center NEXT.

# CONTEXT — KLIENT

```yaml
projekt: Strechy Partizánske
domena: strechy-partizanske.sk
platforma_eshopu: Shoptet (plán BUSINESS, 50 €/mes)
google_ads_id: NEW
google_ads_id_mcc: Linkujem pod MCC ID majiteľa

# Ponuka
biznis_model: Eshop pre strešný / klampiarsky sortiment (B2C primárne, B2B sekundárne)
sortiment:
  - Plechové krytiny (Lindab, Topdach, Uniplech)
  - Betónová a keramická škridla (Bramac, Tondach)
  - Klampiarske produkty (RAL paleta, 12 farieb skladom)
  - Odkvapový systém (vrátane Lindab Rainline)
  - Spojovací materiál (skrutky pre krytiny + sendvičové panely)
  - Snehové zábrany
  - Strešné doplnky (fólie, tmely, manžety)

unique_value:
  - Osobný odber v Partizánskom (showroom)
  - Doprava po SR < 48h od 4,90 €
  - 12 farieb RAL skladom (rýchla dostupnosť)
  - B2B faktúry s DPH + zľavy pre firmy
  - Konzultácia s technikom zdarma

priemerna_objednavka: 250 €
priemerna_marza: 22 %
maximalna_CPA_eshop: 25 €
maximalna_CPA_lead: 35 €

# Geo
geo_primary: Partizánske + 30 km radius (bid +30%)
geo_secondary_M2: Trenčiansky kraj (baseline)
geo_secondary_M3: + Žilinský + Nitriansky kraj (baseline)
geo_excluded: ČR (Shoptet len SK doručenie v štarte)

# Rozpočet M1 (aplikujem v3 plan)
mesacny_budget_M1: 150 €
denny_budget_M1: 5 €
test_budget_pct_M1: 0  # M1 = data collection only, žiadne A/B testy

# Kampane pre M1 (z v3 roadmap)
kampane_M1:
  - meno: "SP-M1-Brand"
    typ: Search
    budget_dna: 1.00 €
    bidding: Manual CPC (Max Clicks)
    max_cpc: 0.20 €
    ad_groups: 1
  - meno: "SP-M1-Krytiny-Plechove"
    typ: Search
    budget_dna: 4.00 €
    bidding: Manual CPC (Max Clicks)
    max_cpc: 0.70 €
    ad_groups: 1

# Schedule M1
schedule:
  pondelok_piatok: "07:00-20:00"
  sobota: "08:00-18:00"
  nedela: "09:00-20:00"
  ostatne_hodiny: PAUSED

# Tracking
ga4_id: NEW (zatiaľ neexistuje — vytvor v M1)
gtm_id: NEW
shopify_alebo_shoptet_eshop: Shoptet (built-in GA4 integration)
crm: zatiaľ email forward na obchod@strechy-partizanske.sk
consent_mode_v2: implementovaný cez Shoptet cookie banner

# Kontakt — TIETO ÚDAJE FLAGOVAŤ AKO OPEN QUESTION
telefon_obchod: NEUPRESNENÉ — flag ako OPEN QUESTION
otvaracie_hodiny: NEUPRESNENÉ — flag ako OPEN QUESTION
email_obchod: obchod@strechy-partizanske.sk
showroom_adresa: Partizánske (presná adresa neupresnená — flag)

# Landing pages — TIETO NIE SÚ POTVRDENÉ
# Predpoklad: štandardná Shoptet kategória štruktúra
landing_pages:
  - kampan: "SP-M1-Brand"
    url: "https://strechy-partizanske.sk/"
  - kampan: "SP-M1-Krytiny-Plechove"
    url: "https://strechy-partizanske.sk/c/krytiny-skladom/plechove/"
    flag: "ak táto URL ešte neexistuje, NESPÚŠŤAŤ kampaň"

# Brandy v sortimente (overené, NEFABRIKOVAŤ ďalšie)
brandy_povolene: ["Lindab", "Topdach", "Uniplech", "Bramac", "Tondach"]

# Konkurenti (pre custom audience exclusion + negative bidding)
konkurenti_domeny: ["maslen.sk", "lindab.sk", "bramac.sk", "ruukki.sk"]
```

# ÚLOHA

Vygeneruj **kompletný setup balíček pre M1 launch** s nasledujúcou štruktúrou:

## 1. PRE-SETUP CHECKLIST (D-7 pred launchom)
Veci, ktoré musia byť hotové PRED otvorením Google Ads UI:
- Google Ads účet vytvorený a verified
- Billing nastavenie (kreditka)
- GA4 property vytvorená + napojená na Shoptet
- Domain ownership verified v Google (pre M4 Shopping)
- GTM container nasadený (alebo Shoptet native GA4)
- Consent Mode v2 implementovaný v Shoptet
- Manuálna definícia konverzných cieľov:
  * primary: purchase (z GA4)
  * secondary: generate_lead, phone_call ≥90s
- LP pre /c/krytiny-skladom/plechove/ overené (existuje? Lighthouse mobile ≥80?)

Daj **konkrétne kliky** v Shoptet + GA4 + Google Ads UI pre každý bod.

## 2. PREHĽAD KAMPANÍ M1
Tabuľka: názov, typ, budget/deň, bidding, ad groups, dátum spustenia.

## 3. KAMPAŇ #1 — SP-M1-BRAND (krok-za-krokom v Google Ads UI)

### 3A. Campaign settings (10 krokov)
- New Campaign → konkrétne klikať
- Goal → ktorý z multiple voľieb
- Type, Subtype
- Bidding strategy (Manual CPC, max CPC 0.20 €)
- Budget (1.00 €/deň)
- Networks (Search ON, Display OFF, Search Partners OFF)
- Locations (Partizánske + 30 km, bid +30%)
- Languages (Slovak + English)
- Ad rotation (Rotate evenly v M1)
- Ad schedule (vyššie uvedený rozpis)

### 3B. Ad Group: "Brand-exact"
Keywords paste-ready (každý na novom riadku, presný formát Google Ads):
```
"strechy partizanske"
[strechy partizanske]
[strechy-partizanske.sk]
[strechy partizanske eshop]
```

### 3C. Ad-group negatívy: žiadne (brand chce všetko)

### 3D. RSA #1 — Brand
- 15 headlines (každý ≤30 znakov, uveď v komentári // X zn)
- 4 descriptions (každý ≤90 znakov, uveď // X zn)
- Headline 1 PINNED v position 1: "Strechy Partizánske — eshop"
- Žiadne superlatívy bez basis
- Žiadne fake čísla (žiadne "+20 rokov", "4.8★", "2000+ zákazníkov")

### 3E. Final URL + display path
- URL: https://strechy-partizanske.sk/
- Display: strechy-partizanske.sk / eshop (15 zn + 15 zn max)

## 4. KAMPAŇ #2 — SP-M1-KRYTINY-PLECHOVE (rovnaký formát ako #1)

### 4A. Campaign settings
- Budget 4.00 €/deň
- Manual CPC, max CPC 0.70 €
- Geo: Partizánske + 30 km
- Schedule vyššie

### 4B. Ad Group: "Plechove-krytiny"
Keywords (M1 obmedzená sada — len high-intent):
```
"plechova krytina cena"
"plechova strecha cena"
[krytina lindab]
[krytina topdach]
```

### 4C. Ad-group negatívy (apply hneď D1):
```
-bazar
-bazos
-pouzita
-druhotna
-zadarmo
-free
-recyklat
-praca
-brigada
-hladam
-montaz
-instalacia
-ako
-postup
-navod
-svojpomocne
-kalkulacka
-tutorial
-video
-recenzie
```

### 4D. RSA #2 — Plechové krytiny
15 headlines + 4 descriptions, paste ready. Použi povolené brandy: Lindab, Topdach, Uniplech, Bramac, Tondach. Použi USP: 12 farieb RAL, osobný odber Partizánske, doprava od 4,90 €, faktúra s DPH, konzultácia zdarma.

### 4E. Final URL + display path
- URL: https://strechy-partizanske.sk/c/krytiny-skladom/plechove/
- Display: strechy-partizanske.sk / krytiny / plechove

## 5. GLOBÁLNE NEGATIVE KEYWORD LISTS (paste-ready, 4 listy)

Pre každý list:
- Názov listu (čo zadať do Google Ads → Tools → Shared library)
- Apply na ktoré kampane (Brand exclude, ostatné apply)
- Zoznam slov, jeden na riadok

Listy:
1. **SP-Negatives-Irrelevant** (30+ slov)
2. **SP-Negatives-JobSeekers** (15+ slov)
3. **SP-Negatives-Informational** (20+ slov)
4. **SP-Negatives-Competitors** (10+ slov, podľa konkurentov_domeny)

## 6. EXTENSIONS / ASSETS

### Sitelinks (8 ks) — paste ready
Pre každý: title (≤25 zn), description1 (≤35 zn), description2 (≤35 zn), URL
Príklad:
```
Title: Plechové krytiny
Desc1: Lindab, Topdach, Uniplech
Desc2: 12 RAL farieb skladom
URL: /c/krytiny-skladom/plechove/
```

### Callouts (10 ks) — text ≤25 znakov
```
Osobný odber Partizánske
Doprava od 4,90 €
12 farieb RAL skladom
... (všetky 10)
```

### Structured snippets
- Header type: Brands → Lindab, Topdach, Uniplech, Bramac, Tondach
- Header type: Service catalog → Doprava, Osobný odber, Cenová ponuka, Konzultácia

### Call extension
- **FLAG AKO OPEN QUESTION**: telefón nepoznám
- Pripomeň v output, že bez tohoto NEVYTVÁRAŤ Call extension (lepšie žiaden ako fake)

### Lead form extension
- Title: "Cenová ponuka do 24 h"
- CTA: "Získať ponuku"
- Polia: Meno, Telefón, Lokalita, Popis strechy (max 4)
- Forward email: obchod@strechy-partizanske.sk
- Privacy URL: https://strechy-partizanske.sk/gdpr/ (FLAG ak neexistuje)

### Location extension
- **FLAG AKO OPEN QUESTION**: nepoznám presnú adresu showroomu
- Bez GBP setup nezakladať Location extension

## 7. CONVERSION TRACKING SETUP (krok-za-krokom)

### Shoptet → GA4
1. Shoptet Admin → Marketing → Google Analytics 4
2. Vlož GA4 Measurement ID (G-XXXXXXXX)
3. Zapnúť: Enhanced ecommerce, Cookie consent integration
4. Over: prejsť purchase flow → over GA4 DebugView event purchase

### GA4 → Google Ads Link
1. GA4 Admin → Product Linking → Google Ads links
2. Vyber Google Ads account → Save
3. Povol: Personalized Advertising, Auto-tagging

### Import konverzií z GA4
1. Google Ads → Tools → Conversions → New conversion action
2. Source: Google Analytics 4 properties (Web)
3. Vyber events: **purchase** (primary), **generate_lead** (secondary)
4. Conversion value: Use the value from event
5. Count: One (purchase) / Every (lead)
6. Attribution model: Data-driven (default 2024+)

### Enhanced Conversions ON
1. Tools → Conversions → click on purchase conversion
2. Enhanced conversions for web → Turn on
3. Implementation method: Automatic via Google Tag (Shoptet má built-in)
4. Verify: prebehne 24-48h pred zobrazením metriky

### Consent Mode v2
1. GTM → New Tag → Google tag (gtag config)
2. Consent settings: default_consent_state → analytics_storage: denied, ad_storage: denied
3. Update trigger: cookie banner accept → analytics_storage: granted, ad_storage: granted
4. Shoptet má built-in consent banner — over že je v Consent Mode v2 móde

### Phone call tracking
- **PODMIENKA**: Klient má human respondera 8-17 Po-Pi
- Ak ÁNO → Google forwarding number setup v Call extension
- Ak NIE → SKIP phone tracking, fokus na form leads

## 8. GOOGLE ADS EDITOR — CSV TEMPLATES

Pre rýchlejší bulk upload (namiesto klikania v UI):

### campaigns.csv
```csv
Campaign,Campaign Type,Status,Budget,Bid Strategy Type,Bid Strategy Name,Budget Type,Networks,Languages,Locations,Location Bid Modifier,Ad Schedule
SP-M1-Brand,Search,Enabled,1.00,Manual CPC,,Daily,"Google search","Slovak;English","Partizánske, Slovakia,30","30%",...
SP-M1-Krytiny-Plechove,Search,Enabled,4.00,Manual CPC,,Daily,"Google search","Slovak;English","Partizánske, Slovakia,30","30%",...
```

### ad-groups.csv
```csv
Campaign,Ad Group,Status,Max CPC,Default Final URL
SP-M1-Brand,Brand-exact,Enabled,0.20,https://strechy-partizanske.sk/
SP-M1-Krytiny-Plechove,Plechove-krytiny,Enabled,0.70,https://strechy-partizanske.sk/c/krytiny-skladom/plechove/
```

### keywords.csv (paste ready)
```csv
Campaign,Ad Group,Keyword,Match Type,Status,Max CPC,Final URL
SP-M1-Brand,Brand-exact,strechy partizanske,Phrase,Enabled,,
... (všetky KW)
```

### negatives.csv
```csv
Campaign,Negative Keyword,Match Type
SP-M1-Krytiny-Plechove,bazar,Broad
SP-M1-Krytiny-Plechove,pouzita,Broad
... (všetky negatívy)
```

### rsa-ads.csv
```csv
Campaign,Ad Group,Ad Status,Headline 1,Headline 1 Position,Headline 2,...,Description 1,Description 2,Description 3,Description 4,Final URL,Path 1,Path 2
... (všetky RSA)
```

### extensions.csv
```csv
Type,Sitelink Text,Description 1,Description 2,Final URL,Status
Sitelink,Plechové krytiny,...
... (všetky extensions)
```

## 9. POST-LAUNCH CHECKLIST (D0 - D7)

**D0 (deň spustenia):**
- [ ] Manual test purchase: kúp 1 produkt (alebo lead form fill) sám
- [ ] Over GA4 DebugView: event `purchase` zaznamenaný
- [ ] Over Google Ads → Tools → Conversions: conversion "recorded" s value
- [ ] Auto-applied recommendations → OFF (Settings → Automated rules)
- [ ] Display Expansion → OFF v Search kampaniach
- [ ] Budget alert nastavený na 80% budget threshold

**D1-D7 (denne):**
- [ ] Search Term Report check 2× denne (ráno + večer)
- [ ] Negatives harvest: každý irelevantný term ihneď do listu
- [ ] Quality Score audit D5 (cieľ ≥6, ak nižšie → re-align ad ↔ KW ↔ LP)
- [ ] CTR check D7 (cieľ ≥1.5%, ak nižšie → A/B test headlines)
- [ ] Impression check D7 (ak <500 → zvýš max CPC bid)

## 10. OPTIMIZATION CADENCE (Týždenný rytmus)

**Pondelok:**
- Search Term Report harvest (1h)
- Negatives prevedenie (15 min)
- Weekly metrics report (CPA, CTR, spend, conv) (30 min)

**Streda:**
- Bid adjustments by device/audience/geo (45 min)
- Quality Score audit deep-dive (30 min)

**Piatok:**
- A/B test review (ak nejaký beží) (30 min)
- Plánovanie next week priorít (15 min)

## 11. ANTI-PATTERNS — ČO NEROBIŤ V UI

❌ **Auto-applied recommendations ON** — Google by zapol broad match a URL expansion
❌ **Display Expansion ON v Search** — žerie budget na irelevantné placements
❌ **Optimize ad rotation v M1** — málo dát, Google AI sa nenaučí správne; Rotate evenly
❌ **Quality Score ignorovať** — mash 30 KW do 1 ad group = CPC ↑ 40-60%
❌ **Sitelinks bez relevant date ranges** — môžu sa neumiestňovať správne
❌ **Smart Bidding od D1** — nemáš 30+ konverzií, Google AI sa nenaučí
❌ **Vymyslené tvrdenia v ad copy** — Google disapproval + SOI pokuta
❌ **Bidding na "maslen", "lindab" brand** — drahé, low QS, trademark riziko
❌ **Homepage ako Final URL pre kategórie** — Quality Score down, CPC up
❌ **Auto-applied "expand your reach" v ad groups** — pridá to "blízke" KW = drahé

## 12. OPEN QUESTIONS — UVIESŤ NA KONIEC VŽDY

Zoznam vecí, ktoré pred spustením treba vyriešiť (priorita zoradená):

1. **Telefón na obchod a otváracie hodiny** — bez tohto nezakladáme Call extension
2. **Adresa showroomu v Partizánskom** — potrebné pre Google Business Profile + Location extension
3. **LP `/c/krytiny-skladom/plechove/`** — overiť že existuje, má H1 = "Plechová krytina", Lighthouse mobile ≥80, INP <200ms, mobile usability OK
4. **LP `/cenova-ponuka/`** — potrebná pre Lead Form Extension landing (alebo jasná thank-you page)
5. **GDPR / Privacy URL** — potrebné pre Lead Form Extension
6. **B2B vs B2C tonality** — tykanie alebo vykanie v ad copy? (Plán prefiguruje B2C tykanie)
7. **Marža overenie** — predpokladaná 22%. Ak nižšia, max CPA musíme znížiť
8. **Telefón forwarding** — kto dvíha, kedy, ako dlho v priemere trvá hovor (pre Call extension threshold)
9. **CRM proces** — kde a kto označuje leady ako Hot/Warm/Cold/Junk po form submite
10. **Sezóna spustenia** — ak spúšťame v Nov-Feb, automaticky aplikovať budget × 0.5-0.6 a flag to

# ŠTRUKTÚRA VÝSTUPU

Postupuj presne v poradí sekcií 1-12 vyššie. Začni s **Pre-setup checklist (sekcia 1)**. Každú sekciu označ jasným nadpisom. CSV súbory daj do code blockov so syntax highlight ```csv. Texty s počítaním znakov uvádzaj v komentári `// 28 zn ✓`.

# TVRDÉ PRAVIDLÁ

- **NIKDY** žiadne fake čísla ("+20 rokov", "4.8★", "2000+ zákazníkov", "najlepší")
- **NIKDY** brandy mimo zoznamu `brandy_povolene`
- **VŽDY** počítaj znaky v ad copy (Headlines ≤30, Descriptions ≤90, Display path 2×15)
- **VŽDY** flag chýbajúce informácie v OPEN QUESTIONS namiesto vymýšľania
- **SK gramatika** musí byť bezchybná — žiadne typo ako "vrátka" (správne: vrátenie), "stresne krytiny" (správne: strešné krytiny), "vyrábky" (správne: výrobky)
- Headline pinning: iba P1 pre brand alebo key benefit, žiadne pinning H2-H15
- **Žiadne emoji** v ad copy (Google ich v niektorých polohách odmieta)

# TONE

Slovenčina, tykanie, stručne, žiadne plnidlá. Konkrétne čísla a kliky. Pri rozhodnutiach: 1 odporúčanie + tradeoff.

===== END PROMPT =====

---

## Ako použiť tento prompt

1. **Skopíruj** všetko od `===== START PROMPT =====` po `===== END PROMPT =====`
2. **Otvor** [claude.ai/new](https://claude.ai/new) — vyber **Claude Opus 4.7** (najlepší pre dlhé štruktúrované výstupy)
3. **Paste** do chat boxu, stlač Enter
4. Claude vygeneruje ~30-50 strán paste-ready output
5. **Skopíruj jednotlivé sekcie** do Google Ads UI alebo Google Ads Editor:
   - Sekcia 8 (CSV) → Google Ads Editor → File → Import
   - Sekcie 3-6 → Google Ads UI manuálne (jedno-časový setup)
   - Sekcia 7 → GTM + Shoptet admin
6. **Pred launchom** vyrieš všetky OPEN QUESTIONS (sekcia 12)

## Tips

- Ak Claude pracuje pomaly alebo skráti output, **napíš:** "Pokračuj sekciou X" — bude pokračovať odkiaľ skončil
- Ak chceš zmeniť budget alebo pridať novú kampaň → uprav `kampane_M1` v CONTEXT bloku
- Pre M2-M6 spusti rovnaký prompt znova, ale s aktualizovaným `mesacny_budget` a `kampane_M2` (z v3 roadmap)
