# Live vs Processed Sales

## 1. Core Principle [CONFIRMED]
The fundamental business rule for Sri Murugan Poultry & Agro Group is: 
"When we sell live, the customer takes the processing loss. When we sell processed, WE take the processing loss" (CLIENT-127).

## 2. Selling Methods [CONFIRMED]

### 2.1 Live Sale (LIVE_PRICE)
- **Definition**: Customer buys the bird based on its live weight (CLIENT-107).
- **Processing**: The customer handles processing, or it is processed post-sale where the loss is borne entirely by the customer (CLIENT-108).
- **Example**: 1 kg live chicken × ₹X/kg = ₹X. 
- **Inventory Impact**: Deducts directly from live bird inventory. No processing loss is absorbed by the business.

### 2.2 Processed Sale (PROCESSED_PRICE)
- **Definition**: Customer buys the final cleaned meat weight (CLIENT-109).
- **Processing**: The business processes the bird to yield the requested meat weight and bears the loss (CLIENT-110).
- **Example**: Customer orders 1 kg meat. The business uses a 1.35 kg live bird. The processing loss is 0.35 kg. The customer is billed for 1 kg at the processed rate.
- **Inventory Impact**: Deducts 1.35 kg from live bird inventory, creates 1.0 kg meat inventory + by-products, records 0.35 kg as processing loss/waste.

## 3. Order Management [CONFIRMED]
- Every customer order MUST explicitly specify the selling mode: LIVE or PROCESSED.
- Pricing engines must strictly fetch the `LIVE_PRICE` or `PROCESSED_PRICE` based on this selection.
- Any change in the mode after processing has started requires a supervisor override.

## 4. Cost Calculation & Profitability [CONFIRMED]
- **Cost Separation**: The system must maintain separate cost calculations for live vs. processed items. Processed costs must include the raw material cost (live bird), absorbed processing loss, direct labor, and overhead (CLIENT-122).
- **Profitability Comparison**: Management requires a dedicated P&L report comparing the profitability of selling live vs. selling processed (CLIENT-122). The report must answer: "Is selling live more profitable than selling processed for a given batch/period?"

## 5. Billing & Invoicing [PROPOSED]
- Invoices for PROCESSED sales should optionally show the expected yield or just the final meat weight based on customer preferences, but the internal system must always link the invoice to the input live weight for financial reconciliation.
