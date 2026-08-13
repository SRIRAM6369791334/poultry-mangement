# Workflow Discovery - Chunk 3

## 1. Processing and Dispatch Workflow (CLIENT-CONV-L2013-L2021)
- Status: [CLIENT-CONFIRMED]
- Steps:
  1. Processing
  2. Cutting
  3. Packing
  4. Labeling
  5. Dispatch

## 2. Processed Chicken Sales Costing Workflow (CLIENT-CONV-L2226-L2250)
- Status: [CLIENT-CONFIRMED]
- Steps:
  1. Identify Required Final Weight.
  2. Select Live Bird (greater weight).
  3. Process bird and record Processing Loss.
  4. Determine Final Saleable Weight.
  5. Bill customer based on Processed Rate and Saleable Weight.
  6. Calculate business cost based on Live Bird Cost + Processing Cost + Loss.

## 3. Product Return Disposition Workflow (CLIENT-CONV-L2504-L2511)
- Status: [CLIENT-CONFIRMED]
- Steps:
  1. Customer Return.
  2. Quality Check.
  3. Disposition decision: Resalable, Reprocess, Discount Sale, or Waste.

## 4. Delivery Capacity & Routing Workflow (CLIENT-CONV-L2626-L2658)
- Status: [CLIENT-CONFIRMED]
- Steps:
  1. Check daily orders against Vehicle Capacity.
  2. If exceeded, split delivery or assign second vehicle.
  3. Plan route grouping customers in the same area.
  4. Collect Delivery Proof upon delivery.

## 5. QC and Rework Workflow (CLIENT-CONV-L2907-L2926)
- Status: [CLIENT-CONFIRMED]
- Steps:
  1. Processed item goes to QC.
  2. If PASS, moved to Saleable.
  3. If FAIL, route to Rework.
  4. After Rework, Re-QC.
  5. If Re-QC PASS, moved to Saleable. If FAIL, moved to Waste.
