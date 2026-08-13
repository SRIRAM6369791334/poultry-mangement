# TRACEABILITY MATRIX (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Client answer (CLIENT-XXX) → Requirement → Module → Feature → Rule → Formula → User Story → QA. Supersedes the 5-row v1 matrix with corrected IDs (CONFLICT-014/015/016). Representative rows; full matrix lives in the requirements tool during implementation.

---

## 1. CORRECTED SAMPLE ROWS (equivalent of v1's 5 rows, IDs fixed)

| CLIENT | REQ | MOD | FEAT | BR | FORMULA | US | QA |
|---|---|---|---|---|---|---|---|
| CLIENT-127 | REQ-MOD-003 | MOD-003 | FEAT-023 (Processing Form/Selling Mode) | BR-001 | F-017/F-018 | US-004 | QA-006 |
| CLIENT-097 | REQ-MOD-003 | MOD-003 | FEAT-024 (Yield Tracking) | BR-004 | F-007/F-008 | US-003 | QA-001 |
| CLIENT-170 | REQ-MOD-011 | MOD-011 | FEAT-034 (Seasonal Predictor) | BR-040 | F-022/F-023 | US-007 | QA-005 |
| CLIENT-027 | REQ-MOD-009 | MOD-009 | FEAT-028 (Batch Costing) | BR-003 | F-006 | US-006 | QA-006 |
| CLIENT-035 | REQ-MOD-012 | MOD-012 | FEAT-041 (Offline Sync) | BR-018 | — | US-002 | QA-003 |

*(v1 rows used stale IDs: BR-002/001, FEAT-021/023/028/038/041, QA-012/015/022/025/030, US-008/011/012/014 — corrected here per CONFLICT-014/015/016.)*

---

## 2. EXTENDED TRACEABILITY (client-confirmed CORE rules)

| CLIENT | Rule | Module | Feature | US | QA |
|---|---|---|---|---|---|
| CLIENT-127 | CORE-01 (Live vs Processed) | MOD-003 | FEAT-025 (Weight Mismatch Handling) | US-004 | QA-006 |
| CLIENT-105 (approx.) | CORE-02 (Weight Reconciliation) | MOD-003 | FEAT-026 | US-003 | QA-001 |
| CLIENT-037 | CORE-10 (Farm isolation) / Multi-company | MOD-001/MOD-012 | FEAT-014 (RBAC) | US-008 | QA-004 |
| CLIENT-212 | CORE-12 (AI recommendations) | MOD-011 | FEAT-060 (AI Insights) | — | QA-008 |
| CLIENT-054 (approx.) | BR-005 (Credit Limit) | MOD-007 | FEAT-013 | US-005 | QA-006 |
| CLIENT-146 | Processing queue 20+ orders | MOD-003 | FEAT-056 (Kanban) | — | QA-002 |
| CLIENT-032 (approx.) | BR-014/015/016 (Approval tiers) | MOD-012 | FEAT-046 (Approval Matrix) | — | QA-004 |
| CLIENT-036 (approx.) | CORE-08 (Offline sync) | MOD-012 | FEAT-041 (Offline Sync) | US-002 | QA-003 |
| CLIENT-128 | CONFLICT-034 payment modes | MOD-009 | FEAT-030 (Payments) | — | QA-006 |
| CLIENT-097 | F-007/F-008 Yield | MOD-003 | FEAT-024 | US-003 | QA-001 |

*(CLIENT numbers marked "approx." map to the closest verified conversation answer; exact CLIENT-IDs verified during requirements tool import — v1 only guarantees 5 mappings; all 220 answers have source files under 00-source/client-conversation-analysis/.)*

---

## 3. MODULE → REPORT → NOTIFICATION TRACE

| Module | Client reports | Notifications | Generic reports |
|---|---|---|---|
| MOD-002 Farm Ops | REP-F01..F07 | NOTIF-001, 002, 004, 006, 007 | REP-1001..2005, 4001..4005 |
| MOD-003 Processing | Live vs Processed P&L, Daily Weight Loss & Yield | NOTIF-010, 013 | REP-2004/2005, 6001 |
| MOD-004 Egg | REP-E01..E05 | NOTIF-008, 009 | REP-2101..2105 |
| MOD-005 Inventory | Stock Reconciliation, Slow/Non-Moving | NOTIF-002 | REP-5001..5006 |
| MOD-006 Purchase | Purchase Report, Supplier Outstanding, Supplier Comparison | NOTIF-012 | REP-8001..8004 |
| MOD-007 Sales | REP-S01..S03, Cost vs Profitability | NOTIF-003, 009 | REP-7001..7005 |
| MOD-008 Fleet | Trip-wise cost, Vehicle breakdown | NOTIF-011 | — |
| MOD-009 Finance | REP-FI01..03, Batch Profitability | NOTIF-010 | REP-6001..6008 |
| MOD-010 HR | Attendance, Payslips | — | REP-9001/9002 |
| MOD-011 Intelligence | Dashboards, Forecast Accuracy | NOTIF-006, 007 | REP-9003 |
| MOD-012 System | Audit Trail | NOTIF-014 (system) | REP-9004 |

---

## 4. CLIENT-ANSWER → SOURCE FILE INDEX (verification path)

| Scope | Files |
|---|---|
| Conversation chunks | 00-source/client-conversation-analysis/chunk-1..5/ (16 root + 12 per chunk × 5 = 76 files) |
| Answer index | 00-source/client-answer-index.md (CLIENT-001..220) |
| Conversation index | 00-source/conversation-index.md |
| Conflicts | 00-source/conversation-conflicts.md + source-conflicts.md |
| Coverage | 00-source/coverage-report.md (stale — CONFLICT-029/036; superseded by V2 catalogs) |

---

## 5. TRACEABILITY RULES (V2)

1. Every requirement must map to ≥1 CLIENT-XXX (verified: 0 orphans).
2. Every feature must map to a module (FEAT-001..028 → MOD-001..012).
3. Every business rule maps to ≥1 CLIENT-XXX or is tagged [E]/[I]/[P].
4. Every formula carries FORMULA-ID (F-001..F-040, F-101..F-130).
5. Full tool-based traceability (Jira/ReqTool) to be configured during Sprint 0.

---

*End of traceability-matrix.md (V2).*