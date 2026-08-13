# Sales & Distribution Module (Poultry ERP)

## 1. Overview
The Sales and Distribution module governs the order-to-cash process. It manages customers, pricing, order fulfillment, dispatch, and delivery. In poultry, accurate weighing and transportation tracking are critical components.

## 2. Customer Management
- **Registration**: Captures KYC, trade licenses, tax IDs, and delivery addresses.
- **Categorization**: Retailers, Wholesalers, Institutional Buyers, Dealers/Distributors, Contract Farmers.
- **Credit Limits & Terms**: Hard limits stop order creation if outstanding exceeds limit. Configurable terms (Prepaid, Net 7, Net 15).

## 3. Sales Categories
- **Live Birds**: Sold by weight (kg) or count (pieces).
- **Dressed Birds/Processed Meat**: Sold by weight, specific cuts.
- **Eggs**: Sold by trays (30 pcs), cartons, or count. Categorized by size/grade.
- **Chicks**: Day-Old Chicks (DOC) sold by count (plus extra % for mortality).
- **Feed**: Sold in bags (50kg) or bulk.
- **Manure**: By-product sales, sold by tractor-load or ton.

## 4. Order Management
- **Creation**: Sales Order (SO) captures customer, items, quantity, agreed rate, delivery date.
- **Pricing & Discounts**: Derived from price lists. Support for trade discounts, bulk discounts, and seasonal offers.
- **Approval Workflow**: `Draft` -> `Pending Approval (if price < standard or credit limit exceeded)` -> `Approved` -> `Ready for Dispatch`.

## 5. Pricing Mechanisms
- **Price Lists**: Tiered pricing based on customer category.
- **Customer-Specific Pricing**: Contract rates valid for a date range.
- **Market-Linked Pricing**: Daily dynamic pricing (common in live bird and egg markets).

## 6. Dispatch & Weighing (Critical for Poultry)
- **Workflow**:
  1. Vehicle arrives. Empty Weighing (Tare Weight).
  2. Loading of goods (birds/feed/eggs).
  3. Loaded Weighing (Gross Weight).
  4. System calculates Net Weight = Gross - Tare.
- **Documentation**: Generates Dispatch Challan/Delivery Note.

## 7. Transportation Management
- **Vehicle Details**: Registration number, driver name, contact, vehicle type.
- **Route Management**: Assigning deliveries to specific routes to optimize fuel and time.
- **Tracking**: GPS integration for real-time tracking (especially for live birds/chicks to ensure welfare).

## 8. Delivery Confirmation & Transit Loss
- **Acknowledgment**: Proof of Delivery (POD) signed by customer.
- **Destination Weighing**: For live birds, customer weighs at destination.
- **Shrinkage/Transit Loss**: Expected weight loss during transport (e.g., 2-3% for live birds).
- **Variance Handling**: If shrinkage is within tolerance, invoice is generated on dispatch weight. If above tolerance, requires investigation and potential price adjustment/credit note.

## 9. Returns & Rejections
- **Reasons**: Dead on Arrival (DOA), quality mismatch, broken eggs.
- **Workflow**: `Return Request` -> `Validation` -> `Credit Note Generation` -> `Inventory Update (to waste/quarantine)`.

## 10. Sales Invoice
- **Generation**: Created from SO/Dispatch Note. Includes applicable taxes and freight charges.
- **Integration**: Posts to Accounts Receivable.

## 11. Sales Commission/Brokerage
- **Brokers/Agents**: Used to find buyers for flocks.
- **Commission**: Calculated per bird, per kg, or fixed percentage. Processed via Accounts Payable based on realized sales.
