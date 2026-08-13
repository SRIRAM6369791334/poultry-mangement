# API CATALOG (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Corrected API requirements. Resolves the "1400+ endpoints" inflation (CONFLICT-002) and the `/api/v1` prefix conflict (CONFLICT-022). Sample endpoints are illustrative, not exhaustive.

---

## 1. API PRINCIPLES (V2 standard)

| # | Principle | Value |
|---|---|---|
| 1 | Style | RESTful, JSON |
| 2 | Versioning | `/api/v1/` prefix on ALL endpoints (CONFLICT-022 resolved) |
| 3 | Auth | JWT (RS256+) in `Authorization: Bearer`; short-lived access (15-60 min) + refresh (HttpOnly cookie) |
| 4 | Authorization | RBAC at module+action; farm-level scoping enforced server-side |
| 5 | Pagination | all list endpoints (`page`, `limit`) |
| 6 | Rate limiting | per IP and per tenant (values [PROPOSED]) |
| 7 | Validation | OWASP Top 10; server-side validation mirrors VR-001..050 |
| 8 | Idempotency | financial mutations accept `Idempotency-Key` |
| 9 | Sync | `/api/v1/sync/pull`, `/api/v1/sync/push` [CLIENT-CONFIRMED] |
| 10 | Webhooks | [FUTURE] events: `batch.created`, `invoice.generated`, `inventory.low` |
| 11 | Error contract | consistent error envelope `{error: {code, message, details}}` [PROPOSED] |

---

## 2. SYNC API (client-confirmed — critical for offline)

- **GET /api/v1/sync/pull** — pull changes since `since` cursor (batches, master data, config)
- **POST /api/v1/sync/push** — push queued offline transactions with client timestamps + device ID
- **Conflict handling:** server rejects conflicting absolute updates → manual resolution (CORE-08); additive metrics (mortality, feed) accepted via delta/LWW with collision notice (ADR-011 reconciled)
- **Bandwidth target:** < 50 KB per shed per day; media deferred, resumable upload (TUS) [PROPOSED]

---

## 3. GENERIC SAMPLE ENDPOINTS (19 — docs/10-api/api-requirements.md, paths normalized to /api/v1)

| ID | Method | Path | Purpose | Notes |
|---|---|---|---|---|
| API-0001 | POST | /api/v1/auth/login | Authenticate, issue JWT | |
| API-0002 | GET | /api/v1/auth/me | Active user details | |
| API-0101 | GET | /api/v1/farms | List farms for tenant | pagination; FM/Admin |
| API-0102 | POST | /api/v1/farms | Register farm | |
| API-0201 | POST | /api/v1/batches | Initiate batch | shed must be empty & farm active |
| API-0202 | POST | /api/v1/batches/{id}/close | Close batch lifecycle | closure constraints (BR-WF-201) |
| API-0301 | POST | /api/v1/operations/mortality | Log daily deaths | qty ≤ current live count |
| API-0302 | POST | /api/v1/operations/feed | Log daily feed | feed ≤ stock; phase valid |
| API-0401 | POST | /api/v1/health/vaccinations | Plan vaccination | |
| API-0501 | POST | /api/v1/eggs/collection | Record daily egg counts | ≤ hens×1/day |
| API-0601 | POST | /api/v1/hatchery/incubation | Start incubation [F] | |
| API-0701 | POST | /api/v1/inventory/movements | Transfer stock | |
| API-0801 | POST | /api/v1/procurement/orders | Create PO | approval workflow |
| API-0901 | POST | /api/v1/sales/invoices | Create invoice | credit check; mode required |
| API-1001 | POST | /api/v1/finance/expenses | Log expense | approval thresholds |
| API-1101 | GET | /api/v1/hr/employees | List employees | |
| API-1201 | GET | /api/v1/reports/farm-performance | Aggregated KPIs (FCR, mortality) | |
| API-1301 | GET | /api/v1/notifications/alerts | Fetch user alerts | |
| API-1401 | PUT | /api/v1/admin/settings | Update tenant config | |

**NOTE:** These are the only endpoints ever enumerated in the documentation set. The "1400+ API endpoints" figure is unsupported (CONFLICT-002). Full API spec must be generated during implementation from the module/feature catalog — this is an explicit gap (gap-analysis.md GAP-API-01).

---

## 4. CLIENT-MANDATED ENDPOINT BEHAVIORS (from conversation)

| Behavior | Requirement |
|---|---|
| Mortality entry | blocking validation: cannot exceed live count (VR-002) |
| Feed entry | cannot exceed stock; wrong phase blocked (VR-013) |
| Medication | tied to inventory; insufficient stock blocks entry (CORE-05) |
| Harvest/dispatch | blocked during withdrawal period (CORE-06) |
| QC fail | dispatch blocked (BR-034) |
| Credit sale | credit limit check; block/warn per policy (BR-005) |
| Rate change | requires Manager approval to activate (approval workflow) |
| Sync push | never auto-overwrite server data (CORE-08) |

---

## 5. INTEGRATION APIs (see master §13)

WhatsApp (Meta/Gupshup) · SMS (Twilio/MSG91) · Email (SendGrid/SES) · Payment (Razorpay/Stripe, HMAC webhooks) · Accounting (Tally/Zoho/QB — OPEN-006) · GST via GSP (OPEN-001) · S3 · [FUTURE] IoT MQTT, Weighing scales, GPS, barcode/QR, weather, market price scrapers, gov animal-health portals.

---

## 6. OPEN API-LEVEL ITEMS

- GAP-API-01: no full endpoint inventory exists (only 19 samples) — must be derived from MOD/FEAT catalog during implementation.
- GAP-API-02: no response schemas/error codes (only API-0101 mentions pagination).
- GAP-API-03: no rate-limit values documented.
- GAP-API-04: existing Laravel codebase's APIs (billing/ledger) must be inventoried and reconciled — pending CONFLICT-001 decision.

---

*End of api-catalog.md (V2).*