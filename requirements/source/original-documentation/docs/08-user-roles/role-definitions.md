# User Role Definitions

## Role Descriptions & Personas

1.  **Super Admin (Platform)**
    *   *Persona*: Employee of the SaaS provider.
    *   *Description*: Manages global platform settings, billing, tenant lifecycle, and platform-wide reference data. Cannot view tenant business data without explicit temporary access grants.
2.  **Organization Owner**
    *   *Persona*: CEO / Business Owner of the customer.
    *   *Description*: Ultimate authority for the tenant. Can manage billing, global tenant settings, create companies/farms, and manage high-level users.
3.  **Company Admin**
    *   *Persona*: Regional Director / General Manager.
    *   *Description*: Manages all operations, farms, and users within a specific Company sub-entity.
4.  **Farm Manager**
    *   *Persona*: The person running a specific farm.
    *   *Description*: Responsible for daily operations, batch creation, inventory management, and reporting for their assigned farm(s).
5.  **Farm Supervisor**
    *   *Persona*: Floor manager / Shed supervisor.
    *   *Description*: Records daily metrics (mortality, feed, weight, eggs) for specific sheds.
6.  **Veterinarian**
    *   *Persona*: Internal or consulting poultry vet.
    *   *Description*: Manages health protocols, prescribes medication, schedules vaccinations, and records necropsy results.
7.  **Feed Manager**
    *   *Persona*: Feed Mill Operator / Nutritionist.
    *   *Description*: Manages feed formulas, raw material inventory, and feed production batches.
8.  **Inventory Manager**
    *   *Persona*: Warehouse manager.
    *   *Description*: Manages stock levels, issues materials to farms, performs stock audits.
9.  **Purchase Manager**
    *   *Persona*: Procurement officer.
    *   *Description*: Creates POs, manages supplier relationships, records GRNs (Goods Receipt Notes).
10. **Sales Manager**
    *   *Persona*: Sales lead.
    *   *Description*: Manages customer orders, dispatch scheduling, pricing, and sales invoicing.
11. **Accountant**
    *   *Persona*: Finance controller.
    *   *Description*: Manages chart of accounts, payments, receipts, journals, and financial reporting (P&L, Balance Sheet).
12. **HR Manager**
    *   *Persona*: HR lead.
    *   *Description*: Manages employee records, payroll, attendance, and leave management.
13. **Employee/Farm Worker**
    *   *Persona*: Laborer.
    *   *Description*: Minimal access. Can punch in/out (attendance) and view their own payslips.
14. **Driver**
    *   *Persona*: Delivery/Logistics driver.
    *   *Description*: Access to dispatch schedules, route details, and proof of delivery capture.
15. **Customer (Portal Access)**
    *   *Persona*: B2B wholesale buyer.
    *   *Description*: External user. Can view their own orders, invoices, statement of account, and place new orders.
16. **Supplier (Portal Access)**
    *   *Persona*: Feed/chick supplier.
    *   *Description*: External user. Can view POs sent to them, submit invoices, and view payment status.
17. **Auditor (Read-Only)**
    *   *Persona*: External financial or compliance auditor.
    *   *Description*: Full read-only access to financial, operational, and audit log data. No write permissions.

---

## Permission Matrix

*Legend: **V**=View, **C**=Create, **E**=Edit, **D**=Delete, **A**=Approve, **-**=No Access*

| Role | Farm Ops (Batches/Daily) | Inventory | Purchasing | Sales | Financials | Health/Vet | Feed Mill | HR/Payroll | Admin Settings |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| Org Owner | V,C,E,D,A | V,C,E,D,A | V,C,E,D,A | V,C,E,D,A | V,C,E,D,A | V,C,E,D,A | V,C,E,D,A | V,C,E,D,A | V,C,E,D,A |
| Company Admin | V,C,E,D,A* | V,C,E,D,A* | V,C,E,D,A* | V,C,E,D,A* | V,C,E,D,A* | V,C,E,D,A* | V,C,E,D,A* | V,C,E,D,A* | V,C,E* |
| Farm Manager | V,C,E,D,A* | V,C,E,D* | V,C,E | V | V | V,C,E | V | V,C,E | - |
| Farm Supervisor | V,C,E* | V | - | - | - | V | - | V | - |
| Veterinarian | V | - | - | - | - | V,C,E,D,A | - | V | - |
| Feed Manager | V | V,C,E | V,C,E | - | - | - | V,C,E,D,A | V | - |
| Inventory Mgr | V | V,C,E,D,A | V | V | - | - | V | V | - |
| Purchase Mgr | V | V,C,E | V,C,E,D,A | - | V | - | V | V | - |
| Sales Manager | V | V | - | V,C,E,D,A | V | - | - | V | - |
| Accountant | V | V | V,C,E,A | V,C,E,A | V,C,E,D,A | - | V | V,A | V,C,E |
| HR Manager | - | - | - | - | - | - | - | V,C,E,D,A | - |
| Farm Worker | - | - | - | - | - | - | - | V (Self) | - |
| Driver | - | - | - | V,E (Status) | - | - | - | V | - |
| Customer | - | - | - | V,C (Own) | V (Own) | - | - | - | - |
| Supplier | - | - | V (Own) | - | V (Own) | - | - | - | - |
| Auditor | V | V | V | V | V | V | V | V | V |

*\* Asterisk denotes scoping: Permissions apply ONLY to the specific Company or Farm assigned to the user.*
