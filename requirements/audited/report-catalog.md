# REPORT CATALOG (V2 — AUDITED)

**Version:** 2.0.0 | **Date:** 2026-08-13 | Part of `requirements/audited/`
**Purpose:** Canonical report list. Corrects the BRD_STATUS error "Total Reports: 0" (CONFLICT-011) and reconciles the 33 client-requested vs 18 catalogued vs 57 generic reports.

---

## 1. CLIENT-REQUESTED REPORTS (33 discovered → 18 catalogued)

### 1.1 Catalogued client reports (REP-F/E/S/FI — requirements/11-system/reports-catalog.md)

| ID | Report | KPIs / Content |
|---|---|---|
| REP-F01 | Farm Performance Report | production, mortality, feed, weight, cost per farm |
| REP-F02 | Batch Performance Report | production, mortality, feed, weight, FCR, ADG |
| REP-F03 | Production Report | counts by batch/farm/period |
| REP-F04 | Mortality Report | by source (Farm, Transport, Receiving, Processing, Other), by reason |
| REP-F05 | Feed Report | consumption vs standard, by batch |
| REP-F06 | Weight Report | weekly avg vs target, abnormal growth |
| REP-F07 | FCR Report | batch FCR + trend |
| REP-E01 | Daily Egg Collection | morning/evening, per farm/source |
| REP-E02 | Grade-wise Stock | size × quality × location |
| REP-E03 | Breakage & Wastage Report | breakage %, damaged |
| REP-E04 | Egg Rate History | rate changes with effective dates |
| REP-E05 | Egg Business P&L | own vs purchased differentiation |
| REP-S01 | Daily Sales Report | by customer type / selling mode |
| REP-S02 | Dealer Performance | sales, returns, outstanding, aging |
| REP-S03 | Outstanding Report | customer/dealer aging 30/60/90 |
| REP-FI01 | Income/Expense Report | by cost center |
| REP-FI02 | Profit & Loss | period, by farm/batch |
| REP-FI03 | Cost Analysis Report | batch cost breakdown |

### 1.2 Additional client-requested (15 more — from report-discovery, to be added to catalog)

Live vs Processed Profitability · Daily Weight Loss & Yield (Live Input, Processed, Loss, By-products, Waste, Yield %) · Processing Time & Bottleneck · Physical Count vs System Stock Difference · Farm Profitability · Slow/Non-Moving Stock · Purchase & Production Recommendation · Farm & Shed Comparison (Mortality, FCR, Cost, Yield) · Forecast Accuracy (Prediction vs Actual) · Supplier Comparison · Cost vs Profitability (customer/dealer/route) · User Activity/Audit Trail · Batch Performance Ranking (Best/Normal/At Risk/Critical) · Quality Complaint Trend · Dealer Contribution Analytics [FUTURE] · Customer Profitability Analytics [FUTURE].

---

## 2. GENERIC REPORT CATALOG (57 — REP-1001..REP-9004, docs/12-reports; reference for R&D)

| Section | Count | Examples |
|---|---|---|
| Farm & Flock | 5 | REP-1001 Active Batch Status; 1002 Batch History; 1003 Farm Performance Ranking; 1004 Shed Utilization; 1005 Daily Farm Operations Log |
| Broiler | 5 | REP-2001 Daily Growth; 2002 Mortality Analysis; 2003 FCR Trend; 2004 End of Batch Summary (Liquidation); 2005 Catching & Dispatch Variance |
| Layer/Breeder | 5 | REP-2101 Daily Egg Production (HDP%, HHP); 2102 Grading Summary; 2103 Hatchability; 2104 Body Weight Uniformity; 2105 Egg Stock Ledger |
| Hatchery | 5 | REP-2201 Setter Loading; 2202 Candling; 2203 Output & Cull; 2204 Hatchability Variance; 2205 Chick Dispatch |
| Feed | 5 | REP-3001 Consumption vs Standard; 3002 Feed Stock Ledger; 3003 Feed Mill Production; 3004 RM Usage Variance; 3005 Feed Cost Analysis |
| Health & Vaccination | 5 | REP-4001 Vaccination Compliance; 4002 Disease Outbreak Map; 4003 Post-Mortem; 4004 Medication Usage; 4005 Water Quality & Sanitation |
| Inventory | 6 | REP-5001 Valuation; 5002 Reorder Level Alert; 5003 Stock Expiry; 5004 GRN Register; 5005 Material Issue Register; 5006 Stock Reconciliation |
| Financial | 8 | REP-6001 Batch P&L; 6002 Farm/Branch Profitability; 6003 Cost of Production; 6004 Trial Balance; 6005 General Ledger; 6006 AP Aging; 6007 AR Aging; 6008 Cash Flow |
| Sales | 5 | REP-7001 Daily Sales Register; 7002 Customer Outstanding Summary; 7003 Sales Realization; 7004 Dispatch Variance; 7005 Customer Profitability |
| Purchase | 4 | REP-8001 PO Register; 8002 Vendor Performance; 8003 Price Trend; 8004 Pending Indent |
| HR & Management | 4 | REP-9001 Attendance & Overtime; 9002 Labor Productivity; 9003 Executive Dashboard Summary; 9004 Audit Trail |

---

## 3. CORRECTED COUNTS

| Metric | v1 (incorrect) | V2 |
|---|---|---|
| BRD_STATUS "Total Reports" | 0 | 18 catalogued + 15 pending addition = 33 client-requested |
| Generic catalog | "50+" | 57 (REP-1001..9004) |
| Traceability report names | informal names (Hen-Day Production, Grower Settlement, Yield Variance, Farm Health Status) | must map to REP-IDs (CONFLICT-031) |

---

## 4. REPORT REQUIREMENTS (cross-cutting)

- **Export:** PDF, Excel, CSV [PROPOSED]; scheduled email delivery [PROPOSED].
- **Access:** profitability reports → Owner + authorized senior mgmt only; salaries → HR/Senior Accounts/Owner; purchase rates → Procurement/Accounts/Owner (CORE-10).
- **Performance:** batch P&L < 10s; dashboard < 3s across 30+ batches / 42 sheds [PROPOSED]; generic NFR < 10s.
- **Freshness:** materialized views refreshed by background jobs for historical reports (≤1h delay, ADR-009); real-time for active batches.
- **Client KPIs (Owner morning dashboard):** overall mortality, batch health, FCR, outstanding, cash, profitability, alerts.

---

*End of report-catalog.md (V2).*