# Consolidated calculation-discovery.md



## From Chunk 1


# Calculation Discovery

- **Closing Live Birds**: `Opening Birds - Mortality - Culling` (CLIENT-CONV-L250-L256) [CLIENT-CONFIRMED]
- **Mortality Percentage**: `(Total Mortality / Total Placed Birds) * 100` (Inferred from L258) [INFERRED]
- **Feed Consumption (Batch)**: `Opening Stock + Feed Purchased (Issued) - Closing Stock` (CLIENT-CONV-L297-L303) [CLIENT-CONFIRMED]
- **Net Weight (Harvest)**: `Gross weight - Tare weight` (CLIENT-CONV-L397-L399) [CLIENT-CONFIRMED]
- **Net Salary**: `Attendance + Basic Salary + Overtime + Allowance - Advance - Deduction` (CLIENT-CONV-L602-L614) [CLIENT-CONFIRMED]
- **Actual Batch Profit**: `Revenue - (Chick Cost + Feed Cost + Medicine Cost + Vaccine Cost + Labour Cost + Electricity + Water + Transport + Farm Expense + Overhead)` (CLIENT-CONV-L664-L681) [CLIENT-CONFIRMED]

## From Chunk 2


# Calculation Discovery - Chunk 2

* **Closing Egg Stock**: Opening Stock + Purchase + Production/Collection - Sales - Breakage - Damage ± Adjustment = Closing Stock [CLIENT-CONV-L1173-L1180]
* **Customer Outstanding**: Opening Balance + Sales - Payments - Credit Notes ± Adjustments = Outstanding [CLIENT-CONV-L1261-L1266]
* **Egg Business Profit**: Egg Selling Revenue - Egg Purchase/Production Cost - Transport - Packing - Breakage - Other Expenses = Profit [CLIENT-CONV-L1273-L1285]
* **Saleable Weight**: Input Live Weight - Processing Loss = Saleable Weight [CLIENT-CONV-L1507-L1511]
* **Expected Closing Stock**: Opening Stock + Purchase + Production + Returns + Transfers - Sales - Processing - Death - Damage - Wastage - Transfers = Expected Closing Stock [CLIENT-CONV-L1841-L1859]
* **Weight Reconciliation**: Input = Saleable Output + By-products + Waste/Loss [CLIENT-CONV-L1882-L1889]
* **Yield %**: Saleable Weight / Input Live Weight × 100 [CLIENT-CONV-L1945-L1946]

## From Chunk 3


# Calculation Discovery - Chunk 3

- **Processing Yield %** (CLIENT-CONV-L2302-L2304): `(Final Meat / Live Bird Weight) × 100`. [CLIENT-CONFIRMED]
- **Live Sale Profit** (CLIENT-CONV-L2427-L2436): `Live Sales Revenue - Live Bird Cost - Transport - Other Cost`. [CLIENT-CONFIRMED]
- **Processed Sale Profit** (CLIENT-CONV-L2437-L2450): `Processed Sales Revenue - Live Bird Cost - Processing Cost - Packaging - Processing Loss Cost - Transport`. [CLIENT-CONFIRMED]
- **Processing Reconciliation** (CLIENT-CONV-L2462-L2470): `Input Live Weight = Saleable Meat + By-products + Waste + Processing Loss`. [CLIENT-CONFIRMED]
- **Cost per Saleable KG** (CLIENT-CONV-L2410-L2421): `(Live Bird Cost + Processing Costs) / Final Saleable Weight`. [CLIENT-CONFIRMED]

## From Chunk 4


# Calculation Discovery

| Calculation | Formula/Logic | Source Lines | Status |
|---|---|---|---|
| Credit Note Adjustment | Customer Outstanding = Original Outstanding - Credit Note Amount | 3044-3053 | [CLIENT-CONFIRMED] |
| Farm Profitability | Farm Revenue - Farm Direct Cost - Allocated Cost | 3238-3252 | [CLIENT-CONFIRMED] |
| Dealer Contribution | Dealer Revenue - Product Cost - Discount - Transport - Credit Cost | 3253-3272 | [FUTURE] |
| Reorder Quantity | Current Stock + Expected Demand + Lead Time + Safety Stock | 3602-3617 | [CLIENT-CONFIRMED] |
| Forecast Variance | Forecast - Actual | 3798-3823 | [CLIENT-CONFIRMED] |

## From Chunk 5


# Calculation Discovery - Chunk 5

* **Cash Shortage**: Expected Cash - Actual Cash = Difference.
* **Sales Price Variance**: ((Entered Rate - Normal Rate) / Normal Rate) * 100 = Variance %.
* **Order Feasibility Calculation**: Sum of Available Stock + Projected Production + Processing Capacity + Delivery Capacity vs Customer Request & Credit Limit.
* **Partial Fulfillment**: Ordered Quantity - Delivered Quantity = Pending Quantity.
* **Actual Product Cost**: Purchase + Transport + Handling + Processing + Packaging + Wastage = Actual Cost.
* **Batch Cost Allocation**: Total processing batch cost must be proportionally distributed across output items (meat, liver, etc.).
* **Net Production Cost**: Actual Cost - By-product Revenue = Net Production Cost.
* **Customer Profitability**: Sales - (Discount + Product Cost + Processing Cost + Delivery Cost + Returns + Other Allocated Cost) = Customer Profit.
* **Customer Payment Behavior**: Average days taken by a customer to complete payment from invoice date.
* **Driver Settlement Balance**: Cash Collected - Expenses - Fuel = Final Balance to Settle.
