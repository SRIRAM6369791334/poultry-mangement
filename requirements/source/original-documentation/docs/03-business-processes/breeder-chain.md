# End-to-End Business Process: Breeder Chain

## 1. Process Overview
The Breeder Chain manages the lifecycle of breeding stock from the day they arrive as chicks until they are depleted at the end of their productive life. The primary output of this chain is high-quality fertile eggs for the hatchery.

## 2. Process Flow & Steps

### Phase 1: Chick Placement (Day 1)
*   **Trigger:** Arrival of Parent Stock (PS) or Grandparent Stock (GPS) day-old chicks from the primary breeder supplier (e.g., Aviagen, Cobb).
*   **Steps:**
    1. Receive chicks (males and females separately).
    2. Count and verify physical condition/health.
    3. Allocate to brooding houses.
    4. Record initial flock data (genetics, source, hatch date).
*   **Roles:** Breeder Farm Manager, Receiving Staff.
*   **Data Entities:** Flock ID, Batch Receipt, Source Vendor, Initial Count.

### Phase 2: Rearing & Growing (Weeks 1 - 15)
*   **Trigger:** Daily growth and development.
*   **Steps:**
    1. Implement strictly controlled feeding programs to match breeder target body weight curves.
    2. Perform weekly weighing (sample basis) to calculate average weight and Uniformity/CV.
    3. Administer complex vaccination schedules (live and killed vaccines) via water, spray, or injection.
    4. Implement light restriction (darkout houses) to delay sexual maturity.
*   **Roles:** Farm Supervisor, Veterinarian.
*   **Data Entities:** Daily Feed Logs, Weekly Weight Samples, Uniformity %, Vaccination Records, Mortality Logs.

### Phase 3: Pre-Lay & Transfer (Weeks 16 - 23)
*   **Trigger:** Birds approach sexual maturity.
*   **Steps:**
    1. Transfer birds from rearing houses to production houses (if using a two-stage system).
    2. Mix males and females at the target mating ratio (e.g., 9-10% males).
    3. Initiate light stimulation (increasing day length) to trigger reproductive development.
*   **Roles:** Transport Crew, Production Manager.
*   **Data Entities:** Transfer Logs, Male/Female Ratios, Lighting Schedules.

### Phase 4: Production Phase (Weeks 24 - 60+)
*   **Trigger:** First egg laid; scaling to peak production.
*   **Steps:**
    1. **Egg Collection:** Gather eggs multiple times daily from nest boxes.
    2. **Farm Grading:** Separate settable eggs from table eggs, double yolks, culls, and floor eggs.
    3. **Feeding:** Manage separate feeding systems for males and females. Adjust feed volume based on egg mass output.
    4. **Spiking (Week 40+):** Introduce young males if fertility begins to drop.
    5. **Farm Storage:** Store settable eggs in an on-farm climate-controlled egg room (18-20°C).
*   **Roles:** Farm Workers, Egg Room Supervisor.
*   **Data Entities:** Daily Egg Production (by type), HHEP %, Feed per Egg, Male Mortality, Environmental Logs.

### Phase 5: Transport to Hatchery
*   **Trigger:** Scheduled hatchery collection (typically 2-3 times per week).
*   **Steps:**
    1. Load farm egg buggies onto climate-controlled transport trucks.
    2. Generate dispatch manifest (Flock ID, egg age, quantities).
*   **Roles:** Dispatcher, Truck Driver.
*   **Data Entities:** Egg Dispatch Note, Transport Manifest.

### Phase 6: Depletion (End of Cycle)
*   **Trigger:** Flock reaches the end of economic viability (typically 60-65 weeks).
*   **Steps:**
    1. Schedule flock for slaughter/rendering (sold as spent hens).
    2. Remove birds from the house.
    3. Initiate complete clean-out, washing, and disinfection of the facility (down-time).
*   **Roles:** Farm Manager, Processing Plant Coordinator.
*   **Data Entities:** Depletion Record, Final Salvage Value, Clean-out Certificate.

## 3. Key Business Rules
*   **BR-BRD-001:** Males and females must be tracked as separate biological inventories within the same flock until depletion.
*   **BR-BRD-002:** Feed distribution must enforce a hard stop at the calculated daily allowance to prevent overfeeding.
*   **BR-BRD-003:** Any egg laid on the floor (floor egg) must be flagged and heavily restricted from entering the premium settable egg stream.
