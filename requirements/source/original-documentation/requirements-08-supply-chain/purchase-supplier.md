# Supply Chain: Purchase & Supplier Management

## 1. Overview
This module manages the entire procurement lifecycle from identifying a requirement to making the final payment to the supplier, alongside comprehensive supplier tracking and performance evaluation.

## 2. Supplier Management [CONFIRMED] (CLIENT-021)
### 2.1 Supplier Categories
*   **Feed Supplier:** Raw materials and finished feed.
*   **Chick Supplier:** Day-old chicks (DOC).
*   **Medicine Supplier:** Medicines, vaccines, and supplements.
*   **Equipment Supplier:** Farm and processing equipment.
*   **Service Provider:** Transport, maintenance, etc.

### 2.2 Supplier Profile & History
*   **Core Details:** Name, Contact, Address, Tax ID, Bank Details.
*   **Performance Metrics:** Delivery performance (on-time rate), Quality history (rejection rates).
*   **Financial Tracking:** Rate history, Payment history, Outstanding balances.

## 3. Purchase Workflow [CONFIRMED] (CLIENT-020)
The standard procurement lifecycle must strictly follow these stages:
1.  **Requirement Generation:** Department identifies need.
2.  **Purchase Request (PR):** Formal request creation.
3.  **Quotation:** Request and receive quotes from suppliers.
4.  **Supplier Selection:** Selection based on rate, quality, and terms.
5.  **Purchase Order (PO):** Formal PO detailing Rate, Tax, Quantity, Discount, Transport, Payment terms, Due date.
6.  **Approval:** Managerial approval of PO.
7.  **Goods Receipt Note (GRN):** Physical receipt of goods.
8.  **Quality Control (QC):** Inspection of received goods.
9.  **Stock Update:** Addition of accepted goods to inventory.
10. **Supplier Invoice:** Registration of the supplier's bill.
11. **Payment:** Execution and recording of payment.

## 4. Purchase QC & Rejection [CONFIRMED] (CLIENT-162)
*   **Partial Acceptance:** System must handle scenarios where a portion of the delivery is rejected.
    *   *Example:* Received 1,000 kg, Accepted 930 kg, Rejected 70 kg.
*   **Invoice Adjustment:** The supplier invoice for the full 1,000 kg must be automatically flagged for adjustment (Debit Note) for the 70 kg rejected.

## 5. Supplier Return Workflow [CONFIRMED] (CLIENT-163)
*   **Return Processing:** Formal workflow to dispatch rejected or damaged goods back to the supplier.
*   **Financial Impact:** Automatic generation of Debit Notes against the supplier's outstanding balance.

## 6. Future & Proposed Enhancements
*   **Supplier Portal [PROPOSED]:** A self-service portal for suppliers to submit quotes and view POs/Payments.
*   **Automated Reordering [PROPOSED]:** Auto-generate PRs based on reorder levels and lead times.
