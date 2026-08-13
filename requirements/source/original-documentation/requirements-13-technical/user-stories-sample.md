# Critical User Stories Sample

## Offline Sync & Mobile Data Entry
**US-001: Offline Daily Entry**
**As a** Farm Supervisor, **I want to** log daily mortality and feed consumption while offline inside a shed, **so that** my work is not blocked by poor network connectivity.
- **Acceptance Criteria:** 
  - [ ] App functions without an active internet connection.
  - [ ] Data is stored locally on the device.
  - [ ] UI indicates "Pending Sync" status.

**US-002: Automatic Data Synchronization**
**As a** System, **I want to** automatically sync offline records when the device reconnects to the network, **so that** the central database is up-to-date.
- **Acceptance Criteria:**
  - [ ] Sync happens in the background upon connection.
  - [ ] Conflicts (e.g., two updates to the same field) are handled using last-write-wins based on the timestamp.

## Processing & Yield Calculation
**US-003: Processing Yield Tracking**
**As a** Processing Manager, **I want to** enter the total live weight of a batch and the final processed weight, **so that** the system calculates the processing yield percentage.
- **Acceptance Criteria:**
  - [ ] System accepts Live Weight and Processed Meat Weight.
  - [ ] Calculates Yield % = (Processed Weight / Live Weight) * 100.
  - [ ] Alerts if yield is below the standard threshold.

## Sales & Billing
**US-004: Live vs Processed Billing Rates**
**As a** Sales Executive, **I want to** select whether a sale is for live birds or processed meat, **so that** the correct pricing tier is applied to the invoice.
- **Acceptance Criteria:**
  - [ ] Billing screen allows toggling between Live and Processed.
  - [ ] Price per kg automatically updates based on the toggle.

**US-005: Dealer Credit Limit Enforcement**
**As a** Finance Manager, **I want to** set credit limits for our 45 dealers, **so that** sales cannot proceed if the dealer's outstanding balance exceeds the limit.
- **Acceptance Criteria:**
  - [ ] System blocks invoice creation if limit is breached.
  - [ ] Requires admin override to proceed.

## Batch Profitability & Analytics
**US-006: Real-Time Batch Profitability**
**As a** Business Owner, **I want to** view a real-time profitability dashboard for any active batch, **so that** I can track expected ROI before the batch is completely sold.
- **Acceptance Criteria:**
  - [ ] Calculates Total Cost (chicks, feed, medicine, labor allocation).
  - [ ] Calculates Total Revenue (sales to date).
  - [ ] Displays Current Profit/Loss and Projected Profit/Loss.

**US-007: Demand Forecasting**
**As an** Operations Manager, **I want to** view AI-driven demand forecasts for the upcoming festive season, **so that** I can adjust chick placement in the sheds.
- **Acceptance Criteria:**
  - [ ] System analyzes historical sales data.
  - [ ] Provides placement recommendations 6-8 weeks in advance.

## Additional Critical Stories
**US-008: Multi-Company Context Switching**
**As a** System Administrator, **I want to** seamlessly switch between different company contexts within the same system, **so that** I can manage future expansions (e.g., Feed Mill) without separate logins.
- **Acceptance Criteria:**
  - [ ] User can switch active tenant.
  - [ ] Data queries strictly enforce active tenant scope.

**US-009: Detailed FCR Reporting**
**As a** Farm Manager, **I want to** generate weekly FCR (Feed Conversion Ratio) reports for each shed, **so that** I can monitor bird health and feed quality.
- **Acceptance Criteria:**
  - [ ] Report calculates Feed Consumed vs Weight Gained.
  - [ ] Highlights deviations from standard benchmarks.

**US-010: WhatsApp Notification Integration**
**As a** Customer, **I want to** receive an automated WhatsApp message with my invoice link upon purchase, **so that** I have an instant digital copy.
- **Acceptance Criteria:**
  - [ ] Invoice generation triggers a WhatsApp message.
  - [ ] Message includes a secure, downloadable PDF link.

**US-011: Inventory Opening Balances**
**As a** Warehouse Manager, **I want to** set opening balances for all inventory items during system onboarding, **so that** we have an accurate starting point.
- **Acceptance Criteria:**
  - [ ] Bulk upload or manual entry screen for initial stock levels.
  - [ ] Actions are logged with "System Initialization" tags.

**US-012: Comprehensive Audit Trails**
**As an** Auditor, **I want to** view an unalterable history of all changes made to a financial transaction, **so that** I can ensure compliance and trace errors.
- **Acceptance Criteria:**
  - [ ] Every update logs previous value, new value, user, and timestamp.
  - [ ] Audit logs cannot be modified via the application UI.

**US-013: Excel Data Export**
**As a** Finance Executive, **I want to** export detailed ledgers to Excel format, **so that** I can perform external analysis or share with our accountant.
- **Acceptance Criteria:**
  - [ ] Export functionality available on all standard list views.
  - [ ] Formatting matches standard accounting software expectations.

**US-014: Granular RBAC Permissions**
**As an** HR Manager, **I want to** define custom roles with specific view/edit permissions, **so that** employees only see data relevant to their job.
- **Acceptance Criteria:**
  - [ ] Role creation screen with checkbox permissions (e.g., "Can Edit Batches", "Can View Finances").
  - [ ] Application strictly enforces these limits on frontend and backend.

**US-015: Fleet Dispatch Scheduling**
**As a** Logistics Coordinator, **I want to** assign deliveries to specific vehicles and drivers, **so that** we efficiently utilize our 18 vehicles.
- **Acceptance Criteria:**
  - [ ] Calendar or list view for upcoming deliveries.
  - [ ] Ability to assign a driver/vehicle and notify them automatically.
