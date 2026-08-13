# QA REQUIREMENTS (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Corrected QA strategy. Fixes stale QA-IDs referenced in v1 traceability (CONFLICT-016) and consolidates testing requirements from docs/19-testing + requirements/13-technical/qa-requirements.md.

---

## 1. TESTING PYRAMID (docs/19-testing/test-strategy.md)

- Unit 50% · Integration 30% · E2E 15% · Manual 5%
- 11 test categories: Functional, Workflow, Calculation, Financial, Permission (RBAC), Multi-tenant, Data Integrity, Performance, Security, Mobile/Offline, API
- Coverage gate: ≥ 80% on backend logic (especially calculations)
- Regression: unit/integration per PR; nightly E2E; visual regression
- Test data: seed data, time-series simulation (40-day broiler / 72-week layer cycles), anonymized production data

---

## 2. CLIENT-SPECIFIC QA REQUIREMENTS (QA-001..QA-010 — canonical IDs)

| ID | Requirement | Priority |
|---|---|---|
| QA-001 | Unit coverage ≥ 80% on FCR, yield, payroll, reconciliation calculations | P0 |
| QA-002 | Integration tests: processing queue, sync engine, approval workflows | P0 |
| QA-003 | Offline sync conflict tests: additive metrics (mortality/feed deltas) vs absolute values; no-auto-overwrite (CORE-08) | P0 |
| QA-004 | RBAC + farm isolation tests (Owner vs Farm Manager visibility; salary/rate/profit restrictions) | P0 |
| QA-005 | Dashboard performance: loads < 3s aggregating 30+ active batches and 42 sheds [PROPOSED] | P1 |
| QA-006 | Financial calculation accuracy: batch profitability, credit limits, outstanding, refunds auto-posting | P0 |
| QA-007 | UAT with stakeholders: Owner, Farm Managers, Accountant, Workers, Drivers (Tamil-first) | P0 |
| QA-008 | AI outputs recommendation-only tests (CORE-12: no autonomous decisions) | P1 |
| QA-009 | Data migration validation: opening balances, field mapping, sample-farm pilot | P0 |
| QA-010 | Security tests: OWASP Top 10, pen test before UAT | P0 |

*(QA-012/015/022/025/030 in v1 traceability.md are stale — superseded by QA-001..010.)*

---

## 3. CRITICAL TEST SCENARIOS (50 — verbatim summary from docs/19-testing)

1. Flock setup validation (shed empty, density limits) · 2-9. Daily entry: mortality ≤ live count, no future dates, no gaps, feed ≤ stock, phase-valid feed, weight sanity, egg ≤ hens, environment ranges · 10-18. Calculations: FCR, ADG, EPEF lock at close, EOD roll-forward, yield reconciliation, salary, batch P&L, egg P&L, driver settlement · 19-26. Inventory: FIFO/FEFO, transfers partial, expiry blocks, reorder, physical count variance, no-negative feed, adjustments audit · 27-33. Sales: credit limit hard/soft/override, mode live/processed, price lock, cut-off, returns disposition, QC-block, recall · 34-39. Finance: refund auto-post, credit notes, approval tiers, no silent delete, reversal, period lock · 40-44. Health: withdrawal hard block, vaccination escalation, mortality escalation matrix · 45-47. Multi-tenant/permissions: tenant isolation, farm scoping, auditor read-only · 48. Offline sync conflict · 49. Performance: P&L for 50 farms < 10s; 500 concurrent daily entries · 50. Security: SQL injection, XSS, JWT expiry, brute force lockout.

---

## 4. PERFORMANCE & RELIABILITY GATES

| Gate | Value | Source |
|---|---|---|
| Dashboard load | < 3s (30+ batches, 42 sheds) | [PROPOSED] |
| Report (Batch P&L) | < 10s | NFR-1003 |
| API latency | 95th pct < 500ms (MVP target 200ms — CONFLICT-024) | NFR-1002 |
| Offline sync (1 week) | < 15s | NFR-1004 |
| Daily entry | < 5 min per shed on mobile | mvp-definition |
| UAT | Zero critical severity bugs | mvp-definition |

---

## 5. TOOLS (generic)

Jest/PyTest-JUnit · Postman/Newman/REST Assured · Cypress/Playwright · k6/JMeter · OWASP ZAP/SonarQube · Appium (mobile).

---

## 6. UAT PLAN (client-specific)

- Sessions: (1) Farm workers — offline daily entry, Tamil UI; (2) Farm Managers — batch ops, alerts, transfers; (3) Accountant — billing, ledger, reconciliation, approvals; (4) Owner — dashboard, profitability, credit, fleet; (5) Drivers — trips, POD, settlement.
- Success criteria: entries accurate offline; sync conflicts resolved manually without data loss; batch P&L matches manual computation on 3 test batches; credit workflow blocks correctly; no silent deletes.
- Sign-off: SME register per module (gap GAP-STR-06 closed).

---

## 7. DEFECT TRIAGE

- P0 Critical (data loss, security) → hotfix, block release
- P1 High (calculation wrong, block workflow) → fix in sprint
- P2 Medium → next sprint
- P3 Low → backlog

---

*End of qa-requirements.md (V2).*