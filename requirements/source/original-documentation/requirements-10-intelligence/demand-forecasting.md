# 10.1 Demand Forecasting Module

> **Related R&D:** See [AI Roadmap](../../docs/18-ai/ai-roadmap.md) and [Predictive Maintenance](../../docs/18-ai/predictive-maintenance.md) for full AI integration capabilities.

## 1. Overview
The Demand Forecasting module transforms historical data into predictive insights. It shifts the system from reactive reporting to proactive planning (Past → Current → Forecast → Recommendation → Action) [CLIENT-220]. The system predicts future demand across various dimensions (time, product, customer, selling mode) and provides actionable recommendations for procurement and production.

## 2. Forecasting Dimensions

### 2.1 Time-Based Forecasting
| Frequency | Description | Source |
| :--- | :--- | :--- |
| **Monthly Forecasting** | Month-wise forecast comparing current year with previous years (e.g., 2023, 2024 vs 2025 forecast). Tracks 3-year trends. | [CONFIRMED] [CLIENT-185-187] |
| **Day-of-Week Patterns** | Identifies specific daily trends (e.g., Mon=Low, Tue=Medium, Sat/Sun=Very High). Learns dynamically from historical data. | [CONFIRMED] [CLIENT-190] |
| **Early Warning System** | Generates alerts 2-3 months in advance for expected demand surges (e.g., in August: "October demand expected to increase. Start planning"). | [CONFIRMED] [CLIENT-183-184] |

### 2.2 Entity-Based Forecasting
| Dimension | Capability | Source |
| :--- | :--- | :--- |
| **Product-Wise** | Independent forecasts for all products: Chicken, Egg, Duck, Quail, Turkey. | [CONFIRMED] [CLIENT-188-189, CLIENT-204] |
| **Selling Mode** | Predicts demand by processing type (e.g., Live 5,000kg, Cleaned 8,000kg, Skinless 2,500kg, Boneless 1,500kg, Curry Cut 3,000kg). Crucial for planning processing capacity. | [CONFIRMED] [CLIENT-206] |
| **Customer/Dealer** | Micro-level forecasts. E.g., if Hotel ABC averages 100 kg/week, the system predicts 108 kg for next week based on trend. | [CONFIRMED] [CLIENT-191-192] |

## 3. Demand Drivers & Factors
The forecasting algorithm must consider the following factors [CLIENT-170-171]:
- **Historical Sales:** Previous 1-3 years of sales data.
- **Seasonality & Business Calendar:** Festival calendars, weekends, wedding seasons, local events, and holidays [CLIENT-170].
- **Customer Orders:** Forward bookings and recurring orders.
- **Market Trends:** Recent trajectory over the past 3-6 months.

## 4. Inventory Planning & Recommendations

### 4.1 Reorder & Safety Stock Calculations
- **Supplier Lead Time:** Considers variable lead times (e.g., Supplier A = 2 days, Supplier B = 5 days) [CLIENT-200].
- **Safety Stock Calculation:** Dynamic calculation based on average demand and lead time (e.g., Average Demand 500kg, Safety Stock 200kg) [CLIENT-201].
- **Reorder Point:** Current Stock + Expected Demand + Lead Time + Safety Stock = Recommended Purchase [CLIENT-198-199].

### 4.2 Actionable Recommendations
- **Dashboard Visibility:** Displays "Required next 30 days (15,000kg) - Available (4,000kg) - Expected Production (6,000kg) = Shortage (5,000kg)" [CLIENT-202-203].
- **Action:** Generates "Purchase additional 5,000kg" or "Increase production by 5,000kg" recommendations.

## 5. AI & Forecast Quality

### 5.1 Explainable AI
The system MUST explain WHY a prediction is made. 
*Example:* "Forecast is high because: Previous October sales up, 3-year trend is upward, festival demand is approaching, and current forward bookings have increased" [CLIENT-212].

### 5.2 Forecast Confidence
Each forecast must include a confidence score and a range.
*Example:* "Forecast: 15,000 kg | Range: 13,500 - 16,500 kg | Confidence: 82%" [CLIENT-211].

### 5.3 Forecast Accuracy & Continuous Learning
- **Variance Tracking:** Compares Forecast vs Actual (e.g., Forecast 15,000, Actual 14,200, Variance -800) [CLIENT-213].
- **Continuous Learning:** Each month's actual results must feed back into the algorithm to improve the next forecast automatically [CLIENT-214].
