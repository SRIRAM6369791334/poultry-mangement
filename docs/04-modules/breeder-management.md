# Breeder Management Module

## 1. Overview and Purpose
The Breeder Management Module is designed to handle the complex operations associated with Parent Stock (PS) and Grandparent Stock (GPS) farms. Its primary purpose is to maximize the production of high-quality, fertile, settable eggs while managing flock health, body weight, and mating ratios.

## 2. Breeder Types Supported
*   **Broiler Breeders:** Parent stock bred for meat production offspring (e.g., Cobb 500, Ross 308, Hubbard). Focus is heavily on controlled feeding and body weight.
*   **Layer Breeders:** Parent stock bred for commercial egg layers (e.g., Hy-Line W-36, Lohmann Brown). Focus is on prolonged peak production and shell quality.
*   **Grandparent Stock (GPS):** The generation above parent stock, requiring even stricter bio-security, data traceability, and performance tracking.

## 3. Breeder Flock Lifecycle
The ERP tracks the flock through distinct physiological and financial stages:
1.  **Rearing (Brooding & Growing) (0-15 Weeks):** Focus on skeletal development, uniformity, and strict body weight control.
2.  **Pre-lay & Transfer (16-23 Weeks):** Flocks are transferred from rearing to production houses. Light stimulation begins to mature the reproductive system.
3.  **Production (24-60+ Weeks):** Starts with the first egg. Peak production usually occurs around 30-32 weeks. Focus shifts to egg collection, settable egg yield, and maintaining fertility.
4.  **Declining (Post-45 Weeks):** Natural drop in fertility and egg production. Interventions like "spiking" (introducing new males) are managed here.
5.  **Depletion:** The flock is exhausted (spent hens) and sold for meat; houses are cleaned and disinfected.

## 4. Male:Female Ratio Management
Optimizing the mating ratio is critical for fertility.
*   **Standard Ratio:** 9-10% males to females at housing.
*   **Spiking:** The introduction of younger, mature males (usually around 25-27 weeks of age) into an older flock (usually 40-45 weeks of age) to stimulate mating activity and boost declining fertility. [Source: Cobb 500 Breeder Management Guide]
*   **Intra-spiking:** Exchanging 25-30% of existing males between different houses of the same age to create a new social order and stimulate mating without introducing outside disease risks.

## 5. Egg Production and Selection
*   **Settable Eggs:** Eggs that meet the weight, shape, and shell quality criteria for incubation (typically 50-70g depending on flock age).
*   **Table Eggs (Non-settable):** Eggs rejected for incubation but sold for consumption (e.g., double yolks, slightly misshapen, small eggs).
*   **Cull Eggs:** Cracked, heavily soiled, or severely deformed eggs that are discarded.
*   **Floor Eggs:** Eggs laid outside the nest boxes. These carry high bacterial loads and are usually tracked as a separate, lower-tier settable category or rejected.

## 6. Feed Management
Breeder feeding is the most highly regulated process on the farm due to the rapid growth genetics of broiler breeders.
*   **Controlled Feeding:** Feeding exact grams/bird/day to prevent obesity, which ruins fertility and egg production.
*   **Programs:** Skip-a-day (fed double every other day during rearing - depending on local welfare laws), 4/3, 5/2, or everyday restricted feeding.
*   **Separate Sex Feeding:** In production, males and females are fed separately. Females have excluder grills on their feeders that males' larger heads cannot fit through. Males are fed from hanging pans set higher than females can reach.

## 7. Daily Operations
*   **Egg Collection:** 4-6 times daily to minimize floor eggs, breakages, and pre-incubation cooling.
*   **Mortality & Culling:** Daily removal and recording of dead or lame birds.
*   **Feed Distribution:** Accurate weighing and distribution based on weekly target body weights.
*   **Weighing:** Weekly sampling (usually 1-2% of the flock) to calculate average body weight and CV (Coefficient of Variation) / Uniformity %.

## 8. Performance Metrics
*   **Peak Production:** The highest weekly HHEP (Hen-Housed Egg Production), usually 85-90%.
*   **Persistency:** The ability of the flock to maintain high production after peak.
*   **Settable Egg %:** (Settable Eggs / Total Eggs) × 100.
*   **Fertility %:** Evaluated at the hatchery and fed back to the breeder farm module.

## 9. Breeder-Specific Calculations & Formulas

> [!NOTE]
> All formulas below are industry standards referenced from the **Aviagen Ross 308 Parent Stock Management Handbook** and **Cobb 500 Breeder Management Guide**.

*   **Hen-Housed Egg Production (HHEP) %:**
    *   *Formula:* (Total Eggs Produced on Day / Total Females Originally Housed) × 100
*   **Hen-Day Egg Production (HDEP) %:**
    *   *Formula:* (Total Eggs Produced on Day / Total Live Females on that Day) × 100
*   **Settable Egg %:**
    *   *Formula:* (Total Settable Eggs / Total Eggs Produced) × 100
    *   *Target:* > 95%
*   **Flock Uniformity %:**
    *   *Formula:* (Number of birds weighed within ±10% of the average weight / Total number of birds weighed) × 100
    *   *Target:* > 85% during rearing.
*   **Feed per Settable Egg:**
    *   *Formula:* Total Female Feed Consumed / Total Settable Eggs Produced
*   **Male:Female Ratio %:**
    *   *Formula:* (Total Live Males / Total Live Females) × 100

## 10. Open Research & Future Considerations
*   [OPEN_RESEARCH_ITEM]: Integration with automated egg counters and digital load cells in feed bins for real-time telemetry.
*   [OPEN_RESEARCH_ITEM]: Tracking specific vaccination titers (ND, IB, IBD) passed as maternal antibodies to chicks.
