# Open Design brief — Strechy Partizánske

**Účel:** vstup pre OD prototyp (3 design systémy: clean, bento, modern).
**Verzia:** v1, 2026-05-20.
**Stav rozhodnutí:**
- Model: **hybrid B2B + B2C** ✅
- Trust čísla: placeholdery `[X]` — doplniť pred publish
- Showroom: online-only (default)
- Doplnkové služby: kalkulačka áno; montáž "na vyžiadanie", nie CTA

### Finálne rozhodnutie 2026-06-02 (KORIGOVANÉ — žiadny WooCommerce)
Michal odmietol Woo migráciu ("nemá logiku migrovať fungujúci Shoptet"). Platná architektúra:
- **Prezentačný web → WordPress** (nahrádza Mobirise). Len web + **blog** + sortiment-prehľad + kalkulačka(lead) + kontakt. **ŽIADNY WooCommerce, žiadny eshop na WP.**
- **Eshop ZOSTÁVA na Shoptete** — nemigruje sa. Argument: chyby + bezpečnosť rieši Shoptet ako firma.
- **Blog je na WordPress webe, NIE na Shoptete** (Shoptet blog je slabý). Blog = hlavný dôvod existencie WP webu (SEO/content → traffic do eshopu).
- **Dizajn: zachovať súčasný vzhľad** a preniesť Mobirise HTML/CSS na WP tému ~1:1 (možnosť A). Osvieženie (B) až neskôr. **Authority preview vo `web-authority/` NIE je schválený smer** — Michal: "dizajn nového webu bol iný, nie takýto". Nechané len ako jedna z možností.
- **Hosting: Websupport** + LiteSpeed/QUIC.cloud.
- **Cieľovka: hybrid B2C + B2B**, ale B2B cenník rieši sa cez dopyt (žiadny B2BKing — to bola Woo vec).
- **Kľúčový tradeoff modelu:** web (WP) a eshop (Shoptet) sú 2 domény → nutný cross-domain tracking (GA4/GTM cez obe) + zladiť branding.
- **Dokument pre majiteľa:** [plan-zmien-pre-majitela.html](plan-zmien-pre-majitela.html) — chyby pôvodného webu + navrhované zmeny + prečo + postup (vykanie, biznis tón). Preview port 8776.
- Ďalej: potvrdiť dizajn A/B s majiteľom → preniesť dizajn na WP + blog + GA4 cross-domain → lokálne SEO → spustenie + 301.

---

## 1) Kto sme

Regionálny eshop pre strešný a klampiarsky sortiment, sídlo Partizánske, pokrytie západné + stredné Slovensko. Mix self-serve B2C (stavebník-svojpomocník) a B2B (malé stavebné firmy, klampiarski majstri). Alternatíva k Maslen.sk — transparentnejšia (ceny verejné aj pre B2C), s kalkulačkou strechy a jasnou taxonómiou bez dummy slugov.

## 2) Komu predávame

| Persona | % traffic (odhad) | Motivácia | Friction |
|---|---|---|---|
| **Stavebník-svojpomocník** (40–55 r., chalupár, novostavba) | 60 % | "Potrebujem krytinu v tehlovej, čo najrýchlejšie" | Neistota výberu, strach z preplatenia |
| **Klampiar / strešná firma** (30–50 r., 2–8 ľudí) | 30 % | "Potrebujem rýchlu dostupnosť + B2B ceny" | Časový tlak, potreba opakovaného nákupu |
| **Projektant / architekt** (25–45 r.) | 10 % | "Hľadám konkrétny RAL + technický list" | Chýbajúce datasheety |

## 3) USP / čím sa odlišujeme od Maslen

1. **Kalkulačka strechy zdarma** — zadáš m², sklon, typ krytiny → dostaneš BOM (bill of materials) na email
2. **Ceny verejné aj bez registrácie** — B2B zľavy len po login, nie skrytie cien
3. **Dodanie do 48 h** v regióne západné/stredné SK *(placeholder — potvrdiť)*
4. **RAL filter naprieč kategóriami** — nielen v Klampiarskych produktoch (Maslen má len tam)
5. **Lokálnosť** — sklad Partizánske, telefón v SK, výjazd v okrese

## 4) Sekcie homepage (poradie)

1. **Top bar** — `📞 +421 [tel] · Doprava od [X] € · Sklad Partizánske`
2. **Hero** — H1 + sub + 2 CTA (Kalkulačka / Katalóg) + krátka trust micro-line
3. **Kalkulačka teaser** — "Spočítaj cenu strechy za 60 sekúnd" + 3-step preview ikon
4. **Hlavné kategórie** — 10 L1 ako tile grid s počtom produktov a thumbnailom
5. **RAL color picker** — 12 farieb (vizuálne), klik → filtruje katalóg
6. **Featured produkty** — 4–8 produktov s cenou, dostupnosťou, fotkou
7. **Trust bar** — 4 čísla: roky / striech / produktov / dodanie *(placeholdery)*
8. **Ako objednávaš** — 3 kroky: vyber → spočítaj → doručíme
9. **Referencie / fotky realizácií** — galéria 6–8 ks *(placeholder — kým nie sú reálne, vynechať)*
10. **B2B sekcia** — "Si stavebná firma? Získaj veľkoobchodné ceny" + CTA Registrácia
11. **FAQ** — 6 otázok (záruka, dodanie, montáž, doprava, RAL, vrátenie)
12. **Footer** — kontakt, GDPR, OP, doprava, kategórie

## 5) Copy bloky (ready-to-paste)

### Hero
- **H1:** Krytiny a klampiarske produkty. Skladom v Partizánskom.
- **Sub:** Vyber farbu, spočítaj cenu strechy a doručíme do 48 h. Pre stavebníkov aj firmy.
- **CTA primary:** Spočítaj cenu strechy →
- **CTA secondary:** Otvor katalóg
- **Micro-trust:** Sklad Partizánske · [X+] rokov · Ceny vrátane DPH

### Value props (3-stĺpcový blok pod hero)
1. **Spočítaj online** — Kalkulačka ti dá BOM aj cenu. Žiadne nezáväzné dopyty.
2. **Doručíme do 48 h** — Sklad v Partizánskom, vlastný rozvoz po západe a strede SK.
3. **B2B ceny po prihlásení** — Firmám zobrazíme veľkoobchodné ceny, fakturáciu a kreditný účet.

### Trust bar (4 čísla — placeholdery do potvrdenia)
- `[X+]` rokov v strešnom remesle
- `[X+]` realizovaných striech
- `[X]+` produktov skladom
- `48 h` dodanie v regióne

### B2B teaser sekcia
- **H2:** Si stavebná firma alebo klampiar?
- **Body:** Po registrácii uvidíš veľkoobchodné ceny, kreditný účet do 30 dní a prednostný rozvoz.
- **CTA:** Zaregistrovať firmu →

### FAQ (6 Q&A)
1. **Aké RAL farby máte skladom?** — 12 najžiadanejších (tehlová, tmavohnedá, čierna, antracitová, modrá, zelená, biela, sivá, červenohnedá, drevodekor, pozink, strieborná). Ďalšie na objednávku do 5 dní.
2. **Robíte aj montáž?** — Montáž zabezpečujeme cez overených partnerov v regióne. Po objednávke ti pošleme kontakty.
3. **Aká je doprava?** — Nad `[X]` € zdarma v okrese Partizánske; mimo regiónu kalkulačne podľa hmotnosti.
4. **Čo ak si zle vypočítam strechu?** — Kalkulačka má 5 % toleranciu. Pri väčšej chybe ti zameníme nepoužité kusy.
5. **Aká je záruka?** — Štandardne 10–30 rokov podľa výrobcu (uvedené pri každom produkte).
6. **Vraciate tovar?** — 14 dní od doručenia, nepoškodené balenie, bez udania dôvodu.

## 6) Navigation — 10 L1 kategórií

```
Krytiny skladom · Klampiarske produkty · Klampiarske náradie ·
Strešné doplnky · Spojovací materiál · Snehové zábrany ·
Ploché strechy · Sendvičové panely · Okná a výlezy · Zvodový systém
```

Plné taxonómia v `knowledge/maslen_category_matrix.md`. L2 a L3 v prototypu netreba — len L1 ako navigation.

## 7) Voice & tone

- **Tykanie naprieč** (B2C aj B2B). Mladší/moderný majster preferuje tykanie, B2B firmy s tým nemajú problém.
- **Vecný + technický + krátky.** Hovor stavbára, nie marketéra.
- **Ban-list:** "revolučný", "inovatívny", "lifestyle", "premium" (okrem prirodzeného kontextu), "rodinný kruh", "tradícia od…" bez čísla, "AKCIA!", živé "Pavol z Trnavy práve kúpil".
- **Use-list:** konkrétne čísla (m², ks, mm, RAL kódy), "skladom", "do 48 h", "v Partizánskom", "BOM", "zľava pre firmy".

## 8) Design system hints (3 varianty)

### clean
Utilitárny katalóg. Kalkulačka v hero ako forma (nie len CTA). Tile grid kategórií dominantný. Minimum decorácie. Cieľ: B2C self-serve hľadač.

### bento
Asymetrický grid hub. Kalkulačka + 4 popular kategórie + RAL picker + featured produkt v jednom above-the-fold layout. Vizuálne hustý. Cieľ: rýchle decision-making, return visitor.

### modern
Väčšie obrázky, väčšia typografia, viac whitespace. Kategórie ako lookbook karty s veľkými fotkami striech. Cieľ: prvý dojem + B2B credibility, projektanti.

## 9) Out-of-scope (NEdávať do prototypu)

- ❌ Checkout flow / košík mechanika (len visual placeholder ikony)
- ❌ Fake "live" notifikácie ("X ľudí pozerá")
- ❌ Countdown timery, "posledné 3 ks"
- ❌ Cookies banner (vyriešime cez Plausible self-hosted, nie GA)
- ❌ Chatbot / live chat widget
- ❌ Influencer recenzie / celebrity endorsement
- ❌ Vymyslené prípadové štúdie / čísla bez podkladu

## 10) Referenčné materiály pre OD

- Maslen taxonómia + UX patterns: [knowledge/maslen_category_matrix.md](knowledge/maslen_category_matrix.md)
- 4 hotové demá ako vizuálna inšpirácia (NIE kopírovať 1:1):
  - [demo-v1-classic](demo-v1-classic/index.html) → blízko k `clean`
  - [demo-v2-authority](demo-v2-authority/index.html) → blízko k `modern`
  - [demo-v4-editorial](demo-v4-editorial/index.html) → premium tón, ale pre tento brief NEcieliť
- Vzorové RAL palette: tehlová `#a63823`, tmavohnedá `#3e2a1b`, antracit `#3a3d40`, tmavozelená `#2d4a2d`, pozink `#a8a8a8`

---

## TODO pred publish (mimo OD)

- [ ] Doplniť reálne čísla: `[X+]` rokov, striech, produktov; `[X]` € free shipping threshold
- [ ] Reálne telefónne číslo + adresa skladu
- [ ] Fotky realizácií (galéria sekcia 9)
- [ ] Logo (zatiaľ textový brand)
- [ ] Rozhodnúť doménu (`strechy-partizanske.sk` / `.eu` / alt)
