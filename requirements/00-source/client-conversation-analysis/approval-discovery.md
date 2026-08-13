# Consolidated approval-discovery.md



## From Chunk 1


# Approval Discovery

- **Farm Feed Request Approval**: Approval required for feed issue from warehouse to farm. (CLIENT-CONV-L273) [CLIENT-CONFIRMED]
- **Dealer Order Approval**: Approval required if dealer order exceeds credit limit. (CLIENT-CONV-L417, L429) [CLIENT-CONFIRMED]
- **Warehouse Transfer Approval**: Approval needed for stock dispatch to another warehouse/farm. (CLIENT-CONV-L496) [CLIENT-CONFIRMED]
- **Purchase Order Approval**: (CLIENT-CONV-L519, L767-L782) [CLIENT-CONFIRMED]
  - Purchase < ₹10,000 → Manager Approval
  - Purchase ₹10,000–₹50,000 → Company Admin Approval
  - Purchase > ₹50,000 → Owner Approval

## From Chunk 2


# Approval Discovery - Chunk 2

* **High-Value Wastage Approval**: Adjustments to inventory due to significant wastage require a 3-step process. The worker enters the waste -> Supervisor verifies -> Manager approves -> System adjusts inventory. [CLIENT-CONV-L1820-L1834]

## From Chunk 3


# Approval Discovery - Chunk 3

- **Credit Limit Override** (CLIENT-CONV-L2730): Manager approval required to process orders for customers exceeding their credit limits. [CLIENT-CONFIRMED]
- **Rate Change Approval** (CLIENT-CONV-L2766-L2776): Salespersons can propose rates, but Manager Approval is required to activate the rate. [CLIENT-CONFIRMED]
- **In-Progress Order Modification** (CLIENT-CONV-L2829-L2831): Approval is needed to modify an order's quantity once processing has started. [CLIENT-CONFIRMED]

## From Chunk 4


# Approval Discovery

| Approval Matrix | Description | Source Lines | Status |
|---|---|---|---|
| Transaction Types | Dedicated approvals needed for Purchase, Sales Discount, Credit Sale, Stock Adjustment, Wastage, Return, Refund, Rate Change, Expense, Salary | 3129-3145 | [CLIENT-CONFIRMED] |
| Approval Delegation | Authorized manager can temporarily approve during main approver's absence (period-based). | 3146-3151 | [CLIENT-CONFIRMED] |
| Purchase Reduction | Suggestion to reduce purchase for slow-moving products requires manual management approval, not automatic cancellation. | 3576-3590 | [CLIENT-CONFIRMED] |
| Product Discontinuation | Automatic discontinuation is blocked; suggestion requires management approval. | 3844-3853 | [CLIENT-CONFIRMED] |

## From Chunk 5


# Approval Discovery - Chunk 5

* **Expense Approval**: Manager approval required for standard expense claims; Owner approval required for larger amounts (threshold based). [CLIENT-CONFIRMED]
* **Negative Margin Sale Approval**: Requires management approval with documented reason to allow a sale below product cost. [CLIENT-CONFIRMED]
* **Sales Price Anomaly Approval**: Manager approval required if sales rate has a high negative variance. [CLIENT-CONFIRMED]
* **Automatic Order Draft Approval**: Management must approve automatically generated purchase order drafts before execution. [CLIENT-CONFIRMED]
* **Credit Limit Override Approval**: Requires approval, reason documentation, and audit trail to allow a VIP customer to temporarily exceed their credit limit. [CLIENT-CONFIRMED]
