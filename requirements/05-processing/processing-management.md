# Processing Management

## 1. Overview
The processing module handles the core transformation of live birds into processed meat, by-products, and waste. It tracks the operational workflow, staff assignment, and order processing queues.

## 2. Processing Stages [CONFIRMED]
The system must support and track the following sequential processing stages for every order/batch (CLIENT-106):
- **Bird Selection**: Allocating specific live birds to an order.
- **Live Weight**: Recording the pre-processing weight.
- **Slaughter**: Initial processing step.
- **Defeathering**: Removal of feathers (recorded as loss/waste).
- **Cleaning**: Internal cleaning and separation of offal.
- **Cutting**: Transforming the whole bird into specified product forms (CLIENT-102, CLIENT-103).
- **Packing**: Final packaging based on customer preference.
- **QC**: Quality control check before dispatch (CLIENT-149).
- **Dispatch**: Readying the product for delivery.

## 3. Product Forms & Customization [CONFIRMED]
- The system must capture product forms: Live, Whole Cleaned, Curry Cut, Skinless, Boneless, Breast, Leg, Wings, Custom Cut (CLIENT-102, CLIENT-118).
- The same structure applies across species: Chicken, Country Chicken, Duck, Quail, Turkey (CLIENT-103).
- Customer-specific cutting preferences must be captured on the order and presented to the cutting staff.

## 4. One-to-Many Transformation [CONFIRMED]
- **Transformation Logic**: A single bird input results in multiple outputs: Meat (Primary), By-products (Liver, Gizzard, Skin, Feet, etc.), and Waste/Loss (Blood, Feathers, offal) (CLIENT-081, CLIENT-082, CLIENT-105).
- Processing batches must link the original live bird inventory to the resulting multiple product inventories.

## 5. Processing Queue Management [CONFIRMED]
- The system must manage a priority queue capable of handling 20+ simultaneous orders (CLIENT-146).
- **Queue Statuses**: Pending → Assigned → Processing → QC → Packed → Ready → Dispatched → Completed (CLIENT-146).
- Supervisors must have a dashboard to prioritize and assign orders based on delivery schedules.

## 6. Staff Assignment & Tracking [CONFIRMED]
- **Assignment**: Each processing stage or entire order must be assignable to specific staff members (CLIENT-147).
- **Time Tracking**: The system must track the processing time (start to finish) for each order to measure efficiency (CLIENT-148).
- **Performance**: Metrics on staff processing speed and yield must be available for management review.

## 7. Processing Capacity [PROPOSED]
- The system should define maximum daily processing capacities across the 42 sheds/processing centers.
- Alerts should trigger if daily queued orders exceed safe processing limits, allowing proactive scheduling.
