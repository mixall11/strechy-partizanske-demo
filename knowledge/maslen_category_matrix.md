# Maslen.sk — vzor kategórií pre strešný / klampiarsky eshop

**Zdroj:** https://eshop.maslen.sk/  
**Snapshot:** 2026-05-05  
**Platforma:** ShopCentrik (NetDirect s.r.o., CZ) — Java/Spring + Bootstrap 4 šablóna `default-bs4`  
**URL vzor:** `/c/<parent>` → `/c/<parent>/<child>` → `/c/<parent>/<child>/<grandchild>` (max 3 úrovne)

---

## 1) Matrica kategórií (L1 × L2 × L3)

| L1 (10 hlavných) | L2 (subkategória) | L3 (detail) | Logika delenia |
|---|---|---|---|
| **Krytiny skladom** | Topdach S15, Unidach, Uniplech, Uni-šablóna | — | podľa typu/série výrobku |
| **Klampiarske produkty** | Pozink, Strieborná, Sivá, Čierna, Biela, Tehlová, Červená, Červenohnedá, Tmavohnedá, Tmavozelená, Modrá, Drevodekor | — | **podľa farby** (RAL paleta) |
| **Klampiarske náradie** | — (flat) | — | bez podkat. — krátka kategória |
| **Strešné doplnky** | Fólia, Lak, Spray, Tmel, Tesniace pásky, Odvetrávací pás hrebeňa, Vetrací hrebeň, Pás proti vtákom, Prestupová manžeta, (kategórie-105) | — | **podľa funkcie** doplnku |
| **Spojovací materiál** | Skrutky pre krytiny, Skrutky pre sendvičové panely, Nity, Príponky, Orkán-kalota, (kategórie-110) | Skrutky pre krytiny → **do dreva**, **do ocele**<br>Skrutky pre sendvič → **do dreva/betónu**, **do ocele** | L2 = typ spoja, L3 = **podklad** (do čoho sa skrutkuje) |
| **Snehové zábrany** | Na hladké krytiny, Na profilované krytiny | — | podľa **typu povrchu krytiny** |
| **Ploché strechy** | Fólia, Doplnky, Poplastované plechy, Poplastované klampiarske produkty | — | podľa typu materiálu/produktu pre PVC strechy |
| **Sendvičové panely** | Strešné, Stenové, Doplnky | — | podľa **použitia** panelu |
| **Okná a výlezy** | — (flat) | — | krátka kategória |
| **Zvodový systém** | 125/87 mm, 150/97 mm, … | — | podľa **rozmeru** zvodu |

> **Dummy / zaplnené priečinky:** `kategorie-105`, `kategorie-110`, `doplnky1`, `folia1` — slug s číslom = ShopCentrik defaultný auto-slug po duplicite. Pri vlastnom CMS si dávaj pozor na unikátnosť slugov.

---

## 2) Vzor delenia (universal pattern)

ShopCentrik / Maslen rieši **multi-axis taxonómiu** tak, že každá hlavná kategória si vyberie **jeden dominantný atribút**, podľa ktorého sa drilluje:

| Os delenia | Použité v L1 | Kedy použiť |
|---|---|---|
| **Farba (RAL)** | Klampiarske produkty | Vizuálne produkty, kde zákazník hľadá ladenie |
| **Typ produktu/série** | Krytiny skladom | Brandované série, kde značka = výber |
| **Funkcia / účel** | Strešné doplnky, Ploché strechy | Doplnky a komponenty s rôznym uplatnením |
| **Podklad / materiál protistran y** | Spojovací materiál (L3) | Inštalačné komponenty (skrutky do X) |
| **Rozmer** | Zvodový systém | Technický produkt, kde sa rieši kompatibilita |
| **Použitie** | Sendvičové panely (strešné/stenové) | Bipolárne — pre 2-3 jasné scenáre |
| **Typ povrchu cieľa** | Snehové zábrany | Príslušenstvo závislé na inom produkte |

**Pravidlo:** v jednej L1 sa nemiešajú dve osi (napr. Klampiarske produkty NIE sú zároveň podľa farby aj rozmeru — len podľa farby; rozmer je až na product detaile). To znižuje rozhodovaciu paralýzu.

---

## 3) UX patterns z ShopCentrik šablóny

| Prvok | Hodnota | Dôvod |
|---|---|---|
| **Subkategória ako tile** | `<a class="subCat subCat-tile subCat-img">` + thumbnail 108×80 px + názov + **počet produktov v zátvorke** `(28)` | Sociálny dôkaz hĺbky katalógu; OK pre 4–12 podkat. |
| **Filter sidebar** | `Iba skladom` (checkbox), `Zobraziť varianty produktu`, `Parametre` (dynamické podľa kategórie), `Zrušiť filter` link | Minimalistický — nezavalí stavbára |
| **Breadcrumbs** | Z URL (Domov / L1 / L2 / L3) | SEO + orientácia |
| **Lazy load obrázkov** | `<img class="lazy">` + IntersectionObserver | Performance pri 100+ produktoch v L1 |
| **Cookies bar** | `D3000S_cookies_bar` div, ikona 🍪 | Štandard EU |
| **Bezcenná verzia (B2B)** | Skryté ceny pre nelogovaných (registrácia → veľkoobchod) | Maslen je B2B-friendly |
| **CSRF na všetkých formoch** | `_csrf_token` v každom POST | Spring Security default |

---

## 4) Aplikácia pre Strechy Partizánske

Ak budeš stavať konkurenčný eshop, **použi Maslen taxonómiu ako baseline** a uprav:

### Ponechať (overený vzor)
- 10 L1 kategórií — pokrývajú celý sortiment strechára bez prekrytia
- Klampiarske produkty delené **podľa farby** (zákazník skoro vždy príde s "potrebujem v tehlovej")
- Spojovací materiál L3 podľa **podkladu** (inštalatér vie, do čoho skrutkuje)
- Zobraziť **počet produktov** v subkategórii

### Zmeniť / vylepšiť
- **Pridaj L0 quick-finder** ("Vyber krytinu podľa typu strechy" — wizard 3 otázky → odporučenie). Maslen toto nemá, je to rozdielová výhoda.
- **Filter "podľa farby"** ako globálny axis nad celou kategóriou klampiarskych produktov + krytín — nie len ako podkategória. (Maslen má len v Klampiarske.)
- **Zrušiť dummy slugy** (`kategorie-105`, `doplnky1`) — vyzerá to neudržiavane.
- **Pridať balíčky** ("kompletná strecha 100m² — Topdach S15 + spojovák + zábrany + zvody") — Maslen nemá, B2C zákazník to chce.
- **Cenotvorba transparentná aj pre neregistrovaných** (Maslen ich tlačí do registrácie → friction pre B2C). Zachovaj len B2B zľavy za login.

### Platformu NEbrať
ShopCentrik je drahý enterprise produkt (NetDirect partner-only úpravy). Pre Strechy Partizánske odporúčam:
- **WooCommerce + B2BKing/Wholesale Suite plugin** — open-source, RAL filtre cez WooCommerce Attributes, lacné úpravy
- **Shoptet Premium** — ak nechceš self-hosted, B2B add-on, slovenský support
- **Shopify + B2B Wholesale Channel** — najrýchlejší launch, ale drahšie variantové vzory ako WooCommerce

---

## 5) Surový strom URL (na import / reuse)

```
/c/krytiny-skladom
  /topdach-s15
  /unidach
  /uniplech
  /uni-sablona

/c/klampiarske-produkty
  /pozink /strieborna /seda /cierna /biela /tehlova
  /cervena /cervenohneda /tmavohneda /tmavozelena /modra /drevodekor

/c/klampiarske-naradie

/c/stresne-doplnky
  /folia /lak /spray /tmel /tesniace-pasky
  /odvetravaci-pas-hrebena /vetraci-hreben /pas-proti-vtakom
  /prestupova-manzeta

/c/spojovaci-material
  /skrutky-pre-krytiny
    /do-dreva
    /do-ocele
  /skrutky-pre-sendvicove-panely
    /do-dreva-do-betonu
    /do-ocele
  /nity
  /priponky
  /orkan-kalota

/c/snehove-zabrany
  /na-hladke-krytiny
  /na-profilovane-krytiny

/c/ploche-strechy
  /folia
  /doplnky
  /poplastovane-plechy
  /poplastovane-klampiarske-produkty

/c/sendvicove-panely
  /stresne /stenove /doplnky

/c/okna-a-vylezy

/c/zvodovy-system
  /125-87-mm
  /150-97-mm
```

---

## 6) Otvorené otázky (pre rozhodnutie)

1. **B2B / B2C / hybrid?** Maslen je B2B-prevažujúci (skrytie cien). Strechy Partizánske bude tiež veľkoobchod alebo aj konečný zákazník?
2. **Lokálny outdoor / showroom?** Ak áno, kategórie môžu byť plytšie — ľudia sa dopytujú telefonicky.
3. **Vlastný brand vs. distribúcia?** Maslen má vlastný brand `Topdach`, `Unidach`, `Uniplech` — má zmysel v Partizánskom napodobniť (private label) alebo len distribuovať?
4. **Doplnkové služby v eshope?** Montáž, výjazd, kalkulačka strechy — Maslen nemá, je to konkurenčná výhoda.
