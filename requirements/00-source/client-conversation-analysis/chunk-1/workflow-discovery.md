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
