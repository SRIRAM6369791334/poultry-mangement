# Database Domain Model & Architecture

## 1. Schema Organization
- `public` / `core`: Global configurations, Organizations, Users
- `master`: Shared master data (Breeds, Units, Currencies)
- `transaction`: Active transactional records
- `audit`: Audit logs and history tables
- `finance`: Accounting and billing ledgers

## 2. Naming Conventions
- Tables: `snake_case`, plural (e.g., `users`, `batches`)
- Columns: `snake_case` (e.g., `tenant_id`, `created_at`)
- Primary Keys: `id` (UUID)
- Foreign Keys: `table_singular_name_id` (e.g., `farm_id`)

## 3. Common Columns
Every table MUST have:
- `id` (UUID, primary key)
- `tenant_id` (UUID, foreign key to organizations, indexed)
- `created_at` (Timestamp with time zone)
- `updated_at` (Timestamp with time zone)
- `deleted_at` (Timestamp with time zone, nullable, for soft deletes)
- `created_by` (UUID)
- `updated_by` (UUID)

## 4. Primary Key Strategy
- UUID v4 for all master and transactional entities.
- Sequential UUIDs or BIGSERIAL for high-volume logs/audit tables if insert performance is an issue.

## 5. Multi-Tenant Data Isolation
- **Pool Model**: All tenants share the same database and schemas.
- **Isolation Enforcement**: Row Level Security (RLS) in PostgreSQL using `tenant_id`. Every query is automatically scoped to the active tenant's context.

## 6. Soft Delete Strategy
- `deleted_at` column on all Master Data and key Transaction records.
- Views created over tables to filter out `deleted_at IS NOT NULL`.
- Foreign key constraints will still enforce referential integrity; soft-deleted records are kept for historical context.

## 7. Audit Trail Approach
- Application-level interceptors to log changes into `audit_logs` table (Tracking `entity_name`, `entity_id`, `action`, `old_value`, `new_value`, `timestamp`, `user_id`).

## 8. History Table Approach
- Crucial entities (like `batches`, `feed_formulas`) will use temporal tables or specific history tables (`batch_history`) to track state changes over time.

## 9. Reporting / Denormalization
- Materialized views for complex aggregations (e.g., `daily_farm_performance_mv`).
- Refreshed asynchronously (cron or event-driven).

## 10. Indexing Strategy
- B-Tree indexes on all foreign keys (specifically `tenant_id`).
- Composite indexes for common queries (e.g., `tenant_id, farm_id`).
- Partial indexes for soft-deleted tables (`WHERE deleted_at IS NULL`).

## 11. Partitioning Considerations
- Partition high-volume tables (like `daily_mortality`, `audit_logs`) by date (e.g., monthly partitions) to improve query performance and manage archival.

## 12. Data Archival
- Archiving job moves data older than 5 years (configurable) to cold storage or archived tables.
