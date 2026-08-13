# Traceability Matrix

This matrix maps core business processes through system modules, features, and technical components.

| Business Process | Module | Key Features | Database Entity | API Endpoint | UI Component | Report | Test Category |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| **1. Broiler batch management** | 3. Flock/Batch Mgt | Batch Creation, Lifecycle, Closing | `batches`, `flocks` | `/api/v1/batches` | `BatchDashboard` | Batch Performance | E2E, Integration |
| **2. Layer flock management** | 3. Flock/Batch Mgt | Lighting, Pullet to Layer transfer | `flocks`, `shed_transfers` | `/api/v1/flocks/transfer` | `FlockLifecycle` | Hen-Day Production | Integration |
| **3. Egg production & sales** | 10. Egg Mgt, 16. Sales | Daily Collection, Grading, Sales Orders | `egg_collections`, `sales_orders` | `/api/v1/eggs/collection` | `EggCollectionForm` | Daily Egg Output | UI, Unit |
| **4. Hatchery operations** | 11. Hatchery Mgt | Setting, Candling, Hatching | `incubations`, `hatch_records` | `/api/v1/hatchery/setting` | `HatcheryPlanner` | Hatchability Report | Integration |
| **5. Feed management** | 6. Feed Mgt | Feed Indenting, Daily Consumption | `feed_requests`, `feed_consumptions` | `/api/v1/feed/consume` | `FeedConsumptionLog` | FCR Analysis | Unit, E2E |
| **6. Vaccination management** | 9. Health & Vacc | Schedules, Administration Logs | `vaccination_schedules`, `health_logs` | `/api/v1/health/vaccinate` | `VaccinationCalendar`| Vaccination Compliance | Unit, UI |
| **7. Mortality tracking** | 8. Mortality Mgt | Daily Recording, Post-Mortem | `mortality_logs` | `/api/v1/mortality` | `MortalityEntryForm` | Cumulative Mortality | Integration |
| **8. Purchase cycle** | 15. Procurement | PO Generation, GRN | `purchase_orders`, `grns` | `/api/v1/procurement/po` | `POBuilder` | Vendor Performance | E2E |
| **9. Sales cycle** | 16. Sales & Dist | Sales Orders, Dispatch, Invoicing | `sales_orders`, `invoices` | `/api/v1/sales/invoice` | `SalesDashboard` | Revenue by Product | E2E, Integration |
| **10. Batch profitability** | 17. Finance | Batch Costing, AP/AR | `batch_costs`, `ledgers` | `/api/v1/finance/batch-pnl`| `BatchPnLView` | Batch P&L | Unit (Calculations) |
| **11. Inventory management**| 14. Inventory Mgt | Inward/Outward, Stock Transfers | `inventory_transactions` | `/api/v1/inventory/transfer`| `StockTransferForm` | Stock Ledger | Integration |
| **12. Payroll processing** | 18. HR & Payroll | Attendance, Payroll Processing | `attendances`, `payslips` | `/api/v1/hr/payroll` | `PayrollRunner` | Salary Register | E2E |
| **13. Contract farming settlement**| 17. Finance, 2. Farm Mgt| Settlement calc (FCR/Mortality based) | `contract_settlements` | `/api/v1/contracts/settle` | `SettlementCalculator`| Grower Settlement | Unit (Formulas) |
| **14. Feed mill production** | 13. Feed Mill Mgt | Batch Production, Raw Material Intake| `feed_formulas`, `mill_batches` | `/api/v1/mill/production` | `MillControlPanel` | Yield Variance | E2E |
| **15. Farm health inspection**| 9. Health & Vacc | Task Management, Meds Tracking | `inspection_logs` | `/api/v1/health/inspections`| `InspectionChecklist`| Farm Health Status | UI, Integration |
