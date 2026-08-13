# Weight Management & Yield Requirements

## 1. Overview
Tracking weight accurately from the farm to the final customer is essential for profitability analysis. Poultry involves significant weight changes through growth, transport, and processing.

## 2. Weight Types (CLIENT-011, 076-088) [CONFIRMED]
The system must define and track the following weight milestones:
- **Live Weight:** Current weight of living birds in the farm.
- **Farm Weight:** Total weight recorded at the farm just before loading onto the truck.
- **Transport Weight:** Weight of the loaded truck (Tare vs Gross).
- **Delivery / Dispatch Weight:** Weight recorded when arriving at the warehouse or customer.
- **Processing Input Weight:** Weight of live birds entering the slaughter line.
- **Final Saleable Weight:** Weight of the processed meat ready for sale.
- **Requested Weight:** Weight requested by the customer (B2B/Dealer).
- **Accepted Weight:** Actual weight accepted by the customer.
- **Returned Weight:** Meat returned by customer.
- **Wasted Weight:** Unusable meat or birds.
- **By-product Weight:** Weight of offal, feathers, heads, feet, etc.

## 3. Weekly Weighing Workflow (CLIENT-011) [CONFIRMED]
- **Process:** Batch → Select Sample Birds → Record Weight → Calculate Average Weight.
- **Growth Comparison:** System must compare the Actual Average Weight against the Target/Standard weight for that bird age/breed.
- **Alerts:** Generate alerts for abnormal growth (underweight or overweight).
- **Uniformity [PROPOSED]:** Calculate flock uniformity percentage based on sample variance.

## 4. Processing Yield (CLIENT-100, 101) [CONFIRMED]
- **Yield Calculation:** `Yield % = (Final Saleable Weight / Processing Input Live Weight) × 100`
- **Alerts (CLIENT-101):** The system must trigger warnings if the actual yield deviates significantly from the expected/standard yield for that species.

## 5. Weight Loss During Transport (CLIENT-087) [CONFIRMED]
- Track "Shrinkage" or transport weight loss.
- Calculation: `Farm Dispatch Weight - Delivery Receiving Weight`
- Must be reported as a percentage to monitor transport efficiency and theft.

## 6. Weight Reconciliation (CLIENT-097, 123) [CONFIRMED]
Strict mass balance must be maintained during processing to prevent theft or data entry errors.
- **Reconciliation Formula:** `Input Live Weight = Final Saleable Weight + By-products Weight + Wasted Weight + Loss (Blood/Moisture)`
- The system must mandate reconciliation before closing a daily processing batch.
