# Phase 6: Cross-Domain Review and Consistency Synthesis

## 1. Terminology Consistency Check
To ensure unified understanding across all modules and technical teams, the following terms are standardized:

| Term | Context | Standard Definition | Rejected / Ambiguous Terms |
|------|---------|---------------------|----------------------------|
| **Farming Batch** | Farm Operations | A specific group of day-old chicks placed in a specific shed on a specific date. Tracked from day 1 to culling/lifting. | Flock, Lot |
| **Processing Batch** | Meat Processing | A group of live birds lifted from a farm and processed together. Mapped to 1 or more Farming Batches. | Processing Lot |
| **Yield** | Processing / Inventory | The usable meat output obtained after dressing the live birds. Expressed as a percentage of live weight. | Meat Recovery |
| **Loss** | Transport / Processing | Unusable reduction in weight (e.g., Transit loss due to shrinkage or mortality). | Wastage (Ambiguous) |
| **By-product** | Processing | Usable/Saleable non-meat outputs (e.g., feathers, offal) resulting from processing. | Waste (Ambiguous) |

## 2. Duplicate Entity Check
Analysis of entity relationships across domains revealed potential duplications that must be unified:
- **Customers:** "Egg Customers" and "Meat Customers" are merged into a unified **Customer Master**. Differentiation is handled via Customer Types and associated Price Lists.
- **Warehouses:** "Feed Warehouse", "Egg Warehouse", and "Meat Cold Storage" are merged into a unified **Warehouse/Location Master**. Separation is managed by Location Types and Zones with specific storage constraints (e.g., temperature control for meat).
- **Vehicles/Drivers:** Live bird transport, processed meat transport, and feed transport vehicles share the **Fleet Master**.

## 3. Business Rule Consistency
Cross-referencing rules across modules to ensure no logical conflicts:
- **Rule Conflict Resolution: "Live vs. Processed Transit Loss"**
  - *Processing Domain Rule:* For processed meat, the Company bears transit loss. For live birds, the Customer bears transit loss.
  - *Pricing/Finance Alignment:* The Pricing Engine must apply different billing formulas. Live bird billing is calculated at dispatch weight. Processed meat billing is calculated at delivered weight (or adjusted via credit notes).
- **Rule Conflict Resolution: "Batch Costing vs. Inventory Valuation"**
  - *Farm Domain:* Consumes feed/medicine, assigning cost to the Farming Batch.
  - *Finance Alignment:* When live birds are transferred to processing, the Farming Batch's accumulated cost per kg must become the raw material input cost for the Processing Batch to calculate accurate gross margins.

## 4. Integration Points & Data Flow
The system operates as a continuous flow. The critical integration pathways are:
- **Procurement → Inventory:** Feed/Medicine purchase (Purchase Module) updates stock (Inventory) and posts accounts payable (Finance).
- **Inventory → Farm Operations:** Issuing feed to sheds (Inventory) decreases stock and increases accumulated costs of the active Farming Batch (Farm Operations).
- **Farm Operations → Processing:** Lifting live birds closes or reduces the Farming Batch (Farm) and initiates a Processing Batch (Processing).
- **Processing → Inventory:** Yield and by-products from processing are entered into finished goods stock (Inventory).
- **Inventory → Sales → Finance:** Dispatches decrease stock (Inventory), generate invoices based on live/processed rules (Sales/Pricing Engine), and post accounts receivable (Finance).
- **All Domains → Intelligence:** Every transaction feeds into the Real-Time Dashboard and Demand Forecasting (Intelligence) to predict future feed requirements and meat availability.
