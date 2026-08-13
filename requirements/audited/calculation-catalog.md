# CALCULATION CATALOG (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Every formula used by the system, with stable FORMULA-IDs, inputs, validation, and status. Supersedes scattered formula definitions; every formula verified against source docs.

**Status tags:** [C] CLIENT-CONFIRMED · [I] INFERRED · [E] EXTERNAL-RESEARCH · [P] PROPOSED · [F] FUTURE

---

## 1. CLIENT-CONFIRMED FORMULAS (F-001..F-030 — from conversation/business discovery)

| ID | Name | Formula | Inputs | Validation | Status |
|---|---|---|---|---|---|
| F-001 | Closing Live Birds | Opening − Mortality − Culling | opening_birds, mortality, culling | result ≥ 0; = physical count check | [C] |
| F-002 | Mortality % | (Total Mortality / Total Placed Birds) × 100 | total_mortality, placed | 0–100 | [I] |
| F-003 | Feed Consumption (Batch) | Opening Stock + Feed Purchased (Issued) − Closing Stock | opening, purchased, closing | feed stock never negative | [C] |
| F-004 | Net Weight | Gross Weight − Tare Weight | gross, tare | ≥ 0 | [C] |
| F-005 | Net Salary | (Attendance × Basic) + Overtime + Allowance − Advance − Deduction | attendance, basic, ot, allowance, advance, deduction | ≥ 0; advance ≤ salary | [C] |
| F-006 | Actual Batch Profit | Revenue − (Chick + Feed + Medicine + Vaccine + Labour + Electricity + Water + Transport + Farm Expense + Overhead) | all cost components | requires batch data complete | [C] |
| F-007 | Yield % | Saleable Weight / Input Live Weight × 100 | saleable, input | 0–100 | [C] |
| F-008 | Processing Yield % | (Final Meat Weight / Live Bird Weight) × 100 | meat, live_wt | 0–100 | [C] |
| F-009 | Live Sale Profit | Live Sales Revenue − Live Bird Cost − Transport − Other Cost | revenue, bird cost, transport, other | — | [C] |
| F-010 | Processed Sale Profit | Proc. Revenue − Live Bird Cost − Processing Cost − Packaging − Processing Loss Cost − Transport | all | — | [C] |
| F-011 | Cost per Saleable KG | (Live Bird Cost + Processing Costs) / Final Saleable Weight | costs, weight | weight > 0 | [C] |
| F-012 | Customer Outstanding | Opening Balance + Sales − Payments − Credit Notes ± Adjustments | all | ledger balance | [C] |
| F-013 | Egg Closing Stock | Opening + Purchase + Production − Sales − Breakage − Damage ± Adjustment | all | ≥ 0 | [C] |
| F-014 | Egg Business Profit | Egg Revenue − Egg Purchase/Production Cost − Transport − Packing − Breakage − Other Expenses | all | source-differentiated (own/purchased) | [C] |
| F-015 | Expected Closing Stock | Opening + Purchase + Production + Returns + Transfers In − Sales − Processing − Death − Damage − Wastage − Transfers Out | all | reconciliation vs physical | [C] |
| F-016 | Weight Reconciliation | Input = Saleable Output + By-products + Waste/Loss | all | must balance before processing batch close | [C] |
| F-017 | Live Sale Billing | Billed at dispatch live weight (customer bears processing loss) | live weight, rate | CORE-01 | [C] |
| F-018 | Processed Sale Billing | Billed at delivered final meat weight (company bears loss) | meat weight, rate | CORE-01 | [C] |
| F-019 | Credit Note Adjustment | Customer Outstanding = Original Outstanding − Credit Note Amount | original, CN | ≥ 0 | [C] |
| F-020 | Farm Profitability | Farm Revenue − Farm Direct Cost − Allocated Cost | all | — | [C] |
| F-021 | Dealer Contribution | Dealer Revenue − Product Cost − Discount − Transport − Credit Cost | all | [F] |
| F-022 | Reorder Quantity | Current Stock + Expected Demand + Lead Time + Safety Stock | all | ≥ 0 | [C] |
| F-023 | Forecast Variance | Forecast − Actual | forecast, actual | sign = direction | [C] |
| F-024 | Cash Shortage | Expected Cash − Actual Cash | expected, actual | ≠ 0 → alert | [C] |
| F-025 | Sales Price Variance % | ((Entered Rate − Normal Rate) / Normal Rate) × 100 | entered, normal | negative high variance → approval | [C] |
| F-026 | Order Feasibility | Σ Available Stock + Projected Production + Processing Capacity + Delivery Capacity vs Request & Credit Limit | all capacities | Can Fulfill / Partial / Cannot | [C] |
| F-027 | Partial Fulfillment | Ordered Qty − Delivered Qty = Pending Qty | ordered, delivered | pending ≥ 0 | [C] |
| F-028 | Actual Product Cost | Purchase + Transport + Handling + Processing + Packaging + Wastage | all | CORE cost rule | [C] |
| F-029 | Batch Cost Allocation | Total processing batch cost proportionally distributed across outputs (meat, liver, gizzard, feet, skin, waste) | batch cost, output weights | proportions sum 100% | [C] |
| F-030 | Net Production Cost | Actual Cost − By-product Revenue | actual cost, by-product revenue | ≥ 0 | [C] |
| F-031 | Customer Profitability | Sales − (Discount + Product Cost + Processing Cost + Delivery Cost + Returns + Other Allocated Cost) | all | — | [C] |
| F-032 | Customer Payment Behavior | Avg days from invoice date to payment completion | invoices, payments | — | [C] |
| F-033 | Driver Settlement Balance | Cash Collected − Expenses − Fuel = Balance to Settle | all | balance = 0 at settlement | [C] |
| F-034 | Feed per kg / per bird | Feed consumed ÷ weight gained / birds | feed, weight/birds | FCR support | [C] |
| F-035 | Transport Shrinkage | Farm Dispatch Weight − Delivery Receiving Weight | dispatch, receiving | separate from processing loss | [C] |
| F-036 | Daily Mortality % | (Daily Mortality / Opening Count) × 100 | daily, opening | alert > threshold | [C] |
| F-037 | Cumulative Mortality % | (Total Mortality / Placed) × 100 | total, placed | — | [C] |
| F-038 | Profit per Bird | Net Profit / Total Birds Sold | profit, birds | — | [C] |
| F-039 | Capacity Utilization (Farm) | Total Shed Area / Space Requirement per Bird (seasonal) → Max Capacity | area, space/bird | BR-050 | [C] |
| F-040 | Processing Throughput | Birds/Hour × Operating Hours = Daily Capacity | rate, hours | BR-051: Daily Harvest ≤ Capacity | [C] |

---

## 2. INDUSTRY FORMULAS (F-101..F-130 — from docs/06-business-rules/calculations.md, verbatim)

| ID | Name | Formula | Example | Status |
|---|---|---|---|---|
| F-101 | Mortality % (Daily & Cumulative) | (Daily Deaths / Opening) × 100; (Total Deaths / Initial Placed) × 100 | 50/10,000 = 0.5% | [E] |
| F-102 | Livability % | 100 − Cum Mortality % (or live/placed × 100) | 99.5% | [E] |
| F-103 | FCR (Cumulative) | Total Feed (kg) / Total Live Weight Gained (kg) | 3,000/2,000 = 1.50 | [E] |
| F-104 | Adjusted/Corrected FCR | FCR + ((Target Wt − Actual Wt) / Factor); Factor ≈ 3 kg per 0.01 FCR | 1.50 + ((2.0−2.2)/3.0) = 1.434 | [E] |
| F-105 | ADG | Total Weight Gain (g) / Age (Days) | 2,500/35 = 71.4 g/day | [E] |
| F-106 | Average Body Weight | Total Sample Weight / Number Weighed | 50/25 = 2.0 kg | [E] |
| F-107 | CV (Uniformity) | (Std Dev / Mean) × 100 | (0.2/2.0)×100 = 10% | [E] |
| F-108 | EPEF | (Livability × Avg Live Wt kg) / (Age × FCR) × 100 | (95×2.5)/(35×1.5)×100 = 452 | [E] (naming vs EEF — CONFLICT-030) |
| F-109 | Production Index | (ADG kg × Livability %) / FCR × 100 | (0.071×95)/1.5×100 = 449 | [E] |
| F-110 | Hen-Day Egg Production % | (Eggs Today / Live Hens Today) × 100 | 900/1000 = 90% | [E] |
| F-111 | Hen-Housed Egg Production % | (Eggs in Period / Hens Housed) × 100 | 25,000/1,000 = 25 eggs/hen | [E] |
| F-112 | Egg Mass (g/hen/day) | (Hen-Day % / 100) × Avg Egg Wt (g) | 0.90 × 60 = 54 g | [E] |
| F-113 | FCR per dozen | Feed (kg) / (Eggs / 12) | 120/(900/12) = 1.6 | [E] |
| F-114 | FCR per kg egg mass | Feed (kg) / Egg Mass (kg) | 120/54 = 2.22 | [E] |
| F-115 | Hatchability (total set) | (Chicks Hatched / Eggs Set) × 100 | 8,500/10,000 = 85% | [E] |
| F-116 | Hatchability (fertile) | (Chicks Hatched / Fertile Eggs) × 100 | 8,500/9,000 = 94.4% | [E] |
| F-117 | Fertility % | (Fertile / Set) × 100 | 9,000/10,000 = 90% | [E] |
| F-118 | Saleable Chick % | (Saleable / Hatched) × 100 | 8,400/8,500 = 98.8% | [E] |
| F-119 | Cost per Bird Placed | Total Batch Costs / Initial Placed | $15,000/10,000 = $1.50 | [E] |
| F-120 | Cost per kg Live Weight | Total Costs / Total Live Wt Harvested | $15,000/22,000 = $0.68 | [E] |
| F-121 | Cost per Egg | Period Costs / Eggs Produced | $1,000/10,000 = $0.10 | [E] |
| F-122 | Cost per Dozen Eggs | Cost per Egg × 12 | $0.10×12 = $1.20 | [E] |
| F-123 | Revenue per Bird | Total Revenue / Birds Sold | $20,000/9,500 = $2.10 | [E] |
| F-124 | Gross Margin per Bird | (Revenue − COGS) / Birds Sold | $6,000/9,500 = $0.63 | [E] |
| F-125 | Net Profit per Batch | Total Revenue − Total Expenses (incl. overhead) | $20,000−$17,000 = $3,000 | [E] |
| F-126 | Feed Cost % of Total Cost | (Feed Cost / Total Production Cost) × 100 | 66.6% | [E] |
| F-127 | Medicine Cost per Bird | Total Med+Vaccine Cost / Placed | $300/10,000 = $0.03 | [E] |
| F-128 | Growing Charges (Contract) | Base Rate/kg × Total Live Wt (kg) | $0.15 × 22,000 = $3,300 | [E]/[F] |
| F-129 | Performance Bonus/Penalty | (Target FCR − Actual FCR) × Factor × Wt (bonus if positive) | (0.1)×$0.05×22,000 = $110 | [E]/[F] |
| F-130 | Break-even Price | Total Costs / Total Output | $15,000/22,000 = $0.68/kg | [E] |

---

## 3. EXTRA DOMAIN FORMULAS (from business-process-chains / module docs)

- **Breeder (7):** HHEP, HDEP, Settable Egg %, Flock Uniformity %, Feed per Settable Egg, Male:Female Ratio (9–10%), Spiking %.
- **Layer (8):** HDEP, HHEP, Egg Mass, FCR/dozen, FCR/kg egg, Peak %, Depletion %.
- **Hatchery (6):** Setter Loading %, Candling Clear %, Hatchability %, Chick Yield (target 66–68%), Hatch Window, Cull %.
- **Integrated (3):** Hatchability %, Meat Yield % (typically 70–75%), Total Cost per kg Processed Meat.
- **Feed mill:** Wastage % (<0.5% target), kWh/ton, Cost/ton, Raw Material Usage Variance.

---

## 4. CALCULATION VALIDATION RULES (critical)

1. Every batch daily entry runs EOD roll-forward: Opening Tomorrow = Opening Today − Mortality − Culls − Sales (BR-CAL-101).
2. EPEF locked at batch close (BR-CAL-102).
3. FCR divides by weight gained, never by sales weight.
4. Weight reconciliation MUST balance before processing batch close (CORE-02).
5. All monetary values in minor units (paise/cents) internally (ADR-010).
6. Zero-production day → graceful UI (no divide-by-zero).
7. Rounding: standardize 2 or 4 decimals; rounding-difference ledger (EC-032).

---

## 5. FORMULA ID MAPPING (old → new)

| Old location | New ID |
|---|---|
| calculation-discovery.md chunk-1..5 (client formulas) | F-001..F-040 |
| docs/06-business-rules/calculations.md BR-CALC-001..030 | F-101..F-130 |
| broiler-chain.md / layer / breeder / hatchery / feed-mill / integrated formulas | §3 (kept as domain formulas) |

---

*End of calculation-catalog.md (V2).*