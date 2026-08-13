# Consolidated workflow-discovery.md



## From Chunk 1


# Workflow Discovery

## WF-001: Farm Batch Placement Workflow
- **Source**: CLIENT-CONV-L171-L189
- **Status**: [CLIENT-CONFIRMED]
- **Steps**:
  1. Chick Supplier -> Purchase
  2. Chick Arrival
  3. Quality Check
  4. Farm Allocation
  5. Shed Allocation
  6. Batch Creation
  7. Bird Placement (capturing count, breed, supplier, rate, cost, date, farm, shed, batch no).

## WF-002: Daily Farm Routine Workflow
- **Source**: CLIENT-CONV-L207-L223
- **Status**: [CLIENT-CONFIRMED]
- **Steps**:
  1. Opening Bird Count
  2. Mortality Entry
  3. Culling Entry
  4. Live Bird Count Update
  5. Feed Consumption Entry
  6. Water Consumption Entry
  7. Environment Check
  8. Health Check

## WF-003: Feed Supply Chain Workflow
- **Source**: CLIENT-CONV-L261-L279
- **Status**: [CLIENT-CONFIRMED]
- **Steps**:
  1. Purchase Order to Supplier
  2. Goods Receipt at Warehouse
  3. Feed Stock Update
  4. Farm Request for Feed
  5. Approval
  6. Feed Issue
  7. Farm/Shed/Batch Consumption
  8. Stock Deduction

## WF-004: Harvest Workflow
- **Source**: CLIENT-CONV-L371-L393
- **Status**: [CLIENT-CONFIRMED]
- **Steps**:
  1. Batch Ready -> Weight Check
  2. Buyer Confirmation
  3. Harvest Planning
  4. Bird Catching -> Loading -> Vehicle
  5. Weighment -> Dispatch
  6. Invoice -> Delivery -> Payment

## WF-005: Sales and Dealer Credit Workflow
- **Source**: CLIENT-CONV-L413-L425
- **Status**: [CLIENT-CONFIRMED]
- **Steps**:
  1. Dealer Order
  2. Approval (checks credit limit)
  3. Dispatch
  4. Invoice
  5. Payment
  6. Outstanding calculation

## WF-006: Warehouse Transfer Workflow
- **Source**: CLIENT-CONV-L492-L504
- **Status**: [CLIENT-CONFIRMED]
- **Steps**:
  1. Transfer Request (from Farm)
  2. Approval
  3. Dispatch (from Warehouse)
  4. Receive (at Farm, partial possible)
  5. Stock Update

## WF-007: General Purchase Workflow
- **Source**: CLIENT-CONV-L509-L529
- **Status**: [CLIENT-CONFIRMED]
- **Steps**:
  1. Purchase Request
  2. Quotation -> Supplier Selection
  3. Purchase Order
  4. Approval
  5. Goods Receipt -> Quality Check
  6. Stock Update
  7. Supplier Invoice -> Payment

## From Chunk 2


# Workflow Discovery - Chunk 2

## WF-001: Egg Grading and Stock Update
1. Collection completed.
2. Quality check performed.
3. Eggs graded by weight/size (Small, Medium, Large, Extra Large) and quality (Good, Broken, Damaged, Rejected).
4. Stock updated grade-wise.

## WF-002: Egg Order Processing
1. Customer order received.
2. Stock checked in warehouse.
3. Items Picked and Packed.
4. Dispatched to vehicle.
5. Delivered to customer.
6. Payment received (Cash/UPI/Bank/Credit).

## WF-003: Egg Customer Return
1. Customer returns eggs.
2. Quality inspection conducted.
3. Disposition: Good returns to stock; Damaged recorded as wastage/loss.

## WF-004: Live Bird Order Processing (With Cutting)
1. Receive request for specific weight (e.g., 1 KG).
2. Select live bird (e.g., 1.35 KG).
3. Process bird (blood, feather, skin removal).
4. Record actual yield (e.g., 1.02 KG).
5. Compare actual vs requested.
6. Apply adjustment/business rule if underweight/overweight.
7. Bill final accepted weight.

## WF-005: Wastage Approval
1. Worker enters high-value waste.
2. Supervisor verifies the waste.
3. Manager approves.
4. Inventory is adjusted.
5. Record kept for audit.

## From Chunk 3


# Workflow Discovery - Chunk 3

## 1. Processing and Dispatch Workflow (CLIENT-CONV-L2013-L2021)
- Status: [CLIENT-CONFIRMED]
- Steps:
  1. Processing
  2. Cutting
  3. Packing
  4. Labeling
  5. Dispatch

## 2. Processed Chicken Sales Costing Workflow (CLIENT-CONV-L2226-L2250)
- Status: [CLIENT-CONFIRMED]
- Steps:
  1. Identify Required Final Weight.
  2. Select Live Bird (greater weight).
  3. Process bird and record Processing Loss.
  4. Determine Final Saleable Weight.
  5. Bill customer based on Processed Rate and Saleable Weight.
  6. Calculate business cost based on Live Bird Cost + Processing Cost + Loss.

## 3. Product Return Disposition Workflow (CLIENT-CONV-L2504-L2511)
- Status: [CLIENT-CONFIRMED]
- Steps:
  1. Customer Return.
  2. Quality Check.
  3. Disposition decision: Resalable, Reprocess, Discount Sale, or Waste.

## 4. Delivery Capacity & Routing Workflow (CLIENT-CONV-L2626-L2658)
- Status: [CLIENT-CONFIRMED]
- Steps:
  1. Check daily orders against Vehicle Capacity.
  2. If exceeded, split delivery or assign second vehicle.
  3. Plan route grouping customers in the same area.
  4. Collect Delivery Proof upon delivery.

## 5. QC and Rework Workflow (CLIENT-CONV-L2907-L2926)
- Status: [CLIENT-CONFIRMED]
- Steps:
  1. Processed item goes to QC.
  2. If PASS, moved to Saleable.
  3. If FAIL, route to Rework.
  4. After Rework, Re-QC.
  5. If Re-QC PASS, moved to Saleable. If FAIL, moved to Waste.

## From Chunk 4


# Workflow Discovery

| Workflow | Source Lines | Description | Status |
|---|---|---|---|
| Refund Workflow | 3030-3043 | Sales Invoice -> Return -> Approved Refund -> Payment -> Auto Finance Update | [CLIENT-CONFIRMED] |
| Supplier Return & Debit | 3072-3084 | Purchase -> QC Rejection -> Supplier Return -> Debit/Adjustment | [CLIENT-CONFIRMED] |
| Physical Stock Audit | 3095-3104 | System Stock compared vs Physical Count generating difference report for adjustment. | [CLIENT-CONFIRMED] |
| Procurement Forecasting | 3602-3617 | Current Stock + Expected Demand + Lead Time + Safety Stock = Recommended Purchase | [CLIENT-CONFIRMED] |
| Farm Production Planning | 3655-3671 | Expected Demand -> Required Birds -> Batch Size -> Placement -> Feed -> Harvest Plan | [CLIENT-CONFIRMED] |
| Batch Transfer Workflow | 3982-3995 | Move birds from Farm A/Shed X to Farm B/Shed Y tracking quantity, weight, reason, approver. | [CLIENT-CONFIRMED] |

## From Chunk 5


# Workflow Discovery - Chunk 5

## Negative Margin Sale Workflow
* **Status**: [CLIENT-CONFIRMED]
* **Source**: Lines 4194-4204
* **Steps**:
  1. System detects sale price is Below Cost.
  2. System issues Warning.
  3. User enters Reason.
  4. System routes to Management for Approval.
  5. Upon approval, Sale is Allowed.

## Order Feasibility Check Workflow
* **Status**: [CLIENT-CONFIRMED]
* **Source**: Lines 4361-4390
* **Steps**:
  1. Customer requests order.
  2. System checks Stock + Production + Processing Capacity + Delivery Capacity + Credit Limit.
  3. System evaluates feasibility.
  4. Output is generated: Can Fulfill, Partial Fulfillment, or Cannot Fulfill.

## Customer Complaint & Recall Workflow
* **Status**: [CLIENT-CONFIRMED]
* **Source**: Lines 4713-4790
* **Steps**:
  1. Customer raises complaint.
  2. Traceability initiated: Customer -> Invoice -> Order -> Product -> Processing Batch -> Farm Batch.
  3. Determine if recall is necessary.
  4. Identify affected batch, products, customers, delivered quantity, returned, and pending.
  5. Process recall and capture recall costs (transport, replacement, refund).
  6. Process Replacement Order (linked to original).
  7. Assign Severity & SLA.
  8. Capture Root Cause, Corrective Action, and Preventive Action upon closing.

## Delivery & Driver Settlement Workflow
* **Status**: [CLIENT-CONFIRMED]
* **Source**: Lines 4911-4925
* **Steps**:
  1. Driver delivers order to customer.
  2. Driver collects cash if applicable, linking it to invoice.
  3. Trip ends, driver initiates settlement.
  4. Driver submits Cash collected, Expenses, Fuel bills.
  5. System calculates and settles the Balance.
