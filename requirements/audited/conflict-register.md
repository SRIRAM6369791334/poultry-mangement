# CONFLICT REGISTER (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Complete, de-duplicated register of every contradiction found in the documentation set. Supersedes the "1 conflict logged" figure (CONFLICT-012). Each entry has: ID, description, sources, impact, and recommended resolution.

---

## A. CRITICAL CONFLICTS

| ID | Conflict | Sources | Resolution |
|---|---|---|---|
| CONFLICT-001 | **Existing codebase vs proposed new stack.** PDF documents Laravel 12/PHP 8.2/MySQL system (billing core BUILT; Farm Health/HR/Shop POS/Procurement missing). Master docs propose Node.js+NestJS+PostgreSQL+React/PWA. Neither document acknowledges the other. | PDF vs docs/21-roadmap/mvp-definition.md vs requirements/13-technical | **Client decision required (Q-CONF-01)** before any architecture/tech work. Recommend: audit existing codebase; extend if it covers billing/ledger well; plan migration otherwise. |

## B. METRIC INFLATION / COUNTS (docs/00-overview/executive-summary.md vs actual files)

| ID | Claim | Actual | Source files |
|---|---|---|---|
| CONFLICT-002 | "1400+ API endpoints" | 19 endpoints (API-0001..API-1401) | docs/10-api/api-requirements.md |
| CONFLICT-003 | "16 modules" | 22 in hierarchy; 15 module .md files | docs/04-modules/module-hierarchy.md |
| CONFLICT-004 | "132 security requirements" | 41 numbered (SEC-0001..0132) | docs/14-security/security-architecture.md |
| CONFLICT-005 | "40+ notifications" | 32 (NTF-1001..7003) | docs/13-notifications/notification-catalog.md |
| CONFLICT-006 | "100+ edge cases" | 20 documented (file admits subset) | docs/22-edge-cases/edge-case-catalog.md |
| CONFLICT-007 | "20+ AI use cases" | 19 (AI-1001..AI-4004) | docs/18-ai/ai-roadmap.md |
| CONFLICT-008 | "80+ entities" | 73 named | docs/09-database/entity-catalog.md |
| CONFLICT-009 | "15+ integrations" | 10 named + 4 mentioned = 14 | docs/16-integrations/integration-catalog.md |

## C. BRD_STATUS ERRORS (requirements/00-master/BRD_STATUS.md)

| ID | Claim | Actual | Impact |
|---|---|---|---|
| CONFLICT-010 | "Total Modules: 40" | 12 (MOD-001..012) in module-catalog.md | roadmap sizing wrong |
| CONFLICT-011 | "Total Reports: 0" | 18 catalogued; 33 client-requested | reporting under-scoped |
| CONFLICT-012 | "Total Conflicts Logged: 1" | 9 in conversation-conflicts.md (2+2+2+1+2); 3 potential in source-conflicts.md | integrity signal wrong |
| CONFLICT-013 | "100% (64 files generated)" | 150 .md files in requirements/ (+76 under analysis) | completion claim wrong |

## D. ID COLLISIONS & DRIFT

| ID | Conflict | Resolution |
|---|---|---|
| CONFLICT-014 | BR-001/BR-002 different meanings in business-rule-catalog.md vs traceability.md | V2 canonical: business-rules.md BR-001..053 |
| CONFLICT-015 | traceability.md FEAT-021/023/028/038/041 don't match feature-catalog.md (FEAT-021=Invoicing etc.; catalog ends at FEAT-028) | V2: requirement-matrix.md FEAT list |
| CONFLICT-016 | traceability.md QA-012/015/022/025/030, US-008/011/012/014 numbering mismatch | V2: qa-requirements.md + US-001..015 |
| CONFLICT-017 | 63 features discovered vs 28 catalogued; 45 rules vs 8 — no reconciliation note | V2: requirement-matrix.md §3.2 + business-rules.md §3 |

## E. TECHNICAL DECISIONS

| ID | Conflict | Sources | V2 recommendation |
|---|---|---|---|
| CONFLICT-018 | UUIDv7 (ADR-002) vs UUIDv4 (domain-model §4) | ADRs vs 09-database/domain-model.md | UUIDv7 (ADR-002) |
| CONFLICT-019 | Multi-tenancy: ADR-001 shared schema+RLS only vs saas-architecture hybrid (dedicated DB for Enterprise) | ADRs vs 15-multi-tenancy | Hybrid for generic SaaS; single-tenant for client |
| CONFLICT-020 | Archival: 3 years (NFR-7001) vs 5 years (domain-model §12); audit retention 1yr/3yr (SEC-0052) vs 90d/1yr (NFR-6002) vs 5yr (audit-compliance) | multiple | NFR-7001 (3yr) + client decision Q-CONF-09 |
| CONFLICT-021 | Mobile: ADR-006 React Native/Expo vs 17-mobile Flutter/RN vs MVP/Phase 11 PWA | ADRs, mobile docs, roadmap | MVP=PWA; native later (client Tamil-first workers) — Q-CONF-04 |
| CONFLICT-022 | API paths: un-prefixed (api-requirements.md) vs /api/v1 (traceability-matrix.md) | docs/10-api vs docs/23-traceability | `/api/v1/` prefix (adopted V2) |
| CONFLICT-023 | TLS 1.3 only (SEC-0041) vs TLS 1.2+ (NFR-5001) | security vs NFR | TLS 1.3 with 1.2 fallback |
| CONFLICT-024 | API latency: <200ms (MVP) vs <500ms 95th pct (NFR-1002) | mvp-definition vs nfr-catalog | 500ms 95th pct; 200ms target for core entry |

## F. INDUSTRY THRESHOLDS

| ID | Conflict | V2 position |
|---|---|---|
| CONFLICT-025 | Mortality alert: 0.15% (BR-HLT-MORT-01 HIGH) vs 0.5% (BR-ALT-301, NTF-1001, BR-006); health-management: daily normal <0.1%, cumulative <4% | [CFG] two-tier: 0.15% internal HIGH + 0.5% CRITICAL client alert; Q-CONF-02 |
| CONFLICT-026 | Feed cost share: 60-70% vs 65-70% vs 70%+ | [E] report actual; no alert |
| CONFLICT-027 | Water:feed ratio: 1.6-2.0 (glossary) vs 1.6-2.5 warning (BR-ALT-303) | [E] 1.6–2.5 warning band |
| CONFLICT-028 | Yield targets: Broiler 65-72% (poultry-domain) vs 65-70% (BR-004) | [I] 65-70% canonical |
| CONFLICT-029 | Batch lifecycle variants (entity-register "Placed→Growing→Depleted" vs batch-flock "Draft→Placed→Active→Partially Depleted→Closed"); Order lifecycle 3 variants; coverage-report staleness | V2 canonical: workflow-catalog §2.1/2.2 |
| CONFLICT-030 | EPEF vs EEF naming; candling Day 7/14/18 vs 7-10 vs 10-18; egg storage 15-20°C vs 15-18°C; layer cycle 70-100+ vs 72-90; broiler 35-49 vs 35-45; stocking 15-19 vs 20/m²; vaccination schedule variants | Standardize EPEF; configurable per-species values; Q-CONF-03 for client norms |

## G. DATA-FACT CONFLICTS

| ID | Conflict | V2 position |
|---|---|---|
| CONFLICT-031 | 45 Dealers (business-facts) vs 45+ (customer-dealer); 85 vs 85+ employees | "45+" / "85+" (use ≥) |
| CONFLICT-032 | Approval role naming: Admin vs Company Admin | Company Admin (canonical) |
| CONFLICT-033 | Offline conflict: "DO NOT auto-overwrite" (TEMP-BR-010, mobile-offline, CONFLICT-001 in source-conflicts) vs US-002 LWW + module-architecture CRDT/LWW | Additive metrics (mortality/feed deltas): LWW+audit; absolute/financial data: manual resolution (ADR-011 reconciled with CORE-08) |
| CONFLICT-034 | Payment modes: 4 (Cash/UPI/Bank/Credit) vs +Advance (entity-discovery) vs +Partial/Advance (EGG-020); egg units Kg in/out | Union: Cash, UPI, Bank, Credit, Partial, Advance; units Piece/Tray/Carton/Crate/Box/Kg |
| CONFLICT-035 | Egg conversion standardization (Tray=30, Carton=7 trays) but OPEN-014 unresolved | Configurable conversions; confirm |
| CONFLICT-036 | Coverage-report classifications (0 CLARIFICATION, 1 TO-BE-CONFIRMED) vs conversation-conflicts (2 CLARIFICATION, 1 TBC) | V2 catalogs supersede |

---

## SUMMARY

| Type | Count | IDs |
|---|---|---|
| Critical | 1 | 001 |
| Metric inflation | 8 | 002-009 |
| BRD_STATUS errors | 4 | 010-013 |
| ID collisions/drift | 4 | 014-017 |
| Technical | 7 | 018-024 |
| Industry thresholds | 6 | 025-030 |
| Data facts | 6 | 031-036 |
| **Total** | **36** | CONFLICT-001..036 |

*(Note: master-requirements-v2.md §24 lists 12 headline conflicts; this register is the authoritative full list.)*

---

*End of conflict-register.md (V2).*