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
