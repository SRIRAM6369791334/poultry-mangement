# Procurement Module (Poultry ERP)

## 1. Overview
The Procurement module manages the acquisition of all goods and services required for poultry operations, including feed, medicines, chicks, raw materials, and equipment. It handles the entire lifecycle from requisition to supplier payment, ensuring cost-effectiveness, quality, and traceability.

## 2. Supplier Management
- **Supplier Registration**: Onboarding workflow including compliance, tax details, bank info, and quality certifications.
- **Categorization**: Suppliers are categorized by what they provide:
  - Feed & Feed Ingredients (Raw Materials)
  - Medicines & Vaccines
  - Equipment & Consumables
  - Chicks (Breeder, Broiler, Layer)
  - Packaging Materials
- **Credit Terms**: Standard payment terms (e.g., Net 30, Net 45), credit limits.
- **Supplier Rating**: Automated rating based on delivery timeliness, quality (rejection rate), and price competitiveness. [RECOMMENDATION] Integrate ratings into the PO approval process.

## 3. Purchase Requisition (PR)
- **Who Can Raise**: Farm Managers, Store Managers, Production Managers.
- **Auto-Requisition Triggers**: System-generated PRs based on Minimum Stock Levels (reorder points) in Inventory.
- **Approval Workflow**:
  - `Draft` -> `Submitted` -> `Manager Approval` -> `Finance Approval` -> `Approved` -> `Converted to PO`
- **Variations**: Capex PRs vs. Opex PRs have different approval limits.

## 4. Purchase Order (PO)
- **Creation**: Manual creation or conversion from Approved PRs. Includes pricing, taxes, freight terms.
- **Approval Workflow**:
  - `Draft` -> `Pending Approval` -> `Approved` -> `Dispatched to Supplier` -> `Partially Fulfilled` -> `Closed/Completed`
- **Amendment**: Revision of quantities/prices requires re-approval if variance > X% [ASSUMPTION: 5% tolerance].
- **Cancellation**: Permitted only before GRN creation.

## 5. Goods Receipt Note (GRN)
- **Receipt against PO**: Links directly to an approved PO. Validates received quantity against PO quantity.
- **Quality Check (QC)**: Goods go into a `QC Hold` location upon receipt. QC module updates status to `Accepted` or `Rejected`.
- **Partial Receipt**: Allowed. PO remains in `Partially Fulfilled` state.
- **Excess/Shortage Handling**: Shortages update actual received. Excess receipts require PO amendment or immediate rejection.

## 6. Purchase Invoice & 3-Way Matching
- **3-Way Matching**: The system validates that `PO Quantity/Price` == `GRN Quantity` == `Invoice Quantity/Price`.
- **Tolerance Limits**: Configurable tolerances for minor weight variations (e.g., in bulk feed raw materials).
- **Status**: `Matched` invoices proceed to Accounts Payable. `Mismatched` require intervention.

## 7. Returns to Supplier (Purchase Returns)
- **Defective Goods/Wrong Items**: Handled via a Debit Note linked to the original GRN and Invoice.
- **Workflow**: `Initiate Return` -> `Approval` -> `Dispatch` -> `Debit Note Generation`.

## 8. Purchase Categories
- **Feed**: Finished feed (Starter, Grower, Finisher).
- **Raw Materials**: Maize, Soya, Fish Meal, Additives.
- **Medicines & Vaccines**: Require strict expiry and batch tracking.
- **Equipment & Consumables**: Drinkers, feeders, PPE, cleaning agents.
- **Chicks/Eggs**: Day-Old Chicks (DOC) or Hatching Eggs.

## 9. Roles & Permissions
- **Procurement Officer**: Create POs, manage suppliers.
- **Procurement Manager**: Approve POs up to limit.
- **Store Keeper**: Create GRNs.
- **Finance**: Invoice matching, payment processing.
