# System Module Hierarchy

The following is the comprehensive module hierarchy for the Poultry Management ERP system.

```
System
├── 1. Administration & Configuration
│   ├── Organization Setup (Purpose: Define company structure, branches. Roles: SuperAdmin)
│   ├── User & Role Management (Purpose: Manage RBAC, user accounts. Roles: Admin)
│   ├── System Configuration (Purpose: Set localization, units, currency. Roles: Admin)
│   ├── Master Data (Purpose: Define breeds, items, disease catalogs. Roles: Admin, Manager)
│   ├── Notifications Preferences (Purpose: Setup email/SMS alerts. Roles: Admin, User)
│   ├── Subscription Management (Purpose: Manage SaaS billing and limits. Roles: Tenant Admin)
│   └── Audit Logs (Purpose: Track system changes for compliance. Roles: Admin, Auditor)
├── 2. Farm Management
│   ├── Farm Registration (Purpose: Register farms with GPS, type. Roles: Admin, Farm Mgr)
│   ├── Shed/House Management (Purpose: Define sheds, dimensions, capacity. Roles: Farm Mgr)
│   ├── Farm Dashboard (Purpose: Overview of farm operations. Roles: Farm Mgr)
│   ├── Farm Configuration (Purpose: Operational settings and defaults. Roles: Farm Mgr)
│   └── Farm Closure (Purpose: Retire a farm. Roles: Admin)
├── 3. Flock/Batch Management
│   ├── Batch Creation (Purpose: Initiate a new rearing cycle. Roles: Farm Mgr)
│   ├── Batch Lifecycle (Purpose: Track age, phase changes. Roles: Supervisor)
│   └── Batch Closing (Purpose: Terminate batch and calculate KPIs. Roles: Farm Mgr, Finance)
├── 4. Bird Placement
│   ├── DOC Receipt (Purpose: Record arrival and counts. Roles: Supervisor)
│   └── Placement Quality (Purpose: Log initial weight and uniformity. Roles: Supervisor)
├── 5. Daily Operations
│   ├── Environment Tracking (Purpose: Log temp, humidity, light. Roles: Supervisor)
│   ├── Water Management (Purpose: Log daily water intake. Roles: Supervisor)
│   └── Task Management (Purpose: Schedule daily chores. Roles: Supervisor, Worker)
├── 6. Feed Management
│   ├── Feed Indenting (Purpose: Request feed from mill/store. Roles: Farm Mgr)
│   ├── Feed Inventory (Purpose: Track shed-level stock. Roles: Supervisor)
│   └── Daily Consumption (Purpose: Log daily feed eaten. Roles: Supervisor)
├── 7. Weight Management
│   ├── Sample Weighing (Purpose: Record weekly sample weights. Roles: Supervisor)
│   ├── Uniformity Analysis (Purpose: Calculate CV and uniformity %. Roles: Farm Mgr)
│   └── Target vs Actual (Purpose: Compare with breed standards. Roles: Farm Mgr)
├── 8. Mortality Management
│   ├── Daily Recording (Purpose: Log dead/cull birds with reasons. Roles: Supervisor)
│   ├── Post-Mortem Logs (Purpose: Record vet findings. Roles: Vet)
│   └── Disposal Tracking (Purpose: Log incineration/burial. Roles: Supervisor)
├── 9. Health & Vaccination
│   ├── Vaccine Schedules (Purpose: Define templates by breed. Roles: Vet, Admin)
│   ├── Administration Logs (Purpose: Record vaccine usage. Roles: Supervisor, Vet)
│   ├── Medication (Purpose: Track therapeutic treatments. Roles: Vet)
│   └── Withdrawal Tracking (Purpose: Prevent early harvest. Roles: Vet, Farm Mgr)
├── 10. Egg Production & Management
│   ├── Daily Collection (Purpose: Log total eggs laid. Roles: Supervisor)
│   ├── Grading (Purpose: Sort into hatching, commercial, waste. Roles: Egg Room Staff)
│   └── Egg Inventory (Purpose: Manage store room stocks. Roles: Store Keeper)
├── 11. Hatchery Management
│   ├── Egg Receiving (Purpose: Inward eggs from breeder farms. Roles: Hatchery Mgr)
│   ├── Setting & Candling (Purpose: Load eggs and remove infertiles. Roles: Hatchery Staff)
│   ├── Hatching (Purpose: Record hatched chicks and cull. Roles: Hatchery Mgr)
│   └── Dispatch (Purpose: Send chicks to farms/customers. Roles: Hatchery Mgr)
├── 12. Breeder Management
│   ├── Lighting Programs (Purpose: Manage light stimulation. Roles: Farm Mgr)
│   ├── Male/Female Ratios (Purpose: Manage mating ratios. Roles: Farm Mgr)
│   └── Spiking (Purpose: Introduce young males. Roles: Farm Mgr)
├── 13. Feed Mill Management
│   ├── Raw Material Intake (Purpose: Receive maize, soy, etc. Roles: Mill Mgr, QC)
│   ├── Batch Production (Purpose: Execute feed formulas. Roles: Mill Operator)
│   └── Finished Goods (Purpose: Manage bagged/bulk feed stock. Roles: Mill Store)
├── 14. Inventory Management
│   ├── Stores Definition (Purpose: Setup warehouses. Roles: Admin)
│   ├── Inward/Outward (Purpose: Manage stock movements. Roles: Store Keeper)
│   ├── Stock Transfers (Purpose: Move goods between locations. Roles: Store Keeper)
│   └── Stock Reconciliation (Purpose: Physical counts and adjustments. Roles: Store Keeper)
├── 15. Procurement
│   ├── Purchase Requests (Purpose: Indent items needed. Roles: Managers)
│   ├── PO Generation (Purpose: Issue orders to vendors. Roles: Purchase Officer)
│   └── GRN/Receipts (Purpose: Acknowledge received goods. Roles: Store Keeper)
├── 16. Sales & Distribution
│   ├── Customer Management (Purpose: Maintain CRM and credit limits. Roles: Sales Admin)
│   ├── Sales Orders (Purpose: Capture buyer requests. Roles: Sales Officer)
│   ├── Dispatch & Weighbridge (Purpose: Track tare/gross weights. Roles: Dispatch Officer)
│   └── Invoicing (Purpose: Generate final bills. Roles: Finance)
├── 17. Finance & Accounting
│   ├── Chart of Accounts (Purpose: Define accounting ledgers. Roles: Finance Admin)
│   ├── AP/AR (Purpose: Payables and receivables tracking. Roles: Accountant)
│   ├── Batch Costing (Purpose: Profit/Loss per flock. Roles: Cost Accountant)
│   └── General Ledger (Purpose: Final financial statements. Roles: Finance Admin)
├── 18. HR & Payroll
│   ├── Employee Records (Purpose: Maintain worker details. Roles: HR)
│   ├── Attendance (Purpose: Track shifts and days worked. Roles: HR, Farm Mgr)
│   └── Payroll Processing (Purpose: Calculate wages and bonuses. Roles: HR, Finance)
├── 19. Reports & Analytics
│   ├── Standard Reports (Purpose: FCR, Mortality, Production tabular reports. Roles: Managers)
│   ├── BI Dashboards (Purpose: Visual graphs of KPIs. Roles: Execs, Managers)
│   └── Custom Report Builder (Purpose: User-defined reports. Roles: Admin)
├── 20. Multi-tenancy & SaaS
│   ├── Tenant Provisioning (Purpose: Create new client instances. Roles: SuperAdmin)
│   ├── Resource Quotas (Purpose: Limit users, storage per plan. Roles: SuperAdmin)
│   └── White-labeling (Purpose: Custom logos and domains. Roles: Tenant Admin)
├── 21. Notifications & Alerts
│   ├── System Alerts (Purpose: Internal platform notifications. Roles: All)
│   ├── Threshold Alerts (Purpose: Deviation alerts e.g. High Mortality. Roles: Managers)
│   └── External Comms (Purpose: SMS/Email to customers. Roles: Admins)
└── 22. Mobile & Offline
    ├── Offline Sync (Purpose: Sync data when internet returns. Roles: System/App)
    ├── App Dashboard (Purpose: Simplified UI for field workers. Roles: Supervisor)
    └── Push Notifications (Purpose: Real-time alerts on devices. Roles: App User)
```
