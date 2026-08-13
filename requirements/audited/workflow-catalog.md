# WORKFLOW CATALOG (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** All workflows and state machines with canonical IDs. Resolves the batch/order lifecycle variant conflicts (CONFLICT-029).

---

## 1. BUSINESS WORKFLOWS (WF-001..WF-016)

| ID | Workflow | Steps | Source |
|---|---|---|---|
| WF-001 | Batch Placement | Chick Supplier → Purchase → Arrival → QC → Farm Allocation → Shed Allocation → Batch Creation → Bird Placement | conversation chunk-1 |
| WF-002 | Daily Farm Routine | Opening Count → Mortality → Culling → Live Count → Feed → Water → Environment → Health | chunk-1 |
| WF-003 | Feed Supply Chain | PO → GRN → Stock Update → Farm Request → Approval → Feed Issue → Consumption → Stock Deduction | chunk-1 |
| WF-004 | Harvest | Ready → Weight Check → Buyer Confirmation → Planning → Catching → Loading → Weighment → Dispatch → Invoice → Delivery → Payment | chunk-1 |
| WF-005 | Sales & Dealer Credit | Order → Approval w/ credit check → Dispatch → Invoice → Payment → Outstanding | chunk-1 |
| WF-006 | Warehouse Transfer | Request → Approval → Dispatch → Receive (partial possible) → Stock Update | chunk-1 |
| WF-007 | General Purchase | Request → Quotation → PO → Approval → GRN → QC → Stock → Invoice → Payment | chunk-1 |
| WF-008 | Egg Grading & Stock | Collection → QC → Grade by size/quality → Stock | chunk-2 |
| WF-009 | Egg Order Processing | Order → Stock check → Pick/Pack → Dispatch → Deliver → Payment | chunk-2 |
| WF-010 | Egg Customer Return | Return → QC → Good→stock / Damaged→wastage | chunk-2 |
| WF-011 | Live Bird Order with Cutting | Request 1kg → Select 1.35kg bird → Process → Record yield 1.02kg → Compare → Adjustment → Bill accepted weight | chunk-2 |
| WF-012 | Wastage Approval | Worker enters → Supervisor verifies → Manager approves → Inventory adjusted → Audit | chunk-2 |
| WF-013 | Processing & Dispatch | Processing → Cutting → Packing → Labeling → Dispatch | chunk-3 |
| WF-014 | Processed Chicken Sales Costing | Required Final Weight → Select Live Bird → Process & record loss → Final Saleable Weight → Bill at Processed Rate on Saleable Weight → Business cost = Live Bird Cost + Processing Cost + Loss | chunk-3 |
| WF-015 | Product Return Disposition | Return → QC → Resalable / Reprocess / Discount Sale / Waste | chunk-3 |
| WF-016 | Delivery Capacity & Routing | Check orders vs vehicle capacity → split/second vehicle → route grouping → delivery proof | chunk-3 |
| WF-017 | QC and Rework | QC → PASS→Saleable / FAIL→Rework → Re-QC → PASS→Saleable / FAIL→Waste | chunk-3 |
| WF-018 | Refund | Sales Invoice → Return → Approved Refund → Payment → Auto Finance Update | chunk-4 |
| WF-019 | Supplier Return & Debit | Purchase → QC Rejection → Supplier Return → Debit/Adjustment | chunk-4 |
| WF-020 | Physical Stock Audit | System vs Physical → Difference Report → Adjustment | chunk-4 |
| WF-021 | Procurement Forecasting | Current Stock + Expected Demand + Lead Time + Safety Stock = Recommended Purchase | chunk-4 |
| WF-022 | Farm Production Planning | Expected Demand → Required Birds → Batch Size → Placement → Feed → Harvest Plan | chunk-4 |
| WF-023 | Batch Transfer | Farm A/Shed X → Farm B/Shed Y with qty, weight, reason, approver | chunk-4 |
| WF-024 | Negative Margin Sale | Detect below-cost → Warning → Reason → Management Approval → Allowed | chunk-5 |
| WF-025 | Order Feasibility Check | Check stock + production + processing + delivery + credit → Can Fulfill / Partial / Cannot | chunk-5 |
| WF-026 | Customer Complaint & Recall | Complaint → Traceability (Customer→Invoice→Order→Product→Processing Batch→Farm Batch) → Recall decision → Affected batch/products/customers/qty → Recall costs → Replacement order linked to original → Severity & SLA → Root cause/corrective/preventive | chunk-5 |
| WF-027 | Delivery & Driver Settlement | Deliver → Collect cash linked to invoice → Trip end → Submit cash/expenses/fuel → System settles balance | chunk-5 |

---

## 2. STATE MACHINES (10 — docs/07-workflows/workflow-states.md)

### 2.1 Batch/Flock Lifecycle (CANONICAL — resolves CONFLICT-029)
States: **Draft → Placed → Active → Partially Depleted → Closed**
- Transitions: Draft→Placed (`place_birds`, Farm Manager); Placed→Active (`start_cycle`, Supervisor); Active→Partially Depleted (`record_sale_cull`, Supervisor); Active→Closed (`close_batch`, Farm Manager); Partially Depleted→Closed (`close_batch`, Farm Manager)
- Invalid: Placed→Draft; Active→Draft; Closed→Active
- *(v1 entity-register used "Placed→Growing→Depleted" — superseded)*

### 2.2 Sales Order (CANONICAL — resolves CONFLICT-029)
States: **Draft → Confirmed → Allocated (stock reserved) → Processing (Catching/Dressing) → QC → Packed → Ready for Dispatch → Dispatched → Delivered → Invoiced → Paid → Closed**; plus Cancelled, Returned.
- Invalid: Dispatched→Cancelled (must be Returned); Invoiced→Confirmed; Closed→Any
- Modification: before processing = simple edits; after processing started = approval (BR-033); mode change = supervisor override (CORE-14)
- Cancellation: pre-processing = no loss; post-processing = loss/surplus reallocation; partial allowed ("Ordered 10kg, cancelled 4kg, remaining 6kg")

### 2.3 Purchase Order
States: Draft → Submitted → Approved → Partially Received → Fully Received → Closed → (Rejected, Cancelled)
- Invalid: Partially Received→Cancelled; Fully Received→Rejected; Closed→Any
- PO approval tiers: <₹10K Manager; ₹10K-50K Company Admin; >₹50K Owner

### 2.4 Sales Invoice
States: Draft → Sent → Partially Paid → Paid → Overdue → Cancelled → Credit Note Issued
- Invalid: Paid→Cancelled (refund/CN instead); Overdue→Draft

### 2.5 Purchase Invoice
States: Received → Verified → Approved → Partially Paid → Paid → Disputed → Cancelled
- Invalid: Approved→Disputed; Paid→Disputed

### 2.6 Payment
States: Initiated → Processed → Completed → Failed → Reversed
- Invalid: Failed→Completed (new payment required); Completed→Initiated

### 2.7 Incubation Batch [FUTURE — egg/hatchery]
States: Egg Receipt → Storage → Setting → Incubating → Candled → Transferred → Hatching → Completed

### 2.8 Expense/Approval
States: Draft → Submitted → Approved → Paid → Rejected
- Invalid: Paid→Rejected; Approved→Draft
- Delegation: temporary, period-based (BR-039)

### 2.9 Employee
States: Active → On Leave → Suspended → Terminated
- Invalid: Terminated→Active; On Leave→Suspended

### 2.10 Inventory Item (Lot Tracking)
States: Ordered → In Stock → Reserved → Issued → Consumed/Expired
- Invalid: Consumed/Expired→In Stock; Issued→Ordered
- Reserved stock has expiry rule (BR-046)

---

## 3. PROCESSING QUEUE (client-specific)

Statuses: Pending → Assigned → Processing → QC → Packed → Ready → Dispatched → Completed
- Supports 20+ simultaneous orders [CLIENT-146]; staff assignment + time tracking; priority queue (Kanban)

---

## 4. APPROVAL WORKFLOWS (consolidated from approval-discovery)

| Workflow | Approver | Source |
|---|---|---|
| Farm Feed Request | Manager (approval required) | chunk-1 L273 |
| Dealer Order over credit limit | Manager approval / override | L417, L429, CLIENT-CONV-L2730 |
| Warehouse Transfer | Approval required | L496 |
| Purchase Order | <₹10K Manager; ₹10K-50K Admin; >₹50K Owner | L519, L767-782 |
| High-Value Wastage | Worker → Supervisor → Manager → adjust | chunk-2 |
| Rate Change | Salesperson proposes → Manager activates | L2766-2776 |
| In-Progress Order Modification | Approval after processing starts | L2829-2831 |
| Transaction types with approvals | Purchase, Sales Discount, Credit Sale, Stock Adjustment, Wastage, Return, Refund, Rate Change, Expense, Salary | chunk-4 |
| Expense claims | Manager (standard); Owner (larger, threshold-based) | chunk-5 |
| Negative Margin Sale | Management approval + documented reason | chunk-5 |
| Sales Price Anomaly | Manager approval on high negative variance | chunk-5 |
| Auto PO Draft | Management approval before execution | chunk-5 |
| Credit Limit Override (VIP) | Approval + reason + audit trail | chunk-5 |
| Approval Delegation | Temporary, period-based | chunk-4 |
| Escalation | [PROPOSED] | approval-workflows.md |

---

## 5. ORDER CUT-OFF & RECURRING ORDERS

- Cut-off rule: orders before cut-off → today's processing; after → next slot (BR-029)
- Order types: Advance / Same-day / Scheduled-Recurring (e.g., "Hotel 20kg daily, except Sunday 30kg") / Emergency
- Recurring orders + auto order drafts [FUTURE AI]

---

## 6. EDGE-CASE GUARDS (relevant state transitions — full list in qa-requirements.md)

- Duplicate mortality entry → unique (Batch, Date)
- Mortality > live birds → transactional check (VR-002/004)
- Batch split/merge mid-cycle → proportional cost allocation (EC-010/011)
- Closed batch reopen → admin-only + audit (EC-012)
- Concurrent edits → optimistic locking (EC-050)
- Offline conflicts → no auto-overwrite (CORE-08); LWW only for additive metrics with collision notice (EC-052, ADR-011 reconciled)

---

*End of workflow-catalog.md (V2).*