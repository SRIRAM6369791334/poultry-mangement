# Product Management

## 1. Overview
The product management module establishes the foundational master data for all physical goods handled by Sri Murugan Poultry & Agro Group, including live birds, processed meat, by-products, and various units of measure.

## 2. Species & Bird Types
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRD-001 | Bird types/species (Chicken, Country Chicken/Naatu Kozhi, Quail, Duck, Turkey, Other) MUST be configurable and NOT hard-coded (CLIENT-075). | [CONFIRMED] |
| PRD-002 | The system must track live bird stock by both bird quantity (count) and live weight (CLIENT-076). | [CONFIRMED] |

## 3. Product Forms & Variants
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRD-003 | Products must be structured hierarchically: Species → Forms (e.g., Chicken → Live, Whole Cleaned, Curry Cut, Skinless, Boneless) (CLIENT-102-103, 118). | [CONFIRMED] |
| PRD-004 | The system must support capturing custom cut requirements from customers (e.g., "medium pieces", "1 kg packets") (CLIENT-102-103, 118). | [CONFIRMED] |
| PRD-005 | The system must map "One Bird to Multiple Products", separating output into Meat, Breast, Leg, Wings, Liver, Gizzard, Feet, Skin, and Waste (CLIENT-105, 119). | [CONFIRMED] |

## 4. Sales Units & Measurements
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRD-006 | Sales units must be highly configurable per product: Bird, Piece, Kg, Tray, Box, Carton, Crate (CLIENT-077). | [CONFIRMED] |
| PRD-007 | The system must support mixed unit sales for the same product based on customer preference (e.g., by count vs. by kg) (CLIENT-077). | [CONFIRMED] |
