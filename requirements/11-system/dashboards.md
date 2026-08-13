# Role-Specific Dashboards Requirements

This document outlines the requirements for role-specific dashboards across the system [CONFIRMED].

## 1. Owner Dashboard [CLIENT-028]
- **Role:** Owner / Executive
- **KPIs:** Total Farms, Total Sheds, Active Batches, Live Birds, Today's Mortality, Today's Feed, FCR, Average Weight, Today's Sales, Outstanding, Stock Value, Expenses, Profit.
- **Widgets:** 
  - Farm Overview Summary (Farms, Sheds, Batches)
  - Live Bird count and Mortality Trend
  - Financial Summary (P&L, Outstanding, Sales vs Expenses)
- **Data Sources:** Core Farming, Sales, Finance, Inventory Modules
- **Refresh Rate:** Near Real-time (Sync dependent)
- **Alerts:** High Mortality, Low Weight, Poor FCR, Low Feed Stock, Overdue Payment, Medicine Expiry, Vaccine Due.
- **Access Level:** Owner / System Admin

## 2. Management Dashboard [CLIENT-180]
- **Role:** General Manager / Operations Manager
- **KPIs:** Production Yield, Farm Efficiency, Batch Profitability, Resource Utilization.
- **Widgets:** Cross-farm comparison, Batch performance metrics.
- **Data Sources:** All operational modules.
- **Refresh Rate:** Near Real-time.
- **Alerts:** High Mortality, Low Yield, High Wastage, Low Stock, Overdue Payment, High Return, Processing Bottleneck.
- **Access Level:** Management

## 3. Farm Manager Dashboard [CLIENT-036]
- **Role:** Farm Manager
- **KPIs:** Active Batches (Own Farm), Daily Mortality (Own Farm), Daily Feed (Own Farm), FCR, Weight, Alerts.
- **Widgets:** Farm Shed Status, Input vs Output, Vaccination Schedule.
- **Data Sources:** Farm Module.
- **Refresh Rate:** Real-time (Local) / Sync (Cloud).
- **Alerts:** Vaccine Due, Medicine Expiry, High Mortality.
- **Access Level:** Farm Manager (restricted to own farm data)

## 4. Supervisor Dashboard [CLIENT-028]
- **Role:** Farm Supervisor
- **KPIs:** Today's Tasks, Daily Entry Status, Mortality, Feed Consumption.
- **Widgets:** Task List, Quick Entry Shortcuts.
- **Data Sources:** Farm Module.
- **Refresh Rate:** Real-time.
- **Alerts:** Missed Entries, Task Reminders.
- **Access Level:** Supervisor

## 5. Warehouse Dashboard [CLIENT-030]
- **Role:** Warehouse Manager
- **KPIs:** Current Stock Levels, Daily Movements, Inward/Outward, Expiries.
- **Widgets:** Low Stock Items, Expiring Items, Recent Transfers.
- **Data Sources:** Inventory Module.
- **Refresh Rate:** Real-time.
- **Alerts:** Stock below minimum, Expiring in 30 days.
- **Access Level:** Warehouse Manager

## 6. Sales Dashboard [CLIENT-029]
- **Role:** Sales Manager
- **KPIs:** Today's Sales, Orders Pending, Dispatches, Revenue, Outstanding.
- **Widgets:** Sales by Channel, Top Customers.
- **Data Sources:** Sales Module.
- **Refresh Rate:** Real-time.
- **Alerts:** Overdue Payments.
- **Access Level:** Sales Team

## 7. Accounts Dashboard [CLIENT-029]
- **Role:** Accountant
- **KPIs:** Daily Cash Flow, Pending Approvals, A/R, A/P, Expenses.
- **Widgets:** Approval Queue, Cash vs Bank Balance, Pending Invoices.
- **Data Sources:** Finance Module.
- **Refresh Rate:** Real-time.
- **Alerts:** Overdue Payments, High Expenses.
- **Access Level:** Accounts / Finance

## 8. HR Dashboard [PROPOSED]
- **Role:** HR Manager
- **KPIs:** Total Headcount, Today's Attendance, Leave Requests, Payroll Status.
- **Widgets:** Absenteeism trend, Upcoming Appraisals.
- **Data Sources:** HR Module.
- **Refresh Rate:** Daily.
- **Alerts:** Unapproved Leaves, Missing Attendance.
- **Access Level:** HR

## 9. Processing Dashboard [CLIENT-180]
- **Role:** Processing Plant Manager
- **KPIs:** Queue, Capacity Utilization, Yield %, Wastage %.
- **Widgets:** Input vs Output, Grade-wise yield.
- **Data Sources:** Processing Module.
- **Refresh Rate:** Real-time.
- **Alerts:** High Wastage, Low Yield, Processing Bottleneck.
- **Access Level:** Processing Manager

## 10. Driver Dashboard [CLIENT-180]
- **Role:** Delivery Driver
- **KPIs:** Today's Trips, Deliveries Pending, Vehicle Status.
- **Widgets:** Route Map [FUTURE], Task List.
- **Data Sources:** Transport Module.
- **Refresh Rate:** Real-time.
- **Alerts:** Vehicle Breakdown.
- **Access Level:** Driver

## 11. Dealer Dashboard [PROPOSED]
- **Role:** Dealer
- **KPIs:** Own Orders, Payments, Outstanding.
- **Widgets:** Order History, Ledger Summary.
- **Data Sources:** Sales Module.
- **Refresh Rate:** Real-time.
- **Alerts:** Payment Due, Order Dispatched.
- **Access Level:** Dealer (restricted)

## 12. Egg Dashboard [CLIENT-071]
- **Role:** Egg Business Manager / Owner
- **KPIs:** Today's Collection, Sales, Stock, Grade-wise Stock, Purchase, Revenue, Avg Rate, Breakage %, Outstanding, Profit.
- **Widgets:** Collection vs Sales Trend, Grade Distribution.
- **Data Sources:** Egg Module.
- **Refresh Rate:** Near Real-time.
- **Alerts:** Rate Change, Stock Shortage, High Breakage.
- **Access Level:** Management
