# 10.4 AI Opportunities & Roadmap

## 1. Overview
The AI Roadmap outlines the phased integration of artificial intelligence and machine learning into the Sri Murugan Poultry & Agro Group system. AI is used to enhance predictability and automation but strictly operates as a recommendation engine.

> [!IMPORTANT]
> **Strict Business Rule:** AI never makes autonomous decisions. All AI outputs are recommendations that require human approval before execution [CONFIRMED]. Furthermore, all AI models must be explainable (Explainable AI) [CLIENT-212].

## 2. Phase-Wise AI Roadmap

### 2.1 Phase 1: Rule-Based Alerts (Foundational)
- **Concept:** Simple threshold-based monitoring.
- **Use Cases:** 
  - Standard breed performance tracking (vs Cobb/Ross standards).
  - Management Alerts: High Mortality, Low Yield, High Wastage, Low Stock, Overdue Payment, High Return, High Damage, Low Margin, Processing Bottleneck, Vehicle Breakdown, Supplier Quality Issue [CLIENT-180].

### 2.2 Phase 2: Historical Analytics (Descriptive & Diagnostic)
- **Concept:** Analyzing past data to identify patterns.
- **Use Cases:**
  - Multi-year trend analysis and benchmarking.
  - Seasonality identification (festivals, business calendars) [CLIENT-170, CLIENT-185-187].
  - Slow-moving and non-moving product identification based on historical velocity [CLIENT-193-195].

### 2.3 Phase 3: ML Predictions (Predictive)
- **Concept:** Machine learning models forecasting future outcomes.
- **Use Cases:**
  - Demand Forecasting: Product, customer, and selling-mode level predictions [CLIENT-206].
  - Mortality and FCR Prediction: Based on feed, weather, and historical batch data.
  - Disease Risk: Early warning based on subtle shifts in water/feed consumption.
  - Stockout / Overstock Prediction [CLIENT-196-199].
  - Customer Churn Prediction: Identify dealers or customers likely to stop ordering based on ordering frequency and complaint history [CLIENT-CONFIRMED, AI-004].
  - Fraud / Suspicious Transaction Detection: Flag abnormal inventory adjustments, unusual weight reconciliations, or anomalous pricing overrides [INFERRED, AI-006].

### 2.4 Phase 4: AI Agents (Prescriptive & Interactive)
- **Concept:** Advanced LLM and AI agents assisting management.
- **Use Cases:**
  - Natural Language Queries (e.g., "Why did mortality spike in shed 3?").
  - Automated Reorder Drafts (system drafts the PO, human approves).
  - Anomaly Investigation (AI correlates weather, feed batch, and supplier data to explain a yield drop).
  - Backup Supplier Recommendation: Automatically suggest alternative suppliers and draft POs if primary supplier quality drops or lead times fail [CLIENT-CONFIRMED, AI-005].

## 3. AI Use Case Examples

| Use Case | Description | Input Data Needed | Expected Benefit |
| :--- | :--- | :--- | :--- |
| **Explainable Demand Prediction** | Predicts weekly product demand with explanations (e.g., "Demand up due to festival"). | Historical sales, festival calendar, forward bookings, weather. | Prevents stockouts/overstock, optimal resource planning. |
| **New Product Lifecycle Estimation** | Predicts demand curve for newly introduced products. | Historical data of similar products, manual baseline estimates. | Reduces risk of dead stock for new launches. |
| **Dynamic Reorder Recommendation** | Recommends optimal purchase orders considering dynamic variables. | Current stock, forecasted demand, supplier lead time, safety stock. | Optimizes working capital and ensures product availability. |
| **Capacity Bottleneck Detection** | Simulates future scenarios to predict infrastructure strain. | Processing capacity, fleet size, employee counts, demand forecasts. | Allows proactive hiring/investment rather than reactive crisis management. |
