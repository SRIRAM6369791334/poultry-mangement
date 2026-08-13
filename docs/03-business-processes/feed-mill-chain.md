# Feed Mill Business Chain

## 1. Overview
This document outlines the end-to-end business process for an integrated Feed Mill. It maps the flow of materials, data, and financial transactions from raw material procurement to finished feed dispatch.

## 2. End-to-End Workflow

### Step 1: Raw Material Procurement & Indenting
- **Trigger**: Reorder levels hit in raw material inventory, or MRP run based on forecasted feed demand.
- **Process**: PO generated and sent to suppliers.
- **Roles**: Purchase Manager.
- **System Action**: Creates Purchase Order (PO).

### Step 2: Gate Entry & Weighbridge (Inward)
- **Trigger**: Truck arrives at mill gate.
- **Process**: Truck is weighed gross. A gate pass is generated.
- **Roles**: Gate Security, Weighbridge Operator.
- **System Action**: Captures Gross Weight, creates Gate Entry record.

### Step 3: Quality Control (Inward)
- **Trigger**: Truck is waiting in yard.
- **Process**: Lab technician takes samples. Tests for moisture, aflatoxin, etc.
- **Roles**: QC Technician.
- **System Action**: Records QC results. Validates against BIS (Bureau of Indian Standards) or internal thresholds. Rejects or Approves.

### Step 4: Unloading & Tare Weight
- **Trigger**: QC Approved.
- **Process**: Truck unloads at designated silo/godown. Truck returns to weighbridge for tare weight.
- **Roles**: Silo Operator, Weighbridge Operator.
- **System Action**: Calculates Net Weight. Generates Goods Receipt Note (GRN) and updates RM Inventory.

### Step 5: Formula Selection & Production Indent
- **Trigger**: Farm demand for specific feed (e.g., Broiler Finisher).
- **Process**: Select active Least-Cost Formula. Generate production order for X tons.
- **Roles**: Nutritionist, Production Manager.
- **System Action**: Creates Production Order, allocates raw materials.

### Step 6: Production & Batching
- **Trigger**: Production order scheduled.
- **Process**: Automated or manual batching -> Grinding -> Mixing -> Pelleting -> Cooling.
- **Roles**: Plant Operator.
- **System Action**: Consumes RM inventory (backflushing). Records machine hours. Generates WIP status.

### Step 7: Quality Control (Finished Goods)
- **Trigger**: Batch completion.
- **Process**: Sample taken for PDI, moisture, protein tests.
- **Roles**: QC Technician.
- **System Action**: Updates batch status from 'QC Hold' to 'Approved'.

### Step 8: Bagging & Storage
- **Trigger**: QC Approved (or parallel to QC).
- **Process**: Feed is bagged (e.g., 50kg) with batch labels, or loaded to FG bulk silos.
- **Roles**: Bagger Operator, Store Manager.
- **System Action**: Updates Finished Goods (FG) Inventory. Generates Batch ID.

### Step 9: Dispatch & Weighbridge (Outward)
- **Trigger**: Farm Indent or Dealer Sales Order.
- **Process**: Empty truck weighed (Tare) -> Loaded with feed (FIFO enforced) -> Weighed (Gross).
- **Roles**: Dispatch Manager, Weighbridge Operator.
- **System Action**: Validates order. Generates Delivery Challan (DC) and e-Way Bill. Deducts FG Inventory.

### Step 10: Billing & Accounting
- **Trigger**: DC generated.
- **Process**: 
  - For Internal Farms: Cost center transfer (no invoice, just stock transfer valuation).
  - For External Dealers: Commercial Invoice generated.
- **Roles**: Finance/Accounts.
- **System Action**: Posts General Ledger entries (Cost of Goods Sold, Accounts Receivable, or Inter-branch Transfer).

## 3. Automation Scenarios
- **Manual Operations**: Batching is recorded manually via tally sheets; stock is updated end-of-day.
- **Automated SCADA Integration**: ERP directly reads batching scales, PLC, and weighbridge via APIs/IoT, ensuring real-time inventory updates and zero manual data entry errors.
