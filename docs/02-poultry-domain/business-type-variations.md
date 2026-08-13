# Poultry Business Type Variations

This document outlines the operational and financial differences across 12 distinct business models in the poultry industry. Our ERP system must accommodate these varying requirements, workflows, and revenue/cost structures.

## 1. Broiler Farms (Independent)
- **Business Model**: Independent farmers who buy day-old chicks (DOCs) and feed, rear them to market weight (usually 35-45 days), and sell live birds to markets or processing plants.
- **Key Workflows**: Shed preparation, DOC placement, daily feeding & watering, medication/vaccination, weight sampling, depletion (selling), cleaning & resting (downtime).
- **Revenue Streams**: Sale of live adult broilers, sale of manure.
- **Cost Structure**: Feed (70%+), DOC cost, medication, labor, utilities (heating/cooling).
- **Key Metrics**: FCR (Feed Conversion Ratio), Mortality rate, Average Daily Gain (ADG), Body Weight (BW), EPEF (European Production Efficiency Factor).
- **Unique Requirements**: Needs highly accurate feed tracking and short-cycle flock management. No egg tracking required.

## 2. Layer Farms
- **Business Model**: Rearing birds specifically for commercial egg production. The cycle lasts 70-100+ weeks.
- **Key Workflows**: Pullet rearing (0-16 weeks), transfer to layer house, daily egg collection, grading & packing, lighting management, spent hen culling.
- **Revenue Streams**: Sale of commercial eggs, sale of cull/spent hens, manure.
- **Cost Structure**: Feed (ongoing for 2 years), initial pullet cost, labor for daily egg collection, packaging.
- **Key Metrics**: Hen-Day Production (%), Hen-Housed Production, Feed per Dozen Eggs, Mortality, Peak Production duration.
- **Unique Requirements**: Daily egg collection logging, grading (sizes/cracks), lighting program schedules, transfer workflows from rearing to laying phases.

## 3. Breeder Farms
- **Business Model**: Rearing parent stock (PS) or grandparent stock (GPS) to produce fertile eggs for hatcheries.
- **Key Workflows**: Strict biosecurity, male-to-female ratio management, separate feeding programs for males/females (spike feeding), frequent egg collection, grading for hatching suitability.
- **Revenue Streams**: Sale of fertile hatching eggs, sale of cull birds.
- **Cost Structure**: High genetics cost (PS chicks), specialized feed, intensive labor, high biosecurity overhead.
- **Key Metrics**: Hatching Eggs per Hen Housed, Fertility %, Hatchability %, Male/Female ratio, Body Weight Uniformity.
- **Unique Requirements**: Separate sex tracking (males vs. females in the same flock), highly stringent vaccination tracking, fertility sampling, tracking hatching egg inventory separately from commercial eggs.

## 4. Hatcheries
- **Business Model**: Receiving fertile eggs, incubating them, and hatching them into day-old chicks (DOCs) for sale or internal placement.
- **Key Workflows**: Egg receipt & fumigation, cold room storage, setting in incubators (18 days), transfer to hatchers (3 days), chick sexing, vaccination (in-ovo or spray/injection), dispatch.
- **Revenue Streams**: Sale of Day-Old Chicks (broiler or layer chicks).
- **Cost Structure**: Cost of fertile eggs, massive electricity/utility costs, specialized labor, vaccines.
- **Key Metrics**: Hatchability of Set Eggs (HOSE), Hatchability of Fertile Eggs (HOFE), Chick Quality Score, First Week Mortality.
- **Unique Requirements**: Machine (incubator/hatcher) level tracking, setting schedules, transfer schedules, chick grading, dispatch route planning.

## 5. Contract Farming (Grower & Integrator Sides)
- **Business Model**: An integrator supplies DOCs, feed, and meds. The contract grower provides housing, labor, and utilities. Integrator buys back the birds at a set rate based on performance.
- **Key Workflows**: 
  - *Integrator*: Dispatching feed/chicks to multiple farms, field supervisor visits, buy-back scheduling, grower payment calculation.
  - *Grower*: Receiving inputs, daily rearing, reporting mortality, returning empty feed bags.
- **Revenue Streams**: 
  - *Integrator*: Sale of final processed or live birds.
  - *Grower*: Growing fee/commission per kg of bird produced, plus performance bonuses (low FCR, low mortality).
- **Cost Structure**: 
  - *Integrator*: Feed, chicks, logistics, grower fees.
  - *Grower*: Shed maintenance, electricity, labor.
- **Key Metrics**: Growing Cost, FCR, Mortality, Transport Shrinkage, Grower settlement variance.
- **Unique Requirements**: Complex settlement calculations based on standard vs. actual FCR/mortality, field supervisor mobile app, input dispatch tracking.

## 6. Integrated Poultry Companies
- **Business Model**: Owns the entire supply chain (Breeder -> Hatchery -> Feed Mill -> Broiler/Layer -> Processing Plant -> Retail).
- **Key Workflows**: Internal transfers between all divisions without traditional cash sales. Inter-company invoicing.
- **Revenue Streams**: Sale of branded chicken meat, processed products, or table eggs to retail/wholesale.
- **Cost Structure**: Consolidated costs across all divisions.
- **Key Metrics**: Total Cost to Produce a kg of Meat (from grandparent to slaughter), overall supply chain yield.
- **Unique Requirements**: Complex inter-company transfers, mass balance accounting, supply chain forecasting (e.g., how many breeder eggs needed today to meet retail demand in 10 weeks).

## 7. Feed Mills
- **Business Model**: Manufacturing poultry feed for internal use (integrated) or external sale.
- **Key Workflows**: Raw material procurement, lab testing, grinding & mixing (batching), pelleting/crumbling, bagging or bulk loading, dispatch.
- **Revenue Streams**: Sale of feed (starter, grower, finisher, layer mash, etc.).
- **Cost Structure**: Raw materials (corn, soy, premixes) (90%+), energy for milling, labor.
- **Key Metrics**: Feed Yield, Production Rate (Tons/Hour), Cost per Ton, Shrinkage/Wastage.
- **Unique Requirements**: Formulation/Recipe management, raw material inventory, weighbridge integration, quality control (QC) tracking.

## 8. Poultry Dealers / Traders
- **Business Model**: Middlemen who buy live birds/eggs from farms and sell to retailers or processing plants.
- **Key Workflows**: Procurement scheduling, weighbridge operations, transport logistics, temporary holding.
- **Revenue Streams**: Margin on trading live birds or eggs.
- **Cost Structure**: Transport/logistics, transit mortality, weight shrinkage.
- **Key Metrics**: Transit Mortality, Weight Shrinkage (%), Margin per Kg/Dozen.
- **Unique Requirements**: Logistics and fleet management, weighbridge integration, multiple supplier/customer ledgers.

## 9. Egg Businesses (Collection, Grading, Distribution)
- **Business Model**: Buying ungraded eggs from farms, grading them by weight/quality, packaging, and distributing to retail.
- **Key Workflows**: Egg collection, automated sorting/grading, candling (checking for cracks/blood spots), packing into cartons, cold chain transport.
- **Revenue Streams**: Premium priced graded eggs, liquid egg sales (from cracks/rejects).
- **Cost Structure**: Raw egg cost, packaging materials, grading machinery maintenance, transport.
- **Key Metrics**: Grade Yield (e.g., % of Jumbo vs. Medium), Rejection Rate, Packing efficiency.
- **Unique Requirements**: Traceability (batch codes on eggs), grading machine API integration, packaging inventory.

## 10. Chick Businesses
- **Business Model**: Specialized businesses focusing solely on chick distribution or importing high-value genetics (GPS/PS).
- **Key Workflows**: Importing, quarantine, specialized climate-controlled transport.
- **Revenue Streams**: Sale of premium genetics.
- **Cost Structure**: Air freight, insurance, high mortality risk costs.
- **Key Metrics**: Transit Mortality, DOA (Dead on Arrival) %, Customer First-Week Mortality.
- **Unique Requirements**: Import/Export documentation tracking, extreme temperature monitoring during transit.

## 11. Multi-Farm Organizations
- **Business Model**: A single company operating multiple independent farm sites of the same type (e.g., 5 different layer farms).
- **Key Workflows**: Standardized reporting across farms, shared resource allocation (e.g., one maintenance team).
- **Revenue Streams**: Aggregate sales from all farms.
- **Cost Structure**: Farm-specific costs + central HQ overhead.
- **Key Metrics**: Cross-farm benchmarking (Farm A vs. Farm B performance).
- **Unique Requirements**: Multi-location inventory, user access control by location, consolidated financial reporting.

## 12. Multi-Company Organizations
- **Business Model**: A holding company that owns several distinct poultry businesses (e.g., a feed mill company, a farming company, a processing company) operating as separate legal entities.
- **Key Workflows**: Board-level reporting, inter-company trading at market rates.
- **Revenue Streams**: Dividends from subsidiaries.
- **Cost Structure**: Holding company overheads.
- **Key Metrics**: ROI per subsidiary, Consolidated EBITDA.
- **Unique Requirements**: Multi-tenant database architecture, distinct chart of accounts per company, consolidated roll-up reporting.

---
*Note: Assumptions are made regarding standard industry margins and workflows. Specific regional variations [OPEN_RESEARCH_ITEM] may apply based on local regulations.*
