# Hatchery Management Module

## 1. Overview and Purpose
The Hatchery Management Module manages the entire incubation lifecycle from egg receipt to day-old chick dispatch. It tracks inventory, machine performance, biological efficiency (hatchability/fertility), and chick quality. 

## 2. Egg Receiving & Storage
*   **Receiving:** Eggs arrive from breeder farms. They are logged by batch, farm ID, flock age, and date laid.
*   **Grading/Sorting:** Removing any cracked, dirty, or non-settable eggs missed at the farm.
*   **Fumigation:** Eggs are often fumigated (e.g., using formaldehyde gas or hydrogen peroxide fogging) to sanitize the shell surface before storage.
*   **Storage Parameters:**
    *   *Short term (1-3 days):* ~20°C (68°F), 75% Humidity.
    *   *Long term (7+ days):* 15°C (59°F), 80% Humidity.
    *   *Turning:* If stored > 7 days, eggs must be turned daily to prevent the embryo from sticking to the shell membrane. [Source: Ross Hatchery Management Guide].

## 3. Setting and Incubation (Setters)
*   **Incubation Schedule:** Total 21 days for chickens (28 days for turkeys/ducks).
*   **Setter Loading:** Eggs are loaded into setters (incubators) for Days 1-18.
*   **Incubation Parameters [Source: Cobb Hatchery Management Guide]:**
    *   *Temperature:* 37.5°C to 37.7°C (99.5°F - 99.9°F).
    *   *Humidity:* 50% - 60% Relative Humidity.
    *   *Turning:* Eggs are turned 45 degrees every hour.
    *   *Ventilation:* Gradual increase in fresh air as embryos grow and respire more O2 and emit CO2.

## 4. Candling (Embryo Diagnostics)
Eggs are candled (shining a bright light through the shell) to identify and remove non-viable eggs, freeing up space and preventing bacterial explosions (bangers).
*   **Day 7-10 (Optional in some industrial operations):** Identifies "Clears" (infertile eggs) and Early Dead embryos.
*   **Day 18 (At Transfer, Standard):** Identifies Late Dead embryos. Only viable eggs with live embryos are transferred to the hatcher.

## 5. Transfer (Setter to Hatcher)
*   **Timing:** Day 18 to Day 19 of incubation.
*   **Process:** Eggs are gently transferred from setter flats (where they stand vertically) into hatcher baskets (where they lie horizontally to allow chicks room to hatch). In-ovo vaccination (e.g., for Marek's disease) often happens simultaneously using automated equipment like Embrex.

## 6. Hatching (Hatchers)
*   **Parameters:** Temperature is slightly lower (approx 36.9°C / 98.5°F) and humidity is higher (65-75%) to soften the shell and membrane.
*   **Hatch Window:** Chicks hatch over a 24-36 hour period. The "hatch pull" occurs when ~95% of chicks are completely dry.

## 7. Chick Processing
Once pulled from the hatchers, chicks go through a processing line:
1.  **Counting:** Automated or manual.
2.  **Sexing:** Vent sexing (checking cloaca), feather sexing (checking primary/covert wing feathers), or color sexing (for specific layer breeds).
3.  **Vaccination:** Subcutaneous injection (neck) or spray vaccination (IB/ND) if not done in-ovo.
4.  **Beak Trimming (Debeaking):** Infrared treatment is standard for layers and some breeders to prevent cannibalism; rarely done for commercial broilers.

## 8. Chick Grading
*   **Grade A (Saleable):** Clean, fluffy, active, bright eyes, fully healed navel, no deformities, correct weight (e.g., > 35g depending on flock age).
*   **Grade B:** Minor defects (e.g., slightly unhealed navel, slightly smaller, string navel). Often sold at a discount.
*   **Culls:** Deformed (spraddle legs, cross-beak), wet/mushy chicks, exposed yolk sacs. Euthanized humanely (usually maceration or gas).

## 9. Chick Holding & Dispatch
*   **Holding Room:** Maintained at ~24°C (75°F) with high ventilation. Chicks cannot thermoregulate yet.
*   **Boxing:** Chicks are placed in plastic or cardboard boxes, typically 100 birds per box (plus 1-2% extra for mortality during transit).
*   **Dispatch:** Assigned to delivery trucks with climate control for delivery to commercial farms.

## 10. Hatchery Calculations & Formulas

> [!NOTE]
> Formulas based on industry standard definitions provided by the **Aviagen Hatchery How-To guides** and **Cobb Hatchery Management Guide**.

*   **Hatchability of Total Eggs Set %:**
    *   *Formula:* (Total Chicks Hatched / Total Eggs Set) × 100
*   **Hatchability of Fertile Eggs (Hatch of Fertile) %:**
    *   *Formula:* (Total Chicks Hatched / Total Fertile Eggs) × 100
*   **Fertility %:**
    *   *Formula:* (Total Fertile Eggs / Total Eggs Set) × 100
    *   *Note:* Real fertility is determined by breakout analysis. Candling "clears" include true infertiles AND early deads.
*   **Saleable Chick %:**
    *   *Formula:* (Total Grade A Saleable Chicks / Total Eggs Set) × 100
*   **Chick Yield (Egg Weight Loss %):**
    *   *Formula:* (Average Day-Old Chick Weight / Average Egg Weight at Setting) × 100
    *   *Target:* Usually 66 - 68%.

## 11. Hatchery Waste Management
*   **Waste Components:** Empty eggshells, unhatched eggs (dead-in-shell), cull chicks, and infertile eggs.
*   **Disposal:** Sent through a macerator and either rendered for by-product meal, composted, or incinerated.

## 12. Machine & Equipment Management
*   **Machine Profiles:** Storing temperature, humidity, and turning step-programs for setters and hatchers based on egg age and breed.
*   **Capacity Planning:** Scheduling tool to ensure setter and hatcher capacity is never exceeded based on incoming egg projections.
*   **Maintenance Schedules:** Routine calibration of temperature/humidity probes, turning mechanism checks, and sanitization cycles.

## 13. Scale Variations
*   **Small-Scale Hatcheries:** Single-stage incubators (all eggs in the machine are the same age), manual candling, manual counting, and box packing. Focus is on flexibility.
*   **Industrial Hatcheries:** Multi-stage incubators (eggs of multiple ages in the same machine to share exothermic heat from older embryos with endothermic younger ones), automated transfer machines, in-ovo vaccination (Embrex), automated chick counters and grading belts. Focus is on mass throughput and energy efficiency.
