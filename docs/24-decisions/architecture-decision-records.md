# Architecture Decision Records (ADRs)

## ADR-001: Multi-tenancy approach
**Status**: Accepted
**Context**: The ERP will be sold as a SaaS product to multiple poultry businesses. Data must be strictly isolated, but infrastructure costs and maintenance must remain scalable.
**Options**:
1. **Separate Database per Tenant**: Absolute isolation, easy backup/restore per client. Hard to run cross-tenant schema migrations and expensive to host.
2. **Shared Database, Separate Schema**: Good isolation, single DB instance. Migrations are still complex (running N times).
3. **Shared Database, Shared Schema (Tenant ID)**: Lowest cost, easiest migrations. Requires strict row-level security (RLS) or application-level tenant filtering to prevent data leaks.
**Decision**: Shared Database, Shared Schema (Tenant ID) with PostgreSQL Row-Level Security (RLS).
**Rationale**: Balances cost and maintainability for an early-stage SaaS. RLS provides database-level guarantees against cross-tenant data leaks.
**Consequences**: Every table must have a `tenant_id`. All queries must execute within a tenant context.
**Trade-offs**: Restoring data for a single tenant is harder than restoring a full database.

---

## ADR-002: Primary key strategy
**Status**: Accepted
**Context**: We need a consistent primary key strategy across all tables in a distributed environment (web, mobile, offline sync).
**Options**:
1. **Auto-increment (Serial) Integers**: Fast indexing, human-readable. Breaks during offline sync (ID collisions).
2. **UUIDv4**: Globally unique, completely avoids offline creation collisions. Large index size, fragmented inserts (performance hit).
3. **UUIDv7 (Time-sorted UUID)**: Globally unique, time-ordered, prevents index fragmentation. Less native support in older ORMs.
**Decision**: UUIDv7 for all primary keys.
**Rationale**: We require offline capabilities for farm workers without internet. UUIDv7 allows offline record creation without ID collisions, while maintaining database insert performance (unlike UUIDv4).
**Consequences**: URLs and API endpoints will use UUIDs instead of integers.
**Trade-offs**: Slightly larger storage footprint than integers. Harder for humans to read/memorize IDs over the phone.

---

## ADR-003: Soft delete vs hard delete
**Status**: Accepted
**Context**: Users will delete records (birds, transactions). We need to decide if data is permanently removed or hidden.
**Options**:
1. **Hard Delete (DELETE statement)**: Clean database, respects GDPR right to be forgotten implicitly. Breaks historical reporting if related records (like sales) rely on the deleted entity.
2. **Soft Delete (`deleted_at` timestamp)**: Preserves history, allows "undo", maintains referential integrity for reports. Requires filtering `deleted_at IS NULL` on every query.
**Decision**: Soft Delete for core business entities (Flocks, Users, Transactions); Hard Delete for system logs and bridging/join tables.
**Rationale**: Poultry analytics (FCR, mortality rates) rely heavily on historical integrity. If a flock is deleted, its feed consumption must still reflect in global expense reports.
**Consequences**: Developers must ensure all queries scope out soft-deleted records. Unique constraints become complex (must account for `deleted_at`).
**Trade-offs**: Increased database size over time. Need a separate hard-purge job for compliance (e.g., GDPR).

---

## ADR-004: Audit trail approach
**Status**: Accepted
**Context**: We need to track who changed what, especially for financial and inventory data, for compliance and debugging.
**Options**:
1. **Event Sourcing**: Every change is an immutable event. State is derived. High complexity, over-engineered for basic CRUD screens.
2. **Application-level Audit Table**: Middleware intercepts changes and writes to an `audit_logs` table. Can miss direct DB queries.
3. **Database Triggers (e.g., pgaudit)**: Database handles logging. Guaranteed capture. Harder to parse custom application contexts (like user IP).
**Decision**: Application-level Audit Table using ORM lifecycle hooks.
**Rationale**: Provides good enough tracking (User X changed Field Y from A to B) while keeping the implementation strictly within the application logic, allowing injection of user context.
**Consequences**: Direct DB modifications by admins won't be logged in the app UI. Must ensure all updates pass through the ORM.
**Trade-offs**: Slight performance overhead on write operations.

---

## ADR-005: Batch/Flock as primary entity
**Status**: Accepted
**Context**: Terminology varies across the industry. "Flock" sometimes means a specific house of birds, sometimes a generational lineage. "Batch" is used in hatcheries.
**Options**:
1. Use "Flock" everywhere.
2. Use "Batch" everywhere.
3. Differentiate semantically.
**Decision**: Differentiate semantically: `Flock` for Breeder/Layer birds that have a long lifespan and distinct lineage. `Batch` for Broilers (meat birds) and Hatchery operations representing a single in-out cycle.
**Rationale**: Aligns closely with international poultry science terminology and reduces user confusion across different modules (Broiler vs Breeder).
**Consequences**: UI will dynamically change labels based on the tenant's business type (Broiler farms see "Batches", Egg farms see "Flocks").
**Trade-offs**: Slightly more complex localization and UI logic.

---

## ADR-006: Mobile strategy
**Status**: Accepted
**Context**: Farm supervisors need to enter daily data (mortality, feed) from inside sheds where internet is poor/non-existent.
**Options**:
1. **Responsive Web App**: Fast to build. No true offline support or background sync.
2. **PWA (Progressive Web App)**: Service workers handle offline caching. Limited access to native device storage/bluetooth (for scales).
3. **Native Mobile App (React Native/Flutter)**: Full offline SQLite database, background sync, hardware integration. Slower development.
**Decision**: Native App using React Native / Expo.
**Rationale**: The requirement for robust, days-long offline data entry and sync capabilities is non-negotiable for rural poultry farms. Local SQLite provides reliable offline state.
**Consequences**: Need to maintain a separate mobile codebase alongside the web dashboard.
**Trade-offs**: Increased development and maintenance cost compared to a single PWA.

---

## ADR-007: Authentication approach
**Status**: Accepted
**Context**: Need to authenticate web users, mobile apps, and potentially IoT devices (climate controllers).
**Options**:
1. **Stateful Session Cookies**: Secure against XSS. Hard to use with mobile apps and IoT.
2. **JWT (JSON Web Tokens)**: Stateless, scales well, works seamlessly with mobile/APIs. Hard to invalidate tokens before expiration.
**Decision**: JWT for Mobile/API authentication, with short expirations and long-lived Refresh Tokens.
**Rationale**: The system needs a unified API consumed by web, mobile, and external integrations. JWT provides the flexibility needed.
**Consequences**: Need a Redis/cache layer to handle refresh token blacklisting on logout.
**Trade-offs**: Higher complexity in managing token lifecycles compared to simple sessions.

---

## ADR-008: File storage strategy
**Status**: Accepted
**Context**: Users upload invoices, veterinary reports, and farm photos.
**Options**:
1. **Local File System**: Cheap. Doesn't scale horizontally.
2. **Cloud Object Storage (AWS S3 / Cloudflare R2)**: Infinitely scalable, CDN support. Requires cloud budget.
3. **Database BLOBs**: Keeps data together. Bloats the database terribly.
**Decision**: Cloud Object Storage (S3-compatible API).
**Rationale**: Essential for horizontal scaling of the backend. Allows generating pre-signed URLs to offload bandwidth from the API server.
**Consequences**: Must handle async upload workflows and pre-signed URL generation.
**Trade-offs**: Minor cloud vendor dependency, though mitigated by using standard S3 API (can swap AWS for MinIO/R2).

---

## ADR-009: Reporting approach
**Status**: Accepted
**Context**: Poultry analytics (FCR, EP, Mortality curves) require aggregating millions of daily records across the tenant's history.
**Options**:
1. **Real-time Aggregation**: Simple to implement. Too slow for large datasets.
2. **Materialized Views**: Fast reads. Data is slightly stale; refreshing locks tables.
3. **Event-driven Data Warehouse / Read Replicas**: Separate OLAP database. Extremely fast. High infrastructure cost.
**Decision**: Materialized Views refreshed via background jobs for historical data, combined with real-time queries for current active batches.
**Rationale**: The SaaS will be read-heavy for dashboards. Most historical batch data is immutable once closed.
**Consequences**: Users may see up to a 1-hour delay in overarching historical reports, but real-time data for today's active flocks is immediate.
**Trade-offs**: Increased complexity in query routing (stale vs fresh data).

---

## ADR-010: Currency/unit handling
**Status**: Accepted
**Context**: We expect customers in various countries. Poultry metrics rely heavily on weight (kg vs lbs) and currency.
**Options**:
1. **Store native units, convert on fly**: Hard to aggregate data globally.
2. **Store normalized units (Metric + USD), convert on UI**: Database is uniform. Floating point inaccuracies during conversion.
**Decision**: Store all weights in Metric (Grams/Kilograms) and all monetary values in minor currency units (e.g., cents, paise) natively in the database. 
**Rationale**: Storing integers (minor units) avoids floating-point math errors in financial calculations. Metric standardizes scientific formulas.
**Consequences**: The frontend must ALWAYS handle conversion and formatting based on tenant preferences.
**Trade-offs**: Developers must never forget to divide/multiply by 100 on the frontend.

---

## ADR-011: Offline sync strategy
**Status**: Accepted
**Context**: Resolving conflicts when a mobile user edits a record offline, but someone else edited it online.
**Options**:
1. **Last Write Wins (LWW)**: Simple, based on timestamp. Can overwrite important data silently.
2. **Conflict-Free Replicated Data Types (CRDT)**: Mathematical resolution. Very complex to implement for relational data.
3. **Version Vectors / Revision IDs**: App detects conflict and asks user to resolve.
**Decision**: Last Write Wins (LWW) for daily metrics (feed, mortality); Server Authority for financial/inventory transactions.
**Rationale**: Daily farm data is mostly append-only or corrected by a single supervisor. Financial data (inventory ledgers) cannot be merged blindly and must be validated by the server.
**Consequences**: Mobile app requires an inbox queue for failed inventory syncs to notify the user.
**Trade-offs**: Some edge cases in daily logs might overwrite data, but it fits the 99% use case of rural connectivity.

---

## ADR-012: Notification delivery architecture
**Status**: Accepted
**Context**: System needs to alert users of threshold breaches (e.g., mortality > 2%), PO approvals, and task reminders.
**Options**:
1. **Synchronous Email/SMS on action**: Slows down HTTP requests.
2. **Asynchronous Message Queue (RabbitMQ/Redis/Kafka)**: Fast HTTP response. Reliable delivery.
**Decision**: Asynchronous Queue via Redis (e.g., BullMQ) with generic worker processors.
**Rationale**: External APIs (SendGrid, Twilio) can latency-spike or fail. Background queues ensure the user doesn't wait, and failed notifications can be retried automatically.
**Consequences**: Requires running a separate worker service alongside the web API.
**Trade-offs**: Increased infrastructure complexity; slightly delayed notification delivery (usually milliseconds, but asynchronous).
