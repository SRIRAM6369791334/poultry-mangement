# Consolidated conversation-conflicts.md



## From Chunk 1


# Conversation Conflicts

| ID | Conflict Description | Source Lines | Status | Resolution / Action Needed |
|---|---|---|---|---|
| CONFLICT-001 | Offline vs Server Data Override: Farm workers use offline mode. Client stated "conflict வந்தால் automatic-ஆ data overwrite செய்யக்கூடாது" (no auto overwrite on conflict). How should the conflict be manually resolved? | CLIENT-CONV-L848 | [CLIENT-CLARIFICATION] | Need to design a manual conflict resolution screen for supervisor/admin to resolve sync conflicts. |
| CONFLICT-002 | Partial Receiving: Warehouse transfer allows partial receiving. How to handle the remaining quantity (in-transit vs lost/damaged)? | CLIENT-CONV-L506 | [CLIENT-CLARIFICATION] | Need to confirm the process for transit loss/variance reconciliation. |

## From Chunk 2


# Conversation Conflicts - Chunk 2

| Conflict ID | Description | Resolution / Status |
|---|---|---|
| CONFLICT-001 | Order Cancellation Impact: Customer can cancel before processing (simple), but canceling *after* processing starts presents a problem since the bird is already cut. | Requires clear business rule definition. Client mentioned "business rule needed" for post-processing cancellation. [TO-BE-CONFIRMED] |
| CONFLICT-002 | Direct Farm to Dealer Delivery vs Standard Warehouse flow: Bypassing the central warehouse means the standard flow (Farm -> Warehouse -> Dealer) isn't strictly enforced. | System routing must be flexible; direct transfer paths must be allowed. [CLIENT-CONFIRMED] |

## From Chunk 3


# Conversation Conflicts - Chunk 3

| Conflict ID | Source Lines | Conflict Description | Resolution Status |
|---|---|---|---|
| CONFLICT-001 | CLIENT-CONV-L2254-L2274 | Mismatch between exact required final meat (e.g., 1.00 kg) and available bird yields (e.g., 1.12 kg). | Resolved in conversation: System must prompt for disposition of excess weight (customer takes it, allocate to other order, by-product, waste). |
| CONFLICT-002 | CLIENT-CONV-L2675-L2708 | Delivery weights varying from dispatch weights (short or over). | Resolved in conversation: Dedicated variance handling flows required to capture delivered weight and reconcile billing. |

## From Chunk 4


# Conversation Conflicts

| Conflict ID | Description | Resolution / Notes | Source Lines | Status |
|---|---|---|---|---|
| CONFLICT-001 | Some features described (AI predictions, Profitability models) are very complex. | Tagged as [FUTURE] where explicitly stated or obviously advanced beyond phase 1 ERP. | 3166-3182 | [INFERRED] |

## From Chunk 5


# Conversation Conflicts - Chunk 5

* **CONFLICT-05-001**: **Below-Cost Sales vs Loss Sales Approval**
  * **Conflict**: The system is initially required to block sales where the margin is negative (Selling below estimated cost). However, immediately after, the client states that there are special cases (like clearing old stock) where they *must* sell at a loss.
  * **Resolution**: The system must not automatically hard-block negative margin sales. Instead, it must issue a warning, require a reason, and enforce an approval workflow before allowing the sale to proceed. [CLIENT-CONFIRMED]
* **CONFLICT-05-002**: **Product Replacement vs New Sale**
  * **Conflict**: When replacing a product for a customer due to a complaint, it might be entered as a new sale, skewing actual sales data.
  * **Resolution**: Replacement orders must be explicitly linked to the original order and not treated as new normal sales. [CLIENT-CONFIRMED]
