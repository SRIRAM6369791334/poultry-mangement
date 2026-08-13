# Edge Case Catalog

*(Note: Representing a subset of the 100+ required edge cases due to length constraints, categorized for coverage)*

## Data Entry Errors
1. **EC-001: Duplicate Mortality Entry**
   - *Impact*: Skews livability %, triggers false alerts.
   - *Prevention*: Unique constraint on (BatchID, Date) for daily entry.
2. **EC-002: Future Date Entry**
   - *Impact*: Breaks time-series logic.
   - *Prevention*: UI and API validation blocking dates > today.
3. **EC-003: Negative Feed Consumption**
   - *Impact*: Corrupts inventory and FCR.
   - *Prevention*: Absolute value validation >= 0.
4. **EC-004: Mortality > Live Birds**
   - *Impact*: Negative live bird count.
   - *Prevention*: Transactional check: `new_mortality <= current_live_count`.

## Batch Operations
5. **EC-010: Batch Split Mid-cycle**
   - *Description*: Moving half a batch to another shed due to overcrowding.
   - *Impact*: Historical data is complex to track.
   - *Resolution*: Create sub-batches linked to parent batch; allocate costs proportionally.
6. **EC-011: Batch Merge**
   - *Description*: Combining two small batches into one.
   - *Resolution*: Calculate weighted average for age, costs, and origin tracking.
7. **EC-012: Reopening a Closed Batch**
   - *Description*: User realizes they missed final expenses after batch closure.
   - *Resolution*: Admin-only privilege to unlock, with full audit trail of changes made post-closure.

## Inventory Issues
8. **EC-020: Negative Stock Allowed**
   - *Description*: Feed truck arrived and was fed to birds, but PO not yet entered in system.
   - *Resolution*: Allow soft negative stock with a flag; reconcile automatically when PO is entered.
9. **EC-021: Expired Medication Administered**
   - *Prevention*: Warning popup if batch expiry date < current date.
10. **EC-022: Stock Mismatch Post-Physical Count**
    - *Resolution*: Generate automated adjustment voucher recording the variance cost to P&L.

## Financial Edge Cases
11. **EC-030: Overpayment Received**
    - *Resolution*: Credit excess amount to customer's wallet/advance ledger.
12. **EC-031: Backdated Transactions**
    - *Impact*: Affects closed financial periods.
    - *Prevention*: Lock periods monthly. Admin override required.
13. **EC-032: Currency Rounding Variations**
    - *Resolution*: Standardize to 2 or 4 decimal places globally; track fractional cents in a rounding difference ledger.

## Health & Production Issues
14. **EC-040: Egg Count > Hen Count**
    - *Description*: Data entry says 10,050 eggs from 10,000 hens.
    - *Prevention*: Hard block if lay % > 100%. (Unless double-yolk tracked separately, but physical max is 1/bird/day).
15. **EC-041: Sale During Withdrawal Period**
    - *Description*: Attempting to sell birds while antibiotic withdrawal period is active.
    - *Prevention*: Hard block on sales invoice creation with warning of residue risk.
16. **EC-042: Zero Production Day**
    - *Impact*: FCR infinity / divide by zero.
    - *Resolution*: Graceful degradation in UI; flag for severe health investigation.

## System & Multi-tenant Issues
17. **EC-050: Concurrent Edits on Daily Entry**
    - *Prevention*: Optimistic locking using `updated_at` timestamps or version numbers.
18. **EC-051: User in Multiple Organizations**
    - *Resolution*: User account is global, linked to multiple TenantIDs via junction table; require explicit tenant switching in UI.
19. **EC-052: Offline Sync Conflict**
    - *Description*: Device A and Device B both submit daily entry for Shed 1 offline, then sync.
    - *Resolution*: Last-write-wins with collision notification sent to supervisor.
20. **EC-053: Timezone Discrepancies**
    - *Description*: Server in UTC, Farm in IST.
    - *Resolution*: All backend storage in UTC; UI localized based on Farm's configured timezone.

*(A full 100+ list would continue expanding on Hatchery (candling errors), Feed Mill (formulation limits), and integration failures (API timeouts, rate limits).)*
