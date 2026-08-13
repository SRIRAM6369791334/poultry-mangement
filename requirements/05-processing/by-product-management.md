# By-Product Management

## 1. By-Product Identification [CONFIRMED]
During processing, a single bird yields multiple outputs beyond the primary meat. The system must track the following by-products (CLIENT-081, CLIENT-082, CLIENT-105, CLIENT-119):
- Liver
- Gizzard
- Skin
- Feet
- Head
- Neck
- Intestines (if applicable for specific markets)
- Other By-products

## 2. Saleable vs. Non-Saleable Classification [CONFIRMED]
- **Dynamic Classification**: The system must allow management to toggle whether a specific by-product is saleable or non-saleable (waste) (CLIENT-120).
- **Saleable**: Items like Liver, Gizzard, and Feet are moved to finished goods inventory and priced for sale.
- **Non-Saleable (Waste)**: Items like feathers and blood are moved to waste inventory for disposal tracking.

## 3. Inventory Tracking & Sales [CONFIRMED]
- **Tracking**: By-products must have their own SKUs and inventory tracking mechanisms. As birds are processed, by-product inventories automatically increase based on standard yield formulas or manual entry at the QC station.
- **Sales**: By-products can be sold individually or in bulk. The POS and B2B ordering systems must support by-product sales alongside primary meat sales.

## 4. Cost Allocation & Waste Costing [CONFIRMED/PROPOSED]
- **Cost Allocation**: The input cost of the live bird must be allocated across the primary meat and saleable by-products. The system should support standard cost allocation percentages (e.g., Meat bears 90% of cost, By-products bear 10%) [PROPOSED].
- **Waste Cost Tracking**: The cost associated with waste disposal (e.g., paying for feather removal) must be tracked and factored into the overall processing overhead costs (CLIENT-121).
