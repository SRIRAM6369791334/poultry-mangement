# Notifications Catalog

[CONFIRMED] Based on CLIENT-030, CLIENT-072, CLIENT-073, CLIENT-180.

| ID | Trigger | Condition | Recipient | Priority | Channel | Message Example |
|---|---|---|---|---|---|---|
| NOTIF-001 | Mortality Threshold | Daily mortality > preset % | Farm Mgr, Owner | High | App, SMS | "Farm 03 mortality above threshold." |
| NOTIF-002 | Feed Stock Low | Warehouse stock < minimum | Warehouse Mgr | Medium | App | "Warehouse feed stock below minimum." |
| NOTIF-003 | Payment Overdue | Outstanding > due days | Sales, Accounts | High | App | "Dealer ABC payment overdue." |
| NOTIF-004 | Vaccine Due | Vaccine date = Tomorrow | Farm Mgr, Vet | High | App, SMS | "Vaccine due tomorrow for Batch 2026-015." |
| NOTIF-005 | Medicine Expiry | Expiry Date < 30 days | Warehouse Mgr | Medium | App | "Medicine XYZ expires in 30 days." |
| NOTIF-006 | Poor FCR | Batch FCR < threshold | Farm Mgr, Mgmt | High | App | "Batch 2026-015 has poor FCR." |
| NOTIF-007 | Low Weight/Yield | Measured weight < target | Farm Mgr, Mgmt | High | App | "Batch 2026-015 weight below target." |
| NOTIF-008 | Egg Rate Change | Egg market rate changes | Sales, Mgmt | Info | App | "Egg rate changed to ₹X." |
| NOTIF-009 | Egg Stock Shortage | Stock < daily avg sales | Sales, Warehouse| High | App | "Egg stock below minimum threshold." |
| NOTIF-010 | High Wastage/Return| Daily wastage > threshold | Processing Mgr | High | App | "Processing wastage above threshold." |
| NOTIF-011 | Vehicle Breakdown | Driver reports breakdown | Transport, Mgmt | Urgent | App, SMS | "Vehicle TN-XX-XXXX reported breakdown." |
| NOTIF-012 | Supplier Quality | Poor quality input logged | Warehouse, Mgmt | High | App | "Supplier quality issue reported." |
| NOTIF-013 | Processing Bottleneck| Processing queue > threshold| Processing Mgr | Medium | App | "Processing bottleneck detected." |
