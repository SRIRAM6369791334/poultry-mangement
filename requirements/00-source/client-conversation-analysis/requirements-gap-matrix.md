# Requirements Gap Matrix

| Source ID | Requirement | Existing File | Coverage | Gap | Action |
|---|---|---|---|---|---|
| TEMP-FEAT-007 (C2) | Live vs Processed Sales (Reconciliation) | `05-processing/live-vs-processed-sales.md` | EXISTING-COVERED | None. Clear distinction between live and processed tracking. | No action required. |
| PROB-001 (C2) | Requested Weight vs Actual Weight | `04-domain/weight-management.md`, `05-processing/weight-reconciliation.md` | EXISTING-COVERED | None. Concept of tolerance and exact matching is handled. | No action required. |
| TEMP-BR-002 (C3) | Processing Loss (Business absorbs loss for processed meat) | `05-processing/loss-waste-damage.md` | EXISTING-COVERED | None. Detailed loss types and business rules are specified. | No action required. |
| TEMP-BR-006 (C2) | Yield (Actual vs Expected) | `05-processing/processing-management.md`, `05-processing/by-product-management.md` | EXISTING-COVERED | None. Yield tracking and variance are covered. | No action required. |
| PROB-009 (C4) | Demand Forecasting (Using multi-year history) | `10-intelligence/demand-forecasting.md` | EXISTING-COVERED | None. Forecasting logic uses historical seasonal data. | No action required. |
| TEMP-FEAT-010 (C4) | Inventory Intelligence (Fast, Slow, Non-moving, Dead stock) | `10-intelligence/slow-nonmoving-products.md` | EXISTING-COVERED | None. Stock categorization is fully detailed. | No action required. |
| TEMP-FEAT-006 (C4) | Centralized Capacity Planning Module | `N/A` | MISSING | No dedicated file for comprehensive capacity planning across Farm, Fleet, Processing, and Staff. | Create `capacity-planning.md` in Operations module. |
| TEMP-FEAT-011 (C4) | What-If Scenario Planning Tool | `10-intelligence/what-if-analysis.md` | EXISTING-COVERED | None. Scenario modeling is addressed. | No action required. |
| TEMP-FEAT-05-010 | Complaint Management System | `N/A` | PARTIALLY-COVERED | Basic complaints mentioned but no dedicated SLA, root cause, and severity tracking. | Create `complaint-management.md` or update CRM section. |
| TEMP-FEAT-014 (C1) | Mobile Offline App | `docs/17-mobile/mobile-offline-requirements.md` | EXISTING-COVERED | None. Offline sync and conflict resolution handled. | No action required. |
