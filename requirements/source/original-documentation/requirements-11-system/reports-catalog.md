# Reports Catalog

[CONFIRMED] Reporting requirements based on CLIENT-029 and CLIENT-070.

## 1. Farm Reports
| ID | Name | Purpose | Users | Filters | KPIs | Frequency |
|---|---|---|---|---|---|---|
| REP-F01 | Performance Report | Overall farm performance | Owner, Mgmt | Farm, Date | Efficiency | Daily/Monthly |
| REP-F02 | Batch Report | End-to-end batch data | Mgmt, Farm Mgr | Batch ID | Profitability, FCR | Per Batch |
| REP-F03 | Production Report | Daily production metrics | Farm Mgr | Date, Shed | Production | Daily |
| REP-F04 | Mortality Report | Mortality tracking | Farm Mgr, Vet | Farm, Shed, Reason | Mortality % | Daily |
| REP-F05 | Feed Report | Feed consumption | Farm Mgr | Farm, Batch | Intake | Daily |
| REP-F06 | Weight Report | Bird weight tracking | Farm Mgr | Farm, Batch | Avg Weight, ADG | Weekly |
| REP-F07 | FCR Report | Feed Conversion Ratio | Mgmt | Farm, Batch | FCR | Weekly/Batch |

## 2. Egg Reports [CLIENT-070]
| ID | Name | Purpose | Users | Filters | KPIs | Frequency |
|---|---|---|---|---|---|---|
| REP-E01 | Daily Collection | Track egg collection | Farm Mgr | Farm, Shed | Total Eggs | Daily |
| REP-E02 | Grade-wise Stock | Current egg stock | Mgmt, Sales | Grade | Stock count | Real-time |
| REP-E03 | Breakage/Wastage | Track losses | Mgmt | Farm, Reason | Breakage % | Daily |
| REP-E04 | Rate History | Track egg pricing | Sales, Accounts | Date Range | Avg Rate | Monthly |
| REP-E05 | Profit & Loss | Profitability | Owner | Date Range | Profit | Monthly |

## 3. Sales Reports
| ID | Name | Purpose | Users | Filters | KPIs | Frequency |
|---|---|---|---|---|---|---|
| REP-S01 | Daily Sales | Track sales | Sales | Route, Product | Volume, Value | Daily |
| REP-S02 | Dealer Performance | Sales by dealer | Sales | Dealer | Sales, Outstanding | Monthly |
| REP-S03 | Outstanding Report | Accounts Receivable | Accounts | Customer | Overdue Amt | Weekly |

## 4. Finance Reports
| ID | Name | Purpose | Users | Filters | KPIs | Frequency |
|---|---|---|---|---|---|---|
| REP-FI01| Income/Expense | Track cash flows | Accounts | Category | Net Flow | Monthly |
| REP-FI02| Profit & Loss | Overall profitability | Owner | Period | Net Profit | Monthly |
| REP-FI03| Cost Analysis | Break down costs | Mgmt | Cost Center | Cost | Monthly |

## Export Capabilities
All reports must support export to Excel and PDF formats [PROPOSED].
