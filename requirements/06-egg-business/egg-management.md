# Egg Business Management

## 1. Overview
This module covers the end-to-end lifecycle of the egg business, including production (own farms), purchasing, grading, inventory, sales, and delivery.

## 2. Egg Sources & Collection
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-001 | The system must distinguish between eggs from **Own Layer Farms** and **External Suppliers** (CLIENT-046). | [CONFIRMED] |
| EGG-002 | The system must support daily morning and evening egg collection tracking (CLIENT-047). | [CONFIRMED] |
| EGG-003 | Collection records must capture: Date, Farm, Shed, Flock, Shift, Total Quantity, Good Eggs, Broken Eggs, Damaged Eggs, and Remarks (CLIENT-047). | [CONFIRMED] |
| EGG-004 | Collection records must automatically update farm/collection room inventory (CLIENT-050). | [CONFIRMED] |

## 3. Grading & Units
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-005 | Eggs must be graded by size (Small, Medium, Large, Extra Large) (CLIENT-048-049). | [CONFIRMED] |
| EGG-006 | Eggs must be graded by quality (Good, Broken, Damaged, Rejected) (CLIENT-048-049). | [CONFIRMED] |
| EGG-007 | Egg units (Piece, Tray, Carton, Crate, Box, Kg) must be fully configurable and NOT hard-coded (CLIENT-056-057). | [CONFIRMED] |
| EGG-008 | The system must support configurable unit conversions (e.g., 1 Tray = 30 Pieces, 1 Carton = 7 Trays) (CLIENT-056-057). | [CONFIRMED] |

## 4. Inventory, Storage & Transfers
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-009 | Grade-wise stock must be tracked across multiple locations (Farm, Central Warehouse, Dealer) (CLIENT-050-051). | [CONFIRMED] |
| EGG-010 | The system must track egg freshness using collection date and storage date, enforcing FIFO stock rotation (CLIENT-060). | [CONFIRMED] |
| EGG-011 | Transfer requests must be supported: Farm → Collection → Grade → Transfer Request → Egg Warehouse → Receive → Stock Update (CLIENT-068). | [CONFIRMED] |
| EGG-012 | Stock reconciliation formula: Opening + Purchase + Production - Sales - Breakage - Damage ± Adjustment = Closing (CLIENT-058). | [CONFIRMED] |

## 5. Procurement & Sales
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-013 | Egg purchase workflow: PO → Receipt → QC → Grade → Stock → Payment (CLIENT-052). | [CONFIRMED] |
| EGG-014 | Customer types for sales include: Dealers, shops, hotels, bakeries, restaurants, wholesalers, direct (CLIENT-053). | [CONFIRMED] |
| EGG-015 | Egg sales workflow: Order → Rate applied → Dispatch → Invoice → Delivery → Payment (CLIENT-053). | [CONFIRMED] |
| EGG-016 | Customer returns must undergo QC to classify as Good (back to stock) or Damaged (wastage) (CLIENT-059). | [CONFIRMED] |
| EGG-017 | Direct delivery must support routes: Farm → Warehouse → Dealer; Farm → Dealer; Supplier → Warehouse → Dealer (CLIENT-069). | [CONFIRMED] |
| EGG-018 | The system must handle stock shortage alerts during order entry (e.g., Order 10k, Available 7.5k) (CLIENT-072-073). | [CONFIRMED] |

## 6. Dispatch & Payments
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-019 | Dispatch tracking must include: Vehicle trip, driver, customer, quantity, route, fuel, delivery status (CLIENT-062-063). | [CONFIRMED] |
| EGG-020 | Payment methods must include Cash, UPI, Bank, Credit, Partial payment, Advance (CLIENT-064-065). | [CONFIRMED] |
| EGG-021 | Customer ledger formula: Opening Balance + Sales - Payments - Credit Notes ± Adjustments = Outstanding (CLIENT-064-065). | [CONFIRMED] |

## 7. Profitability & Dashboard
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-022 | Profitability MUST differentiate between OWN_PRODUCTION, PURCHASED, TRANSFERRED, and RETURNED sources (CLIENT-066-067). | [CONFIRMED] |
| EGG-023 | Egg Profit Formula: Revenue - Purchase/Production Cost - Transport - Packing - Breakage - Other Expenses (CLIENT-066-067). | [CONFIRMED] |
| EGG-024 | The Egg Dashboard must display: Today's Collection/Sales, Current Stock (Grade-wise), Purchase, Revenue, Avg Selling Rate, Breakage %, Outstanding, Profit (CLIENT-071). | [CONFIRMED] |
| EGG-025 | Standard reports must include: Daily collection, production/stock by grade/farm/shed, rate history, reconciliation (CLIENT-070). | [CONFIRMED] |

## 8. Future Scope
| Req ID | Requirement | Source Classification |
|---|---|---|
| EGG-026 | IoT integration for temperature monitoring and alert system (CLIENT-061). | [FUTURE] |
| EGG-027 | Barcode/QR integration, automatic grading machine integration, weighing integration (CLIENT-074). | [FUTURE] |
| EGG-028 | Dealer portal, WhatsApp ordering, mobile sales, and payment links (CLIENT-074). | [FUTURE] |
