# Database Requirements

## 1. High-Level Entity Relationship Rules
- **[CONFIRMED]** Farms have a one-to-many relationship with Sheds (42 sheds across 8 farms).
- **[CONFIRMED]** Sheds have a one-to-many relationship with Batches (30+ active batches).
- Financial transactions must be strictly tied to specific batches, customers, or general ledgers.

## 2. Data Deletion Strategy
- **[PROPOSED]** **Strict Soft Delete Policy:** No hard deletes are permitted for transactional, inventory, or financial data to meet audit requirements.
- Tables must include `deleted_at`, `deleted_by`, and `is_deleted` flags.

## 3. Storage Technologies
- **Relational (RDBMS):** Core business entities (Farms, Batches, Billing, Finance, Inventory) must use a relational database (e.g., PostgreSQL) to ensure ACID compliance and financial integrity.
- **JSON/NoSQL Document Storage:** 
  - **[PROPOSED]** Configurable product attributes (e.g., specific variations of Country Chicken, Turkey, Duck) and dynamic operational metrics can leverage JSONB columns in PostgreSQL or a secondary document store.

## 4. Migration Strategy (From Excel/Paper)
- **[PROPOSED]** Data sanitization tools must be built to import legacy Excel sheets and manual ledger summaries.
- Opening balances for Inventory and Finance must be established at the cut-over date.
- Historical data (beyond 1 year) may be aggregated rather than imported row-by-row to reduce complexity.
