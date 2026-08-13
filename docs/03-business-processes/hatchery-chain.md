# End-to-End Business Process: Hatchery Chain

## 1. Process Overview
The Hatchery Chain covers the transformation of settable eggs received from breeder farms into day-old chicks ready for commercial placement. It involves inventory management, precise environmental control, and biological processing.

## 2. Process Flow & Steps

### Phase 1: Receiving and Egg Storage
*   **Trigger:** Arrival of egg transport truck from breeder farm.
*   **Steps:**
    1. Unload eggs and scan/enter delivery manifests.
    2. Perform quality check and secondary grading if required.
    3. Fumigate or sanitize incoming eggs.
    4. Store eggs in the egg holding room (15-20°C depending on planned storage duration).
*   **Roles:** Receiving Clerk, Quality Inspector.
*   **Data Entities:** Goods Receipt Note, Flock ID, Lay Date, Egg Count, Storage Location.

### Phase 2: Setting (Days 1 - 18)
*   **Trigger:** Hatchery production schedule mandates loading incubators for a specific future hatch day.
*   **Steps:**
    1. Warm eggs to room temperature (pre-warming) to prevent temperature shock.
    2. Load eggs into setter racks/buggies.
    3. Place buggies into Setters (Incubators).
    4. Run 18-day setter profile (controlling temp, humidity, turning, and ventilation).
*   **Roles:** Hatchery Operator.
*   **Data Entities:** Setter Load Sheet, Machine ID, Expected Hatch Date, Incubation Profile Log.

### Phase 3: Transfer & Candling (Day 18)
*   **Trigger:** Eggs reach day 18 of incubation.
*   **Steps:**
    1. Remove setter buggies from the incubator.
    2. Pass eggs through candling equipment (manual or automated) to remove infertile eggs ("clears") and early dead embryos.
    3. (Optional) Perform in-ovo vaccination.
    4. Transfer viable eggs into hatcher baskets.
*   **Roles:** Transfer Crew.
*   **Data Entities:** Candling Report, Infertile Count, Dead-in-Shell Count, Viable Transfer Count.

### Phase 4: Hatching (Days 18 - 21)
*   **Trigger:** Transfer of baskets into Hatchers.
*   **Steps:**
    1. Load hatcher baskets into Hatcher machines.
    2. Run 3-day hatcher profile (higher humidity, no turning).
    3. Monitor "hatch window" and determine the optimal time to pull chicks.
*   **Roles:** Hatchery Manager.
*   **Data Entities:** Hatcher Machine ID, Environmental Logs.

### Phase 5: Chick Pull & Processing (Day 21)
*   **Trigger:** Chicks are hatched and ~95% dry.
*   **Steps:**
    1. Pull baskets from hatchers and move to the processing room.
    2. Separate chicks from shells and unhatched eggs (waste).
    3. Grade chicks (Grade A, Grade B, Culls).
    4. Process chicks based on customer requirements:
        *   Sexing (feather, vent, color)
        *   Vaccination (Spray or Subcutaneous)
        *   Beak trimming (for layers/breeders)
    5. Count and box chicks (usually 100/box).
*   **Roles:** Processing Line Workers, Quality Control.
*   **Data Entities:** Total Hatched, Saleable Grade A Count, Cull Count, Vaccination Log, Sexing Data.

### Phase 6: Holding & Dispatch
*   **Trigger:** Chicks are boxed and ready for transport.
*   **Steps:**
    1. Move boxed chicks to the climate-controlled chick holding room.
    2. Assign boxes to specific sales orders or internal farm placements.
    3. Load onto specialized, climate-controlled chick transport trucks.
    4. Generate dispatch documents and trace-back certificates.
*   **Roles:** Dispatch Coordinator, Driver.
*   **Data Entities:** Delivery Order, Vehicle Manifest, Farm Destination, Chick Traceability Code.

## 3. Key Business Rules
*   **BR-HTC-001 (Traceability):** Every box of day-old chicks must be traceable back to the specific Breeder Flock ID and the specific Setter/Hatcher machines used.
*   **BR-HTC-002 (Storage Limits):** Eggs stored longer than 7 days must trigger an alert, as hatchability degrades by ~0.5% to 1.5% for every additional day of storage.
*   **BR-HTC-003 (Capacity Control):** The system must prevent scheduling an egg set that exceeds the physical capacity of available setters or corresponding hatchers.
