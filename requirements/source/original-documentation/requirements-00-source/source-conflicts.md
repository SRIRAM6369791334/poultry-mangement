# Source Conflicts

This document logs any conflicting requirements or statements found during source analysis of the client answers.

## Current Status
**No direct conflicts** have been identified in the Phase 1 fact base (CLIENT-001 through CLIENT-220).

## Potential Implicit Conflicts (To Monitor)
While no direct explicit conflicts exist, the following areas exhibit high complexity and potential for implicit operational conflicts that require careful technical design:

1. **Live vs. Processed Pricing Reconciliation:** Tracking exact batch profitability (CLIENT-026) when the same batch of birds is sold both live (no processing loss for the business) and processed (business absorbs yield loss and waste). [BUSINESS DECISION REQUIRED] (Pending technical formulation of cost distribution).
2. **Offline Data vs. Real-Time Dashboard:** The requirement for real-time dashboards (CLIENT-028) natively conflicts with the requirement for farm workers entering data offline (CLIENT-034). Synchronization delays must be factored into what constitutes "real-time". [PROPOSED] Define sync SLA for dashboard metrics.
3. **Approval Matrix Bottlenecks:** The owner must approve all amounts >₹50K (CLIENT-030). Given the scale (8 farms, 18 vehicles, daily procurement), this could create a bottleneck. [PROPOSED] Clarify if this applies strictly to expenses/purchases or includes standard high-volume routine operational transactions.
