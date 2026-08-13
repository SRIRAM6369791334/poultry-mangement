# Notification Discovery

| Notification | Trigger | Recipients | Source Lines | Status |
|---|---|---|---|---|
| Abnormal Stock Loss | Physical vs System mismatch > threshold | Management | 3115-3128 | [CLIENT-CONFIRMED] |
| Capacity Shortage | Expected demand > Processing/Warehouse/Fleet capacity | Planning/Management | 3197-3224 | [FUTURE] |
| Exception Alerts | High mortality, Overdue payment, Low margin, etc. | Owner | 3281-3295 | [CLIENT-CONFIRMED] |
| Seasonal Demand Warning | 2-3 months prior to expected seasonal spike | Management | 3363-3378 | [CLIENT-CONFIRMED] |
| Slow Moving Alert | Product last sold date > threshold | Inventory Manager | 3502-3531 | [CLIENT-CONFIRMED] |
| Overstock Alert | Current stock high vs Avg monthly sales | Procurement/Management | 3563-3575 | [CLIENT-CONFIRMED] |
| Stock-Out Prediction | Current stock will deplete based on avg sales | Procurement/Management | 3591-3601 | [CLIENT-CONFIRMED] |
| Predictive Alerts | Early warning for constraints (e.g. Feed depletion) | Farm Manager | 3935-3952 | [CLIENT-CONFIRMED] |
