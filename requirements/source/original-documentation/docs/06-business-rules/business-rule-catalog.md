# Business Rule Catalog
This document catalogs the primary business rules governing the operations, alerts, and workflows in the Poultry Management ERP.

## Validation Rules
- **Rule ID**: BR-VAL-001
- **Name**: Restrict Future Dates for Actuals
- **Category**: Validation
- **Condition**: Entry date for mortality, feed consumption, or harvest > Current System Date
- **Action**: Reject entry, show error "Cannot record actuals in the future."
- **Exception**: Planned dates/Schedules
- **Example**: User tries to enter feed consumption for tomorrow.

- **Rule ID**: BR-VAL-002
- **Name**: Max Mortality Check
- **Category**: Validation
- **Condition**: Daily Mortality > Opening Live Birds
- **Action**: Reject entry.
- **Exception**: None
- **Example**: 500 birds alive, user enters 501 dead.

## Calculation Rules
- **Rule ID**: BR-CAL-101
- **Name**: End of Day (EOD) Inventory Roll-forward
- **Category**: Calculation
- **Condition**: EOD script runs at 23:59 daily.
- **Action**: Calculate `Opening Balance Tomorrow = Opening Balance Today - Mortality - Culls - Sales`
- **Exception**: System downtime delays script.
- **Example**: 1000 - 5 (mortality) = 995 opening for tomorrow.

- **Rule ID**: BR-CAL-102
- **Name**: EPEF Calculation Trigger
- **Category**: Calculation
- **Condition**: Batch Status changes to "Closed" or "Harvested".
- **Action**: Fire BR-CALC-008 to compute EPEF and lock the value.
- **Exception**: Batch reopened by Admin.
- **Example**: Harvest finishes on day 35, EPEF calculated as 405.

## Workflow Rules
- **Rule ID**: BR-WF-201
- **Name**: Batch Closure Constraints
- **Category**: Workflow
- **Condition**: User attempts to change Batch Status to "Closed".
- **Action**: Check if live bird count = 0 and all feed stock transferred/depleted. If not, block closure.
- **Exception**: Forced closure by Supervisor (requires reason code).
- **Example**: 50 birds still in system, system rejects closure.

- **Rule ID**: BR-WF-202
- **Name**: Medicine Approval
- **Category**: Workflow
- **Condition**: Requisition of restricted antibiotics.
- **Action**: Route to Veterinarian role for approval.
- **Exception**: Emergency override by Farm Manager.
- **Example**: Requisition for Amoxicillin requires Vet signature.

## Alert Rules
- **Rule ID**: BR-ALT-301
- **Name**: High Mortality Alert
- **Category**: Alert
- **Condition**: Daily Mortality > 0.5% (Configurable).
- **Action**: Send SMS/Push Notification to Farm Manager and Vet.
- **Exception**: Day 1-3 mortality (often higher, might have different threshold).
- **Example**: 2% mortality triggers immediate alert.

- **Rule ID**: BR-ALT-302
- **Name**: Feed Drop Alert
- **Category**: Alert
- **Condition**: Daily Feed Consumption < 80% of previous day.
- **Action**: Notify Farm Manager.
- **Exception**: Days of planned feed restriction.
- **Example**: Birds ate 1000kg yesterday, only 700kg today.

- **Rule ID**: BR-ALT-303
- **Name**: Water-to-Feed Ratio Imbalance
- **Category**: Alert
- **Condition**: Water intake (L) / Feed intake (kg) < 1.6 or > 2.5
- **Action**: Generate a dashboard warning.
- **Exception**: Heat stress conditions naturally increase ratio.
- **Example**: Ratio hits 3.0, indicating possible leak or severe heat stress.

## Financial Rules
- **Rule ID**: BR-FIN-401
- **Name**: Contract Farmer Settlement
- **Category**: Financial
- **Condition**: Batch Closed and EPEF calculated.
- **Action**: Generate Draft Settlement Invoice including base pay and bonus/penalty.
- **Exception**: Legal hold on farmer account.
- **Example**: Farmer achieves 450 EPEF, settlement generated with $500 bonus.

- **Rule ID**: BR-FIN-402
- **Name**: Customer Credit Limit Check
- **Category**: Financial
- **Condition**: New Sales Order created for live birds/eggs.
- **Action**: Check `Customer Outstanding + Order Value < Credit Limit`. If false, block order.
- **Exception**: Approved by Finance Director.
- **Example**: $10k outstanding + $5k order > $12k limit -> Blocked.

## Operational Rules
- **Rule ID**: BR-OP-501
- **Name**: Stocking Density Enforcement
- **Category**: Operational
- **Condition**: Assigning flock to a Shed/House.
- **Action**: Calculate `Placement Count / House Area`. If > Max Density (e.g., 20 birds/sqm or 33kg/sqm), issue warning.
- **Exception**: Manager override with "Summer/Winter density adjustment".
- **Example**: Trying to put 30,000 birds in a 1,000 sqm house (30 birds/sqm) -> Warning.

- **Rule ID**: BR-OP-502
- **Name**: Feed Phase Change
- **Category**: Operational
- **Condition**: Flock reaches designated age (e.g., Day 14).
- **Action**: Suggest change from Starter to Grower feed. Validate feed orders against this phase.
- **Exception**: Vet recommends extending Starter phase due to low weights.
- **Example**: System blocks ordering Finisher feed on Day 10.
