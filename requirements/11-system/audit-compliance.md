# Audit & Compliance Requirements

[CONFIRMED] Based on CLIENT-032.

## 1. Audit Trail Engine
The system must maintain a comprehensive, tamper-proof audit trail for all critical data modifications.

### Captured Data Points:
- **User:** ID of the user performing the action.
- **Timestamp:** Server-side timestamp of the action.
- **Action Type:** Create, Update, Delete, Approve, Export.
- **Entity:** The module/record affected (e.g., Purchase Order, Daily Mortality).
- **Old Value:** State before modification.
- **New Value:** State after modification.
- **Reason:** Mandatory text field for specific critical updates.

## 2. Financial Record Protection
- **No Silent Deletions:** Financial records (Invoices, Receipts, Payments, Vouchers) cannot be permanently deleted.
- **Voiding/Cancellation:** Instead of deletion, financial records must be marked as "Cancelled" or "Voided" with a mandatory reason.
- **Reversal Entries:** Accounting principles must be followed using reversal journal entries rather than modifying posted transactions.

## 3. Compliance & Retention [PROPOSED]
- **Data Retention:** Audit logs must be retained for a minimum of 5 years.
- **Immutability:** Audit logs themselves must be immutable (append-only) and inaccessible for editing by any user, including System Administrators.
- **Reporting:** Dedicated Audit Log report viewable only by Owner/Auditor roles.
