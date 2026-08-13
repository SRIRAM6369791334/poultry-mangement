# Current As-Is Workflows

## 1. Farm Daily Workflow [CONFIRMED - CLIENT-007]
- **Trigger:** Start of day at the farm
- **Actor:** Farm Supervisor / Worker
- **Steps:** Opening count → Mortality recording → Culling → Live count update → Feed distribution → Water distribution → Environment check → Health check
- **Decision Points:** Identifying health issues or abnormal mortality rates
- **Current Tools:** Farm Register (paper), WhatsApp
- **Problems:** Delayed information transmission to HO (known by evening/next day), manual entry mistakes (5 typed as 50)

## 2. Batch Workflow [CONFIRMED - CLIENT-006]
- **Trigger:** Need for new flock
- **Actor:** HO / Farm Manager
- **Steps:** Supplier selection → Purchase order → Arrival → Quality Control (QC) → Farm assignment → Shed assignment → Batch creation → Chick Placement
- **Decision Points:** Supplier evaluation based on past batch performance
- **Current Tools:** Excel spreadsheets, WhatsApp
- **Problems:** Difficult to track historical performance per supplier easily [INFERRED]

## 3. Feed Workflow [CONFIRMED - CLIENT-009]
- **Trigger:** Feed requirement
- **Actor:** HO / Warehouse Manager / Farm Supervisor
- **Steps:** Supplier → PO → GRN → Warehouse storage → Farm Request → Approval → Issue from Warehouse → Farm Consumption
- **Decision Points:** Approval of farm request based on shed capacity and batch age
- **Current Tools:** Warehouse Register (paper), Purchase Bills
- **Problems:** Stock Mismatch (Warehouse register says 1000 kg, actual is 850 kg)

## 4. Harvest Workflow [CONFIRMED - CLIENT-014]
- **Trigger:** Batch reaches target weight/age
- **Actor:** Farm Supervisor / Logistics / HO
- **Steps:** Batch Ready → Sample Weight → Buyer confirmation → Route Planning → Catching → Loading → Vehicle assignment → Weighment → Dispatch → Invoice generation → Delivery → Payment collection
- **Decision Points:** Deciding optimal harvest date based on current market rates and bird weight
- **Current Tools:** Manual notes, Billing Software, WhatsApp
- **Problems:** Vehicle cost tracking is difficult (diesel/driver/maintenance per trip unknown)

## 5. Purchase Workflow [CONFIRMED - CLIENT-020]
- **Trigger:** Low stock or new requirement
- **Actor:** HO Purchasing
- **Steps:** Requirement identification → Request → Quotation gathering → Selection → PO generation → Approval → GRN → QC → Stock update → Invoice matching → Payment processing
- **Decision Points:** Vendor selection
- **Current Tools:** Excel, Paper Bills
- **Problems:** Disconnected from actual real-time inventory levels [INFERRED]

## 6. Sales Workflow [CONFIRMED - CLIENT-015]
- **Trigger:** Dealer/Customer request
- **Actor:** Sales Team / HO
- **Steps:** Dealer contact → Order placement → Approval → Dispatch from farm/warehouse → Invoice → Payment receipt → Outstanding balance update
- **Decision Points:** Approving dispatch based on dealer's outstanding balance
- **Current Tools:** Billing Software, Manual check
- **Problems:** Dealer balance requires manual checking to reconcile purchased/paid/outstanding amounts
