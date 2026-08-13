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
