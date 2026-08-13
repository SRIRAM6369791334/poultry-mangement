# 10.2 Slow and Non-Moving Products Module

## 1. Overview
The Slow and Non-Moving Products module identifies inventory items that are tying up capital, aging beyond acceptable thresholds, or are at risk of becoming dead stock. It categorizes products based on their sales velocity and provides recommendations to clear out inventory.

## 2. Product Lifecycle Management
Products must be tracked through predefined lifecycle stages [CLIENT-215-217]:
1. **New:** Recently introduced. Forecast relies on similar product data + manual estimates.
2. **Growing:** Increasing sales trajectory.
3. **Fast Moving:** High velocity, stable or growing demand.
4. **Stable:** Consistent demand.
5. **Slow Moving:** Sales velocity dropping below acceptable thresholds.
6. **Non-Moving:** Zero sales for a specified extended period.
7. **Discontinued:** System suggested discontinuation, confirmed by management.

> [!CAUTION]
> **Strict Business Rule:** The system MUST NOT auto-delete or auto-discontinue products under any circumstances. It can only suggest discontinuation after 6 months of low sales [CONFIRMED] [CLIENT-215-217].

## 3. Product Categorization & Identification

### 3.1 Velocity Categories
The system classifies products based on configurable thresholds [CLIENT-195]:
- **Fast Moving:** High turnover.
- **Normal:** Standard turnover.
- **Slow Moving:** e.g., "Duck last sold 45 days ago, current stock 300 pieces" [CLIENT-193-194].
- **Non-Moving:** e.g., "Turkey last sale 90 days ago, current stock 150, sales 0" [CLIENT-193-194].
- **Dead Stock:** Items with zero movement beyond extreme thresholds, likely requiring write-offs or heavy clearance.

## 4. Inventory Risk Prediction

### 4.1 Overstock Detection
The system identifies products where current stock drastically exceeds predicted demand [CLIENT-196-197].
- **Example Scenario:** Current Stock is 2,000 units, but Monthly Sales run rate is 300 units.
- **System Recommendation:** "Reduce purchase for this product," "Initiate discount/promotion."

### 4.2 Stockout Prediction
The system calculates the run-rate to predict imminent stockouts [CLIENT-198-199].
- **Example Scenario:** Current Stock 500 kg, Daily Sales 120 kg.
- **System Alert:** "Stock-out expected in 4 days."

## 5. Management Recommendations
When products hit warning thresholds (Slow Moving, Non-Moving, Overstock), the system generates management recommendations:
- **Reduce/Stop Purchase:** Adjust reorder parameters.
- **Promotions:** Suggest bundling or discounting to clear stock.
- **Discontinuation:** Suggest for items with no sales for 6+ months (requires human approval).
