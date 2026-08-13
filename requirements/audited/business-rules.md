# BUSINESS RULES CATALOG (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Canonical, de-conflicted business rules. Resolves the BR-ID collision (CONFLICT-014) by adopting the `business-rule-catalog.md` numbering as canonical and remapping all discovered rules under BR-009..BR-053.

**Status tags:** [C] CLIENT-CONFIRMED · [I] INFERRED · [P] PROPOSED · [E] EXTERNAL-RESEARCH · [CFG] CONFIGURABLE · [F] FUTURE

---

## 1. CANONICAL RULES (BR-001..008 — from requirements/12-catalogs/business-rule-catalog.md)

| ID | Rule | Status | Notes |
|---|---|---|---|
| BR-001 | Transit-loss billing: live bird → customer bears loss, billed at dispatch live weight; processed meat → company bears loss, billed at delivered final weight (or credit-note adjusted) | [C] | CLIENT-127; CORE-01 |
| BR-002 | FCR = Total Feed Consumed (kg) / Total Live Weight Produced (kg). Standard target < 1.6 for broilers | [E] | industry reference, NOT client-confirmed (CONFLICT note) |
| BR-003 | Batch cost allocation: processing batch cost distributed proportionally across outputs (meat, by-products) | [C] | CORE-11 |
| BR-004 | Yield variance: expected dressed-broiler yield ~65–70%; outside this range → mandatory audit review | [I] | different from BR-004 v1 definition (collision resolved) |
| BR-005 | Credit limit enforcement: new order vs outstanding+order vs limit → Hard Block / Soft Block / Override (Manager approval) | [C] | CLIENT-054 |
| BR-006 | Mortality threshold: daily mortality > 0.5% (configurable) in any shed → immediate SMS/Push alert | [P]/[CFG] | recipients per CONFLICT-027 (BR-006 v1: Head Vet + Farm Mgr; NOTIF-001: Farm Mgr + Owner) |
| BR-007 | Stock reorder rule: feed stock below 3 days' estimated consumption for active batches → low-stock alert | [P] | 3 days proposed |
| BR-008 | Damaged egg write-off: damaged eggs > 2% of daily collection require managerial approval | [P] | 2% proposed |

---

## 2. CAPACITY & COMPLAINT RULES (BR-050..053 — from domain/ops files)

| ID | Rule | Status |
|---|---|---|
| BR-050 | Max Capacity = Total Shed Area / Space Requirement per Bird (based on season) | [C] |
| BR-051 | Daily Harvest ≤ Plant Processing Capacity (Birds/Hour × Operating Hours) | [C] |
| BR-052 | Transport capacity must factor in mortality risk due to overloading, adjusted for temperature | [I] |
| BR-053 | Processed-meat quality complaints must be resolved (Refund, Credit Note, or Rejection) within 24 hours | [P] |

---

## 3. DISCOVERED RULES (TEMP-BR-001..053 from conversation — consolidated; canonical IDs assigned)

### 3.1 Farm / Batch (TEMP-BR-001..012 → BR-009..020)
| ID (V2) | Rule | Status |
|---|---|---|
| BR-009 | Closing Live Birds = Opening Birds − Mortality − Culling | [C] |
| BR-010 | Feed Consumption = Feed Purchased/Issued + Opening Stock − Closing Stock | [C] |
| BR-011 | Abnormal weight growth (Target vs Actual) → system alert | [C] |
| BR-012 | Medicine usage must decrease warehouse/farm stock | [C] |
| BR-013 | Dealer order exceeding credit limit → alert/approval | [C] |
| BR-014 | Purchase < ₹10,000 → Manager approval | [C] |
| BR-015 | Purchase ₹10,000–₹50,000 → Company Admin approval | [C] |
| BR-016 | Purchase > ₹50,000 → Owner approval | [C] |
| BR-017 | Financial records cannot be silently deleted (audit trail; reverse/void) | [C] |
| BR-018 | Offline sync conflicts must NOT auto-overwrite server data | [C] |
| BR-019 | Owner sees all farms; Farm Manager sees only assigned farm | [C] |
| BR-020 | Farm worker cannot view salary; not all users see purchase rate/profit reports | [C] |

### 3.2 Egg (TEMP-BR-001..006 chunk-2 → BR-021..026)
| ID (V2) | Rule | Status |
|---|---|---|
| BR-021 | FIFO egg dispatch for freshness | [C] |
| BR-022 | Own-farm eggs vs purchased eggs tracked separately for profit accuracy | [C] |
| BR-023 | Input Weight = Saleable Output + By-products + Waste/Loss; mismatch → alert | [C] |
| BR-024 | High-value wastage adjustments → multi-level approval (Supervisor → Manager) | [C] |
| BR-025 | Orders cancelled after processing began → recovery policies (Rework, Alt Sale, Waste) | [C] |
| BR-026 | Actual yield below expected % → alert | [C] |

### 3.3 Processing / Sales (TEMP-BR-001..010 chunk-3 → BR-027..036)
| ID (V2) | Rule | Status |
|---|---|---|
| BR-027 | Live sales do not record processing loss against the business | [C] |
| BR-028 | Processed sales give exact requested final weight; business absorbs loss | [C] |
| BR-029 | Orders before cut-off → today's processing; after → next slot | [C] |
| BR-030 | Orders exceeding credit limit → warning or block per policy | [C] |
| BR-031 | Minimum Order Quantity per product/customer type enforced | [C] |
| BR-032 | Order prices locked at creation; market changes don't alter | [C] |
| BR-033 | Modifying order after processing started → approval/adjustment | [C] |
| BR-034 | Items failing QC → dispatch blocked | [C] |
| BR-035 | Expired processed products in cold storage → sales blocked | [C] |

### 3.4 Finance / Ops (TEMP-BR-001..008 chunk-4 → BR-036..043)
| ID (V2) | Rule | Status |
|---|---|---|
| BR-036 | Refunds auto-sync and update Finance modules | [C] |
| BR-037 | Stock adjustments require explicit reason, managerial approval, audit trail | [C] |
| BR-038 | Abnormal stock loss → management alert | [C] |
| BR-039 | Approval delegations restricted to specific time periods | [C] |
| BR-040 | Demand forecasting considers multiple years of historical data | [C] |
| BR-041 | No auto-cancel of POs for slow-moving products; suggest + manual approval | [C] |
| BR-042 | No auto-delete of non-moving products; manual action required | [C] |
| BR-043 | Predictive alerts before event (e.g., 4 days before feed runs out) | [C] |

### 3.5 Commercial / Settlement (TEMP-BR-05-001..009 → BR-044..052)
| ID (V2) | Rule | Status |
|---|---|---|
| BR-044 | Expense thresholds dictate approval level (Manager vs Owner) | [C] |
| BR-045 | Negative-margin orders blocked by default; documented reason + manual approval | [C] |
| BR-046 | Reserved stock for confirmed orders has expiry rule (no indefinite holding) | [C] |
| BR-047 | Product actual cost = purchase + transport + handling + processing + packaging + wastage | [C] |
| BR-048 | Processing costs proportionally allocated to all outputs (meat, liver, gizzard, feet, skin) | [C] |
| BR-049 | Post-processing order modification rules depend on processing stage | [C] |
| BR-050 | Replacement orders for complaints link to original; not new normal sales | [C] (→ reserved as BR-050; capacity BR-050 renumbered note below) |
| BR-051 | Returned delivery products require QC + reclassification (Resalable/Rework/Waste/Destroy) | [C] |
| BR-052 | New orders undergo credit-limit check; exceed → warning/approval | [C] |

**Numbering note:** the two legacy "BR-050..052" (capacity) and "TEMP-BR-05-008/009" overlap. V2 canonical: capacity rules keep BR-050/051/052 (§2); TEMP-BR-05 rules are remapped BR-044..052 with duplicates merged (BR-050/051/052 duplicates → merged into BR-005/BR-015/BR-016; see change-log.md).

---

## 4. GENERIC VALIDATION RULES (VR-001..050 — docs/06-business-rules/validation-rules.md, verbatim refs)

- **Bird inventory:** VR-001..008 (mortality ≥0, ≤opening; culls+mortality ≤ opening; placement_date ≤ current; closing = opening − mortality − culls − sales; no gaps in daily data).
- **Feed & water:** VR-009..014 (feed ≥0; feed ≤ silo inventory; water ≥0; feed_type matches flock age; daily FCR cap 5.0 typo check).
- **Weight:** VR-015..019 (sample >0; avg weight logically increases, warn drop >5%; ≤5.0 kg; chick ≥30 g).
- **Eggs:** VR-020..025 (eggs ≤ hens×1/day; defective ≤ total; saleable+defective=total; 40–80 g; hatched ≤ inventory).
- **Environment:** VR-026..029 (min ≤ max temp; humidity 0-100; ammonia ≥0 warn >25 ppm; light 0-24h).
- **Financial:** VR-030..036 (invoice_total = Σ lines + tax − discount; discount 0-100; unit ≥0; payment ≤ outstanding; GL codes; contract rates >0).
- **Hatchery:** VR-037..041 (eggs set >0; hatched ≤ set; fertile ≤ set; cull+saleable = hatched; 21-day incubation).
- **Entity/state:** VR-042..050 (no edit closed batch; farm inactive only without active batches; date ordering; approved vendor only; medicine expiry; shed state; transfer counts; same-farm transfers; role-action matching).

---

## 5. GENERIC BUSINESS RULES (docs/06-business-rules/business-rule-catalog.md)

| ID | Rule | Status |
|---|---|---|
| BR-VAL-001 | No future-dated actuals (mortality/feed/harvest) | [E] |
| BR-VAL-002 | Max mortality = opening live birds | [E] |
| BR-CAL-101 | EOD inventory roll-forward | [E] |
| BR-CAL-102 | EPEF computed & locked at batch close | [E] |
| BR-WF-201 | Batch closure blocked unless live=0 & feed depleted; forced close w/ reason | [E] |
| BR-WF-202 | Restricted antibiotics → Vet approval | [E] |
| BR-ALT-301 | Daily mortality > 0.5% (configurable) → SMS/Push Farm Mgr + Vet; Day 1-3 exception | [E]/[CFG] |
| BR-ALT-302 | Feed < 80% of previous day → notify Farm Mgr | [E] |
| BR-ALT-303 | Water:Feed < 1.6 or > 2.5 → dashboard warning | [E] |
| BR-FIN-401 | Contract farmer settlement at batch close (base + bonus/penalty) | [E]/[F] |
| BR-FIN-402 | Customer credit limit check on new order; block unless approved | [E] |
| BR-OP-501 | Stocking density max ~20 birds/m² (or 33 kg/m²) warning; seasonal override | [E] |
| BR-OP-502 | Feed phase change suggestion at designated age; block wrong-phase feed | [E] |

---

## 6. HEALTH RULES (BR-HLT-* — docs/06-business-rules/health-rules.md)

| ID | Rule | Status |
|---|---|---|
| BR-HLT-MORT-01 | Broiler daily mortality > 0.15% → HIGH alert + mandatory post-mortem request | [E] (CONFLICT-024 vs 0.5%) |
| BR-HLT-MORT-02 | Daily > 0.5% OR cumulative > 1.0%/48h → CRITICAL, corporate + chief vet, lock stock movements | [E] |
| BR-HLT-MORT-03 | Layer/breeder monthly mortality > 1.0% → health warning | [E] |
| BR-HLT-VAC-01 | Vaccination calendar auto-generated from hatch date (Day 1) | [E] |
| BR-HLT-VAC-02 | Missed vaccination: 24h → MEDIUM to Farm Mgr; 48h → HIGH to Vet | [E] |
| BR-HLT-VAC-03 | Live vaccine water deprivation checklist (1-2h; skim milk powder) | [E] |
| BR-HLT-MED-01 | Safe Harvest Date = Last Administration Date + Withdrawal Period | [E] |
| BR-HLT-MED-02 | Hard block sale/slaughter during withdrawal | [C]/[E] (CORE-06) |
| BR-HLT-MED-03 | Prescription ID / Vet approval required for restricted medicines | [E] |
| BR-HLT-BIO-01 | AIAO: 14-day downtime + C&D checklist before new placement | [E] |
| BR-HLT-BIO-02 | 72h visitor quarantine for high-biosecurity zones | [E] |
| BR-HLT-BIO-03 | Age segregation: youngest→oldest movement; warn on reverse | [E] |

**Escalation matrix (verbatim):** Critical/Notifiable Disease → Vet, Farm Owner → Authorities (manual); Critical/Mortality >0.5% day → Vet, Mgr → Corporate Director (4h); High/Feed-Water drop >10% → Mgr → Vet (12h); High/Egg drop >5% week → Mgr → Vet (24h); Medium/Missed vaccine >24h → Mgr → Vet (48h); Info/Routine vet visit → Mgr → None.

---

## 7. CONFLICTED VALUES REGISTER (thresholds — see conflict-register.md for full details)

| Subject | Values in docs | V2 position |
|---|---|---|
| Daily mortality alert | 0.15% (BR-HLT-MORT-01) vs 0.5% (BR-ALT-301, NTF-1001, BR-006) | [CFG] default 0.5% client-facing alert; 0.15% as internal HIGH trigger; client decision Q-CONF-02 |
| Feed cost share | 60-70% / 65-70% / 70%+ | [E] report actual; no alert value |
| Water:feed ratio | 1.6-2.0 normal vs 1.6-2.5 warning band | [E] use 1.6–2.5 warning, 1.6–2.0 guidance |
| Dressed yield target | 65-72% vs 65-70% | [I] 65-70% adopted |
| Broiler cycle | 35-49 vs 35-45 days | client-specific: 35-45 typical; configurable per species |
| Stocking density | 15-19 vs 20 birds/m² | [E] warn at 20, guidance 15-19 |
| FCR target | < 1.6 | [E] industry; client to confirm target |

---

*End of business-rules.md (V2).*