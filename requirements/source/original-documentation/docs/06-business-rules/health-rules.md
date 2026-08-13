# Health Management Business Rules

## Purpose
This document defines the business logic, thresholds, and automated rules governing the Health Management module of the Poultry Management ERP. These rules enforce biosecurity, ensure food safety (drug withdrawals), and provide early warning systems for disease outbreaks.

## 1. Mortality Threshold Rules

### BR-HLT-MORT-01: Daily Mortality Alert (Broilers)
- **Condition**: If daily mortality for a broiler flock exceeds `0.15%` of the current live bird count.
- **Action**: Generate a HIGH severity alert to the Farm Manager and Veterinarian. Trigger a mandatory "Post-Mortem Request" task.

### BR-HLT-MORT-02: Extreme Mortality Alert (All Birds)
- **Condition**: If daily mortality exceeds `0.5%` for any flock, OR if cumulative mortality exceeds `1.0%` within a 48-hour period.
- **Action**: Generate a CRITICAL severity alert to Corporate Management and Chief Veterinarian. Automatically lock the flock in the ERP from any stock movements (transfer, sale, or slaughter) pending veterinary clearance. [ASSUMPTION: System supports entity freezing/locking].

### BR-HLT-MORT-03: Layer/Breeder Monthly Mortality
- **Condition**: If cumulative monthly mortality in the production phase exceeds `1.0%`.
- **Action**: Flag the flock performance dashboard with a "Health Warning".

## 2. Vaccination Compliance Rules

### BR-HLT-VAC-01: Vaccination Scheduling Constraint
- **Condition**: System must calculate vaccination dates based on the hatch date (Day 1).
- **Action**: Auto-generate a calendar of tasks for the farm manager upon flock placement.

### BR-HLT-VAC-02: Missed Vaccination Escalation
- **Condition**: If a scheduled mandatory vaccination is not marked as "Completed" within `24 hours` of the scheduled date.
- **Action**: Send MEDIUM severity alert to Farm Manager.
- **Condition**: If missed by `48 hours`.
- **Action**: Send HIGH severity alert to Veterinarian to evaluate if the schedule needs adjustment.

### BR-HLT-VAC-03: Live Vaccine Water Deprivation
- **Condition**: When a drinking water vaccination task is initiated.
- **Action**: System prompts verification that water lines were raised/deprived for 1-2 hours prior, and that water stabilizers (e.g., skim milk powder) are added to neutralize chlorine. [RECOMMENDATION: Include this as a checklist in the mobile app].

## 3. Medication & Withdrawal Period Enforcement

### BR-HLT-MED-01: Withdrawal Period Calculation
- **Condition**: When a medication is administered, the user must input or select the withdrawal period (in days) for meat and/or eggs.
- **Action**: The system calculates the `Safe Harvest Date` = `Last Administration Date` + `Withdrawal Period`.

### BR-HLT-MED-02: Sales and Slaughter Lock (Food Safety)
- **Condition**: A user attempts to schedule a flock for slaughter (broilers) or sell eggs (layers/breeders) before the `Safe Harvest Date`.
- **Action**: Hard block (Error). The system MUST NOT permit the transaction. "Flock is currently under medication withdrawal until [Date]."

### BR-HLT-MED-03: Veterinary Prescription Requirement
- **Condition**: A user attempts to issue a restricted antibiotic (e.g., Fluoroquinolones) from inventory.
- **Action**: The system requires a valid `Prescription ID` or approval workflow from a registered Veterinarian before allowing the inventory issue.

## 4. Biosecurity Compliance Rules

### BR-HLT-BIO-01: All-In-All-Out (AIAO) Downtime
- **Condition**: A shed is completely depopulated.
- **Action**: System sets the shed status to "Downtime".
- **Rule**: The system will NOT allow placement of a new flock in that shed until a minimum of `14 days` have passed since depopulation AND a "Cleaning and Disinfection (C&D)" checklist is submitted.

### BR-HLT-BIO-02: Farm Visitor Quarantine
- **Condition**: A visitor or employee is logged in the Biosecurity module as having visited another poultry facility.
- **Rule**: The system flags the individual. They are prohibited from entering high-biosecurity zones (e.g., Breeder farms, Hatchery) for a minimum of `72 hours`.

### BR-HLT-BIO-03: Age Segregation Movement
- **Condition**: Staff task assignment across multiple sheds on a multi-age farm.
- **Rule**: System logic dictates that workflow and task assignments must follow the path from youngest flocks to oldest flocks to prevent backward disease transmission. System warns if a user logs activity in a younger shed after an older shed on the same day.

## 5. Health Alert Escalation Matrix

| Severity | Condition | Primary Notification | Escalation (if no action in X hrs) |
|---|---|---|---|
| Critical | Suspected Notifiable Disease | Vet, Farm Owner | Authorities (Manual) |
| Critical | Mortality > 0.5% / day | Vet, Manager | Corporate Director (4 hrs) |
| High | Feed/Water Drop > 10% | Manager | Vet (12 hrs) |
| High | Egg Drop > 5% / week | Manager | Vet (24 hrs) |
| Medium | Missed Vaccine > 24h | Manager | Vet (48 hrs) |
| Info | Routine Vet Visit Due | Manager | None |
