# Supply Chain: Delivery & Distribution

## 1. Overview
Manages the logistics of getting finished products (live birds, processed meat, eggs) to dealers and customers using the fleet of 18 vehicles, ensuring optimal routing and accurate delivery tracking.

## 2. Delivery Scheduling [CONFIRMED] (CLIENT-131)
*   **Delivery Slots:** Standardized slots (Morning, Afternoon, Evening) and Custom time arrangements.
*   **Planning:** Orders are allocated to slots based on customer preference and geographical area.

## 3. Vehicle Capacity Planning [CONFIRMED] (CLIENT-132)
*   **Constraint Checking:** The system must validate total order weight/volume against assigned vehicle capacity.
*   **Scenario:**
    *   Vehicle Capacity = 500 kg.
    *   Assigned Orders = 650 kg.
    *   *System Action:* Flags capacity exceeded.
*   **Resolution Options:**
    *   Assign a second vehicle.
    *   Split the delivery (partial dispatch).
    *   Reschedule non-urgent orders to the next slot.

## 4. Route Planning [CONFIRMED] (CLIENT-133)
*   **Consolidation:** Group customers in the same geographical area onto the same route.
*   **Waypoint Mapping:** Warehouse → Route A → Shop 1 → Hotel 2 → Dealer 3 → Customer 4.
*   **Optimization [PROPOSED]:** Sequence stops to minimize distance and travel time.

## 5. Delivery Proof & Execution [CONFIRMED] (CLIENT-134)
Delivery personnel must capture proof of delivery (POD) via mobile interface:
*   Delivered quantity / weight.
*   Receiver's name and signature.
*   Photo proof (for closed shops or damaged goods).
*   GPS coordinates of the delivery location.
*   Exact timestamp of delivery.

## 6. Short/Over Delivery & Weight Variance [CONFIRMED] (CLIENT-135-136)
The system must handle discrepancies between invoiced weight and actual delivered weight (especially critical for meat/live birds).
*   **Short Delivery:**
    *   *Scenario:* Customer ordered 10 kg, delivered 9.8 kg = 0.2 kg short.
    *   *Requirement:* Log reason (e.g., normal moisture/weight loss, missing quantity, damage).
*   **Over Delivery:**
    *   *Scenario:* Customer ordered 10 kg, delivered 10.2 kg.
    *   *Requirement:* Track variance. System must decide (based on policy) whether to bill for accepted weight (10.2 kg) or strictly ordered weight, and adjust inventory accordingly.
