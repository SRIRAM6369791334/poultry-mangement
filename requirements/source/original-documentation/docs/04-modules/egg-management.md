# Egg Management Module

## 1. Module Overview
The Egg Management Module handles all processes post-laying. It bridges farm production and sales by managing collection, grading, inventory, and dispatch. This module must track traceability from the consumer back to the specific flock and house.

## 2. Egg Collection Workflows
- **Trigger:** Daily routine (often multiple times a day).
- **Manual Collection:** Workers collect eggs into flats. System logs totals per house/row.
- **Automated Collection:** Belts transport eggs to a central packing room. System integrates with egg counters (e.g., Fancom, Big Dutchman) via API.
- **Initial Categorization:** Separation of "Good/Settable/Saleable" eggs from floor eggs, dirties, and obvious cracks.

## 3. Egg Grading System
Grading involves evaluating both interior/exterior quality and weight.

### 3.1 Quality Grading (e.g., USDA standard)
- **Grade AA / A:** Clean, unbroken shell, normal shape, small air cell.
- **Grade B:** Unbroken but may have slight stains, irregular shape. Often used for liquid/powdered egg products.
- **Rejects:** Leakers, severe cracks, meat/blood spots.

### 3.2 Weight Grading / Sizing (USDA Standards)
Based on the minimum net weight per dozen. Equipment sorts individual eggs accordingly:
- **Jumbo:** Minimum 30 oz/dozen (~850g) → Individual egg approx. >70.9g
- **Extra Large:** Minimum 27 oz/dozen (~765g) → Individual egg approx. 63.8g - 70.9g
- **Large:** Minimum 24 oz/dozen (~680g) → Individual egg approx. 56.7g - 63.8g (Industry Standard)
- **Medium:** Minimum 21 oz/dozen (~595g) → Individual egg approx. 49.6g - 56.7g
- **Small:** Minimum 18 oz/dozen (~510g) → Individual egg approx. 42.5g - 49.6g
- **Peewee:** Minimum 15 oz/dozen (~425g) → Individual egg approx. 35.4g - 42.5g

*Note: Sizing standards vary by region (e.g., EU uses XL, L, M, S based on slightly different weight bands).*

### 3.3 Egg Uniformity
- **Calculation:** Percentage of eggs falling within the target weight band for the flock's age. High uniformity indicates good flock health and feeding.

## 4. Egg Storage & Inventory
- **Storage Conditions:** Kept in cool rooms (typically 10-15°C or 50-60°F) with controlled humidity to prevent moisture loss.
- **Stock Management (FIFO):** First-In, First-Out rule strictly enforced. 
- **Traceability Lots:** Eggs are tagged with a Lot Number containing: `[Date] - [Farm ID] - [House ID]`.
- **Shelf Life Tracking:** System automatically flags inventory nearing expiry (usually 28-30 days from lay for whole shell eggs).

## 5. Breakage & Damage Handling
- **Recording Points:** Farm (collection), Transit (farm to grader), Grading (candling), Packaging.
- **Reasons:** Thin shells (often nutritional or age-related), equipment malfunction, rough handling.
- **KPI:** Egg breakage should be maintained below 2-3%.
- **Financial Impact:** Broken eggs (leakers) are written off. Cracked eggs may be downgraded and sold to liquid egg processors at a reduced rate.

## 6. Egg Sales & Pricing
- **Customer Segmentation:**
  - *Retail (Supermarkets):* Carton sales, strict quality and expiry demands, contracted pricing.
  - *Wholesale:* Tray/flat sales in bulk, fluctuating market pricing.
  - *Institutional / Processing:* Bakeries, restaurants; often purchase Grade B or specific sizes.
- **Pricing Variables:** 
  - Size (Jumbo vs. Medium).
  - Housing System (Free-Range and Organic command a premium over Cage).
  - Market Indices (e.g., Urner Barry in the US).

## 7. Dispatch & Transportation
- **Workflow:** Order generation → Picking (FIFO) → Palletizing → Loading.
- **Documentation:** Delivery Challan, Invoice, Certificate of Origin/Quality.
- **Transport Conditions:** Cold-chain logistics tracking (refrigerated trucks).

## 8. Traceability & Recalls
- **Traceability Forward:** `House ID -> Egg Lot -> Grading Run -> Pallet -> Customer Invoice`.
- **Traceability Backward:** `Customer Complaint -> Egg Lot -> Production Date -> Flock ID -> Feed Batch/Vaccine Batch`.
- **Action:** Ability to perform mock recalls within the ERP to satisfy food safety audits (e.g., SQF, BRC).
