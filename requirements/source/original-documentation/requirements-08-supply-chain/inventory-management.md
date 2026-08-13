# Supply Chain: Inventory Management

## 1. Overview
A unified inventory architecture to manage all items across the 2 warehouses and 8 farms, including Feed, Medicine, Vaccine, Equipment, Consumables, Packaging, Chicken, Eggs, By-products, and other supplies.

## 2. Warehouse Operations [CONFIRMED] (CLIENT-018)
The system must log all stock movements:
*   **Opening Stock:** Initial balance.
*   **Purchase:** Goods received via GRN.
*   **Transfer:** Movement between locations (Warehouse ↔ Farm).
*   **Issue:** Consumption by sheds/batches.
*   **Return:** Unused items returned from sheds.
*   **Damage/Wastage:** Stock deemed unusable.
*   **Adjustment:** Corrections post-audit.
*   **Closing Stock:** Final calculated balance.

## 3. Warehouse Transfer Workflow [CONFIRMED] (CLIENT-019)
*   **Process:** Warehouse 1 → Transfer Request → Approval → Dispatch → Farm 3 → Receive → Stock Update.
*   **Partial Receiving:** Farm 3 can receive less than dispatched (e.g., if damaged in transit), with variance tracked.

## 4. Stock Reconciliation [CONFIRMED] (CLIENT-096)
*   **Formula:** Opening + Purchase + Production + Returns + Transfers(In) - Sales - Processing - Death - Damage - Wastage - Transfers(Out) = Expected Closing.
*   **Comparison:** The system must generate a report comparing the *Expected Closing Stock* against the *Physical Stock* entered during counts.

## 5. Physical Stock Count & Auditing
*   **Periodic Count [CONFIRMED] (CLIENT-165):** Warehouse staff must enter physical count data periodically.
*   **Variance Report [CONFIRMED]:** System highlights differences between calculated and physical stock.
*   **Stock Adjustment [CONFIRMED] (CLIENT-164):** Any adjustment requires a mandatory reason, managerial approval, and leaves an audit trail.

## 6. Shrinkage & Loss Management
*   **Normal vs. Abnormal [CONFIRMED] (CLIENT-166):** System must categorize losses. Normal shrinkage (e.g., moisture loss in feed) is absorbed; abnormal loss requires investigation.
*   **Theft/Suspicious Loss [CONFIRMED] (CLIENT-167):** Large differences must trigger immediate management alerts.
    *   *Example:* Expected 500 kg, Physical 450 kg = 50 kg abnormal loss (Alert Triggered).

## 7. Inventory Policies [PROPOSED]
*   **FIFO/FEFO:** Mandatory First-In-First-Out for feed and First-Expired-First-Out for medicines/vaccines to minimize expiry wastage.
*   **Reorder Alerts:** Low stock notifications based on lead time and consumption rate.
