# CHANGE LOG (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Complete record of what the audit changed, corrected, or added versus the original documentation. Every deviation is listed with its reason.

---

## 1. DELIVERABLES CREATED

| # | File | Purpose |
|---|---|---|
| 1 | master-requirements-v2.md | 51-section corrected master document |
| 2 | requirement-matrix.md | Stable REQ-IDs, corrected counts |
| 3 | business-rules.md | Canonical de-conflicted rule catalog |
| 4 | calculation-catalog.md | FORMULA-IDs F-001..F-040 + F-101..F-130 |
| 5 | workflow-catalog.md | 27 workflows + 10 state machines |
| 6 | database-catalog.md | Entity reconciliation (64 client / 73 generic) |
| 7 | api-catalog.md | API principles + 19 sample endpoints, `/api/v1` standard |
| 8 | report-catalog.md | Reports reconciled (33 requested / 18 catalogued / 57 generic) |
| 9 | notification-catalog.md | Notifications reconciled (36 discovered / 13 client / 32 generic) |
| 10 | gap-analysis.md | All gaps incl. new critical ones from PDF audit |
| 11 | conflict-register.md | CONFLICT-001..036 full register |
| 12 | client-confirmation-questions.md | Q-CONF-01..40 decision backlog |
| 13 | traceability-matrix.md | Corrected, extended traceability |
| 14 | architecture.md | Corrected architecture with decision status |
| 15 | security-requirements.md | 41 numbered SEC reqs + urgent findings |
| 16 | qa-requirements.md | QA-001..010 + 50 scenarios |
| 17 | ai-roadmap.md | 19 use cases + 21 client wishes |
| 18 | change-log.md | This file |

**Source preservation:** all 217 original files copied to `requirements/source/original-documentation/` (docs/ + all requirements/ folders + 6 root files). Nothing in the original set was modified or deleted.

---

## 2. CORRECTIONS (from incorrect v1 values to audited V2 values)

| # | Item | v1 (as documented) | V2 (audited) | Where fixed |
|---|---|---|---|---|
| CHG-01 | API endpoints | "1400+" | 19 | conflict-register 002; api-catalog §3 |
| CHG-02 | Security requirements | "132" | 41 | conflict-register 004; security-requirements §3 |
| CHG-03 | Notifications | "40+" | 32 (generic) / 13 (client) / 36 discovered | conflict-register 005; notification-catalog |
| CHG-04 | Modules | "16" (exec) / "40" (BRD_STATUS) | 22 hierarchy / 15 docs / 12 client MOD | conflict-register 003, 010 |
| CHG-05 | Entities | "80+" | 73 generic / 64 client | conflict-register 008; database-catalog |
| CHG-06 | Edge cases | "100+" | 20 documented (aspiration) | conflict-register 006 |
| CHG-07 | AI use cases | "20+" | 19 | conflict-register 007; ai-roadmap |
| CHG-08 | Integrations | "15+" | 14 | conflict-register 009 |
| CHG-09 | BRD reports | "0" | 18 catalogued / 33 requested | conflict-register 011; report-catalog |
| CHG-10 | BRD conflicts | "1" | 36 | conflict-register |
| CHG-11 | BRD files | "64" | 150 | conflict-register 013 |
| CHG-12 | BR-ID collision | BR-001/002 dual meaning | Canonical BR-001..053 | business-rules |
| CHG-13 | FEAT/QA/US stale IDs | traceability FEAT-021/023/028/038/041, QA-012/015/022/025/030, US-008/011/012/014 | Corrected mappings | traceability-matrix §1; requirement-matrix |
| CHG-14 | API path prefix | mixed | `/api/v1/` standardized | api-catalog |
| CHG-15 | UUID strategy | UUIDv7 vs UUIDv4 | UUIDv7 adopted (ADR-002) | architecture ADR-002; database-catalog |
| CHG-16 | Archival age | 3yr vs 5yr | 3yr (NFR-7001) pending client confirm | conflict-register 020 |
| CHG-17 | Audit retention | 1yr/3yr vs 90d/1yr vs 5yr | open (Q-CONF-28) | conflict-register 020 |
| CHG-18 | TLS | 1.3 vs 1.2+ | TLS 1.3 w/ 1.2 fallback | architecture NFR-5001 |
| CHG-19 | Mobile platform | PWA vs RN/Flutter | MVP PWA; native later (Q-CONF-35) | conflict-register 021 |
| CHG-20 | API latency | 200ms vs 500ms | 500ms 95th pct adopted | conflict-register 024 |
| CHG-21 | Mortality alert | 0.15% vs 0.5% | two-tier configurable | conflict-register 025; business-rules §7 |
| CHG-22 | Yield target | 65-72% vs 65-70% | 65-70% canonical | conflict-register 028 |
| CHG-23 | Batch lifecycle | 2 variants | Draft→Placed→Active→Partially Depleted→Closed | workflow-catalog §2.1 |
| CHG-24 | Order lifecycle | 3 variants | 12-state canonical | workflow-catalog §2.2 |
| CHG-25 | EPEF vs EEF | both | EPEF standardized | conflict-register 030 |
| CHG-26 | Offline conflict rule | "no auto-overwrite" vs "LWW" | additive=LWW+audit; absolute=manual | conflict-register 033; architecture ADR-011 |
| CHG-27 | Payment modes | 4 vs 5 vs 6 | Cash/UPI/Bank/Credit/Partial/Advance | conflict-register 034 |
| CHG-28 | Dealer/employee counts | 45 vs 45+; 85 vs 85+ | ≥ (45+, 85+) | conflict-register 031 |
| CHG-29 | Approval role naming | Admin vs Company Admin | Company Admin | conflict-register 032 |
| CHG-30 | Coverage report | stale (missing items now exist) | V2 catalogs supersede | conflict-register 036; gap-analysis §1 |

---

## 3. ADDITIONS (new content created by audit — no client rule altered)

| # | Addition | Rationale |
|---|---|---|
| ADD-01 | CORE-01..16 non-negotiable rules | Formalize client-confirmed invariants |
| ADD-02 | CONFLICT-001..036 register | Integrity of the baseline |
| ADD-03 | Q-CONF-01..40 backlog | All open decisions in one place |
| ADD-04 | FORMULA-IDs F-001..F-040 + F-101..F-130 | Formula governance |
| ADD-05 | Gap GAP-CON-01..03 (existing codebase) | Discovered in PDF audit — the single biggest finding |
| ADD-06 | SEC-URG-01..04 (exposed db_exporter/db_importer/live-deploy-sync) | From PDF Phase 1; must fix regardless |
| ADD-07 | RISK-007 (build-vs-extend decision delay) | New risk from CONFLICT-001 |
| ADD-08 | BR-053 complaint SLA 24h | From complaint-management.md |
| ADD-09 | Master 51-section V2 document | v1 master doc referenced but did not exist in repo |

---

## 4. EXTERNAL RESEARCH TAGGING

All industry values that come from breeding/industry sources (FCR <1.6, EPEF ranges, mortality norms, feed-cost %, density, hatchability) are tagged `[EXTERNAL-RESEARCH]` and explicitly NOT treated as client-confirmed. Sources: Cobb-Vantress, Aviagen Ross, Hy-Line, Lohmann, Hubbard, USDA/FAO/ICAR/DAHD, Merck Vet Manual, WOAH, NRC, academic literature (18 sources in docs/25-research-sources/sources.md).

---

## 5. INTEGRITY STATEMENT

- ZERO client-confirmed rules were changed (CORE-01..16 verbatim essence preserved).
- ZERO thresholds were invented (all marked [PROPOSED]/[CONFIGURABLE] and in Q-CONF backlog).
- ALL original documents preserved untouched in `requirements/source/original-documentation/`.
- Every correction traceable to a CONFLICT-ID or CHG-ID in this log.

---

*End of change-log.md (V2).*