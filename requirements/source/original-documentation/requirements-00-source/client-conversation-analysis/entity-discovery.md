# Consolidated entity-discovery.md



## From Chunk 1


# Entity Discovery

- **Company / Head Office**: The main organization umbrella.
- **Warehouse**: Stores feed, medicine, vaccines, equipment, consumables. Attributes: stock levels.
- **Farm**: Groups of sheds. Attributes: Farm Manager, location.
- **Shed / Flock**: Physical location of a batch within a farm.
- **Batch**: A specific group of birds. Attributes: Bird count, breed, supplier, rate, purchase cost, arrival date, farm, shed, batch number.
- **Supplier**: Feed, chick, medicine, equipment suppliers. Attributes: purchase history, rate history, payment history, outstanding, quality history, delivery performance.
- **Dealer**: Buys birds/products. Attributes: Contact, Address, Shop(s), Credit limit, Payment terms, Rate, Outstanding, Payment history, Sales history, Returns.
- **Customer (Direct)**: Buys directly. Attributes: Profile, orders, sales, payment, outstanding, purchase history, returns.
- **Employee**: Office, Farm, Warehouse, Driver, Sales, Accounts, Management. Attributes: profile, department, designation, farm assignment, joining date, salary, attendance, leave, advance, deduction, overtime, payroll.
- **Vehicle**: Lorry, Mini truck, Pickup, Bike. Attributes: Vehicle details, Driver, Trip, Farm/Dealer route, distance, diesel, maintenance, insurance, service, expenses.
- **Item/Product**: Feed, Medicine, Vaccine, Equipment, Consumables, Packaging, Egg.
- **Health Record**: Disease, symptoms, diagnosis, medicine, dosage, treatment period, vet, vaccination, vaccine batch, date, due date, withdrawal period.
- **Harvest/Sales Invoice**: Gross weight, tare weight, net weight, bird count, rate, amount, transport, buyer, vehicle, driver.

## From Chunk 2


# Entity Discovery - Chunk 2

* **EggGrade:** Small, Medium, Large, Extra Large.
* **EggQualityStatus:** Good, Broken, Damaged, Rejected.
* **Location/Warehouse:** Farm, Collection Center, Egg Warehouse, Dealer, Shop.
* **CustomerType:** Wholesale, Retail, Dealer, Hotel, Bakery.
* **EggUnit:** Piece, Tray, Carton, Crate, Box, Kg (Configurable).
* **PaymentMethod:** Cash, UPI, Bank, Credit, Advance.
* **BirdSpecies:** Chicken, Duck, Quail, Turkey, Country Chicken.
* **BirdSalesUnit:** Bird, Piece, Kg, Tray, Box.
* **LossCategory:** Blood Loss, Feather Loss, Skin Loss, Cleaning Loss, Bone Loss, Drip Loss.
* **ByProduct:** Liver, Gizzard, Skin, Feet, Head.
* **MortalitySource:** Farm, Transport, Receiving, Processing.
* **BirdRejectionDisposition:** Return, Waste, Rework, Alternative Sale.
* **ProcessingSpecification:** Whole, Curry Cut, Skinless, Boneless, Leg Pieces.

## From Chunk 3


# Entity Discovery - Chunk 3

- **Order**: Contains Custom Requirements, Selling Type, Requested Weight, Accepted Weight, Rejected Weight. [CLIENT-CONFIRMED] (CLIENT-CONV-L2005, L2280)
- **Product Variant**: Sub-types of main products (e.g., Live, Whole Cleaned, Curry Cut, Skinless). [CLIENT-CONFIRMED] (CLIENT-CONV-L2336-L2345)
- **Processing Batch**: Entity tracking 1 bird yielding multiple parts (Meat, Breast, Liver, Skin, Waste). [CLIENT-CONFIRMED] (CLIENT-CONV-L2365-L2375)
- **Recurring Order Template**: Template storing daily requested quantities for regular customers. [CLIENT-CONFIRMED] (CLIENT-CONV-L2586-L2593)
- **Delivery Slot**: Time allocations (Morning, Afternoon, Custom) associated with routes. [CLIENT-CONFIRMED] (CLIENT-CONV-L2617-L2620)
- **Route**: Group of customers mapped to a warehouse dispatch. [CLIENT-CONFIRMED] (CLIENT-CONV-L2652-L2658)
- **Rate Contract**: Entity linking Customer, Product, Selling Mode, Rate, Effective Dates, and Limits. [CLIENT-CONFIRMED] (CLIENT-CONV-L2740-L2748)
- **Cold Storage Entry**: Tracking storage location, batch, product, weight, entry/exit times, and temperature. [CLIENT-CONFIRMED] (CLIENT-CONV-L2936-L2943)

## From Chunk 4


# Entity Discovery

| Entity | Description | Relationships | Source Lines | Status |
|---|---|---|---|---|
| Credit Note | Document for adjusting customer balance for partial refunds. | Belongs to Invoice/Customer | 3044-3053 | [CLIENT-CONFIRMED] |
| Debit Note | Document for supplier-related discrepancy adjustments. | Belongs to Purchase/Supplier | 3054-3057 | [CLIENT-CONFIRMED] |
| Cost Center | Groupings like Farm, Warehouse, Processing, Sales to track expenses. | Has many Expenses | 3225-3237 | [CLIENT-CONFIRMED] |
| Business Calendar | Calendar to track demand variables (Festivals, Weekends). | Related to Forecasting | 3152-3165 | [CLIENT-CONFIRMED] |
| Product Lifecycle | Categorization of a product's market state (e.g. Fast Moving, Non Moving). | Belongs to Product | 3824-3843 | [CLIENT-CONFIRMED] |
| Batch Transfer | Record of moving birds between sheds/farms. | Has Source Location, Destination Location, Qty, Reason | 3982-3995 | [CLIENT-CONFIRMED] |

## From Chunk 5


# Entity Discovery - Chunk 5

* **Stock Ownership**: Types include Company owned, Customer owned, Supplier owned, Consignment.
* **Customer Wallet / Ledger**: Tracks advance payments, credit, and outstanding balances.
* **Dealer Deposit**: Tracks security deposit, advance, credit, outstanding for dealers.
* **Petty Cash**: Entity for managing daily minor expenses at farms/warehouses, with opening cash, expense, receipt, and balance.
* **Supplier Quality Score**: Score combining price, quality, delivery time, rejection rate, and reliability metrics.
* **Customer Processing Instruction**: Permanent instructions linked to a customer (e.g., cut type, pack size).
* **Reservation Expiry**: Time-bound configuration to release stock reserved for unconfirmed/unpaid orders.
* **Order Status**: Ordered, Confirmed, Allocated, Processing, QC, Packed, Dispatched, Delivered.
* **Complaint**: Categorized by severity (Low, Medium, High, Critical) and type (Quality, Weight, Delivery, Billing); includes Root Cause, Corrective Action, Preventive Action.
* **Delivery Return Quality**: Status of returned items (Resalable, Rework, Waste, Destroy).
* **Driver Settlement**: Record of cash collected, expenses, fuel, and final balance after a delivery trip.
