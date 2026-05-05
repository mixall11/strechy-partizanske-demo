# Strechy Partizánske — projekt

## Status
**4 demo verzie hotové** (2026-05-05). Classic + Authority + Conversion King + Editorial. Plus Shoptet CSV importy + setup playbook.

→ Porovnanie verzií + odporúčanie: [DEMOS_OVERVIEW.md](DEMOS_OVERVIEW.md)

## Cieľ
Postaviť eshop pre strešný / klampiarsky sortiment v regióne Partizánske. Otvorené, či B2B-only, B2C alebo hybrid.

## Kľúčový konkurent / vzor
- **Maslen** — https://eshop.maslen.sk (najsilnejší regionálny hráč v podobnom sortimente)
- Platforma Maslen: ShopCentrik (NetDirect, CZ) — enterprise Java/Spring, drahý na úpravy
- **NEpoužívať ShopCentrik** pre tento projekt — zbytočný overkill

## Platforma (zvolená)
**Shoptet** (`shoptet.sk` odporučený pre SK trh; CZ alternatíva `shoptet.cz`).
- Plán: BUSINESS (50 €/mes, neobmedzene produktov)
- Cca 60 €/mes total vrátane Heureka + Google Shopping
- Setup čas: ~1 hodina (trial → import kategórií → import produktov → branding → doména)

Limity Shoptetu (kedy migrovať): nemá natívnu kalkulačku strechy, slabé fasetové filtre nad 1 000 produktov, nemá multi-warehouse. Fallback = WooCommerce + B2BKing.

## Kategórie — taxonómia
Vzorová matrica + kompletný strom URL: [knowledge/maslen_category_matrix.md](knowledge/maslen_category_matrix.md)

## Otvorené otázky
1. B2B / B2C / hybrid?
2. Vlastný brand (private label) alebo distribúcia?
3. Showroom v Partizánskom?
4. Doplnkové služby v eshope (montáž, kalkulačka)?

## Štruktúra projektu

```
strechy-partizanske/
├── CLAUDE.md                       — tento brief
├── DEMOS_OVERVIEW.md                — porovnanie 4 verzií + odporúčanie + psych. analýza
├── knowledge/
│   └── maslen_category_matrix.md   — Maslen taxonómia + UX patterns
├── demo-v1-classic/                — baseline Shoptet-like (#1B3A57 + #B5472E)
│   ├── index.html
│   └── style.css
├── demo-v2-authority/              — Lindab/Manufactum premium (sépia + serif Playfair)
│   ├── index.html
│   └── style.css
├── demo-v3-conversion/             — Notino/Alza max-CR (red + countdown + scarcity)
│   ├── index.html
│   └── style.css
├── demo-v4-editorial/              — Apple/heritage (cream + Cormorant + manifesto)
│   ├── index.html
│   └── style.css
└── shoptet/
    ├── SHOPTET_SETUP.md            — krok-za-krokom setup playbook
    ├── categories.csv              — 54 kategórií na import
    └── products_sample.csv         — 15 ukážkových produktov
```

## Otvor demá

```bash
firefox /home/michal/claude_projects/strechy-partizanske/demo-v*/index.html
```
