# Business Rule Discovery

| Rule ID | Description | Source Lines | Status |
|---|---|---|---|
| TEMP-BR-001 | Refunds must automatically sync and update Finance modules. | 3030-3043 | [CLIENT-CONFIRMED] |
| TEMP-BR-002 | Stock adjustments require an explicit reason, managerial approval, and audit trail. | 3085-3094 | [CLIENT-CONFIRMED] |
| TEMP-BR-003 | Abnormal stock loss must trigger an alert to management. | 3115-3128 | [CLIENT-CONFIRMED] |
| TEMP-BR-004 | Approval delegations must be restricted to a specific time period. | 3146-3151 | [CLIENT-CONFIRMED] |
| TEMP-BR-005 | Demand forecasting must consider multiple years of historical data. | 3414-3432 | [CLIENT-CONFIRMED] |
| TEMP-BR-006 | System should not automatically delete or cancel purchase orders for slow-moving products; it must only suggest and require manual approval. | 3576-3590 | [CLIENT-CONFIRMED] |
| TEMP-BR-007 | System should not automatically delete products flagged as non-moving; requires manual action. | 3844-3853 | [CLIENT-CONFIRMED] |
| TEMP-BR-008 | Predictive alerts (e.g. stock out) must be triggered before the event happens (e.g., 4 days before feed runs out). | 3935-3952 | [CLIENT-CONFIRMED] |
