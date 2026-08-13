# Integrated Poultry Company Business Chain

## 1. End-to-End Business Flow
An Integrated Poultry Company (Integrator) owns and operates multiple nodes in the poultry supply chain, allowing for complete control over genetics, nutrition, production, and processing.

### 1.1 Breeder Farms
- **Purpose**: Rear parent stock (PS) to produce fertile hatching eggs.
- **Inputs**: Day-Old Parent Stock (purchased from primary breeders like Cobb-Vantress, Aviagen), Breeder Feed (from own feed mill), Vaccines.
- **Outputs**: Fertile hatching eggs, Cull birds (spent hens/roosters at end of cycle).
- **Internal Transfer**: Fertile eggs are collected, graded, and transferred to the Hatchery.
- **Financial Flow**: Costs accumulated (feed, labor, depreciation). Internal transfer pricing applied to fertile eggs sent to the hatchery.

### 1.2 Hatchery
- **Purpose**: Incubate fertile eggs and hatch Day-Old Chicks (DOC).
- **Inputs**: Fertile hatching eggs (from own breeder farms).
- **Outputs**: Day-Old Chicks (Broiler or Layer), Cull chicks, unhatched eggs.
- **Internal Transfer**: DOCs are dispatched to own broiler farms or contract growers. Excess DOCs may be sold to the open market.
- **Financial Flow**: Hatchery adds incubation costs to the egg cost. Transfer price set for DOCs supplied to broiler division.

### 1.3 Feed Mill
- **Purpose**: Formulate and produce balanced feed for all life stages.
- **Inputs**: Raw materials (Maize, Soya, Premixes, Medicines).
- **Outputs**: Breeder Feed, Starter/Grower/Finisher Broiler Feed, Layer Feed.
- **Internal Transfer**: Dispatched to Breeder Farms and Broiler Farms (own and contract).
- **Financial Flow**: Raw material costs + milling/overhead costs. Feed is "sold" internally to farms at transfer price or actual cost.

### 1.4 Broiler Farms (Own & Contract)
- **Purpose**: Grow DOCs to market weight.
- **Inputs**: DOCs (from Hatchery), Feed (from Feed Mill), Medicines, Veterinary Support.
- **Outputs**: Live market-weight broilers.
- **Internal Transfer**: Live birds transferred to the Processing Plant or sold live to market dealers.
- **Financial Flow (Own)**: Farm accumulates DOC cost, feed cost, and rearing expenses.
- **Financial Flow (Contract)**: Integrator retains ownership of birds and feed. Farmer is paid a growing fee based on performance (FCR, Mortality, EEF) upon harvest.

### 1.5 Processing Plant (Abattoir)
- **Purpose**: Slaughter, process, and package birds.
- **Inputs**: Live birds (from own/contract farms).
- **Outputs**: Dressed whole birds, portions (breast, wings, legs), value-added products, by-products (feathers, offal).
- **Sales Flow**: Products sold to retail, wholesale, restaurants (B2B/B2C).
- **Financial Flow**: Integrates live bird cost + processing cost + packaging. Final profit center for the company.

### 1.6 Sales & Distribution
- **Purpose**: Cold chain logistics and final sale.
- **Inputs**: Processed products from the plant.
- **Outputs**: Cash/Receivables from customers.
- **Financial Flow**: Final realization of revenue. Consolidates profit margins from all upstream divisions.

## 2. Inter-Division Transfers & Pricing
- **Transfer Pricing**: A critical ERP feature. Divisions operate as separate profit/cost centers.
  - *Example*: Feed Mill sells to Broiler Farm at Cost + X% markup. The ERP must track the "true cost" vs "transfer cost" to calculate corporate consolidated profit.
- **Inter-Company Reconciliations**: Eliminating internal markups during corporate financial consolidation.

## 3. Consolidated Reporting
- **Traceability**: Ability to trace a processed chicken back to the specific broiler flock, the specific batch of feed they ate, the hatchery incubator they came from, and the parent breeder flock.
- **Cost Roll-up**: Total cost of production per kg of processed meat = (Breeder cost per egg + Hatchery cost per chick + Feed cost + Broiler rearing cost + Processing cost).

## 4. Key Calculations & Formulas

### 4.1 Hatchability %
- **Formula**: `(Number of Saleable Chicks Hatched / Number of Eggs Set) * 100`
- **Source**: Aviagen Hatchery Manual.

### 4.2 Meat Yield %
- **Formula**: `(Weight of Dressed Carcass / Live Weight at Slaughter) * 100`
- **Standard**: Typically 70-75% depending on processing type (e.g., blood and feathers removed vs. fully eviscerated).
- **Source**: Industry standard processing metrics.

### 4.3 Total Cost per Kg Processed Meat
- **Formula**: `(Total Live Bird Cost + Processing Costs) / Total Yielded Meat (kg)`
- **Edge Cases**: Allocation of costs to by-products (e.g., rendering offal for pet food) reduces the net cost of the primary meat products.
