# UI/UX Navigation Architecture (AG-12)

## 1. Main Navigation Structure

The platform uses a left-sidebar for main module navigation and a top bar for global actions (search, notifications, profile, quick add, active farm context).

**Global Top Bar**
- Context Selector (Farm/Branch)
- Global Search (Search batches, invoices, users)
- Quick Add (+) (New Batch, Daily Entry, Expense, etc.)
- Notification Bell (Unread count)
- User Profile & Settings

**Main Sidebar**
* **Dashboard** (UX-1001)
* **Farm Management** (UX-1002)
  * Farms
  * Sheds
  * Equipment
* **Flock/Batch Management** (UX-1003)
  * Active Batches
  * Placement Planning
  * Batch History
* **Daily Operations** (UX-1004)
  * Daily Mortality
  * Daily Feed & Water
  * Body Weight
  * Environment Logs
* **Health & Vaccination** (UX-1005)
  * Vaccination Schedule
  * Medication
  * Disease Incidents
  * Post-Mortem Reports
* **Egg Management** (UX-1006)
  * Daily Collection
  * Grading
  * Packing
* **Hatchery** (UX-1007)
  * Setter Loading
  * Candling
  * Hatcher Transfer
  * Chick Pull
* **Inventory** (UX-1008)
  * Current Stock
  * Item Master
  * GRN / Issues
  * Transfers
* **Procurement** (UX-1009)
  * Purchase Requests
  * Purchase Orders
  * Vendor Management
* **Sales** (UX-1010)
  * Customers
  * Sales Orders
  * Dispatch / Challans
  * Invoices
* **Finance** (UX-1011)
  * Chart of Accounts
  * Vouchers (Receipts/Payments)
  * Bank Reconciliation
* **HR** (UX-1012)
  * Employees
  * Attendance
  * Payroll
* **Reports** (UX-1013)
  * Report Catalog
  * Custom Reports
* **Settings/Admin** (UX-1014)
  * Users & Roles
  * Company Settings
  * Integration Settings

---

## 2. Role-Based Navigation

**Organization Owner / Executive**
- Full access to all modules, focusing on Dashboards, Reports, Finance, Sales, Procurement. (Farm/Daily entries are typically read-only or hidden unless drilled down).

**Farm Manager**
- Access to: Dashboard, Farm Management, Flock/Batch Management, Daily Operations, Health, Inventory, Reports. No access to Finance or overall Sales/HR.

**Farm Supervisor / Worker**
- Simplified navigation: Dashboard (tasks), Daily Operations, Inventory (view only/issue requests).

**Veterinarian**
- Dashboard, Health & Vaccination, Flock/Batch Management, Reports, Notification center.

**Accountant**
- Dashboard, Finance, Procurement, Sales, HR (Payroll), Inventory (Valuation), Reports.

---

## 3. User Journeys (Key Workflows)

### 3.1. Farm Worker Daily Routine (UX-2001)
1. Logs in via mobile app (offline/online).
2. Views "Today's Tasks" on the home screen.
3. Selects "Morning Feed Entry".
4. Selects Shed -> Inputs feed consumed in kgs -> Saves.
5. Repeats for Mortality and Egg Collection.
6. Hits "Sync" (if offline) or data auto-syncs.

### 3.2. Farm Manager Morning Review (UX-2002)
1. Logs in via desktop/tablet.
2. Views Dashboard: Checks alerts for high mortality or low feed.
3. Reviews data entered by workers yesterday (approval queue).
4. Checks feed stock vs today's requirement.
5. Approves purchase requests for low-stock medicines.

### 3.3. Vet Health Check (UX-2003)
1. Logs in. Dashboard highlights overdue vaccinations and mortality spikes.
2. Goes to Health -> Disease Incidents.
3. Logs a new post-mortem finding.
4. Prescribes medication (automatically creates an inventory issue request).
5. Schedules a follow-up task.

---

## 4. Form Design Principles (UX-3001)

For data-heavy poultry forms:
1. **Context First**: Always show the selected Farm and Batch clearly at the top.
2. **Keyboard Navigation**: In grid data entry (e.g., egg collection by shed), support Tab/Enter navigation for rapid input.
3. **Smart Defaults**: Pre-fill dates to 'Today'. Pre-fill expected quantities (e.g., feed based on standard curve) but allow override.
4. **Inline Validation**: Immediate red alerts if mortality > 2% or weight is outside 20% standard deviation.
5. **Autosave**: For large forms (like setter loading), autosave drafts.
6. **Unit Clarity**: Always display units (kg, lbs, %, g) explicitly next to the input field.

---

## 5. Mobile vs Desktop

| Feature/Module | Mobile Application (App/PWA) | Desktop Application (Web) |
| :--- | :--- | :--- |
| **Daily Data Entry** | Primary interface (optimized, big buttons) | Secondary (grid-based entry) |
| **Photo Uploads (PM)** | Primary (camera integration) | Secondary (file upload) |
| **Reporting / Analytics**| Basic KPI widgets only | Primary interface (charts, pivots) |
| **Financial Accounting** | Read-only / Approvals | Primary interface |
| **Setup / Configuration**| Not available | Primary interface |
| **Inventory Scans** | Primary (Barcode/QR scanner) | Secondary |

---

## 6. Farm Worker UX (UX-3002)

**Goal**: Minimize friction, errors, and training time.
- **Visuals**: Use icons for everything (Bird icon for mortality, Bag icon for feed, Egg icon for collection).
- **Typography**: Large fonts (18px+ base) for readability outdoors/in sheds.
- **Input Method**: Large number pads (Numpad keyboard by default), +/- steppers for small numbers (e.g., mortality).
- **Language**: Full localization support (switchable on the login screen).
- **Confirmation**: Haptic feedback (vibration) on successful save.
