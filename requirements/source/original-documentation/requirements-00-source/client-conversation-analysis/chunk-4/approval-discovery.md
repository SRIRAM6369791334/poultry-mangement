# Approval Discovery

| Approval Matrix | Description | Source Lines | Status |
|---|---|---|---|
| Transaction Types | Dedicated approvals needed for Purchase, Sales Discount, Credit Sale, Stock Adjustment, Wastage, Return, Refund, Rate Change, Expense, Salary | 3129-3145 | [CLIENT-CONFIRMED] |
| Approval Delegation | Authorized manager can temporarily approve during main approver's absence (period-based). | 3146-3151 | [CLIENT-CONFIRMED] |
| Purchase Reduction | Suggestion to reduce purchase for slow-moving products requires manual management approval, not automatic cancellation. | 3576-3590 | [CLIENT-CONFIRMED] |
| Product Discontinuation | Automatic discontinuation is blocked; suggestion requires management approval. | 3844-3853 | [CLIENT-CONFIRMED] |
