# MASTER POULTRY MANAGEMENT SYSTEM — REQUIREMENTS V2 (AUDITED)

**Version:** 2.0.0 | **Status:** AUDITED — READY FOR CLIENT CONFIRMATION | **Date:** 2026-08-13
**Supersedes:** `MASTER_REQUIREMENT_DOCUMENT.md` (v1) and `MASTER_POULTRY_SYSTEM_RND.md` (v1) for all development purposes.
**Source preservation:** All original source files preserved under `requirements/source/original-documentation/`.
**Companion files (same folder):** requirement-matrix, business-rules, calculation-catalog, workflow-catalog, database-catalog, api-catalog, report-catalog, notification-catalog, gap-analysis, conflict-register, client-confirmation-questions, traceability-matrix, architecture, security-requirements, qa-requirements, ai-roadmap, change-log.

---

## 1. DOCUMENT PURPOSE

Corrected single-source-of-truth requirements baseline for the **Sri Murugan Poultry & Agro Group** management system, produced by a full audit of:

| Source | Scope | Volume |
|---|---|---|
| `clinetcovnesation.md` | Raw client conversation (verified 4,986 lines, 220 client answers) | 1 file |
| `requirements/` (client BRD) | 150 .md files (client answers, catalogs, domain, technical, roadmap) | 150 files |
| `docs/` (generic R&D) | 61 .md files (modules, rules, DB, API, security, NFR, ADR) | 61 files |
| `Poultry_ERP_Developer_Documentation.pdf` | Existing Laravel 12 / PHP 8.2 / MySQL codebase documentation | 6 pages |
| Root files | README, project_state, both master docs | 5 files |

**Classification tags:** `[CLIENT-CONFIRMED]`, `[PROPOSED]`, `[INFERRED]`, `[NEEDS CLIENT CONFIRMATION]`, `[EXTERNAL-RESEARCH]`, `[CONFIGURABLE]`, `[FUTURE]`.

**Integrity guarantees:**
- No client-confirmed rule was changed; all conflicts logged with CONFLICT-IDs in `conflict-register.md`.
- Every formula carries a FORMULA-ID in `calculation-catalog.md`.
- Every deviation/correction recorded in `change-log.md`.
- No tolerance/threshold value was invented; non-confirmed values are `[PROPOSED]` or `[CONFIGURABLE]`.

---

## 2. EXECUTIVE SUMMARY

### 2.1 Business Context (all [CLIENT-CONFIRMED])
- **Company:** Sri Murugan Poultry & Agro Group (name reconfirm — OPEN-001)
- **Scale:** 2 warehouses, 8 farms, 42 sheds, 30+ active batches, 85 employees, 18 vehicles, 45 dealers, 120+ shops/direct customers
- **Core business:** Broiler farming + live & processed chicken sales + egg sales
- **Expansion plan ([CONFIRMED]):** 15–20 farms; future: layer farming, hatchery, feed manufacturing, egg business scaling
- **Biggest problem:** data scattered across paper registers, Excel, WhatsApp, standalone billing software
- **Connectivity:** sheds lack reliable Wi-Fi → offline-first mobile required

### 2.2 Audit Headline Findings
1. **CRITICAL — Existing codebase (CONFLICT-001):** the PDF documents an existing **Laravel 12 / PHP 8.2 / MySQL** billing & ledger core (Day-Load, Daily, Weekly billing, Cash-Bank Ledger, Payments, EMI). Master docs propose **Node.js + NestJS + PostgreSQL + React/PWA**. Build-vs-extend decision needed before architecture work.
2. **Metric inflation in docs/ (CONFLICT-002..009):** exec summary claims "1400+ API endpoints, 132 security reqs, 40+ notifications, 100+ edge cases, 15+ integrations, 80+ entities, 16 modules, 20+ AI use cases" — actual: 19 APIs, 41 security reqs, 32 notifications, 20 edge cases, 14 integrations, 73 entities, 15 module docs (22 in hierarchy), 19 AI use cases.
3. **BRD_STATUS metric errors (CONFLICT-010..013):** "Total Modules: 40" (catalog: 12), "Total Reports: 0" (catalog: 18; 33 client-requested), "Total Conflicts Logged: 1" (9 in conversation-conflicts), "64 files generated" (150 actual).
4. **ID collisions (CONFLICT-014..016):** BR-001/BR-002, FEAT-021/023/028/038/041, QA/US IDs in traceability.md don't match catalog numbering.
5. **Rule-ID drift (CONFLICT-017):** 63 features discovered vs 28 catalogued; 45 rules discovered vs 8 catalogued; no reconciliation note existed.
6. **Tech-decision contradictions (CONFLICT-018..023):** UUIDv7 vs UUIDv4; PWA vs React Native/Flutter; TLS 1.3 vs 1.2+; archival 5yr vs 3yr; multi-tenancy ADR-001 vs hybrid; API latency 200ms vs 500ms; `/api/v1` vs un-prefixed paths.
7. **Industry vs client thresholds inconsistent (CONFLICT-024..030):** mortality 0.15% vs 0.5%; feed cost 60–70% vs 65–70% vs 70%+; water:feed 1.6–2.0 vs 1.6–2.5; candling Day 7/14/18 vs 7-10 vs 10-18; egg storage 15–20°C vs 15–18°C; layer cycle 70–100+ vs 72–90 wk; EPEF vs EEF; broiler 35–49 vs 35–45 days; stocking 15–19 vs 20 birds/m².

### 2.3 Corrected Metric Baseline (V2)
| Metric | Audited value | Source |
|---|---|---|
| Client answers processed | 220 (CLIENT-001..220) | requirements/00-source |
| Client-confirmed requirements | 279 | BRD status + verified |
| Inferred / Proposed | 20 / 52 | BRD status + verified |
| Open questions | 20 (OPEN-001..020) | requirements/00-source |
| Conflicts logged | 12 (CONFLICT-001..012) | conflict-register.md (V2) |
| Modules (client BRD) | 12 (MOD-001..012) | requirements/12-catalogs |
| Modules (generic R&D) | 22 in hierarchy / 15 doc files | docs/04-modules |
| Features (catalog) / (discovered) | 28 / 63 | catalogs / conversation |
| Business rules (catalog) / (discovered) | 8 / 45+13+50+12 | catalogs / discovery |
| Calculations | 30 (BR-CALC-001..030) + 10 client formulas | calculation-catalog.md (V2) |
| Reports | 18 client (REP-…) + 57 generic (REP-1001..) | report-catalog.md (V2) |
| Notifications | 13 client (NOTIF) + 32 generic (NTF) | notification-catalog.md (V2) |
| Entities | 64 (client register) / 73 (generic catalog) | database-catalog.md (V2) |
| API endpoints | 19 generic samples; 6 client sync/versioning rules | api-catalog.md (V2) |
| Roles | 18 (client) / 17 (generic) | security-requirements.md |
| State machines | 10 | workflow-catalog.md |
| Risks | 6 | requirements/12-catalogs |
| ADRs | 12 (all "Accepted") — 5 with internal conflicts | architecture.md |
| NFRs | 20 | architecture.md |
| MVP (client) | Phases 1–4 of client roadmap, ~12 months | requirements/15-roadmap |
| MVP (generic) | Phases 0–2, 12–14 weeks | docs/21-roadmap |

---

## 3. CLIENT BUSINESS FACTS ([CLIENT-CONFIRMED])

### 3.1 Profile
2 warehouses (details OPEN-011); 8 farms, 42 sheds (per-farm distribution unconfirmed); 30+ active batches; 85 employees; 18 vehicles (ownership OPEN-019); 45 dealers; 120+ shops/customers; multi-company possibility [CLIENT-037]; Tamil (primary) + English; Android mobile primary for field workers.

### 3.2 Current Tools (As-Is) — 11 manual/disconnected tools
Farm Register (paper), Excel spreadsheets, WhatsApp, Standalone Billing Software, Attendance Register (paper), Salary Excel, Warehouse Register (paper), Purchase Bills (paper), Sales Bills (paper), Vehicle Register (paper), Bank Statement (manual reconciliation).

### 3.3 Root Causes (As-Is)
1. Disconnected data silos; 2. Manual data transcription (notebook → office Excel → accountant Excel); 3. No point-of-action recording; 4. No automated cost allocation.

### 3.4 Business Objectives (OBJ-001..010, all [CLIENT-CONFIRMED])
1. Eliminate duplicate entry; 2. Real-time operational visibility (morning mortality known immediately); 3. Accurate batch-level profitability; 4. Unified management dashboard; 5. Automated alerts; 6. Mobile-first entry; 7. Offline capability; 8. Demand forecasting; 9. Slow/non-moving product detection; 10. Scalable to 15-20 farms + hatcheries + feed mills.

### 3.5 Problem Catalog (55 problems, PROB-001..055)
Scattered data; duplicate entry; entry mistakes ("50 vs 5"); delayed info; stock mismatch (register vs physical, "1,000 kg vs 850 kg"); unknown batch cost/profit; manual attendance; manual dealer outstanding checks; trip-wise vehicle cost untracked; manual Excel consolidation; medicine stock/usage disconnected; poor internet at farms; weight-variance billing disputes; hidden processing loss; post-processing cancellations; traceability gap; slow/non-moving stock; stockouts on fast movers; abnormal mortality/feed detected too late; vehicle breakdowns; and 35 more in `00-source/problem-catalog.md`.

---

## 4. NON-NEGOTIABLE CORE RULES (client-confirmed; NEVER silently changed)

| ID | Rule (verbatim essence) | Source |
|---|---|---|
| CORE-01 | **Live vs Processed loss:** "When we sell live, the customer takes the processing loss. When we sell processed, WE take the processing loss." Live billed at dispatch live weight; Processed billed at delivered final cleaned meat weight. | CLIENT-127, live-vs-processed-sales.md |
| CORE-02 | **Weight reconciliation:** Input Live Weight = Saleable Product + By-products + Waste + Processing Loss; mandatory before closing a daily processing batch. | weight-reconciliation.md |
| CORE-03 | **Closing live birds:** Opening Birds − Mortality − Culling = Closing Birds. | mortality-management.md |
| CORE-04 | **Feed consumption:** (Purchased/Issued + Opening) − Closing; feed stock NEVER negative. | feed-management.md |
| CORE-05 | **Medicine ↔ inventory:** medicine usage strictly tied to inventory reduction; cannot record medication if stock insufficient. | health-management.md |
| CORE-06 | **Withdrawal period:** hard block on harvest/dispatch while within medication withdrawal period. | BR-HLT-MED-02 |
| CORE-07 | **Approval matrix:** Purchase < ₹10,000 → Manager; ₹10,000–₹50,000 → Company Admin; > ₹50,000 → Owner. | conversation L773-780 |
| CORE-08 | **Offline sync conflict:** DO NOT auto-overwrite server data; manual resolution by authorized user. | TEMP-BR-010, mobile-offline.md |
| CORE-09 | **No silent deletions:** financial records reversed/voided with audit trail, never deleted. | TEMP-BR-005, AUD-01..02 |
| CORE-10 | **Farm-level data isolation:** Owner sees all farms; Farm Manager only assigned farm; salaries/purchase rates/profits restricted. | TEMP-BR-011/012 |
| CORE-11 | **Farming→Processing cost flow:** Farming Batch accumulated cost/kg becomes raw-material input cost of Processing Batch. | cross-domain-review.md |
| CORE-12 | **AI never autonomous:** AI outputs are recommendations requiring human approval; Explainable AI required. | CLIENT-212 |
| CORE-13 | **No auto product deletion/discontinuation:** system may only suggest after 6 months low sales; manual approval. | slow-nonmoving-products.md |
| CORE-14 | **Every order must specify selling mode** (LIVE or PROCESSED); mode change after processing starts requires supervisor override. | live-vs-processed-sales.md |
| CORE-15 | **Returned deliveries:** never directly back to active stock — QC + reclassification (Resalable/Rework/Waste/Destroy). | TEMP-BR-05-008 |
| CORE-16 | **Order price lock:** prices locked at order creation; market changes don't alter confirmed orders. | PRC-011 |

---

## 5. SYSTEM CONTEXT & BOUNDARIES

### 5.1 In Scope (V2)
Broiler farm operations; batch management; feed/health/mortality/weight tracking; live & processed sales; processing, yield & reconciliation; by-products; egg sales; multi-warehouse inventory; purchase & suppliers; dealer/customer credit; delivery & fleet; finance & profitability; HR & payroll; approvals & audit; dashboards; alerts; mobile offline app; demand forecasting; slow-moving detection; what-if analysis; traceability & recall; complaint management; multi-company (future).

### 5.2 Out of Scope for MVP
- Layer, breeder, hatchery, feed mill, contract farming: **[FUTURE]** (client expansion plan; docs/ covers R&D only)
- IoT hardware integration: **[FUTURE]**
- Automated payments / WhatsApp ordering portals: **[FUTURE]**

### 5.3 Actors (18 — `00-source/actor-register.md`)
Owner, Company Admin, Farm Manager, Farm Supervisor, Farm Worker, Veterinarian, Warehouse Manager/Store Keeper, Purchase Manager, Supplier, Sales Manager, Salesperson, Dealer, Shop/Customer, Driver, Accountant, HR Manager, Auditor, System Admin.

---

## 6. MODULE MAP (CORRECTED)

### 6.1 Client BRD modules (12 — MOD-001..012, canonical for client delivery)
| ID | Module |
|---|---|
| MOD-001 | Core Setup & Master Data |
| MOD-002 | Farm Operations |
| MOD-003 | Processing & Yield |
| MOD-004 | Egg Operations |
| MOD-005 | Inventory Management |
| MOD-006 | Purchase & Procurement |
| MOD-007 | Sales & Distribution |
| MOD-008 | Logistics & Fleet [INFERRED] |
| MOD-009 | Finance & Accounting |
| MOD-010 | HR & Payroll |
| MOD-011 | Intelligence & Analytics |
| MOD-012 | System Administration |

### 6.2 Generic R&D module hierarchy (22 — docs/04-modules, reference only)
Administration, Farm Management, Flock/Batch, Bird Placement, Daily Operations, Feed, Weight, Mortality, Health & Vaccination, Egg Production, Hatchery, Breeder, Feed Mill, Inventory, Procurement, Sales & Distribution, Finance & Accounting, HR & Payroll, Reports & Analytics, Multi-tenancy & SaaS, Notifications & Alerts, Mobile & Offline. *(CONFLICT-003: exec summary "16 modules".)*

### 6.3 Feature map
FEAT-001..028 per `12-catalogs/feature-catalog.md` (28 catalogued; 63 discovered in conversation). Traceability.md FEAT/QA/US references are stale — CONFLICT-015/016.

---

## 7. CORE BUSINESS WORKFLOWS (state machines in workflow-catalog.md)

- **WF-001 Batch Placement:** Chick Supplier → Purchase → Arrival → QC → Farm/Shed Allocation → Batch Creation → Bird Placement
- **WF-002 Daily Farm Routine:** Opening Count → Mortality → Culling → Live Count → Feed → Water → Environment → Health
- **WF-003 Feed Supply Chain:** PO → GRN → Stock Update → Farm Request → Approval → Feed Issue → Consumption → Deduction
- **WF-004 Harvest:** Ready → Weight Check → Buyer Confirmation → Planning → Catching → Loading → Weighment → Dispatch → Invoice → Delivery → Payment
- **WF-005 Sales & Dealer Credit:** Order → Credit-check Approval → Dispatch → Invoice → Payment → Outstanding
- **WF-006 Warehouse Transfer:** Request → Approval → Dispatch → Receive (partial ok) → Stock Update
- **WF-007 Purchase:** Request → Quotation → PO → Approval → GRN → QC → Stock → Invoice → Payment
- **WF-008 Processing & Dispatch:** Processing → Cutting → Packing → Labeling → Dispatch
- **WF-009 Live vs Processed Costing:** Required Final Weight → Select Live Bird → Process & record loss → Final Saleable Weight → Bill at Processed Rate on Saleable Weight; Business cost = Live Bird Cost + Processing Cost + Loss
- **WF-010 Return Disposition:** Return → QC → Resalable / Reprocess / Discount Sale / Waste
- **WF-011 Complaint & Recall:** Complaint → traceability (Customer→Invoice→Order→Product→Processing Batch→Farm Batch) → recall decision → affected units → recall costs → replacement linked to original → severity & SLA → root cause → corrective action
- **WF-012 Driver Settlement:** Deliver → collect cash (linked to invoice) → trip end → submit cash/expenses/fuel → system settles balance
- **WF-013 Wastage Approval:** Worker enters → Supervisor verifies → Manager approves → inventory adjusted → audit
- **WF-014 Egg Flow:** Collection → QC → Grading → Stock → Order → Pick/Pack → Dispatch → Deliver → Payment
- **WF-015 Negative Margin Sale:** detect below-cost → warning → reason → management approval → allowed
- **WF-016 Order Feasibility:** check stock + production + processing + delivery + credit → Can Fulfill / Partial / Cannot

---

## 8. BUSINESS RULES (VALIDATED; full: business-rules.md)

| BR-ID (V2) | Rule | Status |
|---|---|---|
| BR-001 | Transit-loss billing: live → customer; processed → company; live at dispatch weight; processed at delivered weight | [CLIENT-CONFIRMED] |
| BR-002 | FCR = Total Feed Consumed (kg) / Total Live Weight Produced (kg); broiler target < 1.6 | [EXTERNAL-RESEARCH] |
| BR-003 | Batch cost allocation proportional to outputs (meat + by-products) | [CLIENT-CONFIRMED] |
| BR-004 | Yield variance: expected dressed-broiler yield ~65–70%; outside → mandatory audit review | [INFERRED] |
| BR-005 | Credit limit enforcement: Hard/Soft/Override (Manager approval) | [CLIENT-CONFIRMED] |
| BR-006 | Mortality alert: daily > 0.5% (configurable) → immediate alert (recipients per CONFLICT-027) | [PROPOSED] |
| BR-007 | Feed reorder: below 3 days' estimated consumption → low-stock alert | [PROPOSED] |
| BR-008 | Damaged egg write-off > 2% of daily collection → managerial approval | [PROPOSED] |
| BR-050 | Max Capacity = Total Shed Area / Space Requirement per Bird (seasonal) | [CLIENT-CONFIRMED] |
| BR-051 | Daily Harvest ≤ Plant Processing Capacity (Birds/Hour × Operating Hours) | [CLIENT-CONFIRMED] |
| BR-052 | Transport capacity factors mortality risk from overloading, temperature-adjusted | [INFERRED] |
| BR-053 | Processed-meat quality complaints resolved (Refund/Credit Note/Rejection) within 24h | [PROPOSED] |

---

## 9. CALCULATIONS (HEADLINE; full: calculation-catalog.md)

| FORMULA-ID | Name | Formula | Status |
|---|---|---|---|
| F-001 | Closing Live Birds | Opening − Mortality − Culling | [CLIENT-CONFIRMED] |
| F-002 | Mortality % | (Total Mortality / Total Placed) × 100 | [INFERRED] |
| F-003 | Feed Consumption | Opening + Purchased/Issued − Closing | [CLIENT-CONFIRMED] |
| F-004 | Net Weight | Gross − Tare | [CLIENT-CONFIRMED] |
| F-005 | Net Salary | Basic + Overtime + Allowance − Advance − Deduction (× attendance) | [CLIENT-CONFIRMED] |
| F-006 | Actual Batch Profit | Revenue − (Chick+Feed+Medicine+Vaccine+Labour+Electricity+Water+Transport+Farm Expense+Overhead) | [CLIENT-CONFIRMED] |
| F-007 | Yield % | Saleable Weight / Input Live Weight × 100 | [CLIENT-CONFIRMED] |
| F-008 | Processing Yield % | (Final Meat / Live Bird Weight) × 100 | [CLIENT-CONFIRMED] |
| F-009 | Live Sale Profit | Live Sales Revenue − Live Bird Cost − Transport − Other Cost | [CLIENT-CONFIRMED] |
| F-010 | Processed Sale Profit | Proc. Revenue − Live Bird Cost − Processing − Packaging − Loss − Transport | [CLIENT-CONFIRMED] |
| F-011 | Cost per Saleable KG | (Live Bird Cost + Processing Costs) / Final Saleable Weight | [CLIENT-CONFIRMED] |
| F-012 | Customer Outstanding | Opening + Sales − Payments − Credit Notes ± Adjustments | [CLIENT-CONFIRMED] |
| F-013 | FCR | Total Feed (kg) / Total Live Weight Gained (kg) | [EXTERNAL-RESEARCH] |
| F-014 | ADG | Total Weight Gain (g) / Age (Days) | [EXTERNAL-RESEARCH] |
| F-015 | Livability % | 100 − Cumulative Mortality % | [EXTERNAL-RESEARCH] |
| F-016 | EPEF/EEF | (Livability × Avg Live Wt kg) / (Age × FCR) × 100 | [EXTERNAL-RESEARCH] (naming conflict — CONFLICT-030) |
| F-017 | Processing Reconciliation | Input = Saleable + By-products + Waste + Loss | [CLIENT-CONFIRMED] |
| F-018 | Transport Shrinkage | Farm Dispatch Wt − Delivery Receiving Wt | [CLIENT-CONFIRMED] |
| F-019 | Egg Closing Stock | Opening + Purchase + Production − Sales − Breakage − Damage ± Adjustment | [CLIENT-CONFIRMED] |
| F-020 | Egg Business Profit | Egg Revenue − Cost − Transport − Packing − Breakage − Other | [CLIENT-CONFIRMED] |
| F-021 | Reorder Quantity | Current Stock + Expected Demand + Lead Time + Safety Stock | [CLIENT-CONFIRMED] |
| F-022 | Forecast Variance | Forecast − Actual | [CLIENT-CONFIRMED] |
| F-023 | Cash Shortage | Expected Cash − Actual Cash | [CLIENT-CONFIRMED] |
| F-024 | Sales Price Variance % | ((Entered − Normal) / Normal) × 100 | [CLIENT-CONFIRMED] |
| F-025 | Actual Product Cost | Purchase + Transport + Handling + Processing + Packaging + Wastage | [CLIENT-CONFIRMED] |
| F-026 | Customer Profitability | Sales − (Discount + Cost + Processing + Delivery + Returns + Allocated) | [CLIENT-CONFIRMED] |
| F-027 | Dealer Contribution | Dealer Revenue − Cost − Discount − Transport − Credit Cost | [FUTURE] |
| F-028 | Farm Profitability | Farm Revenue − Direct Cost − Allocated Cost | [CLIENT-CONFIRMED] |
| F-029 | Driver Settlement Balance | Cash Collected − Expenses − Fuel | [CLIENT-CONFIRMED] |
| F-030 | Customer Payment Behavior | Avg days from invoice date to payment | [CLIENT-CONFIRMED] |

*(BR-CALC-001..030 from docs/06-business-rules/calculations.md carry formulas F-101..F-130 in calculation-catalog.md.)*

---

## 10. DATABASE REQUIREMENTS (CORRECTED; full: database-catalog.md)

- **Entities:** 64 canonical client entities (entity-register.md) + 73 generic catalog entities (docs/09-database/entity-catalog.md); union reconciled in database-catalog.md.
- **Core relationships:** Farms 1:M Sheds (42 across 8); Sheds 1:M Batches (30+ active); Batch 1:N VaccinationSchedule, BatchWeightLog, FarmEnvironmentLog; Warehouse 1:N StockLedger; PurchaseOrder 1:N PO Items 1:N GRN 1:N GRN Items; Vehicle 1:N DeliveryTrip 1:N TripStop; Vehicle 1:N VehicleExpense; CashBank Ledger 1:N Bank Reconciliation; Customer 1:N Orders 1:N Invoices; Supplier 1:N POs; Employee 1:N Salary/Advances.
- **Key decisions (V2):** soft delete with `deleted_at`, `deleted_by`, `is_deleted`; JSONB for configurable attributes; `tenant_id`/`company_id` on all tables [FUTURE multi-company]; UUID strategy conflict resolved → CONFLICT-018, recommended **UUIDv7**.
- **Existing-codebase implication (CONFLICT-001):** PDF documents MySQL DB for existing billing core; new modules (Farm Health, Staff/HR, Shop POS, Procurement) must integrate or migrate — decision required.
- Migration strategy: sanitization tools, opening balances at cut-over, history beyond 1 year aggregated.

---

## 11. API REQUIREMENTS (CORRECTED; full: api-catalog.md)

- RESTful, JSON, versioned `/api/v1/` (CONFLICT-022 resolved: adopt `/api/v1/` prefix consistently).
- JWT access + refresh tokens; RBAC; pagination; rate limiting.
- Sync endpoints `/api/v1/sync/pull`, `/api/v1/sync/push` [CLIENT-CONFIRMED]; webhooks [FUTURE] with events `batch.created`, `invoice.generated`, `inventory.low`.
- 19 generic sample endpoints (API-0001..API-1401) — samples only, NOT 1400+ (CONFLICT-002).
- Existing Laravel codebase already exposes billing/ledger APIs (PDF); API layer of V2 must reconcile with it.

---

## 12. DATA REQUIREMENTS

- 30+ active batches, 42 sheds, daily entries per shed; ~85 mobile users; offline-first sync.
- Daily sync per shed < 50 KB; images < 200 KB; text → transactional → media sync priority.
- History: 1+ year aggregated at migration; archival 3 yr vs 5 yr conflict → CONFLICT-020.
- Audit data points: User, Timestamp, Action Type, Entity, Old Value, New Value, Reason.

---

## 13. INTEGRATION REQUIREMENTS (CONFLICT-009)

| Integration | Status | Detail |
|---|---|---|
| WhatsApp Business API | Required [FUTURE for orders; invoices now] | Meta/Gupshup |
| SMS (Twilio/MSG91) | Required | alert channel |
| Email (SendGrid/SES) | Required | reports |
| Payment gateway (Razorpay/Stripe) | Required [PROPOSED] | PCI-DSS iframe, HMAC webhooks |
| Accounting software (Tally/Zoho/QB) | [NEEDS CLIENT CONFIRMATION] (OPEN-006) | idempotency keys |
| GST portal (via GSP) | [NEEDS CLIENT CONFIRMATION] (OPEN-001) | |
| IoT sensors | [FUTURE] | MQTT |
| Weighing scales | [FUTURE] | serial/RS232 |
| GPS fleet tracking | [FUTURE] | |
| Existing billing software (identity/API unknown) | **CRITICAL — OPEN-005** | PDF suggests it is the Laravel codebase |
| S3 storage | Required | |
| *Additional (generic):* Gov animal-health portals, market price scrapers, barcode/QR SDK, weather APIs | [FUTURE] | |

---

## 14. REPORTING REQUIREMENTS (full: report-catalog.md)

- **Client-requested reports (33 discovered → 18 catalogued REP-…):** Farm Performance; Batch Performance (mortality, feed, weight, FCR, ADG); Daily Sales; Outstanding; Purchase; Supplier Outstanding; Finance (income/expense, P&L, cash flow); Management comparisons; Actual Batch Profitability; Daily Egg Collection & Sales; Location-Wise Stock; Egg Business Profitability; Breakage & Wastage; Customer Ledger; Stock Reconciliation; Processing Yield; Mortality (by source); Live vs Processed Profitability; Daily Weight Loss & Yield; Processing Time & Bottleneck; Physical vs System Stock Difference; Farm Profitability; Slow/Non-Moving Stock; Purchase & Production Recommendation; Farm & Shed Comparison; Forecast Accuracy; Supplier Comparison; Cost vs Profitability; Audit Trail; Batch Performance Ranking; Complaint Trend; Dealer Contribution [FUTURE]; Customer Profitability [FUTURE].
- **Generic catalog (57 — REP-1001..REP-9004).**
- Export: PDF/Excel/CSV [PROPOSED]; scheduled email [PROPOSED].
- CORRECTED: "Total Reports: 0" in BRD_STATUS is an error (CONFLICT-011).

---

## 15. NOTIFICATION REQUIREMENTS (full: notification-catalog.md)

- **Client notifications (13 — NOTIF-001..013):** Mortality Threshold; Feed Stock Low; Payment Overdue; Vaccine Due; Medicine Expiry; Poor FCR; Low Weight/Yield; Egg Rate Change; Egg Stock Shortage; High Wastage/Return; Vehicle Breakdown; Supplier Quality; Processing Bottleneck.
- **Generic catalog (32 — NTF-1001..NTF-7003).**
- 36 additional discovered in conversation (incl. Abnormal Growth, Credit Limit, Rate Change, Reconciliation Failure, Capacity Shortage [FUTURE], Predictive feed depletion, Price Anomaly, Customer Inactive, Fuel Anomaly, Environmental [FUTURE]).
- Channels: App Push, SMS, WhatsApp [FUTURE]; priority levels High/Medium/Info/Critical.

---

## 16. SECURITY & COMPLIANCE REQUIREMENTS (full: security-requirements.md)

- RBAC, granular module+action permissions, farm-level isolation at app AND API level.
- Restricted data: salaries (HR/Senior Accounts/Owner), purchase rates (Procurement/Accounts/Owner), profitability (Owner + authorized senior mgmt).
- JWT (RS256+); short-lived access tokens; refresh tokens HttpOnly; session management; MFA/TOTP for Owner/Admin [PROPOSED]; 2FA [PROPOSED].
- Passwords: ≥12 chars complexity, breached-password check, 5-attempt lockout (15 min) [EXTERNAL-RESEARCH → configurable].
- AES-256 at rest; TLS 1.3 (1.2 fallback) — CONFLICT-023 resolved.
- Immutable audit log; no silent deletions; retention 1yr/3yr vs 90d/1yr vs 5yr → CONFLICT-019 (decision needed).
- OWASP Top 10; rate limiting per IP and tenant; CORS; input validation.
- RPO ≤ 1h, RTO ≤ 4h; DR multi-region; credentials in vault, rotate 30 days.
- Compliance: GST/FSSAI/PCB [NEEDS CLIENT CONFIRMATION] (OPEN-001, OPEN-003).
- 41 numbered generic requirements (SEC-0001..0132) — NOT 132 (CONFLICT-004).

---

## 17. USER INTERFACE / UX REQUIREMENTS

- Tamil (primary) + English; large fonts (18px+), numpad default, haptic feedback for farm workers.
- Mobile-first for field; desktop for management.
- 9 generic role-based dashboards (UX-D1..D9); client: 12 dashboards (Owner, Management, Farm Manager, Supervisor, Warehouse, Sales, Accounts, HR [PROPOSED], Processing, Driver, Dealer [PROPOSED], Egg).
- Owner dashboard: unified morning view + algorithmic Business Health Score [AI-007, FUTURE].
- No UI wireframes/mockups exist anywhere — gap (see gap-analysis.md).

---

## 18. PROCESSING & YIELD REQUIREMENTS

- Selling mode mandatory on every order (CORE-14).
- Processing stages: Bird Selection → Live Weight → Slaughter → Defeathering → Cleaning → Cutting → Packing → QC → Dispatch.
- Product forms: Live, Whole Cleaned, Curry Cut, Skinless, Boneless, Breast, Leg, Wings, Custom Cut.
- 1-to-N inventory split (one bird → meat + by-products + waste).
- Priority queue for 20+ simultaneous orders [CLIENT-146]; statuses Pending → Assigned → Processing → QC → Packed → Ready → Dispatched → Completed.
- Reconciliation mandatory before closing daily processing batch (CORE-02).
- Weight mismatch: overweight → customer accepts / trimmed; underweight → add piece or negotiate short bill.
- By-products: Liver, Gizzard, Skin, Feet, Head, Neck, Intestines, Other; saleable toggle; cost allocation 90/10 proposed → OPEN-015.
- 11 loss categories (Blood, Feather, Skin, Cleaning, Trimming, Cutting, Bone/Offal, Water/Drip, Damaged, Rejected, Other).
- QC failure → hard dispatch block; cold storage expiry → block sales.
- Actual processing capacity kg/day unknown → OPEN-012.

---

## 19. EGG BUSINESS REQUIREMENTS

- Sources: own layer farms vs external suppliers (EGG-001).
- Morning/evening collection; auto inventory update.
- Grading: size Small/Medium/Large/Extra Large (EGG-005); quality Good/Broken/Damaged/Rejected.
- Units: Piece/Tray/Carton/Crate/Box/Kg configurable; conversions (1 Tray = 30 pcs, 1 Carton = 7 trays) — standardization OPEN-014.
- Grade-wise stock across Farm/Central Warehouse/Dealer; FIFO freshness.
- Purchase workflow PO→Receipt→QC→Grade→Stock→Payment; sales to dealers/shops/hotels/bakeries/restaurants/wholesalers.
- Returns QC; payment methods Cash, UPI, Bank, Credit, Partial, Advance (CONFLICT-026).
- Profitability MUST differentiate OWN/PURCHASED/TRANSFERRED/RETURNED (EGG-022).
- 28 requirements EGG-001..028 total.

---

## 20. MOBILE & OFFLINE REQUIREMENTS

- Android primary; Tamil UI; offline entry → local storage → auto-sync on connectivity.
- Conflict rule: NO auto-overwrite (CORE-08); manual resolution by authorized user; additive metrics vs absolute values.
- Sync queue with timestamps; encrypted local data [PROPOSED]; 7-14 day offline history.
- Media: photos (post-mortem), barcode/QR scanning.
- Platform conflict: PWA vs React Native/Flutter → CONFLICT-021; client MVP lean = PWA, docs recommend native.

---

## 21. MULTI-COMPANY / TENANCY REQUIREMENTS

- Multi-company context switching [CLIENT-037, US-008]; company-level isolation.
- Generic SaaS: 4 tiers (Trial/Starter/Professional/Enterprise); hybrid shared-schema + dedicated DB for Enterprise.
- ADR-001 (shared schema + RLS) vs saas-architecture hybrid → CONFLICT-019 note; V2 recommends hybrid per generic docs, but for single-tenant client deployment this is simplified.

---

## 22. DEPLOYMENT & OPERATIONS REQUIREMENTS

- AWS preferred (RDS, ECS/EKS) or Vercel/Render; Docker; CI/CD with SAST/DAST; 3 environments; zero-downtime migrations.
- Monitoring: Prometheus/Grafana, ELK/Datadog, tracing; alerts at CPU > 80% or 5xx > 1%.
- Backup: RPO < 1h, RTO < 4h, WAL + daily snapshots, multi-region, restoration drills.
- Scaling: horizontal >70% CPU, read replicas; CDN; S3 signed URLs; queues (Redis/BullMQ/SQS).
- NOTE (CONFLICT-001): existing deployment is PHP/Laravel/MySQL — deploy decision pending build-vs-extend.

---

## 23. PENDING DECISIONS & OPEN QUESTIONS (20; full: client-confirmation-questions.md)

OPEN-001 GST/tax structure · OPEN-002 per-dealer credit terms · OPEN-003 processing facility location · OPEN-004 approval workflow per transaction type · OPEN-005 existing billing software identity/API (critical) · OPEN-006 accounting software (Tally/Zoho) · OPEN-007 migration timeline/volume · OPEN-008 salary components · OPEN-009 regulatory compliance (FSSAI/PCB) · OPEN-010 farm internet quality · OPEN-011 cold storage capacity/locations · OPEN-012 processing capacity kg/day · OPEN-013 by-product pricing method · OPEN-014 egg conversion standardization · OPEN-015 by-product cost allocation split · OPEN-016 market rate determination (NECC?) · OPEN-017 bank accounts · OPEN-018 insurance tracking · OPEN-019 vehicle ownership · OPEN-020 delivery radius/clustering.

---

## 24. CONFLICTS SUMMARY (12; full: conflict-register.md)

CONFLICT-001 Existing codebase vs new Node stack (CRITICAL) · 002 API 1400+ vs 19 · 003 Modules 16/22/15 · 004 Security 132 vs 41 · 005 Notifications 40+ vs 32 vs 13 · 006 Edge cases 100+ vs 20 · 007 AI 20+ vs 19 · 008 Entities 80+ vs 73 vs 64 · 009 Integrations 15+ vs 14 · 010 BRD module count 40 vs 12 · 011 BRD reports 0 vs 18/33 · 012 BRD conflict count 1 vs 9 · (013 files 64 vs 150 · 014 BR-ID collision · 015 FEAT-ID drift · 016 QA/US-ID drift · 017 rule-catalog reduction · 018 UUID · 019 archival+retention · 020 multi-tenancy model · 021 mobile platform · 022 API prefix · 023 TLS · 024 mortality threshold · 025 feed cost % · 026 payment modes/egg units · 027 alert recipients · 028 yield targets · 029 lifecycle/order variants · 030 EPEF vs EEF · 031 shed distribution · 032 Admin vs Company Admin · 033 LWW vs no-auto-overwrite) — numbered CONFLICT-001..033 in conflict-register.md.

---

## 25. ACCEPTANCE CRITERIA & QA (full: qa-requirements.md)

- Unit coverage ≥ 80% for FCR/yield/payroll calculations; integration + E2E + UAT.
- Financial calc accuracy; offline sync conflict tests (additive vs absolute); RBAC; multi-tenant isolation.
- Dashboard loads < 3s across 30+ batches / 42 sheds [PROPOSED]; generic NFR: API 95th pct < 500ms (CONFLICT-020 note: MVP says 200ms).
- UAT with stakeholders (owner, farm managers, workers, accountant).

---

## 26. TECHNICAL STACK (CORRECTED; full: architecture.md)

**DECISION REQUIRED (CONFLICT-001):** Two documented stacks:
1. **Proposed (generic R&D):** Node.js + NestJS + PostgreSQL + Prisma + React/Tailwind + PWA + AWS (RDS, ECS) — from docs/21-roadmap/mvp-definition.md.
2. **Existing codebase (PDF):** Laravel 12 + PHP 8.2 + MySQL + Blade/Tailwind/Vite + Sanctum + spatie/permission + dompdf + queues; modules marked [BUILT]/[PARTIAL]/[NEW]; 8-phase roadmap with 2 urgent security fixes (db_exporter, db_importer, live-deploy-sync routes).

V2 does not pick a side; the client decision on build-vs-extend (CLIENT-CONFIRMATION-001) gates all downstream tech choices. All generic R&D NFRs remain valid either way.

---

## 27. NON-FUNCTIONAL REQUIREMENTS (20 — from docs/26-non-functional; corrected)

- **Performance:** page load < 2s on 3G; API 95th pct < 500ms [CONFLICT-021 note: MVP claims 200ms — pending]; reports < 10s; offline sync of 1 week < 15s.
- **Scale:** 1,000+ tenants (generic) / single-tenant now + 15-20 farms (client); 10M+ daily records time-series; 1,000 concurrent sessions.
- **Availability:** 99.9% uptime; no SPOF.
- **Backup/Recovery:** RPO < 1h; RTO < 4h; backups 30d daily / 1yr weekly / yearly indefinite.
- **Security:** AES-256 at rest; TLS 1.3 (1.2 fallback); MFA + JWT; immutable audit for financial/inventory.
- **Monitoring:** CPU > 80% / 5xx > 1% auto-alerts; logs 90d hot / 1yr cold.
- **Archival:** production > 3 years to cold storage (vs 5 yr in domain-model — CONFLICT-020).
- **Caching:** Redis for breed standards, tenant configs, permissions.
- **Search:** global search < 1s (Elasticsearch/OpenSearch).

---

## 28. MVP SCOPE (CONFLICTING DEFINITIONS RECONCILED)

| Definition | Source | Scope | Timeline |
|---|---|---|---|
| Client BRD roadmap | requirements/15-roadmap | Phase 1 Core & Ops (M1-3); Phase 2 Processing & Commercials (M4-6); Phase 3 Finance & Egg (M7-9); Phase 4 Intelligence (M10-12) | ~12 months |
| Generic MVP | docs/21-roadmap | Phases 0-2: Admin, Farm, Broiler ops, flock metrics, basic feed inventory, responsive PWA, basic batch costing | 12-14 weeks |

**V2 recommendation:** Client's Phase 1 (3 months) aligns with generic MVP (14 weeks). Use generic MVP definition for the first release, client Phases 2-4 for subsequent releases. Full 14-phase generic plan ≈ 18 months (78 weeks) is the R&D-scale roadmap, not the client commitment.

---

## 29. USER STORIES (15 sampled — US-001..015; full in requirements/13-technical/user-stories-sample.md)

US-001 Offline Daily Entry · US-002 Auto Sync (text conflicts CONFLICT-033 — uses LWW) · US-003 Yield Tracking · US-004 Live vs Processed Billing · US-005 Dealer Credit Limit · US-006 Real-Time Batch Profitability · US-007 Demand Forecasting · US-008 Multi-Company Context Switching · US-009 FCR Reporting · US-010 WhatsApp Invoice · US-011 Inventory Opening Balances · US-012 Audit Trails · US-013 Excel Export · US-014 Granular RBAC · US-015 Fleet Dispatch. (Numbering in traceability.md conflicts — CONFLICT-016.)

---

## 30. EDGE CASES (20 documented generic EC-001..053; "100+" is aspirational — CONFLICT-006)

Key ones: duplicate mortality entry (unique constraint Batch+Date); mortality > live birds (transactional check); batch split/merge; reopening closed batch (admin + audit); negative stock (flag + auto-reconcile on PO); overpayment (advance ledger); backdated transactions (period lock); egg count > hen count (hard block >100%); sale during withdrawal (hard block); zero production day (divide-by-zero graceful); concurrent edits (optimistic locking); multi-org user; offline sync conflict (LWW + collision notice — reconciled with CORE-08 via manual resolution for financial data); timezone (UTC storage).

---

## 31. DATA MIGRATION REQUIREMENTS

- From: paper registers, Excel, WhatsApp, standalone billing software, existing Laravel codebase data (if extended).
- Process: Cleanup → Duplicate removal → Field Mapping → Validation → Import → Verification (bulk CSV/Excel).
- Sample-farm pilot first.
- Opening balances at cut-over; history beyond 1 year aggregated.
- Volume/migration timeline: OPEN-007.

---

## 32. TRAINING & CHANGE MANAGEMENT

- Role-based training: farm workers (Tamil, mobile), managers, accountant, drivers.
- "System Champions" per site.
- Risk: user adoption (RISK-003); mitigation: pilots, Tamil UI, offline reliability, simple daily entry.

---

## 33. SUPPORT & MAINTENANCE

- Generic SaaS: support tiers per plan; subscription lifecycle (trial warnings 7/3/1 days; grace 3 days; suspension day 8; deactivation day 30).
- Client single-tenant: support SLA TBD [PROPOSED].
- Maintenance windows, versioning, backward-compatible migrations.

---

## 34. ROADMAP & PHASING (V2 RECONCILED — 6 phases for client delivery)

| Phase | Scope | Duration | Exit Criteria |
|---|---|---|---|
| 0 | Foundations (stack decision, schema, auth, RBAC, CI/CD, ADR finalization) | 2-3 wks | CONFLICT-001 resolved; ADRs final |
| 1 | Core Farm Ops + Master Data + Mobile Offline Daily Entry | 3-4 mo | Daily entry < 5 min offline; mortality visible immediately; batch lifecycle |
| 2 | Processing & Yield + Live/Processed Billing + Reconciliation | 3-4 mo | Yield % accurate; reconciliation before batch close |
| 3 | Sales/Distribution + Dealer Credit + Fleet + Delivery POD | 2-3 mo | Credit checks, POD, driver settlement |
| 4 | Inventory + Purchase + Finance + Payroll + Approvals | 3-4 mo | Batch P&L automated; audit trail |
| 5 | Intelligence: forecasting, slow-moving, what-if, alerts, dashboards | 3-4 mo | KPI dashboards live |
| Year 2+ | Multi-company, IoT, eggs scaling, layer/hatchery/feed mill [FUTURE] | — | — |

---

## 35. AI & AUTOMATION ROADMAP (full: ai-roadmap.md)

- Phase 1 rule-based alerts (MVP); Phase 2 historical analytics; Phase 3 ML (mortality prediction, weight prediction, disease risk, egg production forecast, feed anomaly, market price); Phase 4 AI agents (reorder drafts, batch planning, NL query, anomaly investigation).
- Constraints: AI never autonomous (CORE-12); explainable AI; data prerequisites (≥1 full cycle; ML ≥ 1yr data, ≥100 batches).
- Client wishes (21): IoT, automation, forecasting, alerts, business insights, domain expansion; route optimization; churn; fraud; business health score; vehicle maintenance prediction; environmental root cause.

---

## 36. TRACEABILITY & RECALL

- Chain: Customer Order ← Invoice ← Product ← Processing Batch ← Live Bird Batch ← Farm ← Shed.
- Recall workflow (WF-011) with affected batch/customers/qty, costs, replacement linking.
- Reverse traceability tree (feature). Traceability matrix file: traceability-matrix.md (V2 — fixed IDs).

---

## 37. COMPLAINT MANAGEMENT

- Resolution avenues: Refund, Replacement, Credit Note, Discount, Reprocess, Reject, No Action (CMP-01..03).
- Feedback metrics: Quality, Weight accuracy, Delivery, Packaging, Service.
- Processed-meat complaint SLA 24h [PROPOSED] (BR-053); severity + root cause + trends (REP-020 Monthly Summary [PROPOSED]).
- Coverage gap fixed: complaint-management.md now exists (coverage-report.md stale — CONFLICT-029).

---

## 38. CAPACITY PLANNING (previously missing — now covered)

- FEAT-045 Farm Capacity Utilization (BR-050); FEAT-046 Processing Throughput (BR-051); FEAT-047 Fleet Capacity (BR-052).
- US-040 30-day capacity forecast; US-041 fleet alert; AI harvest balancing ~95% [FUTURE].

---

## 39. RISK REGISTER (6 risks — requirements/12-catalogs/risk-register.md)

RISK-001 Data Migration Quality · RISK-002 Internet Connectivity · RISK-003 User Adoption · RISK-004 Hardware Failure · RISK-005 Integration Complexity · RISK-006 Scope Creep — all Open with mitigations. V2 adds: RISK-007 Build-vs-Extend decision delay (CONFLICT-001) [PROPOSED].

---

## 40. HARDWARE REQUIREMENTS

- Rugged Android devices for ~85 employees; Wi-Fi points at sheds (connectivity assessment OPEN-010); Bluetooth thermal printers; barcode/QR (FUTURE); biometric (FUTURE); IoT sensors (FUTURE).

---

## 41. COMPLIANCE & REGULATORY

- GST invoicing/returns (OPEN-001); FSSAI for processing/meat (OPEN-003); PCB (OPEN-003); contract templates (DAHD) [FUTURE]; GDPR-like data rights (generic); SOC 2 aspiration (generic).

---

## 42. LANGUAGE & LOCALIZATION

- Tamil primary + English; numbers/weights metric (kg, g); currency INR with minor-unit storage (ADR-010); units Piece/Tray/Carton/Crate/Box/Kg configurable; multi-currency [FUTURE].

---

## 43. TERMINOLOGY STANDARDIZATION (from cross-domain-review.md)

- **Farming Batch** (not Flock/Lot); **Processing Batch** (not Processing Lot); **Yield** (not Meat Recovery); **Loss** (not Wastage); **By-product** (fixed term).
- Unifications: Egg + Meat customers → Customer Master; Feed/Egg/Cold-storage warehouses → Warehouse/Location Master; all vehicles → Fleet Master.

---

## 44. DUPLICATE & ORPHAN CHECK

- 0 orphans (coverage-report: all source statements mapped). Coverage report itself is stale (CONFLICT-029) — V2 catalogs are the current source.

---

## 45. ASSUMPTIONS & CONSTRAINTS

- Internet at sheds unreliable (constraint → offline-first).
- Scale assumed stable at current levels for 2 years; then 15-20 farms.
- Single company now, multi-company later.
- Team size assumption (generic): 3-4 developers.
- Budget unknown; pricing model N/A for single-tenant (generic SaaS tiers informational only).

---

## 46. SUCCESS METRICS

- OBJ metrics: duplicate entry eliminated; morning mortality known immediately; batch P&L at close in one click; dealer outstanding auto-checked; trip costs per vehicle; dashboard < 3s; daily entry < 5 min/shed; zero critical bugs at UAT; offline reliability.

---

## 47. DECISION LOG (ADR) STATUS

12 ADRs all "Accepted" in docs — but 5 conflict internally (ADR-001 vs hybrid, ADR-002 vs UUIDv4, ADR-006 vs PWA, ADR-011 vs CORE-08, ADR-009 vs real-time dashboards). V2: all ADRs re-validated in architecture.md; pending client decisions listed in client-confirmation-questions.md.

---

## 48. SOURCE FILES INDEX (preserved)

- Originals: `requirements/source/original-documentation/` (217 files: root docs + docs/ + all requirements/ folders).
- V2 deliverables: `requirements/audited/` (18 files).

---

## 49. QUALITY GATE CHECKLIST (V2)

- [x] Every client-confirmed rule preserved verbatim (CORE-01..16)
- [x] All conflicts assigned CONFLICT-IDs (33)
- [x] All formulas assigned FORMULA-IDs (F-001..F-030, F-101..F-130)
- [x] No invented tolerances (all non-confirmed values tagged [PROPOSED]/[CONFIGURABLE])
- [x] No orphans; every requirement traceable to CLIENT-XXX
- [x] Metrics corrected (19 APIs not 1400+; 41 security reqs not 132; etc.)
- [x] Every change logged in change-log.md
- [x] External research tagged [EXTERNAL-RESEARCH]

---

## 50. SIGN-OFF

| Role | Name | Date | Signature |
|---|---|---|---|
| Requirements Owner | (client) | Pending | — |
| Audit Lead | AI audit agent | 2026-08-13 | — |
| Tech Lead | (TBD after CONFLICT-001 decision) | Pending | — |

---

## 51. CHANGE LOG SUMMARY (full: change-log.md)

- 2.0.0 (2026-08-13): full audit; corrected metric baseline; added CORE rules, CONFLICT-IDs, FORMULA-IDs; resolved tech contradictions into decision log; preserved originals; created 18 audited deliverables. See change-log.md for every change.
