# Contract Farming Business Chain

## 1. Overview
Contract farming (Integration) is the dominant model in the broiler industry. It is a partnership between an Integrator (SaaS client) and an independent Farmer (Grower). The system must manage the relationship, inventory tracking, performance metrics, and financial settlements across both entities.

## 2. Roles & Responsibilities

### The Integrator Provides:
*   Day-Old Chicks (DOC)
*   Feed (Pre-starter, Starter, Finisher)
*   Medicines and Vaccines
*   Technical guidance and veterinary support (Line Supervisors)
*   Transportation (delivery of inputs, lifting of ready birds)

### The Farmer (Grower) Provides:
*   Infrastructure (Shed, equipment, brooders)
*   Labor (daily care, feeding, cleaning)
*   Utilities (Electricity, Water)
*   Litter material (rice husk, wood shavings)
*   Management and biosecurity execution

## 3. The Contract & Growing Charges
The core of the business is the contract. The farmer does not own the birds; they provide a service (rearing) and are paid **Growing Charges (GC)**.

### GC Calculation Methodology
Settlement is performance-based, heavily relying on the **Feed Conversion Ratio (FCR)**, Mortality, and Average Body Weight.

*   **Standard FCR:** The target efficiency (e.g., 1.5 kg feed per 1 kg live weight).
*   **Base Rate:** A fixed amount per kg of live bird lifted (e.g., $0.10 / kg).
*   **Incentives (Bonus):** If the farmer achieves an FCR lower than standard (better efficiency), they receive a bonus per point of FCR.
*   **Penalties:** If FCR is higher than standard, or mortality exceeds the allowed threshold (e.g., > 5%), deductions are applied.

## 4. Workflows

### Integrator-Side Workflow (The Enterprise ERP)
1.  **Farmer Onboarding:** Register farmer, survey shed capacity, sign legal contract.
2.  **Placement Planning:** Schedule chick placement based on shed availability.
3.  **Input Dispatch:** Issue DOC, Feed, and Meds to the farmer's shed via internal delivery challans.
4.  **Monitoring:** Line supervisors visit farms weekly, logging body weight, mortality, and feed stock in the mobile app.
5.  **Lifting (Harvest):** Schedule catching teams. Weigh birds at the farm or processing plant. Generate lifting receipt.
6.  **Settlement Generation:** Run the GC calculation engine once the shed is empty.
7.  **Payment:** Disburse net growing charges to the farmer.

### Farmer-Side Workflow (The Grower App / Portal)
1.  **Receipt Acknowledgment:** Confirm receipt of chicks and feed quantities.
2.  **Daily Log:** Enter daily mortality, feed consumed, and observations.
3.  **Stock Request:** Request more feed or specific medicines based on flock health.
4.  **Performance Dashboard:** View real-time FCR estimates and projected earnings.
5.  **View Settlement:** Access the final settlement sheet and payment status.

## 5. Batch Profitability & Settlement Example

### Scenario Data
*   **Chicks Placed:** 10,000
*   **Mortality:** 4% (400 birds). Birds Lifted: 9,600
*   **Total Live Weight Lifted:** 19,200 kg (Avg 2.0 kg/bird)
*   **Feed Supplied & Consumed:** 30,720 kg
*   **Actual FCR:** 30,720 kg / 19,200 kg = **1.60**
*   **Standard Contract:** Base rate $0.15/kg for FCR 1.65. Bonus: $0.01/kg for every 0.01 FCR improvement below 1.65.

### Part A: Integrator's Batch P&L (Enterprise View)
This determines if the *Integrator* made money on this flock.
*   **Revenue from Bird Sales:** 19,200 kg @ $1.20/kg market price = **$23,040**
*   **Less Integrator Costs:**
    *   Chick Cost (10,000 @ $0.40) = $4,000
    *   Feed Cost (30,720 kg @ $0.35) = $10,752
    *   Medicine/Vaccine = $300
    *   Overhead (Transport/Supervisor) = $500
*   **Gross Margin:** $23,040 - $15,552 = **$7,488**
*   **Less Growing Charges Paid to Farmer:** (Calculated below) = **$3,840**
*   **Net Integrator Profit:** $7,488 - $3,840 = **$3,648**

### Part B: Farmer's Settlement (Grower View)
This determines what the *Farmer* is paid for their services.
*   **Actual FCR (1.60) vs Standard (1.65):** Improvement of 5 points (0.05).
*   **Bonus Calculation:** 5 points × $0.01 = $0.05 bonus per kg.
*   **Final Rate per Kg:** Base $0.15 + Bonus $0.05 = **$0.20 / kg**
*   **Total Growing Charges:** 19,200 kg × $0.20 = **$3,840**
*   *(Note: Out of this $3,840, the farmer must cover their own expenses like labor, electricity, and litter to realize their personal net profit).*

## 6. Edge Cases & Exception Handling
*   **Premature Lifting:** If a disease outbreak occurs, birds may be lifted early. The contract must handle prorated FCR targets based on days.
*   **Feed Transit Loss:** Discrepancies between feed dispatched by the mill and received by the farmer.
*   **High Mortality Penalty:** If mortality exceeds 5%, the integrator may deduct the cost of the lost chicks and feed from the farmer's payout.
