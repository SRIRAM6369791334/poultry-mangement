# Loss, Waste, and Damage Management

## 1. Processing Loss Categories [CONFIRMED]
To accurately calculate yields and costs, processing losses must NOT be generalized. The system must track the following distinct categories (CLIENT-080):
- Blood Loss
- Feather Loss
- Skin Loss
- Cleaning Loss
- Trimming Loss
- Cutting Loss
- Bone/Offal Loss
- Water/Drip Loss
- Damaged Portion
- Rejected Portion
- Other (Company must be able to add new custom loss reasons)

## 2. Waste vs. By-Product Classification [CONFIRMED]
- **Configuration**: The classification of an output as "Waste" (e.g., feathers, blood) or "Saleable By-Product" (e.g., liver, feet) must be dynamic and configurable by the company (CLIENT-120).
- **Impact**: Waste absorbs costs or requires disposal fees, while saleable by-products generate revenue and offset processing costs.

## 3. Wastage & Approvals [CONFIRMED]
- **Wastage Reasons**: Spoilage, Expired, Damaged, Processing Waste, Storage Waste, Transport Waste, Customer Return Waste, Contamination, Cleaning Waste, Other (CLIENT-094).
- **Approval Workflow**: High-value wastage requires a strict approval matrix (CLIENT-095):
  1. **Entry**: Worker enters the wastage details.
  2. **Verification**: Supervisor verifies the physical waste.
  3. **Approval**: Manager approves the entry in the system.
  4. **Adjustment**: System automatically adjusts inventory.
  5. **Audit**: The entire chain is logged for audit purposes.

## 4. Damage & Rejection Handling [CONFIRMED]
- **Bird Statuses**: Available, Damaged, Rejected, Disposed, Sold at Reduced Rate (CLIENT-089).
- **Death Sources**: Mortality must track the source: Farm, Transit, Processing Holding Area (CLIENT-088).
- **Rejected Birds**: Birds rejected during QC or processing must be categorized for: Return to supplier/farm, Waste disposal, Rework, or Alternative Sale (e.g., sold for pet food) (CLIENT-090).

## 5. Returns and Cancellations [CONFIRMED]
- **Returns (CLIENT-091, 125)**: Customer returns must be evaluated for quality. Based on QC, returns impact inventory as either 'Restocked' (if safe) or 'Waste/Spoilage' (if unsafe).
- **Order Cancellation (CLIENT-092, 093, 124)**: If an order is cancelled post-processing:
  - If customized (e.g., specific cuts), the meat goes to 'Rework' or 'General Stock'.
  - The processing loss is already incurred; the cost must be reallocated to the general inventory or marked as a business loss for the day.
