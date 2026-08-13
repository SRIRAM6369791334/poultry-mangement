# GAP ANALYSIS (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Every gap between what was documented, what the client asked for, and what is missing. Extends the stale coverage-report.md (CONFLICT-029) and both gap matrices.

---

## 1. DOCUMENTATION-SET GAPS (v1 coverage report — superseded)

| Item | v1 status | V2 status |
|---|---|---|
| Live vs Processed Sales | Covered | Covered (05-processing) |
| Yield | Covered | Covered |
| Weight Tolerance | Covered | Covered |
| Offline Mobile | Covered | Covered (11-system/mobile-offline.md — matrix pointed to wrong generic file, fixed) |
| Demand Forecasting | Covered | Covered (10-intelligence) |
| Inventory Intelligence | Covered | Covered (slow-nonmoving) |
| What-If Analysis | Covered | Covered (what-if-analysis.md) |
| Capacity Planning | MISSING (v1) | NOW COVERED (09-operations/capacity-planning.md) — gap closed |
| Complaint Management | Partially covered | NOW COVERED (complaint-management.md + BR-053) — gap closed |
| Business Health Score (AI-007) | MISSING | STILL MISSING — [FUTURE] formula undefined (GAP-AI-01) |
| Churn AI (AI-004) | MISSING | STILL MISSING — [FUTURE] (GAP-AI-02) |
| Fraud AI (AI-006) | MISSING | STILL MISSING — [FUTURE] (GAP-AI-03) |
| Backup Supplier AI (AI-005) | MISSING | STILL MISSING — [FUTURE] (GAP-AI-04) |
| Environmental Root Cause AI (AI-008) | MISSING | STILL MISSING — [FUTURE] (GAP-AI-05) |
| Vehicle Maintenance Prediction (AI-009) | MISSING | STILL MISSING — R&D exists (predictive-maintenance.md) — [FUTURE] (GAP-AI-06) |
| MLOps / continuous learning (AI-003) | MISSING | STILL MISSING — [FUTURE] (GAP-AI-07) |

---

## 2. CRITICAL GAP (NEW — from PDF audit)

| ID | Gap | Detail | Action |
|---|---|---|---|
| GAP-CON-01 | **Existing codebase not referenced in master docs** | PDF documents Laravel 12/PHP 8.2/MySQL billing+ledger system (Day-Load/Daily/Weekly billing, Cash-Bank Ledger, Payments, EMI) with modules tagged [BUILT]/[PARTIAL]/[NEW]. Master docs plan a new Node.js stack. No document reconciles them. | Client decision: extend existing or build new (CONFLICT-001, Q-CONF-01) |
| GAP-CON-02 | Security vulnerabilities in existing codebase | db_exporter, db_importer, live-deploy-sync routes exposed | Must fix regardless of decision (PDF Phase 1) |
| GAP-CON-03 | Existing codebase data model unknown in detail | 4 new pillars needed per PDF: Farm Health, Staff/HR, Shop POS, formal Procurement (PO/GRN) | Inventory existing tables/APIs before deciding (OPEN-005) |

---

## 3. MISSING THRESHOLDS / VALUES (all [PROPOSED] or [CONFIGURABLE] — never invented)

| ID | Subject | Status |
|---|---|---|
| GAP-TH-01 | FCR target per species (only industry <1.6 for broilers) | [E] — client to confirm |
| GAP-TH-02 | Mortality alert threshold (0.5% vs 0.15%) | [P]/[CFG] — Q-CONF-02 |
| GAP-TH-03 | Yield targets per species (Broiler 65-72% vs 65-70%) | [I] |
| GAP-TH-04 | Weight tolerance for short/over delivery & processing variance | MISSING |
| GAP-TH-05 | Feed reorder threshold (3 days proposed) | [P] |
| GAP-TH-06 | Damaged-egg write-off threshold (2% proposed) | [P] |
| GAP-TH-07 | Batch overhead allocation percentages (by-product 90/10 proposed) | [P] — OPEN-015 |
| GAP-TH-08 | Processing capacity kg/day | MISSING — OPEN-012 |
| GAP-TH-09 | Cold storage capacity/locations | MISSING — OPEN-011 |
| GAP-TH-10 | Delivery radius / clustering | MISSING — OPEN-020 |
| GAP-TH-11 | Transit-loss tolerance % (generic docs "2-3%" example, no value) | MISSING |
| GAP-TH-12 | PO amendment tolerance (docs assume 5%) | [P] |
| GAP-TH-13 | Expiry alert intervals (30/15/7 days recommended) | [P] |
| GAP-TH-14 | Rate limiting values, password policy details | [P] |
| GAP-TH-15 | Notification channel quotas/costs | MISSING |
| GAP-TH-16 | Audit log retention (1yr/3yr vs 90d/1yr vs 5yr) | UNRESOLVED — Q-CONF-09 |
| GAP-TH-17 | Dashboard refresh SLA ("real-time" vs sync-dependent) | MISSING |

---

## 4. UNRESOLVED BUSINESS DECISIONS (from OPEN-001..020 — see client-confirmation-questions.md)

GST/tax structure (OPEN-001) · per-dealer credit terms (002) · processing facility location (003) · approval workflow per transaction type (004) · existing billing software identity/API (005) · accounting software Tally/Zoho (006) · migration timeline/volume (007) · salary components (008) · regulatory compliance FSSAI/PCB (009) · farm internet quality (010) · cold storage (011) · processing capacity (012) · by-product pricing (013) · egg conversion standardization (014) · by-product cost allocation (015) · market-rate determination NECC (016) · bank accounts (017) · insurance tracking (018) · vehicle ownership (019) · delivery radius (020).

---

## 5. STRUCTURAL GAPS (v1 documents)

| ID | Gap | V2 action |
|---|---|---|
| GAP-STR-01 | No MASTER_REQUIREMENT_DOCUMENT.md existed despite BRD_STATUS referencing it | V2 master-requirements-v2.md created |
| GAP-STR-02 | No UX/UI wireframes/mockups anywhere | UI/UX design phase required (Phase 0/1) |
| GAP-STR-03 | No Jira/requirements tool implemented (traceability promised there) | Traceability matrix V2 file created; tool TBD |
| GAP-STR-04 | Traceability covers only 5 of 220 client answers | V2 traceability-matrix.md expands coverage |
| GAP-STR-05 | No consolidated open-research-items register (OPEN_RESEARCH_ITEM markers scattered) | client-confirmation-questions.md consolidates |
| GAP-STR-06 | No SME register | Proposed: SME sign-off at UAT (qa-requirements.md) |
| GAP-STR-07 | No full API spec (only 19 samples) | GAP-API-01: derive during implementation |
| GAP-STR-08 | No database DDL | Part of implementation design (Phase 0) |
| GAP-STR-09 | No contract-settlement state machine | [FUTURE] contract farming — not client scope |
| GAP-STR-10 | No device/hardware catalog, no internet assessment | OPEN-010; hardware plan proposed |
| GAP-STR-11 | No per-farm shed distribution confirmed | OPEN-023 note (data collection) |

---

## 6. DATA GAPS

- No confirmed per-farm shed distribution (8 farms/42 sheds total only).
- No confirmed egg conversion values (OPEN-014).
- No confirmed dealer credit limits list.
- No confirmed insurance/vehicle ownership details (OPEN-018/019).
- Migration volume unknown (OPEN-007).

---

## 7. GAP PRIORITIZATION

| Priority | Gaps |
|---|---|
| P0 (blocker) | GAP-CON-01/02/03 (codebase decision + security), GAP-STR-01 |
| P1 (decision) | All OPEN-001..020 affecting architecture: 001, 005, 006, 010 |
| P2 (config) | GAP-TH-01..17 threshold values |
| P3 (future) | GAP-AI-01..07, contract farming, IoT |

---

*End of gap-analysis.md (V2).*