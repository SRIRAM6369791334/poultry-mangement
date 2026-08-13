# Dashboard Designs (AG-12)

This document details the dashboard layouts and KPIs for various roles.

## 1. Organization Owner Dashboard (UX-D1)
**Focus:** High-level profitability, performance, and risk.
* **KPIs:** Total Revenue (MTD), Net Profit (MTD), Active Birds, Overall FCR (Broiler), Egg Production % (Layer).
* **Charts:** 
  * Revenue vs Expense (Bar Chart, 12 months)
  * Farm Performance Comparison (Radar Chart - FCR, Livability, Cost/Bird)
* **Tables:** Top 5 Best Performing Batches, Bottom 5 Batches (requires attention).
* **Alerts:** Critical financial alerts, disease outbreaks.
* **Quick Actions:** View Executive Report.

## 2. Farm Manager Dashboard (UX-D2)
**Focus:** Operational efficiency of the assigned farm.
* **KPIs:** Active Batches, Today's Mortality, Feed Stock (Days Remaining), Avg Body Weight vs Standard.
* **Charts:**
  * Mortality Trend (Line Chart, last 7 days)
  * Feed Consumption vs Standard (Area Chart, age of batch)
* **Tables:** Active Batches Status (Batch, Age, Size, Mortality%, FCR).
* **Alerts:** Temperature/Humidity anomalies, feed shortage warnings, mortality spikes.
* **Quick Actions:** Record Daily Data, Request Feed.

## 3. Farm Supervisor Dashboard (UX-D3)
**Focus:** Task execution and daily data entry.
* **KPIs:** Tasks Completed / Total Tasks, Pending Data Entries, Today's Dead Birds.
* **Charts:** N/A (Keep it simple, focus on task lists).
* **Tables:** Today's To-Do List (Vaccinations, Feeding, Collection).
* **Alerts:** Missed entries, upcoming tasks.
* **Quick Actions:** Enter Mortality, Enter Feed, Enter Eggs.

## 4. Veterinarian Dashboard (UX-D4)
**Focus:** Flock health, medication, and livability.
* **KPIs:** Total Mortality (Week), Active Disease Incidents, Batches on Medication.
* **Charts:**
  * Mortality Causes (Pie Chart - e.g., Coccidiosis, CRD, Ascites)
  * Average Livability by Farm (Bar Chart)
* **Tables:** Upcoming Vaccinations (Next 7 Days), Recent Post-Mortem Results.
* **Alerts:** Missed vaccinations, abnormal mortality thresholds breached.
* **Quick Actions:** Log Post-Mortem, Prescribe Medication.

## 5. Feed Manager Dashboard (UX-D5)
**Focus:** Feed mill operations, stock levels, and quality.
* **KPIs:** Raw Material Stock (Tons), Finished Feed Stock (Tons), Daily Production (Tons), Pending Farm Requests.
* **Charts:**
  * Raw Material Price Trends (Line Chart - Maize, Soya)
  * Feed Formula Cost Variance (Bar chart - Standard vs Actual)
* **Tables:** Pending Purchase Orders, Feed Requisition Queue.
* **Alerts:** Reorder levels reached for ingredients.
* **Quick Actions:** Create PO, Issue Feed to Farm.

## 6. Inventory Manager Dashboard (UX-D6)
**Focus:** Stock movement, valuation, and expiry.
* **KPIs:** Total Inventory Value, Items Below Minimum Stock, Pending GRNs, Items Expiring in 30 Days.
* **Charts:**
  * Inventory Value by Category (Donut Chart - Feed, Medicine, Equipment)
  * Monthly Stock Issues vs Receipts (Column Chart)
* **Tables:** Low Stock Alerts, Recent Transactions.
* **Alerts:** Approaching expiry dates, stock-outs.
* **Quick Actions:** New GRN, Stock Transfer.

## 7. Sales Manager Dashboard (UX-D7)
**Focus:** Revenue, dispatches, and receivables.
* **KPIs:** Today's Sales Value, Pending Sales Orders, Total Receivables, Dispatches Scheduled.
* **Charts:**
  * Sales by Product Category (Pie Chart - Broiler, Cull Birds, Eggs, Manure)
  * Revenue Trend (Line Chart, 30 days)
* **Tables:** Top Customers by Volume, Overdue Payments.
* **Alerts:** Customer credit limit exceeded, delayed dispatches.
* **Quick Actions:** Create Sales Order, Create Invoice.

## 8. Accountant Dashboard (UX-D8)
**Focus:** Cash flow, payables, and batch costing.
* **KPIs:** Cash & Bank Balance, Total Payables, Total Receivables, Unreconciled Transactions.
* **Charts:**
  * Cash Flow Forecast (Waterfall Chart)
  * Batch Cost Breakdown (Stacked Bar - Feed, DOC, Meds, Overheads)
* **Tables:** Bills to Pay, Invoices to Collect.
* **Alerts:** Bounced cheques, pending approvals.
* **Quick Actions:** Make Payment, Receive Payment.

## 9. Super Admin Dashboard (UX-D9)
**Focus:** System health, tenant usage.
* **KPIs:** Total Tenants, Active Users, Storage Used, API Errors.
* **Charts:**
  * Active Users over 24h (Line Chart)
* **Tables:** Tenant Subscription Status (Renewals due).
* **Alerts:** High CPU/Memory usage, failed backups.
* **Quick Actions:** Manage Users, View Logs.
