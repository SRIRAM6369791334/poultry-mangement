# Poultry Calculations & Formulas
This document details the core calculations, KPIs, and performance metrics used in the Poultry Management ERP.

### Mortality % (Daily & Cumulative)
- **Rule ID**: BR-CALC-001
- **Purpose**: Measure the death rate of the flock to identify health issues.
- **Formula**:
  - Daily: `(Daily Deaths / Opening Live Birds for the Day) * 100`
  - Cumulative: `(Total Deaths to Date / Initial Birds Placed) * 100`
- **Input Fields**: `daily_deaths`, `opening_birds`, `total_deaths`, `initial_placement`
- **Output Fields**: `daily_mortality_percent` (%), `cum_mortality_percent` (%)
- **Example**: 50 total deaths in a flock of 10,000 = 0.5%
- **Source**: [Source: Cobb Broiler Management Guide]
- **Validation Rules**: Must be between 0 and 100.
- **Edge Cases**: If initial placement is 0, return 0.

### Livability %
- **Rule ID**: BR-CALC-002
- **Purpose**: Measure the percentage of birds surviving.
- **Formula**: `100 - Cumulative Mortality %` or `(Current Live Birds / Initial Birds Placed) * 100`
- **Input Fields**: `cum_mortality_percent`
- **Output Fields**: `livability_percent` (%)
- **Example**: 100 - 0.5 = 99.5%
- **Source**: [Source: Aviagen Ross Manual]
- **Validation Rules**: Must be between 0 and 100.
- **Edge Cases**: Cannot exceed 100 unless miscounts occurred during placement (adjusted placement required).

### Feed Conversion Ratio (FCR) - Cumulative
- **Rule ID**: BR-CALC-003
- **Purpose**: Measure the efficiency of a flock in converting feed into live body weight.
- **Formula**: `Total Feed Consumed (kg) / Total Live Weight Gained (kg)`
- **Input Fields**: `total_feed_consumed`, `total_live_weight`, `initial_chick_weight`
- **Output Fields**: `fcr` (ratio)
- **Example**: 3,000 kg feed / 2,000 kg weight gain = 1.50 FCR
- **Source**: [Source: Cobb Broiler Management Guide]
- **Validation Rules**: Typically between 1.0 and 2.5 for broilers.
- **Edge Cases**: If weight gained is 0, FCR is undefined (or null).

### Adjusted/Corrected FCR
- **Rule ID**: BR-CALC-004
- **Purpose**: Normalize FCR to a standard target weight for benchmarking across batches.
- **Formula**: `Actual FCR + ((Target Weight - Actual Weight) / Factor)`
  *Note: Factor is typically 30g (0.03 kg) per 1 point (0.01) of FCR, or 3kg/point. Formula variation depends on standard.*
- **Input Fields**: `actual_fcr`, `actual_weight`, `target_weight`, `fcr_adjustment_factor`
- **Output Fields**: `adjusted_fcr` (ratio)
- **Example**: FCR 1.50, Actual Wt 2.2kg, Target Wt 2.0kg. Adj = 1.50 + ((2.0 - 2.2) / 3.0) = 1.50 - 0.066 = 1.434
- **Source**: [Source: Aviagen Ross Manual]
- **Validation Rules**: Target weight must be > 0.
- **Edge Cases**: Adjustment can be negative or positive depending on weight diff.

### Average Daily Gain (ADG)
- **Rule ID**: BR-CALC-005
- **Purpose**: Measure the average daily growth rate of the birds.
- **Formula**: `Total Weight Gain (g) / Age (Days)`
- **Input Fields**: `total_weight_gain`, `flock_age_days`
- **Output Fields**: `adg` (g/day)
- **Example**: 2500g gain / 35 days = 71.4 g/day
- **Source**: [Source: Poultry Industry Standard]
- **Validation Rules**: Age must be > 0.
- **Edge Cases**: Day 0 calculations should be skipped.

### Average Body Weight
- **Rule ID**: BR-CALC-006
- **Purpose**: Track the size of the birds.
- **Formula**: `Total Sample Weight (kg) / Number of Birds Weighed`
- **Input Fields**: `sample_weight_total`, `sample_bird_count`
- **Output Fields**: `avg_body_weight` (kg or g)
- **Example**: 50 kg / 25 birds = 2.0 kg/bird
- **Source**: [Source: Poultry Industry Standard]
- **Validation Rules**: Bird count must be > 0.
- **Edge Cases**: Empty sample should yield null.

### Coefficient of Variation (Uniformity)
- **Rule ID**: BR-CALC-007
- **Purpose**: Determine the evenness of the flock size.
- **Formula**: `(Standard Deviation of Sample Weights / Mean Sample Weight) * 100`
- **Input Fields**: `sample_weights[]`
- **Output Fields**: `cv_percent` (%)
- **Example**: Std Dev = 0.2kg, Mean = 2.0kg -> (0.2 / 2.0) * 100 = 10%
- **Source**: [Source: Aviagen Breeder Management Guide]
- **Validation Rules**: Typically between 5% and 15%.
- **Edge Cases**: Single bird sample gives undefined/0 std dev.

### European Production Efficiency Factor (EPEF)
- **Rule ID**: BR-CALC-008
- **Purpose**: Provide a single index for technical performance in broilers.
- **Formula**: `(Livability % × Average Live Weight (kg)) / (Age in Days × FCR) × 100`
- **Input Fields**: `livability_percent`, `avg_body_weight`, `flock_age_days`, `fcr`
- **Output Fields**: `epef_score`
- **Example**: (95 * 2.5) / (35 * 1.5) * 100 = 237.5 / 52.5 * 100 = 452
- **Source**: [Source: Cobb Broiler Management Guide]
- **Validation Rules**: Age and FCR > 0. EPEF usually 200 - 500.
- **Edge Cases**: Extremely high/low FCR can skew results drastically.

### Production Index
- **Rule ID**: BR-CALC-009
- **Purpose**: Alternative performance metric similar to EPEF.
- **Formula**: `(Average Daily Gain (kg) x Livability %) / FCR * 100`
- **Input Fields**: `adg_kg`, `livability_percent`, `fcr`
- **Output Fields**: `production_index`
- **Example**: (0.071 * 95) / 1.5 * 100 = 449
- **Source**: [Source: Poultry Industry Standard]
- **Validation Rules**: FCR must be > 0.
- **Edge Cases**: Early days result in wildly swinging indices.

### Hen-Day Egg Production %
- **Rule ID**: BR-CALC-010
- **Purpose**: Measure the laying efficiency of the surviving flock on any given day.
- **Formula**: `(Total Eggs Produced in a Day / Number of Live Hens that Day) * 100`
- **Input Fields**: `daily_egg_count`, `live_hen_count`
- **Output Fields**: `hen_day_percent` (%)
- **Example**: 900 eggs / 1000 hens * 100 = 90%
- **Source**: [Source: Hy-Line Layer Management Guide]
- **Validation Rules**: Can occasionally exceed 100% for a single day due to timing, but usually <= 100%.
- **Edge Cases**: 0 live hens returns 0.

### Hen-Housed Egg Production %
- **Rule ID**: BR-CALC-011
- **Purpose**: Measure cumulative laying performance relative to the initial investment in pullets.
- **Formula**: `(Total Eggs Produced in a Period / Initial Number of Hens Housed) * 100` (often used to calculate cumulative eggs/hen-housed).
- **Input Fields**: `total_eggs_produced`, `initial_hens_housed`
- **Output Fields**: `hen_housed_eggs` or `hen_housed_percent`
- **Example**: 25,000 eggs / 1,000 hens = 25 eggs per hen housed.
- **Source**: [Source: Hy-Line Layer Management Guide]
- **Validation Rules**: Initial hens > 0.
- **Edge Cases**: High mortality drops this number significantly compared to Hen-Day %.

### Egg Mass (g/hen/day)
- **Rule ID**: BR-CALC-012
- **Purpose**: Measure the total weight of eggs produced per hen, factoring in both lay rate and egg size.
- **Formula**: `(Hen-Day % / 100) * Average Egg Weight (g)`
- **Input Fields**: `hen_day_percent`, `avg_egg_weight`
- **Output Fields**: `egg_mass` (g)
- **Example**: 0.90 * 60g = 54 g/hen/day
- **Source**: [Source: Hy-Line Layer Management Guide]
- **Validation Rules**: Egg weight usually 40g - 75g.
- **Edge Cases**: Null if no eggs are weighed.

### Feed Conversion per dozen eggs
- **Rule ID**: BR-CALC-013
- **Purpose**: Assess feed efficiency in layer operations (volume-based).
- **Formula**: `Total Feed Consumed (kg) / (Total Eggs Produced / 12)`
- **Input Fields**: `total_feed_consumed`, `total_eggs_produced`
- **Output Fields**: `fcr_per_dozen` (kg feed/dozen)
- **Example**: 120 kg feed / (900 eggs / 12) = 120 / 75 = 1.6 kg/dozen
- **Source**: [Source: Poultry Industry Standard]
- **Validation Rules**: Total eggs > 0.
- **Edge Cases**: 0 eggs laid results in error/null.

### Feed Conversion per kg egg mass
- **Rule ID**: BR-CALC-014
- **Purpose**: Assess feed efficiency in layer operations (mass-based).
- **Formula**: `Total Feed Consumed (kg) / Total Egg Mass Produced (kg)`
- **Input Fields**: `total_feed_consumed`, `total_egg_mass_kg`
- **Output Fields**: `fcr_per_kg_egg` (ratio)
- **Example**: 120 kg feed / 54 kg egg mass = 2.22
- **Source**: [Source: Hy-Line Layer Management Guide]
- **Validation Rules**: Egg mass > 0.
- **Edge Cases**: 0 mass gives null.

### Hatchability of total eggs set
- **Rule ID**: BR-CALC-015
- **Purpose**: Evaluate overall hatchery performance and egg quality.
- **Formula**: `(Total Chicks Hatched / Total Eggs Set) * 100`
- **Input Fields**: `total_chicks_hatched`, `total_eggs_set`
- **Output Fields**: `hatchability_set_percent` (%)
- **Example**: 8,500 chicks / 10,000 eggs = 85.0%
- **Source**: [Source: Aviagen Breeder Management Guide]
- **Validation Rules**: Must be <= 100%.
- **Edge Cases**: 0 eggs set = 0.

### Hatchability of fertile eggs
- **Rule ID**: BR-CALC-016
- **Purpose**: Evaluate the incubation process independently from flock fertility.
- **Formula**: `(Total Chicks Hatched / Fertile Eggs) * 100`
- **Input Fields**: `total_chicks_hatched`, `fertile_eggs`
- **Output Fields**: `hatchability_fertile_percent` (%)
- **Example**: 8,500 chicks / 9,000 fertile eggs = 94.4%
- **Source**: [Source: Aviagen Breeder Management Guide]
- **Validation Rules**: Fertile eggs > 0.
- **Edge Cases**: Cannot exceed 100.

### Fertility %
- **Rule ID**: BR-CALC-017
- **Purpose**: Measure the reproductive success of the breeder flock.
- **Formula**: `(Total Fertile Eggs / Total Eggs Set) * 100`
- **Input Fields**: `fertile_eggs`, `total_eggs_set`
- **Output Fields**: `fertility_percent` (%)
- **Example**: 9,000 fertile / 10,000 set = 90.0%
- **Source**: [Source: Aviagen Breeder Management Guide]
- **Validation Rules**: Must be <= 100%.
- **Edge Cases**: Requires candling data.

### Saleable Chick %
- **Rule ID**: BR-CALC-018
- **Purpose**: Measure the quality of the hatch.
- **Formula**: `(Saleable Chicks / Total Chicks Hatched) * 100`
- **Input Fields**: `saleable_chicks`, `total_chicks_hatched`
- **Output Fields**: `saleable_chick_percent` (%)
- **Example**: 8,400 saleable / 8,500 hatched = 98.8%
- **Source**: [Source: Poultry Industry Standard]
- **Validation Rules**: Saleable cannot exceed total hatched.
- **Edge Cases**: Culls + Saleable should equal Total Hatched.

### Cost per bird placed
- **Rule ID**: BR-CALC-019
- **Purpose**: Determine the total investment relative to initial flock size.
- **Formula**: `Total Batch Costs / Initial Birds Placed`
- **Input Fields**: `total_costs`, `initial_placement`
- **Output Fields**: `cost_per_bird_placed` (Currency)
- **Example**: $15,000 / 10,000 birds = $1.50/bird
- **Source**: [ASSUMPTION: Standard Managerial Accounting]
- **Validation Rules**: Initial placement > 0.
- **Edge Cases**: Costs update continuously until batch close.

### Cost per kg live weight
- **Rule ID**: BR-CALC-020
- **Purpose**: Determine the unit cost of production for meat.
- **Formula**: `Total Batch Costs / Total Live Weight Harvested (kg)`
- **Input Fields**: `total_costs`, `total_live_weight_harvested`
- **Output Fields**: `cost_per_kg_live` (Currency/kg)
- **Example**: $15,000 / 22,000 kg = $0.68/kg
- **Source**: [ASSUMPTION: Standard Managerial Accounting]
- **Validation Rules**: Weight > 0.
- **Edge Cases**: Zero weight (complete flock failure) yields infinite/null cost per kg.

### Cost per egg
- **Rule ID**: BR-CALC-021
- **Purpose**: Determine the unit cost of production for eggs.
- **Formula**: `Total Production Costs for Period / Total Eggs Produced`
- **Input Fields**: `total_period_costs`, `total_eggs_produced`
- **Output Fields**: `cost_per_egg` (Currency)
- **Example**: $1,000 / 10,000 eggs = $0.10/egg
- **Source**: [ASSUMPTION: Standard Managerial Accounting]
- **Validation Rules**: Eggs > 0.
- **Edge Cases**: Pre-lay period generates costs but 0 eggs (costs must be capitalized).

### Cost per dozen eggs
- **Rule ID**: BR-CALC-022
- **Purpose**: Standard commercial unit cost for layers.
- **Formula**: `Cost per egg * 12`
- **Input Fields**: `cost_per_egg`
- **Output Fields**: `cost_per_dozen` (Currency)
- **Example**: $0.10 * 12 = $1.20/dozen
- **Source**: [ASSUMPTION: Standard Managerial Accounting]
- **Validation Rules**: Derived from valid cost per egg.
- **Edge Cases**: Same as cost per egg.

### Revenue per bird
- **Rule ID**: BR-CALC-023
- **Purpose**: Measure average income generated per harvested bird.
- **Formula**: `Total Revenue / Total Birds Sold`
- **Input Fields**: `total_revenue`, `total_birds_sold`
- **Output Fields**: `revenue_per_bird` (Currency)
- **Example**: $20,000 / 9,500 birds = $2.10/bird
- **Source**: [ASSUMPTION: Standard Financial Reporting]
- **Validation Rules**: Sold > 0.
- **Edge Cases**: Excludes birds given away or consumed on farm.

### Gross Margin per bird
- **Rule ID**: BR-CALC-024
- **Purpose**: Assess fundamental profitability per unit.
- **Formula**: `(Total Revenue - Cost of Goods Sold) / Total Birds Sold`
- **Input Fields**: `total_revenue`, `cogs`, `total_birds_sold`
- **Output Fields**: `gross_margin_per_bird` (Currency)
- **Example**: ($20,000 - $14,000) / 9,500 = $0.63/bird
- **Source**: [ASSUMPTION: Standard Financial Reporting]
- **Validation Rules**: None.
- **Edge Cases**: Can be negative if costs exceed revenue.

### Net Profit per batch
- **Rule ID**: BR-CALC-025
- **Purpose**: Total bottom-line profit for a specific flock/batch.
- **Formula**: `Total Batch Revenue - Total Batch Expenses (including overhead allocations)`
- **Input Fields**: `total_batch_revenue`, `total_batch_expenses`
- **Output Fields**: `net_profit_batch` (Currency)
- **Example**: $20,000 - $17,000 = $3,000
- **Source**: [ASSUMPTION: Standard Financial Reporting]
- **Validation Rules**: Requires batch to be "Closed".
- **Edge Cases**: Partial liquidation requires interim estimates.

### Feed cost as % of total cost
- **Rule ID**: BR-CALC-026
- **Purpose**: Track the largest input cost proportion (normally 60-70%).
- **Formula**: `(Total Feed Cost / Total Production Cost) * 100`
- **Input Fields**: `total_feed_cost`, `total_production_cost`
- **Output Fields**: `feed_cost_percent` (%)
- **Example**: ($10,000 / $15,000) * 100 = 66.6%
- **Source**: [Source: Poultry Industry Standard]
- **Validation Rules**: Total cost > 0.
- **Edge Cases**: 0 total costs yields 0.

### Medicine cost per bird
- **Rule ID**: BR-CALC-027
- **Purpose**: Monitor health expenditures.
- **Formula**: `Total Medicine and Vaccine Cost / Initial Birds Placed`
- **Input Fields**: `total_med_cost`, `initial_placement`
- **Output Fields**: `med_cost_per_bird` (Currency)
- **Example**: $300 / 10,000 = $0.03/bird
- **Source**: [ASSUMPTION: Standard Managerial Accounting]
- **Validation Rules**: Initial placement > 0.
- **Edge Cases**: None.

### Growing charges per bird (Contract Farming)
- **Rule ID**: BR-CALC-028
- **Purpose**: Calculate baseline pay for contract farmers.
- **Formula**: `Base Rate per kg * Total Live Weight Produced (kg)` (Can also be per bird)
- **Input Fields**: `contract_base_rate`, `total_live_weight`
- **Output Fields**: `base_growing_charge` (Currency)
- **Example**: $0.15/kg * 22,000 kg = $3,300
- **Source**: [Source: Industry Contract Farming Models]
- **Validation Rules**: Weight > 0.
- **Edge Cases**: If farm is penalized for excessive mortality, adjusted rate is used.

### Performance bonus/penalty calculation
- **Rule ID**: BR-CALC-029
- **Purpose**: Calculate incentives for contract farmers based on FCR/EPEF.
- **Formula**: `If Actual FCR < Target FCR, Bonus = (Target FCR - Actual FCR) * Bonus Factor * Weight. Else Penalty = (Actual FCR - Target FCR) * Penalty Factor * Weight`
- **Input Fields**: `actual_fcr`, `target_fcr`, `bonus_factor`, `penalty_factor`, `total_live_weight`
- **Output Fields**: `performance_adjustment` (Currency)
- **Example**: Target FCR 1.6, Actual 1.5. Bonus = (0.1) * $0.05 * 22,000 = $110
- **Source**: [Source: Industry Contract Farming Models]
- **Validation Rules**: Based on contract terms.
- **Edge Cases**: Caps on maximum bonus/penalty may apply.

### Break-even price
- **Rule ID**: BR-CALC-030
- **Purpose**: Identify the minimum selling price to avoid loss.
- **Formula**: `Total Costs / Total Output Quantity (kg or birds or eggs)`
- **Input Fields**: `total_costs`, `total_output`
- **Output Fields**: `breakeven_price` (Currency)
- **Example**: $15,000 / 22,000 kg = $0.68/kg
- **Source**: [ASSUMPTION: Standard Managerial Accounting]
- **Validation Rules**: Output > 0.
- **Edge Cases**: Cannot be calculated until flock is harvested.
