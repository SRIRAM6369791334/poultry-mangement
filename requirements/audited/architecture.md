# ARCHITECTURE (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Corrected architecture with decision status. Honest about the CONFLICT-001 blocker and the 5 ADRs that contradict other docs.

---

## 1. DECISION STATUS (blocked)

**PENDING — Q-CONF-01 (CONFLICT-001):** Build vs extend. Two documented stacks exist:

| Aspect | Proposed (docs/21-roadmap) | Existing (PDF — Laravel codebase) |
|---|---|---|
| Backend | Node.js + NestJS | Laravel 12 / PHP 8.2 |
| DB | PostgreSQL + Prisma | MySQL |
| Frontend | React.js + Tailwind, responsive PWA | Blade + Tailwind + Vite |
| Auth | JWT | Laravel Sanctum API |
| Permissions | custom RBAC | spatie/laravel-permission |
| Reports | build | barryvdh/laravel-dompdf |
| Async | queues | Laravel Queue |
| Built modules | — | Day-Load/Daily/Weekly billing, Cash-Bank Ledger, Payments, EMI, Warehouse/Farm Master |
| Missing | — | Farm Health (vaccination/FCR), Staff/HR, Shop POS, Procurement PO/GRN, logistics, analytics |
| Urgent fixes | — | db_exporter, db_importer, live-deploy-sync routes (security) |

**V2 recommendation:** If the existing system's quality is acceptable (audit needed), extend it; do NOT rewrite working billing core during migration. If extending, the Laravel roadmap in the PDF's §5 (8 phases) is authoritative for those modules; the generic Node.js MVP plan is unnecessary. If the client prefers greenfield, plan data migration from the existing DB.

---

## 2. ARCHITECTURE PATTERN

- **Recommended:** Modular Monolith (core + 12 modules MOD-001..012) with bounded contexts:
  - Core/Shared: IAM, Notification Engine, Sync Engine, Analytics, Master Data
  - Domains: Farm Ops, Processing & Yield, Egg Ops, Inventory, Procurement, Sales & Distribution, Fleet, Finance, HR/Payroll, Intelligence
- Source: requirements/13-technical/module-architecture.md (justifies monolith at this scale: 8 farms, 42 sheds, 85 employees, 120+ customers).
- Future microservices split if scale requires (Year 2+).
- Multi-tenancy: single-tenant deployment for client now; generic SaaS hybrid (shared schema + RLS, dedicated DB for Enterprise) documented for the platform product (CONFLICT-019 resolved in V2: hybrid for SaaS; ADR-001 adequate for MVP).

---

## 3. OFFICIAL ADR POSITIONS (12 — with conflict flags)

| ADR | Decision | Status | V2 |
|---|---|---|---|
| ADR-001 | Multi-tenancy: shared schema + Postgres RLS | Accepted | OK for single/SaaS-MVP; hybrid for Enterprise (CONFLICT-019) |
| ADR-002 | UUIDv7 primary keys | Accepted | **Adopted** (CONFLICT-018) |
| ADR-003 | Soft delete core entities; hard delete logs/junctions | Accepted | OK |
| ADR-004 | App-level audit table via ORM hooks | Accepted | OK + immutable for financial |
| ADR-005 | Flock vs Batch semantics (labels by business type) | Accepted | Client: single "Batch" term standardized (Farming/Processing Batch) |
| ADR-006 | Native app React Native/Expo | Accepted | **Conflict** — MVP= PWA (CONFLICT-021); native for Tamil-first offline later; Q-CONF-35 |
| ADR-007 | JWT + refresh tokens | Accepted | OK |
| ADR-008 | S3-compatible object storage | Accepted | OK |
| ADR-009 | Materialized views + background refresh for reports | Accepted | OK (≤1h historical lag) |
| ADR-010 | Metric weights; money in minor units | Accepted | OK |
| ADR-011 | LWW for daily metrics; server authority for financial/inventory | Accepted | **Reconciled** with CORE-08 (CONFLICT-033): additive deltas LWW+audit; absolute values manual resolution |
| ADR-012 | Async notifications via Redis/BullMQ | Accepted | OK (Node) — or Laravel Queues + Redis if extending |

---

## 4. COMPONENT VIEW (technology-agnostic — pending Q-CONF-01)

```
[Android/Web Clients]
   │  REST + sync endpoints
[API Gateway / BFF]  → auth, RBAC, rate limit
[Application Core (12 modules)]
   ├─ [Sync Engine]   ← offline queue, conflict rules (CORE-08)
   ├─ [Notification Engine]  ← queue (Redis/BullMQ or Laravel)
   ├─ [Analytics Engine]     ← demand forecast, slow-moving, what-if
   └─ [Report Service]       ← materialized views, export
[Database]  ← PostgreSQL (proposed) / MySQL (existing)
[Object Storage]  ← S3 (proofs, photos)
[External] WhatsApp, SMS, Email, Payment, GST, Accounting (Tally/Zoho)
[Future] IoT (MQTT), Weighing scales, GPS, Weather
```

---

## 5. NON-FUNCTIONAL PROFILE (20 NFRs — verbatim targets from docs/26-non-functional)

| ID | Target |
|---|---|
| NFR-1001 | Page load < 2s on 3G |
| NFR-1002 | API 95th pct < 500ms (MVP claims 200ms — CONFLICT-024, adopt 500ms) |
| NFR-1003 | Report generation < 10s |
| NFR-1004 | Offline sync of 1 week < 15s |
| NFR-2001 | 1,000+ tenants (generic) / single client org + 15-20 farms |
| NFR-2002 | 10M+ daily records time-series |
| NFR-2003 | 1,000 concurrent write sessions |
| NFR-3001 | 99.9% uptime |
| NFR-3002 | No single point of failure |
| NFR-4001 | RPO < 1h |
| NFR-4002 | RTO < 4h |
| NFR-4003 | Backups: 30d daily, 1yr weekly, yearly indefinite |
| NFR-5001 | AES-256 at rest; TLS 1.3 (1.2 fallback) |
| NFR-5002 | MFA + JWT |
| NFR-5003 | Immutable audit for financial/inventory |
| NFR-6001 | Auto-alerts CPU >80% / 5xx >1% |
| NFR-6002 | Logs 90d hot, 1yr cold |
| NFR-7001 | Data > 3yrs cold storage, async queryable |
| NFR-8001 | Redis caching (breed standards, configs, permissions) |
| NFR-9001 | Global search < 1s (Elasticsearch/OpenSearch) |

---

## 6. DEPLOYMENT & OPS

- AWS preferred (RDS, ECS/EKS), Docker, IaC (Terraform), CI/CD with SAST/DAST, Dev/Staging/Prod (manual promotion gate).
- Zero-downtime backward-compatible migrations.
- Monitoring: Prometheus/Grafana, ELK/Datadog, tracing (Jaeger/OTel), PagerDuty.
- Scaling: horizontal by CPU/mem (>70%), read replicas, CDN, S3 signed URLs, queue workers.
- If extending Laravel: same principles apply with Forge/ECS + MySQL RDS.

---

## 7. INTERNAL INTEGRATION FLOWS (canonical — cross-domain-review.md)

Procurement → Inventory → Farm Ops → Processing → Inventory → Sales → Finance → Intelligence
- Farming Batch cost/kg → Processing Batch raw material input (CORE-11)
- Refunds/credit notes auto-post to Finance (BR-036)
- Dealer ledger = Sales − Payments − Credit Notes (F-012)

---

## 8. RISKS (7)

RISK-001 Data Migration · 002 Internet Connectivity · 003 User Adoption · 004 Hardware Failure · 005 Integration Complexity · 006 Scope Creep · **007 Build-vs-Extend decision delay [NEW]** — all Open with mitigations in risk-register.md.

---

*End of architecture.md (V2).*