# Quality Management & Traceability

## 1. Quality Control (QC) Checkpoints [CONFIRMED]
- **Checkpoints**: Every processed order must pass through a designated QC station before dispatch.
- **Criteria**: The QC check must validate (CLIENT-149):
  - Accurate Weight
  - Correct Product Form
  - Correct Cut Type
  - Cleanliness (no remaining feathers/blood)
  - Proper Packaging

## 2. QC Pass/Fail Workflow [CONFIRMED]
- **Fail Workflow**: If a product fails QC, the system must strictly block dispatch (CLIENT-150).
- **Resolution**: Failed products must be routed to one of three paths:
  - **Rework**: Sent back to the cutting/cleaning station.
  - **Reject**: Downgraded to a lesser product (e.g., pet food).
  - **Waste**: Sent for disposal.
- **Rework Tracking**: The cost and time associated with rework must be tracked against the processing batch (CLIENT-151).

## 3. Storage and Shelf Life [CONFIRMED]
- **Cold Storage**: The system must manage cold storage inventory independently from live inventory (CLIENT-152).
- **Shelf Life Tracking**: Every processed batch must have a calculated expiry date based on product type and storage conditions (CLIENT-153).
- **Inventory Rotation**: The system must enforce FIFO (First In, First Out) or FEFO (First Expired, First Out) rules for picking processed inventory from cold storage (CLIENT-154).

## 4. End-to-End Batch Traceability [CONFIRMED]
- To ensure food safety and accountability, the system must provide bidirectional traceability (CLIENT-155).
- **Traceability Chain**: 
  Customer Order ← Invoice ← Processing Batch ← Live Bird Batch ← Farm ← Shed.
- In the event of a quality issue, management must be able to trace a piece of meat back to the specific shed and feed batch it originated from.
