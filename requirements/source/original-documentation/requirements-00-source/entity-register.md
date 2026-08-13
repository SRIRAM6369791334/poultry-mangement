# Entity Register

This document defines the canonical business entities identified from client answers.

| Entity Name | Purpose | Key Attributes | Relationships | Lifecycle | Source IDs |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Company** | Root entity for multi-company setup | Name, TaxID, Currency | 1:M HeadOffice, 1:M Farm | Active/Inactive | CLIENT-036 |
| **HeadOffice** | Main administrative location | Address, Contact | 1:1 Company, 1:M Employee | Active | CLIENT-001 |
| **Warehouse** | Storage for feed, medicine, tools | Location, Capacity | 1:M Stock, 1:M Dispatch | Active/Maintenance | CLIENT-018 |
| **Farm** | Physical farm location | Name, Location, Capacity | 1:M Shed, 1:M Employee | Active/Inactive | CLIENT-006 |
| **Shed** | Individual housing unit in a farm | ShedNumber, Capacity, Area | M:1 Farm, 1:M Batch | Active/Cleaning/Rest | CLIENT-006 |
| **Batch** | Group of birds for a cycle | BatchID, StartDate, InitialCount | M:1 Shed, 1:M DailyLog | Placed -> Growing -> Depleted | CLIENT-006 |
| **Flock** | Group of layer birds | FlockID, AgeInWeeks | M:1 Shed | Placed -> Laying -> Culled | CLIENT-036 (Future) |
| **Bird** | Physical bird/species | Type, Breed, AvgWeight | M:1 Batch | Active -> Sold/Dead | CLIENT-075 |
| **Species** | Types like Broiler, Quail | SpeciesName, GrowthCurve | 1:M Bird, 1:M Product | Active | CLIENT-075 |
| **Product** | Saleable item | SKU, Name, BasePrice | 1:M ProductVariant | Active/Discontinued | CLIENT-076 |
| **ProductVariant** | Processing forms (e.g. Skinless) | VariantName, YieldFactor | M:1 Product | Active | CLIENT-076 |
| **Egg** | Egg product type | Size, FreshnessDays | 1:M EggGrade | Collected -> Sold | CLIENT-045 |
| **EggGrade** | Grading (A, B, Jumbo) | GradeName, WeightRange | M:1 Egg | Active | CLIENT-045 |
| **Supplier** | Entity supplying inputs | Name, Balance, CreditTerms | 1:M PurchaseOrder | Active/Blacklisted | CLIENT-020 |
| **Customer** | Direct buyer/shop | Name, Balance, Route | 1:M SalesOrder | Lead -> Active -> Churn | CLIENT-016 |
| **Dealer** | B2B buyer | Name, CreditLimit, Discount | 1:M SalesOrder | Active | CLIENT-015 |
| **Shop** | Retail outlet | Name, Address | M:1 Customer/Dealer | Active | CLIENT-016 |
| **Employee** | Staff member | Name, Role, Salary | M:1 Department, 1:M Attendance | Hired -> Active -> Resigned | CLIENT-022 |
| **Department** | Org unit | DeptName | 1:M Employee | Active | CLIENT-022 |
| **Vehicle** | Transport unit | RegNo, Capacity, Type | 1:M Trip | Active/Maintenance | CLIENT-025 |
| **Driver** | Vehicle operator | LicenseNo | 1:M Trip, M:1 Employee | Active | CLIENT-025 |
| **Trip** | Delivery/Transfer journey | StartTime, EndTime, Fuel | M:1 Vehicle, M:1 Route | Planned -> EnRoute -> Complete | CLIENT-025 |
| **Route** | Standard delivery path | RouteName, Distance | 1:M Customer, 1:M Trip | Active | CLIENT-128 |
| **Order** | Request for goods | OrderDate, TotalAmount | 1:M OrderItem, M:1 Customer | Draft -> Approved -> Fulfilled | CLIENT-128 |
| **OrderItem** | Line item in order | Qty, Rate, Total | M:1 Order, M:1 Product | Pending -> Delivered | CLIENT-128 |
| **ProcessingBatch** | Live birds to meat conversion | InputWeight, OutputWeight | 1:M ProcessingOutput | Planned -> Processing -> Done | CLIENT-075 |
| **ProcessingOutput** | Yield from processing | MeatType, Weight | M:1 ProcessingBatch | Created -> Sold | CLIENT-075 |
| **ByProduct** | Liver, gizzard, etc. | Type, Weight | M:1 ProcessingBatch | Created -> Sold | CLIENT-075 |
| **Loss** | Processing loss (blood/feathers) | LossType, Weight | M:1 ProcessingBatch | Recorded | CLIENT-075 |
| **Waste** | Non-saleable items | Type, Weight | M:1 ProcessingBatch | Recorded | CLIENT-075 |
| **Damage** | Damaged goods (e.g. eggs) | Qty, Reason | M:1 Dispatch | Recorded | CLIENT-075 |
| **Return** | Goods returned by customer | Qty, Reason | M:1 Order, M:1 Customer | Requested -> Approved -> Stocked | CLIENT-128 |
| **Invoice** | Bill for order | InvoiceNo, Tax, Total | 1:1 Order, 1:M Payment | Draft -> Unpaid -> Paid | CLIENT-026 |
| **Payment** | Received/Sent money | Amount, Mode, RefNo | M:1 Invoice | Pending -> Cleared | CLIENT-128 |
| **Receipt** | Proof of payment | ReceiptNo | 1:1 Payment | Issued | CLIENT-128 |
| **CreditNote** | Value owed to customer | Amount, Reason | M:1 Customer | Issued -> Settled | CLIENT-128 |
| **DebitNote** | Value owed by customer | Amount, Reason | M:1 Customer | Issued -> Settled | CLIENT-128 |
| **Complaint** | Customer issue | Desc, Resolution | M:1 Customer, M:1 Order | Open -> Resolved | CLIENT-128 |
| **FeedStock** | Feed inventory | Type, Qty | M:1 Warehouse, M:1 Batch | Received -> Consumed | CLIENT-006 |
| **MedicineStock** | Medicine inventory | BatchNo, Expiry, Qty | M:1 Warehouse | Received -> Consumed | CLIENT-006 |
| **VaccineStock** | Vaccine inventory | BatchNo, Expiry | M:1 Warehouse | Received -> Consumed | CLIENT-006 |
| **Equipment** | Farm tools/machinery | Name, Status | M:1 Farm | Active -> Broken -> Fixed | CLIENT-020 |
| **PurchaseRequest** | Internal request for goods | Item, Qty, RequiredDate | M:1 Department, 1:1 PO | Draft -> Approved -> Ordered | CLIENT-020 |
| **PurchaseOrder** | Order to supplier | PONo, Amount | M:1 Supplier | Draft -> Sent -> Fulfilled | CLIENT-020 |
| **GoodsReceipt** | GRN upon delivery | GRNNo, ReceivedQty | M:1 PO, M:1 Warehouse | Draft -> Verified -> Stocked | CLIENT-018 |
| **SalesOrder** | Confirmed customer order | SONo | M:1 Customer | Draft -> Approved -> Fulfilled | CLIENT-015 |
| **Dispatch** | Outbound shipment | DispatchNo, Vehicle | 1:M Order | Scheduled -> Dispatched | CLIENT-128 |
| **Delivery** | Successful drop-off | DeliveryTime | 1:1 Dispatch | Pending -> Delivered | CLIENT-128 |
| **DeliveryProof** | Signature/Photo | ImageUrl | 1:1 Delivery | Captured | CLIENT-128 |
| **Attendance** | Daily employee log | Date, InTime, OutTime | M:1 Employee | Present/Absent/Leave | CLIENT-022 |
| **Leave** | Approved time off | StartDate, EndDate | M:1 Employee | Requested -> Approved | CLIENT-022 |
| **Payroll** | Salary record | Month, NetPay | M:1 Employee | Generated -> Paid | CLIENT-022 |
| **Advance** | Advance salary given | Amount, Deducted | M:1 Employee | Given -> Recovered | CLIENT-022 |
| **Deduction** | Salary deduction | Amount, Reason | M:1 Payroll | Applied | CLIENT-022 |
| **Expense** | Operational cost | Category, Amount | M:1 Farm/Vehicle | Logged -> Approved | CLIENT-026 |
| **ApprovalRule** | Hierarchy rule | Role, MaxAmount | 1:M DocumentType | Active | CLIENT-030 |
| **AuditLog** | System action record | User, Action, Timestamp | M:1 AllEntities | Logged | CLIENT-032 |
| **Forecast** | Predicted demand/supply | Metric, Value, Date | M:1 Product/Customer | Generated -> Actualized | CLIENT-170 |
| **DemandPlan** | Actionable forecast | TargetQty, Period | M:1 Product | Draft -> Active | CLIENT-170 |
| **PriceList** | Standard pricing | ValidFrom, ValidTo | M:1 Product | Draft -> Active -> Expired | CLIENT-128 |
| **RateContract** | Customer specific price | CustomerId, FixedRate | M:1 Customer | Active -> Expired | CLIENT-128 |
| **Discount** | Price reduction rule | Percentage, Conditions | M:1 Order | Active | CLIENT-128 |
| **Notification** | Alert message | Type, Content | M:1 User | Unread -> Read | CLIENT-028 |
| **Report** | Analytics output | Type, Parameters | - | Generated | CLIENT-028 |
