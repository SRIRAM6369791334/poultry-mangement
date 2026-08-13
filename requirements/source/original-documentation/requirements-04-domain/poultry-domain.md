# Poultry Domain Requirements

## 1. Overview
This document defines the core poultry domain requirements for the Sri Murugan Poultry & Agro Group. The system must accommodate various poultry species beyond chicken to support the current product catalog and future expansion.

## 2. Poultry Types & Hierarchy [CONFIRMED] (CLIENT-075)
The system must support a configurable species/bird type hierarchy. **The bird type must NOT be hard-coded.**

- **Base Category:** Poultry
  - **Chicken**
    - Broiler
    - Country Chicken / Naatu Kozhi
    - Other Chicken Breeds
  - **Duck**
  - **Quail / Kadai**
  - **Turkey**
  - **Other Poultry**

### 2.1 Configuration Model [PROPOSED]
To avoid hard-coding, the system will use a generic `Product Master` that is fully configurable.
- Administrators can add new species without code changes.
- Each species can have its own configured lifecycle duration, feed requirements, and processing methods.

## 3. Species-Specific Configuration (CLIENT-098)

Different species have different processing rules. The processing configuration must be product/species-wise.

| Species / Product | Processing Rules [CONFIRMED] | Expected Yield [INFERRED] | Selling Units [CONFIRMED] |
| --- | --- | --- | --- |
| Broiler | Skin-on / Skinless / Portions | 65-72% | Kg / Grams |
| Country Chicken | Skin-on (primarily) | 60-68% | Kg |
| Quail | Whole Bird | 70-75% | Count / Kg |
| Duck | Skin-on | 60-65% | Kg |
| Turkey | Whole / Portions | 65-70% | Kg |

### 3.1 Hard-Coding Risks [PROPOSED]
Why hard-coding chicken-only is wrong for this system:
1. Prevents scaling the existing sales of Country Chicken, Quail, Duck, and Turkey.
2. Incompatible with processing rules which vary significantly by bird type (e.g., Quail is often sold by count, not just weight).
3. Distorts data analytics by forcing non-chicken birds into a chicken-oriented schema.

## 4. Business Rules [INFERRED]
1. Every batch created must be linked to a specific species from the Product Master.
2. The pricing, expected loss %, and by-products generated must dynamically adjust based on the selected species during processing.
