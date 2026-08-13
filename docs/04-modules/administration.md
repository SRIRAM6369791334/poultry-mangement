# Administration Module

## 1. Overview
The Administration module serves as the foundational setup layer for the ERP. It handles organizational structuring, security, master data, and system-wide behaviors. Proper configuration here is required before any operational modules can be utilized.

## 2. Organization Setup
- **Purpose**: Define the corporate entity using the SaaS platform.
- **Features**:
  - `Company Details`: Legal name, Tax IDs (VAT/GST), registered address, logo.
  - `Branches/Regions`: Define hierarchical structures (e.g., North Zone, South Zone) for reporting rollups.

## 3. Company Setup
- **Purpose**: Specific legal and financial parameters.
- **Features**:
  - Define fiscal year start/end dates.
  - Define base currency and multi-currency support if applicable.
- **Business Rules**: Tax IDs must follow regional validations.

## 4. Farm Setup (Global level)
- **Purpose**: High-level mapping of farms to branches/regions.
- **Features**:
  - Link farms to specific organizational units.
  - Define regional managers.

## 5. User Management
- **Purpose**: Manage individuals who have access to the system.
- **Features**:
  - `User Provisioning`: Create users, assign emails, passwords, and link to Employee IDs.
  - `Status`: Active, Suspended, Inactive.
  - `Data Isolation`: Restrict a user to only see data for specific farms or regions (Data-level security).

## 6. Role & Permission Management
- **Purpose**: Control what users can see and do (Feature-level security via RBAC).
- **Features**:
  - `Roles`: Pre-defined (Admin, Farm Manager, Supervisor, Vet, Accountant) and Custom roles.
  - `Permissions Matrix`: Granular CRUD (Create, Read, Update, Delete, Approve) access per module.
  - *Example*: A Supervisor can 'Create' daily mortality, but only a Farm Manager can 'Approve' a mortality adjustment.

## 7. System Configuration
- **Purpose**: Define global formatting and operational defaults.
- **Features**:
  - `Units of Measurement (UoM)`: Metric (kg, celsius, meters) vs Imperial (lbs, fahrenheit, feet).
  - `Date/Time Format`: DD/MM/YYYY vs MM/DD/YYYY, Timezones.
  - `Rounding Rules`: Decimal places for financial and weight data.

## 8. Master Data Management
- **Purpose**: Centralized repositories for core entity types to ensure data consistency across dropdowns.
- **Features**:
  - `Breed Master`: Catalog of bird breeds (Cobb 500, Ross 308, Hy-Line Brown) and standard performance curves (Target weight/FCR per day).
  - `Item Catalog`: Define categories (Feed types, Medicine types, Vaccine catalogs, Consumables).
  - `Disease/Mortality Reasons`: Standardized list for drop-downs.
  - `Chart of Accounts (CoA)`: Master financial ledgers.

## 9. Notification Preferences
- **Purpose**: Manage automated system alerts.
- **Features**:
  - Trigger configuration: (e.g., "Notify Vet via SMS if Daily Mortality > 0.5%").
  - Delivery Channels: Email, SMS, In-App Push.
  - User Subscriptions: Users can opt in/out of non-critical alerts.

## 10. Subscription Management
- **Purpose**: Allows the tenant to manage their SaaS billing.
- **Features**:
  - Current Plan: (e.g., "Professional Plan - Max 50 Farms").
  - Usage Metrics: Current users, storage used, active batches.
  - Upgrade/Downgrade flows and invoice history.

## 11. Data Import/Export
- **Purpose**: Facilitate data migration and bulk operations.
- **Features**:
  - CSV/Excel templates for uploading historical batches, master data, or initial inventory.
  - Scheduled backups and data exports.

## 12. Audit Log Viewer
- **Purpose**: Security and compliance tracking.
- **Features**:
  - Immutable ledger of who did what and when.
  - Tracks: User ID, Timestamp, Action (Create/Update/Delete), Module, Old Value, New Value, IP Address.
  - Search and filter capabilities for incident investigation.
