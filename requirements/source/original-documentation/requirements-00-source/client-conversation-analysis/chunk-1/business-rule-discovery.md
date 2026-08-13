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
