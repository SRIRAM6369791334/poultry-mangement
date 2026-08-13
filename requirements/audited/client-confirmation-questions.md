# CLIENT CONFIRMATION QUESTIONS (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** All questions requiring client answers before/while building. Consolidates OPEN-001..020 (requirements/00-source/open-questions.md), 3 source-conflicts, and new questions raised by the audit (Q-CONF-XX).

---

## 1. P0 — BLOCKING DECISIONS (answer before architecture)

| ID | Question | Why | Source |
|---|---|---|---|
| Q-CONF-01 | **Build or extend?** An existing system exists (documented in Poultry_ERP_Developer_Documentation.pdf): Laravel 12/PHP 8.2/MySQL with Day-Load, Daily, Weekly billing, Cash-Bank Ledger, Payments, EMI already built. Master docs propose a new Node.js/NestJS/PostgreSQL stack. Do we (a) extend the existing system, (b) build new and migrate, or (c) build new alongside and phase out? | Blocks all tech choices | CONFLICT-001 |
| Q-CONF-02 | **Existing codebase access:** Can we get access to the existing codebase/source and its data? Are db_exporter / db_importer / live-deploy-sync routes still exposed? | Needed for migration & security fix | GAP-CON-02/03 |
| Q-CONF-03 | **Migration:** What is the migration timeline and data volume (years of records, size)? | OPEN-007 | gap-analysis |

## P1 — OPERATIONAL FACTS

| ID | Question | Source |
|---|---|---|
| Q-CONF-04 | GST/tax structure: rates per product (chicken, egg), GST filing needs? | OPEN-001 |
| Q-CONF-05 | Existing billing software: name, vendor, does it have API/export? | OPEN-005 |
| Q-CONF-06 | Accounting software in use (Tally/Zoho/other)? | OPEN-006 |
| Q-CONF-07 | Farm internet quality per site (reliable/weak/none)? Devices available for 85 employees? | OPEN-010 |
| Q-CONF-08 | Processing facility: located where, what capacity (kg/day, birds/day)? | OPEN-003, OPEN-012 |
| Q-CONF-09 | Cold storage: locations and capacity? | OPEN-011 |
| Q-CONF-10 | Dealer credit terms: credit limits and payment terms per dealer? | OPEN-002 |
| Q-CONF-11 | Salary components (basic + DA + allowances)? | OPEN-008 |
| Q-CONF-12 | Regulatory: FSSAI license, PCB requirements, local compliance? | OPEN-009 |
| Q-CONF-13 | Market rate determination: NECC or other reference for daily rates? | OPEN-016 |
| Q-CONF-14 | Vehicles: owned/leased/mix? Insurance tracking needed? | OPEN-018, OPEN-019 |
| Q-CONF-15 | Bank accounts: how many, reconciliation needed? | OPEN-017 |
| Q-CONF-16 | Delivery radius/clustering: coverage area, delivery zones? | OPEN-020 |
| Q-CONF-17 | By-product pricing method (weight-based, fixed rate, share of cost)? | OPEN-013 |
| Q-CONF-18 | Egg conversion values (Tray=30, Carton=7 standard?) | OPEN-014 |
| Q-CONF-19 | By-product cost allocation split (docs propose 90% meat / 10% by-products) | OPEN-015 |

## P2 — THRESHOLD CONFIRMATIONS (values are [PROPOSED] until confirmed)

| ID | Question | Proposed default |
|---|---|---|
| Q-CONF-20 | Daily mortality alert threshold? | 0.5% client alert; 0.15% internal HIGH trigger (CONFLICT-025) |
| Q-CONF-21 | Mortality alert recipients? | BR-006: Head Vet + Farm Mgr vs NOTIF-001: Farm Mgr + Owner |
| Q-CONF-22 | FCR target for your broilers? | industry <1.6 (not client-confirmed) |
| Q-CONF-23 | Expected dressed yield % per species? | broiler 65-70% [INFERRED] |
| Q-CONF-24 | Weight tolerance for short/over delivery? | not defined |
| Q-CONF-25 | Feed reorder lead (days of consumption)? | 3 days |
| Q-CONF-26 | Damaged egg write-off threshold? | 2% of daily collection |
| Q-CONF-27 | Overhead allocation % for batch profitability? | not defined |
| Q-CONF-28 | Audit log retention period? | 5 years (client) vs 1yr/3yr (SEC) vs 90d/1yr (NFR) |
| Q-CONF-29 | Cold-storage expiry alert windows? | 30/15/7 days |
| Q-CONF-30 | Data archival: move old data to cold storage at 3 or 5 years? | 3 yrs (NFR) |
| Q-CONF-31 | Notification language preference (Tamil-first)? | Tamil primary |
| Q-CONF-32 | Complaints SLA: 24h for processed meat complaints OK? | 24h |
| Q-CONF-33 | Approval matrix beyond purchases: which transaction types need approvals (Sales Discount, Credit Sale, Stock Adjustment, Wastage, Return, Refund, Rate Change, Expense, Salary)? | per OPEN-004 |
| Q-CONF-34 | MFA for Owner/Admin accounts required? | proposed yes |

## P3 — SCOPE & ROADMAP

| ID | Question | Source |
|---|---|---|
| Q-CONF-35 | Confirm MVP scope: Phase 1 (Core Ops + Mobile Offline) first release OK? | roadmap |
| Q-CONF-36 | Egg business: start as full module now or after broiler MVP? | EGG-001..028 exist |
| Q-CONF-37 | Multi-company: needed now or later? | CLIENT-037 |
| Q-CONF-38 | Confirm company legal name for master data? | OPEN-001 (name) |
| Q-CONF-39 | Per-farm shed distribution (8 farms/42 sheds breakdown)? | data collection |
| Q-CONF-40 | Sample farms for pilot? | migration plan |

---

## STATUS TRACKING

| Status | Count |
|---|---|
| Open | 40 (Q-CONF-01..40) |
| Answered | 0 |
| Blocked by | client review |

*These questions supersede OPEN-001..020 as the live decision backlog; OPEN-IDs remain for traceability.*

---

*End of client-confirmation-questions.md (V2).*