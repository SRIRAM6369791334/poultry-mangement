# Pricing Engine

## 1. Overview
The pricing engine governs the valuation, dynamic rate setting, and contractual pricing logic for all products across the diverse customer base.

## 2. Price Models & Units
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRC-001 | The system must support two primary price models: LIVE_PRICE (based on live weight) and PROCESSED_PRICE (based on meat weight) (CLIENT-110). | [CONFIRMED] |
| PRC-002 | The system must support distinct pricing units per product type (e.g., Chicken → ₹/kg, Egg → ₹/piece, Duck → ₹/bird) (CLIENT-143). | [CONFIRMED] |
| PRC-003 | Sales orders must allow users to select the applicable selling mode (Live vs Processed) determining which price model applies (CLIENT-110). | [CONFIRMED] |

## 3. Dynamic & Customer-Specific Rates
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRC-004 | Different rates must be maintainable per customer type (Retail, Hotel, Restaurant, Dealer, Wholesale) (CLIENT-117). | [CONFIRMED] |
| PRC-005 | Product form (Live, Cleaned, Boneless, Skinless) must directly dictate the base price applied (CLIENT-117). | [CONFIRMED] |
| PRC-006 | The system must support daily or same-day market rate changes across products (CLIENT-054-055). | [CONFIRMED] |
| PRC-007 | The system must maintain historical rates and effective dates, ensuring transparency into past pricing (CLIENT-054-055). | [CONFIRMED] |
| PRC-008 | The system must generate rate change alerts to relevant sales staff and management (CLIENT-072-073). | [CONFIRMED] |

## 4. Rate Approvals & Contracts
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRC-009 | Proposed rate changes by sales personnel require Manager approval before activation (CLIENT-140). | [CONFIRMED] |
| PRC-010 | The system must support Monthly Contracts binding Customer, Product, Selling Mode, Rate, Dates, Min/Max Qty, and Payment Terms (CLIENT-138). | [CONFIRMED] |
| PRC-011 | The system must honor the concept of a "Price Lock", where the rate at order creation is preserved despite subsequent market changes (CLIENT-144). | [CONFIRMED] |

## 5. Discounts & Order Constraints
| Req ID | Requirement | Source Classification |
|---|---|---|
| PRC-012 | Discounts must be supported flexibly: Percentage, Per Kg, Fixed Amount, Promotional, or Customer-specific (CLIENT-141). | [CONFIRMED] |
| PRC-013 | The system must enforce configurable minimum order quantities per product or customer (CLIENT-142). | [CONFIRMED] |
