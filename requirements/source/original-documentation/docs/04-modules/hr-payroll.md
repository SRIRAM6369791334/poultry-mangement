# HR & Payroll Module

## 1. Overview
The HR & Payroll module manages the workforce of the poultry operation, which typically includes a mix of corporate staff, permanent farm managers, and unorganized/contract daily-wage laborers. It tracks attendance, manages advances (common in agriculture), and processes payroll.

## 2. Employee Management
### Employee Master Data
*   **Basic Info:** Name, DOB, Contact, Address, Identity Proof (Aadhar, SSN, etc.).
*   **Categories:** 
    *   Permanent / Salaried
    *   Contractual / Piece-rate
    *   Daily Wager / Casual Labor
*   **Structure:** Department (Admin, Production, Feed Mill, Sales) and Designation (Farm Manager, Supervisor, Worker, Driver).
*   **Assignment:** Mapping workers and supervisors to specific Zones, Farms, or Sheds.

### Farm Worker Management
*   **Supervisor Hierarchy:** Workers report to Farm Supervisors, who report to Area Managers.
*   **Shed Assignment:** For biosecurity and accountability, workers are often restricted to specific sheds. Payroll can allocate worker costs directly to the batch active in their assigned shed.

## 3. Attendance Management
*   **Modes of Capture:** 
    *   Biometric/RFID integration at farm gates.
    *   Mobile app check-in (Geo-fenced) for field staff/supervisors.
    *   Manual entry by Farm Manager for daily wage workers.
*   **Leave Management:** Configurable leave types (Casual Leave, Sick Leave, Paid Leave). Leave balance tracking and approval workflows.

## 4. Salary Structure & Components
The system supports both complex corporate payroll and simple farm payroll.

### Enterprise / Organized Sector (Salaried)
*   **Earnings:** Basic Salary, HRA (Housing), DA (Dearness), Travel Allowance, Medical Allowance.
*   **Deductions:** PF (Provident Fund), ESI (Employee State Insurance), TDS (Income Tax), Professional Tax. [Note: Statutory deductions are configurable per country/state laws].

### Small Farm / Unorganized Sector (Wages)
*   **Earnings:** Fixed Gross Monthly Salary OR Daily Rate × Days Worked.
*   **Piece-Rate:** E.g., loading/unloading feed bags paid per ton/bag.

## 5. Advance & Loan Management
A critical feature in agricultural HR is managing advances.
*   **Advance Issuance:** Workers frequently take salary advances.
*   **Deduction Tracking:** System automatically deducts an agreed installment amount from the monthly payroll until the advance is recovered.
*   **Loans:** Long-term loans with optional interest calculations.

## 6. Overtime (OT) Management
*   **OT Calculation:** Tracking extra hours worked (e.g., during chick placement nights or catching nights).
*   **Rate Multiplier:** Configurable (e.g., 1.5x or 2x normal hourly rate).
*   **Approval:** OT must be approved by the Farm Supervisor before impacting payroll.

## 7. Payroll Processing Workflow
1.  **Period Definition:** Usually monthly, but supports weekly/bi-weekly for daily wagers.
2.  **Data Collation:** System aggregates Attendance + Approved Leaves + Approved OT.
3.  **Calculation:** Gross Earnings - Statutory Deductions - Advance Recoveries.
4.  **Review:** Draft payroll register generated for HR/Finance approval.
5.  **Finalization:** Payroll locked, accounting journal entries auto-posted.

## 8. Reports & Outputs
*   **Pay Slips:** Printable/emailable PDF for employees.
*   **Salary Register:** Master report of all payouts for the period.
*   **Statutory Reports:** PF/ESI contribution files (localization dependent).
*   **Bank Transfer File:** Formatted CSV for bulk bank uploads.
*   **Labor Cost Allocation Report:** Shows how labor costs are distributed across active batches for cost accounting.
