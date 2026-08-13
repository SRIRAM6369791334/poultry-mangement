# Feed Management Requirements

## 1. Overview
Feed constitutes the biggest cost in poultry farming. Strict inventory control, consumption tracking, and performance analysis are mandatory.

## 2. Feed Types [PROPOSED]
Feed must be categorized by bird age/stage:
- Pre-starter
- Starter
- Grower
- Finisher

## 3. Feed Workflow (CLIENT-009) [CONFIRMED]
The standard flow of feed:
1. **Supplier:** Order placed via PO.
2. **Warehouse:** Received via GRN, added to Stock.
3. **Farm Request:** Farm manager requests feed.
4. **Approval:** Office approves request.
5. **Feed Issue:** Transported to Farm.
6. **Consumption:** Recorded against Farm/Shed/Batch.
7. **Stock Deduction:** Automatic deduction from Farm/Warehouse stock.

## 4. Feed Stock Management & Problem Mitigation (CLIENT-009) [CONFIRMED]
The system must prevent or handle the following problems:
- **Wrong Feed Type:** Validation checks preventing Finisher feed being issued to Day 1 chicks.
- **Wrong Quantity / Wrong Farm:** Strict GRN and dispatch verification.
- **Duplicate Issue:** Warning on issuing to the same batch twice in a short period.
- **Negative Stock Prevention:** The system must NEVER allow feed stock to go negative.
- **Damaged/Expired Feed:** Tracking of shelf life and alerts for expiring feed.
- **Feed Return:** Workflow for returning unused/damaged feed from Farm back to Warehouse.

## 5. Daily Consumption Tracking [CONFIRMED]
- Consumption is recorded at the **Batch level** daily.
- Workers log bags/kg consumed.

## 6. Cost Tracking & Metrics (CLIENT-010) [CONFIRMED]
The system must provide the following calculations per batch:
- **Feed Consumption:** (Purchased/Issued + Opening Stock) - Closing Stock
- **Batch-wise Feed Cost:** Total value of feed consumed by the batch.
- **Feed per kg:** Total feed consumed / Total live weight produced.
- **Feed per bird:** Total feed consumed / Total birds.
- **FCR (Feed Conversion Ratio):** Feed consumed / Weight gained.
- **FCR Trend:** Visual graph comparing current batch FCR against standard targets.

## 7. Feed Wastage Tracking [INFERRED]
- A separate entry for spilled or spoiled feed to distinguish it from actual bird consumption, ensuring FCR calculations remain accurate.
