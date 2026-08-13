# Mortality Management Requirements

## 1. Overview
Tracking bird mortality is critical for operations. The system must accurately record, categorize, and calculate mortality across all stages.

## 2. Daily Mortality Recording (CLIENT-008) [CONFIRMED]
Required fields for daily mortality entry:
- Quantity (Number of dead birds)
- Date and Time
- Reason (Disease / Heat / Injury / Unknown / Culling)
- Remarks
- Entered By (Worker)
- Verified By (Supervisor)

## 3. Bird Count Reconciliation [CONFIRMED]
The system must enforce the following formula daily for every batch:
`Opening Bird Count - Mortality - Culling = Closing Bird Count`

## 4. Mortality Calculation & Alerts [CONFIRMED]
- **Daily Mortality %:** (Daily Mortality / Opening Count) × 100
- **Cumulative Mortality %:** (Total Mortality / Initial Placed Birds) × 100
- **Alerts [PROPOSED]:** The system must generate alerts (SMS/WhatsApp/Dashboard) if daily mortality exceeds a configurable threshold (e.g., >0.5% in a day).

## 5. Mortality Sources (CLIENT-088) [CONFIRMED]
Mortality occurs in different phases and must be reported separately to identify operational bottlenecks:
1. **Farm Mortality:** Occurs during the rearing cycle in the shed.
2. **Transport Mortality:** Occurs during transit from farm to processing or customer.
3. **Receiving Mortality:** Occurs at the warehouse/processing center upon arrival.
4. **Processing Mortality:** Birds that die in holding before slaughter.
5. **Other:** Catching injuries, etc.

## 6. Damaged / Injured Birds (CLIENT-089) [CONFIRMED]
Status tracking for injured birds:
- **Available:** Healthy birds.
- **Damaged:** Injured but alive.
- **Rejected:** Cannot be sold for human consumption.
- **Disposed:** Destroyed and safely disposed of.
- **Sold at Reduced Rate:** Sold to specific markets (e.g., pet food) at a discount.

## 7. Culling & Rejected Birds Workflow (CLIENT-090) [CONFIRMED]
- Culling must be separated from natural mortality.
- Culls must be tracked with reasons (e.g., stunted growth, severe injury).
- Rejected birds must have a clear disposition workflow (Disposed vs Sold at Reduced Rate).
