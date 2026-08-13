# AI ROADMAP (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Corrected AI roadmap. Resolves "20+ AI use cases" (CONFLICT-007 → 19 documented) and consolidates client AI wishes (21) with the generic 4-phase plan. All AI is recommendation-only (CORE-12) and explainable (CLIENT-212).

---

## 1. GOVERNING RULES

| Rule | Detail | Source |
|---|---|---|
| CORE-12 | AI never makes autonomous decisions; outputs are recommendations requiring human approval | ai-opportunities.md, CLIENT-212 |
| AI-RULE-02 | Explainable AI required ("AI must explain why it predicts X") | CLIENT-212, demand-forecasting.md |
| AI-RULE-03 | Continuous learning: monthly auto-tune vs Prediction/Actual | chunk-4 |
| AI-RULE-04 | Data prerequisites: Phase 2 needs ≥1 full cycle; Phase 3 needs 1+ year data, 100+ completed batches | ai-roadmap.md |

---

## 2. GENERIC 4-PHASE ROADMAP (19 use cases — docs/18-ai/ai-roadmap.md)

### Phase 1 — Rule-Based Intelligence (MVP, Low effort)
| ID | Use case |
|---|---|
| AI-1001 | Threshold-based alerts |
| AI-1002 | Breed standard recommendations |
| AI-1003 | Deviation alerts |
| AI-1004 | Configurable alert rules |

### Phase 2 — Advanced Analytics (Post-MVP, Medium; needs ≥1 full cycle)
| ID | Use case |
|---|---|
| AI-2001 | Historical trend analysis |
| AI-2002 | Batch comparison analytics |
| AI-2003 | Farm benchmarking |
| AI-2004 | Seasonal pattern analysis |
| AI-2005 | Cost optimization insights |

### Phase 3 — Machine Learning (Future, High; needs 1+ yr data)
| ID | Use case | Success metric (where defined) |
|---|---|---|
| AI-3001 | Mortality prediction (spike in next 48h) | ≥80% accuracy on >1% daily mortality events |
| AI-3002 | Weight prediction (Day 40) | — |
| AI-3003 | Disease risk detection | — |
| AI-3004 | Egg production forecasting (next 30 days) | — |
| AI-3005 | Feed consumption anomaly detection | — |
| AI-3006 | Market price prediction (next 14 days) | — |

### Phase 4 — AI Agents (Long-term, Very High)
| ID | Use case |
|---|---|
| AI-4001 | Automated reorder suggestions |
| AI-4002 | Intelligent batch planning |
| AI-4003 | Natural language query |
| AI-4004 | Automated anomaly investigation |

---

## 3. CLIENT AI WISHES (21 — from conversation; mapped)

| Wish | Client chunk | Phase |
|---|---|---|
| IoT sensors (temp/humidity/ammonia) | 1 | [F] Phase 3+ |
| Automation (auto weighing, biometric, GPS, barcode/QR) | 1 | [F] |
| AI forecasting (disease, feed) | 1 | Phase 3 |
| AI automated alerts ("Batch mortality is increasing", "FCR poorer than expected", "abnormal feed consumption", "farm performance lower than others") | 1 | Phase 1/2 |
| Business Insights System (Data→KPI→Analysis→Alert→Decision→Action) | 1 | Phase 2 |
| Domain expansion support (Layer, Breeder, Hatchery, Feed Mill, Egg, Dealer) | 1 | [F] |
| Storage condition tracking (temp/AI) | 2 | [F] |
| Yield optimization (flag low-yield suppliers) | 2 | Phase 3 |
| Route optimization (warehouse, slots, locations) | 3 | Phase 4 |
| Demand forecasting (multi-year, product-wise, dealer-wise) | 4 | Phase 3 |
| AI reasoning/explanation | 4 | all |
| Continuous learning | 4 | Phase 3 |
| What-if scenario modeler (Best/Normal/Worst, +X% sales, capacity stress) | 4 | Phase 2 |
| Customer churn prediction | 5 | Phase 3 |
| Order pattern forecasting (auto drafts) | 5 | Phase 4 |
| Backup supplier recommendation | 5 | Phase 4 |
| Fraud/suspicious transaction detection | 5 | Phase 3 |
| Business health score (e.g., 82/100) | 5 | Phase 2/3 |
| Vehicle maintenance prediction (usage/repairs, not just due date) | 5 | Phase 3 (R&D exists: predictive-maintenance.md) |
| Environmental root-cause analysis | 5 | Phase 3+ |

---

## 4. MISSING / OPEN AI ITEMS (from rnd-gap-matrix — all still MISSING in v1)

| ID | Item | V2 status |
|---|---|---|
| AI-003 | MLOps / continuous learning pipeline | [F] — GAP-AI-07 |
| AI-004 | Customer churn prediction | [F] — GAP-AI-02 |
| AI-005 | Backup supplier recommendation | [F] — GAP-AI-04 |
| AI-006 | Fraud detection | [F] — GAP-AI-03 |
| AI-007 | Business Health Score — formula undefined | [F] — GAP-AI-01 |
| AI-008 | Environmental root-cause analysis | [F] — GAP-AI-05 |
| AI-009 | Predictive vehicle maintenance | [F] — GAP-AI-06 (R&D exists) |

---

## 5. DEMAND FORECASTING REQUIREMENTS (client-specific — [C]/[I])

- Monthly forecasts from 3-year trends; day-of-week patterns (Mon low, Sat/Sun very high); product-wise and selling-mode-wise (Live 5,000kg / Cleaned 8,000kg / Skinless 2,500kg / Boneless 1,500kg / Curry Cut 3,000kg example).
- Customer/dealer micro-forecasts ("Hotel ABC averages 100 kg/week → predicts 108 kg").
- Early warning 2-3 months ahead ("in August: October demand expected to increase — start planning").
- Drivers: history (1-3 yrs), seasonality/business calendar, forward bookings, 3-6 month market trends; supplier lead times (A=2d, B=5d); safety stock (e.g., demand 500kg + safety 200kg).
- 30-day dashboard example: Required 15,000kg − Available 4,000kg − Expected Production 6,000kg = Shortage 5,000kg.
- Confidence example: "Forecast 15,000 kg | Range 13,500-16,500 | Confidence 82%"; variance: "Forecast 15,000, Actual 14,200, −800".

---

## 6. SLOW/NON-MOVING RULES (client-specific)

- 7 lifecycle stages: New → Growing → Fast Moving → Stable → Slow Moving → Non-Moving → Discontinued.
- MUST NOT auto-delete/discontinue; only suggest after 6+ months low sales, with management approval (CORE-13, BR-041/042).
- Velocity examples: "Duck last sold 45 days ago, stock 300"; "Turkey last sale 90 days ago, stock 150, sales 0"; overstock "2,000 units vs 300/mo run rate"; stockout "500 kg at 120 kg/day → 4 days".

---

## 7. IMPLEMENTATION GATES

1. AI phases gated by data volume (never ship ML without data).
2. Every AI output shows confidence/range + explanation.
3. Every AI action requires human approval (audit trail of override).
4. Privacy: models trained on anonymized data only [P].

---

*End of ai-roadmap.md (V2).*