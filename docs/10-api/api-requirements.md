# API Requirements

## 1. Auth & User Management APIs
### API-0001: Login
- **Resource**: `/auth/login` (POST)
- **Purpose**: Authenticate user and issue JWT.
- **Auth**: None

### API-0002: Get Current User
- **Resource**: `/auth/me` (GET)
- **Purpose**: Get active user details.
- **Auth**: Required

## 2. Organization & Farm APIs
### API-0101: List Farms
- **Resource**: `/farms` (GET)
- **Purpose**: List all farms for tenant.
- **Auth**: Required, Role: Farm Manager/Admin
- **Pagination**: Yes

### API-0102: Create Farm
- **Resource**: `/farms` (POST)
- **Purpose**: Register a new farm.

## 3. Batch/Flock Management APIs
### API-0201: Create Batch
- **Resource**: `/batches` (POST)
- **Purpose**: Initiate a new flock batch.
- **Validations**: Shed must be empty, active farm.

### API-0202: Close Batch
- **Resource**: `/batches/{id}/close` (POST)
- **Purpose**: End a batch lifecycle.

## 4. Daily Operations APIs
### API-0301: Record Daily Mortality
- **Resource**: `/operations/mortality` (POST)
- **Purpose**: Log daily deaths.
- **Validations**: Quantity cannot exceed current live count.

### API-0302: Record Feed Consumption
- **Resource**: `/operations/feed` (POST)
- **Purpose**: Log daily feed intake.

## 5. Health Management APIs
### API-0401: Schedule Vaccination
- **Resource**: `/health/vaccinations` (POST)
- **Purpose**: Plan a vaccination.

## 6. Egg Management APIs
### API-0501: Log Egg Collection
- **Resource**: `/eggs/collection` (POST)
- **Purpose**: Record daily egg counts.

## 7. Hatchery APIs
### API-0601: Set Incubation Batch
- **Resource**: `/hatchery/incubation` (POST)
- **Purpose**: Start incubation process.

## 8. Inventory APIs
### API-0701: Stock Movement
- **Resource**: `/inventory/movements` (POST)
- **Purpose**: Transfer stock between warehouses.

## 9. Procurement APIs
### API-0801: Create PO
- **Resource**: `/procurement/orders` (POST)
- **Purpose**: Purchase Order generation.

## 10. Sales & Distribution APIs
### API-0901: Generate Invoice
- **Resource**: `/sales/invoices` (POST)
- **Purpose**: Create sales invoice.

## 11. Finance APIs
### API-1001: Record Expense
- **Resource**: `/finance/expenses` (POST)
- **Purpose**: Log farm expenses.

## 12. HR APIs
### API-1101: Employee Roster
- **Resource**: `/hr/employees` (GET)
- **Purpose**: List employees.

## 13. Reporting APIs
### API-1201: Farm Performance Report
- **Resource**: `/reports/farm-performance` (GET)
- **Purpose**: Aggregated KPI data (FCR, Mortality %).

## 14. Notification APIs
### API-1301: Get Alerts
- **Resource**: `/notifications/alerts` (GET)
- **Purpose**: Fetch user alerts.

## 15. Admin & Configuration APIs
### API-1401: Update Settings
- **Resource**: `/admin/settings` (PUT)
- **Purpose**: Update tenant configurations.
