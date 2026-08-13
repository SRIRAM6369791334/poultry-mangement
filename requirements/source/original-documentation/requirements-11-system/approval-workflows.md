# Approval Workflows

[CONFIRMED] Based on CLIENT-031, CLIENT-168, CLIENT-169.

## 1. Approval Engine Concepts
- **Configurable Thresholds:** Rules based on amount, quantity, or transaction type.
- **Hierarchy:** Multi-level approvals based on organizational structure.
- **Delegation:** Temporary period-based delegation (e.g., Manager on leave assigns to Assistant).
- **Escalation:** Auto-escalate if not approved within a timeframe [PROPOSED].

## 2. Standard Approval Thresholds (e.g., Purchases)
- **Tier 1:** < ₹10,000 → Requires **Manager** Approval
- **Tier 2:** ₹10,000 - ₹50,000 → Requires **Admin** Approval
- **Tier 3:** > ₹50,000 → Requires **Owner** Approval

## 3. Transaction Types Requiring Approvals
| Transaction Type | Trigger Condition | Approver Role |
|---|---|---|
| Purchase Order | Amount thresholds | Manager / Admin / Owner |
| Sales Discount | Discount % > Allowed | Sales Manager / Owner |
| Credit Sale | Credit limit exceeded | Accounts / Owner |
| Stock Adjustment | Any negative adjustment | Warehouse Mgr / Admin |
| Wastage Logging | Value/Qty > Threshold | Processing Mgr / Admin |
| Return / Refund | All returns | Sales Manager / Accounts |
| Rate Change | Any base rate change | Admin / Owner |
| Expense Logging | Amount thresholds | Accounts / Admin |
| Salary Processing | Monthly payroll | HR / Owner |
