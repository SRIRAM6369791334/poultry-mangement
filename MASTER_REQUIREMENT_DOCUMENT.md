# MASTER BUSINESS REQUIREMENT DOCUMENT (BRD)
# Sri Murugan Poultry & Agro Group

Compiled Date: 2026-08-13



=============================================================

# MODULE: 00-master


=============================================================




---


# Phase 6: Cross-Domain Review and Consistency Synthesis

## 1. Terminology Consistency Check
To ensure unified understanding across all modules and technical teams, the following terms are standardized:

| Term | Context | Standard Definition | Rejected / Ambiguous Terms |
|------|---------|---------------------|----------------------------|
| **Farming Batch** | Farm Operations | A specific group of day-old chicks placed in a specific shed on a specific date. Tracked from day 1 to culling/lifting. | Flock, Lot |
| **Processing Batch** | Meat Processing | A group of live birds lifted from a farm and processed together. Mapped to 1 or more Farming Batches. | Processing Lot |
| **Yield** | Processing / Inventory | The usable meat output obtained after dressing the live birds. Expressed as a percentage of live weight. | Meat Recovery |
| **Loss** | Transport / Processing | Unusable reduction in weight (e.g., Transit loss due to shrinkage or mortality). | Wastage (Ambiguous) |
| **By-product** | Processing | Usable/Saleable non-meat outputs (e.g., feathers, offal) resulting from processing. | Waste (Ambiguous) |

## 2. Duplicate Entity Check
Analysis of entity relationships across domains revealed potential duplications that must be unified:
- **Customers:** "Egg Customers" and "Meat Customers" are merged into a unified **Customer Master**. Differentiation is handled via Customer Types and associated Price Lists.
- **Warehouses:** "Feed Warehouse", "Egg Warehouse", and "Meat Cold Storage" are merged into a unified **Warehouse/Location Master**. Separation is managed by Location Types and Zones with specific storage constraints (e.g., temperature control for meat).
- **Vehicles/Drivers:** Live bird transport, processed meat transport, and feed transport vehicles share the **Fleet Master**.

## 3. Business Rule Consistency
Cross-referencing rules across modules to ensure no logical conflicts:
- **Rule Conflict Resolution: "Live vs. Processed Transit Loss"**
  - *Processing Domain Rule:* For processed meat, the Company bears transit loss. For live birds, the Customer bears transit loss.
  - *Pricing/Finance Alignment:* The Pricing Engine must apply different billing formulas. Live bird billing is calculated at dispatch weight. Processed meat billing is calculated at delivered weight (or adjusted via credit notes).
- **Rule Conflict Resolution: "Batch Costing vs. Inventory Valuation"**
  - *Farm Domain:* Consumes feed/medicine, assigning cost to the Farming Batch.
  - *Finance Alignment:* When live birds are transferred to processing, the Farming Batch's accumulated cost per kg must become the raw material input cost for the Processing Batch to calculate accurate gross margins.

## 4. Integration Points & Data Flow
The system operates as a continuous flow. The critical integration pathways are:
- **Procurement → Inventory:** Feed/Medicine purchase (Purchase Module) updates stock (Inventory) and posts accounts payable (Finance).
- **Inventory → Farm Operations:** Issuing feed to sheds (Inventory) decreases stock and increases accumulated costs of the active Farming Batch (Farm Operations).
- **Farm Operations → Processing:** Lifting live birds closes or reduces the Farming Batch (Farm) and initiates a Processing Batch (Processing).
- **Processing → Inventory:** Yield and by-products from processing are entered into finished goods stock (Inventory).
- **Inventory → Sales → Finance:** Dispatches decrease stock (Inventory), generate invoices based on live/processed rules (Sales/Pricing Engine), and post accounts receivable (Finance).
- **All Domains → Intelligence:** Every transaction feeds into the Real-Time Dashboard and Demand Forecasting (Intelligence) to predict future feed requirements and meat availability.

=============================================================

# MODULE: 00-source


=============================================================




---


# Actor Register

This document identifies all actors (users and system roles) that interact with the system.

| Actor | Role / Persona | Access Scope | Key Actions | Devices | Source IDs |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Owner** | Mr. Sri Murugan (Executive) | Global (All Farms, All Data) | View dashboards, approve >₹50K, monitor profitability | Web, Mobile | CLIENT-028, 030 |
| **Management** | Senior Leadership | Global | Strategic planning, view reports, demand forecasting | Web, Mobile | CLIENT-170 |
| **Company Admin** | IT / SysAdmin | Global | Configure system, manage users, set approval rules | Web | CLIENT-036 |
| **Farm Manager** | Operational Manager | Specific Farm(s) | Approve <₹10K, manage batches, monitor FCR | Web, Mobile | CLIENT-006, 030 |
| **Farm Supervisor** | Floor Supervisor | Specific Farm(s) | Verify daily data, request feed/medicines | Mobile, Web | CLIENT-006 |
| **Farm Worker** | Ground Staff | Specific Shed(s) | Simple daily entry (mortality, feed, weight, eggs) | Mobile (Offline cap) | CLIENT-033, 034 |
| **Warehouse Manager** | Inventory Controller | Specific Warehouse(s) | GRN entry, stock audits, dispatch management | Web, Mobile | CLIENT-018 |
| **Warehouse Staff** | Inventory Handler | Specific Warehouse(s) | Picking, packing, loading vehicles | Mobile | CLIENT-018 |
| **Purchase Staff** | Procurement | Global | Create POs, manage suppliers, track market rates | Web | CLIENT-020 |
| **Sales Staff** | Order Management | Global | Enter orders, manage rate contracts, track outstandings | Web, Mobile | CLIENT-015, 128 |
| **Processing Staff** | Meat Processor | Processing Unit | Log input weight, log yield/waste/by-products | Mobile, Web | CLIENT-075 |
| **QC Staff** | Quality Control | Global | Inspect meat/eggs, handle returns/damages | Mobile | CLIENT-128 |
| **Accountant** | Financial Controller | Global | Reconcile invoices, manage payments, payroll | Web | CLIENT-026 |
| **HR Manager** | Human Resources | Global | Attendance, leaves, salary structure | Web | CLIENT-022 |
| **Driver** | Transport | Specific Vehicle | View route, capture delivery proof | Mobile | CLIENT-025, 128 |
| **Dealer** | External Partner B2B | Own Data Only | Place orders, view outstanding, make payments | Mobile (Portal) | CLIENT-015 |
| **Customer** | External Buyer B2B/B2C| Own Data Only | Place orders, track delivery, raise complaints | Mobile (Portal) | CLIENT-016 |
| **Veterinarian** | Health Consultant | Global / Advisory | Recommend medicine, audit mortality, prescribe vaccines | Web, Mobile | CLIENT-006 |


---


# Business Facts

This document lists all canonical business facts extracted from client answers.

## Company Profile
* **Company Name:** Sri Murugan Poultry & Agro Group [CONFIRMED] (CLIENT-001)
* **Age:** 12 years in business [CONFIRMED] (CLIENT-001)
* **Main Business:** Broiler farming [CONFIRMED] (CLIENT-002)
* **Additional Operations:** Chick purchase, feed purchase/distribution, medicine, equipment, bird sales (dealer + direct), egg business, transportation, warehouse ops [CONFIRMED] (CLIENT-003)
* **Future Scope:** Layer, Breeder, Hatchery, Feed Mill, expansion to 15-20 farms [FUTURE] (CLIENT-036)

## Scale & Infrastructure
* **Warehouses:** 2 [CONFIRMED] (CLIENT-004)
* **Farms:** 8 [CONFIRMED] (CLIENT-004)
* **Sheds:** 42 [CONFIRMED] (CLIENT-004)
* **Active Batches:** 30+ [CONFIRMED] (CLIENT-004)
* **Employees:** 85 [CONFIRMED] (CLIENT-022)
* **Vehicles:** 18 [CONFIRMED] (CLIENT-025)
* **Dealers:** 45 [CONFIRMED] (CLIENT-015)
* **Shops/Customers:** 120+ [CONFIRMED] (CLIENT-016)

## Current Pain Points & Problems
* Data is scattered across 12+ different places (Paper registers, Excel, WhatsApp, separate billing software) [CONFIRMED] (CLIENT-005)
* Manual duplicate entry (done up to 3x) leading to data mistakes [CONFIRMED] (CLIENT-005)
* Delayed information and stock mismatches [CONFIRMED] (CLIENT-005)
* Unknown batch costs and unknown overall batch profitability [CONFIRMED] (CLIENT-026)
* Manual attendance tracking [CONFIRMED] (CLIENT-022)
* Dealer balances are unknown or hard to track [CONFIRMED] (CLIENT-027)
* Vehicle operational costs are unknown [CONFIRMED] (CLIENT-025)
* Report generation is very slow [CONFIRMED] (CLIENT-028)

## Products & Sales
* **Products:** Chicken (broiler), Country Chicken/Naatu Kozhi, Quail/Kadai, Duck, Turkey, Eggs [CONFIRMED] (CLIENT-075, CLIENT-045)
* **Product Forms:** Live, Whole Cleaned, Curry Cut, Skinless, Boneless, Breast, Leg, Wings, Custom Cut [CONFIRMED] (CLIENT-076)
* **Sales Types:** Live bird sale, Processed/cleaned meat sale [CONFIRMED] (CLIENT-077)
* **Egg Units:** Piece, Tray, Carton, Crate, Box (all must be configurable) [CONFIRMED] (CLIENT-046)
* **Payment Modes:** Cash, UPI, Bank, Credit [CONFIRMED] (CLIENT-128)

## Operational Rules
* **Languages:** Tamil (primary), English [CONFIRMED] (CLIENT-038)
* **Approval Matrix:** Amount-based threshold:
  * < ₹10K: Manager [CONFIRMED] (CLIENT-030)
  * ₹10K - ₹50K: Admin [CONFIRMED] (CLIENT-030)
  * > ₹50K: Owner [CONFIRMED] (CLIENT-030)


---


# Client Answer Index

This document indexes all client answers (CLIENT-001 through CLIENT-220) obtained during the requirement gathering phase.

| Source ID | Topic | Summary | Domain | Related Entities | Classification |
| :--- | :--- | :--- | :--- | :--- | :--- |
| CLIENT-001 to CLIENT-005 | Business Overview | Sri Murugan Poultry & Agro Group, 12 years in business. Scale includes 2 warehouses, 8 farms, 42 sheds, 30+ batches, 85 employees, 18 vehicles, 45 dealers, 120+ shops. Biggest problem is fragmented data across 12+ places causing manual duplicate entry and unknown profitability. | Core Business | Company, HeadOffice, Farm, Warehouse, Shed | [CONFIRMED] |
| CLIENT-006 to CLIENT-014 | Farm Operations | Daily operations including batch workflow, mortality tracking, feed consumption, weight measurement, health/medicine administration, and harvest/depletion processes. | Operations | Batch, Flock, Bird, FeedStock, MedicineStock | [CONFIRMED] |
| CLIENT-015 to CLIENT-017 | Sales & Dealers | Sales process detailing dealer management, customer management, direct sales, and live bird vs. processed meat sales. | Sales | Customer, Dealer, Shop, SalesOrder | [CONFIRMED] |
| CLIENT-018 to CLIENT-019 | Warehouse | Warehouse operations including stock management, transfers between facilities, and inventory control. | Inventory | Warehouse, GoodsReceipt, Dispatch | [CONFIRMED] |
| CLIENT-020 to CLIENT-021 | Purchase & Supplier | Procurement processes for chicks, feed, medicine, and equipment from suppliers. | Procurement | Supplier, PurchaseOrder, PurchaseRequest | [CONFIRMED] |
| CLIENT-022 to CLIENT-024 | Employee & HR | Employee management including manual attendance tracking, payroll processing, and department allocation. | HR | Employee, Attendance, Payroll | [CONFIRMED] |
| CLIENT-025 | Vehicle Management | Management of 18 vehicles, driver assignments, route planning, and tracking vehicle-related costs. | Logistics | Vehicle, Driver, Trip, Route | [CONFIRMED] |
| CLIENT-026 to CLIENT-027 | Finance & Profitability | Financial tracking emphasizing the need to determine exact batch profitability, vehicle costs, and dealer outstanding balances. | Finance | Invoice, Payment, Expense | [CONFIRMED] |
| CLIENT-028 to CLIENT-032 | System Features | Core required features including real-time dashboards, reporting, notifications, approval workflows, and audit logs. | System | Dashboard, Report, ApprovalRule, AuditLog | [CONFIRMED] |
| CLIENT-033 to CLIENT-035 | Technical Needs | Requirements for data migration, mobile app access for farm workers, and offline support capability. | Technical | DataMigration, MobileDevice | [CONFIRMED] |
| CLIENT-036 to CLIENT-044 | Scale & Future Proofing | Support for multi-farm, multi-company, multi-language (Tamil primary), security, AI, and future expansion. | Architecture | Company, Farm, User | [CONFIRMED] |
| CLIENT-045 to CLIENT-074 | Egg Business | Detailed egg operations: sources, collection, grading, stock, units (piece, tray, carton), dispatch, outstanding payments, rate alerts. | Egg Production | Egg, EggGrade, Product, Delivery | [CONFIRMED] |
| CLIENT-075 to CLIENT-127 | Processing Business | Meat processing details: bird types, live vs processed sales, weight management, yield, losses, waste, by-products, custom cutting, and packing. | Processing | ProcessingBatch, ProcessingOutput, ByProduct | [CONFIRMED] |
| CLIENT-128 to CLIENT-169 | Orders & Delivery | Extensive order management: advance/recurring orders, cut-off times, slots, capacity, credit limits, price locks, refunds, theft detection, approval matrix. | Logistics/Sales | Order, Delivery, DeliveryProof, Complaint | [CONFIRMED] |
| CLIENT-170 to CLIENT-220 | Demand Forecasting & BI | Advanced analytics: demand/procurement forecasting, capacity planning, cost centers, profitability analysis, what-if analysis, and seasonal predictions. | BI & Analytics | Forecast, DemandPlan, Report | [CONFIRMED] |


---


# Entity Register

This document defines the canonical business entities identified from client answers.

| Entity Name | Purpose | Key Attributes | Relationships | Lifecycle | Source IDs |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Company** | Root entity for multi-company setup | Name, TaxID, Currency | 1:M HeadOffice, 1:M Farm | Active/Inactive | CLIENT-036 |
| **HeadOffice** | Main administrative location | Address, Contact | 1:1 Company, 1:M Employee | Active | CLIENT-001 |
| **Warehouse** | Storage for feed, medicine, tools | Location, Capacity | 1:M Stock, 1:M Dispatch | Active/Maintenance | CLIENT-018 |
| **Farm** | Physical farm location | Name, Location, Capacity | 1:M Shed, 1:M Employee | Active/Inactive | CLIENT-006 |
| **Shed** | Individual housing unit in a farm | ShedNumber, Capacity, Area | M:1 Farm, 1:M Batch | Active/Cleaning/Rest | CLIENT-006 |
| **Batch** | Group of birds for a cycle | BatchID, StartDate, InitialCount | M:1 Shed, 1:M DailyLog | Placed -> Growing -> Depleted | CLIENT-006 |
| **Flock** | Group of layer birds | FlockID, AgeInWeeks | M:1 Shed | Placed -> Laying -> Culled | CLIENT-036 (Future) |
| **Bird** | Physical bird/species | Type, Breed, AvgWeight | M:1 Batch | Active -> Sold/Dead | CLIENT-075 |
| **Species** | Types like Broiler, Quail | SpeciesName, GrowthCurve | 1:M Bird, 1:M Product | Active | CLIENT-075 |
| **Product** | Saleable item | SKU, Name, BasePrice | 1:M ProductVariant | Active/Discontinued | CLIENT-076 |
| **ProductVariant** | Processing forms (e.g. Skinless) | VariantName, YieldFactor | M:1 Product | Active | CLIENT-076 |
| **Egg** | Egg product type | Size, FreshnessDays | 1:M EggGrade | Collected -> Sold | CLIENT-045 |
| **EggGrade** | Grading (A, B, Jumbo) | GradeName, WeightRange | M:1 Egg | Active | CLIENT-045 |
| **Supplier** | Entity supplying inputs | Name, Balance, CreditTerms | 1:M PurchaseOrder | Active/Blacklisted | CLIENT-020 |
| **Customer** | Direct buyer/shop | Name, Balance, Route | 1:M SalesOrder | Lead -> Active -> Churn | CLIENT-016 |
| **Dealer** | B2B buyer | Name, CreditLimit, Discount | 1:M SalesOrder | Active | CLIENT-015 |
| **Shop** | Retail outlet | Name, Address | M:1 Customer/Dealer | Active | CLIENT-016 |
| **Employee** | Staff member | Name, Role, Salary | M:1 Department, 1:M Attendance | Hired -> Active -> Resigned | CLIENT-022 |
| **Department** | Org unit | DeptName | 1:M Employee | Active | CLIENT-022 |
| **Vehicle** | Transport unit | RegNo, Capacity, Type | 1:M Trip | Active/Maintenance | CLIENT-025 |
| **Driver** | Vehicle operator | LicenseNo | 1:M Trip, M:1 Employee | Active | CLIENT-025 |
| **Trip** | Delivery/Transfer journey | StartTime, EndTime, Fuel | M:1 Vehicle, M:1 Route | Planned -> EnRoute -> Complete | CLIENT-025 |
| **Route** | Standard delivery path | RouteName, Distance | 1:M Customer, 1:M Trip | Active | CLIENT-128 |
| **Order** | Request for goods | OrderDate, TotalAmount | 1:M OrderItem, M:1 Customer | Draft -> Approved -> Fulfilled | CLIENT-128 |
| **OrderItem** | Line item in order | Qty, Rate, Total | M:1 Order, M:1 Product | Pending -> Delivered | CLIENT-128 |
| **ProcessingBatch** | Live birds to meat conversion | InputWeight, OutputWeight | 1:M ProcessingOutput | Planned -> Processing -> Done | CLIENT-075 |
| **ProcessingOutput** | Yield from processing | MeatType, Weight | M:1 ProcessingBatch | Created -> Sold | CLIENT-075 |
| **ByProduct** | Liver, gizzard, etc. | Type, Weight | M:1 ProcessingBatch | Created -> Sold | CLIENT-075 |
| **Loss** | Processing loss (blood/feathers) | LossType, Weight | M:1 ProcessingBatch | Recorded | CLIENT-075 |
| **Waste** | Non-saleable items | Type, Weight | M:1 ProcessingBatch | Recorded | CLIENT-075 |
| **Damage** | Damaged goods (e.g. eggs) | Qty, Reason | M:1 Dispatch | Recorded | CLIENT-075 |
| **Return** | Goods returned by customer | Qty, Reason | M:1 Order, M:1 Customer | Requested -> Approved -> Stocked | CLIENT-128 |
| **Invoice** | Bill for order | InvoiceNo, Tax, Total | 1:1 Order, 1:M Payment | Draft -> Unpaid -> Paid | CLIENT-026 |
| **Payment** | Received/Sent money | Amount, Mode, RefNo | M:1 Invoice | Pending -> Cleared | CLIENT-128 |
| **Receipt** | Proof of payment | ReceiptNo | 1:1 Payment | Issued | CLIENT-128 |
| **CreditNote** | Value owed to customer | Amount, Reason | M:1 Customer | Issued -> Settled | CLIENT-128 |
| **DebitNote** | Value owed by customer | Amount, Reason | M:1 Customer | Issued -> Settled | CLIENT-128 |
| **Complaint** | Customer issue | Desc, Resolution | M:1 Customer, M:1 Order | Open -> Resolved | CLIENT-128 |
| **FeedStock** | Feed inventory | Type, Qty | M:1 Warehouse, M:1 Batch | Received -> Consumed | CLIENT-006 |
| **MedicineStock** | Medicine inventory | BatchNo, Expiry, Qty | M:1 Warehouse | Received -> Consumed | CLIENT-006 |
| **VaccineStock** | Vaccine inventory | BatchNo, Expiry | M:1 Warehouse | Received -> Consumed | CLIENT-006 |
| **Equipment** | Farm tools/machinery | Name, Status | M:1 Farm | Active -> Broken -> Fixed | CLIENT-020 |
| **PurchaseRequest** | Internal request for goods | Item, Qty, RequiredDate | M:1 Department, 1:1 PO | Draft -> Approved -> Ordered | CLIENT-020 |
| **PurchaseOrder** | Order to supplier | PONo, Amount | M:1 Supplier | Draft -> Sent -> Fulfilled | CLIENT-020 |
| **GoodsReceipt** | GRN upon delivery | GRNNo, ReceivedQty | M:1 PO, M:1 Warehouse | Draft -> Verified -> Stocked | CLIENT-018 |
| **SalesOrder** | Confirmed customer order | SONo | M:1 Customer | Draft -> Approved -> Fulfilled | CLIENT-015 |
| **Dispatch** | Outbound shipment | DispatchNo, Vehicle | 1:M Order | Scheduled -> Dispatched | CLIENT-128 |
| **Delivery** | Successful drop-off | DeliveryTime | 1:1 Dispatch | Pending -> Delivered | CLIENT-128 |
| **DeliveryProof** | Signature/Photo | ImageUrl | 1:1 Delivery | Captured | CLIENT-128 |
| **Attendance** | Daily employee log | Date, InTime, OutTime | M:1 Employee | Present/Absent/Leave | CLIENT-022 |
| **Leave** | Approved time off | StartDate, EndDate | M:1 Employee | Requested -> Approved | CLIENT-022 |
| **Payroll** | Salary record | Month, NetPay | M:1 Employee | Generated -> Paid | CLIENT-022 |
| **Advance** | Advance salary given | Amount, Deducted | M:1 Employee | Given -> Recovered | CLIENT-022 |
| **Deduction** | Salary deduction | Amount, Reason | M:1 Payroll | Applied | CLIENT-022 |
| **Expense** | Operational cost | Category, Amount | M:1 Farm/Vehicle | Logged -> Approved | CLIENT-026 |
| **ApprovalRule** | Hierarchy rule | Role, MaxAmount | 1:M DocumentType | Active | CLIENT-030 |
| **AuditLog** | System action record | User, Action, Timestamp | M:1 AllEntities | Logged | CLIENT-032 |
| **Forecast** | Predicted demand/supply | Metric, Value, Date | M:1 Product/Customer | Generated -> Actualized | CLIENT-170 |
| **DemandPlan** | Actionable forecast | TargetQty, Period | M:1 Product | Draft -> Active | CLIENT-170 |
| **PriceList** | Standard pricing | ValidFrom, ValidTo | M:1 Product | Draft -> Active -> Expired | CLIENT-128 |
| **RateContract** | Customer specific price | CustomerId, FixedRate | M:1 Customer | Active -> Expired | CLIENT-128 |
| **Discount** | Price reduction rule | Percentage, Conditions | M:1 Order | Active | CLIENT-128 |
| **Notification** | Alert message | Type, Content | M:1 User | Unread -> Read | CLIENT-028 |
| **Report** | Analytics output | Type, Parameters | - | Generated | CLIENT-028 |


---


# Open Questions & Gaps

This document tracks identified gaps or ambiguities from the initial client answers that require further clarification.

* **OPEN-001:** Exact tax structure (GST rates for different poultry products)? [TO BE CONFIRMED]
* **OPEN-002:** Exact credit terms per dealer type? [TO BE CONFIRMED]
* **OPEN-003:** Processing facility — is it located at the farm, warehouse, or a separate distinct location? [TO BE CONFIRMED]
* **OPEN-004:** Exact approval workflow for each transaction type beyond purchase/expenses? [TO BE CONFIRMED]
* **OPEN-005:** Data migration timeline and total volume estimates (from Excel/legacy software)? [TO BE CONFIRMED]
* **OPEN-006:** Exact salary structure components (basic + DA + allowances)? [TO BE CONFIRMED]
* **OPEN-007:** Regulatory compliance requirements (FSSAI, pollution control board reporting)? [TO BE CONFIRMED]
* **OPEN-008:** Name of the existing separate billing software and its API/data export capabilities? [TO BE CONFIRMED]
* **OPEN-009:** Internet connectivity quality and bandwidth at each of the 8 farm locations? [TO BE CONFIRMED]
* **OPEN-010:** Number of mobile devices currently available vs. required for farm workers? [TO BE CONFIRMED]
* **OPEN-011:** Cold storage facility details (capacity limits, physical locations)? [TO BE CONFIRMED]
* **OPEN-012:** Exact maximum processing capacity (kg/day) of the current facility? [TO BE CONFIRMED]
* **OPEN-013:** How are by-product prices currently determined in the market? [TO BE CONFIRMED]
* **OPEN-014:** Are egg conversions (tray/carton) completely standardized across the business, or do they vary by specific customer demands? [TO BE CONFIRMED]
* **OPEN-015:** What exact accounting software (e.g., Tally, Zoho) is currently used, if any? [TO BE CONFIRMED]
* **OPEN-016:** Bank accounts — how many accounts are actively used, and with which banks? [TO BE CONFIRMED]
* **OPEN-017:** Vehicle ownership — are the 18 vehicles fully owned, leased, or a mix? [TO BE CONFIRMED]
* **OPEN-018:** Insurance details and tracking requirements for farms, vehicles, and employees? [TO BE CONFIRMED]
* **OPEN-019:** How are market rates currently determined (e.g., NECC guidelines, daily local market fluctuations)? [TO BE CONFIRMED]
* **OPEN-020:** Exact delivery radius limits and customer geographic clustering? [TO BE CONFIRMED]


---


# Source Conflicts

This document logs any conflicting requirements or statements found during source analysis of the client answers.

## Current Status
**No direct conflicts** have been identified in the Phase 1 fact base (CLIENT-001 through CLIENT-220).

## Potential Implicit Conflicts (To Monitor)
While no direct explicit conflicts exist, the following areas exhibit high complexity and potential for implicit operational conflicts that require careful technical design:

1. **Live vs. Processed Pricing Reconciliation:** Tracking exact batch profitability (CLIENT-026) when the same batch of birds is sold both live (no processing loss for the business) and processed (business absorbs yield loss and waste). [BUSINESS DECISION REQUIRED] (Pending technical formulation of cost distribution).
2. **Offline Data vs. Real-Time Dashboard:** The requirement for real-time dashboards (CLIENT-028) natively conflicts with the requirement for farm workers entering data offline (CLIENT-034). Synchronization delays must be factored into what constitutes "real-time". [PROPOSED] Define sync SLA for dashboard metrics.
3. **Approval Matrix Bottlenecks:** The owner must approve all amounts >₹50K (CLIENT-030). Given the scale (8 farms, 18 vehicles, daily procurement), this could create a bottleneck. [PROPOSED] Clarify if this applies strictly to expenses/purchases or includes standard high-volume routine operational transactions.


---


# Terminology Glossary

This document serves as the canonical vocabulary to ensure consistency across the project and prevent terminology conflicts.

| Term | Definition | Context |
| :--- | :--- | :--- |
| **Batch** | A specific group of broiler birds placed together in a shed for a single production cycle. | Broiler Farming |
| **Flock** | A group of layer birds. (Typically has a much longer lifecycle than a broiler batch). | Layer/Egg Farming |
| **Placement** | The act of placing day-old chicks (DOC) into a shed to start a new batch. | Farm Operations |
| **Depletion** | The removal of birds from a batch, usually via harvest/sale. | Farm Operations |
| **Mortality** | Bird deaths occurring due to natural causes, disease, or culling. | Farm Operations |
| **FCR** | Feed Conversion Ratio. The amount of feed required to produce 1 kg of live bird weight. (Lower is better). | Analytics / KPIs |
| **ADG** | Average Daily Gain. The average amount of weight a bird gains per day. | Analytics / KPIs |
| **Processing** | The act of converting a live bird into saleable meat products (cleaning, cutting). | Processing Unit |
| **Yield** | The percentage of saleable product derived from the initial live input weight. | Processing Unit |
| **By-product** | Secondary outputs from processing that hold saleable value (e.g., liver, gizzard, feet). | Processing Unit |
| **Waste** | Non-saleable outputs from processing (e.g., intestines, rejected meat). | Processing Unit |
| **Processing Loss** | Unavoidable weight lost during processing (e.g., blood, feathers, moisture). | Processing Unit |
| **Live Sale** | A sales transaction based strictly on the live weight of the bird. (The customer bears the processing loss). | Sales |
| **Processed Sale** | A sales transaction based on the final, cleaned meat weight. (The business bears the processing loss). | Sales |
| **Tray** | A configurable unit of measure for eggs (e.g., 30 eggs). | Egg Business |
| **Carton** | A configurable unit of measure containing multiple trays (e.g., 7 trays). | Egg Business |
| **GRN** | Goods Receipt Note. The official document acknowledging the receipt of items into the warehouse. | Warehouse/Purchase |
| **FIFO** | First In, First Out. Inventory methodology prioritizing oldest stock first. | Inventory |
| **FEFO** | First Expiry, First Out. Inventory methodology prioritizing items closest to expiration (used heavily for medicine/vaccines). | Inventory |
| **DOC** | Day-Old Chick. The starting unit of a broiler batch. | Farm Operations |
| **HDP** | Hen-Day Production. A metric for layer farms calculating the percentage of hens laying an egg on a given day. | Layer Farming |
| **Outstanding** | The total unpaid financial balance owed to the business by a customer or dealer. | Finance / Sales |


---


# Workspace Analysis — Phase 0

## Date
2026-08-13

## Existing Documentation

### Generic R&D (`docs/`) — 59 files, ~320 KB
Industry-level poultry research conducted by 16 specialized agents. **PRESERVED. NOT CLIENT-SPECIFIC.**

| Folder | Files | Content | Reuse Status |
|--------|-------|---------|-------------|
| `docs/00-overview/` | 2 | Executive summary, Product vision | Reference only |
| `docs/01-market-research/` | 2 | Competitor analysis, Gap analysis | Reference only |
| `docs/02-poultry-domain/` | 3 | Glossary (164 terms), Business types, Workflows | [INDUSTRY REFERENCE] for terminology |
| `docs/03-business-processes/` | 9 | Broiler/Layer/Breeder/Hatchery/Feed chains | [INDUSTRY REFERENCE] for workflow patterns |
| `docs/04-modules/` | 16 | Module documentation + hierarchy | Reference for module structure |
| `docs/06-business-rules/` | 4 | 30+ calculations, validations | [INDUSTRY REFERENCE] for formulas |
| `docs/07-workflows/` | 1 | 10 state machines | Reference for state design |
| `docs/08-user-roles/` | 1 | 17 role definitions | Reference only — client roles differ |
| `docs/09-database/` | 3 | 80+ entities, relationships | Reference for data modeling |
| `docs/10-api/` | 1 | API requirements | Reference only |
| `docs/11-ui-ux/` | 2 | Navigation, dashboards | Reference only |
| `docs/12-reports/` | 1 | 50+ reports | Reference only |
| `docs/13-notifications/` | 1 | 40+ notifications | Reference only |
| `docs/14-security/` | 1 | 132 security requirements | [INDUSTRY REFERENCE] |
| `docs/15-multi-tenancy/` | 1 | SaaS architecture | Reference only |
| `docs/16-integrations/` | 1 | Integration catalog | Reference only |
| `docs/17-mobile/` | 1 | Mobile/offline requirements | Reference only |
| `docs/18-ai/` | 1 | AI roadmap | Reference only |
| `docs/19-testing/` | 1 | Testing strategy | Reference only |
| `docs/20-devops/` | 1 | Deployment strategy | Reference only |
| `docs/21-roadmap/` | 2 | Implementation phases, MVP | Reference only |
| `docs/22-edge-cases/` | 1 | 100+ edge cases | [INDUSTRY REFERENCE] |
| `docs/24-decisions/` | 1 | 12 ADRs | Reference for technical decisions |
| `docs/25-research-sources/` | 1 | Sources catalog | Reference only |
| `docs/26-non-functional/` | 1 | NFR catalog | Reference only |

### Root Files
| File | Status |
|------|--------|
| `MASTER_POULTRY_SYSTEM_RND.md` | Generic R&D master — preserved |
| `README.md` | Project README — preserved |
| `project_state.md` | Project tracker — will be updated |

### Existing Client-Specific Requirements
**None found.** The `requirements/` folder is newly created for this BRD effort.

## Conventions Identified
- Markdown format for all documentation
- Hierarchical folder numbering (00, 01, 02...)
- File links use `file:///` scheme
- Business rule IDs: `BR-CALC-XXX` pattern in R&D
- Entity catalog format: Name, Purpose, Key Fields, Relationships

## Potential Conflicts
| Area | Existing R&D | Client Reality | Resolution |
|------|-------------|---------------|------------|
| Business types | 12 generic types | Primarily broiler + egg + processing | BRD focuses on client's actual types |
| Roles | 17 generic roles | Client-specific roles (Owner, Farm Manager, Supervisor, Worker, etc.) | BRD defines client roles |
| Modules | 22 generic modules | Client needs processing, egg trading, demand forecasting, vehicle management | BRD adds new modules |
| Hatchery/Breeder | Documented in R&D | Marked as [FUTURE] by client | BRD marks as future scope |
| Multi-tenancy | Full SaaS architecture | Single company initially, multi-company future | BRD scopes appropriately |

## Decision
- `docs/` = **PRESERVED** as industry knowledge base
- `requirements/` = **NEW** client-specific BRD
- No files deleted or overwritten
- Cross-references marked as `[INDUSTRY REFERENCE]` when useful

=============================================================

# MODULE: 01-business


=============================================================




---


# Business Hierarchy & Organizational Structure

## 1. Structural Overview
The following represents the operational hierarchy based on CLIENT-003 [CONFIRMED]:

```text
Sri Murugan Poultry & Agro Group
├── Head Office
├── Warehouse 1 (Feed, Medicine, Equipment, Consumables)
├── Warehouse 2
├── Farm 01 
│   ├── Shed 01
│   ├── Shed 02
│   └── Shed 03
├── Farm 02 ...
├── Farm 08
├── 45 Dealers (each with multiple shops)
├── 120+ Shops/Customers
└── Direct Customers
```

## 2. Entity Descriptions & Data Flow
- **Head Office:** Central node for all management decisions, accounting, and consolidated reporting. Data flows up to HO from all other nodes.
- **Warehouses:** Inventory hubs. Receive POs, execute GRNs, and dispatch to farms based on approved requests. Data flow: Stock levels, dispatch records.
- **Farms (Sheds):** Production units containing active batches. Source of primary daily data (mortality, feed consumption). Data flow: Daily logs up to HO.
- **Dealers & Shops:** Primary B2B sales channels. Data flow: Orders, outstanding balances, payments.
- **Direct Customers:** B2C channels.


---


# Business Objectives

The following business objectives are derived directly from the client's current operational challenges and vision for the system:

| Objective ID | Objective Description | Source | Status |
|---|---|---|---|
| OBJ-001 | Eliminate duplicate data entry (Farm supervisor notebook → office Excel → accountant Excel) | CLIENT-005 Problem 1 | [CONFIRMED] |
| OBJ-002 | Real-time operational visibility (Morning mortality known immediately, not evening/next day) | CLIENT-005 Problem 3 | [CONFIRMED] |
| OBJ-003 | Accurate batch-level profitability (Total cost calculation including feed, chick, medicine, labour, transport, overhead) | CLIENT-027 / Problem 6 | [CONFIRMED] |
| OBJ-004 | Unified dashboard for management decisions (All KPIs on one screen in the morning) | CLIENT-028 / CLIENT-044 | [CONFIRMED] |
| OBJ-005 | Automated alerts and notifications (Data → Information → Alert → Action) | CLIENT-030 / CLIENT-181 | [CONFIRMED] |
| OBJ-006 | Mobile-first entry for farm workers | CLIENT-034 | [CONFIRMED] |
| OBJ-007 | Offline capability (for remote farm locations) | CLIENT-035 | [CONFIRMED] |
| OBJ-008 | Demand forecasting capabilities | CLIENT-170-220 | [CONFIRMED] |
| OBJ-009 | Slow/non-moving product detection | CLIENT-193-197 | [CONFIRMED] |
| OBJ-010 | Architecture scalable to 15-20 farms, hatcheries, and feed mills | CLIENT-001 | [CONFIRMED] |


---


# Business Context: Client Profile

## 1. Company Overview
- **Business Name:** Sri Murugan Poultry & Agro Group [CONFIRMED]
- **Age:** 12 years in poultry business [CONFIRMED]
- **Type:** Commercial Poultry & Agro Operations [CONFIRMED]
- **Current Scale:** 2 Warehouses, 8 Farms, 42 Sheds, 30+ active batches/flocks [CONFIRMED]
- **Workforce:** 85 Employees [CONFIRMED]
- **Logistics:** 18 Vehicles [CONFIRMED]
- **Distribution:** 45 Dealers, 120+ Shops/Customers [CONFIRMED]

## 2. Locations & Infrastructure
- **Head Office** [CONFIRMED]
- **Warehouses:** 2 facilities handling Feed, Medicine, Equipment, and Consumables [CONFIRMED]
- **Farms:** 8 operational farms containing 42 sheds in total [CONFIRMED]

## 3. Operations & Offerings
- **Core Operations:** Broiler farming, chick purchase, feed purchase/distribution, medicine, equipment [CONFIRMED]
- **Sales Operations:** Bird sales, dealer sales, direct sales, transportation, warehouse ops [CONFIRMED]
- **Products:** Chicken, Country Chicken, Quail, Duck, Turkey (including processed chicken and eggs) [CONFIRMED]

## 4. Financial Structure
- **Revenue Sources:** Sales of live birds, processed meat, eggs to dealers, shops, and direct customers [CONFIRMED]
- **Cost Structure:** Feed is the most significant cost component (per CLIENT-010) [CONFIRMED], followed by chicks, medicine, labor, transport, and overheads [INFERRED].

## 5. Growth & Expansion
- **Growth Trajectory:** Expanded from 1 farm to 8 farms over 12 years [CONFIRMED]
- **Future Expansion Plans:** 
  - Scale up to 15-20 farms [CONFIRMED]
  - Hatchery establishment [CONFIRMED]
  - Feed mill operations [CONFIRMED]
  - Layer farming [CONFIRMED]
- **Owner's Vision:** "I don't want just a billing software. I want a system that understands my business and helps me make management decisions. Data → Information → KPI → Analysis → Alert → Decision → Business Action." (CLIENT-181) [CONFIRMED]

=============================================================

# MODULE: 02-as-is


=============================================================




---


# Current Tools & Systems Analysis

| Tool | Primary Use | Associated Problems & Data Quality Issues | Status |
|---|---|---|---|
| **Farm Register (paper)** | Daily mortality, feed usage, bird count | Data entry mistakes (e.g., writing 50 instead of 5); delayed data availability. | [CONFIRMED] |
| **Excel spreadsheets** | Aggregating farm data, HO reporting | Duplicate data entry (notebook → Excel 1 → Excel 2); prone to formula errors; time-consuming to merge. | [CONFIRMED] |
| **WhatsApp** | Quick communication, sharing photos of registers | Unstructured data; easily lost; requires re-entry into Excel. | [CONFIRMED] |
| **Billing Software (separate)** | Invoicing, sales records | Disconnected from inventory and farm operations; doesn't provide management insights. | [CONFIRMED] |
| **Attendance Register (paper)** | Tracking employee presence | Manual, disconnected from payroll. | [CONFIRMED] |
| **Salary Excel** | Payroll calculation | Requires manual transcription from attendance register; prone to errors. | [CONFIRMED] |
| **Warehouse Register (paper)**| Tracking stock (feed, medicine) | Stock mismatches (e.g., register says 1000 kg, actual 850 kg); no real-time visibility. | [CONFIRMED] |
| **Purchase Bills (paper)** | Proof of purchase | Hard to trace back to batch profitability easily. | [CONFIRMED] |
| **Sales Bills (paper)** | Proof of sale/dispatch | Manual reconciliation needed. | [CONFIRMED] |
| **Vehicle Register (paper)** | Trip logging, fuel logs | Vehicle cost per trip/farm is unknown; difficult to allocate transport overhead. | [CONFIRMED] |
| **Bank Statement** | Payment reconciliation | Manual checking required against dealer balances. | [CONFIRMED] |


---


# Current As-Is Workflows

## 1. Farm Daily Workflow [CONFIRMED - CLIENT-007]
- **Trigger:** Start of day at the farm
- **Actor:** Farm Supervisor / Worker
- **Steps:** Opening count → Mortality recording → Culling → Live count update → Feed distribution → Water distribution → Environment check → Health check
- **Decision Points:** Identifying health issues or abnormal mortality rates
- **Current Tools:** Farm Register (paper), WhatsApp
- **Problems:** Delayed information transmission to HO (known by evening/next day), manual entry mistakes (5 typed as 50)

## 2. Batch Workflow [CONFIRMED - CLIENT-006]
- **Trigger:** Need for new flock
- **Actor:** HO / Farm Manager
- **Steps:** Supplier selection → Purchase order → Arrival → Quality Control (QC) → Farm assignment → Shed assignment → Batch creation → Chick Placement
- **Decision Points:** Supplier evaluation based on past batch performance
- **Current Tools:** Excel spreadsheets, WhatsApp
- **Problems:** Difficult to track historical performance per supplier easily [INFERRED]

## 3. Feed Workflow [CONFIRMED - CLIENT-009]
- **Trigger:** Feed requirement
- **Actor:** HO / Warehouse Manager / Farm Supervisor
- **Steps:** Supplier → PO → GRN → Warehouse storage → Farm Request → Approval → Issue from Warehouse → Farm Consumption
- **Decision Points:** Approval of farm request based on shed capacity and batch age
- **Current Tools:** Warehouse Register (paper), Purchase Bills
- **Problems:** Stock Mismatch (Warehouse register says 1000 kg, actual is 850 kg)

## 4. Harvest Workflow [CONFIRMED - CLIENT-014]
- **Trigger:** Batch reaches target weight/age
- **Actor:** Farm Supervisor / Logistics / HO
- **Steps:** Batch Ready → Sample Weight → Buyer confirmation → Route Planning → Catching → Loading → Vehicle assignment → Weighment → Dispatch → Invoice generation → Delivery → Payment collection
- **Decision Points:** Deciding optimal harvest date based on current market rates and bird weight
- **Current Tools:** Manual notes, Billing Software, WhatsApp
- **Problems:** Vehicle cost tracking is difficult (diesel/driver/maintenance per trip unknown)

## 5. Purchase Workflow [CONFIRMED - CLIENT-020]
- **Trigger:** Low stock or new requirement
- **Actor:** HO Purchasing
- **Steps:** Requirement identification → Request → Quotation gathering → Selection → PO generation → Approval → GRN → QC → Stock update → Invoice matching → Payment processing
- **Decision Points:** Vendor selection
- **Current Tools:** Excel, Paper Bills
- **Problems:** Disconnected from actual real-time inventory levels [INFERRED]

## 6. Sales Workflow [CONFIRMED - CLIENT-015]
- **Trigger:** Dealer/Customer request
- **Actor:** Sales Team / HO
- **Steps:** Dealer contact → Order placement → Approval → Dispatch from farm/warehouse → Invoice → Payment receipt → Outstanding balance update
- **Decision Points:** Approving dispatch based on dealer's outstanding balance
- **Current Tools:** Billing Software, Manual check
- **Problems:** Dealer balance requires manual checking to reconcile purchased/paid/outstanding amounts


---


# Problem Catalog

## Explicit Client Problems [CONFIRMED]

| ID | Problem | Current Situation | Business Impact | Root Cause | Risk Level | Suggested Solution | Priority | Related Module | Source |
|---|---|---|---|---|---|---|---|---|---|
| PROB-001 | Duplicate Data Entry | Farm supervisor notebook → office Excel → accountant Excel. | Wasted man-hours, high risk of transcription errors. | Lack of a centralized database. | High | Centralized cloud ERP | High | Core System | Client Prob 1 |
| PROB-002 | Data Entry Mistakes | 5 birds mortality typed as 50. | Skewed inventory and profitability metrics. | Manual transcription without validation. | High | Validation rules at entry | High | Farm Management | Client Prob 2 |
| PROB-003 | Delayed Information | Morning mortality known by evening/next day. | Delayed response to disease or feed issues. | Reliance on paper reporting. | Critical | Mobile-first real-time entry | High | Farm Management | Client Prob 3 |
| PROB-004 | Stock Mismatch | Warehouse register says 1000 kg feed, actual is 850 kg. | Pilferage risk, stockouts, inaccurate valuation. | Manual ledger updates. | High | Real-time inventory tracking | High | Inventory | Client Prob 4 |
| PROB-005 | Batch Cost Unknown | Cannot immediately tell actual cost of a batch. | Poor pricing decisions, delayed financial visibility. | Disconnected operational and financial systems. | Critical | Automated cost allocation | High | Finance | Client Prob 5 |
| PROB-006 | Profitability Unknown | Sales amount known but total cost unknown. | Inability to evaluate true business health. | Lack of integrated accounting. | Critical | Integrated ERP reporting | High | Finance / BI | Client Prob 6 |
| PROB-007 | Employee Attendance | Manual register, salary calculation separate. | Administrative burden, payroll errors. | Disconnected HR processes. | Medium | Integrated HRMS module | Medium | HRMS | Client Prob 7 |
| PROB-008 | Dealer Balance | Manual check required for purchased/paid/outstanding. | Delayed collections, credit risk. | Disconnected billing/payments. | High | Automated dealer ledger | High | Sales | Client Prob 8 |
| PROB-009 | Vehicle Cost Unknown | Diesel/maintenance/trip cost unknown per farm. | Inaccurate overhead allocation. | Unlinked vehicle registers. | High | Fleet management module | High | Logistics | Client Prob 9 |
| PROB-010 | Reporting Bottlenecks | Accountant combines multiple Excel files for owner. | Slow decision-making, management blind spots. | Siloed data architecture. | Critical | Automated real-time dashboard | High | BI/Dashboard | Client Prob 10 |

## Inferred Problems [INFERRED]

| ID | Problem | Current Situation | Business Impact | Root Cause | Risk Level | Suggested Solution | Priority | Related Module | Source |
|---|---|---|---|---|---|---|---|---|---|
| PROB-011 | Lack of Demand Forecasting | Relies on manual estimation for 30+ batches. | Over/under stocking of feed and chicks. | Absence of predictive analytics. | Medium | Forecasting engine | Medium | BI | INFERRED |
| PROB-012 | Poor Supplier Performance Tracking | Excel and paper POs used for tracking. | May continue using suboptimal suppliers. | No centralized vendor evaluation. | Medium | Vendor rating system | Low | Procurement | INFERRED |
| PROB-013 | Scalability Limitations | Current manual processes support 8 farms. | Expansion to 15-20 farms will break admin processes. | High reliance on manual data reconciliation. | High | Scalable cloud architecture | High | Architecture | INFERRED |


---


# Root Cause Analysis

Based on the As-Is state and Problem Catalog, the operational challenges at Sri Murugan Poultry & Agro Group trace back to the following core root causes:

## 1. Disconnected Data Silos (The Primary Root Cause)
- **Manifestation:** Paper registers at farms, separate billing software at HO, disconnected Excel sheets for payroll and reporting.
- **Resulting Problems:** PROB-001 (Duplicate Data), PROB-005 (Batch Cost Unknown), PROB-006 (Profitability Unknown), PROB-010 (Reporting Bottlenecks), PROB-008 (Dealer Balance).
- **Impact:** It is structurally impossible to generate real-time, comprehensive dashboards (CLIENT-044) when data lives in isolated systems.

## 2. Manual Data Transcription
- **Manifestation:** Reading from a WhatsApp photo or paper register and typing into Excel.
- **Resulting Problems:** PROB-002 (Data Entry Mistakes), PROB-007 (Employee Attendance errors).
- **Impact:** High error rates that compromise the integrity of management reports.

## 3. Lack of Point-of-Action Recording
- **Manifestation:** Farm workers record data on paper, which is submitted hours later. Warehouse stock is updated periodically rather than at the exact moment of issue.
- **Resulting Problems:** PROB-003 (Delayed Information), PROB-004 (Stock Mismatch).
- **Impact:** Management is always reacting to yesterday's news; inventory shrinkage goes unnoticed until audits.

## 4. Absence of Automated Cost Allocation
- **Manifestation:** Vehicle costs, labor, and medicine are tracked globally but not apportioned to specific batches or sheds automatically.
- **Resulting Problems:** PROB-009 (Vehicle Cost Unknown), PROB-005 (Batch Cost Unknown).
- **Impact:** True profitability is obscured, making it difficult to identify underperforming farms or batches.

=============================================================

# MODULE: 03-to-be


=============================================================




---


# TO-BE Future Workflows

This document outlines how current manual processes will be transformed into digital workflows.

## 1. Daily Farm Operations
- **AS-IS:** Farm workers write mortality and feed consumption in paper registers. Supervisor collects registers and messages numbers on WhatsApp. Office staff enters data into Excel.
- **TO-BE:** Farm Manager/Supervisor enters mortality and feed directly into the mobile app (offline mode supported). Data syncs instantly. Management sees real-time dashboard updates. Alerts trigger automatically if mortality is high.

## 2. Inventory and Feed Management
- **AS-IS:** Physical counting and phone calls to warehouse to request feed. Manual tracking of stock levels.
- **TO-BE:** System tracks feed consumption daily and deducts from farm shed stock. When stock reaches minimum threshold, system auto-generates a material indent (request) to the warehouse. Warehouse dispatches via system, farm receives via system.

## 3. Sales and Invoicing
- **AS-IS:** Separate billing software used. Manual reconciliation with stock. Delivery drivers carry paper bills.
- **TO-BE:** Sales orders punched directly into system. Real-time stock verification. Digital invoices generated. Driver app shows delivery route and captures delivery confirmation.

## 4. Approvals
- **AS-IS:** Phone calls or WhatsApp messages for purchase approvals or discount requests. Hard to track history.
- **TO-BE:** System-driven workflow. Purchase request > 50K triggers notification to Owner app. Owner clicks "Approve". Audit log captures timestamp and user.

## 5. End of Batch Analysis
- **AS-IS:** Weeks to manually collate feed, medicine, and sales data to calculate profit and FCR for a batch.
- **TO-BE:** One-click Batch Profitability Report available the moment the batch is closed, drawing data automatically from daily entries, purchases, and sales.


---


# Target Operating Model (TOM)

## 1. Vision
Transform Sri Murugan Poultry & Agro Group from a manually managed, disparate operational structure into a unified, real-time, data-driven enterprise. 

## 2. Core Pillars of the Target State

### A. Unified Platform
- **Current State:** 12+ disconnected systems (Paper, Excel, WhatsApp, separate billing tool).
- **Target State:** A single integrated ERP tailored for poultry, covering Farm, Warehouse, Sales, HR, and Finance. "One version of the truth."

### B. Mobile-First Field Operations
- **Target State:** Empower farm supervisors, drivers, and sales staff with simple, Tamil-language mobile interfaces. Eradicate paper registers. Enable offline capabilities to ensure continuous operations regardless of internet connectivity.

### C. Proactive Management via Exceptions
- **Current State:** Management discovers issues (high mortality, low stock) after the fact when reviewing reports.
- **Target State:** Automated Alert Engine notifies management instantly of anomalies (threshold breaches, expiries, delays), allowing proactive intervention.

### D. Role-Based Visibility & Control
- **Target State:** Clear separation of duties and visibility. Farm managers see only their farm; Owner sees the entire portfolio. Approvals are workflow-driven and auditable, removing informal WhatsApp authorizations.

### E. Scalable Architecture
- **Target State:** The system is designed to seamlessly onboard new farms, integrate future IoT devices, and eventually manage multiple companies [CLIENT-037] without fundamental architectural changes.

=============================================================

# MODULE: 04-domain


=============================================================




---


# Batch & Flock Management Requirements

## 1. Overview
Requirements for managing the lifecycle of poultry batches across the 8 farms and 42 sheds. Currently, there are 30+ active batches at any given time.

## 2. Batch Creation and Lifecycle [PROPOSED]
A batch represents a group of birds of the same species placed in a shed.
**Lifecycle States:**
- `Draft`: Planned batch, awaiting placement.
- `Placed`: Birds have arrived, initial count verified.
- `Active`: Ongoing daily operations.
- `Partially Depleted`: Harvest has started, some birds remain.
- `Closed`: All birds harvested, depleted, or dead. Batch accounting is final.

## 3. Placement Workflow (CLIENT-006) [CONFIRMED]
**Process:** Chick Supplier → Purchase → Arrival → QC → Farm Allocation → Shed Allocation → Batch Creation → Bird Placement.
**Captured Data:**
- Bird count
- Breed / Species
- Supplier
- Rate per bird
- Total Purchase Cost
- Arrival Date & Time
- Farm Assigned
- Shed Assigned
- Auto-generated Batch Number

## 4. Daily Operations Recording (CLIENT-007) [CONFIRMED]
**Process:** Worker enters data → Supervisor verifies.
**Daily Data Captured:**
- Opening Bird Count
- Mortality Count
- Culling Count
- Live Bird Count (Closing)
- Feed Consumption (kg/bags)
- Water Consumption (liters)
- Environment Checks (Temp/Humidity) [INFERRED]
- Health Checks

## 5. Batch Performance Tracking [INFERRED]
The system must calculate and display standard industry metrics for each active and closed batch:
- **FCR (Feed Conversion Ratio):** Total feed consumed / Total live weight.
- **ADG (Average Daily Gain):** Weight gained per day.
- **Livability %:** (Placed Birds - Mortality) / Placed Birds.
- **EEF (European Efficiency Factor):** (Livability × Live Weight / Age in Days × FCR) × 100.

## 6. Harvest / Depletion Workflow [PROPOSED]
- Capturing the number of birds caught for processing/dispatch.
- Recording the dispatch weight.
- Transitioning batch to `Partially Depleted` or `Closed` based on remaining count.

## 7. Batch Closing and Profitability (CLIENT-027) [CONFIRMED]
**Batch Closing:** A batch is manually or automatically closed when bird count reaches zero.
**Batch Profitability:**
The system must calculate total profit/loss for each batch.
- **Total Revenue:** Total sales value of birds from the batch.
- **Total Cost:** Chick cost + Feed cost + Medicine cost + Overhead (labor, electricity) [PROPOSED].
- **Net Profit:** Total Revenue - Total Cost.
- **Profit per Bird:** Net Profit / Total Birds Sold.


---


# Farm Management Requirements

## 1. Overview
This document outlines the requirements for managing the 8 farms and 42 sheds currently operated by the Sri Murugan Poultry & Agro Group.

## 2. Farm Registration and Attributes [CONFIRMED]
The system must allow the registration of farms with the following details:
- **Farm Name & ID**
- **Location / Address**
- **Farm Manager / Supervisor Assigned**
- **Capacity (Total Birds)**
- **Status (Active / Inactive)**

## 3. Shed Management [CONFIRMED]
Farms are subdivided into sheds. The system must support managing up to 42 sheds across the 8 farms.
- **Shed ID / Number**
- **Parent Farm**
- **Capacity (Birds)**
- **Dimensions / Area [PROPOSED]**
- **Current Status (Empty / Occupied / Cleaning)**

## 4. Farm-Level Configuration [INFERRED]
Each farm should have specific configurations:
- Default feed delivery warehouse.
- Configurable environmental targets (temperature/humidity).

## 5. Multi-Farm Visibility & Access Control [CONFIRMED] (CLIENT-036)
Data visibility must be restricted based on user roles:
- **Owner / Top Management:** Can see data and dashboards for ALL 8 farms and 42 sheds.
- **Farm Manager / Supervisor:** Can only view data, dashboards, and reports for the specific farm(s) assigned to them.

## 6. Farm Dashboard Requirements [PROPOSED]
The dashboard for a farm should display:
- Active batches and current bird count.
- Daily mortality rates.
- Feed inventory levels at the farm.
- Alert notifications (e.g., high mortality, low feed).

## 7. Farm Closure / Deactivation [INFERRED]
- The system must allow marking a farm or shed as inactive (e.g., for maintenance).
- A shed cannot be deactivated if it has an active batch.


---


# Feed Management Requirements

## 1. Overview
Feed constitutes the biggest cost in poultry farming. Strict inventory control, consumption tracking, and performance analysis are mandatory.

## 2. Feed Types [PROPOSED]
Feed must be categorized by bird age/stage:
- Pre-starter
- Starter
- Grower
- Finisher

## 3. Feed Workflow (CLIENT-009) [CONFIRMED]
The standard flow of feed:
1. **Supplier:** Order placed via PO.
2. **Warehouse:** Received via GRN, added to Stock.
3. **Farm Request:** Farm manager requests feed.
4. **Approval:** Office approves request.
5. **Feed Issue:** Transported to Farm.
6. **Consumption:** Recorded against Farm/Shed/Batch.
7. **Stock Deduction:** Automatic deduction from Farm/Warehouse stock.

## 4. Feed Stock Management & Problem Mitigation (CLIENT-009) [CONFIRMED]
The system must prevent or handle the following problems:
- **Wrong Feed Type:** Validation checks preventing Finisher feed being issued to Day 1 chicks.
- **Wrong Quantity / Wrong Farm:** Strict GRN and dispatch verification.
- **Duplicate Issue:** Warning on issuing to the same batch twice in a short period.
- **Negative Stock Prevention:** The system must NEVER allow feed stock to go negative.
- **Damaged/Expired Feed:** Tracking of shelf life and alerts for expiring feed.
- **Feed Return:** Workflow for returning unused/damaged feed from Farm back to Warehouse.

## 5. Daily Consumption Tracking [CONFIRMED]
- Consumption is recorded at the **Batch level** daily.
- Workers log bags/kg consumed.

## 6. Cost Tracking & Metrics (CLIENT-010) [CONFIRMED]
The system must provide the following calculations per batch:
- **Feed Consumption:** (Purchased/Issued + Opening Stock) - Closing Stock
- **Batch-wise Feed Cost:** Total value of feed consumed by the batch.
- **Feed per kg:** Total feed consumed / Total live weight produced.
- **Feed per bird:** Total feed consumed / Total birds.
- **FCR (Feed Conversion Ratio):** Feed consumed / Weight gained.
- **FCR Trend:** Visual graph comparing current batch FCR against standard targets.

## 7. Feed Wastage Tracking [INFERRED]
- A separate entry for spilled or spoiled feed to distinguish it from actual bird consumption, ensuring FCR calculations remain accurate.


---


# Health & Medication Management

## 1. Overview
Managing flock health, vaccinations, and medication is critical for maintaining livability and compliance with food safety standards (withdrawal periods).

## 2. Disease Catalog [PROPOSED]
- The system must maintain a configurable master list of diseases (e.g., Newcastle, IB, IBD, Coccidiosis).
- Allows easy selection during mortality or diagnosis entry.

## 3. Vaccination Schedule Management [INFERRED]
- Configurable vaccination schedules based on bird type (e.g., Broiler schedule vs Layer schedule).
- Alerts/Reminders for upcoming vaccinations (Next Due Date).
- Recording of: Vaccine type, batch number, administration date, and method (water, spray, injection).

## 4. Medication Tracking & Inventory (CLIENT-012, CLIENT-013) [CONFIRMED]
**Process Flow:**
1. **Medicine Purchase:** Receipt of medicine increases Warehouse Stock.
2. **Diagnosis:** Vet or Supervisor logs disease, symptoms, and diagnosis.
3. **Prescription:** Medicine, dosage, and treatment period assigned.
4. **Treatment Application:** Administering medicine decreases Farm/Warehouse Stock automatically.

**Stock ↔ Usage Connection (CLIENT-013):**
- Medicine usage MUST be strictly tied to inventory reduction. You cannot record medication if stock is insufficient.

## 5. Withdrawal Period Enforcement [PROPOSED]
- **Withdrawal Period:** The number of days after treatment before a bird can be safely consumed.
- The system must **block or alert** if a batch is scheduled for harvest/dispatch while still within the medication withdrawal period.

## 6. Expiry Management [CONFIRMED]
- Tracking expiry dates of all vaccines and medicines upon GRN.
- Automated alerts for expired or soon-to-expire medicine.

## 7. Vet Recording Workflow [INFERRED]
- External or internal veterinarians should have a module to log visits, observations, post-mortem findings, and prescriptions directly linked to a specific farm and batch.


---


# Mortality Management Requirements

## 1. Overview
Tracking bird mortality is critical for operations. The system must accurately record, categorize, and calculate mortality across all stages.

## 2. Daily Mortality Recording (CLIENT-008) [CONFIRMED]
Required fields for daily mortality entry:
- Quantity (Number of dead birds)
- Date and Time
- Reason (Disease / Heat / Injury / Unknown / Culling)
- Remarks
- Entered By (Worker)
- Verified By (Supervisor)

## 3. Bird Count Reconciliation [CONFIRMED]
The system must enforce the following formula daily for every batch:
`Opening Bird Count - Mortality - Culling = Closing Bird Count`

## 4. Mortality Calculation & Alerts [CONFIRMED]
- **Daily Mortality %:** (Daily Mortality / Opening Count) × 100
- **Cumulative Mortality %:** (Total Mortality / Initial Placed Birds) × 100
- **Alerts [PROPOSED]:** The system must generate alerts (SMS/WhatsApp/Dashboard) if daily mortality exceeds a configurable threshold (e.g., >0.5% in a day).

## 5. Mortality Sources (CLIENT-088) [CONFIRMED]
Mortality occurs in different phases and must be reported separately to identify operational bottlenecks:
1. **Farm Mortality:** Occurs during the rearing cycle in the shed.
2. **Transport Mortality:** Occurs during transit from farm to processing or customer.
3. **Receiving Mortality:** Occurs at the warehouse/processing center upon arrival.
4. **Processing Mortality:** Birds that die in holding before slaughter.
5. **Other:** Catching injuries, etc.

## 6. Damaged / Injured Birds (CLIENT-089) [CONFIRMED]
Status tracking for injured birds:
- **Available:** Healthy birds.
- **Damaged:** Injured but alive.
- **Rejected:** Cannot be sold for human consumption.
- **Disposed:** Destroyed and safely disposed of.
- **Sold at Reduced Rate:** Sold to specific markets (e.g., pet food) at a discount.

## 7. Culling & Rejected Birds Workflow (CLIENT-090) [CONFIRMED]
- Culling must be separated from natural mortality.
- Culls must be tracked with reasons (e.g., stunted growth, severe injury).
- Rejected birds must have a clear disposition workflow (Disposed vs Sold at Reduced Rate).


---


# Poultry Domain Requirements

## 1. Overview
This document defines the core poultry domain requirements for the Sri Murugan Poultry & Agro Group. The system must accommodate various poultry species beyond chicken to support the current product catalog and future expansion.

## 2. Poultry Types & Hierarchy [CONFIRMED] (CLIENT-075)
The system must support a configurable species/bird type hierarchy. **The bird type must NOT be hard-coded.**

- **Base Category:** Poultry
  - **Chicken**
    - Broiler
    - Country Chicken / Naatu Kozhi
    - Other Chicken Breeds
  - **Duck**
  - **Quail / Kadai**
  - **Turkey**
  - **Other Poultry**

### 2.1 Configuration Model [PROPOSED]
To avoid hard-coding, the system will use a generic `Product Master` that is fully configurable.
- Administrators can add new species without code changes.
- Each species can have its own configured lifecycle duration, feed requirements, and processing methods.

## 3. Species-Specific Configuration (CLIENT-098)

Different species have different processing rules. The processing configuration must be product/species-wise.

| Species / Product | Processing Rules [CONFIRMED] | Expected Yield [INFERRED] | Selling Units [CONFIRMED] |
| --- | --- | --- | --- |
| Broiler | Skin-on / Skinless / Portions | 65-72% | Kg / Grams |
| Country Chicken | Skin-on (primarily) | 60-68% | Kg |
| Quail | Whole Bird | 70-75% | Count / Kg |
| Duck | Skin-on | 60-65% | Kg |
| Turkey | Whole / Portions | 65-70% | Kg |

### 3.1 Hard-Coding Risks [PROPOSED]
Why hard-coding chicken-only is wrong for this system:
1. Prevents scaling the existing sales of Country Chicken, Quail, Duck, and Turkey.
2. Incompatible with processing rules which vary significantly by bird type (e.g., Quail is often sold by count, not just weight).
3. Distorts data analytics by forcing non-chicken birds into a chicken-oriented schema.

## 4. Business Rules [INFERRED]
1. Every batch created must be linked to a specific species from the Product Master.
2. The pricing, expected loss %, and by-products generated must dynamically adjust based on the selected species during processing.


---


# Weight Management & Yield Requirements

## 1. Overview
Tracking weight accurately from the farm to the final customer is essential for profitability analysis. Poultry involves significant weight changes through growth, transport, and processing.

## 2. Weight Types (CLIENT-011, 076-088) [CONFIRMED]
The system must define and track the following weight milestones:
- **Live Weight:** Current weight of living birds in the farm.
- **Farm Weight:** Total weight recorded at the farm just before loading onto the truck.
- **Transport Weight:** Weight of the loaded truck (Tare vs Gross).
- **Delivery / Dispatch Weight:** Weight recorded when arriving at the warehouse or customer.
- **Processing Input Weight:** Weight of live birds entering the slaughter line.
- **Final Saleable Weight:** Weight of the processed meat ready for sale.
- **Requested Weight:** Weight requested by the customer (B2B/Dealer).
- **Accepted Weight:** Actual weight accepted by the customer.
- **Returned Weight:** Meat returned by customer.
- **Wasted Weight:** Unusable meat or birds.
- **By-product Weight:** Weight of offal, feathers, heads, feet, etc.

## 3. Weekly Weighing Workflow (CLIENT-011) [CONFIRMED]
- **Process:** Batch → Select Sample Birds → Record Weight → Calculate Average Weight.
- **Growth Comparison:** System must compare the Actual Average Weight against the Target/Standard weight for that bird age/breed.
- **Alerts:** Generate alerts for abnormal growth (underweight or overweight).
- **Uniformity [PROPOSED]:** Calculate flock uniformity percentage based on sample variance.

## 4. Processing Yield (CLIENT-100, 101) [CONFIRMED]
- **Yield Calculation:** `Yield % = (Final Saleable Weight / Processing Input Live Weight) × 100`
- **Alerts (CLIENT-101):** The system must trigger warnings if the actual yield deviates significantly from the expected/standard yield for that species.

## 5. Weight Loss During Transport (CLIENT-087) [CONFIRMED]
- Track "Shrinkage" or transport weight loss.
- Calculation: `Farm Dispatch Weight - Delivery Receiving Weight`
- Must be reported as a percentage to monitor transport efficiency and theft.

## 6. Weight Reconciliation (CLIENT-097, 123) [CONFIRMED]
Strict mass balance must be maintained during processing to prevent theft or data entry errors.
- **Reconciliation Formula:** `Input Live Weight = Final Saleable Weight + By-products Weight + Wasted Weight + Loss (Blood/Moisture)`
- The system must mandate reconciliation before closing a daily processing batch.

=============================================================

# MODULE: 05-processing


=============================================================




---


# By-Product Management

## 1. By-Product Identification [CONFIRMED]
During processing, a single bird yields multiple outputs beyond the primary meat. The system must track the following by-products (CLIENT-081, CLIENT-082, CLIENT-105, CLIENT-119):
- Liver
- Gizzard
- Skin
- Feet
- Head
- Neck
- Intestines (if applicable for specific markets)
- Other By-products

## 2. Saleable vs. Non-Saleable Classification [CONFIRMED]
- **Dynamic Classification**: The system must allow management to toggle whether a specific by-product is saleable or non-saleable (waste) (CLIENT-120).
- **Saleable**: Items like Liver, Gizzard, and Feet are moved to finished goods inventory and priced for sale.
- **Non-Saleable (Waste)**: Items like feathers and blood are moved to waste inventory for disposal tracking.

## 3. Inventory Tracking & Sales [CONFIRMED]
- **Tracking**: By-products must have their own SKUs and inventory tracking mechanisms. As birds are processed, by-product inventories automatically increase based on standard yield formulas or manual entry at the QC station.
- **Sales**: By-products can be sold individually or in bulk. The POS and B2B ordering systems must support by-product sales alongside primary meat sales.

## 4. Cost Allocation & Waste Costing [CONFIRMED/PROPOSED]
- **Cost Allocation**: The input cost of the live bird must be allocated across the primary meat and saleable by-products. The system should support standard cost allocation percentages (e.g., Meat bears 90% of cost, By-products bear 10%) [PROPOSED].
- **Waste Cost Tracking**: The cost associated with waste disposal (e.g., paying for feather removal) must be tracked and factored into the overall processing overhead costs (CLIENT-121).


---


# Live vs Processed Sales

## 1. Core Principle [CONFIRMED]
The fundamental business rule for Sri Murugan Poultry & Agro Group is: 
"When we sell live, the customer takes the processing loss. When we sell processed, WE take the processing loss" (CLIENT-127).

## 2. Selling Methods [CONFIRMED]

### 2.1 Live Sale (LIVE_PRICE)
- **Definition**: Customer buys the bird based on its live weight (CLIENT-107).
- **Processing**: The customer handles processing, or it is processed post-sale where the loss is borne entirely by the customer (CLIENT-108).
- **Example**: 1 kg live chicken × ₹X/kg = ₹X. 
- **Inventory Impact**: Deducts directly from live bird inventory. No processing loss is absorbed by the business.

### 2.2 Processed Sale (PROCESSED_PRICE)
- **Definition**: Customer buys the final cleaned meat weight (CLIENT-109).
- **Processing**: The business processes the bird to yield the requested meat weight and bears the loss (CLIENT-110).
- **Example**: Customer orders 1 kg meat. The business uses a 1.35 kg live bird. The processing loss is 0.35 kg. The customer is billed for 1 kg at the processed rate.
- **Inventory Impact**: Deducts 1.35 kg from live bird inventory, creates 1.0 kg meat inventory + by-products, records 0.35 kg as processing loss/waste.

## 3. Order Management [CONFIRMED]
- Every customer order MUST explicitly specify the selling mode: LIVE or PROCESSED.
- Pricing engines must strictly fetch the `LIVE_PRICE` or `PROCESSED_PRICE` based on this selection.
- Any change in the mode after processing has started requires a supervisor override.

## 4. Cost Calculation & Profitability [CONFIRMED]
- **Cost Separation**: The system must maintain separate cost calculations for live vs. processed items. Processed costs must include the raw material cost (live bird), absorbed processing loss, direct labor, and overhead (CLIENT-122).
- **Profitability Comparison**: Management requires a dedicated P&L report comparing the profitability of selling live vs. selling processed (CLIENT-122). The report must answer: "Is selling live more profitable than selling processed for a given batch/period?"

## 5. Billing & Invoicing [PROPOSED]
- Invoices for PROCESSED sales should optionally show the expected yield or just the final meat weight based on customer preferences, but the internal system must always link the invoice to the input live weight for financial reconciliation.


---


# Loss, Waste, and Damage Management

## 1. Processing Loss Categories [CONFIRMED]
To accurately calculate yields and costs, processing losses must NOT be generalized. The system must track the following distinct categories (CLIENT-080):
- Blood Loss
- Feather Loss
- Skin Loss
- Cleaning Loss
- Trimming Loss
- Cutting Loss
- Bone/Offal Loss
- Water/Drip Loss
- Damaged Portion
- Rejected Portion
- Other (Company must be able to add new custom loss reasons)

## 2. Waste vs. By-Product Classification [CONFIRMED]
- **Configuration**: The classification of an output as "Waste" (e.g., feathers, blood) or "Saleable By-Product" (e.g., liver, feet) must be dynamic and configurable by the company (CLIENT-120).
- **Impact**: Waste absorbs costs or requires disposal fees, while saleable by-products generate revenue and offset processing costs.

## 3. Wastage & Approvals [CONFIRMED]
- **Wastage Reasons**: Spoilage, Expired, Damaged, Processing Waste, Storage Waste, Transport Waste, Customer Return Waste, Contamination, Cleaning Waste, Other (CLIENT-094).
- **Approval Workflow**: High-value wastage requires a strict approval matrix (CLIENT-095):
  1. **Entry**: Worker enters the wastage details.
  2. **Verification**: Supervisor verifies the physical waste.
  3. **Approval**: Manager approves the entry in the system.
  4. **Adjustment**: System automatically adjusts inventory.
  5. **Audit**: The entire chain is logged for audit purposes.

## 4. Damage & Rejection Handling [CONFIRMED]
- **Bird Statuses**: Available, Damaged, Rejected, Disposed, Sold at Reduced Rate (CLIENT-089).
- **Death Sources**: Mortality must track the source: Farm, Transit, Processing Holding Area (CLIENT-088).
- **Rejected Birds**: Birds rejected during QC or processing must be categorized for: Return to supplier/farm, Waste disposal, Rework, or Alternative Sale (e.g., sold for pet food) (CLIENT-090).

## 5. Returns and Cancellations [CONFIRMED]
- **Returns (CLIENT-091, 125)**: Customer returns must be evaluated for quality. Based on QC, returns impact inventory as either 'Restocked' (if safe) or 'Waste/Spoilage' (if unsafe).
- **Order Cancellation (CLIENT-092, 093, 124)**: If an order is cancelled post-processing:
  - If customized (e.g., specific cuts), the meat goes to 'Rework' or 'General Stock'.
  - The processing loss is already incurred; the cost must be reallocated to the general inventory or marked as a business loss for the day.


---


# Processing Management

## 1. Overview
The processing module handles the core transformation of live birds into processed meat, by-products, and waste. It tracks the operational workflow, staff assignment, and order processing queues.

## 2. Processing Stages [CONFIRMED]
The system must support and track the following sequential processing stages for every order/batch (CLIENT-106):
- **Bird Selection**: Allocating specific live birds to an order.
- **Live Weight**: Recording the pre-processing weight.
- **Slaughter**: Initial processing step.
- **Defeathering**: Removal of feathers (recorded as loss/waste).
- **Cleaning**: Internal cleaning and separation of offal.
- **Cutting**: Transforming the whole bird into specified product forms (CLIENT-102, CLIENT-103).
- **Packing**: Final packaging based on customer preference.
- **QC**: Quality control check before dispatch (CLIENT-149).
- **Dispatch**: Readying the product for delivery.

## 3. Product Forms & Customization [CONFIRMED]
- The system must capture product forms: Live, Whole Cleaned, Curry Cut, Skinless, Boneless, Breast, Leg, Wings, Custom Cut (CLIENT-102, CLIENT-118).
- The same structure applies across species: Chicken, Country Chicken, Duck, Quail, Turkey (CLIENT-103).
- Customer-specific cutting preferences must be captured on the order and presented to the cutting staff.

## 4. One-to-Many Transformation [CONFIRMED]
- **Transformation Logic**: A single bird input results in multiple outputs: Meat (Primary), By-products (Liver, Gizzard, Skin, Feet, etc.), and Waste/Loss (Blood, Feathers, offal) (CLIENT-081, CLIENT-082, CLIENT-105).
- Processing batches must link the original live bird inventory to the resulting multiple product inventories.

## 5. Processing Queue Management [CONFIRMED]
- The system must manage a priority queue capable of handling 20+ simultaneous orders (CLIENT-146).
- **Queue Statuses**: Pending → Assigned → Processing → QC → Packed → Ready → Dispatched → Completed (CLIENT-146).
- Supervisors must have a dashboard to prioritize and assign orders based on delivery schedules.

## 6. Staff Assignment & Tracking [CONFIRMED]
- **Assignment**: Each processing stage or entire order must be assignable to specific staff members (CLIENT-147).
- **Time Tracking**: The system must track the processing time (start to finish) for each order to measure efficiency (CLIENT-148).
- **Performance**: Metrics on staff processing speed and yield must be available for management review.

## 7. Processing Capacity [PROPOSED]
- The system should define maximum daily processing capacities across the 42 sheds/processing centers.
- Alerts should trigger if daily queued orders exceed safe processing limits, allowing proactive scheduling.


---


# Quality Management & Traceability

## 1. Quality Control (QC) Checkpoints [CONFIRMED]
- **Checkpoints**: Every processed order must pass through a designated QC station before dispatch.
- **Criteria**: The QC check must validate (CLIENT-149):
  - Accurate Weight
  - Correct Product Form
  - Correct Cut Type
  - Cleanliness (no remaining feathers/blood)
  - Proper Packaging

## 2. QC Pass/Fail Workflow [CONFIRMED]
- **Fail Workflow**: If a product fails QC, the system must strictly block dispatch (CLIENT-150).
- **Resolution**: Failed products must be routed to one of three paths:
  - **Rework**: Sent back to the cutting/cleaning station.
  - **Reject**: Downgraded to a lesser product (e.g., pet food).
  - **Waste**: Sent for disposal.
- **Rework Tracking**: The cost and time associated with rework must be tracked against the processing batch (CLIENT-151).

## 3. Storage and Shelf Life [CONFIRMED]
- **Cold Storage**: The system must manage cold storage inventory independently from live inventory (CLIENT-152).
- **Shelf Life Tracking**: Every processed batch must have a calculated expiry date based on product type and storage conditions (CLIENT-153).
- **Inventory Rotation**: The system must enforce FIFO (First In, First Out) or FEFO (First Expired, First Out) rules for picking processed inventory from cold storage (CLIENT-154).

## 4. End-to-End Batch Traceability [CONFIRMED]
- To ensure food safety and accountability, the system must provide bidirectional traceability (CLIENT-155).
- **Traceability Chain**: 
  Customer Order ← Invoice ← Processing Batch ← Live Bird Batch ← Farm ← Shed.
- In the event of a quality issue, management must be able to trace a piece of meat back to the specific shed and feed batch it originated from.


---


# Weight Reconciliation & Yield Management

## 1. Fundamental Equation [CONFIRMED]
The system must enforce and validate the following reconciliation formula for every processing batch and order (CLIENT-097, CLIENT-123, CLIENT-126):
**Input Live Weight = Saleable Product + By-products + Waste + Processing Loss**

## 2. Yield Management [CONFIRMED]
- **Yield Calculation**: Yield % = (Saleable Weight / Input Live Weight) × 100.
- **Example**: 1.35 kg live bird yielding 1.00 kg meat equals a 74.07% yield (CLIENT-100, CLIENT-101).
- **Expected Yields**: The company defines expected yield percentages per species and product form.
- **Alerts**: The system must trigger alerts if the actual yield falls significantly below or above the expected yield parameters.

## 3. Per-Order Weight Tracking [CONFIRMED]
For every order, the following metrics must be recorded and visible (CLIENT-115):
- Requested Weight (Customer order)
- Input Live Weight (Actual birds used)
- Processing Loss (Categorized)
- Expected Yield
- Actual Yield
- Final Saleable Weight
- Accepted Weight (by customer)
- Rejected Weight (if any)
- Excess/Short Weight

## 4. Overweight & Underweight Handling [CONFIRMED]
- **Scenario (CLIENT-083, CLIENT-086)**: A customer requests 1 kg. A 1.35 kg bird yields 1.02 kg. Multiple birds may be used for larger orders (e.g., 5 kg order fulfilled with 4 birds).
- **Overweight**: If the final weight is higher than requested, the system prompts: Customer accepts (and is billed for) the excess, OR the excess is trimmed and returned to stock (CLIENT-084).
- **Underweight**: If the final weight is lower, the system warns the processor. The processor must add an additional piece or negotiate a replacement/short bill with the customer (CLIENT-085).

## 5. Mismatch & Loss Alerts [CONFIRMED]
- **Reconciliation Report**: A daily report must summarize input vs. output weights across the processing center (CLIENT-126).
- **Abnormalities**: The system must detect missing weight (theft/unrecorded loss) or excess weight (data entry error/water retention) and flag it for supervisor review.
- **Transport Weight Loss**: The system must account for weight lost during transport (shrinkage) between the farm and the processing center, keeping it distinct from processing loss (CLIENT-087).

=============================================================

# MODULE: 06-egg-business


=============================================================




---


# Egg Business Management

## 1. Overview
This module covers the end-to-end lifecycle of the egg business, including production (own farms), purchasing, grading, inventory, sales, and delivery.

## 2. Egg Sources & Collection
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-001 | The system must distinguish between eggs from **Own Layer Farms** and **External Suppliers** (CLIENT-046). | [CONFIRMED] |
| EGG-002 | The system must support daily morning and evening egg collection tracking (CLIENT-047). | [CONFIRMED] |
| EGG-003 | Collection records must capture: Date, Farm, Shed, Flock, Shift, Total Quantity, Good Eggs, Broken Eggs, Damaged Eggs, and Remarks (CLIENT-047). | [CONFIRMED] |
| EGG-004 | Collection records must automatically update farm/collection room inventory (CLIENT-050). | [CONFIRMED] |

## 3. Grading & Units
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-005 | Eggs must be graded by size (Small, Medium, Large, Extra Large) (CLIENT-048-049). | [CONFIRMED] |
| EGG-006 | Eggs must be graded by quality (Good, Broken, Damaged, Rejected) (CLIENT-048-049). | [CONFIRMED] |
| EGG-007 | Egg units (Piece, Tray, Carton, Crate, Box, Kg) must be fully configurable and NOT hard-coded (CLIENT-056-057). | [CONFIRMED] |
| EGG-008 | The system must support configurable unit conversions (e.g., 1 Tray = 30 Pieces, 1 Carton = 7 Trays) (CLIENT-056-057). | [CONFIRMED] |

## 4. Inventory, Storage & Transfers
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-009 | Grade-wise stock must be tracked across multiple locations (Farm, Central Warehouse, Dealer) (CLIENT-050-051). | [CONFIRMED] |
| EGG-010 | The system must track egg freshness using collection date and storage date, enforcing FIFO stock rotation (CLIENT-060). | [CONFIRMED] |
| EGG-011 | Transfer requests must be supported: Farm → Collection → Grade → Transfer Request → Egg Warehouse → Receive → Stock Update (CLIENT-068). | [CONFIRMED] |
| EGG-012 | Stock reconciliation formula: Opening + Purchase + Production - Sales - Breakage - Damage ± Adjustment = Closing (CLIENT-058). | [CONFIRMED] |

## 5. Procurement & Sales
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-013 | Egg purchase workflow: PO → Receipt → QC → Grade → Stock → Payment (CLIENT-052). | [CONFIRMED] |
| EGG-014 | Customer types for sales include: Dealers, shops, hotels, bakeries, restaurants, wholesalers, direct (CLIENT-053). | [CONFIRMED] |
| EGG-015 | Egg sales workflow: Order → Rate applied → Dispatch → Invoice → Delivery → Payment (CLIENT-053). | [CONFIRMED] |
| EGG-016 | Customer returns must undergo QC to classify as Good (back to stock) or Damaged (wastage) (CLIENT-059). | [CONFIRMED] |
| EGG-017 | Direct delivery must support routes: Farm → Warehouse → Dealer; Farm → Dealer; Supplier → Warehouse → Dealer (CLIENT-069). | [CONFIRMED] |
| EGG-018 | The system must handle stock shortage alerts during order entry (e.g., Order 10k, Available 7.5k) (CLIENT-072-073). | [CONFIRMED] |

## 6. Dispatch & Payments
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-019 | Dispatch tracking must include: Vehicle trip, driver, customer, quantity, route, fuel, delivery status (CLIENT-062-063). | [CONFIRMED] |
| EGG-020 | Payment methods must include Cash, UPI, Bank, Credit, Partial payment, Advance (CLIENT-064-065). | [CONFIRMED] |
| EGG-021 | Customer ledger formula: Opening Balance + Sales - Payments - Credit Notes ± Adjustments = Outstanding (CLIENT-064-065). | [CONFIRMED] |

## 7. Profitability & Dashboard
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-022 | Profitability MUST differentiate between OWN_PRODUCTION, PURCHASED, TRANSFERRED, and RETURNED sources (CLIENT-066-067). | [CONFIRMED] |
| EGG-023 | Egg Profit Formula: Revenue - Purchase/Production Cost - Transport - Packing - Breakage - Other Expenses (CLIENT-066-067). | [CONFIRMED] |
| EGG-024 | The Egg Dashboard must display: Today's Collection/Sales, Current Stock (Grade-wise), Purchase, Revenue, Avg Selling Rate, Breakage %, Outstanding, Profit (CLIENT-071). | [CONFIRMED] |
| EGG-025 | Standard reports must include: Daily collection, production/stock by grade/farm/shed, rate history, reconciliation (CLIENT-070). | [CONFIRMED] |

## 8. Future Scope
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-026 | IoT integration for temperature monitoring and alert system (CLIENT-061). | [FUTURE] |
| EGG-027 | Barcode/QR integration, automatic grading machine integration, weighing integration (CLIENT-074). | [FUTURE] |
| EGG-028 | Dealer portal, WhatsApp ordering, mobile sales, and payment links (CLIENT-074). | [FUTURE] |

=============================================================

# MODULE: 07-product-pricing


=============================================================




---


# Pricing Engine

## 1. Overview
The pricing engine governs the valuation, dynamic rate setting, and contractual pricing logic for all products across the diverse customer base.

## 2. Price Models & Units
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRC-001 | The system must support two primary price models: LIVE_PRICE (based on live weight) and PROCESSED_PRICE (based on meat weight) (CLIENT-110). | [CONFIRMED] |
| PRC-002 | The system must support distinct pricing units per product type (e.g., Chicken → ₹/kg, Egg → ₹/piece, Duck → ₹/bird) (CLIENT-143). | [CONFIRMED] |
| PRC-003 | Sales orders must allow users to select the applicable selling mode (Live vs Processed) determining which price model applies (CLIENT-110). | [CONFIRMED] |

## 3. Dynamic & Customer-Specific Rates
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRC-004 | Different rates must be maintainable per customer type (Retail, Hotel, Restaurant, Dealer, Wholesale) (CLIENT-117). | [CONFIRMED] |
| PRC-005 | Product form (Live, Cleaned, Boneless, Skinless) must directly dictate the base price applied (CLIENT-117). | [CONFIRMED] |
| PRC-006 | The system must support daily or same-day market rate changes across products (CLIENT-054-055). | [CONFIRMED] |
| PRC-007 | The system must maintain historical rates and effective dates, ensuring transparency into past pricing (CLIENT-054-055). | [CONFIRMED] |
| PRC-008 | The system must generate rate change alerts to relevant sales staff and management (CLIENT-072-073). | [CONFIRMED] |

## 4. Rate Approvals & Contracts
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRC-009 | Proposed rate changes by sales personnel require Manager approval before activation (CLIENT-140). | [CONFIRMED] |
| PRC-010 | The system must support Monthly Contracts binding Customer, Product, Selling Mode, Rate, Dates, Min/Max Qty, and Payment Terms (CLIENT-138). | [CONFIRMED] |
| PRC-011 | The system must honor the concept of a "Price Lock", where the rate at order creation is preserved despite subsequent market changes (CLIENT-144). | [CONFIRMED] |

## 5. Discounts & Order Constraints
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRC-012 | Discounts must be supported flexibly: Percentage, Per Kg, Fixed Amount, Promotional, or Customer-specific (CLIENT-141). | [CONFIRMED] |
| PRC-013 | The system must enforce configurable minimum order quantities per product or customer (CLIENT-142). | [CONFIRMED] |


---


# Product Management

## 1. Overview
The product management module establishes the foundational master data for all physical goods handled by Sri Murugan Poultry & Agro Group, including live birds, processed meat, by-products, and various units of measure.

## 2. Species & Bird Types
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRD-001 | Bird types/species (Chicken, Country Chicken/Naatu Kozhi, Quail, Duck, Turkey, Other) MUST be configurable and NOT hard-coded (CLIENT-075). | [CONFIRMED] |
| PRD-002 | The system must track live bird stock by both bird quantity (count) and live weight (CLIENT-076). | [CONFIRMED] |

## 3. Product Forms & Variants
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRD-003 | Products must be structured hierarchically: Species → Forms (e.g., Chicken → Live, Whole Cleaned, Curry Cut, Skinless, Boneless) (CLIENT-102-103, 118). | [CONFIRMED] |
| PRD-004 | The system must support capturing custom cut requirements from customers (e.g., "medium pieces", "1 kg packets") (CLIENT-102-103, 118). | [CONFIRMED] |
| PRD-005 | The system must map "One Bird to Multiple Products", separating output into Meat, Breast, Leg, Wings, Liver, Gizzard, Feet, Skin, and Waste (CLIENT-105, 119). | [CONFIRMED] |

## 4. Sales Units & Measurements
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRD-006 | Sales units must be highly configurable per product: Bird, Piece, Kg, Tray, Box, Carton, Crate (CLIENT-077). | [CONFIRMED] |
| PRD-007 | The system must support mixed unit sales for the same product based on customer preference (e.g., by count vs. by kg) (CLIENT-077). | [CONFIRMED] |

=============================================================

# MODULE: 08-supply-chain


=============================================================




---


# Supply Chain: Customer & Dealer Management

## 1. Overview
Manages relationships, credit limits, and financial standing for the 45+ dealers and 120+ direct customers/shops. Customers and Dealers are treated as distinct entities with specific business rules.

## 2. Dealer Management [CONFIRMED] (CLIENT-016)
*   **Entity Structure:** One dealer can operate or supply multiple shops/locations.
*   **Profile Data:** Contact details, Address, assigned Sales Rep.
*   **Commercial Terms:** Credit limit, customized payment terms, dealer-specific rate charts.
*   **Tracking:** Outstanding balance, Payment history, Sales volume history, Return frequency.

## 3. Customer Management [CONFIRMED] (CLIENT-017)
*   **Profile Data:** Direct B2B (Hotels, Retailers) and B2C customers.
*   **Tracking:** Order frequency, Sales volume, Payment history, Outstanding dues, Return history.
*   **Pricing:** Customer-specific rate negotiation and tracking [INFERRED].

## 4. Credit Limit Controls [CONFIRMED] (CLIENT-137)
The system must enforce credit limits dynamically during order entry.
*   **Scenario:**
    *   Credit Limit = ₹1,00,000.
    *   Current Outstanding = ₹95,000.
    *   New Order Value = ₹15,000.
    *   *System Action:* Flags that the limit is exceeded (Total would be ₹1,10,000).
*   **Policy Options:** The system must support configurable responses:
    1.  **Hard Block:** Cannot save the order.
    2.  **Soft Block:** Allow saving with a warning, but suspend processing.
    3.  **Override:** Allow processing only with explicit Manager Approval.

## 5. Profitability & Analytics [PROPOSED]
*   **Dealer/Customer Profitability:** Report on net margin per customer after discounts, transport costs, and return losses.
*   **Aging Analysis:** 30/60/90 day outstanding reports for credit control.


---


# Supply Chain: Delivery & Distribution

## 1. Overview
Manages the logistics of getting finished products (live birds, processed meat, eggs) to dealers and customers using the fleet of 18 vehicles, ensuring optimal routing and accurate delivery tracking.

## 2. Delivery Scheduling [CONFIRMED] (CLIENT-131)
*   **Delivery Slots:** Standardized slots (Morning, Afternoon, Evening) and Custom time arrangements.
*   **Planning:** Orders are allocated to slots based on customer preference and geographical area.

## 3. Vehicle Capacity Planning [CONFIRMED] (CLIENT-132)
*   **Constraint Checking:** The system must validate total order weight/volume against assigned vehicle capacity.
*   **Scenario:**
    *   Vehicle Capacity = 500 kg.
    *   Assigned Orders = 650 kg.
    *   *System Action:* Flags capacity exceeded.
*   **Resolution Options:**
    *   Assign a second vehicle.
    *   Split the delivery (partial dispatch).
    *   Reschedule non-urgent orders to the next slot.

## 4. Route Planning [CONFIRMED] (CLIENT-133)
*   **Consolidation:** Group customers in the same geographical area onto the same route.
*   **Waypoint Mapping:** Warehouse → Route A → Shop 1 → Hotel 2 → Dealer 3 → Customer 4.
*   **Optimization [PROPOSED]:** Sequence stops to minimize distance and travel time.

## 5. Delivery Proof & Execution [CONFIRMED] (CLIENT-134)
Delivery personnel must capture proof of delivery (POD) via mobile interface:
*   Delivered quantity / weight.
*   Receiver's name and signature.
*   Photo proof (for closed shops or damaged goods).
*   GPS coordinates of the delivery location.
*   Exact timestamp of delivery.

## 6. Short/Over Delivery & Weight Variance [CONFIRMED] (CLIENT-135-136)
The system must handle discrepancies between invoiced weight and actual delivered weight (especially critical for meat/live birds).
*   **Short Delivery:**
    *   *Scenario:* Customer ordered 10 kg, delivered 9.8 kg = 0.2 kg short.
    *   *Requirement:* Log reason (e.g., normal moisture/weight loss, missing quantity, damage).
*   **Over Delivery:**
    *   *Scenario:* Customer ordered 10 kg, delivered 10.2 kg.
    *   *Requirement:* Track variance. System must decide (based on policy) whether to bill for accepted weight (10.2 kg) or strictly ordered weight, and adjust inventory accordingly.


---


# Supply Chain: Inventory Management

## 1. Overview
A unified inventory architecture to manage all items across the 2 warehouses and 8 farms, including Feed, Medicine, Vaccine, Equipment, Consumables, Packaging, Chicken, Eggs, By-products, and other supplies.

## 2. Warehouse Operations [CONFIRMED] (CLIENT-018)
The system must log all stock movements:
*   **Opening Stock:** Initial balance.
*   **Purchase:** Goods received via GRN.
*   **Transfer:** Movement between locations (Warehouse ↔ Farm).
*   **Issue:** Consumption by sheds/batches.
*   **Return:** Unused items returned from sheds.
*   **Damage/Wastage:** Stock deemed unusable.
*   **Adjustment:** Corrections post-audit.
*   **Closing Stock:** Final calculated balance.

## 3. Warehouse Transfer Workflow [CONFIRMED] (CLIENT-019)
*   **Process:** Warehouse 1 → Transfer Request → Approval → Dispatch → Farm 3 → Receive → Stock Update.
*   **Partial Receiving:** Farm 3 can receive less than dispatched (e.g., if damaged in transit), with variance tracked.

## 4. Stock Reconciliation [CONFIRMED] (CLIENT-096)
*   **Formula:** Opening + Purchase + Production + Returns + Transfers(In) - Sales - Processing - Death - Damage - Wastage - Transfers(Out) = Expected Closing.
*   **Comparison:** The system must generate a report comparing the *Expected Closing Stock* against the *Physical Stock* entered during counts.

## 5. Physical Stock Count & Auditing
*   **Periodic Count [CONFIRMED] (CLIENT-165):** Warehouse staff must enter physical count data periodically.
*   **Variance Report [CONFIRMED]:** System highlights differences between calculated and physical stock.
*   **Stock Adjustment [CONFIRMED] (CLIENT-164):** Any adjustment requires a mandatory reason, managerial approval, and leaves an audit trail.

## 6. Shrinkage & Loss Management
*   **Normal vs. Abnormal [CONFIRMED] (CLIENT-166):** System must categorize losses. Normal shrinkage (e.g., moisture loss in feed) is absorbed; abnormal loss requires investigation.
*   **Theft/Suspicious Loss [CONFIRMED] (CLIENT-167):** Large differences must trigger immediate management alerts.
    *   *Example:* Expected 500 kg, Physical 450 kg = 50 kg abnormal loss (Alert Triggered).

## 7. Inventory Policies [PROPOSED]
*   **FIFO/FEFO:** Mandatory First-In-First-Out for feed and First-Expired-First-Out for medicines/vaccines to minimize expiry wastage.
*   **Reorder Alerts:** Low stock notifications based on lead time and consumption rate.


---


# Supply Chain: Purchase & Supplier Management

## 1. Overview
This module manages the entire procurement lifecycle from identifying a requirement to making the final payment to the supplier, alongside comprehensive supplier tracking and performance evaluation.

## 2. Supplier Management [CONFIRMED] (CLIENT-021)
### 2.1 Supplier Categories
*   **Feed Supplier:** Raw materials and finished feed.
*   **Chick Supplier:** Day-old chicks (DOC).
*   **Medicine Supplier:** Medicines, vaccines, and supplements.
*   **Equipment Supplier:** Farm and processing equipment.
*   **Service Provider:** Transport, maintenance, etc.

### 2.2 Supplier Profile & History
*   **Core Details:** Name, Contact, Address, Tax ID, Bank Details.
*   **Performance Metrics:** Delivery performance (on-time rate), Quality history (rejection rates).
*   **Financial Tracking:** Rate history, Payment history, Outstanding balances.

## 3. Purchase Workflow [CONFIRMED] (CLIENT-020)
The standard procurement lifecycle must strictly follow these stages:
1.  **Requirement Generation:** Department identifies need.
2.  **Purchase Request (PR):** Formal request creation.
3.  **Quotation:** Request and receive quotes from suppliers.
4.  **Supplier Selection:** Selection based on rate, quality, and terms.
5.  **Purchase Order (PO):** Formal PO detailing Rate, Tax, Quantity, Discount, Transport, Payment terms, Due date.
6.  **Approval:** Managerial approval of PO.
7.  **Goods Receipt Note (GRN):** Physical receipt of goods.
8.  **Quality Control (QC):** Inspection of received goods.
9.  **Stock Update:** Addition of accepted goods to inventory.
10. **Supplier Invoice:** Registration of the supplier's bill.
11. **Payment:** Execution and recording of payment.

## 4. Purchase QC & Rejection [CONFIRMED] (CLIENT-162)
*   **Partial Acceptance:** System must handle scenarios where a portion of the delivery is rejected.
    *   *Example:* Received 1,000 kg, Accepted 930 kg, Rejected 70 kg.
*   **Invoice Adjustment:** The supplier invoice for the full 1,000 kg must be automatically flagged for adjustment (Debit Note) for the 70 kg rejected.

## 5. Supplier Return Workflow [CONFIRMED] (CLIENT-163)
*   **Return Processing:** Formal workflow to dispatch rejected or damaged goods back to the supplier.
*   **Financial Impact:** Automatic generation of Debit Notes against the supplier's outstanding balance.

## 6. Future & Proposed Enhancements
*   **Supplier Portal [PROPOSED]:** A self-service portal for suppliers to submit quotes and view POs/Payments.
*   **Automated Reordering [PROPOSED]:** Auto-generate PRs based on reorder levels and lead times.


---


# Supply Chain: Sales Management

## 1. Overview
Manages the complete sales lifecycle from order capture to delivery and invoicing, supporting various order types and handling modifications and returns.

## 2. Sales Workflow [CONFIRMED] (CLIENT-015)
*   **Standard Flow:** Order Received (Dealer/Customer) → Approval (if required) → Dispatch Planning → Invoicing → Payment Collection → Outstanding Update.

## 3. Order Types [CONFIRMED] (CLIENT-128-130)
*   **Advance Order:** Placed days/weeks ahead.
*   **Same-day Order:** Placed for immediate delivery.
*   **Scheduled/Recurring Order (CLIENT-129):** Standing orders with variable schedules.
    *   *Example:* Hotel requires 20 kg daily, except Sunday (30 kg).
*   **Emergency Order:** Urgent requirements bypassing standard cut-offs.
*   **Cut-off Time Rule:** Orders placed before the daily cut-off are processed in today's slot; orders after are moved to the next available slot.

## 4. Order Lifecycle [CONFIRMED] (CLIENT-111, 145-146)
*   **Stages:** Draft → Confirmed → Allocated (Stock reserved) → Processing (Catching/Dressing) → QC → Packed → Ready for Dispatch → Dispatched → Delivered → Invoiced → Paid → Closed.
*   **Modification Rules:**
    *   *Before Processing:* Simple edits allowed.
    *   *After Processing:* Requires managerial approval as birds may already be processed.

## 5. Order Cancellation [CONFIRMED] (CLIENT-092-093, 124)
*   **Full Cancellation (Pre-processing):** No loss recorded; stock is de-allocated.
*   **Full Cancellation (Post-processing):** Creates a loss/surplus; requires immediate reallocation to other orders or cold storage.
*   **Partial Cancellation:** Allow reduction in quantity.
    *   *Example:* Ordered 10 kg, Cancelled 4 kg, Remaining 6 kg to be processed.

## 6. Sales Returns [CONFIRMED] (CLIENT-091, 125)
*   **Process:** Customer returns goods → QC Inspection.
*   **Outcomes:**
    *   *Good Condition:* Return to usable stock.
    *   *Damaged:* Mark as waste/loss.
    *   *Reprocessable:* Send for further processing (e.g., downgrade to pet food).
    *   *Rejected:* Complete loss, financial impact handled based on liability.

=============================================================

# MODULE: 09-operations


=============================================================




---


# 9.1 Employee & Payroll Management

## 9.1.1 Overview
This module handles the management of the 85+ employees across farms, warehouses, and the office, managing attendance, and payroll processing for Sri Murugan Poultry & Agro Group.

## 9.1.2 Employee Management (CLIENT-022)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| EMP-01 | Employee Profile | System must store employee details: Name, Contact, Address, Government ID, Emergency Contact. | [CONFIRMED] |
| EMP-02 | Employee Types/Designations | Must support categories: Office, Farm, Warehouse, Driver, Sales, Accounts, Management. | [CONFIRMED] |
| EMP-03 | Farm/Location Assignment | Ability to assign employees to specific farms (out of the 8), warehouses, or the central office. | [CONFIRMED] |
| EMP-04 | Employment Details | Track joining date, base salary, department, and current status (active/inactive). | [CONFIRMED] |

## 9.1.3 Attendance Management (CLIENT-023)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| ATT-01 | Manual Attendance Entry | Supervisors/managers must be able to manually record attendance for farm workers who do not currently have biometric access. | [CONFIRMED] |
| ATT-02 | Leave Management | Track different types of leaves and their impact on payroll. | [CONFIRMED] |
| ATT-03 | Overtime Tracking | Record extra hours worked for overtime calculation. | [CONFIRMED] |
| ATT-04 | Modern Attendance Integration | Support for mobile attendance, GPS tracking for field staff, QR code scanning, and Biometric device integration. | [FUTURE] |

## 9.1.4 Payroll Processing (CLIENT-024)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| PAY-01 | Payroll Calculation Formula | System must calculate Net Salary = Basic Salary + Overtime + Allowance - Advance - Deduction. (Based on Attendance). | [CONFIRMED] |
| PAY-02 | Salary Components | Define and manage flexible salary components (Basic, Allowances, specific deductions, PF/ESI). | [TO BE CONFIRMED] |
| PAY-03 | Advance Management | Track employee salary advances and automatically deduct agreed installment amounts during payroll processing. | [CONFIRMED] |
| PAY-04 | Salary History | System must preserve historical salary records and changes to employee compensation. | [CONFIRMED] |
| PAY-05 | Payslip Generation | Ability to generate and distribute payslips to employees. | [PROPOSED] |


---


# 9.3 Financial Management & Profitability

## 9.3.1 Overview
This module governs the core financial tracking, advanced profitability analytics across various cost centers, complaint management, and strict approval workflows for the group.

## 9.3.2 Core Financial Tracking (CLIENT-026, 176)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| FIN-01 | Income & Expense Management | Track all sources of income and categorize expenses across operations (Vehicle expense, Farm expense, Employee advances). | [CONFIRMED] |
| FIN-02 | AP/AR Management | Track Customer outstanding (Accounts Receivable) and Supplier outstanding (Accounts Payable). | [CONFIRMED] |
| FIN-03 | Payment & Receipt | Record all payments made and receipts collected, linked to invoices/bills. | [CONFIRMED] |
| FIN-04 | Cost Centers | Allocate expenses to specific cost centers: Farm, Warehouse, Processing, Sales, Transport, Administration. | [CONFIRMED] |
| FIN-05 | Cash Flow Management | Provide visibility into cash inflows and outflows for liquidity planning. | [PROPOSED] |
| FIN-06 | Tax Configuration | Ability to handle applicable tax structures for purchases and sales. | [TO BE CONFIRMED] |

## 9.3.3 Profitability Analytics (CLIENT-027, 177, 178, 179, 122, 066)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| PRF-01 | Batch Profitability | Formula: Revenue - (Chick Cost + Feed Cost + Medicine Cost + Vaccine Cost + Labour Cost + Electricity + Water + Transport + Farm Expense + Overhead) = Actual Batch Profit. Identifies if the batch performed well or not. | [CONFIRMED] |
| PRF-02 | Farm Profitability | Formula: Farm Revenue - Farm Direct Cost - Allocated Cost = Farm Profit. | [CONFIRMED] |
| PRF-03 | Dealer Profitability | Formula: Dealer Revenue - Product Cost - Discount - Transport - Credit Cost = Dealer Contribution. | [CONFIRMED] |
| PRF-04 | Customer Profitability | Assess net profit per customer factoring in volume, discounts, and credit behavior. Answers: "Is this customer truly profitable?" | [CONFIRMED] |
| PRF-05 | Live vs Processed Comparison | Management dashboard view comparing Live Sale Profit vs Processed Sale Profit to guide sales strategy. | [CONFIRMED] |
| PRF-06 | Egg Profitability | Formula: Egg Revenue - Cost - Transport - Packing - Breakage = Egg Profit. | [CONFIRMED] |
| PRF-07 | Sales Channel Profitability | Analyze profitability across different sales routes (Retail vs. Wholesale/B2B vs Dealers). | [INFERRED] |
| PRF-08 | Processing Operation Profitability | Track the cost of processing operations versus the premium charged for processed chicken. | [INFERRED] |
| PRF-09 | Product Profitability | Profitability breakdown across different product types (Country Chicken, Quail, Duck, Turkey). | [INFERRED] |

## 9.3.4 Adjustments, Returns & Complaints (CLIENT-091, 156-161)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| ADJ-01 | Sales Return & Refund Workflow | Workflow: Sales Invoice → Return → Approved Refund → Payment. Auto-update finance records. | [CONFIRMED] |
| ADJ-02 | Credit Note | Issue credit notes to customers (e.g., Original Invoice ₹10,000, Credit Note ₹500. Outstanding reduces to ₹9,500). | [CONFIRMED] |
| ADJ-03 | Debit Note | Issue debit notes for supplier discrepancy adjustments. | [CONFIRMED] |
| CMP-01 | Complaint Logging | Log Customer, Invoice, Product, Quantity, Batch, Delivery, Reason, Photos. | [CONFIRMED] |
| CMP-02 | Complaint Resolution | Workflow for investigation and resolution. Options: Refund, Replacement, Credit Note, Discount, Reprocess, Reject, No Action. | [CONFIRMED] |
| CMP-03 | Customer Feedback | Capture feedback metrics: Quality, Weight accuracy, Delivery, Packaging, Service ratings. | [CONFIRMED] |

## 9.3.5 Approval Workflows & Audit (CLIENT-031, 032, 168, 169)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| APP-01 | Value-Based Approvals | Purchase `<₹10,000` → Manager; `₹10,000 - ₹50,000` → Company Admin; `>₹50,000` → Owner. Configurable structure. | [CONFIRMED] |
| APP-02 | Transaction Approval Matrix | Approvals required for: Purchase, Sales Discount, Credit Sale, Stock Adjustment, Wastage, Return, Refund, Rate Change, Expense, Salary. | [CONFIRMED] |
| APP-03 | Temporary Delegation | Allow an authorized manager to delegate approval rights temporarily to another authorized manager during leave (period-based). | [CONFIRMED] |
| AUD-01 | Audit Trail | Track who changed what: User, Old Quantity/Value, New Quantity/Value, Reason, Date/Time. | [CONFIRMED] |
| AUD-02 | Data Immutability | Financial records cannot be silently deleted; they must be reversed or voided leaving a clear audit trail. | [CONFIRMED] |


---


# 9.2 Vehicle Management

## 9.2.1 Overview
This module tracks the operations, maintenance, and expenses associated with the fleet of 18 vehicles used for transport and logistics.

## 9.2.2 Vehicle Master (CLIENT-025)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| VEH-01 | Vehicle Profile | Track Vehicle Number, Make, Model, Type (Lorry, Mini truck, Pickup, Bike, Other), and Capacity. | [CONFIRMED] |
| VEH-02 | Ownership Status | Differentiate between Company Owned and Leased/Hired vehicles. | [TO BE CONFIRMED] |
| VEH-03 | Driver Assignment | Assign specific drivers to vehicles, maintaining a history of assignments. | [CONFIRMED] |
| VEH-04 | Compliance Tracking | Track Insurance renewal dates, FC (Fitness Certificate), and Tax validity with alerts for upcoming renewals. | [PROPOSED] |

## 9.2.3 Trip Management (CLIENT-025)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| TRP-01 | Trip Logging | Record trip details: Vehicle, Driver, Origin (e.g., Farm), Destination (e.g., Dealer/Warehouse), Date, Time. | [CONFIRMED] |
| TRP-02 | Distance Tracking | Record starting and ending odometer readings to calculate exact distance covered. | [CONFIRMED] |
| TRP-03 | Trip Purpose | Categorize trips (e.g., Feed Delivery, Live Bird Transport, Processed Chicken Delivery). | [PROPOSED] |

## 9.2.4 Fuel & Expense Tracking (CLIENT-025)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| FLX-01 | Diesel/Fuel Logging | Track fuel purchases: Date, Quantity (Liters), Rate, Total Amount, and Odometer reading at the time of fueling. | [CONFIRMED] |
| FLX-02 | Mileage Calculation | Automatically calculate fuel efficiency (km/l) per vehicle to monitor performance. | [PROPOSED] |
| FLX-03 | Trip-wise Expenses | Record expenses incurred during a trip (Tolls, Driver Bata/Food allowance, Minor repairs). | [CONFIRMED] |
| FLX-04 | Cost Allocation | Allocate trip costs to specific batches, farms, or delivery routes for accurate profitability analysis. | [INFERRED] |

## 9.2.5 Maintenance & Service (CLIENT-025)
| Req ID | Feature | Description | Source |
|---|---|---|---|
| MNT-01 | Service Logs | Record scheduled and unscheduled maintenance, including parts replaced and service costs. | [CONFIRMED] |
| MNT-02 | Maintenance Reminders | System alerts for due services based on kilometers driven or time intervals. | [PROPOSED] |
| MNT-03 | Total Cost of Ownership | Consolidate fuel, maintenance, insurance, and driver costs to calculate the operational cost per kilometer for each vehicle. | [PROPOSED] |

=============================================================

# MODULE: 10-intelligence


=============================================================




---


# 10.4 AI Opportunities & Roadmap

## 1. Overview
The AI Roadmap outlines the phased integration of artificial intelligence and machine learning into the Sri Murugan Poultry & Agro Group system. AI is used to enhance predictability and automation but strictly operates as a recommendation engine.

> [!IMPORTANT]
> **Strict Business Rule:** AI never makes autonomous decisions. All AI outputs are recommendations that require human approval before execution [CONFIRMED]. Furthermore, all AI models must be explainable (Explainable AI) [CLIENT-212].

## 2. Phase-Wise AI Roadmap

### 2.1 Phase 1: Rule-Based Alerts (Foundational)
- **Concept:** Simple threshold-based monitoring.
- **Use Cases:** 
  - Standard breed performance tracking (vs Cobb/Ross standards).
  - Management Alerts: High Mortality, Low Yield, High Wastage, Low Stock, Overdue Payment, High Return, High Damage, Low Margin, Processing Bottleneck, Vehicle Breakdown, Supplier Quality Issue [CLIENT-180].

### 2.2 Phase 2: Historical Analytics (Descriptive & Diagnostic)
- **Concept:** Analyzing past data to identify patterns.
- **Use Cases:**
  - Multi-year trend analysis and benchmarking.
  - Seasonality identification (festivals, business calendars) [CLIENT-170, CLIENT-185-187].
  - Slow-moving and non-moving product identification based on historical velocity [CLIENT-193-195].

### 2.3 Phase 3: ML Predictions (Predictive)
- **Concept:** Machine learning models forecasting future outcomes.
- **Use Cases:**
  - Demand Forecasting: Product, customer, and selling-mode level predictions [CLIENT-206].
  - Mortality and FCR Prediction: Based on feed, weather, and historical batch data.
  - Disease Risk: Early warning based on subtle shifts in water/feed consumption.
  - Stockout / Overstock Prediction [CLIENT-196-199].

### 2.4 Phase 4: AI Agents (Prescriptive & Interactive)
- **Concept:** Advanced LLM and AI agents assisting management.
- **Use Cases:**
  - Natural Language Queries (e.g., "Why did mortality spike in shed 3?").
  - Automated Reorder Drafts (system drafts the PO, human approves).
  - Anomaly Investigation (AI correlates weather, feed batch, and supplier data to explain a yield drop).

## 3. AI Use Case Examples

| Use Case | Description | Input Data Needed | Expected Benefit |
| :--- | :--- | :--- | :--- |
| **Explainable Demand Prediction** | Predicts weekly product demand with explanations (e.g., "Demand up due to festival"). | Historical sales, festival calendar, forward bookings, weather. | Prevents stockouts/overstock, optimal resource planning. |
| **New Product Lifecycle Estimation** | Predicts demand curve for newly introduced products. | Historical data of similar products, manual baseline estimates. | Reduces risk of dead stock for new launches. |
| **Dynamic Reorder Recommendation** | Recommends optimal purchase orders considering dynamic variables. | Current stock, forecasted demand, supplier lead time, safety stock. | Optimizes working capital and ensures product availability. |
| **Capacity Bottleneck Detection** | Simulates future scenarios to predict infrastructure strain. | Processing capacity, fleet size, employee counts, demand forecasts. | Allows proactive hiring/investment rather than reactive crisis management. |


---


# 10.1 Demand Forecasting Module

## 1. Overview
The Demand Forecasting module transforms historical data into predictive insights. It shifts the system from reactive reporting to proactive planning (Past → Current → Forecast → Recommendation → Action) [CLIENT-220]. The system predicts future demand across various dimensions (time, product, customer, selling mode) and provides actionable recommendations for procurement and production.

## 2. Forecasting Dimensions

### 2.1 Time-Based Forecasting
| Frequency | Description | Source |
| :--- | :--- | :--- |
| **Monthly Forecasting** | Month-wise forecast comparing current year with previous years (e.g., 2023, 2024 vs 2025 forecast). Tracks 3-year trends. | [CONFIRMED] [CLIENT-185-187] |
| **Day-of-Week Patterns** | Identifies specific daily trends (e.g., Mon=Low, Tue=Medium, Sat/Sun=Very High). Learns dynamically from historical data. | [CONFIRMED] [CLIENT-190] |
| **Early Warning System** | Generates alerts 2-3 months in advance for expected demand surges (e.g., in August: "October demand expected to increase. Start planning"). | [CONFIRMED] [CLIENT-183-184] |

### 2.2 Entity-Based Forecasting
| Dimension | Capability | Source |
| :--- | :--- | :--- |
| **Product-Wise** | Independent forecasts for all products: Chicken, Egg, Duck, Quail, Turkey. | [CONFIRMED] [CLIENT-188-189, CLIENT-204] |
| **Selling Mode** | Predicts demand by processing type (e.g., Live 5,000kg, Cleaned 8,000kg, Skinless 2,500kg, Boneless 1,500kg, Curry Cut 3,000kg). Crucial for planning processing capacity. | [CONFIRMED] [CLIENT-206] |
| **Customer/Dealer** | Micro-level forecasts. E.g., if Hotel ABC averages 100 kg/week, the system predicts 108 kg for next week based on trend. | [CONFIRMED] [CLIENT-191-192] |

## 3. Demand Drivers & Factors
The forecasting algorithm must consider the following factors [CLIENT-170-171]:
- **Historical Sales:** Previous 1-3 years of sales data.
- **Seasonality & Business Calendar:** Festival calendars, weekends, wedding seasons, local events, and holidays [CLIENT-170].
- **Customer Orders:** Forward bookings and recurring orders.
- **Market Trends:** Recent trajectory over the past 3-6 months.

## 4. Inventory Planning & Recommendations

### 4.1 Reorder & Safety Stock Calculations
- **Supplier Lead Time:** Considers variable lead times (e.g., Supplier A = 2 days, Supplier B = 5 days) [CLIENT-200].
- **Safety Stock Calculation:** Dynamic calculation based on average demand and lead time (e.g., Average Demand 500kg, Safety Stock 200kg) [CLIENT-201].
- **Reorder Point:** Current Stock + Expected Demand + Lead Time + Safety Stock = Recommended Purchase [CLIENT-198-199].

### 4.2 Actionable Recommendations
- **Dashboard Visibility:** Displays "Required next 30 days (15,000kg) - Available (4,000kg) - Expected Production (6,000kg) = Shortage (5,000kg)" [CLIENT-202-203].
- **Action:** Generates "Purchase additional 5,000kg" or "Increase production by 5,000kg" recommendations.

## 5. AI & Forecast Quality

### 5.1 Explainable AI
The system MUST explain WHY a prediction is made. 
*Example:* "Forecast is high because: Previous October sales up, 3-year trend is upward, festival demand is approaching, and current forward bookings have increased" [CLIENT-212].

### 5.2 Forecast Confidence
Each forecast must include a confidence score and a range.
*Example:* "Forecast: 15,000 kg | Range: 13,500 - 16,500 kg | Confidence: 82%" [CLIENT-211].

### 5.3 Forecast Accuracy & Continuous Learning
- **Variance Tracking:** Compares Forecast vs Actual (e.g., Forecast 15,000, Actual 14,200, Variance -800) [CLIENT-213].
- **Continuous Learning:** Each month's actual results must feed back into the algorithm to improve the next forecast automatically [CLIENT-214].


---


# 10.2 Slow and Non-Moving Products Module

## 1. Overview
The Slow and Non-Moving Products module identifies inventory items that are tying up capital, aging beyond acceptable thresholds, or are at risk of becoming dead stock. It categorizes products based on their sales velocity and provides recommendations to clear out inventory.

## 2. Product Lifecycle Management
Products must be tracked through predefined lifecycle stages [CLIENT-215-217]:
1. **New:** Recently introduced. Forecast relies on similar product data + manual estimates.
2. **Growing:** Increasing sales trajectory.
3. **Fast Moving:** High velocity, stable or growing demand.
4. **Stable:** Consistent demand.
5. **Slow Moving:** Sales velocity dropping below acceptable thresholds.
6. **Non-Moving:** Zero sales for a specified extended period.
7. **Discontinued:** System suggested discontinuation, confirmed by management.

> [!CAUTION]
> **Strict Business Rule:** The system MUST NOT auto-delete or auto-discontinue products under any circumstances. It can only suggest discontinuation after 6 months of low sales [CONFIRMED] [CLIENT-215-217].

## 3. Product Categorization & Identification

### 3.1 Velocity Categories
The system classifies products based on configurable thresholds [CLIENT-195]:
- **Fast Moving:** High turnover.
- **Normal:** Standard turnover.
- **Slow Moving:** e.g., "Duck last sold 45 days ago, current stock 300 pieces" [CLIENT-193-194].
- **Non-Moving:** e.g., "Turkey last sale 90 days ago, current stock 150, sales 0" [CLIENT-193-194].
- **Dead Stock:** Items with zero movement beyond extreme thresholds, likely requiring write-offs or heavy clearance.

## 4. Inventory Risk Prediction

### 4.1 Overstock Detection
The system identifies products where current stock drastically exceeds predicted demand [CLIENT-196-197].
- **Example Scenario:** Current Stock is 2,000 units, but Monthly Sales run rate is 300 units.
- **System Recommendation:** "Reduce purchase for this product," "Initiate discount/promotion."

### 4.2 Stockout Prediction
The system calculates the run-rate to predict imminent stockouts [CLIENT-198-199].
- **Example Scenario:** Current Stock 500 kg, Daily Sales 120 kg.
- **System Alert:** "Stock-out expected in 4 days."

## 5. Management Recommendations
When products hit warning thresholds (Slow Moving, Non-Moving, Overstock), the system generates management recommendations:
- **Reduce/Stop Purchase:** Adjust reorder parameters.
- **Promotions:** Suggest bundling or discounting to clear stock.
- **Discontinuation:** Suggest for items with no sales for 6+ months (requires human approval).


---


# 10.3 What-If Analysis & Scenario Planning Module

## 1. Overview
The What-If Analysis module allows management to simulate business scenarios to understand the cascading impact of changes in demand, supply, or capacity. This aids in strategic planning, capacity management, and risk mitigation.

## 2. Scenario Planning
Users can create and simulate different forward-looking scenarios [CLIENT-218-219]:
- **Standard Increments:** Normal Baseline, +10% demand, +20% demand, +30% demand.
- **Boundary Cases:** Best Case scenario vs Normal vs Worst Case scenario.

## 3. Impact Assessment
For each simulated scenario, the system must project the impact across the entire business operation [CLIENT-218-219]:
- **Stock Requirements:** Additional raw materials and finished goods needed.
- **Purchase Costs:** Incremental procurement costs.
- **Production Needs:** Required adjustments to farm batches.
- **Cash Flow Requirement:** Working capital needed to support the scenario.

## 4. Capacity Planning & Bottleneck Detection
The system forecasts capacity utilization and detects potential bottlenecks before they occur [CLIENT-207-210, CLIENT-175].

### 4.1 Tracked Capacities
- **Processing Capacity:** (e.g., Maximum 1,000 kg/day)
- **Warehouse Capacity:** Cold storage and ambient storage space.
- **Vehicle Fleet:** Tonnage and routing capacity.
- **Employee Availability:** Manpower required for processing and logistics.

### 4.2 Bottleneck Alerts
If a simulated scenario (or real forecast) exceeds capacity, the system triggers alerts:
- *Example:* "Processing capacity shortage: Orders expected 1,500 kg/day vs Capacity 1,000 kg/day." [CLIENT-175]

## 5. Multi-Year Comparative Visualization
- The system must visualize these scenarios overlaying multiple years of historical data (e.g., 2023, 2024) against current actuals (2025) and scenario forecasts (2026) to identify multi-year growth trajectories [CLIENT-185-187].

=============================================================

# MODULE: 11-system


=============================================================




---


# Approval Workflows

[CONFIRMED] Based on CLIENT-031, CLIENT-168, CLIENT-169.

## 1. Approval Engine Concepts
- **Configurable Thresholds:** Rules based on amount, quantity, or transaction type.
- **Hierarchy:** Multi-level approvals based on organizational structure.
- **Delegation:** Temporary period-based delegation (e.g., Manager on leave assigns to Assistant).
- **Escalation:** Auto-escalate if not approved within a timeframe [PROPOSED].

## 2. Standard Approval Thresholds (e.g., Purchases)
- **Tier 1:** < ₹10,000 → Requires **Manager** Approval
- **Tier 2:** ₹10,000 - ₹50,000 → Requires **Admin** Approval
- **Tier 3:** > ₹50,000 → Requires **Owner** Approval

## 3. Transaction Types Requiring Approvals
| Transaction Type | Trigger Condition | Approver Role |
|---|---|---|
| Purchase Order | Amount thresholds | Manager / Admin / Owner |
| Sales Discount | Discount % > Allowed | Sales Manager / Owner |
| Credit Sale | Credit limit exceeded | Accounts / Owner |
| Stock Adjustment | Any negative adjustment | Warehouse Mgr / Admin |
| Wastage Logging | Value/Qty > Threshold | Processing Mgr / Admin |
| Return / Refund | All returns | Sales Manager / Accounts |
| Rate Change | Any base rate change | Admin / Owner |
| Expense Logging | Amount thresholds | Accounts / Admin |
| Salary Processing | Monthly payroll | HR / Owner |


---


# Audit & Compliance Requirements

[CONFIRMED] Based on CLIENT-032.

## 1. Audit Trail Engine
The system must maintain a comprehensive, tamper-proof audit trail for all critical data modifications.

### Captured Data Points:
- **User:** ID of the user performing the action.
- **Timestamp:** Server-side timestamp of the action.
- **Action Type:** Create, Update, Delete, Approve, Export.
- **Entity:** The module/record affected (e.g., Purchase Order, Daily Mortality).
- **Old Value:** State before modification.
- **New Value:** State after modification.
- **Reason:** Mandatory text field for specific critical updates.

## 2. Financial Record Protection
- **No Silent Deletions:** Financial records (Invoices, Receipts, Payments, Vouchers) cannot be permanently deleted.
- **Voiding/Cancellation:** Instead of deletion, financial records must be marked as "Cancelled" or "Voided" with a mandatory reason.
- **Reversal Entries:** Accounting principles must be followed using reversal journal entries rather than modifying posted transactions.

## 3. Compliance & Retention [PROPOSED]
- **Data Retention:** Audit logs must be retained for a minimum of 5 years.
- **Immutability:** Audit logs themselves must be immutable (append-only) and inaccessible for editing by any user, including System Administrators.
- **Reporting:** Dedicated Audit Log report viewable only by Owner/Auditor roles.


---


# Role-Specific Dashboards Requirements

This document outlines the requirements for role-specific dashboards across the system [CONFIRMED].

## 1. Owner Dashboard [CLIENT-028]
- **Role:** Owner / Executive
- **KPIs:** Total Farms, Total Sheds, Active Batches, Live Birds, Today's Mortality, Today's Feed, FCR, Average Weight, Today's Sales, Outstanding, Stock Value, Expenses, Profit.
- **Widgets:** 
  - Farm Overview Summary (Farms, Sheds, Batches)
  - Live Bird count and Mortality Trend
  - Financial Summary (P&L, Outstanding, Sales vs Expenses)
- **Data Sources:** Core Farming, Sales, Finance, Inventory Modules
- **Refresh Rate:** Near Real-time (Sync dependent)
- **Alerts:** High Mortality, Low Weight, Poor FCR, Low Feed Stock, Overdue Payment, Medicine Expiry, Vaccine Due.
- **Access Level:** Owner / System Admin

## 2. Management Dashboard [CLIENT-180]
- **Role:** General Manager / Operations Manager
- **KPIs:** Production Yield, Farm Efficiency, Batch Profitability, Resource Utilization.
- **Widgets:** Cross-farm comparison, Batch performance metrics.
- **Data Sources:** All operational modules.
- **Refresh Rate:** Near Real-time.
- **Alerts:** High Mortality, Low Yield, High Wastage, Low Stock, Overdue Payment, High Return, Processing Bottleneck.
- **Access Level:** Management

## 3. Farm Manager Dashboard [CLIENT-036]
- **Role:** Farm Manager
- **KPIs:** Active Batches (Own Farm), Daily Mortality (Own Farm), Daily Feed (Own Farm), FCR, Weight, Alerts.
- **Widgets:** Farm Shed Status, Input vs Output, Vaccination Schedule.
- **Data Sources:** Farm Module.
- **Refresh Rate:** Real-time (Local) / Sync (Cloud).
- **Alerts:** Vaccine Due, Medicine Expiry, High Mortality.
- **Access Level:** Farm Manager (restricted to own farm data)

## 4. Supervisor Dashboard [CLIENT-028]
- **Role:** Farm Supervisor
- **KPIs:** Today's Tasks, Daily Entry Status, Mortality, Feed Consumption.
- **Widgets:** Task List, Quick Entry Shortcuts.
- **Data Sources:** Farm Module.
- **Refresh Rate:** Real-time.
- **Alerts:** Missed Entries, Task Reminders.
- **Access Level:** Supervisor

## 5. Warehouse Dashboard [CLIENT-030]
- **Role:** Warehouse Manager
- **KPIs:** Current Stock Levels, Daily Movements, Inward/Outward, Expiries.
- **Widgets:** Low Stock Items, Expiring Items, Recent Transfers.
- **Data Sources:** Inventory Module.
- **Refresh Rate:** Real-time.
- **Alerts:** Stock below minimum, Expiring in 30 days.
- **Access Level:** Warehouse Manager

## 6. Sales Dashboard [CLIENT-029]
- **Role:** Sales Manager
- **KPIs:** Today's Sales, Orders Pending, Dispatches, Revenue, Outstanding.
- **Widgets:** Sales by Channel, Top Customers.
- **Data Sources:** Sales Module.
- **Refresh Rate:** Real-time.
- **Alerts:** Overdue Payments.
- **Access Level:** Sales Team

## 7. Accounts Dashboard [CLIENT-029]
- **Role:** Accountant
- **KPIs:** Daily Cash Flow, Pending Approvals, A/R, A/P, Expenses.
- **Widgets:** Approval Queue, Cash vs Bank Balance, Pending Invoices.
- **Data Sources:** Finance Module.
- **Refresh Rate:** Real-time.
- **Alerts:** Overdue Payments, High Expenses.
- **Access Level:** Accounts / Finance

## 8. HR Dashboard [PROPOSED]
- **Role:** HR Manager
- **KPIs:** Total Headcount, Today's Attendance, Leave Requests, Payroll Status.
- **Widgets:** Absenteeism trend, Upcoming Appraisals.
- **Data Sources:** HR Module.
- **Refresh Rate:** Daily.
- **Alerts:** Unapproved Leaves, Missing Attendance.
- **Access Level:** HR

## 9. Processing Dashboard [CLIENT-180]
- **Role:** Processing Plant Manager
- **KPIs:** Queue, Capacity Utilization, Yield %, Wastage %.
- **Widgets:** Input vs Output, Grade-wise yield.
- **Data Sources:** Processing Module.
- **Refresh Rate:** Real-time.
- **Alerts:** High Wastage, Low Yield, Processing Bottleneck.
- **Access Level:** Processing Manager

## 10. Driver Dashboard [CLIENT-180]
- **Role:** Delivery Driver
- **KPIs:** Today's Trips, Deliveries Pending, Vehicle Status.
- **Widgets:** Route Map [FUTURE], Task List.
- **Data Sources:** Transport Module.
- **Refresh Rate:** Real-time.
- **Alerts:** Vehicle Breakdown.
- **Access Level:** Driver

## 11. Dealer Dashboard [PROPOSED]
- **Role:** Dealer
- **KPIs:** Own Orders, Payments, Outstanding.
- **Widgets:** Order History, Ledger Summary.
- **Data Sources:** Sales Module.
- **Refresh Rate:** Real-time.
- **Alerts:** Payment Due, Order Dispatched.
- **Access Level:** Dealer (restricted)

## 12. Egg Dashboard [CLIENT-071]
- **Role:** Egg Business Manager / Owner
- **KPIs:** Today's Collection, Sales, Stock, Grade-wise Stock, Purchase, Revenue, Avg Rate, Breakage %, Outstanding, Profit.
- **Widgets:** Collection vs Sales Trend, Grade Distribution.
- **Data Sources:** Egg Module.
- **Refresh Rate:** Near Real-time.
- **Alerts:** Rate Change, Stock Shortage, High Breakage.
- **Access Level:** Management


---


# Integrations & Future Expansion

[CONFIRMED] Based on CLIENT-033, CLIENT-040, CLIENT-041.

## 1. Initial Data Migration [CLIENT-033]
Migration from existing Excel files, paper registers, and legacy billing software.
- **Process:** Cleanup → Duplicate removal → Field Mapping → Validation → Import → Verification.
- **Requirement:** System must support bulk data upload via CSV/Excel templates.
- **Strategy:** Conduct a sample migration for one farm/module first, verify, then execute complete migration.

## 2. Future IoT Integrations [FUTURE] [CLIENT-040]
- **Sensors:** Temperature, Humidity, and Ammonia sensors in sheds.
- **Automation:** Automatic Weighing Scales (birds and feed).
- **Tracking:** GPS tracking for delivery vehicles.

## 3. Future Hardware Integrations [FUTURE] [CLIENT-040]
- **Biometric:** Fingerprint/Face recognition for employee attendance.
- **Barcode / QR Code:** Scanning for inventory management, egg trays, and processed meat batches.

## 4. Future Software Integrations [FUTURE] [CLIENT-040]
- **Messaging:** WhatsApp API and SMS gateway for automated notifications to customers and staff.
- **Payments:** Payment Gateway integration for B2B/B2C online orders.
- **Accounting:** Direct integration with standard accounting software (e.g., Tally) if required, though the system will have its own robust finance module.

## 5. Future AI / Analytics [FUTURE] [CLIENT-041]
- Mortality prediction models based on historical batch data and environmental factors.
- FCR and Feed consumption anomaly detection.
- Advanced automated Farm comparison scoring.


---


# Mobile & Offline Requirements

[CONFIRMED] Based on CLIENT-034, CLIENT-035, CLIENT-038.

## 1. Mobile Application
- **Platform:** Android primary focus (covers field workers and drivers).
- **User Interface:** Simple, uncluttered UI designed for quick data entry by non-technical staff.
- **Languages:** Tamil (Primary) and English out-of-the-box [CLIENT-038].
- **Device Integration:** 
  - Camera (for uploading bills, documentation, or capturing proof of mortality).
  - Push Notifications.

## 2. Offline Architecture [CLIENT-035]
Because farms may have poor connectivity, the mobile app must support offline-first data entry.
- **Flow:** Offline Entry → Save to Local Device Storage → Detect Internet → Auto-Sync to Server.
- **Queuing:** Transactions are queued locally with timestamps.

## 3. Conflict Resolution
- **Rule:** DO NOT auto-overwrite server data if a conflict is detected (e.g., if another user modified the same batch record while this device was offline).
- **Resolution:** If a conflict occurs, the sync engine must flag the record and prompt an authorized user/manager to manually resolve the conflict.

## 4. Local Data Security [PROPOSED]
- Offline data stored on the device must be encrypted or cleared upon user logout.
- Strict limit on the amount of historical data synced to the device to prevent data leakage if a device is lost.


---


# Notifications Catalog

[CONFIRMED] Based on CLIENT-030, CLIENT-072, CLIENT-073, CLIENT-180.

| ID | Trigger | Condition | Recipient | Priority | Channel | Message Example |
|---|---|---|---|---|---|---|
| NOTIF-001 | Mortality Threshold | Daily mortality > preset % | Farm Mgr, Owner | High | App, SMS | "Farm 03 mortality above threshold." |
| NOTIF-002 | Feed Stock Low | Warehouse stock < minimum | Warehouse Mgr | Medium | App | "Warehouse feed stock below minimum." |
| NOTIF-003 | Payment Overdue | Outstanding > due days | Sales, Accounts | High | App | "Dealer ABC payment overdue." |
| NOTIF-004 | Vaccine Due | Vaccine date = Tomorrow | Farm Mgr, Vet | High | App, SMS | "Vaccine due tomorrow for Batch 2026-015." |
| NOTIF-005 | Medicine Expiry | Expiry Date < 30 days | Warehouse Mgr | Medium | App | "Medicine XYZ expires in 30 days." |
| NOTIF-006 | Poor FCR | Batch FCR < threshold | Farm Mgr, Mgmt | High | App | "Batch 2026-015 has poor FCR." |
| NOTIF-007 | Low Weight/Yield | Measured weight < target | Farm Mgr, Mgmt | High | App | "Batch 2026-015 weight below target." |
| NOTIF-008 | Egg Rate Change | Egg market rate changes | Sales, Mgmt | Info | App | "Egg rate changed to ₹X." |
| NOTIF-009 | Egg Stock Shortage | Stock < daily avg sales | Sales, Warehouse| High | App | "Egg stock below minimum threshold." |
| NOTIF-010 | High Wastage/Return| Daily wastage > threshold | Processing Mgr | High | App | "Processing wastage above threshold." |
| NOTIF-011 | Vehicle Breakdown | Driver reports breakdown | Transport, Mgmt | Urgent | App, SMS | "Vehicle TN-XX-XXXX reported breakdown." |
| NOTIF-012 | Supplier Quality | Poor quality input logged | Warehouse, Mgmt | High | App | "Supplier quality issue reported." |
| NOTIF-013 | Processing Bottleneck| Processing queue > threshold| Processing Mgr | Medium | App | "Processing bottleneck detected." |


---


# Reports Catalog

[CONFIRMED] Reporting requirements based on CLIENT-029 and CLIENT-070.

## 1. Farm Reports
| ID | Name | Purpose | Users | Filters | KPIs | Frequency |
|---|---|---|---|---|---|---|
| REP-F01 | Performance Report | Overall farm performance | Owner, Mgmt | Farm, Date | Efficiency | Daily/Monthly |
| REP-F02 | Batch Report | End-to-end batch data | Mgmt, Farm Mgr | Batch ID | Profitability, FCR | Per Batch |
| REP-F03 | Production Report | Daily production metrics | Farm Mgr | Date, Shed | Production | Daily |
| REP-F04 | Mortality Report | Mortality tracking | Farm Mgr, Vet | Farm, Shed, Reason | Mortality % | Daily |
| REP-F05 | Feed Report | Feed consumption | Farm Mgr | Farm, Batch | Intake | Daily |
| REP-F06 | Weight Report | Bird weight tracking | Farm Mgr | Farm, Batch | Avg Weight, ADG | Weekly |
| REP-F07 | FCR Report | Feed Conversion Ratio | Mgmt | Farm, Batch | FCR | Weekly/Batch |

## 2. Egg Reports [CLIENT-070]
| ID | Name | Purpose | Users | Filters | KPIs | Frequency |
|---|---|---|---|---|---|---|
| REP-E01 | Daily Collection | Track egg collection | Farm Mgr | Farm, Shed | Total Eggs | Daily |
| REP-E02 | Grade-wise Stock | Current egg stock | Mgmt, Sales | Grade | Stock count | Real-time |
| REP-E03 | Breakage/Wastage | Track losses | Mgmt | Farm, Reason | Breakage % | Daily |
| REP-E04 | Rate History | Track egg pricing | Sales, Accounts | Date Range | Avg Rate | Monthly |
| REP-E05 | Profit & Loss | Profitability | Owner | Date Range | Profit | Monthly |

## 3. Sales Reports
| ID | Name | Purpose | Users | Filters | KPIs | Frequency |
|---|---|---|---|---|---|---|
| REP-S01 | Daily Sales | Track sales | Sales | Route, Product | Volume, Value | Daily |
| REP-S02 | Dealer Performance | Sales by dealer | Sales | Dealer | Sales, Outstanding | Monthly |
| REP-S03 | Outstanding Report | Accounts Receivable | Accounts | Customer | Overdue Amt | Weekly |

## 4. Finance Reports
| ID | Name | Purpose | Users | Filters | KPIs | Frequency |
|---|---|---|---|---|---|---|
| REP-FI01| Income/Expense | Track cash flows | Accounts | Category | Net Flow | Monthly |
| REP-FI02| Profit & Loss | Overall profitability | Owner | Period | Net Profit | Monthly |
| REP-FI03| Cost Analysis | Break down costs | Mgmt | Cost Center | Cost | Monthly |

## Export Capabilities
All reports must support export to Excel and PDF formats [PROPOSED].


---


# Security & Permissions

[CONFIRMED] Based on CLIENT-039, CLIENT-036.

## 1. Role-Based Access Control (RBAC)
System must use a strict RBAC model where users are assigned roles, and roles have granular permissions (Create, Read, Update, Delete, Approve) on specific modules.

## 2. Farm-Level Data Isolation [CLIENT-036]
- **Owner / Admin:** Can view data across ALL farms and facilities.
- **Farm Manager / Staff:** Can ONLY view and interact with data for the specific farm(s) assigned to them. Cross-farm visibility must be strictly blocked at the application and API level.

## 3. Specific Data Restrictions [CLIENT-039]
- **Employee Salaries:** Not visible to Farm Workers, Supervisors, or standard managers. Restricted to HR, Senior Accounts, and Owner.
- **Purchase Rates/Vendor Pricing:** Hidden from general staff and warehouse workers. Visible only to Procurement, Accounts, and Owner.
- **Profitability Reports:** Strictly restricted to the Owner and explicitly authorized Senior Management.

## 4. Session & Authentication Security [PROPOSED]
- Password complexity requirements.
- Session timeouts for inactivity.
- Forced logouts on password changes or role modifications.
- OTP/2FA for Owner and Admin accounts.

=============================================================

# MODULE: 12-catalogs


=============================================================




---


# Business Rule Catalog

| Rule ID | Rule Name | Description | Module | Source |
|---------|-----------|-------------|--------|--------|
| BR-001 | Transit Loss Billing | Live birds: Customer bears transit loss (billing on dispatch weight). Processed meat: Company bears transit loss (billing on delivered weight). | Sales / Finance | [CONFIRMED] |
| BR-002 | FCR Calculation | FCR = Total Feed Consumed (kg) / Total Live Weight Produced (kg). Standard target is < 1.6 for broilers. | Farm Ops | [INDUSTRY REFERENCE] |
| BR-003 | Batch Cost Allocation | All direct costs (DOC, feed, medicine) and proportional indirect costs (labor, overhead) must be allocated to the Farming Batch to determine Cost Per Kg. | Finance | [CONFIRMED] |
| BR-004 | Yield Variance | Expected yield for dressed broiler is ~65-70%. Yield outside this variance triggers a mandatory audit review. | Processing | [INFERRED] |
| BR-005 | Credit Limit Enforcement | System blocks sales invoice generation if the customer's outstanding balance exceeds their predefined credit limit. | Sales | [PROPOSED] |
| BR-006 | Mortality Threshold | Daily mortality > 0.5% in any shed triggers an immediate SMS/Push alert to the Head Veterinarian and Farm Manager. | Farm Ops | [PROPOSED] |
| BR-007 | Stock Reorder Rule | Feed stock dropping below 3 days' estimated consumption for active batches triggers a low-stock alert. | Inventory | [PROPOSED] |
| BR-008 | Damaged Egg Write-off | Damaged eggs exceeding 2% of daily collection require managerial approval for inventory write-off. | Egg Ops | [PROPOSED] |


---


# Feature Catalog

| Feature ID | Module ID | Feature Name | Description |
|------------|-----------|--------------|-------------|
| FEAT-001 | MOD-001 | Farm & Shed Master | Define farms, shed capacities, and types. |
| FEAT-002 | MOD-001 | Item Master | Define all inventory items (feed, medicine, meat, eggs) with UOM. |
| FEAT-003 | MOD-001 | Customer Master | Centralized customer directory with credit limits and types. |
| FEAT-004 | MOD-001 | Price List Management | Dynamic pricing rules based on customer type and market rates. |
| FEAT-005 | MOD-002 | Batch Creation | Initialize a new farming batch (DOC placement). |
| FEAT-006 | MOD-002 | Daily Entry | Log daily mortality, feed, water, and medicine per shed. |
| FEAT-007 | MOD-002 | FCR Tracking | Real-time calculation of Feed Conversion Ratio. |
| FEAT-008 | MOD-002 | Batch Lifting | Schedule and record the lifting of birds from farms. |
| FEAT-009 | MOD-003 | Processing Batch Initiation | Link lifted live birds to a processing run. |
| FEAT-010 | MOD-003 | Yield Calculation | Record meat output and calculate yield percentage against live weight. |
| FEAT-011 | MOD-003 | By-product Tracking | Record quantities of offal, feathers, and other by-products. |
| FEAT-012 | MOD-004 | Egg Collection | Daily logging of eggs collected per shed. |
| FEAT-013 | MOD-004 | Egg Grading | Categorize eggs by size/quality and record damages. |
| FEAT-014 | MOD-005 | Stock Transfers | Move inventory between locations (e.g., warehouse to farm). |
| FEAT-015 | MOD-005 | Stock Reconciliation | Periodic physical vs. system stock adjustments. |
| FEAT-016 | MOD-005 | Reorder Alerts | Automated alerts when feed/medicine drops below minimum levels. |
| FEAT-017 | MOD-006 | Purchase Order | Create and approve POs for feed and supplies. |
| FEAT-018 | MOD-006 | Goods Receipt Note (GRN) | Acknowledge receipt of items and update inventory. |
| FEAT-019 | MOD-007 | Sales Order Entry | Capture customer orders for meat and eggs. |
| FEAT-020 | MOD-007 | Transit Loss Management | Apply rules for live (customer pays) vs processed (company pays) loss. |
| FEAT-021 | MOD-007 | Invoicing | Generate tax-compliant invoices linked to dispatch. |
| FEAT-022 | MOD-008 | Trip Sheet Management | Assign vehicle, driver, and route for deliveries. |
| FEAT-023 | MOD-009 | Batch Profitability | P&L statement specifically tied to a single farming batch. |
| FEAT-024 | MOD-009 | Customer Outstanding | Track accounts receivable and aging. |
| FEAT-025 | MOD-010 | Daily Attendance | Log worker attendance, integrated with biometric devices if available. |
| FEAT-026 | MOD-011 | Executive Dashboard | High-level KPIs: Active batches, mortality rates, revenue. |
| FEAT-027 | MOD-011 | Demand Forecasting | AI/ML or statistical models to predict future sales and feed needs. |
| FEAT-028 | MOD-012 | Role-Based Access Control | Granular permissions (e.g., Farm Manager vs. Finance Head). |


---


# Module Catalog

| Module ID | Module Name | Description | Source |
|-----------|-------------|-------------|--------|
| MOD-001 | Core Setup & Master Data | Unified master data for farms, sheds, items, customers, suppliers, and locations. | [PROPOSED] |
| MOD-002 | Farm Operations | Management of farming batches, daily mortality, feed consumption, and medicine administration. | [CONFIRMED] |
| MOD-003 | Processing & Yield | Tracking of bird lifting, processing batches, yield calculation, and by-product management. | [CONFIRMED] |
| MOD-004 | Egg Operations | Daily egg collection, grading, damage tracking, and packaging. | [CONFIRMED] |
| MOD-005 | Inventory Management | Stock tracking for feed, medicine, packaging, eggs, and processed meat across all locations. | [CONFIRMED] |
| MOD-006 | Purchase & Procurement | Supplier management, purchase orders, GRN, and vendor payments. | [CONFIRMED] |
| MOD-007 | Sales & Distribution | Order management, dispatch scheduling, invoicing, and route planning. | [CONFIRMED] |
| MOD-008 | Logistics & Fleet | Vehicle tracking, trip management, fuel logs, and driver assignments. | [INFERRED] |
| MOD-009 | Finance & Accounting | General ledger, accounts payable/receivable, batch profitability, and taxation. | [CONFIRMED] |
| MOD-010 | HR & Payroll | Employee records, attendance, payroll processing, and labor cost allocation. | [CONFIRMED] |
| MOD-011 | Intelligence & Analytics | Real-time dashboards, demand forecasting, FCR reporting, and predictive alerts. | [CONFIRMED] |
| MOD-012 | System Administration | User roles, permissions, audit logs, and data backups. | [PROPOSED] |


---


# Risk Register

| Risk ID | Risk Description | Impact Level | Probability | Mitigation Strategy | Status |
|---------|------------------|--------------|-------------|---------------------|--------|
| RISK-001 | **Data Migration Quality:** Moving from manual paper registers to a digital system may lead to data entry errors for historical records. | High | High | Limit historical migration to opening balances and master data only. Do not migrate historical transactional data. | Open |
| RISK-002 | **Internet Connectivity:** Farms may have poor or intermittent internet connectivity, disrupting real-time entry. | High | Medium | Implement offline-first PWA for farm mobile app, with automatic syncing when connectivity is restored. | Open |
| RISK-003 | **User Adoption:** Farm workers may resist moving from WhatsApp/Paper to an application. | High | High | Build a highly simplified, vernacular (Tamil/English) mobile interface with large buttons and voice-to-text features. | Open |
| RISK-004 | **Hardware Failure:** Mobile devices provided to farm workers may break or be lost. | Medium | Medium | Provide ruggedized devices and maintain a small buffer stock of replacements. Allow login from any device. | Open |
| RISK-005 | **Integration Complexity:** Interfacing with the existing separate billing software might fail or cause data duplication. | Medium | Low | Ensure clear API contracts. If integration fails, propose full migration to the new system's native billing module. | Open |
| RISK-006 | **Scope Creep (Future Modules):** The client's future plans (Layer, Breeder, Hatchery, Feed Mill) might leak into phase 1 requirements. | High | Medium | Strictly gate phase 1 scope. Document all future requirements as [FUTURE] and defer to subsequent phases. | Open |

=============================================================

# MODULE: 13-technical


=============================================================




---


# API Requirements

## 1. General Standards
- **[PROPOSED]** **Architecture:** RESTful APIs using standard HTTP methods (GET, POST, PUT, PATCH, DELETE).
- **Versioning:** APIs must be versioned (e.g., `/api/v1/`).
- **Data Format:** Requests and responses must use standard JSON.

## 2. Security & Access
- **[PROPOSED]** **Authentication:** JWT (JSON Web Tokens) with short-lived access tokens and longer-lived refresh tokens.
- **Authorization:** Role-Based Access Control (RBAC) ensuring employees only access authorized farm or sales data.

## 3. Performance & Reliability
- **Pagination:** Cursor-based or offset-based pagination on all list endpoints to handle large data volumes (e.g., historical batch records).
- **Rate Limiting:** Implement API rate limiting to prevent abuse and ensure stability.

## 4. Mobile Offline Sync Endpoints
- **[CONFIRMED]** Dedicated endpoints optimized for sync operations:
  - `/api/v1/sync/pull`: Fetches delta changes since the last sync timestamp.
  - `/api/v1/sync/push`: Accepts batched offline operations with client-side timestamps for conflict resolution.

## 5. Webhooks & Integrations
- **[FUTURE]** Webhook support for external integrations (e.g., third-party logistics, accounting software, IoT sensors in sheds).
- Events include: `batch.created`, `invoice.generated`, `inventory.low`.


---


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


---


# Gap Analysis & Implementation Readiness

## 1. Current State vs. Target State
- **Current State:** 
  - Operations rely on paper registers, fragmented Excel sheets, WhatsApp messaging, and separate standalone billing software.
  - Batch profitability is calculated manually post-completion, leading to delayed insights.
  - Inventory (feed/medicine) tracking is reactive.
- **Target State:**
  - A unified, automated, AI-driven platform (Web & Mobile).
  - Real-time dashboard for 8 farms, 42 sheds, and 30+ active batches.
  - Automated FCR, batch profitability, and offline-capable mobile entry.

## 2. Identified Gaps
- **Process Gap:** Transitioning from unstructured WhatsApp communication to structured, role-based data entry in the mobile application.
- **Data Gap:** Historical data is unstructured and scattered across different formats, making automated migration challenging.
- **Infrastructure Gap:** Sheds lack reliable Wi-Fi, necessitating the offline-first mobile architecture.

## 3. Hardware Requirements
- **[PROPOSED]** **Mobile Devices:** Procurement of rugged or standard Android smartphones/tablets for the ~85 employees (specifically farm supervisors, drivers, and sales staff).
- **Network/Connectivity:** While offline sync is supported, providing basic Wi-Fi points near farm offices is recommended to ensure daily sync compliance.
- **Printers:** Bluetooth thermal printers for delivery staff and sales executives for on-the-spot B2B/B2C invoicing.

## 4. Training Requirements
- **[PROPOSED]** **Role-Based Training Programs:**
  - *Farm Workers (Tamil Interface):* Hands-on training for the mobile app (mortality, feed logging). Focus on simplicity and offline sync indicators.
  - *Sales & Finance Teams:* Training on the web dashboard, real-time profitability tracking, and handling dealer credit limits.
  - *Management:* Dashboard interpretation, AI demand forecasting, and system administration.
- **Change Management:** Appoint "System Champions" within the 85 employees to assist peers during the transition period.


---


# Module Architecture Requirements

## 1. Architectural Approach
**Recommendation: Modular Monolith**
Given Sri Murugan Poultry & Agro Group's scale (8 farms, 42 sheds, 85 employees, 120+ customers), a modular monolith architecture is recommended. 
- **[PROPOSED]** It provides the simplicity of a single deployment unit while maintaining clean boundaries between business domains (Farming, Processing, Sales, Finance, Inventory).
- **[FUTURE]** It allows for easier migration to microservices in the future if the business expands to complex layer, breeder, or feed mill operations.

## 2. High-Level Components
- **Core Domain Modules:** 
  - Farm Management (Sheds, Batches, FCR)
  - Processing (Yield calculation, Live vs. Processed weight)
  - Sales & Billing (B2B, B2C, Invoicing)
  - Inventory (Feed, Medicine, Equipment)
  - Finance (Cost tracking, Profitability, Payroll)
- **Shared/Platform Modules:**
  - IAM (Identity & Access Management, JWT-based)
  - Notification Engine (WhatsApp, SMS, Email)
  - Sync Engine (Offline mobile synchronization)
  - Analytics & Reporting (Real-time dashboard)

## 3. Component Interactions
- **[PROPOSED]** Modules must interact through well-defined internal APIs or domain events to avoid tight coupling. 
- The Sync Engine must orchestrate data flow between the mobile application (offline-first) and the core modules via a Conflict-Free Replicated Data Type (CRDT) or robust last-write-wins (with audit log) approach.

## 4. Multi-Tenant Data Partitioning
- **[FUTURE]** To accommodate future multi-company structures, the database schema must include a `tenant_id` (or `company_id`) in all foundational tables.
- Data queries must strictly scope results by the authenticated user's tenant ID context.


---


# Quality Assurance Requirements

## 1. Testing Strategy
- **[PROPOSED]** **Unit Testing:** Focus on critical business logic, specifically calculation modules (FCR, yield, payroll). Target 80% coverage for core domain logic.
- **Integration Testing:** Verify interactions between modules (e.g., Sales module deducting from Inventory module, Sync Engine updating Farm Management).
- **User Acceptance Testing (UAT):** Conducted with Sri Murugan stakeholders on real-world scenarios (e.g., a supervisor logging daily mortality in a shed with poor connectivity).

## 2. Critical Focus Areas
- **Financial Calculation Accuracy:** 
  - **[CONFIRMED]** Batch profitability calculations (Feed cost + medicine cost + chick cost + overheads vs. total sales).
  - Feed Conversion Ratio (FCR) formulas must match industry and client expectations exactly.
  - Live weight to processed weight yield percentages.
- **Offline Sync Conflict Resolution:**
  - **[CONFIRMED]** Rigorous testing of the mobile app's behavior during network transitions (online -> offline -> online).
  - Simulate multiple offline workers updating the same batch records concurrently to verify conflict resolution rules (e.g., additive metrics like mortality vs. absolute metrics).

## 3. Performance Testing
- Ensure the real-time dashboard loads within 3 seconds, aggregating data across 30+ active batches and 42 sheds.


---


# Critical User Stories Sample

## Offline Sync & Mobile Data Entry
**US-001: Offline Daily Entry**
**As a** Farm Supervisor, **I want to** log daily mortality and feed consumption while offline inside a shed, **so that** my work is not blocked by poor network connectivity.
- **Acceptance Criteria:** 
  - [ ] App functions without an active internet connection.
  - [ ] Data is stored locally on the device.
  - [ ] UI indicates "Pending Sync" status.

**US-002: Automatic Data Synchronization**
**As a** System, **I want to** automatically sync offline records when the device reconnects to the network, **so that** the central database is up-to-date.
- **Acceptance Criteria:**
  - [ ] Sync happens in the background upon connection.
  - [ ] Conflicts (e.g., two updates to the same field) are handled using last-write-wins based on the timestamp.

## Processing & Yield Calculation
**US-003: Processing Yield Tracking**
**As a** Processing Manager, **I want to** enter the total live weight of a batch and the final processed weight, **so that** the system calculates the processing yield percentage.
- **Acceptance Criteria:**
  - [ ] System accepts Live Weight and Processed Meat Weight.
  - [ ] Calculates Yield % = (Processed Weight / Live Weight) * 100.
  - [ ] Alerts if yield is below the standard threshold.

## Sales & Billing
**US-004: Live vs Processed Billing Rates**
**As a** Sales Executive, **I want to** select whether a sale is for live birds or processed meat, **so that** the correct pricing tier is applied to the invoice.
- **Acceptance Criteria:**
  - [ ] Billing screen allows toggling between Live and Processed.
  - [ ] Price per kg automatically updates based on the toggle.

**US-005: Dealer Credit Limit Enforcement**
**As a** Finance Manager, **I want to** set credit limits for our 45 dealers, **so that** sales cannot proceed if the dealer's outstanding balance exceeds the limit.
- **Acceptance Criteria:**
  - [ ] System blocks invoice creation if limit is breached.
  - [ ] Requires admin override to proceed.

## Batch Profitability & Analytics
**US-006: Real-Time Batch Profitability**
**As a** Business Owner, **I want to** view a real-time profitability dashboard for any active batch, **so that** I can track expected ROI before the batch is completely sold.
- **Acceptance Criteria:**
  - [ ] Calculates Total Cost (chicks, feed, medicine, labor allocation).
  - [ ] Calculates Total Revenue (sales to date).
  - [ ] Displays Current Profit/Loss and Projected Profit/Loss.

**US-007: Demand Forecasting**
**As an** Operations Manager, **I want to** view AI-driven demand forecasts for the upcoming festive season, **so that** I can adjust chick placement in the sheds.
- **Acceptance Criteria:**
  - [ ] System analyzes historical sales data.
  - [ ] Provides placement recommendations 6-8 weeks in advance.

## Additional Critical Stories
**US-008: Multi-Company Context Switching**
**As a** System Administrator, **I want to** seamlessly switch between different company contexts within the same system, **so that** I can manage future expansions (e.g., Feed Mill) without separate logins.
- **Acceptance Criteria:**
  - [ ] User can switch active tenant.
  - [ ] Data queries strictly enforce active tenant scope.

**US-009: Detailed FCR Reporting**
**As a** Farm Manager, **I want to** generate weekly FCR (Feed Conversion Ratio) reports for each shed, **so that** I can monitor bird health and feed quality.
- **Acceptance Criteria:**
  - [ ] Report calculates Feed Consumed vs Weight Gained.
  - [ ] Highlights deviations from standard benchmarks.

**US-010: WhatsApp Notification Integration**
**As a** Customer, **I want to** receive an automated WhatsApp message with my invoice link upon purchase, **so that** I have an instant digital copy.
- **Acceptance Criteria:**
  - [ ] Invoice generation triggers a WhatsApp message.
  - [ ] Message includes a secure, downloadable PDF link.

**US-011: Inventory Opening Balances**
**As a** Warehouse Manager, **I want to** set opening balances for all inventory items during system onboarding, **so that** we have an accurate starting point.
- **Acceptance Criteria:**
  - [ ] Bulk upload or manual entry screen for initial stock levels.
  - [ ] Actions are logged with "System Initialization" tags.

**US-012: Comprehensive Audit Trails**
**As an** Auditor, **I want to** view an unalterable history of all changes made to a financial transaction, **so that** I can ensure compliance and trace errors.
- **Acceptance Criteria:**
  - [ ] Every update logs previous value, new value, user, and timestamp.
  - [ ] Audit logs cannot be modified via the application UI.

**US-013: Excel Data Export**
**As a** Finance Executive, **I want to** export detailed ledgers to Excel format, **so that** I can perform external analysis or share with our accountant.
- **Acceptance Criteria:**
  - [ ] Export functionality available on all standard list views.
  - [ ] Formatting matches standard accounting software expectations.

**US-014: Granular RBAC Permissions**
**As an** HR Manager, **I want to** define custom roles with specific view/edit permissions, **so that** employees only see data relevant to their job.
- **Acceptance Criteria:**
  - [ ] Role creation screen with checkbox permissions (e.g., "Can Edit Batches", "Can View Finances").
  - [ ] Application strictly enforces these limits on frontend and backend.

**US-015: Fleet Dispatch Scheduling**
**As a** Logistics Coordinator, **I want to** assign deliveries to specific vehicles and drivers, **so that** we efficiently utilize our 18 vehicles.
- **Acceptance Criteria:**
  - [ ] Calendar or list view for upcoming deliveries.
  - [ ] Ability to assign a driver/vehicle and notify them automatically.
