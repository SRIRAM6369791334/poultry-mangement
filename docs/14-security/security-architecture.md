# Security Architecture

## Security Requirements

### 1. Authentication
*   **SEC-0001**: System MUST support Email and Password authentication using strong password hashing (e.g., Argon2 or bcrypt).
*   **SEC-0002**: System MUST support Magic Link authentication for passwordless login.
*   **SEC-0003**: System MUST support Enterprise SSO (SAML 2.0 / OpenID Connect) for Enterprise Tier tenants.
*   **SEC-0004**: Social OAuth (Google, Microsoft) MAY be supported for easier onboarding.

### 2. Authorization
*   **SEC-0010**: System MUST implement Role-Based Access Control (RBAC).
*   **SEC-0011**: Permissions MUST be granular down to the Module and Action level (View, Create, Edit, Delete, Approve).
*   **SEC-0012**: Authorization MUST support contextual scoping (e.g., User A is Farm Manager for Farm X only).

### 3. Tenant Isolation
*   **SEC-0020**: All database queries MUST automatically apply a `tenant_id` filter.
*   **SEC-0021**: The database engine MUST implement Row-Level Security (RLS) to enforce `tenant_id` isolation, providing a defense-in-depth layer below the application ORM.
*   **SEC-0022**: Inter-tenant data sharing is STRICTLY PROHIBITED unless explicitly designed for platform-level analytics (anonymized).

### 4. API Security
*   **SEC-0030**: API authentication MUST use JSON Web Tokens (JWT) passed in the `Authorization: Bearer` header.
*   **SEC-0031**: JWTs MUST be signed using RS256 or stronger asymmetric algorithms.
*   **SEC-0032**: System MUST implement API rate limiting per IP and per tenant to prevent DoS attacks.
*   **SEC-0033**: CORS MUST be strictly configured to allow only trusted origins (the SaaS frontend domains).
*   **SEC-0034**: All API inputs MUST be rigorously validated and sanitized to prevent SQL Injection and XSS (OWASP Top 10).

### 5. Data Encryption
*   **SEC-0040**: All data at rest MUST be encrypted using AES-256.
*   **SEC-0041**: All data in transit MUST be encrypted using TLS 1.3 (fallback to TLS 1.2 allowed for older clients, SSL disabled).

### 6. Audit Logging
*   **SEC-0050**: System MUST maintain an immutable audit log of all create, update, and delete operations.
*   **SEC-0051**: Audit logs MUST capture: Timestamp, User ID, Tenant ID, IP Address, Action, Resource Type, Resource ID, and Before/After state diffs.
*   **SEC-0052**: Audit logs MUST be retained for a minimum of 1 year for Pro tier and 3 years for Enterprise tier.

### 7. Session Management
*   **SEC-0060**: Access tokens MUST have a short lifespan (e.g., 15-60 minutes).
*   **SEC-0061**: Refresh tokens MUST be used to obtain new access tokens and MUST be stored securely (e.g., HttpOnly, Secure cookies).
*   **SEC-0062**: Users MUST be able to view active sessions and revoke devices remotely.

### 8. Password Policies
*   **SEC-0070**: Passwords MUST be at least 12 characters long and require complexity (uppercase, lowercase, number, symbol).
*   **SEC-0071**: Passwords MUST be checked against known breached password databases (e.g., HaveIBeenPwned API) during setup.
*   **SEC-0072**: Maximum of 5 failed login attempts before account lockout for 15 minutes.

### 9. 2FA/MFA
*   **SEC-0080**: Multi-Factor Authentication (MFA) MUST be available for all users.
*   **SEC-0081**: MFA MUST support TOTP (Authenticator apps).
*   **SEC-0082**: Organization Admins MUST be able to enforce mandatory MFA for all users in their tenant.

### 10. Backup & DR
*   **SEC-0090**: Recovery Point Objective (RPO) MUST be <= 1 hour (via continuous WAL archiving).
*   **SEC-0091**: Recovery Time Objective (RTO) MUST be <= 4 hours for platform-wide restoration.
*   **SEC-0092**: Backups MUST be stored in geographically separate regions from the primary database.

### 11. Compliance
*   **SEC-0100**: System MUST provide GDPR compliance features (Right to be Forgotten, Data Export).
*   **SEC-0101**: Privacy policies and cookie consent MUST be presented upon first login.
*   **SEC-0102**: Enterprise tier MUST support specific Data Residency requirements (e.g., hosting in EU vs US data centers).

### 12. IP Restrictions
*   **SEC-0110**: System MUST allow Organization Admins to configure IP Allowlists for user logins (e.g., restricting access to office network IPs only).

### 13. Login History
*   **SEC-0120**: System MUST track and display login history to users (IP, Device, Location derived from GeoIP, timestamp).
*   **SEC-0121**: System SHOULD alert users upon login from a new, unrecognized device or location.

### 14. Secrets Management
*   **SEC-0130**: Application secrets (API keys, DB credentials) MUST NOT be stored in source code.
*   **SEC-0131**: Secrets MUST be injected at runtime using a secure vault (e.g., AWS Secrets Manager, HashiCorp Vault).
*   **SEC-0132**: Database credentials SHOULD be rotated automatically every 30 days.
