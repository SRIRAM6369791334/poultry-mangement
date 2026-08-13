# Business Rule Discovery - Chunk 3

| Rule ID | Source Lines | Rule Description | Status |
|---|---|---|---|
| TEMP-BR-001 | CLIENT-CONV-L2149 | Live sales do not record processing loss against the business transaction. | [CLIENT-CONFIRMED] |
| TEMP-BR-002 | CLIENT-CONV-L2153-L2174 | Processed sales must provide the customer with exact requested final weight; business absorbs processing loss. | [CLIENT-CONFIRMED] |
| TEMP-BR-003 | CLIENT-CONV-L2528-L2565 | Processed billing rule: Customer bears loss for Live Bird purchases, but business bears loss for Processed Meat purchases. | [CLIENT-CONFIRMED] |
| TEMP-BR-004 | CLIENT-CONV-L2609-L2610 | Orders received before cut-off time get today's processing; orders after go to the next slot. | [CLIENT-CONFIRMED] |
| TEMP-BR-005 | CLIENT-CONV-L2722-L2732 | Orders exceeding customer credit limits must trigger a warning or block based on company policy. | [CLIENT-CONFIRMED] |
| TEMP-BR-006 | CLIENT-CONV-L2802-L2806 | System must enforce Minimum Order Quantity per product/customer type. | [CLIENT-CONFIRMED] |
| TEMP-BR-007 | CLIENT-CONV-L2821-L2823 | Order prices must be locked upon creation and not fluctuate with subsequent market rate changes. | [CLIENT-CONFIRMED] |
| TEMP-BR-008 | CLIENT-CONV-L2829-L2831 | Modifying an order after processing has started requires approval or special adjustment. | [CLIENT-CONFIRMED] |
| TEMP-BR-009 | CLIENT-CONV-L2901 | Items failing Quality Check must have their dispatch blocked. | [CLIENT-CONFIRMED] |
| TEMP-BR-010 | CLIENT-CONV-L2952-L2954 | Expired processed products in cold storage must be blocked from sales. | [CLIENT-CONFIRMED] |
