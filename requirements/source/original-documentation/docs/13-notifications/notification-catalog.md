# Notification & Alert Catalog (AG-12)

This document outlines the standard system notifications, alerts, and escalation policies.

## Format Description
* **Alert ID:** NTF-XXXX
* **Name:** Descriptive name
* **Trigger:** Condition that generates the alert
* **Priority:** Critical (Immediate action), High (Action today), Medium (Review), Low (Info)
* **Recipients:** Roles that receive the alert
* **Channels:** In-App, Email, SMS, Push
* **Configurable:** Yes/No

---

## 1. Mortality & Health Alerts
* **NTF-1001: High Daily Mortality** 
  * *Trigger:* Daily mortality > Configured threshold (e.g., 0.5%). 
  * *Priority:* Critical. *Recipients:* Farm Manager, Vet. *Channels:* Push, SMS. 
* **NTF-1002: Cumulative Mortality Warning** 
  * *Trigger:* Cumulative mortality > Standard breed curve + 2%. 
  * *Priority:* High. *Recipients:* Farm Manager, Owner.
* **NTF-1003: Vaccination Due Reminder** 
  * *Trigger:* 24 hours before scheduled vaccination. 
  * *Priority:* Medium. *Recipients:* Supervisor, Vet. *Channels:* In-App, Push.
* **NTF-1004: Vaccination Missed** 
  * *Trigger:* Scheduled vaccination not marked complete by end of day. 
  * *Priority:* High. *Recipients:* Farm Manager, Vet.
* **NTF-1005: Disease Incident Logged** 
  * *Trigger:* Vet logs a new disease incident. 
  * *Priority:* High. *Recipients:* Farm Manager.

## 2. Feed & Water Alerts
* **NTF-2001: Low Feed Stock** 
  * *Trigger:* Farm feed inventory < 2 days expected consumption. 
  * *Priority:* High. *Recipients:* Farm Manager, Feed Mill. *Channels:* In-App, SMS.
* **NTF-2002: Abnormal Feed Consumption (Low)** 
  * *Trigger:* Daily intake < 80% of standard. 
  * *Priority:* Critical. *Recipients:* Farm Manager, Vet.
* **NTF-2003: Abnormal Feed Consumption (High)** 
  * *Trigger:* Daily intake > 120% of standard. 
  * *Priority:* Medium. *Recipients:* Farm Manager.
* **NTF-2004: Water Consumption Drop** 
  * *Trigger:* Water intake drops > 20% from previous day. 
  * *Priority:* High. *Recipients:* Farm Manager, Vet.
* **NTF-2005: Feed Mill Raw Material Low** 
  * *Trigger:* Maize/Soya stock below safety level. 
  * *Priority:* High. *Recipients:* Feed Mill Mgr, Purchase.

## 3. Production Alerts (Layer/Breeder)
* **NTF-3001: Egg Production Drop** 
  * *Trigger:* Daily production drops > 5% from previous day. 
  * *Priority:* Critical. *Recipients:* Farm Manager, Vet.
* **NTF-3002: Low Hatchability** 
  * *Trigger:* Hatchability % < 80% (configurable). 
  * *Priority:* High. *Recipients:* Hatchery Mgr, Quality.
* **NTF-3003: Egg Weight Variance** 
  * *Trigger:* Average egg weight deviates > 10% from standard. 
  * *Priority:* Medium. *Recipients:* Farm Manager.

## 4. Production Alerts (Broiler)
* **NTF-3101: Low Body Weight** 
  * *Trigger:* Weekly sample weight < 90% of standard. 
  * *Priority:* High. *Recipients:* Farm Manager, Vet.
* **NTF-3102: High CV (Poor Uniformity)** 
  * *Trigger:* Flock weight CV > 12%. 
  * *Priority:* Medium. *Recipients:* Farm Manager.

## 5. Financial & Commercial Alerts
* **NTF-4001: Customer Credit Limit Exceeded** 
  * *Trigger:* Sales order pushes balance over limit. 
  * *Priority:* High. *Recipients:* Sales Mgr, Finance.
* **NTF-4002: Overdue Payment** 
  * *Trigger:* Invoice > 30 days past due. 
  * *Priority:* Medium. *Recipients:* Accounts Rec, Sales Mgr.
* **NTF-4003: Payment Received** 
  * *Trigger:* Receipt logged in system. 
  * *Priority:* Low. *Recipients:* Sales Mgr.
* **NTF-4004: Vendor Invoice Due** 
  * *Trigger:* 3 days before payment due date. 
  * *Priority:* Medium. *Recipients:* Accounts Pay.
* **NTF-4005: PO Approval Pending** 
  * *Trigger:* PO awaiting approval > 24 hours. 
  * *Priority:* Medium. *Recipients:* Approver.
* **NTF-4006: High Batch Cost Variance** 
  * *Trigger:* Estimated cost/kg > 10% above budget. 
  * *Priority:* High. *Recipients:* Owner, Finance.

## 6. Inventory Alerts
* **NTF-5001: Item Reorder Level Reached** 
  * *Trigger:* Stock <= Reorder level. 
  * *Priority:* Medium. *Recipients:* Inventory Mgr.
* **NTF-5002: Stock Expiring Soon** 
  * *Trigger:* Vaccine/Meds expiring within 30 days. 
  * *Priority:* High. *Recipients:* Inventory Mgr, Vet.
* **NTF-5003: Stock Expired** 
  * *Trigger:* Expiry date reached. 
  * *Priority:* Critical. *Recipients:* Inventory Mgr, Vet. (Auto-blocks issue).
* **NTF-5004: High Variation in Physical Stock** 
  * *Trigger:* Stock audit variance > 5%. 
  * *Priority:* High. *Recipients:* Finance, Inventory Mgr.

## 7. Workflow & Operations Alerts
* **NTF-6001: Daily Data Entry Missed** 
  * *Trigger:* 10:00 AM and no mortality/feed logged for previous day. 
  * *Priority:* High. *Recipients:* Farm Supervisor, Manager. *Channels:* Push, SMS.
* **NTF-6002: Batch Liquidation Ready** 
  * *Trigger:* Broiler batch reaches target age (e.g., 35 days). 
  * *Priority:* Medium. *Recipients:* Sales, Farm Manager.
* **NTF-6003: Shed Readiness Incomplete** 
  * *Trigger:* 2 days before DOC arrival, prep checklist not done. 
  * *Priority:* High. *Recipients:* Farm Manager.
* **NTF-6004: Dispatch Vehicle Arrived** 
  * *Trigger:* Gate entry logged for sales vehicle. 
  * *Priority:* Low. *Recipients:* Dispatch/Sales.

## 8. System Alerts
* **NTF-7001: Failed Data Sync** 
  * *Trigger:* Mobile app fails to sync for 48 hours. 
  * *Priority:* High. *Recipients:* Farm Supervisor, IT Support.
* **NTF-7002: Integration Error (IoT/Weighbridge)** 
  * *Trigger:* Sensor/API endpoint unreachable. 
  * *Priority:* Critical. *Recipients:* IT Admin.
* **NTF-7003: Automated Backup Failure** 
  * *Trigger:* Database backup fails. 
  * *Priority:* Critical. *Recipients:* Super Admin.
