# Broiler Management Module

## 1. Broiler Lifecycle Overview
The broiler lifecycle in an ERP context spans approximately 35-49 days, encompassing the entire journey from Day-Old Chicks (DOC) to processed or live-sale mature birds. 
Key phases:
- **Preparation**: Cleaning, disinfection, pre-heating of sheds.
- **Brooding (Days 0-7)**: Critical temperature control, supplemental feeding/watering.
- **Growing (Days 8-35)**: Maximum growth rate phase, ventilation focus.
- **Finishing (Days 36-49)**: Final weight gain, withdrawal periods for medications.
- **Depletion/Harvest**: Catching, weighing, and dispatch.
- **Batch Closing**: Financial and performance reconciliation.

## 2. Chick Placement
**Business Rules:**
- **Source**: Hatchery internal transfer or external purchase.
- **Quality Check**: Sample weight check, uniformity, vitality, navel condition.
- **Placement Density**: Typically 15-19 birds/m² (Source: Cobb Broiler Management Guide). Varies based on climate and target slaughter weight.
- **Documentation**: Goods Receipt Note (GRN) for DOC, Health Certificate, Placement Record.

## 3. Batch Management
- **Batch Creation**: Triggered by confirmed placement plan.
- **Batch ID**: Unique alphanumeric code (e.g., `FARM-SHED-YYYYMM-01`).
- **Batch Attributes**: Breed (Cobb 500, Ross 308), Hatchery source, Initial Count, Initial Weight, Placement Date.
- **Batch Timeline**: Start date to final depletion date (Closing).

## 4. Daily Operations
Routine data collection per shed/batch.
- **Data Points**: Min/Max Temperature, Humidity, Water consumption (liters), Feed consumed (kg).
- **Validation**: Cannot enter future dates; feed consumed cannot exceed stock at shed.

## 5. Mortality Management
- **Daily Recording**: Number of dead birds.
- **Reasons Catalog**: Culling (runts, leg issues), Disease (Ascites, Newcastle), Management (Suffocation, Heat Stress), Sudden Death Syndrome (Flip-over).
- **Correction Workflows**: Adjustments require manager approval (e.g., if a recount shows discrepancy).

## 6. Feed Management
- **Feed Types by Age** (Standard, varies slightly by breed):
  - Pre-starter / Starter: Days 0-10 (Crumble/Mini-pellet, high protein).
  - Grower: Days 11-24 (Pellet).
  - Finisher: Days 25-Slaughter (Pellet, high energy).
- **Workflows**: Feed indent (request) -> Feed issue from mill/store -> Receipt at shed -> Daily consumption.

## 7. Weight Management
- **Methodology**: Sample weighing 1-5% of the flock weekly using a catch pen to avoid bias.
- **Metrics**: Average weight, Coefficient of Variation (CV) or Uniformity % (birds within +/- 10% of average).
- **Standard Comparison**: System flags if weight deviates >5% from Breed Standard Curve (e.g., Ross 308 Performance Objectives).

## 8. FCR Tracking (Feed Conversion Ratio)
- **Cumulative FCR**: Total feed consumed to date / Total live weight present + dead/culled weight.
- **Standard Targets**: Generally ranges from 1.4 to 1.7 depending on target weight and breed.
- **Edge Cases**: High mortality skews FCR if dead bird weight is not accounted for (Mortality Adjusted FCR).

## 9. ADG Tracking (Average Daily Gain)
- Tracks gram/day weight addition. Crucial for pinpointing growth stalls.

## 10. Medication & Vaccination
- **Standard Schedule**: 
  - Day 1: ND + IB (Spray)
  - Day 14: IBD (Gumboro) via drinking water.
- **Tracking**: Vaccine batch, dosage, administration route, withdrawal period (system blocks harvest if within withdrawal period).

## 11. Harvest/Depletion
- **Partial Harvest (Thinning)**: Removing a portion of females/smaller birds earlier to reduce density.
- **Full Harvest**: Final clearance of the shed.
- **Shrinkage**: Weight loss during transport (typically 0.1-0.3% per hour of transport).

## 12. Bird Sale
- **Workflow**: Weighbridge (Empty truck) -> Loading -> Weighbridge (Loaded truck) -> Net Weight calculation.
- **Invoicing**: Price per kg live weight * Net Weight.

## 13. Batch Closing
- **Trigger**: Bird count hits zero.
- **Final Calculations**: Total feed, total mortality, final FCR, EEF.
- **Cost Analysis**: Feed cost + DOC cost + Meds + Labor + Overheads divided by Total kg produced.

## 14. Broiler-Specific Calculations (Reference)
*Calculations detailed fully in Business Processes document.*
- **Livability %**
- **Mortality %**
- **FCR (Feed Conversion Ratio)**
- **ADG (Average Daily Gain)**
- **EEF (European Efficiency Factor)**
