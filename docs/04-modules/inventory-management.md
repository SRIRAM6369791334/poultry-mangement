# Inventory Management Module (Poultry ERP)

## 1. Overview
The Inventory Management module ensures optimal stock levels across all locations, minimizing waste, managing perishability, and providing real-time visibility into the availability of feed, medicines, birds, and equipment.

## 2. Warehouse/Store Management
- **Hierarchy**: Location -> Warehouse -> Zone -> Bin/Rack.
- **Multiple Warehouses**: Farm stores, central stores, feed mill stores, hatchery cold rooms.
- **Zone Types**: Ambient, Cold Storage (vaccines/eggs), Quarantine, Finished Goods, Raw Materials.

## 3. Stock Categories
- **Feed**: Finished feed types.
- **Medicines & Vaccines**: Temperature-sensitive items.
- **Eggs**: Hatching eggs, commercial table eggs (graded/ungraded).
- **Live Birds/Chicks**: Day-Old Chicks (DOC), growers, layers, broilers.
- **Raw Materials**: Grains, supplements for feed milling.
- **Equipment & Consumables**: Spare parts, farm tools.

## 4. Stock In/Out Workflows
- **Receipt (Stock In)**: Via GRN (from Procurement) or Production Receipt (from Feed Mill/Hatchery).
- **Issue (Stock Out)**: Issue to farm/shed (e.g., feed consumption), Issue to production (e.g., raw materials to mill).
- **Transfer**: Inter-warehouse or inter-farm transfers. Workflow: `Dispatch` -> `In-Transit` -> `Receive`.
- **Return**: Return from farm/shed to store if unused.

## 5. Batch & Expiry Tracking
- **Batch Tracking**: Mandatory for medicines, vaccines, and feed. Captures Mfg Date, Expiry Date, and Manufacturer Batch No.
- **Expiry Management**: Alerts triggered 30, 15, and 7 days prior to expiry [RECOMMENDATION: Configurable thresholds]. Expired stock is automatically locked from being issued.

## 6. FIFO & FEFO Management
- **FIFO (First-In-First-Out)**: Default strategy for general items.
- **FEFO (First-Expired-First-Out)**: Enforced for medicines, vaccines, and feed. System suggests picking from the batch expiring soonest.

## 7. Stock Adjustment
- **Reasons**: Damage, expiry, spillage, physical count variance, transit loss.
- **Workflow**: `Adjustment Request` -> `Approval (based on value)` -> `Inventory Updated` -> `GL Account Updated (Expense)`.

## 8. Physical Stock Count
- **Process**: Generate count sheet (blind count) -> Physical counting -> Enter counts -> Variance calculation.
- **Variance Handling**: If Count < System = Shrinkage. If Count > System = Surplus. Requires managerial approval to post adjustments.

## 9. Minimum Stock Levels
- **Reorder Point (ROP)**: The level at which a PR is automatically generated.
- **Reorder Quantity (ROQ)**: The default quantity to order.
- **Alerts**: Dashboard widgets and email/SMS alerts to procurement and store managers when stock hits ROP.

## 10. Stock Valuation
- **Standard Cost**: Usually applied to internal products (chicks, own feed).
- **Weighted Average Cost (WAC)**: Standard for raw materials and general inventory.
- **FIFO Valuation**: Used for precise financial reporting in fluctuating markets.
