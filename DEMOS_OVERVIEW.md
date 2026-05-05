# Strechy Partizánske — 4 demo verzie

Štyri rôzne UX/marketingové prístupy. Každý je postavený na **inej psychologickej stratégii** a ide po **inej cieľovke**. Vyber si jeden alebo skombinuj prvky.

| Verzia | Štýl | Cieľovka | Hlavná psych. taktika | Konverzný cieľ |
|---|---|---|---|---|
| **v1 — Classic** | Maslen-like štandard | Zmiešaná B2B + B2C | Trust + sortiment | Add-to-cart |
| **v2 — Authority** | Lindab/Manufactum premium | Stavebné firmy, projektanti, sofist. B2C | Authority + reciprocity (lead magnet) | Konzultácia + email |
| **v3 — Conversion** | Notino/Alza maximalizmus | Self-serve B2C, deal-hunters | Scarcity + social proof + bundling | Add-to-cart, max CR |
| **v4 — Editorial** | Apple/heritage | Architekti, designeri, premium klient | Identity matching + storytelling | Brand affinity + bulletin |

---

## v1 — Classic ([demo-v1-classic/index.html](demo-v1-classic/index.html))
**Baseline.** To, čo ti spravil predošlý prompt — Shoptet-like štandard. Dobrý ako referenčný bod.

**Použité prvky:**
- Top bar s kontaktom + dopravou
- 10 L1 kategórií v hlavnom nav
- Hero s dvoma CTA (Krytiny + Kalkulačka)
- 8 kategórií ako tile grid s počtom produktov
- 12 farieb RAL ako vizuálny color picker
- 4 featured produkty s "SKLADOM" badge
- Trust bar: 20+ rokov, 1 200+ produktov, 48 h, 500+ firiem

**Kedy použiť:** ak nechceš experimentovať a potrebuješ "klasický eshop, čo predáva".

---

## v2 — Authority ([demo-v2-authority/index.html](demo-v2-authority/index.html))
**Premium B2B / expert positioning.** Inšpirované Lindab.com, Manufactum, Velux. Tmavá uhlovo-čierna paleta + akcent meď + serif typografia (Playfair Display).

### 🧠 Psychologické nástroje

| Princíp | Implementácia v deme |
|---|---|
| **Authority bias** | Hlavný technik s menom + titulom + portrétom; certifikácie partnerov ako logo wall |
| **Loss aversion** | "Zlá voľba krytiny = 8 000 € za 5 rokov" — strach zo zlej investície |
| **Reciprocity** | PDF "10 chýb pri výbere krytiny" zdarma na email (lead magnet) |
| **Anchoring** | "12 000 striech od 2005" + "30 rokov záruka" ako benchmark, voči ktorému sa všetko porovnáva |
| **Social proof (špecifický)** | Testimoniály od **identifikovaných profesionálov** s funkciou (Ing. arch., konateľ firmy) — nie "Pavol K." |
| **Scarcity (subtílna)** | "Vyberáme len výrobcov s 30-ročnou zárukou" — kvalitatívna scarcity |
| **Tool-based lead gen** | Kalkulačka strechy ako primárny CTA → email captures BOM |
| **Endowment effect** | "Pošleme ti kompletnú špecifikáciu (BOM)" — dáva pocit vlastníctva už pred objednávkou |

### 📧 Email marketing
- **Lead magnet PDF** → 5-step welcome sequence (deň 0, 2, 5, 9, 14)
- **Strechársky bulletin** mesačne → premium pozicovanie značky
- **Konzultačný follow-up** → automatické pripomenutie 3 dni po stiahnutí PDF

### 🎯 Konverzný cieľ
**Email + konzultácia** (nie hneď nákup). Prediková konverzná cesta: PDF → bulletin → konzultácia → ponuka.

**Kedy použiť:** ak chceš predávať drahšie produkty (Rheinzink, falcované strechy) a robiť B2B.

---

## v3 — Conversion King ([demo-v3-conversion/index.html](demo-v3-conversion/index.html))
**Maximum CR.** Inšpirované Notino, Alza, Mall.cz. Vysoká hustota informácií, agresívne urgency tactics. Paleta: červená/oranžová akcent + zelené success + modré trust.

### 🧠 Psychologické nástroje (fakt veľa)

| Princíp | Implementácia v deme |
|---|---|
| **Scarcity (numerická)** | "Posledných 8 ks", "Posledné 4 ks!" — konkrétne čísla aktivujú panic |
| **Urgency (čas)** | Countdown timer "Akcia končí o 14:32:08" v top stripe + sticky exit-bar |
| **Loss aversion** | Free shipping bar: "Do bezplatnej dopravy chýba 252,20 €" + progress 49 % |
| **Live social proof** | "Práve si pozerá 12 ľudí", "Posledný objednal pred 4 min · Pavol z Trnavy" |
| **Anchoring** | Škrtnutá pôvodná cena vedľa novej (`14,80 € → 9,80 €`) |
| **Decoy effect** | 3 cenové bundles: Basic / **Premium (highlight)** / Pro — stredný sa stáva default voľbou |
| **Reciprocity** | Welcome popup "5 % kupón pre prvý nákup" → email capture |
| **Gamification** | Strechári klub s 4 tier-mi (Bronz/Striebro/Zlato/Platina) + progress bar "do Zlata chýba 3 080 €" |
| **Social proof (kvantitatívny)** | "⭐ 4,8 z 5 · 4 213 hodnotení Heureka" + Heureka badge |
| **FOMO** | "8 ľudí má túto zostavu v košíku", "Pridané do košíkov 27× za posledných 24 h" |
| **Bundling / cross-sell** | "Komplet strecha 100 m² za 2 890 € (úspora 1 490 €)" |
| **Live chat** | Sticky bublina vpravo dole — zníži friction pri otázke |
| **Endowment** | Sticky košík s vždy viditeľným "Košík (3) · 247,80 €" |

### 📧 Email marketing (max sekvencií)

| Trigger | Sekvencia |
|---|---|
| Newsletter signup | 5-step welcome: kupón → top produkty → Heureka recenzie → klub registrácia → posledná pripomienka kupónu |
| Abandoned cart | 3-step: po 1 h pripomienka → po 24 h "tvoj košík ti uchovávame" → po 72 h kupón −5 % |
| Browse abandonment | "Pozeral si Topdach S15 — pošleme ti recenziu od architekta" |
| Klub progress | "Si 320 € od Zlata — 8 % cashback ťa čaká" |
| Reaktivácia | Po 60 dňoch nečinnosti: "Vrátil sa kupón 10 %" |

### 🎯 Konverzný cieľ
**Add-to-cart + dokončenie objednávky.** Frikciu redukujeme na minimum, FOMO maximalizujeme.

**Kedy použiť:** ak chceš čo najvyššiu CR z B2C trafficu, predávaš lacnejšie/strednodražné produkty s rýchlym rozhodnutím.

> ⚠️ **Etický disclaimer:** Niektoré "live social proof" nápisy ("Pavol z Trnavy kúpil pred 4 min") môžu byť reálne (ak ich napája Shoptet z DB) alebo fake — Notino má real, lacnejšie eshopy mávajú fake. **Odporúčam: rob to len reálne.** Falošné notifikácie sú detegovateľné a poškodia značku.

---

## v4 — Editorial ([demo-v4-editorial/index.html](demo-v4-editorial/index.html))
**Brand-first / heritage.** Inšpirované Apple, Manufactum, A.P.C., Aesop. Maximum whitespace, minimum CTA, full-bleed obrázky, serif (Cormorant Garamond). Monochromatická paleta + jediná akcentová sépiová.

### 🧠 Psychologické nástroje (subtílne, ale silné)

| Princíp | Implementácia v deme |
|---|---|
| **Identity matching** | "Pre tých, ktorí stavajú na desaťročia — nie na sezónu" → zákazník sa identifikuje |
| **Storytelling** | "Anno 2005 · 12 000 striech · Jeden cieľ" — naratív namiesto features |
| **Curated collections** | Namiesto kategórií "Vidiecky dom · Moderná novostavba · Historická rekonštrukcia" — výber podľa **identity stavby** |
| **Authority (umelecky)** | "Ako vyberáme" — 4 procesy s číslami I–IV, pôsobí ako manifest |
| **Heritage / Craftsmanship** | "Klampiarstvo, aké pamätáš od starých majstrov" + "Tolerancia 0,5 mm — ten stroj nevidí" |
| **Premium pricing without apology** | Žiadne "akcie" ani "−35 %". Cena nie je v hero. **Cenu odhalíš až po preskúmaní hodnoty.** |
| **Subtle social proof** | Hero quote od architektky + ref row "Ateliér Demel · StavKomplex · Slovenský pamiatkový úrad" |
| **Editorial content** | Žurnál s esejami (12 min čítanie) + prípadové štúdie + recenzie — buduje autoritu, ranking, brand |
| **Manifesto pattern** | Sekcia "Strecha nie je plech. Strecha je posledná hradba…" — krátky, emotívny manifest medzi sekciami |
| **Reciprocity (jemná)** | Bulletin "Bez reklamy. Bez kupónov. Bez 'AKCIE!'." — opačná taktika ako v3, ale rovnaký princíp |
| **Anti-FOMO branding** | "8 400+ odberateľov · neodhlasujú sa" — opak agresívneho urgency |

### 📧 Email marketing (premium, low-volume)
- **Strechársky bulletin** = mesačník (1× za 4 týždne, nie viac)
- Obsah: 1 esej (1 200 slov) + 1 prípadová štúdia (1 000 slov) + 3 odkazy na produkty (subtle)
- **Žiadne kupóny**, **žiadne "AKCIA!"** — bulletin = brand journal
- Welcome sequence: deň 0 = uvítanie + odkaz na 3 najlepšie eseje, deň 14 = žurnál archív
- Cieľ: **vybudovať dlhotrvajúci brand affinity**, nie short-term CR

### 🎯 Konverzný cieľ
**Brand affinity + bulletin signup.** Konverzia príde cez 6–18 mesiacov, ale s vyššou cenou produktu a vyššou opakovanou hodnotou (LTV).

**Kedy použiť:** ak chceš pozicovať Strechy Partizánske ako **prémiový brand** (nie najlacnejší, nie najrýchlejší — najlepší). Funguje keď máš v sortimente Rheinzink, meď, falcované strechy, architektonické projekty.

---

## Ako vybrať alebo skombinovať

### Single-pick odporúčanie podľa cieľov
- **Chcem rýchlo predávať lacnejším B2C zákazníkom** → **v3 Conversion King**
- **Chcem byť dôveryhodný expert pre stavebné firmy** → **v2 Authority**
- **Chcem byť prémiová značka pre architektov a vyšší segment** → **v4 Editorial**
- **Chcem klasický eshop bez experimentov** → **v1 Classic**

### Hybrid odporúčanie (najlepší pomer výsledok/námaha)
**Základ: v2 Authority** (bezpečné B2B + B2C positioning) **+ vybrané prvky z v3 Conversion**:
- Free shipping progress bar (loss aversion, ale nie agresívny)
- Live recenzie Heureka prominent
- Bundles "komplet strecha"
- Loyalty klub (gamification — funguje aj v premium)
- **NEpoužiť:** countdown timer, "posledné X ks", live "kúpil pred 4 min" (v premium kontexte vyzerá lacne)

**Plus z v4:** Žurnál sekcia + bulletin (long-term brand)

### Implementácia v Shoptete

| Verzia | Šablóna | Custom kód potrebný |
|---|---|---|
| v1 Classic | MyShop / Stylefarm | minimum |
| v2 Authority | Premium templates / custom | stredný (kalkulačka, lead magnet form) |
| v3 Conversion | Conversion / Pro | **vysoký** — Shoptet apps + custom JS pre live notifikácie |
| v4 Editorial | Custom dev | **vysoký** — vlastná šablóna |

**Reálny postup:**
1. Štart na **v1 Classic** v Shoptete (rýchly launch, 60 €/mes)
2. A/B testuj prvky z v2 a v3 cez Shoptet "Vlastný kód" + Google Optimize / Plausible
3. Po 12 mesiacoch dát sa rozhodni: v2 alebo v3 brand-cesta? Alebo migrácia na vlastný stack (WooCommerce / Hydrogen) pre v4?

---

## Otvor demá v prehliadači

```bash
xdg-open /home/michal/claude_projects/strechy-partizanske/demo-v1-classic/index.html
xdg-open /home/michal/claude_projects/strechy-partizanske/demo-v2-authority/index.html
xdg-open /home/michal/claude_projects/strechy-partizanske/demo-v3-conversion/index.html
xdg-open /home/michal/claude_projects/strechy-partizanske/demo-v4-editorial/index.html
```

Alebo všetky naraz vo Firefoxe:
```bash
firefox /home/michal/claude_projects/strechy-partizanske/demo-v*/index.html
```
