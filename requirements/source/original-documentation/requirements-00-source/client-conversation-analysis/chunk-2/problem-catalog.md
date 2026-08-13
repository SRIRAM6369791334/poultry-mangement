# Problem Catalog - Chunk 2

| Problem ID | Description | Impact | Proposed Solution / Requirement | Status |
|---|---|---|---|---|
| PROB-001 | Exact customer weight requests (e.g., exactly 1 kg) do not align with live bird weight, creating weight variance. | Billing disputes, loss of stock | Track requested vs actual weight and document overweight/underweight adjustments. | [CLIENT-CONFIRMED] |
| PROB-002 | Processing loss (blood, feathers, etc.) is often hidden or mixed. | Incorrect profitability and reconciliation | Detailed categorization of loss types and exact weight reconciliation tracking. | [CLIENT-CONFIRMED] |
| PROB-003 | Hard-coded units and bird types. | Limits scalability for new products | Fully configurable product master for species and dynamic unit conversions. | [CLIENT-CONFIRMED] |
| PROB-004 | Profit calculation inaccuracies due to mixing own farm vs purchased egg costs. | Inaccurate financial reporting | Differentiate source of eggs (Own vs Purchase) for COGS calculations. | [CLIENT-CONFIRMED] |
| PROB-005 | Post-processing order cancellations cause waste or financial loss. | Operational loss | Need a business rule and workflow to handle processed but cancelled birds. | [CLIENT-CONFIRMED] |
| PROB-006 | Transport weight loss causes dispatch-delivery weight mismatches. | Supplier/Logistics disputes | Capture and reconcile Dispatch Weight vs Transport/Delivery Weight. | [CLIENT-CONFIRMED] |
