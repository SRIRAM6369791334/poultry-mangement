# Consolidated problem-catalog.md



## From Chunk 1


# Problem Catalog

| ID | Description | Source Lines | Status |
|---|---|---|---|
| PROB-001 | Data is scattered across multiple locations (Excel, WhatsApp, manual registers) preventing real-time views. | CLIENT-CONV-L083-L100 | [CLIENT-CONFIRMED] |
| PROB-002 | Duplicate data entry (supervisor notebook -> office Excel -> accountant Excel). | CLIENT-CONV-L103-L111 | [CLIENT-CONFIRMED] |
| PROB-003 | Data entry mistakes (e.g., typing 50 mortality instead of 5). | CLIENT-CONV-L113-L115 | [CLIENT-CONFIRMED] |
| PROB-004 | Delayed information (morning mortality known only in evening/next day). | CLIENT-CONV-L117-L119 | [CLIENT-CONFIRMED] |
| PROB-005 | Stock mismatch between register and actual physical stock. | CLIENT-CONV-L121-L125 | [CLIENT-CONFIRMED] |
| PROB-006 | Actual cost and profitability per batch are unknown (cannot consolidate feed, chick, med, labour, transport overheads). | CLIENT-CONV-L127-L135 | [CLIENT-CONFIRMED] |
| PROB-007 | Employee attendance is manual; salary calculation is separate. | CLIENT-CONV-L137-L141 | [CLIENT-CONFIRMED] |
| PROB-008 | Dealer outstanding balances are manually checked. | CLIENT-CONV-L143-L151 | [CLIENT-CONFIRMED] |
| PROB-009 | Trip-wise vehicle cost (diesel, driver, maintenance) is not tracked per farm trip. | CLIENT-CONV-L153-L163 | [CLIENT-CONFIRMED] |
| PROB-010 | Significant manual effort to combine Excel files for owner reports. | CLIENT-CONV-L165-L167 | [CLIENT-CONFIRMED] |
| PROB-011 | Medicine stock and usage are not connected (usage doesn't deduct stock). | CLIENT-CONV-L355-L364 | [CLIENT-CONFIRMED] |
| PROB-012 | Poor internet connectivity at farms necessitating offline app capabilities. | CLIENT-CONV-L831-L846 | [CLIENT-CONFIRMED] |

## From Chunk 2


# Problem Catalog - Chunk 2

| Problem ID | Description | Impact | Proposed Solution / Requirement | Status |
|---|---|---|---|---|
| PROB-001 | Exact customer weight requests (e.g., exactly 1 kg) do not align with live bird weight, creating weight variance. | Billing disputes, loss of stock | Track requested vs actual weight and document overweight/underweight adjustments. | [CLIENT-CONFIRMED] |
| PROB-002 | Processing loss (blood, feathers, etc.) is often hidden or mixed. | Incorrect profitability and reconciliation | Detailed categorization of loss types and exact weight reconciliation tracking. | [CLIENT-CONFIRMED] |
| PROB-003 | Hard-coded units and bird types. | Limits scalability for new products | Fully configurable product master for species and dynamic unit conversions. | [CLIENT-CONFIRMED] |
| PROB-004 | Profit calculation inaccuracies due to mixing own farm vs purchased egg costs. | Inaccurate financial reporting | Differentiate source of eggs (Own vs Purchase) for COGS calculations. | [CLIENT-CONFIRMED] |
| PROB-005 | Post-processing order cancellations cause waste or financial loss. | Operational loss | Need a business rule and workflow to handle processed but cancelled birds. | [CLIENT-CONFIRMED] |
| PROB-006 | Transport weight loss causes dispatch-delivery weight mismatches. | Supplier/Logistics disputes | Capture and reconcile Dispatch Weight vs Transport/Delivery Weight. | [CLIENT-CONFIRMED] |

## From Chunk 3


# Problem Catalog - Chunk 3

| Problem ID | Source Lines | Description | Status |
|---|---|---|---|
| PROB-001 | CLIENT-CONV-L2254-L2292 | **Extra Weight Issue**: When matching exact cleaned chicken weight orders, there are mismatched bird sizes resulting in excess or short final yields. Need a way to record acceptance, re-allocation, or wastage of excess. | [CLIENT-CONFIRMED] |
| PROB-002 | CLIENT-CONV-L2474-L2478 | **Processing Mismatch**: Discrepancies between input live weight and the sum of output weights (saleable + by-product + waste + loss). | [CLIENT-CONFIRMED] |
| PROB-003 | CLIENT-CONV-L2675-L2694 | **Short Delivery**: Drivers may deliver less than the ordered weight, causing inventory and billing discrepancies. | [CLIENT-CONFIRMED] |
| PROB-004 | CLIENT-CONV-L2696-L2708 | **Over Delivery**: Drivers may deliver more than the requested weight. System needs to handle variance and billing acceptance. | [CLIENT-CONFIRMED] |
| PROB-005 | CLIENT-CONV-L2967-L2985 | **Traceability Challenge**: When a customer complains about quality, it is difficult to trace the chicken back to its original bird batch and farm. | [CLIENT-CONFIRMED] |

## From Chunk 4


# Problem Catalog

| Problem ID | Description | Source Lines | Status |
|---|---|---|---|
| PROB-001 | Customer complaints need multiple resolution avenues tracking. | 3008-3018 | [CLIENT-CONFIRMED] |
| PROB-002 | Refund process is currently disconnected from finance updates. | 3030-3043 | [CLIENT-CONFIRMED] |
| PROB-003 | Supplier sending full invoice while QC rejects some qty leads to payment discrepancies. | 3058-3071 | [CLIENT-CONFIRMED] |
| PROB-004 | System and physical stock often mismatch, requiring documented adjustments. | 3085-3104 | [CLIENT-CONFIRMED] |
| PROB-005 | Difficulty differentiating between normal shrinkage and abnormal loss/theft. | 3105-3128 | [CLIENT-CONFIRMED] |
| PROB-006 | Operations halt when managers are on leave due to lack of delegation mechanism. | 3146-3151 | [CLIENT-CONFIRMED] |
| PROB-007 | Lack of visibility into business bottlenecks (capacity shortages). | 3197-3224 | [CLIENT-CONFIRMED] |
| PROB-008 | Unable to accurately evaluate individual Farm, Dealer, or Customer profitability. | 3238-3280 | [CLIENT-CONFIRMED] |
| PROB-009 | Cannot plan for future demand using only current year data. | 3349-3362 | [CLIENT-CONFIRMED] |
| PROB-010 | Unaware of slow-moving or non-moving stock leading to dead stock and working capital block. | 3502-3562 | [CLIENT-CONFIRMED] |
| PROB-011 | Overstocking due to continuing purchases for products with declining sales. | 3563-3575 | [CLIENT-CONFIRMED] |
| PROB-012 | Stock-outs occurring on fast-moving products. | 3591-3601 | [CLIENT-CONFIRMED] |
| PROB-013 | Data is available but not actionable, requiring manual calculation for insights. | 3909-3914 | [CLIENT-CONFIRMED] |
| PROB-014 | Problems are identified only after they happen instead of predictively. | 3935-3952 | [CLIENT-CONFIRMED] |

## From Chunk 5


# Problem Catalog - Chunk 5

* **PROB-05-001**: Accounts may not instantly reflect payments claimed by customers (Payment Mismatch). [CLIENT-CONFIRMED] (Lines 4085-4089)
* **PROB-05-002**: Discrepancies occur between physical cash and system cash. [CLIENT-CONFIRMED] (Lines 4115-4123)
* **PROB-05-003**: Repeated quality issues from specific suppliers go unnoticed without quality scores. [CLIENT-CONFIRMED] (Lines 4148-4158)
* **PROB-05-004**: Employees might mistakenly sell below product cost (Negative Margin Sale). [CLIENT-CONFIRMED] (Lines 4178-4187)
* **PROB-05-005**: Customers suddenly stop ordering without notice (Inactive detection needed). [CLIENT-CONFIRMED] (Lines 4251-4260)
* **PROB-05-006**: Relying on a single supplier causes failure during delivery delays. [CLIENT-CONFIRMED] (Lines 4323-4344)
* **PROB-05-007**: Emergency feed shortages occur and require rapid transfer workflows. [CLIENT-CONFIRMED] (Lines 4351-4356)
* **PROB-05-008**: Accepting large orders without verifying full supply chain feasibility causes delivery failures. [CLIENT-CONFIRMED] (Lines 4361-4390)
* **PROB-05-009**: Reserved stock remains indefinitely locked if payment/confirmation is not received. [CLIENT-CONFIRMED] (Lines 4450-4455)
* **PROB-05-010**: Basic product cost calculation ignores hidden costs like handling, packaging, wastage, and transport. [CLIENT-CONFIRMED] (Lines 4474-4494)
* **PROB-05-011**: Abnormal mortality or feed consumption is often detected too late. [CLIENT-CONFIRMED] (Lines 4535-4549)
* **PROB-05-012**: Fraudulent repeated stock adjustments and unusual discounts go undetected. [FUTURE] (Lines 4554-4566)
* **PROB-05-013**: Customers change orders (quantity/type) after processing has started, causing confusion. [CLIENT-CONFIRMED] (Lines 4635-4654)
* **PROB-05-014**: Product recalls or quality issues are hard to trace back to specific processing/farm batches. [CLIENT-CONFIRMED] (Lines 4713-4731)
* **PROB-05-015**: Same complaints recurring for products/customers are not tracked systematically. [CLIENT-CONFIRMED] (Lines 4791-4794)
* **PROB-05-016**: Sales volume doesn't equal profit due to high delivery/discount/return costs, misrepresenting customer/dealer/route profitability. [CLIENT-CONFIRMED] (Lines 4837-4864)
* **PROB-05-017**: Returned deliveries are mixed directly back into stock without QC checks. [CLIENT-CONFIRMED] (Lines 4888-4893)
* **PROB-05-018**: Vehicle breakdowns during delivery disrupt order schedules. [CLIENT-CONFIRMED] (Lines 4905-4910)
