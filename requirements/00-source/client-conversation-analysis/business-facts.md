# Consolidated business-facts.md



## From Chunk 1


# Business Facts

- **Company Name**: Sri Murugan Poultry & Agro Group (CLIENT-CONV-L004) [CLIENT-CONFIRMED]
- **Experience**: 12 years in poultry business (CLIENT-CONV-L004) [CLIENT-CONFIRMED]
- **Current Scale**: 2 Warehouses, 8 Farms, 42 Sheds, 30+ active batches/flocks, 85 Employees, 18 Vehicles, 45 Dealers, 120+ Shops/Customers (CLIENT-CONV-L008-L015) [CLIENT-CONFIRMED]
- **Current Core Business**: Broiler farming, including broiler production, chick/feed/medicine purchase, sales, transportation, warehouse ops (CLIENT-CONV-L023-L037) [CLIENT-CONFIRMED]
- **Future Plans**: Expand to 15-20 farms, layer, breeder, hatchery, feed mill, egg business (CLIENT-CONV-L019, L041-L047) [FUTURE]
- **Organizational Structure**: Head Office -> Warehouses / Farms (Sheds) / Dealers / Shops / Direct Customers (CLIENT-CONV-L052-L080) [CLIENT-CONFIRMED]
- **Data Capture Mediums**: Currently scattered across Farm Registers, Excel, WhatsApp, Billing Software, Manual Notes (CLIENT-CONV-L087-L098) [CLIENT-CONFIRMED]
- **Biggest Expense**: Feed is the largest cost (CLIENT-CONV-L293) [CLIENT-CONFIRMED]
- **New Business Aspect**: Also involves Egg sales business, sourcing from own layer farms and external suppliers (CLIENT-CONV-L0976-L0986) [CLIENT-CONFIRMED]

## From Chunk 2


# Business Facts - Chunk 2

* Eggs are classified by size (Small, Medium, Large, Extra Large) and condition (Good, Broken, Damaged, Rejected) [CLIENT-CONV-L1014-L1032].
* Egg inventory must be tracked grade-wise and location-wise [CLIENT-CONV-L1047-L1074].
* Egg rates vary by customer type (Wholesale, Retail, Bakery) and can change daily [CLIENT-CONV-L1092-L1139].
* Egg unit configurations (Piece, Tray, Carton) must be fully dynamic and not hardcoded [CLIENT-CONV-L1141-L1165].
* Profitability requires differentiating between eggs produced on own farms vs purchased eggs [CLIENT-CONV-L1267-L1297].
* The company sells multiple poultry products beyond chicken (Duck, Turkey, Quail, Country Chicken) [CLIENT-CONV-L1413-L1426].
* Live bird sales are based on both bird count and total live weight [CLIENT-CONV-L1428-L1444].
* Live bird processing involves significant weight reduction due to processing loss (blood, feather, skin, etc.) which must be explicitly tracked [CLIENT-CONV-L1471-L1515].
* Some bird parts (liver, gizzard, skin, feet) are treated as saleable by-products, not just waste [CLIENT-CONV-L1537-L1583].
* Requested customer weights rarely match exact processed weights, leading to overweight or underweight variances [CLIENT-CONV-L1585-L1638].
* Bird mortality occurs not just at the farm but during transport, receiving, and processing [CLIENT-CONV-L1677-L1691].
* Bird yield percentage is a critical metric for evaluating farm and processing performance (Saleable Weight / Input Live Weight × 100) [CLIENT-CONV-L1941-L1971].

## From Chunk 3


# Business Facts - Chunk 3

- [CLIENT-CONFIRMED] Custom processing orders include free-text instructions (e.g., "2 kg chicken, skinless, medium pieces, 1 kg packets"). (CLIENT-CONV-L2005)
- [CLIENT-CONFIRMED] Packing labels require extensive information including product, weight, batch, processing and packing dates, order, and customer. (CLIENT-CONV-L2023-L2031)
- [CLIENT-CONFIRMED] A single bird produces multiple outputs: meat, skin, liver, gizzard, feet, head, by-products, and waste. (CLIENT-CONV-L2039-L2050)
- [CLIENT-CONFIRMED] Live bird sale transactions do not record processing loss against the seller. (CLIENT-CONV-L2149)
- [CLIENT-CONFIRMED] Processed chicken sales require selling an exact final weight of usable meat, while business costing accounts for the larger live bird weight and processing loss. (CLIENT-CONV-L2153-L2174)
- [CLIENT-CONFIRMED] Feathers are classified as Waste, but blood, skin, head, and bone can be configured as either By-product or Waste. Liver, gizzard, and feet are Saleable. (CLIENT-CONV-L2393-L2400)
- [CLIENT-CONFIRMED] Processing loss is a direct business cost impacting the cost per saleable kg. (CLIENT-CONV-L2414-L2421)
- [CLIENT-CONFIRMED] A cancelled order after processing has started results in loss/cost and requires reallocation. (CLIENT-CONV-L2491-L2496)
- [CLIENT-CONFIRMED] Orders can be advanced, same-day, scheduled, recurring, or emergency. (CLIENT-CONV-L2572-L2576)
- [CLIENT-CONFIRMED] Order cut-off times dictate if an order can be processed for same-day delivery or shifted to the next slot. (CLIENT-CONV-L2609-L2610)
- [CLIENT-CONFIRMED] Vehicle capacity limits delivery batches, necessitating split deliveries or second vehicles. (CLIENT-CONV-L2636-L2644)
- [CLIENT-CONFIRMED] Delivery proof requires delivered quantity/weight, receiver name, signature, photo, GPS, and time. (CLIENT-CONV-L2668-L2674)
- [CLIENT-CONFIRMED] Prices can be set at kg, piece, tray, or bird level. (CLIENT-CONV-L2814-L2818)
- [CLIENT-CONFIRMED] Old stock must be dispatched first using configurable FIFO or FEFO rules. (CLIENT-CONV-L2958-L2963)
- [CLIENT-CONFIRMED] Reverse traceability (Customer -> Processing Batch -> Bird Batch -> Farm) is essential. (CLIENT-CONV-L2971-L2983)

## From Chunk 4


# Business Facts

- Complaint resolutions can include Refund, Replacement, Credit Note, Discount, Reprocess, Reject, No Action (CLIENT-CONV-L3010-L3018).
- Feedback metrics include Quality, Weight accuracy, Delivery, Packaging, Service (CLIENT-CONV-L3023-L3029).
- The system must differentiate between normal shrinkage and abnormal stock loss/theft (CLIENT-CONV-L3111).
- System must hold comprehensive end-to-end audit trails (Who, When, Where, What, How Much, Rate, Why, Who Approved, Who Changed, What Next) (CLIENT-CONV-L3336-L3345).
- Seasonal patterns, festivals, and day-of-week trends heavily influence demand (CLIENT-CONV-L3433-L3481).
- Suppliers have varying lead times (e.g. 2 days, 5 days) which affect reorder planning (CLIENT-CONV-L3622-L3626).
- Product lifecycle states: New, Growing, Fast Moving, Stable, Slow Moving, Non Moving, Discontinued (CLIENT-CONV-L3828-L3840).
- Batches can be transferred across farms/sheds and split into different sheds (CLIENT-CONV-L3982-L4000).

## From Chunk 5


# Business Facts - Chunk 5

* **FCT-05-001**: Batch merge, split, transfer, and reallocation occur operationally and their history must be recorded [CLIENT-CONFIRMED] (Lines 4001-4020)
* **FCT-05-002**: Stock can be company-owned, customer-owned, supplier-owned, or consignment [FUTURE] (Lines 4022-4033)
* **FCT-05-003**: Customer advance payments are collected during order confirmation and should be adjusted against future orders [CLIENT-CONFIRMED] (Lines 4035-4051)
* **FCT-05-004**: Large dealers maintain security deposits with the company [CLIENT-CONFIRMED] (Lines 4053-4064)
* **FCT-05-005**: Partial payments are very common and require tracking of date, method, and reference number per payment [CLIENT-CONFIRMED] (Lines 4072-4083)
* **FCT-05-006**: Expense types include farm, office, vehicle, processing, and employee expenses [CLIENT-CONFIRMED] (Lines 4091-4096)
* **FCT-05-007**: Petty cash is managed at the farm and warehouse for daily small expenses [CLIENT-CONFIRMED] (Lines 4103-4114)
* **FCT-05-008**: Feed suppliers frequently change rates; historical price tracking is required [CLIENT-CONFIRMED] (Lines 4124-4135)
* **FCT-05-009**: Best suppliers are chosen based on price, quality, delivery time, rejection rate, and reliability [CLIENT-CONFIRMED] (Lines 4136-4147)
* **FCT-05-010**: Not all customers have access to all products (e.g., Hotel A buys Boneless, Dealer B buys Live Chicken) [CLIENT-CONFIRMED] (Lines 4205-4215)
* **FCT-05-011**: Some regular customers have permanent processing instructions (e.g., Skinless, Medium Cut, 5kg Pack) [CLIENT-CONFIRMED] (Lines 4217-4234)
* **FCT-05-012**: The business relies on multiple warehouses/locations for continuity [CLIENT-CONFIRMED] (Lines 4345-4350)
* **FCT-05-013**: Orders have varying priorities (Emergency, VIP, Regular, Scheduled, Wholesale) [CLIENT-CONFIRMED] (Lines 4411-4423)
* **FCT-05-014**: Product cost calculation must include purchase, transport, handling, processing, packaging, and wastage [CLIENT-CONFIRMED] (Lines 4474-4494)
* **FCT-05-015**: The software's primary vision is to explain "WHAT HAPPENED, WHY, CURRENT STATUS, RISK, FORECAST, RECOMMENDATION, APPROVAL, ACTION, RESULT" [CLIENT-CONFIRMED] (Lines 4597-4621)
* **FCT-05-016**: Packing variations exist for the same product (500g, 1kg, 2kg, 5kg, 10kg, custom) [CLIENT-CONFIRMED] (Lines 4686-4699)
* **FCT-05-017**: Packing materials (covers, trays, boxes, labels) are tracked as inventory [CLIENT-CONFIRMED] (Lines 4701-4704)
* **FCT-05-018**: Return product classification includes Resalable, Rework, Waste, Destroy [CLIENT-CONFIRMED] (Lines 4894-4903)
* **FCT-05-019**: Farm operating cost depends heavily on electricity and water usage [CLIENT-CONFIRMED] (Lines 4941-4957)
