# Consolidated feature-discovery.md



## From Chunk 1


# Feature Discovery

| ID | Feature Name | Description | Source Lines | Status |
|---|---|---|---|---|
| TEMP-FEAT-001 | Farm & Shed Management | Create and manage farms, sheds, and capacity. | CLIENT-CONV-L173 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-002 | Batch Management | Track lifecycle of a batch from placement to harvest. | CLIENT-CONV-L187-L203 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-003 | Daily Farm Entry Form | Record mortality, culling, feed, water, environment daily. | CLIENT-CONV-L207-L224 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-004 | Feed Inventory Management | Manage feed purchase, warehouse stock, farm requests, issues, returns. | CLIENT-CONV-L260-L290 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-005 | Weight Tracking | Record weekly sample weights and compare to target growth. | CLIENT-CONV-L318-L334 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-006 | Health & Medication Log | Record vet diagnoses, treatments, medicines, and vaccinations. | CLIENT-CONV-L336-L353 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-007 | Harvest & Sales Module | Manage harvest planning, catching, weighment, and sales invoicing. | CLIENT-CONV-L370-L393 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-008 | Dealer Credit Management | Track dealer outstanding, payment history, and enforce credit limits. | CLIENT-CONV-L411-L429 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-009 | Multi-Warehouse Stock Transfer | System for requesting and transferring stock between warehouses/farms. | CLIENT-CONV-L488-L506 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-010 | Employee HR & Payroll System | Manage attendance (biometric/mobile), leave, advances, and payroll calculation. | CLIENT-CONV-L562-L617 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-011 | Vehicle Trip Management | Track vehicle trips, diesel, maintenance, and apportion expenses. | CLIENT-CONV-L618-L640 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-012 | Finance & Profitability Module | Track income, expenses, AP/AR, and compute batch-wise P&L. | CLIENT-CONV-L641-L685 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-013 | Management Dashboard | Owner dashboard with real-time KPIs across all operations. | CLIENT-CONV-L687-L713 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-014 | Mobile Offline App | Android app with simple Tamil UI for farm workers, supporting offline mode & sync. | CLIENT-CONV-L814-L846 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-015 | Egg Sales Management | Manage egg collection from own farms and external purchase to warehouse sales. | CLIENT-CONV-L975-L1000 | [CLIENT-CONFIRMED] |

## From Chunk 2


# Feature Discovery - Chunk 2

| Feature ID | Feature Name | Description | Status |
|---|---|---|---|
| TEMP-FEAT-001 | Dynamic Grade & Unit Configuration | Allow admin to configure egg grades, bird types, and unit conversions without code changes. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-002 | Grade-Wise Inventory Tracking | Track eggs based on grade and quality across multiple locations. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-003 | Price List & Rate History | Manage daily rate changes per customer/grade and maintain historical logs. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-004 | Customer Ledger | Manage customer accounts, advances, partial payments, and outstanding balances. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-005 | Vehicle & Trip Management | Track delivery vehicles, driver assignments, route, and fuel usage. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-006 | Source-Based Costing | Differentiate own production vs purchased items to calculate accurate profit margins. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-007 | Live Processing Weight Reconciliation | Track Live weight -> Processing loss -> By-products -> Saleable weight. Alert on mismatch. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-008 | Processing Variance Handling | Logic to handle overweight vs underweight deliveries vs customer requests. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-009 | Wastage Workflow | Track detailed loss/wastage categories and enforce an approval hierarchy for adjustments. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-010 | Multi-Bird Order Fulfillment | Ability to split a bulk weight order across multiple processed birds. | [CLIENT-CONFIRMED] |

## From Chunk 3


# Feature Discovery - Chunk 3

| Feature ID | Source Lines | Feature Name | Description | Status |
|---|---|---|---|---|
| TEMP-FEAT-001 | CLIENT-CONV-L2005-L2007 | Custom Order Instructions | Ability to capture and pass custom text instructions to processing/packing. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-002 | CLIENT-CONV-L2023-L2031 | Advanced Label Generation | Generating labels with product, weights, batches, dates, and order info. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-003 | CLIENT-CONV-L2037-L2052 | 1-to-N Inventory Split | System support for converting one input bird into multiple inventory output products. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-004 | CLIENT-CONV-L2191-L2202 | Selling Type Config | Order creation must support selecting exact processing types (Live, Whole, Cut, Boneless). | [CLIENT-CONFIRMED] |
| TEMP-FEAT-005 | CLIENT-CONV-L2267-L2274 | Weight Mismatch Handling | UI to record decisions on excess/short yields (Accept, Reallocate, By-product, Waste). | [CLIENT-CONFIRMED] |
| TEMP-FEAT-006 | CLIENT-CONV-L2308-L2328 | Customer-Specific Pricing | Price matrix based on customer tiers (Retail, Hotel, Dealer, Wholesale). | [CLIENT-CONFIRMED] |
| TEMP-FEAT-007 | CLIENT-CONV-L2586-L2597 | Recurring Orders | Templates to auto-generate orders for specific days of the week for regular clients. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-008 | CLIENT-CONV-L2605-L2610 | Order Cut-off Engine | Logic to assign delivery slots based on time of order entry. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-009 | CLIENT-CONV-L2666-L2674 | E-Proof of Delivery | Driver app capability to capture signature, photo, GPS, and actual delivered weight. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-010 | CLIENT-CONV-L2833-L2855 | Processing Queue Kanban | Visual queue for processing team (Pending, Assigned, Processing, QC, Packed). | [CLIENT-CONFIRMED] |
| TEMP-FEAT-011 | CLIENT-CONV-L2858-L2885 | Staff Productivity Tracking | Tracking start/end times per worker per order to analyze processing time. | [CLIENT-CONFIRMED] |
| TEMP-FEAT-012 | CLIENT-CONV-L2967-L2985 | Reverse Traceability Tree | Visual tree tracking from customer invoice back to farm production data. | [CLIENT-CONFIRMED] |

## From Chunk 4


# Feature Discovery

| Feature ID | Description | Source Lines | Status |
|---|---|---|---|
| TEMP-FEAT-001 | Customer feedback tracking for quality, delivery, and service. | 3019-3029 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-002 | Automated finance updates on refunds and credit note adjustments. | 3030-3053 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-003 | Physical stock vs System stock auditing module. | 3095-3104 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-004 | Configurable multi-level Approval Matrix for different transaction types. | 3129-3145 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-005 | Temporary Approval Delegation system. | 3146-3151 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-006 | Centralized Capacity Planning Module (Farm, Processing, Fleet, Staff). | 3197-3224 | [FUTURE] |
| TEMP-FEAT-007 | Cost Center management and allocation. | 3225-3237 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-008 | Granular end-to-end trace history for every transaction. | 3296-3348 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-009 | Multi-year historical data visualization and seasonal trend analysis. | 3404-3448 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-010 | Stock categorization (Fast, Slow, Non-moving, Dead) with automated alerts. | 3532-3562 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-011 | What-If Scenario Planning Tool for business simulation. | 3868-3891 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-012 | Morning Opening Executive Dashboard (Yesterday, Today, Upcoming). | 3915-3934 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-013 | Farm and Shed Performance Comparison tool. | 3953-3981 | [CLIENT-CONFIRMED] |
| TEMP-FEAT-014 | Batch splitting and partial transfer capabilities. | 3982-4000 | [CLIENT-CONFIRMED] |

## From Chunk 5


# Feature Discovery - Chunk 5

* **TEMP-FEAT-05-001**: **Batch Operations History** - Ability to track and maintain history of batch split, merge, transfer, and reallocation. [CLIENT-CONFIRMED] (Lines 4001-4020)
* **TEMP-FEAT-05-002**: **Partial Payment Tracking** - System capability to manage multiple partial payments against a single invoice with date, method, and reference tracking. [CLIENT-CONFIRMED] (Lines 4072-4083)
* **TEMP-FEAT-05-003**: **Supplier Price & Performance Tracker** - Ability to compare historical prices from suppliers and evaluate performance based on quality, delivery time, and reliability. [CLIENT-CONFIRMED] (Lines 4124-4158)
* **TEMP-FEAT-05-004**: **Price Anomaly Detection** - Alerts for significantly high purchase rates or low sales rates compared to historical averages. [CLIENT-CONFIRMED] (Lines 4159-4177)
* **TEMP-FEAT-05-005**: **Customer-Specific Configurator** - Ability to set product restrictions and permanent processing instructions per customer. [CLIENT-CONFIRMED] (Lines 4205-4234)
* **TEMP-FEAT-05-006**: **Order Feasibility Engine** - Calculates if an order can be fulfilled based on stock, production, processing capacity, delivery capability, and credit limit. [CLIENT-CONFIRMED] (Lines 4361-4390)
* **TEMP-FEAT-05-007**: **Multi-Warehouse Stock Visibility** - Dashboard showing stock levels across multiple warehouses, farms, processing areas, and reserved quantities. [CLIENT-CONFIRMED] (Lines 4456-4467)
* **TEMP-FEAT-05-008**: **Advanced Costing Module** - Flexible costing methods that allocate transport, handling, processing, packaging, and wastage to the product cost. [CLIENT-CONFIRMED] (Lines 4468-4510)
* **TEMP-FEAT-05-009**: **End-to-End Traceability System** - Forward and reverse traceability tracking from Customer -> Invoice -> Order -> Product -> Processing Batch -> Farm Batch, including recall management. [CLIENT-CONFIRMED] (Lines 4713-4752)
* **TEMP-FEAT-05-010**: **Complaint Management System** - Logs complaints with severity, SLA, root cause, and trends tracking to detect recurring issues. [CLIENT-CONFIRMED] (Lines 4759-4798)
* **TEMP-FEAT-05-011**: **Driver Settlement Module** - Workflow for drivers to reconcile cash collected, expenses, and fuel usage post-trip. [CLIENT-CONFIRMED] (Lines 4911-4925)
* **TEMP-FEAT-05-012**: **Business Health Score** - A unified KPI dashboard calculating an overall business health score based on production, sales, inventory, finance, etc. [FUTURE] (Lines 4579-4596)
