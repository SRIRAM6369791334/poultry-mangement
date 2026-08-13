# Entity Discovery

| Entity | Description | Relationships | Source Lines | Status |
|---|---|---|---|---|
| Credit Note | Document for adjusting customer balance for partial refunds. | Belongs to Invoice/Customer | 3044-3053 | [CLIENT-CONFIRMED] |
| Debit Note | Document for supplier-related discrepancy adjustments. | Belongs to Purchase/Supplier | 3054-3057 | [CLIENT-CONFIRMED] |
| Cost Center | Groupings like Farm, Warehouse, Processing, Sales to track expenses. | Has many Expenses | 3225-3237 | [CLIENT-CONFIRMED] |
| Business Calendar | Calendar to track demand variables (Festivals, Weekends). | Related to Forecasting | 3152-3165 | [CLIENT-CONFIRMED] |
| Product Lifecycle | Categorization of a product's market state (e.g. Fast Moving, Non Moving). | Belongs to Product | 3824-3843 | [CLIENT-CONFIRMED] |
| Batch Transfer | Record of moving birds between sheds/farms. | Has Source Location, Destination Location, Qty, Reason | 3982-3995 | [CLIENT-CONFIRMED] |
