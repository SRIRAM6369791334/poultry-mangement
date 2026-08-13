# REQUIREMENT MATRIX (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Stable REQ-IDs mapping every audited requirement to source (CLIENT-XXX), module, feature, rule, status. Source of truth for traceability-matrix.md.

**Status tags:** [C] = CLIENT-CONFIRMED · [I] = INFERRED · [P] = PROPOSED · [N] = NEEDS CLIENT CONFIRMATION · [E] = EXTERNAL-RESEARCH · [F] = FUTURE · [CFG] = CONFIGURABLE

---

## 1. CORRECTED COUNTS (vs BRD_STATUS — see CONFLICT-010..013)

| Metric | BRD_STATUS (v1, incorrect) | Audited (V2) |
|---|---|---|
| Total Client Answers | 220 | 220 (verified) |
| Confirmed Requirements | 279 | 279 |
| Inferred / Proposed | 20 / 52 | 20 / 52 |
| Open Questions | 20 | 20 |
| Conflicts Logged | 1 | 33 (CONFLICT-001..033) |
| Total Modules | 40 | 12 (MOD-001..012) |
| Total Features | 28 | 28 catalogued (63 discovered) |
| Total Business Rules | 8 | 8 catalogued (45+ discovered; 13+50+12 generic) |
| Total User Stories | 15 | 15 (US-001..015) |
| Total Reports | 0 | 18 catalogued (33 requested) |
| Total Notifications | 13 | 13 catalogued (36+ discovered) |
| Total Risks | 6 | 6 (+1 added V2) |
| Files Generated | 64 | 150 (requirements/) + 61 (docs/) + 6 root + 1 PDF |

---

## 2. MODULE REQUIREMENTS (MOD-001..012)

| REQ-ID | Requirement | Status | Source |
|---|---|---|---|
| MOD-001 | Core Setup & Master Data: species (not hard-coded), products, units, warehouses, farms, sheds, suppliers, customers, price lists | [C] | CLIENT-003/012/037, product-management.md |
| MOD-002 | Farm Operations: farm/shed mgmt, batch lifecycle, daily entry, feed, health, mortality, weight | [C] | batch-flock, farm-management, feed-management, health-management, mortality, weight |
| MOD-003 | Processing & Yield: selling mode, processing stages, yield, reconciliation, by-products, loss/waste, QC | [C] | CLIENT-127, processing, weight-reconciliation, by-product, loss-waste, quality |
| MOD-004 | Egg Operations: collection, grading, inventory, sales, purchases, returns, P&L (EGG-001..028) | [C] | egg-management.md |
| MOD-005 | Inventory Management: unified stock movements, multi-warehouse, FIFO/FEFO, physical counts, reorder | [C] | inventory-management.md |
| MOD-006 | Purchase & Procurement: PR→PO→GRN→QC→Invoice→Payment, 5 supplier categories, returns/debit notes | [C] | purchase-supplier.md |
| MOD-007 | Sales & Distribution: order types, cut-off, credit limits, pricing models, discounts, returns | [C] | sales-management, customer-dealer, pricing-engine |
| MOD-008 | Logistics & Fleet: 18 vehicles, trips, expenses, diesel/mileage, capacity checks, POD | [C]/[I] | delivery-distribution, vehicle-management |
| MOD-009 | Finance & Accounting: income/expense, AP/AR, payments, cost centers, batch profitability, audit | [C] | finance-profitability.md |
| MOD-010 | HR & Payroll: 85+ employees, attendance, payroll, advances, designation | [C] | employee-payroll.md |
| MOD-011 | Intelligence & Analytics: dashboards, demand forecasting, slow/non-moving, what-if, alerts | [C] | 10-intelligence/* |
| MOD-012 | System Administration: RBAC, approvals, audit, sync, notifications, settings | [C] | 11-system/* |

---

## 3. FEATURE REQUIREMENTS (FEAT-001..028 catalogued; 63 discovered)

### 3.1 Catalogued (FEAT-001..028 per requirements/12-catalogs/feature-catalog.md)
1. Core Setup & Master Data Mgmt [C] · 2. Farm & Shed Mgmt [C] · 3. Batch Mgmt [C] · 4. Daily Farm Entry Form [C] · 5. Feed Inventory [C] · 6. Weight Tracking [C] · 7. Health & Medication Log [C] · 8. Harvest & Sales [C] · 9. Dealer Credit Mgmt [C] · 10. Multi-Warehouse Transfer [C] · 11. Employee HR & Payroll [C] · 12. Vehicle Trip Mgmt [C] · 13. Finance & Profitability [C] · 14. Management Dashboard [C] · 15. Mobile Offline App (Android, Tamil, offline+sync) [C] · 16. Egg Sales Mgmt [C] · 17. Dynamic Grade & Unit Config [C] · 18. Grade-Wise Inventory [C] · 19. Price List & Rate History [C] · 20. Customer Ledger [C] · 21. Source-Based Costing [C] · 22. Live Processing Weight Reconciliation [C] · 23. Processing Variance Handling [C] · 24. Wastage Workflow [C] · 25. Multi-Bird Order Fulfillment [C] · 26. Custom Order Instructions [C] · 27. Advanced Label Generation [C] · 28. 1-to-N Inventory Split [C]

*(V2 note: FEAT-029..FEAT-063 = discovered-but-uncatalogued features — consolidated in §3.2; catalog expansion proposed in gap-analysis.md.)*

### 3.2 Discovered in conversation (not in catalog — 35 more)
Custom Order Instructions; Selling Type Config (Live/Whole/Cut/Boneless); Weight Mismatch Handling; Customer-Specific Pricing (Retail/Hotel/Dealer/Wholesale); Recurring Orders; Order Cut-off Engine; E-Proof of Delivery (signature/photo/GPS/weight); Processing Queue Kanban; Staff Productivity Tracking; Reverse Traceability Tree; Customer Feedback Tracking; Automated Finance Updates on Refunds/Credit Notes; Physical vs System Stock Audit; Configurable Multi-level Approval Matrix; Temporary Approval Delegation; Centralized Capacity Planning [F]; Cost Center Mgmt; Granular End-to-End Trace History; Multi-Year Historical Visualization & Seasonal Trends; Stock Categorization (Fast/Slow/Non-moving/Dead) with Alerts; What-If Scenario Planning; Morning Opening Executive Dashboard; Farm & Shed Performance Comparison; Batch Splitting & Partial Transfer; Batch Operations History; Partial Payment Tracking; Supplier Price & Performance Tracker; Price Anomaly Detection; Customer-Specific Configurator; Order Feasibility Engine; Multi-Warehouse Stock Visibility; Advanced Costing Module; End-to-End Traceability (incl. recall); Complaint Mgmt (severity, SLA, root cause, trends); Driver Settlement Module; Business Health Score [F].
*(FEAT-021/023/028/038/041 references in old traceability.md are stale — CONFLICT-015.)*

---

## 4. BUSINESS RULE REQUIREMENTS (see business-rules.md for full catalog)

BR-001..BR-008 (catalog) + BR-050..053 (capacity/complaints) + 45 discovered (TEMP-BR-001..053, consolidated in business-rules.md) + 13 generic (BR-VAL/CAL/WF/ALT/FIN/OP) + 50 validation (VR-001..050) + 12 health rules (BR-HLT-*).

| REQ-ID | Rule | Status |
|---|---|---|
| BR-001 | Transit loss billing (live→customer, processed→company) | [C] |
| BR-002 | FCR formula + broiler target < 1.6 | [E] |
| BR-003 | Batch cost allocation to outputs | [C] |
| BR-004 | Yield variance 65–70% → audit review | [I] |
| BR-005 | Credit limit enforcement (Hard/Soft/Override) | [C] |
| BR-006 | Mortality alert > 0.5%/day configurable | [P] |
| BR-007 | Feed reorder < 3 days consumption | [P] |
| BR-008 | Egg write-off > 2% approval | [P] |

---

## 5. CALCULATION REQUIREMENTS (FORMULA-IDs F-001..F-030 + F-101..F-130; full: calculation-catalog.md)

Client formulas F-001..F-030 (see master §9). Generic BR-CALC-001..030 (F-101..F-130): Mortality %, Livability %, FCR, Adjusted FCR, ADG, Avg Body Weight, CV, EPEF, Production Index, HDEP, HHEP, Egg Mass, FCR/dozen, FCR/kg egg, Hatchability (set/fertile), Fertility %, Saleable Chick %, Cost per bird, Cost per kg live, Cost per egg, Cost per dozen, Revenue per bird, Gross Margin per bird, Net Profit per batch, Feed cost %, Med cost per bird, Growing charges, Bonus/penalty, Break-even.

---

## 6. REPORT REQUIREMENTS (18 catalogued REP-… + 57 generic REP-1001..; full: report-catalog.md)

| REQ-ID | Report | Status |
|---|---|---|
| REP-F01..F07 | Farm Performance, Batch Performance, Production, Mortality, Feed, Weight, FCR | [C] |
| REP-E01..E05 | Daily Egg Collection, Grade-wise Stock, Breakage/Wastage, Rate History, Egg P&L | [C] |
| REP-S01..S03 | Daily Sales, Dealer Performance, Outstanding | [C] |
| REP-FI01..03 | Income/Expense, P&L, Cost Analysis | [C] |
| REP-020 | Monthly Complaint Summary | [P] |
| REP-1001..9004 | 57 generic reports (reference) | [E] |

*(BRD_STATUS "Total Reports: 0" is an error — CONFLICT-011.)*

---

## 7. NOTIFICATION REQUIREMENTS (13 catalogued + 32 generic + 36 discovered; full: notification-catalog.md)

| REQ-ID | Notification | Status |
|---|---|---|
| NOTIF-001..013 | Mortality Threshold, Feed Stock Low, Payment Overdue, Vaccine Due, Medicine Expiry, Poor FCR, Low Weight/Yield, Egg Rate Change, Egg Stock Shortage, High Wastage/Return, Vehicle Breakdown, Supplier Quality, Processing Bottleneck | [C]/[P] |

---

## 8. API REQUIREMENTS (full: api-catalog.md)

| REQ-ID | Requirement | Status |
|---|---|---|
| API-REQ-01 | RESTful JSON, versioned `/api/v1/` prefix (CONFLICT-022 resolved) | [C] |
| API-REQ-02 | JWT auth (access + refresh), RBAC | [C] |
| API-REQ-03 | Pagination, rate limiting | [C]/[P] |
| API-REQ-04 | `/sync/pull`, `/sync/push` offline endpoints | [C] |
| API-REQ-05 | Webhooks (batch.created, invoice.generated, inventory.low) | [F] |
| API-REQ-06 | Existing Laravel APIs (billing/ledger) reconciliation pending CONFLICT-001 | [N] |
| API-0001..1401 | 19 generic sample endpoints (reference; NOT 1400+ — CONFLICT-002) | [E] |

---

## 9. DATABASE REQUIREMENTS (full: database-catalog.md)

| REQ-ID | Requirement | Status |
|---|---|---|
| DB-REQ-01 | 64 canonical entities (client register) + 73 generic; reconciled union in database-catalog.md | [C] |
| DB-REQ-02 | Farms 1:M Sheds (42); Sheds 1:M Batches (30+) | [C] |
| DB-REQ-03 | Soft delete with deleted_at/deleted_by/is_deleted | [C] |
| DB-REQ-04 | JSONB configurable attributes | [P] |
| DB-REQ-05 | tenant_id/company_id on all tables | [F] |
| DB-REQ-06 | UUIDv7 primary keys (CONFLICT-018 resolved recommendation) | [P] |
| DB-REQ-07 | Audit/history tables; materialized views for reports | [P] |
| DB-REQ-08 | MySQL (existing Laravel) vs PostgreSQL (proposed) — pending CONFLICT-001 | [N] |

---

## 10. SECURITY REQUIREMENTS (full: security-requirements.md)

| REQ-ID | Requirement | Status |
|---|---|---|
| SEC-REQ-01 | RBAC granular module+action; farm-level isolation | [C] |
| SEC-REQ-02 | JWT RS256+, short access tokens, refresh HttpOnly | [C]/[E] |
| SEC-REQ-03 | MFA/TOTP Owner/Admin | [P] |
| SEC-REQ-04 | AES-256 at rest; TLS 1.3 (1.2 fallback) | [E] |
| SEC-REQ-05 | Immutable audit log; no silent deletions | [C] |
| SEC-REQ-06 | Rate limiting, CORS, OWASP Top 10 | [E] |
| SEC-REQ-07 | RPO ≤ 1h, RTO ≤ 4h, vault secrets, rotation 30d | [E] |
| SEC-REQ-08 | SEC-0001..0132 = 41 numbered generic requirements (NOT 132 — CONFLICT-004) | [E] |

---

## 11. NFR REQUIREMENTS (20 — docs/26-non-functional)

| REQ-ID | NFR | Target |
|---|---|---|
| NFR-1001 | Page load 3G | < 2s [E] |
| NFR-1002 | API latency 95th pct | < 500ms [E] (MVP claims 200ms — CONFLICT-021) |
| NFR-1003 | Report generation | < 10s [E] |
| NFR-1004 | Offline sync (1 wk) | < 15s [E] |
| NFR-2001..03 | Tenants 1,000+ / records 10M+/day / 1,000 concurrent | [E] (generic) |
| NFR-3001..02 | 99.9% uptime, no SPOF | [E] |
| NFR-4001..03 | RPO <1h, RTO <4h, backups | [E] |
| NFR-5001..03 | AES-256, TLS, audit | [E] |
| NFR-6001..02 | Monitoring alerts, log retention 90d/1yr | [E] |
| NFR-7001 | Archival > 3 yrs (vs 5 yr — CONFLICT-020) | [E] |
| NFR-8001 | Redis caching | [E] |
| NFR-9001 | Global search < 1s | [E] |

---

## 12. QA REQUIREMENTS (full: qa-requirements.md)

| REQ-ID | Requirement | Status |
|---|---|---|
| QA-001 | Unit ≥ 80% coverage on FCR/yield/payroll | [E] |
| QA-002 | Integration + E2E + UAT | [E] |
| QA-003 | Offline sync conflict tests (additive vs absolute) | [C] |
| QA-004 | RBAC + farm isolation tests | [C] |
| QA-005 | Dashboard < 3s across 30+ batches/42 sheds | [P] |
| QA-006 | Financial calculation accuracy tests | [C] |

*(QA-012/015/022/025/030 refs in old traceability.md are stale — CONFLICT-016.)*

---

## 13. REQUIREMENTS COVERAGE SUMMARY (V2)

- **Covered:** 7 of 13 RND gaps (Live vs Processed, Yield, Weight Tolerance, Offline Mobile, Demand Forecasting, Inventory Intelligence, What-If).
- **Partially covered:** Complaint Management (SLA/severity/root-cause added V2).
- **Missing (V2 — now tracked):** Capacity Planning (fixed — capacity-planning.md exists), Business Health Score, Churn AI, Fraud AI, Backup Supplier AI (all [FUTURE] — see ai-roadmap.md).
- **Orphans:** 0 (verified).

---

*End of requirement-matrix.md (V2). All IDs stable; supersedes stale references in traceability.md v1.*