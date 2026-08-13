# SECURITY REQUIREMENTS (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Corrected security baseline. Resolves "132 requirements" inflation (CONFLICT-004 → 41 numbered), consolidates client security rules, and flags the critical existing-codebase security findings.

---

## 1. CRITICAL FINDINGS (existing codebase — PDF audit)

| ID | Finding | Severity | Action |
|---|---|---|---|
| SEC-URG-01 | `db_exporter` route/script exposes live data | Critical | Remove/secure before any further deployment |
| SEC-URG-02 | `db_importer` allows importing into live DB | Critical | Remove/secure; restrict to offline/migration tools |
| SEC-URG-03 | `live-deploy-sync` route allows data sync into prod | Critical | Remove; replace with gated CI/CD deployment |
| SEC-URG-04 | Billing/ledger codebase has no documented auth hardening | High | Full security audit if build-vs-extend = extend (Q-CONF-01) |

*(Source: Poultry_ERP_Developer_Documentation.pdf §5 Phase 1 "Security Fix".)*

---

## 2. CLIENT-CONFIRMED SECURITY RULES

| ID | Rule | Source |
|---|---|---|
| SEC-CLI-01 | RBAC granular to module+action (View/Create/Edit/Delete/Approve) | security-permissions.md |
| SEC-CLI-02 | Farm-level data isolation at app and API level (Owner=all; Mgr=assigned) | TEMP-BR-011, CORE-10 |
| SEC-CLI-03 | Salary visibility restricted (HR/Senior Accounts/Owner) | TEMP-BR-012 |
| SEC-CLI-04 | Purchase rates restricted (Procurement/Accounts/Owner) | TEMP-BR-012 |
| SEC-CLI-05 | Profitability reports restricted (Owner + authorized senior mgmt) | TEMP-BR-012 |
| SEC-CLI-06 | No silent deletion of financial records; reverse/void with audit trail | TEMP-BR-005, AUD-01..02 |
| SEC-CLI-07 | Audit trail captures User, Timestamp, Action, Entity, Old, New, Reason | audit-compliance.md |
| SEC-CLI-08 | Approval delegations period-limited | BR-039 |
| SEC-CLI-09 | OTP/2FA for Owner/Admin | [PROPOSED] |
| SEC-CLI-10 | Password complexity + session timeouts + forced logout | [PROPOSED] |

---

## 3. GENERIC SECURITY REQUIREMENTS (41 numbered — SEC-0001..0132; NOT 132)

*Groups (verbatim essence from docs/14-security/security-architecture.md):*

**Auth (SEC-0001..0003):** Email+password (Argon2/bcrypt); magic link; SSO SAML 2.0/OIDC (Enterprise).

**Authorization (SEC-0010..0012):** RBAC; granular module+action; contextual scoping (Farm X manager).

**Tenancy (SEC-0020..0022):** tenant_id auto-filter; RLS defense-in-depth; no inter-tenant sharing.

**API (SEC-0030..0034):** Bearer JWT; RS256+; rate limiting per IP/tenant; strict CORS; OWASP Top 10 validation/sanitization.

**Encryption (SEC-0040..0041):** AES-256 at rest; TLS 1.3 (1.2 fallback, SSL disabled).

**Audit (SEC-0050..0052):** immutable CUD audit; Timestamp/User/Tenant/IP/Action/Resource/Before-After; retention 1yr Pro / 3yr Enterprise (CONFLICT-019 note: reconcile with client 5yr — Q-CONF-28).

**Tokens (SEC-0060..0062):** access 15-60 min; refresh in HttpOnly Secure cookies; session listing + remote revoke.

**Passwords (SEC-0070..0072):** ≥12 chars + complexity; breached-password check (HIBP); 5 attempts → 15 min lockout.

**MFA (SEC-0080..0082):** available all users; TOTP; org admins can enforce mandatory.

**Backup (SEC-0090..0092):** RPO ≤ 1h (WAL); RTO ≤ 4h; geographically separate regions.

**Privacy (SEC-0100..0102):** GDPR-style right-to-erasure/export; cookie consent; enterprise data residency.

**Network (SEC-0110):** IP allowlists.

**Monitoring (SEC-0120..0121):** login history; alert on unrecognized device/location.

**Secrets (SEC-0130..0132):** no secrets in source; vault injection (AWS SM/HashiCorp); DB creds rotate every 30 days.

---

## 4. ROLE REGISTER (reconciled)

**Client actors (18):** Owner, Company Admin, Farm Manager, Farm Supervisor, Farm Worker, Veterinarian, Warehouse Manager, Purchase Manager, Supplier, Sales Manager, Salesperson, Dealer, Shop/Customer, Driver, Accountant, HR Manager, Auditor, System Admin.

**Generic roles (17 — docs/08-user-roles):** Super Admin (not in matrix — CONFLICT-031 note), Org Owner, Company Admin, Farm Manager, Farm Supervisor, Veterinarian, Feed Manager, Inventory Manager, Purchase Manager, Sales Manager, Accountant, HR Manager, Employee/Farm Worker, Driver, Customer (portal), Supplier (portal), Auditor (read-only).

**Permission matrix (16 rows, V/C/E/D/A legend):** full detail in role-definitions.md; scoping asterisks = company/farm assignment. Auditor = read-only everywhere. Customer = own-data V/C. Driver = status V/E.

---

## 5. RESTRICTED DATA MATRIX

| Data | Roles |
|---|---|
| Salaries | HR Manager, Senior Accounts, Owner |
| Purchase rates | Procurement, Accounts, Owner |
| Profitability reports | Owner + authorized senior management |
| Audit trail | Owner, Auditor |
| Farm data | Assigned Farm Manager only |

---

## 6. COMPLIANCE

| Area | Status |
|---|---|
| GST invoicing/returns | OPEN-001 (Q-CONF-04) |
| FSSAI (processing/meat) | OPEN-009 (Q-CONF-12) |
| PCB/environment | OPEN-009 |
| GDPR-style rights (generic platform) | [E] |
| SOC 2 (generic aspiration) | [F] |
| Data residency | [E] (India preferred) |

---

## 7. V2 SECURITY NOTES

- Mobile offline local data encryption [PROPOSED].
- Sync payload integrity: signed/encrypted pushes; device registration + revocation.
- Role-to-scope enforcement server-side (never trust client claims).
- Security tests: OWASP Top 10, SAST/DAST in CI, pen test pre-UAT (qa-requirements.md).

---

*End of security-requirements.md (V2).*