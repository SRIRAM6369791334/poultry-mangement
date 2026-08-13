# Feed Mill Management Module

## 1. Overview
The Feed Mill Management module caters to integrated poultry companies that produce their own feed. It handles everything from raw material procurement to finished goods dispatch, focusing on quality, efficiency, and cost reduction.

## 2. Raw Material Management
- **Ingredients**: Maize/Corn, Soybean Meal (SBM), Fishmeal, Rice Bran, Oil, Limestone, Di-calcium Phosphate (DCP), Amino Acids, Vitamins, Minerals, Additives.
- **Procurement**: Purchase orders, weighbridge integration, goods receipt notes (GRN).
- **Storage**: Silos for bulk grains (Maize, SBM) and warehouses for bagged micro-ingredients.
- **Quality Testing**: Sampling at gate. Parameters: Moisture (<12%), Aflatoxin (must be within limits), Sand/Silica, Crude Protein.

## 3. Feed Formula Management
- **Recipe Creation**: Master recipes mapped to bird type and age.
- **Least-Cost Formulation (LCF)**: Integration with LCF software or built-in LP (Linear Programming) solver to find the cheapest mix of available raw materials that meets all nutritional constraints.
- **Versioning**: Tracking changes to formulas over time based on raw material prices and season.
- **Cost Optimization**: Daily/weekly recalculation of formula costs based on moving average inventory valuation.

## 4. Production Planning
- **Batch Size**: Determined by mixer capacity (e.g., 1 Ton, 2 Ton, 5 Ton batches).
- **Production Schedule**: Planning based on farm demand indents (daily or weekly).
- **Machine Capacity**: Scheduling runs to maximize throughput of the bottleneck machine (usually the pellet mill).

## 5. Manufacturing Process
1. **Grinding**: Hammer mills reduce raw material particle size.
2. **Batching & Weighing**: Automated micro/macro dosing systems.
3. **Mixing**: Homogeneous mixing of wet and dry ingredients (Ribbon or Paddle mixers).
4. **Conditioning & Pelleting**: Steam addition and extrusion through a die (for pelleted feed).
5. **Crumbling**: Crushing pellets (for starter feeds).
6. **Cooling**: Reducing temperature and moisture of pellets.
7. **Bagging / Bulk Loading**: Packing into 50kg bags or loading directly into bulk feed trucks.

## 6. Batch Tracking & Traceability
- **Production Batch ID**: Auto-generated ID for each run.
- **Ingredient Traceability**: Linking finished goods batch to specific supplier raw material batches. Crucial for recall management if toxicity is detected.

## 7. Quality Control (QC)
- **Sampling**: In-line sampling and post-production sampling.
- **Testing Parameters**: Moisture, Protein, Fat, Fiber, Aflatoxin, Pellet Durability Index (PDI).
- **Status**: QC Hold, QC Approved, QC Rejected.

## 8. Finished Goods Inventory
- **Stock Management**: Tracking bagged and bulk feed in FG silos/warehouses.
- **Dispatch**: Generating Delivery Challans (DC) against farm indents or dealer sales orders. FIFO compliance is strictly enforced.

## 9. Feed Mill KPIs
- **Production Efficiency**: Actual tons produced vs. Rated Capacity.
- **Wastage / Process Loss**: Typically target < 0.5% moisture loss or dust loss.
- **Energy Consumption**: kWh per ton of feed produced.
- **Cost per Ton**: Total manufacturing overhead + raw material cost / tons produced.

## 10. Equipment Management
- **Hammer Mill**: Screen replacement tracking, vibration logs.
- **Mixer**: CV (Coefficient of Variation) testing logs to ensure mixing uniformity.
- **Pellet Mill**: Die and roller life tracking (tons processed).
- **Cooler & Bagger**: Maintenance schedules, calibration of bagging scales.
