# Actor Register

This document identifies all actors (users and system roles) that interact with the system.

| Actor | Role / Persona | Access Scope | Key Actions | Devices | Source IDs |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Owner** | Mr. Sri Murugan (Executive) | Global (All Farms, All Data) | View dashboards, approve >₹50K, monitor profitability | Web, Mobile | CLIENT-028, 030 |
| **Management** | Senior Leadership | Global | Strategic planning, view reports, demand forecasting | Web, Mobile | CLIENT-170 |
| **Company Admin** | IT / SysAdmin | Global | Configure system, manage users, set approval rules | Web | CLIENT-036 |
| **Farm Manager** | Operational Manager | Specific Farm(s) | Approve <₹10K, manage batches, monitor FCR | Web, Mobile | CLIENT-006, 030 |
| **Farm Supervisor** | Floor Supervisor | Specific Farm(s) | Verify daily data, request feed/medicines | Mobile, Web | CLIENT-006 |
| **Farm Worker** | Ground Staff | Specific Shed(s) | Simple daily entry (mortality, feed, weight, eggs) | Mobile (Offline cap) | CLIENT-033, 034 |
| **Warehouse Manager** | Inventory Controller | Specific Warehouse(s) | GRN entry, stock audits, dispatch management | Web, Mobile | CLIENT-018 |
| **Warehouse Staff** | Inventory Handler | Specific Warehouse(s) | Picking, packing, loading vehicles | Mobile | CLIENT-018 |
| **Purchase Staff** | Procurement | Global | Create POs, manage suppliers, track market rates | Web | CLIENT-020 |
| **Sales Staff** | Order Management | Global | Enter orders, manage rate contracts, track outstandings | Web, Mobile | CLIENT-015, 128 |
| **Processing Staff** | Meat Processor | Processing Unit | Log input weight, log yield/waste/by-products | Mobile, Web | CLIENT-075 |
| **QC Staff** | Quality Control | Global | Inspect meat/eggs, handle returns/damages | Mobile | CLIENT-128 |
| **Accountant** | Financial Controller | Global | Reconcile invoices, manage payments, payroll | Web | CLIENT-026 |
| **HR Manager** | Human Resources | Global | Attendance, leaves, salary structure | Web | CLIENT-022 |
| **Driver** | Transport | Specific Vehicle | View route, capture delivery proof | Mobile | CLIENT-025, 128 |
| **Dealer** | External Partner B2B | Own Data Only | Place orders, view outstanding, make payments | Mobile (Portal) | CLIENT-015 |
| **Customer** | External Buyer B2B/B2C| Own Data Only | Place orders, track delivery, raise complaints | Mobile (Portal) | CLIENT-016 |
| **Veterinarian** | Health Consultant | Global / Advisory | Recommend medicine, audit mortality, prescribe vaccines | Web, Mobile | CLIENT-006 |
