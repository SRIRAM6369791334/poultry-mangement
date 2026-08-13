# Conversation Index - Chunk 2

| ID | Source Lines | Topic | Client Statement Summary | Domain | Status |
|---|---|---|---|---|---|
| IDX-001 | CLIENT-CONV-L1014-L1032 | Egg Grading | Eggs are graded by size and quality (Small, Medium, Large, Extra Large) and type (Good, Broken, Damaged, Rejected). | Egg Management | [CLIENT-CONFIRMED] |
| IDX-002 | CLIENT-CONV-L1047-L1058 | Egg Stock | Maintain grade-wise egg stock. Updated by both purchase and sales. | Egg Inventory | [CLIENT-CONFIRMED] |
| IDX-003 | CLIENT-CONV-L1060-L1074 | Egg Locations | Need location-wise inventory (Farm, Collection Center, Warehouse, Dealer, Shop). | Egg Inventory | [CLIENT-CONFIRMED] |
| IDX-004 | CLIENT-CONV-L1075-L1091 | Egg Purchase | Purchase process requires tracking supplier, quantity, grade, rate, date, transport charges. | Egg Purchase | [CLIENT-CONFIRMED] |
| IDX-005 | CLIENT-CONV-L1092-L1124 | Egg Sales & Rates | Selling to multiple customer types with different rates (Wholesale, Retail, etc.). Rate history is needed. | Egg Sales | [CLIENT-CONFIRMED] |
| IDX-006 | CLIENT-CONV-L1126-L1139 | Daily Rate Changes | Egg rates change daily. System must track current, previous, customer-specific, and grade-specific rates. | Egg Pricing | [CLIENT-CONFIRMED] |
| IDX-007 | CLIENT-CONV-L1141-L1165 | Unit Conversions | Support for multiple units (Piece, Tray, Carton) with dynamic, non-hardcoded configurations. | Egg Inventory | [CLIENT-CONFIRMED] |
| IDX-008 | CLIENT-CONV-L1167-L1182 | Broken Eggs | Handle egg breakage and damage during handling. Stock reconciliation formula provided. | Egg Inventory | [CLIENT-CONFIRMED] |
| IDX-009 | CLIENT-CONV-L1184-L1197 | Egg Returns | Customer returns need quality inspection and disposition to stock or wastage. | Egg Sales | [CLIENT-CONFIRMED] |
| IDX-010 | CLIENT-CONV-L1198-L1202 | Egg Expiry | Track freshness/expiry using FIFO stock rotation. | Egg Inventory | [CLIENT-CONFIRMED] |
| IDX-011 | CLIENT-CONV-L1204-L1207 | Warehouse Temperature | Future tracking of storage conditions and temperature. | Egg Inventory | [FUTURE] |
| IDX-012 | CLIENT-CONV-L1225-L1239 | Egg Vehicles | Track egg delivery vehicles, trips, drivers, routes, fuel, and status. | Logistics | [CLIENT-CONFIRMED] |
| IDX-013 | CLIENT-CONV-L1241-L1266 | Customer Ledger | Support multiple payment methods and maintain customer outstanding balances/ledgers. | Finance | [CLIENT-CONFIRMED] |
| IDX-014 | CLIENT-CONV-L1267-L1297 | Egg Profitability | Differentiate own production vs purchased eggs to calculate accurate profitability. | Finance | [CLIENT-CONFIRMED] |
| IDX-015 | CLIENT-CONV-L1316-L1332 | Flexible Logistics | Support direct farm-to-dealer delivery, bypassing warehouse. | Logistics | [CLIENT-CONFIRMED] |
| IDX-016 | CLIENT-CONV-L1372-L1395 | Alerts | Need alerts for rate changes and stock shortages. | Notifications | [CLIENT-CONFIRMED] |
| IDX-017 | CLIENT-CONV-L1413-L1426 | Poultry Species | Do not hardcode chicken. Must support various bird types (Duck, Quail, Turkey, etc.). | Master Data | [CLIENT-CONFIRMED] |
| IDX-018 | CLIENT-CONV-L1428-L1444 | Live Bird Sales | Track both bird quantity and live weight during sales. | Poultry Sales | [CLIENT-CONFIRMED] |
| IDX-019 | CLIENT-CONV-L1471-L1515 | Processing Loss | Handle live bird processing into usable chicken, track processing loss clearly. | Processing | [CLIENT-CONFIRMED] |
| IDX-020 | CLIENT-CONV-L1517-L1535 | Loss Categories | Provide detailed loss categories (Blood, Feather, Skin, etc.) that are configurable. | Processing | [CLIENT-CONFIRMED] |
| IDX-021 | CLIENT-CONV-L1537-L1583 | By-Products | Handle saleable by-products (Liver, Gizzard, etc.) separate from main product and waste. | Processing | [CLIENT-CONFIRMED] |
| IDX-022 | CLIENT-CONV-L1585-L1638 | Weight Variance | Track actual vs requested weight (overweight/underweight) and record adjustments. | Sales & Processing | [CLIENT-CONFIRMED] |
| IDX-023 | CLIENT-CONV-L1657-L1676 | Transport Weight Loss | Reconcile dispatch weight vs delivery weight due to transport loss. | Logistics | [CLIENT-CONFIRMED] |
| IDX-024 | CLIENT-CONV-L1677-L1691 | Bird Mortality | Track mortality sources (Farm, Transport, Receiving, Processing). | Inventory | [CLIENT-CONFIRMED] |
| IDX-025 | CLIENT-CONV-L1772-L1799 | Cancellations | Differentiate pre-processing vs post-processing cancellations, support partial cancellations. | Sales | [CLIENT-CONFIRMED] |
| IDX-026 | CLIENT-CONV-L1820-L1834 | Wastage Approval | Multi-level approval (Supervisor -> Manager) needed for high-value wastage. | Workflow | [CLIENT-CONFIRMED] |
| IDX-027 | CLIENT-CONV-L1869-L1890 | Weight Reconciliation | Reconcile input weight with saleable output + by-products + waste/loss. | Processing | [CLIENT-CONFIRMED] |
| IDX-028 | CLIENT-CONV-L1941-L1971 | Yield Percentage | Calculate yield % and alert if actual yield is below expected yield. | Processing | [CLIENT-CONFIRMED] |
| IDX-029 | CLIENT-CONV-L1973-L1999 | Customer Specs | Track customer-specific processing specs (Whole, Curry Cut, Boneless, etc.). | Processing | [CLIENT-CONFIRMED] |
