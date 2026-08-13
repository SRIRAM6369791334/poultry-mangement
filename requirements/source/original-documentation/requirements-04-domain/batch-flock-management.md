# Batch & Flock Management Requirements

## 1. Overview
Requirements for managing the lifecycle of poultry batches across the 8 farms and 42 sheds. Currently, there are 30+ active batches at any given time.

## 2. Batch Creation and Lifecycle [PROPOSED]
A batch represents a group of birds of the same species placed in a shed.
**Lifecycle States:**
- `Draft`: Planned batch, awaiting placement.
- `Placed`: Birds have arrived, initial count verified.
- `Active`: Ongoing daily operations.
- `Partially Depleted`: Harvest has started, some birds remain.
- `Closed`: All birds harvested, depleted, or dead. Batch accounting is final.

## 3. Placement Workflow (CLIENT-006) [CONFIRMED]
**Process:** Chick Supplier → Purchase → Arrival → QC → Farm Allocation → Shed Allocation → Batch Creation → Bird Placement.
**Captured Data:**
- Bird count
- Breed / Species
- Supplier
- Rate per bird
- Total Purchase Cost
- Arrival Date & Time
- Farm Assigned
- Shed Assigned
- Auto-generated Batch Number

## 4. Daily Operations Recording (CLIENT-007) [CONFIRMED]
**Process:** Worker enters data → Supervisor verifies.
**Daily Data Captured:**
- Opening Bird Count
- Mortality Count
- Culling Count
- Live Bird Count (Closing)
- Feed Consumption (kg/bags)
- Water Consumption (liters)
- Environment Checks (Temp/Humidity) [INFERRED]
- Health Checks

## 5. Batch Performance Tracking [INFERRED]
The system must calculate and display standard industry metrics for each active and closed batch:
- **FCR (Feed Conversion Ratio):** Total feed consumed / Total live weight.
- **ADG (Average Daily Gain):** Weight gained per day.
- **Livability %:** (Placed Birds - Mortality) / Placed Birds.
- **EEF (European Efficiency Factor):** (Livability × Live Weight / Age in Days × FCR) × 100.

## 6. Harvest / Depletion Workflow [PROPOSED]
- Capturing the number of birds caught for processing/dispatch.
- Recording the dispatch weight.
- Transitioning batch to `Partially Depleted` or `Closed` based on remaining count.

## 7. Batch Closing and Profitability (CLIENT-027) [CONFIRMED]
**Batch Closing:** A batch is manually or automatically closed when bird count reaches zero.
**Batch Profitability:**
The system must calculate total profit/loss for each batch.
- **Total Revenue:** Total sales value of birds from the batch.
- **Total Cost:** Chick cost + Feed cost + Medicine cost + Overhead (labor, electricity) [PROPOSED].
- **Net Profit:** Total Revenue - Total Cost.
- **Profit per Bird:** Net Profit / Total Birds Sold.
