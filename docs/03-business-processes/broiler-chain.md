# Broiler Business Chain

## 1. End-to-End Business Flow
### 1.1 Organization & Master Data Setup
- **Steps**: Define Farms, Sheds (capacity, area), Breeds, Standard Curves (Target Weight, FCR per day), Feed types, Vaccine catalogs.
- **Validations**: Shed capacity must have valid length/width.

### 1.2 Placement
- **Trigger**: Hatchery dispatch or Vendor invoice.
- **Action**: Day Old Chicks (DOC) arrive at Shed.
- **Data Captured**: Date, Quantity, Supplier, Breed, Average DOC weight (usually 35-45g).
- **Edge Cases**: DOA (Dead on Arrival) chicks. Must be subtracted from placed quantity.

### 1.3 Daily Operations (Days 1 - Harvest)
- **Workflow**: Farm supervisor enters daily data.
- **Data Captured**: Mortality, Feed Consumed (kg), Water Consumed (L), Temperature (Min/Max).
- **Validations**: Feed consumed cannot exceed shed inventory. Mortality cannot exceed current live bird balance.

### 1.4 Weekly Growth Monitoring
- **Trigger**: Weekly sample weighing.
- **Data Captured**: Sample size, Total weight of sample.
- **Decision Point**: If Uniformity < 80%, trigger corrective action (adjust feeders, waterers).

### 1.5 Harvest & Bird Sale
- **Trigger**: Birds reach target weight (e.g., 2.2 kg at Day 35).
- **Steps**: Catching plan -> Truck allocation -> Tare weight -> Loading -> Gross weight -> Dispatch.
- **Data Captured**: Buyer, Number of birds loaded, Net Live Weight, DO (Delivery Order) number.
- **Edge Cases**: Mortality during transit (DOA at plant/market). Buyer disputes weight (weighbridge discrepancy).

### 1.6 Batch Closing & Financials
- **Trigger**: Shed balance = 0.
- **Steps**: Reconcile feed stock (return to store), calculate KPIs, generate P&L for the batch.

---

## 2. Contract Farming Variant
In Contract Farming (Integration):
- **Structure**: The Integrator (SaaS client) owns the chicks, feed, and medicine. The Farmer provides land, shed, labor, and electricity.
- **Workflow Differences**:
  - **Placement**: Transferred to farmer as inventory, not sold.
  - **Feed/Meds**: Issued as "Contractor Issues".
  - **Harvest**: Integrator "lifts" the birds.
  - **Payment/Settlement**: Farmer is paid a "Growing Charge" (e.g., $0.10 per kg of live weight produced), plus bonuses for good FCR/EEF, and penalties for high mortality.

---

## 3. Key Calculations & Formulas

### 3.1 Mortality %
- **Formula**: `(Total Dead Birds / Initial Birds Placed) * 100`
- **Inputs**: Initial Birds Placed, Cumulative Dead Birds.
- **Output**: Percentage (e.g., 4.5%).
- **Example**: Placed 10,000. Dead over 35 days = 450. `(450 / 10000) * 100 = 4.5%`.
- **Source**: Standard Poultry Science.
- **Edge Cases**: Does not include culled birds in some regions, but generally Dead + Culled = Total Mortality.

### 3.2 Livability %
- **Formula**: `100 - Mortality %` OR `(Birds Sold / Initial Birds Placed) * 100`
- **Example**: 100 - 4.5% = 95.5%.

### 3.3 FCR (Feed Conversion Ratio)
- **Formula**: `Total Feed Consumed (kg) / Total Live Weight Produced (kg)`
- **Inputs**: Total Feed Consumed, Total Net Weight of birds sold.
- **Output**: Ratio (e.g., 1.55).
- **Example**: 10,000 birds ate 34,000 kg feed. Yielded 22,000 kg live weight. `34,000 / 22,000 = 1.545 FCR`.
- **Source**: Aviagen Ross Broiler Manual.
- **Edge Cases**: Adjusted FCR accounts for the estimated weight of dead birds to evaluate feed quality accurately, separate from disease issues.

### 3.4 ADG (Average Daily Gain)
- **Formula**: `(Average Final Weight (g) - Average Initial Weight (g)) / Age in Days`
- **Inputs**: Final avg weight, DOC avg weight, Slaughter Age.
- **Output**: Grams per bird per day (e.g., 60 g/day).
- **Example**: `(2200g - 40g) / 35 days = 61.7 g/day`.
- **Source**: Cobb Broiler Management Guide.

### 3.5 EEF (European Production Efficiency Factor)
- **Formula**: `(Livability % * Average Live Weight in kg) / (Age in Days * FCR) * 100`
- **Inputs**: Livability (95.5), Avg Weight (2.2kg), Age (35), FCR (1.55).
- **Output**: Index number (Higher is better, standard is 350-450+).
- **Example**: `(95.5 * 2.2) / (35 * 1.55) * 100 = 210.1 / 54.25 * 100 = 387`.
- **Source**: Global standard used by all primary breeders (Cobb, Ross).
- **Edge Cases**: Partial thinning makes age calculation complex; average age (weighted by birds harvested) must be used.

### 3.6 Cost per Bird
- **Formula**: `Total Batch Costs / Number of Birds Sold`
- **Example**: Total costs $30,000. Birds sold 9,550. `30,000 / 9550 = $3.14 per bird`.

### 3.7 Cost per Kg Live Weight (Production Cost)
- **Formula**: `Total Batch Costs / Total Live Weight Sold (kg)`
- **Inputs**: Total DOC cost + Feed Cost + Medicine Cost + Labor/Overheads.
- **Example**: Costs $30,000. Live weight 21,010 kg. `30,000 / 21010 = $1.42 per kg`.
- **Source**: Standard Accounting Practice.
