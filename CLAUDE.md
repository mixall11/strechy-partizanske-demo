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

---

## Profi dev pravidlá (plain / greenfield / Astro / Next)

> Univerzálny core je v `~/.claude/CLAUDE.md`. Toto je platform-specific addendum.

### Stack default
- HTML semantic (`header`/`main`/`article`/`section`/`footer`/`nav`). Žiadne `<div>` soup.
- CSS: vanilla + custom properties > frameworks pre statiku. Tailwind ak je veľa UI komponentov.
- JS: vanilla + ES modules. Framework len ak interaktivita > 30% stránky.
- Build: **Vite** > Webpack. **Astro** pre content-heavy weby (default voľba). Next.js len pre SSR/auth.
- Package manager: **pnpm** (rýchlejší, menej disk).

### SEO baseline (na každej stránke)
- 1× `<h1>` per page, hierarchia h2 → h3 → h4.
- Meta `title` (50-60 ch), `description` (140-160 ch), `og:image` (1200x630), `og:type`.
- Schema.org JSON-LD: minimum **Organization** + **WebSite** + **BreadcrumbList**. Article/Product/LocalBusiness kde relevantné.
- `sitemap.xml` + `robots.txt` + `canonical` link na každej stránke.
- `hreflang` ak multi-jazyčné.

### Accessibility (a11y)
- Kontrast ≥ 4.5:1 (text), ≥ 3:1 (UI komponenty). Test cez axe DevTools.
- Keyboard nav: každý interaktívny element dostupný cez Tab, viditeľný focus.
- ARIA labels na ikony bez textu. `alt` na images (alebo `alt=""` pre čisto dekoratívne).
- Focus visible: nikdy nemaž `outline` bez náhrady (`:focus-visible` style).
- Form labels: každý `<input>` má `<label for>` alebo `aria-label`.

### Performance
- Critical CSS inline, zvyšok async. JS `defer` / `type="module"`.
- Fonts: `font-display: swap`, preload kritické, max 2 weights.
- Images: WebP/AVIF, responsive `srcset`, `width`+`height` (anti-CLS).
- Preconnect na 3rd-party domény (GA, fonts, CDN).
- Target: LCP < 2.5s, INP < 200ms, CLS < 0.1.

### Deploy
- **Static** → Cloudflare Pages (preferované) / Netlify.
- **SSR** → Coolify (ccx13) / Vercel.
- Cloudflare baseline: Full strict SSL, HTTP/3, Bot Fight, DNSSEC, security headers transform rules.
- Post-deploy check: 2 prehliadače (Chrome+FF), mobile+desktop, Lighthouse run.

### Repo štruktúra
```
/src         — zdrojový kód
/public      — statické assety servované 1:1
/content     — markdown/MDX (Astro)
/scripts     — build/deploy helpery
.env.example — committed template (nie real .env)
README.md    — len ak má zmysel (nie placeholder)
```

### Forms / API
- Server-side validation VŽDY (klient validation len UX).
- Rate limit na public endpoints (CF rate limiting alebo middleware).
- Honeypot field proti botom (lepšie ako CAPTCHA pre UX).
- CSRF token pre state-changing POSTy.

### Analytics
- **Plausible** (self-hosted na `stats.raffay.sk`) > GA4 pre väčšinu webov.
- GTM len ak je viac tagov / conversion tracking.
- Cookie banner len ak používaš tracking ktorý ho vyžaduje (Plausible nie).
