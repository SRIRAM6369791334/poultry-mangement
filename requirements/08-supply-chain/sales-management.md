# Supply Chain: Sales Management

## 1. Overview
Manages the complete sales lifecycle from order capture to delivery and invoicing, supporting various order types and handling modifications and returns.

## 2. Sales Workflow [CONFIRMED] (CLIENT-015)
*   **Standard Flow:** Order Received (Dealer/Customer) → Approval (if required) → Dispatch Planning → Invoicing → Payment Collection → Outstanding Update.

## 3. Order Types [CONFIRMED] (CLIENT-128-130)
*   **Advance Order:** Placed days/weeks ahead.
*   **Same-day Order:** Placed for immediate delivery.
*   **Scheduled/Recurring Order (CLIENT-129):** Standing orders with variable schedules.
    *   *Example:* Hotel requires 20 kg daily, except Sunday (30 kg).
*   **Emergency Order:** Urgent requirements bypassing standard cut-offs.
*   **Cut-off Time Rule:** Orders placed before the daily cut-off are processed in today's slot; orders after are moved to the next available slot.

## 4. Order Lifecycle [CONFIRMED] (CLIENT-111, 145-146)
*   **Stages:** Draft → Confirmed → Allocated (Stock reserved) → Processing (Catching/Dressing) → QC → Packed → Ready for Dispatch → Dispatched → Delivered → Invoiced → Paid → Closed.
*   **Modification Rules:**
    *   *Before Processing:* Simple edits allowed.
    *   *After Processing:* Requires managerial approval as birds may already be processed.

## 5. Order Cancellation [CONFIRMED] (CLIENT-092-093, 124)
*   **Full Cancellation (Pre-processing):** No loss recorded; stock is de-allocated.
*   **Full Cancellation (Post-processing):** Creates a loss/surplus; requires immediate reallocation to other orders or cold storage.
*   **Partial Cancellation:** Allow reduction in quantity.
    *   *Example:* Ordered 10 kg, Cancelled 4 kg, Remaining 6 kg to be processed.

## 6. Sales Returns [CONFIRMED] (CLIENT-091, 125)
*   **Process:** Customer returns goods → QC Inspection.
*   **Outcomes:**
    *   *Good Condition:* Return to usable stock.
    *   *Damaged:* Mark as waste/loss.
    *   *Reprocessable:* Send for further processing (e.g., downgrade to pet food).
    *   *Rejected:* Complete loss, financial impact handled based on liability.
