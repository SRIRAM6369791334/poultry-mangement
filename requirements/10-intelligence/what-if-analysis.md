# 10.3 What-If Analysis & Scenario Planning Module

## 1. Overview
The What-If Analysis module allows management to simulate business scenarios to understand the cascading impact of changes in demand, supply, or capacity. This aids in strategic planning, capacity management, and risk mitigation.

## 2. Scenario Planning
Users can create and simulate different forward-looking scenarios [CLIENT-218-219]:
- **Standard Increments:** Normal Baseline, +10% demand, +20% demand, +30% demand.
- **Boundary Cases:** Best Case scenario vs Normal vs Worst Case scenario.

## 3. Impact Assessment
For each simulated scenario, the system must project the impact across the entire business operation [CLIENT-218-219]:
- **Stock Requirements:** Additional raw materials and finished goods needed.
- **Purchase Costs:** Incremental procurement costs.
- **Production Needs:** Required adjustments to farm batches.
- **Cash Flow Requirement:** Working capital needed to support the scenario.

## 4. Capacity Planning & Bottleneck Detection
The system forecasts capacity utilization and detects potential bottlenecks before they occur [CLIENT-207-210, CLIENT-175].

### 4.1 Tracked Capacities
- **Processing Capacity:** (e.g., Maximum 1,000 kg/day)
- **Warehouse Capacity:** Cold storage and ambient storage space.
- **Vehicle Fleet:** Tonnage and routing capacity.
- **Employee Availability:** Manpower required for processing and logistics.

### 4.2 Bottleneck Alerts
If a simulated scenario (or real forecast) exceeds capacity, the system triggers alerts:
- *Example:* "Processing capacity shortage: Orders expected 1,500 kg/day vs Capacity 1,000 kg/day." [CLIENT-175]

## 5. Multi-Year Comparative Visualization
- The system must visualize these scenarios overlaying multiple years of historical data (e.g., 2023, 2024) against current actuals (2025) and scenario forecasts (2026) to identify multi-year growth trajectories [CLIENT-185-187].
