# DATABASE CATALOG (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Canonical entity list reconciling the client register (64) and generic catalog (73). No DDL invented — field conventions from source only.

---

## 1. ENTITY COUNTS (reconciliation — CONFLICT-008)

| Source | Count | Notes |
|---|---|---|
| requirements/00-source/entity-register.md | 64 | canonical client entities |
| docs/09-database/entity-catalog.md | 73 | 23 master + 13 detailed tx + 19 listed tx + 5 history + 6 config + 7 auth |
| V2 canonical | 64 core (client) + 9 generic-only additions | union below |

---

## 2. CORE ENTITY LIST (64 — client register, verbatim names)

Master/Setup: Company, Warehouse, Farm, Shed, Species, Breed, BirdType, Product, ProductForm, UnitOfMeasure, Grade, PriceList, PriceListItem, Customer, CustomerCategory, Dealer, Shop, Supplier, SupplierCategory, Employee, Designation, Department, Vehicle, Route, DiseaseCatalog, Medicine, Vaccine, FeedType, EggGrade, PaymentTerm, BankAccount, CostCenter, TaxConfig, Location, Equipment.

Operations: FarmingBatch, BatchPlacement, DailyMortality, DailyCulling, DailyFeedConsumption, WeightRecord, EnvironmentLog, VaccinationRecord, MedicationRecord, HealthIncident, ProcessingBatch, ProcessingRun, ProcessingLossEntry, ByProductEntry, YieldRecord, QualityCheck, EggCollection, EggGrading, StockMovement, StockAdjustment, PhysicalCount, PurchaseOrder, PurchaseOrderItem, GRN, GRNItem, SupplierInvoice, DebitNote, SalesOrder, SalesOrderItem, SalesInvoice, InvoiceLine, CreditNote, Payment, Receipt, DeliveryTrip, TripStop, DriverSettlement, DeliveryProof, Complaint, RecallRecord, ApprovalRequest, ApprovalDelegation, AuditLog, User, Role, Permission, UserRole, Attendance, SalaryRecord, Advance, ExpenseClaim, NotificationLog, SyncQueue, DashboardPref, ReportSchedule.

*(Exact field lists live in entity-register.md; this catalog defines canonical names and relationships only.)*

---

## 3. GENERIC-ONLY ENTITIES (9 additional — docs/09-database)

TenantConfig, SubscriptionPlan, FeatureFlag, NotificationTemplate, ReportTemplate, AlertRule, FinancialPeriod, BatchHistory, StockHistory, PriceHistory, UserSession, LoginHistory, RolePermission, FeedFormula, FeedFormulaIngredient, IncubationBatch, CandlingRecord, HatchRecord, ChickDispatch.

---

## 4. KEY RELATIONSHIPS (verbatim from PDF + docs)

| Parent | Child | Cardinality |
|---|---|---|
| Farm | Shed | 1:N (42 sheds across 8 farms) |
| Shed | Batch/Flock | 1:N (30+ active) |
| Batch | VaccinationSchedule | 1:N |
| Batch | BatchWeightLog | 1:N |
| Warehouse/Farm | FarmEnvironmentLog | 1:N |
| Warehouse | StockLedger | 1:N |
| Batch | DailyMortality | 1:N (unique batch+date) |
| PurchaseOrder | PurchaseOrderItem → GoodsReceiptNote → GRNItem | 1:N chain |
| Vehicle | DeliveryTrip | 1:N |
| DeliveryTrip | TripStop | 1:N |
| Vehicle | VehicleExpense | 1:N |
| CashBank Ledger | Bank Reconciliation | 1:N |
| Customer/Dealer | SalesOrder → SalesInvoice → Payment | 1:N chain |
| ProcessingBatch | YieldRecord / LossEntry / ByProductEntry | 1:N |
| Employee | Attendance, SalaryRecord, Advance | 1:N |

---

## 5. FIELD & DESIGN CONVENTIONS (from docs/09-database + requirements/13-technical)

- **Common columns:** `id`, `tenant_id`/`company_id` [FUTURE], `created_at`, `updated_at`, `deleted_at` (+`deleted_by`), audit fields.
- **Soft delete:** core business entities (Flock/Batch, Users, Transactions); hard delete for system logs and join tables (ADR-003).
- **PK strategy:** UUIDv7 recommended (CONFLICT-018; ADR-002) — supersedes domain-model's UUIDv4 mention.
- **Money:** minor currency units (paise) natively (ADR-010); weights metric grams/kg.
- **JSONB** for configurable attributes (species config, custom cuts, dynamic units).
- **Audit:** application-level audit table via ORM hooks (ADR-004); immutable append-only for financial/inventory; no silent deletes (reversal/void with reason).
- **History:** BatchHistory, StockHistory, PriceHistory; materialized views for historical reports (ADR-009).
- **Uniqueness:** (tenant_id, batch_number); (batch_id, record_date) for daily entries; (tenant_id, subdomain) for org.
- **Indexing:** daily-entry tables by (batch_id, date); stock movements by (item, warehouse, date); partitioning for time-series.

---

## 6. DATA RULES (critical)

1. **EOD roll-forward** (BR-CAL-101): Opening Tomorrow = Opening Today − Mortality − Culls − Sales.
2. **Weight reconciliation** must balance before processing batch close (CORE-02).
3. **Feed stock never negative** (CORE-04); feed type phase validation (VR-013).
4. **Medicine usage tied to inventory** (CORE-05); expiry ≥ use date (VR-046).
5. **FIFO** feed/eggs; **FEFO** medicine/vaccines.
6. **Expected Closing = Opening + Purchase + Production + Returns + In − Sales − Processing − Death − Damage − Wastage − Out** (F-015); variance reports; adjustments with reason+approval+audit (BR-037).
7. **Farm-level RLS-style isolation** at app+API level (SEC-REQ-01).
8. **Migration:** cleanup → duplicate removal → field mapping → validation → import → verification; opening balances; >1yr history aggregated.

---

## 7. STORAGE/ARCHIVAL (CONFLICT-020 note)

- Production data > 3 years → cold storage, queryable via async reporting (NFR-7001 adopted).
- Backups: 30d daily / 1yr weekly / yearly indefinite (NFR-4003).

---

*End of database-catalog.md (V2).*