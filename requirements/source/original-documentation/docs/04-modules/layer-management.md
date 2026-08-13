# Layer Management Module (ERP)

## 1. Module Overview
The Layer Management Module covers the complete lifecycle of laying hens, from day-old chicks (or point-of-lay pullets) through peak production and eventually to flock depletion. It is designed to accommodate multiple housing systems (cage, barn, free-range) and provides tools to track, analyze, and optimize egg production.

## 2. Layer Lifecycle Phases

### 2.1 Pullet Rearing (0–16 weeks)
- **Chick Sourcing:** Recording day-old chicks received from hatcheries or purchasing point-of-lay pullets.
- **Brooding & Rearing:** Temperature control, early feeding programs.
- **Vaccination & Beak Trimming:** Pre-lay vaccination schedules (Marek's, Newcastle, IB, etc.).
- **Light Programs:** Step-down lighting to prevent early sexual maturity.
- **Transfer:** Moving pullets from rearing houses to layer houses at ~16-17 weeks (Point of Lay).

### 2.2 Point of Lay to Peak Production (17–30 weeks)
- **Light Stimulation:** Step-up lighting to stimulate egg production.
- **Pre-lay and Layer Phase 1 Feed:** Transitioning to high-calcium feed.
- **Onset of Production:** Tracking 5%, 50%, and peak production milestones.

### 2.3 Peak to Declining Production (31–72+ weeks)
- **Peak Production:** Often reaching 95-96% Hen-Day Production.
- **Phase Feeding:** Adjusting feed (Phase 2, Phase 3) to manage egg weight and shell quality as hens age.
- **Body Weight Management:** Monitoring uniformity.

### 2.4 Depletion (72–90 weeks)
- **Flock Closing:** Selling spent hens (culls) for meat or processing.
- **House Cleaning & Resting:** Preparing for the next flock.

## 3. Flock Setup & Attributes
- **Flock Creation:** ID, Breed (e.g., Hy-Line Brown, Lohmann LSL-Classic, ISA Brown, Novogen), Hatch Date, Housing Date.
- **Housing Type:** 
  - *Battery Cage / Enriched Cage:* High density, controlled environment.
  - *Barn / Floor:* Litter-based, medium density.
  - *Free-Range / Pasture:* Access to outdoors, lower density.
- **Stocking Density:** Tracked per square meter or square foot (e.g., 750 cm² per bird in enriched cages).

## 4. Daily Operations
- **Data Collection:** User logs daily metrics per flock/house.
- **Mortality & Culls:** Recording dead birds and culling reasons (prolapse, injury, disease).
- **Feed Consumption:** Feed delivered vs. feed consumed.
- **Water Consumption:** Water meter readings; tracking water-to-feed ratio.
- **Environmental Logs:** Temperature, humidity, lighting hours.

## 5. Flock Performance & Calculations

### Key Formulas [Source: Hy-Line / Lohmann Management Guides]

1. **Hen-Day Production (HDP) %**
   - *Formula:* `(Total Eggs Produced on Day X / Number of Live Hens on Day X) * 100`
   - *Purpose:* Measures current biological efficiency of the living birds.

2. **Hen-Housed Production (HHP) %**
   - *Formula:* `(Total Eggs Produced on Day X / Number of Hens Originally Housed) * 100`
   - *Purpose:* Measures overall economic performance, factoring in mortality.

3. **Cumulative Eggs per Hen-Housed**
   - *Formula:* `Sum of Daily HHP from onset of lay to current date`
   - *Standard:* Often targets >320 eggs by 72 weeks depending on breed.

4. **Egg Mass**
   - *Formula:* `Number of Eggs * Average Egg Weight (g)` OR `HDP % * Average Egg Weight (g)`
   - *Purpose:* Total biological output, critical for feed efficiency calculations.

5. **Feed Conversion Ratio (FCR) - per Dozen Eggs**
   - *Formula:* `Total Feed Consumed (kg) / (Total Eggs Produced / 12)`
   - *Purpose:* Economic efficiency of feed usage per carton of eggs.

6. **Feed Conversion Ratio (FCR) - per kg Egg Mass**
   - *Formula:* `Total Feed Consumed (kg) / Total Egg Mass (kg)`
   - *Purpose:* Biological efficiency of feed converted into egg weight.

7. **Production Cost per Egg**
   - *Formula:* `Total Production Cost (Feed, Labor, Utilities, Amortized Pullet Cost) / Total Eggs Produced`

8. **Livability %**
   - *Formula:* `(Current Live Birds / Birds Housed) * 100`

*All formulas should be compared dynamically against the standard breed curves loaded into the ERP.*

## 6. Feed & Nutrition Management
- **Pre-Lay Diet (15-17 weeks):** Introduced to build medullary bone calcium reserves (approx. 2.0-2.5% Calcium).
- **Layer Phase 1 (18-40 weeks):** High protein/amino acids for peak production and growing egg size (approx. 3.8-4.2% Calcium).
- **Layer Phase 2/3 (40+ weeks):** Lower protein, higher calcium/phosphorus ratio to maintain shell quality as eggs get larger.
- **Consumption Standards:** Typically 105–115 grams per bird per day (brown birds) or 95-105g (white birds).

## 7. Mortality Management
- **Reasons:** Cannibalism/Pecking (especially in barn/free-range), Prolapse, Fatty Liver Hemorrhagic Syndrome, Heat Stress.
- **System Action:** Deducts from "Live Birds" inventory immediately affecting the HDP denominator.

## 8. Flock Depletion & Reporting
- **Spent Hen Sales:** Integration with sales module.
- **Flock Summary Report:** Compares actual cumulative performance (FCR, Livability, Eggs/Hen) against breed standards.
- **Financial Closure:** P&L per flock.
