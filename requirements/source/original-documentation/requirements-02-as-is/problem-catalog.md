# Problem Catalog

## Explicit Client Problems [CONFIRMED]

| ID | Problem | Current Situation | Business Impact | Root Cause | Risk Level | Suggested Solution | Priority | Related Module | Source |
|---|---|---|---|---|---|---|---|---|---|
| PROB-001 | Duplicate Data Entry | Farm supervisor notebook → office Excel → accountant Excel. | Wasted man-hours, high risk of transcription errors. | Lack of a centralized database. | High | Centralized cloud ERP | High | Core System | Client Prob 1 |
| PROB-002 | Data Entry Mistakes | 5 birds mortality typed as 50. | Skewed inventory and profitability metrics. | Manual transcription without validation. | High | Validation rules at entry | High | Farm Management | Client Prob 2 |
| PROB-003 | Delayed Information | Morning mortality known by evening/next day. | Delayed response to disease or feed issues. | Reliance on paper reporting. | Critical | Mobile-first real-time entry | High | Farm Management | Client Prob 3 |
| PROB-004 | Stock Mismatch | Warehouse register says 1000 kg feed, actual is 850 kg. | Pilferage risk, stockouts, inaccurate valuation. | Manual ledger updates. | High | Real-time inventory tracking | High | Inventory | Client Prob 4 |
| PROB-005 | Batch Cost Unknown | Cannot immediately tell actual cost of a batch. | Poor pricing decisions, delayed financial visibility. | Disconnected operational and financial systems. | Critical | Automated cost allocation | High | Finance | Client Prob 5 |
| PROB-006 | Profitability Unknown | Sales amount known but total cost unknown. | Inability to evaluate true business health. | Lack of integrated accounting. | Critical | Integrated ERP reporting | High | Finance / BI | Client Prob 6 |
| PROB-007 | Employee Attendance | Manual register, salary calculation separate. | Administrative burden, payroll errors. | Disconnected HR processes. | Medium | Integrated HRMS module | Medium | HRMS | Client Prob 7 |
| PROB-008 | Dealer Balance | Manual check required for purchased/paid/outstanding. | Delayed collections, credit risk. | Disconnected billing/payments. | High | Automated dealer ledger | High | Sales | Client Prob 8 |
| PROB-009 | Vehicle Cost Unknown | Diesel/maintenance/trip cost unknown per farm. | Inaccurate overhead allocation. | Unlinked vehicle registers. | High | Fleet management module | High | Logistics | Client Prob 9 |
| PROB-010 | Reporting Bottlenecks | Accountant combines multiple Excel files for owner. | Slow decision-making, management blind spots. | Siloed data architecture. | Critical | Automated real-time dashboard | High | BI/Dashboard | Client Prob 10 |

## Inferred Problems [INFERRED]

| ID | Problem | Current Situation | Business Impact | Root Cause | Risk Level | Suggested Solution | Priority | Related Module | Source |
|---|---|---|---|---|---|---|---|---|---|
| PROB-011 | Lack of Demand Forecasting | Relies on manual estimation for 30+ batches. | Over/under stocking of feed and chicks. | Absence of predictive analytics. | Medium | Forecasting engine | Medium | BI | INFERRED |
| PROB-012 | Poor Supplier Performance Tracking | Excel and paper POs used for tracking. | May continue using suboptimal suppliers. | No centralized vendor evaluation. | Medium | Vendor rating system | Low | Procurement | INFERRED |
| PROB-013 | Scalability Limitations | Current manual processes support 8 farms. | Expansion to 15-20 farms will break admin processes. | High reliance on manual data reconciliation. | High | Scalable cloud architecture | High | Architecture | INFERRED |
