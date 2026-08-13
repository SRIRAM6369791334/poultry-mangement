# Workflow State Machines

This document outlines the state machines for all major entities in the Poultry Management ERP platform.

---

## 1. Batch/Flock Lifecycle

**Description:** Manages the lifecycle of a bird batch (flock) from planning to closure.

### States
*   **Draft**: Initial planning phase, no physical birds allocated.
*   **Placed**: Birds have physically arrived at the shed/farm.
*   **Active**: Normal daily operations (feeding, medication, mortality recording).
*   **Partially Depleted**: Harvesting/culling has begun, but birds still remain.
*   **Closed**: All birds have been depleted; final accounting is complete.

### Valid Transitions
| From | To | Trigger / Event | Guard Condition | Actions on Transition | Role |
| :--- | :--- | :--- | :--- | :--- | :--- |
| Draft | Placed | `place_birds()` | Minimum details (shed, quantity) entered. | Init standard curves, update inventory. | Farm Manager |
| Placed | Active | `start_cycle()` | Birds verified, start date reached. | Activate daily checklists. | Supervisor |
| Active | Partially Depleted | `record_sale_cull()` | Sale/cull qty > 0 and < total alive. | Reduce active count, log transaction. | Supervisor |
| Active | Closed | `close_batch()` | Sale/cull/mortality equals total placed. | Lock daily entry, calculate FCR/EPI. | Farm Manager |
| Partially Depleted | Closed | `close_batch()` | Remaining count drops to 0. | Lock daily entry, finalize metrics. | Farm Manager |

### Invalid Transitions
*   `Placed` → `Draft` (Cannot un-place birds once physically recorded)
*   `Active` → `Draft` (Cannot revert to planning once active)
*   `Closed` → `Active` (Closed batches are immutable)

**Audit Requirements:** Log timestamp, user, bird count variance, and final metrics snapshot on closure.

---

## 2. Purchase Order (PO)

**Description:** State machine for purchasing inventory, chicks, feed, or equipment.

### States
*   **Draft**: PO created but not yet sent for approval.
*   **Submitted**: Sent to management for approval.
*   **Approved**: PO approved, ready to send to vendor.
*   **Partially Received**: Some items received, waiting for rest.
*   **Fully Received**: All items received against the PO.
*   **Closed**: PO resolved financially (matched with invoice).
*   **Rejected**: PO denied by management.
*   **Cancelled**: PO voided before receipt.

### Valid Transitions
*   **Draft** → **Submitted**: `submit()` | All mandatory fields filled | User
*   **Submitted** → **Approved**: `approve()` | User has approval authority limit | Manager
*   **Submitted** → **Rejected**: `reject()` | Reason provided | Manager
*   **Approved** → **Partially Received**: `receive_partial()` | Valid goods receipt note (GRN) attached | Store Keeper
*   **Approved** → **Fully Received**: `receive_full()` | GRN matches PO quantities | Store Keeper
*   **Partially Received** → **Fully Received**: `receive_remaining()` | Remaining items GRN | Store Keeper
*   **Fully Received** → **Closed**: `close_po()` | Supplier invoice matched | Finance
*   **Draft/Approved** → **Cancelled**: `cancel()` | No items received yet | Creator/Manager

### Invalid Transitions
*   `Partially Received` → `Cancelled` (Must handle via returns or short-closing)
*   `Fully Received` → `Rejected`
*   `Closed` → Any state (Terminal state)

**Audit Requirements:** Log approval limits checked, rejection reasons, and variance between PO and GRN quantities.

---

## 3. Sales Order (SO)

**Description:** Manages customer orders for eggs, meat, or live birds.

### States
*   **Draft**: Order entered, not confirmed.
*   **Confirmed**: Customer commitment verified, inventory allocated.
*   **Dispatched**: Goods left the premises.
*   **Delivered**: Goods reached customer.
*   **Invoiced**: Financial document generated.
*   **Closed**: Payment resolved.
*   **Cancelled**: Order voided.
*   **Returned**: Goods returned post-dispatch.

### Valid Transitions
*   **Draft** → **Confirmed**: `confirm()` | Inventory available/forecasted | Sales Rep
*   **Confirmed** → **Dispatched**: `dispatch()` | Vehicle/Driver assigned, gate pass generated | Dispatcher
*   **Dispatched** → **Delivered**: `deliver()` | Proof of Delivery (POD) received | Driver/Dispatcher
*   **Delivered** → **Invoiced**: `invoice()` | Final weights/counts verified | Finance
*   **Invoiced** → **Closed**: `close()` | Invoice marked paid | Finance
*   **Dispatched/Delivered** → **Returned**: `return()` | Return reason logged | Dispatcher/Sales
*   **Draft/Confirmed** → **Cancelled**: `cancel()` | Pre-dispatch cancellation | Sales Rep

### Invalid Transitions
*   `Dispatched` → `Cancelled` (Must be processed as `Returned`)
*   `Invoiced` → `Confirmed`
*   `Closed` → Any state

**Audit Requirements:** Track weight shrinkages between dispatch and delivery, POD attachment logs.

---

## 4. Invoice (Sales)

**Description:** Financial tracking for accounts receivable.

### States
*   **Draft**: Invoice generated, pending review.
*   **Sent**: Issued to customer.
*   **Partially Paid**: Partial payment received.
*   **Paid**: Fully settled.
*   **Overdue**: Past payment terms.
*   **Cancelled**: Voided due to error.
*   **Credit Note Issued**: Nullified via credit note.

### Valid Transitions
*   **Draft** → **Sent**: `send()` | Has valid SO reference | Finance
*   **Sent** → **Partially Paid**: `apply_payment()` | Payment amt < Total | Finance
*   **Sent/Partially Paid** → **Paid**: `apply_payment()` | Payment amt == Remaining balance | Finance
*   **Sent/Partially Paid** → **Overdue**: `check_due_date()` (System Trigger) | Current date > Due date | System
*   **Overdue** → **Paid**: `apply_payment()` | Full payment received | Finance
*   **Draft** → **Cancelled**: `cancel()` | Invoice not sent yet | Finance
*   **Sent** → **Credit Note Issued**: `issue_cn()` | Issued for full amount | Finance

### Invalid Transitions
*   `Paid` → `Cancelled` (Must issue refund/credit note instead)
*   `Overdue` → `Draft`

**Audit Requirements:** Payment reference IDs, timestamp of systemic overdue mark, credit note approval logs.

---

## 5. Invoice (Purchase)

**Description:** Financial tracking for accounts payable.

### States
*   **Received**: Invoice received from vendor.
*   **Verified**: Matched against PO and GRN (3-way match).
*   **Approved**: Cleared for payment.
*   **Partially Paid**: Partial remittance.
*   **Paid**: Full remittance.
*   **Disputed**: Price/qty discrepancy found.
*   **Cancelled**: Voided (duplicate/error).

### Valid Transitions
*   **Received** → **Verified**: `verify()` | GRN and PO match | Accounts Payable
*   **Received** → **Disputed**: `dispute()` | Discrepancy logged | Accounts Payable
*   **Verified** → **Approved**: `approve()` | Within AP approval limits | Finance Manager
*   **Approved** → **Partially Paid**: `remit_partial()` | Bank reference provided | Finance
*   **Approved/Partially Paid** → **Paid**: `remit_full()` | Balance = 0 | Finance
*   **Received/Disputed** → **Cancelled**: `cancel()` | Duplicate/Invalid check | Accounts Payable
*   **Disputed** → **Verified**: `resolve()` | Vendor issues CN or corrects invoice | Accounts Payable

### Invalid Transitions
*   `Approved` → `Disputed` (Must be disputed before payment approval)
*   `Paid` → `Disputed`

**Audit Requirements:** 3-way matching validation logs, dispute resolution notes.

---

## 6. Payment

**Description:** Tracks individual financial transactions (inward or outward).

### States
*   **Initiated**: Payment entered, pending gateway/bank processing.
*   **Processed**: Bank acknowledged, funds moved.
*   **Completed**: Funds confirmed in destination account.
*   **Failed**: Transaction rejected by bank/gateway.
*   **Reversed**: Funds returned after initial success.

### Valid Transitions
*   **Initiated** → **Processed**: `process()` | System polling bank API | System
*   **Processed** → **Completed**: `reconcile()` | Bank statement match | Finance/System
*   **Initiated** → **Failed**: `fail()` | API error / NSF | System
*   **Completed** → **Reversed**: `reverse()` | Chargeback/Bounce logged | Finance

### Invalid Transitions
*   `Failed` → `Completed` (Must create new payment)
*   `Completed` → `Initiated`

**Audit Requirements:** Gateway transaction IDs, raw API response logs, reconciliation user ID.

---

## 7. Incubation Batch

**Description:** Lifecycle of eggs in the hatchery.

### States
*   **Egg Receipt**: Eggs received from breeder farm.
*   **Storage**: In cold room (temperature controlled).
*   **Setting**: Placed in setter incubators.
*   **Incubating**: Active setter phase (days 1-18).
*   **Candled**: Infertile eggs removed.
*   **Transferred**: Moved to hatchers (day 18).
*   **Hatching**: Chicks emerging (days 19-21).
*   **Completed**: Chicks graded and boxed.

### Valid Transitions
*   **Egg Receipt** → **Storage**: `store()` | Cold room capacity available | Hatchery Worker
*   **Storage** → **Setting**: `set_eggs()` | Machine ID assigned | Hatchery Manager
*   **Setting** → **Incubating**: `start_machine()` | Temp/humidity params set | Hatchery Operator
*   **Incubating** → **Candled**: `candle()` | Day 10-18 reached | Operator
*   **Candled** → **Transferred**: `transfer()` | Day 18 reached, Hatcher ID assigned | Operator
*   **Transferred** → **Hatching**: `start_hatcher()` | Hatcher running | Operator
*   **Hatching** → **Completed**: `grade()` | Day 21 reached, cull counts recorded | Manager

### Invalid Transitions
*   `Incubating` → `Storage` (Cannot reverse embryo development)
*   `Transferred` → `Setting` (Cannot move back to setters)

**Audit Requirements:** Environmental parameters (temp/humidity) linked to phase transitions, discard counts during candling.

---

## 8. Expense/Approval

**Description:** Employee expense claims or operational expenses.

### States
*   **Draft**: Claim created.
*   **Submitted**: Sent for manager review.
*   **Approved**: Manager cleared.
*   **Paid**: Reimbursed by finance.
*   **Rejected**: Claim denied.

### Valid Transitions
*   **Draft** → **Submitted**: `submit()` | Receipts attached | Employee
*   **Submitted** → **Approved**: `approve()` | Within policy | Manager
*   **Submitted** → **Rejected**: `reject()` | Reason provided | Manager
*   **Approved** → **Paid**: `pay()` | Payment reference generated | Finance
*   **Rejected** → **Draft**: `re_draft()` | Allow corrections | Employee

### Invalid Transitions
*   `Paid` → `Rejected`
*   `Approved` → `Draft`

**Audit Requirements:** Receipt attachment hashes, policy engine override flags.

---

## 9. Employee

**Description:** Staff lifecycle on the farm/office.

### States
*   **Active**: Currently working.
*   **On Leave**: Temporarily absent.
*   **Suspended**: Temporarily barred (disciplinary).
*   **Terminated**: No longer employed.

### Valid Transitions
*   **Active** → **On Leave**: `start_leave()` | Approved leave request | HR
*   **On Leave** → **Active**: `end_leave()` | Return date reached | System/HR
*   **Active** → **Suspended**: `suspend()` | Incident report logged | HR/Management
*   **Suspended** → **Active**: `lift_suspension()` | Review completed | HR
*   **Active/Suspended/On Leave** → **Terminated**: `terminate()` | Exit interview/clearance done | HR

### Invalid Transitions
*   `Terminated` → `Active` (Must re-hire as new record or specific re-hire workflow)
*   `On Leave` → `Suspended` (Usually must return to active first or convert leave)

**Audit Requirements:** Asset clearance flags, biometric access revocation sync.

---

## 10. Inventory Item (Serialization/Lot Tracking)

**Description:** Lifecycle of a specific batch/lot of medicine or feed.

### States
*   **Ordered**: PO exists.
*   **In Stock**: Available for use.
*   **Reserved**: Allocated to a specific shed/batch but not used.
*   **Issued**: Physically moved to shed.
*   **Consumed/Expired**: Used up or past date.

### Valid Transitions
*   **Ordered** → **In Stock**: `receive()` | GRN processed | Store Keeper
*   **In Stock** → **Reserved**: `reserve()` | Farm request approved | Manager
*   **Reserved** → **Issued**: `issue()` | Gate pass / internal transfer | Store Keeper
*   **Reserved** → **In Stock**: `unreserve()` | Request cancelled | Manager
*   **Issued** → **Consumed/Expired**: `consume()` | Daily log entry by farm | Farm Supervisor
*   **In Stock** → **Consumed/Expired**: `expire()` (System) | Shelf life exceeded | System

### Invalid Transitions
*   `Consumed/Expired` → `In Stock` (Cannot reuse consumed items)
*   `Issued` → `Ordered`

**Audit Requirements:** Expiry date tracking, lot number lineage tracing.
