# Conversation Index - Chunk 3

| ID | Source Lines | Topic | Client Statement Summary | Domain | Status |
|---|---|---|---|---|---|
| CONV-001 | CLIENT-CONV-L2001-L2008 | Orders | Custom customer orders must be captured. | Sales & Orders | [CLIENT-CONFIRMED] |
| CONV-002 | CLIENT-CONV-L2009-L2034 | Packing | Packing label should include product, weight, batch, processing date, packing date, order, customer. | Processing | [CLIENT-CONFIRMED] |
| CONV-003 | CLIENT-CONV-L2035-L2053 | Outputs | One bird processing can yield multiple outputs (meat, skin, liver, gizzard, etc.). | Processing | [CLIENT-CONFIRMED] |
| CONV-004 | CLIENT-CONV-L2054-L2123 | Chain | Detailed business and reconciliation chains were outlined. | Supply Chain | [CLIENT-CONFIRMED] |
| CONV-005 | CLIENT-CONV-L2124-L2175 | Selling Mode | Need two distinct chicken selling methods: Live vs Processed. Customer bears loss for live, business bears loss for processed. | Sales & Pricing | [CLIENT-CONFIRMED] |
| CONV-006 | CLIENT-CONV-L2176-L2253 | Pricing Model | Need LIVE_PRICE and PROCESSED_PRICE models. | Sales & Pricing | [CLIENT-CONFIRMED] |
| CONV-007 | CLIENT-CONV-L2254-L2292 | Weight Variance | Need to track excess/short weight handling (accept, partial take, byproduct, waste). | Processing | [CLIENT-CONFIRMED] |
| CONV-008 | CLIENT-CONV-L2293-L2307 | Yield | Processing yield is a vital KPI. | Processing & Analytics | [CLIENT-CONFIRMED] |
| CONV-009 | CLIENT-CONV-L2308-L2329 | Pricing | Customer-specific pricing based on customer type (Retail, Hotel, Wholesale). | Sales & Pricing | [CLIENT-CONFIRMED] |
| CONV-010 | CLIENT-CONV-L2330-L2358 | Product Form | Product form (live, cleaned, cut, skinless, boneless) impacts pricing. | Products | [CLIENT-CONFIRMED] |
| CONV-011 | CLIENT-CONV-L2359-L2422 | By-products | Processing Batch/Yield allocation needed. Configurable Waste vs By-product definition. | Processing | [CLIENT-CONFIRMED] |
| CONV-012 | CLIENT-CONV-L2423-L2457 | Profitability | Compare profitability of live vs processed sales. | Analytics | [CLIENT-CONFIRMED] |
| CONV-013 | CLIENT-CONV-L2458-L2479 | Reconciliation | Input Live Weight = Saleable Meat + By-products + Waste + Loss. Alert on mismatch. | Processing | [CLIENT-CONFIRMED] |
| CONV-014 | CLIENT-CONV-L2480-L2499 | Cancellation | Order cancellation impact differs if processing has started. | Sales | [CLIENT-CONFIRMED] |
| CONV-015 | CLIENT-CONV-L2500-L2514 | Returns | Disposition required for processed chicken returns. | Quality & Returns | [CLIENT-CONFIRMED] |
| CONV-016 | CLIENT-CONV-L2528-L2565 | Loss Ownership | Business bears loss for processed, customer for live. Requires composite pricing record. | Business Rules | [CLIENT-CONFIRMED] |
| CONV-017 | CLIENT-CONV-L2566-L2623 | Ordering | Support for advance, same-day, recurring orders, order cut-offs, delivery slots. | Sales & Delivery | [CLIENT-CONFIRMED] |
| CONV-018 | CLIENT-CONV-L2624-L2661 | Logistics | Vehicle capacity checking and basic route planning. Future AI route optimization. | Delivery | [CLIENT-CONFIRMED] |
| CONV-019 | CLIENT-CONV-L2662-L2709 | Delivery | Delivery proof needed. Short and over-delivery handling. | Delivery | [CLIENT-CONFIRMED] |
| CONV-020 | CLIENT-CONV-L2710-L2733 | Credit Limits | Customer credit limit validation and block/warn rules. | Finance | [CLIENT-CONFIRMED] |
| CONV-021 | CLIENT-CONV-L2734-L2793 | Pricing Controls| Customer-specific contracts, market pricing, rate approval, and discounts. | Sales & Pricing | [CLIENT-CONFIRMED] |
| CONV-022 | CLIENT-CONV-L2794-L2818 | Constraints | Minimum Order Quantity and multiple price units (kg, piece, tray). | Products & Sales | [CLIENT-CONFIRMED] |
| CONV-023 | CLIENT-CONV-L2819-L2832 | Modifications | Order price locking. Order modification requires approval if processing has started. | Sales & Orders | [CLIENT-CONFIRMED] |
| CONV-024 | CLIENT-CONV-L2833-L2886 | Queue | Processing queue status, staff assignment, and processing time tracking. | Processing | [CLIENT-CONFIRMED] |
| CONV-025 | CLIENT-CONV-L2887-L2929 | Quality | QC checks before dispatch. Quality rejection routing (rework, reject, waste). | Quality Control | [CLIENT-CONFIRMED] |
| CONV-026 | CLIENT-CONV-L2930-L2966 | Storage | Cold storage tracking, shelf-life monitoring, FIFO/FEFO strategy. | Inventory | [CLIENT-CONFIRMED] |
| CONV-027 | CLIENT-CONV-L2967-L3000 | Traceability | Reverse traceability from customer order back to farm shed. Complaint management. | Quality & Tracing | [CLIENT-CONFIRMED] |
