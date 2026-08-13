# Consolidated business-rule-discovery.md



## From Chunk 1


# Business Rule Discovery

| ID | Description | Source Lines | Status |
|---|---|---|---|
| TEMP-BR-001 | Closing Live Birds = Opening Birds - Mortality - Culling | CLIENT-CONV-L250-L256 | [CLIENT-CONFIRMED] |
| TEMP-BR-002 | Feed Consumption = Feed Purchased (issued to batch) + Opening Stock - Closing Stock | CLIENT-CONV-L297-L303 | [CLIENT-CONFIRMED] |
| TEMP-BR-003 | System must alert on abnormal weight growth (Target vs Actual) | CLIENT-CONV-L334-L334 | [CLIENT-CONFIRMED] |
| TEMP-BR-004 | Medicine usage for treatment must decrease warehouse/farm stock | CLIENT-CONV-L364-L364 | [CLIENT-CONFIRMED] |
| TEMP-BR-005 | Dealer orders exceeding credit limit require alert/approval | CLIENT-CONV-L429-L429 | [CLIENT-CONFIRMED] |
| TEMP-BR-006 | Purchase < ₹10,000 requires Manager approval | CLIENT-CONV-L773-L774 | [CLIENT-CONFIRMED] |
| TEMP-BR-007 | Purchase ₹10,000–₹50,000 requires Company Admin approval | CLIENT-CONV-L776-L777 | [CLIENT-CONFIRMED] |
| TEMP-BR-008 | Purchase > ₹50,000 requires Owner approval | CLIENT-CONV-L779-L780 | [CLIENT-CONFIRMED] |
| TEMP-BR-009 | Financial records cannot be silently deleted; must have audit trail | CLIENT-CONV-L796-L796 | [CLIENT-CONFIRMED] |
| TEMP-BR-010 | Offline data sync conflicts should not automatically overwrite server data | CLIENT-CONV-L848-L848 | [CLIENT-CONFIRMED] |
| TEMP-BR-011 | Multi-farm visibility: Owner sees all farms, Farm Manager sees only their assigned farm | CLIENT-CONV-L852-L856 | [CLIENT-CONFIRMED] |
| TEMP-BR-012 | Data privacy: Farm worker cannot view employee salary; not all users can see purchase rate or profit reports | CLIENT-CONV-L878-L882 | [CLIENT-CONFIRMED] |

## From Chunk 2


# Business Rule Discovery - Chunk 2

| Rule ID | Rule Description | Source Lines | Status |
|---|---|---|---|
| TEMP-BR-001 | First-In-First-Out (FIFO) stock rotation must be used for dispatching eggs to ensure freshness. | CLIENT-CONV-L1198-L1202 | [CLIENT-CONFIRMED] |
| TEMP-BR-002 | Own farm eggs and purchased eggs must be tracked separately to calculate profit accurately. | CLIENT-CONV-L1267-L1297 | [CLIENT-CONFIRMED] |
| TEMP-BR-003 | Input Weight must exactly equal Saleable Output + By-products + Waste/Loss. Any mismatch triggers an alert. | CLIENT-CONV-L1869-L1890 | [CLIENT-CONFIRMED] |
| TEMP-BR-004 | High-value wastage adjustments require multi-level approval (Supervisor -> Manager). | CLIENT-CONV-L1820-L1834 | [CLIENT-CONFIRMED] |
| TEMP-BR-005 | Orders cancelled after processing has begun must follow specific business recovery policies (Rework, Alt Sale, Waste). | CLIENT-CONV-L1772-L1791 | [CLIENT-CONFIRMED] |
| TEMP-BR-006 | If actual processed yield is below expected yield %, an alert must be generated. | CLIENT-CONV-L1957-L1971 | [CLIENT-CONFIRMED] |

## From Chunk 3


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

## From Chunk 4


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

## From Chunk 5


# Business Rule Discovery - Chunk 5

* **TEMP-BR-05-001**: Expense thresholds dictate approval levels (Manager vs. Owner). [CLIENT-CONFIRMED] (Lines 4097-4101)
* **TEMP-BR-05-002**: Orders with negative margins are blocked by default and require documented reasons and manual approval to proceed. [CLIENT-CONFIRMED] (Lines 4178-4204)
* **TEMP-BR-05-003**: Reserved stock for confirmed orders must have an expiry rule to prevent indefinite holding without payment/confirmation. [CLIENT-CONFIRMED] (Lines 4450-4455)
* **TEMP-BR-05-004**: Product actual cost is not just purchase price; it must include transport, handling, processing, packaging, and wastage. [CLIENT-CONFIRMED] (Lines 4474-4494)
* **TEMP-BR-05-005**: Processing costs must be proportionally allocated to all output products (meat, liver, gizzard, feet, skin) derived from a batch. [CLIENT-CONFIRMED] (Lines 4496-4510)
* **TEMP-BR-05-006**: After processing begins, an order cannot be freely modified; modification rules depend on the current processing stage. [CLIENT-CONFIRMED] (Lines 4649-4654)
* **TEMP-BR-05-007**: Replacement orders for complaints must link to the original order and not be counted as new normal sales. [CLIENT-CONFIRMED] (Lines 4753-4758)
* **TEMP-BR-05-008**: Returned delivery products must not directly return to active stock; they require a QC check and reclassification (Resalable, Rework, Waste, Destroy). [CLIENT-CONFIRMED] (Lines 4888-4903)
* **TEMP-BR-05-009**: New orders must undergo a credit limit check. If the new order exceeds the max outstanding limit, it requires warning/approval. [CLIENT-CONFIRMED] (Lines 4799-4812)
